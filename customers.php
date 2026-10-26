<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/date-picker.css">

<style>
    .customers-page .cust-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 16px;
    }

    .customers-page .cust-actions .btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 600;
        padding: 8px 14px;
        white-space: nowrap;
    }

    /* Summary strip */
    .customers-page .cust-summary-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15.5px;
        font-weight: 800;
        color: var(--ink-900);
        margin-bottom: 14px;
    }

    .customers-page .cust-summary {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
    }

    .customers-page .cust-summary-item {
        display: flex;
        align-items: baseline;
        gap: 8px;
        padding: 4px 16px;
        border-left: 1px solid #eef0f3;
        font-size: 12.5px;
        font-weight: 600;
        white-space: nowrap;
    }

    .customers-page .cust-summary-item[data-filter] {
        cursor: pointer;
    }

    .customers-page .cust-summary-item:first-child {
        border-left: 0;
        padding-left: 0;
    }

    .customers-page .cust-summary-item.active .lbl {
        text-decoration: underline;
    }

    .customers-page .cust-summary-item .num {
        font-size: 18px;
        font-weight: 800;
        color: var(--ink-900);
    }

    .customers-page .cust-summary-item .lbl {
        color: var(--ink-700);
    }

    .customers-page .cust-summary-item.green .num,
    .customers-page .cust-summary-item.green .lbl {
        color: var(--primary);
    }

    .customers-page .cust-summary-item.red .num,
    .customers-page .cust-summary-item.red .lbl {
        color: var(--accent-red, #e5484d);
    }

    @media (max-width: 1100px) {
        .customers-page .cust-summary {
            grid-template-columns: repeat(3, 1fr);
            row-gap: 12px;
        }

        .customers-page .cust-summary-item:nth-child(4) {
            border-left: 0;
            padding-left: 0;
        }
    }

    @media (max-width: 576px) {
        .customers-page .cust-summary {
            grid-template-columns: repeat(2, 1fr);
        }

        .customers-page .cust-summary-item:nth-child(odd) {
            border-left: 0;
            padding-left: 0;
        }
    }

    /* Search box in table toolbar */
    .customers-page .cust-search {
        display: inline-flex;
        align-items: stretch;
        border: 1px solid var(--border-soft);
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
    }

    .customers-page .cust-search:focus-within {
        border-color: var(--primary);
    }

    .customers-page .cust-search .icon {
        display: inline-flex;
        align-items: center;
        padding: 0 12px;
        background: #f8f9fa;
        border-right: 1px solid var(--border-soft);
        color: var(--ink-700);
    }

    .customers-page .cust-search input {
        border: 0;
        outline: 0;
        padding: 7px 10px;
        font-size: 12.5px;
        width: 170px;
        background: transparent;
    }

    /* Table */
    .customers-page .table-modern thead th,
    .customers-page .table-modern tbody td {
        padding-left: 12px;
        padding-right: 12px;
        white-space: nowrap !important;
        vertical-align: top;
    }

    .customers-page .table-modern tbody td {
        padding-top: 14px;
        padding-bottom: 14px;
    }

    .customers-page .table-modern thead th:first-child,
    .customers-page .table-modern tbody td:first-child {
        width: 44px;
    }

    .customers-page .cust-link {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
    }

    .customers-page .cust-link:hover {
        text-decoration: underline;
    }

    .customers-page .cust-phone {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--ink-500);
        font-size: 13px;
    }

    .customers-page .cust-eye {
        border: 0;
        background: transparent;
        color: var(--primary);
        padding: 0;
        cursor: pointer;
        font-size: 15px;
    }

    .customers-page .cust-group-chip {
        display: inline-flex;
        padding: 4px 12px;
        border: 1px solid var(--border-soft);
        border-radius: 8px;
        background: #fff;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-900);
    }

    .customers-page .profession-chip {
        display: inline-flex;
        padding: 3px 10px;
        border-radius: 999px;
        background: var(--primary-light);
        color: var(--primary-dark);
        font-size: 11.5px;
        font-weight: 700;
    }

    .customers-page .cust-row.selected {
        background: var(--primary-light);
    }

    .customers-page .cust-row {
        cursor: pointer;
    }

    .customers-page .cust-row:hover:not(.selected) {
        background: #f8faf9;
    }

    /* Active toggle */
    .customers-page .cust-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 22px;
        margin: 0;
    }

    .customers-page .cust-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .customers-page .cust-switch .slider {
        position: absolute;
        inset: 0;
        border-radius: 999px;
        background: #dfe3e8;
        cursor: pointer;
        transition: background .2s ease;
    }

    .customers-page .cust-switch .slider::before {
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

    .customers-page .cust-switch input:checked+.slider {
        background: var(--primary);
    }

    .customers-page .cust-switch input:checked+.slider::before {
        transform: translateX(18px);
    }

    /* Export / Bulk dropdowns (same as Leave Report) */
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
        font-family: 'Manrope', sans-serif;
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

    .mt-export-item.danger {
        color: var(--accent-red, #e5484d);
    }

    .mt-export-item.danger:hover {
        background: var(--accent-red-soft);
        color: #c0362c;
    }

    .mt-export-item i {
        font-size: 14px;
    }

    .mt-export-trigger[aria-expanded="true"] .bi-chevron-down {
        transform: rotate(180deg);
    }

    .cust-toast {
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

    .cust-toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* ===== New Customer modal — profile sub-tabs (copied from customer-view.php #cvProfile) ===== */
    #cvNewCustomerModal .modal-content {
        border: 0;
        border-radius: 16px;
        overflow: hidden;
    }

    #cvNewCustomerModal .modal-header {
        padding: 16px 22px;
        border-bottom: 1px solid #eef0f3;
    }

    .nc-ico {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0f7a38);
        font-size: 19px;
        flex-shrink: 0;
    }

    .cv-page .cv-subtabs {
        display: flex;
        gap: 4px;
        padding: 0 14px;
        border-bottom: 1px solid #eef0f3;
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
    }

    /* ===== Import Customers offcanvas — same design as new-employee.php bulk upload ===== */
    .employee-bulk-dropzone .mode-icon {
        width: 48px;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        border-radius: 12px;
        background: var(--primary-soft);
        color: var(--primary);
        font-size: 21px;
    }

    .employee-bulk-dropzone h6 {
        margin-bottom: 5px;
        color: var(--ink-900);
        font-size: 14px;
        font-weight: 800;
    }

    .employee-bulk-dropzone p {
        margin-bottom: 14px;
        color: var(--ink-500);
        font-size: 12px;
    }

    .employee-bulk-dropzone {
        padding: 32px 18px;
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        background: #fafbfc;
        text-align: center;
        cursor: pointer;
    }

    .employee-bulk-dropzone:hover {
        border-color: var(--primary);
        background: var(--primary-soft);
    }

    .employee-bulk-dropzone .browse-link {
        color: var(--primary);
        font-weight: 700;
        text-decoration: underline;
    }

    .employee-upload-file {
        display: none;
        align-items: center;
        gap: 10px;
        margin-top: 12px;
        padding: 10px;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
        background: #f0fdf4;
        color: var(--ink-900);
        font-size: 12px;
        font-weight: 700;
    }

    .employee-upload-file.show {
        display: flex;
    }

    .employee-upload-file i {
        color: var(--primary);
        font-size: 18px;
    }

    .employee-upload-count {
        display: none;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        background: #f1f5f9;
        color: var(--ink-700);
        font-size: 12px;
        font-weight: 700;
    }

    .employee-upload-count.show {
        display: flex;
    }

    .cust-sample-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 14px;
        border: 0;
        background: none;
        padding: 0;
        color: var(--primary);
        font-size: 12.5px;
        font-weight: 700;
        cursor: pointer;
    }

    .cust-sample-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    /* ===== Import form fields (Choose CSV File / Groups / Default password) ===== */
    .cust-imp-field {
        margin-top: 16px;
    }

    .cust-imp-label {
        display: block;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-700);
        margin-bottom: 6px;
    }

    .cust-imp-req::before {
        content: '* ';
        color: var(--accent-red, #e5484d);
    }

    .cust-imp-with-btn {
        display: flex;
    }

    .cust-imp-with-btn .select2-container {
        flex: 1 1 auto;
        min-width: 0;
    }

    .cust-imp-plus {
        border: 1px solid var(--border-soft);
        border-left: 0;
        border-radius: 0 8px 8px 0;
        background: #fff;
        color: var(--ink-900);
        padding: 0 14px;
    }

    .cust-imp-plus:hover {
        background: var(--primary-light);
        color: var(--primary-dark);
    }

    /* ===== Contacts modal (fullscreen — namba table flow) ===== */
    #contactsModal .modal-content {
        border: 0;
        border-radius: 14px;
        overflow: hidden;
    }

    #contactsModal .modal-header {
        padding: 14px 20px;
        border-bottom: 1px solid #eef0f3;
    }

    #contactsModal .modal-body {
        padding: 0;
        background: #fff;
    }

    #contactsModal .table-modern-wrap {
        padding-left: 14px;
        padding-right: 14px;
    }

    .ct-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #94a3b8;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }

    .ct-link {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
    }

    .ct-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .ct-switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 22px;
        margin: 0;
    }

    .ct-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .ct-switch .slider {
        position: absolute;
        inset: 0;
        border-radius: 999px;
        background: #dfe3e8;
        cursor: pointer;
        transition: background .2s ease;
    }

    .ct-switch .slider::before {
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

    .ct-switch input:checked+.slider {
        background: var(--primary);
    }

    .ct-switch input:checked+.slider::before {
        transform: translateX(18px);
    }

    #contactsModal .ct-search {
        position: relative;
    }

    #contactsModal .ct-search .icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 14px;
        pointer-events: none;
    }

    #contactsModal .ct-search input {
        border: 1px solid var(--border-soft);
        border-radius: 10px;
        padding: 8px 14px 8px 36px;
        font-size: 12.5px;
        font-weight: 500;
        width: 220px;
    }

    #contactsModal .ct-search input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft);
    }

    /* Show entries select — single-line toolbar (nowrap wrap fix) */
    #contactsModal .toolbar-row {
        flex-wrap: nowrap;
    }

    #contactsModal .toolbar-row .form-select {
        width: auto;
        min-width: 70px;
        flex: 0 0 auto;
    }

    #contactsModal .toolbar-row .btn {
        flex: 0 0 auto;
        white-space: nowrap;
    }

    #contactsModal .toolbar-row .ct-search {
        flex: 0 0 auto;
    }

    @media (max-width: 900px) {
        #contactsModal .toolbar-row {
            flex-wrap: wrap;
        }
    }
</style>

<main class="customers-page">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Customers</h1>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
                <i class="bi bi-people fs-6"></i><span>CRM</span><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark">Customers</span>
            </nav>
        </div>
    </div>

    <!-- Top action buttons -->
    <div class="cust-actions">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cvNewCustomerModal"><i class="bi bi-plus-lg"></i>New Customer</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#custImportOffcanvas" aria-controls="custImportOffcanvas"><i class="bi bi-upload"></i>Import Customers</button>
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#contactsModal"><i class="bi bi-person"></i>Contacts</button>
        <button type="button" class="btn btn-outline-primary" id="custFormSync"><i class="bi bi-arrow-repeat"></i>Form Sync</button>
    </div>

    <!-- Summary -->
    <div class="card-custom mb-3 p-3 p-md-4">
        <div class="cust-summary-title"><i class="bi bi-file-earmark-text"></i>Customers Summary</div>
        <div class="cust-summary" id="custSummary">
            <div class="cust-summary-item active" data-filter="all"><span class="num" id="sumTotal">7</span><span class="lbl">Total Customers</span></div>
            <div class="cust-summary-item green" data-filter="active"><span class="num" id="sumActive">5</span><span class="lbl">Active Customers</span></div>
            <div class="cust-summary-item red" data-filter="inactive"><span class="num" id="sumInactive">2</span><span class="lbl">Inactive Customers</span></div>
            <div class="cust-summary-item green"><span class="num">30</span><span class="lbl">Active Contacts</span></div>
            <div class="cust-summary-item red"><span class="num">0</span><span class="lbl">Inactive Contacts</span></div>
            <div class="cust-summary-item"><span class="num">0</span><span class="lbl">Contacts Logged In Today</span></div>
        </div>
    </div>

    <!-- Table card: jobtype.php flow (toolbar & footer auto-created by datatable class) -->
    <div class="card-custom p-0" id="customersTableWrap">
        <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Customers</h3>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="mt-export-menu">
                    <button type="button" class="btn export-btn-pdf mt-export-trigger" id="custBulkTrigger" aria-expanded="false">
                        <i class="bi bi-check2-square me-1"></i>Bulk actions <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i>
                    </button>
                    <div class="mt-export-dropdown" id="custBulkDropdown" role="menu">
                        <button type="button" class="mt-export-item" data-bulk="activate"><i class="bi bi-toggle-on me-2"></i>Mark active</button>
                        <button type="button" class="mt-export-item" data-bulk="deactivate"><i class="bi bi-toggle-off me-2"></i>Mark inactive</button>
                        <button type="button" class="mt-export-item danger" data-bulk="delete"><i class="bi bi-trash me-2"></i>Delete selected</button>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#cvNewCustomerModal">
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </div>

        <!-- Table (toolbar auto-created by datatable class) -->
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="customersTable" data-table-name="Customers">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="form-check-input" id="custCheckAll" aria-label="Select all"></th>
                        <th>S.No</th>
                        <th>Company</th>
                        <th>Primary Contact</th>
                        <th>Primary Email</th>
                        <th>Phone</th>
                        <th>Active</th>
                        <th>Groups</th>
                        <th>Date Created</th>
                        <th>Profession</th>
                    </tr>
                </thead>
                <tbody id="pgBody">
                    <tr class="cust-row" data-id="46" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select GG COMPANY"></td>
                        <td class="fw-semibold text-neutral">46</td>
                        <td><a href="customer-view.php" class="cust-link">GG COMPANY</a></td>
                        <td><a href="customer-view.php" class="cust-link">MOHAN S</a></td>
                        <td><a href="mailto:kaviyarasu@ghratechnology.com" class="cust-link">kaviyarasu@ghratechnology.com</a></td>
                        <td>
                            <span class="cust-phone" data-phone="9677063368">
                                <span class="phone-text">••••••3368</span>
                                <button type="button" class="cust-eye js-reveal-phone" title="Show phone"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" checked aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td></td>
                        <td class="text-neutral">16-09-2026 11:53:29</td>
                        <td><span class="profession-chip">Builders</span></td>
                    </tr>
                    <tr class="cust-row" data-id="45" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select Test Entry"></td>
                        <td class="fw-semibold text-neutral">45</td>
                        <td><a href="customer-view.php" class="cust-link">Test Entry</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone">No Permission!
                                <button type="button" class="cust-eye js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" checked aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td></td>
                        <td class="text-neutral">04-09-2026 13:47:58</td>
                        <td></td>
                    </tr>
                    <tr class="cust-row" data-id="44" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select New Test"></td>
                        <td class="fw-semibold text-neutral">44</td>
                        <td><a href="customer-view.php" class="cust-link">New Test</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone">No Permission!
                                <button type="button" class="cust-eye js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" checked aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td></td>
                        <td class="text-neutral">04-09-2026 13:46:13</td>
                        <td></td>
                    </tr>
                    <tr class="cust-row" data-id="43" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select Test12"></td>
                        <td class="fw-semibold text-neutral">43</td>
                        <td><a href="customer-view.php" class="cust-link">Test12</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone">No Permission!
                                <button type="button" class="cust-eye js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" checked aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td></td>
                        <td class="text-neutral">04-09-2026 13:11:05</td>
                        <td></td>
                    </tr>
                    <tr class="cust-row" data-id="42" data-active="0">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select SGI"></td>
                        <td class="fw-semibold text-neutral">42</td>
                        <td><a href="customer-view.php" class="cust-link">SGI</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone">No Permission!
                                <button type="button" class="cust-eye js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td><span class="cust-group-chip">Anand Mehta</span></td>
                        <td class="text-neutral">24-08-2026 17:41:35</td>
                        <td></td>
                    </tr>
                    <tr class="cust-row" data-id="41" data-active="0">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select Bijlipay"></td>
                        <td class="fw-semibold text-neutral">41</td>
                        <td><a href="customer-view.php" class="cust-link">Bijlipay</a></td>
                        <td><a href="customer-view.php" class="cust-link">Madhupriya S</a></td>
                        <td><a href="mailto:madhupriyas2911@gmail.com" class="cust-link">madhupriyas2911@gmail.com</a></td>
                        <td>
                            <span class="cust-phone">No Permission!
                                <button type="button" class="cust-eye js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td></td>
                        <td class="text-neutral">12-08-2026 12:47:10</td>
                        <td></td>
                    </tr>
                    <tr class="cust-row" data-id="40" data-active="1">
                        <td><input type="checkbox" class="form-check-input cust-check" aria-label="Select SUNGWOO HITECH INDIA PRIVATE LIMITED"></td>
                        <td class="fw-semibold text-neutral">40</td>
                        <td><a href="customer-view.php" class="cust-link">SUNGWOO HITECH INDIA PRIVATE LIMITED</a></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="cust-phone">No Permission!
                                <button type="button" class="cust-eye js-no-permission" title="No permission"><i class="bi bi-eye-fill"></i></button>
                            </span>
                        </td>
                        <td>
                            <label class="cust-switch">
                                <input type="checkbox" class="js-active-toggle" checked aria-label="Active">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td></td>
                        <td class="text-neutral">19-06-2026 15:05:20</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- New Customer modal — first 3 profile sub-tabs copied from customer-view.php #cvProfile -->
<div class="modal fade" id="cvNewCustomerModal" tabindex="-1" aria-labelledby="cvNewCustomerLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <span class="nc-ico"><i class="bi bi-person-plus-fill"></i></span>
                    <div>
                        <h5 class="modal-title fs-5 fw-bold mb-0" id="cvNewCustomerLabel">New Customer</h5>
                        <small class="text-muted fw-semibold">Customer Details · Custom fields · Billing &amp; Shipping</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="cv-page" id="ncProfile">
                    <div class="cv-subtabs" aria-label="Profile sections">
                        <button type="button" class="cv-subtab active" data-sub="details">Customer Details</button>
                        <!-- <button type="button" class="cv-subtab" data-sub="custom">Custom fields</button> -->
                        <button type="button" class="cv-subtab" data-sub="billing">Billing &amp; Shipping</button>
                    </div>

                    <!-- Customer Details -->
                    <div class="cv-pane active" data-pane="details">
                        <div class="cv-form">
                            <label class="cv-check mb-3"><input type="checkbox" class="form-check-input" id="dShowContact"> <span>Show primary contact full name on Invoices, Estimates, Payments, Credit Notes</span></label>

                            <div class="cv-field"><label class="form-label" for="dClientCode">Client code</label><input class="form-control" id="dClientCode"></div>
                            <div class="cv-field"><label class="form-label cv-required" for="dCompany">Company</label><input class="form-control" id="dCompany"><div class="cv-err" hidden>Company is required.</div></div>

                            <div class="cv-grid-2">
                                <div class="cv-field"><label class="form-label" for="dBalance">Balance</label><input class="form-control" id="dBalance" inputmode="decimal"></div>
                                <div class="cv-field"><label class="form-label" for="dBalanceDate">as of</label><div class="date-picker"><input type="text" class="date-input form-control" id="dBalanceDate" placeholder="dd-mm-yyyy" autocomplete="off"></div></div>
                            </div>

                            <div class="cv-field"><label class="form-label" for="dPhone">Phone</label><input class="form-control" id="dPhone"></div>
                            <div class="cv-field"><label class="form-label" for="dWebsite">Website</label><input class="form-control" id="dWebsite"></div>

                            <div class="cv-field">
                                <label class="form-label" for="dGroups">Groups</label>
                                <div class="cv-with-btn">
                                    <select class="form-select cv-select" id="dGroups">
                                        <option value="">Non selected</option>
                                        <option>Anand Mehta</option>
                                        <option>VIP</option>
                                        <option>Retail</option>
                                    </select>
                                    <button type="button" class="btn cv-plus js-demo" title="Add group" aria-label="Add group"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>

                            <div class="cv-field"><label class="form-label" for="dCredit">Credit Days</label>
                                <select class="form-select cv-select" id="dCredit">
                                    <option>0</option><option selected>1</option><option>7</option><option>15</option><option>30</option><option>45</option><option>60</option>
                                </select>
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

                            <div class="cv-field"><label class="form-label" for="dAddress">Address</label><textarea class="form-control" id="dAddress" rows="3"></textarea></div>
                            <div class="cv-field"><label class="form-label" for="dCountry">Country</label>
                                <select class="form-select cv-select" id="dCountry"><option selected>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dState">State</label>
                                <select class="form-select cv-select" id="dState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dStateCode">State Code</label><input class="form-control" id="dStateCode"></div>
                            <div class="cv-field"><label class="form-label" for="dCity">City</label>
                                <select class="form-select cv-select" id="dCity"><option value="">Nothing selected</option><option selected>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                            </div>
                            <div class="cv-field"><label class="form-label" for="dZip">Zip Code</label><input class="form-control" id="dZip" value="600006"></div>
                            <div class="cv-field"><label class="form-label" for="dPan">PAN No</label><input class="form-control" id="dPan" maxlength="10"></div>
                            <div class="cv-field"><label class="form-label" for="dGst">GST Number</label><input class="form-control" id="dGst" maxlength="15"></div>
                            <div class="cv-field"><label class="form-label" for="dIndustry">Industry Type</label><textarea class="form-control" id="dIndustry" rows="3"></textarea></div>

                            <div class="cv-grid-2">
                                <div class="cv-field mb-0"><label class="form-label" for="dOpening">Opening Balance</label><input class="form-control" id="dOpening" placeholder="0.000" inputmode="decimal"></div>
                                <div class="cv-field mb-0"><label class="form-label" for="dOpeningDate">As Of</label><div class="date-picker"><input type="text" class="date-input form-control" id="dOpeningDate" placeholder="dd-mm-yyyy" autocomplete="off"></div></div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom fields -->
                    <!-- <div class="cv-pane" data-pane="custom">
                        <div class="cv-form">
                            <div class="cv-field mb-0">
                                <label class="form-label cv-required" for="cProfession">Profession</label>
                                <select class="form-select cv-select" id="cProfession">
                                    <option value="">Select profession</option>
                                    <option>Builders</option>
                                    <option>Contractors</option>
                                    <option>Event Management</option>
                                    <option>Manufacturing</option>
                                    <option>Retail</option>
                                </select>
                                <div class="cv-err" hidden>Profession is required.</div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Billing & Shipping -->
                    <div class="cv-pane" data-pane="billing">
                        <div class="cv-grid-2 cv-bill-grid">
                            <div>
                                <div class="cv-addr-head"><span>Billing Address</span><button type="button" class="cv-textlink" id="cvNewSameAsInfo">Same as Customer Info</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="bStreet">Street</label><textarea class="form-control" id="bStreet" rows="4"></textarea></div>
                                <div class="cv-field"><label class="form-label" for="bCountry">Country</label>
                                    <select class="form-select cv-select" id="bCountry"><option value="">Non selected</option><option selected>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bState">State</label>
                                    <select class="form-select cv-select" id="bState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="bCity">City</label>
                                    <select class="form-select cv-select" id="bCity"><option value="">Nothing selected</option><option selected>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="bZip">Zip Code</label><input class="form-control" id="bZip" value="600006"></div>
                            </div>
                            <div>
                                <div class="cv-addr-head"><span><i class="bi bi-question-circle me-1"></i>Shipping Address</span><button type="button" class="cv-textlink" id="cvNewCopyBilling">Copy Billing Address</button></div>
                                <div class="cv-field"><label class="form-label cv-required" for="sStreet">Street</label><textarea class="form-control" id="sStreet" rows="4"></textarea></div>
                                <div class="cv-field"><label class="form-label" for="sCountry">Country</label>
                                    <select class="form-select cv-select" id="sCountry"><option value="">Non selected</option><option>India</option><option>United States</option><option>United Kingdom</option><option>United Arab Emirates</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sState">State</label>
                                    <select class="form-select cv-select" id="sState"><option value="">Nothing selected</option><option>Tamil Nadu</option><option>Karnataka</option><option>Kerala</option><option>Maharashtra</option><option>Andhra Pradesh</option></select>
                                </div>
                                <div class="cv-field"><label class="form-label" for="sCity">City</label>
                                    <select class="form-select cv-select" id="sCity"><option value="">Nothing selected</option><option selected>Chennai</option><option>Coimbatore</option><option>Madurai</option><option>Bengaluru</option><option>Kochi</option></select>
                                </div>
                                <div class="cv-field mb-0"><label class="form-label" for="sZip">Zip Code</label><input class="form-control" id="sZip"></div>
                            </div>
                        </div>
                    </div>

                    <div class="cv-form-foot" id="cvNewFormFoot"><button type="button" class="btn btn-primary" id="cvNewSubmit">Submit</button></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import Customers offcanvas — same design as new-employee.php bulk upload -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="custImportOffcanvas" aria-labelledby="custImportTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="custImportTitle"><i class="bi bi-people me-2" style="color:var(--primary);"></i> Import Customers</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="employee-bulk-dropzone" id="custImportDropzone">
            <div class="mode-icon"><i class="bi bi-cloud-arrow-up"></i></div>
            <h6>Upload customers spreadsheet</h6>
            <p>Drop your Excel or CSV file here, or <span class="browse-link">browse</span>.</p>
            <div class="text-muted" style="font-size:11px;">Supports .xlsx, .xls, .csv</div>
        </div>
        <div class="employee-upload-file" id="custImportFile"><i class="bi bi-file-earmark-excel"></i><span id="custImportFileName"></span></div>
        <div class="employee-upload-count" id="custImportCount"><span><i class="bi bi-people me-1"></i> Customers found</span><strong>7</strong></div>
        <button type="button" class="cust-sample-link" id="custImportSample"><i class="bi bi-download"></i>Download sample</button>

        <div class="cust-imp-field">
            <label class="cust-imp-label" for="custImportInput"><span class="cust-imp-req"></span>Choose CSV File</label>
            <input type="file" class="form-control" id="custImportInput" accept=".xlsx,.xls,.csv">
        </div>

        <div class="cust-imp-field">
            <label class="cust-imp-label" for="custImportGroups">Groups</label>
            <div class="cust-imp-with-btn">
                <select class="form-select" id="custImportGroups">
                    <option value="">Non selected</option>
                    <option>Anand Mehta</option>
                    <option>VIP</option>
                    <option>Retail</option>
                </select>
                <button type="button" class="cust-imp-plus" id="custImportAddGroup" title="Add group" aria-label="Add group"><i class="bi bi-plus-lg"></i></button>
            </div>
        </div>

        <div class="cust-imp-field">
            <label class="cust-imp-label" for="custImportPassword">Default password for all contacts</label>
            <input type="text" class="form-control" id="custImportPassword" autocomplete="off">
        </div>
    </div>
    <div class="offcanvas-footer p-3 border-top d-flex justify-content-end">
        <button type="button" class="btn btn-reject" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="button" class="btn btn-primary ms-2" id="custImportConfirm" disabled><i class="bi bi-check-lg me-1"></i> Confirm Upload</button>
    </div>
</div>

<!-- Add New Customer Group modal (Import offcanvas ➕) -->
<div class="modal fade" id="custGroupModal" tabindex="-1" aria-labelledby="custGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 fw-bold" id="custGroupModalLabel">Add New Customer Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="cust-imp-label" for="custGroupName"><span class="cust-imp-req"></span>Name</label>
                <input type="text" class="form-control" id="custGroupName" autocomplete="off">
                <div class="text-danger small mt-1" id="custGroupNameErr" hidden>Name is required.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="custGroupSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Contacts modal (fullscreen — namba table flow, dummy data) -->
<div class="modal fade" id="contactsModal" tabindex="-1" aria-labelledby="contactsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <span class="nc-ico"><i class="bi bi-person-lines-fill"></i></span>
                    <div>
                        <h5 class="modal-title fs-5 fw-bold mb-0" id="contactsModalLabel">Contacts</h5>
                        <small class="text-muted fw-semibold">All customer contacts</small>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <!-- <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip">
                                <i class="bi bi-person-lines-fill"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0">Contacts</h3>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" id="ctAddBtn">
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div> -->

                    <!-- Toolbar + footer auto-created by master-table.js (department.php flow) -->
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100" id="contactsTable">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">S.No</th>
                                    <th class="text-nowrap">First Name</th>
                                    <th class="text-nowrap">Last Name</th>
                                    <th class="text-nowrap">Email</th>
                                    <th class="text-nowrap">Company</th>
                                    <th class="text-nowrap">Phone</th>
                                    <th class="text-nowrap">Role Position</th>
                                    <th class="text-nowrap">Last Login</th>
                                    <th class="text-nowrap">Active</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody id="ctTbody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>






<script src="./assets/js/pages/customers.js?v=<?php echo time(); ?>"></script>