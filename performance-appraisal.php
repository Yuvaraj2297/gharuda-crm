<?php include 'header.php'; ?>

 
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    /* Select2 dropdown styling matching reference image */
    .select2-container--open {
        z-index: 99999 !important;
    }
    .select2-dropdown {
        z-index: 99999 !important;
        border: 1px solid #d1d5db !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08) !important;
        padding: 6px !important;
        background: #ffffff !important;
    }
    .select2-container--default .select2-selection--single {
        background-color: #ffffff !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 10px !important;
        height: 42px !important;
        display: flex !important;
        align-items: center !important;
        transition: all 0.2s ease !important;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.02) !important;
    }
    .select2-container--default .select2-selection--single:hover {
        border-color: #087a24 !important;
    }
    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        background-color: #ffffff !important;
        border-color: #087a24 !important;
        box-shadow: 0 0 0 3px rgba(8, 122, 36, 0.15) !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #1e293b !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        padding-left: 14px !important;
        padding-right: 32px !important;
        line-height: 40px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px !important;
        right: 12px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #087a24 transparent transparent transparent !important;
        border-width: 6px 5px 0 5px !important;
        margin-left: -5px !important;
        margin-top: -3px !important;
    }
    .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
        border-color: transparent transparent #087a24 transparent !important;
        border-width: 0 5px 6px 5px !important;
        margin-top: -3px !important;
    }
    .form-select {
        background-color: #ffffff !important;
        border: 1.5px solid #cbd5e1 !important;
        border-radius: 10px !important;
        height: 42px !important;
        font-size: 13.5px !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        padding: 8px 36px 8px 14px !important;
        transition: all 0.2s ease !important;
    }
    .form-select:hover {
        border-color: #087a24 !important;
    }
    .form-select:focus {
        background-color: #ffffff !important;
        border-color: #087a24 !important;
        box-shadow: 0 0 0 3px rgba(8, 122, 36, 0.15) !important;
        color: #0f172a !important;
    }
    .select2-container--default .select2-search--dropdown {
        padding: 8px !important;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        border: 1.5px solid #28a745 !important;
        border-radius: 8px !important;
        padding: 8px 12px !important;
        outline: none !important;
        font-size: 13.5px !important;
        box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.15) !important;
    }
    .select2-container--default .select2-results__option {
        padding: 9px 14px !important;
        border-radius: 8px !important;
        font-size: 13.5px !important;
        color: #1e293b !important;
        margin-bottom: 2px !important;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #d1e7dd !important;
        color: #0f5132 !important;
        font-weight: 700 !important;
    }
    .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: #d1e7dd !important;
        color: #0f5132 !important;
        font-weight: 700 !important;
    }
    /* ==========================================================================
       Two-Tier Portal Architecture (Employee Portal vs Admin/Reviewer Portal)
       ========================================================================== */

    /* Top Master Portal Switcher Bar */
    .portal-switcher-wrapper {
        background: #ffffff;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 16px;
        padding: 8px;
        margin-bottom: 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .portal-tab-btn {
        flex: 1 1 0%;
        min-width: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 12px;
        font-size: 13.5px;
        font-weight: 700;
        color: #475569;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        cursor: pointer;
        transition: all 0.25s ease;
        text-align: left;
    }
    .portal-tab-main {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
        flex: 1 1 auto;
    }
    .portal-tab-title {
        white-space: normal;
        line-height: 1.35;
    }
    .portal-tab-btn:hover {
        background: #f1f5f9;
        color: #0f172a;
        transform: translateY(-1px);
    }
    .portal-tab-btn.active.emp-portal-btn {
        background: linear-gradient(135deg, #087a24 0%, #055f1c 100%);
        color: #ffffff;
        border-color: #087a24;
        box-shadow: 0 4px 15px rgba(8, 122, 36, 0.3);
    }
    .portal-tab-btn.active.admin-portal-btn {
        background: linear-gradient(135deg, #0f4a1a 0%, #083311 100%);
        color: #ffffff;
        border-color: #083311;
        box-shadow: 0 4px 15px rgba(8, 51, 17, 0.3);
    }
    .portal-tab-btn.active.ledger-portal-btn {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        color: #ffffff;
        border-color: #0f172a;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.3);
    }
    .portal-tab-btn svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
        flex-shrink: 0;
    }
    .portal-pill-badge {
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 20px;
        font-weight: 800;
        background: rgba(0,0,0,0.06);
        white-space: nowrap;
        flex-shrink: 0;
        margin-left: auto;
    }
    .portal-tab-btn.active .portal-pill-badge {
        background: rgba(255,255,255,0.25);
        color: #ffffff;
    }

    /* Responsive Media Queries for Portal Switcher & Page Header */
    @media (max-width: 1200px) {
        .portal-tab-btn {
            padding: 10px 14px;
            font-size: 12.5px;
            gap: 8px;
        }
        .portal-tab-main {
            gap: 8px;
        }
        .portal-tab-main svg {
            width: 18px;
            height: 18px;
        }
        .portal-pill-badge {
            font-size: 10.5px;
            padding: 2.5px 7px;
        }
    }

    @media (max-width: 991px) {
        .portal-switcher-wrapper {
            flex-direction: column;
            gap: 8px;
            padding: 8px;
        }
        .portal-tab-btn {
            flex: 1 1 100%;
            width: 100%;
            padding: 12px 16px;
            font-size: 13.5px;
        }
        .portal-tab-main svg {
            width: 20px;
            height: 20px;
        }
        .portal-pill-badge {
            font-size: 11px;
            padding: 3px 9px;
        }
    }

    @media (max-width: 576px) {
        .portal-switcher-wrapper {
            padding: 6px;
            border-radius: 12px;
        }
        .portal-tab-btn {
            padding: 10px 12px;
            font-size: 12.5px;
            border-radius: 10px;
        }
        .portal-pill-badge {
            font-size: 10px;
            padding: 2px 6px;
        }
    }

    /* Global Multi-Tier Filter Bar */
    .appraisal-filter-card {
        background: #ffffff;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 16px;
        padding: 16px 20px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
        margin-bottom: 20px;
    }
    .filter-label-custom {
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* Frequency Badges */
    .badge-cycle-monthly {
        background: #e0f2fe;
        color: #0284c7;
        border: 1px solid #bae6fd;
    }
    .badge-cycle-quarterly {
        background: #e7f7eb;
        color: #087a24;
        border: 1px solid #bbf7d0;
    }
    .badge-cycle-halfyearly {
        background: #f3e8ff;
        color: #7e22ce;
        border: 1px solid #e9d5ff;
    }
    .badge-cycle-annual {
        background: #fef3c7;
        color: #b45309;
        border: 1px solid #fde68a;
    }

    /* Overall Summary Stats KPI Card */
    .ledger-kpi-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: all 0.2s ease;
    }
    .ledger-kpi-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        transform: translateY(-2px);
    }
    .ledger-kpi-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        display: grid;
        place-items: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    /* 5-Step Pipeline Card */
    .journey-stepper-card {
        background: #ffffff;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 16px;
        padding: 20px 24px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        margin-bottom: 24px;
        position: relative;
        overflow: hidden;
    }
    .journey-stepper-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #087a24 0%, #10b981 50%, #059669 100%);
    }

    .journey-stepper-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f1f5f9;
        flex-wrap: wrap;
        gap: 10px;
    }

    .journey-stepper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow-x: auto;
        padding: 8px 4px 10px 4px;
        gap: 8px;
    }
    .journey-step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        min-width: 135px;
        position: relative;
        z-index: 1;
        padding: 8px 8px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 2px solid transparent;
    }
    .journey-step-item:hover {
        background: #f1f8f3;
        transform: translateY(-2px);
    }
    .journey-step-item.selected-step {
        background: #f0fdf4;
        border-color: #86efac;
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.12);
    }
    .journey-step-item.selected-step .journey-step-title {
        color: #087a24 !important;
        font-weight: 800 !important;
    }
    .journey-step-bubble {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        color: #475569;
        border: 2px solid #cbd5e1;
        margin-bottom: 8px;
        transition: all 0.25s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    }
    .journey-step-bubble svg {
        width: 22px;
        height: 22px;
        fill: currentColor;
    }
    
    /* Stage Bubble Active & Completed States */
    .journey-step-item.active .journey-step-bubble {
        background: #087a24 !important;
        color: #ffffff !important;
        border-color: #087a24 !important;
        box-shadow: 0 0 0 5px rgba(8, 122, 36, 0.25) !important;
    }
    .journey-step-item.completed-pass .journey-step-bubble {
        background: #e7f7eb !important;
        color: #087a24 !important;
        border-color: #86efac !important;
    }
    .journey-step-title {
        font-size: 12px;
        font-weight: 700;
        color: #334155;
        line-height: 1.25;
        white-space: normal;
        max-width: 125px;
    }
    .journey-step-subtitle {
        font-size: 10.5px;
        font-weight: 500;
        color: #64748b;
        margin-top: 2px;
    }
    .journey-connector {
        flex: 1;
        height: 3px;
        background: #e2e8f0;
        margin-top: -28px;
        min-width: 16px;
        position: relative;
    }
    .journey-connector.active {
        background: #86efac;
    }

    /* Content Cards */
    .content-hub-card {
        background: #ffffff;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
        margin-bottom: 28px;
        overflow: hidden;
    }
    .content-hub-header {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
        padding: 16px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }
    .form-section-head {
        font-size: 12.5px;
        font-weight: 700;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 14px;
        padding-bottom: 6px;
        border-bottom: 2px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Admin Sub-Tabs Navigation */
    .admin-subnav-container {
        display: flex;
        gap: 8px;
        background: #f1f5f9;
        padding: 6px;
        border-radius: 12px;
        margin-bottom: 20px;
        overflow-x: auto;
    }
    .admin-subtab-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 16px;
        border-radius: 8px;
        font-size: 12.5px;
        font-weight: 700;
        color: #475569;
        background: transparent;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }
    .admin-subtab-btn:hover {
        background: rgba(255,255,255,0.6);
        color: #0f172a;
    }
    .admin-subtab-btn.active.subtab-tl {
        background: #087a24;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(8, 122, 36, 0.25);
    }
    .admin-subtab-btn.active.subtab-hr {
        background: #7c3aed;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(124, 58, 237, 0.25);
    }
    .admin-subtab-btn.active.subtab-mgr {
        background: #d97706;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(217, 119, 6, 0.25);
    }
    .admin-subtab-btn.active.subtab-all {
        background: #0f172a;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.25);
    }



    .score-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 8px;
        border-radius: 6px;
        font-weight: 700;
        font-size: 11.5px;
    }
    .score-high { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
    .score-mid { background: #fefce8; color: #854d0e; border: 1px solid #fef08a; }

    /* Professional Executive Reviewer Selector Styling */
    .executive-selector-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.04);
        padding: 18px 22px;
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }
    .executive-selector-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(180deg, #087a24 0%, #10b981 100%);
    }
    .custom-select-pro {
        background-color: #f8fafc;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 600;
        color: #1e293b;
        padding: 10px 36px 10px 14px;
        transition: all 0.2s ease;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.03);
    }
    .custom-select-pro:focus {
        background-color: #ffffff;
        border-color: #087a24;
        box-shadow: 0 0 0 3px rgba(8, 122, 36, 0.15);
        color: #0f172a;
    }
    .select-label-pro {
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #475569;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .emp-preview-pill {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 16px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
    }
</style>

<div class="main-content">
    <div class="content-wrapper">

        <!-- Top Header & Breadcrumb -->
        <div class="page-header d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
            <div>
                <h4 class="mb-1 text-dark fw-bold">Performance Appraisal Lifecycle</h4>
                <p class="text-muted mb-0 small">
                    Multi-Cadence Review Engine: <strong>Monthly</strong>, <strong>Quarterly (3 Mo)</strong>, <strong>Half-Yearly (6 Mo)</strong> & <strong>Annual</strong> Performance Appraisals.
                </p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-success btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#initiateCycleModal">
                    <i class="bi bi-plus-circle me-1"></i> Launch New Appraisal Cycle
                </button>
            </div>
        </div>

       

        

        <!-- =========================================================================
             TOP-LEVEL MASTER PORTAL SWITCHER (EMPLOYEE VS ADMIN VS OVERALL LEDGER)
             ========================================================================= -->
        <div class="portal-switcher-wrapper">
            <button type="button" class="portal-tab-btn emp-portal-btn active" id="btnPortalEmployee" onclick="switchMainPortal('employee')">
                <div class="portal-tab-main">
                    <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    <span class="portal-tab-title">1. Employee Portal (Self-Review &amp; Status)</span>
                </div>
                <span class="portal-pill-badge">Employee View</span>
            </button>

            <button type="button" class="portal-tab-btn admin-portal-btn" id="btnPortalAdmin" onclick="switchMainPortal('admin')">
                <div class="portal-tab-main">
                    <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/></svg>
                    <span class="portal-tab-title">2. Admin &amp; Reviewer Portal (TL, HR &amp; Mgr Desks)</span>
                </div>
                <span class="portal-pill-badge" id="adminPendingBadge">3 Actions Needed</span>
            </button>

            <!-- <button type="button" class="portal-tab-btn ledger-portal-btn" id="btnPortalLedger" onclick="switchMainPortal('ledger')">
                <div class="portal-tab-main">
                    <svg viewBox="0 0 24 24"><path d="M4 3h16a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2zm0 4v12h16V7H4zm2 2h4v2H6V9zm0 4h4v2H6v-2zm6-4h6v2h-6V9zm0 4h6v2h-6v-2z"/></svg>
                    <span class="portal-tab-title">3. Overall Appraisal Master Table &amp; Ledger</span>
                </div>
                <span class="portal-pill-badge" id="ledgerTotalCountBadge">16 Records</span>
            </button> -->
        </div>


        <!-- #########################################################################
             PORTAL 1: EMPLOYEE PORTAL (FILL FORM & INTERACTIVE 5-STAGE STATUS EXPLORER)
             ######################################################################### -->
        <div id="portalEmployeeSection">
            
            <!-- Employee Visual Progression Stepper (Click any stage to view details) -->
            <div class="journey-stepper-card">
                <div class="journey-stepper-header">
                    <div>
                        <h6 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                            My Appraisal Progression Status
                        </h6>
                        <small class="text-muted">Currently active profile: <strong id="empStepperName" class="text-success">Fill New Self-Appraisal Form</strong> &bull; Fill details below or select from top filter</small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success border border-success px-3 py-1.5 fw-bold" id="empPortalStatusPill">Stage 1: Fill Form</span>
                    </div>
                </div>

                <div class="journey-stepper">
                    <!-- Step 1: Employee Self -->
                    <div class="journey-step-item completed-pass selected-step" id="empStep1" onclick="switchEmpStage(1)">
                        <div class="journey-step-bubble">
                            <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                        </div>
                        <div class="journey-step-title">Stage 1: Employee</div>
                        <div class="journey-step-subtitle" id="empSub1">Fill & Submit Form</div>
                    </div>

                    <div class="journey-connector active" id="empConn1"></div>

                    <!-- Step 2: TL Review -->
                    <div class="journey-step-item" id="empStep2" onclick="switchEmpStage(2)">
                        <div class="journey-step-bubble">
                            <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                        </div>
                        <div class="journey-step-title">Stage 2: Team Lead</div>
                        <div class="journey-step-subtitle" id="empSub2">Pending Submission</div>
                    </div>

                    <div class="journey-connector" id="empConn2"></div>

                    <!-- Step 3: Manager Decision -->
                    <div class="journey-step-item" id="empStep3" onclick="switchEmpStage(3)">
                        <div class="journey-step-bubble">
                            <svg viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-1h14v1z"/></svg>
                        </div>
                        <div class="journey-step-title">Stage 3: Manager</div>
                        <div class="journey-step-subtitle" id="empSub3">Locked</div>
                    </div>

                    <div class="journey-connector" id="empConn3"></div>

                    <!-- Step 4: HR Approval -->
                    <div class="journey-step-item" id="empStep4" onclick="switchEmpStage(4)">
                        <div class="journey-step-bubble">
                            <svg viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                        </div>
                        <div class="journey-step-title">Stage 4: HR Dept</div>
                        <div class="journey-step-subtitle" id="empSub4">Locked</div>
                    </div>

                    <div class="journey-connector" id="empConn4"></div>

                    <!-- Step 5: Scorecard -->
                    <div class="journey-step-item" id="empStep5" onclick="switchEmpStage(5)">
                        <div class="journey-step-bubble">
                            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        </div>
                        <div class="journey-step-title">Stage 5: Scorecard</div>
                        <div class="journey-step-subtitle" id="empSub5">Locked</div>
                    </div>
                </div>
            </div>

            <!-- Employee Dynamic Stage Content Hub Card -->
            <div class="content-hub-card">
                <div class="content-hub-header">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark" id="empHubTitle">Stage 1: Employee Self-Appraisal Form</h5>
                        <small class="text-muted" id="empHubSub">Fill in your professional appraisal details below and submit for Team Lead &amp; HR review.</small>
                    </div>
                   
                </div>

                <div class="p-4 bg-white">
                    
                    <!-- PANE 1: STAGE 1 EMPLOYEE SELF REVIEW FORM -->
                    <div id="empStagePane1" class="emp-stage-pane">
                        <form id="employeePortalSelfForm" onsubmit="event.preventDefault(); submitEmpSelfReview();">
                            <div class="form-section-head">
                                1. Employee Professional Profile Details
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <label class="form-label fw-bold text-dark small">Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="p1EmpId" placeholder="e.g. EMP-0104" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark small">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control fw-bold" id="p1EmpName" placeholder="Enter Employee Full Name" required>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fw-bold text-dark small">Official Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="p1EmpEmail" placeholder="employee.name@gharuda.com" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark small">Department <span class="text-danger">*</span></label>
                                    <select class="form-select" id="p1EmpDept" required>
                                        <option value="" selected disabled>- Select Department -</option>
                                        <option value="Design">Design</option>
                                        <option value="iOS Dev">iOS Dev</option>
                                        <option value="Business">Business</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Human Resources">Human Resources</option>
                                        <option value="Cloud Ops">Cloud Ops</option>
                                        <option value="IT Operations">IT Operations</option>
                                        <option value="Finance & Accounts">Finance & Accounts</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark small">Role / Designation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="p1EmpRole" placeholder="e.g. Senior Backend Engineer" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold text-dark small">Reporting Team Lead <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control fw-semibold" id="p1EmpTL" placeholder="e.g. Rajesh V (Tech Lead)" required>
                                </div>
                            </div>

                            <div class="form-section-head">
                                2. Projects & Key Deliverables Handled
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark small">Projects Handled</label>
                                    <input type="text" class="form-control" id="p1EmpProjects" placeholder="e.g. Payment Gateway, Kafka Data Pipeline, Microservices">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark small">Tech Stack Utilized</label>
                                    <input type="text" class="form-control" id="p1EmpTools" placeholder="e.g. PHP, Node.js, React, Docker, Kubernetes, AWS">
                                </div>
                            </div>

                            <div class="form-section-head">
                                3. Self Performance Review & Rating
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark small">3.1 Performance Summary</label>
                                <textarea class="form-control" id="p1EmpSummary" rows="3" placeholder="Write a brief overview of your performance, key milestones, and impact during this review cycle..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-dark small">3.2 Key Achievements & Metrics</label>
                                <textarea class="form-control" id="p1EmpAchievements" rows="3" placeholder="• Completed deliverables ahead of schedule&#10;• Reduced latency / optimized workflows&#10;• Mentored junior team members"></textarea>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark small">3.3 Self Rating (Out of 5.0)</label>
                                    <select class="form-select fw-bold text-success" id="p1EmpRating">
                                        <option value="5.0">5.0 - Outstanding (Top Performer)</option>
                                        <option value="4.9">4.9 - Exceptional</option>
                                        <option value="4.8">4.8 - High Achiever</option>
                                        <option value="4.7">4.7 - Exceeds Expectations</option>
                                        <option value="4.6">4.6 - Exceeds Expectations</option>
                                        <option value="4.5" selected>4.5 - Excellent (Exceeded Goals)</option>
                                        <option value="4.4">4.4 - Very Good</option>
                                        <option value="4.2">4.2 - Strong Contributor</option>
                                        <option value="4.0">4.0 - Met Expectations</option>
                                        <option value="3.8">3.8 - Satisfactory</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-dark small">3.4 Upskilling & Certifications</label>
                                    <input type="text" class="form-control" id="p1EmpCerts" placeholder="e.g. AWS Certified Solutions Architect, CKA, React Advanced">
                                </div>
                            </div>

                            <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-outline-secondary" onclick="showToastNotification('Draft Saved', 'Your self-appraisal draft has been saved.')">
                                    Save Draft
                                </button>
                                <button type="submit" class="btn btn-success fw-bold px-4 shadow-sm" style="background:#087a24; border-color:#087a24;">
                                    Submit Self-Appraisal to Team Lead (TL) &rarr;
                                </button>
                            </div>
                        </form>
                    </div>


                    <!-- PANE 2: STAGE 2 TEAM LEAD (TL) REVIEW STATUS (READ-ONLY FOR EMPLOYEE) -->
                    <div id="empStagePane2" class="emp-stage-pane d-none">
                        <div id="empStage2ApprovedBox">
                            <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-4" style="background:#e7f7eb; border:1px solid #a7f3d0;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle p-2 bg-success text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                                        <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-success mb-0">Stage 2: Reviewed & Approved by Team Lead</h6>
                                        <small class="text-muted">Evaluated by: <strong id="empViewTlName" class="text-dark">Rajesh V (Tech Lead)</strong></small>
                                    </div>
                                </div>
                                <span class="badge bg-success px-3 py-2 fw-bold">TL Approved</span>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Team Lead Performance Score:</span>
                                        <h4 class="fw-bold text-success mb-0" id="empViewTlRating">4.6 / 5.0</h4>
                                        <small class="text-muted">Rating: Exceeded Expectations</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Recommended Salary Hike %:</span>
                                        <h4 class="fw-bold text-success mb-0" id="empViewTlHike">15%</h4>
                                        <small class="text-muted">Recommended Annual Hike</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Promotion Recommendation:</span>
                                        <h5 class="fw-bold text-dark mb-0" id="empViewTlPromo">Promoted to Tech Lead</h5>
                                        <small class="text-muted">Forwarded to HR Dept</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card border mb-3 shadow-none bg-light">
                                <div class="card-body p-3">
                                    <strong class="text-dark small d-block mb-2">Team Lead Feedback & Observations:</strong>
                                    <p class="mb-0 text-muted fst-italic bg-white p-3 rounded border" id="empViewTlFeedback">
                                        "Demonstrated exemplary technical ownership during the Q3-Q4 microservices migration. Code reviews were thorough and mentoring contributions helped accelerate junior onboarding."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="empStage2PendingBox" class="p-4 text-center border rounded-3 bg-light d-none">
                            <div class="text-warning mb-2">
                                <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                            </div>
                            <h6 class="fw-bold text-dark">Stage 2: Team Lead Review Pending</h6>
                            <p class="text-muted small mb-0">Your self-appraisal has been sent to your Team Lead for scoring and increment recommendation.</p>
                        </div>
                    </div>


                    <!-- PANE 3: STAGE 3 MANAGER FINAL DECISION & REPLY (READ-ONLY FOR EMPLOYEE) -->
                    <div id="empStagePane3" class="emp-stage-pane d-none">
                        <div id="empStage3ApprovedBox">
                            <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-4" style="background:#e7f7eb; border:1px solid #86efac;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle p-2 bg-success text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;">
                                        <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-1h14v1z"/></svg>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-success mb-0">Stage 3: Signed Off by Executive Manager</h6>
                                        <small class="text-muted">Executive Signoff: <strong class="text-dark">Vikramaditya (MD)</strong> &bull; Recognition & Decision</small>
                                    </div>
                                </div>
                                <span class="badge bg-success px-3 py-2 fw-bold">Signoff Complete</span>
                            </div>

                            <!-- Executive Recognition Reply Card -->
                            <div class="p-3 mb-4 rounded-3 border-start border-4 border-success shadow-sm" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <svg width="20" height="20" fill="#087a24" viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>
                                    <strong class="text-success fs-6">Executive Manager Recognition Reply:</strong>
                                </div>
                                <p class="mb-0 fs-6 fw-semibold text-dark fst-italic" id="empViewMgrReply">
                                    "Good! Outstanding contributions to backend microservices, Kafka pipelines, and zero downtime. Full promotion to Tech Lead approved with 15% merit increment."
                                </p>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Final Manager Evaluation Rating:</span>
                                        <h4 class="fw-bold text-dark mb-0" id="empViewMgrRating">4.8 / 5.0</h4>
                                        <small class="text-muted">Top Performer Band</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Final Confirmed Hike:</span>
                                        <h4 class="fw-bold text-success mb-0" id="empViewMgrHike">15% Annual Merit Hike</h4>
                                        <small class="text-muted">Effective next fiscal cycle</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="empStage3PendingBox" class="p-4 text-center border rounded-3 bg-light d-none">
                            <div class="text-warning mb-2">
                                <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                            </div>
                            <h6 class="fw-bold text-dark">Stage 3: Executive Manager Decision Pending</h6>
                            <p class="text-muted small mb-0">Currently awaiting executive signoff and recognition reply message from Vikramaditya (MD).</p>
                        </div>
                    </div>


                    <!-- PANE 4: STAGE 4 HR DEPARTMENT REVIEW STATUS (READ-ONLY FOR EMPLOYEE) -->
                    <div id="empStagePane4" class="emp-stage-pane d-none">
                        <div id="empStage4ApprovedBox">
                            <div class="d-flex align-items-center justify-content-between p-3 rounded-3 mb-4" style="background:#f5f3ff; border:1px solid #ddd6fe;">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-circle p-2 text-white d-flex align-items-center justify-content-center" style="width:40px;height:40px;background:#7c3aed;">
                                        <svg width="22" height="22" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-0" style="color:#7c3aed;">Stage 4: Verified & Approved by HR Department</h6>
                                        <small class="text-muted">Verified by: <strong class="text-dark">Ananya Roy (HRBP)</strong> &bull; Policy & Merit Endorsement</small>
                                    </div>
                                </div>
                                <span class="badge text-white px-3 py-2 fw-bold" style="background:#7c3aed;">HR Approved</span>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">HR Evaluation Score:</span>
                                        <h4 class="fw-bold mb-0" style="color:#7c3aed;" id="empViewHrRating">4.8 / 5.0</h4>
                                        <small class="text-muted">Exceeds Benchmark</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Approved Hike %:</span>
                                        <h4 class="fw-bold text-success mb-0" id="empViewHrHike">15%</h4>
                                        <small class="text-muted">Merit Increment Approved</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 bg-light rounded-3 border h-100">
                                        <span class="text-muted small d-block mb-1 fw-bold">Promotion Endorsement:</span>
                                        <h5 class="fw-bold text-dark mb-0" id="empViewHrPromo">Promoted to Tech Lead</h5>
                                        <small class="text-muted">Final Approval Complete</small>
                                    </div>
                                </div>
                            </div>

                            <div class="card border mb-3 shadow-none bg-light">
                                <div class="card-body p-3">
                                    <strong class="text-dark small d-block mb-2">HR Department Policy Remarks:</strong>
                                    <p class="mb-0 text-muted fst-italic bg-white p-3 rounded border" id="empViewHrComments">
                                        "Performance verified with project stakeholders. Proposed 15% increment aligns with annual merit budget and benchmark for L4 Engineering."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div id="empStage4PendingBox" class="p-4 text-center border rounded-3 bg-light d-none">
                            <div class="text-muted mb-2">
                                <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                            </div>
                            <h6 class="fw-bold text-dark">Stage 4: HR Department Verification Pending</h6>
                            <p class="text-muted small mb-0">Awaiting HR Department policy & merit check after Stage 3 Manager Signoff completion.</p>
                        </div>
                    </div>


                    <!-- PANE 5: STAGE 5 SCORECARD CERTIFICATE VIEW -->
                    <div id="empStagePane5" class="emp-stage-pane d-none">
                        <div id="empStage5ApprovedBox">
                            <div class="p-4 border rounded-3 bg-light">
                                <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                                    <div>
                                        <h5 class="mb-0 fw-bold text-dark">GHARUDA HRMS</h5>
                                        <small class="text-muted">Official Merit Performance Scorecard • FY 2025-26</small>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-success px-3 py-2 fs-6 rounded-pill">COMPLETED</span>
                                        <button type="button" class="btn btn-outline-success btn-sm fw-bold" onclick="window.print()">
                                            Print Scorecard
                                        </button>
                                    </div>
                                </div>

                                <div class="row g-2 mb-3 bg-white p-3 rounded border">
                                    <div class="col-md-4">
                                        <span class="text-muted small">Employee:</span>
                                        <div class="fw-bold text-dark fs-6" id="empViewScEmpName">Arun Kumar</div>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-muted small">Role:</span>
                                        <div class="fw-semibold text-dark" id="empViewScEmpRole">Senior Backend Engineer</div>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="text-muted small">Department:</span>
                                        <div class="fw-semibold text-dark" id="empViewScEmpDept">Engineering</div>
                                    </div>
                                </div>

                                <!-- 4-Stage Rating Matrix -->
                                <div class="card border mb-3 shadow-none bg-white">
                                    <div class="card-body p-3">
                                        <div class="row g-2 text-center">
                                            <div class="col-3">
                                                <div class="p-2 border rounded bg-light">
                                                    <div class="text-muted small">1. Emp Self</div>
                                                    <div class="fw-bold text-success fs-5" id="empViewScScore1">4.5</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="p-2 border rounded bg-light">
                                                    <div class="text-muted small">2. TL Score</div>
                                                    <div class="fw-bold text-success fs-5" id="empViewScScore2">4.6</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="p-2 border rounded bg-light">
                                                    <div class="text-muted small">3. Manager Score</div>
                                                    <div class="fw-bold text-warning fs-5" id="empViewScScore3">4.8</div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="p-2 border rounded" style="background:#f5f3ff; border:1px solid #ddd6fe;">
                                                    <div class="text-muted small fw-bold" style="color:#7c3aed;">4. HR Score</div>
                                                    <div class="fw-bold fs-5" style="color:#7c3aed;" id="empViewScScore4">4.8</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-success border-success mb-3 p-3 rounded-3">
                                    <strong class="text-success fs-6 d-block mb-1">Executive Manager Reply & Recognition:</strong>
                                    <p class="mb-0 text-dark fw-medium fst-italic" id="empViewScReply">
                                        "Good! Outstanding contributions to backend microservices, Kafka pipelines, and zero downtime. Full promotion to Tech Lead approved with 15% merit increment."
                                    </p>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 bg-white h-100 border-start border-4 border-success">
                                            <span class="text-muted small">Approved Salary Increment:</span>
                                            <h4 class="fw-bold text-success mb-0" id="empViewScHike">15% Annual Merit Hike</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3 border rounded-3 bg-white h-100 border-start border-4 border-success">
                                            <span class="text-muted small">Promotion Confirmation:</span>
                                            <h5 class="fw-bold text-success mb-0" id="empViewScPromo">Promoted to Tech Lead</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="empStage5LockedBox" class="p-4 text-center border rounded-3 bg-light d-none">
                            <div class="text-muted mb-2">
                                <svg width="48" height="48" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                            </div>
                            <h6 class="fw-bold text-dark">Stage 5: Official Scorecard Certificate Locked</h6>
                            <p class="text-muted small mb-0">The scorecard will automatically generate and release once the Executive Manager approves Stage 4 with the recognition reply.</p>
                        </div>
                    </div>

                </div>
            </div>

            </div> <!-- End empActiveProfileContainer -->

        </div>


        <!-- #########################################################################
             PORTAL 2: ADMIN & REVIEWER PORTAL (TL, HR & MANAGER APPROVAL DESK)
             ######################################################################### -->
        <div id="portalAdminSection" class="d-none">

            <!-- Admin Active Employee Appraisal Selector Bar -->
            <div class="card border-0 shadow-sm rounded-4 mb-3 p-3 bg-white">
                <div class="row g-3 align-items-center">
                    <!-- Left: Active Employee Focus Profile Block -->
                    <div class="col-xl-5 col-lg-5">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold fs-4 flex-shrink-0 shadow-sm" style="width:48px;height:48px;" id="adminActiveEmpAvatar">
                                A
                            </div>
                            <div class="overflow-hidden">
                                <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                                    <h6 class="fw-bold text-dark mb-0 fs-6 text-truncate" id="adminActiveEmpBadge">Arun Kumar</h6>
                                    <span class="badge px-2.5 py-1 fw-bold" id="adminEmpPipelineBadge">Status: In Progress</span>
                                </div>
                                <div class="text-muted small text-truncate" id="adminActiveEmpSubMeta">
                                    <span id="adminActiveEmpIdBadge" class="badge bg-light text-dark border me-1">EMP-0104</span>
                                    <span id="adminActiveEmpRoleMeta">Senior Backend Engineer</span> &bull; <span id="adminActiveEmpDeptMeta" class="text-success fw-semibold">Engineering</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Select2 Dual Dropdowns (Department -> Employee) matching team.php -->
                    <div class="col-xl-7 col-lg-7">
                        <div class="row g-2">
                            <div class="col-sm-6">
                                <label class="form-label mb-1" for="adminDeptFilterSelect">
                                    Department
                                </label>
                                <select class="form-select select2" id="adminDeptFilterSelect">
                                    <option value="">-- Select Department --</option>
                                    <!-- Populated dynamically with Department names matching team.php -->
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="adminActiveEmpSelect">
                                    <span>Select Employee</span>
                                    <span class="text-muted small fw-normal" id="adminDeptCountBadge">16 Employees</span>
                                </label>
                                <select class="form-select select2" id="adminActiveEmpSelect">
                                    <option value="">-- Select Employee --</option>
                                    <!-- Populated dynamically based on selected Department -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Sub-navigation Tabs (TL vs Manager vs HR vs Master Ledger) -->
            <div class="admin-subnav-container">
                <button type="button" class="admin-subtab-btn subtab-tl active" id="subtabBtnTL" onclick="switchAdminSubtab('tl')">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    1. Team Lead (TL) Approval Hub
                </button>

                <button type="button" class="admin-subtab-btn subtab-mgr" id="subtabBtnMgr" onclick="switchAdminSubtab('mgr')">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .55-.45 1-1 1H6c-.55 0-1-.45-1-1v-1h14v1z"/></svg>
                    2. Manager Final Decision & Reply Hub
                </button>

                <button type="button" class="admin-subtab-btn subtab-hr" id="subtabBtnHR" onclick="switchAdminSubtab('hr')">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    3. HR Department Approval Hub
                </button>

                <button type="button" class="admin-subtab-btn subtab-all" id="subtabBtnAll" onclick="switchAdminSubtab('all')">
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/></svg>
                    4. Master Company Ledger
                </button>
            </div>

            <!-- SUB-TAB 1: TL APPROVAL DESK -->
            <div class="content-hub-card admin-subcontent" id="adminSubTL">
                <div class="content-hub-header">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">Stage 2: Team Lead (TL) Approval & Review Desk</h5>
                        <small class="text-muted">Review submitted employee self-appraisals, assign TL ratings & feedback, and forward to Manager.</small>
                    </div>
                    <span class="badge bg-success px-3 py-2">Role: Team Lead</span>
                </div>

                <div class="p-4 bg-white">
                    <!-- Status Alert Banner -->
                    <div id="admTlStatusBanner" class="alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-clock-history fs-5 text-warning"></i>
                            <div>
                                <strong class="text-dark" id="admTlBannerTitle">Awaiting Team Lead Review & Rating</strong>
                                <div class="small text-muted" id="admTlBannerSub">Please review the employee's submitted self-score and assign official TL ratings.</div>
                            </div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-1.5 fw-bold" id="admTlBannerBadge">Pending TL</span>
                    </div>

                    <!-- Employee Performance Card -->
                    <div class="p-3 bg-light rounded-3 border mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2">
                            <div>
                                <strong class="text-dark fs-6" id="admTlEmpName">Arun Kumar</strong>
                                <span class="text-muted small" id="admTlEmpMeta"> (Senior Backend Engineer - Engineering)</span>
                            </div>
                            <span class="score-badge score-high" id="admTlEmpScore">Emp Self-Rating: 4.5 / 5.0</span>
                        </div>
                        <div class="bg-white p-3 rounded border small mb-2">
                            <strong>Employee Performance Summary:</strong>
                            <p class="mb-2 text-muted" id="admTlEmpSummary">Over the past fiscal year, I successfully led the backend microservices refactoring...</p>
                            <strong>Key Achievements:</strong>
                            <p class="mb-2 text-muted" id="admTlEmpAch">• Completed high-throughput API gateway migration 2 weeks ahead of schedule.</p>
                            <div class="row g-2 pt-2 border-top text-muted">
                                <div class="col-md-6"><strong>Key Projects:</strong> <span id="admTlEmpProjects">--</span></div>
                                <div class="col-md-6"><strong>Tools & Tech:</strong> <span id="admTlEmpTools">--</span></div>
                            </div>
                        </div>
                    </div>

                    <form id="admTLForm" onsubmit="event.preventDefault(); processAdminTLApproval();">
                        <div class="form-section-head">Team Lead Scoring & Recommendations</div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small">TL Rating (Out of 5.0) <span class="text-danger">*</span></label>
                                <select class="form-select fw-bold text-success" id="admTlRating" required>
                                    <option value="5.0">5.0 - Outstanding (Top Performer)</option>
                                    <option value="4.8">4.8 - Exceptional Delivery</option>
                                    <option value="4.6" selected>4.6 - Exceeded Expectations</option>
                                    <option value="4.4">4.4 - Consistent High Achiever</option>
                                    <option value="4.2">4.2 - Strong Contributor</option>
                                    <option value="4.0">4.0 - Met All Target Expectations</option>
                                    <option value="3.8">3.8 - Satisfactory Progress</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small">Recommended Hike % <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-bold text-success" id="admTlHike" value="15%" placeholder="e.g. 15%" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small">Promotion Recommendation</label>
                                <input type="text" class="form-control" id="admTlPromo" value="Promoted to Tech Lead" placeholder="e.g. Tech Lead">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark small">Team Lead Feedback & Observations <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="admTlFeedback" rows="3" required placeholder="Enter constructive feedback and appraisal observations...">Demonstrated exemplary technical ownership during the Q3-Q4 microservices migration. Code reviews were thorough and mentoring contributions helped accelerate junior onboarding.</textarea>
                        </div>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="text-muted small"><i class="bi bi-info-circle me-1"></i>Approving will forward this appraisal directly to the Executive Manager Decision Hub.</span>
                            <button type="submit" class="btn btn-success fw-bold px-4 shadow-sm" id="admTlSubmitBtn">
                                <i class="bi bi-check-circle me-1"></i> Accept & Approve as Team Lead (Forward to Manager) &rarr;
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SUB-TAB 2: MANAGER FINAL DECISION & REPLY DESK -->
            <div class="content-hub-card admin-subcontent d-none" id="adminSubMgr">
                <div class="content-hub-header">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">Stage 3: Executive Manager Final Decision & Reply Desk</h5>
                        <small class="text-muted">Review self & TL evaluations, assign final manager score, send executive reply, and route to HR for final approval.</small>
                    </div>
                    <span class="badge bg-warning text-dark px-3 py-2 fw-bold">Role: Executive Manager / MD</span>
                </div>

                <div class="p-4 bg-white">
                    <!-- Status Alert Banner -->
                    <div id="admMgrStatusBanner" class="alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-award fs-5 text-warning"></i>
                            <div>
                                <strong class="text-dark" id="admMgrBannerTitle">Awaiting Executive Decision & Reply</strong>
                                <div class="small text-muted" id="admMgrBannerSub">Review the employee & TL scores and send recognition note before forwarding to HR.</div>
                            </div>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-1.5 fw-bold" id="admMgrBannerBadge">Pending Manager</span>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="small text-primary"><i class="bi bi-person-fill me-1"></i>1. Employee Self Score</strong>
                                    <span class="score-badge score-high" id="admMgrEmpScore">4.5 / 5.0</span>
                                </div>
                                <div class="small text-muted" id="admMgrEmpSummary">Microservices refactoring and Kafka data pipeline.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="small text-success"><i class="bi bi-patch-check-fill me-1"></i>2. Team Lead Evaluation</strong>
                                    <span class="score-badge score-high" id="admMgrTLScore">TL Score: 4.6 / 5.0</span>
                                </div>
                                <div class="small text-muted" id="admMgrTLFeedback">Exemplary technical ownership. Code reviews were thorough.</div>
                            </div>
                        </div>
                    </div>

                    <form id="admMgrForm" onsubmit="event.preventDefault(); processAdminManagerSignoff();">
                        <div class="form-section-head">Executive Signoff & "Good" Recognition Reply</div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark small">Manager Rating (Out of 5.0) <span class="text-danger">*</span></label>
                                <select class="form-select fw-bold text-warning" id="admMgrRating" required>
                                    <option value="5.0">5.0 - Exceptional (Top Performer)</option>
                                    <option value="4.8" selected>4.8 - Outstanding / Good</option>
                                    <option value="4.5">4.5 - Exceeded Expectations</option>
                                    <option value="4.2">4.2 - Strong Performance</option>
                                    <option value="4.0">4.0 - Satisfactory Performance</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark small">Approved Hike % <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-bold text-success" id="admMgrHike" value="15%" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark d-flex align-items-center justify-content-between small flex-wrap gap-1">
                                <span>Manager Executive Reply & Recognition Message <span class="text-danger">*</span></span>
                                <span class="text-muted small">This message will immediately appear in the Employee Portal</span>
                            </label>

                            <div class="d-flex gap-2 mb-2 flex-wrap">
                                <button type="button" class="btn btn-xs btn-outline-success rounded-pill py-1 px-2.5 small" onclick="setAdminMgrPreset('Good! Outstanding contributions to backend microservices and zero downtime.')">
                                    &ldquo;Good! Outstanding contributions...&rdquo;
                                </button>
                                <button type="button" class="btn btn-xs btn-outline-success rounded-pill py-1 px-2.5 small" onclick="setAdminMgrPreset('Excellent performance! Approved 15% merit hike and promotion.')">
                                    &ldquo;Excellent! Approved promotion...&rdquo;
                                </button>
                                <button type="button" class="btn btn-xs btn-outline-success rounded-pill py-1 px-2.5 small" onclick="setAdminMgrPreset('Great work across all key deliverables. Well-deserved merit increment awarded.')">
                                    &ldquo;Great work across deliverables...&rdquo;
                                </button>
                            </div>

                            <textarea class="form-control fw-medium border-success" id="admMgrReply" rows="3" required placeholder="Type executive recognition message...">Good! Outstanding contributions to backend microservices, Kafka pipelines, and zero downtime. Full promotion to Tech Lead approved with 15% merit increment.</textarea>
                        </div>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="text-muted small"><i class="bi bi-award-fill text-warning me-1"></i>Signoff will forward this appraisal to HR Department for final verification & approval.</span>
                            <button type="submit" class="btn btn-warning text-dark fw-bold px-4 shadow-sm" id="admMgrSubmitBtn">
                                <i class="bi bi-check2-circle me-1"></i> Accept & Signoff as Manager (Forward to HR) &rarr;
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SUB-TAB 3: HR APPROVAL DESK -->
            <div class="content-hub-card admin-subcontent d-none" id="adminSubHR">
                <div class="content-hub-header">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">Stage 4: HR Department Policy & Final Approval Desk</h5>
                        <small class="text-muted">Conduct final policy & attendance checks, set official increment %, and complete appraisal cycle.</small>
                    </div>
                    <span class="badge px-3 py-2 text-white" style="background:#7c3aed;">Role: HRBP</span>
                </div>

                <div class="p-4 bg-white">
                    <!-- Status Alert Banner -->
                    <div id="admHrStatusBanner" class="alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check fs-5 text-purple" style="color:#7c3aed;"></i>
                            <div>
                                <strong class="text-dark" id="admHrBannerTitle">Awaiting HR Policy Check & Final Approval</strong>
                                <div class="small text-muted" id="admHrBannerSub">Review employee self score, TL recommendation, and Manager signoff before final approval.</div>
                            </div>
                        </div>
                        <span class="badge px-3 py-1.5 fw-bold text-white" style="background:#7c3aed;" id="admHrBannerBadge">Pending HR</span>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="small text-primary"><i class="bi bi-person-fill me-1"></i>1. Employee Self Score</strong>
                                    <span class="score-badge score-high" id="admHrEmpScore">4.5 / 5.0</span>
                                </div>
                                <div class="small text-muted" id="admHrEmpSummary">Microservices refactoring and Kafka data pipeline.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="small text-success"><i class="bi bi-patch-check-fill me-1"></i>2. Team Lead Evaluation</strong>
                                    <span class="score-badge score-high" id="admHrTLScore">TL Score: 4.6 / 5.0</span>
                                </div>
                                <div class="small text-muted" id="admHrTLFeedback">Exemplary technical ownership. Code reviews were thorough.</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded border h-100">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong class="small text-warning"><i class="bi bi-award-fill me-1"></i>3. Manager Signoff Score</strong>
                                    <span class="score-badge score-high" id="admHrMgrScore">Mgr Score: 4.8 / 5.0</span>
                                </div>
                                <div class="small text-muted" id="admHrMgrReply">Outstanding contributions. Full promotion approved.</div>
                            </div>
                        </div>
                    </div>

                    <form id="admHRForm" onsubmit="event.preventDefault(); processAdminHRApproval();">
                        <div class="form-section-head">HR Final Approval & Official Hike Endorsement</div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small">HR Rating (Out of 5.0) <span class="text-danger">*</span></label>
                                <select class="form-select fw-bold" id="admHrRating" required style="color:#7c3aed;">
                                    <option value="5.0">5.0 - Exceptional (Top 5% Talent)</option>
                                    <option value="4.8" selected>4.8 - Exceeds Benchmark</option>
                                    <option value="4.5">4.5 - Strong Performer</option>
                                    <option value="4.2">4.2 - Standard Merit Tier</option>
                                    <option value="4.0">4.0 - Policy Compliant</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small">Approved Hike % <span class="text-danger">*</span></label>
                                <input type="text" class="form-control fw-bold text-success" id="admHrHike" value="15%" placeholder="e.g. 15%" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark small">Promotion Endorsement</label>
                                <input type="text" class="form-control" id="admHrPromo" value="Promoted to Tech Lead" placeholder="e.g. Senior Role">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark small">HR Remarks & Policy Clearances <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="admHrComments" rows="2" required placeholder="Enter HR policy observations and increment justification...">Performance verified with project stakeholders. Proposed 15% increment aligns with annual merit budget and benchmark for L4 Engineering.</textarea>
                        </div>

                        <div class="pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <span class="text-muted small"><i class="bi bi-shield-check me-1"></i>Final HR approval completes the employee appraisal and awards the official Scorecard Certificate.</span>
                            <button type="submit" class="btn fw-bold px-4 text-white shadow-sm" style="background:#7c3aed;" id="admHrSubmitBtn">
                                <i class="bi bi-check2-all me-1"></i> Confirm Final Approval as HR (Complete Appraisal) &rarr;
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SUB-TAB 4: MASTER LEDGER & CERTIFICATE -->
            <div class="content-hub-card admin-subcontent d-none" id="adminSubAll">
                <div class="content-hub-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark">Stage 5: Master Company Ledger & Scorecards</h5>
                        <small class="text-muted">Master database of all employee appraisals across all 4 progression stages.</small>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-group input-group-sm" style="min-width:220px;">
                            <span class="input-group-text bg-white fw-bold text-success border-end-0"><i class="bi bi-filter me-1"></i>Dept:</span>
                            <select class="form-select form-select-sm fw-semibold border-start-0" id="ledgerDeptFilterSelect" onchange="onLedgerDeptFilterChange(this.value)">
                                <!-- Populated dynamically -->
                            </select>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary" onclick="window.print()"><i class="bi bi-printer me-1"></i> Print Ledger</button>
                    </div>
                </div>

                <div class="p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 custom-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">Employee Details</th>
                                    <th>Department &amp; Role</th>
                                    <th>Cadence &amp; Period</th>
                                    <th>Appraisal Status</th>
                                    <th>Merit Ratings (Emp &rarr; TL &rarr; Mgr &rarr; HR)</th>
                                    <th>Appraisal Hike &amp; Promo</th>
                                    <th>Executive Recognition</th>
                                    <th class="text-end pe-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="masterLedgerTableBody">
                                <!-- Generated Dynamically via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- #########################################################################
             PORTAL 3: OVERALL APPRAISAL MASTER TABLE & COMPANY LEDGER
             ######################################################################### -->
        <div id="portalLedgerSection" class="d-none">
            <!-- Overall Summary KPI Metric Cards -->
            <div class="row g-3 mb-4">
                <div class="col-xl-3 col-sm-6">
                    <div class="ledger-kpi-card">
                        <div class="ledger-kpi-icon" style="background:#e7f7eb; color:#087a24;">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <div class="text-muted small fw-bold">Total Appraisal Records</div>
                            <h4 class="fw-bold mb-0 text-dark" id="ledgerKpiTotal">16 Employees</h4>
                            <small class="text-success fw-bold"><i class="bi bi-check-circle-fill me-1"></i>Active Pipeline</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="ledger-kpi-card">
                        <div class="ledger-kpi-icon" style="background:#e0f2fe; color:#0284c7;">
                            <i class="bi bi-award-fill"></i>
                        </div>
                        <div>
                            <div class="text-muted small fw-bold">Completed Scorecards</div>
                            <h4 class="fw-bold mb-0 text-dark" id="ledgerKpiCompleted">6 Completed</h4>
                            <small class="text-primary fw-bold">Stage 5 Finalized</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="ledger-kpi-card">
                        <div class="ledger-kpi-icon" style="background:#fef3c7; color:#b45309;">
                            <i class="bi bi-hourglass-split"></i>
                        </div>
                        <div>
                            <div class="text-muted small fw-bold">In Review / Pending</div>
                            <h4 class="fw-bold mb-0 text-dark" id="ledgerKpiPending">10 In Progress</h4>
                            <small class="text-warning fw-bold">TL &bull; HR &bull; Mgr</small>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="ledger-kpi-card">
                        <div class="ledger-kpi-icon" style="background:#f3e8ff; color:#7e22ce;">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <div>
                            <div class="text-muted small fw-bold">Avg Merit Rating</div>
                            <h4 class="fw-bold mb-0 text-dark" id="ledgerKpiAvgRating">4.72 / 5.0</h4>
                            <small style="color:#7c3aed; font-weight:700;">Top Performer Avg</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Master Table Card -->
            <div class="content-hub-card">
                <div class="content-hub-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div>
                        <h5 class="mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                            <i class="bi bi-journal-text text-success"></i> Overall Performance Appraisal Master Ledger & Awarded Reports
                        </h5>
                        <small class="text-muted">Consolidated report database of completed appraisals, awarded merit hikes, promotions, and active progression stages.</small>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <div class="input-group input-group-sm" style="min-width:240px;">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control form-control-sm border-start-0" id="ledgerSearchInput" placeholder="Search employee, ID, role, hike..." oninput="renderMasterLedgerTable()">
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-success" onclick="resetLedgerFilters()">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filters
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                            <i class="bi bi-printer me-1"></i> Print Report
                        </button>
                    </div>
                </div>

                <!-- Dedicated Neat 4-Column Filter Panel -->
                <div class="p-3 bg-light border-bottom">
                    <div class="row g-3 align-items-center">
                        <!-- 1. Status Filter -->
                        <div class="col-lg-3 col-md-6">
                            <label class="filter-label-custom mb-1" for="ledgerCardStatusFilter">
                                <i class="bi bi-award-fill text-success"></i> Appraisal Status Filter:
                            </label>
                            <select class="form-select form-select-sm fw-semibold" id="ledgerCardStatusFilter" onchange="setLedgerQuickStatus(this.value)">
                                <option value="ALL">All Statuses (Completed & In Progress)</option>
                                <option value="COMPLETED" selected>🏆 Appraisal Awarded & Scorecard Released</option>
                                <option value="PENDING_MGR">⏳ In Executive Manager Signoff Desk</option>
                                <option value="PENDING_HR">📋 In HR Department Verification Desk</option>
                                <option value="PENDING_TL">📝 In Team Lead Evaluation Desk</option>
                            </select>
                        </div>

                        <!-- 2. Department Filter -->
                        <div class="col-lg-3 col-md-6">
                            <label class="filter-label-custom mb-1" for="ledgerCardDeptFilter">
                                <i class="bi bi-building text-primary"></i> Department Filter:
                            </label>
                            <select class="form-select form-select-sm fw-semibold" id="ledgerCardDeptFilter" onchange="onAdminDeptChange(this.value)">
                                <option value="">All Departments</option>
                                <option value="Design">Design</option>
                                <option value="iOS Dev">iOS Dev</option>
                                <option value="Business">Business</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Cloud Ops">Cloud Ops</option>
                                <option value="IT Operations">IT Operations</option>
                                <option value="Finance & Accounts">Finance & Accounts</option>
                            </select>
                        </div>

                        <!-- 3. Cadence Frequency Filter -->
                        <div class="col-lg-3 col-md-6">
                            <label class="filter-label-custom mb-1" for="ledgerCardFreqFilter">
                                <i class="bi bi-calendar-range text-success"></i> Frequency Cadence:
                            </label>
                            <select class="form-select form-select-sm fw-semibold" id="ledgerCardFreqFilter" onchange="onGlobalFrequencyChange(this.value)">
                                <option value="ALL">All Frequencies (Monthly / Quarterly / Annual)</option>
                                <option value="Monthly">Monthly (1 Month Once)</option>
                                <option value="Quarterly">Quarterly (3 Months Once - Q1..Q4)</option>
                                <option value="Half-Yearly">Half-Yearly (6 Months Once)</option>
                                <option value="Annual">Annual (Yearly - FY 2026-27)</option>
                            </select>
                        </div>

                        <!-- 4. Review Period Filter -->
                        <div class="col-lg-3 col-md-6">
                            <label class="filter-label-custom mb-1" for="ledgerCardPeriodFilter">
                                <i class="bi bi-clock-history text-info"></i> Review Period / Cycle:
                            </label>
                            <select class="form-select form-select-sm fw-semibold" id="ledgerCardPeriodFilter" onchange="onGlobalPeriodChange(this.value)">
                                <option value="ALL">All Review Periods</option>
                                <option value="Q3 (Oct-Dec '26)">Q3 (Oct-Dec 2026)</option>
                                <option value="H1 (Apr-Sep '26)">H1 (Apr-Sep 2026)</option>
                                <option value="FY 2026-27">FY 2026-27 (Annual)</option>
                                <option value="October 2026">October 2026 (Monthly)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Interactive Status Quick Filter Pills Toolbar -->
                <div class="p-3 border-bottom bg-white d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex gap-2 flex-wrap" id="ledgerStatusPillsGroup">
                        <button type="button" class="btn btn-sm btn-dark fw-bold rounded-pill px-3 shadow-none" id="pillStatusAll" onclick="setLedgerQuickStatus('ALL')">
                            <i class="bi bi-people-fill me-1"></i> All Appraisals (<span id="countPillAll">16</span>)
                        </button>
                        <button type="button" class="btn btn-sm btn-success fw-bold rounded-pill px-3 shadow-none text-white active" id="pillStatusCompleted" onclick="setLedgerQuickStatus('COMPLETED')">
                            <i class="bi bi-award-fill me-1"></i> 🏆 Appraisal Awarded (<span id="countPillCompleted">13</span>)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-warning text-dark fw-bold rounded-pill px-3 shadow-none" id="pillStatusMgr" onclick="setLedgerQuickStatus('PENDING_MGR')">
                            <i class="bi bi-pen-fill me-1"></i> In Manager Review (<span id="countPillMgr">1</span>)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary fw-bold rounded-pill px-3 shadow-none" id="pillStatusHr" onclick="setLedgerQuickStatus('PENDING_HR')">
                            <i class="bi bi-shield-check me-1"></i> In HR Verification (<span id="countPillHr">1</span>)
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary fw-bold rounded-pill px-3 shadow-none" id="pillStatusTl" onclick="setLedgerQuickStatus('PENDING_TL')">
                            <i class="bi bi-person-check-fill me-1"></i> In TL Evaluation (<span id="countPillTl">1</span>)
                        </button>
                    </div>
                    <div class="text-muted small fw-semibold">
                        Showing Report: <strong class="text-dark" id="ledgerFilteredCountText">13 Records</strong>
                    </div>
                </div>

                <div class="p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 custom-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">Employee Details</th>
                                    <th>Department &amp; Role</th>
                                    <th>Cadence &amp; Period</th>
                                    <th>Appraisal Status</th>
                                    <th>Merit Ratings (Emp &rarr; TL &rarr; Mgr &rarr; HR)</th>
                                    <th>Appraisal Hike &amp; Promo</th>
                                    <th>Executive Recognition</th>
                                    <th class="text-end pe-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="masterLedgerTableBody">
                                <!-- Generated Dynamically via JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Scorecard Modal -->
<div class="modal fade" id="scorecardCertificateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom px-4 py-3 bg-success text-white">
                <h5 class="modal-title fw-bold text-white mb-0">Official Performance Appraisal Certificate</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="p-4 border rounded-3 bg-light">
                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                        <div>
                            <h5 class="mb-0 fw-bold text-dark">GHARUDA HRMS</h5>
                            <small class="text-muted">Merit Performance Scorecard Certificate &bull; FY 2025-26</small>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="badge bg-success-subtle text-success border border-success px-3 py-2 fs-6 rounded-pill fw-bold" id="modalScFinalScore">Final Score: 4.8 / 5.0</span>
                            <span class="badge bg-success px-3 py-2 fs-6 rounded-pill">APPRAISAL COMPLETED</span>
                        </div>
                    </div>

                    <div class="row g-2 mb-3 bg-white p-3 rounded border">
                        <div class="col-md-4">
                            <span class="text-muted small">Employee:</span>
                            <div class="fw-bold text-dark fs-6" id="modalScEmpName">Arun Kumar</div>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small">Role:</span>
                            <div class="fw-semibold text-dark" id="modalScEmpRole">Senior Backend Engineer</div>
                        </div>
                        <div class="col-md-4">
                            <span class="text-muted small">Department:</span>
                            <div class="fw-semibold text-dark" id="modalScEmpDept">Engineering</div>
                        </div>
                    </div>

                    <!-- 4-Stage Rating Matrix -->
                    <div class="card border mb-3 shadow-none bg-white">
                        <div class="card-body p-3">
                            <div class="row g-2 text-center">
                                <div class="col-3">
                                    <div class="p-2 border rounded bg-light">
                                        <div class="text-muted small">1. Emp Self</div>
                                        <div class="fw-bold text-success fs-5" id="modalScScore1">4.5</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="p-2 border rounded bg-light">
                                        <div class="text-muted small">2. TL Score</div>
                                        <div class="fw-bold text-success fs-5" id="modalScScore2">4.6</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="p-2 border rounded bg-light">
                                        <div class="text-muted small">3. Manager Score</div>
                                        <div class="fw-bold text-warning fs-5" id="modalScScore3">4.8</div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="p-2 border rounded" style="background:#f5f3ff; border:1px solid #ddd6fe;">
                                        <div class="text-muted small fw-bold" style="color:#7c3aed;">4. HR Score</div>
                                        <div class="fw-bold fs-5" style="color:#7c3aed;" id="modalScScore4">4.8</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Manager Reply Quote Box -->
                    <div class="alert alert-success border-success mb-3 p-3 rounded-3">
                        <strong class="text-success fs-6 d-block mb-1">Executive Manager Reply &amp; Recognition:</strong>
                        <p class="mb-0 text-dark fw-medium fst-italic" id="modalScManagerReply">
                            "Good! Outstanding contributions to backend microservices, Kafka pipelines, and zero downtime. Full promotion to Tech Lead approved with 15% merit increment."
                        </p>
                    </div>

                    <div class="row g-3 mb-2">
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-white h-100 border-start border-4 border-success">
                                <span class="text-muted small">Approved Salary Increment:</span>
                                <h4 class="fw-bold text-success mb-0" id="modalScHike">15% Annual Merit Hike</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-white h-100 border-start border-4 border-success">
                                <span class="text-muted small">Promotion Confirmation:</span>
                                <h5 class="fw-bold text-success mb-0" id="modalScPromo">Promoted to Tech Lead</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top px-4 py-3 bg-light d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success fw-bold px-4" onclick="window.print()">
                    Print Official Certificate
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Launch Cycle Modal with Multi-Cadence Frequency -->
<div class="modal fade" id="initiateCycleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-bottom px-4 py-3 bg-success text-white">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-calendar2-plus fs-5"></i>
                    <h5 class="modal-title fw-bold text-white mb-0">Launch New Appraisal Cycle</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <form id="launchCycleForm" onsubmit="event.preventDefault(); handleLaunchCycleSubmit();">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Appraisal Frequency / Cadence <span class="text-danger">*</span></label>
                            <select class="form-select fw-semibold text-success" id="modalCycleFrequency" onchange="onModalCycleFreqChange(this.value)" required>
                                <option value="Monthly">Monthly (1 Month Once)</option>
                                <option value="Quarterly" selected>Quarterly (3 Months Once - Q1..Q4)</option>
                                <option value="Half-Yearly">Half-Yearly (6 Months Once - H1/H2)</option>
                                <option value="Annual">Annual (Yearly - 12 Months)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small">Review Period <span class="text-danger">*</span></label>
                            <select class="form-select fw-semibold" id="modalCyclePeriod" required>
                                <option value="Q3 (Oct-Dec '26)" selected>Q3 (Oct-Dec 2026)</option>
                                <option value="Q2 (Jul-Sep '26)">Q2 (Jul-Sep 2026)</option>
                                <option value="Q1 (Apr-Jun '26)">Q1 (Apr-Jun 2026)</option>
                                <option value="Q4 (Jan-Mar '27)">Q4 (Jan-Mar 2027)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark small">Appraisal Cycle Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control fw-bold" id="modalCycleTitle" value="Q3 2026-27 Performance Appraisal Cycle" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark small" for="modalCycleDept">
                                <i class="bi bi-building text-success me-1"></i> Target Department Scope <span class="text-danger">*</span>
                            </label>
                            <select class="form-select select2" id="modalCycleDept" onchange="onModalCycleDeptChange(this.value)">
                                <option value="ALL">All Company Departments</option>
                                <option value="Design">Design</option>
                                <option value="iOS Dev">iOS Dev</option>
                                <option value="Business">Business</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Cloud Ops">Cloud Ops</option>
                                <option value="IT Operations">IT Operations</option>
                                <option value="Finance & Accounts">Finance & Accounts</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label fw-bold text-dark small mb-0" for="modalCycleEmployee">
                                    <i class="bi bi-person-badge text-success me-1"></i> Select Employee <span class="text-danger">*</span>
                                </label>
                                <span class="badge bg-light text-dark border small" id="modalCycleEmpCountBadge">16 Employees</span>
                            </div>
                            <select class="form-select select2" id="modalCycleEmployee">
                                <option value="ALL">-- All Employees in Scope --</option>
                                <!-- Populated dynamically based on selected Department -->
                            </select>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">Self-Review Due Date</label>
                            <input type="date" class="form-control" id="modalCycleSelfDue" value="2026-10-31">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">TL &amp; HR Review Deadline</label>
                            <input type="date" class="form-control" id="modalCycleReviewDue" value="2026-11-15">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold text-dark small">Final Signoff Deadline</label>
                            <input type="date" class="form-control" id="modalCycleFinalDue" value="2026-11-30">
                        </div>
                    </div>

                    <div class="p-3 bg-light rounded-3 small text-muted">
                        <i class="bi bi-info-circle text-primary me-1"></i>
                        Launching this cycle will initiate the 5-stage workflow (Self-Review &rarr; TL &rarr; Manager Decision &rarr; HR Approval &rarr; Scorecard) across all selected employees.
                    </div>
                </form>
            </div>
            <div class="modal-footer border-top px-4 py-3 bg-light d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success fw-bold px-4" onclick="handleLaunchCycleSubmit()">
                    <i class="bi bi-rocket-takeoff me-1"></i> Launch Appraisal Cycle
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Master Portal & Live Hierarchy Synchronization JavaScript -->
<script>
// Comprehensive Mock Database with 16 employees across 8 key departments & various progression stages & cycle frequencies
var employeeDatabase = {
    // ----------------- ENGINEERING -----------------
    "ARUN": {
        id: "EMP-0104",
        name: "Arun Kumar",
        email: "arun.k@gharuda.com",
        dept: "Engineering",
        role: "Senior Backend Engineer",
        tl: "Rajesh V (Tech Lead)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Payment Gateway Modernization, Microservices Migration, Kafka Data Pipeline",
        tools: "PHP, Node.js, Docker, Kubernetes, PostgreSQL, Redis, AWS",
        summary: "Over the past fiscal year, I successfully led the backend microservices refactoring, integrated payment webhooks, and ensured 99.98% platform reliability during high-traffic quarters.",
        achievements: "• Completed high-throughput API gateway migration 2 weeks ahead of schedule.\n• Reduced Redis memory footprint by 28% through key compression.\n• Mentored 2 junior engineers through onboarding.",
        rating: "4.5",
        certs: "Certified Kubernetes Administrator (CKA), AWS Cloud Solutions",
        
        tlApproved: true,
        tlRating: "4.6",
        tlHike: "15%",
        tlPromo: "Promoted to Tech Lead",
        tlFeedback: "Demonstrated exemplary technical ownership during the Q3-Q4 microservices migration. Code reviews were thorough and mentoring contributions accelerated team velocity.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Promoted to Tech Lead",
        hrComments: "Performance verified with project stakeholders. Proposed 15% increment aligns with annual merit budget and benchmark for L4 Engineering.",

        mgrApproved: true,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Outstanding contributions to backend microservices, Kafka pipelines, and zero downtime. Full promotion to Tech Lead approved with 15% merit increment."
    },
    "KARTHIK": {
        id: "EMP-0115",
        name: "Karthik V",
        email: "karthik.v@gharuda.com",
        dept: "Engineering",
        role: "Backend Tech Lead",
        tl: "Ramesh S (Engineering Director)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Core Architecture Scaling, Multi-tenant Database Sharding, Event Bus",
        tools: "Go, PostgreSQL, Redis, RabbitMQ, Terraform, AWS EKS",
        summary: "Architected multi-tenant database partitioning strategy supporting 10x traffic surge without database degradation. Led 8 senior backend developers.",
        achievements: "• Sharded PostgreSQL clusters, reducing p99 query latency from 240ms to 28ms.\n• Implemented robust event-driven architecture with zero message loss.\n• Authored 12 internal engineering RFCs and best practices guidelines.",
        rating: "4.7",
        certs: "AWS Solutions Architect Professional, CKA",
        
        tlApproved: true,
        tlRating: "4.7",
        tlHike: "16%",
        tlPromo: "Principal Systems Architect",
        tlFeedback: "Superb architectural rigor, proactive scalability solutions, and reliable tech team leadership.",

        hrApproved: true,
        hrRating: "4.7",
        hrHike: "16%",
        tlPromo: "Principal Systems Architect",
        hrComments: "Verified architectural contributions.",

        mgrApproved: false,
        mgrRating: "4.8",
        mgrHike: "16%",
        mgrReply: "Good! Stellar database scaling and mission-critical platform stability."
    },
    "SNEHA_P": {
        id: "EMP-0118",
        name: "Sneha Patel",
        email: "sneha.p@gharuda.com",
        dept: "Engineering",
        role: "Full Stack Engineer",
        tl: "Arun Kumar (Tech Lead)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "Employee Self-Service Portal, Realtime Notifications, GraphQL API",
        tools: "React, TypeScript, PHP 8, GraphQL, MySQL, Docker",
        summary: "Developed the dynamic Employee Self-Service dashboard and integrated bi-directional webhooks with zero frontend latency regression.",
        achievements: "• Delivered 14 full-stack feature releases ahead of sprint deadlines.\n• Refactored notification pipeline, eliminating duplicate push messages.\n• Maintained 98% unit test coverage on all API endpoints.",
        rating: "4.4",
        certs: "Meta Certified Frontend Developer",

        tlApproved: true,
        tlRating: "4.5",
        tlHike: "13%",
        tlPromo: "Senior Full Stack Engineer",
        tlFeedback: "Fast execution speed, pristine UI component architecture, and high adaptability across frontend and backend tasks.",

        hrApproved: true,
        hrRating: "4.5",
        hrHike: "13%",
        tlPromo: "Senior Full Stack Engineer",
        hrComments: "Verified performance.",

        mgrApproved: false,
        mgrRating: "4.6",
        mgrHike: "13%",
        mgrReply: "Good! Outstanding velocity on the employee portal and impeccable frontend quality."
    },
    "VIKRAM": {
        id: "EMP-0128",
        name: "Vikram Sundaram",
        email: "vikram.s@gharuda.com",
        dept: "Engineering",
        role: "Frontend Architect",
        tl: "Ramesh S (Engineering Director)",
        cycleType: "Annual",
        cyclePeriod: "FY 2026-27",
        projects: "Next-Gen Web Core, Micro-frontends Migration, Performance Tuning",
        tools: "Vue 3, React, Vite, Webpack 5, Web Vitals, Tailwind",
        summary: "Transitioned monolithic frontend into micro-frontend bundles, reducing initial bundle load times by 48% across all browser platforms.",
        achievements: "• Google Lighthouse Performance score raised from 62 to 96 across all web modules.\n• Created shared state management SDK used by 5 product squads.\n• Conducted 10 internal engineering masterclasses on modern web performance.",
        rating: "4.8",
        certs: "Google Mobile Web Specialist",

        tlApproved: true,
        tlRating: "4.9",
        tlHike: "17%",
        tlPromo: "Staff Frontend Architect",
        tlFeedback: "Exceptional frontend leadership, groundbreaking performance optimizations, and great architectural documentation.",

        hrApproved: true,
        hrRating: "4.9",
        hrHike: "17%",
        tlPromo: "Staff Frontend Architect",
        hrComments: "Strategic hire evaluation. Top tier engineering performer across all quarterly milestones.",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "17%",
        mgrReply: "Good! Exceptional architectural overhaul, tremendous frontend performance gains, and visionary technical leadership."
    },

    // ----------------- PRODUCT DESIGN -----------------
    "PRIYA": {
        id: "EMP-0108",
        name: "Priya Sharma",
        email: "priya.s@gharuda.com",
        dept: "Design",
        role: "Lead UI/UX Designer",
        tl: "Sneha Sen (Design Lead)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "HRMS Design System 2.0, Mobile App Redesign, Accessibility Audit",
        tools: "Figma, Adobe XD, Design Tokens, FigJam, Protopie",
        summary: "Redesigned complete HRMS suite with modern design tokens resulting in 96% positive client usability feedback and unified design language across 18 product modules.",
        achievements: "• Delivered complete Design System 2.0 with 150+ interactive UI components.\n• Achieved WCAG 2.1 AA accessibility compliance across all web screens.\n• Spearheaded cross-functional design sprints with front-end engineering.",
        rating: "4.8",
        certs: "NN/g UX Master Certification, Interaction Design Foundation UX",
        
        tlApproved: true,
        tlRating: "4.7",
        tlHike: "15%",
        tlPromo: "Principal Product Designer",
        tlFeedback: "Exceptional creativity, design systems architecture, and timely delivery of design tokens. Strong collaboration with frontend developers.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Principal Product Designer",
        hrComments: "Benchmarked against Senior Design Band. Exceptional portfolio and strong peer ratings.",

        mgrApproved: true,
        mgrRating: "4.9",
        mgrHike: "15%",
        mgrReply: "Good! Exceptional leadership on Design System 2.0 and outstanding user-centered aesthetic overhaul."
    },
    "MEERA": {
        id: "EMP-0132",
        name: "Meera Nambiar",
        email: "meera.n@gharuda.com",
        dept: "Design",
        role: "Senior UX Researcher",
        tl: "Priya Sharma (Design Lead)",
        cycleType: "Half-Yearly",
        cyclePeriod: "H1 (Apr-Sep '26)",
        projects: "User Journey Mapping, Enterprise Usability Benchmarking, Onboarding UX",
        tools: "Miro, Dovetail, UserTesting, Figma, Hotjar",
        summary: "Conducted 45 enterprise customer UX interviews and usability tests to optimize payroll and leave approval flows, reducing task completion time by 35%.",
        achievements: "• Synthesized user behavior patterns into actionable design insights.\n• Increased post-onboarding feature adoption by 27% in Q3.\n• Created comprehensive user personas for enterprise HR administrators.",
        rating: "4.5",
        certs: "Certified Usability Analyst (CUA - Human Factors International)",

        tlApproved: true,
        tlRating: "4.6",
        tlHike: "14%",
        tlPromo: "Staff UX Researcher",
        tlFeedback: "Outstanding qualitative user research insights that directly guided product roadmaps and reduced user friction.",

        hrApproved: true,
        hrRating: "4.6",
        hrHike: "14%",
        tlPromo: "Staff UX Researcher",
        hrComments: "",

        mgrApproved: true,
        mgrRating: "4.6",
        mgrHike: "14%",
        mgrReply: "Good! Thorough customer research and impactful user experience recommendations."
    },

    // ----------------- HUMAN RESOURCES -----------------
    "DEEPIKA": {
        id: "EMP-0102",
        name: "Deepika Rao",
        email: "deepika.r@gharuda.com",
        dept: "Human Resources",
        role: "Senior Talent Acquisition Lead",
        tl: "Ananya Roy (HRBP)",
        cycleType: "Annual",
        cyclePeriod: "FY 2026-27",
        projects: "Campus Hiring Drive 2025, Lateral Tech Hiring, ATS Optimization",
        tools: "LinkedIn Recruiter, Gharuda ATS, HackerEarth, Darwinbox",
        summary: "Closed 65+ critical technical roles across product engineering with a 91% candidate offer acceptance rate and slashed average time-to-hire by 14 days.",
        achievements: "• Achieved 120% of annual tech recruitment quotas across Bangalore and Chennai branches.\n• Reduced average cost-per-hire by 18% through organic campus sourcing.\n• Launched diversity hiring campaign increasing female engineering ratios by 12%.",
        rating: "4.8",
        certs: "SHRM-CP Certified, LinkedIn Certified Professional Recruiter",
        
        tlApproved: true,
        tlRating: "4.9",
        tlHike: "16.5%",
        tlPromo: "Promoted to Talent Partner",
        tlFeedback: "Exceeded all recruiting KPIs, managed executive candidate pipelines flawlessly, and built strong stakeholder relationships.",

        hrApproved: true,
        hrRating: "4.9",
        hrHike: "16.5%",
        tlPromo: "Promoted to Talent Partner",
        hrComments: "Top recruiter across company branches. Consistently high hiring manager satisfaction scores (4.9/5.0).",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "16.5%",
        mgrReply: "Good! Outstanding hiring targets achieved. Exceeded all FY25 onboarding quotas by 120%. Exemplary dedication and talent leadership."
    },
    "ANANYA": {
        id: "EMP-0105",
        name: "Ananya Roy",
        email: "ananya.r@gharuda.com",
        dept: "Human Resources",
        role: "Lead HR Business Partner",
        tl: "Vikram Malhotra (HR Director)",
        cycleType: "Half-Yearly",
        cyclePeriod: "H1 (Apr-Sep '26)",
        projects: "Annual Appraisal Cycle 2026, Employee Wellness Program, Retention Strategy",
        tools: "Gharuda HRMS, CultureAmp, Workday, Excel Advanced Modeling",
        summary: "Designed and rolled out company-wide performance framework, reducing employee voluntary turnover to historic low of 4.2% across engineering and sales.",
        achievements: "• Successfully aligned 600+ employee appraisal bands with industry compensation standards.\n• Launched mental health & wellness initiative with 88% positive survey score.\n• Streamlined HR grievance resolution turnaround time to under 24 hours.",
        rating: "4.7",
        certs: "SHRM-SCP (Senior Certified Professional), CIPD Level 7",

        tlApproved: true,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Director - HR Business Partnering",
        tlFeedback: "Exceptional HR leadership, compassionate employee relations, and meticulous policy execution.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Director - HR Business Partnering",
        hrComments: "Flawless compliance audit and outstanding strategic alignment with business goals.",

        mgrApproved: true,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Superb HR business partnering, high employee trust, and strong retention."
    },

    // ----------------- CLOUD & DEVOPS -----------------
    "SARAH": {
        id: "EMP-0120",
        name: "Sarah Mitchell",
        email: "sarah.m@gharuda.com",
        dept: "Cloud Ops",
        role: "Senior DevOps Engineer",
        tl: "Alex Turner (Cloud Manager)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "CI/CD Pipeline Revamp, Cloud Cost Optimization, Zero-Trust SecOps",
        tools: "Kubernetes, Helm, GitHub Actions, Terraform, Datadog, AWS",
        summary: "Spearheaded GitOps modernization with automated ephemeral staging environments. Slashed monthly cloud infrastructure spend by $14,200 via spot instances and automated rightsizing.",
        achievements: "• Reduced deployment build and release cycle from 45 minutes down to 8 minutes.\n• Achieved 99.99% infrastructure uptime across all production clusters.\n• Automated multi-region automated disaster recovery and backup simulations.",
        rating: "4.6",
        certs: "HashiCorp Certified Terraform Associate, AWS DevOps Engineer Pro",
        
        tlApproved: true,
        tlRating: "4.6",
        tlHike: "14%",
        tlPromo: "Lead Cloud Platform Engineer",
        tlFeedback: "Consistently resolves production bottlenecks and drives outstanding cloud cost efficiencies.",

        hrApproved: true,
        hrRating: "4.6",
        hrHike: "14%",
        tlPromo: "Lead Cloud Platform Engineer",
        hrComments: "Endorsed.",

        mgrApproved: true,
        mgrRating: "4.7",
        mgrHike: "14%",
        mgrReply: "Good! Substantial cloud savings and impeccable production reliability."
    },
    "ROHIT": {
        id: "EMP-0126",
        name: "Rohit Menon",
        email: "rohit.m@gharuda.com",
        dept: "Cloud Ops",
        role: "Site Reliability Engineer",
        tl: "Alex Turner (Cloud Manager)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Observability Platform, Chaos Engineering, Multi-Region Failover",
        tools: "Prometheus, Grafana, OpenTelemetry, Istio Service Mesh, AWS",
        summary: "Built centralized distributed tracing and automated alert routing, reducing Mean Time to Detection (MTTD) by 62%.",
        achievements: "• Implemented proactive canary deployments with automated rollback on error spikes.\n• Executed chaos testing drills uncovering 4 critical resiliency bugs before launch.\n• Maintained flawless zero-downtime during peak Black Friday server traffic.",
        rating: "4.7",
        certs: "CKA Certified Kubernetes Administrator, AWS SysOps Associate",

        tlApproved: true,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Senior SRE Lead",
        tlFeedback: "Outstanding production vigilance, deep observability expertise, and robust chaos engineering drills.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Senior SRE Lead",
        hrComments: "Strong peer commendations and verified technical excellence in critical infrastructure.",

        mgrApproved: true,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Stellar infrastructure stability and zero platform outages."
    },

    // ----------------- MARKETING -----------------
    "RAHUL": {
        id: "EMP-0112",
        name: "Rahul Verma",
        email: "rahul.v@gharuda.com",
        dept: "Marketing",
        role: "Performance Marketing Specialist",
        tl: "Priya S (Marketing Lead)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Q3-Q4 Growth Funnel Optimization, Enterprise Lead Gen Ads",
        tools: "Google Analytics 4, Meta Ads Manager, HubSpot, SEMrush",
        summary: "Boosted high-intent enterprise HRMS qualified inbound leads by 42% while decreasing cost-per-acquisition (CPA) by 22% through systematic landing page A/B testing.",
        achievements: "• Generated 1,400+ qualified demo bookings for the B2B enterprise sales team.\n• Ranked 18 high-volume HRMS keywords in Google Top 3 organic search results.\n• Executed high-converting webinar campaigns with 68% attendance rate.",
        rating: "4.5",
        certs: "Google Ads Search Certified, HubSpot Inbound Marketing",
        
        tlApproved: true,
        tlRating: "4.6",
        tlHike: "14%",
        tlPromo: "Lead Growth Marketing Specialist",
        tlFeedback: "Excellent data-driven mindset, rigorous analytics tracking, and consistent growth pipeline delivery.",

        hrApproved: true,
        hrRating: "4.7",
        hrHike: "14%",
        tlPromo: "Lead Growth Marketing Specialist",
        hrComments: "Strong ROI metrics verified with revenue operations. Merit increment approved within marketing band.",

        mgrApproved: false,
        mgrRating: "4.7",
        mgrHike: "14%",
        mgrReply: "Good! Outstanding growth numbers and impactful enterprise lead acquisition."
    },
    "POOJA": {
        id: "EMP-0130",
        name: "Pooja Hegde",
        email: "pooja.h@gharuda.com",
        dept: "Marketing",
        role: "Content & Brand Lead",
        tl: "Priya S (Marketing Lead)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "HRMS Thought Leadership Whitepapers, Product Launch Case Studies, Social Video",
        tools: "Canva, Notion, WordPress, Buffer, Grammarly Enterprise",
        summary: "Authored 24 in-depth HR trend reports and B2B customer success case studies, increasing website organic referral traffic by 65%.",
        achievements: "• Published 'Future of AI in HR 2026' report downloaded by 3,800+ HR leaders.\n• Managed brand redesign launch across LinkedIn and industry tech portals.\n• Spearheaded monthly customer newsletter reaching 28,000+ active subscribers.",
        rating: "4.6",
        certs: "HubSpot Content Marketing Certification",

        tlApproved: true,
        tlRating: "4.7",
        tlHike: "14.5%",
        tlPromo: "Senior Brand Marketing Manager",
        tlFeedback: "Creative storytelling, superb editorial leadership, and strong multi-channel content execution.",

        hrApproved: false,
        hrRating: "4.7",
        hrHike: "14.5%",
        tlPromo: "Senior Brand Marketing Manager",
        hrComments: "",

        mgrApproved: false,
        mgrRating: "4.7",
        mgrHike: "14.5%",
        mgrReply: "Good! High-impact content creation and exceptional brand storytelling."
    },

    // ----------------- IT OPERATIONS & CYBERSECURITY -----------------
    "DAVID": {
        id: "EMP-0125",
        name: "David Martinez",
        email: "david.m@gharuda.com",
        dept: "IT Operations",
        role: "IT Security Specialist",
        tl: "Daniel M (IT Head)",
        cycleType: "Half-Yearly",
        cyclePeriod: "H1 (Apr-Sep '26)",
        projects: "SOC2 Type II Audit, Endpoint Threat Detection, IAM Hardening",
        tools: "CrowdStrike, Okta SSO, Splunk, Tenable Nessus, AWS IAM",
        summary: "Led security controls implementation that successfully passed annual SOC2 Type II compliance audit with zero non-conformities. Hardened single sign-on across 45 internal SaaS tools.",
        achievements: "• Implemented phishing-resistant MFA across 100% of employee accounts.\n• Resolved 94% of reported security vulnerabilities within SLA of 48 hours.\n• Conducted monthly security drills and awareness training for 300+ staff.",
        rating: "4.6",
        certs: "CISSP Certified Information Systems Security Professional, CEH",
        
        tlApproved: true,
        tlRating: "4.7",
        tlHike: "15%",
        tlPromo: "Principal Security Architect",
        tlFeedback: "Flawless audit execution and outstanding zero-trust security posture improvements.",

        hrApproved: false,
        hrRating: "4.7",
        hrHike: "15%",
        tlPromo: "Principal Security Architect",
        hrComments: "",

        mgrApproved: false,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Flawless SOC2 audit clearance and exceptional company cybersecurity governance."
    },
    "SANJAY": {
        id: "EMP-0134",
        name: "Sanjay Gupta",
        email: "sanjay.g@gharuda.com",
        dept: "IT Operations",
        role: "Senior IT Systems Admin",
        tl: "Daniel M (IT Head)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Zero-Touch Laptop Provisioning, Office Network Upgrade, Helpdesk Automation",
        tools: "Jamf Pro, Microsoft Intune, Jira Service Management, Cisco Meraki",
        summary: "Automated new hire hardware staging and MDM enrolment, dropping onboarding laptop setup time from 3 hours to 15 minutes per employee.",
        achievements: "• Handled 1,800+ internal IT tickets with a 98.4% first-contact resolution rate.\n• Upgraded corporate office Wi-Fi 6 network ensuring seamless 1Gbps connectivity.\n• Maintained 100% hardware inventory accuracy across 4 office locations.",
        rating: "4.5",
        certs: "CompTIA Security+, Cisco CCNA, Jamf Certified Admin",

        tlApproved: true,
        tlRating: "4.6",
        tlHike: "13.5%",
        tlPromo: "Lead IT Operations Specialist",
        tlFeedback: "Highly responsive, customer-first service mindset, and efficient IT provisioning.",

        hrApproved: true,
        hrRating: "4.6",
        hrHike: "13.5%",
        tlPromo: "Lead IT Operations Specialist",
        hrComments: "Strong employee CSAT ratings and seamless IT support delivery across all teams.",

        mgrApproved: true,
        mgrRating: "4.7",
        mgrHike: "13.5%",
        mgrReply: "Good! Reliable IT systems administration and outstanding employee support turnaround."
    },

    // ----------------- BUSINESS & SALES -----------------
    "AMIT": {
        id: "EMP-0110",
        name: "Amit Patel",
        email: "amit.p@gharuda.com",
        dept: "Business",
        role: "Senior Enterprise Account Executive",
        tl: "Sanjay Gupta (VP Sales)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "BFSI Sector Penetration, Enterprise HRMS Expansion, Q4 Revenue Run",
        tools: "Salesforce CRM, Gong.io, LinkedIn Sales Nav, DocuSign",
        summary: "Closed ₹3.4 Crores in new Annual Recurring Revenue (ARR) across enterprise financial and manufacturing clients, achieving 134% of annual quota.",
        achievements: "• Secured 3 Tier-1 banking enterprise multi-year subscription contracts.\n• Maintained 96% client retention and upsell expansion rate across portfolio.\n• Awarded Top Sales Closer of the Year FY25.",
        rating: "4.9",
        certs: "MEDDIC Sales Certification, Enterprise SaaS Sales Master",
        
        tlApproved: true,
        tlRating: "4.9",
        tlHike: "18%",
        tlPromo: "Associate Vice President - Enterprise Sales",
        tlFeedback: "Phenomenal sales results, high client rapport, and tremendous revenue contribution to company ARR goals.",

        hrApproved: true,
        hrRating: "4.9",
        hrHike: "18%",
        tlPromo: "Associate Vice President - Enterprise Sales",
        hrComments: "Top quota achiever across company. Exceptional merit increase endorsed.",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "18%",
        mgrReply: "Good! Outstanding enterprise sales numbers. Achieved 134% of annual quota. Approved 18% hike and AVP promotion."
    },
    "MANOJ": {
        id: "EMP-0140",
        name: "Manoj Kumar",
        email: "manoj.k@gharuda.com",
        dept: "Sales & BD",
        role: "Enterprise Sales Director",
        tl: "Shankar Raman (Chief Commercial Officer)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Mid-Market & Enterprise HRMS Expansions, Multi-Year SaaS Contracts",
        tools: "Salesforce CRM, Gong.io, LinkedIn Sales Navigator, ZoomInfo",
        summary: "Closed ₹4.2 Crores in Annual Recurring Revenue (ARR) across 18 mid-market enterprise accounts, achieving 135% of annual sales quota.",
        achievements: "• Signed company's largest multi-year enterprise contract with a 2,500-seat workforce.\n• Expanded account retention and upsell rate to 118% net revenue retention.\n• Mentored 4 junior business development representatives on sales methodology.",
        rating: "4.9",
        certs: "Certified Enterprise Sales Leader (CESL)",

        tlApproved: true,
        tlRating: "5.0",
        tlHike: "18%",
        tlPromo: "VP of Enterprise Sales",
        tlFeedback: "Phenomenal sales numbers, impeccable enterprise client negotiation skills, and consistent revenue overachievement.",

        hrApproved: true,
        hrRating: "5.0",
        hrHike: "18%",
        tlPromo: "VP of Enterprise Sales",
        hrComments: "Highest revenue contributor in FY25-26. Top performance bracket confirmed.",

        mgrApproved: true,
        mgrRating: "5.0",
        mgrHike: "18%",
        mgrReply: "Good! Outstanding revenue generation, exceptional enterprise leadership, and historic sales growth."
    },
    "DIVYA": {
        id: "EMP-0142",
        name: "Divya Krishnan",
        email: "divya.k@gharuda.com",
        dept: "Sales & BD",
        role: "Key Account Manager",
        tl: "Manoj Kumar (Sales Director)",
        cycleType: "Quarterly",
        cyclePeriod: "Q3 (Oct-Dec '26)",
        projects: "Enterprise Client Success, Strategic Renewals, Upsell Expansion",
        tools: "Salesforce, Gainsight, HubSpot, Zendesk",
        summary: "Maintained a 99.2% annual contract renewal rate across 35 enterprise accounts while identifying ₹85 Lakhs in expansion add-on modules.",
        achievements: "• Zero customer churn across Tier-1 enterprise accounts in FY25.\n• Delivered Quarterly Business Reviews (QBRs) for 100% of assigned key accounts.\n• Coordinated with product team to deliver top 5 requested enterprise client features.",
        rating: "4.7",
        certs: "Gainsight Certified Customer Success Manager",

        tlApproved: false,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Senior Key Accounts Lead",
        tlFeedback: "Deep relationship building with enterprise clients, proactive renewal management, and solid upsell track record.",

        hrApproved: false,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Senior Key Accounts Lead",
        hrComments: "",

        mgrApproved: false,
        mgrRating: "4.8",
        mgrHike: "15%",
        mgrReply: "Good! Outstanding account retention and high enterprise client satisfaction."
    },

    // ----------------- FINANCE & ACCOUNTS -----------------
    "SURESH": {
        id: "EMP-0150",
        name: "Suresh Natarajan",
        email: "suresh.n@gharuda.com",
        dept: "Finance & Accounts",
        role: "Senior Financial Analyst",
        tl: "Kavitha R (Finance Director)",
        cycleType: "Annual",
        cyclePeriod: "FY 2026-27",
        projects: "Annual Budget Forecasting, SaaS Unit Economics, CapEx/OpEx Modeling",
        tools: "SAP ERP, Oracle NetSuite, Advanced Excel VBA, Tableau",
        summary: "Created automated SaaS unit economics and EBITDA cash flow models, providing real-time departmental budget variance tracking for C-level leadership.",
        achievements: "• Uncovered ₹22 Lakhs in vendor tax credit recovery during annual audit.\n• Reduced monthly financial books closure cycle from 9 days to 4 days.\n• Built dynamic headcount budgeting calculator integrated with HR recruitment plan.",
        rating: "4.6",
        certs: "Chartered Financial Analyst (CFA Level 2), CMA Certified",

        tlApproved: true,
        tlRating: "4.7",
        tlHike: "14%",
        tlPromo: "Finance Manager - FP&A",
        tlFeedback: "Meticulous financial forecasting, deep analytical rigor, and accurate monthly variance tracking.",

        hrApproved: true,
        hrRating: "4.7",
        hrHike: "14%",
        tlPromo: "Finance Manager - FP&A",
        hrComments: "Audit standards verified. Strong performance within finance operations band.",

        mgrApproved: false,
        mgrRating: "4.7",
        mgrHike: "14%",
        mgrReply: "Good! Excellent financial modeling, rigorous cash flow management, and timely audit clearance."
    },
    "LAVANYA": {
        id: "EMP-0152",
        name: "Lavanya S",
        email: "lavanya.s@gharuda.com",
        dept: "Finance & Accounts",
        role: "Payroll & Accounts Manager",
        tl: "Kavitha R (Finance Director)",
        cycleType: "Monthly",
        cyclePeriod: "October 2026",
        projects: "Automated Tax Filing & Form 16, Multi-State Statutory Compliance, Payroll Audit",
        tools: "Tally Prime, Quickbooks, Gharuda Payroll Engine, Income Tax Portal",
        summary: "Disbursed monthly payroll for 600+ full-time and contract staff across 4 states with 100% on-time accuracy and zero statutory compliance delays.",
        achievements: "• Automated TDS calculations and Form 16 generation for all employees.\n• Achieved 100% on-time PF, ESI, and Professional Tax government filings.\n• Resolved 99% of employee payroll queries within 4 business hours.",
        rating: "4.8",
        certs: "Certified Payroll Specialist (CPP), CA Inter",

        tlApproved: true,
        tlRating: "4.8",
        tlHike: "15%",
        tlPromo: "Senior Manager - Payroll & Compliance",
        tlFeedback: "Zero payroll defects, impeccable compliance tracking, and outstanding payroll support to all staff.",

        hrApproved: true,
        hrRating: "4.8",
        hrHike: "15%",
        tlPromo: "Senior Manager - Payroll & Compliance",
        hrComments: "Essential stakeholder for HR compensation operations. Top rating endorsed.",

        mgrApproved: true,
        mgrRating: "4.9",
        mgrHike: "15%",
        mgrReply: "Good! Flawless payroll processing, 100% compliance adherence, and excellent employee support."
    }
};

var currentDeptFilter = "";
var currentFrequencyFilter = "ALL";
var currentPeriodFilter = "ALL";
var currentStatusFilter = "COMPLETED";
var currentEmpKey = "";
var activeEmpStage = 1;

// Clean reference departments matching team.php
var departmentList = [
    "Design",
    "iOS Dev",
    "Business",
    "Marketing",
    "Engineering",
    "Human Resources",
    "Cloud Ops",
    "IT Operations",
    "Finance & Accounts"
];

function setLedgerQuickStatus(status) {
    currentStatusFilter = status || 'ALL';
    
    var sel = document.getElementById('ledgerCardStatusFilter');
    if (sel && sel.value !== currentStatusFilter) {
        sel.value = currentStatusFilter;
    }

    var pills = {
        'ALL': 'pillStatusAll',
        'COMPLETED': 'pillStatusCompleted',
        'PENDING_MGR': 'pillStatusMgr',
        'PENDING_HR': 'pillStatusHr',
        'PENDING_TL': 'pillStatusTl'
    };

    Object.keys(pills).forEach(function(k) {
        var btn = document.getElementById(pills[k]);
        if (btn) {
            if (k === currentStatusFilter) {
                btn.classList.add('active');
                if (k === 'ALL') {
                    btn.className = 'btn btn-sm btn-dark fw-bold rounded-pill px-3 shadow-none active';
                } else if (k === 'COMPLETED') {
                    btn.className = 'btn btn-sm btn-success fw-bold rounded-pill px-3 shadow-none active text-white';
                } else if (k === 'PENDING_MGR') {
                    btn.className = 'btn btn-sm btn-warning text-dark fw-bold rounded-pill px-3 shadow-none active';
                } else if (k === 'PENDING_HR') {
                    btn.className = 'btn btn-sm btn-primary fw-bold rounded-pill px-3 shadow-none active';
                } else if (k === 'PENDING_TL') {
                    btn.className = 'btn btn-sm btn-secondary text-white fw-bold rounded-pill px-3 shadow-none active';
                }
            } else {
                btn.classList.remove('active');
                if (k === 'ALL') {
                    btn.className = 'btn btn-sm btn-outline-dark fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'COMPLETED') {
                    btn.className = 'btn btn-sm btn-outline-success fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'PENDING_MGR') {
                    btn.className = 'btn btn-sm btn-outline-warning text-dark fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'PENDING_HR') {
                    btn.className = 'btn btn-sm btn-outline-primary fw-bold rounded-pill px-3 shadow-none';
                } else if (k === 'PENDING_TL') {
                    btn.className = 'btn btn-sm btn-outline-secondary fw-bold rounded-pill px-3 shadow-none';
                }
            }
        }
    });

    renderMasterLedgerTable();
}

function refreshSelect2() {
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('#adminDeptFilterSelect, #empPortalDeptSelect, #adminActiveEmpSelect, #employeePortalProfileSelect, #globalFrequencyFilter, #globalPeriodFilter').each(function() {
            var $el = $(this);
            if (!$el.data('select2')) {
                $el.select2({ width: '100%' });
            } else {
                $el.trigger('change.select2');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    populateDepartmentDropdowns();
    populateEmployeeDropdowns('', '');
    loadEmployeeData('');
    setLedgerQuickStatus('COMPLETED');
    renderQuickEmpPills();

    // Bind Select2 change events
    if (typeof $ !== 'undefined') {
        $('#adminDeptFilterSelect').on('change select2:select', function() {
            onAdminDeptChange(this.value);
        });
        $('#empPortalDeptSelect').on('change select2:select', function() {
            onEmpPortalDeptChange(this.value);
        });
        $('#adminActiveEmpSelect').on('change select2:select', function() {
            if (this.value) loadEmployeeData(this.value);
        });
        $('#employeePortalProfileSelect').on('change select2:select', function() {
            if (this.value) loadEmployeeData(this.value);
        });
        $('#ledgerDeptFilterSelect').on('change select2:select', function() {
            onLedgerDeptFilterChange(this.value);
        });
        $('#globalFrequencyFilter').on('change select2:select', function() {
            onGlobalFrequencyChange(this.value);
        });
        $('#globalPeriodFilter').on('change select2:select', function() {
            onGlobalPeriodChange(this.value);
        });

        // Launch Appraisal Cycle Modal Select2 and Cascading Dropdowns
        $('#initiateCycleModal').on('shown.bs.modal', function () {
            var selectedDept = $('#modalCycleDept').val() || 'ALL';
            populateModalCycleEmployees(selectedDept);
            
            $('#modalCycleDept, #modalCycleEmployee, #modalCycleFrequency, #modalCyclePeriod').each(function() {
                var $el = $(this);
                if (!$el.data('select2')) {
                    $el.select2({
                        dropdownParent: $('#initiateCycleModal'),
                        width: '100%'
                    });
                }
            });
        });

        $('#modalCycleDept').on('change select2:select', function() {
            onModalCycleDeptChange(this.value);
        });
    }
});

// -------------------------------------------------------------
// LAUNCH CYCLE MODAL CASCADING EMPLOYEE POPULATION
// -------------------------------------------------------------
function populateModalCycleEmployees(dept) {
    var select = document.getElementById('modalCycleEmployee');
    if (!select) return;

    var filteredKeys = Object.keys(employeeDatabase).filter(function(key) {
        if (!dept || dept === '' || dept === 'ALL') return true;
        var d = (employeeDatabase[key].dept || '').toLowerCase();
        var s = dept.toLowerCase();
        if (s === 'design' && (d === 'design' || d === 'product design')) return true;
        if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) return true;
        if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) return true;
        return d === s;
    });

    var labelScope = (dept && dept !== 'ALL') ? ('All in ' + dept) : 'All Employees in Scope';
    var html = '<option value="ALL">-- ' + labelScope + ' (' + filteredKeys.length + ') --</option>';
    filteredKeys.forEach(function(k) {
        var emp = employeeDatabase[k];
        html += '<option value="' + k + '">' + emp.name + ' (' + emp.id + ' - ' + emp.role + ')</option>';
    });

    select.innerHTML = html;
    var badge = document.getElementById('modalCycleEmpCountBadge');
    if (badge) {
        badge.textContent = filteredKeys.length + ' Employees';
    }

    if (typeof $ !== 'undefined' && $(select).data('select2')) {
        $(select).trigger('change.select2');
    }
}

function onModalCycleDeptChange(dept) {
    populateModalCycleEmployees(dept);
}

// -------------------------------------------------------------
// MULTI-CADENCE FREQUENCY & PERIOD FILTER HANDLERS
// -------------------------------------------------------------
function onGlobalFrequencyChange(freq) {
    currentFrequencyFilter = freq || 'ALL';
    
    // Dynamically adjust Period dropdown options based on selected frequency
    var periodSelect = document.getElementById('globalPeriodFilter');
    if (periodSelect) {
        var optionsHtml = '<option value="ALL">All Review Periods</option>';
        if (freq === 'Monthly') {
            optionsHtml += '<option value="October 2026" selected>October 2026 (Monthly)</option>';
            optionsHtml += '<option value="September 2026">September 2026</option>';
            optionsHtml += '<option value="August 2026">August 2026</option>';
            optionsHtml += '<option value="November 2026">November 2026 (Upcoming)</option>';
        } else if (freq === 'Quarterly') {
            optionsHtml += '<option value="Q3 (Oct-Dec \'26)" selected>Q3 (Oct-Dec 2026) - Active</option>';
            optionsHtml += '<option value="Q2 (Jul-Sep \'26)">Q2 (Jul-Sep 2026)</option>';
            optionsHtml += '<option value="Q1 (Apr-Jun \'26)">Q1 (Apr-Jun 2026)</option>';
            optionsHtml += '<option value="Q4 (Jan-Mar \'27)">Q4 (Jan-Mar 2027)</option>';
        } else if (freq === 'Half-Yearly') {
            optionsHtml += '<option value="H1 (Apr-Sep \'26)" selected>H1 (Apr-Sep 2026)</option>';
            optionsHtml += '<option value="H2 (Oct-Mar \'27)">H2 (Oct-Mar 2027)</option>';
        } else if (freq === 'Annual') {
            optionsHtml += '<option value="FY 2026-27" selected>FY 2026-27 (Annual)</option>';
            optionsHtml += '<option value="FY 2025-26">FY 2025-26 (Archived)</option>';
        } else {
            optionsHtml += '<option value="Q3 (Oct-Dec \'26)">Q3 (Oct-Dec 2026)</option>';
            optionsHtml += '<option value="H1 (Apr-Sep \'26)">H1 (Apr-Sep 2026)</option>';
            optionsHtml += '<option value="October 2026">October 2026 (Monthly)</option>';
            optionsHtml += '<option value="FY 2026-27">FY 2026-27 (Annual)</option>';
        }
        periodSelect.innerHTML = optionsHtml;
        if (typeof $ !== 'undefined' && $.fn.select2) $(periodSelect).trigger('change.select2');
    }

    currentPeriodFilter = (freq === 'ALL') ? 'ALL' : (periodSelect ? periodSelect.value : 'ALL');
    renderMasterLedgerTable();
}

function onGlobalPeriodChange(period) {
    currentPeriodFilter = period || 'ALL';
    renderMasterLedgerTable();
}

function onModalCycleFreqChange(freq) {
    var periodSelect = document.getElementById('modalCyclePeriod');
    var titleInput = document.getElementById('modalCycleTitle');
    if (!periodSelect) return;

    var optionsHtml = '';
    if (freq === 'Monthly') {
        optionsHtml = '<option value="October 2026">October 2026</option><option value="November 2026">November 2026</option><option value="December 2026">December 2026</option>';
        if (titleInput) titleInput.value = 'October 2026 Monthly Performance Review';
    } else if (freq === 'Quarterly') {
        optionsHtml = '<option value="Q3 (Oct-Dec \'26)" selected>Q3 (Oct-Dec 2026)</option><option value="Q2 (Jul-Sep \'26)">Q2 (Jul-Sep 2026)</option><option value="Q1 (Apr-Jun \'26)">Q1 (Apr-Jun 2026)</option><option value="Q4 (Jan-Mar \'27)">Q4 (Jan-Mar 2027)</option>';
        if (titleInput) titleInput.value = 'Q3 2026-27 Quarterly Performance Appraisal Cycle';
    } else if (freq === 'Half-Yearly') {
        optionsHtml = '<option value="H1 (Apr-Sep \'26)" selected>H1 (Apr-Sep 2026)</option><option value="H2 (Oct-Mar \'27)">H2 (Oct-Mar 2027)</option>';
        if (titleInput) titleInput.value = 'H1 2026-27 Mid-Year Performance Evaluation';
    } else {
        optionsHtml = '<option value="FY 2026-27" selected>FY 2026-27 Annual</option>';
        if (titleInput) titleInput.value = 'FY 2026-27 Annual Merit Appraisal Cycle';
    }
    periodSelect.innerHTML = optionsHtml;
}

function handleLaunchCycleSubmit() {
    var freq = document.getElementById('modalCycleFrequency').value;
    var period = document.getElementById('modalCyclePeriod').value;
    var title = document.getElementById('modalCycleTitle').value;
    var dept = document.getElementById('modalCycleDept').value;
    var empKey = document.getElementById('modalCycleEmployee') ? document.getElementById('modalCycleEmployee').value : 'ALL';

    var targetDesc = (empKey !== 'ALL' && employeeDatabase[empKey]) 
        ? employeeDatabase[empKey].name 
        : (dept !== 'ALL' ? (dept + ' Department') : 'All Departments');

    showToastNotification('Appraisal Cycle Launched', title + ' has been published for ' + targetDesc + '. All employee portals are now open for Self-Review.');

    // If a specific employee was selected, switch to that employee
    if (empKey !== 'ALL' && employeeDatabase[empKey]) {
        loadEmployeeData(empKey);
    }

    // Sync global filter
    var freqSel = document.getElementById('globalFrequencyFilter');
    if (freqSel) {
        freqSel.value = freq;
        if (typeof $ !== 'undefined' && $.fn.select2) $(freqSel).trigger('change.select2');
    }
    onGlobalFrequencyChange(freq);

    var modalEl = document.getElementById('initiateCycleModal');
    if (modalEl) {
        var modalInstance = bootstrap.Modal.getInstance(modalEl);
        if (modalInstance) modalInstance.hide();
    }
}

function resetLedgerFilters() {
    currentFrequencyFilter = "ALL";
    currentPeriodFilter = "ALL";
    currentDeptFilter = "";
    currentStatusFilter = "COMPLETED";
    
    var searchInput = document.getElementById('ledgerSearchInput');
    if (searchInput) searchInput.value = "";

    var freqSel = document.getElementById('globalFrequencyFilter');
    if (freqSel) {
        freqSel.value = "ALL";
        if (typeof $ !== 'undefined' && $.fn.select2) $(freqSel).trigger('change.select2');
    }

    var deptSel = document.getElementById('adminDeptFilterSelect');
    if (deptSel) {
        deptSel.value = "";
        if (typeof $ !== 'undefined' && $.fn.select2) $(deptSel).trigger('change.select2');
    }

    setLedgerQuickStatus('COMPLETED');
    onAdminDeptChange('');
}

// -------------------------------------------------------------
// DEPARTMENT & EMPLOYEE POPULATION FUNCTIONS (Matching team.php)
// -------------------------------------------------------------
function populateDepartmentDropdowns() {
    var adminDeptSelect = document.getElementById('adminDeptFilterSelect');
    var empDeptSelect = document.getElementById('empPortalDeptSelect');
    var ledgerDeptSelect = document.getElementById('ledgerDeptFilterSelect');

    var optionsHtml = '<option value="">- All Departments -</option>';
    departmentList.forEach(function(deptName) {
        optionsHtml += '<option value="' + deptName + '">' + deptName + '</option>';
    });

    if (adminDeptSelect) adminDeptSelect.innerHTML = optionsHtml;
    if (empDeptSelect) empDeptSelect.innerHTML = optionsHtml;
    if (ledgerDeptSelect) {
        ledgerDeptSelect.innerHTML = '<option value="ALL">All Departments</option>' + departmentList.map(function(d) {
            return '<option value="' + d + '">' + d + '</option>';
        }).join('');
    }

    refreshSelect2();
}

function populateEmployeeDropdowns(selectedDept, targetKeyToSelect) {
    var adminEmpSelect = document.getElementById('adminActiveEmpSelect');
    var empPortalSelect = document.getElementById('employeePortalProfileSelect');

    var filteredKeys = Object.keys(employeeDatabase).filter(function(key) {
        if (!selectedDept || selectedDept === '' || selectedDept === 'ALL') return true;
        var d = (employeeDatabase[key].dept || '').toLowerCase();
        var s = selectedDept.toLowerCase();
        if (s === 'design' && (d === 'design' || d === 'product design')) return true;
        if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) return true;
        if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) return true;
        return d === s;
    });

    var optionsHtml = '<option value="">- Select Employee -</option>';
    filteredKeys.forEach(function(key) {
        var emp = employeeDatabase[key];
        optionsHtml += '<option value="' + key + '">' + emp.name + ' (' + emp.id + ' - ' + emp.role + ')</option>';
    });

    if (adminEmpSelect) {
        adminEmpSelect.innerHTML = optionsHtml;
    }
    if (empPortalSelect) {
        empPortalSelect.innerHTML = optionsHtml;
    }

    // Determine which employee to select - do NOT force first employee if target is empty
    var keyToSelect = '';
    if (targetKeyToSelect && filteredKeys.indexOf(targetKeyToSelect) !== -1) {
        keyToSelect = targetKeyToSelect;
    }

    if (adminEmpSelect) {
        adminEmpSelect.value = keyToSelect;
        if (typeof $ !== 'undefined' && $(adminEmpSelect).data('select2')) {
            $(adminEmpSelect).val(keyToSelect).trigger('change.select2');
        }
    }
    if (empPortalSelect) {
        empPortalSelect.value = keyToSelect;
        if (typeof $ !== 'undefined' && $(empPortalSelect).data('select2')) {
            $(empPortalSelect).val(keyToSelect).trigger('change.select2');
        }
    }

    // Update count badge
    var countBadge = document.getElementById('adminDeptCountBadge');
    if (countBadge) {
        countBadge.textContent = (selectedDept ? selectedDept + ': ' : '') + filteredKeys.length + ' Employees';
    }

    refreshSelect2();

    return keyToSelect;
}

// When Department is changed in Admin Portal or Global Filter
function onAdminDeptChange(dept) {
    currentDeptFilter = dept;
    
    // Sync other dropdowns
    var adminDeptSelect = document.getElementById('adminDeptFilterSelect');
    if (adminDeptSelect && adminDeptSelect.value !== dept) {
        adminDeptSelect.value = dept;
        if (typeof $ !== 'undefined' && $.fn.select2) $(adminDeptSelect).trigger('change.select2');
    }

    var empDeptSelect = document.getElementById('empPortalDeptSelect');
    if (empDeptSelect && empDeptSelect.value !== dept) {
        empDeptSelect.value = dept;
        if (typeof $ !== 'undefined' && $.fn.select2) $(empDeptSelect).trigger('change.select2');
    }

    var ledgerDeptSelect = document.getElementById('ledgerDeptFilterSelect');
    if (ledgerDeptSelect) ledgerDeptSelect.value = dept || 'ALL';

    var selectedKey = populateEmployeeDropdowns(dept, currentEmpKey);
    if (selectedKey) {
        loadEmployeeData(selectedKey);
    } else {
        loadEmployeeData('');
    }
    renderMasterLedgerTable();
}

// When Department is changed in Employee Portal
function onEmpPortalDeptChange(dept) {
    onAdminDeptChange(dept);
}

// When Department is changed in Master Company Ledger
function onLedgerDeptFilterChange(dept) {
    onAdminDeptChange((dept === 'ALL') ? '' : dept);
}

// Helper: Calculate stage status for any employee profile
function getEmployeeAppraisalStatus(data) {
    if (data.hrApproved) {
        return {
            text: "Completed",
            badgeClass: "bg-success text-white",
            subtleBadgeClass: "bg-success-subtle text-success border border-success",
            statusKey: "completed",
            stageStep: 5
        };
    } else if (data.mgrApproved) {
        return {
            text: "Pending HR Review",
            badgeClass: "text-white",
            badgeStyle: "background:#7c3aed;",
            subtleBadgeClass: "border",
            subtleStyle: "background:#f3e8ff; color:#7c3aed; border-color:#d8b4fe;",
            statusKey: "pending_hr",
            stageStep: 4
        };
    } else if (data.tlApproved) {
        return {
            text: "Pending Manager Decision",
            badgeClass: "bg-warning text-dark",
            subtleBadgeClass: "bg-warning-subtle text-warning border border-warning",
            statusKey: "pending_mgr",
            stageStep: 3
        };
    } else {
        return {
            text: "Pending TL Review",
            badgeClass: "bg-secondary text-white",
            subtleBadgeClass: "bg-secondary-subtle text-secondary border border-secondary",
            statusKey: "pending_tl",
            stageStep: 2
        };
    }
}

// 1. Switch Top-Level Portal (Employee vs Admin vs Overall Ledger)
function switchMainPortal(portal) {
    var btnEmp = document.getElementById('btnPortalEmployee');
    var btnAdmin = document.getElementById('btnPortalAdmin');
    var btnLedger = document.getElementById('btnPortalLedger');
    var secEmp = document.getElementById('portalEmployeeSection');
    var secAdmin = document.getElementById('portalAdminSection');
    var secLedger = document.getElementById('portalLedgerSection');

    if (btnEmp) btnEmp.classList.remove('active');
    if (btnAdmin) btnAdmin.classList.remove('active');
    if (btnLedger) btnLedger.classList.remove('active');

    if (secEmp) secEmp.classList.add('d-none');
    if (secAdmin) secAdmin.classList.add('d-none');
    if (secLedger) secLedger.classList.add('d-none');

    if (portal === 'employee') {
        if (btnEmp) btnEmp.classList.add('active');
        if (secEmp) secEmp.classList.remove('d-none');
    } else if (portal === 'admin') {
        if (btnAdmin) btnAdmin.classList.add('active');
        if (secAdmin) secAdmin.classList.remove('d-none');
        renderQuickEmpPills();
    } else if (portal === 'ledger') {
        if (btnLedger) btnLedger.classList.add('active');
        if (secLedger) secLedger.classList.remove('d-none');
        setLedgerQuickStatus('COMPLETED');
    }
}

// 1.1 Switch Employee Stage Panes (Stage 1 to Stage 5)
function switchEmpStage(stageNum) {
    activeEmpStage = stageNum;
    for (var i = 1; i <= 5; i++) {
        var stepEl = document.getElementById('empStep' + i);
        var paneEl = document.getElementById('empStagePane' + i);
        if (stepEl) {
            if (i === stageNum) {
                stepEl.classList.add('selected-step');
            } else {
                stepEl.classList.remove('selected-step');
            }
        }
        if (paneEl) {
            if (i === stageNum) {
                paneEl.classList.remove('d-none');
            } else {
                paneEl.classList.add('d-none');
            }
        }
    }

    var titles = {
        1: "Stage 1: Employee Self-Appraisal Form",
        2: "Stage 2: Team Lead (TL) Review & Rating Status",
        3: "Stage 3: Executive Manager Final Decision & Reply Status",
        4: "Stage 4: HR Department Policy & Increment Check Status",
        5: "Stage 5: Official Performance Appraisal Scorecard"
    };
    var subs = {
        1: "Fill and submit your self-appraisal details below. The approval progress is shown in the lifecycle stepper above.",
        2: "View the evaluation score, increment recommendation, and feedback from your Team Lead.",
        3: "View the Executive Manager's final rating and personalized recognition reply message.",
        4: "View HR policy verification, increment endorsement, and final approval.",
        5: "Official merit scorecard certificate awarded upon completion of all appraisal stages."
    };

    var titleEl = document.getElementById('empHubTitle');
    var subEl = document.getElementById('empHubSub');
    if (titleEl) titleEl.textContent = titles[stageNum] || titles[1];
    if (subEl) subEl.textContent = subs[stageNum] || subs[1];
}

// 2. Switch Admin Sub-Tabs (TL vs Manager vs HR vs All)
function switchAdminSubtab(tab) {
    var tabs = ['tl', 'hr', 'mgr', 'all'];
    tabs.forEach(function(t) {
        var btn = document.getElementById('subtabBtn' + capitalizeStr(t));
        var content = document.getElementById('adminSub' + capitalizeStr(t));
        if (btn) btn.classList.remove('active');
        if (content) content.classList.add('d-none');
    });

    var activeBtn = document.getElementById('subtabBtn' + capitalizeStr(tab));
    var activeContent = document.getElementById('adminSub' + capitalizeStr(tab));
    if (activeBtn) activeBtn.classList.add('active');
    if (activeContent) activeContent.classList.remove('d-none');

    if (tab === 'all') {
        renderMasterLedgerTable();
    }
}

function capitalizeStr(str) {
    if (str === 'tl') return 'TL';
    if (str === 'hr') return 'HR';
    if (str === 'mgr') return 'Mgr';
    if (str === 'all') return 'All';
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Reset Employee Self Form for new blank input
function resetEmpSelfForm() {
    currentEmpKey = '';
    
    // Header status in stepper
    var stepperName = document.getElementById('empStepperName');
    if (stepperName) stepperName.textContent = 'Fill New Self-Appraisal Form';
    var statusPill = document.getElementById('empPortalStatusPill');
    if (statusPill) {
        statusPill.textContent = 'Stage 1: Fill Form';
        statusPill.className = 'badge bg-success-subtle text-success border border-success px-3 py-1.5 fw-bold';
    }

    // Reset Form Fields
    var fIds = ['p1EmpId', 'p1EmpName', 'p1EmpEmail', 'p1EmpDept', 'p1EmpRole', 'p1EmpTL', 'p1EmpProjects', 'p1EmpTools', 'p1EmpSummary', 'p1EmpAchievements', 'p1EmpCerts'];
    fIds.forEach(function(id) {
        var el = document.getElementById(id);
        if (el) el.value = '';
    });
    var ratingEl = document.getElementById('p1EmpRating');
    if (ratingEl) ratingEl.value = '4.5';

    // Reset Stage Progress Stepper
    var step1 = document.getElementById('empStep1');
    if (step1) step1.className = 'journey-step-item active selected-step';
    var sub1 = document.getElementById('empSub1');
    if (sub1) sub1.textContent = 'Fill & Submit Form';

    for (var i = 2; i <= 5; i++) {
        var step = document.getElementById('empStep' + i);
        var sub = document.getElementById('empSub' + i);
        var conn = document.getElementById('empConn' + (i - 1));
        if (step) step.className = 'journey-step-item';
        if (sub) sub.textContent = (i === 2 ? 'Pending Submission' : 'Locked');
        if (conn) conn.classList.remove('active');
    }

    // Reset Stepper Panes to Stage 1
    switchEmpStage(1);

    // Sync admin dropdown if needed
    var adminSelect = document.getElementById('adminActiveEmpSelect');
    if (adminSelect && adminSelect.value !== '') {
        adminSelect.value = '';
        if (typeof $ !== 'undefined' && $(adminSelect).data('select2')) $(adminSelect).trigger('change.select2');
    }
}

// 3. Load Data for Selected Employee
function loadEmployeeData(key) {
    if (!key || key === '' || !employeeDatabase[key]) {
        resetEmpSelfForm();
        return;
    }

    currentEmpKey = key;
    var data = employeeDatabase[key];

    // Sync dropdowns
    var empSelect = document.getElementById('employeePortalProfileSelect');
    if (empSelect && empSelect.value !== key) {
        empSelect.value = key;
        if (typeof $ !== 'undefined' && $(empSelect).data('select2')) $(empSelect).trigger('change.select2');
    }
    var adminSelect = document.getElementById('adminActiveEmpSelect');
    if (adminSelect && adminSelect.value !== key) {
        adminSelect.value = key;
        if (typeof $ !== 'undefined' && $(adminSelect).data('select2')) $(adminSelect).trigger('change.select2');
    }

    // Admin Executive Header Preview Block
    var adminActiveBadge = document.getElementById('adminActiveEmpBadge');
    if (adminActiveBadge) adminActiveBadge.textContent = data.name;

    var adminAvatar = document.getElementById('adminActiveEmpAvatar');
    if (adminAvatar) adminAvatar.textContent = data.name.charAt(0).toUpperCase();

    var adminIdBadge = document.getElementById('adminActiveEmpIdBadge');
    if (adminIdBadge) adminIdBadge.textContent = data.id;

    var adminRoleMeta = document.getElementById('adminActiveEmpRoleMeta');
    if (adminRoleMeta) adminRoleMeta.textContent = data.role;

    var adminDeptMeta = document.getElementById('adminActiveEmpDeptMeta');
    if (adminDeptMeta) adminDeptMeta.textContent = data.dept;

    var statusObj = getEmployeeAppraisalStatus(data);
    var pipelineBadge = document.getElementById('adminEmpPipelineBadge');
    if (pipelineBadge) {
        pipelineBadge.textContent = 'Status: ' + statusObj.text;
        pipelineBadge.className = 'badge px-3 py-1.5 fw-bold ' + (statusObj.badgeClass || '');
        if (statusObj.badgeStyle) pipelineBadge.style = statusObj.badgeStyle;
        else pipelineBadge.style = '';
    }

    // Stage 1 Employee Portal Form
    document.getElementById('empStepperName').textContent = data.name + ' (' + data.id + ')';
    document.getElementById('p1EmpId').value = data.id;
    document.getElementById('p1EmpName').value = data.name;
    document.getElementById('p1EmpEmail').value = data.email;
    document.getElementById('p1EmpDept').value = data.dept;
    document.getElementById('p1EmpRole').value = data.role;
    document.getElementById('p1EmpTL').value = data.tl;
    document.getElementById('p1EmpProjects').value = data.projects || '';
    document.getElementById('p1EmpTools').value = data.tools || '';
    document.getElementById('p1EmpSummary').value = data.summary || '';
    document.getElementById('p1EmpAchievements').value = data.achievements || '';
    document.getElementById('p1EmpRating').value = data.rating || '4.5';
    document.getElementById('p1EmpCerts').value = data.certs || '';

    // Stage 2 Employee View Pane (TL)
    document.getElementById('empViewTlName').textContent = data.tl;
    document.getElementById('empViewTlRating').textContent = (data.tlRating || '4.6') + ' / 5.0';
    document.getElementById('empViewTlHike').textContent = data.tlHike || '15%';
    document.getElementById('empViewTlPromo').textContent = data.tlPromo || 'Promoted';
    document.getElementById('empViewTlFeedback').textContent = '"' + (data.tlFeedback || 'Exemplary performance.') + '"';

    // Stage 3 Employee View Pane (Manager)
    document.getElementById('empViewMgrRating').textContent = (data.mgrRating || '4.8') + ' / 5.0';
    document.getElementById('empViewMgrHike').textContent = (data.mgrHike || data.tlHike || '15%') + ' Merit Hike';
    document.getElementById('empViewMgrReply').textContent = '"' + (data.mgrReply || 'Good! Outstanding performance.') + '"';

    // Stage 4 Employee View Pane (HR)
    document.getElementById('empViewHrRating').textContent = (data.hrRating || '4.8') + ' / 5.0';
    document.getElementById('empViewHrHike').textContent = data.hrHike || '15%';
    document.getElementById('empViewHrPromo').textContent = data.hrPromo || 'Promoted';
    document.getElementById('empViewHrComments').textContent = '"' + (data.hrComments || 'Performance aligns with annual merit budget.') + '"';

    // Stage 5 Employee View Pane (Scorecard)
    var empFinalScore = data.hrApproved ? data.hrRating : (data.mgrApproved ? data.mgrRating : (data.tlApproved ? data.tlRating : data.rating));
    document.getElementById('empViewScEmpName').textContent = data.name;
    document.getElementById('empViewScEmpRole').textContent = data.role;
    document.getElementById('empViewScEmpDept').textContent = data.dept;
    document.getElementById('empViewScScore1').textContent = data.rating ? (data.rating + ' / 5.0') : '--';
    document.getElementById('empViewScScore2').textContent = data.tlApproved ? (data.tlRating + ' / 5.0') : '--';
    document.getElementById('empViewScScore3').textContent = data.mgrApproved ? (data.mgrRating + ' / 5.0') : '--';
    document.getElementById('empViewScScore4').textContent = data.hrApproved ? (data.hrRating + ' / 5.0') : '--';
    document.getElementById('empViewScReply').textContent = '"' + (data.mgrReply || 'Good! Outstanding performance.') + '"';
    document.getElementById('empViewScHike').textContent = (data.hrHike || data.mgrHike || '15%') + ' Annual Merit Hike';
    document.getElementById('empViewScPromo').textContent = data.hrApproved ? (data.hrPromo || data.tlPromo || 'Promoted') : 'Pending HR Final Approval';

    // -------------------------------------------------------------
    // ADMIN PORTAL FORM POPULATION FOR SELECTED EMPLOYEE
    // -------------------------------------------------------------

    // A. Team Lead (Stage 2) Admin Desk
    document.getElementById('admTlEmpName').textContent = data.name;
    document.getElementById('admTlEmpMeta').textContent = ' (' + data.role + ' - ' + data.dept + ')';
    document.getElementById('admTlEmpScore').textContent = 'Emp Self-Rating: ' + data.rating + ' / 5.0';
    document.getElementById('admTlEmpSummary').textContent = data.summary;
    document.getElementById('admTlEmpAch').textContent = data.achievements;
    document.getElementById('admTlEmpProjects').textContent = data.projects || 'N/A';
    document.getElementById('admTlEmpTools').textContent = data.tools || 'N/A';

    var tlRatingSel = document.getElementById('admTlRating');
    if (tlRatingSel) {
        if (data.tlRating) tlRatingSel.value = data.tlRating;
        else tlRatingSel.value = "4.6";
    }
    document.getElementById('admTlHike').value = data.tlHike || '15%';
    document.getElementById('admTlPromo').value = data.tlPromo || ('Promoted to Lead ' + data.role);
    document.getElementById('admTlFeedback').value = data.tlFeedback || ('Demonstrated strong technical ownership and achieved all key quarterly deliverables.');

    var tlBanner = document.getElementById('admTlStatusBanner');
    var tlBannerTitle = document.getElementById('admTlBannerTitle');
    var tlBannerSub = document.getElementById('admTlBannerSub');
    var tlBannerBadge = document.getElementById('admTlBannerBadge');
    var tlSubmitBtn = document.getElementById('admTlSubmitBtn');

    if (data.tlApproved) {
        tlBanner.className = 'alert alert-success d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border-success';
        tlBannerTitle.textContent = 'Team Lead Review Completed & Approved';
        tlBannerSub.textContent = 'Evaluated and forwarded to Manager by ' + data.tl + ' with rating ' + data.tlRating + '/5.0.';
        tlBannerBadge.className = 'badge bg-success text-white px-3 py-1.5 fw-bold';
        tlBannerBadge.textContent = 'TL Approved';
        tlSubmitBtn.innerHTML = '<i class="bi bi-check-all me-1"></i> Update & Re-Approve TL Evaluation';
    } else {
        tlBanner.className = 'alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        tlBannerTitle.textContent = 'Awaiting Team Lead Review & Rating';
        tlBannerSub.textContent = 'Please review employee self-score and assign official Team Lead ratings.';
        tlBannerBadge.className = 'badge bg-warning text-dark px-3 py-1.5 fw-bold';
        tlBannerBadge.textContent = 'Pending TL Action';
        tlSubmitBtn.innerHTML = '<i class="bi bi-check-circle me-1"></i> Accept & Approve as Team Lead (Forward to Manager) &rarr;';
    }

    // B. Executive Manager (Stage 3) Admin Desk
    document.getElementById('admMgrEmpName').textContent = data.name;
    document.getElementById('admMgrEmpMeta').textContent = ' (' + data.role + ' - ' + data.dept + ')';
    document.getElementById('admMgrEmpScore').textContent = data.rating + ' / 5.0';
    document.getElementById('admMgrEmpSummary').textContent = data.summary || 'N/A';
    document.getElementById('admMgrTLScore').textContent = data.tlApproved ? ('TL Score: ' + data.tlRating + ' / 5.0') : 'Pending TL';
    document.getElementById('admMgrTLFeedback').textContent = data.tlApproved ? data.tlFeedback : 'Awaiting TL review submission';

    var mgrRatingSel = document.getElementById('admMgrRating');
    if (mgrRatingSel) {
        if (data.mgrRating) mgrRatingSel.value = data.mgrRating;
        else mgrRatingSel.value = data.tlRating || "4.8";
    }
    document.getElementById('admMgrHike').value = data.mgrHike || data.tlHike || '15%';
    document.getElementById('admMgrReply').value = data.mgrReply || ('Good! Outstanding contributions and dedication. Approved ' + (data.mgrHike || '15%') + ' merit hike.');

    var mgrBanner = document.getElementById('admMgrStatusBanner');
    var mgrBannerTitle = document.getElementById('admMgrBannerTitle');
    var mgrBannerSub = document.getElementById('admMgrBannerSub');
    var mgrBannerBadge = document.getElementById('admMgrBannerBadge');
    var mgrSubmitBtn = document.getElementById('admMgrSubmitBtn');

    if (data.mgrApproved) {
        mgrBanner.className = 'alert alert-success d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border-success';
        mgrBannerTitle.textContent = 'Executive Manager Decision & Signoff Completed';
        mgrBannerSub.textContent = 'Evaluated and forwarded to HR Department for final verification.';
        mgrBannerBadge.className = 'badge bg-success text-white px-3 py-1.5 fw-bold';
        mgrBannerBadge.textContent = 'Manager Signed Off';
        mgrSubmitBtn.innerHTML = '<i class="bi bi-check-all me-1"></i> Update Manager Signoff & Reply';
    } else if (data.tlApproved) {
        mgrBanner.className = 'alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        mgrBannerTitle.textContent = 'Awaiting Executive Manager Signoff & Reply';
        mgrBannerSub.textContent = 'TL evaluation complete. Manager signoff required to advance to HR.';
        mgrBannerBadge.className = 'badge bg-warning text-dark px-3 py-1.5 fw-bold';
        mgrBannerBadge.textContent = 'Ready for Manager Signoff';
        mgrSubmitBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Accept & Signoff as Manager (Forward to HR) &rarr;';
    } else {
        mgrBanner.className = 'alert alert-secondary d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        mgrBannerTitle.textContent = 'Stage 2 (TL Review) Still Incomplete';
        mgrBannerSub.textContent = 'Team Lead must submit Stage 2 evaluation before Manager signoff.';
        mgrBannerBadge.className = 'badge bg-secondary text-white px-3 py-1.5 fw-bold';
        mgrBannerBadge.textContent = 'Waiting on TL';
        mgrSubmitBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Accept & Signoff as Manager (Forward to HR) &rarr;';
    }

    // C. HR Department (Stage 4) Admin Desk
    document.getElementById('admHrEmpName').textContent = data.name;
    document.getElementById('admHrEmpMeta').textContent = ' (' + data.role + ' - ' + data.dept + ')';
    document.getElementById('admHrEmpScore').textContent = data.rating + ' / 5.0';
    document.getElementById('admHrEmpSummary').textContent = data.summary || 'N/A';
    document.getElementById('admHrTLScore').textContent = data.tlApproved ? ('TL Score: ' + data.tlRating + ' / 5.0') : 'Pending TL';
    document.getElementById('admHrTLFeedback').textContent = data.tlApproved ? data.tlFeedback : 'Awaiting TL review';
    document.getElementById('admHrMgrScore').textContent = data.mgrApproved ? ('Mgr Score: ' + data.mgrRating + ' / 5.0') : 'Pending Manager';
    document.getElementById('admHrMgrReply').textContent = data.mgrApproved ? ('"' + data.mgrReply + '"') : 'Awaiting Manager Signoff';

    var hrRatingSel = document.getElementById('admHrRating');
    if (hrRatingSel) {
        if (data.hrRating) hrRatingSel.value = data.hrRating;
        else hrRatingSel.value = data.mgrRating || data.tlRating || "4.8";
    }
    document.getElementById('admHrHike').value = data.hrHike || data.mgrHike || data.tlHike || '15%';
    document.getElementById('admHrPromo').value = data.hrPromo || data.tlPromo || ('Promoted to Lead ' + data.role);
    document.getElementById('admHrComments').value = data.hrComments || ('Performance verified with project stakeholders. Proposed increment aligns with annual merit budget.');

    var hrBanner = document.getElementById('admHrStatusBanner');
    var hrBannerTitle = document.getElementById('admHrBannerTitle');
    var hrBannerSub = document.getElementById('admHrBannerSub');
    var hrBannerBadge = document.getElementById('admHrBannerBadge');
    var hrSubmitBtn = document.getElementById('admHrSubmitBtn');

    if (data.hrApproved) {
        hrBanner.className = 'alert alert-success d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border-success';
        hrBannerTitle.textContent = 'HR Department Verification & Final Approval Complete';
        hrBannerSub.textContent = 'Appraisal cycle completed! Official Scorecard Certificate is active.';
        hrBannerBadge.className = 'badge text-white px-3 py-1.5 fw-bold';
        hrBannerBadge.style = 'background:#7c3aed;';
        hrBannerBadge.textContent = 'HR Approved';
        hrSubmitBtn.innerHTML = '<i class="bi bi-check-all me-1"></i> Update & Re-Approve HR Verification';
    } else if (data.mgrApproved) {
        hrBanner.className = 'alert alert-warning d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        hrBannerTitle.textContent = 'Awaiting HR Verification & Final Approval';
        hrBannerSub.textContent = 'Manager signoff complete. HR approval required to complete appraisal.';
        hrBannerBadge.className = 'badge bg-warning text-dark px-3 py-1.5 fw-bold';
        hrBannerBadge.style = '';
        hrBannerBadge.textContent = 'Ready for HR Approval';
        hrSubmitBtn.innerHTML = '<i class="bi bi-shield-check me-1"></i> Confirm Final Approval as HR (Complete Appraisal) &rarr;';
    } else {
        hrBanner.className = 'alert alert-secondary d-flex align-items-center justify-content-between p-3 mb-4 rounded-3 border';
        hrBannerTitle.textContent = 'Prior Stages Pending (Waiting for Manager)';
        hrBannerSub.textContent = 'Manager must sign off before HR final approval.';
        hrBannerBadge.className = 'badge bg-secondary text-white px-3 py-1.5 fw-bold';
        hrBannerBadge.style = '';
        hrBannerBadge.textContent = 'Waiting on Manager';
        hrSubmitBtn.innerHTML = '<i class="bi bi-shield-check me-1"></i> Confirm Final Approval as HR (Complete Appraisal) &rarr;';
    }

    // D. Scorecard Modal
    var modalScFinal = document.getElementById('modalScFinalScore');
    if (modalScFinal) modalScFinal.textContent = 'Final Score: ' + empFinalScore + ' / 5.0';

    document.getElementById('modalScEmpName').textContent = data.name;
    document.getElementById('modalScEmpRole').textContent = data.role;
    document.getElementById('modalScEmpDept').textContent = data.dept;
    document.getElementById('modalScScore1').textContent = data.rating ? (data.rating + ' / 5.0') : '--';
    document.getElementById('modalScScore2').textContent = data.tlApproved ? (data.tlRating + ' / 5.0') : '--';
    document.getElementById('modalScScore3').textContent = data.mgrApproved ? (data.mgrRating + ' / 5.0') : '--';
    document.getElementById('modalScScore4').textContent = data.hrApproved ? (data.hrRating + ' / 5.0') : '--';
    document.getElementById('modalScManagerReply').textContent = '"' + (data.mgrReply || 'Good! Outstanding performance.') + '"';
    document.getElementById('modalScHike').textContent = (data.hrHike || data.mgrHike || data.tlHike || '15%') + ' Annual Merit Hike';
    document.getElementById('modalScPromo').textContent = data.hrApproved ? (data.hrPromo || data.tlPromo || 'Promoted') : 'Pending HR Final Approval';

    // Update Quick Select Pills Highlight
    renderQuickEmpPills();

    // Update 5-Step Progress Stepper in Employee Portal
    updateEmployeeStepper(data);
}

// 4. Update 5-Step Stepper in Employee Portal
function updateEmployeeStepper(data) {
    // Stage 1 (Self)
    document.getElementById('empStep1').className = 'journey-step-item completed-pass' + (activeEmpStage === 1 ? ' selected-step' : '');
    document.getElementById('empSub1').textContent = 'Submitted (' + data.rating + '/5.0)';

    // Stage 2 (TL)
    if (data.tlApproved) {
        document.getElementById('empConn1').classList.add('active');
        document.getElementById('empStep2').className = 'journey-step-item completed-pass' + (activeEmpStage === 2 ? ' selected-step' : '');
        document.getElementById('empSub2').textContent = 'Approved (' + data.tlRating + '/5.0)';
        document.getElementById('empStage2ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage2PendingBox').classList.add('d-none');
    } else {
        document.getElementById('empConn1').classList.remove('active');
        document.getElementById('empStep2').className = 'journey-step-item active' + (activeEmpStage === 2 ? ' selected-step' : '');
        document.getElementById('empSub2').textContent = 'In TL Review';
        document.getElementById('empStage2ApprovedBox').classList.add('d-none');
        document.getElementById('empStage2PendingBox').classList.remove('d-none');
    }

    // Stage 3 (Manager)
    if (data.mgrApproved) {
        document.getElementById('empConn2').classList.add('active');
        document.getElementById('empStep3').className = 'journey-step-item completed-pass' + (activeEmpStage === 3 ? ' selected-step' : '');
        document.getElementById('empSub3').textContent = 'Signed Off (' + data.mgrRating + '/5.0)';
        document.getElementById('empStage3ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage3PendingBox').classList.add('d-none');
    } else {
        document.getElementById('empConn2').classList.remove('active');
        document.getElementById('empStep3').className = ('journey-step-item' + (data.tlApproved ? ' active' : '')) + (activeEmpStage === 3 ? ' selected-step' : '');
        document.getElementById('empSub3').textContent = data.tlApproved ? 'In Manager Review' : 'Waiting for TL';
        document.getElementById('empStage3ApprovedBox').classList.add('d-none');
        document.getElementById('empStage3PendingBox').classList.remove('d-none');
    }

    // Stage 4 (HR)
    if (data.hrApproved) {
        document.getElementById('empConn3').classList.add('active');
        document.getElementById('empStep4').className = 'journey-step-item completed-pass' + (activeEmpStage === 4 ? ' selected-step' : '');
        document.getElementById('empSub4').textContent = 'Approved & Verified';
        document.getElementById('empStage4ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage4PendingBox').classList.add('d-none');

        // Stage 5 (Scorecard)
        document.getElementById('empConn4').classList.add('active');
        document.getElementById('empStep5').className = 'journey-step-item completed-pass' + (activeEmpStage === 5 ? ' selected-step' : '');
        document.getElementById('empSub5').textContent = 'Scorecard Ready';
        document.getElementById('empStage5ApprovedBox').classList.remove('d-none');
        document.getElementById('empStage5LockedBox').classList.add('d-none');

        document.getElementById('empPortalStatusPill').textContent = 'Appraisal Completed';
        document.getElementById('empPortalStatusPill').className = 'badge bg-success px-3 py-1.5 fw-bold';
    } else {
        document.getElementById('empConn3').classList.remove('active');
        document.getElementById('empConn4').classList.remove('active');
        document.getElementById('empStep4').className = ('journey-step-item' + (data.mgrApproved ? ' active' : '')) + (activeEmpStage === 4 ? ' selected-step' : '');
        document.getElementById('empSub4').textContent = data.mgrApproved ? 'Pending HR Approval' : 'Waiting for Manager';
        document.getElementById('empStage4ApprovedBox').classList.add('d-none');
        document.getElementById('empStage4PendingBox').classList.remove('d-none');

        document.getElementById('empStep5').className = 'journey-step-item' + (activeEmpStage === 5 ? ' selected-step' : '');
        document.getElementById('empSub5').textContent = 'Locked';
        document.getElementById('empStage5ApprovedBox').classList.add('d-none');
        document.getElementById('empStage5LockedBox').classList.remove('d-none');

        document.getElementById('empPortalStatusPill').textContent = 'In Progress';
        document.getElementById('empPortalStatusPill').className = 'badge bg-success-subtle text-success border border-success px-3 py-1.5 fw-bold';
    }
}

// 5. Employee Submits Form in Employee Portal
function submitEmpSelfReview() {
    var empId = document.getElementById('p1EmpId').value.trim() || ('EMP-' + Math.floor(1000 + Math.random() * 9000));
    var empName = document.getElementById('p1EmpName').value.trim() || 'New Employee';
    var empEmail = document.getElementById('p1EmpEmail').value.trim() || (empName.toLowerCase().replace(/\s+/g, '.') + '@gharuda.com');
    var empDept = document.getElementById('p1EmpDept').value || 'Engineering';
    var empRole = document.getElementById('p1EmpRole').value.trim() || 'Software Engineer';
    var empTL = document.getElementById('p1EmpTL').value.trim() || 'Rajesh V (Tech Lead)';
    var projects = document.getElementById('p1EmpProjects').value.trim();
    var tools = document.getElementById('p1EmpTools').value.trim();
    var summary = document.getElementById('p1EmpSummary').value.trim();
    var achievements = document.getElementById('p1EmpAchievements').value.trim();
    var rating = document.getElementById('p1EmpRating').value;
    var certs = document.getElementById('p1EmpCerts').value.trim();

    var key = currentEmpKey;
    if (!key || !employeeDatabase[key]) {
        // Create new employee record
        key = empName.toUpperCase().replace(/[^A-Z0-9]/g, '_');
        employeeDatabase[key] = {
            id: empId,
            name: empName,
            email: empEmail,
            dept: empDept,
            role: empRole,
            tl: empTL,
            cycleType: currentFrequencyFilter !== 'ALL' ? currentFrequencyFilter : 'Quarterly',
            cyclePeriod: currentPeriodFilter !== 'ALL' ? currentPeriodFilter : "Q3 (Oct-Dec '26)",
            projects: projects,
            tools: tools,
            summary: summary,
            achievements: achievements,
            rating: rating,
            certs: certs,
            tlApproved: false,
            tlRating: "4.6",
            tlHike: "15%",
            tlPromo: "Promoted to Senior " + empRole,
            tlFeedback: "Strong performance and good deliverables in current cycle.",
            mgrApproved: false,
            mgrRating: "4.6",
            mgrHike: "15%",
            mgrReply: "Good job!",
            hrApproved: false,
            hrRating: "4.6",
            hrHike: "15%",
            hrComments: "HR verification in progress."
        };
        currentEmpKey = key;
        populateEmployeeDropdowns(currentDeptFilter, key);
    } else {
        var data = employeeDatabase[key];
        data.id = empId;
        data.name = empName;
        data.email = empEmail;
        data.dept = empDept;
        data.role = empRole;
        data.tl = empTL;
        data.summary = summary;
        data.achievements = achievements;
        data.rating = rating;
        data.projects = projects;
        data.tools = tools;
        data.certs = certs;
    }

    showToastNotification('Submitted to Team Lead', 'Your self-appraisal for ' + empName + ' has been submitted and forwarded to ' + empTL + ' for Stage 2 review.');
    loadEmployeeData(key);
    renderMasterLedgerTable();
}

// 6. Admin Approvals
function processAdminTLApproval() {
    var data = employeeDatabase[currentEmpKey];
    data.tlApproved = true;
    data.tlRating = document.getElementById('admTlRating').value;
    data.tlHike = document.getElementById('admTlHike').value;
    data.tlPromo = document.getElementById('admTlPromo').value;
    data.tlFeedback = document.getElementById('admTlFeedback').value;

    showToastNotification('TL Approved: ' + data.name, 'Stage 2 approved with ' + data.tlRating + ' rating by Team Lead. Forwarded to Manager Hub.');
    loadEmployeeData(currentEmpKey);
    renderMasterLedgerTable();
    switchAdminSubtab('mgr');
}

function processAdminManagerSignoff() {
    var data = employeeDatabase[currentEmpKey];
    data.mgrApproved = true;
    data.mgrRating = document.getElementById('admMgrRating').value;
    data.mgrHike = document.getElementById('admMgrHike').value;
    data.mgrReply = document.getElementById('admMgrReply').value;

    showToastNotification('Manager Signed Off: ' + data.name, 'Stage 3 signed off by Manager with reply. Forwarded to HR Approval Hub.');
    loadEmployeeData(currentEmpKey);
    renderMasterLedgerTable();
    switchAdminSubtab('hr');
}

function processAdminHRApproval() {
    var data = employeeDatabase[currentEmpKey];
    data.hrApproved = true;
    data.hrRating = document.getElementById('admHrRating').value;
    data.hrHike = document.getElementById('admHrHike').value;
    data.hrPromo = document.getElementById('admHrPromo').value;
    data.hrComments = document.getElementById('admHrComments').value;

    showToastNotification('HR Approval Complete: ' + data.name, 'Appraisal fully completed! Scorecard Certificate published.');
    loadEmployeeData(currentEmpKey);
    renderMasterLedgerTable();
    switchAdminSubtab('all');
}

function setAdminMgrPreset(text) {
    document.getElementById('admMgrReply').value = text;
}

// 7. Master Ledger Table Renderer & KPI Stats Calculation
function renderMasterLedgerTable() {
    var tbodies = [
        document.getElementById('masterLedgerTableBody'),
        document.querySelector('#adminSubAll #masterLedgerTableBody')
    ];

    var searchVal = (document.getElementById('ledgerSearchInput') ? document.getElementById('ledgerSearchInput').value.toLowerCase().trim() : '');

    var allKeys = Object.keys(employeeDatabase);

    // Compute Global Status Counts for Pill Badges
    var countAll = 0;
    var countCompleted = 0;
    var countHr = 0;
    var countMgr = 0;
    var countTl = 0;

    allKeys.forEach(function(key) {
        var emp = employeeDatabase[key];
        
        // Match Department / Frequency / Period if selected
        if (currentDeptFilter && currentDeptFilter !== 'ALL' && currentDeptFilter !== '') {
            var d = (emp.dept || '').toLowerCase();
            var s = currentDeptFilter.toLowerCase();
            var deptMatches = false;
            if (s === 'design' && (d === 'design' || d === 'product design')) deptMatches = true;
            else if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) deptMatches = true;
            else if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) deptMatches = true;
            else if (d === s) deptMatches = true;
            if (!deptMatches) return;
        }

        if (currentFrequencyFilter && currentFrequencyFilter !== 'ALL') {
            if (emp.cycleType !== currentFrequencyFilter) return;
        }

        if (currentPeriodFilter && currentPeriodFilter !== 'ALL') {
            if (emp.cyclePeriod !== currentPeriodFilter) return;
        }

        countAll++;
        if (emp.hrApproved) {
            countCompleted++;
        } else if (emp.mgrApproved) {
            countHr++;
        } else if (emp.tlApproved) {
            countMgr++;
        } else {
            countTl++;
        }
    });

    // Update pill badge count labels
    var elCountAll = document.getElementById('countPillAll');
    if (elCountAll) elCountAll.textContent = countAll;
    var elCountComp = document.getElementById('countPillCompleted');
    if (elCountComp) elCountComp.textContent = countCompleted;
    var elCountHr = document.getElementById('countPillHr');
    if (elCountHr) elCountHr.textContent = countHr;
    var elCountMgr = document.getElementById('countPillMgr');
    if (elCountMgr) elCountMgr.textContent = countMgr;
    var elCountTl = document.getElementById('countPillTl');
    if (elCountTl) elCountTl.textContent = countTl;

    // Filter Keys for Table Rendering
    var filteredKeys = allKeys.filter(function(key) {
        var emp = employeeDatabase[key];
        
        // Department Filter
        if (currentDeptFilter && currentDeptFilter !== 'ALL' && currentDeptFilter !== '') {
            var d = (emp.dept || '').toLowerCase();
            var s = currentDeptFilter.toLowerCase();
            var deptMatches = false;
            if (s === 'design' && (d === 'design' || d === 'product design')) deptMatches = true;
            else if (s === 'business' && (d === 'business' || d === 'sales & bd' || d === 'sales')) deptMatches = true;
            else if (s === 'ios dev' && (d === 'ios dev' || d === 'engineering')) deptMatches = true;
            else if (d === s) deptMatches = true;

            if (!deptMatches) return false;
        }

        // Frequency Filter
        if (currentFrequencyFilter && currentFrequencyFilter !== 'ALL') {
            if (emp.cycleType !== currentFrequencyFilter) return false;
        }

        // Period Filter
        if (currentPeriodFilter && currentPeriodFilter !== 'ALL') {
            if (emp.cyclePeriod !== currentPeriodFilter) return false;
        }

        // Status Filter
        if (currentStatusFilter && currentStatusFilter !== 'ALL') {
            if (currentStatusFilter === 'COMPLETED' && !emp.hrApproved) return false;
            if (currentStatusFilter === 'PENDING_HR' && (!emp.mgrApproved || emp.hrApproved)) return false;
            if (currentStatusFilter === 'PENDING_MGR' && (!emp.tlApproved || emp.mgrApproved)) return false;
            if (currentStatusFilter === 'PENDING_TL' && emp.tlApproved) return false;
        }

        // Search Filter
        if (searchVal) {
            var combined = (emp.name + ' ' + emp.id + ' ' + emp.email + ' ' + emp.role + ' ' + emp.dept + ' ' + (emp.mgrHike || emp.hrHike || '') + ' ' + (emp.tlPromo || '')).toLowerCase();
            if (combined.indexOf(searchVal) === -1) return false;
        }

        return true;
    });

    // Update KPI Metric Cards
    var totalScoreSum = 0;
    var completedSum = 0;

    filteredKeys.forEach(function(k) {
        var e = employeeDatabase[k];
        if (e.hrApproved) completedSum++;
        totalScoreSum += parseFloat(e.hrApproved ? e.hrRating : (e.mgrApproved ? e.mgrRating : (e.tlApproved ? e.tlRating : e.rating)));
    });

    var avgRating = filteredKeys.length > 0 ? (totalScoreSum / filteredKeys.length).toFixed(2) : '0.00';

    var kpiTotal = document.getElementById('ledgerKpiTotal');
    if (kpiTotal) kpiTotal.textContent = filteredKeys.length + ' Employees';

    var kpiCompleted = document.getElementById('ledgerKpiCompleted');
    if (kpiCompleted) kpiCompleted.textContent = completedSum + ' Completed';

    var kpiPending = document.getElementById('ledgerKpiPending');
    if (kpiPending) kpiPending.textContent = (filteredKeys.length - completedSum) + ' In Progress';

    var kpiAvg = document.getElementById('ledgerKpiAvgRating');
    if (kpiAvg) kpiAvg.textContent = avgRating + ' / 5.0';

    var totalBadge = document.getElementById('ledgerTotalCountBadge');
    if (totalBadge) totalBadge.textContent = filteredKeys.length + ' Records';

    var filteredCountText = document.getElementById('ledgerFilteredCountText');
    if (filteredCountText) filteredCountText.textContent = filteredKeys.length + ' Records';

    // Generate Table Rows
    var html = '';
    filteredKeys.forEach(function(key) {
        var emp = employeeDatabase[key];
        var st = getEmployeeAppraisalStatus(emp);
        var isCurrent = (key === currentEmpKey);

        var actionBtn = '';
        if (emp.hrApproved) {
            actionBtn = `
                <button class="btn btn-outline-success btn-sm fw-bold shadow-none text-nowrap" onclick="openScorecardForEmp('${key}')">
                    <i class="bi bi-award-fill me-1"></i>Scorecard
                </button>
                <button class="btn btn-light btn-sm text-dark border fw-semibold shadow-none text-nowrap" onclick="loadEmployeeData('${key}'); switchMainPortal('employee');" title="View Full Employee Form">
                    <i class="bi bi-eye"></i>
                </button>
            `;
        } else if (emp.mgrApproved) {
            actionBtn = `
                <button class="btn btn-sm text-white fw-bold shadow-none text-nowrap" style="background:#7c3aed;" onclick="reviewEmployeeAs('${key}', 'hr')">
                    <i class="bi bi-shield-check me-1"></i>Review as HR
                </button>
            `;
        } else if (emp.tlApproved) {
            actionBtn = `
                <button class="btn btn-warning btn-sm text-dark fw-bold shadow-none text-nowrap" onclick="reviewEmployeeAs('${key}', 'mgr')">
                    <i class="bi bi-pen me-1"></i>Signoff as Mgr
                </button>
            `;
        } else {
            actionBtn = `
                <button class="btn btn-success btn-sm fw-bold shadow-none text-nowrap" onclick="reviewEmployeeAs('${key}', 'tl')">
                    <i class="bi bi-person-check me-1"></i>Review as TL
                </button>
            `;
        }

        var avatarInitial = emp.name.charAt(0).toUpperCase();

        // Frequency Badge styling
        var cycleBadgeClass = 'badge-cycle-quarterly';
        var cycleLabel = emp.cycleType || 'Quarterly';
        if (cycleLabel === 'Monthly') cycleBadgeClass = 'badge-cycle-monthly';
        else if (cycleLabel === 'Half-Yearly') cycleBadgeClass = 'badge-cycle-halfyearly';
        else if (cycleLabel === 'Annual') cycleBadgeClass = 'badge-cycle-annual';

        var finalRating = emp.hrApproved ? emp.hrRating : (emp.mgrApproved ? emp.mgrRating : (emp.tlApproved ? emp.tlRating : emp.rating));
        var scoreNum = parseFloat(finalRating);
        var scoreBadgeClass = 'bg-success-subtle text-success border border-success';
        var scoreBadgeText = 'Outstanding';
        if (scoreNum >= 4.9) {
            scoreBadgeClass = 'bg-success text-white';
            scoreBadgeText = '★ Top 5%';
        } else if (scoreNum >= 4.7) {
            scoreBadgeClass = 'bg-success-subtle text-success border border-success';
            scoreBadgeText = 'Exceeded Goals';
        } else if (scoreNum >= 4.4) {
            scoreBadgeClass = 'bg-primary-subtle text-primary border border-primary';
            scoreBadgeText = 'Strong Performer';
        } else {
            scoreBadgeClass = 'bg-light text-dark border';
            scoreBadgeText = 'Met Expectations';
        }

        var hikeVal = emp.hrHike || emp.mgrHike || emp.tlHike || '15%';
        var promoVal = emp.tlPromo || ('Lead ' + emp.role);

        html += `
            <tr class="${isCurrent ? 'table-success-subtle' : ''}">
                <td class="ps-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="position-relative flex-shrink-0">
                            <div class="rounded-circle ${emp.hrApproved ? 'bg-success' : 'bg-secondary'} text-white fw-bold d-flex align-items-center justify-content-center" style="width:36px;height:36px;font-size:13px;">
                                ${avatarInitial}
                            </div>
                            ${emp.hrApproved ? '<span class="position-absolute bottom-0 end-0 p-1 bg-success border border-light rounded-circle" title="Appraisal Completed"></span>' : ''}
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-1.5">
                                <strong class="text-dark">${emp.name}</strong>
                                ${emp.hrApproved ? '<i class="bi bi-patch-check-fill text-success" title="Appraisal Awarded"></i>' : ''}
                            </div>
                            <div class="text-muted small" style="font-size:11.5px;">${emp.id} &bull; ${emp.email}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-bold text-dark" style="font-size:13px;">${emp.role}</div>
                    <div class="text-muted small mt-0.5"><span class="badge bg-light text-dark border">${emp.dept}</span></div>
                </td>
                <td>
                    <span class="badge ${cycleBadgeClass} px-2 py-0.5 fw-bold small text-nowrap mb-0.5">${cycleLabel}</span>
                    <div class="text-muted small fw-semibold" style="font-size:11px;">${emp.cyclePeriod || 'Q3 (Oct-Dec \'26)'}</div>
                </td>
                <td>
                    ${emp.hrApproved ? `
                        <span class="badge bg-success text-white px-2.5 py-1 fw-bold text-nowrap">
                            <i class="bi bi-award-fill me-1"></i>Appraisal Awarded
                        </span>
                        <div class="text-success small fw-semibold mt-0.5" style="font-size:10.5px;">
                            <i class="bi bi-check2-circle me-1"></i>Scorecard Issued
                        </div>
                    ` : `
                        <span class="badge ${st.subtleBadgeClass} px-2.5 py-1 fw-bold text-nowrap" style="${st.subtleStyle || ''}">${st.text}</span>
                    `}
                </td>
                <td>
                    <div class="d-flex align-items-center gap-1 mb-0.5">
                        <strong class="text-dark fs-6">${finalRating} / 5.0</strong>
                        <span class="badge ${scoreBadgeClass} px-1.5 py-0.5 fw-bold" style="font-size:10.5px;">${scoreBadgeText}</span>
                    </div>
                    <div class="text-muted small text-nowrap" style="font-size:11px;">
                        <span class="text-primary fw-bold" title="Employee Self">Emp: ${emp.rating}</span> &rarr;
                        <span class="${emp.tlApproved ? 'text-success fw-bold' : 'text-muted'}" title="Team Lead">TL: ${emp.tlApproved ? emp.tlRating : '--'}</span> &rarr;
                        <span class="${emp.mgrApproved ? 'text-warning fw-bold' : 'text-muted'}" title="Manager">Mgr: ${emp.mgrApproved ? emp.mgrRating : '--'}</span> &rarr;
                        <span style="${emp.hrApproved ? 'color:#7c3aed;font-weight:bold;' : 'color:#94a3b8;'}" title="HR">HR: ${emp.hrApproved ? emp.hrRating : '--'}</span>
                    </div>
                </td>
                <td>
                    <span class="badge bg-success text-white px-2 py-1 fw-bold fs-6">+${hikeVal} Hike</span>
                    <div class="fw-bold text-dark small mt-0.5 text-truncate" style="font-size:11.5px; max-width:160px;" title="${promoVal}">
                        <i class="bi bi-arrow-up-right-circle-fill text-success me-1"></i>${promoVal}
                    </div>
                    <div class="text-muted small" style="font-size:10px;">Effective: 01 Nov 2026</div>
                </td>
                <td>
                    ${emp.mgrApproved ? `
                        <div class="p-2 rounded bg-light border text-dark small fst-italic" style="font-size:11px; max-width:210px; line-height:1.35;" title="${emp.mgrReply}">
                            "${emp.mgrReply.substring(0, 48)}${emp.mgrReply.length > 48 ? '...' : ''}"
                        </div>
                    ` : `
                        <span class="text-muted small fst-italic">Pending manager review</span>
                    `}
                </td>
                <td class="text-end pe-3">
                    <div class="d-flex gap-1 justify-content-end align-items-center">
                        ${actionBtn}
                    </div>
                </td>
            </tr>
        `;
    });

    if (filteredKeys.length === 0) {
        html = `<tr><td colspan="8" class="text-center py-4 text-muted"><i class="bi bi-inbox fs-4 d-block mb-1 text-muted"></i>No employee appraisal records found matching selected filter criteria.</td></tr>`;
    }

    tbodies.forEach(function(tb) {
        if (tb) tb.innerHTML = html;
    });
}

// Jump directly to review a specific employee in a specific desk
function reviewEmployeeAs(key, desk) {
    loadEmployeeData(key);
    switchMainPortal('admin');
    switchAdminSubtab(desk);
    showToastNotification('Loaded ' + employeeDatabase[key].name, 'Switched to ' + capitalizeStr(desk) + ' Desk for appraisal evaluation.');
}

// Open Scorecard Certificate Modal directly for any employee
function openScorecardForEmp(key) {
    loadEmployeeData(key);
    new bootstrap.Modal(document.getElementById('scorecardCertificateModal')).show();
}

function openScorecardIfReady() {
    var data = employeeDatabase[currentEmpKey];
    if (data && data.hrApproved) {
        openScorecardForEmp(currentEmpKey);
    } else {
        showToastNotification('Scorecard Locked', 'The official scorecard certificate will unlock once the HR Department approves and completes the appraisal.');
    }
}

function openScorecardModalFromEmp() {
    loadEmployeeData(currentEmpKey);
    new bootstrap.Modal(document.getElementById('scorecardCertificateModal')).show();
}

function renderQuickEmpPills() {
    // Optional helper if quick pills exist
}

function showToastNotification(title, message) {
    var toast = document.createElement('div');
    toast.className = 'position-fixed bottom-0 end-0 p-3';
    toast.style.zIndex = '9999';
    toast.innerHTML = `
        <div class="toast show border-0 shadow-lg rounded-3" role="alert">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">${title}</strong>
                <small>Just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body bg-white text-dark small">
                ${message}
            </div>
        </div>
    `;
    document.body.appendChild(toast);
    setTimeout(function() { toast.remove(); }, 4000);
}
</script>
