<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">

<style>
    .cv-page .cv-tab-panel {
        display: none;
    }
    .cv-page .cv-tab-panel.active {
        display: block;
    }
{
    $s = strtolower($status);
    $green = ['paid', 'accepted', 'completed', 'sent', 'active', 'confirmed', 'generated', 'signed'];
    $red = ['overdue', 'declined', 'cancelled', 'void'];
    $cls = in_array($s, $green) ? 'ok' : (in_array($s, $red) ? 'bad' : 'wait');
    return '<span class="cv-pill ' . $cls . '"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' . h($status) . '</span>';
}
?>

<style>
    .cv-page .cv-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 16px;
    }

    .cv-page .cv-layout {
        display: grid;
        grid-template-columns: 260px minmax(0, 1fr);
        /* gap: 16px; */
        align-items: start;
        background-color: white;
        border-radius:15px;
        border: 1px solid var(--border-soft) !important;
    }

    @media (max-width: 900px) {
        .cv-page .cv-layout {
            grid-template-columns: 1fr;
        }
    }

    /* Sidebar */
    .cv-page .cv-side {
        padding-top: 10px !important;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        padding: 6px;
        position: sticky;
        border:0px !important;
        border-right:1px solid var(--border-soft) !important;
        top: calc(var(--topbar-h, 70px) + 12px);
        max-height: calc(100vh - var(--topbar-h, 70px) - 36px);
        overflow-y: auto;
        overflow-x: hidden;
    }

    .cv-page .cv-side::-webkit-scrollbar {
        width: 5px;
    }

    .cv-page .cv-side::-webkit-scrollbar-track {
        background: transparent;
    }

    .cv-page .cv-side::-webkit-scrollbar-thumb {
        background: var(--primary-lightTwo, #c8d0cb);
        border-radius: 10px;
    }

    @media (max-width: 900px) {
        .cv-page .cv-side {
            position: static;
            max-height: none;
            display: flex;
            gap: 4px;
            overflow-x: auto;
        }
    }

    .cv-page .cv-side a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 12px;
        border-radius: 9px;
        color: var(--ink-700);
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
        transition: background .15s ease, color .15s ease;
    }

    .cv-page .cv-side a i {
        font-size: 15px;
        color: var(--ink-500);
        width: 18px;
        text-align: center;
    }

    .cv-page .cv-side a:hover {
        background: #f6f8f7;
        color: var(--primary-dark);
    }

    .cv-page .cv-side a.active {
        background: var(--primary-light);
        color: var(--primary-dark);
        font-weight: 800;
    }

    .cv-page .cv-side a.active i {
        color: var(--primary);
    }

    .cv-page .cv-badge {
        margin-left: auto;
        min-width: 20px;
        padding: 1px 7px;
        border-radius: 999px;
        background: #eef0f3;
        color: var(--ink-700);
        font-size: 11px;
        font-weight: 700;
        text-align: center;
    }

    /* Content */
    .cv-page .cv-title {
        font-size: 16px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 12px;
        padding-left: 15px !important;
    }

    .cv-page .table-modern thead th,
    .cv-page .table-modern tbody td {
        padding-left: 12px;
        padding-right: 12px;
        white-space: nowrap !important;
    }

    .cv-page .cv-link {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
    }

    .cv-page .cv-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .cv-page .cv-avatar {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        object-fit: cover;
    }

    .cv-page .cv-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 11px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 800;
    }

    .cv-page .cv-pill.ok {
        color: var(--primary-dark);
        background: var(--primary-light);
    }

    .cv-page .cv-pill.wait {
        color: #a3670a;
        background: var(--accent-amber-soft);
    }

    .cv-page .cv-pill.bad {
        color: #c0362c;
        background: var(--accent-red-soft);
    }

    .cv-page .cust-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 22px;
        margin: 0;
    }

    .cv-page .cust-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .cv-page .cust-switch .slider {
        position: absolute;
        inset: 0;
        border-radius: 999px;
        background: #dfe3e8;
        cursor: pointer;
        transition: background .2s ease;
    }

    .cv-page .cust-switch .slider::before {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        left: 3px;
        top: 3px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .2);
        transition: transform .2s ease;
    }

    .cv-page .cust-switch input:checked+.slider {
        background: var(--primary);
    }

    .cv-page .cust-switch input:checked+.slider::before {
        transform: translateX(18px);
    }

    .cv-page .cust-search {
        display: inline-flex;
        align-items: stretch;
        border: 1px solid var(--border-soft);
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }

    .cv-page .cust-search:focus-within {
        border-color: var(--primary);
    }

    .cv-page .cust-search .icon {
        display: inline-flex;
        align-items: center;
        padding: 0 12px;
        background: #f8f9fa;
        border-right: 1px solid var(--border-soft);
        color: var(--ink-700);
    }

    .cv-page .cust-search input {
        border: 0;
        outline: 0;
        padding: 7px 10px;
        font-size: 12.5px;
        width: 170px;
        background: transparent;
    }

    /* Profile / address grid */
    .cv-page .cv-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
        gap: 18px 24px;
    }

    .cv-page .cv-info-item .k {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--ink-500);
        margin-bottom: 3px;
    }

    .cv-page .cv-info-item .v {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink-900);
        word-break: break-word;
    }

    .cv-page .cv-map {
        height: 340px;
        border-radius: 12px;
        border: 1px dashed var(--border-soft);
        background: repeating-linear-gradient(135deg, #f8f9fa 0 12px, #f1f3f5 12px 24px);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        color: var(--ink-500);
        font-weight: 600;
    }

    /* Dropdown (same as Leave Report export) */
    .mt-export-menu {
        position: relative;
        display: inline-block;
    }

    .mt-export-dropdown {
        position: fixed !important;
        z-index: 9999 !important;
        min-width: 170px;
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
        color: var(--ink-700);
        background: none;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-align: left;
        white-space: nowrap;
    }

    .mt-export-item:hover {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .mt-export-trigger[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
    }

    .cv-toast {
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
        background: #f0fdf4;
        color: #15803d;
        border: 1px solid #bbf7d0;
        box-shadow: 0 8px 24px rgba(0, 0, 0, .15);
        opacity: 0;
        transform: translateY(12px);
        transition: all .3s ease;
    }

    .cv-toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* ===== Profile form (sub-tabs) ===== */
    .cv-page .cv-subtabs {
        display: flex;
        gap: 4px;
        padding: 0 14px;
        border-bottom: 1px solid #eef0f3;
        /* overflow-x: auto; */
    }

    .cv-page .cv-subtab {
        border: 0;
        background: none;
        padding: 15px 14px 12px;
        margin-bottom: -1px;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-700);
        border-bottom: 2px solid transparent;
        white-space: nowrap;
        cursor: pointer;
        transition: color .15s ease, border-color .15s ease;
    }

    /* ===== Hero summary card ===== */
    .cv-page .cv-hero {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        padding: 20px 24px;
        margin-bottom: 16px;
        border-radius: 14px;
        background: #fff;
        border: 1px solid var(--border-soft);
        position: relative;
        overflow: hidden;
    }

    .cv-page .cv-hero::before {
        content: '';
        position: absolute;
        inset: 0 0 auto 0;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--primary-light, #6ee7a0));
    }

    .cv-page .cv-hero-avatar {
        width: 58px;
        height: 58px;
        flex: 0 0 auto;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 800;
        letter-spacing: .5px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark, #0f7a38));
        color: #fff;
        box-shadow: 0 6px 14px rgba(22, 163, 74, .25);
    }

    .cv-page .cv-hero-main {
        min-width: 220px;
        flex: 1 1 auto;
    }

    .cv-page .cv-hero-main h2 {
        font-size: 18px;
        font-weight: 800;
        letter-spacing: -.2px;
        margin: 0 0 8px;
    }

    .cv-page .cv-hero-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
        font-size: 12px;
    }

    .cv-page .cv-hero-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 11px;
        border-radius: 999px;
        background: #f6f8f7;
        border: 1px solid #eef0f3;
        color: var(--ink-700);
        font-weight: 600;
    }

    .cv-page .cv-hero-meta span i {
        color: var(--ink-500);
        font-size: 12px;
    }

    .cv-page .cv-hero-status {
        color: var(--primary-dark) !important;
        background: var(--primary-soft, #eafaf1) !important;
        border-color: #cdebd8 !important;
        font-weight: 700 !important;
    }

    .cv-page .cv-hero-status i {
        color: var(--primary) !important;
    }

    /* Hero quick actions */
    .cv-page .cv-hero-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-left: auto;
    }

    .cv-page .cv-hero-icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: 1px solid var(--border-soft);
        background: #fff;
        color: var(--ink-700);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        transition: all .15s ease;
    }

    .cv-page .cv-hero-icon-btn:hover {
        background: var(--primary-soft, #eafaf1);
        border-color: var(--primary);
        color: var(--primary-dark);
        transform: translateY(-1px);
    }

    .cv-page .cv-hero-icon-btn.danger:hover {
        background: var(--accent-red-soft, #fef2f2);
        border-color: #fca5a5;
        color: #dc2626;
    }

    .cv-page .cv-hero-stats {
        display: flex;
        align-items: stretch;
        gap: 0;
        margin-left: auto;
        background: #fbfcfb;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 8px 4px;
    }

    .cv-page .cv-hero-stat {
        padding: 2px 20px;
        text-align: left;
        border-left: 1px solid #eef0f3;
        transition: transform .15s ease;
    }

    .cv-page .cv-hero-stat:hover {
        transform: translateY(-1px);
    }

    .cv-page .cv-hero-stat:first-child {
        border-left: 0;
    }

    .cv-page .cv-hero-stat .n {
        font-size: 18px;
        font-weight: 800;
        line-height: 1.2;
        color: var(--ink-900);
    }

    .cv-page .cv-hero-stat .l {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: var(--ink-500);
        margin-top: 2px;
    }

    @media (max-width: 700px) {
        .cv-page .cv-hero { padding: 16px; }
        .cv-page .cv-hero-stats { width: 100%; margin-left: 0; margin-top: 10px; justify-content: space-between; }
        .cv-page .cv-hero-stat { padding: 0 12px; flex: 1 1 auto; }
    }

    /* ===== Sidebar groups ===== */
    .cv-page .cv-side {
        background: transparent;
        border: 0;
        box-shadow: none;
        padding: 0;
    }

    .cv-page .cv-side-group + .cv-side-group {
        margin-top: 14px;
        padding-top: 12px;
        border-top: 1px dashed #eef0f3;
    }

    .cv-page .cv-side-label {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 0 12px 8px;
        font-size: 10px;
        font-weight: 800;
        color: var(--ink-300);
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    .cv-page .cv-side-label::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, #eef0f3, transparent);
    }

    .cv-page .cv-side a {
        border-radius: 8px;
        border-left: 0;
        padding-left: 12px;
        position: relative;
    }

    .cv-page .cv-side a:hover {
        background: #f6f8f7;
        transform: translateX(2px);
    }

    .cv-page .cv-side a.active {
        background: linear-gradient(90deg, var(--primary-soft, #eafaf1), rgba(234, 250, 241, .35));
        border-left: 0;
        box-shadow: inset 3px 0 0 var(--primary);
    }

    @media (max-width: 900px) {
        .cv-page .cv-side-group { display: flex; gap: 4px; }
        .cv-page .cv-side-label { display: none; }
    }

    /* ===== Flatter, less generic cards ===== */
    .cv-page .card-custom {
        box-shadow: none;
        border: 1px solid var(--border-soft);
    }
    .card-custom {
        border: 0px !important;
    }

    .cv-page .cv-title {
        font-size: 15px;
        font-weight: 800;
        letter-spacing: -.1px;
        color: var(--ink-900);
        padding-bottom: 10px;
        margin-bottom: 14px;
        border-bottom: 1px solid var(--border-soft);
        margin-bottom:0px;
        margin-top: 10px;
    }

    .cv-page .cv-subtab:hover {
        color: var(--primary-dark);
    }

    .cv-page .cv-subtab.active {
        color: var(--primary-dark);
        border-bottom-color: var(--primary);
        font-weight: 800;
    }

    .cv-page .cv-pane {
        display: none;
        padding: 22px;
    }

    .cv-page .cv-pane.active {
        display: block;
    }

    .cv-page .cv-form {
        max-width: 780px;
    }

    .cv-page .cv-field {
        margin-bottom: 16px;
    }

    .cv-page .cv-field .form-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-700);
        margin-bottom: 6px;
    }

    .cv-page .cv-required::before {
        content: '* ';
        color: var(--accent-red, #e5484d);
    }

    .cv-page .cv-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0 20px;
    }

    .cv-page .cv-bill-grid {
        gap: 0 40px;
    }

    @media (max-width: 720px) {

        .cv-page .cv-grid-2,
        .cv-page .cv-bill-grid {
            grid-template-columns: 1fr;
        }

        .cv-page .cv-bill-grid>div+div {
            margin-top: 24px;
        }
    }

    .cv-page .cv-check {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700);
        cursor: pointer;
    }

    .cv-page .cv-divider {
        border: 0;
        border-top: 1px solid #eef0f3;
        margin: 22px 0;
    }

    .cv-page .cv-with-btn {
        display: flex;
        gap: 0;
    }

    .cv-page .cv-with-btn .select2-container {
        flex: 1 1 auto;
        min-width: 0;
    }

    .cv-page .cv-plus {
        border: 1px solid var(--border-soft);
        border-left: 0;
        border-radius: 0 8px 8px 0;
        background: #fff;
        color: var(--ink-900);
        padding: 0 14px;
    }

    .cv-page .cv-plus:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .cv-page .cv-addr-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
        font-size: 14px;
        font-weight: 800;
        color: var(--ink-900);
    }

    .cv-page .cv-textlink {
        border: 0;
        background: none;
        padding: 0;
        color: var(--primary);
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
    }

    .cv-page .cv-textlink:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .cv-page .cv-err {
        margin-top: 4px;
        font-size: 12px;
        color: var(--accent-red, #e5484d);
    }

    .cv-page .cv-invalid,
    .cv-page .cv-invalid+.select2-container .select2-selection {
        border-color: var(--accent-red, #e5484d) !important;
    }

    .cv-page .cv-form-foot {
        display: flex;
        justify-content: flex-end;
        padding: 14px 22px;
        background: #f8f9fa;
        border-top: 1px solid #eef0f3;
        border-radius: 0 0 14px 14px;
    }

    .cv-page .cv-profile .select2-container {
        /* width: 100% !important; */
    }

    .cv-page .cv-mini-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 12px;
    }

    .cv-page .cv-mini-empty {
        padding: 14px 12px 8px;
        color: var(--ink-500);
        font-size: 13px;
        font-weight: 600;
    }

    .cv-page .cv-mini-empty[hidden] {
        display: none;
    }

    .cv-page .cv-icon-btn {
        border: 1px solid var(--border-soft);
        background: #fff;
        border-radius: 8px;
        padding: 4px 9px;
        color: var(--accent-red, #e5484d);
        cursor: pointer;
    }

    .cv-page .cv-icon-btn:hover {
        background: var(--accent-red-soft);
    }

    .cv-page a.cv-subtab {
        display: inline-block;
        text-decoration: none;
    }

    .cv-page .cv-report .report-footer {
        padding-left: 0;
        padding-right: 0;
    }

    /* ===== Add new contact modal ===== */
    #cvContactModal .cv-contact-dialog {
        width: 100%;
        max-width: 680px;
        max-height: 92vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 16px;
    }

    #cvContactModal .cv-contact-body {
        flex: 1 1 auto;
        overflow-y: auto;
        padding: 18px 22px;
        background: #f6f8f7;
    }

    #cvContactModal .cv-section,
    #cvVaultModal .cv-section,
    #cvReminderModal .cv-section {
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 16px 18px 18px;
        margin-bottom: 14px;
        box-shadow: 0 1px 2px rgba(16, 24, 40, .04);
    }

    #cvContactModal .cv-sec-head,
    #cvVaultModal .cv-sec-head,
    #cvReminderModal .cv-sec-head {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 14px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #e6eae8;
    }

    #cvContactModal .cv-sec-head>i,
    #cvVaultModal .cv-sec-head>i,
    #cvReminderModal .cv-sec-head>i {
        color: var(--primary);
        font-size: 14px;
    }

    #cvContactModal .cv-sec-all {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 700;
        color: var(--primary-dark);
        cursor: pointer;
        user-select: none;
    }

    #cvContactModal .cv-sec-all .form-check-input {
        margin: 0;
    }

    #cvContactModal .cv-avatar-upload {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 14px 16px;
        margin-bottom: 14px;
        box-shadow: 0 1px 2px rgba(16, 24, 40, .04);
    }

    #cvContactModal .cv-avatar-preview {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-light, #eafaf1), #d9f2e4);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        overflow: hidden;
        flex: 0 0 auto;
        border: 2px solid #fff;
        box-shadow: 0 0 0 2px var(--primary-light, #eafaf1);
    }

    #cvContactModal .cv-avatar-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #cvContactModal .cv-avatar-title {
        font-size: 13px;
        font-weight: 800;
    }

    #cvContactModal .cv-avatar-hint {
        font-size: 11.5px;
        color: var(--ink-500);
        margin: 2px 0 8px;
    }

    #cvContactModal .cv-perm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px 14px;
    }

    @media (max-width: 560px) {
        #cvContactModal .cv-perm-grid {
            grid-template-columns: 1fr;
        }
    }

    #cvContactModal .cv-perm-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 8px 12px;
        border: 1px solid #eef0f3;
        border-radius: 9px;
        background: #fbfcfb;
        transition: border-color .15s ease, background .15s ease;
    }

    #cvContactModal .cv-perm-card:hover {
        border-color: #cdebd8;
        background: #f6fbf8;
    }

    #cvContactModal .cv-perm-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700);
        display: flex;
        align-items: center;
        min-width: 0;
    }

    #cvContactModal .cv-perm-label i {
        color: var(--ink-500);
        font-size: 13px;
        width: 18px;
        text-align: center;
        flex: 0 0 auto;
    }

    #cvContactModal .cv-pass-meter {
        height: 5px;
        border-radius: 99px;
        background: #eef0f3;
        overflow: hidden;
        margin-top: 8px;
    }

    #cvContactModal .cv-pass-meter i {
        display: block;
        height: 100%;
        width: 0;
        border-radius: 99px;
        background: var(--primary);
        transition: width .25s ease, background .25s ease;
    }

    #cvContactModal .cv-pass-hint {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-500);
        margin-top: 5px;
    }

    #cvContactModal .cv-pass-hint.s-weak {
        color: #dc3545;
    }

    #cvContactModal .cv-pass-hint.s-med {
        color: #d97706;
    }

    #cvContactModal .cv-pass-hint.s-strong {
        color: var(--primary-dark);
    }

    #cvContactModal .cv-check-card {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        padding: 10px 12px;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #fbfcfb;
        cursor: pointer;
        transition: border-color .15s ease, background .15s ease;
    }

    #cvContactModal .cv-check-card:hover {
        border-color: #cdebd8;
        background: #f6fbf8;
    }

    #cvContactModal .cv-check-card .form-check-input {
        margin-top: 2px;
        flex: 0 0 auto;
    }

    #cvContactModal .cv-check-card .t {
        display: block;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900);
    }

    #cvContactModal .cv-check-card .d {
        display: block;
        font-size: 11px;
        color: var(--ink-500);
        margin-top: 1px;
    }

    #cvContactModal .cv-check-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    @media (max-width: 560px) {
        #cvContactModal .cv-check-grid {
            grid-template-columns: 1fr;
        }
    }

    #cvContactModal .cv-warn {
        font-size: 11.5px;
        color: var(--ink-500);
        margin: -6px 0 12px;
    }

    #cvContactModal .leave-reject-foot {
        flex: 0 0 auto;
    }

    /* ===== Add note modal ===== */
    .cv-contact-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 16px 22px;
        background: #fff;
        border-bottom: 1px solid #eef0f3;
    }

    .cv-contact-head-l {
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 0;
    }

    .cv-contact-ava {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--primary-light, #eafaf1);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        flex: 0 0 auto;
    }

    .cv-contact-head h3 {
        font-size: 15.5px;
        font-weight: 800;
        margin: 0;
    }

    .cv-contact-sub {
        margin-top: 1px;
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: .01em;
        color: var(--ink-500);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cv-note-dialog {
        width: 100%;
        max-width: 640px;
        max-height: 92vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 16px;
    }

    .cv-note-body {
        flex: 1 1 auto;
        overflow-y: auto;
        padding: 18px 22px;
        /* background: #f6f8f7; */
    }

    #cvNoteModal .cv-note-textarea {
        min-height: 160px;
        resize: vertical;
        border-radius: 10px;
    }

    #cvNoteModal .cv-note-textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft, #eafaf1);
    }

    #cvNoteModal .cv-note-hint {
        font-size: 11.5px;
        color: var(--ink-500);
        margin-top: 6px;
    }

    /* ===== Add vault entry modal ===== */
    #cvVaultModal .cv-vault-dialog {
        width: 100%;
        max-width: 640px;
        max-height: 92vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 16px;
    }

    #cvVaultModal .cv-contact-body {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
        padding: 18px 22px;
        background: #f6f8f7;
    }

    #cvVaultModal .cv-vault-ava {
        background: linear-gradient(135deg, var(--primary-light, #eafaf1), #d9f2e4);
    }

    #cvVaultModal .cv-vault-textarea {
        min-height: 110px;
        resize: vertical;
        border-radius: 10px;
    }

    #cvVaultModal .cv-vault-textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft, #eafaf1);
    }

    /* Password input + eye / generate buttons */
    #cvVaultModal .cv-pass-wrap {
        position: relative;
        display: flex;
        align-items: center;
    }

    #cvVaultModal .cv-pass-wrap .form-control {
        padding-right: 74px;
    }

    #cvVaultModal .cv-pass-eye,
    #cvVaultModal .cv-pass-gen {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border: 0;
        background: none;
        color: var(--ink-500);
        font-size: 14px;
        padding: 6px;
        cursor: pointer;
        line-height: 1;
        border-radius: 6px;
    }

    #cvVaultModal .cv-pass-eye:hover,
    #cvVaultModal .cv-pass-gen:hover {
        color: var(--primary-dark);
        background: var(--primary-soft);
    }

    #cvVaultModal .cv-pass-eye {
        right: 40px;
    }

    #cvVaultModal .cv-pass-gen {
        right: 10px;
    }

    #cvVaultModal .cv-pass-meter {
        height: 5px;
        border-radius: 99px;
        background: #eef0f3;
        overflow: hidden;
        margin-top: 8px;
    }

    #cvVaultModal .cv-pass-meter i {
        display: block;
        height: 100%;
        width: 0;
        border-radius: 99px;
        background: var(--primary);
        transition: width .25s ease, background .25s ease;
    }

    #cvVaultModal .cv-pass-hint {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-500);
        margin-top: 5px;
    }

    #cvVaultModal .cv-pass-hint.s-weak {
        color: #dc3545;
    }

    #cvVaultModal .cv-pass-hint.s-med {
        color: #d97706;
    }

    #cvVaultModal .cv-pass-hint.s-strong {
        color: var(--primary-dark);
    }

    /* Visibility radio cards */
    #cvVaultModal .cv-vault-vis-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 10px;
    }

    #cvVaultModal .cv-vault-vis {
        display: block;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #fbfcfb;
        cursor: pointer;
        transition: border-color .15s ease, background .15s ease, box-shadow .15s ease;
    }

    #cvVaultModal .cv-vault-vis:hover {
        border-color: #cdebd8;
        background: #f6fbf8;
    }

    #cvVaultModal .cv-vault-vis input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    #cvVaultModal .cv-vault-vis-body {
        display: flex;
        flex-direction: column;
        gap: 4px;
        padding: 11px 13px;
    }

    #cvVaultModal .cv-vault-vis-title {
        display: flex;
        align-items: center;
        gap: 7px;
        font-size: 12.5px;
        font-weight: 800;
        color: var(--ink-900);
    }

    #cvVaultModal .cv-vault-vis-title i {
        color: var(--ink-500);
        font-size: 13px;
    }

    #cvVaultModal .cv-vault-vis-desc {
        font-size: 11px;
        line-height: 1.5;
        color: var(--ink-500);
        font-weight: 600;
    }

    #cvVaultModal .cv-vault-vis input:checked ~ .cv-vault-vis-body {
        border-radius: 10px;
    }

    #cvVaultModal .cv-vault-vis:has(input:checked) {
        border-color: var(--primary);
        background: var(--primary-soft, #eafaf1);
        box-shadow: 0 0 0 1px var(--primary) inset;
    }

    #cvVaultModal .cv-vault-vis:has(input:checked) .cv-vault-vis-title i {
        color: var(--primary);
    }

    /* Share checkbox */
    #cvVaultModal .cv-vault-share {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        margin-top: 12px;
        padding: 10px 12px;
        border: 1px dashed #dbe4de;
        border-radius: 10px;
        background: #fff;
        cursor: pointer;
        transition: border-color .15s ease, background .15s ease;
    }

    #cvVaultModal .cv-vault-share:hover {
        border-color: var(--primary);
        background: #f6fbf8;
    }

    #cvVaultModal .cv-vault-share input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    #cvVaultModal .cv-vault-share-box {
        width: 18px;
        height: 18px;
        flex: 0 0 auto;
        border-radius: 5px;
        border: 1.5px solid #c8d0cb;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        color: transparent;
        margin-top: 1px;
        transition: all .15s ease;
    }

    #cvVaultModal .cv-vault-share input:checked ~ .cv-vault-share-box {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    #cvVaultModal .cv-vault-share-text {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    #cvVaultModal .cv-vault-share-text .t {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900);
    }

    #cvVaultModal .cv-vault-share-text .d {
        font-size: 11px;
        color: var(--ink-500);
        margin-top: 1px;
    }

    /* ===== Set reminder modal ===== */
    #cvReminderModal .cv-vault-dialog {
        width: 100%;
        max-width: 560px;
        max-height: 92vh;
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border-radius: 16px;
    }

    #cvReminderModal .cv-contact-body {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
        padding: 18px 22px;
        background: #f6f8f7;
    }

    #cvReminderModal .cv-reminder-textarea {
        min-height: 110px;
        resize: vertical;
        border-radius: 10px;
    }

    #cvReminderModal .cv-reminder-textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft, #eafaf1);
    }

    #cvReminderModal .cv-reminder-hint {
        font-size: 11.5px;
        color: var(--ink-500);
        margin-top: 6px;
    }

    /* Email checkbox card */
    #cvReminderModal .cv-reminder-email {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        padding: 10px 12px;
        border: 1px dashed #dbe4de;
        border-radius: 10px;
        background: #fff;
        cursor: pointer;
        transition: border-color .15s ease, background .15s ease;
    }

    #cvReminderModal .cv-reminder-email:hover {
        border-color: var(--primary);
        background: #f6fbf8;
    }

    #cvReminderModal .cv-reminder-email input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    #cvReminderModal .cv-reminder-email-box {
        width: 18px;
        height: 18px;
        flex: 0 0 auto;
        border-radius: 5px;
        border: 1.5px solid #c8d0cb;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        color: transparent;
        margin-top: 1px;
        transition: all .15s ease;
    }

    #cvReminderModal .cv-reminder-email input:checked ~ .cv-reminder-email-box {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    #cvReminderModal .cv-reminder-email-text {
        display: flex;
        flex-direction: column;
        min-width: 0;
    }

    #cvReminderModal .cv-reminder-email-text .t {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900);
        display: flex;
        align-items: center;
        gap: 6px;
    }

    #cvReminderModal .cv-reminder-email-text .t::before {
        content: '\F0037';
        font-family: 'bootstrap-icons';
        color: var(--ink-500);
        font-size: 12px;
    }

    #cvReminderModal .cv-reminder-email-text .d {
        font-size: 11px;
        color: var(--ink-500);
        margin-top: 1px;
    }

    /* ===== New Call Log modal (fullscreen) ===== */
    #cvNewCallLogModal .modal-content {
        border: none;
        border-radius: 0;
        display: flex;
        flex-direction: column;
        height: 100%;
        background: #f6f8f7;
    }

    #cvNewCallLogModal .cv-cl-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 16px 28px;
        background: #fff;
        border-bottom: 1px solid #eef0f3;
    }

    #cvNewCallLogModal .cv-cl-header h3 {
        font-size: 15.5px;
        font-weight: 800;
        margin: 0;
    }

    #cvNewCallLogModal .modal-body.cv-cl-body {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
        padding: 22px 28px;
    }

    #cvNewCallLogModal .cv-cl-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        align-items: start;
    }

    @media (max-width: 900px) {
        #cvNewCallLogModal .cv-cl-grid {
            grid-template-columns: 1fr;
        }
    }

    #cvNewCallLogModal .cv-cl-card {
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 18px 20px 20px;
        box-shadow: 0 1px 2px rgba(16, 24, 40, .04);
    }

    #cvNewCallLogModal .cv-cl-card-head {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 16px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #e6eae8;
    }

    #cvNewCallLogModal .cv-cl-card-head>i {
        color: var(--primary);
        font-size: 14px;
    }

    #cvNewCallLogModal .cv-cl-field {
        margin-bottom: 15px;
    }

    #cvNewCallLogModal .cv-cl-field label {
        display: block;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-700);
        margin-bottom: 6px;
    }

    #cvNewCallLogModal .cv-cl-field .form-control,
    #cvNewCallLogModal .cv-cl-field .form-select {
        font-size: 13px;
        border-radius: 8px;
    }

    #cvNewCallLogModal .cv-cl-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0 16px;
    }

    @media (max-width: 560px) {
        #cvNewCallLogModal .cv-cl-grid-2 {
            grid-template-columns: 1fr;
        }
    }

    #cvNewCallLogModal .cv-cl-textarea {
        min-height: 120px;
        resize: vertical;
        border-radius: 10px;
    }

    #cvNewCallLogModal .cv-cl-textarea:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft, #eafaf1);
    }

    /* Yes / No pill radios */
    #cvNewCallLogModal .cv-cl-inline {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 10px 0 2px;
    }

    #cvNewCallLogModal .cv-cl-inline-lbl {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-700);
        min-width: 140px;
    }

    #cvNewCallLogModal .cv-cl-yn {
        display: inline-flex;
        background: #f1f4f3;
        border-radius: 999px;
        padding: 3px;
        gap: 2px;
    }

    #cvNewCallLogModal .cv-cl-yn label {
        margin: 0;
        cursor: pointer;
    }

    #cvNewCallLogModal .cv-cl-yn input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    #cvNewCallLogModal .cv-cl-yn span {
        display: inline-block;
        padding: 5px 18px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-500);
        transition: all .15s ease;
    }

    #cvNewCallLogModal .cv-cl-yn input:checked+span {
        background: #fff;
        color: var(--primary-dark);
        box-shadow: 0 1px 4px rgba(16, 24, 40, .12);
    }

    #cvNewCallLogModal .cv-cl-footer {
        flex: 0 0 auto;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 28px;
        background: #fff;
        border-top: 1px solid #eef0f3;
    }

    /* Call log table cells */
    .cv-page .cv-cl-yes {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 800;
        background: var(--primary-soft, #eafaf1);
        color: var(--primary-dark, #0f7a38);
    }

    .cv-page .cv-cl-no {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 800;
        background: #f1f4f3;
        color: #6b7280;
    }

    .cv-page .cv-cl-type {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 700;
    }

    .cv-page .cv-cl-type i.outgoing {
        color: var(--primary);
    }

    .cv-page .cv-cl-type i.incoming {
        color: #2563eb;
    }

    .cv-page .cv-cl-type i.missed {
        color: #dc2626;
    }

    /* ===== Shipping address ===== */
    .cv-addr-del {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        border: 1px solid #fca5a5;
        background: #fef2f2;
        color: #ef4444;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: .15s;
    }

    .cv-addr-del:hover {
        background: #ef4444;
        border-color: #ef4444;
        color: #fff;
    }

    .cv-addr-edit {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        border: 1px solid #86efac;
        background: #f0fdf4;
        color: var(--primary, #16a34a);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: .15s;
    }

    .cv-addr-edit:hover {
        background: var(--primary, #16a34a);
        border-color: var(--primary, #16a34a);
        color: #fff;
    }

    /* ===== Statement ===== */
    .cv-stmt-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding: 14px 18px;
        border-bottom: 1px solid #eef0f3;
    }

    .cv-stmt-period {
        max-width: 260px;
        background: #f8f9fa;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700);
    }

    .cv-stmt-acts {
        display: flex;
        gap: 6px;
    }

    .cv-stmt-btn {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: 1px solid var(--border-soft, #e5e7eb);
        background: #fff;
        color: var(--ink-700);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        transition: .15s;
    }

    .cv-stmt-btn:hover {
        background: var(--primary-soft, #eafaf1);
        border-color: var(--primary, #16a34a);
        color: var(--primary-dark, #0f7a38);
    }

    .cv-stmt-doc {
        padding: 26px 30px 30px;
        background:
            radial-gradient(700px 200px at 100% 0%, rgba(22, 163, 74, .05), transparent 70%),
            radial-gradient(600px 200px at 0% 100%, rgba(22, 163, 74, .04), transparent 70%),
            #fff;
    }

    /* Letterhead */
    .cv-stmt-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 18px;
        padding-bottom: 18px;
        border-bottom: 1px dashed #dbe4de;
        margin-bottom: 20px;
    }

    .cv-stmt-brand {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .cv-stmt-logo {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--primary, #16a34a), #0f7a38);
        color: #fff;
        font-size: 19px;
        font-weight: 800;
        letter-spacing: .03em;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 6px 16px rgba(22, 163, 74, .28);
        flex: 0 0 auto;
    }

    .cv-stmt-co-name {
        font-size: 14.5px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 4px;
    }

    .cv-stmt-co-addr {
        font-size: 11.5px;
        line-height: 1.65;
        color: var(--ink-500);
    }

    .cv-stmt-meta {
        min-width: 240px;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 12px 16px;
        background: #fbfcfb;
    }

    .cv-stmt-doc-type {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: var(--primary-dark, #0f7a38);
        background: var(--primary-soft, #eafaf1);
        border-radius: 999px;
        padding: 4px 10px;
        margin-bottom: 10px;
    }

    .cv-stmt-meta-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        font-size: 12px;
        padding: 3px 0;
    }

    .cv-stmt-meta-row span {
        color: var(--ink-500);
        font-weight: 600;
    }

    .cv-stmt-meta-row b {
        color: var(--ink-900);
        font-weight: 700;
        white-space: nowrap;
    }

    .cv-stmt-title {
        font-size: 19px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 18px;
    }

    /* Parties row */
    .cv-stmt-parties {
        display: grid;
        grid-template-columns: minmax(0, 1.6fr) minmax(220px, 1fr);
        gap: 14px;
        margin-bottom: 22px;
    }

    @media (max-width: 760px) {
        .cv-stmt-parties {
            grid-template-columns: 1fr;
        }
    }

    .cv-stmt-to-label {
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: var(--ink-500);
        margin-bottom: 8px;
    }

    .cv-stmt-to-box {
        display: flex;
        gap: 12px;
        border: 1px solid #e6ebe8;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 12.5px;
        color: var(--ink-700);
        background: #fff;
        /* height: 100%; */
    }

    .cv-stmt-to-ava {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: var(--primary-soft, #eafaf1);
        color: var(--primary-dark, #0f7a38);
        font-size: 14px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 auto;
    }

    .cv-stmt-to-name {
        font-size: 13.5px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 3px;
    }

    .cv-stmt-to-line {
        display: flex;
        align-items: center;
        gap: 7px;
        line-height: 1.7;
        color: var(--ink-500);
    }

    .cv-stmt-to-line i {
        color: var(--primary, #16a34a);
        font-size: 12px;
        width: 14px;
        text-align: center;
        flex: 0 0 auto;
    }

    .cv-stmt-due {
        border: 1px solid #d9f2e4;
        border-radius: 12px;
        padding: 16px 18px;
        background: linear-gradient(160deg, var(--primary-soft, #eafaf1), #fff 70%);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .cv-stmt-due .k {
        font-size: 10.5px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .05em;
        color: var(--primary-dark, #0f7a38);
        margin-bottom: 4px;
    }

    .cv-stmt-due .v {
        font-size: 24px;
        font-weight: 800;
        color: var(--ink-900);
        line-height: 1.2;
    }

    .cv-stmt-due .d {
        font-size: 11.5px;
        color: var(--ink-500);
        margin-top: 4px;
        font-weight: 600;
    }

    /* KPI cards */
    .cv-stmt-kpis {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
        gap: 10px;
        margin-bottom: 20px;
    }

    .cv-stmt-kpi {
        display: flex;
        align-items: center;
        gap: 11px;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 12px 14px;
        background: #fff;
        transition: transform .15s ease, box-shadow .15s ease;
    }

    .cv-stmt-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(16, 24, 40, .07);
    }

    .cv-stmt-kpi .ic {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex: 0 0 auto;
    }

    .cv-stmt-kpi .ic.i-grey {
        background: #f1f5f4;
        color: #64748b;
    }

    .cv-stmt-kpi .ic.i-red {
        background: #fef2f2;
        color: #ef4444;
    }

    .cv-stmt-kpi .ic.i-blue {
        background: #eff6ff;
        color: #3b82f6;
    }

    .cv-stmt-kpi .ic.i-green {
        background: var(--primary-soft, #eafaf1);
        color: var(--primary, #16a34a);
    }

    .cv-stmt-kpi .k {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: var(--ink-500);
        margin-bottom: 2px;
        white-space: nowrap;
    }

    .cv-stmt-kpi .v {
        font-size: 15.5px;
        font-weight: 800;
        color: var(--ink-900);
    }

    .cv-stmt-total td {
        font-weight: 800;
        background: #f6f8f7;
        border-top: 2px solid var(--primary, #16a34a);
    }

    /* ===== Invoices tab ===== */
    .cv-inv-actions {
        display: flex;
        gap: 10px;
        margin-bottom: 14px;
        flex-wrap: wrap;
    }

    .cv-inv-year {
        max-width: 140px;
        margin-bottom: 14px;
        font-size: 13px;
        font-weight: 600;
    }

    .cv-inv-kpis {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
    }

    .cv-inv-kpi {
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 12px 16px;
        background: #fff;
        transition: transform .15s ease, box-shadow .15s ease;
    }

    .cv-inv-kpi:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(16, 24, 40, .07);
    }

    .cv-inv-kpi .k {
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .cv-inv-kpi .v {
        font-size: 18px;
        font-weight: 800;
        color: var(--ink-900);
    }

    .cv-inv-kpi.k-blue .k {
        color: #2563eb;
    }

    .cv-inv-kpi.k-amber .k {
        color: #d97706;
    }

    .cv-inv-kpi.k-red .k {
        color: #dc2626;
    }

    .cv-inv-kpi.k-green .k {
        color: var(--primary-dark, #0f7a38);
    }

    .cv-tag-chip {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        background: var(--primary-soft, #eafaf1);
        color: var(--primary-dark, #0f7a38);
        font-size: 11px;
        font-weight: 700;
    }

    /* Create New Invoice modal (np- style from lead.php newProposalModal) */
    #cvNewInvoiceModal.modal {
        z-index: 1055;
    }

    /* Stacked Add New Item modal — sits above invoice modal + backdrop */
    #cvAddItemModal.modal {
        z-index: 1075;
    }

    #cvNewInvoiceModal .modal-content {
        border: none;
        border-radius: 0;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    #cvNewInvoiceModal .modal-body {
        flex: 1 1 auto;
        min-height: 0;
        overflow-y: auto;
    }

    .cv-inv-body {
        padding: 24px 28px;
    }

    .cv-inv-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 40px;
    }

    @media (max-width: 900px) {
        .cv-inv-grid {
            grid-template-columns: 1fr;
        }
    }

    .cv-inv-field {
        margin-bottom: 14px;
    }

    .cv-inv-field label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 4px;
    }

    .cv-inv-field label .req {
        color: #dc2626;
        margin-right: 2px;
    }

    .cv-inv-field .form-control,
    .cv-inv-field .form-select {
        font-size: 13px;
        border-radius: 8px;
    }

    .cv-inv-addr-row {
        display: flex;
        gap: 14px;
    }

    .cv-inv-addr-row>.cv-inv-field,
    .cv-inv-addr-row>div {
        flex: 1;
        min-width: 0;
    }

    .cv-inv-mini-label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 5px;
    }

    .cv-inv-mini-label i {
        color: var(--primary, #16a34a);
    }

    .cv-inv-addr-text {
        font-size: 12.5px;
        line-height: 1.7;
        color: var(--ink-700);
        background: #f8f9fa;
        border: 1px solid #eef0f3;
        border-radius: 8px;
        padding: 8px 12px;
    }

    .cv-inv-num-wrap {
        display: flex;
        align-items: stretch;
    }

    .cv-inv-num-wrap .cv-inv-prefix {
        display: flex;
        align-items: center;
        padding: 0 12px;
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        border-right: 0;
        border-radius: 8px 0 0 8px;
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-500);
    }

    .cv-inv-num-wrap .form-control {
        border-radius: 0 8px 8px 0;
        flex: 1;
        min-width: 0;
    }

    .cv-inv-items {
        margin-top: 20px;
        border-top: 1px solid #e5e7eb;
        padding-top: 20px;
    }

    .cv-inv-items-toolbar {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 14px;
        flex-wrap: wrap;
    }

    .cv-inv-add-item {
        width: 220px;
        font-size: 13px;
        border-radius: 8px;
    }

    .cv-inv-item-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        padding: 0;
    }

    .cv-inv-qty-radio {
        margin-left: auto;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 12px;
        font-weight: 600;
        color: #374151;
    }

    .cv-inv-qty-radio label {
        display: flex;
        align-items: center;
        gap: 4px;
        cursor: pointer;
        margin: 0;
    }

    .cv-inv-item-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 12.5px;
    }

    .cv-inv-item-table th {
        background: #f0f2f5;
        color: #6b7280;
        font-weight: 700;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .03em;
        padding: 8px 10px;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
        white-space: nowrap;
    }

    .cv-inv-item-table th i {
        color: #9ca3af;
    }

    .cv-inv-item-table td {
        padding: 8px 10px;
        border-bottom: 1px solid #f0f2f5;
        vertical-align: middle;
    }

    .cv-inv-item-table .form-control,
    .cv-inv-item-table .form-select {
        font-size: 12px;
        border-radius: 6px;
        padding: 5px 8px;
    }

    .cv-inv-item-table textarea.form-control {
        min-height: 50px;
        resize: vertical;
        font-size: 12px;
    }

    .cv-inv-unit {
        text-align: center;
        font-size: 11px;
        color: #9ca3af;
        margin-top: 3px;
    }

    .cv-inv-amt {
        font-weight: 700;
        color: var(--ink-900);
        white-space: nowrap;
    }

    .cv-inv-check {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        background: var(--primary, #16a34a);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .cv-inv-row-del {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: 1px solid #fca5a5;
        background: #fef2f2;
        color: #ef4444;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: .15s;
    }

    .cv-inv-row-del:hover {
        background: #ef4444;
        border-color: #ef4444;
        color: #fff;
    }

    .cv-inv-row-locked td {
        background: #fbfdfb;
    }

    .cv-inv-row-locked textarea,
    .cv-inv-row-locked input,
    .cv-inv-row-locked select {
        background: #f4f6f5 !important;
        color: #6b7280 !important;
        border-color: #e5e8e6 !important;
    }

    .cv-inv-totals {
        display: flex;
        justify-content: flex-end;
        padding: 16px 0;
    }

    .cv-inv-totals-box {
        width: 380px;
    }

    .cv-inv-trow {
        display: grid;
        grid-template-columns: 1fr auto auto;
        align-items: center;
        gap: 12px;
        padding: 8px 0;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f5;
    }

    .cv-inv-trow:last-child {
        border-bottom: none;
    }

    .cv-inv-trow .lbl {
        color: #6b7280;
        font-weight: 600;
        text-align: right;
    }

    .cv-inv-trow .val {
        font-weight: 800;
        color: var(--ink-900);
        text-align: right;
        min-width: 80px;
    }

    .cv-inv-trow input {
        width: 120px;
        text-align: right;
        border-radius: 6px;
        font-size: 12px;
        padding: 5px 10px;
    }

    .cv-inv-trow.total .lbl,
    .cv-inv-trow.total .val {
        font-size: 15px;
        color: var(--primary, #16a34a);
    }

    .cv-inv-notes {
        margin-top: 0;
        padding: 20px 24px;
        border-top: 1px solid #e5e7eb;
        background: #fafbfc;
        border-radius: 0 0 14px 14px;
        margin: 0 -28px -24px;
    }

    .cv-inv-notes label {
        font-size: 12px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 4px;
        display: block;
    }

    .cv-inv-notes textarea {
        min-height: 70px;
        resize: vertical;
        border-radius: 8px;
        font-size: 13px;
    }

    .cv-inv-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 14px 24px;
        border-top: 1px solid #e5e7eb;
        background: #f8f9fb;
    }

    .cv-inv-hint {
        font-size: 11.5px;
        color: #9ca3af;
    }

    @media (max-width: 700px) {
        .cv-inv-hint {
            display: none;
        }
    }

    /* Tags input (invoice modal) */
    .nl-tags-wrap {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border: 1px solid var(--border-soft, #dee2e6);
        border-radius: 10px;
        background: #fff;
        min-height: 42px;
        cursor: text;
        transition: border-color .15s;
    }

    .nl-tags-wrap:focus-within {
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(22, 163, 74, .12);
    }

    .nl-tags-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .nl-tag-chip {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: var(--primary-soft, #eafaf1);
        color: var(--primary-dark, #0f7a38);
        font-size: 12px;
        font-weight: 700;
        padding: 4px 8px 4px 10px;
        border-radius: 8px;
        line-height: 1.2;
    }

    .nl-tag-chip .nl-tag-x {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: none;
        background: rgba(0, 0, 0, .1);
        color: inherit;
        font-size: 10px;
        cursor: pointer;
        padding: 0;
        line-height: 1;
        transition: background .15s;
    }

    .nl-tag-chip .nl-tag-x:hover {
        background: rgba(220, 53, 69, .8);
        color: #fff;
    }

    .nl-tags-input {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: transparent !important;
        padding: 2px 0 !important;
        flex: 1 1 80px;
        min-width: 80px;
        font-size: 13px;
    }

    /* ZIP Invoices modal */
    .cv-zip-status {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    @media (max-width: 480px) {
        .cv-zip-status {
            grid-template-columns: 1fr;
        }
    }

    .cv-zip-radio {
        cursor: pointer;
        margin: 0;
    }

    .cv-zip-radio input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .cv-zip-pill {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 10px 14px;
        border: 1px solid var(--border-soft, #dee2e6);
        border-radius: 10px;
        background: #fff;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-700, #374151);
        transition: border-color .15s ease, background .15s ease, box-shadow .15s ease;
        user-select: none;
    }

    .cv-zip-pill i {
        font-size: 14px;
        color: var(--ink-500, #6b7280);
        transition: color .15s ease;
        flex: 0 0 auto;
    }

    .cv-zip-pill:hover {
        border-color: #cdebd8;
        background: #f6fbf8;
    }

    .cv-zip-radio input:checked+.cv-zip-pill {
        border-color: var(--primary, #16a34a);
        background: var(--primary-soft, #eafaf1);
        color: var(--primary-dark, #0f7a38);
        font-weight: 700;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, .1);
    }

    .cv-zip-radio input:checked+.cv-zip-pill i {
        color: var(--primary, #16a34a);
    }

    .cv-zip-radio input:focus-visible+.cv-zip-pill {
        outline: 2px solid var(--primary, #16a34a);
        outline-offset: 2px;
    }

    .cv-zip-note {
        margin-top: 14px;
        font-size: 11.5px;
        color: var(--ink-500, #6b7280);
        background: var(--primary-soft, #eafaf1);
        border: 1px solid #d9f2e4;
        border-radius: 8px;
        padding: 8px 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .cv-zip-note i {
        color: var(--primary, #16a34a);
        flex: 0 0 auto;
    }

    /* Add New Item modal fields */
    .cv-it-field {
        margin-bottom: 14px;
    }

    .cv-it-field label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #374151;
        margin-bottom: 4px;
    }

    .cv-it-field label .req {
        color: #dc2626;
        margin-right: 2px;
    }

    .cv-it-field .form-control,
    .cv-it-field .form-select {
        font-size: 13px;
        border-radius: 8px;
    }

    .cv-stmt-view {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        border: 1px solid #86efac;
        background: #f0fdf4;
        color: var(--primary, #16a34a);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        transition: .15s;
    }

    .cv-stmt-view:hover {
        background: var(--primary, #16a34a);
        border-color: var(--primary, #16a34a);
        color: #fff;
    }

    .cv-stmt-detail {
        border: 1px solid #d9f2e4;
        border-radius: 12px;
        background: #fff;
        margin-bottom: 20px;
        box-shadow: 0 1px 2px rgba(16, 24, 40, .04);
        overflow: hidden;
    }

    .cv-stmt-detail-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        background: var(--primary-soft, #eafaf1);
        border-bottom: 1px solid #d9f2e4;
    }

    .cv-stmt-detail-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 800;
        color: var(--primary-dark, #0f7a38);
    }

    .cv-stmt-detail-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px 18px;
        padding: 16px;
    }

    @media (max-width: 900px) {
        .cv-stmt-detail-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 520px) {
        .cv-stmt-detail-grid {
            grid-template-columns: 1fr;
        }
    }

    .cv-stmt-df .k {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: var(--ink-500);
        margin-bottom: 3px;
    }

    .cv-stmt-df .v {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-900);
        word-break: break-word;
    }

    .cv-stmt-df-full {
        grid-column: 1 / -1;
    }

    .cv-stmt-df-full .v {
        font-weight: 600;
        color: var(--ink-700);
        line-height: 1.6;
    }

    .cv-page .cv-pass-wrap {
        display: flex;
    }

    .cv-page .cv-pass-wrap .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        flex: 1 1 auto;
        min-width: 0;
    }

    .cv-page .cv-pass-btn {
        border: 1px solid var(--border-soft);
        border-left: 0;
        background: #fff;
        color: var(--ink-900);
        padding: 0 12px;
        cursor: pointer;
    }

    .cv-page .cv-pass-btn:last-child {
        border-radius: 0 8px 8px 0;
    }

    .cv-page .cv-pass-btn:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    .cv-page .cv-block-title {
        font-size: 13px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 6px;
    }

    .cv-page .cv-warn {
        margin: 0 0 12px;
        font-size: 12px;
        font-weight: 600;
        color: var(--accent-red, #e5484d);
    }

    .cv-page .cv-perm-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 5px 0;
    }

    .cv-page .cv-perm-label {
        flex: 0 0 105px;
        padding-right: 10px;
        border-right: 1px solid #eef0f3;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-700);
    }

    .cv-page .cv-notif-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        column-gap: 24px;
    }

    @media (max-width: 480px) {
        .cv-page .cv-notif-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
<main class="cv-page">
    <div class="cv-head">
        <div>
            <h1 class="font-display fw-bold mb-1 page-title">#46 GG COMPANY</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
                <i class="bi bi-people fs-6"></i><a href="customers.php" class="text-neutral text-decoration-none">Customers</a><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark" id="cvBreadcrumbTab">Profile</span>
            </nav>
        </div>
        <a href="customers.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back to customers</a>
    </div>

    <div class="cv-layout">
        <!-- Left sidebar -->
        <aside class="card-custom cv-side" aria-label="Customer sections">
            <div class="cv-side-group">
                <div class="cv-side-label">Overview</div>
                <a href="#profile" data-tab="profile" class="active" aria-current="page">
                    <i class="bi bi-person-circle"></i>Profile
                </a>
                <a href="#contacts" data-tab="contacts">
                    <i class="bi bi-person-fill"></i>Contacts
                    <span class="cv-badge">1</span>
                </a>
                <a href="#notes" data-tab="notes">
                    <i class="bi bi-journal-text"></i>Notes
                </a>
            </div>
            <div class="cv-side-group">
                <div class="cv-side-label">Sales</div>
                <a href="#proposals" data-tab="proposals">
                    <i class="bi bi-file-earmark"></i>Proposals
                </a>
                <a href="#estimates" data-tab="estimates">
                    <i class="bi bi-file-earmark"></i>Estimates
                </a>
                <a href="#appointments" data-tab="appointments">
                    <i class="bi bi-calendar3"></i>Appointments
                </a>
            </div>
            <div class="cv-side-group">
                <div class="cv-side-label">Finance</div>
                <a href="#invoices" data-tab="invoices">
                    <i class="bi bi-file-earmark-text"></i>Invoices
                </a>
                <a href="#payments" data-tab="payments">
                    <i class="bi bi-graph-up"></i>Payments
                </a>
                <a href="#statement" data-tab="statement">
                    <i class="bi bi-bar-chart-line"></i>Statement
                </a>
                <a href="#credit_notes" data-tab="credit_notes">
                    <i class="bi bi-file-earmark-minus"></i>Credit Notes
                </a>
                <a href="#purchase_orders" data-tab="purchase_orders">
                    <i class="bi bi-file-earmark-check"></i>Purchase Orders
                </a>
                <a href="#subscriptions" data-tab="subscriptions">
                    <i class="bi bi-arrow-repeat"></i>Subscriptions
                </a>
                <a href="#expenses" data-tab="expenses">
                    <i class="bi bi-receipt"></i>Expenses
                </a>
                <a href="#contracts" data-tab="contracts">
                    <i class="bi bi-file-earmark-ruled"></i>Contracts
                </a>
            </div>
            <div class="cv-side-group">
                <div class="cv-side-label">Work</div>
                <a href="#projects" data-tab="projects">
                    <i class="bi bi-diagram-3"></i>Projects
                </a>
                <a href="#tasks" data-tab="tasks">
                    <i class="bi bi-list-check"></i>Tasks
                </a>
            </div>
            <div class="cv-side-group">
                <div class="cv-side-label">Support</div>
                <a href="#tickets" data-tab="tickets">
                    <i class="bi bi-life-preserver"></i>Support Tickets
                    <span class="cv-badge">1</span>
                </a>
                <a href="#email_log" data-tab="email_log">
                    <i class="bi bi-envelope-fill"></i>Email Log
                    <span class="cv-badge">1</span>
                </a>
                <a href="#call_logs" data-tab="call_logs">
                    <i class="bi bi-telephone-fill"></i>Call Logs
                </a>
            </div>
            <div class="cv-side-group">
                <div class="cv-side-label">Other</div>
                <a href="#shipping" data-tab="shipping">
                    <i class="bi bi-truck"></i>View Shipping Address
                </a>
                <a href="#map" data-tab="map">
                    <i class="bi bi-geo-alt-fill"></i>Map
                </a>
                <a href="#files" data-tab="files">
                    <i class="bi bi-paperclip"></i>Files
                </a>
                <a href="#vault" data-tab="vault">
                    <i class="bi bi-lock-fill"></i>Vault
                </a>
                <a href="#reminders" data-tab="reminders">
                    <i class="bi bi-clock"></i>Reminders
                </a>
                <a href="#activity_log" data-tab="activity_log">
                    <i class="bi bi-card-list"></i>Activity Log
                </a>
            </div>
        </aside>

        <!-- Right content -->
        <section class="pt-2">
            <div class="cv-title">Profile</div>
            <!-- ==================== Tab: profile ==================== -->
            <div class="cv-tab-panel active" id="cvTab-profile">
                <div class="card-custom p-0 cv-profile" id="cvProfile">
                    <div class="cv-subtabs" aria-label="Profile sections">
                        <button type="button" class="cv-subtab active" data-sub="details">Customer Details</button>
                        <button type="button" class="cv-subtab" data-sub="billing">Billing &amp; Shipping</button>
                        <button type="button" class="cv-subtab" data-sub="admins">Customer Admins</button>
                        <button type="button" class="cv-subtab" data-sub="po">Purchase Order</button>
                    </div>
                    <!-- Customer Details -->
                    <div class="cv-pane 
Warning: Undefined variable $sub in C:\Users\User3\.gemini\antigravity-ide\brain\d70e105a-db8d-4996-a647-43d5ba833481\scratch\build_clean_customer_view.php(205) : eval()'d code on line 2
" data-pane="details">
                        <div class="cv-form">
                            <label class="cv-check mb-3"><input type="checkbox" class="form-check-input" id="dShowContact"> <span>Show primary contact full name on Invoices, Estimates, Payments, Credit Notes</span></label>

                            <div class="cv-field"><label class="form-label" for="dClientCode">Client code</label><input class="form-control" id="dClientCode"></div>
                            <div class="cv-field"><label class="form-label cv-required" for="dCompany">Company</label><input class="form-control" id="dCompany" value="GG COMPANY"><div class="cv-err" hidden>Company is required.</div></div>

                            <div class="cv-grid-2">
                                <div class="cv-field"><label class="form-label" for="dBalance">Balance</label><input class="form-control" id="dBalance" inputmode="decimal"></div>
                                <div class="cv-field"><label class="form-label" for="dBalanceDate">as of</label><div class="date-picker"><input type="text" class="date-input form-control" id="dBalanceDate" placeholder="dd-mm-yyyy" autocomplete="off"></div></div>
                            </div>

                            <div class="cv-field"><label class="form-label" for="dPhone">Phone</label><input class="form-control" id="dPhone" value="9677063368"></div>
                            <div class="cv-field"><label class="form-label" for="dWebsite">Website</label><input class="form-control" id="dWebsite"></div>

                            <div class="cv-field">
                                <label class="form-label" for="dGroups">Groups</label>
                                <div class="cv-with-btn">
                                    <select class="form-select cv-select" id="dGroups">
                                        <option value="">Non selected</option>
                                        <option >Anand Mehta</option>
                                        <option>VIP</option>
                                        <option>Retail</option>
                                    </select>
                                    <button type="button" class="btn cv-plus js-demo" title="Add group" aria-label="Add group"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>

                            <div class="cv-field"><label class="form-label" for="dCredit">Credit Days</label>
                                <select class="form-select cv-select" id="dCredit">
                                    <option >0</option><option selected>1</option><option >7</option><option >15</option><option >30</option><option >45</option><option >60</option>                                </select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dCurrency"><i class="bi bi-question-circle me-1"></i>Currency</label>
                                <select class="form-select cv-select" id="dCurrency">
                                    <option>System Default</option>
                                    <option>INR (₹)</option>
                                    <option>USD ($)</option>
                                    <option>EUR (€)</option>
                                </select>
                            </div>

                            <hr class="cv-divider">

                            <div class="cv-field"><label class="form-label" for="dAddress">Address</label><textarea class="form-control" id="dAddress" rows="3">1/2 VOC STREET MENABADU AMBATTUR CHENNAI</textarea></div>
                            <div class="cv-field"><label class="form-label" for="dCountry">Country</label>
                                <select class="form-select cv-select" id="dCountry"><option selected>India</option><option >United States</option><option >United Kingdom</option><option >United Arab Emirates</option></select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dState">State</label>
                                <select class="form-select cv-select" id="dState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dStateCode">State Code</label><input class="form-control" id="dStateCode"></div>
                            <div class="cv-field"><label class="form-label" for="dCity">City</label>
                                <select class="form-select cv-select" id="dCity"><option value="">Nothing selected</option><option selected>Chennai</option><option >Coimbatore</option><option >Madurai</option><option >Bengaluru</option><option >Kochi</option></select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dZip">Zip Code</label><input class="form-control" id="dZip" value="600006"></div>
                            <div class="cv-field"><label class="form-label" for="dPan">PAN No</label><input class="form-control" id="dPan" maxlength="10"></div>
                            <div class="cv-field"><label class="form-label" for="dGst">GST Number</label><input class="form-control" id="dGst" maxlength="15"></div>
                            <div class="cv-field"><label class="form-label" for="dIndustry">Industry Type</label><textarea class="form-control" id="dIndustry" rows="3"></textarea></div>

                            <div class="cv-grid-2">
                                <div class="cv-field mb-0"><label class="form-label" for="dOpening">Opening Balance</label><input class="form-control" id="dOpening" placeholder="0.000" inputmode="decimal"></div>
                                <div class="cv-field mb-0"><label class="form-label" for="dOpeningDate">As Of</label><div class="date-picker"><input type="text" class="date-input form-control" id="dOpeningDate" placeholder="dd-mm-yyyy" autocomplete="off"></div></div>
                            </div>

                            <div class="cv-field mb-0">
                                <label class="form-label cv-required" for="cProfession">Profession</label>
                                <select class="form-select cv-select" id="cProfession">
                                    <option value="">Select profession</option>
                                    <option selected>Builders</option><option >Contractors</option><option >Event Management</option><option >Manufacturing</option><option >Retail</option>                                </select>
                                <div class="cv-err" hidden>Profession is required.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Billing & Shipping -->
                    <div class="cv-pane active" data-pane="billing">
                        <div class="cv-grid-2 cv-bill-grid">
                            <div>
                                <div class="cv-addr-head"><span>Billing Address</span><button type="button" class="cv-textlink" id="cvSameAsInfo">Same as Customer Info</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="bStreet">Street</label><textarea class="form-control" id="bStreet" rows="4">1/2 VOC STREET MENABADU AMBATTUR CHENNAI</textarea></div>
                                <div class="cv-field"><label class="form-label" for="bCountry">Country</label>
                                    <select class="form-select cv-select" id="bCountry"><option value="">Non selected</option><option selected>India</option><option >United States</option><option >United Kingdom</option><option >United Arab Emirates</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bState">State</label>
                                    <select class="form-select cv-select" id="bState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bCity">City</label>
                                    <select class="form-select cv-select" id="bCity"><option value="">Nothing selected</option><option selected>Chennai</option><option >Coimbatore</option><option >Madurai</option><option >Bengaluru</option><option >Kochi</option></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="bZip">Zip Code</label><input class="form-control" id="bZip" value="600006"></div>
                            </div>
                            <div>
                                <div class="cv-addr-head"><span><i class="bi bi-question-circle me-1"></i>Shipping Address</span><button type="button" class="cv-textlink" id="cvCopyBilling">Copy Billing Address</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="sStreet">Street</label><textarea class="form-control" id="sStreet" rows="4"></textarea></div>
                                <div class="cv-field"><label class="form-label" for="sCountry">Country</label>
                                    <select class="form-select cv-select" id="sCountry"><option value="">Non selected</option><option>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sState">State</label>
                                    <select class="form-select cv-select" id="sState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sCity">City</label>
                                    <select class="form-select cv-select" id="sCity"><option value="">Nothing selected</option><option>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="sZip">Zip Code</label><input class="form-control" id="sZip"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Admins -->
                    <div class="cv-pane" data-pane="admins" style="display: none;">
                        <button type="button" class="btn btn-primary mb-3" id="cvAssignAdminBtn" data-bs-toggle="modal" data-bs-target="#cvAssignModal">Assign Admin</button>
                        <div class="card-custom p-0" id="adminsCard">
                            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                <table class="table-modern w-100 datatable mb-0" id="adminsTable">
                                    <thead>
                                        <tr>
                                            <th>Staff Member</th>
                                            <th>Date Assigned</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span class="fw-semibold">Karthik R</span></span></td>
                                            <td>16-09-2026 12:00</td>
                                            <td><button type="button" class="btn btn-sm btn-outline-danger p-1 py-0" title="Remove"><i class="bi bi-trash"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Purchase Order -->
                    <div class="cv-pane" data-pane="po" style="display: none;">
                        <div class="card-custom p-0" id="profilePoCard">
                            <div class="table-responsive table-modern-wrap overflow-auto column-border">
                                <table class="table-modern w-100 datatable mb-0" id="profilePoTable">
                                    <thead>
                                        <tr>
                                            <th>Purchase order</th>
                                            <th>PO Value</th>
                                            <th>Tax Value</th>
                                            <th>PO Value Including Tax</th>
                                            <th>Order date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#" class="cv-link">PO-0011</a></td>
                                            <td>₹ 27,000</td>
                                            <td>₹ 1,350</td>
                                            <td>₹ 28,350</td>
                                            <td>06-09-2026</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#" class="cv-link">PO-0009</a></td>
                                            <td>₹ 45,500</td>
                                            <td>₹ 2,275</td>
                                            <td>₹ 47,775</td>
                                            <td>28-08-2026</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="cv-form-foot" id="cvFormFoot"><button type="button" class="btn btn-primary" id="cvSubmit">Submit</button></div>
                </div>
            </div><!-- End Tab: profile -->
            <!-- ==================== Tab: contacts ==================== -->
            <div class="cv-tab-panel" id="cvTab-contacts" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="contacts">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewContactBtn"><i class="bi bi-plus-lg me-1"></i>New Contact</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="contactsTable">
                            <thead>
                                <tr><th>Full Name</th><th>Email</th><th>Role Position</th><th>Phone</th><th>Active</th><th>Last Login</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link">MOHAN S</a></span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="mailto:kaviyarasu@ghratechnology.com" class="cv-link">kaviyarasu@ghratechnology.com</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Event Management                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="tel:9677063368" class="cv-link">9677063368</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <label class="cust-switch"><input type="checkbox" checked aria-label="Active"><span class="slider"></span></label>
                                                                                            </td>
                                                                                    <td>
                                                                                                    —                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: contacts -->

            <!-- ==================== Tab: notes ==================== -->
            <div class="cv-tab-panel" id="cvTab-notes" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="notes">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewNoteBtn"><i class="bi bi-plus-lg me-1"></i>New Note</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="notesTable">
                            <thead>
                                <tr><th>Description</th><th>Added By</th><th>Date Added</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Requested revised quotation for event setup.                                                                                            </td>
                                                                                    <td>
                                                                                                    Admin                                                                                            </td>
                                                                                    <td>
                                                                                                    14-09-2026 10:12                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Follow-up call scheduled for next week.                                                                                            </td>
                                                                                    <td>
                                                                                                    Sales Team                                                                                            </td>
                                                                                    <td>
                                                                                                    10-09-2026 16:40                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: notes -->

            <!-- ==================== Tab: proposals ==================== -->
            <div class="cv-tab-panel" id="cvTab-proposals" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="proposals">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewProposalBtn"><i class="bi bi-plus-lg me-1"></i>New Proposal</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="proposalsTable">
                            <thead>
                                <tr><th>Proposal #</th><th>Subject</th><th>Total</th><th>Open Till</th><th>Status</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    PRO-0007                                                                                            </td>
                                                                                    <td>
                                                                                                    Corporate event management                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 1,20,000                                                                                            </td>
                                                                                    <td>
                                                                                                    30-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Sent</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    PRO-0004                                                                                            </td>
                                                                                    <td>
                                                                                                    Annual maintenance                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 60,000                                                                                            </td>
                                                                                    <td>
                                                                                                    01-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Accepted</span>                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: proposals -->

            <!-- ==================== Tab: estimates ==================== -->
            <div class="cv-tab-panel" id="cvTab-estimates" style="display: none;">
                <!-- Estimates — title + buttons + year select + KPI cards + table flow -->
                <style>
                    .cv-est-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-est-title { font-size: 16px; font-weight: 800; color: var(--ink-900); margin: 0; }
                    .cv-est-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
                    .cv-est-year { max-width: 130px; margin-bottom: 14px; font-size: 13px; font-weight: 600; border-radius: 10px; }
                    .cv-est-kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); gap: 10px; margin-bottom: 16px; }
                    .cv-est-kpi { border: 1px solid #eef0f3; border-radius: 10px; padding: 12px 16px; background: #fff; transition: transform .15s ease, box-shadow .15s ease; }
                    .cv-est-kpi:hover { transform: translateY(-2px); box-shadow: 0 8px 18px rgba(16, 24, 40, .07); }
                    .cv-est-kpi .k { font-size: 12.5px; font-weight: 700; margin-bottom: 4px; }
                    .cv-est-kpi .v { font-size: 15.5px; font-weight: 800; }
                    .cv-est-kpi.c-green .k, .cv-est-kpi.c-green .v { color: var(--primary-dark, #0f7a38); }
                    .cv-est-kpi.c-amber .k, .cv-est-kpi.c-amber .v { color: #d97706; }
                    .cv-est-kpi.c-red .k, .cv-est-kpi.c-red .v { color: #dc2626; }
                    #cvNewEstimateModal.modal { z-index: 1055; }
                    #cvNewEstimateModal .modal-content { border: none; border-radius: 0; display: flex; flex-direction: column; height: 100%; }
                    #cvNewEstimateModal .modal-body { flex: 1 1 auto; min-height: 0; overflow-y: auto; }
                    #cvEstZipModal.modal { z-index: 1075; }
                    #cvEstAddItemModal.modal { z-index: 1085; }
                    .cv-est-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 40px; }
                    @media (max-width: 900px) { .cv-est-grid { grid-template-columns: 1fr; } }
                    .cv-est-field { margin-bottom: 14px; }
                    .cv-est-field label { display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 4px; }
                    .cv-est-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-est-field .form-control, .cv-est-field .form-select { font-size: 13px; border-radius: 8px; }
                    .cv-est-addr-row { display: flex; gap: 14px; }
                    .cv-est-addr-row>.cv-est-field, .cv-est-addr-row>div { flex: 1; min-width: 0; }
                    .cv-est-num-wrap { display: flex; align-items: stretch; }
                    .cv-est-num-wrap .cv-est-prefix { display: flex; align-items: center; padding: 0 12px; background: #f8f9fa; border: 1px solid #dee2e6; border-right: 0; border-radius: 8px 0 0 8px; font-size: 13px; font-weight: 700; color: var(--ink-500); }
                    .cv-est-num-wrap .form-control { border-radius: 0 8px 8px 0; flex: 1; min-width: 0; }
                    .cv-est-adv { color: #dc2626; font-weight: 700; }
                </style>

                <div class="cv-est-head mt-3 ms-3">
                    <div class="cv-est-actions w-100">
                        <select class="form-select form-select-sm cv-est-year bg-white mb-0" aria-label="Year">
                            <option selected>2026</option>
                            <option>2025</option>
                            <option>2024</option>
                        </select>
                        <button type="button" class="btn btn-primary" id="cvEstNewBtn"><i class="bi bi-plus-lg me-1"></i>Create New Estimate</button>
                        <button type="button" class="btn btn-primary" id="cvEstZipBtn"><i class="bi bi-file-zip me-1"></i>Zip Estimates</button>
                    </div>
                </div>


                <!-- Status summary KPI cards (blue → primary) -->
                <div class="cv-est-kpis ms-3">
                    <div class="cv-est-kpi c-green"><div class="k">Draft</div><div class="v">₹ 22,000</div></div>
                    <div class="cv-est-kpi c-green"><div class="k">Sent</div><div class="v">₹ 38,000</div></div>
                    <div class="cv-est-kpi c-amber"><div class="k">Expired</div><div class="v">₹ 0.00</div></div>
                    <div class="cv-est-kpi c-red"><div class="k">Declined</div><div class="v">₹ 15,000</div></div>
                    <div class="cv-est-kpi c-green"><div class="k">Accepted</div><div class="v">₹ 0.00</div></div>
                </div>

                <!-- Estimates table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="estimates">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="estimatesTable">
                            <thead>
                                <tr><th>Estimate #</th><th>Amount</th><th>Total Tax</th><th>Project</th><th>Tags</th><th>Date</th><th>Expiry Date</th><th>Reference #</th><th>Status</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">EST-000021</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 38,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 0                                                                                            </td>
                                                                                    <td>
                                                                                                    Solar Installation                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">Hot</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    03-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    17-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">REF-021</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Sent</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">EST-000018</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 15,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 0                                                                                            </td>
                                                                                    <td>
                                                                                                    AMC Renewal                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">Warm</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    20-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    03-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">REF-018</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Declined</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">EST-000014</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 22,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 0                                                                                            </td>
                                                                                    <td>
                                                                                                    Event Management                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">Hot</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    10-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    24-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">REF-014</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Draft</span>                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Create New Estimate modal — fullscreen (image 2 fields) -->
                <div class="modal fade" id="cvNewEstimateModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content cv-inv-modal">
                            <div class="cv-contact-head">
                                <div class="cv-contact-head-l">
                                    <div class="cv-contact-ava"><i class="bi bi-file-earmark"></i></div>
                                    <div style="min-width:0;">
                                        <h3 class="mb-0">Create New Estimate</h3>
                                        <div class="cv-contact-sub">GG COMPANY · New estimate</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body cv-inv-body">
                                <div class="cv-est-grid">
                                    <!-- Left column -->
                                    <div>
                                        <div class="cv-est-field"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                                        <div class="cv-est-addr-row">
                                            <div>
                                                <label class="cv-inv-mini-label"><i class="bi bi-pencil-square"></i> Bill To</label>
                                                <div class="cv-inv-addr-text">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100<br>Chennai, Tamil Nadu<br>IN, 600100</div>
                                            </div>
                                            <div>
                                                <label class="cv-inv-mini-label">Ship to</label>
                                                <div class="cv-inv-addr-text" style="color:#9ca3af;">---, ---<br>---, ---</div>
                                            </div>
                                        </div>
                                        <div class="cv-est-field">
                                            <label><span class="req">*</span>Estimate Number <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                                            <div class="cv-est-num-wrap"><span class="cv-est-prefix">EST-</span><input type="text" class="form-control" value="059"></div>
                                        </div>
                                        <div class="cv-est-addr-row">
                                            <div class="cv-est-field"><label><span class="req">*</span>Estimate Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                                            <div class="cv-est-field"><label>Expiry Date</label><input type="date" class="form-control" value="2026-09-30"></div>
                                        </div>
                                        <div class="cv-est-addr-row">
                                            <div class="cv-est-field"><label>Advance Payment</label><select class="form-select">
                                                    <option selected>Select Advance Payment</option>
                                                    <option>25% Advance</option>
                                                    <option>50% Advance</option>
                                                    <option>Full Advance</option>
                                                </select></div>
                                            <div class="cv-est-field"><label>Bank Accounts</label><select class="form-select">
                                                    <option selected>Select Banking</option>
                                                    <option>HDFC Bank - 50100234567890</option>
                                                    <option>ICICI Bank - 602305123456</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <!-- Right column -->
                                    <div>
                                        <div class="cv-est-field">
                                            <label><i class="bi bi-tag me-1"></i>Tags</label>
                                            <div class="nl-tags-wrap" style="max-width:100%;">
                                                <div class="nl-tags-chips"></div>
                                                <input type="text" class="nl-tags-input" placeholder="Tag">
                                            </div>
                                        </div>
                                        <div class="cv-est-addr-row">
                                            <div class="cv-est-field"><label><span class="req">*</span>Currency</label><select class="form-select"><option selected>INR ₹</option><option>USD $</option></select></div>
                                            <div class="cv-est-field"><label>Status</label><select class="form-select">
                                                    <option selected>Draft</option>
                                                    <option>Sent</option>
                                                    <option>Expired</option>
                                                    <option>Declined</option>
                                                    <option>Accepted</option>
                                                </select></div>
                                        </div>
                                        <div class="cv-est-field"><label>Reference #</label><input type="text" class="form-control"></div>
                                        <div class="cv-est-field"><label>Purchase order</label><select class="form-select">
                                                <option selected>Non selected</option>
                                                <option>PO-0011 — Event setup</option>
                                                <option>PO-0014 — AMC renewal</option>
                                            </select></div>
                                        <div class="cv-est-addr-row">
                                            <div class="cv-est-field"><label>Sale Agent</label><select class="form-select">
                                                    <option selected>gharuda SOFTWARE</option>
                                                    <option>Karthik R</option>
                                                    <option>Divya M</option>
                                                </select></div>
                                            <div class="cv-est-field"><label>Discount type</label><select class="form-select">
                                                    <option selected>No discount</option>
                                                    <option>Before Tax</option>
                                                    <option>After Tax</option>
                                                </select></div>
                                        </div>
                                        <div class="cv-est-field"><label>Admin Note</label><textarea class="form-control" rows="4"></textarea></div>
                                    </div>
                                </div>

                                <!-- Items section -->
                                <div class="cv-inv-items" style="margin-top:20px;border-top:1px solid #e5e7eb;padding-top:20px;">
                                    <div class="cv-inv-items-toolbar">
                                        <div class="d-flex align-items-center gap-2">
                                            <select class="form-select cv-inv-add-item">
                                                <option value="">Add Item</option>
                                                <option>HRMS Subscription</option>
                                                <option>Solar Panel — 450W</option>
                                                <option>Installation Service</option>
                                                <option>AMC Charges</option>
                                            </select>
                                            <button type="button" class="btn btn-primary cv-inv-item-btn" id="cvEstAddItem" title="Add item"><i class="bi bi-plus-lg"></i></button>
                                        </div>
                                        <div class="cv-inv-qty-radio">
                                            <span>Show quantity as:</span>
                                            <label><input type="radio" name="cvEstQty" checked> Qty</label>
                                            <label><input type="radio" name="cvEstQty"> Hours</label>
                                            <label><input type="radio" name="cvEstQty"> Qty/Hours</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="cv-inv-item-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:30px;"><i class="bi bi-info-circle"></i></th>
                                                    <th>Item</th>
                                                    <th style="width:190px;">Description</th>
                                                    <th style="width:80px;">Qty</th>
                                                    <th style="width:110px;">Rate</th>
                                                    <th style="width:100px;">Discount %</th>
                                                    <th style="width:110px;">Tax</th>
                                                    <th style="width:110px;">Amount</th>
                                                    <th style="width:40px;"><i class="bi bi-gear"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody id="cvEstItemBody">
                                                <tr>
                                                    <td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>
                                                    <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                                                    <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                                                    <td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>
                                                    <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                                    <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                                    <td><select class="form-select">
                                                            <option selected>No Tax</option>
                                                            <option>GST 5%</option>
                                                            <option>GST 12%</option>
                                                            <option>GST 18%</option>
                                                        </select></td>
                                                    <td><span class="cv-inv-amt">₹ 0.00</span></td>
                                                    <td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Totals -->
                                    <div class="cv-inv-totals">
                                        <div class="cv-inv-totals-box">
                                            <div class="cv-inv-trow" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Transport Amount</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl cv-est-adv">Advance Received</span><span class="val cv-est-adv">0</span></div>
                                            <div class="cv-inv-trow total" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="cv-inv-notes" style="margin-top:20px;border-top:1px solid #e5e7eb;padding-top:20px;">
                                    <div class="mb-0"><label>Client Note</label><textarea class="form-control"></textarea></div>
                                </div>
                            </div>
                            <div class="cv-inv-footer">
                                <span class="cv-inv-hint" style="font-size:11.5px;color:#9ca3af;">Include estimate items with merge field anywhere in estimate content as {estimate_items}</span>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Save &amp; Send</button>
                                    <button type="button" class="btn btn-primary" id="cvEstSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Item modal (image fields — invoice cvAddItemModal madhiri) -->
                <div class="modal fade" id="cvEstAddItemModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvEstAddItemTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvEstAddItemTitle" style="font-size:15.5px;font-weight:800;">Add New Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="estItDesc"></div>
                                <div class="cv-it-field"><label>Long Description</label><textarea class="form-control" id="estItLongDesc" rows="3"></textarea></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="estItRateInr" step="0.01"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>HSN Code</label><input type="text" class="form-control" id="estItHsn"></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Rate - USD</label><input type="number" class="form-control" id="estItRateUsd" step="0.01"></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 1</label><select class="form-select" id="estItTax1">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 2</label><select class="form-select" id="estItTax2" disabled>
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Unit</label><input type="text" class="form-control" id="estItUnit" placeholder="Unit"></div>
                                <div class="cv-it-field mb-0"><label>Item Group</label><select class="form-select" id="estItGroup">
                                        <option value="">Non selected</option>
                                        <option>Services</option>
                                        <option>Products</option>
                                        <option>Subscription</option>
                                    </select></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvEstItemSave">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ZIP Estimates modal (image 3 — existing zip modal design) -->
                <div class="modal fade" id="cvEstZipModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvEstZipTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                                    <h5 class="modal-title" id="cvEstZipTitle" style="font-size:15.5px;font-weight:800;">ZIP Estimates</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field">
                                    <label>Status</label>
                                    <div class="cv-zip-status">
                                        <label class="cv-zip-radio"><input type="radio" name="cvEstZipStatus" value="All" checked><span class="cv-zip-pill"><i class="bi bi-circle-half"></i>All</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvEstZipStatus" value="Draft"><span class="cv-zip-pill"><i class="bi bi-pencil"></i>Draft</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvEstZipStatus" value="Sent"><span class="cv-zip-pill"><i class="bi bi-send"></i>Sent</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvEstZipStatus" value="Expired"><span class="cv-zip-pill"><i class="bi bi-clock-history"></i>Expired</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvEstZipStatus" value="Declined"><span class="cv-zip-pill"><i class="bi bi-x-circle"></i>Declined</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvEstZipStatus" value="Accepted"><span class="cv-zip-pill"><i class="bi bi-check-circle"></i>Accepted</span></label>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>From Date:</label><input type="date" class="form-control" id="cvEstZipFrom"></div>
                                <div class="cv-it-field mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvEstZipTo"></div>
                                <div class="cv-zip-note"><i class="bi bi-info-circle me-1"></i>Estimates matching the selected status and date range will be bundled into a single ZIP file.</div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvEstZipSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        /* Create New Estimate -> fullscreen modal */
                        var estNewBtn = document.getElementById('cvEstNewBtn'),
                            estModal = document.getElementById('cvNewEstimateModal');
                        if (estNewBtn && estModal) {
                            estNewBtn.addEventListener('click', function() {
                                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(estModal).show();
                            });
                        }

                        /* Items: add row + amount calc + confirm (lock) / delete — invoice modal madhiri */
                        var estAdd = document.getElementById('cvEstAddItem'),
                            estBody = document.getElementById('cvEstItemBody');

                        function estBlankRow() {
                            var tr = document.createElement('tr');
                            tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                                '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                                '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                                '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>' +
                                '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                                '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
                                '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                            return tr;
                        }

                        /* Toolbar ➕ -> open Add New Item modal (invoice flow madhiri) */
                        var estItemModal = document.getElementById('cvEstAddItemModal');
                        if (estAdd && estItemModal && window.bootstrap) {
                            estAdd.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(estItemModal).show();
                            });
                        }

                        /* Stacked modal backdrop z-index fix (estimate + item modal) */
                        ['#cvNewEstimateModal', '#cvEstAddItemModal'].forEach(function(id) {
                            var el = document.querySelector(id);
                            if (!el) return;
                            el.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        });

                        /* Add New Item submit -> validate + fill blank row in estimate items */
                        var estItemSave = document.getElementById('cvEstItemSave');
                        if (estItemSave && estItemModal && estBody) {
                            estItemSave.addEventListener('click', function() {
                                var desc = document.getElementById('estItDesc').value.trim(),
                                    rate = document.getElementById('estItRateInr').value.trim();
                                if (!desc || !rate) {
                                    toast('Description and Rate - INR are required');
                                    return;
                                }
                                var tr = estBody.querySelector('tr:not(.cv-inv-row-locked)'),
                                    madeNew = false;
                                if (!tr) {
                                    tr = estBlankRow();
                                    madeNew = true;
                                }
                                var tax = document.getElementById('estItTax1').value,
                                    longDesc = document.getElementById('estItLongDesc').value.trim(),
                                    unit = document.getElementById('estItUnit').value.trim();
                                tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                                    '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                                    '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                                    '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (unit || 'Unit') + '</div></td>' +
                                    '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
                                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                    '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
                                    '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
                                    '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                                tr.querySelector('textarea').value = desc;
                                tr.cells[2].querySelector('textarea').value = longDesc;
                                if (madeNew) estBody.appendChild(tr);

                                // reset form + close
                                ['estItDesc', 'estItLongDesc', 'estItRateInr', 'estItHsn', 'estItRateUsd', 'estItUnit'].forEach(function(id) {
                                    document.getElementById(id).value = '';
                                });
                                document.getElementById('estItTax1').value = 'No Tax';
                                document.getElementById('estItTax2').value = 'No Tax';
                                document.getElementById('estItGroup').value = '';
                                bootstrap.Modal.getOrCreateInstance(estItemModal).hide();
                                toast('Item "' + desc + '" added to estimate');
                            });
                        }

                        document.addEventListener('input', function(e) {
                            var t = e.target;
                            if (!t.closest || !t.closest('#cvEstItemBody')) return;
                            var row = t.closest('tr');
                            if (!row || row.classList.contains('cv-inv-row-locked')) return;
                            var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
                                rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
                            row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
                        });

                        if (estBody) {
                            estBody.addEventListener('click', function(e) {
                                var check = e.target.closest('.cv-inv-check'),
                                    del = e.target.closest('.cv-inv-row-del'),
                                    row;
                                if (del) {
                                    row = del.closest('tr');
                                    if (row) row.remove();
                                    if (estBody && !estBody.querySelector('tr')) estBody.appendChild(estBlankRow());
                                    return;
                                }
                                if (!check) return;
                                row = check.closest('tr');
                                if (!row || row.classList.contains('cv-inv-row-locked')) return;
                                row.classList.add('cv-inv-row-locked');
                                row.querySelectorAll('input, select, textarea').forEach(function(el) {
                                    el.setAttribute('readonly', 'readonly');
                                    el.setAttribute('disabled', 'disabled');
                                });
                                check.className = 'cv-inv-row-del';
                                check.title = 'Delete item';
                                check.innerHTML = '<i class="bi bi-trash"></i>';
                                if (estAdd) estBody.appendChild(estBlankRow());
                            });
                        }

                        /* Submit -> success toast */
                        var estSubmit = document.getElementById('cvEstSubmit');
                        if (estSubmit && estModal) {
                            estSubmit.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(estModal).hide();
                                toast('Estimate EST-059 created successfully');
                            });
                        }

                        /* Zip Estimates -> modal */
                        var estZipBtn = document.getElementById('cvEstZipBtn'),
                            estZipModal = document.getElementById('cvEstZipModal');
                        if (estZipBtn && estZipModal) {
                            estZipBtn.addEventListener('click', function() {
                                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(estZipModal).show();
                            });
                        }

                        /* Zip submit -> validate date range + toast */
                        var estZipSubmit = document.getElementById('cvEstZipSubmit');
                        if (estZipSubmit && estZipModal) {
                            estZipSubmit.addEventListener('click', function() {
                                var from = document.getElementById('cvEstZipFrom').value,
                                    to = document.getElementById('cvEstZipTo').value;
                                if (from && to && from > to) {
                                    toast('From Date cannot be after To Date');
                                    return;
                                }
                                var statusEl = document.querySelector('input[name="cvEstZipStatus"]:checked'),
                                    status = statusEl ? statusEl.value : 'All';
                                bootstrap.Modal.getOrCreateInstance(estZipModal).hide();
                                var msg = 'Preparing ZIP of ' + status.toLowerCase() + ' estimates';
                                if (from && to) msg += ' from ' + from + ' to ' + to;
                                toast(msg + '...');
                            });
                        }
                    });
            </div><!-- End Tab: estimates -->

            <!-- ==================== Tab: appointments ==================== -->
            <div class="cv-tab-panel" id="cvTab-appointments" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="appointments">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewApptBtn" data-bs-toggle="modal" data-bs-target="#apmContactModal"><i class="bi bi-plus-lg me-1"></i>New Appointment</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="appointmentsTable">
                            <thead>
                                <tr><th>Subject</th><th>Date</th><th>Time</th><th>Assigned To</th><th>Status</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Site visit                                                                                            </td>
                                                                                    <td>
                                                                                                    22-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    11:00 AM                                                                                            </td>
                                                                                    <td>
                                                                                                    Karthik R                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Pending</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Requirement discussion                                                                                            </td>
                                                                                    <td>
                                                                                                    05-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    03:30 PM                                                                                            </td>
                                                                                    <td>
                                                                                                    Divya M                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Completed</span>                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: appointments -->

            <!-- ==================== Tab: invoices ==================== -->
            <div class="cv-tab-panel" id="cvTab-invoices" style="display: none;">
                <!-- Invoices — KPI cards + table flow -->
                <div class="cv-inv-actions mt-3 ms-3">
                    <button type="button" class="btn btn-primary" id="cvNewInvoiceBtn"><i class="bi bi-plus-lg me-1"></i>Create New Invoice</button>
                    <button type="button" class="btn btn-outline-primary" id="cvZipInvoicesBtn"><i class="bi bi-file-zip me-1"></i>Zip Invoices</button>
                </div>

                <div class="card-custom p-3 mb-0 py-0">
                    <select class="form-select form-select-sm cv-inv-year" aria-label="Year">
                        <option selected>2026</option>
                        <option>2025</option>
                        <option>2024</option>
                    </select>
                    <div class="cv-inv-kpis">
                        <div class="cv-inv-kpi k-blue"><div class="k">Opening Balance</div><div class="v">₹ 0.00</div></div>
                        <div class="cv-inv-kpi k-amber"><div class="k">Invoices Outstanding</div><div class="v">₹ 45,000</div></div>
                        <div class="cv-inv-kpi k-red"><div class="k">Total Outstanding</div><div class="v">₹ 53,000</div></div>
                        <div class="cv-inv-kpi k-red"><div class="k">Past Due Invoices</div><div class="v">₹ 8,000</div></div>
                        <div class="cv-inv-kpi k-green"><div class="k">Paid Invoices</div><div class="v">₹ 12,500</div></div>
                    </div>
                </div>

                <div class="card-custom js-report-table p-0" data-export-name="invoices">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="invoicesTable">
                            <thead>
                                <tr><th>Invoice #</th><th>Amount</th><th>Total Tax</th><th>Date</th><th>Sales Agent</th><th>Project</th><th>Tags</th><th>Due Date</th><th>Status</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                        <td><a href="#" class="cv-link">INV-000112</a></td>
                                        <td>₹ 45,000</td>
                                        <td>₹ 0</td>
                                        <td>01-09-2026</td>
                                        <td>Karthik R</td>
                                        <td>Solar Installation</td>
                                        <td><span class="cv-tag-chip">Hot</span></td>
                                        <td>15-09-2026</td>
                                        <td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Partially Paid</span></td>
                                    </tr>
                                                                    <tr class="cv-row">
                                        <td><a href="#" class="cv-link">INV-000098</a></td>
                                        <td>₹ 12,500</td>
                                        <td>₹ 0</td>
                                        <td>10-08-2026</td>
                                        <td>Divya M</td>
                                        <td>AMC Renewal</td>
                                        <td><span class="cv-tag-chip">Warm</span></td>
                                        <td>24-08-2026</td>
                                        <td><span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Paid</span></td>
                                    </tr>
                                                                    <tr class="cv-row">
                                        <td><a href="#" class="cv-link">INV-000087</a></td>
                                        <td>₹ 8,000</td>
                                        <td>₹ 0</td>
                                        <td>02-08-2026</td>
                                        <td>Karthik R</td>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>16-08-2026</td>
                                        <td><span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Overdue</span></td>
                                    </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Create New Invoice modal -->
                <div class="modal fade" id="cvNewInvoiceModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content cv-inv-modal">
                            <div class="cv-contact-head">
                                <div class="cv-contact-head-l">
                                    <div class="cv-contact-ava"><i class="bi bi-receipt-cutoff"></i></div>
                                    <div style="min-width:0;">
                                        <h3 class="mb-0">Create New Invoice</h3>
                                        <div class="cv-contact-sub">GG COMPANY · New invoice</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body cv-inv-body">
                                <div class="cv-inv-grid">
                                    <!-- Left column -->
                                    <div>
                                        <div class="cv-inv-field"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                                        <div class="cv-inv-field"><label>Sales Order</label><select class="form-select">
                                                <option value="">Non selected</option>
                                                <option>SO-0003 — Solar Installation</option>
                                                <option>SO-0007 — AMC Renewal</option>
                                            </select></div>
                                        <div class="cv-inv-addr-row">
                                            <div>
                                                <label class="cv-inv-mini-label"><i class="bi bi-pencil-square"></i> Bill to</label>
                                                <div class="cv-inv-addr-text">1/2 VOC STREET MENABADU AMBATTUR CHENNAI<br>Chennai, ---<br>IN, 006</div>
                                            </div>
                                            <div>
                                                <label class="cv-inv-mini-label">Ship to</label>
                                                <select class="form-select">
                                                    <option selected>Select Shipping Address</option>
                                                    <option>GG COMPANY - Anna Nagar</option>
                                                    <option>GG COMPANY - T. Nagar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cv-inv-field"><label>Credit Days</label><select class="form-select">
                                                <option >0</option><option selected>1</option><option >7</option><option >15</option><option >30</option><option >45</option><option >60</option>                                            </select></div>
                                        <div class="cv-inv-field">
                                            <label><span class="req">*</span>Invoice Number <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                                            <div class="cv-inv-num-wrap"><span class="cv-inv-prefix">INV-</span><input type="text" class="form-control" value="258"></div>
                                        </div>
                                        <div class="cv-inv-addr-row">
                                            <div class="cv-inv-field"><label><span class="req">*</span>Invoice Date</label><input type="date" class="form-control" value="2026-09-22"></div>
                                            <div class="cv-inv-field"><label>Due Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                                        </div>
                                        <div class="cv-inv-addr-row">
                                            <div class="cv-inv-field"><label>Customer PO No.</label><input type="text" class="form-control"></div>
                                            <div class="cv-inv-field"><label>Vehicle Number</label><input type="text" class="form-control"></div>
                                        </div>
                                        <label class="cv-check" style="font-size:12.5px;"><input type="checkbox" class="form-check-input"> <span>Prevent sending overdue reminders for this invoice</span></label>
                                    </div>
                                    <!-- Right column -->
                                    <div>
                                        <div class="cv-inv-field">
                                            <label><i class="bi bi-tag me-1"></i>Tags</label>
                                            <div class="nl-tags-wrap" style="max-width:100%;">
                                                <div class="nl-tags-chips"></div>
                                                <input type="text" class="nl-tags-input" placeholder="Tag">
                                            </div>
                                        </div>
                                        <div class="cv-inv-field"><label>Allowed payment modes for this invoice</label><select class="form-select">
                                                <option>Bank, Rave, Instamojo, Paypal Smart Checkout, PayPal, PayU Money, Stripe Checkout</option>
                                            </select></div>
                                        <div class="cv-inv-addr-row">
                                            <div class="cv-inv-field"><label><span class="req">*</span>Currency</label><input type="text" class="form-control" value="INR ₹" readonly></div>
                                            <div class="cv-inv-field"><label>Sale Agent</label><select class="form-select">
                                                    <option selected>GHARUDA SOFTWARE</option>
                                                    <option>Karthik R</option>
                                                    <option>Divya M</option>
                                                </select></div>
                                        </div>
                                        <div class="cv-inv-field"><label>Recurring Invoice?</label><select class="form-select">
                                                <option selected>No</option>
                                                <option>Weekly</option>
                                                <option>Monthly</option>
                                                <option>Yearly</option>
                                            </select></div>
                                        <div class="cv-inv-field"><label>Discount type</label><select class="form-select">
                                                <option selected>No discount</option>
                                                <option>Before Tax</option>
                                                <option>After Tax</option>
                                            </select></div>
                                        <div class="cv-inv-field"><label>Admin Note</label><textarea class="form-control" rows="3"></textarea></div>
                                        <div class="cv-inv-field"><label>Bank Accounts</label><select class="form-select">
                                                <option selected>Select Banking</option>
                                                <option>HDFC Bank - 50100234567890</option>
                                                <option>ICICI Bank - 602305123456</option>
                                            </select></div>
                                    </div>
                                </div>

                                <!-- Items section -->
                                <div class="cv-inv-items">
                                    <div class="cv-inv-items-toolbar">
                                        <div class="d-flex align-items-center gap-2">
                                            <select class="form-select cv-inv-add-item">
                                                <option value="">Add Item</option>
                                                <option>HRMS Subscription</option>
                                                <option>Solar Panel — 450W</option>
                                                <option>Installation Service</option>
                                                <option>AMC Charges</option>
                                            </select>
                                            <button type="button" class="btn btn-primary cv-inv-item-btn" id="cvInvAddItem" title="Add item"><i class="bi bi-plus-lg"></i></button>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <select class="form-select cv-inv-add-item">
                                                <option value="">Bill Tasks</option>
                                                <option>Task #12 — Site inspection</option>
                                                <option>Task #14 — Panel mounting</option>
                                            </select>
                                            <i class="bi bi-question-circle" style="color:#9ca3af;"></i>
                                        </div>
                                        <div class="cv-inv-qty-radio">
                                            <span>Show quantity as:</span>
                                            <label><input type="radio" name="cvInvQty" checked> Qty</label>
                                            <label><input type="radio" name="cvInvQty"> Hours</label>
                                            <label><input type="radio" name="cvInvQty"> Qty/Hours</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="cv-inv-item-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:30px;"><i class="bi bi-info-circle"></i></th>
                                                    <th>Item</th>
                                                    <th style="width:190px;">Description</th>
                                                    <th style="width:80px;">Qty</th>
                                                    <th style="width:110px;">Rate</th>
                                                    <th style="width:100px;">Discount %</th>
                                                    <th style="width:110px;">Tax</th>
                                                    <th style="width:110px;">Amount</th>
                                                    <th style="width:40px;"><i class="bi bi-gear"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody id="cvInvItemBody">
                                                <tr>
                                                    <td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>
                                                    <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                                                    <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                                                    <td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>
                                                    <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                                    <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                                    <td><select class="form-select">
                                                            <option selected>No Tax</option>
                                                            <option>GST 5%</option>
                                                            <option>GST 12%</option>
                                                            <option>GST 18%</option>
                                                        </select></td>
                                                    <td><span class="cv-inv-amt">₹ 0.00</span></td>
                                                    <td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Totals -->
                                    <div class="cv-inv-totals">
                                        <div class="cv-inv-totals-box">
                                            <div class="cv-inv-trow" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Transport Amount</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow total" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="cv-inv-notes">
                                    <div class="mb-3"><label>Client Note</label><textarea class="form-control" placeholder="Enter client note..."></textarea></div>
                                    <div class="mb-0"><label>Terms &amp; Conditions</label><textarea class="form-control" rows="3" placeholder="Enter terms and conditions..."></textarea></div>
                                </div>
                            </div>
                            <div class="cv-inv-footer">
                                <span class="cv-inv-hint">Include invoice items with merge field anywhere in invoice content as {invoice_items}</span>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Save as Draft</button>
                                    <button type="button" class="btn btn-primary" id="cvInvSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Item modal -->
                <div class="modal fade" id="cvAddItemModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvAddItemTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvAddItemTitle" style="font-size:15.5px;font-weight:800;">Add New Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="cvItDesc"></div>
                                <div class="cv-it-field"><label>Long Description</label><textarea class="form-control" id="cvItLongDesc" rows="3"></textarea></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="cvItRateInr" step="0.01"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>HSN Code</label><input type="text" class="form-control" id="cvItHsn"></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Rate - USD</label><input type="number" class="form-control" id="cvItRateUsd" step="0.01"></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 1</label><select class="form-select" id="cvItTax1">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 2</label><select class="form-select" id="cvItTax2" disabled>
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Unit</label><input type="text" class="form-control" id="cvItUnit" placeholder="Unit"></div>
                                <div class="cv-it-field mb-0"><label>Item Group</label><select class="form-select" id="cvItGroup">
                                        <option value="">Non selected</option>
                                        <option>Services</option>
                                        <option>Products</option>
                                        <option>Subscription</option>
                                    </select></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvItemSave">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ZIP Invoices modal -->
                <div class="modal fade" id="cvZipModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvZipTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                                    <h5 class="modal-title" id="cvZipTitle" style="font-size:15.5px;font-weight:800;">ZIP Invoices</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field">
                                    <label>Status</label>
                                    <div class="cv-zip-status">
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="All" checked><span class="cv-zip-pill"><i class="bi bi-circle-half"></i>All</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="Unpaid"><span class="cv-zip-pill"><i class="bi bi-hourglass-split"></i>Unpaid</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="Paid"><span class="cv-zip-pill"><i class="bi bi-check2-circle"></i>Paid</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="Partially Paid"><span class="cv-zip-pill"><i class="bi bi-pie-chart"></i>Partially Paid</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="Overdue"><span class="cv-zip-pill"><i class="bi bi-exclamation-circle"></i>Overdue</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="Cancelled"><span class="cv-zip-pill"><i class="bi bi-x-circle"></i>Cancelled</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvZipStatus" value="Draft"><span class="cv-zip-pill"><i class="bi bi-pencil"></i>Draft</span></label>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>From Date:</label><input type="date" class="form-control" id="cvZipFrom"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvZipTo"></div>
                                    </div>
                                </div>
                                <div class="cv-zip-note"><i class="bi bi-info-circle me-1"></i>Invoices matching the selected status and date range will be bundled into a single ZIP file.</div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvZipSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Tab: invoices -->

            <!-- ==================== Tab: payments ==================== -->
            <div class="cv-tab-panel" id="cvTab-payments" style="display: none;">
                <!-- Payments — status filter (first image) + Zip Payments + table flow -->
                <style>
                    .cv-pay-actions { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-pay-title { font-size: 16px; font-weight: 800; color: var(--ink-900); margin: 0; display: flex; align-items: center; gap: 9px; }
                    .cv-pay-title i { width: 32px; height: 32px; border-radius: 9px; background: var(--primary-light); color: var(--primary-dark); display: inline-flex; align-items: center; justify-content: center; font-size: 15px; }
                    .cv-zip-field { margin-bottom: 14px; }
                    .cv-zip-field label { font-size: 12.5px; font-weight: 700; color: var(--ink-700); display: block; margin-bottom: 6px; }
                    .cv-zip-field .form-select, .cv-zip-field .form-control { border-radius: 10px; font-size: 13.5px; }
                </style>

                <div class="cv-pay-actions mt-3 ms-3 mb-0">
                    <button type="button" class="btn btn-primary" id="cvZipPaymentsBtn"><i class="bi bi-file-zip me-1"></i>Zip Payments</button>
                </div>

                <!-- Payments table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="payments">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="paymentsTable">
                            <thead>
                                <tr><th>Payment #</th><th>Invoice #</th><th>Payment Mode</th><th>Transaction ID</th><th>Amount</th><th>Date</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    PAY-000041                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000118</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Bank Transfer (NEFT)                                                                                            </td>
                                                                                    <td>
                                                                                                    <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">NEFT9821304571</code>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 12,500</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    15-09-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    PAY-000034                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000112</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Bank Transfer (NEFT)                                                                                            </td>
                                                                                    <td>
                                                                                                    <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">NEFT8100477219</code>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 20,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    08-09-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    PAY-000029                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000098</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    UPI                                                                                            </td>
                                                                                    <td>
                                                                                                    <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">UPI7741209938</code>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 12,500</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    12-08-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    PAY-000018                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000087</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Cheque                                                                                            </td>
                                                                                    <td>
                                                                                                    <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">CHQ0045120087</code>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 8,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    05-08-2026                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- ZIP Payments modal (second image) -->
                <div class="modal fade" id="cvZipPaymentModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvZipPayTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                                    <h5 class="modal-title" id="cvZipPayTitle" style="font-size:15.5px;font-weight:800;">ZIP Payments</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-zip-field">
                                    <label>Payment made by</label>
                                    <select class="form-select select2" id="cvZipPayBy" data-placeholder="Non selected">
                                        <option></option>
                                        <option>Admin</option>
                                        <option>Karthik R.</option>
                                        <option>Divya M.</option>
                                        <option>Priya S.</option>
                                        <option>Harish D.</option>
                                    </select>
                                </div>
                                <div class="cv-zip-field">
                                    <label>From Date:</label>
                                    <input type="date" class="form-control" id="cvZipPayFrom">
                                </div>
                                <div class="cv-zip-field mb-0">
                                    <label>To Date:</label>
                                    <input type="date" class="form-control" id="cvZipPayTo">
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvZipPaySubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap + jQuery + select2) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        var payBtn = document.getElementById('cvZipPaymentsBtn'),
                            payModal = document.getElementById('cvZipPaymentModal');

                        /* Zip Payments button -> modal (select2 dropdownParent fix inside modal) */
                        if (payBtn && payModal && window.bootstrap) {
                            payBtn.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(payModal).show();
                                if (typeof $ !== 'undefined' && $.fn.select2) {
                                    var sel = jQuery('#cvZipPayBy');
                                    if (sel.data('select2')) sel.select2('destroy');
                                    sel.select2({ width: '100%', dropdownParent: jQuery(payModal) });
                                }
                            });
                        }

                        /* Submit -> validate date range + ZIP toast */
                        var paySubmit = document.getElementById('cvZipPaySubmit');
                        if (paySubmit && payModal) {
                            paySubmit.addEventListener('click', function() {
                                var by = document.getElementById('cvZipPayBy'),
                                    from = document.getElementById('cvZipPayFrom').value,
                                    to = document.getElementById('cvZipPayTo').value;
                                if (from && to && from > to) {
                                    toast('From Date cannot be after To Date', false);
                                    return;
                                }
                                bootstrap.Modal.getOrCreateInstance(payModal).hide();
                                var who = by && by.value ? by.value : 'all staff',
                                    msg = 'Preparing ZIP of payments made by ' + who;
                                if (from && to) msg += ' from ' + from + ' to ' + to;
                                toast(msg + '...');
                            });
                        }
                    });
            </div><!-- End Tab: payments -->

            <!-- ==================== Tab: statement ==================== -->
            <div class="cv-tab-panel" id="cvTab-statement" style="display: none;">
                <!-- Customer Statement — document style view -->
                <div class="card-custom p-0 cv-stmt-wrap">
                    <div class="cv-stmt-toolbar">
                        <input type="text" class="form-control cv-stmt-period" value="01-09-2026 to 30-09-2026" readonly aria-label="Statement period">
                        <div class="cv-stmt-acts">
                            <button type="button" class="cv-stmt-btn js-stmt-print" title="Print"><i class="bi bi-printer"></i></button>
                            <button type="button" class="cv-stmt-btn js-stmt-pdf" title="Download PDF"><i class="bi bi-file-earmark-pdf"></i></button>
                            <button type="button" class="cv-stmt-btn js-stmt-email" title="Send by email"><i class="bi bi-envelope"></i></button>
                            <button type="button" class="cv-stmt-btn js-stmt-wa" title="Send via WhatsApp"><i class="bi bi-whatsapp"></i></button>
                        </div>
                    </div>

                    <div class="cv-stmt-doc" id="cvStmtDoc">
                        <!-- Letterhead -->
                        <div class="cv-stmt-head">
                            <div class="cv-stmt-brand">
                                <div class="cv-stmt-logo">KS</div>
                                <div style="min-width:0;">
                                    <div class="cv-stmt-co-name">ghrA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                                    <div class="cv-stmt-co-addr">
                                        PC 20 /3, 3rd Block, Mogappair West, Chennai- 560038, Tamil Nadu, India<br>
                                        9865321670 · GST Number: 28AABCR7796N0O0
                                    </div>
                                </div>
                            </div>
                            <div class="cv-stmt-meta">
                                <div class="cv-stmt-doc-type"><i class="bi bi-receipt"></i> Customer Statement</div>
                                <div class="cv-stmt-meta-row"><span>Statement #</span><b>STMT-2026-0092</b></div>
                                <div class="cv-stmt-meta-row"><span>Issue date</span><b>16-09-2026</b></div>
                                <div class="cv-stmt-meta-row"><span>Period</span><b>01-09-2026 – 30-09-2026</b></div>
                            </div>
                        </div>

                        <div class="cv-stmt-title">Customer Statement For GG COMPANY</div>

                        <!-- Parties -->
                        <div class="cv-stmt-parties">
                            <div class="cv-stmt-to">
                                <div class="cv-stmt-to-label">Billed to</div>
                                <div class="cv-stmt-to-box">
                                    <div class="cv-stmt-to-ava">GG</div>
                                    <div style="min-width:0;">
                                        <div class="cv-stmt-to-name">GG COMPANY</div>
                                        <div class="cv-stmt-to-line"><i class="bi bi-person"></i>MOHAN S</div>                                        <div class="cv-stmt-to-line"><i class="bi bi-envelope"></i>kaviyarasu@ghratechnology.com</div>                                        <div class="cv-stmt-to-line"><i class="bi bi-geo-alt"></i>1/2 VOC Street, Menabadu, Ambattur, Chennai - 600053</div>
                                        <div class="cv-stmt-to-line"><i class="bi bi-telephone"></i>9677063368</div>                                    </div>
                                </div>
                            </div>
                            <div class="cv-stmt-due">
                                <div class="k">Total amount due</div>
                                <div class="v">₹ 37,500</div>
                                <div class="d">3 transactions this period</div>
                            </div>
                        </div>

                        <div class="cv-stmt-kpis">
                            <div class="cv-stmt-kpi">
                                <span class="ic i-grey"><i class="bi bi-play-circle"></i></span>
                                <div><div class="k">Opening Balance</div><div class="v">₹ 0.00</div></div>
                            </div>
                            <div class="cv-stmt-kpi">
                                <span class="ic i-red"><i class="bi bi-file-earmark-arrow-up"></i></span>
                                <div><div class="k">Invoiced this period</div><div class="v">₹ 57,500</div></div>
                            </div>
                            <div class="cv-stmt-kpi">
                                <span class="ic i-blue"><i class="bi bi-cash-coin"></i></span>
                                <div><div class="k">Payments received</div><div class="v">₹ 20,000</div></div>
                            </div>
                            <div class="cv-stmt-kpi">
                                <span class="ic i-green"><i class="bi bi-wallet2"></i></span>
                                <div><div class="k">Closing Balance</div><div class="v">₹ 37,500</div></div>
                            </div>
                        </div>

                        <div class="table-responsive table-modern-wrap column-border">
                            <table class="table-modern w-100 datatable mb-0" id="statementTable">
                                <thead>
                                    <tr><th>Date</th><th>Description</th><th>Debit</th><th>Credit</th><th>Balance</th><th>Action</th></tr>
                                </thead>
                                <tbody>
                                    <tr class="cv-row" data-date="01-09-2026" data-ref="INV-000112" data-type="Invoice" data-mode="Credit" data-debit="₹ 45,000" data-credit="—" data-balance="₹ 45,000" data-desc="Invoice INV-000112" data-notes="Solar installation — Phase 1 billing raised against purchase order PO-2291."><td>01-09-2026</td><td>Invoice INV-000112</td><td>₹ 45,000</td><td>—</td><td>₹ 45,000</td><td><button type="button" class="cv-stmt-view" title="View transaction" aria-label="View transaction"><i class="bi bi-eye-fill"></i></button></td></tr>
                                    <tr class="cv-row" data-date="08-09-2026" data-ref="PAY-000034" data-type="Payment" data-mode="Bank Transfer (NEFT)" data-debit="—" data-credit="₹ 20,000" data-balance="₹ 25,000" data-desc="Payment PAY-000034" data-notes="Payment received against invoice INV-000112."><td>08-09-2026</td><td>Payment PAY-000034</td><td>—</td><td>₹ 20,000</td><td>₹ 25,000</td><td><button type="button" class="cv-stmt-view" title="View transaction" aria-label="View transaction"><i class="bi bi-eye-fill"></i></button></td></tr>
                                    <tr class="cv-row" data-date="15-09-2026" data-ref="INV-000118" data-type="Invoice" data-mode="Credit" data-debit="₹ 12,500" data-credit="—" data-balance="₹ 37,500" data-desc="Invoice INV-000118" data-notes="AMC service charges for Q3 2026 as per service agreement."><td>15-09-2026</td><td>Invoice INV-000118</td><td>₹ 12,500</td><td>—</td><td>₹ 37,500</td><td><button type="button" class="cv-stmt-view" title="View transaction" aria-label="View transaction"><i class="bi bi-eye-fill"></i></button></td></tr>
                                    <tr class="cv-stmt-total">
                                        <td colspan="2">Total</td>
                                        <td>₹ 57,500</td>
                                        <td>₹ 20,000</td>
                                        <td>₹ 37,500</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Transaction details modal -->
                <div class="leave-reject-modal" id="cvStmtModal" role="dialog" aria-modal="true" aria-labelledby="cvStmtTitle">
                    <div class="leave-reject-dialog cv-note-dialog">
                        <div class="cv-contact-head">
                            <div class="cv-contact-head-l">
                                <div class="cv-contact-ava"><i class="bi bi-receipt"></i></div>
                                <div style="min-width:0;">
                                    <h3 id="cvStmtTitle" class="mb-0">Transaction details</h3>
                                    <div class="cv-contact-sub">Statement entry for GG COMPANY</div>
                                </div>
                            </div>
                            <button type="button" class="modal-close" id="cvStmtClose" aria-label="Close">&times;</button>
                        </div>

                        <div class="leave-reject-body cv-note-body">
                            <div class="cv-stmt-detail-grid">
                                <div class="cv-stmt-df"><div class="k">Date</div><div class="v" id="sdDate">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Reference #</div><div class="v" id="sdRef">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Type</div><div class="v" id="sdType">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Payment Mode</div><div class="v" id="sdMode">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Debit</div><div class="v" id="sdDebit">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Credit</div><div class="v" id="sdCredit">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Balance</div><div class="v" id="sdBal">—</div></div>
                                <div class="cv-stmt-df"><div class="k">Description</div><div class="v" id="sdDesc">—</div></div>
                                <div class="cv-stmt-df cv-stmt-df-full"><div class="k">Notes</div><div class="v" id="sdNotes">—</div></div>
                            </div>
                        </div>

                        <div class="leave-reject-foot pt-3">
                            <button type="button" class="btn btn-reject" id="cvStmtCancel">Close</button>
                        </div>
                    </div>
                </div>
            </div><!-- End Tab: statement -->

            <!-- ==================== Tab: credit_notes ==================== -->
            <div class="cv-tab-panel" id="cvTab-credit_notes" style="display: none;">
                <!-- Credit Notes — credits banner + buttons + table flow -->
                <style>
                    .cv-cn-banner { background: #fefce8; border: 1px solid #fde68a; color: #a16207; font-size: 13px; font-weight: 600; border-radius: 10px; padding: 11px 16px; margin-bottom: 16px; }
                    .cv-cn-banner i { color: #f59e0b; margin-right: 4px; }
                    .cv-cn-actions { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; flex-wrap: wrap; }
                    .cv-cn-actions .btn i { font-size: 13px; }
                    .cv-cn-status { display: inline-flex; align-items: center; gap: 6px; font-size: 11.5px; font-weight: 700; border-radius: 20px; padding: 3px 10px; }
                    .cv-cn-status.open { background: #eafaf1; color: #0f7a38; }
                    .cv-cn-status.closed { background: #f1f4f3; color: #6b7280; }
                    .cv-cn-status.void { background: #fef2f2; color: #dc2626; }
                    #cvNewCreditNoteModal.modal { z-index: 1055; }
                    #cvNewCreditNoteModal .modal-content { border: none; border-radius: 0; display: flex; flex-direction: column; height: 100%; }
                    #cvNewCreditNoteModal .modal-body { flex: 1 1 auto; min-height: 0; overflow-y: auto; }
                    #cvEstAddItemModal.modal { z-index: 1085; }
                    #cvCnZipModal.modal { z-index: 1075; }
                    .cv-cn-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 40px; }
                    @media (max-width: 900px) { .cv-cn-grid { grid-template-columns: 1fr; } }
                    .cv-cn-field { margin-bottom: 14px; }
                    .cv-cn-field label { display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 4px; }
                    .cv-cn-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-cn-field .form-control, .cv-cn-field .form-select { font-size: 13px; border-radius: 8px; }
                    .cv-cn-addr-row { display: flex; gap: 14px; }
                    .cv-cn-addr-row>.cv-cn-field, .cv-cn-addr-row>div { flex: 1; min-width: 0; }
                    .cv-cn-addr-text { font-size: 12.5px; line-height: 1.7; color: var(--ink-700); background: #f8f9fa; border: 1px solid #eef0f3; border-radius: 8px; padding: 8px 12px; }
                    .cv-cn-num-wrap { display: flex; align-items: stretch; }
                    .cv-cn-num-wrap .cv-cn-prefix { display: flex; align-items: center; padding: 0 12px; background: #f8f9fa; border: 1px solid #dee2e6; border-right: 0; border-radius: 8px 0 0 8px; font-size: 13px; font-weight: 700; color: var(--ink-500); }
                    .cv-cn-num-wrap .form-control { border-radius: 0 8px 8px 0; flex: 1; min-width: 0; }
                    .cv-cn-items { margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 20px; }
                    .cv-cn-notes { margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 20px; }
                    .cv-cn-notes label { display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-cn-footer { display: flex; align-items: center; justify-content: space-between; gap: 14px; padding: 14px 28px; border-top: 1px solid #eef0f3; background: #fff; flex-wrap: wrap; }
                    .cv-cn-footer .hint { font-size: 11.5px; color: #9ca3af; }
                </style>

                <div class="mt-3 ms-3 cv-cn-banner"><i class="bi bi-cash-coin"></i>₹ 0.00 credits available.</div>

                <div class="cv-cn-actions ms-3 mb-0">
                    <button type="button" class="btn btn-primary" id="cvCnNewBtn"><i class="bi bi-plus-lg me-1"></i>New Credit Note</button>
                    <button type="button" class="btn btn-primary" id="cvCnZipBtn"><i class="bi bi-file-zip me-1"></i>Zip Credit Notes</button>
                </div>

                <!-- Credit Notes table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="credit-notes">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="credit_notesTable">
                            <thead>
                                <tr><th>Credit Note #</th><th>Credit Note Date</th><th>Status</th><th>Project</th><th>Reference #</th><th>Amount</th><th>Remaining Amount</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">CN-0002</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    20-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-cn-status open"><i class="bi bi-door-open"></i>Open</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Solar Installation                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000087</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 2,500</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 0</strong>
                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- New Credit Note modal — fullscreen (image 2 fields) -->
                <div class="modal fade" id="cvNewCreditNoteModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content cv-inv-modal">
                            <div class="cv-contact-head">
                                <div class="cv-contact-head-l">
                                    <div class="cv-contact-ava"><i class="bi bi-file-earmark-minus"></i></div>
                                    <div style="min-width:0;">
                                        <h3 class="mb-0">New Credit Note</h3>
                                        <div class="cv-contact-sub">GG COMPANY · New credit note</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body cv-inv-body">
                                <div class="cv-cn-grid">
                                    <!-- Left column -->
                                    <div>
                                        <div class="cv-cn-field"><label><span class="req">*</span>Customer</label><select class="form-select"><option selected>GG COMPANY</option></select></div>
                                        <div class="cv-cn-addr-row">
                                            <div>
                                                <label class="cv-inv-mini-label"><i class="bi bi-pencil-square"></i> Bill To</label>
                                                <div class="cv-cn-addr-text">214, Vadasery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100<br>IN, 600100</div>
                                            </div>
                                            <div>
                                                <label class="cv-inv-mini-label">Ship to</label>
                                                <div class="cv-cn-addr-text" style="color:#9ca3af;">---<br>---<br>---, ---</div>
                                            </div>
                                        </div>
                                        <div class="cv-cn-addr-row">
                                            <div class="cv-cn-field"><label><span class="req">*</span>Credit Note Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                                            <div class="cv-cn-field">
                                                <label><span class="req">*</span>Credit Note # <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                                                <div class="cv-cn-num-wrap"><span class="cv-cn-prefix">CN-</span><input type="text" class="form-control" value="23"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Right column -->
                                    <div>
                                        <div class="cv-cn-addr-row">
                                            <div class="cv-cn-field"><label><span class="req">*</span>Currency</label><select class="form-select"><option selected>INR ₹</option><option>USD $</option></select></div>
                                            <div class="cv-cn-field"><label>Discount type</label><select class="form-select">
                                                    <option selected>No discount</option>
                                                    <option>Before Tax</option>
                                                    <option>After Tax</option>
                                                </select></div>
                                        </div>
                                        <div class="cv-cn-field"><label>Reference #</label><input type="text" class="form-control"></div>
                                        <div class="cv-cn-field"><label>Admin Note</label><textarea class="form-control" rows="4"></textarea></div>
                                    </div>
                                </div>

                                <!-- Items section -->
                                <div class="cv-cn-items">
                                    <div class="cv-inv-items-toolbar">
                                        <div class="d-flex align-items-center gap-2">
                                            <select class="form-select cv-inv-add-item">
                                                <option value="">Add Item</option>
                                                <option>HRMS Subscription</option>
                                                <option>Solar Panel — 450W</option>
                                                <option>Installation Service</option>
                                                <option>AMC Charges</option>
                                            </select>
                                            <button type="button" class="btn btn-primary cv-inv-item-btn" id="cvCnAddItem" title="Add item"><i class="bi bi-plus-lg"></i></button>
                                        </div>
                                        <div class="cv-inv-qty-radio">
                                            <span>Show quantity as:</span>
                                            <label><input type="radio" name="cvCnQty" checked> Qty</label>
                                            <label><input type="radio" name="cvCnQty"> Only</label>
                                            <label><input type="radio" name="cvCnQty"> Hours</label>
                                            <label><input type="radio" name="cvCnQty"> Qty/Hours</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="cv-inv-item-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:30px;"><i class="bi bi-info-circle"></i></th>
                                                    <th>Item</th>
                                                    <th style="width:190px;">Description</th>
                                                    <th style="width:80px;">Qty</th>
                                                    <th style="width:110px;">Rate</th>
                                                    <th style="width:100px;">Discount %</th>
                                                    <th style="width:110px;">Tax</th>
                                                    <th style="width:110px;">Amount</th>
                                                    <th style="width:40px;"><i class="bi bi-gear"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody id="cvCnItemBody">
                                                <tr>
                                                    <td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>
                                                    <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                                                    <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                                                    <td><input type="number" class="form-control" value="1" min="0"></td>
                                                    <td><input type="number" class="form-control" placeholder="Rate" step="0.01"></td>
                                                    <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                                    <td><select class="form-select">
                                                            <option selected>No Tax</option>
                                                            <option>GST 5%</option>
                                                            <option>GST 12%</option>
                                                            <option>GST 18%</option>
                                                        </select></td>
                                                    <td><span class="cv-inv-amt">₹ 0.00</span></td>
                                                    <td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Totals -->
                                    <div class="cv-inv-totals">
                                        <div class="cv-inv-totals-box">
                                            <div class="cv-inv-trow" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Discount</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow total" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="cv-cn-notes">
                                    <div class="mb-3"><label>Client Note</label><textarea class="form-control"></textarea></div>
                                    <div class="mb-0"><label>Terms &amp; Conditions</label><textarea class="form-control" rows="3"></textarea></div>
                                </div>
                            </div>
                            <div class="cv-cn-footer">
                                <span class="hint">Include credit note items with merge field anywhere in credit note content as {credit_note_items}</span>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Save &amp; Send</button>
                                    <button type="button" class="btn btn-primary" id="cvCnSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ZIP Credit Notes modal — cvZipModal design (image 3) -->
                <div class="modal fade" id="cvCnZipModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvCnZipTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                                    <h5 class="modal-title" id="cvCnZipTitle" style="font-size:15.5px;font-weight:800;">Zip Credit Notes</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field">
                                    <label>Status</label>
                                    <div class="cv-zip-status">
                                        <label class="cv-zip-radio"><input type="radio" name="cvCnZipStatus" value="All" checked><span class="cv-zip-pill"><i class="bi bi-circle-half"></i>All</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvCnZipStatus" value="Open"><span class="cv-zip-pill"><i class="bi bi-door-open"></i>Open</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvCnZipStatus" value="Closed"><span class="cv-zip-pill"><i class="bi bi-lock"></i>Closed</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvCnZipStatus" value="Void"><span class="cv-zip-pill"><i class="bi bi-x-circle"></i>Void</span></label>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>From Date:</label><input type="date" class="form-control" id="cvCnZipFrom"></div>
                                <div class="cv-it-field mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvCnZipTo"></div>
                                <div class="cv-zip-note"><i class="bi bi-info-circle me-1"></i>Credit notes matching the selected status and date range will be bundled into a single ZIP file.</div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvCnZipSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Item modal (same #cvEstAddItemModal as Estimates — branches rendum render aagaathu) -->
                <div class="modal fade" id="cvEstAddItemModal" tabindex="-1" aria-hidden="true" aria-labelledby="cnEstAddItemTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cnEstAddItemTitle" style="font-size:15.5px;font-weight:800;">Add New Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="estItDesc"></div>
                                <div class="cv-it-field"><label>Long Description</label><textarea class="form-control" id="estItLongDesc" rows="3"></textarea></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="estItRateInr" step="0.01"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>HSN Code</label><input type="text" class="form-control" id="estItHsn"></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Rate - USD</label><input type="number" class="form-control" id="estItRateUsd" step="0.01"></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 1</label><select class="form-select" id="estItTax1">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 2</label><select class="form-select" id="estItTax2" disabled>
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Unit</label><input type="text" class="form-control" id="estItUnit" placeholder="Unit"></div>
                                <div class="cv-it-field mb-0"><label>Item Group</label><select class="form-select" id="estItGroup">
                                        <option value="">Non selected</option>
                                        <option>Services</option>
                                        <option>Products</option>
                                        <option>Subscription</option>
                                    </select></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvEstItemSave">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        /* New Credit Note -> fullscreen modal */
                        var cnNewBtn = document.getElementById('cvCnNewBtn'),
                            cnModal = document.getElementById('cvNewCreditNoteModal');
                        if (cnNewBtn && cnModal) {
                            cnNewBtn.addEventListener('click', function() {
                                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(cnModal).show();
                            });
                        }

                        /* Items: add row + amount calc + confirm (lock) / delete — invoice modal madhiri */
                        var cnAdd = document.getElementById('cvCnAddItem'),
                            cnBody = document.getElementById('cvCnItemBody');

                        function cnBlankRow() {
                            var tr = document.createElement('tr');
                            tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                                '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                                '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                                '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>' +
                                '<td><input type="number" class="form-control" placeholder="Rate" step="0.01"></td>' +
                                '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                                '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
                                '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                            return tr;
                        }

                        /* Toolbar ➕ -> open Add New Item modal (#cvEstAddItemModal — estimates branch madhiri) */
                        var cnItemModal = document.getElementById('cvEstAddItemModal');
                        if (cnAdd && cnItemModal && window.bootstrap) {
                            cnAdd.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(cnItemModal).show();
                            });
                        }

                        /* Stacked modal backdrop z-index fix (credit note + item modal) */
                        ['#cvNewCreditNoteModal', '#cvEstAddItemModal'].forEach(function(id) {
                            var el = document.querySelector(id);
                            if (!el) return;
                            el.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        });

                        /* Add New Item submit -> validate + fill blank row in credit note items */
                        var cnItemSave = document.getElementById('cvEstItemSave');
                        if (cnItemSave && cnItemModal && cnBody) {
                            cnItemSave.addEventListener('click', function() {
                                var desc = document.getElementById('estItDesc').value.trim(),
                                    rate = document.getElementById('estItRateInr').value.trim();
                                if (!desc || !rate) {
                                    toast('Description and Rate - INR are required');
                                    return;
                                }
                                var tr = cnBody.querySelector('tr:not(.cv-inv-row-locked)'),
                                    madeNew = false;
                                if (!tr) {
                                    tr = cnBlankRow();
                                    madeNew = true;
                                }
                                var tax = document.getElementById('estItTax1').value,
                                    longDesc = document.getElementById('estItLongDesc').value.trim(),
                                    unit = document.getElementById('estItUnit').value.trim();
                                tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                                    '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                                    '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                                    '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (unit || 'Unit') + '</div></td>' +
                                    '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
                                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                    '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
                                    '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
                                    '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                                tr.querySelector('textarea').value = desc;
                                tr.cells[2].querySelector('textarea').value = longDesc;
                                if (madeNew) cnBody.appendChild(tr);

                                // reset form + close
                                ['estItDesc', 'estItLongDesc', 'estItRateInr', 'estItHsn', 'estItRateUsd', 'estItUnit'].forEach(function(id) {
                                    document.getElementById(id).value = '';
                                });
                                document.getElementById('estItTax1').value = 'No Tax';
                                document.getElementById('estItTax2').value = 'No Tax';
                                document.getElementById('estItGroup').value = '';
                                bootstrap.Modal.getOrCreateInstance(cnItemModal).hide();
                                toast('Item "' + desc + '" added to credit note');
                            });
                        }

                        document.addEventListener('input', function(e) {
                            var t = e.target;
                            if (!t.closest || !t.closest('#cvCnItemBody')) return;
                            var row = t.closest('tr');
                            if (!row || row.classList.contains('cv-inv-row-locked')) return;
                            var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
                                rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
                            row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
                        });

                        if (cnBody) {
                            cnBody.addEventListener('click', function(e) {
                                var check = e.target.closest('.cv-inv-check'),
                                    del = e.target.closest('.cv-inv-row-del'),
                                    row;
                                if (del) {
                                    row = del.closest('tr');
                                    if (row) row.remove();
                                    if (cnBody && !cnBody.querySelector('tr')) cnBody.appendChild(cnBlankRow());
                                    return;
                                }
                                if (!check) return;
                                row = check.closest('tr');
                                if (!row || row.classList.contains('cv-inv-row-locked')) return;
                                row.classList.add('cv-inv-row-locked');
                                row.querySelectorAll('input, select, textarea').forEach(function(el) {
                                    el.setAttribute('readonly', 'readonly');
                                    el.setAttribute('disabled', 'disabled');
                                });
                                check.className = 'cv-inv-row-del';
                                check.title = 'Delete item';
                                check.innerHTML = '<i class="bi bi-trash"></i>';
                                if (cnAdd) cnBody.appendChild(cnBlankRow());
                            });
                        }

                        /* Submit -> success toast + table row add (demo) */
                        var cnSubmit = document.getElementById('cvCnSubmit');
                        if (cnSubmit && cnModal) {
                            cnSubmit.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(cnModal).hide();
                                toast('Credit note CN-24 created successfully');
                            });
                        }

                        /* Zip Credit Notes -> modal */
                        var cnZipBtn = document.getElementById('cvCnZipBtn'),
                            cnZipModal = document.getElementById('cvCnZipModal');
                        if (cnZipBtn && cnZipModal) {
                            cnZipBtn.addEventListener('click', function() {
                                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(cnZipModal).show();
                            });
                        }

                        /* Zip submit -> validate date range + toast */
                        var cnZipSubmit = document.getElementById('cvCnZipSubmit');
                        if (cnZipSubmit && cnZipModal) {
                            cnZipSubmit.addEventListener('click', function() {
                                var from = document.getElementById('cvCnZipFrom').value,
                                    to = document.getElementById('cvCnZipTo').value;
                                if (from && to && from > to) {
                                    toast('From Date cannot be after To Date');
                                    return;
                                }
                                bootstrap.Modal.getOrCreateInstance(cnZipModal).hide();
                                var msg = 'Preparing ZIP of credit notes';
                                if (from && to) msg += ' from ' + from + ' to ' + to;
                                toast(msg + '...');
                            });
                        }
                    });
            </div><!-- End Tab: credit_notes -->

            <!-- ==================== Tab: purchase_orders ==================== -->
            <div class="cv-tab-panel" id="cvTab-purchase_orders" style="display: none;">
                <!-- Purchase Orders — estimates design flow (title + buttons + year + KPI cards + table) -->
                <style>
                    .cv-po-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-po-title { font-size: 16px; font-weight: 800; color: var(--ink-900); margin: 0; }
                    .cv-po-actions { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
                    .cv-po-year { max-width: 130px; margin-bottom: 14px; font-size: 13px; font-weight: 600; border-radius: 10px; }
                    .cv-po-kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; margin-bottom: 16px; }
                    .cv-po-kpi { border: 1px solid #eef0f3; border-radius: 10px; padding: 12px 16px; background: #fff; transition: transform .15s ease, box-shadow .15s ease; }
                    .cv-po-kpi:hover { transform: translateY(-2px); box-shadow: 0 8px 18px rgba(16, 24, 40, .07); }
                    .cv-po-kpi .k { font-size: 12.5px; font-weight: 700; margin-bottom: 4px; }
                    .cv-po-kpi .v { font-size: 15.5px; font-weight: 800; }
                    .cv-po-kpi.c-green .k, .cv-po-kpi.c-green .v { color: var(--primary-dark, #0f7a38); }
                    .cv-po-kpi.c-red .k, .cv-po-kpi.c-red .v { color: #dc2626; }
                    .cv-po-prog { display: flex; align-items: center; gap: 8px; min-width: 110px; }
                    .cv-po-prog .track { flex: 1; height: 6px; background: #eef0f3; border-radius: 4px; overflow: hidden; }
                    .cv-po-prog .bar { height: 100%; background: var(--primary); border-radius: 4px; }
                    .cv-po-prog span { font-size: 11px; font-weight: 700; color: var(--ink-700); }
                    #cvNewPOModal.modal { z-index: 1055; }
                    #cvNewPOModal .modal-content { border: none; border-radius: 0; display: flex; flex-direction: column; height: 100%; }
                    #cvNewPOModal .modal-body { flex: 1 1 auto; min-height: 0; overflow-y: auto; }
                    #cvPoZipModal.modal { z-index: 1075; }
                    #cvPoZipModal .modal-content { border: none; border-radius: 0; }
                    #cvPoZipModal .modal-body { max-width: 760px; width: 100%; margin: 0 auto; padding: 28px 32px; }
                    #cvPoZipModal .modal-header { padding-left: 32px !important; padding-right: 32px !important; }
                    #cvPoZipModal .modal-footer { padding-left: 32px !important; padding-right: 32px !important; }
                    #cvEstAddItemModal.modal { z-index: 1085; }
                    .cv-po-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px 40px; }
                    @media (max-width: 900px) { .cv-po-grid { grid-template-columns: 1fr; } }
                    .cv-po-field { margin-bottom: 14px; }
                    .cv-po-field label { display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 4px; }
                    .cv-po-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-po-field .form-control, .cv-po-field .form-select { font-size: 13px; border-radius: 8px; }
                    .cv-po-addr-row { display: flex; gap: 14px; }
                    .cv-po-addr-row>.cv-po-field, .cv-po-addr-row>div { flex: 1; min-width: 0; }
                    .cv-po-num-wrap { display: flex; align-items: stretch; }
                    .cv-po-num-wrap .cv-po-prefix { display: flex; align-items: center; padding: 0 12px; background: #f8f9fa; border: 1px solid #dee2e6; border-right: 0; border-radius: 8px 0 0 8px; font-size: 13px; font-weight: 700; color: var(--ink-500); }
                    .cv-po-num-wrap .form-control { border-radius: 0 8px 8px 0; flex: 1; min-width: 0; }
                </style>

                <div class="cv-po-head ms-3 mt-3">
                    <div class="cv-po-actions w-100">
                        <select class="form-select mb-0 form-select-sm cv-po-year bg-white" aria-label="Year">
                            <option selected>2026</option>
                            <option>2025</option>
                            <option>2024</option>
                        </select>
                        <button type="button" class="btn btn-primary" id="cvPoNewBtn"><i class="bi bi-plus-lg me-1"></i>Create New Purchase Order</button>
                        <button type="button" class="btn btn-primary" id="cvPoZipBtn"><i class="bi bi-file-zip me-1"></i>Zip Purchase Orders</button>
                    </div>
                </div>


                <!-- Status summary KPI cards -->
                <div class="cv-po-kpis ms-3 mb-0">
                    <div class="cv-po-kpi c-green"><div class="k">New</div><div class="v">₹ 27,000</div></div>
                    <div class="cv-po-kpi c-red"><div class="k">Cancelled</div><div class="v">₹ 12,000</div></div>
                    <div class="cv-po-kpi c-green"><div class="k">Confirmed</div><div class="v">₹ 45,500</div></div>
                </div>

                <!-- Purchase Orders table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="purchase-orders">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="purchase_ordersTable">
                            <thead>
                                <tr><th>Progress</th><th>Purchase Order #</th><th>Amount</th><th>Total Tax</th><th>Project</th><th>Tags</th><th>Date</th><th>Reference #</th><th>Status</th><th>Profoma Status</th><th>Profoma No</th><th>Profoma Date</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                                                                        <div class="cv-po-prog"><span class="track"><span class="bar" style="width:40%"></span></span><span>40%</span></div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">PO-0011</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 27,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 1,350                                                                                            </td>
                                                                                    <td>
                                                                                                    Solar Installation                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">Material</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    06-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">REF-011</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>New</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Generated</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">PRO-0031</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    10-09-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                                                                        <div class="cv-po-prog"><span class="track"><span class="bar" style="width:100%"></span></span><span>100%</span></div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">PO-0009</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 45,500</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 2,275                                                                                            </td>
                                                                                    <td>
                                                                                                    AMC Renewal                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">Service</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    28-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">REF-009</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Confirmed</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Generated</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">PRO-0029</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    30-08-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                                                                        <div class="cv-po-prog"><span class="track"><span class="bar" style="width:65%"></span></span><span>65%</span></div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">PO-0007</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 12,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    ₹ 600                                                                                            </td>
                                                                                    <td>
                                                                                                    Event Management                                                                                            </td>
                                                                                    <td>
                                                                                                    —                                                                                            </td>
                                                                                    <td>
                                                                                                    20-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">REF-007</a>                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Cancelled</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Not Generated</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    —                                                                                            </td>
                                                                                    <td>
                                                                                                    —                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Create New Purchase Order modal — fullscreen (image 2 fields) -->
                <div class="modal fade" id="cvNewPOModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content cv-inv-modal">
                            <div class="cv-contact-head">
                                <div class="cv-contact-head-l">
                                    <div class="cv-contact-ava"><i class="bi bi-file-earmark-check"></i></div>
                                    <div style="min-width:0;">
                                        <h3 class="mb-0">Create New Purchase Order</h3>
                                        <div class="cv-contact-sub">GG COMPANY · New purchase order</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body cv-inv-body">
                                <div class="cv-po-grid">
                                    <!-- Left column -->
                                    <div>
                                        <div class="cv-po-field"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                                        <div class="cv-po-addr-row">
                                            <div>
                                                <label class="cv-inv-mini-label"><i class="bi bi-pencil-square"></i> Bill To</label>
                                                <div class="cv-inv-addr-text">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100<br>Chennai, Tamil Nadu<br>IN, 600100</div>
                                            </div>
                                            <div>
                                                <label class="cv-inv-mini-label">Ship to</label>
                                                <select class="form-select">
                                                    <option selected>Select Shipping Address</option>
                                                    <option>GG COMPANY - Anna Nagar</option>
                                                    <option>GG COMPANY - T. Nagar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="cv-po-field">
                                            <label><span class="req">*</span>Purchase Order Number <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                                            <div class="cv-po-num-wrap"><span class="cv-po-prefix">PO-</span><input type="text" class="form-control" value="163"></div>
                                        </div>
                                        <div class="cv-po-field"><label><span class="req">*</span>Purchase Order Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                                    </div>
                                    <!-- Right column -->
                                    <div>
                                        <div class="cv-po-field">
                                            <label><i class="bi bi-tag me-1"></i>Tags</label>
                                            <div class="nl-tags-wrap" style="max-width:100%;">
                                                <div class="nl-tags-chips"></div>
                                                <input type="text" class="nl-tags-input" placeholder="Tag">
                                            </div>
                                        </div>
                                        <div class="cv-po-addr-row">
                                            <div class="cv-po-field"><label><span class="req">*</span>Currency</label><select class="form-select"><option selected>INR ₹</option><option>USD $</option></select></div>
                                            <div class="cv-po-field"><label>Status</label><select class="form-select">
                                                    <option selected>New</option>
                                                    <option>Cancelled</option>
                                                    <option>Confirmed</option>
                                                </select></div>
                                        </div>
                                        <div class="cv-po-field"><label>Customer PO No.</label><input type="text" class="form-control"></div>
                                        <div class="cv-po-addr-row">
                                            <div class="cv-po-field"><label>Sale Agent</label><select class="form-select">
                                                    <option selected>gharuda SOFTWARE</option>
                                                    <option>Karthik R</option>
                                                    <option>Divya M</option>
                                                </select></div>
                                            <div class="cv-po-field"><label>Discount type</label><select class="form-select">
                                                    <option selected>No discount</option>
                                                    <option>Before Tax</option>
                                                    <option>After Tax</option>
                                                </select></div>
                                        </div>
                                        <div class="cv-po-field"><label>Admin Note</label><textarea class="form-control" rows="5"></textarea></div>
                                    </div>
                                </div>

                                <!-- Items section -->
                                <div class="cv-inv-items" style="margin-top:20px;border-top:1px solid #e5e7eb;padding-top:20px;">
                                    <div class="cv-inv-items-toolbar">
                                        <div class="d-flex align-items-center gap-2">
                                            <select class="form-select cv-inv-add-item">
                                                <option value="">Add Item</option>
                                                <option>HRMS Subscription</option>
                                                <option>Solar Panel — 450W</option>
                                                <option>Installation Service</option>
                                                <option>AMC Charges</option>
                                            </select>
                                            <button type="button" class="btn btn-primary cv-inv-item-btn" id="cvPoAddItem" title="Add item"><i class="bi bi-plus-lg"></i></button>
                                        </div>
                                        <div class="cv-inv-qty-radio">
                                            <span>Show quantity as:</span>
                                            <label><input type="radio" name="cvPoQty" checked> Qty</label>
                                            <label><input type="radio" name="cvPoQty"> Hours</label>
                                            <label><input type="radio" name="cvPoQty"> Qty/Hours</label>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="cv-inv-item-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:30px;"><i class="bi bi-info-circle"></i></th>
                                                    <th>Item</th>
                                                    <th style="width:190px;">Description</th>
                                                    <th style="width:80px;">Qty</th>
                                                    <th style="width:110px;">Rate</th>
                                                    <th style="width:100px;">Discount %</th>
                                                    <th style="width:110px;">Tax</th>
                                                    <th style="width:110px;">Amount</th>
                                                    <th style="width:40px;"><i class="bi bi-gear"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody id="cvPoItemBody">
                                                <tr>
                                                    <td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>
                                                    <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                                                    <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                                                    <td><input type="number" class="form-control" value="1" min="0"></td>
                                                    <td><input type="number" class="form-control" placeholder="Rate" step="0.01"></td>
                                                    <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                                    <td><select class="form-select">
                                                            <option selected>No Tax</option>
                                                            <option>GST 5%</option>
                                                            <option>GST 12%</option>
                                                            <option>GST 18%</option>
                                                        </select></td>
                                                    <td><span class="cv-inv-amt">₹ 0.00</span></td>
                                                    <td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Totals (image 2) -->
                                    <div class="cv-inv-totals">
                                        <div class="cv-inv-totals-box">
                                            <div class="cv-inv-trow" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Discount</span><input type="number" class="form-control" value="0" style="max-width:110px;"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                                            <div class="cv-inv-trow total" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Notes -->
                                <div class="cv-inv-notes" style="margin-top:20px;border-top:1px solid #e5e7eb;padding-top:20px;">
                                    <div class="mb-3"><label>Client Note</label><textarea class="form-control"></textarea></div>
                                    <div class="mb-0"><label>Terms &amp; Conditions</label><textarea class="form-control" rows="3"></textarea></div>
                                </div>
                            </div>
                            <div class="cv-inv-footer" style="justify-content:flex-end;">
                                <button type="button" class="btn btn-primary" id="cvPoSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add New Item modal (same #cvEstAddItemModal — branches rendum render aagaathu) -->
                <div class="modal fade" id="cvEstAddItemModal" tabindex="-1" aria-hidden="true" aria-labelledby="poAddItemTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="poAddItemTitle" style="font-size:15.5px;font-weight:800;">Add New Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="estItDesc"></div>
                                <div class="cv-it-field"><label>Long Description</label><textarea class="form-control" id="estItLongDesc" rows="3"></textarea></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="estItRateInr" step="0.01"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>HSN Code</label><input type="text" class="form-control" id="estItHsn"></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Rate - USD</label><input type="number" class="form-control" id="estItRateUsd" step="0.01"></div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 1</label><select class="form-select" id="estItTax1">
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="cv-it-field mb-0"><label>Tax 2</label><select class="form-select" id="estItTax2" disabled>
                                                <option selected>No Tax</option>
                                                <option>GST 5%</option>
                                                <option>GST 12%</option>
                                                <option>GST 18%</option>
                                            </select></div>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>Unit</label><input type="text" class="form-control" id="estItUnit" placeholder="Unit"></div>
                                <div class="cv-it-field mb-0"><label>Item Group</label><select class="form-select" id="estItGroup">
                                        <option value="">Non selected</option>
                                        <option>Services</option>
                                        <option>Products</option>
                                        <option>Subscription</option>
                                    </select></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvEstItemSave">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ZIP Purchase Orders modal (image 3 — existing zip modal design) -->
                <div class="modal fade" id="cvPoZipModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvPoZipTitle">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content" style="border:none;border-radius:0;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                                    <h5 class="modal-title" id="cvPoZipTitle" style="font-size:15.5px;font-weight:800;">ZIP Purchase Orders</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-it-field">
                                    <label>Status</label>
                                    <div class="cv-zip-status">
                                        <label class="cv-zip-radio"><input type="radio" name="cvPoZipStatus" value="All" checked><span class="cv-zip-pill"><i class="bi bi-circle-half"></i>All</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvPoZipStatus" value="New"><span class="cv-zip-pill"><i class="bi bi-plus-circle"></i>New</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvPoZipStatus" value="Cancelled"><span class="cv-zip-pill"><i class="bi bi-x-circle"></i>Cancelled</span></label>
                                        <label class="cv-zip-radio"><input type="radio" name="cvPoZipStatus" value="Confirmed"><span class="cv-zip-pill"><i class="bi bi-check-circle"></i>Confirmed</span></label>
                                    </div>
                                </div>
                                <div class="cv-it-field"><label>From Date:</label><input type="date" class="form-control" id="cvPoZipFrom"></div>
                                <div class="cv-it-field mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvPoZipTo"></div>
                                <div class="cv-zip-note"><i class="bi bi-info-circle me-1"></i>Purchase orders matching the selected status and date range will be bundled into a single ZIP file.</div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvPoZipSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        /* Create New Purchase Order -> fullscreen modal */
                        var poNewBtn = document.getElementById('cvPoNewBtn'),
                            poModal = document.getElementById('cvNewPOModal');
                        if (poNewBtn && poModal) {
                            poNewBtn.addEventListener('click', function() {
                                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(poModal).show();
                            });
                        }

                        /* Items: add row + amount calc + confirm (lock) / delete — invoice modal madhiri */
                        var poAdd = document.getElementById('cvPoAddItem'),
                            poBody = document.getElementById('cvPoItemBody');

                        function poBlankRow() {
                            var tr = document.createElement('tr');
                            tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                                '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                                '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                                '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">Unit</div></td>' +
                                '<td><input type="number" class="form-control" placeholder="Rate" step="0.01"></td>' +
                                '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                                '<td><span class="cv-inv-amt">₹ 0.00</span></td>' +
                                '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                            return tr;
                        }

                        /* Toolbar ➕ -> open Add New Item modal (#cvEstAddItemModal — estimates design) */
                        var poItemModal = document.getElementById('cvEstAddItemModal');
                        if (poAdd && poItemModal && window.bootstrap) {
                            poAdd.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(poItemModal).show();
                            });
                        }

                        /* Stacked modal backdrop z-index fix (PO + item modal) */
                        ['#cvNewPOModal', '#cvEstAddItemModal'].forEach(function(id) {
                            var el = document.querySelector(id);
                            if (!el) return;
                            el.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        });

                        /* Add New Item submit -> validate + fill blank row in PO items */
                        var poItemSave = document.getElementById('cvEstItemSave');
                        if (poItemSave && poItemModal && poBody) {
                            poItemSave.addEventListener('click', function() {
                                var desc = document.getElementById('estItDesc').value.trim(),
                                    rate = document.getElementById('estItRateInr').value.trim();
                                if (!desc || !rate) {
                                    toast('Description and Rate - INR are required');
                                    return;
                                }
                                var tr = poBody.querySelector('tr:not(.cv-inv-row-locked)'),
                                    madeNew = false;
                                if (!tr) {
                                    tr = poBlankRow();
                                    madeNew = true;
                                }
                                var tax = document.getElementById('estItTax1').value,
                                    longDesc = document.getElementById('estItLongDesc').value.trim(),
                                    unit = document.getElementById('estItUnit').value.trim();
                                tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                                    '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                                    '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                                    '<td><input type="number" class="form-control" value="1" min="0"><div class="cv-inv-unit">' + (unit || 'Unit') + '</div></td>' +
                                    '<td><input type="number" class="form-control" value="' + parseFloat(rate).toFixed(2) + '" step="0.01"></td>' +
                                    '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                                    '<td><select class="form-select"><option ' + (tax === 'No Tax' ? 'selected' : '') + '>No Tax</option><option ' + (tax === 'GST 5%' ? 'selected' : '') + '>GST 5%</option><option ' + (tax === 'GST 12%' ? 'selected' : '') + '>GST 12%</option><option ' + (tax === 'GST 18%' ? 'selected' : '') + '>GST 18%</option></select></td>' +
                                    '<td><span class="cv-inv-amt">₹ ' + parseFloat(rate).toFixed(2) + '</span></td>' +
                                    '<td><button type="button" class="cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>';
                                tr.querySelector('textarea').value = desc;
                                tr.cells[2].querySelector('textarea').value = longDesc;
                                if (madeNew) poBody.appendChild(tr);

                                // reset form + close
                                ['estItDesc', 'estItLongDesc', 'estItRateInr', 'estItHsn', 'estItRateUsd', 'estItUnit'].forEach(function(id) {
                                    document.getElementById(id).value = '';
                                });
                                document.getElementById('estItTax1').value = 'No Tax';
                                document.getElementById('estItTax2').value = 'No Tax';
                                document.getElementById('estItGroup').value = '';
                                bootstrap.Modal.getOrCreateInstance(poItemModal).hide();
                                toast('Item "' + desc + '" added to purchase order');
                            });
                        }

                        /* Items amount calc + confirm/delete — PO table */
                        document.addEventListener('input', function(e) {
                            var t = e.target;
                            if (!t.closest || !t.closest('#cvPoItemBody')) return;
                            var row = t.closest('tr');
                            if (!row || row.classList.contains('cv-inv-row-locked')) return;
                            var qty = parseFloat(row.cells[3].querySelector('input').value) || 0,
                                rate = parseFloat(row.cells[4].querySelector('input').value) || 0;
                            row.querySelector('.cv-inv-amt').textContent = '₹ ' + (qty * rate).toFixed(2);
                        });

                        if (poBody) {
                            poBody.addEventListener('click', function(e) {
                                var check = e.target.closest('.cv-inv-check'),
                                    del = e.target.closest('.cv-inv-row-del'),
                                    row;
                                if (del) {
                                    row = del.closest('tr');
                                    if (row) row.remove();
                                    if (poBody && !poBody.querySelector('tr')) poBody.appendChild(poBlankRow());
                                    return;
                                }
                                if (!check) return;
                                row = check.closest('tr');
                                if (!row || row.classList.contains('cv-inv-row-locked')) return;
                                row.classList.add('cv-inv-row-locked');
                                row.querySelectorAll('input, select, textarea').forEach(function(el) {
                                    el.setAttribute('readonly', 'readonly');
                                    el.setAttribute('disabled', 'disabled');
                                });
                                check.className = 'cv-inv-row-del';
                                check.title = 'Delete item';
                                check.innerHTML = '<i class="bi bi-trash"></i>';
                                if (poAdd) poBody.appendChild(poBlankRow());
                            });
                        }

                        /* Submit -> success toast */
                        var poSubmit = document.getElementById('cvPoSubmit');
                        if (poSubmit && poModal) {
                            poSubmit.addEventListener('click', function() {
                                bootstrap.Modal.getOrCreateInstance(poModal).hide();
                                toast('Purchase order PO-163 created successfully');
                            });
                        }

                        /* Zip Purchase Orders -> modal */
                        var poZipBtn = document.getElementById('cvPoZipBtn'),
                            poZipModal = document.getElementById('cvPoZipModal');
                        if (poZipBtn && poZipModal) {
                            poZipBtn.addEventListener('click', function() {
                                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(poZipModal).show();
                            });
                        }

                        /* Zip submit -> validate date range + toast */
                        var poZipSubmit = document.getElementById('cvPoZipSubmit');
                        if (poZipSubmit && poZipModal) {
                            poZipSubmit.addEventListener('click', function() {
                                var from = document.getElementById('cvPoZipFrom').value,
                                    to = document.getElementById('cvPoZipTo').value;
                                if (from && to && from > to) {
                                    toast('From Date cannot be after To Date');
                                    return;
                                }
                                var statusEl = document.querySelector('input[name="cvPoZipStatus"]:checked'),
                                    status = statusEl ? statusEl.value : 'All';
                                bootstrap.Modal.getOrCreateInstance(poZipModal).hide();
                                var msg = 'Preparing ZIP of ' + status.toLowerCase() + ' purchase orders';
                                if (from && to) msg += ' from ' + from + ' to ' + to;
                                toast(msg + '...');
                            });
                        }
                    });
            </div><!-- End Tab: purchase_orders -->

            <!-- ==================== Tab: subscriptions ==================== -->
            <div class="cv-tab-panel" id="cvTab-subscriptions" style="display: none;">
                <!-- Subscriptions — title + New Subscription + table flow -->
                <style>
                    .cv-sub-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-sub-title { font-size: 16px; font-weight: 800; color: var(--ink-900); margin: 0; }
                    #cvNewSubModal.modal { z-index: 1075; }
                    .cv-sub-field { margin-bottom: 14px; }
                    .cv-sub-field label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-sub-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-sub-field .form-control, .cv-sub-field .form-select { border-radius: 10px; font-size: 13.5px; }
                    .cv-sub-row { display: flex; gap: 14px; }
                    .cv-sub-row>.cv-sub-field { flex: 1; min-width: 0; margin-bottom: 14px; }
                </style>

                <div class="cv-sub-head ms-3 mb-0 mt-3">
                    <button type="button" class="btn btn-primary" id="cvSubNewBtn"><i class="bi bi-plus-lg me-1"></i>New Subscription</button>
                </div>

                <!-- Subscriptions table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="subscriptions">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="subscriptionsTable">
                            <thead>
                                <tr><th>#</th><th>Subscription Name</th><th>Project</th><th>Status</th><th>Next Billing Cycle</th><th>Date Subscribed</th><th>Last Sent</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">1</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">HRMS Subscription</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Solar Installation                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Active</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    01-10-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    01-04-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    01-09-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">2</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Hosting — Business Yearly</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    AMC Renewal                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Cancelled</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    01-01-2027                                                                                            </td>
                                                                                    <td>
                                                                                                    15-01-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    15-08-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">3</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Cloud Backup Plus</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Event Management                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Paused</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    10-10-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    10-05-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    10-09-2026                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- New Subscription modal (centered — second image design flow) -->
                <div class="modal fade" id="cvNewSubModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvNewSubTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-arrow-repeat"></i></div>
                                    <h5 class="modal-title" id="cvNewSubTitle" style="font-size:15.5px;font-weight:800;">New Subscription</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-sub-field"><label><span class="req">*</span>Subscription Name</label><input type="text" class="form-control" id="subName" autocomplete="off"></div>
                                <div class="cv-sub-field"><label>Description</label><textarea class="form-control" id="subDesc" rows="3" placeholder="Short description of this subscription..."></textarea></div>
                                <div class="cv-sub-field">
                                    <label><span class="req">*</span>Billing Plan</label>
                                    <select class="form-select" id="subPlan">
                                        <option value="">Select plan</option>
                                        <option>Basic Monthly — ₹ 1,999</option>
                                        <option>Business Yearly — ₹ 19,999</option>
                                        <option>Enterprise Yearly — ₹ 49,999</option>
                                    </select>
                                </div>
                                <div class="cv-sub-row">
                                    <div class="cv-sub-field"><label><span class="req">*</span>Quantity</label><input type="number" class="form-control" id="subQty" value="1" min="1"></div>
                                    <div class="cv-sub-field"><label><span class="req">*</span>First Billing Date</label><input type="date" class="form-control" id="subFirstDate" value="2026-10-01"></div>
                                </div>
                                <div class="cv-sub-field"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                                <div class="cv-sub-row">
                                    <div class="cv-sub-field"><label><span class="req">*</span>Currency</label><select class="form-select"><option selected>INR ₹</option><option>USD $</option></select></div>
                                    <div class="cv-sub-field"><label>Status</label><select class="form-select" id="subStatus">
                                            <option selected>Active</option>
                                            <option>Paused</option>
                                            <option>Cancelled</option>
                                        </select></div>
                                </div>
                                <div class="cv-sub-row">
                                    <div class="cv-sub-field"><label>Tax 1</label><select class="form-select">
                                            <option selected>No Tax</option>
                                            <option>GST 5%</option>
                                            <option>GST 12%</option>
                                            <option>GST 18%</option>
                                        </select></div>
                                    <div class="cv-sub-field"><label>Tax 2</label><select class="form-select">
                                            <option selected>No Tax</option>
                                            <option>GST 5%</option>
                                            <option>GST 12%</option>
                                            <option>GST 18%</option>
                                        </select></div>
                                </div>
                                <div class="cv-sub-field mb-0"><label>Terms &amp; Conditions</label><textarea class="form-control" rows="3" placeholder="Enter customer terms &amp; conditions to be displayed before subscribe to the subscription."></textarea></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvSubSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        /* New Subscription -> centered modal */
                        var subNewBtn = document.getElementById('cvSubNewBtn'),
                            subModal = document.getElementById('cvNewSubModal');
                        if (subNewBtn && subModal && window.bootstrap) {
                            subNewBtn.addEventListener('click', function() {
                                var nm = document.getElementById('subName');
                                if (nm) nm.value = '';
                                var ds = document.getElementById('subDesc');
                                if (ds) ds.value = '';
                                var pl = document.getElementById('subPlan');
                                if (pl) pl.value = '';
                                var qt = document.getElementById('subQty');
                                if (qt) qt.value = '1';
                                bootstrap.Modal.getOrCreateInstance(subModal).show();
                            });
                        }

                        /* Backdrop z-index fix for stacked modal */
                        if (subModal) {
                            subModal.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(subModal).zIndex, 10) || 1075;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        }

                        /* Submit -> validate required + success toast */
                        var subSubmit = document.getElementById('cvSubSubmit');
                        if (subSubmit && subModal) {
                            subSubmit.addEventListener('click', function() {
                                var name = document.getElementById('subName'),
                                    plan = document.getElementById('subPlan');
                                var invalid = null;
                                [name, plan].forEach(function(el) {
                                    if (!el) return;
                                    var bad = !el.value.trim();
                                    el.style.borderColor = bad ? '#dc2626' : '';
                                    if (bad && !invalid) invalid = el;
                                });
                                if (invalid) {
                                    toast('Subscription Name and Billing Plan are required');
                                    invalid.focus();
                                    return;
                                }
                                bootstrap.Modal.getOrCreateInstance(subModal).hide();
                                toast('Subscription "' + name.value.trim() + '" created successfully');
                            });
                            ['subName', 'subPlan'].forEach(function(id) {
                                var el = document.getElementById(id);
                                if (el) el.addEventListener('input', function() { this.style.borderColor = ''; });
                            });
                        }
                    });
            </div><!-- End Tab: subscriptions -->

            <!-- ==================== Tab: expenses ==================== -->
            <div class="cv-tab-panel" id="cvTab-expenses" style="display: none;">
                <!-- Expenses — title + Record Expense + year + KPI cards + table flow -->
                <style>
                    .cv-exp-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-exp-title { font-size: 16px; font-weight: 800; color: var(--ink-900); margin: 0; }
                    .cv-exp-year { max-width: 130px; margin-bottom: 14px; font-size: 13px; font-weight: 600; border-radius: 10px; }
                    .cv-exp-kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 10px; margin-bottom: 16px; }
                    .cv-exp-kpi { border: 1px solid #eef0f3; border-radius: 10px; padding: 12px 16px; background: #fff; transition: transform .15s ease, box-shadow .15s ease; }
                    .cv-exp-kpi:hover { transform: translateY(-2px); box-shadow: 0 8px 18px rgba(16, 24, 40, .07); }
                    .cv-exp-kpi .k { font-size: 12.5px; font-weight: 700; margin-bottom: 4px; }
                    .cv-exp-kpi .v { font-size: 15.5px; font-weight: 800; }
                    .cv-exp-kpi.c-green .k, .cv-exp-kpi.c-green .v { color: var(--primary-dark, #0f7a38); }
                    .cv-exp-kpi.c-amber .k, .cv-exp-kpi.c-amber .v { color: #d97706; }
                    .cv-exp-kpi.c-red .k, .cv-exp-kpi.c-red .v { color: #dc2626; }
                    #cvNewExpenseModal.modal { z-index: 1055; }
                    #cvNewExpenseModal .modal-content { border: none; border-radius: 0; display: flex; flex-direction: column; height: 100%; }
                    #cvNewExpenseModal .modal-body { flex: 1 1 auto; min-height: 0; overflow-y: auto; background: #f4f6f8; }
                    #cvNewCatModal.modal { z-index: 1075; }
                    .cv-exp-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: start; }
                    @media (max-width: 900px) { .cv-exp-grid { grid-template-columns: 1fr; } }
                    .cv-exp-card { background: #fff; border: 1px solid #eef0f3; border-radius: 12px; overflow: hidden; }
                    .cv-exp-card-head { padding: 14px 18px; border-bottom: 1px solid #eef0f3; font-size: 14px; font-weight: 800; color: var(--ink-900); }
                    .cv-exp-card-body { padding: 18px; }
                    .cv-exp-field { margin-bottom: 14px; }
                    .cv-exp-field label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-exp-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-exp-field label i { color: var(--ink-500); }
                    .cv-exp-field .form-control, .cv-exp-field .form-select { border-radius: 10px; font-size: 13.5px; }
                    .cv-exp-row { display: flex; gap: 14px; }
                    .cv-exp-row>.cv-exp-field { flex: 1; min-width: 0; margin-bottom: 14px; }
                    .cv-exp-cat-wrap { display: flex; gap: 8px; }
                    .cv-exp-cat-wrap .form-select { flex: 1; min-width: 0; }
                    .cv-exp-cat-add { width: 38px; height: 38px; flex: 0 0 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; padding: 0; }
                    .cv-exp-check { display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 14px; cursor: pointer; }
                </style>

                <div class="cv-exp-head justify-content-start mt-3 ms-3">
                    <select class="form-select mb-0 bg-white form-select-sm cv-exp-year" aria-label="Year">
                        <option selected>2026</option>
                        <option>2025</option>
                        <option>2024</option>
                    </select>
                    <button type="button" class="btn btn-primary" id="cvExpNewBtn"><i class="bi bi-plus-lg me-1"></i>Record Expense</button>
                </div>


                <!-- Summary KPI cards (image colors) -->
                <div class="cv-exp-kpis ms-3 mb-0 me-3">
                    <div class="cv-exp-kpi c-amber"><div class="k">Total</div><div class="v">₹ 12,600</div></div>
                    <div class="cv-exp-kpi c-green"><div class="k">Billable</div><div class="v">₹ 4,600</div></div>
                    <div class="cv-exp-kpi c-amber"><div class="k">Non Billable</div><div class="v">₹ 8,000</div></div>
                    <div class="cv-exp-kpi c-red"><div class="k">Not Invoiced</div><div class="v">₹ 4,600</div></div>
                    <div class="cv-exp-kpi c-green"><div class="k">Billed</div><div class="v">₹ 8,000</div></div>
                </div>

                <!-- Expenses table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="expenses">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="expensesTable">
                            <thead>
                                <tr><th>#</th><th>Category</th><th>Sub Category</th><th>Amount</th><th>Name</th><th>Receipt</th><th>Date</th><th>Project</th><th>Attachment</th><th>Invoice</th><th>Reference #</th><th>Payment Mode</th><th>Vendor</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">1</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Travel                                                                                            </td>
                                                                                    <td>
                                                                                                    Site visit cab                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 1,200</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Karthik R                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">View</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    05-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    Solar Installation                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">cab-receipt.pdf</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000112</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">EXP-001</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Cash                                                                                            </td>
                                                                                    <td>
                                                                                                    Fast Cabs                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">2</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Printing                                                                                            </td>
                                                                                    <td>
                                                                                                    Brochures                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 3,400</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Divya M                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">View</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    28-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    Event Management                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">brochure.pdf</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000098</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">EXP-002</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Bank Transfer                                                                                            </td>
                                                                                    <td>
                                                                                                    Print World                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">3</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Software                                                                                            </td>
                                                                                    <td>
                                                                                                    Cloud subscription                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 8,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Admin                                                                                            </td>
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);">—</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    15-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    AMC Renewal                                                                                            </td>
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);">—</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">INV-000087</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">EXP-003</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    UPI                                                                                            </td>
                                                                                    <td>
                                                                                                    Zen Cloud                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Record Expense modal — fullscreen (image 2 fields, two cards) -->
                <div class="modal fade" id="cvNewExpenseModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content cv-inv-modal">
                            <div class="cv-contact-head">
                                <div class="cv-contact-head-l">
                                    <div class="cv-contact-ava"><i class="bi bi-receipt"></i></div>
                                    <div style="min-width:0;">
                                        <h3 class="mb-0">Record Expense</h3>
                                        <div class="cv-contact-sub">GG COMPANY · New expense</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="cv-exp-grid">
                                    <!-- Left card -->
                                    <div class="cv-exp-card">
                                        <div class="cv-exp-card-head">Add new Expense of GG COMPANY</div>
                                        <div class="cv-exp-card-body">
                                            <div class="cv-exp-field"><label>Vendors</label><select class="form-select" id="expVendor">
                                                    <option value="" selected>None</option>
                                                    <option>Fast Cabs</option>
                                                    <option>Print World</option>
                                                    <option>Zen Cloud</option>
                                                    <option>Office Supplies Co</option>
                                                </select></div>
                                            <div class="cv-exp-field"><label><i class="bi bi-info-circle me-1"></i>Name</label><input type="text" class="form-control" id="expName" autocomplete="off"></div>
                                            <div class="cv-exp-field"><label><i class="bi bi-info-circle me-1"></i>Note</label><textarea class="form-control" id="expNote" rows="4"></textarea></div>
                                            <div class="cv-exp-field">
                                                <label><span class="req">*</span>Expense Category</label>
                                                <div class="cv-exp-cat-wrap">
                                                    <select class="form-select" id="expCat">
                                                        <option value="" selected>Non selected</option>
                                                        <option>Travel</option>
                                                        <option>Printing</option>
                                                        <option>Software</option>
                                                        <option>Office Supplies</option>
                                                        <option>Marketing</option>
                                                    </select>
                                                    <button type="button" class="btn btn-primary cv-exp-cat-add" id="expCatAdd" title="Add category"><i class="bi bi-plus-lg"></i></button>
                                                </div>
                                            </div>
                                            <div class="cv-exp-field"><label>Expense Sub Category</label><select class="form-select" id="expSubCat">
                                                    <option value="" selected>Non selected</option>
                                                    <option>Cab</option>
                                                    <option>Fuel</option>
                                                    <option>Brochures</option>
                                                    <option>Subscription</option>
                                                </select></div>
                                            <div class="cv-exp-field"><label><span class="req">*</span>Expense Date</label><input type="date" class="form-control" id="expDate" value="2026-09-23"></div>
                                            <div class="cv-exp-field"><label><span class="req">*</span>Amount</label><input type="number" class="form-control" id="expAmount" step="0.01"></div>
                                            <label class="cv-exp-check"><input type="checkbox" class="form-check-input" id="expBillable"> Billable</label>
                                            <div class="cv-exp-field"><label>Customer</label><input type="text" class="form-control" value="GG COMPANY"></div>
                                            <div class="cv-exp-field mb-0"><label>Project</label><select class="form-select">
                                                    <option selected>Select and begin typing</option>
                                                    <option>Solar Installation</option>
                                                    <option>Event Management</option>
                                                    <option>AMC Renewal</option>
                                                </select></div>
                                        </div>
                                    </div>
                                    <!-- Right card -->
                                    <div class="cv-exp-card">
                                        <div class="cv-exp-card-head">Advanced Options</div>
                                        <div class="cv-exp-card-body">
                                            <div class="cv-exp-field"><label><span class="req">*</span>Currency</label><select class="form-select" id="expCurrency">
                                                    <option selected>INR ₹</option>
                                                    <option>USD $</option>
                                                </select></div>
                                            <div class="cv-exp-row">
                                                <div class="cv-exp-field"><label>Tax 1</label><select class="form-select">
                                                        <option selected>No Tax</option>
                                                        <option>GST 5%</option>
                                                        <option>GST 12%</option>
                                                        <option>GST 18%</option>
                                                    </select></div>
                                                <div class="cv-exp-field"><label>Tax 2</label><select class="form-select">
                                                        <option selected>No Tax</option>
                                                        <option>GST 5%</option>
                                                        <option>GST 12%</option>
                                                        <option>GST 18%</option>
                                                    </select></div>
                                            </div>
                                            <div class="cv-exp-field"><label>Attatment</label><input type="file" class="form-control" id="expFile"></div>
                                            <div class="cv-exp-row">
                                                <div class="cv-exp-field"><label>Payment Mode</label><select class="form-select" id="expPayMode">
                                                        <option value="" selected>Non selected</option>
                                                        <option>Cash</option>
                                                        <option>Bank Transfer</option>
                                                        <option>UPI</option>
                                                        <option>Card</option>
                                                        <option>Cheque</option>
                                                    </select></div>
                                                <div class="cv-exp-field"><label>Reference #</label><input type="text" class="form-control" id="expRef" autocomplete="off"></div>
                                            </div>
                                            <div class="cv-exp-field"><label>Repeat everyss</label><select class="form-select">
                                                    <option value="" selected>Non selected</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                    <option>Yearly</option>
                                                </select></div>
                                            <div class="cv-exp-field"><label>Staff</label><select class="form-select">
                                                    <option value="" selected>Nothing selected</option>
                                                    <option>Admin</option>
                                                    <option>Karthik R</option>
                                                    <option>Divya M</option>
                                                </select></div>
                                            <div class="cv-exp-row">
                                                <div class="cv-exp-field"><label>Payment Account</label><select class="form-select">
                                                        <option value="" selected>Non selected</option>
                                                        <option>HDFC</option>
                                                        <option>ICICI</option>
                                                        <option>Cash in Hand</option>
                                                    </select></div>
                                                <div class="cv-exp-field"><label>Deposit To</label><select class="form-select">
                                                        <option value="" selected>Non selected</option>
                                                        <option>Cash Account</option>
                                                        <option>HDFC</option>
                                                        <option>ICICI</option>
                                                    </select></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cv-inv-footer">
                                <span class="cv-inv-hint" style="font-size:11.5px;color:#9ca3af;">* marked fields are required</span>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="cvExpSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Category modal (image fields — centered) -->
                <div class="modal fade" id="cvNewCatModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvNewCatTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvNewCatTitle" style="font-size:15.5px;font-weight:800;">New Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-exp-field"><label><span class="req">*</span>Category Name</label><input type="text" class="form-control" id="newCatName" autocomplete="off"></div>
                                <div class="cv-exp-field mb-0"><label>Category Description</label><textarea class="form-control" id="newCatDesc" rows="4"></textarea></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="newCatSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        /* Record Expense -> fullscreen modal */
                        var expNewBtn = document.getElementById('cvExpNewBtn'),
                            expModal = document.getElementById('cvNewExpenseModal');
                        if (expNewBtn && expModal && window.bootstrap) {
                            expNewBtn.addEventListener('click', function() {
                                ['expName', 'expNote', 'expAmount', 'expRef'].forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (el) { el.value = ''; el.style.borderColor = ''; }
                                });
                                ['expVendor', 'expCat', 'expSubCat', 'expPayMode'].forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (el) { el.value = ''; el.style.borderColor = ''; }
                                });
                                var dt = document.getElementById('expDate');
                                if (dt) { dt.value = '2026-09-23'; dt.style.borderColor = ''; }
                                var bb = document.getElementById('expBillable');
                                if (bb) bb.checked = false;
                                var fl = document.getElementById('expFile');
                                if (fl) fl.value = '';
                                bootstrap.Modal.getOrCreateInstance(expModal).show();
                            });
                        }

                        /* Category ➕ -> New Category modal */
                        var catAdd = document.getElementById('expCatAdd'),
                            newCatModal = document.getElementById('cvNewCatModal');
                        if (catAdd && newCatModal && window.bootstrap) {
                            catAdd.addEventListener('click', function() {
                                var nm = document.getElementById('newCatName'),
                                    ds = document.getElementById('newCatDesc');
                                if (nm) { nm.value = ''; nm.style.borderColor = ''; }
                                if (ds) ds.value = '';
                                bootstrap.Modal.getOrCreateInstance(newCatModal).show();
                            });
                        }

                        /* Stacked modal backdrop fix (expense fullscreen + category modal) */
                        ['#cvNewExpenseModal', '#cvNewCatModal'].forEach(function(id) {
                            var el = document.querySelector(id);
                            if (!el) return;
                            el.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(el).zIndex, 10) || 1055;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        });

                        /* Category name clear while typing */
                        var newCatNameEl = document.getElementById('newCatName');
                        if (newCatNameEl) newCatNameEl.addEventListener('input', function() { this.style.borderColor = ''; });

                        /* New Category submit -> validate + add option to select + toast */
                        var newCatSubmit = document.getElementById('newCatSubmit');
                        if (newCatSubmit && newCatModal) {
                            newCatSubmit.addEventListener('click', function() {
                                var nm = document.getElementById('newCatName');
                                var name = nm.value.trim();
                                if (!name) {
                                    nm.style.borderColor = '#dc2626';
                                    toast('Category Name is required');
                                    nm.focus();
                                    return;
                                }
                                var sel = document.getElementById('expCat'),
                                    exists = false;
                                if (sel) {
                                    Array.prototype.forEach.call(sel.options, function(op) {
                                        if (op.text === name) exists = true;
                                    });
                                    if (!exists) {
                                        var op = document.createElement('option');
                                        op.value = name;
                                        op.text = name;
                                        sel.appendChild(op);
                                    }
                                    sel.value = name;
                                    sel.style.borderColor = '';
                                }
                                bootstrap.Modal.getOrCreateInstance(newCatModal).hide();
                                toast('Category "' + name + '" added');
                            });
                        }

                        /* Clear red border while typing */
                        ['expCat', 'expDate', 'expAmount'].forEach(function(id) {
                            var el = document.getElementById(id);
                            if (el) el.addEventListener('input', function() { this.style.borderColor = ''; });
                        });

                        /* Submit -> validate required + success toast */
                        var expSubmit = document.getElementById('cvExpSubmit');
                        if (expSubmit && expModal) {
                            expSubmit.addEventListener('click', function() {
                                var req = ['expCat', 'expDate', 'expAmount'],
                                    invalid = null;
                                req.forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (!el) return;
                                    var bad = !String(el.value).trim();
                                    el.style.borderColor = bad ? '#dc2626' : '';
                                    if (bad && !invalid) invalid = el;
                                });
                                if (invalid) {
                                    toast('Expense Category, Date and Amount are required');
                                    invalid.focus();
                                    return;
                                }
                                var amt = document.getElementById('expAmount').value,
                                    cat = document.getElementById('expCat').value;
                                bootstrap.Modal.getOrCreateInstance(expModal).hide();
                                toast('Expense of ₹ ' + amt + ' (' + cat + ') recorded successfully');
                            });
                        }
                    });
            </div><!-- End Tab: expenses -->

            <!-- ==================== Tab: contracts ==================== -->
            <div class="cv-tab-panel" id="cvTab-contracts" style="display: none;">
                <!-- Contracts — title + New Contract + table flow -->
                <style>
                    .cv-con-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-con-title { font-size: 16px; font-weight: 800; color: var(--ink-900); margin: 0; }
                    #cvNewContractModal.modal { z-index: 1075; }
                    #cvConTypeModal.modal { z-index: 1085; }
                    .cv-con-field { margin-bottom: 14px; }
                    .cv-con-field label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-con-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-con-field label i { color: var(--ink-500); }
                    .cv-con-field .form-control, .cv-con-field .form-select { border-radius: 10px; font-size: 13.5px; }
                    .cv-con-row { display: flex; gap: 14px; }
                    .cv-con-row>.cv-con-field { flex: 1; min-width: 0; margin-bottom: 14px; }
                    .cv-con-checks { display: flex; align-items: center; gap: 22px; margin-bottom: 16px; flex-wrap: wrap; }
                    .cv-con-check { display: flex; align-items: center; gap: 7px; font-size: 13px; font-weight: 600; color: #374151; cursor: pointer; margin: 0; }
                    .cv-con-val-wrap { display: flex; align-items: stretch; }
                    .cv-con-val-wrap .form-control { border-radius: 10px 0 0 10px; flex: 1; min-width: 0; }
                    .cv-con-val-wrap .cv-con-suffix { display: flex; align-items: center; padding: 0 14px; background: #f8f9fa; border: 1px solid #dee2e6; border-left: 0; border-radius: 0 10px 10px 0; font-size: 13px; font-weight: 700; color: var(--ink-500); }
                    .cv-con-type-wrap { display: flex; gap: 8px; }
                    .cv-con-type-wrap .form-select { flex: 1; min-width: 0; }
                    .cv-con-type-add { width: 38px; height: 38px; flex: 0 0 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; padding: 0; }
                </style>

                <div class="cv-con-head mt-3 mb-0 ms-3">
                    <button type="button" class="btn btn-primary" id="cvConNewBtn"><i class="bi bi-plus-lg me-1"></i>New contract</button>
                </div>

                <!-- Contracts table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="contracts">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="contractsTable">
                            <thead>
                                <tr><th>#</th><th>Subject</th><th>Contract Type</th><th>Contract Value</th><th>Start Date</th><th>End Date</th><th>Project</th><th>Signature</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">1</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Event services agreement</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Service                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 3,60,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    01-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    31-08-2027                                                                                            </td>
                                                                                    <td>
                                                                                                    Event Management                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Signed</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">2</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Annual maintenance contract</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Maintenance                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 72,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    01-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    31-07-2027                                                                                            </td>
                                                                                    <td>
                                                                                                    AMC Renewal                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Signed</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">3</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Solar installation contract</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Project                                                                                            </td>
                                                                                    <td>
                                                                                                    <strong>₹ 4,50,000</strong>
                                                                                            </td>
                                                                                    <td>
                                                                                                    15-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    15-12-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    Solar Installation                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Pending</span>                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Contract Information modal (second image fields — centered) -->
                <div class="modal fade" id="cvNewContractModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvConTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="cv-contact-ava" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-earmark-ruled"></i></div>
                                    <h5 class="modal-title" id="cvConTitle" style="font-size:15.5px;font-weight:800;">Contract Information</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-con-checks">
                                    <label class="cv-con-check"><input type="checkbox" class="form-check-input" id="conTrash"> <i class="bi bi-trash"></i> Trash</label>
                                    <label class="cv-con-check"><input type="checkbox" class="form-check-input" id="conHide"> Hide from customer</label>
                                </div>
                                <div class="cv-con-field"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" id="conCustomer" value="GG COMPANY" readonly></div>
                                <div class="cv-con-field"><label><i class="bi bi-info-circle me-1"></i><span class="req">*</span>Subject</label><input type="text" class="form-control" id="conSubject" autocomplete="off"></div>
                                <div class="cv-con-field">
                                    <label>Contract Value</label>
                                    <div class="cv-con-val-wrap"><input type="number" class="form-control" id="conValue" step="0.01"><span class="cv-con-suffix">₹</span></div>
                                </div>
                                <div class="cv-con-field">
                                    <label>Contract type</label>
                                    <div class="cv-con-type-wrap">
                                        <select class="form-select" id="conType">
                                            <option value="" selected>Non selected</option>
                                            <option>Service</option>
                                            <option>Maintenance</option>
                                            <option>Project</option>
                                            <option>Retainer</option>
                                        </select>
                                        <button type="button" class="btn btn-primary cv-con-type-add" id="conTypeAdd" title="Add contract type"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                </div>
                                <div class="cv-con-row">
                                    <div class="cv-con-field"><label><span class="req">*</span>Start Date</label><input type="date" class="form-control" id="conStart" value="2026-09-23"></div>
                                    <div class="cv-con-field"><label>End Date</label><input type="date" class="form-control" id="conEnd"></div>
                                </div>
                                <div class="cv-con-field mb-0"><label>Contract description</label><textarea class="form-control" id="conDesc" rows="5"></textarea></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvConSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New contract type modal (image fields — centered) -->
                <div class="modal fade" id="cvConTypeModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvConTypeTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvConTypeTitle" style="font-size:15.5px;font-weight:800;">New contract type</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-con-field mb-0"><label><span class="req">*</span>Name</label><input type="text" class="form-control" id="conTypeName" autocomplete="off"></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="conTypeSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        /* New contract -> modal */
                        var conNewBtn = document.getElementById('cvConNewBtn'),
                            conModal = document.getElementById('cvNewContractModal');
                        if (conNewBtn && conModal && window.bootstrap) {
                            conNewBtn.addEventListener('click', function() {
                                ['conSubject', 'conValue', 'conDesc'].forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (el) { el.value = ''; el.style.borderColor = ''; }
                                });
                                var ty = document.getElementById('conType');
                                if (ty) ty.value = '';
                                var en = document.getElementById('conEnd');
                                if (en) en.value = '';
                                ['conTrash', 'conHide'].forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (el) el.checked = false;
                                });
                                bootstrap.Modal.getOrCreateInstance(conModal).show();
                            });
                        }

                        /* Backdrop z-index fix (stacked modal) */
                        if (conModal) {
                            conModal.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(conModal).zIndex, 10) || 1075;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        }
                        if (conTypeModal) {
                            conTypeModal.addEventListener('shown.bs.modal', function() {
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = 1084; /* below type modal 1085, above contract modal 1075 */
                            });
                        }

                        /* Contract type ➕ -> New contract type modal */
                        var conTypeAdd = document.getElementById('conTypeAdd'),
                            conTypeModal = document.getElementById('cvConTypeModal');
                        if (conTypeAdd && conTypeModal && window.bootstrap) {
                            conTypeAdd.addEventListener('click', function() {
                                var nm = document.getElementById('conTypeName');
                                if (nm) { nm.value = ''; nm.style.borderColor = ''; }
                                bootstrap.Modal.getOrCreateInstance(conTypeModal).show();
                            });
                        }

                        /* Contract type name clear while typing */
                        var conTypeNameEl = document.getElementById('conTypeName');
                        if (conTypeNameEl) conTypeNameEl.addEventListener('input', function() { this.style.borderColor = ''; });

                        /* New contract type submit -> validate + add option to select + toast */
                        var conTypeSubmit = document.getElementById('conTypeSubmit');
                        if (conTypeSubmit && conTypeModal) {
                            conTypeSubmit.addEventListener('click', function() {
                                var nm = document.getElementById('conTypeName'),
                                    name = nm.value.trim();
                                if (!name) {
                                    nm.style.borderColor = '#dc2626';
                                    toast('Name is required');
                                    nm.focus();
                                    return;
                                }
                                var sel = document.getElementById('conType'),
                                    exists = false;
                                if (sel) {
                                    Array.prototype.forEach.call(sel.options, function(op) {
                                        if (op.text === name) exists = true;
                                    });
                                    if (!exists) {
                                        var op = document.createElement('option');
                                        op.value = name;
                                        op.text = name;
                                        sel.appendChild(op);
                                    }
                                    sel.value = name;
                                    sel.style.borderColor = '';
                                }
                                bootstrap.Modal.getOrCreateInstance(conTypeModal).hide();
                                toast('Contract type "' + name + '" added');
                            });
                        }

                        /* Clear red border while typing */
                        ['conSubject'].forEach(function(id) {
                            var el = document.getElementById(id);
                            if (el) el.addEventListener('input', function() { this.style.borderColor = ''; });
                        });

                        /* Submit -> validate required + success toast */
                        var conSubmit = document.getElementById('cvConSubmit');
                        if (conSubmit && conModal) {
                            conSubmit.addEventListener('click', function() {
                                var subj = document.getElementById('conSubject'),
                                    start = document.getElementById('conStart'),
                                    invalid = null;
                                [subj, start].forEach(function(el) {
                                    if (!el) return;
                                    var bad = !String(el.value).trim();
                                    el.style.borderColor = bad ? '#dc2626' : '';
                                    if (bad && !invalid) invalid = el;
                                });
                                if (invalid) {
                                    toast('Subject and Start Date are required');
                                    invalid.focus();
                                    return;
                                }
                                bootstrap.Modal.getOrCreateInstance(conModal).hide();
                                toast('Contract "' + subj.value.trim() + '" created successfully');
                            });
                        }
                    });
            </div><!-- End Tab: contracts -->

            <!-- ==================== Tab: projects ==================== -->
            <div class="cv-tab-panel" id="cvTab-projects" style="display: none;">
                <!-- Projects — New Project + status KPI cards + table flow + Add new project fullscreen modal -->
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                <style>
                    .cv-prj-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-prj-kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 10px; margin-bottom: 16px; }
                    .cv-prj-kpi { border: 1px solid #eef0f3; border-radius: 10px; padding: 12px 16px; background: #fff; transition: transform .15s ease, box-shadow .15s ease; }
                    .cv-prj-kpi:hover { transform: translateY(-2px); box-shadow: 0 8px 18px rgba(16, 24, 40, .07); }
                    .cv-prj-kpi .k { font-size: 12.5px; font-weight: 700; margin-bottom: 4px; }
                    .cv-prj-kpi .v { font-size: 15.5px; font-weight: 800; }
                    .cv-prj-kpi.c-green .k, .cv-prj-kpi.c-green .v { color: var(--primary-dark, #0f7a38); }
                    .cv-prj-kpi.c-amber .k, .cv-prj-kpi.c-amber .v { color: #d97706; }
                    .cv-prj-kpi.c-red .k, .cv-prj-kpi.c-red .v { color: #dc2626; }
                    .cv-prj-kpi.c-dim .k, .cv-prj-kpi.c-dim .v { color: #9ca3af; }
                    .table-modern .cv-prj-prog { display: flex; align-items: center; gap: 8px; }
                    .table-modern .cv-prj-bar { flex: 1; min-width: 90px; max-width: 160px; height: 7px; border-radius: 99px; background: #eef0f3; overflow: hidden; }
                    .table-modern .cv-prj-bar>span { display: block; height: 100%; border-radius: 99px; background: var(--primary, #16a34a); }
                    .table-modern .cv-prj-pct { font-size: 12px; font-weight: 700; color: var(--ink-500); min-width: 34px; }
                    .table-modern .cv-prj-remain { font-weight: 700; }
                    .table-modern .cv-prj-remain.over { color: #dc2626; }
                    #cvNewProjectModal.modal { z-index: 1055; }
                    #cvNewProjectModal .modal-content { border: none; border-radius: 0; display: flex; flex-direction: column; height: 100%; }
                    #cvNewProjectModal .modal-body { flex: 1 1 auto; min-height: 0; overflow-y: auto; padding: 20px 24px; }
                    .cv-prj-tabs { display: flex; gap: 4px; border-bottom: 1px solid #e5e7eb; margin-bottom: 18px; }
                    .cv-prj-tab { border: none; background: none; padding: 9px 14px; font-size: 13px; font-weight: 700; color: var(--ink-500); border-bottom: 2px solid transparent; margin-bottom: -1px; }
                    .cv-prj-tab:hover { color: var(--primary-dark, #0f7a38); }
                    .cv-prj-tab.active { color: var(--primary-dark, #0f7a38); border-bottom-color: var(--primary-dark, #0f7a38); }
                    .cv-prj-pane { display: none; }
                    .cv-prj-pane.active { display: block; }
                    .cv-prj-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 28px; }
                    @media (max-width: 900px) { .cv-prj-grid { grid-template-columns: 1fr; } }
                    .cv-prj-field { margin-bottom: 14px; }
                    .cv-prj-field label { display: block; font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 4px; }
                    .cv-prj-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-prj-field .form-control, .cv-prj-field .form-select { font-size: 13px; border-radius: 8px; }
                    .cv-prj-field.full { grid-column: 1 / -1; }
                    .cv-prj-check { display: flex; align-items: center; gap: 8px; font-size: 12.5px; font-weight: 600; color: #374151; margin-bottom: 12px; }
                    .cv-prj-prog-wrap { margin-bottom: 16px; }
                    .cv-prj-prog-lbl { font-size: 12px; font-weight: 700; color: #374151; margin-bottom: 6px; }
                    .cv-prj-range { width: 100%; accent-color: var(--primary, #16a34a); }
                    .cv-prj-quill-wrap { border: 1px solid #d1d5db; border-radius: 10px; }
                    .cv-prj-quill-wrap .ql-toolbar { border: none !important; border-bottom: 1px solid #e5e7eb !important; border-radius: 10px 10px 0 0; font-family: 'Manrope', sans-serif; }
                    #cvPrjQuill .ql-editor { min-height: 130px; font-size: 13px; }
                    .cv-prj-footer { display: flex; align-items: center; justify-content: space-between; gap: 10px; border-top: 1px solid #eef0f3; padding: 14px 24px; flex-wrap: wrap; }
                    .cv-prj-footer .cv-inv-hint { font-size: 11.5px; color: #9ca3af; }
                    /* ---- Project Settings: grouped switch design ---- */
                    .cv-prj-set-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 14px; }
                    .cv-prj-set-card { border: 1px solid #eef0f3; border-radius: 12px; background: #fff; overflow: hidden; }
                    .cv-prj-set-head { display: flex; align-items: center; gap: 9px; padding: 11px 14px; background: #f8faf9; border-bottom: 1px solid #eef0f3; }
                    .cv-prj-set-head i { width: 26px; height: 26px; border-radius: 8px; background: var(--primary-light, #e7f5ec); color: var(--primary-dark, #0f7a38); display: inline-flex; align-items: center; justify-content: center; font-size: 13px; flex: 0 0 26px; }
                    .cv-prj-set-head .t { font-size: 12.5px; font-weight: 800; color: var(--ink-900); }
                    .cv-prj-set-head .c { margin-left: auto; font-size: 10.5px; font-weight: 800; color: var(--primary-dark, #0f7a38); background: var(--primary-light, #e7f5ec); border-radius: 99px; padding: 2px 8px; }
                    .cv-prj-set-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 9px 14px; border-bottom: 1px dashed #f1f3f5; }
                    .cv-prj-set-row:last-child { border-bottom: none; }
                    .cv-prj-set-row .lbl { font-size: 12px; font-weight: 600; color: #374151; }
                    .cv-prj-set-row .cust-switch { flex: 0 0 auto; }
                    .cv-prj-set-foot { display: flex; align-items: center; gap: 9px; margin-top: 14px; padding: 12px 14px; border: 1px dashed #fecaca; background: #fef7f7; border-radius: 12px; }
                    .cv-prj-set-foot i { color: #dc2626; }
                    .cv-prj-set-foot .lbl { font-size: 12px; font-weight: 700; color: #7f1d1d; }
                    .cv-prj-set-foot .cust-switch { margin-left: auto; }
                    .cv-prj-tabsbox { border: 1px solid #d1d5db; border-radius: 10px; padding: 8px 10px; display: flex; align-items: center; flex-wrap: wrap; gap: 6px; background: #fff; min-height: 42px; }
                    .cv-prj-tabsbox .cv-tag-chip { background: var(--primary-light, #e7f5ec); color: var(--primary-dark, #0f7a38); border: 1px solid rgba(15, 122, 56, .18); font-size: 11px; }
                    .cv-prj-tabsbox .cv-tag-chip .chip-x { border: none; background: none; color: inherit; font-size: 11px; padding: 0 0 0 4px; line-height: 1; opacity: .75; cursor: pointer; display: inline-flex; align-items: center; }
                    .cv-prj-tabsbox .cv-tag-chip .chip-x:hover { opacity: 1; color: #dc2626; }
                    .cv-prj-tabsbox .cv-prj-tabs-dd { margin-left: auto; }
                    .cv-prj-tabsbox .cv-prj-tabs-add { border: 1px solid #e5e7eb; background: #fff; border-radius: 8px; font-size: 11.5px; font-weight: 700; color: var(--ink-500); padding: 3px 9px; display: inline-flex; align-items: center; gap: 5px; }
                    .cv-prj-tabsbox .cv-prj-tabs-add:hover { border-color: var(--primary, #16a34a); color: var(--primary-dark, #0f7a38); }
                    .cv-prj-tabs-menu { font-size: 12.5px; max-height: 240px; overflow-y: auto; }
                    .cv-prj-tabs-menu .dropdown-item { padding: 6px 12px; display: flex; align-items: center; gap: 7px; }
                    .cv-prj-tabs-menu .dropdown-item .bi { font-size: 11px; color: var(--primary-dark, #0f7a38); visibility: hidden; }
                    .cv-prj-tabs-menu .dropdown-item.selected { background: var(--primary-soft, #eafaf1); font-weight: 700; color: var(--primary-dark, #0f7a38); }
                    .cv-prj-tabs-menu .dropdown-item.selected .bi { visibility: visible; }
                    .cv-prj-tabs-menu .dropdown-item.empty { color: #9ca3af; font-style: italic; pointer-events: none; }
                </style>

                <div class="cv-prj-head ms-3 mt-3">
                    <button type="button" class="btn btn-primary" id="cvPrjNewBtn"><i class="bi bi-plus-lg me-1"></i>New Project</button>
                </div>

                <!-- Status KPI cards (image 1 — Not Started, In Progress, On Hold, Cancelled, test, Finished) -->
                <div class="cv-prj-kpis ms-3 me-3 mb-0">
                    <div class="cv-prj-kpi c-dim"><div class="k">Not Started</div><div class="v">0</div></div>
                    <div class="cv-prj-kpi c-green"><div class="k">In Progress</div><div class="v">1</div></div>
                    <div class="cv-prj-kpi c-amber"><div class="k">On Hold</div><div class="v">1</div></div>
                    <div class="cv-prj-kpi c-dim"><div class="k">Cancelled</div><div class="v">0</div></div>
                    <div class="cv-prj-kpi c-red"><div class="k">test</div><div class="v">0</div></div>
                    <div class="cv-prj-kpi c-green"><div class="k">Finished</div><div class="v">1</div></div>
                </div>

                <!-- Projects table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="projects">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="projectsTable">
                            <thead>
                                <tr><th>#</th><th>Project Name</th><th>Tags</th><th>Project Progress</th><th>Start Date</th><th>Deadline</th><th>Remaining Days</th><th>Members</th><th>Status</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">1</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">ERP Rollout 2026</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">hot</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <div class="cv-prj-prog"><div class="cv-prj-bar"><span style="width:65%;"></span></div><span class="cv-prj-pct">65%</span></div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    01-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    15-11-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-prj-remain">54</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>gharuda SOFTWARE</span></span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>In Progress</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">2</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Website Revamp</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">low</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <div class="cv-prj-prog"><div class="cv-prj-bar"><span style="width:30%;"></span></div><span class="cv-prj-pct">30%</span></div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    10-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    30-11-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-prj-remain">69</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Karthik R</span></span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>On Hold</span>                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">3</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Mobile App Phase 1</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                                                                                                                </td>
                                                                                    <td>
                                                                                                    <div class="cv-prj-prog"><div class="cv-prj-bar"><span style="width:100%;"></span></div><span class="cv-prj-pct">100%</span></div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    05-08-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    20-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-prj-remain over">0</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Divya M</span></span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Finished</span>                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Add new project modal — fullscreen (image 2 fields) -->
                <div class="modal fade" id="cvNewProjectModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="cv-contact-head">
                                <div class="cv-contact-head-l">
                                    <div class="cv-contact-ava"><i class="bi bi-kanban"></i></div>
                                    <div style="min-width:0;">
                                        <h3 class="mb-0">Add new project</h3>
                                        <div class="cv-contact-sub">GG COMPANY · New project</div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="cv-prj-tabs">
                                    <button type="button" class="cv-prj-tab active" data-prjtab="project">Project</button>
                                    <button type="button" class="cv-prj-tab" data-prjtab="settings">Project Settings</button>
                                </div>

                                <!-- Project pane -->
                                <div class="cv-prj-pane active" data-prjpane="project">
                                    <div class="cv-prj-field"><label><span class="req">*</span>Project Name</label><input type="text" class="form-control" id="prjName" autocomplete="off"></div>
                                    <div class="cv-prj-field"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                                    <div class="cv-prj-grid">
                                        <div class="cv-prj-field"><label>Device</label><select class="form-select">
                                                <option value="" selected>Non selected</option>
                                                <option>Desktop</option>
                                                <option>Mobile</option>
                                                <option>Tablet</option>
                                            </select></div>
                                    </div>
                                    <label class="cv-prj-check"><input type="checkbox" id="prjCalcTasks" checked> Calculate progress through tasks</label>
                                    <div class="cv-prj-prog-wrap">
                                        <div class="cv-prj-prog-lbl">Progress <span id="prjProgVal">0%</span></div>
                                        <input type="range" class="cv-prj-range" id="prjProg" min="0" max="100" value="0">
                                    </div>
                                    <div class="cv-prj-grid">
                                        <div class="cv-prj-field"><label><span class="req">*</span>Billing Type</label><select class="form-select" id="prjBilling">
                                                <option selected>Fixed Rate</option>
                                                <option>Hourly Rate</option>
                                                <option>Project Hours</option>
                                            </select></div>
                                        <div class="cv-prj-field"><label>Status</label><select class="form-select" id="prjStatus">
                                                <option selected>In Progress</option>
                                                <option>Not Started</option>
                                                <option>On Hold</option>
                                                <option>Cancelled</option>
                                                <option>Finished</option>
                                            </select></div>
                                        <div class="cv-prj-field full"><label>Project Deadline Date Extend Limit</label><input type="text" class="form-control" id="prjDeadlineLimit"></div>
                                        <div class="cv-prj-field"><label>Total Rate</label><input type="text" class="form-control" id="prjTotalRate"></div>
                                        <div class="cv-prj-field"><label>Estimated Hours</label><input type="text" class="form-control" id="prjHours"></div>
                                        <div class="cv-prj-field"><label>Members</label><select class="form-select" id="prjMembers">
                                                <option selected>gharuda SOFTWARE</option>
                                                <option>Karthik R</option>
                                                <option>Divya M</option>
                                                <option>Arun Kumar</option>
                                            </select></div>
                                        <div class="cv-prj-field"><label>Follower</label><select class="form-select" id="prjFollower">
                                                <option value="" selected>Non selected</option>
                                                <option>Karthik R</option>
                                                <option>Divya M</option>
                                            </select></div>
                                        <div class="cv-prj-field"><label>Super Follower</label><select class="form-select" id="prjSuperFollower">
                                                <option value="" selected>Non selected</option>
                                                <option>Admin</option>
                                            </select></div>
                                        <div class="cv-prj-field"><label><span class="req">*</span>Start Date</label><input type="date" class="form-control" id="prjStart" value="2026-09-23"></div>
                                        <div class="cv-prj-field"><label>Deadline</label><input type="date" class="form-control" id="prjDeadline"></div>
                                        <div class="cv-prj-field full">
                                            <label><i class="bi bi-tag me-1"></i>Tags</label>
                                            <div class="nl-tags-wrap" style="max-width:100%;">
                                                <div class="nl-tags-chips"></div>
                                                <input type="text" class="nl-tags-input" placeholder="Tag">
                                            </div>
                                        </div>
                                        <div class="cv-prj-field full">
                                            <label>Description</label>
                                            <div class="cv-prj-quill-wrap"><div id="cvPrjQuill"></div></div>
                                        </div>
                                    </div>
                                    <label class="cv-prj-check mt-3 mb-0"><input type="checkbox" id="prjSendEmail"> Send project created email</label>
                                </div>

                                <!-- Project Settings pane — grouped toggle design -->
                                <div class="cv-prj-pane" data-prjpane="settings">
                                    <div class="cv-prj-field"><label><span class="req">*</span>Send contacts notifications</label>
                                        <select class="form-select" id="prjNotify">
                                            <option selected>To all contacts with notifications for projects enabled</option>
                                            <option>To primary contact only</option>
                                            <option>Do not send notifications</option>
                                        </select>
                                    </div>
                                    <div class="cv-prj-field"><label>Visible Tabs</label>
                                        <div class="cv-prj-tabsbox" id="prjVisibleTabs">
                                            <span class="cv-tag-chip" data-tab="Profit &amp; Loss">Profit &amp; Loss<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Tasks">Tasks<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Timesheets">Timesheets<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Milestones">Milestones<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Files">Files<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Discussions">Discussions<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Gantt">Gantt<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Tickets">Tickets<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Video Library">Video Library<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Contracts">Contracts<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Proposals">Proposals<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Estimates">Estimates<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Purchase Orders">Purchase Orders<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Invoices">Invoices<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Subscriptions">Subscriptions<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Expenses">Expenses<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="cv-tag-chip" data-tab="Credit Notes">Credit Notes<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span>
                                            <div class="dropdown cv-prj-tabs-dd">
                                                <button type="button" class="cv-prj-tabs-add" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false"><i class="bi bi-plus-lg"></i>Add tabs <i class="bi bi-chevron-down" style="font-size:9px;"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end cv-prj-tabs-menu" id="prjTabsMenu"></ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cv-prj-set-grid">
                                        <!-- Tasks & Comments -->
                                        <div class="cv-prj-set-card">
                                            <div class="cv-prj-set-head"><i class="bi bi-list-check"></i><span class="t">Tasks &amp; Comments</span><span class="c">9 on</span></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to create tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to edit tasks (only tasks created from contact)</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to comment on project tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view task comments</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view task attachments</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view task checklist items</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to upload attachments on tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view task total logged time</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                        </div>

                                        <!-- Files & Discussions -->
                                        <div class="cv-prj-set-card">
                                            <div class="cv-prj-set-head"><i class="bi bi-folder2-open"></i><span class="t">Files &amp; Discussions</span><span class="c">3 on</span></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to upload files</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to open discussions</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view files</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                        </div>

                                        <!-- Milestones & Planning -->
                                        <div class="cv-prj-set-card">
                                            <div class="cv-prj-set-head"><i class="bi bi-diagram-3"></i><span class="t">Milestones &amp; Planning</span><span class="c">3 on</span></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view milestones</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view Gantt</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view timesheets</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                        </div>

                                        <!-- Finance, Log & Team -->
                                        <div class="cv-prj-set-card">
                                            <div class="cv-prj-set-head"><i class="bi bi-graph-up"></i><span class="t">Finance, Log &amp; Team</span><span class="c">3 on</span></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view finance overview</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view activity log</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                            <div class="cv-prj-set-row"><span class="lbl">Allow customer to view team members</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                                        </div>
                                    </div>

                                    <div class="cv-prj-set-foot">
                                        <i class="bi bi-eye-slash-fill"></i>
                                        <span class="lbl">Hide project tasks on main tasks table (admin area)</span>
                                        <label class="cust-switch"><input type="checkbox"><span class="slider"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="cv-prj-footer">
                                <span class="cv-inv-hint"><span style="color:#dc2626;">*</span> marked fields are required</span>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="cvPrjSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg, ok) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        var prjBtn = document.getElementById('cvPrjNewBtn'),
                            prjModal = document.getElementById('cvNewProjectModal'),
                            pgBody = document.getElementById('pgBody');
                        if (!prjBtn || !prjModal || !pgBody) return;

                        /* Tabs: Project / Project Settings */
                        var prjTabs = prjModal.querySelectorAll('.cv-prj-tab'),
                            prjPanes = prjModal.querySelectorAll('.cv-prj-pane');
                        prjTabs.forEach(function(tb) {
                            tb.addEventListener('click', function() {
                                prjTabs.forEach(function(x) { x.classList.toggle('active', x === tb); });
                                prjPanes.forEach(function(p) { p.classList.toggle('active', p.dataset.prjpane === tb.dataset.prjtab); });
                            });
                        });

                        /* Progress slider */
                        var prjProg = document.getElementById('prjProg'),
                            prjProgVal = document.getElementById('prjProgVal');
                        if (prjProg && prjProgVal) prjProg.addEventListener('input', function() {
                            prjProgVal.textContent = this.value + '%';
                        });

                        /* ---- Visible Tabs: chips + profile-dropdown select (lead.php status pattern) ---- */
                        var tabsBox = document.getElementById('prjVisibleTabs'),
                            tabsMenu = document.getElementById('prjTabsMenu');
                        if (tabsBox && tabsMenu) {
                            var ALL_TABS = ['Profit & Loss', 'Tasks', 'Timesheets', 'Milestones', 'Files', 'Discussions', 'Gantt', 'Tickets', 'Video Library', 'Contracts', 'Proposals', 'Estimates', 'Purchase Orders', 'Invoices', 'Subscriptions', 'Expenses', 'Credit Notes'];

                            function selectedTabs() {
                                return Array.prototype.map.call(tabsBox.querySelectorAll('.cv-tag-chip[data-tab]'), function(c) {
                                    return c.getAttribute('data-tab').replace(/&amp;/g, '&');
                                });
                            }

                            function renderTabsMenu() {
                                var sel = selectedTabs(),
                                    remaining = ALL_TABS.filter(function(t) { return sel.indexOf(t) === -1; }),
                                    html = '';
                                remaining.forEach(function(t) {
                                    html += '<li><a class="dropdown-item" href="#" data-tab="' + t.replace(/&/g, '&amp;') + '"><i class="bi bi-check-lg"></i>' + t.replace(/&/g, '&amp;') + '</a></li>';
                                });
                                if (!remaining.length) html = '<li><a class="dropdown-item empty" href="#">All tabs added</a></li>';
                                tabsMenu.innerHTML = html;
                            }

                            function makeChip(name) {
                                var chip = document.createElement('span');
                                chip.className = 'cv-tag-chip';
                                chip.setAttribute('data-tab', name);
                                chip.innerHTML = name.replace(/&/g, '&amp;') + '<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button>';
                                var dd = tabsBox.querySelector('.cv-prj-tabs-dd'),
                                    menuWrap = dd.parentNode;
                                menuWrap.insertBefore(chip, dd);
                            }

                            renderTabsMenu();

                            /* chip ✕ -> remove */
                            tabsBox.addEventListener('click', function(e) {
                                var x = e.target.closest('.chip-x');
                                if (!x) return;
                                x.closest('.cv-tag-chip[data-tab]').remove();
                                renderTabsMenu();
                            });

                            /* dropdown item -> add chip back */
                            tabsMenu.addEventListener('click', function(e) {
                                var item = e.target.closest('.dropdown-item[data-tab]');
                                if (!item) return;
                                e.preventDefault();
                                makeChip(item.getAttribute('data-tab').replace(/&amp;/g, '&'));
                                /* close dropdown (same flow as lead status) */
                                var dd = item.closest('.dropdown');
                                if (dd && typeof bootstrap !== 'undefined') {
                                    var ddBtn = dd.querySelector('[data-bs-toggle="dropdown"]');
                                    if (ddBtn) bootstrap.Dropdown.getOrCreateInstance(ddBtn).hide();
                                }
                                renderTabsMenu();
                            });
                        }

                        var quill = null;
                        function initQuill() {
                            if (quill || typeof Quill === 'undefined') return;
                            quill = new Quill('#cvPrjQuill', {
                                theme: 'snow',
                                placeholder: 'Write project description here...',
                                modules: {
                                    toolbar: [
                                        [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                                        [{ color: [] }, { background: [] }],
                                        ['bold', 'italic', 'underline'],
                                        [{ align: [] }],
                                        ['image', 'link'],
                                        [{ list: 'bullet' }, { list: 'ordered' }],
                                        ['clean']
                                    ]
                                }
                            });
                        }

                        /* New Project -> open modal (fresh) */
                        prjBtn.addEventListener('click', function() {
                            ['prjName', 'prjDeadlineLimit', 'prjTotalRate', 'prjHours', 'prjDeadline'].forEach(function(id) {
                                var el = document.getElementById(id);
                                if (el) { el.value = ''; el.style.borderColor = ''; }
                            });
                            document.getElementById('prjStatus').value = 'In Progress';
                            document.getElementById('prjBilling').value = 'Fixed Rate';
                            if (prjProg) { prjProg.value = 0; prjProgVal.textContent = '0%'; }
                            prjTabs[0].click();
                            bootstrap.Modal.getOrCreateInstance(prjModal).show();
                            setTimeout(initQuill, 150);
                            setTimeout(function() { if (quill) quill.root.innerHTML = ''; }, 200);
                        });

                        /* name clear red border while typing */
                        document.getElementById('prjName').addEventListener('input', function() { this.style.borderColor = ''; });

                        /* Submit -> validate + append row */
                        document.getElementById('cvPrjSubmit').addEventListener('click', function() {
                            var name = document.getElementById('prjName'),
                                start = document.getElementById('prjStart'),
                                billing = document.getElementById('prjBilling'),
                                invalid = null;
                            [name, start, billing].forEach(function(el) {
                                if (!el) return;
                                var bad = !String(el.value).trim();
                                el.style.borderColor = bad ? '#dc2626' : '';
                                if (bad && !invalid) invalid = el;
                            });
                            if (invalid) {
                                toast('Project Name, Billing Type and Start Date are required', false);
                                invalid.focus();
                                return;
                            }
                            var esc = function(s) { var dv = document.createElement('div'); dv.textContent = s; return dv.innerHTML; },
                                status = document.getElementById('prjStatus').value || 'In Progress',
                                members = document.getElementById('prjMembers').value || '—',
                                sd = start.value, dl = document.getElementById('prjDeadline').value,
                                remaining = '—', pct = prjProg ? prjProg.value : 0;
                            if (sd && dl) {
                                var diff = Math.ceil((new Date(dl) - new Date(sd)) / 86400000);
                                remaining = diff > 0 ? diff : 0;
                            }
                            var count = pgBody.querySelectorAll('tr').length,
                                next = count + 1;
                            var tr = pgBody.insertRow();
                            tr.className = 'cv-row';
                            tr.innerHTML = '<td>' + next + '</td>' +
                                '<td><a href="#" class="cv-link">' + esc(name.value.trim()) + '</a></td>' +
                                '<td>—</td>' +
                                '<td><div class="cv-prj-prog"><div class="cv-prj-bar"><span style="width:' + pct + '%;"></span></div><span class="cv-prj-pct">' + pct + '%</span></div></td>' +
                                '<td>' + (sd || '—') + '</td>' +
                                '<td>' + (dl || '—') + '</td>' +
                                '<td><span class="cv-prj-remain">' + remaining + '</span></td>' +
                                '<td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>' + esc(members) + '</span></span></td>' +
                                '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' + esc(status) + '</span></td>';
                            bootstrap.Modal.getOrCreateInstance(prjModal).hide();
                            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                            toast('Project "' + name.value.trim() + '" created successfully');
                        });
                    });
            </div><!-- End Tab: projects -->

            <!-- ==================== Tab: tasks ==================== -->
            <div class="cv-tab-panel" id="cvTab-tasks" style="display: none;">
                <!-- Tasks — New Task + Related To + filter + namba table flow + Add new task modal -->
                <style>
                    .cv-tsk-toolbar-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; padding: 14px 14px 10px; }
                    .cv-tsk-related { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; padding: 0 14px 12px; }
                    .cv-tsk-related .lbl { font-size: 12.5px; font-weight: 700; color: var(--ink-500); }
                    .cv-tsk-check { display: flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 600; color: #374151; cursor: pointer; margin: 0; }
                    .cv-tsk-check .form-check-input { margin: 0; }
                    .cv-tsk-filter-btn { position: relative; width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; padding: 0; border-radius: 9px; border: 1px solid #e3e6ea; background: #fff; color: var(--ink-500); }
                    .cv-tsk-filter-btn:hover, .cv-tsk-filter-btn[aria-expanded="true"] { border-color: var(--primary, #16a34a); color: var(--primary-dark, #0f7a38); }
                    .cv-tsk-filter-menu { min-width: 230px; padding: 14px; border-radius: 12px; border-color: #eef0f3; }
                    .cv-tsk-filter-menu label { display: block; font-size: 11.5px; font-weight: 700; color: #374151; margin-bottom: 4px; }
                    .cv-tsk-filter-menu .form-select { font-size: 13px; border-radius: 9px; margin-bottom: 12px; }
                    .cv-tsk-active-dot { display: none; width: 7px; height: 7px; border-radius: 50%; background: #dc2626; position: absolute; top: 6px; right: 6px; }
                    .cv-tsk-filter-btn.filtered .cv-tsk-active-dot { display: block; }
                    hr.cv-tsk-div { margin: 0 14px; opacity: .8; }
                    /* ---- Add new task modal ---- */
                    #cvNewTaskModal.modal { z-index: 1075; }
                    .cv-tsk-field { margin-bottom: 13px; }
                    .cv-tsk-field label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-tsk-field label .req { color: #dc2626; margin-right: 2px; }
                    .cv-tsk-field label i { color: var(--ink-500); }
                    .cv-tsk-field .form-control, .cv-tsk-field .form-select { border-radius: 10px; font-size: 13.5px; }
                    .cv-tsk-row { display: flex; gap: 14px; }
                    .cv-tsk-row>.cv-tsk-field { flex: 1; min-width: 0; margin-bottom: 13px; }
                    .cv-tsk-top { display: flex; align-items: center; justify-content: space-between; gap: 14px; flex-wrap: wrap; margin-bottom: 14px; }
                    .cv-tsk-top-checks { display: flex; align-items: center; gap: 18px; }
                    .cv-tsk-top-check { display: flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 600; color: #374151; cursor: pointer; margin: 0; }
                    /* ---- Attach Files: drag & drop zone + file list ---- */
                    .cv-tsk-drop { border: 2px dashed color-mix(in srgb, var(--primary, #16a34a) 45%, #fff); background: color-mix(in srgb, var(--primary, #16a34a) 6%, #fff); border-radius: 10px; padding: 18px 16px; text-align: center; cursor: pointer; transition: background .15s, border-color .15s; margin-bottom: 12px; }
                    .cv-tsk-drop:hover, .cv-tsk-drop.dragover { background: color-mix(in srgb, var(--primary, #16a34a) 14%, #fff); border-color: var(--primary, #16a34a); }
                    .cv-tsk-drop i.bi-cloud-arrow-up { font-size: 24px; color: var(--primary, #16a34a); }
                    .cv-tsk-drop .t1 { font-size: 13px; font-weight: 700; color: var(--primary-dark, #0f7a38); margin-top: 4px; }
                    .cv-tsk-drop .t1 span { text-decoration: underline; }
                    .cv-tsk-drop .t2 { font-size: 11.5px; color: #6b7280; margin-top: 2px; }
                    .cv-tsk-file-item { display: flex; align-items: center; gap: 10px; border: 1px solid #e5e7eb; border-radius: 8px; padding: 8px 12px; margin-bottom: 8px; background: #fafbfc; }
                    .cv-tsk-file-item i.bi { color: var(--primary, #16a34a); font-size: 16px; flex-shrink: 0; }
                    .cv-tsk-file-item .nm { font-size: 12.5px; font-weight: 700; color: #111827; word-break: break-all; flex: 1; min-width: 0; }
                    .cv-tsk-file-item .sz { font-size: 11px; color: #6b7280; white-space: nowrap; }
                    .cv-tsk-file-item .rm { border: none; background: none; color: #dc2626; font-size: 13px; cursor: pointer; padding: 2px 6px; border-radius: 6px; flex-shrink: 0; }
                    .cv-tsk-file-item .rm:hover { background: #fee2e2; }
                    .cv-tsk-tags-lbl { display: flex; align-items: center; gap: 6px; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-tsk-tags-lbl i { color: var(--ink-500); }
                </style>

                <!-- Tasks table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="tasks">
                    <div class="cv-tsk-toolbar-row">
                        <button type="button" class="btn btn-primary" id="cvTskNewBtn"><i class="bi bi-plus-lg me-1"></i>New Task</button>
                        <!-- <div class="dropdown">
                            <button type="button" class="cv-tsk-filter-btn" id="cvTskFilterBtn" data-bs-toggle="dropdown" title="Filter tasks" aria-expanded="false" aria-label="Filter tasks"><i class="bi bi-funnel"></i><span class="cv-tsk-active-dot"></span></button>
                            <div class="dropdown-menu dropdown-menu-end cv-tsk-filter-menu">
                                <label for="cvTskFStatus">Status</label>
                                <select class="form-select form-select-sm" id="cvTskFStatus">
                                    <option value="">All statuses</option>
                                    <option>Not Started</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                                <label for="cvTskFPriority">Priority</label>
                                <select class="form-select form-select-sm" id="cvTskFPriority">
                                    <option value="">All priorities</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                    <option>Urgent</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-outline-secondary w-100" id="cvTskFClear"><i class="bi bi-arrow-counterclockwise me-1"></i>Clear filters</button>
                            </div>
                        </div> -->
                    </div>

                    <div class="cv-tsk-related">
                        <span class="lbl">Related To:</span>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input" checked> Customer</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Projects</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Invoices</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Estimates</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Contracts</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Support Tickets</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Expenses</label>
                        <label class="cv-tsk-check"><input type="checkbox" class="form-check-input"> Proposals</label>
                    </div>

                    <hr class="cv-tsk-div">

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="tasksTable">
                            <thead>
                                <tr><th>#</th><th>Name</th><th>Status</th><th>Start Date</th><th>Due Date</th><th>Assigned to</th><th>Tags</th><th>Priority</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">1</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Send revised quotation</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>In Progress</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    14-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    16-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    Divya M                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">urgent</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>High</span>
                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">2</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Collect requirement doc</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Completed</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    05-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    08-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    Karthik R                                                                                            </td>
                                                                                    <td>
                                                                                                    —
                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Low</span>
                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">3</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Deploy staging build</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Not Started</span>                                                                                            </td>
                                                                                    <td>
                                                                                                    20-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    25-09-2026                                                                                            </td>
                                                                                    <td>
                                                                                                    gharuda SOFTWARE                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">release</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Medium</span>
                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Add new task modal (image 2 fields — centered) -->
                <div class="modal fade" id="cvNewTaskModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvTskTitle">
                    <div class="modal-dialog modal-dialog-centered" style="max-width:560px;">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvTskTitle" style="font-size:15.5px;font-weight:800;">Add new task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;max-height:70vh;overflow-y:auto;">
                                <div class="cv-tsk-top">
                                    <div class="cv-tsk-top-checks">
                                        <label class="cv-tsk-top-check"><input type="checkbox" class="form-check-input" id="tskPublic"> Public</label>
                                        <label class="cv-tsk-top-check"><input type="checkbox" class="form-check-input" id="tskBillable" checked> Billable</label>
                                    </div>
                                </div>
                                <!-- Attach Files: drag & drop zone + selected file list -->
                                <div class="cv-tsk-drop" id="cvTskDropZone">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    <div class="t1">Drag &amp; drop files here, or <span>Browse</span></div>
                                    <div class="t2">Images, documents, spreadsheets — you can attach multiple files</div>
                                    <input type="file" id="cvTskFileInput" multiple style="display:none;">
                                </div>
                                <div id="cvTskFileList"></div>
                                <div class="cv-tsk-field"><label><span class="req">*</span>Subject</label><input type="text" class="form-control" id="tskSubject" autocomplete="off"></div>
                                <div class="cv-tsk-field"><label>Hourly Rate</label><input type="number" class="form-control" id="tskRate" value="0" min="0" step="0.5"></div>
                                <div class="cv-tsk-row">
                                    <div class="cv-tsk-field"><label><span class="req">*</span>Start Date</label><input type="date" class="form-control" id="tskStart" value="2026-09-23"></div>
                                    <div class="cv-tsk-field"><label>Due Date</label><input type="date" class="form-control" id="tskDue"></div>
                                </div>
                                <div class="cv-tsk-row">
                                    <div class="cv-tsk-field"><label>Repeat every</label><select class="form-select" id="tskRepeat"><option value="" selected>Non selected</option><option>Daily</option><option>Weekdays</option><option>Weekly</option><option>Monthly</option><option>Yearly</option></select></div>
                                    <div class="cv-tsk-field"><label>Priority</label><select class="form-select" id="tskPriority"><option>Low</option><option selected>Medium</option><option>High</option><option>Urgent</option></select></div>
                                </div>
                                <div class="cv-tsk-row">
                                    <div class="cv-tsk-field"><label>Related To</label><select class="form-select" id="tskRelated"><option selected>Customer</option><option>Projects</option><option>Invoices</option><option>Estimates</option><option>Contracts</option><option>Support Tickets</option><option>Expenses</option><option>Proposals</option></select></div>
                                    <div class="cv-tsk-field"><label>Customer</label><select class="form-select" id="tskCustomer"><option selected>GG COMPANY</option></select></div>
                                </div>
                                <label class="cv-tsk-top-check mb-3"><input type="checkbox" class="form-check-input" id="tskDep"> Dependency</label>
                                <div class="cv-tsk-row">
                                    <div class="cv-tsk-field"><label>Assignees</label><select class="form-select" id="tskAssignees"><option selected>gharuda SOFTWARE</option><option>Admin</option><option>Karthik R</option><option>Divya M</option></select></div>
                                    <div class="cv-tsk-field"><label>Followers</label><select class="form-select" id="tskFollowers"><option value="" selected>Non selected</option><option>Admin</option><option>Karthik R</option><option>Divya M</option></select></div>
                                </div>
                                <div class="cv-tsk-field"><label>Insert Checklist Templates</label><select class="form-select" id="tskChecklist"><option value="" selected>Non selected</option><option>Dev handoff checklist</option><option>QA checklist</option><option>Bug triage checklist</option></select></div>
                                <div class="cv-tsk-field">
                                    <div class="cv-tsk-tags-lbl"><i class="bi bi-tags"></i>Tags</div>
                                    <input type="text" class="form-control" id="tskTags" placeholder="Tag" autocomplete="off">
                                </div>
                                <div class="cv-tsk-field mb-0"><label>Task Description</label><textarea class="form-control" id="tskDesc" rows="4" placeholder="Add Description"></textarea></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvTskSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg, ok) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        var pgBody = document.getElementById('pgBody'),
                            tskBtn = document.getElementById('cvTskNewBtn'),
                            tskModal = document.getElementById('cvNewTaskModal');

                        /* New Task -> open modal (fresh) */
                        if (tskBtn && tskModal && window.bootstrap) {
                            tskBtn.addEventListener('click', function() {
                                ['tskSubject', 'tskDue', 'tskTags', 'tskDesc'].forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (el) { el.value = ''; el.style.borderColor = ''; }
                                });
                                document.getElementById('tskRate').value = '0';
                                document.getElementById('tskStart').value = '2026-09-23';
                                document.getElementById('tskPriority').value = 'Medium';
                                document.getElementById('tskRepeat').value = '';
                                document.getElementById('tskRelated').value = 'Customer';
                                document.getElementById('tskAssignees').value = 'gharuda SOFTWARE';
                                document.getElementById('tskFollowers').value = '';
                                document.getElementById('tskChecklist').value = '';
                                document.getElementById('tskPublic').checked = false;
                                document.getElementById('tskBillable').checked = true;
                                document.getElementById('tskDep').checked = false;
                                var fi = document.getElementById('cvTskFileInput');
                                if (fi) fi.value = '';
                                pickedFiles = [];
                                if (fileList) fileList.innerHTML = '';
                                bootstrap.Modal.getOrCreateInstance(tskModal).show();
                            });
                        }

                        /* Backdrop z-index fix (stacked modal) */
                        if (tskModal) {
                            tskModal.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(tskModal).zIndex, 10) || 1075;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        }

                        /* required fields clear red border while typing */
                        ['tskSubject', 'tskStart'].forEach(function(id) {
                            var el = document.getElementById(id);
                            if (el) el.addEventListener('input', function() { this.style.borderColor = ''; });
                        });

                        /* Attach Files: drag & drop zone + file list */
                        var dropZone = document.getElementById('cvTskDropZone'),
                            fileInput = document.getElementById('cvTskFileInput'),
                            fileList = document.getElementById('cvTskFileList');

                        function fileIcon(f) {
                            var n = (f.name || '').toLowerCase();
                            if (f.type.indexOf('image/') === 0 || /\.(png|jpe?g|gif|webp|svg)$/.test(n)) return 'bi-file-earmark-image';
                            if (f.type === 'application/pdf' || n.indexOf('.pdf') !== -1) return 'bi-file-earmark-pdf';
                            if (/\.docx?$/.test(n)) return 'bi-file-earmark-word';
                            if (/\.xlsx?$/.test(n)) return 'bi-file-earmark-excel';
                            return 'bi-file-earmark';
                        }

                        function fmtSize(bytes) {
                            if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB';
                            if (bytes >= 1024) return (bytes / 1024).toFixed(1) + ' KB';
                            return bytes + ' B';
                        }

                        var pickedFiles = []; /* accumulated across multiple Browse/drop sessions */

                        function redrawFileList() {
                            fileList.innerHTML = '';
                            pickedFiles.forEach(function(f, idx) {
                                var item = document.createElement('div');
                                item.className = 'cv-tsk-file-item';
                                item.innerHTML = '<i class="bi ' + fileIcon(f) + '"></i>' +
                                    '<span class="nm"></span><span class="sz"></span>' +
                                    '<button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                                item.querySelector('.nm').textContent = f.name;
                                item.querySelector('.sz').textContent = fmtSize(f.size || 0);
                                item.querySelector('.rm').addEventListener('click', function() {
                                    pickedFiles.splice(idx, 1);
                                    redrawFileList();
                                });
                                fileList.appendChild(item);
                            });
                        }

                        function addFiles(list) {
                            var added = 0;
                            Array.prototype.forEach.call(list, function(f) {
                                /* skip duplicates (same name + size already picked) */
                                var dup = pickedFiles.some(function(p) { return p.name === f.name && p.size === f.size; });
                                if (dup) return;
                                pickedFiles.push(f);
                                added++;
                            });
                            redrawFileList();
                            if (added) toast(added + ' file(s) attached');
                        }

                        if (dropZone && fileInput) {
                            dropZone.addEventListener('click', function() { fileInput.click(); });
                            dropZone.addEventListener('dragover', function(e) {
                                e.preventDefault();
                                dropZone.classList.add('dragover');
                            });
                            dropZone.addEventListener('dragleave', function() {
                                dropZone.classList.remove('dragover');
                            });
                            dropZone.addEventListener('drop', function(e) {
                                e.preventDefault();
                                dropZone.classList.remove('dragover');
                                if (e.dataTransfer && e.dataTransfer.files.length) addFiles(e.dataTransfer.files);
                            });
                            fileInput.addEventListener('change', function() {
                                if (fileInput.files.length) addFiles(fileInput.files);
                                fileInput.value = '';
                            });
                        }

                        /* ---- Filter dropdown -> tabel.js external hook (wraps global search hook) ---- */
                        var fStatus = document.getElementById('cvTskFStatus'),
                            fPriority = document.getElementById('cvTskFPriority'),
                            filterBtn = document.getElementById('cvTskFilterBtn');

                        function refresh() { if (window.refreshAttendanceTable) window.refreshAttendanceTable(); }

                        function syncFilterDot() {
                            if (!filterBtn) return;
                            var on = (fStatus && fStatus.value) || (fPriority && fPriority.value);
                            filterBtn.classList.toggle('filtered', !!on);
                        }

                        function installFilter() {
                            if (window.__tskFilterInstalled) return;
                            window.__tskFilterInstalled = true;
                            var base = window.attendanceRowMatches;
                            window.attendanceRowMatches = function(row) {
                                if (base && !base(row)) return false;
                                var st = fStatus && fStatus.value ? fStatus.value.toLowerCase() : '',
                                    pr = fPriority && fPriority.value ? fPriority.value.toLowerCase() : '';
                                if (st && (!row.cells[2] || row.cells[2].textContent.trim().toLowerCase() !== st)) return false;
                                if (pr && (!row.cells[7] || row.cells[7].textContent.trim().toLowerCase() !== pr)) return false;
                                return true;
                            };
                        }
                        /* global search hook is set in a later DOMContentLoaded listener — wrap it after load */
                        if (document.readyState === 'complete') installFilter();
                        else window.addEventListener('load', installFilter);

                        [fStatus, fPriority].forEach(function(sel) {
                            if (!sel) return;
                            sel.addEventListener('change', function() { installFilter(); syncFilterDot(); refresh(); });
                        });

                        var fClear = document.getElementById('cvTskFClear');
                        if (fClear) fClear.addEventListener('click', function() {
                            if (fStatus) fStatus.value = '';
                            if (fPriority) fPriority.value = '';
                            var searchEl = document.getElementById('cvSearch');
                            if (searchEl) { searchEl.value = ''; searchEl.dispatchEvent(new Event('input')); }
                            installFilter();
                            syncFilterDot();
                            refresh();
                            toast('Filters cleared');
                        });

                        /* Submit -> validate + append row */
                        document.getElementById('cvTskSubmit').addEventListener('click', function() {
                            var subj = document.getElementById('tskSubject'),
                                start = document.getElementById('tskStart'),
                                invalid = null;
                            [subj, start].forEach(function(el) {
                                if (!el) return;
                                var bad = !String(el.value).trim();
                                el.style.borderColor = bad ? '#dc2626' : '';
                                if (bad && !invalid) invalid = el;
                            });
                            if (invalid) {
                                toast('Subject and Start Date are required', false);
                                invalid.focus();
                                return;
                            }
                            var esc = function(s) { var dv = document.createElement('div'); dv.textContent = s; return dv.innerHTML; },
                                fmt = function(v) { if (!v) return '—'; var p = v.split('-'); return p.length === 3 ? p[2] + '-' + p[1] + '-' + p[0] : v; },
                                priority = document.getElementById('tskPriority').value || 'Medium',
                                pcls = /high|urgent/i.test(priority) ? 'bad' : (/medium/i.test(priority) ? 'wait' : 'ok'),
                                assignee = document.getElementById('tskAssignees').value || '—',
                                tags = document.getElementById('tskTags').value.trim(),
                                count = pgBody.querySelectorAll('tr').length,
                                next = count + 1;
                            var tr = pgBody.insertRow();
                            tr.className = 'cv-row';
                            tr.innerHTML = '<td><span style="color:var(--ink-500);font-weight:600;">' + next + '</span></td>' +
                                '<td><a href="#" class="cv-link">' + esc(subj.value.trim()) + '</a></td>' +
                                '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Not Started</span></td>' +
                                '<td>' + fmt(start.value) + '</td>' +
                                '<td>' + fmt(document.getElementById('tskDue').value) + '</td>' +
                                '<td>' + esc(assignee) + '</td>' +
                                '<td>' + (tags ? '<span class="cv-tag-chip">' + esc(tags) + '</span>' : '—') + '</td>' +
                                '<td><span class="cv-pill ' + pcls + '"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' + esc(priority) + '</span></td>';
                            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                            bootstrap.Modal.getOrCreateInstance(tskModal).hide();
                            toast('Task "' + subj.value.trim() + '" created successfully');
                        });
                    });
                </script>
            </div><!-- End Tab: tasks -->

            <!-- ==================== Tab: tickets ==================== -->
            <div class="cv-tab-panel" id="cvTab-tickets" style="display: none;">
                <!-- Tickets — New Ticket + namba table flow + Ticket Information modal (Quill body) -->
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                <style>
                    .cv-tkt-head { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; margin-bottom: 14px; }
                    #cvNewTicketModal.modal { z-index: 1055; }
                    #cvNewTicketModal .modal-content { border: none; border-radius: 0; display: flex; flex-direction: column; height: 100%; }
                    #cvNewTicketModal .modal-body { flex: 1 1 auto; min-height: 0; overflow-y: auto; padding: 20px 24px; }
                    .cv-tkt-card { border: 1px solid #eef0f3; border-radius: 12px; background: #fff; padding: 18px 20px; margin-bottom: 16px; }
                    .cv-tkt-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px 22px; }
                    @media (max-width: 900px) { .cv-tkt-grid { grid-template-columns: 1fr; } }
                    .cv-tkt-field { margin-bottom: 12px; }
                    .cv-tkt-field label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-tkt-field label i { color: var(--ink-500); }
                    .cv-tkt-field .form-control, .cv-tkt-field .form-select { border-radius: 10px; font-size: 13.5px; }
                    .cv-tkt-field .form-control:read-only { background: #f1f5f4; }
                    .cv-tkt-field.full { grid-column: 1 / -1; }
                    .cv-tkt-type-wrap { display: flex; gap: 8px; }
                    .cv-tkt-type-wrap .form-select { flex: 1; min-width: 0; }
                    .cv-tkt-type-add { width: 38px; height: 38px; flex: 0 0 38px; border-radius: 10px; display: flex; align-items: center; justify-content: center; padding: 0; }
                    .cv-tkt-body-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 22px; }
                    @media (max-width: 900px) { .cv-tkt-body-grid { grid-template-columns: 1fr; } }
                    .cv-tkt-quill-wrap { border: 1px solid #d1d5db; border-radius: 10px; }
                    .cv-tkt-quill-wrap .ql-toolbar { border: none !important; border-bottom: 1px solid #e5e7eb !important; border-radius: 10px 10px 0 0; font-family: 'Manrope', sans-serif; }
                    #cvTktQuill .ql-editor { min-height: 150px; font-size: 13px; }
                    .cv-tkt-att-lbl { font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-tkt-att-wrap { display: flex; }
                    .cv-tkt-att-wrap .form-control { border-radius: 10px 0 0 10px; font-size: 12.5px; flex: 1; min-width: 0; }
                    .cv-tkt-att-add { width: 38px; height: 38px; flex: 0 0 38px; border-radius: 0 10px 10px 0; display: flex; align-items: center; justify-content: center; padding: 0; }
                    .cv-tkt-foot { display: flex; align-items: center; justify-content: flex-end; gap: 10px; border-top: 1px solid #eef0f3; padding: 14px 24px; }
                    .cv-tkt-file-row { display: flex; align-items: center; gap: 10px; border: 1px solid #e5e7eb; border-radius: 8px; padding: 7px 12px; margin-top: 8px; background: #fafbfc; font-size: 12.5px; }
                    .cv-tkt-file-row i.bi { color: var(--primary, #16a34a); flex-shrink: 0; }
                    .cv-tkt-file-row .rm { border: none; background: none; color: #dc2626; cursor: pointer; padding: 2px 6px; border-radius: 6px; margin-left: auto; }
                    .cv-tkt-file-row .rm:hover { background: #fee2e2; }
                    /* ---- New Service modal (stacked above ticket modal) ---- */
                    #cvNewServiceModal.modal { z-index: 1065; }
                </style>

                <!-- Tickets table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="tickets">
                    <div class="p-3 pb-0"><button type="button" class="btn btn-primary" id="cvTktNewBtn"><i class="bi bi-plus-lg me-1"></i>New Ticket</button></div>

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="ticketsTable">
                            <thead>
                                <tr><th>#</th><th>Subject</th><th>Tags</th><th>Department</th><th>Service</th><th>Contact</th><th>Status</th><th>Priority</th><th>Last Reply</th><th>Created</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">#1042</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Unable to download invoice</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">billing</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Billing                                                                                            </td>
                                                                                    <td>
                                                                                                    —                                                                                            </td>
                                                                                    <td>
                                                                                                    Suresh s                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Open</span>                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Medium</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    23-09-2026 10:42                                                                                            </td>
                                                                                    <td>
                                                                                                    18-09-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">#1041</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Login page not loading</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-tag-chip">bug</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    Technical                                                                                            </td>
                                                                                    <td>
                                                                                                    Website Support                                                                                            </td>
                                                                                    <td>
                                                                                                    Divya M                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>In Progress</span>                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>High</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    22-09-2026 16:20                                                                                            </td>
                                                                                    <td>
                                                                                                    20-09-2026                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <span style="color:var(--ink-500);font-weight:600;">#1040</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <a href="#" class="cv-link">Request GST invoice copy</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    —
                                                                                            </td>
                                                                                    <td>
                                                                                                    Billing                                                                                            </td>
                                                                                    <td>
                                                                                                    —                                                                                            </td>
                                                                                    <td>
                                                                                                    Suresh s                                                                                            </td>
                                                                                    <td>
                                                                                                    <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Answered</span>                                                                                            </td>
                                                                                    <td>
                                                                                                                                                        <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Low</span>
                                                                                            </td>
                                                                                    <td>
                                                                                                    19-09-2026 09:15                                                                                            </td>
                                                                                    <td>
                                                                                                    17-09-2026                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Ticket Information modal (image 2 — fullscreen) -->
                <div class="modal fade" id="cvNewTicketModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvTktTitle">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:14px 24px;">
                                <h5 class="modal-title" id="cvTktTitle" style="font-size:15.5px;font-weight:800;">Ticket Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Top card: ticket fields -->
                                <div class="cv-tkt-card">
                                    <div class="cv-tkt-grid">
                                        <div class="cv-tkt-field full">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" id="tktSubject" autocomplete="off">
                                        </div>
                                        <div class="cv-tkt-field">
                                            <div class="cv-tsk-tags-lbl"><i class="bi bi-tags"></i>Tags</div>
                                            <input type="text" class="form-control" id="tktTags" placeholder="Tag" autocomplete="off">
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Contact</label>
                                            <select class="form-select" id="tktContact"><option selected>Suresh s</option><option>Divya M</option><option>Karthik R</option></select>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Assign ticket (default is current user)</label>
                                            <select class="form-select" id="tktAssign"><option selected>gharuda SOFTWARE</option><option>Admin</option><option>Karthik R</option></select>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="tktName" value="Suresh s" readonly>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Email address</label>
                                            <input type="text" class="form-control" id="tktEmail" value="pm@GHARUDAtechnology.com" readonly>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Priority</label>
                                            <select class="form-select" id="tktPriority"><option>Low</option><option selected>Medium</option><option>High</option><option>Urgent</option></select>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Follower ticket (default is current user)</label>
                                            <select class="form-select" id="tktFollower"><option selected>gharuda SOFTWARE</option><option>Admin</option><option>Karthik R</option></select>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Department</label>
                                            <select class="form-select" id="tktDept"><option value="" selected>Non selected</option><option>Billing</option><option>Technical</option><option>Sales</option><option>Support</option></select>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>Service</label>
                                            <div class="cv-tkt-type-wrap">
                                                <select class="form-select" id="tktService"><option value="" selected>Non selected</option><option>Website Support</option><option>Hosting</option><option>Maintenance</option></select>
                                                <button type="button" class="btn btn-primary cv-tkt-type-add" id="tktServiceAdd" title="Add service"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                        </div>
                                        <div class="cv-tkt-field">
                                            <label>CC</label>
                                            <input type="text" class="form-control" id="tktCc" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <!-- Ticket Body card -->
                                <div class="cv-tkt-card mb-0">
                                    <div class="cv-tkt-field"><label>Ticket Body</label></div>
                                    <div class="cv-tkt-body-grid">
                                        <select class="form-select" id="tktPredefined" style="border-radius:10px;font-size:13px;">
                                            <option value="" selected>Insert predefined reply</option>
                                            <option>Thank you — we are looking into it</option>
                                            <option>Issue resolved — closing ticket</option>
                                        </select>
                                        <select class="form-select" id="tktKbLink" style="border-radius:10px;font-size:13px;">
                                            <option value="" selected>Insert knowledge base link</option>
                                            <option>How to reset your password</option>
                                            <option>Invoice & payment FAQ</option>
                                        </select>
                                    </div>
                                    <div class="cv-tkt-quill-wrap mt-2">
                                        <div id="cvTktQuill"></div>
                                    </div>
                                    <div class="row justify-content-start mt-3">
                                        <div class="col-auto" style="min-width:380px;max-width:100%;">
                                            <div class="cv-tkt-att-lbl">Attachments</div>
                                            <div class="cv-tkt-att-wrap">
                                                <input type="file" class="form-control" id="tktFile" multiple>
                                                <button type="button" class="btn btn-primary cv-tkt-att-add" id="tktFileAdd" title="Add more"><i class="bi bi-plus-lg"></i></button>
                                            </div>
                                            <div id="tktFileList"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cv-tkt-foot">
                                <button type="button" class="btn btn-primary" id="cvTktSubmit">Open Ticket</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Service modal (stacked above ticket modal) -->
                <div class="modal fade" id="cvNewServiceModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvSvcTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvSvcTitle" style="font-size:15.5px;font-weight:800;">New Service</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-tkt-field mb-0"><label><span style="color:#dc2626;margin-right:2px;">*</span>Service Name</label><input type="text" class="form-control" id="svcName" autocomplete="off"></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="svcSubmit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg, ok) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        var pgBody = document.getElementById('pgBody'),
                            tktBtn = document.getElementById('cvTktNewBtn'),
                            tktModal = document.getElementById('cvNewTicketModal'),
                            quill = null;

                        function initQuill() {
                            if (quill || typeof Quill === 'undefined') return;
                            quill = new Quill('#cvTktQuill', {
                                theme: 'snow',
                                placeholder: 'Describe the issue...',
                                modules: {
                                    toolbar: [
                                        [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                                        [{ color: [] }, { background: [] }],
                                        ['bold', 'italic', 'underline'],
                                        [{ align: [] }],
                                        ['image', 'link'],
                                        [{ list: 'bullet' }, { list: 'ordered' }],
                                        ['clean']
                                    ]
                                }
                            });
                        }

                        /* New Ticket -> open modal (fresh) */
                        if (tktBtn && tktModal && window.bootstrap) {
                            tktBtn.addEventListener('click', function() {
                                ['tktSubject', 'tktTags', 'tktCc'].forEach(function(id) {
                                    var el = document.getElementById(id);
                                    if (el) { el.value = ''; el.style.borderColor = ''; }
                                });
                                document.getElementById('tktContact').value = 'Suresh s';
                                document.getElementById('tktAssign').value = 'gharuda SOFTWARE';
                                document.getElementById('tktFollower').value = 'gharuda SOFTWARE';
                                document.getElementById('tktPriority').value = 'Medium';
                                document.getElementById('tktDept').value = '';
                                document.getElementById('tktService').value = '';
                                document.getElementById('tktPredefined').value = '';
                                document.getElementById('tktKbLink').value = '';
                                var fl = document.getElementById('tktFileList');
                                if (fl) fl.innerHTML = '';
                                var fi = document.getElementById('tktFile');
                                if (fi) fi.value = '';
                                bootstrap.Modal.getOrCreateInstance(tktModal).show();
                                setTimeout(initQuill, 150);
                                setTimeout(function() { if (quill) quill.root.innerHTML = ''; }, 200);
                            });
                        }

                        /* Backdrop z-index fix (stacked modal) */
                        if (tktModal) {
                            tktModal.addEventListener('shown.bs.modal', function() {
                                var z = parseInt(getComputedStyle(tktModal).zIndex, 10) || 1055;
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = (z - 1);
                            });
                        }

                        /* Subject clear red border while typing */
                        var tktSubjEl = document.getElementById('tktSubject');
                        if (tktSubjEl) tktSubjEl.addEventListener('input', function() { this.style.borderColor = ''; });

                        /* Contact select -> autofill name/email (readonly fields) */
                        var contactData = {
                            'Suresh s': ['Suresh s', 'pm@GHARUDAtechnology.com'],
                            'Divya M': ['Divya M', 'divya@GHARUDAtechnology.com'],
                            'Karthik R': ['Karthik R', 'karthik@GHARUDAtechnology.com']
                        };
                        var tktContact = document.getElementById('tktContact');
                        if (tktContact) tktContact.addEventListener('change', function() {
                            var d = contactData[this.value] || ['', ''];
                            document.getElementById('tktName').value = d[0];
                            document.getElementById('tktEmail').value = d[1];
                        });

                        /* Predefined reply -> insert into Quill */
                        var preDefReplies = {
                            'Thank you — we are looking into it': '<p>Thank you for reaching out. We are looking into your issue and will get back to you shortly.</p>',
                            'Issue resolved — closing ticket': '<p>Your issue has been resolved. This ticket is now being closed. Feel free to reopen if you need anything else.</p>'
                        };
                        var tktPre = document.getElementById('tktPredefined');
                        if (tktPre) tktPre.addEventListener('change', function() {
                            if (this.value && preDefReplies[this.value] && quill) {
                                quill.root.innerHTML = preDefReplies[this.value];
                            }
                        });

                        /* Knowledge base link -> insert link into Quill */
                        var tktKb = document.getElementById('tktKbLink');
                        if (tktKb) tktKb.addEventListener('change', function() {
                            if (this.value && quill) {
                                var url = 'https://kb.GHARUDAtechnology.com/' + this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
                                quill.focus();
                                quill.updateContents(quill.getSelection(true) || { index: quill.getLength(), length: 0 }, [{ insert: this.value, attributes: { link: url } }, { insert: '\n' }]);
                            }
                            this.value = '';
                        });

                        /* ➕ -> add another attachment file input row */
                        var tktFileAdd = document.getElementById('tktFileAdd'),
                            tktFileList = document.getElementById('tktFileList');
                        if (tktFileAdd && tktFileList) {
                            tktFileAdd.addEventListener('click', function() {
                                var fi = document.getElementById('tktFile');
                                if (fi && fi.files && fi.files.length) {
                                    Array.prototype.forEach.call(fi.files, function(f) {
                                        var row = document.createElement('div');
                                        row.className = 'cv-tkt-file-row';
                                        row.innerHTML = '<i class="bi bi-paperclip"></i><span class="nm"></span>' +
                                            '<button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                                        row.querySelector('.nm').textContent = f.name;
                                        row.querySelector('.rm').addEventListener('click', function() { row.remove(); });
                                        tktFileList.appendChild(row);
                                    });
                                    fi.value = '';
                                } else {
                                    fi.click();
                                }
                            });
                            /* picking files directly also lists them */
                            document.getElementById('tktFile').addEventListener('change', function() {
                                if (this.files.length) tktFileAdd.click();
                            });
                        }

                        /* Service ➕ -> New Service modal */
                        var svcAdd = document.getElementById('tktServiceAdd'),
                            svcModal = document.getElementById('cvNewServiceModal');
                        if (svcAdd && svcModal && window.bootstrap) {
                            svcAdd.addEventListener('click', function() {
                                var nm = document.getElementById('svcName');
                                if (nm) { nm.value = ''; nm.style.borderColor = ''; }
                                bootstrap.Modal.getOrCreateInstance(svcModal).show();
                            });
                        }

                        /* Backdrop z-index fix (stacked: service modal above ticket modal) */
                        if (svcModal) {
                            svcModal.addEventListener('shown.bs.modal', function() {
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = 1064; /* below service modal 1065, above ticket modal 1055 */
                            });
                        }

                        /* Service name clear red border while typing */
                        var svcNameEl = document.getElementById('svcName');
                        if (svcNameEl) svcNameEl.addEventListener('input', function() { this.style.borderColor = ''; });

                        /* New Service submit -> validate + add option to Service select + toast */
                        var svcSubmit = document.getElementById('svcSubmit');
                        if (svcSubmit && svcModal) {
                            svcSubmit.addEventListener('click', function() {
                                var nm = document.getElementById('svcName'),
                                    name = nm.value.trim();
                                if (!name) {
                                    nm.style.borderColor = '#dc2626';
                                    toast('Service Name is required', false);
                                    nm.focus();
                                    return;
                                }
                                var sel = document.getElementById('tktService'),
                                    exists = false;
                                if (sel) {
                                    Array.prototype.forEach.call(sel.options, function(op) {
                                        if (op.text === name) exists = true;
                                    });
                                    if (!exists) {
                                        var op = document.createElement('option');
                                        op.value = name;
                                        op.text = name;
                                        sel.appendChild(op);
                                    }
                                    sel.value = name;
                                }
                                bootstrap.Modal.getOrCreateInstance(svcModal).hide();
                                toast('Service "' + name + '" added');
                            });
                        }

                        /* Open Ticket -> validate + append row */
                        document.getElementById('cvTktSubmit').addEventListener('click', function() {
                            var subj = document.getElementById('tktSubject'),
                                invalid = null;
                            var bad = !String(subj.value).trim();
                            subj.style.borderColor = bad ? '#dc2626' : '';
                            if (bad) {
                                toast('Subject is required', false);
                                subj.focus();
                                return;
                            }
                            var esc = function(s) { var dv = document.createElement('div'); dv.textContent = s; return dv.innerHTML; },
                                now = new Date(),
                                pad = function(n) { return String(n).padStart(2, '0'); },
                                created = pad(now.getDate()) + '-' + pad(now.getMonth() + 1) + '-' + now.getFullYear(),
                                lastReply = created + ' ' + pad(now.getHours()) + ':' + pad(now.getMinutes()),
                                priority = document.getElementById('tktPriority').value || 'Medium',
                                pcls = /high|urgent/i.test(priority) ? 'bad' : (/medium/i.test(priority) ? 'wait' : 'ok'),
                                dept = document.getElementById('tktDept').value || '—',
                                service = document.getElementById('tktService').value || '—',
                                contact = document.getElementById('tktContact').value || '—',
                                tags = document.getElementById('tktTags').value.trim(),
                                count = pgBody.querySelectorAll('tr').length,
                                next = count + 1043;
                            var tr = pgBody.insertRow();
                            tr.className = 'cv-row';
                            tr.innerHTML = '<td><span style="color:var(--ink-500);font-weight:600;">#' + next + '</span></td>' +
                                '<td><a href="#" class="cv-link">' + esc(subj.value.trim()) + '</a></td>' +
                                '<td>' + (tags ? '<span class="cv-tag-chip">' + esc(tags) + '</span>' : '—') + '</td>' +
                                '<td>' + esc(dept) + '</td>' +
                                '<td>' + esc(service) + '</td>' +
                                '<td>' + esc(contact) + '</td>' +
                                '<td><span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Open</span></td>' +
                                '<td><span class="cv-pill ' + pcls + '"><i class="bi bi-circle-fill" style="font-size:6px;"></i>' + esc(priority) + '</span></td>' +
                                '<td>' + lastReply + '</td>' +
                                '<td>' + created + '</td>';
                            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                            bootstrap.Modal.getOrCreateInstance(tktModal).hide();
                            toast('Ticket #' + next + ' opened successfully');
                        });
                    });
                </script>
            </div><!-- End Tab: tickets -->

            <!-- ==================== Tab: email_log ==================== -->
            <div class="cv-tab-panel" id="cvTab-email_log" style="display: none;">
                <!-- Email Log — Send Email + table flow + Compose Email modal (Quill) -->
                <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
                <style>
                    .table-modern .el-status { color: #16a34a; font-weight: 600; }
                    .cv-em-field { margin-bottom: 14px; }
                    .cv-em-field > label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-em-field > label.cv-em-upper { text-transform: uppercase; font-size: 11.5px; letter-spacing: .3px; }
                    .cv-em-quill-wrap { border: 1px solid #d1d5db; border-radius: 10px; }
                    .cv-em-quill-wrap .ql-toolbar { border: none !important; border-bottom: 1px solid #e5e7eb !important; border-radius: 10px 10px 0 0; font-family: 'Manrope', sans-serif; }
                    #cvEmQuill .ql-editor { min-height: 150px; font-size: 13px; }
                    .cv-em-attach-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
                    .cv-em-attach-row .cv-em-file { flex: 1; }
                    .cv-em-add-file { width: 36px; height: 36px; border: none; border-radius: 10px; background: #22c55e; color: #fff; display: inline-flex; align-items: center; justify-content: center; flex: 0 0 36px; }
                    .cv-em-add-file:hover { background: #16a34a; color: #fff; }
                    .cv-em-remove-file { width: 36px; height: 36px; border: 1px solid #e5e7eb; border-radius: 10px; background: #fff; color: #dc2626; display: inline-flex; align-items: center; justify-content: center; flex: 0 0 36px; }
                </style>

                <div class="card-custom js-report-table p-0" data-export-name="email-log">
                    <div class="p-3 pb-0"><button type="button" class="btn btn-primary" id="cvSendEmailBtn"><i class="bi bi-envelope-fill me-1"></i>Send Email</button></div>

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="email_logTable">
                            <thead>
                                <tr><th>ID</th><th>Staff</th><th>Subject</th><th>Date</th><th>Status</th><th>Opened</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>228</td>
                                                                                    <td></td>
                                                                                    <td>Welcome aboard</td>
                                                                                    <td>23-09-2026 12:17:10</td>
                                                                                    <td><span class="el-status">Success</span></td>
                                                                                    <td></td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Compose Email modal (Quill editor) -->
                <div class="modal fade" id="cvComposeEmailModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvComposeEmailTitle">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvComposeEmailTitle" style="font-size:15.5px;font-weight:800;">Compose Email</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-em-field">
                                    <label class="cv-em-upper">Send Email Using (SMTP)</label>
                                    <select class="form-select" id="cvEmSmtp">
                                        <option>USE SYSTEM SMTP ( info@GHARUDAtechnology.com )</option>
                                        <option>USE CUSTOM SMTP</option>
                                    </select>
                                </div>
                                <div class="cv-em-field">
                                    <label>Templates</label>
                                    <select class="form-select" id="cvEmTemplate">
                                        <option value="">Non selected</option>
                                        <option value="welcome">Welcome Aboard</option>
                                        <option value="quote">Quotation Follow-up</option>
                                        <option value="invoice">Invoice Reminder</option>
                                    </select>
                                </div>
                                <div class="cv-em-field">
                                    <label>Email To</label>
                                    <select class="form-select" id="cvEmTo">
                                        <option>Suresh s ( pm@GHARUDAtechnology.com )</option>
                                        <option>Mohan R ( mohan@GHARUDAtechnology.com )</option>
                                        <option>Priya K ( priya@GHARUDAtechnology.com )</option>
                                    </select>
                                </div>
                                <div class="cv-em-field"><label>Email CC</label><input type="text" class="form-control" id="cvEmCc" autocomplete="off"></div>
                                <div class="cv-em-field"><label>Email Subject</label><input type="text" class="form-control" id="cvEmSubject" autocomplete="off"></div>
                                <div class="cv-em-field">
                                    <div class="cv-em-quill-wrap"><div id="cvEmQuill"></div></div>
                                </div>
                                <div class="cv-em-field mb-0">
                                    <label>Attachment</label>
                                    <div id="cvEmAttachList">
                                        <div class="cv-em-attach-row">
                                            <input type="file" class="form-control cv-em-file">
                                            <button type="button" class="cv-em-add-file" title="Add another attachment" aria-label="Add attachment"><i class="bi bi-plus-lg"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="cvEmSend">send</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg, ok) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        var sendBtn = document.getElementById('cvSendEmailBtn'),
                            emModal = document.getElementById('cvComposeEmailModal'),
                            pgBody = document.getElementById('pgBody');
                        if (!sendBtn || !emModal || !pgBody) return;

                        var quill = null;
                        function initQuill() {
                            if (quill || typeof Quill === 'undefined') return;
                            quill = new Quill('#cvEmQuill', {
                                theme: 'snow',
                                placeholder: 'Write your email here...',
                                modules: {
                                    toolbar: [
                                        [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                                        [{ color: [] }, { background: [] }],
                                        ['bold', 'italic', 'underline'],
                                        [{ align: [] }],
                                        ['image', 'link'],
                                        [{ list: 'bullet' }, { list: 'ordered' }],
                                        ['clean']
                                    ]
                                }
                            });
                        }

                        /* Templates -> prefill subject + body */
                        var TEMPLATES = {
                            welcome: { subject: 'Welcome aboard', body: '<p>Dear Customer,</p><p>Welcome aboard! We are excited to have you with us. Please feel free to reach out for any assistance.</p><p>Regards,<br>GHARUDA SOFTWARE TECHNOLOGY</p>' },
                            quote: { subject: 'Quotation follow-up', body: '<p>Dear Customer,</p><p>Following up on the quotation shared with you. Kindly review and let us know your feedback.</p><p>Regards,<br>GHARUDA SOFTWARE TECHNOLOGY</p>' },
                            invoice: { subject: 'Invoice reminder', body: '<p>Dear Customer,</p><p>This is a gentle reminder regarding your pending invoice. Please arrange the payment at the earliest.</p><p>Regards,<br>GHARUDA SOFTWARE TECHNOLOGY</p>' }
                        };
                        document.getElementById('cvEmTemplate').addEventListener('change', function() {
                            var tpl = TEMPLATES[this.value];
                            if (!tpl) return;
                            document.getElementById('cvEmSubject').value = tpl.subject;
                            document.getElementById('cvEmSubject').style.borderColor = '';
                            initQuill();
                            if (quill) quill.root.innerHTML = tpl.body;
                        });

                        /* Attachment ➕ -> add row (✕ removes) */
                        var attachList = document.getElementById('cvEmAttachList');
                        attachList.addEventListener('click', function(e) {
                            var add = e.target.closest('.cv-em-add-file'),
                                rem = e.target.closest('.cv-em-remove-file');
                            if (rem) {
                                rem.closest('.cv-em-attach-row').remove();
                                return;
                            }
                            if (!add) return;
                            var row = document.createElement('div');
                            row.className = 'cv-em-attach-row';
                            row.innerHTML = '<input type="file" class="form-control cv-em-file"><button type="button" class="cv-em-remove-file" title="Remove" aria-label="Remove attachment"><i class="bi bi-x-lg"></i></button>';
                            attachList.insertBefore(row, add.closest('.cv-em-attach-row').nextSibling);
                        });

                        /* reset attachments to single row */
                        function resetAttach() {
                            var rows = attachList.querySelectorAll('.cv-em-attach-row');
                            rows.forEach(function(r, i) { if (i > 0) r.remove(); });
                            var first = attachList.querySelector('.cv-em-file');
                            if (first) first.value = '';
                        }

                        /* Send Email -> open modal (fresh) */
                        sendBtn.addEventListener('click', function() {
                            document.getElementById('cvEmSubject').value = '';
                            document.getElementById('cvEmSubject').style.borderColor = '';
                            document.getElementById('cvEmCc').value = '';
                            document.getElementById('cvEmTemplate').value = '';
                            resetAttach();
                            bootstrap.Modal.getOrCreateInstance(emModal).show();
                            setTimeout(initQuill, 150);
                            setTimeout(function() {
                                if (quill) quill.root.innerHTML = '';
                            }, 200);
                        });

                        /* subject clear red border while typing */
                        document.getElementById('cvEmSubject').addEventListener('input', function() { this.style.borderColor = ''; });

                        /* send -> validate + append log row */
                        document.getElementById('cvEmSend').addEventListener('click', function() {
                            var subj = document.getElementById('cvEmSubject'),
                                to = document.getElementById('cvEmTo');
                            if (!subj.value.trim()) {
                                subj.style.borderColor = '#dc2626';
                                toast('Email Subject is required', false);
                                subj.focus();
                                return;
                            }
                            var d = new Date(),
                                p = function(n) { return String(n).padStart(2, '0'); },
                                when = p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes()) + ':' + p(d.getSeconds()),
                                esc = function(s) { var dv = document.createElement('div'); dv.textContent = s; return dv.innerHTML; },
                                count = pgBody.querySelectorAll('tr').length,
                                nextId = 228 + count + 1;
                            var tr = pgBody.insertRow();
                            tr.className = 'cv-row';
                            tr.innerHTML = '<td>' + nextId + '</td><td>Admin</td><td>' + esc(subj.value.trim()) + '</td><td>' + when + '</td><td><span class="el-status">Success</span></td><td>—</td>';
                            bootstrap.Modal.getOrCreateInstance(emModal).hide();
                            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                            toast('Email sent to ' + to.value);
                        });
                    });
            </div><!-- End Tab: email_log -->

            <!-- ==================== Tab: call_logs ==================== -->
            <div class="cv-tab-panel" id="cvTab-call_logs" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="call_logs">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewCallLogBtn" data-bs-toggle="modal" data-bs-target="#cvNewCallLogModal"><i class="bi bi-plus-lg me-1"></i>New Call Log</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="call_logsTable">
                            <thead>
                                <tr><th>Type</th><th>Purpose of call</th><th>Caller</th><th>Contact</th><th>Start time</th><th>End time</th><th>Duration</th><th>Follow-up</th><th>Important</th><th>Completed</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Outgoing                                                                                            </td>
                                                                                    <td>
                                                                                                    Discuss proposal                                                                                            </td>
                                                                                    <td>
                                                                                                    Karthik R                                                                                            </td>
                                                                                    <td>
                                                                                                    96770 63368                                                                                            </td>
                                                                                    <td>
                                                                                                    10-09-2026 11:05                                                                                            </td>
                                                                                    <td>
                                                                                                    10-09-2026 11:09                                                                                            </td>
                                                                                    <td>
                                                                                                    04:12                                                                                            </td>
                                                                                    <td>
                                                                                                    No                                                                                            </td>
                                                                                    <td>
                                                                                                    Yes                                                                                            </td>
                                                                                    <td>
                                                                                                    Yes                                                                                            </td>
                                                                            </tr>
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Incoming                                                                                            </td>
                                                                                    <td>
                                                                                                    Payment reminder                                                                                            </td>
                                                                                    <td>
                                                                                                    Divya M                                                                                            </td>
                                                                                    <td>
                                                                                                    96770 63368                                                                                            </td>
                                                                                    <td>
                                                                                                    07-09-2026 15:22                                                                                            </td>
                                                                                    <td>
                                                                                                    07-09-2026 15:24                                                                                            </td>
                                                                                    <td>
                                                                                                    01:48                                                                                            </td>
                                                                                    <td>
                                                                                                    Yes                                                                                            </td>
                                                                                    <td>
                                                                                                    No                                                                                            </td>
                                                                                    <td>
                                                                                                    Yes                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: call_logs -->

            <!-- ==================== Tab: shipping ==================== -->
            <div class="cv-tab-panel" id="cvTab-shipping" style="display: none;">
                <!-- View Shipping Address — table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0" data-export-name="shipping-address">
                    <div class="d-flex p-3 pb-0">
                        <button type="button" class="btn btn-primary" id="cvAddAddrBtn"><i class="bi bi-plus-lg me-1"></i>Add Address</button>
                    </div>

                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="shippingTable">
                            <thead>
                                <tr>
                                    <th>S.No</th><th>Outlet Name</th><th>Area</th><th>Street</th><th>City</th><th>Zip</th><th>State</th><th>Latitude</th><th>Longitude</th><th>Email</th><th>Phone Number</th><th>Date</th><th>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                                <tr class="cv-row">
                                    <td>1</td>
                                    <td>GG COMPANY - Anna Nagar</td>
                                    <td>Anna Nagar</td>
                                    <td>12, Anna Salai</td>
                                    <td>Chennai</td>
                                    <td>600002</td>
                                    <td>Tamil Nadu</td>
                                    <td>13.0878</td>
                                    <td>80.2106</td>
                                    <td><a href="mailto:kaviyarasu@ghratechnology.com" class="cv-link">kaviyarasu@ghratechnology.com</a></td>
                                    <td><a href="tel:9677063368" class="cv-link">9677063368</a></td>
                                    <td>14-09-2026 10:12</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button type="button" class="cv-addr-edit" title="Edit address" aria-label="Edit address"><i class="bi bi-pencil-fill"></i></button>
                                            <button type="button" class="cv-addr-del" title="Delete address" aria-label="Delete address"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="cv-row">
                                    <td>2</td>
                                    <td>GG COMPANY - T. Nagar</td>
                                    <td>T. Nagar</td>
                                    <td>45, Usman Road</td>
                                    <td>Chennai</td>
                                    <td>600017</td>
                                    <td>Tamil Nadu</td>
                                    <td>13.0418</td>
                                    <td>80.2341</td>
                                    <td><a href="mailto:outlet2@ghratechnology.com" class="cv-link">outlet2@ghratechnology.com</a></td>
                                    <td><a href="tel:9440011223" class="cv-link">94400 11223</a></td>
                                    <td>02-09-2026 15:40</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <button type="button" class="cv-addr-edit" title="Edit address" aria-label="Edit address"><i class="bi bi-pencil-fill"></i></button>
                                            <button type="button" class="cv-addr-del" title="Delete address" aria-label="Delete address"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <!-- Add address modal -->
                <div class="leave-reject-modal" id="cvAddrModal" role="dialog" aria-modal="true" aria-labelledby="cvAddrTitle">
                    <div class="leave-reject-dialog cv-note-dialog">
                        <div class="cv-contact-head">
                            <div class="cv-contact-head-l">
                                <div class="cv-contact-ava"><i class="bi bi-geo-alt-fill"></i></div>
                                <div style="min-width:0;">
                                    <h3 id="cvAddrTitle" class="mb-0">Add address</h3>
                                    <div class="cv-contact-sub">GG COMPANY · New shipping outlet</div>
                                </div>
                            </div>
                            <button type="button" class="modal-close" id="cvAddrClose" aria-label="Close">&times;</button>
                        </div>

                        <div class="leave-reject-body cv-note-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adOutlet">Outlet Name</label>
                                        <input type="text" class="form-control" id="adOutlet" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adStreet">Street</label>
                                        <textarea class="form-control" id="adStreet" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adCountry">Country</label>
                                        <select class="form-select" id="adCountry">
                                            <option>India</option>
                                            <option>United States</option>
                                            <option>United Kingdom</option>
                                            <option>United Arab Emirates</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adState">State</label>
                                        <select class="form-select" id="adState">
                                            <option value="">Nothing selected</option>
                                            <option>Tamil Nadu</option>
                                            <option>Karnataka</option>
                                            <option>Kerala</option>
                                            <option>Maharashtra</option>
                                            <option>Andhra Pradesh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adCity">City</label>
                                        <select class="form-select" id="adCity">
                                            <option value="">Nothing selected</option>
                                            <option>Chennai</option>
                                            <option>Coimbatore</option>
                                            <option>Madurai</option>
                                            <option>Bengaluru</option>
                                            <option>Kochi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adArea">Area</label>
                                        <select class="form-select" id="adArea">
                                            <option value="">Nothing selected</option>
                                            <option>Anna Nagar</option>
                                            <option>T. Nagar</option>
                                            <option>Adyar</option>
                                            <option>Velachery</option>
                                            <option>Porur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adZip">Zipcode</label>
                                        <input type="text" class="form-control" id="adZip" maxlength="6" inputmode="numeric" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adLat">Latitude</label>
                                        <input type="text" class="form-control" id="adLat" placeholder="13.0878" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adLng">Longitude</label>
                                        <input type="text" class="form-control" id="adLng" placeholder="80.2106" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adEmail">Email</label>
                                        <input type="email" class="form-control" id="adEmail" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cv-field mb-0">
                                        <label class="form-label" for="adPhone">Phone Number</label>
                                        <input type="tel" class="form-control" id="adPhone" value="+91 " autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="leave-reject-foot pt-3">
                            <button type="button" class="btn btn-reject" id="cvAddrCancel">Close</button>
                            <button type="button" class="btn btn-primary" id="cvAddrSubmit">Submit</button>
                        </div>
                    </div>
                </div>
            </div><!-- End Tab: shipping -->

            <!-- ==================== Tab: map ==================== -->
            <div class="cv-tab-panel" id="cvTab-map" style="display: none;">
                <style>
                    .cv-map-toolbar {
                        display: flex;
                        align-items: flex-end;
                        gap: 14px;
                        flex-wrap: wrap;
                        padding: 18px 20px;
                    }

                    .cv-map-field {
                        display: flex;
                        flex-direction: column;
                        gap: 6px;
                        min-width: 200px;
                        flex: 1 1 220px;
                    }

                    .cv-map-field label {
                        font-size: 12.5px;
                        font-weight: 700;
                        color: var(--ink-700);
                    }

                    .cv-map-field label .req {
                        color: var(--accent-red, #e5484d);
                        margin-right: 2px;
                    }

                    .cv-map-inp-wrap {
                        position: relative;
                        display: flex;
                        align-items: center;
                    }

                    .cv-map-inp-wrap .form-control {
                        font-size: 13px;
                        border-radius: 8px;
                        padding-right: 34px;
                    }

                    .cv-map-inp-wrap .form-control:focus {
                        border-color: var(--primary);
                        box-shadow: 0 0 0 3px var(--primary-soft, #eafaf1);
                    }

                    .cv-map-inp-wrap .cv-map-inp-ic {
                        position: absolute;
                        right: 10px;
                        color: var(--ink-500);
                        font-size: 14px;
                        pointer-events: none;
                    }

                    .cv-map-acts {
                        display: flex;
                        gap: 8px;
                        flex-wrap: wrap;
                    }

                    .cv-map-note {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        margin: 0 20px 16px;
                        padding: 9px 14px;
                        border: 1px dashed #dbe4de;
                        border-radius: 9px;
                        background: #fbfcfb;
                        font-size: 12px;
                        font-weight: 600;
                        color: var(--ink-500);
                    }

                    .cv-map-note i {
                        color: #d97706;
                        font-size: 13px;
                    }

                    .cv-map-frame-wrap {
                        position: relative;
                        margin: 0 20px 20px;
                        border-radius: 12px;
                        overflow: hidden;
                        border: 1px solid var(--border-soft);
                    }

                    .cv-map-frame-wrap iframe {
                        display: block;
                        width: 100%;
                        height: 420px;
                        border: 0;
                    }

                    .cv-map-err {
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        gap: 8px;
                        height: 420px;
                        background: repeating-linear-gradient(135deg, #f8f9fa 0 12px, #f1f3f5 12px 24px);
                        color: var(--ink-500);
                        font-weight: 600;
                        font-size: 13px;
                    }

                    .cv-map-err i {
                        font-size: 30px;
                    }

                    .cv-map-err .cv-err {
                        margin: 0;
                        color: var(--accent-red, #e5484d);
                    }

                    @media (max-width: 700px) {
                        .cv-map-toolbar { align-items: stretch; flex-direction: column; }
                        .cv-map-field { min-width: 0; }
                        .cv-map-acts .btn { flex: 1; }
                    }
                </style>

                <div class="card-custom">
                    <!-- Coordinates form -->
                    <div class="cv-map-toolbar">
                        <div class="cv-map-field">
                            <label for="cvMapLat"><span class="req">*</span>Latitude (Google Maps)</label>
                            <div class="cv-map-inp-wrap">
                                <input type="text" class="form-control" id="cvMapLat" placeholder="e.g. 13.0827" autocomplete="off">
                                <i class="bi bi-geo-alt cv-map-inp-ic"></i>
                            </div>
                        </div>
                        <div class="cv-map-field">
                            <label for="cvMapLng"><span class="req">*</span>Longitude (Google Maps)</label>
                            <div class="cv-map-inp-wrap">
                                <input type="text" class="form-control" id="cvMapLng" placeholder="e.g. 80.2707" autocomplete="off">
                                <i class="bi bi-geo-alt cv-map-inp-ic"></i>
                            </div>
                        </div>
                        <div class="cv-map-acts">
                            <button type="button" class="btn btn-primary" id="cvMapSubmit"><i class="bi bi-geo me-1"></i>Show on map</button>
                            <button type="button" class="btn btn-outline-primary" id="cvMapOpen"><i class="bi bi-box-arrow-up-right me-1"></i>Open in Google Map</button>
                        </div>
                    </div>

                    <!-- API key note -->
                    <div class="cv-map-note"><i class="bi bi-key-fill"></i>Setup Google API key in settings to unlock advanced map options for this customer map.</div>

                    <!-- Live map preview (Google Maps embed — API key not required) -->
                    <div class="cv-map-frame-wrap">
                        <div class="cv-map-err" id="cvMapPreview">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Enter coordinates and click "Show on map"</span>
                            <span class="cv-err" id="cvMapErr" hidden>Please enter both Latitude and Longitude.</span>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var latEl = document.getElementById('cvMapLat'),
                            lngEl = document.getElementById('cvMapLng'),
                            preview = document.getElementById('cvMapPreview'),
                            errEl = document.getElementById('cvMapErr'),
                            wrap = preview.parentNode;

                        function coords() {
                            return {
                                lat: latEl.value.trim(),
                                lng: lngEl.value.trim()
                            };
                        }

                        function valid(c) {
                            return c.lat !== '' && c.lng !== '';
                        }

                        [latEl, lngEl].forEach(function(el) {
                            el.addEventListener('input', function() {
                                if (valid(coords())) errEl.hidden = true;
                                if (el.value.trim()) el.style.borderColor = '';
                            });
                        });

                        function markInvalid() {
                            [latEl, lngEl].forEach(function(el) {
                                if (!el.value.trim()) el.style.borderColor = '#e5484d';
                            });
                            errEl.hidden = false;
                            (!latEl.value.trim() ? latEl : lngEl).focus();
                        }

                        document.getElementById('cvMapSubmit').addEventListener('click', function() {
                            var c = coords();
                            if (!valid(c)) return markInvalid();

                            var iframe = document.createElement('iframe');
                            iframe.src = 'https://maps.google.com/maps?q=' + encodeURIComponent(c.lat + ',' + c.lng) + '&z=15&output=embed';
                            iframe.loading = 'lazy';
                            iframe.setAttribute('referrerpolicy', 'no-referrer-when-downgrade');
                            iframe.setAttribute('title', 'Customer map preview');
                            wrap.replaceChild(iframe, preview);
                            preview = iframe;
                        });

                        document.getElementById('cvMapOpen').addEventListener('click', function() {
                            var c = coords();
                            if (!valid(c)) return markInvalid();
                            window.open('https://www.google.com/maps/search/?api=1&query=' + encodeURIComponent(c.lat + ',' + c.lng), '_blank');
                        });
                    });
                </script>
            </div><!-- End Tab: map -->

            <!-- ==================== Tab: files ==================== -->
            <div class="cv-tab-panel" id="cvTab-files" style="display: none;">
                <!-- Files — info note + drop-to-upload zone + namba table flow -->
                <style>
                    .cv-fl-note { font-size: 12.5px; font-weight: 600; color: var(--primary-dark, #0f7a38); margin: 4px 0 14px; }
                    .cv-fl-drop { border: 2px dashed color-mix(in srgb, var(--primary, #16a34a) 45%, #fff); background: color-mix(in srgb, var(--primary, #16a34a) 5%, #fff); border-radius: 10px; padding: 46px 16px; text-align: center; cursor: pointer; transition: background .15s, border-color .15s; margin-bottom: 18px; }
                    .cv-fl-drop:hover, .cv-fl-drop.dragover { background: color-mix(in srgb, var(--primary, #16a34a) 13%, #fff); border-color: var(--primary, #16a34a); }
                    .cv-fl-drop .t1 { font-size: 13px; font-weight: 700; color: var(--primary-dark, #0f7a38); }
                    .cv-fl-tbl-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; padding: 0 3px 12px; }
                    .cv-fl-file-link { display: inline-flex; align-items: center; gap: 7px; color: var(--primary-dark, #0f7a38); font-weight: 700; font-size: 13px; text-decoration: none; word-break: break-all; }
                    .cv-fl-file-link:hover { text-decoration: underline; }
                    .cv-fl-file-link i { color: #dc2626; font-size: 15px; flex-shrink: 0; }
                    .cv-fl-mail-btn { border: none; background: none; color: var(--ink-500); font-size: 15px; padding: 4px 8px; border-radius: 8px; }
                    .cv-fl-mail-btn:hover { color: var(--primary-dark, #0f7a38); background: var(--primary-light, #e7f5ec); }
                    .cv-fl-file-row { display: flex; align-items: center; gap: 10px; border: 1px solid #e5e7eb; border-radius: 8px; padding: 7px 12px; margin-bottom: 8px; background: #fafbfc; font-size: 12.5px; }
                    .cv-fl-file-row i.bi { color: var(--primary, #16a34a); flex-shrink: 0; }
                    .cv-fl-file-row .rm { border: none; background: none; color: #dc2626; cursor: pointer; padding: 2px 6px; border-radius: 6px; margin-left: auto; }
                    .cv-fl-file-row .rm:hover { background: #fee2e2; }
                    /* ---- Send File modal ---- */
                    #cvSendFileModal.modal { z-index: 1075; }
                    .cv-sf-field { margin-bottom: 13px; }
                    .cv-sf-field label { display: block; font-size: 12.5px; font-weight: 700; color: #374151; margin-bottom: 5px; }
                    .cv-sf-field .form-control { border-radius: 10px; font-size: 13.5px; }
                    /* ---- Custom switch tooltip (fixed position, no clipping) ---- */
                    .cv-fl-tip { position: fixed; z-index: 3000; background: var(--primary-dark, #0f7a38); color: #fff; font-size: 11.5px; font-weight: 600; line-height: 1.45; padding: 8px 12px; border-radius: 8px; max-width: 260px; width: max-content; text-align: center; pointer-events: none; display: none; box-shadow: 0 6px 16px rgba(16, 24, 40, .18); }
                    .cv-fl-tip.show { display: block; }
                    .cv-fl-switch .form-check-input { pointer-events: none; }
                    .cv-fl-switch-live .form-check-input { pointer-events: auto; cursor: pointer; }
                    /* ---- Share-with line + edit icon (switch ON state) ---- */
                    .cv-fl-share-row { display: flex; align-items: center; gap: 8px; margin-top: 8px; }
                    .cv-fl-share-row .txt { font-size: 12px; font-weight: 600; color: var(--primary-dark, #0f7a38); }
                    .cv-fl-share-edit { border: none; background: none; color: var(--ink-500); font-size: 13px; padding: 2px 7px; border-radius: 7px; cursor: pointer; }
                    .cv-fl-share-edit:hover { color: var(--primary-dark, #0f7a38); background: var(--primary-light, #e7f5ec); }
                    /* ---- Share File With modal ---- */
                    #cvShareFileModal.modal { z-index: 1075; }
                    .cv-fl-switch .form-check-input:checked { background-color: var(--primary, #16a34a); border-color: var(--primary, #16a34a); }
                </style>

                <div class="cv-fl-note ms-3">Files from projects and tasks linked to the customer are not shown on this table.</div>

                <!-- Share File With modal -->
                <div class="modal fade" id="cvShareFileModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvShfTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvShfTitle" style="font-size:15.5px;font-weight:800;">Share File With</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-sf-field mb-0"><label>Contacts</label><select class="form-control form-select" id="shfContact"><option selected>Suresh s</option><option>Divya M</option><option>Karthik R</option></select></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="shfConfirm">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Send File modal -->
                <div class="modal fade" id="cvSendFileModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvSfTitle">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border:none;border-radius:14px;">
                            <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                                <h5 class="modal-title" id="cvSfTitle" style="font-size:15.5px;font-weight:800;">Send File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding:20px 22px;">
                                <div class="cv-sf-field"><label>Email Subject</label><input type="text" class="form-control" id="sfSubject" autocomplete="off"></div>
                                <div class="cv-sf-field"><label>Email Address</label><input type="email" class="form-control" id="sfEmail" autocomplete="off"></div>
                                <div class="cv-sf-field mb-0"><label>Message</label><textarea class="form-control" id="sfMessage" rows="5"></textarea></div>
                            </div>
                            <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="sfSubmit">Send File</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Drop files to upload zone -->
                <div class="cv-fl-drop mx-3" id="cvFlDropZone">
                    <div class="t1">Drop files here to upload</div>
                    <input type="file" id="cvFlFileInput" multiple style="display:none;">
                </div>
                <div class="mx-3" id="cvFlFileList"></div>

                <!-- Files table — namba standard table flow (tabel.js) -->
                <div class="card-custom js-report-table p-0 mx-3" data-export-name="files">
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="filesTable">
                            <thead>
                                <tr><th>File</th><th>Show to customers area</th><th>Date Uploaded</th><th>Options</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    <a href="#" class="cv-fl-file-link"><i class="bi bi-file-earmark-pdf"></i>PRO-140-GHARUDA-SOFTWARE-TECHNOLOGY-PRIVATE-LIMITED.pdf</a>
                                                                                            </td>
                                                                                    <td>
                                                                                                    <div class="form-check form-switch m-0 cv-fl-switch" style="width:fit-content" data-tip="Only files uploaded from customer profile have ability to show/hide in Customers area">
                                                        <input class="form-check-input" type="checkbox" role="switch" disabled >
                                                    </div>
                                                                                            </td>
                                                                                    <td>
                                                                                                    21-08-2026 14:15:57                                                                                            </td>
                                                                                    <td>
                                                                                                    <button type="button" class="cv-fl-mail-btn" title="Send via email"><i class="bi bi-envelope"></i></button>
                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>

                <script>
                    /* footer.php (bootstrap) loads AFTER this block — bind on DOMContentLoaded */
                    document.addEventListener('DOMContentLoaded', function() {
                        function toast(msg, ok) {
                            var t = document.createElement('div');
                            t.className = 'cv-toast';
                            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
                            document.body.appendChild(t);
                            setTimeout(function() { t.classList.add('show'); }, 10);
                            setTimeout(function() { t.classList.remove('show'); setTimeout(function() { t.remove(); }, 350); }, 2400);
                        }

                        var pgBody = document.getElementById('pgBody'),
                            dropZone = document.getElementById('cvFlDropZone'),
                            fileInput = document.getElementById('cvFlFileInput');

                        function fileIconCls(name) {
                            var n = (name || '').toLowerCase();
                            if (/\.(png|jpe?g|gif|webp|svg)$/.test(n)) return 'bi-file-earmark-image';
                            if (n.indexOf('.pdf') !== -1) return 'bi-file-earmark-pdf';
                            if (/\.docx?$/.test(n)) return 'bi-file-earmark-word';
                            if (/\.xlsx?$/.test(n)) return 'bi-file-earmark-excel';
                            return 'bi-file-earmark';
                        }

                        function nowStamp() {
                            var d = new Date(),
                                p = function(n) { return String(n).padStart(2, '0'); };
                            return p(d.getDate()) + '-' + p(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + p(d.getHours()) + ':' + p(d.getMinutes()) + ':' + p(d.getSeconds());
                        }

                        /* Uploaded file -> direct table row append (files branch only) */
                        function addFilesToTable(list) {
                            Array.prototype.forEach.call(list, function(f) {
                                var tr = pgBody.insertRow();
                                tr.className = 'cv-row';
                                tr.innerHTML = '<td><a href="#" class="cv-fl-file-link"><i class="bi ' + fileIconCls(f.name) + '"></i><span class="fnm"></span></a></td>' +
                                    '<td><div class="form-check form-switch m-0 cv-fl-switch cv-fl-switch-live" style="width:fit-content;" data-tip="Show/hide this file in Customers area"><input class="form-check-input" type="checkbox" role="switch"></div><div class="cv-fl-share-row" style="display:none;"><span class="txt"></span><button type="button" class="cv-fl-share-edit" title="Edit sharing"><i class="bi bi-pencil-square"></i></button></div></td>' +
                                    '<td>' + nowStamp() + '</td>' +
                                    '<td><button type="button" class="cv-fl-mail-btn cv-fl-send" title="Send via email"><i class="bi bi-envelope"></i></button>' +
                                    '<button type="button" class="cv-fl-mail-btn cv-fl-del" title="Delete" style="color:#dc2626;"><i class="bi bi-trash"></i></button></td>';
                                tr.querySelector('.fnm').textContent = f.name;
                            });
                            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                            toast(list.length + ' file(s) uploaded successfully');
                        }

                        if (dropZone && fileInput) {
                            dropZone.addEventListener('click', function() { fileInput.click(); });
                            dropZone.addEventListener('dragover', function(e) {
                                e.preventDefault();
                                dropZone.classList.add('dragover');
                            });
                            dropZone.addEventListener('dragleave', function() {
                                dropZone.classList.remove('dragover');
                            });
                            dropZone.addEventListener('drop', function(e) {
                                e.preventDefault();
                                dropZone.classList.remove('dragover');
                                if (e.dataTransfer && e.dataTransfer.files.length) addFilesToTable(e.dataTransfer.files);
                            });
                            fileInput.addEventListener('change', function() {
                                if (fileInput.files.length) addFilesToTable(fileInput.files);
                                fileInput.value = '';
                            });
                        }

                        /* Options column: mail -> Send File modal, trash -> remove row */
                        var sfModal = document.getElementById('cvSendFileModal');

                        function openSendFile() {
                            ['sfSubject', 'sfEmail', 'sfMessage'].forEach(function(id) {
                                var el = document.getElementById(id);
                                if (el) { el.value = ''; el.style.borderColor = ''; }
                            });
                            bootstrap.Modal.getOrCreateInstance(sfModal).show();
                        }

                        if (sfModal) {
                            sfModal.addEventListener('shown.bs.modal', function() {
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = 1074; /* below send file modal 1075 */
                            });
                        }

                        ['sfSubject', 'sfEmail'].forEach(function(id) {
                            var el = document.getElementById(id);
                            if (el) el.addEventListener('input', function() { this.style.borderColor = ''; });
                        });

                        var sfSubmit = document.getElementById('sfSubmit');
                        if (sfSubmit && sfModal) {
                            sfSubmit.addEventListener('click', function() {
                                var subj = document.getElementById('sfSubject'),
                                    email = document.getElementById('sfEmail'),
                                    invalid = null;
                                [subj, email].forEach(function(el) {
                                    var bad = !String(el.value).trim();
                                    el.style.borderColor = bad ? '#dc2626' : '';
                                    if (bad && !invalid) invalid = el;
                                });
                                if (invalid) {
                                    toast('Email Subject and Email Address are required', false);
                                    invalid.focus();
                                    return;
                                }
                                bootstrap.Modal.getOrCreateInstance(sfModal).hide();
                                toast('File sent to ' + email.value.trim());
                            });
                        }

                        pgBody.addEventListener('click', function(e) {
                            var del = e.target.closest('.cv-fl-del');
                            if (del) {
                                del.closest('tr').remove();
                                if (window.refreshAttendanceTable) window.refreshAttendanceTable();
                                toast('File deleted');
                                return;
                            }
                            var mb = e.target.closest('.cv-fl-mail-btn');
                            if (mb && sfModal && window.bootstrap) openSendFile();
                        });

                        /* Switch: whole pill clickable; custom fixed-position tooltip on hover */
                        var flTip = document.createElement('div');
                        flTip.className = 'cv-fl-tip';
                        document.body.appendChild(flTip);

                        pgBody.addEventListener('mouseover', function(e) {
                            var wrap = e.target.closest('.cv-fl-switch');
                            if (!wrap) return;
                            flTip.textContent = wrap.getAttribute('data-tip');
                            flTip.classList.add('show');
                            var r = wrap.getBoundingClientRect(),
                                tw = flTip.offsetWidth,
                                th = flTip.offsetHeight,
                                left = Math.max(8, Math.min(r.left + r.width / 2 - tw / 2, window.innerWidth - tw - 8)),
                                top = r.top - th - 8;
                            if (top < 8) top = r.bottom + 8; /* flip below if not enough room above */
                            flTip.style.left = left + 'px';
                            flTip.style.top = top + 'px';
                        });
                        pgBody.addEventListener('mouseout', function(e) {
                            if (e.target.closest('.cv-fl-switch')) flTip.classList.remove('show');
                        });

                        /* Switch: disabled row -> tooltip hide mattum; live (uploaded) row -> toggle */
                        pgBody.addEventListener('click', function(e) {
                            var wrap = e.target.closest('.cv-fl-switch');
                            if (wrap) {
                                flTip.classList.remove('show');
                                if (!wrap.classList.contains('cv-fl-switch-live')) return; /* dummy row: disabled */
                                if (e.target.classList.contains('form-check-input')) return; /* native toggle -> change event handles the rest */
                                var cb = wrap.querySelector('input[type="checkbox"]');
                                if (cb) {
                                    cb.checked = !cb.checked;
                                    cb.dispatchEvent(new Event('change', { bubbles: true }));
                                }
                                return;
                            }
                            /* share edit icon -> Share File With modal */
                            var ed = e.target.closest('.cv-fl-share-edit');
                            if (ed && window.bootstrap) {
                                var shfModal = document.getElementById('cvShareFileModal');
                                var cur = ed.closest('td').querySelector('.cv-fl-share-row .txt').textContent.replace('This file is shared with: ', '');
                                var sel = document.getElementById('shfContact');
                                if (sel) {
                                    var has = Array.prototype.some.call(sel.options, function(op) { return op.text === cur; });
                                    if (has) sel.value = cur;
                                }
                                shfModal._shareEditBtn = ed;
                                bootstrap.Modal.getOrCreateInstance(shfModal).show();
                            }
                        });

                        /* Switch change -> update share row (works for both native + custom toggle) */
                        pgBody.addEventListener('change', function(e) {
                            var cb = e.target;
                            if (!cb.matches('.cv-fl-switch-live input[type="checkbox"]')) return;
                            var wrap = cb.closest('.cv-fl-switch');
                            setShareState(wrap, cb.checked ? 'Suresh s' : '');
                            toast(cb.checked ? 'File visible in customers area' : 'File hidden from customers area');
                        });

                        /* Share row text helper */
                        function setShareState(switchWrap, contact) {
                            var row = switchWrap.parentNode.querySelector('.cv-fl-share-row'),
                                txt = row ? row.querySelector('.txt') : null;
                            if (!row || !txt) return;
                            if (contact) {
                                txt.textContent = 'This file is shared with: ' + contact;
                                row.style.display = 'flex';
                            } else {
                                txt.textContent = '';
                                row.style.display = 'none';
                            }
                        }

                        /* Share File With Confirm -> update share text */
                        var shfModalEl = document.getElementById('cvShareFileModal');
                        if (shfModalEl) {
                            shfModalEl.addEventListener('shown.bs.modal', function() {
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                var last = backdrops[backdrops.length - 1];
                                if (last) last.style.zIndex = 1074;
                            });
                            var shfConfirm = document.getElementById('shfConfirm');
                            if (shfConfirm) shfConfirm.addEventListener('click', function() {
                                var sel = document.getElementById('shfContact'),
                                    btn = shfModalEl._shareEditBtn;
                                if (btn) {
                                    var wrap = btn.closest('td').querySelector('.cv-fl-switch');
                                    setShareState(wrap, sel ? sel.value : '');
                                }
                                bootstrap.Modal.getOrCreateInstance(shfModalEl).hide();
                                toast('File shared with ' + (sel ? sel.value : ''));
                            });
                        }
                    });
                </script>
            </div><!-- End Tab: files -->

            <!-- ==================== Tab: vault ==================== -->
            <div class="cv-tab-panel" id="cvTab-vault" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="vault">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewVaultBtn"><i class="bi bi-plus-lg me-1"></i>New Entry</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="vaultTable">
                            <thead>
                                <tr><th>Server Address</th><th>Port</th><th>Username</th><th>Description</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    ftp.example.com                                                                                            </td>
                                                                                    <td>
                                                                                                    21                                                                                            </td>
                                                                                    <td>
                                                                                                    ggcompany                                                                                            </td>
                                                                                    <td>
                                                                                                    FTP access                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: vault -->

            <!-- ==================== Tab: reminders ==================== -->
            <div class="cv-tab-panel" id="cvTab-reminders" style="display: none;">
                <div class="card-custom js-report-table p-0" data-export-name="reminders">
                                            <div class="p-3 pb-0"><button type="button" class="btn btn-primary " id="cvNewReminderBtn"><i class="bi bi-plus-lg me-1"></i>Set Reminder</button></div>
                    
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable mb-0" id="remindersTable">
                            <thead>
                                <tr><th>Description</th><th>Date</th><th>Remind</th><th>Notified</th></tr>
                            </thead>
                            <tbody >
                                                                    <tr class="cv-row">
                                                                                    <td>
                                                                                                    Follow up on proposal                                                                                            </td>
                                                                                    <td>
                                                                                                    25-09-2026 10:00                                                                                            </td>
                                                                                    <td>
                                                                                                    Karthik R                                                                                            </td>
                                                                                    <td>
                                                                                                    No                                                                                            </td>
                                                                            </tr>
                                                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div><!-- End Tab: reminders -->

            <!-- ==================== Tab: activity_log ==================== -->
            <div class="cv-tab-panel" id="cvTab-activity_log" style="display: none;">
                <!-- Activity Log tab: table-a timeline format-a render pannirukom -->
                <style>
                    .cv-tl-head { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px; margin-bottom: 18px; }
                    .cv-tl-title { font-size: 15px; font-weight: 800; color: var(--ink-900); display: flex; align-items: center; gap: 8px; }
                    .cv-tl-title i { width: 32px; height: 32px; border-radius: 10px; background: var(--primary-soft); color: var(--primary-dark); display: inline-flex; align-items: center; justify-content: center; font-size: 15px; }
                    .cv-tl-sub { font-size: 12px; color: var(--ink-500); font-weight: 600; margin-top: 2px; }
                    .cv-tl-count { font-size: 11.5px; font-weight: 700; color: var(--primary-dark); background: var(--primary-soft); padding: 5px 12px; border-radius: 999px; }
                    .cv-tl { position: relative; }
                    .cv-tl-item { display: flex; gap: 14px; }
                    .cv-tl-marker { display: flex; flex-direction: column; align-items: center; flex: 0 0 auto; }
                    .cv-tl-dot { width: 38px; height: 38px; border-radius: 12px; background: linear-gradient(135deg, #16a34a, #15803d); color: #fff; display: inline-flex; align-items: center; justify-content: center; font-size: 15px; box-shadow: 0 4px 10px rgba(22, 163, 74, .25); flex: 0 0 auto; }
                    .cv-tl-line { width: 2px; flex: 1; background: var(--border-soft); margin: 4px 0; min-height: 26px; }
                    .cv-tl-card { flex: 1; background: #fff; border: 1px solid var(--border-soft); border-radius: 14px; padding: 14px 16px; margin-bottom: 14px; box-shadow: 0 2px 10px rgba(20, 20, 43, .04); transition: .15s; min-width: 0; }
                    .cv-tl-item:last-child .cv-tl-card { margin-bottom: 0; }
                    .cv-tl-card:hover { border-color: #bbf7d0; box-shadow: 0 4px 14px rgba(20, 20, 43, .07); }
                    .cv-tl-text { font-size: 13.5px; font-weight: 700; color: var(--ink-900); }
                    .cv-tl-meta { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 8px; font-size: 12px; font-weight: 600; color: var(--ink-500); }
                    .cv-tl-meta i { margin-right: 4px; color: var(--primary); }
                </style>

                                <div class="card-custom p-4">
                    <div class="cv-tl-head">
                        <div>
                            <div class="cv-tl-title"><i class="bi bi-card-list"></i> Activity Trail</div>
                            <div class="cv-tl-sub">All activities for GG COMPANY — latest first</div>
                        </div>
                        <span class="cv-tl-count">2 activities</span>
                    </div>

                    <div class="cv-tl">
                                                <div class="cv-tl-item">
                            <div class="cv-tl-marker">
                                <span class="cv-tl-dot"><i class="bi bi-person-up"></i></span>
                                <span class="cv-tl-line"></span>                            </div>
                            <div class="cv-tl-card">
                                <div class="cv-tl-text">Customer converted from lead</div>
                                <div class="cv-tl-meta">
                                    <span><i class="bi bi-person-fill"></i>Admin</span>
                                    <span><i class="bi bi-clock"></i>16-09-2026 11:53:29</span>
                                </div>
                            </div>
                        </div>
                                                <div class="cv-tl-item">
                            <div class="cv-tl-marker">
                                <span class="cv-tl-dot"><i class="bi bi-person-plus-fill"></i></span>
                                                            </div>
                            <div class="cv-tl-card">
                                <div class="cv-tl-text">Contact added: MOHAN S</div>
                                <div class="cv-tl-meta">
                                    <span><i class="bi bi-person-fill"></i>Admin</span>
                                    <span><i class="bi bi-clock"></i>16-09-2026 11:53:29</span>
                                </div>
                            </div>
                        </div>
                                            </div>
                </div>
            </div><!-- End Tab: activity_log -->

        </section>
    </div>
</main>
        <!-- Add new contact modal (same modal pattern as Leave Report) -->
        <div class="leave-reject-modal" id="cvContactModal" role="dialog" aria-modal="true" aria-labelledby="cvContactTitle">
            <div class="leave-reject-dialog cv-contact-dialog">
                <div class="cv-contact-head">
                    <div class="cv-contact-head-l">
                        <div class="cv-contact-ava"><i class="bi bi-person-plus-fill"></i></div>
                        <div style="min-width:0;">
                            <h3 id="cvContactTitle" class="mb-0">Add new contact</h3>
                            <div class="cv-contact-sub">GG COMPANY · Contact information & permissions</div>
                        </div>
                    </div>
                    <button type="button" class="modal-close" id="cvContactClose" aria-label="Close">&times;</button>
                </div>

                <div class="leave-reject-body cv-contact-body">
                    <!-- Avatar + identity -->
                    <div class="cv-avatar-upload">
                        <div class="cv-avatar-preview" id="ctAvatarPreview"><i class="bi bi-person-fill"></i></div>
                        <div style="min-width:0;">
                            <div class="cv-avatar-title">Profile image</div>
                            <p class="cv-avatar-hint">PNG or JPG, up to 2MB. Square images look best.</p>
                            <input type="file" class="form-control form-control-sm" id="ctImage" accept="image/*">
                        </div>
                    </div>

                    <!-- Contact details -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-person-vcard"></i> Contact details</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="ctFirst">First Name</label>
                                    <input type="text" class="form-control" id="ctFirst" autocomplete="off">
                                    <div class="cv-err" hidden>First name is required.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="ctLast">Last Name</label>
                                    <input type="text" class="form-control" id="ctLast" autocomplete="off">
                                    <div class="cv-err" hidden>Last name is required.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="ctEmail">Email</label>
                                    <input type="email" class="form-control" id="ctEmail" autocomplete="off">
                                    <div class="cv-err" hidden>Email is required.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label" for="ctPhone">Phone</label>
                                    <input type="tel" class="form-control" id="ctPhone" value="+91 " autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label" for="ctRole">Role Position</label>
                                    <input type="text" class="form-control" id="ctRole" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label" for="ctDirection">Direction</label>
                                    <select class="form-select" id="ctDirection">
                                        <option value="">System Default</option>
                                        <option value="ltr">LTR</option>
                                        <option value="rtl">RTL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Security -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-shield-lock"></i> Security</div>
                        <div class="cv-field mb-0">
                            <label class="form-label cv-required" for="ctPassword" id="ctPasswordLabel">Password</label>
                            <div class="cv-pass-wrap">
                                <input type="password" class="form-control" id="ctPassword" autocomplete="new-password">
                                <button type="button" class="cv-pass-btn" id="ctTogglePass" title="Show / hide password" aria-label="Show password"><i class="bi bi-eye-fill"></i></button>
                                <button type="button" class="cv-pass-btn" id="ctGenPass" title="Generate password" aria-label="Generate password"><i class="bi bi-arrow-repeat"></i></button>
                            </div>
                            <div class="cv-err" hidden>Password is required.</div>
                            <div class="cv-pass-meter"><i id="ctPassMeter"></i></div>
                            <div class="cv-pass-hint" id="ctPassHint">Password strength — type to see strength</div>
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-envelope-gear"></i> Email options</div>
                        <div class="cv-check-grid">
                            <label class="cv-check-card">
                                <input type="checkbox" class="form-check-input" id="ctPrimary">
                                <span><span class="t">Primary Contact</span><span class="d">Main point of contact for this customer</span></span>
                            </label>
                            <label class="cv-check-card">
                                <input type="checkbox" class="form-check-input" id="ctNoWelcome">
                                <span><span class="t">Do not send welcome email</span><span class="d">Skip the welcome email on save</span></span>
                            </label>
                            <label class="cv-check-card">
                                <input type="checkbox" class="form-check-input" id="ctSetPwd">
                                <span><span class="t">Send SET password email</span><span class="d">Contact chooses their own password</span></span>
                            </label>
                        </div>
                    </div>

                    <!-- Permissions -->
                    <div class="cv-section">
                        <div class="cv-sec-head">
                            <i class="bi bi-key"></i> Permissions
                            <label class="cv-sec-all" title="Toggle all permissions"><input type="checkbox" class="form-check-input" id="ctAllPerms" checked> Toggle all</label>
                        </div>
                        <p class="cv-warn">Make sure to set appropriate permissions for this contact.</p>
                        <div class="cv-perm-grid">
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Invoices</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Invoices" checked aria-label="Invoices permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Estimates</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Estimates" checked aria-label="Estimates permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Contracts</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Contracts" checked aria-label="Contracts permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Proposals</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Proposals" checked aria-label="Proposals permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Support</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Support" checked aria-label="Support permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Projects</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Projects" checked aria-label="Projects permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Purchase Orders</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Purchase Orders" checked aria-label="Purchase Orders permission"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Assets</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Assets" checked aria-label="Assets permission"><span class="slider"></span></label>
                                </div>
                                                    </div>
                    </div>

                    <!-- Email notifications -->
                    <div class="cv-section mb-0">
                        <div class="cv-sec-head">
                            <i class="bi bi-bell"></i> Email notifications
                            <label class="cv-sec-all" title="Toggle all notifications"><input type="checkbox" class="form-check-input" id="ctAllNotifs" checked> Toggle all</label>
                        </div>
                        <div class="cv-perm-grid">
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Invoice</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Invoice" checked aria-label="Invoice email notification"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Estimate</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Estimate" checked aria-label="Estimate email notification"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Credit Note</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Credit Note" checked aria-label="Credit Note email notification"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Project</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Project" checked aria-label="Project email notification"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Support Tickets</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Support Tickets" checked aria-label="Support Tickets email notification"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label">Contract</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Contract" checked aria-label="Contract email notification"><span class="slider"></span></label>
                                </div>
                                                            <div class="cv-perm-card">
                                    <span class="cv-perm-label"><i class="bi bi-question-circle"></i>Task</span>
                                    <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Task" checked aria-label="Task email notification"><span class="slider"></span></label>
                                </div>
                                                    </div>
                    </div>
                </div>

                <div class="leave-reject-foot pt-3">
                    <button type="button" class="btn btn-reject" id="cvContactCancel">Close</button>
                    <button type="button" class="btn btn-outline-primary me-2" id="cvContactReset"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset</button>
                    <button type="button" class="btn btn-primary" id="cvContactSubmit"><i class="bi bi-check2 me-1"></i>Save contact</button>
                </div>
            </div>
        </div>
    
        <!-- Add note modal -->
        <div class="leave-reject-modal" id="cvNoteModal" role="dialog" aria-modal="true" aria-labelledby="cvNoteTitle">
            <div class="leave-reject-dialog cv-note-dialog">
                <div class="cv-contact-head">
                    <div class="cv-contact-head-l">
                        <div class="cv-contact-ava"><i class="bi bi-journal-text"></i></div>
                        <div style="min-width:0;">
                            <h3 id="cvNoteTitle" class="mb-0">Add new note</h3>
                            <div class="cv-contact-sub">GG COMPANY · Internal note for this customer</div>
                        </div>
                    </div>
                    <button type="button" class="modal-close" id="cvNoteClose" aria-label="Close">&times;</button>
                </div>

                <div class="leave-reject-body cv-note-body">
                    <div class="cv-field mb-0">
                        <label class="form-label" for="cvNoteDesc">Note description</label>
                        <textarea class="form-control cv-note-textarea" id="cvNoteDesc" rows="6" placeholder="Write a note about this customer..."></textarea>
                        <div class="cv-err" id="cvNoteErr" hidden>Note description is required.</div>
                        <div class="cv-note-hint">Tip: press Ctrl + Enter to submit quickly.</div>
                    </div>
                </div>

                <div class="leave-reject-foot pt-3">
                    <button type="button" class="btn btn-reject" id="cvNoteCancel">Close</button>
                    <button type="button" class="btn btn-primary" id="cvNoteSubmit">Submit</button>
                </div>
            </div>
        </div>
    
        <!-- Add vault entry modal -->
        <div class="leave-reject-modal" id="cvVaultModal" role="dialog" aria-modal="true" aria-labelledby="cvVaultTitle">
            <div class="leave-reject-dialog cv-vault-dialog">
                <div class="cv-contact-head">
                    <div class="cv-contact-head-l">
                        <div class="cv-contact-ava cv-vault-ava"><i class="bi bi-lock-fill"></i></div>
                        <div style="min-width:0;">
                            <h3 id="cvVaultTitle" class="mb-0">Add vault entry</h3>
                            <div class="cv-contact-sub">GG COMPANY · Securely store server & login credentials</div>
                        </div>
                    </div>
                    <button type="button" class="modal-close" id="cvVaultClose" aria-label="Close">&times;</button>
                </div>

                <div class="leave-reject-body cv-contact-body">
                    <!-- Server details -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-hdd-network"></i> Server details</div>
                        <div class="row g-3">
                            <div class="col-md-8">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="cvServer">Server Address</label>
                                    <input type="text" class="form-control" id="cvServer" placeholder="e.g. ftp.example.com" autocomplete="off">
                                    <div class="cv-err" id="cvServerErr" hidden>Server address is required.</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cv-field mb-0">
                                    <label class="form-label" for="cvPort">Port</label>
                                    <input type="text" class="form-control" id="cvPort" placeholder="e.g. 21" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Login credentials -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-person-fill-lock"></i> Login credentials</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="cvUser">Username</label>
                                    <input type="text" class="form-control" id="cvUser" placeholder="Login username" autocomplete="off">
                                    <div class="cv-err" id="cvUserErr" hidden>Username is required.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="cvPass">Password</label>
                                    <div class="cv-pass-wrap">
                                        <input type="password" class="form-control" id="cvPass" placeholder="••••••••" autocomplete="new-password">
                                        <button type="button" class="cv-pass-eye" id="cvPassToggle" aria-label="Show password" tabindex="-1"><i class="bi bi-eye"></i></button>
                                        <button type="button" class="cv-pass-gen" id="cvPassGen" title="Generate strong password" aria-label="Generate password" tabindex="-1"><i class="bi bi-magic"></i></button>
                                    </div>
                                    <div class="cv-err" id="cvPassErr" hidden>Password is required.</div>
                                    <div class="cv-pass-meter"><i id="cvPassBar"></i></div>
                                    <div class="cv-pass-hint" id="cvPassHint">Use 8+ characters with letters, numbers & symbols.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-card-text"></i> Description</div>
                        <div class="cv-field mb-0">
                            <label class="form-label" for="cvDesc">Short Description</label>
                            <textarea class="form-control cv-vault-textarea" id="cvDesc" rows="4" placeholder="What is this credential for? e.g. cPanel login, FTP access..."></textarea>
                        </div>
                    </div>

                    <!-- Visibility -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-shield-lock"></i> Who can see this entry?</div>
                        <div class="cv-vault-vis-grid">
                            <label class="cv-vault-vis">
                                <input type="radio" name="cvVisibility" value="staff" checked>
                                <span class="cv-vault-vis-body">
                                    <span class="cv-vault-vis-title"><i class="bi bi-people-fill"></i> All staff</span>
                                    <span class="cv-vault-vis-desc">Visible to all staff members who have access to this customer</span>
                                </span>
                            </label>
                            <label class="cv-vault-vis">
                                <input type="radio" name="cvVisibility" value="admins">
                                <span class="cv-vault-vis-body">
                                    <span class="cv-vault-vis-title"><i class="bi bi-person-badge-fill"></i> Administrators only</span>
                                    <span class="cv-vault-vis-desc">Visible only to administrators of this customer</span>
                                </span>
                            </label>
                            <label class="cv-vault-vis">
                                <input type="radio" name="cvVisibility" value="me">
                                <span class="cv-vault-vis-body">
                                    <span class="cv-vault-vis-title"><i class="bi bi-person-lock"></i> Only me</span>
                                    <span class="cv-vault-vis-desc">Visible only to me (administrators are not excluded)</span>
                                </span>
                            </label>
                        </div>

                        <label class="cv-vault-share">
                            <input type="checkbox" id="cvShareProjects">
                            <span class="cv-vault-share-box"><i class="bi bi-check2"></i></span>
                            <span class="cv-vault-share-text">
                                <span class="t">Share in projects</span>
                                <span class="d">Share this vault entry in projects with project members</span>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="leave-reject-foot pt-3">
                    <button type="button" class="btn btn-reject" id="cvVaultCancel">Close</button>
                    <button type="button" class="btn btn-primary" id="cvVaultSubmit"><i class="bi bi-lock-fill me-1"></i>Save entry</button>
                </div>
            </div>
        </div>
    
        <!-- Set reminder modal -->
        <div class="leave-reject-modal" id="cvReminderModal" role="dialog" aria-modal="true" aria-labelledby="cvReminderTitle">
            <div class="leave-reject-dialog cv-vault-dialog" id="cvReminderDialog">
                <div class="cv-contact-head">
                    <div class="cv-contact-head-l">
                        <div class="cv-contact-ava"><i class="bi bi-bell-fill"></i></div>
                        <div style="min-width:0;">
                            <h3 id="cvReminderTitle" class="mb-0">Set reminder</h3>
                            <div class="cv-contact-sub">GG COMPANY · Get notified about important follow-ups</div>
                        </div>
                    </div>
                    <button type="button" class="modal-close" id="cvReminderClose" aria-label="Close">&times;</button>
                </div>

                <div class="leave-reject-body cv-contact-body cv-reminder-body">
                    <!-- Date to be notified -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-calendar-event"></i> Reminder date & time</div>
                        <div class="row g-3">
                            <div class="col-md-7">
                                <div class="cv-field mb-0">
                                    <label class="form-label cv-required" for="cvRemDate">Date to be notified</label>
                                    <input type="date" class="form-control" id="cvRemDate">
                                    <div class="cv-err" id="cvRemDateErr" hidden>Date to be notified is required.</div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="cv-field mb-0">
                                    <label class="form-label" for="cvRemTime">Time</label>
                                    <input type="time" class="form-control" id="cvRemTime">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assign to -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-person-check"></i> Notify whom?</div>
                        <div class="cv-field mb-0">
                            <label class="form-label cv-required" for="cvRemStaff">Set reminder to</label>
                            <select class="form-select" id="cvRemStaff">
                                <option value="">Select staff member</option>
                                <option>gharuda SOFTWARE</option>
                                <option>Karthik R</option>
                                <option>Divya M</option>
                                <option>Madhupriya S</option>
                            </select>
                            <div class="cv-err" id="cvRemStaffErr" hidden>Please select a staff member.</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="cv-section">
                        <div class="cv-sec-head"><i class="bi bi-card-text"></i> Description</div>
                        <div class="cv-field mb-0">
                            <label class="form-label cv-required" for="cvRemDesc">Description</label>
                            <textarea class="form-control cv-reminder-textarea" id="cvRemDesc" rows="4" placeholder="What should they be reminded about? e.g. Follow up on proposal..."></textarea>
                            <div class="cv-err" id="cvRemDescErr" hidden>Description is required.</div>
                            <div class="cv-reminder-hint">Tip: press Ctrl + Enter to submit quickly.</div>
                        </div>
                    </div>

                    <!-- Email option -->
                    <label class="cv-reminder-email">
                        <input type="checkbox" id="cvRemEmail">
                        <span class="cv-reminder-email-box"><i class="bi bi-check2"></i></span>
                        <span class="cv-reminder-email-text">
                            <span class="t">Send email notification</span>
                            <span class="d">Also send an email for this reminder to the selected staff</span>
                        </span>
                    </label>
                </div>

                <div class="leave-reject-foot pt-3">
                    <button type="button" class="btn btn-reject" id="cvReminderCancel">Close</button>
                    <button type="button" class="btn btn-primary" id="cvReminderSubmit"><i class="bi bi-bell-fill me-1"></i>Set reminder</button>
                </div>
            </div>
        </div>
    
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
        <style>
            /* ===== New Appointment modal (appointments.php oda copy) ===== */
            .apm-modal .modal-content { border: none; border-radius: 16px; box-shadow: 0 20px 50px rgba(17, 24, 39, .18); }
            .apm-modal .modal-header { border-bottom: 1px solid var(--border-soft); padding: 16px 20px; }
            .apm-modal .modal-title { font-size: 15.5px; font-weight: 800; color: #111827; display: flex; align-items: center; gap: 9px; }
            .apm-modal .modal-title i { width: 32px; height: 32px; border-radius: 10px; background: var(--primary-soft); color: var(--primary-dark); display: inline-flex; align-items: center; justify-content: center; font-size: 15px; }
            .apm-modal .modal-body { padding: 20px; }
            .apm-modal .form-label { font-size: 12px; font-weight: 800; color: #374151; margin-bottom: 5px; }
            .apm-modal .form-control,
            .apm-modal .form-select { font-size: 13px; border-radius: 10px; border-color: #e5e7eb; padding: 9px 12px; }
            .apm-modal .form-control:focus,
            .apm-modal .form-select:focus { border-color: #86efac; box-shadow: 0 0 0 3px rgba(12, 163, 8, .1); }
            .apm-modal .modal-footer { border-top: 1px solid var(--border-soft); padding: 14px 20px; }

            /* Cron note + notification checkboxes */
            .apm-cron-note { font-size: 11px; color: var(--ink-500); font-weight: 600; line-height: 1.5; background: var(--bg-app); border-radius: 8px; padding: 8px 10px; }
            .apm-notif-check { display: flex; align-items: center; gap: 8px; font-size: 12.5px; font-weight: 600; color: var(--ink-700); }

            /* Quill editor (project style) */
            .apm-quill-wrap { border: 1px solid var(--border-soft); border-radius: 10px; }
            .apm-quill-wrap .ql-toolbar { border: none !important; border-bottom: 1px solid var(--border-soft) !important; border-radius: 10px 10px 0 0; font-family: 'Manrope', sans-serif; padding: 8px 10px; }
            .apm-quill-wrap .ql-container { border: none !important; border-radius: 0 0 10px 10px; font-family: 'Manrope', sans-serif; }
            .apm-quill-wrap .ql-editor { min-height: 110px; font-size: 13px; color: var(--ink-700); }
        </style>

        <!-- New Appointment modal (appointments.php la irundhu copy — customer details prefill aagum) -->
        <div class="modal fade apm-modal" id="apmContactModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-calendar-plus"></i>New appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">* Subject</label>
                                <input type="text" class="form-control" id="apmCtSubject" autocomplete="off">
                            </div>
                            <div class="col-12">
                                <label class="form-label">* Description</label>
                                <textarea class="form-control" id="apmCtDesc" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">* Related</label>
                                <select class="form-select" id="apmCtRelated">
                                    <option value="">Non selected</option>
                                    <option value="Contact">Internal (Contact)</option>
                                    <option value="Lead">Lead</option>
                                    <option value="External">External</option>
                                </select>
                            </div>
                            <!-- Related = Lead -> Leads searchable select -->
                            <div class="col-12" id="apmRelLeadBlock" style="display:none;">
                                <label class="form-label">Leads</label>
                                <select class="form-select select2" id="apmRelLead" data-placeholder="Select and begin typing">
                                    <option value=""></option>
                                    <option>Gharuda Software</option>
                                    <option>Acme Corporation</option>
                                    <option>Sunrise Enterprises</option>
                                    <option>Bluewave Solutions</option>
                                </select>
                            </div>
                            <!-- Related = External -> Name, Email, Phone, Project -->
                            <div class="col-12" id="apmRelExternalBlock" style="display:none;">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="apmRelExtName" autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" id="apmRelExtEmail" autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Phone (Ex: +1 69 1234 5678)</label>
                                        <input type="text" class="form-control" id="apmRelExtPhone" autocomplete="off">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Project</label>
                                        <select class="form-select" id="apmRelExtProject">
                                            <option value="">Non selected</option>
                                            <option>HRMS Implementation</option>
                                            <option>Website Revamp</option>
                                            <option>Mobile App Development</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Related = Internal (Contact) -> Contact select -->
                            <div class="col-12" id="apmRelInternalBlock" style="display:none;">
                                <label class="form-label">Contact</label>
                                <select class="form-select" id="apmRelContact">
                                    <option value="">Non selected</option>
                                    <option>Suresh Babu</option>
                                    <option>Priya R</option>
                                    <option>Karthik R</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">* Date / Time</label>
                                <input type="datetime-local" class="form-control" id="apmCtDateTime">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Appointment Location (optional)</label>
                                <input type="text" class="form-control" id="apmCtLocation" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">* Attendees</label>
                                <select class="form-select" id="apmCtAttendees">
                                    <option value="gharuda SOFTWARE">gharuda SOFTWARE</option>
                                    <option value="Harish D.">Harish D.</option>
                                    <option value="Divya A.">Divya A.</option>
                                    <option value="Priya S.">Priya S.</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Appointment Type</label>
                                <select class="form-select select2" id="apmCtType">
                                    <option value="">Non selected</option>
                                    <option value="SD - Online Demo" data-color="#16a34a">SD - Online Demo</option>
                                    <option value="SD - Direct Visit - lead" data-color="#0d9488">SD - Direct Visit - lead</option>
                                    <option value="DEV - Direct Visit - customer" data-color="#9f1239">DEV - Direct Visit - customer</option>
                                    <option value="DEV - Customer visit - GHARUDA" data-color="#2563eb">DEV - Customer visit - GHARUDA</option>
                                    <option value="DEV - Online Demo - Customer" data-color="#dc2626">DEV - Online Demo - Customer</option>
                                    <option value="SD - GHARUDA Visit" data-color="#06b6d4">SD - GHARUDA Visit</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Repeat every</label>
                                <select class="form-select" id="apmCtRepeat">
                                    <option value="">Non selected</option>
                                    <option value="1 week">1 week</option>
                                    <option value="2 weeks">2 weeks</option>
                                    <option value="1 month">1 month</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="apm-cron-note">Please mark the checkboxes as checked if you want selected attendee and contact to receive reminders eg. if set 30 minutes before the appointment start. Note that this feature requires cron job to be configured.</div>
                                <div class="apm-notif-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="apmCtSms">
                                    <label class="form-check-label" for="apmCtSms">SMS Notification</label>
                                </div>
                                <div class="apm-notif-check">
                                    <input class="form-check-input" type="checkbox" id="apmCtEmail">
                                    <label class="form-check-label" for="apmCtEmail">Email Notification</label>
                                </div>

                                <!-- SMS reminder value block (shown when SMS ticked) -->
                                <div id="apmSmsReminderBlock" style="display:none;" class="mt-2">
                                    <label class="form-label" style="margin-bottom:6px;">Add value to receive an SMS notification prior to your appointment (default 30 min before)</label>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="position-relative" style="flex:1;max-width:120px;">
                                            <input type="number" min="0" class="form-control" id="apmSmsReminderValue" placeholder="" style="padding-right:38px;">
                                            <button type="button" class="btn btn-sm btn-primary position-absolute" id="apmSmsReminderInfo"
                                                style="right:6px;top:50%;transform:translateY(-50%);width:24px;height:24px;padding:0;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Minutes before the appointment start">
                                                <i class="bi bi-info-circle" style="font-size:12px;"></i>
                                            </button>
                                        </div>
                                        <select class="form-select" id="apmSmsReminderUnit" style="max-width:140px;">
                                            <option value="minutes" selected>Minutes</option>
                                            <option value="hours">Hours</option>
                                            <option value="days">Days</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Email reminder value block (shown when Email ticked) -->
                                <div id="apmEmailReminderBlock" style="display:none;" class="mt-2">
                                    <label class="form-label" style="margin-bottom:6px;">Add value to receive an email notification prior to your appointment (default 30 min before)</label>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="position-relative" style="flex:1;max-width:120px;">
                                            <input type="number" min="0" class="form-control" id="apmEmailReminderValue" placeholder="" style="padding-right:38px;">
                                            <button type="button" class="btn btn-sm btn-primary position-absolute" id="apmEmailReminderInfo"
                                                style="right:6px;top:50%;transform:translateY(-50%);width:24px;height:24px;padding:0;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Minutes before the appointment start">
                                                <i class="bi bi-info-circle" style="font-size:12px;"></i>
                                            </button>
                                        </div>
                                        <select class="form-select" id="apmEmailReminderUnit" style="max-width:140px;">
                                            <option value="minutes" selected>Minutes</option>
                                            <option value="hours">Hours</option>
                                            <option value="days">Days</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Appointment notes</label>
                                <div class="apm-quill-wrap">
                                    <div id="apmCtQuill"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="apmCtSubmit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- New Call Log modal — fullscreen -->
        <div class="modal fade" id="cvNewCallLogModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="cv-cl-header">
                        <div class="cv-contact-head-l">
                            <div class="cv-contact-ava"><i class="bi bi-telephone-fill"></i></div>
                            <div style="min-width:0;">
                                <h3 id="cvCallLogTitle" class="mb-0">Add new call log</h3>
                                <div class="cv-contact-sub">GG COMPANY · Record call details & follow-ups</div>
                            </div>
                        </div>
                        <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>

                    <div class="modal-body cv-cl-body">
                        <div class="cv-cl-grid">
                            <!-- Left: main details -->
                            <div class="cv-cl-card">
                                <div class="cv-cl-card-head"><i class="bi bi-telephone-outbound"></i> Call details</div>

                                <div class="cv-cl-field">
                                    <label class="cv-required">Related</label>
                                    <select class="form-select" id="clRelated">
                                        <option value="Customer" selected>Customer</option>
                                        <option value="Lead">Lead</option>
                                        <option value="Project">Project</option>
                                    </select>
                                </div>

                                <div class="cv-cl-field">
                                    <label class="cv-required">Customer</label>
                                    <select class="form-select" id="clCustomer">
                                        <option selected>GG COMPANY</option>
                                    </select>
                                </div>

                                <div class="cv-cl-grid-2">
                                    <div class="cv-cl-field mb-0">
                                        <label class="cv-required">Type</label>
                                        <select class="form-select" id="clType">
                                            <option value="">Non selected</option>
                                            <option value="Outgoing">Outgoing</option>
                                            <option value="Incoming">Incoming</option>
                                            <option value="Missed">Missed</option>
                                        </select>
                                        <div class="cv-err" id="clTypeErr" hidden>Please select a call type.</div>
                                    </div>
                                    <div class="cv-cl-field mb-0">
                                        <label>Call Type</label>
                                        <select class="form-select" id="clCallType">
                                            <option value="">Non selected</option>
                                            <option value="Support">Support</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Follow-up">Follow-up</option>
                                            <option value="General">General</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="cv-cl-field">
                                    <label class="cv-required">Caller</label>
                                    <input type="text" class="form-control" id="clCaller" placeholder="Caller name" autocomplete="off">
                                    <div class="cv-err" id="clCallerErr" hidden>Caller is required.</div>
                                </div>

                                <div class="cv-cl-field">
                                    <label class="cv-required">Contact</label>
                                    <input type="tel" class="form-control" id="clContact" placeholder="Contact number" autocomplete="off">
                                    <div class="cv-err" id="clContactErr" hidden>Contact number is required.</div>
                                </div>

                                <div class="cv-cl-field">
                                    <label class="cv-required">Call Purpose</label>
                                    <input type="text" class="form-control" id="clPurpose" placeholder="e.g. Discuss proposal" autocomplete="off">
                                    <div class="cv-err" id="clPurposeErr" hidden>Call purpose is required.</div>
                                </div>

                                <div class="cv-cl-field">
                                    <label class="cv-required">Call Summary</label>
                                    <textarea class="form-control cv-cl-textarea" id="clSummary" rows="4" placeholder="What was discussed in the call?"></textarea>
                                    <div class="cv-err" id="clSummaryErr" hidden>Call summary is required.</div>
                                </div>

                                <div class="cv-cl-inline">
                                    <span class="cv-cl-inline-lbl">Follow-up Required</span>
                                    <div class="cv-cl-yn" role="radiogroup">
                                        <label><input type="radio" name="clFollowup" value="Yes"><span>Yes</span></label>
                                        <label><input type="radio" name="clFollowup" value="No" checked><span>No</span></label>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: advanced options -->
                            <div class="cv-cl-card">
                                <div class="cv-cl-card-head"><i class="bi bi-sliders"></i> Advanced options</div>

                                <div class="cv-cl-field">
                                    <label>Call Start Time</label>
                                    <input type="datetime-local" class="form-control" id="clStart">
                                </div>

                                <div class="cv-cl-field">
                                    <label>Call End Time</label>
                                    <input type="datetime-local" class="form-control" id="clEnd">
                                </div>

                                <div class="cv-cl-field">
                                    <label>Call Duration</label>
                                    <input type="text" class="form-control" id="clDuration" readonly placeholder="Auto-calculated from start & end time">
                                </div>

                                <div class="cv-cl-field">
                                    <label>Call Owner</label>
                                    <input type="text" class="form-control" id="clOwner" value="info@GHARUDAtechnology.com" readonly style="background:#f8f9fa;">
                                </div>

                                <div class="cv-cl-field">
                                    <label>Call with Staff Member</label>
                                    <select class="form-select" id="clStaff">
                                        <option value="">Non selected</option>
                                        <option>gharuda SOFTWARE</option>
                                        <option>Karthik R</option>
                                        <option>Divya M</option>
                                        <option>Madhupriya S</option>
                                    </select>
                                </div>

                                <div class="cv-cl-inline">
                                    <span class="cv-cl-inline-lbl">Completed</span>
                                    <div class="cv-cl-yn" role="radiogroup">
                                        <label><input type="radio" name="clCompleted" value="Yes"><span>Yes</span></label>
                                        <label><input type="radio" name="clCompleted" value="No" checked><span>No</span></label>
                                    </div>
                                </div>

                                <div class="cv-cl-inline">
                                    <span class="cv-cl-inline-lbl">Important</span>
                                    <div class="cv-cl-yn" role="radiogroup">
                                        <label><input type="radio" name="clImportant" value="Yes"><span>Yes</span></label>
                                        <label><input type="radio" name="clImportant" value="No" checked><span>No</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cv-cl-footer">
                        <button type="button" class="btn btn-reject" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="clSubmit"><i class="bi bi-telephone-fill me-1"></i>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- New Proposal modal — copied from lead.php #newProposalModal -->
    <div class="modal fade" id="newProposalModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="border:none;">
                <style>
                    #newProposalModal .modal-content {
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                    }

                    #newProposalModal .modal-body {
                        flex: 1 1 auto;
                        min-height: 0;
                        overflow-y: auto;
                        padding: 0;
                    }

                    .np-header {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        padding: 16px 28px;
                        border-bottom: 1px solid #e5e7eb;
                        background: #f8f9fb;
                    }

                    .np-header h5 {
                        font-size: 16px;
                        font-weight: 800;
                        margin: 0;
                        color: #111827;
                    }

                    .np-body {
                        padding: 24px 28px;
                    }

                    .np-grid {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 20px 40px;
                    }

                    .np-field {
                        margin-bottom: 14px;
                    }

                    .np-field label {
                        display: block;
                        font-size: 12px;
                        font-weight: 700;
                        color: #374151;
                        margin-bottom: 4px;
                    }

                    .np-field label .req {
                        color: #dc2626;
                        margin-right: 2px;
                    }

                    .np-field .form-control,
                    .np-field .form-select {
                        font-size: 13px;
                        border-radius: 8px;
                    }

                    .np-field textarea.form-control {
                        min-height: 60px;
                        resize: vertical;
                    }

                    .np-row {
                        display: flex;
                        gap: 14px;
                    }

                    .np-row .np-field {
                        flex: 1;
                        min-width: 0;
                    }

                    .np-toggle {
                        display: flex;
                        align-items: center;
                        gap: 8px;
                        font-size: 13px;
                        font-weight: 600;
                        color: #374151;
                    }

                    .np-toggle input[type=checkbox] {
                        width: 38px;
                        height: 20px;
                        accent-color: var(--primary, #0ca308);
                    }

                    /* Items table */
                    .np-items-section {
                        margin-top: 20px;
                        border-top: 1px solid #e5e7eb;
                        padding-top: 20px;
                    }

                    .np-items-toolbar {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        margin-bottom: 14px;
                        flex-wrap: wrap;
                    }

                    .np-items-toolbar .np-add-item-wrap {
                        display: flex;
                        align-items: center;
                        gap: 6px;
                    }

                    .np-items-toolbar .np-add-item-wrap .form-select {
                        width: 220px;
                        font-size: 13px;
                        border-radius: 8px;
                    }

                    .np-items-toolbar .np-add-item-wrap .btn {
                        width: 34px;
                        height: 34px;
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-size: 16px;
                        font-weight: 700;
                    }

                    .np-qty-radio {
                        margin-left: auto;
                        display: flex;
                        align-items: center;
                        gap: 12px;
                        font-size: 12px;
                        font-weight: 600;
                        color: #374151;
                    }

                    .np-qty-radio label {
                        display: flex;
                        align-items: center;
                        gap: 4px;
                        cursor: pointer;
                        margin: 0;
                    }

                    .np-item-table {
                        width: 100%;
                        border-collapse: separate;
                        border-spacing: 0;
                        font-size: 12.5px;
                    }

                    .np-item-table th {
                        background: #f0f2f5;
                        color: #6b7280;
                        font-weight: 700;
                        font-size: 11px;
                        text-transform: uppercase;
                        letter-spacing: .03em;
                        padding: 8px 10px;
                        border-bottom: 1px solid #e5e7eb;
                        text-align: left;
                    }

                    .np-item-table td {
                        padding: 8px 10px;
                        border-bottom: 1px solid #f0f2f5;
                        vertical-align: middle;
                    }

                    .np-item-table .form-control,
                    .np-item-table .form-select {
                        font-size: 12px;
                        border-radius: 6px;
                        padding: 5px 8px;
                    }

                    .np-item-table textarea.form-control {
                        min-height: 50px;
                        resize: vertical;
                        font-size: 12px;
                    }

                    .np-item-table .np-check-btn {
                        width: 32px;
                        height: 32px;
                        border-radius: 8px;
                        border: none;
                        background: var(--primary, #0ca308);
                        color: #fff;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        cursor: pointer;
                    }

                    /* Totals */
                    .np-totals {
                        display: flex;
                        justify-content: flex-end;
                        padding: 16px 0;
                    }

                    .np-totals-table {
                        width: 360px;
                    }

                    .np-totals-row {
                        display: grid;
                        grid-template-columns: 1fr auto auto;
                        align-items: center;
                        gap: 12px;
                        padding: 8px 0;
                        font-size: 13px;
                        border-bottom: 1px solid #f0f2f5;
                    }

                    .np-totals-row:last-child {
                        border-bottom: none;
                        padding-top: 10px;
                    }

                    .np-totals-row .total-label {
                        color: #6b7280;
                        font-weight: 600;
                        text-align: right;
                    }

                    .np-totals-row .total-val {
                        font-weight: 800;
                        color: #111827;
                        text-align: right;
                        min-width: 80px;
                    }

                    .np-totals-row .total-grand {
                        font-size: 15px;
                        color: var(--primary, #0ca308);
                    }

                    .np-totals-row input {
                        width: 110px;
                        text-align: right;
                        border-radius: 6px;
                        font-size: 12px;
                        padding: 5px 10px;
                    }

                    /* Notes */
                    .np-notes-section {
                        margin-top: 0;
                        padding: 20px 28px;
                        border-top: 1px solid #e5e7eb;
                        background: #fafbfc;
                    }

                    .np-notes-section label {
                        font-size: 12px;
                        font-weight: 700;
                        color: #374151;
                        margin-bottom: 4px;
                        display: block;
                    }

                    .np-notes-section textarea {
                        min-height: 70px;
                        resize: vertical;
                        border-radius: 8px;
                        font-size: 13px;
                        border: 1px solid #d1d5db;
                    }

                    .np-notes-section textarea.np-tc {
                        min-height: 80px;
                    }

                    .np-notes-section textarea.np-tc:focus {
                        outline: 2px solid var(--primary, #0ca308);
                        outline-offset: 1px;
                        border-color: var(--primary, #0ca308);
                    }

                    /* Footer */
                    .np-footer {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        padding: 14px 28px;
                        border-top: 1px solid #e5e7eb;
                        background: #f8f9fb;
                    }

                    .np-footer .np-hint {
                        font-size: 11.5px;
                        color: #9ca3af;
                    }

                    .np-footer .np-actions {
                        display: flex;
                        gap: 8px;
                    }

                    .np-footer .np-actions .btn {
                        font-size: 13px;
                        font-weight: 700;
                        border-radius: 8px;
                        padding: 8px 20px;
                    }
                </style>
                <div class="np-header">
                    <h5>New Proposal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="display:flex;flex-direction:column;flex:1 1 auto;min-height:0;overflow-y:auto;padding:0;">
                    <div class="np-body">
                        <div class="np-grid">
                            <!-- Left Column -->
                            <div>
                                <div class="np-field"><label><span class="req">*</span>Subject</label><input type="text" class="form-control" placeholder="Proposal subject"></div>
                                <div class="np-field"><label><span class="req">*</span>Related</label><select class="form-select">
                                        <option selected>Lead</option>
                                        <option>Customer</option>
                                    </select></div>
                                <div class="np-field"><label><span class="req">*</span>Lead</label><select class="form-select" id="npLeadSelect">
                                        <option>Suresh - gh@gharuda.com</option>
                                        <option>Arun Kumar - info@vetri.co</option>
                                        <option>Meena Ramesh - meena@srlakshmi.in</option>
                                    </select></div>
                                <div class="np-row">
                                    <div class="np-field"><label><span class="req">*</span>Date</label><input type="date" class="form-control" value="2026-09-19"></div>
                                    <div class="np-field"><label>Open Till</label><input type="date" class="form-control" value="2026-09-26"></div>
                                </div>
                                <div class="np-row">
                                    <div class="np-field"><label><span class="req">*</span>Currency</label><select class="form-select">
                                            <option selected>INR ₹</option>
                                            <option>USD $</option>
                                            <option>EUR €</option>
                                            <option>GBP £</option>
                                        </select></div>
                                    <div class="np-field"><label>Discount type</label><select class="form-select">
                                            <option selected>No discount</option>
                                            <option>Before Tax</option>
                                            <option>After Tax</option>
                                        </select></div>
                                </div>
                                <div class="np-field">
                                    <label><i class="bi bi-tag me-1"></i>Tags</label>
                                    <div class="nl-tags-wrap" id="npTagsWrap" style="max-width:100%;">
                                        <div class="nl-tags-chips" id="npTagsChips"></div>
                                        <input type="text" class="nl-tags-input" id="npTagsInput" placeholder="Type and press Enter...">
                                    </div>
                                    <input type="hidden" id="np_tags" value="">
                                </div>
                                <div class="np-field">
                                    <div class="np-toggle"><input type="checkbox" checked id="npAllowComments"><label for="npAllowComments">Allow Comments</label></div>
                                </div>
                            </div>
                            <!-- Right Column -->
                            <div>
                                <div class="np-row">
                                    <div class="np-field"><label>Status</label><select class="form-select">
                                            <option selected>Draft</option>
                                            <option>Sent</option>
                                            <option>Accepted</option>
                                            <option>Rejected</option>
                                        </select></div>
                                    <div class="np-field"><label>Assigned</label><select class="form-select">
                                            <option selected>GHRAUDA SOFTWARE</option>
                                            <option>Harish D.</option>
                                            <option>Divya A.</option>
                                        </select></div>
                                </div>
                                <div class="np-field"><label><span class="req">*</span>To</label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
                                <div class="np-field"><label>Address</label><textarea class="form-control" rows="2">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</textarea></div>
                                <div class="np-row">
                                    <div class="np-field"><label>Country</label><select class="form-select">
                                            <option selected>India</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select></div>
                                    <div class="np-field"><label>State</label><select class="form-select">
                                            <option value="">Nothing selected</option>
                                            <option>Tamil Nadu</option>
                                            <option>Karnataka</option>
                                            <option>Maharashtra</option>
                                        </select></div>
                                </div>
                                <div class="np-row">
                                    <div class="np-field"><label>City</label><select class="form-select">
                                            <option value="">Nothing selected</option>
                                            <option>Chennai</option>
                                            <option>Bangalore</option>
                                            <option>Mumbai</option>
                                        </select></div>
                                    <div class="np-field"><label>Zip Code</label><input type="text" class="form-control" value="600100"></div>
                                </div>
                                <div class="np-row">
                                    <div class="np-field"><label><span class="req">*</span>Email</label><input type="email" class="form-control" value="gh@gharuda.com"></div>
                                    <div class="np-field"><label>Phone</label><input type="text" class="form-control" value="9876543218"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Items Section -->
                        <div class="np-items-section">
                            <div class="np-items-toolbar">
                                <div class="np-add-item-wrap">
                                    <select class="form-select" id="npAddItemSelect">
                                        <option value="">Add Item</option>
                                        <option>HRMS Subscription</option>
                                        <option>Payroll Module</option>
                                        <option>Custom Development</option>
                                        <option>Consulting Hours</option>
                                    </select>
                                    <button type="button" class="btn btn-primary" id="npAddItemBtn" title="Add item"><i class="bi bi-plus-lg"></i></button>
                                </div>
                                <div class="np-qty-radio">
                                    <span>Show quantity as:</span>
                                    <label><input type="radio" name="npQtyType" checked> Qty</label>
                                    <label><input type="radio" name="npQtyType"> Hours</label>
                                    <label><input type="radio" name="npQtyType"> Qty/Hours</label>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="np-item-table">
                                    <thead>
                                        <tr>
                                            <th style="width:30px;"><i class="bi bi-info-circle" style="color:#9ca3af;"></i></th>
                                            <th>Item</th>
                                            <th style="width:200px;">Description</th>
                                            <th style="width:80px;">Qty</th>
                                            <th style="width:110px;">Rate</th>
                                            <th style="width:100px;">Discount %</th>
                                            <th style="width:110px;">Tax</th>
                                            <th style="width:110px;">Amount</th>
                                            <th style="width:36px;"><i class="bi bi-gear" style="color:#9ca3af;"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody id="npItemBody">
                                        <tr>
                                            <td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>
                                            <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                                            <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                                            <td><input type="number" class="form-control" value="1" min="0"></td>
                                            <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                            <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                                            <td><select class="form-select">
                                                    <option selected>No Tax</option>
                                                    <option>GST 5%</option>
                                                    <option>GST 12%</option>
                                                    <option>GST 18%</option>
                                                </select></td>
                                            <td><span style="font-weight:700;color:#111827;">₹ 0.00</span></td>
                                            <td><button type="button" class="np-check-btn" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Totals -->
                            <div class="np-totals">
                                <div class="np-totals-table">
                                    <div class="np-totals-row"><span class="total-label">Sub Total :</span><span class="total-val" style="margin-right: -10px;">₹ 0.00</span></div>
                                    <div class="np-totals-row"><span class="total-label">Adjustment</span><input type="number" class="form-control" value="0" style="width:120px;"><span class="total-val">₹ 0.00</span></div>
                                    <div class="np-totals-row"><span class="total-label">Transport Amount</span><input type="number" class="form-control" value="0" style="width:120px;"><span class="total-val">₹ 0.00</span></div>
                                    <div class="np-totals-row"><span class="total-label">Total :</span><span class="total-val total-grand" style="margin-right: -10px;">₹ 0.00</span></div>
                                </div>
                            </div>
                        </div>

                        <!-- Notes Section -->
                        <div class="np-notes-section">
                            <div class="mb-3"><label>Client Note</label><textarea class="form-control" placeholder="Enter client note..."></textarea></div>
                            <div><label>Terms & Conditions</label><textarea class="form-control np-tc" placeholder="Enter terms and conditions..."></textarea></div>
                        </div>
                    </div>
                </div><!-- /modal-body -->
                <!-- Footer -->
                <div class="np-footer">
                    <span class="np-hint">Include proposal items with merge field anywhere in proposal content as {proposal_items}</span>
                    <div class="np-actions">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">View PDF</button>
                        <button type="button" class="btn btn-primary">Download</button>
                        <button type="button" class="btn btn-primary">Print</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        /* footer.php loads bootstrap after this block — bind on DOMContentLoaded */
        document.addEventListener('DOMContentLoaded', function() {
            /* New Proposal button -> open modal */
            var npBtn = document.getElementById('cvNewProposalBtn');
            if (npBtn) {
                npBtn.addEventListener('click', function() {
                    var npModal = document.getElementById('newProposalModal');
                    if (npModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(npModal).show();
                    }
                });
            }

            /* Proposal tags chip input */
            var chipsWrap = document.getElementById('npTagsChips');
            var input = document.getElementById('npTagsInput');
            var hidden = document.getElementById('np_tags');
            var wrap = document.getElementById('npTagsWrap');
            if (chipsWrap && input && hidden) {
                var tags = [];

                function syncHidden() {
                    hidden.value = tags.join(',');
                }

                function addTag(text) {
                    var val = text.trim().replace(/,/g, '');
                    if (!val || tags.indexOf(val) !== -1) return;
                    tags.push(val);
                    var chip = document.createElement('span');
                    chip.className = 'nl-tag-chip';
                    chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                    chipsWrap.appendChild(chip);
                    chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                        var idx = tags.indexOf(val);
                        if (idx !== -1) tags.splice(idx, 1);
                        chip.remove();
                        syncHidden();
                    });
                    syncHidden();
                }
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        addTag(input.value);
                        input.value = '';
                    }
                    if (e.key === 'Backspace' && !input.value && tags.length) {
                        var last = chipsWrap.lastElementChild;
                        if (last) last.querySelector('.nl-tag-x').click();
                    }
                });
                input.addEventListener('blur', function() {
                    if (input.value.trim()) {
                        addTag(input.value);
                        input.value = '';
                    }
                });
                if (wrap) wrap.addEventListener('click', function() {
                    input.focus();
                });
            }

            /* Add / remove item row */
            var addBtn = document.getElementById('npAddItemBtn');
            var itemBody = document.getElementById('npItemBody');
            var addSelect = document.getElementById('npAddItemSelect');
            if (addBtn && itemBody) {
                addBtn.addEventListener('click', function() {
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                        '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                        '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                        '<td><input type="number" class="form-control" value="1" min="0"><div style="font-size:10px;color:#9ca3af;margin-top:2px;">Unit</div></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                        '<td><span style="font-weight:700;color:#111827;">₹ 0.00</span></td>' +
                        '<td><button type="button" class="np-check-btn np-remove-item" title="Remove"><i class="bi bi-trash"></i></button></td>';
                    itemBody.appendChild(tr);
                    if (addSelect) addSelect.value = '';
                });
                itemBody.addEventListener('click', function(e) {
                    var btn = e.target.closest('.np-remove-item');
                    if (btn) btn.closest('tr').remove();
                });
            }
        });
    </script>

                    <!-- Assign Admin modal (same modal pattern as Leave Report) -->
                    <div class="leave-reject-modal" id="cvAssignModal" role="dialog" aria-modal="true" aria-labelledby="cvAssignTitle">
                        <div class="leave-reject-dialog">
                            <div class="leave-reject-head">
                                <h3 id="cvAssignTitle">Assign Admin</h3><button type="button" class="modal-close" id="cvAssignClose" aria-label="Close">&times;</button>
                            </div>
                            <div class="leave-reject-body">
                                <select class="form-select" id="cvAssignSelect" aria-label="Staff member">
                                    <option value="">Non selected</option>
                                    <option>Karthik R</option><option>Divya M</option><option>Arun Kumar</option><option>Bala Kumar</option><option>Chandran</option>                                </select>
                                <div class="text-danger small mt-2" id="cvAssignError" hidden>Select a staff member.</div>
                            </div>
                            <div class="leave-reject-foot pt-3"><button type="button" class="btn btn-reject" id="cvAssignCancel">Close</button><button type="button" class="btn btn-primary" id="cvAssignSubmit">Submit</button></div>
                        </div>
                    </div>
                
<script>
document.addEventListener('DOMContentLoaded', function() {
    var tabLinks = document.querySelectorAll('.cv-side a[data-tab]');
    var tabPanels = document.querySelectorAll('.cv-tab-panel');
    var titleEl = document.querySelector('.cv-title');
    var breadcrumbTab = document.getElementById('cvBreadcrumbTab');

    function activateTab(tabKey) {
        if (!tabKey) return;
        var targetLink = document.querySelector('.cv-side a[data-tab="' + tabKey + '"]');
        var targetPanel = document.getElementById('cvTab-' + tabKey);
        if (!targetLink || !targetPanel) return;

        tabLinks.forEach(function(l) {
            l.classList.remove('active');
            l.removeAttribute('aria-current');
        });
        targetLink.classList.add('active');
        targetLink.setAttribute('aria-current', 'page');

        tabPanels.forEach(function(p) {
            p.classList.remove('active');
            p.style.display = 'none';
        });
        targetPanel.classList.add('active');
        targetPanel.style.display = 'block';

        // Update header title & breadcrumb
        var clone = targetLink.cloneNode(true);
        clone.querySelectorAll('.cv-badge, i').forEach(function(el) { el.remove(); });
        var cleanTitle = clone.textContent.trim();
        if (titleEl) titleEl.textContent = cleanTitle;
        if (breadcrumbTab) breadcrumbTab.textContent = cleanTitle;

        // Clean URL so no ?id=...&tab=... remains in the address bar
        if (window.history && window.history.replaceState) {
            window.history.replaceState(null, '', window.location.pathname);
        }

        // Auto-initialize / re-render any datatable inside this panel
        if (window.AutoMasterTable) {
            targetPanel.querySelectorAll('table.datatable').forEach(function(tbl) {
                if (tbl.autoTable) {
                    tbl.autoTable.render();
                } else {
                    window.AutoMasterTable.init(tbl);
                }
            });
        }

        // Form footer submit button visibility
        var formFoot = document.getElementById('cvFormFoot');
        if (formFoot) {
            if (tabKey === 'profile') {
                var activeSub = document.querySelector('.cv-subtab.active');
                var subKey = activeSub ? activeSub.getAttribute('data-sub') : 'details';
                formFoot.style.display = (subKey === 'details' || subKey === 'billing' || subKey === 'po') ? 'block' : 'none';
            } else {
                formFoot.style.display = 'none';
            }
        }

        window.dispatchEvent(new Event('resize'));
    }

    tabLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var tabKey = this.getAttribute('data-tab');
            activateTab(tabKey);
        });
    });

    // Profile Subtabs
    var subBtns = document.querySelectorAll('.cv-subtab');
    var subPanes = document.querySelectorAll('.cv-pane');
    var formFoot = document.getElementById('cvFormFoot');
    subBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var targetSub = this.getAttribute('data-sub');
            subBtns.forEach(function(b) { b.classList.toggle('active', b === btn); });
            subPanes.forEach(function(pane) {
                var pSub = pane.getAttribute('data-pane');
                if (pSub === targetSub) {
                    pane.classList.add('active');
                    pane.style.display = 'block';
                    if (window.AutoMasterTable) {
                        pane.querySelectorAll('table.datatable').forEach(function(tbl) {
                            if (tbl.autoTable) tbl.autoTable.render();
                            else window.AutoMasterTable.init(tbl);
                        });
                    }
                } else {
                    pane.classList.remove('active');
                    pane.style.display = 'none';
                }
            });
            if (formFoot) {
                formFoot.style.display = (targetSub === 'details' || targetSub === 'billing' || targetSub === 'po') ? 'block' : 'none';
            }
            window.dispatchEvent(new Event('resize'));
        });
    });

    // Initial activation
    var hash = (window.location.hash || '').replace('#', '');
    if (hash && document.getElementById('cvTab-' + hash)) {
        activateTab(hash);
    } else {
        activateTab('profile');
    }
});
</script>

<?php include 'footer.php'; ?>