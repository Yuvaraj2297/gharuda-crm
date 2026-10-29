<?php
include 'header.php';
$preCompany = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
$preContact = isset($_GET['contact']) ? htmlspecialchars($_GET['contact']) : (isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '');
$prePhone   = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '';
$preEmail   = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$fromLead   = isset($_GET['from_lead']) ? htmlspecialchars($_GET['from_lead']) : '';
?>

<main class="container-fluid px-0">
    <!-- Page Header & Breadcrumb -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">New Customer Onboarding</h1>
                <?php if ($fromLead): ?>
                    <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-arrow-left-right me-1"></i>Converting Lead #<?php echo $fromLead; ?>
                    </span>
                <?php else: ?>
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-building-check me-1"></i>B2B / B2C Account Setup
                    </span>
                <?php endif; ?>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-building fs-6"></i>
                <a href="customers.php" class="text-decoration-none text-muted">Customers</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">New Customer</span>
            </nav>
        </div>

        <!-- Top CRM Quick Navigation Actions -->
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="customer-dashboard.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-pie-chart"></i><span>Customer 360&deg;</span>
            </a>
            <a href="contacts.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-people"></i><span>Contacts</span>
            </a>
            <a href="quotation-create.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-text"></i><span>Create Quote</span>
            </a>
            <a href="invoice-create.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-receipt"></i><span>Tax Invoice</span>
            </a>
            <a href="customers.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-list-ul"></i><span>Customers List</span>
            </a>
        </div>
    </div>

    <!-- 4-Step CRM Onboarding Progress Strip (Bootstrap 5 Grid + Utilities) -->
    <div class="card-custom p-3 mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="d-flex align-items-center gap-3 p-2 rounded-3 bg-success-subtle border border-success-subtle">
                    <span class="badge rounded-circle bg-success text-white p-2 d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-check-lg fs-6"></i>
                    </span>
                    <div class="lh-sm">
                        <div class="fw-bold text-success small">Step 1 &middot; Lead / Deal Won</div>
                        <small class="text-muted">Commercial terms approved</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="d-flex align-items-center gap-3 p-2 rounded-3 bg-primary-subtle border border-primary-subtle">
                    <span class="badge rounded-circle bg-primary text-white p-2 d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-building fs-6"></i>
                    </span>
                    <div class="lh-sm">
                        <div class="fw-bold text-primary small">Step 2 &middot; Account &amp; GST Setup</div>
                        <small class="text-muted">Company, GSTIN &amp; billing profile</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="d-flex align-items-center gap-3 p-2 rounded-3 bg-light border">
                    <span class="badge rounded-circle bg-secondary text-white p-2 d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-person-badge fs-6"></i>
                    </span>
                    <div class="lh-sm">
                        <div class="fw-bold text-dark small">Step 3 &middot; Decision Maker &amp; SLA</div>
                        <small class="text-muted">Primary SPOC &amp; support policy</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="d-flex align-items-center gap-3 p-2 rounded-3 bg-light border">
                    <span class="badge rounded-circle bg-secondary text-white p-2 d-inline-flex align-items-center justify-content-center">
                        <i class="bi bi-rocket-takeoff fs-6"></i>
                    </span>
                    <div class="lh-sm">
                        <div class="fw-bold text-dark small">Step 4 &middot; 360&deg; Ledger &amp; Billing</div>
                        <small class="text-muted">Quotes, invoices &amp; project delivery</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Onboarding Form -->
    <form id="customerNewForm" onsubmit="event.preventDefault(); submitNewCustomer('360');">
        <div class="row g-4">
            <!-- Left Column: Company Profile, Primary Contact, Billing & Shipping -->
            <div class="col-12 col-xl-8">
                <!-- Section 1: Company & Tax Profile -->
                <div class="card-custom p-0 mb-4 overflow-hidden">
                    <div class="card-head d-flex align-items-center justify-content-between border-bottom p-3 mb-0 bg-light bg-opacity-50">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip">
                                <i class="bi bi-building"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 fs-6 fw-bold">1. Company &amp; Tax Profile</h3>
                                <small class="text-muted">Legal business entity, GSTIN, PAN &amp; industry classification</small>
                            </div>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Required</span>
                    </div>

                    <div class="p-3 p-md-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-8">
                                <label class="form-label fw-semibold small text-dark" for="cnCompany">
                                    Company / Account Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="cnCompany" required placeholder="e.g. Apex Industrial Automation Pvt Ltd" value="<?php echo $preCompany; ?>">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnClientCode">Customer Code</label>
                                <input type="text" class="form-control bg-light fw-bold" id="cnClientCode" value="CUS-<?php echo rand(1048, 1999); ?>" readonly>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnCategory">
                                    Account Segment / Tier <span class="text-danger">*</span>
                                </label>
                                <select class="form-select select2" id="cnCategory" required>
                                    <option value="Enterprise / Key Account">Enterprise / Key Account</option>
                                    <option value="Corporate B2B" selected>Corporate B2B</option>
                                    <option value="SME / Mid-Market">SME / Mid-Market</option>
                                    <option value="AMC / Retainer Client">AMC / Retainer Client</option>
                                    <option value="Government / PSU">Government / PSU</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnIndustry">Industry Vertical</label>
                                <select class="form-select select2" id="cnIndustry">
                                    <option value="Manufacturing & Engineering" selected>Manufacturing &amp; Engineering</option>
                                    <option value="IT & Software Services">IT &amp; Software Services</option>
                                    <option value="Construction & Builders">Construction &amp; Builders</option>
                                    <option value="Solar & Renewable Energy">Solar &amp; Renewable Energy</option>
                                    <option value="Healthcare & Pharma">Healthcare &amp; Pharma</option>
                                    <option value="Retail & Distribution">Retail &amp; Distribution</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnSource">Acquisition Source</label>
                                <select class="form-select select2" id="cnSource">
                                    <option value="Converted Sales Lead" <?php echo $fromLead ? 'selected' : ''; ?>>Converted Sales Lead</option>
                                    <option value="Direct Enterprise Outbound">Direct Enterprise Outbound</option>
                                    <option value="Website / Inbound Demo">Website / Inbound Demo</option>
                                    <option value="Partner / Referral">Partner / Referral</option>
                                    <option value="Trade Show / Exhibition">Trade Show / Exhibition</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnGstin">GSTIN (15-Digit)</label>
                                <input type="text" class="form-control text-uppercase" id="cnGstin" maxlength="15" placeholder="33AABCA1234F1Z5">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnPan">PAN Number</label>
                                <input type="text" class="form-control text-uppercase" id="cnPan" maxlength="10" placeholder="AABCA1234F">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnWebsite">Company Website</label>
                                <input type="url" class="form-control" id="cnWebsite" placeholder="https://www.company.com">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Primary Contact & Decision Maker -->
                <div class="card-custom p-0 mb-4 overflow-hidden">
                    <div class="card-head d-flex align-items-center justify-content-between border-bottom p-3 mb-0 bg-light bg-opacity-50">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 fs-6 fw-bold">2. Primary Contact &amp; Decision Maker</h3>
                                <small class="text-muted">Auto-linked to Contacts Directory &amp; Customer Portal login</small>
                            </div>
                        </div>
                        <span class="badge bg-info-subtle text-info border border-info-subtle">SPOC</span>
                    </div>

                    <div class="p-3 p-md-4">
                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnContactName">
                                    Primary Contact Full Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="cnContactName" required placeholder="e.g. Rajesh Kumar" value="<?php echo $preContact; ?>">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnDesignation">Role / Designation</label>
                                <input type="text" class="form-control" id="cnDesignation" placeholder="e.g. Managing Director / VP Procurement" value="Managing Director">
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnDepartment">Department</label>
                                <select class="form-select select2" id="cnDepartment">
                                    <option value="Management / Board" selected>Management / Board</option>
                                    <option value="Procurement & Purchase">Procurement &amp; Purchase</option>
                                    <option value="Finance & Accounts">Finance &amp; Accounts</option>
                                    <option value="IT & Operations">IT &amp; Operations</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnEmail">
                                    Official Email Address <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="cnEmail" required placeholder="name@company.com" value="<?php echo $preEmail; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnPhone">
                                    Mobile / WhatsApp Number <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-whatsapp text-success"></i></span>
                                    <input type="tel" class="form-control" id="cnPhone" required placeholder="+91 98400 12345" value="<?php echo $prePhone; ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class="form-label fw-semibold small text-dark" for="cnAltPhone">Accounts / Secondary Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" class="form-control" id="cnAltPhone" placeholder="044-24567890">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Billing & Shipping Addresses -->
                <div class="card-custom p-0 mb-4 overflow-hidden">
                    <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0 bg-light bg-opacity-50">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 fs-6 fw-bold">3. Billing &amp; Shipping Addresses</h3>
                                <small class="text-muted">Used automatically on GST Quotations, Tax Invoices &amp; Delivery Challans</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-success btn-sm fw-semibold" onclick="copyBillingToShipping()">
                            <i class="bi bi-files me-1"></i>Copy Billing to Shipping
                        </button>
                    </div>

                    <div class="p-3 p-md-4">
                        <div class="row g-4">
                            <!-- Billing Address -->
                            <div class="col-12 col-lg-6">
                                <div class="p-3 rounded-3 bg-light border h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                        <span class="fw-bold text-dark small text-uppercase">
                                            <i class="bi bi-receipt text-primary me-1"></i>Billing Address
                                        </span>
                                        <span class="badge bg-primary-subtle text-primary">Tax Invoice</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label fw-semibold small text-dark" for="cnBillStreet">
                                                Street Address / Industrial Estate <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" id="cnBillStreet" rows="2" required placeholder="Plot No, Industrial Estate, Main Road">Plot 42, SIDCO Industrial Estate, Ambattur</textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnBillCountry">Country</label>
                                            <select class="form-select select2" id="cnBillCountry">
                                                <option value="India" selected>India</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="United States">United States</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnBillState">State &amp; GST Code</label>
                                            <select class="form-select select2" id="cnBillState">
                                                <option value="Tamil Nadu" selected>Tamil Nadu (33)</option>
                                                <option value="Karnataka">Karnataka (29)</option>
                                                <option value="Maharashtra">Maharashtra (27)</option>
                                                <option value="Telangana">Telangana (36)</option>
                                                <option value="Kerala">Kerala (32)</option>
                                                <option value="Delhi">Delhi (07)</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnBillCity">City / District</label>
                                            <input type="text" class="form-control" id="cnBillCity" value="Chennai">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnBillZip">PIN / Zip Code</label>
                                            <input type="text" class="form-control" id="cnBillZip" value="600058">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Address -->
                            <div class="col-12 col-lg-6">
                                <div class="p-3 rounded-3 bg-light border h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                        <span class="fw-bold text-dark small text-uppercase">
                                            <i class="bi bi-truck text-success me-1"></i>Shipping / Site Address
                                        </span>
                                        <span class="badge bg-success-subtle text-success">Site Delivery</span>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label fw-semibold small text-dark" for="cnShipStreet">Street Address / Project Site</label>
                                            <textarea class="form-control" id="cnShipStreet" rows="2" placeholder="Site / Warehouse delivery address">Plot 42, SIDCO Industrial Estate, Ambattur</textarea>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnShipCountry">Country</label>
                                            <select class="form-select select2" id="cnShipCountry">
                                                <option value="India" selected>India</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="United States">United States</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnShipState">State &amp; GST Code</label>
                                            <select class="form-select select2" id="cnShipState">
                                                <option value="Tamil Nadu" selected>Tamil Nadu (33)</option>
                                                <option value="Karnataka">Karnataka (29)</option>
                                                <option value="Maharashtra">Maharashtra (27)</option>
                                                <option value="Telangana">Telangana (36)</option>
                                                <option value="Kerala">Kerala (32)</option>
                                                <option value="Delhi">Delhi (07)</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnShipCity">City / District</label>
                                            <input type="text" class="form-control" id="cnShipCity" value="Chennai">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label fw-semibold small text-dark" for="cnShipZip">PIN / Zip Code</label>
                                            <input type="text" class="form-control" id="cnShipZip" value="600058">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Commercial Terms, Portal Switches & CRM Action Buttons -->
            <div class="col-12 col-xl-4">
                <!-- Commercial & SLA Terms -->
                <div class="card-custom p-0 mb-4 overflow-hidden">
                    <div class="card-head d-flex align-items-center justify-content-between border-bottom p-3 mb-0 bg-light bg-opacity-50">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip">
                                <i class="bi bi-credit-card-2-front"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 fs-6 fw-bold">Commercial &amp; SLA Terms</h3>
                                <small class="text-muted">Billing currency, credit limit &amp; owner</small>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 p-md-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark" for="cnAccountOwner">
                                    Dedicated Account Manager <span class="text-danger">*</span>
                                </label>
                                <select class="form-select select2" id="cnAccountOwner">
                                    <option value="Harish D.">Harish D. (Enterprise AE)</option>
                                    <option value="Divya A.">Divya A. (Sr. Account Manager)</option>
                                    <option value="Karthik R.">Karthik R. (Regional Sales Lead)</option>
                                    <option value="Priya S.">Priya S. (Key Accounts)</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold small text-dark" for="cnCurrency">Billing Currency</label>
                                <select class="form-select select2" id="cnCurrency">
                                    <option value="INR" selected>INR (₹)</option>
                                    <option value="USD">USD ($)</option>
                                    <option value="EUR">EUR (€)</option>
                                    <option value="AED">AED (د.إ)</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold small text-dark" for="cnPayTerms">Payment Terms</label>
                                <select class="form-select select2" id="cnPayTerms">
                                    <option value="Net 30" selected>Net 30 Days</option>
                                    <option value="Net 15">Net 15 Days</option>
                                    <option value="Due on Receipt">Due on Receipt</option>
                                    <option value="50% Advance">50% Advance</option>
                                    <option value="Net 45">Net 45 Days</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold small text-dark" for="cnCreditLimit">Credit Limit (₹)</label>
                                <input type="number" class="form-control" id="cnCreditLimit" value="500000" min="0" step="10000">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold small text-dark" for="cnOpeningBal">Opening Balance (₹)</label>
                                <input type="number" class="form-control" id="cnOpeningBal" value="0" step="100">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold small text-dark" for="cnSlaPolicy">Default Support SLA Tier</label>
                                <select class="form-select select2" id="cnSlaPolicy">
                                    <option value="SLA-URG">Enterprise Gold (15m Response / 2h Resolution)</option>
                                    <option value="SLA-HI" selected>Priority Business (1h Response / 6h Resolution)</option>
                                    <option value="SLA-MED">Standard AMC (4h Response / 24h Resolution)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CRM Automation & Portal Provisioning -->
                <div class="card-custom p-0 mb-4 overflow-hidden">
                    <div class="card-head d-flex align-items-center justify-content-between border-bottom p-3 mb-0 bg-light bg-opacity-50">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip">
                                <i class="bi bi-sliders"></i>
                            </div>
                            <div>
                                <h3 class="card-title mb-0 fs-6 fw-bold">CRM Automation &amp; Portal</h3>
                                <small class="text-muted">Auto-provision client workflows</small>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 p-md-4 d-flex flex-column gap-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="cnAutoPortal" checked>
                            <label class="form-check-label fw-semibold small text-dark" for="cnAutoPortal">
                                Enable Customer Self-Service Portal
                                <span class="d-block text-muted fw-normal">Allows client to view quotes, invoices &amp; raise tickets</span>
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="cnAutoWelcome" checked>
                            <label class="form-check-label fw-semibold small text-dark" for="cnAutoWelcome">
                                Send Welcome Email &amp; WhatsApp Kit
                                <span class="d-block text-muted fw-normal">Dispatches GST onboarding kit &amp; account manager vCard</span>
                            </label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="cnAutoDeal">
                            <label class="form-check-label fw-semibold small text-dark" for="cnAutoDeal">
                                Create Initial Opportunity in Deals Pipeline
                                <span class="d-block text-muted fw-normal">Automatically opens a Discovery deal for this account</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit & Next CRM Action Card -->
                <div class="card-custom p-3 p-md-4">
                    <div class="small fw-bold text-uppercase text-muted mb-2">Onboarding &amp; CRM Actions</div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2 fw-bold">
                            <i class="bi bi-check2-circle me-1"></i>Save &amp; Onboard Customer
                        </button>
                        <button type="button" class="btn btn-outline-primary py-2 fw-semibold" onclick="submitNewCustomer('quote')">
                            <i class="bi bi-file-earmark-text me-1"></i>Save &amp; Create Quotation
                        </button>
                        <button type="button" class="btn btn-outline-success py-2 fw-semibold" onclick="submitNewCustomer('invoice')">
                            <i class="bi bi-receipt me-1"></i>Save &amp; Create Tax Invoice
                        </button>
                        <button type="button" class="btn btn-outline-dark py-2 fw-semibold" onclick="submitNewCustomer('project')">
                            <i class="bi bi-briefcase me-1"></i>Save &amp; Launch Project
                        </button>
                        <a href="customers.php" class="btn btn-light border py-2 text-muted fw-semibold">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Recently Onboarded Customer Accounts & CRM Action Directory -->
    <div class="card-custom p-0 mt-4 overflow-hidden">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-building-check"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Recently Onboarded Customer Accounts &amp; CRM Actions</h3>
                    <small class="text-muted">Launch 360&deg; Profile, Quotations, Tax Invoices, SLA Contracts, or Delivery Projects directly</small>
                </div>
            </div>
            <a href="customers.php" class="btn btn-outline-primary btn-sm fw-semibold">
                <i class="bi bi-list-ul me-1"></i>View All Customers
            </a>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="recentOnboardedTable" data-table-name="Recently_Onboarded_Customers">
                <thead>
                    <tr>
                        <th>Account ID</th>
                        <th>Company / Account</th>
                        <th>Primary Contact</th>
                        <th>GSTIN</th>
                        <th>Tier / Segment</th>
                        <th>Account Manager</th>
                        <th>Onboarded On</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody id="recentOnboardedBody">
                    <tr>
                        <td class="fw-bold text-success">CUS-1046</td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=GG+COMPANY" class="fw-bold text-dark text-decoration-none">GG COMPANY</a>
                            <div class="small text-muted">kaviyarasu@ghratechnology.com</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">MOHAN S</div>
                            <div class="small text-muted">+91 96770 63368</div>
                        </td>
                        <td><code class="text-dark fw-bold">33AABCG4829K1Z5</code></td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">Enterprise / Key Account</span></td>
                        <td>Harish D.</td>
                        <td>16-09-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=GG+COMPANY" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360° Profile"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=GG+COMPANY" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=GG+COMPANY" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA / AMC Contract"><i class="bi bi-pen"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">CUS-1045</td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="fw-bold text-dark text-decoration-none">Power Spares Engineering</a>
                            <div class="small text-muted">accounts@powerspares.in</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Rajesh Kumar</div>
                            <div class="small text-muted">+91 98401 11223</div>
                        </td>
                        <td><code class="text-dark fw-bold">33AAACP1234F1Z2</code></td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">Corporate B2B</span></td>
                        <td>Divya A.</td>
                        <td>10-09-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360° Profile"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA / AMC Contract"><i class="bi bi-pen"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-success">CUS-1044</td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="fw-bold text-dark text-decoration-none">Zen Publications</a>
                            <div class="small text-muted">finance@zenpub.co.in</div>
                        </td>
                        <td>
                            <div class="fw-semibold text-dark">Anitha Menon</div>
                            <div class="small text-muted">+91 94440 88776</div>
                        </td>
                        <td><code class="text-dark fw-bold">33AABCZ9988L1Z9</code></td>
                        <td><span class="badge bg-info-subtle text-info border border-info-subtle">AMC / Retainer Client</span></td>
                        <td>Karthik R.</td>
                        <td>02-09-2026</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360° Profile"><i class="bi bi-person-vcard"></i></a>
                                <a href="quotation-create.php?client=Zen+Publications" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="invoice-create.php?client=Zen+Publications" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA / AMC Contract"><i class="bi bi-pen"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal: Customer Onboarded Next-Step CRM Hub (Pure Bootstrap 5 Utilities) -->
<div class="modal fade" id="customerOnboardedModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="p-4 text-center bg-success bg-gradient text-white">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white text-success p-3 mb-2 shadow-sm">
                    <i class="bi bi-patch-check-fill fs-3"></i>
                </div>
                <h5 class="fw-bold mb-1" id="onboardedCompanyTitle">Customer Account Onboarded!</h5>
                <p class="small mb-0 text-white-50">360&deg; Profile, Primary Contact, and GST Billing Ledger are now active.</p>
            </div>
            <div class="modal-body p-4">
                <div class="small fw-bold text-uppercase text-muted mb-2">Next CRM Lifecycle Action</div>
                <div class="d-grid gap-2">
                    <a id="nextAct360" href="customer-view.php?id=1" class="btn btn-primary fw-bold py-2 d-flex align-items-center justify-content-between px-3">
                        <span><i class="bi bi-person-vcard me-2"></i>Open Customer 360&deg; Profile</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a id="nextActQuote" href="quotation-create.php" class="btn btn-outline-primary fw-semibold py-2 d-flex align-items-center justify-content-between px-3">
                        <span><i class="bi bi-file-earmark-text me-2"></i>Create GST Quotation / Proposal</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a id="nextActInvoice" href="invoice-create.php" class="btn btn-outline-success fw-semibold py-2 d-flex align-items-center justify-content-between px-3">
                        <span><i class="bi bi-receipt me-2"></i>Generate Tax Invoice</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a id="nextActProject" href="project-create.php" class="btn btn-outline-dark fw-semibold py-2 d-flex align-items-center justify-content-between px-3">
                        <span><i class="bi bi-briefcase me-2"></i>Launch Client Delivery Project</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="modal-footer bg-light border-top py-2 px-4 d-flex justify-content-between">
                <a href="customers.php" class="btn btn-sm btn-secondary">Go to Customers List</a>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Stay on Page</button>
            </div>
        </div>
    </div>
</div>

<script>
function copyBillingToShipping() {
    document.getElementById('cnShipStreet').value = document.getElementById('cnBillStreet').value;
    document.getElementById('cnShipCity').value = document.getElementById('cnBillCity').value;
    document.getElementById('cnShipZip').value = document.getElementById('cnBillZip').value;
    if (window.jQuery) {
        jQuery('#cnShipCountry').val(jQuery('#cnBillCountry').val()).trigger('change');
        jQuery('#cnShipState').val(jQuery('#cnBillState').val()).trigger('change');
    }
}

function submitNewCustomer(nextMode) {
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
    var encoded = encodeURIComponent(company);
    var contact = contactEl.value.trim();
    var email = emailEl.value.trim();
    var phone = phoneEl.value.trim() || '+91 98400 00000';
    var gstin = document.getElementById('cnGstin').value.trim() || 'Unregistered';
    var group = document.getElementById('cnCategory').value;
    var owner = document.getElementById('cnAccountOwner').value;
    var todayStr = new Date().toLocaleDateString('en-GB').replace(/\//g, '-');

    // Persist in localStorage so customers.php and customer-new.php display newly onboarded accounts
    try {
        var list = JSON.parse(localStorage.getItem('gh_new_customers') || '[]');
        list.unshift({
            id: 'CUS-' + (1047 + list.length),
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

    // Prepend directly into the Recently Onboarded table on page
    var tbody = document.getElementById('recentOnboardedBody');
    if (tbody) {
        var tr = document.createElement('tr');
        tr.innerHTML =
            '<td class="fw-bold text-success">CUS-NEW</td>' +
            '<td><a href="customer-view.php?id=1&name=' + encoded + '" class="fw-bold text-dark text-decoration-none">' + company + '</a><div class="small text-muted">' + email + '</div></td>' +
            '<td><div class="fw-semibold text-dark">' + contact + '</div><div class="small text-muted">' + phone + '</div></td>' +
            '<td><code class="text-dark fw-bold">' + gstin + '</code></td>' +
            '<td><span class="badge bg-success-subtle text-success border border-success-subtle">' + group + '</span></td>' +
            '<td>' + owner + '</td>' +
            '<td>' + todayStr + '</td>' +
            '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
                '<a href="customer-view.php?id=1&name=' + encoded + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360° Profile"><i class="bi bi-person-vcard"></i></a>' +
                '<a href="quotation-create.php?client=' + encoded + '" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create GST Quotation"><i class="bi bi-file-earmark-text"></i></a>' +
                '<a href="invoice-create.php?client=' + encoded + '" class="btn btn-sm btn-light border text-success px-2 py-1" title="Create Tax Invoice"><i class="bi bi-receipt"></i></a>' +
                '<a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>' +
                '<a href="contracts.php" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA / AMC Contract"><i class="bi bi-pen"></i></a>' +
            '</div></td>';
        tbody.insertBefore(tr, tbody.firstChild);
    }

    if (nextMode === 'quote') {
        window.location.href = 'quotation-create.php?client=' + encoded;
        return;
    }
    if (nextMode === 'invoice') {
        window.location.href = 'invoice-create.php?client=' + encoded;
        return;
    }
    if (nextMode === 'project') {
        window.location.href = 'project-create.php';
        return;
    }

    document.getElementById('onboardedCompanyTitle').textContent = company + ' Onboarded!';
    document.getElementById('nextAct360').href = 'customer-view.php?id=1&name=' + encoded;
    document.getElementById('nextActQuote').href = 'quotation-create.php?client=' + encoded;
    document.getElementById('nextActInvoice').href = 'invoice-create.php?client=' + encoded;

    if (window.bootstrap && bootstrap.Modal) {
        bootstrap.Modal.getOrCreateInstance(document.getElementById('customerOnboardedModal')).show();
    }
}
</script>

<?php include 'footer.php'; ?>
