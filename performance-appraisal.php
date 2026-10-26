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
<script src="./assets/js/pages/performance-appraisal.js?v=<?php echo time(); ?>"></script>
