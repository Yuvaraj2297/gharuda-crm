<?php
include 'header.php';
$preCompany = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
$preContact = isset($_GET['contact']) ? htmlspecialchars($_GET['contact']) : (isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '');
$prePhone   = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '';
$preEmail   = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$fromLead   = isset($_GET['from_lead']) ? htmlspecialchars($_GET['from_lead']) : '';
$todayFormatted = date('d-m-Y');
?>

<!-- Inline Styles for Customer Onboarding (Guaranteed Zero-Cache Enterprise Polish) -->
<style id="crmCustomerNewInlineStyles">
    .nl-crm-sheet {
        max-width: 1220px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    /* Horizontal Wireframe Label-Input Alignment Engine */
    .crm-field-row {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        margin-bottom: 12px !important;
        min-height: 38px !important;
        width: 100% !important;
    }
    .crm-field-row.align-items-start {
        align-items: flex-start !important;
    }
    .crm-field-label {
        flex: 0 0 160px !important;
        width: 160px !important;
        max-width: 160px !important;
        min-width: 160px !important;
        text-align: right !important;
        margin-bottom: 0 !important;
        padding-right: 14px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        color: #1e293b !important;
        line-height: 1.35 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: flex-end !important;
        gap: 2px !important;
    }
    .crm-field-label .req-star {
        color: #ef4444 !important;
        font-weight: 700 !important;
        margin-left: 1px !important;
    }
    .crm-field-label .crm-colon {
        color: #64748b !important;
        font-weight: 700 !important;
        margin-left: 2px !important;
    }
    .crm-field-control {
        flex: 1 1 auto !important;
        min-width: 0 !important;
        width: auto !important;
    }

    /* Form Inputs & Selects: 38px height, 4px radius, #c5c4d3 border */
    .nl-crm-sheet .form-control,
    .nl-crm-sheet .form-select {
        height: 38px !important;
        min-height: 38px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        color: #0f172a !important;
        background-color: #ffffff !important;
        border: 1px solid #c5c4d3 !important;
        border-radius: 4px !important;
        padding: 6px 12px !important;
        line-height: 1.4 !important;
        box-shadow: none !important;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
    }
    .nl-crm-sheet .form-select {
        background-position: right 0.75rem center !important;
        background-size: 12px 10px !important;
        padding-right: 2rem !important;
        cursor: pointer !important;
    }
    .nl-crm-sheet textarea.form-control {
        height: auto !important;
        min-height: 72px !important;
        padding: 8px 12px !important;
    }

    /* Focus States */
    .nl-crm-sheet .form-control:focus,
    .nl-crm-sheet .form-select:focus {
        border-color: #16a34a !important;
        box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15) !important;
        outline: none !important;
        background-color: #ffffff !important;
    }

    /* Required Red Indicator on Left Edge (Zoho CRM Standard) */
    .nl-crm-sheet .crm-required,
    .nl-crm-sheet .form-control[required],
    .nl-crm-sheet .form-select[required] {
        border-left: 3.5px solid #ef4444 !important;
    }

    /* Seamless Input Group Styling */
    .nl-crm-sheet .input-group {
        display: flex !important;
        flex-wrap: nowrap !important;
        position: relative !important;
        width: 100% !important;
        border-radius: 4px !important;
    }
    .nl-crm-sheet .input-group > :first-child:not(:last-child) {
        border-top-left-radius: 4px !important;
        border-bottom-left-radius: 4px !important;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
    .nl-crm-sheet .input-group > :last-child:not(:first-child) {
        border-top-right-radius: 4px !important;
        border-bottom-right-radius: 4px !important;
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }
    .nl-crm-sheet .input-group > .input-group-text,
    .nl-crm-sheet .input-group > .nl-addon-text,
    .nl-crm-sheet .input-group > .nl-currency-addon {
        background-color: #f8fafc !important;
        border: 1px solid #c5c4d3 !important;
        border-right: none !important;
        color: #475569 !important;
        font-size: 12.5px !important;
        font-weight: 600 !important;
        padding: 0 10px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
    }
    .nl-crm-sheet .input-group > input {
        border-left: 1px solid #c5c4d3 !important;
    }

    /* Section Dividers & Badges */
    .nl-crm-sheet .crm-section-divider {
        background: #f8fafc !important;
        border: 1px solid #e2e8f0 !important;
        border-left: 4px solid #16a34a !important;
        padding: 8px 16px !important;
        margin: 22px 0 16px 0 !important;
        border-radius: 4px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
    }
    .nl-crm-sheet .crm-section-title {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #0f172a !important;
        margin: 0 !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        letter-spacing: 0.3px !important;
        text-transform: uppercase !important;
    }
    .nl-crm-sheet .crm-section-badge {
        font-size: 11px !important;
        font-weight: 600 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
        background: #f0fdf4 !important;
        color: #16a34a !important;
        border: 1px solid #bbf7d0 !important;
    }

    /* Primary Save Buttons */
    .nl-crm-sheet .btn-save-customer,
    .btn-save-customer {
        background-color: #16a34a !important;
        border-color: #16a34a !important;
        color: #ffffff !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        padding: 7px 20px !important;
        border-radius: 4px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        transition: all 0.15s ease !important;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05) !important;
    }
    .nl-crm-sheet .btn-save-customer:hover,
    .btn-save-customer:hover {
        background-color: #15803d !important;
        border-color: #15803d !important;
        color: #ffffff !important;
        box-shadow: 0 2px 6px rgba(22, 163, 74, 0.25) !important;
    }

    /* Address Cards */
    .nl-address-box {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 16px;
    }
    .nl-address-box-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 10px;
        margin-bottom: 14px;
        border-bottom: 1px solid #f1f5f9;
    }

    @media (max-width: 991.98px) {
        .crm-field-row {
            flex-direction: column !important;
            align-items: flex-start !important;
            margin-bottom: 14px !important;
        }
        .crm-field-label {
            flex: 0 0 auto !important;
            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;
            text-align: left !important;
            padding-right: 0 !important;
            margin-bottom: 4px !important;
            justify-content: flex-start !important;
        }
        .crm-field-control {
            width: 100% !important;
        }
    }
</style>

<main class="container-fluid px-0 py-3 bg-light-subtle min-vh-100">
    <div class="nl-crm-sheet shadow-sm">
        <form id="customerNewForm" onsubmit="event.preventDefault(); submitNewCustomer();">

            <!-- Top Sticky Header Bar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-4 py-3 border-bottom bg-white sticky-top shadow-xs" style="z-index: 1020;">
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <a href="customers.php" class="text-decoration-none text-muted fw-medium font-13">
                        <i class="bi bi-arrow-left me-1"></i>Customers
                    </a>
                    <span class="text-muted">/</span>
                    <span class="fw-bold text-dark font-15">New Customer Onboarding</span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle font-11 ms-2">Standard Layout</span>
                    <?php if ($fromLead): ?>
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle font-11 ms-1">
                            <i class="bi bi-arrow-left-right me-1"></i>Converting Lead #<?php echo $fromLead; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="customers.php" class="btn btn-outline-secondary btn-sm px-3 fw-medium">Cancel</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 fw-medium" onclick="document.getElementById('customerNewForm').reset();">Reset</button>
                    <button type="submit" class="btn btn-save-customer btn-sm">
                        <i class="bi bi-check-lg"></i>Save Customer
                    </button>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-3 p-md-4 p-xl-4 bg-white">

                <!-- SECTION 1: Company & Tax Profile -->
                <div class="crm-section-divider mt-0">
                    <div class="crm-section-title">
                        <i class="bi bi-building text-primary fs-5"></i>
                        <span>Company &amp; Tax Profile</span>
                    </div>
                    <span class="crm-section-badge">Corporate Identity</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Left Column (4 Rows) -->
                    <div class="col-12 col-lg-6">
                        <!-- Row 1: Company / Account Name -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnCompany">
                                Company Name<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control crm-required" id="cnCompany" required placeholder="Registered company legal name" value="<?php echo $preCompany; ?>">
                            </div>
                        </div>

                        <!-- Row 2: Account Segment / Group -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnCategory">
                                Account Segment<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select crm-required" id="cnCategory" required>
                                    <option value="" selected>-None-</option>
                                    <option value="Enterprise Client" selected>Enterprise Client (A-Tier)</option>
                                    <option value="Key Corporate Account">Key Corporate Account</option>
                                    <option value="SME / Growing Business">SME / Growing Business</option>
                                    <option value="Government / PSU">Government / PSU</option>
                                    <option value="Startup / Tech">Startup / Tech</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 3: Industry Vertical -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnIndustry">
                                Industry Vertical<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select" id="cnIndustry">
                                    <option value="" selected>-None-</option>
                                    <option value="Information Technology" selected>Information Technology &amp; Services</option>
                                    <option value="Manufacturing & Engineering">Manufacturing &amp; Engineering</option>
                                    <option value="Pharmaceuticals & Healthcare">Pharmaceuticals &amp; Healthcare</option>
                                    <option value="Logistics & Supply Chain">Logistics &amp; Supply Chain</option>
                                    <option value="Automotive & Ancillary">Automotive &amp; Ancillary</option>
                                    <option value="BFSI / Banking">BFSI / Banking</option>
                                    <option value="Construction & Real Estate">Construction &amp; Real Estate</option>
                                    <option value="Retail & FMCG">Retail &amp; FMCG</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 4: GSTIN Number -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnGstin">
                                GSTIN (15-Digit)<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control text-uppercase" id="cnGstin" maxlength="15" placeholder="33AAAAA0000A1Z5" oninput="handleGstinInput(this)">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (4 Rows) -->
                    <div class="col-12 col-lg-6">
                        <!-- Row 1: Customer Code -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnClientCode">
                                Customer Code<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control bg-light fw-bold text-success" id="cnClientCode" value="CUS-<?php echo rand(1050, 9999); ?>" readonly>
                            </div>
                        </div>

                        <!-- Row 2: Onboarding Date -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnOnboardDate">
                                Onboard Date<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control" id="cnOnboardDate" value="<?php echo $todayFormatted; ?>">
                            </div>
                        </div>

                        <!-- Row 3: Acquisition Source -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnSource">
                                Source<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select" id="cnSource">
                                    <option value="" selected>-None-</option>
                                    <option value="Direct Sales" selected>Direct Sales</option>
                                    <option value="Converted from Lead">Converted from Lead</option>
                                    <option value="Referral / Client">Referral / Client</option>
                                    <option value="Website Inbound">Website Inbound</option>
                                    <option value="IndiaMart / Trade Portal">IndiaMart / Trade Portal</option>
                                    <option value="Exhibition / Expo">Exhibition / Expo</option>
                                    <option value="Channel Partner">Channel Partner</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 4: PAN Number -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnPan">
                                PAN Number<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control text-uppercase" id="cnPan" maxlength="10" placeholder="AABCA1234D">
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Row: Company Website -->
                    <div class="col-12 mt-1">
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-2 col-form-label text-sm-end crm-field-label" for="cnWebsite">
                                Website<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-10 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text" style="font-size: 12px !important;">https://</span>
                                    <input type="url" class="form-control" id="cnWebsite" placeholder="example.com">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 2: Primary Contact & Decision Maker -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-person-badge text-primary fs-5"></i>
                        <span>Primary Contact &amp; Decision Maker</span>
                    </div>
                    <span class="crm-section-badge">Key Stakeholder</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Left Column (3 Rows) -->
                    <div class="col-12 col-lg-6">
                        <!-- Row 1: Contact Full Name -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnContactName">
                                Contact Name<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control crm-required" id="cnContactName" required placeholder="e.g. Rajesh Kumar" value="<?php echo $preContact; ?>">
                            </div>
                        </div>

                        <!-- Row 2: Official Email Address -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnEmail">
                                Email Address<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="email" class="form-control crm-required" id="cnEmail" required placeholder="name@company.com" value="<?php echo $preEmail; ?>">
                            </div>
                        </div>

                        <!-- Row 3: Mobile / WhatsApp Phone -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnPhone">
                                Mobile / WhatsApp<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text">+91</span>
                                    <input type="tel" class="form-control crm-required" id="cnPhone" required placeholder="10-digit mobile number" value="<?php echo $prePhone; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (3 Rows) -->
                    <div class="col-12 col-lg-6">
                        <!-- Row 1: Role / Designation -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnDesignation">
                                Designation<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="text" class="form-control" id="cnDesignation" placeholder="e.g. Managing Director">
                            </div>
                        </div>

                        <!-- Row 2: Department -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnDepartment">
                                Department<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select" id="cnDepartment">
                                    <option value="" selected>-None-</option>
                                    <option value="Executive Management" selected>Executive Management</option>
                                    <option value="Purchase / Procurement">Purchase / Procurement</option>
                                    <option value="Finance & Accounts">Finance &amp; Accounts</option>
                                    <option value="Operations & IT">Operations &amp; IT</option>
                                    <option value="Technical & Engineering">Technical &amp; Engineering</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 3: Accounts / Landline Phone -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnAltPhone">
                                Office / Landline<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-addon-text"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" class="form-control" id="cnAltPhone" placeholder="044-24567890">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 3: Billing & Shipping Addresses -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-geo-alt text-primary fs-5"></i>
                        <span>Billing &amp; Shipping Addresses</span>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-sm fw-semibold" onclick="copyBillingToShipping();">
                        <i class="bi bi-files me-1"></i>Copy Billing to Shipping
                    </button>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Billing Address Card -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <div class="nl-address-box h-100">
                            <div class="nl-address-box-header">
                                <span class="fw-bold text-dark font-13 text-uppercase"><i class="bi bi-receipt me-1 text-primary"></i>Billing Address</span>
                                <span class="badge bg-light text-secondary border font-11">Tax Invoice</span>
                            </div>

                            <div class="row align-items-start crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnBillStreet">
                                    Street Address<span class="req-star">*</span><span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <textarea class="form-control crm-required" id="cnBillStreet" rows="2" required placeholder="Plot / Door No, Industrial Estate, Locality..."></textarea>
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnBillCountry">
                                    Country<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <select class="form-select" id="cnBillCountry">
                                        <option value="India" selected>India</option>
                                        <option value="United States">United States</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Malaysia">Malaysia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnBillState">
                                    State &amp; GST<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <select class="form-select" id="cnBillState">
                                        <option value="Tamil Nadu (33)" selected>Tamil Nadu (33)</option>
                                        <option value="Karnataka (29)">Karnataka (29)</option>
                                        <option value="Maharashtra (27)">Maharashtra (27)</option>
                                        <option value="Telangana (36)">Telangana (36)</option>
                                        <option value="Andhra Pradesh (37)">Andhra Pradesh (37)</option>
                                        <option value="Kerala (32)">Kerala (32)</option>
                                        <option value="Delhi (07)">Delhi (07)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnBillCity">
                                    City / District<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <input type="text" class="form-control" id="cnBillCity" value="Chennai">
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row mb-0">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnBillZip">
                                    PIN / Zip Code<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <input type="text" class="form-control" id="cnBillZip" value="600058">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address Card -->
                    <div class="col-12 col-lg-6">
                        <div class="nl-address-box h-100">
                            <div class="nl-address-box-header">
                                <span class="fw-bold text-dark font-13 text-uppercase"><i class="bi bi-truck me-1 text-primary"></i>Shipping Address</span>
                                <span class="badge bg-light text-secondary border font-11">Delivery Site</span>
                            </div>

                            <div class="row align-items-start crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnShipStreet">
                                    Street Address<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <textarea class="form-control" id="cnShipStreet" rows="2" placeholder="Site / Warehouse delivery address..."></textarea>
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnShipCountry">
                                    Country<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <select class="form-select" id="cnShipCountry">
                                        <option value="India" selected>India</option>
                                        <option value="United States">United States</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Malaysia">Malaysia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnShipState">
                                    State &amp; GST<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <select class="form-select" id="cnShipState">
                                        <option value="Tamil Nadu (33)" selected>Tamil Nadu (33)</option>
                                        <option value="Karnataka (29)">Karnataka (29)</option>
                                        <option value="Maharashtra (27)">Maharashtra (27)</option>
                                        <option value="Telangana (36)">Telangana (36)</option>
                                        <option value="Andhra Pradesh (37)">Andhra Pradesh (37)</option>
                                        <option value="Kerala (32)">Kerala (32)</option>
                                        <option value="Delhi (07)">Delhi (07)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnShipCity">
                                    City / District<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <input type="text" class="form-control" id="cnShipCity" value="Chennai">
                                </div>
                            </div>

                            <div class="row align-items-center crm-field-row mb-0">
                                <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnShipZip">
                                    PIN / Zip Code<span class="crm-colon">:</span>
                                </label>
                                <div class="col-sm-8 crm-field-control">
                                    <input type="text" class="form-control" id="cnShipZip" value="600058">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- SECTION 4: Commercial & SLA Terms -->
                <div class="crm-section-divider">
                    <div class="crm-section-title">
                        <i class="bi bi-credit-card-2-front text-primary fs-5"></i>
                        <span>Commercial &amp; SLA Terms</span>
                    </div>
                    <span class="crm-section-badge">Credit &amp; Billing</span>
                </div>

                <div class="row gx-4 gx-xl-5">
                    <!-- Left Column (3 Rows) -->
                    <div class="col-12 col-lg-6">
                        <!-- Row 1: Dedicated Account Manager -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnAccountOwner">
                                Account Manager<span class="req-star">*</span><span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select crm-required" id="cnAccountOwner" required>
                                    <option value="" selected>-None-</option>
                                    <option value="yuva raj" selected>yuva raj (Enterprise Lead)</option>
                                    <option value="Karthik R.">Karthik R. (Sales Director)</option>
                                    <option value="Divya A.">Divya A. (Account Manager)</option>
                                    <option value="Harish D.">Harish D. (Technical Sales)</option>
                                    <option value="Suresh Babu">Suresh Babu (VP Client Success)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 2: Credit Limit -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnCreditLimit">
                                Credit Limit (₹)<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <div class="input-group">
                                    <span class="input-group-text nl-currency-addon">Rs.</span>
                                    <input type="number" class="form-control" id="cnCreditLimit" value="500000" step="50000">
                                </div>
                            </div>
                        </div>

                        <!-- Row 3: Credit Period -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnCreditDays">
                                Credit Days<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <input type="number" class="form-control" id="cnCreditDays" value="30" min="0" max="180">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (3 Rows) -->
                    <div class="col-12 col-lg-6">
                        <!-- Row 1: Billing Currency -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnCurrency">
                                Currency<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select" id="cnCurrency">
                                    <option value="INR" selected>INR (₹) - Indian Rupee</option>
                                    <option value="USD">USD ($) - US Dollar</option>
                                    <option value="EUR">EUR (€) - Euro</option>
                                    <option value="AED">AED (د.إ) - UAE Dirham</option>
                                    <option value="SGD">SGD (S$) - Singapore Dollar</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 2: Payment Terms -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnPayTerms">
                                Payment Terms<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select" id="cnPayTerms">
                                    <option value="Net 30 Days" selected>Net 30 Days</option>
                                    <option value="Immediate on Invoice">Immediate on Invoice</option>
                                    <option value="Net 15 Days">Net 15 Days</option>
                                    <option value="Net 45 Days">Net 45 Days</option>
                                    <option value="50% Advance, 50% on Delivery">50% Advance, 50% on Delivery</option>
                                    <option value="100% Advance">100% Advance</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 3: Support Tier & SLA -->
                        <div class="row align-items-center crm-field-row">
                            <label class="col-sm-4 col-form-label text-sm-end crm-field-label" for="cnSlaTier">
                                SLA &amp; Support<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-8 crm-field-control">
                                <select class="form-select" id="cnSlaTier">
                                    <option value="Gold (24x7 4-Hour Response)" selected>Gold Tier (24x7 / 4-Hour Response)</option>
                                    <option value="Platinum (Dedicated TAM / 1-Hour SLA)">Platinum Tier (Dedicated TAM / 1-Hour SLA)</option>
                                    <option value="Silver (Business Hours / Next Day)">Silver Tier (Business Hours / Next Day)</option>
                                    <option value="Standard AMC">Standard Annual Maintenance Contract (AMC)</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Row: Internal Notes -->
                    <div class="col-12 mt-1">
                        <div class="row align-items-start crm-field-row">
                            <label class="col-sm-2 col-form-label text-sm-end crm-field-label" for="cnNotes">
                                Account Notes<span class="crm-colon">:</span>
                            </label>
                            <div class="col-sm-10 crm-field-control">
                                <textarea class="form-control" id="cnNotes" rows="2" placeholder="Key relationship history, billing preferences, commercial sensitivities, or project scope..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sticky Bottom Footer Action Bar -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 px-4 py-3 border-top bg-white sticky-bottom shadow-xs">
                <div class="font-12 text-muted d-flex align-items-center gap-1.5 flex-wrap">
                    <span><i class="bi bi-shield-check text-success me-1"></i>Fields marked with <span class="text-danger fw-bold">*</span> (red border) are required</span>
                    <span class="text-muted d-none d-md-inline">&bull;</span>
                    <span class="d-none d-md-inline text-muted"><i class="bi bi-check2-circle text-success me-1"></i>Gharuda CRM Enterprise Layout</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="customers.php" class="btn btn-outline-secondary btn-sm px-3 fw-medium">Cancel</a>
                    <button type="button" class="btn btn-outline-secondary btn-sm px-3 fw-medium" onclick="document.getElementById('customerNewForm').reset();">Reset</button>
                    <button type="submit" class="btn btn-save-customer btn-sm">
                        <i class="bi bi-check-lg"></i>Save Customer
                    </button>
                </div>
            </div>

        </form>
    </div>
</main>

<script>
function handleGstinInput(el) {
    var val = el.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    el.value = val;
    if (val.length >= 12) {
        var panEl = document.getElementById('cnPan');
        if (panEl && !panEl.value) {
            panEl.value = val.substring(2, 12);
        }
    }
}

function copyBillingToShipping() {
    document.getElementById('cnShipStreet').value = document.getElementById('cnBillStreet').value;
    document.getElementById('cnShipCity').value = document.getElementById('cnBillCity').value;
    document.getElementById('cnShipZip').value = document.getElementById('cnBillZip').value;
    document.getElementById('cnShipCountry').value = document.getElementById('cnBillCountry').value;
    document.getElementById('cnShipState').value = document.getElementById('cnBillState').value;
    
    if (window.jQuery) {
        jQuery('#cnShipCountry').val(jQuery('#cnBillCountry').val()).trigger('change');
        jQuery('#cnShipState').val(jQuery('#cnBillState').val()).trigger('change');
    }
}

function submitNewCustomer() {
    var compEl = document.getElementById('cnCompany');
    var contactEl = document.getElementById('cnContactName');
    var emailEl = document.getElementById('cnEmail');
    var phoneEl = document.getElementById('cnPhone');
    var streetEl = document.getElementById('cnBillStreet');

    if (!compEl.value.trim() || !contactEl.value.trim() || !emailEl.value.trim() || !streetEl.value.trim()) {
        document.getElementById('customerNewForm').reportValidity();
        return;
    }

    var company = compEl.value.trim();
    var contact = contactEl.value.trim();
    var email = emailEl.value.trim();
    var phone = phoneEl.value.trim() || '+91 98400 00000';
    var gstin = document.getElementById('cnGstin').value.trim() || 'Unregistered';
    var group = document.getElementById('cnCategory').value;
    var owner = document.getElementById('cnAccountOwner').value;
    var todayStr = document.getElementById('cnOnboardDate').value || new Date().toLocaleDateString('en-GB').replace(/\//g, '-');

    try {
        var list = JSON.parse(localStorage.getItem('gh_new_customers') || '[]');
        list.unshift({
            id: document.getElementById('cnClientCode').value || ('CUS-' + (1047 + list.length)),
            company: company,
            contact: contact,
            email: email,
            phone: phone,
            gstin: gstin,
            group: group,
            owner: owner,
            created: todayStr
        });
        localStorage.setItem('gh_new_customers', JSON.stringify(list.slice(0, 20)));
        var fromLeadParam = <?php echo json_encode($fromLead); ?>;
        if (fromLeadParam) {
            var convLeads = JSON.parse(localStorage.getItem('gh_converted_leads') || '[]');
            if (convLeads.indexOf(fromLeadParam) === -1) convLeads.push(fromLeadParam);
            localStorage.setItem('gh_converted_leads', JSON.stringify(convLeads));
        }
    } catch (e) {}

    window.location.href = 'customers.php';
}
</script>

<?php include 'footer.php'; ?>
