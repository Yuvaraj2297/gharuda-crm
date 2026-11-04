<?php
include 'header.php';
$preCompany = isset($_GET['company']) ? htmlspecialchars($_GET['company']) : (isset($_GET['client']) ? htmlspecialchars($_GET['client']) : '');
$preContact = isset($_GET['contact']) ? htmlspecialchars($_GET['contact']) : (isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '');
$prePhone   = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '';
$preEmail   = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$fromLead   = isset($_GET['from_lead']) ? htmlspecialchars($_GET['from_lead']) : '';
$todayFormatted = date('d-m-Y');
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <span class="icon-chip bg-primary-subtle text-primary">
                <i class="bi bi-building-add"></i>
            </span>
            <div>
                <div class="d-flex align-items-center gap-2 flex-wrap">
                    <h1 class="font-display fw-bold mb-0 page-title">New Customer Onboarding</h1>
                    <?php if ($fromLead): ?>
                        <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-2.5 py-1 font-11 fw-semibold">
                            <i class="bi bi-arrow-left-right me-1"></i>Converting Lead #<?php echo $fromLead; ?>
                        </span>
                    <?php endif; ?>
                </div>
                <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text mt-0.5">
                    <a href="customers.php" class="text-decoration-none text-muted">Customers</a>
                    <i class="bi bi-chevron-right small"></i>
                    <span class="fw-semibold text-dark">New Customer</span>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="customer-dashboard.php" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-pie-chart"></i><span>Customer 360&deg;</span>
            </a>
            <a href="customers.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-arrow-left"></i><span>Back to Customers</span>
            </a>
        </div>
    </div>

    <!-- Main Customer Onboarding Card -->
    <div class="card-custom p-3 p-md-4 mb-4">
        <form id="customerNewForm" onsubmit="event.preventDefault(); submitNewCustomer('360');">

            <!-- Section 1: Company & Tax Profile -->
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h5 class="fw-bold text-dark mb-0 fs-6">
                        <i class="bi bi-building text-primary me-2"></i>1. Company &amp; Tax Profile
                    </h5>
                    <span class="text-muted font-12"><span class="text-danger">*</span> Required fields</span>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold small text-dark" for="cnCompany">
                            Company / Account Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="cnCompany" required placeholder="Enter registered company name" value="<?php echo $preCompany; ?>">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label fw-semibold small text-dark" for="cnClientCode">Customer Code</label>
                        <input type="text" class="form-control bg-light fw-bold text-primary" id="cnClientCode" value="CUS-<?php echo rand(1048, 1999); ?>" readonly>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label fw-semibold small text-dark" for="cnOnboardDate">Onboarding Date</label>
                        <div class="date-picker">
                            <input type="text" class="form-control date-input" id="cnOnboardDate" value="<?php echo $todayFormatted; ?>" placeholder="DD-MM-YYYY">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-dark" for="cnCategory">
                            Account Segment / Group <span class="text-danger">*</span>
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
                        <input type="text" class="form-control text-uppercase" id="cnGstin" maxlength="15" placeholder="33AABCA1234F1Z5" oninput="handleGstinInput(this)">
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

            <!-- Section 2: Primary Contact & Decision Maker -->
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h5 class="fw-bold text-dark mb-0 fs-6">
                        <i class="bi bi-person-badge text-primary me-2"></i>2. Primary Contact &amp; Decision Maker
                    </h5>
                    <span class="badge bg-light text-secondary border font-11">Primary SPOC</span>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-dark" for="cnContactName">
                            Primary Contact Full Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="cnContactName" required placeholder="e.g. Rajesh Kumar" value="<?php echo $preContact; ?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-dark" for="cnDesignation">Role / Designation</label>
                        <input type="text" class="form-control" id="cnDesignation" placeholder="e.g. Managing Director" value="Managing Director">
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
                        <input type="email" class="form-control" id="cnEmail" required placeholder="name@company.com" value="<?php echo $preEmail; ?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-dark" for="cnPhone">
                            Mobile / WhatsApp Number <span class="text-danger">*</span>
                        </label>
                        <input type="tel" class="form-control" id="cnPhone" required placeholder="+91 98400 12345" value="<?php echo $prePhone; ?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-dark" for="cnAltPhone">Accounts / Secondary Phone</label>
                        <input type="tel" class="form-control" id="cnAltPhone" placeholder="044-24567890">
                    </div>
                </div>
            </div>

            <!-- Section 3: Billing & Shipping Addresses -->
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h5 class="fw-bold text-dark mb-0 fs-6">
                        <i class="bi bi-geo-alt text-primary me-2"></i>3. Billing &amp; Shipping Addresses
                    </h5>
                    <button type="button" class="btn btn-outline-primary btn-sm fw-semibold" onclick="copyBillingToShipping()">
                        <i class="bi bi-files me-1"></i>Copy Billing to Shipping
                    </button>
                </div>

                <div class="row g-4">
                    <!-- Billing Address -->
                    <div class="col-12 col-lg-6">
                        <div class="p-3 rounded-3 bg-light border h-100">
                            <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                <span class="fw-bold text-dark small text-uppercase">Billing Address</span>
                                <span class="badge bg-white text-secondary border">Tax Invoice</span>
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
                                <span class="fw-bold text-dark small text-uppercase">Shipping / Site Address</span>
                                <span class="badge bg-white text-secondary border">Delivery Site</span>
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

            <!-- Section 4: Commercial Terms & Portal Provisioning -->
            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h5 class="fw-bold text-dark mb-0 fs-6">
                        <i class="bi bi-credit-card-2-front text-primary me-2"></i>4. Commercial &amp; SLA Terms
                    </h5>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-md-4">
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
                    <div class="col-6 col-md-2">
                        <label class="form-label fw-semibold small text-dark" for="cnCurrency">Billing Currency</label>
                        <select class="form-select select2" id="cnCurrency">
                            <option value="INR" selected>INR (₹)</option>
                            <option value="USD">USD ($)</option>
                            <option value="EUR">EUR (€)</option>
                            <option value="AED">AED (د.إ)</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label fw-semibold small text-dark" for="cnPayTerms">Payment Terms</label>
                        <select class="form-select select2" id="cnPayTerms">
                            <option value="Net 30" selected>Net 30 Days</option>
                            <option value="Net 15">Net 15 Days</option>
                            <option value="Due on Receipt">Due on Receipt</option>
                            <option value="50% Advance">50% Advance</option>
                            <option value="Net 45">Net 45 Days</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label fw-semibold small text-dark" for="cnCreditLimit">Credit Limit (₹)</label>
                        <input type="number" class="form-control" id="cnCreditLimit" value="500000" min="0" step="10000">
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label fw-semibold small text-dark" for="cnOpeningBal">Opening Balance (₹)</label>
                        <input type="number" class="form-control" id="cnOpeningBal" value="0" step="100">
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label fw-semibold small text-dark" for="cnSlaPolicy">Default Support SLA Tier</label>
                        <select class="form-select select2" id="cnSlaPolicy">
                            <option value="SLA-URG">Enterprise Gold (15m Response / 2h Resolution)</option>
                            <option value="SLA-HI" selected>Priority Business (1h Response / 6h Resolution)</option>
                            <option value="SLA-MED">Standard AMC (4h Response / 24h Resolution)</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-8 d-flex align-items-end">
                        <div class="d-flex flex-wrap gap-4 px-3 py-2 rounded-3 bg-light border w-100">
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" id="cnAutoPortal" checked>
                                <label class="form-check-label fw-semibold small text-dark" for="cnAutoPortal">Enable Customer Portal</label>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" id="cnAutoWelcome" checked>
                                <label class="form-check-label fw-semibold small text-dark" for="cnAutoWelcome">Send Welcome Email &amp; Kit</label>
                            </div>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" id="cnAutoDeal">
                                <label class="form-check-label fw-semibold small text-dark" for="cnAutoDeal">Create Initial Deal Opportunity</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Footer -->
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 pt-3 border-top">
                <a href="customers.php" class="btn btn-light border px-3 fw-semibold">Cancel</a>
                <div class="d-flex align-items-center flex-wrap gap-2">
                    <button type="button" class="btn btn-outline-primary fw-semibold" onclick="submitNewCustomer('quote')">
                        <i class="bi bi-file-earmark-text me-1"></i>Save &amp; Create Quotation
                    </button>
                    <button type="button" class="btn btn-outline-success fw-semibold" onclick="submitNewCustomer('invoice')">
                        <i class="bi bi-receipt me-1"></i>Save &amp; Create Tax Invoice
                    </button>
                    <button type="submit" class="btn btn-primary px-4 fw-bold">
                        <i class="bi bi-check2-circle me-1"></i>Save &amp; Onboard Customer
                    </button>
                </div>
            </div>
        </form>
    </div>

    
</main>

<!-- Modal: Customer Onboarded Next-Step CRM Hub -->
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

    var tbody = document.getElementById('recentOnboardedBody');
    if (tbody) {
        var tr = document.createElement('tr');
        tr.innerHTML =
            '<td class="fw-bold text-success">' + (document.getElementById('cnClientCode').value || 'CUS-NEW') + '</td>' +
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
                '<a href="project-create.php?client=' + encoded + '" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>' +
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
