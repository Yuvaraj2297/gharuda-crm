<?php include 'header.php'; ?>

<style>
.cv-side-link {
  display: flex; align-items: center; gap: 10px; padding: 8px 12px;
  border-radius: 8px; color: var(--ink-700, #334155); font-size: 13px;
  font-weight: 500; text-decoration: none; transition: all 0.15s ease;
}
.cv-side-link i { width: 18px; text-align: center; font-size: 15px; }
.cv-side-link:hover { background: #f1f5f9; color: var(--primary, #0d6efd); }
.cv-side-link.active { background: var(--primary-light, #e7f1ff); color: var(--primary, #0d6efd); font-weight: 600; }
.cv-subtabs { display: flex; gap: 6px; border-bottom: 1px solid #e2e8f0; padding: 12px 16px; overflow-x: auto; }
.cv-subtab { background: none; border: none; padding: 6px 14px; border-radius: 6px; font-size: 13px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.15s ease; }
.cv-subtab:hover { background: #f8fafc; color: #0d6efd; }
.cv-subtab.active { background: var(--primary-light, #e7f1ff); color: var(--primary, #0d6efd); font-weight: 600; }
.cv-prj-pane:not(.active) { display: none !important; }
.cv-title { font-size: 18px; font-weight: 700; margin-bottom: 16px; color: #1e293b; }
.cv-cl-yn { display: inline-flex; border: 1px solid #e2e8f0; border-radius: 8px; padding: 2px; }
.cv-cl-yn label { padding: 4px 10px; font-size: 12px; font-weight: 500; border-radius: 6px; cursor: pointer; }
.cv-cl-yn input:checked + label { background: var(--primary, #0d6efd); color: #fff; }
</style>


<main class="container-fluid px-3 py-2">
  <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <div>
      <h1 class="font-display fw-bold mb-1 page-title">#46 GG COMPANY</h1>
      <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
        <i class="bi bi-people fs-6"></i><a href="customers.php" class="text-neutral text-decoration-none">Customers</a><i class="bi bi-chevron-right"></i><span class="fw-bold text-dark" id="cvCrumbTab">Contacts</span>
        <!-- <span class="ms-2">Customer from Lead</span> -->
      </nav>
    </div>
    <a href="customers.php" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-1"></i>Back to customers</a>
  </div>

  <div class="row g-0 bg-white rounded-4 border overflow-hidden shadow-sm align-items-start">
    <!-- Left sidebar (Bootstrap pills — toggles the panes on the right, URL hash follows) -->
    <aside class="col-12 col-lg-3 col-xl-2 border-end p-2 bg-white sticky-top cv-side" style="top:calc(var(--topbar-h, 70px) + 12px);max-height:calc(100vh - var(--topbar-h, 70px) - 36px);overflow-y:auto;" id="cvSide" role="tablist" aria-orientation="vertical" aria-label="Customer sections">
      <div class="mb-2">
        <div class="text-uppercase text-muted fw-bold px-3 pt-2 pb-1" style="font-size:11px;letter-spacing:0.5px;">Overview</div>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-profile" data-tab="profile" data-bs-target="#cvTab-profile" role="tab" aria-controls="cvTab-profile" aria-selected="false">
          <i class="bi bi-person-circle"></i>Profile </a>
        <a href="javascript:void(0)" class="cv-side-link active" id="cvSideLink-contacts" data-tab="contacts" data-bs-target="#cvTab-contacts" role="tab" aria-controls="cvTab-contacts" aria-selected="true">
          <i class="bi bi-person-fill"></i>Contacts <span class="badge bg-primary-subtle text-primary rounded-pill ms-auto">4</span> </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-notes" data-tab="notes" data-bs-target="#cvTab-notes" role="tab" aria-controls="cvTab-notes" aria-selected="false">
          <i class="bi bi-journal-text"></i>Notes </a>
      </div>
      <div class="mb-2">
        <div class="text-uppercase text-muted fw-bold px-3 pt-2 pb-1" style="font-size:11px;letter-spacing:0.5px;">Sales</div>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-proposals" data-tab="proposals" data-bs-target="#cvTab-proposals" role="tab" aria-controls="cvTab-proposals" aria-selected="false">
          <i class="bi bi-file-earmark"></i>Proposals </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-estimates" data-tab="estimates" data-bs-target="#cvTab-estimates" role="tab" aria-controls="cvTab-estimates" aria-selected="false">
          <i class="bi bi-file-earmark"></i>Estimates </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-appointments" data-tab="appointments" data-bs-target="#cvTab-appointments" role="tab" aria-controls="cvTab-appointments" aria-selected="false">
          <i class="bi bi-calendar3"></i>Appointments </a>
      </div>
      <div class="mb-2">
        <div class="text-uppercase text-muted fw-bold px-3 pt-2 pb-1" style="font-size:11px;letter-spacing:0.5px;">Finance</div>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-invoices" data-tab="invoices" data-bs-target="#cvTab-invoices" role="tab" aria-controls="cvTab-invoices" aria-selected="false">
          <i class="bi bi-file-earmark-text"></i>Invoices </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-payments" data-tab="payments" data-bs-target="#cvTab-payments" role="tab" aria-controls="cvTab-payments" aria-selected="false">
          <i class="bi bi-graph-up"></i>Payments </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-statement" data-tab="statement" data-bs-target="#cvTab-statement" role="tab" aria-controls="cvTab-statement" aria-selected="false">
          <i class="bi bi-bar-chart-line"></i>Statement </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-credit_notes" data-tab="credit_notes" data-bs-target="#cvTab-credit_notes" role="tab" aria-controls="cvTab-credit_notes" aria-selected="false">
          <i class="bi bi-file-earmark-minus"></i>Credit Notes </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-purchase_orders" data-tab="purchase_orders" data-bs-target="#cvTab-purchase_orders" role="tab" aria-controls="cvTab-purchase_orders" aria-selected="false">
          <i class="bi bi-file-earmark-check"></i>Purchase Orders </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-subscriptions" data-tab="subscriptions" data-bs-target="#cvTab-subscriptions" role="tab" aria-controls="cvTab-subscriptions" aria-selected="false">
          <i class="bi bi-arrow-repeat"></i>Subscriptions </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-expenses" data-tab="expenses" data-bs-target="#cvTab-expenses" role="tab" aria-controls="cvTab-expenses" aria-selected="false">
          <i class="bi bi-receipt"></i>Expenses </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-contracts" data-tab="contracts" data-bs-target="#cvTab-contracts" role="tab" aria-controls="cvTab-contracts" aria-selected="false">
          <i class="bi bi-file-earmark-ruled"></i>Contracts </a>
      </div>
      <div class="mb-2">
        <div class="text-uppercase text-muted fw-bold px-3 pt-2 pb-1" style="font-size:11px;letter-spacing:0.5px;">Work</div>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-projects" data-tab="projects" data-bs-target="#cvTab-projects" role="tab" aria-controls="cvTab-projects" aria-selected="false">
          <i class="bi bi-diagram-3"></i>Projects </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-tasks" data-tab="tasks" data-bs-target="#cvTab-tasks" role="tab" aria-controls="cvTab-tasks" aria-selected="false">
          <i class="bi bi-list-check"></i>Tasks </a>
      </div>
      <div class="mb-2">
        <div class="text-uppercase text-muted fw-bold px-3 pt-2 pb-1" style="font-size:11px;letter-spacing:0.5px;">Support</div>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-tickets" data-tab="tickets" data-bs-target="#cvTab-tickets" role="tab" aria-controls="cvTab-tickets" aria-selected="false">
          <i class="bi bi-life-preserver"></i>Support Tickets <span class="badge bg-primary-subtle text-primary rounded-pill ms-auto">1</span> </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-email_log" data-tab="email_log" data-bs-target="#cvTab-email_log" role="tab" aria-controls="cvTab-email_log" aria-selected="false">
          <i class="bi bi-envelope-fill"></i>Email Log <span class="badge bg-primary-subtle text-primary rounded-pill ms-auto">1</span> </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-call_logs" data-tab="call_logs" data-bs-target="#cvTab-call_logs" role="tab" aria-controls="cvTab-call_logs" aria-selected="false">
          <i class="bi bi-telephone-fill"></i>Call Logs </a>
      </div>
      <div class="mb-2">
        <div class="text-uppercase text-muted fw-bold px-3 pt-2 pb-1" style="font-size:11px;letter-spacing:0.5px;">Other</div>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-shipping" data-tab="shipping" data-bs-target="#cvTab-shipping" role="tab" aria-controls="cvTab-shipping" aria-selected="false">
          <i class="bi bi-truck"></i>View Shipping Address </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-map" data-tab="map" data-bs-target="#cvTab-map" role="tab" aria-controls="cvTab-map" aria-selected="false">
          <i class="bi bi-geo-alt-fill"></i>Map </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-files" data-tab="files" data-bs-target="#cvTab-files" role="tab" aria-controls="cvTab-files" aria-selected="false">
          <i class="bi bi-paperclip"></i>Files </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-vault" data-tab="vault" data-bs-target="#cvTab-vault" role="tab" aria-controls="cvTab-vault" aria-selected="false">
          <i class="bi bi-lock-fill"></i>Vault </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-reminders" data-tab="reminders" data-bs-target="#cvTab-reminders" role="tab" aria-controls="cvTab-reminders" aria-selected="false">
          <i class="bi bi-clock"></i>Reminders </a>
        <a href="javascript:void(0)" class="cv-side-link" id="cvSideLink-activity_log" data-tab="activity_log" data-bs-target="#cvTab-activity_log" role="tab" aria-controls="cvTab-activity_log" aria-selected="false">
          <i class="bi bi-card-list"></i>Activity Log </a>
      </div>
    </aside>

    <!-- Right content -->
    <section class="col-12 col-lg-9 col-xl-10 p-3">
      <div class="tab-content" id="cvTabContent">
        <div class="tab-pane fade" id="cvTab-profile" role="tabpanel" aria-labelledby="cvSideLink-profile" tabindex="0">
          <div class="cv-title">Profile</div>
          <div class="card-custom p-0 cv-profile" id="cvProfile">
            <div class="cv-subtabs" role="tablist" aria-label="Profile sections">
              <button type="button" class="cv-subtab active" id="cvSubBtn-details" data-sub="details" data-bs-target="#cvSub-details" role="tab" aria-controls="cvSub-details" aria-selected="true">Customer Details</button>
              <button type="button" class="cv-subtab" id="cvSubBtn-billing" data-sub="billing" data-bs-target="#cvSub-billing" role="tab" aria-controls="cvSub-billing" aria-selected="false">Billing &amp; Shipping</button>
              <button type="button" class="cv-subtab" id="cvSubBtn-admins" data-sub="admins" data-bs-target="#cvSub-admins" role="tab" aria-controls="cvSub-admins" aria-selected="false">Customer Admins</button>
              <button type="button" class="cv-subtab" id="cvSubBtn-po" data-sub="po" data-bs-target="#cvSub-po" role="tab" aria-controls="cvSub-po" aria-selected="false">Purchase Order</button>
            </div>

            <div class="tab-content">
              <!-- Customer Details -->
              <div class="tab-pane cv-pane fade show active" id="cvSub-details" data-pane="details" role="tabpanel" aria-labelledby="cvSubBtn-details">
                <div class="p-3" style="max-width: 820px;">
                  <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="dShowContact">
                    <label class="form-check-label small fw-semibold" for="dShowContact">Show primary contact full name on Invoices, Estimates, Payments, Credit Notes</label>
                  </div>

                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dClientCode">Client code</label>
                    <input class="form-control" id="dClientCode">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dCompany"><span class="text-danger">* </span>Company</label>
                    <input class="form-control" id="dCompany" value="GG COMPANY">
                    <div class="text-danger small mt-1 cv-err" hidden>Company is required.</div>
                  </div>

                  <div class="row g-3 mb-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label small fw-bold" for="dBalance">Balance</label>
                      <input class="form-control" id="dBalance" inputmode="decimal">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label small fw-bold" for="dBalanceDate">as of</label>
                      <div class="date-picker"><input type="text" class="date-input form-control" id="dBalanceDate" placeholder="dd-mm-yyyy" autocomplete="off"></div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dPhone">Phone</label>
                    <input class="form-control" id="dPhone" value="9677063368">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dWebsite">Website</label>
                    <input class="form-control" id="dWebsite">
                  </div>

                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dGroups">Groups</label>
                    <div class="d-flex">
                      <select class="form-select cv-select rounded-end-0" id="dGroups">
                        <option value="">Non selected</option>
                        <option selected>Anand Mehta</option>
                        <option>VIP</option>
                        <option>Retail</option>
                      </select>
                      <button type="button" class="btn btn-outline-secondary rounded-start-0 js-demo" title="Add group" aria-label="Add group"><i class="bi bi-plus-lg"></i></button>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dCredit">Credit Days</label>
                    <select class="form-select cv-select" id="dCredit">
                      <option>0</option>
                      <option selected>1</option>
                      <option>7</option>
                      <option>15</option>
                      <option>30</option>
                      <option>45</option>
                      <option>60</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dCurrency"><i class="bi bi-question-circle me-1"></i>Currency</label>
                    <select class="form-select cv-select" id="dCurrency">
                      <option>System Default</option>
                      <option>INR (₹)</option>
                      <option>USD ($)</option>
                      <option>EUR (€)</option>
                    </select>
                  </div>

                  <hr class="my-4 text-muted">

                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dAddress">Address</label>
                    <textarea class="form-control" id="dAddress" rows="3">1/2 VOC STREET MENABADU AMBATTUR CHENNAI</textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dCountry">Country</label>
                    <select class="form-select cv-select" id="dCountry">
                      <option selected>India</option>
                      <option>United States</option>
                      <option>United Kingdom</option>
                      <option>United Arab Emirates</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dState">State</label>
                    <select class="form-select cv-select" id="dState">
                      <option value="">Nothing selected</option>
                      <option>Tamil Nadu</option>
                      <option>Karnataka</option>
                      <option>Kerala</option>
                      <option>Maharashtra</option>
                      <option>Andhra Pradesh</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dStateCode">State Code</label>
                    <input class="form-control" id="dStateCode">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dCity">City</label>
                    <select class="form-select cv-select" id="dCity">
                      <option value="">Nothing selected</option>
                      <option selected>Chennai</option>
                      <option>Coimbatore</option>
                      <option>Madurai</option>
                      <option>Bengaluru</option>
                      <option>Kochi</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dZip">Zip Code</label>
                    <input class="form-control" id="dZip" value="600006">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dPan">PAN No</label>
                    <input class="form-control" id="dPan" maxlength="10">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dGst">GST Number</label>
                    <input class="form-control" id="dGst" maxlength="15">
                  </div>
                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="dIndustry">Industry Type</label>
                    <textarea class="form-control" id="dIndustry" rows="3"></textarea>
                  </div>

                  <div class="row g-3 mb-3">
                    <div class="col-12 col-md-6">
                      <label class="form-label small fw-bold" for="dOpening">Opening Balance</label>
                      <input class="form-control" id="dOpening" placeholder="0.000" inputmode="decimal">
                    </div>
                    <div class="col-12 col-md-6">
                      <label class="form-label small fw-bold" for="dOpeningDate">As Of</label>
                      <div class="date-picker"><input type="text" class="date-input form-control" id="dOpeningDate" placeholder="dd-mm-yyyy" autocomplete="off"></div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label small fw-bold" for="cProfession"><span class="text-danger">* </span>Profession</label>
                    <select class="form-select cv-select" id="cProfession">
                      <option value="">Select profession</option>
                      <option selected>Builders</option>
                      <option>Contractors</option>
                      <option>Event Management</option>
                      <option>Manufacturing</option>
                      <option>Retail</option>
                    </select>
                    <div class="text-danger small mt-1 cv-err" hidden>Profession is required.</div>
                  </div>
                </div>
              </div>

              <!-- Billing & Shipping -->
              <div class="tab-pane cv-pane fade" id="cvSub-billing" data-pane="billing" role="tabpanel" aria-labelledby="cvSubBtn-billing">
                <div class="row g-4 p-3">
                  <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="fw-bold">Billing Address</span>
                      <button type="button" class="btn btn-link btn-sm p-0 text-decoration-none" id="cvSameAsInfo">Same as Customer Info</button>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="bStreet"><span class="text-danger">* </span>Street</label>
                      <textarea class="form-control" id="bStreet" rows="4">1/2 VOC STREET MENABADU AMBATTUR CHENNAI</textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="bCountry">Country</label>
                      <select class="form-select cv-select" id="bCountry">
                        <option value="">Non selected</option>
                        <option selected>India</option>
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>United Arab Emirates</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="bState">State</label>
                      <select class="form-select cv-select" id="bState">
                        <option value="">Nothing selected</option>
                        <option>Tamil Nadu</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Maharashtra</option>
                        <option>Andhra Pradesh</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="bCity">City</label>
                      <select class="form-select cv-select" id="bCity">
                        <option value="">Nothing selected</option>
                        <option selected>Chennai</option>
                        <option>Coimbatore</option>
                        <option>Madurai</option>
                        <option>Bengaluru</option>
                        <option>Kochi</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="bZip">Zip Code</label>
                      <input class="form-control" id="bZip" value="600006">
                    </div>
                  </div>
                  <div class="col-12 col-lg-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="fw-bold"><i class="bi bi-question-circle me-1"></i>Shipping Address</span>
                      <button type="button" class="btn btn-link btn-sm p-0 text-decoration-none" id="cvCopyBilling">Copy Billing Address</button>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="sStreet"><span class="text-danger">* </span>Street</label>
                      <textarea class="form-control" id="sStreet" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="sCountry">Country</label>
                      <select class="form-select cv-select" id="sCountry">
                        <option value="">Non selected</option>
                        <option>India</option>
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>United Arab Emirates</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="sState">State</label>
                      <select class="form-select cv-select" id="sState">
                        <option value="">Nothing selected</option>
                        <option>Tamil Nadu</option>
                        <option>Karnataka</option>
                        <option>Kerala</option>
                        <option>Maharashtra</option>
                        <option>Andhra Pradesh</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="sCity">City</label>
                      <select class="form-select cv-select" id="sCity">
                        <option value="">Nothing selected</option>
                        <option>Chennai</option>
                        <option>Coimbatore</option>
                        <option>Madurai</option>
                        <option>Bengaluru</option>
                        <option>Kochi</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label small fw-bold" for="sZip">Zip Code</label>
                      <input class="form-control" id="sZip">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Customer Admins -->
              <div class="tab-pane cv-pane fade" id="cvSub-admins" data-pane="admins" role="tabpanel" aria-labelledby="cvSubBtn-admins">
                <div class="card-custom p-0" id="cvCard-admins">
                  <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                    <div class="d-flex align-items-center gap-3">
                      <div class="icon-chip"><i class="bi bi-person-badge"></i></div>
                      <div>
                        <h3 class="card-title mb-0">Customer Admins</h3>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" id="cvAssignAdminBtn"><i class="bi bi-plus-lg me-1"></i>Assign Admin</button>
                  </div>
                  <div class="table-responsive table-modern-wrap overflow-auto column-border">
                    <table class="table-modern w-100 datatable" id="cvTbl-admins">
                      <thead>
                        <tr>
                          <th>Staff Member</th>
                          <th>Date Assigned</th>
                          <th>Options</th>
                        </tr>
                      </thead>
                      <tbody id="cvBody-admins">
                        <tr>
                          <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle" style="width:26px;height:26px;object-fit:cover;" alt=""><span>Karthik R</span></span></td>
                          <td>16-09-2026 11:53</td>
                          <td><button type="button" class="btn btn-sm btn-outline-danger" title="Remove admin"><i class="mdi mdi-delete"></i></button></td>
                        </tr>
                        <tr>
                          <td><span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle" style="width:26px;height:26px;object-fit:cover;" alt=""><span>Divya M</span></span></td>
                          <td>16-09-2026 11:53</td>
                          <td><button type="button" class="btn btn-sm btn-outline-danger" title="Remove admin"><i class="mdi mdi-delete"></i></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Purchase Order -->
              <div class="tab-pane cv-pane fade" id="cvSub-po" data-pane="po" role="tabpanel" aria-labelledby="cvSubBtn-po">
                <div class="card-custom p-0" id="cvCard-profile-po">
                  <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                    <div class="d-flex align-items-center gap-3">
                      <div class="icon-chip"><i class="bi bi-file-earmark-check"></i></div>
                      <div>
                        <h3 class="card-title mb-0">Purchase Order</h3>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive table-modern-wrap overflow-auto column-border">
                    <table class="table-modern w-100 datatable" id="cvTbl-profile-po">
                      <thead>
                        <tr>
                          <th>Purchase order</th>
                          <th>PO Value</th>
                          <th>Tax Value</th>
                          <th>PO Value Including Tax</th>
                          <th>Order date</th>
                        </tr>
                      </thead>
                      <tbody id="cvBody-profile-po">
                        <tr>
                          <td><a href="#" class="text-primary fw-semibold text-decoration-none">PO-2026-001</a></td>
                          <td>₹ 45,000</td>
                          <td>₹ 8,100</td>
                          <td>₹ 53,100</td>
                          <td>16-09-2026</td>
                        </tr>
                        <tr>
                          <td><a href="#" class="text-primary fw-semibold text-decoration-none">PO-2026-002</a></td>
                          <td>₹ 32,000</td>
                          <td>₹ 5,760</td>
                          <td>₹ 37,760</td>
                          <td>05-09-2026</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-end p-3 border-top" id="cvFormFoot"><button type="button" class="btn btn-primary" id="cvSubmit">Submit</button></div>
          </div>
        </div>
        <div class="tab-pane fade show active" id="cvTab-contacts" role="tabpanel" aria-labelledby="cvSideLink-contacts" tabindex="0">
          <div class="card-custom p-0" id="cvCard-contacts">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-person-fill"></i></div>
                <div>
                  <h3 class="card-title mb-0">Contacts</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewContactBtn"><i class="bi bi-plus-lg me-1"></i>New Contact</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-contacts">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role Position</th>
                    <th>Phone</th>
                    <th>Active</th>
                    <th>Last Login</th>
                  </tr>
                </thead>
                <tbody id="cvBody-contacts">
                  <tr class="cv-row">
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link">MOHAN S</a></span>
                    </td>
                    <td>
                      <a href="mailto:kaviyarasu@ghratechnology.com" class="cv-link">kaviyarasu@ghratechnology.com</a>
                    </td>
                    <td>
                      Event Management </td>
                    <td>
                      <a href="tel:9677063368" class="cv-link">9677063368</a>
                    </td>
                    <td>
                      <label class="cust-switch"><input type="checkbox" checked aria-label="Active"><span class="slider"></span></label>
                    </td>
                    <td>
                      16-09-2026 11:53 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link">Kaviyarasu M</a></span>
                    </td>
                    <td>
                      <a href="mailto:kaviyarasu@gmail.com" class="cv-link">kaviyarasu@gmail.com</a>
                    </td>
                    <td>
                      Project Manager </td>
                    <td>
                      <a href="tel:9840123456" class="cv-link">9840123456</a>
                    </td>
                    <td>
                      <label class="cust-switch"><input type="checkbox" checked aria-label="Active"><span class="slider"></span></label>
                    </td>
                    <td>
                      14-09-2026 10:20 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link">Suresh Babu</a></span>
                    </td>
                    <td>
                      <a href="mailto:suresh@ggcompany.com" class="cv-link">suresh@ggcompany.com</a>
                    </td>
                    <td>
                      Operations Head </td>
                    <td>
                      <a href="tel:9444123890" class="cv-link">9444123890</a>
                    </td>
                    <td>
                      <label class="cust-switch"><input type="checkbox" checked aria-label="Active"><span class="slider"></span></label>
                    </td>
                    <td>
                      12-09-2026 15:45 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><a href="#" class="cv-link">Priya S</a></span>
                    </td>
                    <td>
                      <a href="mailto:priya@ggcompany.com" class="cv-link">priya@ggcompany.com</a>
                    </td>
                    <td>
                      Finance &amp; Accounts </td>
                    <td>
                      <a href="tel:9841198765" class="cv-link">9841198765</a>
                    </td>
                    <td>
                      <label class="cust-switch"><input type="checkbox" checked aria-label="Active"><span class="slider"></span></label>
                    </td>
                    <td>
                      09-09-2026 09:12 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-notes" role="tabpanel" aria-labelledby="cvSideLink-notes" tabindex="0">
          <div class="card-custom p-0" id="cvCard-notes">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-journal-text"></i></div>
                <div>
                  <h3 class="card-title mb-0">Notes</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewNoteBtn"><i class="bi bi-plus-lg me-1"></i>New Note</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-notes">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Added By</th>
                    <th>Date Added</th>
                  </tr>
                </thead>
                <tbody id="cvBody-notes">
                  <tr class="cv-row">
                    <td>
                      Requested revised quotation for event setup. </td>
                    <td>
                      Admin </td>
                    <td>
                      14-09-2026 10:12 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      Follow-up call scheduled for next week. </td>
                    <td>
                      Sales Team </td>
                    <td>
                      10-09-2026 16:40 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-proposals" role="tabpanel" aria-labelledby="cvSideLink-proposals" tabindex="0">
          <div class="card-custom p-0" id="cvCard-proposals">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-file-earmark"></i></div>
                <div>
                  <h3 class="card-title mb-0">Proposals</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewProposalBtn"><i class="bi bi-plus-lg me-1"></i>New Proposal</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-proposals">
                <thead>
                  <tr>
                    <th>Proposal #</th>
                    <th>Subject</th>
                    <th>Total</th>
                    <th>Open Till</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="cvBody-proposals">
                  <tr class="cv-row">
                    <td>
                      PRO-0007 </td>
                    <td>
                      Corporate event management </td>
                    <td>
                      ₹ 1,20,000 </td>
                    <td>
                      30-09-2026 </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Sent</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      PRO-0004 </td>
                    <td>
                      Annual maintenance </td>
                    <td>
                      ₹ 60,000 </td>
                    <td>
                      01-09-2026 </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Accepted</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-estimates" role="tabpanel" aria-labelledby="cvSideLink-estimates" tabindex="0">
          <!-- Estimates — title + buttons + year select + KPI cards + table flow -->


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
          <div class="row g-2 mb-3">
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Draft</div><div class="fs-5 fw-bold text-dark">₹ 22,000</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Sent</div><div class="fs-5 fw-bold text-dark">₹ 38,000</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-warning">Expired</div><div class="fs-5 fw-bold text-dark">₹ 0.00</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-danger">Declined</div><div class="fs-5 fw-bold text-dark">₹ 15,000</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Accepted</div><div class="fs-5 fw-bold text-dark">₹ 0.00</div></div></div>
          </div>

          <div class="card-custom p-0" id="cvCard-estimates">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-file-earmark"></i></div>
                <div>
                  <h3 class="card-title mb-0">Estimates</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-estimates">
                <thead>
                  <tr>
                    <th>Estimate #</th>
                    <th>Amount</th>
                    <th>Total Tax</th>
                    <th>Project</th>
                    <th>Tags</th>
                    <th>Date</th>
                    <th>Expiry Date</th>
                    <th>Reference #</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="cvBody-estimates">
                  <tr class="cv-row">
                    <td>
                      <a href="#" class="cv-link">EST-000021</a>
                    </td>
                    <td>
                      <strong>₹ 38,000</strong>
                    </td>
                    <td>
                      ₹ 0 </td>
                    <td>
                      Solar Installation </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Hot</span>
                    </td>
                    <td>
                      03-09-2026 </td>
                    <td>
                      17-09-2026 </td>
                    <td>
                      <a href="#" class="cv-link">REF-021</a>
                    </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Sent</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <a href="#" class="cv-link">EST-000018</a>
                    </td>
                    <td>
                      <strong>₹ 15,000</strong>
                    </td>
                    <td>
                      ₹ 0 </td>
                    <td>
                      AMC Renewal </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Warm</span>
                    </td>
                    <td>
                      20-08-2026 </td>
                    <td>
                      03-09-2026 </td>
                    <td>
                      <a href="#" class="cv-link">REF-018</a>
                    </td>
                    <td>
                      <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Declined</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <a href="#" class="cv-link">EST-000014</a>
                    </td>
                    <td>
                      <strong>₹ 22,000</strong>
                    </td>
                    <td>
                      ₹ 0 </td>
                    <td>
                      Event Management </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Hot</span>
                    </td>
                    <td>
                      10-08-2026 </td>
                    <td>
                      24-08-2026 </td>
                    <td>
                      <a href="#" class="cv-link">REF-014</a>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Draft</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Create New Estimate modal — fullscreen (image 2 fields) -->
            <div class="modal fade" id="cvNewEstimateModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content cv-inv-modal">
                  <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-file-earmark"></i></div>
                      <div style="min-width:0;">
                        <h5 class="modal-title mb-0 fw-bold">Create New Estimate</h5>
                        <div class="small text-muted">GG COMPANY · New estimate</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-4 bg-light-subtle">
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white"><div class="row g-4"><!-- Left column --><div class="col-12 col-lg-6">
                        <div class="mb-3"><label><span class="text-danger">* </span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                        <div class="row g-3 mb-3">
                          <div>
                            <label class="form-label small fw-bold"><i class="bi bi-pencil-square"></i> Bill To</label>
                            <div class="cv-inv-addr-text">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100<br>Chennai, Tamil Nadu<br>IN, 600100</div>
                          </div>
                          <div>
                            <label class="form-label small fw-bold">Ship to</label>
                            <div class="cv-inv-addr-text" style="color:#9ca3af;">---, ---<br>---, ---</div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label><span class="text-danger">* </span>Estimate Number <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                          <div class="input-group"><span class="input-group-text bg-light fw-bold text-muted">EST-</span><input type="text" class="form-control" value="059"></div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label><span class="text-danger">* </span>Estimate Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                          <div class="mb-3"><label>Expiry Date</label><input type="date" class="form-control" value="2026-09-30"></div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label>Advance Payment</label><select class="form-select">
                              <option selected>Select Advance Payment</option>
                              <option>25% Advance</option>
                              <option>50% Advance</option>
                              <option>Full Advance</option>
                            </select></div>
                          <div class="mb-3"><label>Bank Accounts</label><select class="form-select">
                              <option selected>Select Banking</option>
                              <option>HDFC Bank - 50100234567890</option>
                              <option>ICICI Bank - 602305123456</option>
                            </select></div>
                        </div>
                      </div><!-- Right column --><div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label><i class="bi bi-tag me-1"></i>Tags</label>
                          <div class="nl-tags-wrap" style="max-width:100%;">
                            <div class="nl-tags-chips"></div>
                            <input type="text" class="nl-tags-input" placeholder="Tag">
                          </div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label><span class="text-danger">* </span>Currency</label><select class="form-select">
                              <option selected>INR ₹</option>
                              <option>USD $</option>
                            </select></div>
                          <div class="mb-3"><label>Status</label><select class="form-select">
                              <option selected>Draft</option>
                              <option>Sent</option>
                              <option>Expired</option>
                              <option>Declined</option>
                              <option>Accepted</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label>Reference #</label><input type="text" class="form-control"></div>
                        <div class="mb-3"><label>Purchase order</label><select class="form-select">
                            <option selected>Non selected</option>
                            <option>PO-0011 — Event setup</option>
                            <option>PO-0014 — AMC renewal</option>
                          </select></div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label>Sale Agent</label><select class="form-select">
                              <option selected>gharuda SOFTWARE</option>
                              <option>Karthik R</option>
                              <option>Divya M</option>
                            </select></div>
                          <div class="mb-3"><label>Discount type</label><select class="form-select">
                              <option selected>No discount</option>
                              <option>Before Tax</option>
                              <option>After Tax</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label>Admin Note</label><textarea class="form-control" rows="4"></textarea></div>
                      </div>
                    </div>

                    <!-- Items section -->
                    <div class="cv-inv-items" style="margin-top:20px;border-top:1px solid #e5e7eb;padding-top:20px;">
                      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
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
                        <div class="d-flex align-items-center gap-3 small">
                          <span>Show quantity as:</span>
                          <label><input type="radio" name="cvEstQty" checked> Qty</label>
                          <label><input type="radio" name="cvEstQty"> Hours</label>
                          <label><input type="radio" name="cvEstQty"> Qty/Hours</label>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered align-middle">
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
                              <td><input type="number" class="form-control" value="1" min="0">
                                <div class="cv-inv-unit">Unit</div>
                              </td>
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
                          <div class="d-flex justify-content-between align-items-center mb-2 small" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl">Transport Amount</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl cv-est-adv">Advance Received</span><span class="val cv-est-adv">0</span></div>
                          <div class="d-flex justify-content-between align-items-center fs-6 fw-bold text-primary border-top pt-2 mt-2" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
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
                    <div class="mb-3"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="estItDesc"></div>
                    <div class="mb-3"><label>Long Description</label><textarea class="form-control" id="estItLongDesc" rows="3"></textarea></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="estItRateInr" step="0.01"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>HSN Code</label><input type="text" class="form-control" id="estItHsn"></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Rate - USD</label><input type="number" class="form-control" id="estItRateUsd" step="0.01"></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 1</label><select class="form-select" id="estItTax1">
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 2</label><select class="form-select" id="estItTax2" disabled>
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Unit</label><input type="text" class="form-control" id="estItUnit" placeholder="Unit"></div>
                    <div class="mb-3 mb-0"><label>Item Group</label><select class="form-select" id="estItGroup">
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
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                      <h5 class="modal-title" id="cvEstZipTitle" style="font-size:15.5px;font-weight:800;">ZIP Estimates</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3">
                      <label>Status</label>
                      <div class="d-flex flex-wrap gap-2 mt-2">
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvEstZipStatus" value="All" checked><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-circle-half"></i>All</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvEstZipStatus" value="Draft"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-pencil"></i>Draft</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvEstZipStatus" value="Sent"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-send"></i>Sent</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvEstZipStatus" value="Expired"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-clock-history"></i>Expired</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvEstZipStatus" value="Declined"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-x-circle"></i>Declined</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvEstZipStatus" value="Accepted"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-check-circle"></i>Accepted</span></label>
                      </div>
                    </div>
                    <div class="mb-3"><label>From Date:</label><input type="date" class="form-control" id="cvEstZipFrom"></div>
                    <div class="mb-3 mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvEstZipTo"></div>
                    <div class="alert alert-info py-2 px-3 small d-flex align-items-center gap-2 mt-3"><i class="bi bi-info-circle me-1"></i>Estimates matching the selected status and date range will be bundled into a single ZIP file.</div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvEstZipSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
        <div class="tab-pane fade" id="cvTab-appointments" role="tabpanel" aria-labelledby="cvSideLink-appointments" tabindex="0">
          <div class="card-custom p-0" id="cvCard-appointments">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-calendar3"></i></div>
                <div>
                  <h3 class="card-title mb-0">Appointments</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewApptBtn" data-bs-toggle="modal" data-bs-target="#apmContactModal"><i class="bi bi-plus-lg me-1"></i>New Appointment</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-appointments">
                <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="cvBody-appointments">
                  <tr class="cv-row">
                    <td>
                      Site visit </td>
                    <td>
                      22-09-2026 </td>
                    <td>
                      11:00 AM </td>
                    <td>
                      Karthik R </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Pending</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      Requirement discussion </td>
                    <td>
                      05-09-2026 </td>
                    <td>
                      03:30 PM </td>
                    <td>
                      Divya M </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Completed</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-invoices" role="tabpanel" aria-labelledby="cvSideLink-invoices" tabindex="0">
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
            <div class="row g-2 mb-3">
              <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-primary">Opening Balance</div><div class="fs-5 fw-bold text-dark">₹ 0.00</div></div></div>
              <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-warning">Invoices Outstanding</div><div class="fs-5 fw-bold text-dark">₹ 45,000</div></div></div>
              <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-danger">Total Outstanding</div><div class="fs-5 fw-bold text-dark">₹ 53,000</div></div></div>
              <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-danger">Past Due Invoices</div><div class="fs-5 fw-bold text-dark">₹ 8,000</div></div></div>
              <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Paid Invoices</div><div class="fs-5 fw-bold text-dark">₹ 12,500</div></div></div>
            </div>
          </div>

          <div class="card-custom p-0" id="cvCard-invoices">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-file-earmark-text"></i></div>
                <div>
                  <h3 class="card-title mb-0">Invoices</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-invoices">
                <thead>
                  <tr>
                    <th>Invoice #</th>
                    <th>Amount</th>
                    <th>Total Tax</th>
                    <th>Date</th>
                    <th>Sales Agent</th>
                    <th>Project</th>
                    <th>Tags</th>
                    <th>Due Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="cvBody-invoices">
                  <tr class="cv-row">
                    <td><a href="#" class="cv-link">INV-000112</a></td>
                    <td>₹ 45,000</td>
                    <td>₹ 0</td>
                    <td>01-09-2026</td>
                    <td>Karthik R</td>
                    <td>Solar Installation</td>
                    <td><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Hot</span></td>
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
                    <td><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Warm</span></td>
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

            <!-- Create New Invoice modal -->
            <div class="modal fade" id="cvNewInvoiceModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                  <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-receipt-cutoff fs-5"></i></div>
                      <div>
                        <h5 class="modal-title mb-0 fw-bold">Create New Invoice</h5>
                        <div class="small text-muted">GG COMPANY · New invoice</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-4 bg-light-subtle">
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white">
                      <div class="row g-4">
                        <!-- Left column -->
                        <div class="col-12 col-lg-6">
                          <div class="mb-3">
                            <label class="form-label small fw-bold"><span class="text-danger">* </span>Customer</label>
                            <input type="text" class="form-control" value="GG COMPANY" readonly>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small fw-bold">Sales Order</label>
                            <select class="form-select">
                              <option value="">Non selected</option>
                              <option>SO-0003 — Solar Installation</option>
                              <option>SO-0007 — AMC Renewal</option>
                            </select>
                          </div>
                          <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold"><i class="bi bi-pencil-square me-1"></i>Bill to</label>
                              <div class="small text-muted p-2 bg-light rounded border">1/2 VOC STREET MENABADU AMBATTUR CHENNAI<br>Chennai, ---<br>IN, 006</div>
                            </div>
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Ship to</label>
                              <select class="form-select">
                                <option selected>Select Shipping Address</option>
                                <option>GG COMPANY - Anna Nagar</option>
                                <option>GG COMPANY - T. Nagar</option>
                              </select>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small fw-bold">Credit Days</label>
                            <select class="form-select">
                              <option>0</option>
                              <option selected>1</option>
                              <option>7</option>
                              <option>15</option>
                              <option>30</option>
                              <option>45</option>
                              <option>60</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small fw-bold"><span class="text-danger">* </span>Invoice Number <i class="bi bi-question-circle text-muted"></i></label>
                            <div class="input-group">
                              <span class="input-group-text bg-light fw-bold text-muted">INV-</span>
                              <input type="text" class="form-control" value="258">
                            </div>
                          </div>
                          <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold"><span class="text-danger">* </span>Invoice Date</label>
                              <input type="date" class="form-control" value="2026-09-22">
                            </div>
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Due Date</label>
                              <input type="date" class="form-control" value="2026-09-23">
                            </div>
                          </div>
                          <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Customer PO No.</label>
                              <input type="text" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Vehicle Number</label>
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="cvInvPreventOverdue">
                            <label class="form-check-label small text-muted" for="cvInvPreventOverdue">Prevent sending overdue reminders for this invoice</label>
                          </div>
                        </div>
                        <!-- Right column -->
                        <div class="col-12 col-lg-6">
                          <div class="mb-3">
                            <label class="form-label small fw-bold"><i class="bi bi-tag me-1"></i>Tags</label>
                            <div class="border rounded p-2 bg-white d-flex flex-wrap gap-1 align-items-center" style="min-height:38px;">
                              <div class="nl-tags-chips"></div>
                              <input type="text" class="border-0 outline-0 flex-grow-1 nl-tags-input" placeholder="Tag" style="outline:none;">
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small fw-bold">Allowed payment modes for this invoice</label>
                            <select class="form-select">
                              <option>Bank, Rave, Instamojo, Paypal Smart Checkout, PayPal, PayU Money, Stripe Checkout</option>
                            </select>
                          </div>
                          <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold"><i class="bi bi-question-circle text-muted me-1"></i>Currency</label>
                              <select class="form-select">
                                <option>System Default</option>
                                <option>INR (₹)</option>
                                <option>USD ($)</option>
                              </select>
                            </div>
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Sale Agent</label>
                              <select class="form-select">
                                <option>Non selected</option>
                                <option selected>Karthik R</option>
                                <option>Divya M</option>
                              </select>
                            </div>
                          </div>
                          <div class="row g-3 mb-3">
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Discount Type</label>
                              <select class="form-select">
                                <option>No discount</option>
                                <option>Before Tax</option>
                                <option>After Tax</option>
                              </select>
                            </div>
                            <div class="col-12 col-sm-6">
                              <label class="form-label small fw-bold">Recurring Invoice?</label>
                              <select class="form-select">
                                <option>No</option>
                                <option>Every 1 month</option>
                                <option>Every 3 months</option>
                                <option>Every 6 months</option>
                                <option>Every 12 months</option>
                              </select>
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label small fw-bold">Admin note</label>
                            <textarea class="form-control" rows="3" placeholder="Enter admin note..."></textarea>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Items Section -->
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white">
                      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                        <div class="d-flex align-items-center gap-2">
                          <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-1" id="cvInvAddItem" title="Add item"><i class="bi bi-plus-lg"></i> Add Item</button>
                        </div>
                        <div class="d-flex align-items-center gap-3 small">
                          <span class="text-muted fw-bold">Show quantity as:</span>
                          <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="radio" name="cvInvQty" id="cvInvQty1" checked>
                            <label class="form-check-label" for="cvInvQty1">Qty</label>
                          </div>
                          <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="radio" name="cvInvQty" id="cvInvQty2">
                            <label class="form-check-label" for="cvInvQty2">Hours</label>
                          </div>
                          <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="radio" name="cvInvQty" id="cvInvQty3">
                            <label class="form-check-label" for="cvInvQty3">Qty/Hours</label>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                          <thead class="table-light">
                            <tr>
                              <th style="width:30px;"><i class="bi bi-info-circle text-muted"></i></th>
                              <th>Item</th>
                              <th style="width:200px;">Description</th>
                              <th style="width:100px;">Qty</th>
                              <th style="width:120px;">Rate</th>
                              <th style="width:110px;">Discount %</th>
                              <th style="width:130px;">Tax</th>
                              <th style="width:120px;">Amount</th>
                              <th style="width:50px;"><i class="bi bi-gear text-muted"></i></th>
                            </tr>
                          </thead>
                          <tbody id="cvInvItemBody">
                            <tr>
                              <td class="text-center"><i class="bi bi-info-circle text-muted"></i></td>
                              <td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>
                              <td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>
                              <td>
                                <input type="number" class="form-control mb-1" value="1" min="0">
                                <span class="small text-muted">Unit</span>
                              </td>
                              <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                              <td><input type="number" class="form-control" value="0.00" step="0.01"></td>
                              <td>
                                <select class="form-select">
                                  <option selected>No Tax</option>
                                  <option>GST 5%</option>
                                  <option>GST 12%</option>
                                  <option>GST 18%</option>
                                </select>
                              </td>
                              <td><span class="fw-bold text-dark cv-inv-amt">₹ 0.00</span></td>
                              <td><button type="button" class="btn btn-sm btn-outline-success cv-inv-check" title="Confirm"><i class="bi bi-check-lg"></i></button></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- Totals -->
                      <div class="d-flex justify-content-end mt-3">
                        <div class="border rounded-3 p-3 bg-light" style="width: 360px;">
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="text-muted fw-bold">Sub Total :</span><span class="fw-bold">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small">
                            <span class="text-muted fw-bold">Adjustment</span>
                            <div class="d-flex align-items-center gap-2">
                              <input type="number" class="form-control form-control-sm" style="width:80px;" value="0">
                              <span class="fw-bold">₹ 0.00</span>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small">
                            <span class="text-muted fw-bold">Transport Amount</span>
                            <div class="d-flex align-items-center gap-2">
                              <input type="number" class="form-control form-control-sm" style="width:80px;" value="0">
                              <span class="fw-bold">₹ 0.00</span>
                            </div>
                          </div>
                          <hr class="my-2">
                          <div class="d-flex justify-content-between align-items-center fs-6 fw-bold text-primary"><span>Total :</span><span>₹ 0.00</span></div>
                        </div>
                      </div>
                    </div>

                    <!-- Notes -->
                    <div class="card border-0 shadow-sm p-4 bg-white">
                      <div class="mb-3">
                        <label class="form-label small fw-bold">Client Note</label>
                        <textarea class="form-control" placeholder="Enter client note..."></textarea>
                      </div>
                      <div class="mb-0">
                        <label class="form-label small fw-bold">Terms &amp; Conditions</label>
                        <textarea class="form-control" rows="3" placeholder="Enter terms and conditions..."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer bg-white border-top p-3 d-flex justify-content-between align-items-center">
                    <span class="small text-muted">Include invoice items with merge field anywhere in invoice content as {invoice_items}</span>
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
                    <div class="mb-3"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="cvItDesc"></div>
                    <div class="mb-3"><label>Long Description</label><textarea class="form-control" id="cvItLongDesc" rows="3"></textarea></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="cvItRateInr" step="0.01"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>HSN Code</label><input type="text" class="form-control" id="cvItHsn"></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Rate - USD</label><input type="number" class="form-control" id="cvItRateUsd" step="0.01"></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 1</label><select class="form-select" id="cvItTax1">
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 2</label><select class="form-select" id="cvItTax2" disabled>
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Unit</label><input type="text" class="form-control" id="cvItUnit" placeholder="Unit"></div>
                    <div class="mb-3 mb-0"><label>Item Group</label><select class="form-select" id="cvItGroup">
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
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                      <h5 class="modal-title" id="cvZipTitle" style="font-size:15.5px;font-weight:800;">ZIP Invoices</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3">
                      <label>Status</label>
                      <div class="d-flex flex-wrap gap-2 mt-2">
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="All" checked><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-circle-half"></i>All</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="Unpaid"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-hourglass-split"></i>Unpaid</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="Paid"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-check2-circle"></i>Paid</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="Partially Paid"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-pie-chart"></i>Partially Paid</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="Overdue"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-exclamation-circle"></i>Overdue</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="Cancelled"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-x-circle"></i>Cancelled</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvZipStatus" value="Draft"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-pencil"></i>Draft</span></label>
                      </div>
                    </div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>From Date:</label><input type="date" class="form-control" id="cvZipFrom"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvZipTo"></div>
                      </div>
                    </div>
                    <div class="alert alert-info py-2 px-3 small d-flex align-items-center gap-2 mt-3"><i class="bi bi-info-circle me-1"></i>Invoices matching the selected status and date range will be bundled into a single ZIP file.</div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvZipSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-payments" role="tabpanel" aria-labelledby="cvSideLink-payments" tabindex="0">
          <!-- Payments — status filter (first image) + Zip Payments + table flow -->


          <div class="cv-pay-actions mt-3 ms-3 mb-0">
            <button type="button" class="btn btn-primary" id="cvZipPaymentsBtn"><i class="bi bi-file-zip me-1"></i>Zip Payments</button>
          </div>

          <div class="card-custom p-0" id="cvCard-payments">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-graph-up"></i></div>
                <div>
                  <h3 class="card-title mb-0">Payments</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-payments">
                <thead>
                  <tr>
                    <th>Payment #</th>
                    <th>Invoice #</th>
                    <th>Payment Mode</th>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody id="cvBody-payments">
                  <tr class="cv-row">
                    <td>
                      PAY-000041 </td>
                    <td>
                      <a href="#" class="cv-link">INV-000118</a>
                    </td>
                    <td>
                      Bank Transfer (NEFT) </td>
                    <td>
                      <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">NEFT9821304571</code>
                    </td>
                    <td>
                      <strong>₹ 12,500</strong>
                    </td>
                    <td>
                      15-09-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      PAY-000034 </td>
                    <td>
                      <a href="#" class="cv-link">INV-000112</a>
                    </td>
                    <td>
                      Bank Transfer (NEFT) </td>
                    <td>
                      <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">NEFT8100477219</code>
                    </td>
                    <td>
                      <strong>₹ 20,000</strong>
                    </td>
                    <td>
                      08-09-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      PAY-000029 </td>
                    <td>
                      <a href="#" class="cv-link">INV-000098</a>
                    </td>
                    <td>
                      UPI </td>
                    <td>
                      <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">UPI7741209938</code>
                    </td>
                    <td>
                      <strong>₹ 12,500</strong>
                    </td>
                    <td>
                      12-08-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      PAY-000018 </td>
                    <td>
                      <a href="#" class="cv-link">INV-000087</a>
                    </td>
                    <td>
                      Cheque </td>
                    <td>
                      <code style="font-size:11.5px;color:var(--ink-700);background:#f1f4f3;border-radius:6px;padding:2px 7px;">CHQ0045120087</code>
                    </td>
                    <td>
                      <strong>₹ 8,000</strong>
                    </td>
                    <td>
                      05-08-2026 </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- ZIP Payments modal (second image) -->
            <div class="modal fade" id="cvZipPaymentModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvZipPayTitle">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border:none;border-radius:14px;">
                  <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                    <div class="d-flex align-items-center gap-2">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                      <h5 class="modal-title" id="cvZipPayTitle" style="font-size:15.5px;font-weight:800;">ZIP Payments</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3">
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
                    <div class="mb-3">
                      <label>From Date:</label>
                      <input type="date" class="form-control" id="cvZipPayFrom">
                    </div>
                    <div class="mb-3 mb-0">
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

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-statement" role="tabpanel" aria-labelledby="cvSideLink-statement" tabindex="0">
          <div class="font-display fw-bold fs-5 mb-3">Statement</div>

          <!-- Customer Statement — document style view -->
          <div class="card border shadow-sm p-0 mb-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3 border-bottom">
              <input type="text" class="form-control form-control-sm" style="max-width: 260px;" value="01-09-2026 to 30-09-2026" readonly aria-label="Statement period">
              <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sm js-stmt-print" title="Print"><i class="bi bi-printer"></i></button>
                <button type="button" class="btn btn-outline-secondary btn-sm js-stmt-pdf" title="Download PDF"><i class="bi bi-file-earmark-pdf"></i></button>
                <button type="button" class="btn btn-outline-secondary btn-sm js-stmt-email" title="Send by email"><i class="bi bi-envelope"></i></button>
                <button type="button" class="btn btn-outline-secondary btn-sm js-stmt-wa" title="Send via WhatsApp"><i class="bi bi-whatsapp"></i></button>
              </div>
            </div>

            <div class="p-4 bg-white" id="cvStmtDoc">
              <!-- Letterhead -->
              <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 pb-3 border-bottom mb-4">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-primary text-white fs-4 fw-bold d-flex align-items-center justify-content-center shadow-sm" style="width:52px;height:52px;flex-shrink:0;">KS</div>
                  <div style="min-width:0;">
                    <div class="fw-bold fs-6 mb-1">ghrA SOFTWARE TECHNOLOGY PRIVATE LIMITED</div>
                    <div class="small text-muted" style="line-height:1.6;">
                      PC 20 /3, 3rd Block, Mogappair West, Chennai- 560038, Tamil Nadu, India<br>
                      9865321670 · GST Number: 28AABCR7796N0O0
                    </div>
                  </div>
                </div>
                <div class="border rounded-3 p-3 bg-light" style="min-width:240px;">
                  <span class="badge bg-primary-subtle text-primary mb-2 text-uppercase"><i class="bi bi-receipt me-1"></i> Customer Statement</span>
                  <div class="d-flex justify-content-between small py-1"><span class="text-muted">Statement #</span><b>STMT-2026-0092</b></div>
                  <div class="d-flex justify-content-between small py-1"><span class="text-muted">Issue date</span><b>16-09-2026</b></div>
                  <div class="d-flex justify-content-between small py-1"><span class="text-muted">Period</span><b>01-09-2026 – 30-09-2026</b></div>
                </div>
              </div>

              <div class="fs-5 fw-bold mb-3">Customer Statement For GG COMPANY</div>

              <!-- Parties -->
              <div class="row g-3 align-items-stretch mb-4">
                <div class="col-12 col-md-8">
                  <div class="text-uppercase small fw-bold text-muted mb-2">Billed to</div>
                  <div class="card p-3 h-100 border bg-light-subtle d-flex flex-row align-items-start gap-3">
                    <div class="rounded-circle bg-secondary-subtle text-secondary fw-bold fs-5 d-flex align-items-center justify-content-center" style="width:44px;height:44px;flex-shrink:0;">GG</div>
                    <div style="min-width:0;">
                      <div class="fw-bold fs-6 mb-1">GG COMPANY</div>
                      <div class="text-muted small mb-1"><i class="bi bi-person me-2"></i>MOHAN S</div>
                      <div class="text-muted small mb-1"><i class="bi bi-envelope me-2"></i>kaviyarasu@ghratechnology.com</div>
                      <div class="text-muted small mb-1"><i class="bi bi-geo-alt me-2"></i>1/2 VOC Street, Menabadu, Ambattur, Chennai - 600053</div>
                      <div class="text-muted small mb-1"><i class="bi bi-telephone me-2"></i>9677063368</div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="card p-4 h-100 border-0 bg-primary-subtle text-primary d-flex flex-column justify-content-center rounded-3">
                    <div class="small fw-semibold text-uppercase">Total amount due</div>
                    <div class="fs-2 fw-bold my-1">₹ 37,500</div>
                    <div class="small text-muted">3 transactions this period</div>
                  </div>
                </div>
              </div>

              <!-- KPIs -->
              <div class="row g-3 mb-4">
                <div class="col-6 col-xl-3">
                  <div class="card p-3 border shadow-sm h-100 d-flex flex-row align-items-center gap-3">
                    <div class="rounded-circle bg-secondary-subtle text-secondary fs-4 p-2 d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-play-circle"></i></div>
                    <div>
                      <div class="small text-muted fw-semibold">Opening Balance</div>
                      <div class="fs-6 fw-bold">₹ 0.00</div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-xl-3">
                  <div class="card p-3 border shadow-sm h-100 d-flex flex-row align-items-center gap-3">
                    <div class="rounded-circle bg-danger-subtle text-danger fs-4 p-2 d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-file-earmark-arrow-up"></i></div>
                    <div>
                      <div class="small text-muted fw-semibold">Invoiced this period</div>
                      <div class="fs-6 fw-bold">₹ 57,500</div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-xl-3">
                  <div class="card p-3 border shadow-sm h-100 d-flex flex-row align-items-center gap-3">
                    <div class="rounded-circle bg-primary-subtle text-primary fs-4 p-2 d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-cash-coin"></i></div>
                    <div>
                      <div class="small text-muted fw-semibold">Payments received</div>
                      <div class="fs-6 fw-bold">₹ 20,000</div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-xl-3">
                  <div class="card p-3 border shadow-sm h-100 d-flex flex-row align-items-center gap-3">
                    <div class="rounded-circle bg-success-subtle text-success fs-4 p-2 d-flex align-items-center justify-content-center" style="width:44px;height:44px;"><i class="bi bi-wallet2"></i></div>
                    <div>
                      <div class="small text-muted fw-semibold">Closing Balance</div>
                      <div class="fs-6 fw-bold">₹ 37,500</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="table-responsive table-modern-wrap column-border">
                <table class="table-modern w-100">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Description</th>
                      <th>Debit</th>
                      <th>Credit</th>
                      <th>Balance</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="cv-row" data-date="01-09-2026" data-ref="INV-000112" data-type="Invoice" data-mode="Credit" data-debit="₹ 45,000" data-credit="—" data-balance="₹ 45,000" data-desc="Invoice INV-000112" data-notes="Solar installation — Phase 1 billing raised against purchase order PO-2291.">
                      <td>01-09-2026</td>
                      <td>Invoice INV-000112</td>
                      <td>₹ 45,000</td>
                      <td>—</td>
                      <td>₹ 45,000</td>
                      <td><button type="button" class="btn btn-sm btn-outline-primary cv-stmt-view" title="View transaction" aria-label="View transaction"><i class="bi bi-eye-fill"></i></button></td>
                    </tr>
                    <tr class="cv-row" data-date="08-09-2026" data-ref="PAY-000034" data-type="Payment" data-mode="Bank Transfer (NEFT)" data-debit="—" data-credit="₹ 20,000" data-balance="₹ 25,000" data-desc="Payment PAY-000034" data-notes="Payment received against invoice INV-000112.">
                      <td>08-09-2026</td>
                      <td>Payment PAY-000034</td>
                      <td>—</td>
                      <td>₹ 20,000</td>
                      <td>₹ 25,000</td>
                      <td><button type="button" class="btn btn-sm btn-outline-primary cv-stmt-view" title="View transaction" aria-label="View transaction"><i class="bi bi-eye-fill"></i></button></td>
                    </tr>
                    <tr class="cv-row" data-date="15-09-2026" data-ref="INV-000118" data-type="Invoice" data-mode="Credit" data-debit="₹ 12,500" data-credit="—" data-balance="₹ 37,500" data-desc="Invoice INV-000118" data-notes="AMC service charges for Q3 2026 as per service agreement.">
                      <td>15-09-2026</td>
                      <td>Invoice INV-000118</td>
                      <td>₹ 12,500</td>
                      <td>—</td>
                      <td>₹ 37,500</td>
                      <td><button type="button" class="btn btn-sm btn-outline-primary cv-stmt-view" title="View transaction" aria-label="View transaction"><i class="bi bi-eye-fill"></i></button></td>
                    </tr>
                    <tr class="table-light fw-bold">
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
            <div class="card shadow-lg border-0 rounded-4" style="max-width: 520px; width: 100%; margin: auto;">
              <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-receipt fs-5"></i></div>
                  <div>
                    <h5 id="cvStmtTitle" class="mb-0 fw-bold">Transaction details</h5>
                    <div class="small text-muted">Statement entry for GG COMPANY</div>
                  </div>
                </div>
                <button type="button" class="btn-close" id="cvStmtClose" aria-label="Close"></button>
              </div>

              <div class="card-body p-4">
                <div class="row g-3">
                  <div class="col-6">
                    <div class="small text-muted">Date</div>
                    <div class="fw-bold" id="sdDate">—</div>
                  </div>
                  <div class="col-6">
                    <div class="small text-muted">Reference #</div>
                    <div class="fw-bold" id="sdRef">—</div>
                  </div>
                  <div class="col-6">
                    <div class="small text-muted">Type</div>
                    <div class="fw-bold" id="sdType">—</div>
                  </div>
                  <div class="col-6">
                    <div class="small text-muted">Payment Mode</div>
                    <div class="fw-bold" id="sdMode">—</div>
                  </div>
                  <div class="col-6">
                    <div class="small text-muted">Debit</div>
                    <div class="fw-bold" id="sdDebit">—</div>
                  </div>
                  <div class="col-6">
                    <div class="small text-muted">Credit</div>
                    <div class="fw-bold" id="sdCredit">—</div>
                  </div>
                  <div class="col-12">
                    <div class="small text-muted">Running Balance</div>
                    <div class="fw-bold fs-5 text-primary" id="sdBal">—</div>
                  </div>
                  <div class="col-12">
                    <div class="small text-muted">Description</div>
                    <div class="fw-semibold" id="sdDesc">—</div>
                  </div>
                  <div class="col-12">
                    <div class="small text-muted">Notes</div>
                    <div class="small text-muted bg-light p-2 rounded" id="sdNotes">—</div>
                  </div>
                </div>
              </div>
              <div class="card-footer bg-white border-top p-3 d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary" id="cvStmtCancel">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-credit_notes" role="tabpanel" aria-labelledby="cvSideLink-credit_notes" tabindex="0">
          <!-- Credit Notes — credits banner + buttons + table flow -->


          <div class="mt-3 ms-3 cv-cn-banner"><i class="bi bi-cash-coin"></i>₹ 0.00 credits available.</div>

          <div class="cv-cn-actions ms-3 mb-0">
            <button type="button" class="btn btn-primary" id="cvCnNewBtn"><i class="bi bi-plus-lg me-1"></i>New Credit Note</button>
            <button type="button" class="btn btn-primary" id="cvCnZipBtn"><i class="bi bi-file-zip me-1"></i>Zip Credit Notes</button>
          </div>

          <div class="card-custom p-0" id="cvCard-credit_notes">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-file-earmark-minus"></i></div>
                <div>
                  <h3 class="card-title mb-0">Credit Notes</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-credit_notes">
                <thead>
                  <tr>
                    <th>Credit Note #</th>
                    <th>Credit Note Date</th>
                    <th>Status</th>
                    <th>Project</th>
                    <th>Reference #</th>
                    <th>Amount</th>
                    <th>Remaining Amount</th>
                  </tr>
                </thead>
                <tbody id="cvBody-credit_notes">
                  <tr class="cv-row">
                    <td>
                      <a href="#" class="cv-link">CN-0002</a>
                    </td>
                    <td>
                      20-08-2026 </td>
                    <td>
                      <span class="cv-cn-status open"><i class="bi bi-door-open"></i>Open</span>
                    </td>
                    <td>
                      Solar Installation </td>
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

            <!-- New Credit Note modal — fullscreen (image 2 fields) -->
            <div class="modal fade" id="cvNewCreditNoteModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content cv-inv-modal">
                  <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-file-earmark-minus"></i></div>
                      <div style="min-width:0;">
                        <h5 class="modal-title mb-0 fw-bold">New Credit Note</h5>
                        <div class="small text-muted">GG COMPANY · New credit note</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-4 bg-light-subtle">
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white"><div class="row g-4"><!-- Left column --><div class="col-12 col-lg-6">
                        <div class="mb-3"><label><span class="text-danger">* </span>Customer</label><select class="form-select">
                            <option selected>GG COMPANY</option>
                          </select></div>
                        <div class="row g-3 mb-3">
                          <div>
                            <label class="form-label small fw-bold"><i class="bi bi-pencil-square"></i> Bill To</label>
                            <div class="small text-muted p-2 bg-light rounded border">214, Vadasery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100<br>IN, 600100</div>
                          </div>
                          <div>
                            <label class="form-label small fw-bold">Ship to</label>
                            <div class="small text-muted p-2 bg-light rounded border" style="color:#9ca3af;">---<br>---<br>---, ---</div>
                          </div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label><span class="text-danger">* </span>Credit Note Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                          <div class="mb-3">
                            <label><span class="text-danger">* </span>Credit Note # <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                            <div class="input-group"><span class="input-group-text bg-light fw-bold text-muted">CN-</span><input type="text" class="form-control" value="23"></div>
                          </div>
                        </div>
                      </div><!-- Right column --><div class="col-12 col-lg-6">
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label><span class="text-danger">* </span>Currency</label><select class="form-select">
                              <option selected>INR ₹</option>
                              <option>USD $</option>
                            </select></div>
                          <div class="mb-3"><label>Discount type</label><select class="form-select">
                              <option selected>No discount</option>
                              <option>Before Tax</option>
                              <option>After Tax</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label>Reference #</label><input type="text" class="form-control"></div>
                        <div class="mb-3"><label>Admin Note</label><textarea class="form-control" rows="4"></textarea></div>
                      </div>
                    </div>

                    <!-- Items section --><div class="card border-0 shadow-sm p-4 mb-4 bg-white">
                      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
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
                        <div class="d-flex align-items-center gap-3 small">
                          <span>Show quantity as:</span>
                          <label><input type="radio" name="cvCnQty" checked> Qty</label>
                          <label><input type="radio" name="cvCnQty"> Only</label>
                          <label><input type="radio" name="cvCnQty"> Hours</label>
                          <label><input type="radio" name="cvCnQty"> Qty/Hours</label>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered align-middle">
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
                          <div class="d-flex justify-content-between align-items-center mb-2 small" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl">Discount</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center fs-6 fw-bold text-primary border-top pt-2 mt-2" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
                        </div>
                      </div>
                    </div>

                    </div><!-- Notes --><div class="card border-0 shadow-sm p-4 mb-4 bg-white">
                      <div class="mb-3"><label>Client Note</label><textarea class="form-control"></textarea></div>
                      <div class="mb-0"><label>Terms &amp; Conditions</label><textarea class="form-control" rows="3"></textarea></div>
                    </div>
                  </div>
                  <div class="modal-footer bg-white border-top p-3 d-flex justify-content-between align-items-center">
                    <span class="hint">Include credit note items with merge field anywhere in credit note content as {credit_note_items}</span>
                    <div class="d-flex gap-2">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Save &amp; Send</button>
                      <button type="button" class="btn btn-primary" id="cvCnSubmit">Submit</button>
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
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                      <h5 class="modal-title" id="cvCnZipTitle" style="font-size:15.5px;font-weight:800;">Zip Credit Notes</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3">
                      <label>Status</label>
                      <div class="d-flex flex-wrap gap-2 mt-2">
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvCnZipStatus" value="All" checked><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-circle-half"></i>All</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvCnZipStatus" value="Open"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-door-open"></i>Open</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvCnZipStatus" value="Closed"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-lock"></i>Closed</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvCnZipStatus" value="Void"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-x-circle"></i>Void</span></label>
                      </div>
                    </div>
                    <div class="mb-3"><label>From Date:</label><input type="date" class="form-control" id="cvCnZipFrom"></div>
                    <div class="mb-3 mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvCnZipTo"></div>
                    <div class="alert alert-info py-2 px-3 small d-flex align-items-center gap-2 mt-3"><i class="bi bi-info-circle me-1"></i>Credit notes matching the selected status and date range will be bundled into a single ZIP file.</div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvCnZipSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Add New Item modal (same #cvCnAddItemModal as Estimates — branches rendum render aagaathu) -->
            <div class="modal fade" id="cvCnAddItemModal" tabindex="-1" aria-hidden="true" aria-labelledby="cnEstAddItemTitle">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border:none;border-radius:14px;">
                  <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                    <h5 class="modal-title" id="cnEstAddItemTitle" style="font-size:15.5px;font-weight:800;">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="cnItDesc"></div>
                    <div class="mb-3"><label>Long Description</label><textarea class="form-control" id="cnItLongDesc" rows="3"></textarea></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="cnItRateInr" step="0.01"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>HSN Code</label><input type="text" class="form-control" id="cnItHsn"></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Rate - USD</label><input type="number" class="form-control" id="cnItRateUsd" step="0.01"></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 1</label><select class="form-select" id="cnItTax1">
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 2</label><select class="form-select" id="cnItTax2" disabled>
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Unit</label><input type="text" class="form-control" id="cnItUnit" placeholder="Unit"></div>
                    <div class="mb-3 mb-0"><label>Item Group</label><select class="form-select" id="cnItGroup">
                        <option value="">Non selected</option>
                        <option>Services</option>
                        <option>Products</option>
                        <option>Subscription</option>
                      </select></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvCnItemSave">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
        <div class="tab-pane fade" id="cvTab-purchase_orders" role="tabpanel" aria-labelledby="cvSideLink-purchase_orders" tabindex="0">
          <!-- Purchase Orders — estimates design flow (title + buttons + year + KPI cards + table) -->


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
          <div class="row g-2 mb-3">
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">New</div><div class="fs-5 fw-bold text-dark">₹ 27,000</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-danger">Cancelled</div><div class="fs-5 fw-bold text-dark">₹ 12,000</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Confirmed</div><div class="fs-5 fw-bold text-dark">₹ 45,500</div></div></div>
          </div>

          <div class="card-custom p-0" id="cvCard-purchase_orders">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-file-earmark-check"></i></div>
                <div>
                  <h3 class="card-title mb-0">Purchase Orders</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-purchase_orders">
                <thead>
                  <tr>
                    <th>Progress</th>
                    <th>Purchase Order #</th>
                    <th>Amount</th>
                    <th>Total Tax</th>
                    <th>Project</th>
                    <th>Tags</th>
                    <th>Date</th>
                    <th>Reference #</th>
                    <th>Status</th>
                    <th>Profoma Status</th>
                    <th>Profoma No</th>
                    <th>Profoma Date</th>
                  </tr>
                </thead>
                <tbody id="cvBody-purchase_orders">
                  <tr class="cv-row">
                    <td>
                      <div class="cv-po-prog"><span class="track"><span class="bar" style="width:40%"></span></span><span>40%</span></div>
                    </td>
                    <td>
                      <a href="#" class="cv-link">PO-0011</a>
                    </td>
                    <td>
                      <strong>₹ 27,000</strong>
                    </td>
                    <td>
                      ₹ 1,350 </td>
                    <td>
                      Solar Installation </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Material</span>
                    </td>
                    <td>
                      06-09-2026 </td>
                    <td>
                      <a href="#" class="cv-link">REF-011</a>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>New</span>
                    </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Generated</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">PRO-0031</a>
                    </td>
                    <td>
                      10-09-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <div class="cv-po-prog"><span class="track"><span class="bar" style="width:100%"></span></span><span>100%</span></div>
                    </td>
                    <td>
                      <a href="#" class="cv-link">PO-0009</a>
                    </td>
                    <td>
                      <strong>₹ 45,500</strong>
                    </td>
                    <td>
                      ₹ 2,275 </td>
                    <td>
                      AMC Renewal </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">Service</span>
                    </td>
                    <td>
                      28-08-2026 </td>
                    <td>
                      <a href="#" class="cv-link">REF-009</a>
                    </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Confirmed</span>
                    </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Generated</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">PRO-0029</a>
                    </td>
                    <td>
                      30-08-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <div class="cv-po-prog"><span class="track"><span class="bar" style="width:65%"></span></span><span>65%</span></div>
                    </td>
                    <td>
                      <a href="#" class="cv-link">PO-0007</a>
                    </td>
                    <td>
                      <strong>₹ 12,000</strong>
                    </td>
                    <td>
                      ₹ 600 </td>
                    <td>
                      Event Management </td>
                    <td>
                      — </td>
                    <td>
                      20-08-2026 </td>
                    <td>
                      <a href="#" class="cv-link">REF-007</a>
                    </td>
                    <td>
                      <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Cancelled</span>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Not Generated</span>
                    </td>
                    <td>
                      — </td>
                    <td>
                      — </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Create New Purchase Order modal — fullscreen (image 2 fields) -->
            <div class="modal fade" id="cvNewPOModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content cv-inv-modal">
                  <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-file-earmark-check"></i></div>
                      <div style="min-width:0;">
                        <h5 class="modal-title mb-0 fw-bold">Create New Purchase Order</h5>
                        <div class="small text-muted">GG COMPANY · New purchase order</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-4 bg-light-subtle">
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white"><div class="row g-4"><!-- Left column --><div class="col-12 col-lg-6">
                        <div class="mb-3"><label><span class="text-danger">* </span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                        <div class="row g-3 mb-3">
                          <div>
                            <label class="form-label small fw-bold"><i class="bi bi-pencil-square"></i> Bill To</label>
                            <div class="cv-inv-addr-text">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100<br>Chennai, Tamil Nadu<br>IN, 600100</div>
                          </div>
                          <div>
                            <label class="form-label small fw-bold">Ship to</label>
                            <select class="form-select">
                              <option selected>Select Shipping Address</option>
                              <option>GG COMPANY - Anna Nagar</option>
                              <option>GG COMPANY - T. Nagar</option>
                            </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label><span class="text-danger">* </span>Purchase Order Number <i class="bi bi-question-circle" style="color:#9ca3af;"></i></label>
                          <div class="input-group"><span class="input-group-text bg-light fw-bold text-muted">PO-</span><input type="text" class="form-control" value="163"></div>
                        </div>
                        <div class="mb-3"><label><span class="text-danger">* </span>Purchase Order Date</label><input type="date" class="form-control" value="2026-09-23"></div>
                      </div><!-- Right column --><div class="col-12 col-lg-6">
                        <div class="mb-3">
                          <label><i class="bi bi-tag me-1"></i>Tags</label>
                          <div class="nl-tags-wrap" style="max-width:100%;">
                            <div class="nl-tags-chips"></div>
                            <input type="text" class="nl-tags-input" placeholder="Tag">
                          </div>
                        </div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label><span class="text-danger">* </span>Currency</label><select class="form-select">
                              <option selected>INR ₹</option>
                              <option>USD $</option>
                            </select></div>
                          <div class="mb-3"><label>Status</label><select class="form-select">
                              <option selected>New</option>
                              <option>Cancelled</option>
                              <option>Confirmed</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label>Customer PO No.</label><input type="text" class="form-control"></div>
                        <div class="row g-3 mb-3">
                          <div class="mb-3"><label>Sale Agent</label><select class="form-select">
                              <option selected>gharuda SOFTWARE</option>
                              <option>Karthik R</option>
                              <option>Divya M</option>
                            </select></div>
                          <div class="mb-3"><label>Discount type</label><select class="form-select">
                              <option selected>No discount</option>
                              <option>Before Tax</option>
                              <option>After Tax</option>
                            </select></div>
                        </div>
                        <div class="mb-3"><label>Admin Note</label><textarea class="form-control" rows="5"></textarea></div>
                      </div>
                    </div>

                    <!-- Items section -->
                    <div class="cv-inv-items" style="margin-top:20px;border-top:1px solid #e5e7eb;padding-top:20px;">
                      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
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
                        <div class="d-flex align-items-center gap-3 small">
                          <span>Show quantity as:</span>
                          <label><input type="radio" name="cvPoQty" checked> Qty</label>
                          <label><input type="radio" name="cvPoQty"> Hours</label>
                          <label><input type="radio" name="cvPoQty"> Qty/Hours</label>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered align-middle">
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
                          <div class="d-flex justify-content-between align-items-center mb-2 small" style="margin-right:-10px;"><span class="lbl">Sub Total :</span><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl">Discount</span><input type="number" class="form-control" value="0" style="max-width:110px;"><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="lbl">Adjustment</span><input type="number" class="form-control" value="0"><span class="val">₹ 0.00</span></div>
                          <div class="d-flex justify-content-between align-items-center fs-6 fw-bold text-primary border-top pt-2 mt-2" style="margin-right:-10px;"><span class="lbl">Total :</span><span class="val">₹ 0.00</span></div>
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

            <!-- Add New Item modal (same #cvPoAddItemModal — branches rendum render aagaathu) -->
            <div class="modal fade" id="cvPoAddItemModal" tabindex="-1" aria-hidden="true" aria-labelledby="poAddItemTitle">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border:none;border-radius:14px;">
                  <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                    <h5 class="modal-title" id="poAddItemTitle" style="font-size:15.5px;font-weight:800;">Add New Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3"><label><span class="req">*</span>Description</label><input type="text" class="form-control" id="poItDesc"></div>
                    <div class="mb-3"><label>Long Description</label><textarea class="form-control" id="poItLongDesc" rows="3"></textarea></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label><span class="req">*</span>Rate - INR (Base Currency)</label><input type="number" class="form-control" id="poItRateInr" step="0.01"></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>HSN Code</label><input type="text" class="form-control" id="poItHsn"></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Rate - USD</label><input type="number" class="form-control" id="poItRateUsd" step="0.01"></div>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 1</label><select class="form-select" id="poItTax1">
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3 mb-0"><label>Tax 2</label><select class="form-select" id="poItTax2" disabled>
                            <option selected>No Tax</option>
                            <option>GST 5%</option>
                            <option>GST 12%</option>
                            <option>GST 18%</option>
                          </select></div>
                      </div>
                    </div>
                    <div class="mb-3"><label>Unit</label><input type="text" class="form-control" id="poItUnit" placeholder="Unit"></div>
                    <div class="mb-3 mb-0"><label>Item Group</label><select class="form-select" id="poItGroup">
                        <option value="">Non selected</option>
                        <option>Services</option>
                        <option>Products</option>
                        <option>Subscription</option>
                      </select></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvPoItemSave">Submit</button>
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
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-zip"></i></div>
                      <h5 class="modal-title" id="cvPoZipTitle" style="font-size:15.5px;font-weight:800;">ZIP Purchase Orders</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3">
                      <label>Status</label>
                      <div class="d-flex flex-wrap gap-2 mt-2">
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvPoZipStatus" value="All" checked><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-circle-half"></i>All</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvPoZipStatus" value="New"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-plus-circle"></i>New</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvPoZipStatus" value="Cancelled"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-x-circle"></i>Cancelled</span></label>
                        <label class="d-inline-flex align-items-center gap-1 border rounded-pill px-3 py-1 bg-light small cursor-pointer"><input type="radio" name="cvPoZipStatus" value="Confirmed"><span class="d-inline-flex align-items-center gap-1 text-secondary fw-semibold"><i class="bi bi-check-circle"></i>Confirmed</span></label>
                      </div>
                    </div>
                    <div class="mb-3"><label>From Date:</label><input type="date" class="form-control" id="cvPoZipFrom"></div>
                    <div class="mb-3 mb-0"><label>To Date:</label><input type="date" class="form-control" id="cvPoZipTo"></div>
                    <div class="alert alert-info py-2 px-3 small d-flex align-items-center gap-2 mt-3"><i class="bi bi-info-circle me-1"></i>Purchase orders matching the selected status and date range will be bundled into a single ZIP file.</div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvPoZipSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
      </div>
        <div class="tab-pane fade" id="cvTab-subscriptions" role="tabpanel" aria-labelledby="cvSideLink-subscriptions" tabindex="0">
          <!-- Subscriptions — title + New Subscription + table flow -->


          <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center ms-3 mb-0 mt-3">
            <button type="button" class="btn btn-primary" id="cvSubNewBtn"><i class="bi bi-plus-lg me-1"></i>New Subscription</button>
          </div>

          <div class="card-custom p-0" id="cvCard-subscriptions">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-arrow-repeat"></i></div>
                <div>
                  <h3 class="card-title mb-0">Subscriptions</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-subscriptions">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subscription Name</th>
                    <th>Project</th>
                    <th>Status</th>
                    <th>Next Billing Cycle</th>
                    <th>Date Subscribed</th>
                    <th>Last Sent</th>
                  </tr>
                </thead>
                <tbody id="cvBody-subscriptions">
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">1</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">HRMS Subscription</a>
                    </td>
                    <td>
                      Solar Installation </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Active</span>
                    </td>
                    <td>
                      01-10-2026 </td>
                    <td>
                      01-04-2026 </td>
                    <td>
                      01-09-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">2</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Hosting — Business Yearly</a>
                    </td>
                    <td>
                      AMC Renewal </td>
                    <td>
                      <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Cancelled</span>
                    </td>
                    <td>
                      01-01-2027 </td>
                    <td>
                      15-01-2026 </td>
                    <td>
                      15-08-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">3</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Cloud Backup Plus</a>
                    </td>
                    <td>
                      Event Management </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Paused</span>
                    </td>
                    <td>
                      10-10-2026 </td>
                    <td>
                      10-05-2026 </td>
                    <td>
                      10-09-2026 </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- New Subscription modal (centered — second image design flow) -->
            <div class="modal fade" id="cvNewSubModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvNewSubTitle">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border:none;border-radius:14px;">
                  <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                    <div class="d-flex align-items-center gap-2">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-arrow-repeat"></i></div>
                      <h5 class="modal-title" id="cvNewSubTitle" style="font-size:15.5px;font-weight:800;">New Subscription</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3"><label><span class="req">*</span>Subscription Name</label><input type="text" class="form-control" id="subName" autocomplete="off"></div>
                    <div class="mb-3"><label>Description</label><textarea class="form-control" id="subDesc" rows="3" placeholder="Short description of this subscription..."></textarea></div>
                    <div class="mb-3">
                      <label><span class="req">*</span>Billing Plan</label>
                      <select class="form-select" id="subPlan">
                        <option value="">Select plan</option>
                        <option>Basic Monthly — ₹ 1,999</option>
                        <option>Business Yearly — ₹ 19,999</option>
                        <option>Enterprise Yearly — ₹ 49,999</option>
                      </select>
                    </div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label><span class="req">*</span>Quantity</label><input type="number" class="form-control" id="subQty" value="1" min="1"></div>
  <div class="col-12 col-md-6 mb-3"><label><span class="req">*</span>First Billing Date</label><input type="date" class="form-control" id="subFirstDate" value="2026-10-01"></div>
</div>
                    <div class="mb-3"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label><span class="req">*</span>Currency</label><select class="form-select">
                          <option selected>INR ₹</option>
                          <option>USD $</option>
                        </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Status</label><select class="form-select" id="subStatus">
                          <option selected>Active</option>
                          <option>Paused</option>
                          <option>Cancelled</option>
                        </select></div>
</div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Tax 1</label><select class="form-select">
                          <option selected>No Tax</option>
                          <option>GST 5%</option>
                          <option>GST 12%</option>
                          <option>GST 18%</option>
                        </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Tax 2</label><select class="form-select">
                          <option selected>No Tax</option>
                          <option>GST 5%</option>
                          <option>GST 12%</option>
                          <option>GST 18%</option>
                        </select></div>
</div>
                    <div class="mb-3 mb-0"><label>Terms &amp; Conditions</label><textarea class="form-control" rows="3" placeholder="Enter customer terms &amp; conditions to be displayed before subscribe to the subscription."></textarea></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvSubSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-expenses" role="tabpanel" aria-labelledby="cvSideLink-expenses" tabindex="0">
          <!-- Expenses — title + Record Expense + year + KPI cards + table flow -->

          <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center justify-content-start mt-3 ms-3">
            <select class="form-select mb-0 bg-white form-select-sm cv-exp-year" aria-label="Year">
              <option selected>2026</option>
              <option>2025</option>
              <option>2024</option>
            </select>
            <button type="button" class="btn btn-primary" id="cvExpNewBtn"><i class="bi bi-plus-lg me-1"></i>Record Expense</button>
          </div>

          <!-- Summary KPI cards (image colors) -->
          <div class="row g-2 mb-3">
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-warning">Total</div><div class="fs-5 fw-bold text-dark">₹ 12,600</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Billable</div><div class="fs-5 fw-bold text-dark">₹ 4,600</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-warning">Non Billable</div><div class="fs-5 fw-bold text-dark">₹ 8,000</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-danger">Not Invoiced</div><div class="fs-5 fw-bold text-dark">₹ 4,600</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Billed</div><div class="fs-5 fw-bold text-dark">₹ 8,000</div></div></div>
          </div>

          <div class="card-custom p-0" id="cvCard-expenses">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-receipt"></i></div>
                <div>
                  <h3 class="card-title mb-0">Expenses</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-expenses">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Amount</th>
                    <th>Name</th>
                    <th>Receipt</th>
                    <th>Date</th>
                    <th>Project</th>
                    <th>Attachment</th>
                    <th>Invoice</th>
                    <th>Reference #</th>
                    <th>Payment Mode</th>
                    <th>Vendor</th>
                  </tr>
                </thead>
                <tbody id="cvBody-expenses">
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">1</span>
                    </td>
                    <td>
                      Travel </td>
                    <td>
                      Site visit cab </td>
                    <td>
                      <strong>₹ 1,200</strong>
                    </td>
                    <td>
                      Karthik R </td>
                    <td>
                      <a href="#" class="cv-link">View</a>
                    </td>
                    <td>
                      05-09-2026 </td>
                    <td>
                      Solar Installation </td>
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
                      Cash </td>
                    <td>
                      Fast Cabs </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">2</span>
                    </td>
                    <td>
                      Printing </td>
                    <td>
                      Brochures </td>
                    <td>
                      <strong>₹ 3,400</strong>
                    </td>
                    <td>
                      Divya M </td>
                    <td>
                      <a href="#" class="cv-link">View</a>
                    </td>
                    <td>
                      28-08-2026 </td>
                    <td>
                      Event Management </td>
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
                      Bank Transfer </td>
                    <td>
                      Print World </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">3</span>
                    </td>
                    <td>
                      Software </td>
                    <td>
                      Cloud subscription </td>
                    <td>
                      <strong>₹ 8,000</strong>
                    </td>
                    <td>
                      Admin </td>
                    <td>
                      <span style="color:var(--ink-500);">—</span>
                    </td>
                    <td>
                      15-09-2026 </td>
                    <td>
                      AMC Renewal </td>
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
                      UPI </td>
                    <td>
                      Zen Cloud </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Record Expense modal — fullscreen (image 2 fields, two cards) -->
            <div class="modal fade" id="cvNewExpenseModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content cv-inv-modal">
                  <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-receipt"></i></div>
                      <div style="min-width:0;">
                        <h3 class="mb-0">Record Expense</h3>
                        <div class="small text-muted">GG COMPANY · New expense</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row g-3">
                      <!-- Left card -->
                      <div class="col-12 col-lg-6">
                        <div class="card border shadow-sm h-100">
                          <div class="card-header bg-light fw-bold py-2 px-3">Add new Expense of GG COMPANY</div>
                          <div class="card-body p-3">
                          <div class="mb-3"><label>Vendors</label><select class="form-select" id="expVendor">
                              <option value="" selected>None</option>
                              <option>Fast Cabs</option>
                              <option>Print World</option>
                              <option>Zen Cloud</option>
                              <option>Office Supplies Co</option>
                            </select></div>
                          <div class="mb-3"><label><i class="bi bi-info-circle me-1"></i>Name</label><input type="text" class="form-control" id="expName" autocomplete="off"></div>
                          <div class="mb-3"><label><i class="bi bi-info-circle me-1"></i>Note</label><textarea class="form-control" id="expNote" rows="4"></textarea></div>
                          <div class="mb-3">
                            <label><span class="req">*</span>Expense Category</label>
                            <div class="input-group"><select class="form-select" id="expCat">
                                <option value="" selected>Non selected</option>
                                <option>Travel</option>
                                <option>Printing</option>
                                <option>Software</option>
                                <option>Office Supplies</option>
                                <option>Marketing</option>
                              </select><button type="button" class="btn btn-primary" id="expCatAdd" title="Add category"><i class="bi bi-plus-lg"></i></button></div>
                          </div>
                          <div class="mb-3"><label>Expense Sub Category</label><select class="form-select" id="expSubCat">
                              <option value="" selected>Non selected</option>
                              <option>Cab</option>
                              <option>Fuel</option>
                              <option>Brochures</option>
                              <option>Subscription</option>
                            </select></div>
                          <div class="mb-3"><label><span class="req">*</span>Expense Date</label><input type="date" class="form-control" id="expDate" value="2026-09-23"></div>
                          <div class="mb-3"><label><span class="req">*</span>Amount</label><input type="number" class="form-control" id="expAmount" step="0.01"></div>
                          <div class="form-check mb-3"><input type="checkbox" class="form-check-input" id="expBillable"><label class="form-check-label small fw-semibold" for="expBillable">Billable</label></div>
                          <div class="mb-3"><label>Customer</label><input type="text" class="form-control" value="GG COMPANY"></div>
                          <div class="mb-3 mb-0"><label>Project</label><select class="form-select">
                              <option selected>Select and begin typing</option>
                              <option>Solar Installation</option>
                              <option>Event Management</option>
                              <option>AMC Renewal</option>
                            </select></div>
                        </div>
                      </div>
                        </div>
                      </div>
                      <!-- Right card -->
                      <div class="col-12 col-lg-6">
                        <div class="card border shadow-sm h-100">
                          <div class="card-header bg-light fw-bold py-2 px-3">Advanced Options</div>
                          <div class="card-body p-3">
                          <div class="mb-3"><label><span class="req">*</span>Currency</label><select class="form-select" id="expCurrency">
                              <option selected>INR ₹</option>
                              <option>USD $</option>
                            </select></div>
                          <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Tax 1</label><select class="form-select">
                                <option selected>No Tax</option>
                                <option>GST 5%</option>
                                <option>GST 12%</option>
                                <option>GST 18%</option>
                              </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Tax 2</label><select class="form-select">
                                <option selected>No Tax</option>
                                <option>GST 5%</option>
                                <option>GST 12%</option>
                                <option>GST 18%</option>
                              </select></div>
</div>
                          <div class="mb-3"><label>Attatment</label><input type="file" class="form-control" id="expFile"></div>
                          <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Payment Mode</label><select class="form-select" id="expPayMode">
                                <option value="" selected>Non selected</option>
                                <option>Cash</option>
                                <option>Bank Transfer</option>
                                <option>UPI</option>
                                <option>Card</option>
                                <option>Cheque</option>
                              </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Reference #</label><input type="text" class="form-control" id="expRef" autocomplete="off"></div>
</div>
                          <div class="mb-3"><label>Repeat everyss</label><select class="form-select">
                              <option value="" selected>Non selected</option>
                              <option>Daily</option>
                              <option>Weekly</option>
                              <option>Monthly</option>
                              <option>Yearly</option>
                            </select></div>
                          <div class="mb-3"><label>Staff</label><select class="form-select">
                              <option value="" selected>Nothing selected</option>
                              <option>Admin</option>
                              <option>Karthik R</option>
                              <option>Divya M</option>
                            </select></div>
                          <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Payment Account</label><select class="form-select">
                                <option value="" selected>Non selected</option>
                                <option>HDFC</option>
                                <option>ICICI</option>
                                <option>Cash in Hand</option>
                              </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Deposit To</label><select class="form-select">
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
                    <div class="mb-3"><label><span class="req">*</span>Category Name</label><input type="text" class="form-control" id="newCatName" autocomplete="off"></div>
                    <div class="mb-3 mb-0"><label>Category Description</label><textarea class="form-control" id="newCatDesc" rows="4"></textarea></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="newCatSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-contracts" role="tabpanel" aria-labelledby="cvSideLink-contracts" tabindex="0">
          <!-- Contracts — title + New Contract + table flow -->


          <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center mt-3 mb-0 ms-3">
            <button type="button" class="btn btn-primary" id="cvConNewBtn"><i class="bi bi-plus-lg me-1"></i>New contract</button>
          </div>

          <div class="card-custom p-0" id="cvCard-contracts">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-file-earmark-ruled"></i></div>
                <div>
                  <h3 class="card-title mb-0">Contracts</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-contracts">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Contract Type</th>
                    <th>Contract Value</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Project</th>
                    <th>Signature</th>
                  </tr>
                </thead>
                <tbody id="cvBody-contracts">
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">1</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Event services agreement</a>
                    </td>
                    <td>
                      Service </td>
                    <td>
                      <strong>₹ 3,60,000</strong>
                    </td>
                    <td>
                      01-09-2026 </td>
                    <td>
                      31-08-2027 </td>
                    <td>
                      Event Management </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Signed</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">2</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Annual maintenance contract</a>
                    </td>
                    <td>
                      Maintenance </td>
                    <td>
                      <strong>₹ 72,000</strong>
                    </td>
                    <td>
                      01-08-2026 </td>
                    <td>
                      31-07-2027 </td>
                    <td>
                      AMC Renewal </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Signed</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">3</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Solar installation contract</a>
                    </td>
                    <td>
                      Project </td>
                    <td>
                      <strong>₹ 4,50,000</strong>
                    </td>
                    <td>
                      15-09-2026 </td>
                    <td>
                      15-12-2026 </td>
                    <td>
                      Solar Installation </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Pending</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Contract Information modal (second image fields — centered) -->
            <div class="modal fade" id="cvNewContractModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvConTitle">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border:none;border-radius:14px;">
                  <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                    <div class="d-flex align-items-center gap-2">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;" style="width:36px;height:36px;border-radius:10px;font-size:16px;"><i class="bi bi-file-earmark-ruled"></i></div>
                      <h5 class="modal-title" id="cvConTitle" style="font-size:15.5px;font-weight:800;">Contract Information</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="d-flex align-items-center gap-3 mb-3">
                      <div class="form-check"><input type="checkbox" class="form-check-input" id="conTrash"><label class="form-check-label small fw-semibold" for="conTrash"><i class="bi bi-trash"></i> Trash</label></div>
                      <div class="form-check"><input type="checkbox" class="form-check-input" id="conHide"><label class="form-check-label small fw-semibold" for="conHide">Hide from customer</label></div>
                    </div>
                    <div class="mb-3"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" id="conCustomer" value="GG COMPANY" readonly></div>
                    <div class="mb-3"><label><i class="bi bi-info-circle me-1"></i><span class="req">*</span>Subject</label><input type="text" class="form-control" id="conSubject" autocomplete="off"></div>
                    <div class="mb-3">
                      <label>Contract Value</label>
                      <div class="input-group"><input type="number" class="form-control" id="conValue" step="0.01"><span class="input-group-text">₹</span></div>
                    </div>
                    <div class="mb-3">
                      <label>Contract type</label>
                      <div class="input-group"><select class="form-select" id="conType">
                          <option value="" selected>Non selected</option>
                          <option>Service</option>
                          <option>Maintenance</option>
                          <option>Project</option>
                          <option>Retainer</option>
                        </select><button type="button" class="btn btn-primary" id="conTypeAdd" title="Add contract type"><i class="bi bi-plus-lg"></i></button></div>
                    </div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label><span class="req">*</span>Start Date</label><input type="date" class="form-control" id="conStart" value="2026-09-23"></div>
  <div class="col-12 col-md-6 mb-3"><label>End Date</label><input type="date" class="form-control" id="conEnd"></div>
</div>
                    <div class="mb-3 mb-0"><label>Contract description</label><textarea class="form-control" id="conDesc" rows="5"></textarea></div>
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
                    <div class="mb-3 mb-0"><label><span class="req">*</span>Name</label><input type="text" class="form-control" id="conTypeName" autocomplete="off"></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="conTypeSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-projects" role="tabpanel" aria-labelledby="cvSideLink-projects" tabindex="0">
          <!-- Projects — New Project + status KPI cards + table flow + Add new project fullscreen modal -->
          <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">


          <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center ms-3 mt-3">
            <button type="button" class="btn btn-primary" id="cvPrjNewBtn"><i class="bi bi-plus-lg me-1"></i>New Project</button>
          </div>

          <!-- Status KPI cards (image 1 — Not Started, In Progress, On Hold, Cancelled, test, Finished) -->
          <div class="row g-2 mb-3">
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-secondary">Not Started</div><div class="fs-5 fw-bold text-dark">0</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">In Progress</div><div class="fs-5 fw-bold text-dark">1</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-warning">On Hold</div><div class="fs-5 fw-bold text-dark">1</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-secondary">Cancelled</div><div class="fs-5 fw-bold text-dark">0</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-danger">test</div><div class="fs-5 fw-bold text-dark">0</div></div></div>
            <div class="col-6 col-md"><div class="card p-3 border shadow-sm h-100 bg-white"><div class="small fw-bold mb-1 text-success">Finished</div><div class="fs-5 fw-bold text-dark">1</div></div></div>
          </div>

          <div class="card-custom p-0" id="cvCard-projects">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-diagram-3"></i></div>
                <div>
                  <h3 class="card-title mb-0">Projects</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-projects">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Tags</th>
                    <th>Project Progress</th>
                    <th>Start Date</th>
                    <th>Deadline</th>
                    <th>Remaining Days</th>
                    <th>Members</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="cvBody-projects">
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">1</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">ERP Rollout 2026</a>
                    </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">hot</span>
                    </td>
                    <td>
                      <div class="cv-prj-prog">
                        <div class="cv-prj-bar"><span style="width:65%;"></span></div><span class="cv-prj-pct">65%</span>
                      </div>
                    </td>
                    <td>
                      01-09-2026 </td>
                    <td>
                      15-11-2026 </td>
                    <td>
                      <span class="cv-prj-remain">54</span>
                    </td>
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>gharuda SOFTWARE</span></span>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>In Progress</span>
                    </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">2</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Website Revamp</a>
                    </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">low</span>
                    </td>
                    <td>
                      <div class="cv-prj-prog">
                        <div class="cv-prj-bar"><span style="width:30%;"></span></div><span class="cv-prj-pct">30%</span>
                      </div>
                    </td>
                    <td>
                      10-09-2026 </td>
                    <td>
                      30-11-2026 </td>
                    <td>
                      <span class="cv-prj-remain">69</span>
                    </td>
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Karthik R</span></span>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>On Hold</span>
                    </td>
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
                      <div class="cv-prj-prog">
                        <div class="cv-prj-bar"><span style="width:100%;"></span></div><span class="cv-prj-pct">100%</span>
                      </div>
                    </td>
                    <td>
                      05-08-2026 </td>
                    <td>
                      20-09-2026 </td>
                    <td>
                      <span class="cv-prj-remain over">0</span>
                    </td>
                    <td>
                      <span class="d-inline-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="cv-avatar" alt=""><span>Divya M</span></span>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Finished</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Add new project modal — fullscreen (image 2 fields) -->
            <div class="modal fade" id="cvNewProjectModal" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                  <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                      <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-kanban"></i></div>
                      <div style="min-width:0;">
                        <h3 class="mb-0">Add new project</h3>
                        <div class="small text-muted">GG COMPANY · New project</div>
                      </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="d-flex gap-2 mb-3 border-bottom pb-2 cv-prj-tabs">
                      <button type="button" class="btn btn-sm btn-outline-primary cv-prj-tab active" data-prjtab="project">Project</button>
                      <button type="button" class="btn btn-sm btn-outline-primary cv-prj-tab" data-prjtab="settings">Project Settings</button>
                    </div>

                    <!-- Project pane -->
                    <div class="cv-prj-pane active" data-prjpane="project">
                      <div class="mb-3"><label><span class="req">*</span>Project Name</label><input type="text" class="form-control" id="prjName" autocomplete="off"></div>
                      <div class="mb-3"><label><span class="req">*</span>Customer</label><input type="text" class="form-control" value="GG COMPANY" readonly></div>
                      <div class="row g-3">
                        <div class="mb-3"><label>Device</label><select class="form-select">
                            <option value="" selected>Non selected</option>
                            <option>Desktop</option>
                            <option>Mobile</option>
                            <option>Tablet</option>
                          </select></div>
                      </div>
                      <label class="cv-prj-check"><input type="checkbox" id="prjCalcTasks" checked> Calculate progress through tasks</label>
                      <div class="cv-prj-prog-wrap">
                        <div class="cv-prj-prog-lbl">Progress <span id="prjProgVal">0%</span></div>
                        <input type="range" class="form-range cv-prj-range" id="prjProg" min="0" max="100" value="0">
                      </div>
                      <div class="row g-3">
                        <div class="mb-3"><label><span class="req">*</span>Billing Type</label><select class="form-select" id="prjBilling">
                            <option selected>Fixed Rate</option>
                            <option>Hourly Rate</option>
                            <option>Project Hours</option>
                          </select></div>
                        <div class="mb-3"><label>Status</label><select class="form-select" id="prjStatus">
                            <option selected>In Progress</option>
                            <option>Not Started</option>
                            <option>On Hold</option>
                            <option>Cancelled</option>
                            <option>Finished</option>
                          </select></div>
                        <div class="mb-3 full"><label>Project Deadline Date Extend Limit</label><input type="text" class="form-control" id="prjDeadlineLimit"></div>
                        <div class="mb-3"><label>Total Rate</label><input type="text" class="form-control" id="prjTotalRate"></div>
                        <div class="mb-3"><label>Estimated Hours</label><input type="text" class="form-control" id="prjHours"></div>
                        <div class="mb-3"><label>Members</label><select class="form-select" id="prjMembers">
                            <option selected>gharuda SOFTWARE</option>
                            <option>Karthik R</option>
                            <option>Divya M</option>
                            <option>Arun Kumar</option>
                          </select></div>
                        <div class="mb-3"><label>Follower</label><select class="form-select" id="prjFollower">
                            <option value="" selected>Non selected</option>
                            <option>Karthik R</option>
                            <option>Divya M</option>
                          </select></div>
                        <div class="mb-3"><label>Super Follower</label><select class="form-select" id="prjSuperFollower">
                            <option value="" selected>Non selected</option>
                            <option>Admin</option>
                          </select></div>
                        <div class="mb-3"><label><span class="req">*</span>Start Date</label><input type="date" class="form-control" id="prjStart" value="2026-09-23"></div>
                        <div class="mb-3"><label>Deadline</label><input type="date" class="form-control" id="prjDeadline"></div>
                        <div class="mb-3 full">
                          <label><i class="bi bi-tag me-1"></i>Tags</label>
                          <div class="nl-tags-wrap" style="max-width:100%;">
                            <div class="nl-tags-chips"></div>
                            <input type="text" class="nl-tags-input" placeholder="Tag">
                          </div>
                        </div>
                        <div class="mb-3 full">
                          <label>Description</label>
                          <div class="cv-prj-quill-wrap">
                            <div id="cvPrjQuill"></div>
                          </div>
                        </div>
                      </div>
                      <label class="cv-prj-check mt-3 mb-0"><input type="checkbox" id="prjSendEmail"> Send project created email</label>
                    </div>

                    <!-- Project Settings pane — grouped toggle design -->
                    <div class="cv-prj-pane" data-prjpane="settings">
                      <div class="mb-3"><label><span class="req">*</span>Send contacts notifications</label>
                        <select class="form-select" id="prjNotify">
                          <option selected>To all contacts with notifications for projects enabled</option>
                          <option>To primary contact only</option>
                          <option>Do not send notifications</option>
                        </select>
                      </div>
                      <div class="mb-3"><label>Visible Tabs</label>
                        <div class="d-flex flex-wrap gap-2 align-items-center p-2 border rounded bg-light cv-prj-tabsbox" id="prjVisibleTabs">
                          <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Profit &amp; Loss">Profit &amp; Loss<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Tasks">Tasks<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Timesheets">Timesheets<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Milestones">Milestones<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Files">Files<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Discussions">Discussions<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Gantt">Gantt<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Tickets">Tickets<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Video Library">Video Library<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Contracts">Contracts<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Proposals">Proposals<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Estimates">Estimates<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Purchase Orders">Purchase Orders<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Invoices">Invoices<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Subscriptions">Subscriptions<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Expenses">Expenses<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span><span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip" data-tab="Credit Notes">Credit Notes<button type="button" class="chip-x" aria-label="Remove"><i class="bi bi-x-lg"></i></button></span>
                          <div class="dropdown cv-prj-tabs-dd">
                            <button type="button" class="btn btn-sm btn-outline-primary cv-prj-tabs-add" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false"><i class="bi bi-plus-lg"></i>Add tabs <i class="bi bi-chevron-down" style="font-size:9px;"></i></button>
                            <ul class="dropdown-menu dropdown-menu-end cv-prj-tabs-menu" id="prjTabsMenu"></ul>
                          </div>
                        </div>
                      </div>

                      <div class="row g-3 cv-prj-set-grid">
                        <!-- Tasks & Comments -->
                        <div class="col-12 col-md-6"><div class="card border shadow-sm h-100">
                          <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold"><i class="bi bi-list-check"></i><span class="t">Tasks &amp; Comments</span><span class="c">9 on</span></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to create tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to edit tasks (only tasks created from contact)</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to comment on project tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view task comments</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view task attachments</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view task checklist items</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to upload attachments on tasks</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view task total logged time</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                        </div></div>

                        <!-- Files & Discussions -->
                        <div class="col-12 col-md-6"><div class="card border shadow-sm h-100">
                          <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold"><i class="bi bi-folder2-open"></i><span class="t">Files &amp; Discussions</span><span class="c">3 on</span></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to upload files</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to open discussions</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view files</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                        </div></div>

                        <!-- Milestones & Planning -->
                        <div class="col-12 col-md-6"><div class="card border shadow-sm h-100">
                          <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold"><i class="bi bi-diagram-3"></i><span class="t">Milestones &amp; Planning</span><span class="c">3 on</span></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view milestones</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view Gantt</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view timesheets</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                        </div></div>

                        <!-- Finance, Log & Team -->
                        <div class="col-12 col-md-6"><div class="card border shadow-sm h-100">
                          <div class="card-header bg-light d-flex align-items-center justify-content-between py-2 px-3 fw-bold"><i class="bi bi-graph-up"></i><span class="t">Finance, Log &amp; Team</span><span class="c">3 on</span></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view finance overview</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view activity log</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                          <div class="d-flex align-items-center justify-content-between py-2 px-3 border-bottom small"><span class="lbl">Allow customer to view team members</span><label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label></div>
                        </div>
                      </div>

                      <div class="card border shadow-sm p-3 mt-3 d-flex flex-row align-items-center justify-content-between">
                        <i class="bi bi-eye-slash-fill"></i>
                        <span class="lbl">Hide project tasks on main tasks table (admin area)</span>
                        <label class="cust-switch"><input type="checkbox"><span class="slider"></span></label>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer bg-white border-top p-3 d-flex justify-content-end gap-2">
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
            
          </div>
        </div>
      </div>
        <div class="tab-pane fade" id="cvTab-tasks" role="tabpanel" aria-labelledby="cvSideLink-tasks" tabindex="0">
          <!-- Tasks — New Task + Related To + filter + namba table flow + Add new task modal -->


          <div class="card-custom p-0" id="cvCard-tasks">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-list-check"></i></div>
                <div>
                  <h3 class="card-title mb-0">Tasks</h3>
                </div>
              </div>

            </div>

            <div class="d-flex align-items-center justify-content-between mb-3">
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

            <div class="d-flex flex-wrap align-items-center gap-3 my-3">
              <span class="lbl">Related To:</span>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input" checked> Customer</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Projects</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Invoices</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Estimates</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Contracts</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Support Tickets</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Expenses</label>
              <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input"> Proposals</label>
            </div>

            <hr class="my-3 text-muted opacity-25">

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-tasks">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Assigned to</th>
                    <th>Tags</th>
                    <th>Priority</th>
                  </tr>
                </thead>
                <tbody id="cvBody-tasks">
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">1</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Send revised quotation</a>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>In Progress</span>
                    </td>
                    <td>
                      14-09-2026 </td>
                    <td>
                      16-09-2026 </td>
                    <td>
                      Divya M </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">urgent</span>
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
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Completed</span>
                    </td>
                    <td>
                      05-09-2026 </td>
                    <td>
                      08-09-2026 </td>
                    <td>
                      Karthik R </td>
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
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Not Started</span>
                    </td>
                    <td>
                      20-09-2026 </td>
                    <td>
                      25-09-2026 </td>
                    <td>
                      gharuda SOFTWARE </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">release</span>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Medium</span>
                    </td>
                  </tr>
                </tbody>
              </table>
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
                    <div class="mb-3">
                      <div class="d-flex align-items-center gap-3 mb-3">
                        <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input" id="tskPublic"> Public</label>
                        <label class="form-check form-check-inline mb-0"><input type="checkbox" class="form-check-input" id="tskBillable" checked> Billable</label>
                      </div>
                    </div>
                    <!-- Attach Files: drag & drop zone + selected file list -->
                    <div class="border border-2 border-dashed rounded p-4 text-center mb-3 bg-light-subtle cursor-pointer cv-tsk-drop" id="cvTskDropZone">
                      <i class="bi bi-cloud-arrow-up"></i>
                      <div class="t1">Drag &amp; drop files here, or <span>Browse</span></div>
                      <div class="t2">Images, documents, spreadsheets — you can attach multiple files</div>
                      <input type="file" id="cvTskFileInput" multiple style="display:none;">
                    </div>
                    <div id="cvTskFileList"></div>
                    <div class="mb-3"><label><span class="req">*</span>Subject</label><input type="text" class="form-control" id="tskSubject" autocomplete="off"></div>
                    <div class="mb-3"><label>Hourly Rate</label><input type="number" class="form-control" id="tskRate" value="0" min="0" step="0.5"></div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label><span class="req">*</span>Start Date</label><input type="date" class="form-control" id="tskStart" value="2026-09-23"></div>
  <div class="col-12 col-md-6 mb-3"><label>Due Date</label><input type="date" class="form-control" id="tskDue"></div>
</div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Repeat every</label><select class="form-select" id="tskRepeat">
                          <option value="" selected>Non selected</option>
                          <option>Daily</option>
                          <option>Weekdays</option>
                          <option>Weekly</option>
                          <option>Monthly</option>
                          <option>Yearly</option>
                        </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Priority</label><select class="form-select" id="tskPriority">
                          <option>Low</option>
                          <option selected>Medium</option>
                          <option>High</option>
                          <option>Urgent</option>
                        </select></div>
</div>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Related To</label><select class="form-select" id="tskRelated">
                          <option selected>Customer</option>
                          <option>Projects</option>
                          <option>Invoices</option>
                          <option>Estimates</option>
                          <option>Contracts</option>
                          <option>Support Tickets</option>
                          <option>Expenses</option>
                          <option>Proposals</option>
                        </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Customer</label><select class="form-select" id="tskCustomer">
                          <option selected>GG COMPANY</option>
                        </select></div>
</div>
                    <label class="cv-tsk-top-check mb-3"><input type="checkbox" class="form-check-input" id="tskDep"> Dependency</label>
                    <div class="row g-3">
  <div class="col-12 col-md-6 mb-3"><label>Assignees</label><select class="form-select" id="tskAssignees">
                          <option selected>gharuda SOFTWARE</option>
                          <option>Admin</option>
                          <option>Karthik R</option>
                          <option>Divya M</option>
                        </select></div>
  <div class="col-12 col-md-6 mb-3"><label>Followers</label><select class="form-select" id="tskFollowers">
                          <option value="" selected>Non selected</option>
                          <option>Admin</option>
                          <option>Karthik R</option>
                          <option>Divya M</option>
                        </select></div>
</div>
                    <div class="mb-3"><label>Insert Checklist Templates</label><select class="form-select" id="tskChecklist">
                        <option value="" selected>Non selected</option>
                        <option>Dev handoff checklist</option>
                        <option>QA checklist</option>
                        <option>Bug triage checklist</option>
                      </select></div>
                    <div class="mb-3">
                      <div class="form-label small fw-bold"><i class="bi bi-tags"></i>Tags</div>
                      <input type="text" class="form-control" id="tskTags" placeholder="Tag" autocomplete="off">
                    </div>
                    <div class="mb-3 mb-0"><label>Task Description</label><textarea class="form-control" id="tskDesc" rows="4" placeholder="Add Description"></textarea></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="cvTskSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-tickets" role="tabpanel" aria-labelledby="cvSideLink-tickets" tabindex="0">
          <!-- Tickets — New Ticket + namba table flow + Ticket Information modal (Quill body) -->



          <div class="card-custom p-0" id="cvCard-tickets">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-life-preserver"></i></div>
                <div>
                  <h3 class="card-title mb-0">Support Tickets</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvTktNewBtn"><i class="bi bi-plus-lg me-1"></i>New Ticket</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-tickets">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Tags</th>
                    <th>Department</th>
                    <th>Service</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Last Reply</th>
                    <th>Created</th>
                  </tr>
                </thead>
                <tbody id="cvBody-tickets">
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">#1042</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Unable to download invoice</a>
                    </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">billing</span>
                    </td>
                    <td>
                      Billing </td>
                    <td>
                      — </td>
                    <td>
                      Suresh s </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Open</span>
                    </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Medium</span>
                    </td>
                    <td>
                      23-09-2026 10:42 </td>
                    <td>
                      18-09-2026 </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      <span style="color:var(--ink-500);font-weight:600;">#1041</span>
                    </td>
                    <td>
                      <a href="#" class="cv-link">Login page not loading</a>
                    </td>
                    <td>
                      <span class="badge bg-white text-dark border d-flex align-items-center gap-1 cv-tag-chip">bug</span>
                    </td>
                    <td>
                      Technical </td>
                    <td>
                      Website Support </td>
                    <td>
                      Divya M </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>In Progress</span>
                    </td>
                    <td>
                      <span class="cv-pill bad"><i class="bi bi-circle-fill" style="font-size:6px;"></i>High</span>
                    </td>
                    <td>
                      22-09-2026 16:20 </td>
                    <td>
                      20-09-2026 </td>
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
                      Billing </td>
                    <td>
                      — </td>
                    <td>
                      Suresh s </td>
                    <td>
                      <span class="cv-pill wait"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Answered</span>
                    </td>
                    <td>
                      <span class="cv-pill ok"><i class="bi bi-circle-fill" style="font-size:6px;"></i>Low</span>
                    </td>
                    <td>
                      19-09-2026 09:15 </td>
                    <td>
                      17-09-2026 </td>
                  </tr>
                </tbody>
              </table>
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
                    <div class="card border shadow-sm p-3 mb-3">
                      <div class="row g-3">
                        <div class="mb-3 full">
                          <label>Subject</label>
                          <input type="text" class="form-control" id="tktSubject" autocomplete="off">
                        </div>
                        <div class="mb-3">
                          <div class="form-label small fw-bold"><i class="bi bi-tags"></i>Tags</div>
                          <input type="text" class="form-control" id="tktTags" placeholder="Tag" autocomplete="off">
                        </div>
                        <div class="mb-3">
                          <label>Contact</label>
                          <select class="form-select" id="tktContact">
                            <option selected>Suresh s</option>
                            <option>Divya M</option>
                            <option>Karthik R</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Assign ticket (default is current user)</label>
                          <select class="form-select" id="tktAssign">
                            <option selected>gharuda SOFTWARE</option>
                            <option>Admin</option>
                            <option>Karthik R</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Name</label>
                          <input type="text" class="form-control" id="tktName" value="Suresh s" readonly>
                        </div>
                        <div class="mb-3">
                          <label>Email address</label>
                          <input type="text" class="form-control" id="tktEmail" value="pm@GHARUDAtechnology.com" readonly>
                        </div>
                        <div class="mb-3">
                          <label>Priority</label>
                          <select class="form-select" id="tktPriority">
                            <option>Low</option>
                            <option selected>Medium</option>
                            <option>High</option>
                            <option>Urgent</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Follower ticket (default is current user)</label>
                          <select class="form-select" id="tktFollower">
                            <option selected>gharuda SOFTWARE</option>
                            <option>Admin</option>
                            <option>Karthik R</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Department</label>
                          <select class="form-select" id="tktDept">
                            <option value="" selected>Non selected</option>
                            <option>Billing</option>
                            <option>Technical</option>
                            <option>Sales</option>
                            <option>Support</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label>Service</label>
                          <div class="input-group"><select class="form-select" id="tktService">
                              <option value="" selected>Non selected</option>
                              <option>Website Support</option>
                              <option>Hosting</option>
                              <option>Maintenance</option>
                            </select><button type="button" class="btn btn-primary" id="tktServiceAdd" title="Add service"><i class="bi bi-plus-lg"></i></button></div>
                        </div>
                        <div class="mb-3">
                          <label>CC</label>
                          <input type="text" class="form-control" id="tktCc" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <!-- Ticket Body card -->
                    <div class="card border shadow-sm p-3 mb-0">
                      <div class="mb-3"><label>Ticket Body</label></div>
                      <div class="row g-2 mb-2"><div class="col-12 col-md-6">
                        <select class="form-select" id="tktPredefined" style="border-radius:10px;font-size:13px;">
                          <option value="" selected>Insert predefined reply</option>
                          <option>Thank you — we are looking into it</option>
                          <option>Issue resolved — closing ticket</option>
                        </select></div><div class="col-12 col-md-6"><select class="form-select" id="tktKbLink" style="border-radius:10px;font-size:13px;">
                          <option value="" selected>Insert knowledge base link</option>
                          <option>How to reset your password</option>
                          <option>Invoice & payment FAQ</option>
                        </select></div></div>
                      <div class="border rounded bg-white mt-2">
                        <div id="cvTktQuill"></div>
                      </div>
                      <div class="row justify-content-start mt-3">
                        <div class="col-auto" style="min-width:380px;max-width:100%;">
                          <div class="cv-tkt-att-lbl">Attachments</div>
                          <div class="input-group"><input type="file" class="form-control" id="tktFile" multiple><button type="button" class="btn btn-primary" id="tktFileAdd" title="Add more"><i class="bi bi-plus-lg"></i></button></div>
                          <div id="tktFileList"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer bg-light border-top p-3">
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
                    <div class="mb-3 mb-0"><label><span style="color:#dc2626;margin-right:2px;">*</span>Service Name</label><input type="text" class="form-control" id="svcName" autocomplete="off"></div>
                  </div>
                  <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="svcSubmit">Submit</button>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-email_log" role="tabpanel" aria-labelledby="cvSideLink-email_log" tabindex="0">
          <!-- Email Log — Send Email + table flow + Compose Email modal (Quill) -->



          <div class="card-custom p-0" id="cvCard-email_log">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-envelope-fill"></i></div>
                <div>
                  <h3 class="card-title mb-0">Email Log</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvSendEmailBtn"><i class="bi bi-envelope-fill me-1"></i>Send Email</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-email_log">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Staff</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Opened</th>
                  </tr>
                </thead>
                <tbody id="cvBody-email_log">
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

            <!-- Compose Email modal (Quill editor) -->
            <div class="modal fade" id="cvComposeEmailModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvComposeEmailTitle">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border:none;border-radius:14px;">
                  <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                    <h5 class="modal-title" id="cvComposeEmailTitle" style="font-size:15.5px;font-weight:800;">Compose Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="padding:20px 22px;">
                    <div class="mb-3">
                      <label class="cv-em-upper">Send Email Using (SMTP)</label>
                      <select class="form-select" id="cvEmSmtp">
                        <option>USE SYSTEM SMTP ( info@GHARUDAtechnology.com )</option>
                        <option>USE CUSTOM SMTP</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Templates</label>
                      <select class="form-select" id="cvEmTemplate">
                        <option value="">Non selected</option>
                        <option value="welcome">Welcome Aboard</option>
                        <option value="quote">Quotation Follow-up</option>
                        <option value="invoice">Invoice Reminder</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Email To</label>
                      <select class="form-select" id="cvEmTo">
                        <option>Suresh s ( pm@GHARUDAtechnology.com )</option>
                        <option>Mohan R ( mohan@GHARUDAtechnology.com )</option>
                        <option>Priya K ( priya@GHARUDAtechnology.com )</option>
                      </select>
                    </div>
                    <div class="mb-3"><label>Email CC</label><input type="text" class="form-control" id="cvEmCc" autocomplete="off"></div>
                    <div class="mb-3"><label>Email Subject</label><input type="text" class="form-control" id="cvEmSubject" autocomplete="off"></div>
                    <div class="mb-3">
                      <div class="cv-em-quill-wrap">
                        <div id="cvEmQuill"></div>
                      </div>
                    </div>
                    <div class="mb-3 mb-0">
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

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-call_logs" role="tabpanel" aria-labelledby="cvSideLink-call_logs" tabindex="0">
          <div class="card-custom p-0" id="cvCard-call_logs">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-telephone-fill"></i></div>
                <div>
                  <h3 class="card-title mb-0">Call Logs</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewCallLogBtn" data-bs-toggle="modal" data-bs-target="#cvNewCallLogModal"><i class="bi bi-plus-lg me-1"></i>New Call Log</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-call_logs">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th>Purpose of call</th>
                    <th>Caller</th>
                    <th>Contact</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Duration</th>
                    <th>Follow-up</th>
                    <th>Important</th>
                    <th>Completed</th>
                  </tr>
                </thead>
                <tbody id="cvBody-call_logs">
                  <tr class="cv-row">
                    <td>
                      Outgoing </td>
                    <td>
                      Discuss proposal </td>
                    <td>
                      Karthik R </td>
                    <td>
                      96770 63368 </td>
                    <td>
                      10-09-2026 11:05 </td>
                    <td>
                      10-09-2026 11:09 </td>
                    <td>
                      04:12 </td>
                    <td>
                      No </td>
                    <td>
                      Yes </td>
                    <td>
                      Yes </td>
                  </tr>
                  <tr class="cv-row">
                    <td>
                      Incoming </td>
                    <td>
                      Payment reminder </td>
                    <td>
                      Divya M </td>
                    <td>
                      96770 63368 </td>
                    <td>
                      07-09-2026 15:22 </td>
                    <td>
                      07-09-2026 15:24 </td>
                    <td>
                      01:48 </td>
                    <td>
                      Yes </td>
                    <td>
                      No </td>
                    <td>
                      Yes </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-shipping" role="tabpanel" aria-labelledby="cvSideLink-shipping" tabindex="0">
          <div class="card-custom p-0" id="cvCard-shipping">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-truck"></i></div>
                <div>
                  <h3 class="card-title mb-0">View Shipping Address</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvAddAddrBtn"><i class="bi bi-plus-lg me-1"></i>Add Address</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-shipping">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Outlet Name</th>
                    <th>Area</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Zip</th>
                    <th>State</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="cvBody-shipping">
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

            <!-- Add address modal -->
            <div class="leave-reject-modal" id="cvAddrModal" role="dialog" aria-modal="true" aria-labelledby="cvAddrTitle">
              <div class="leave-reject-dialog cv-note-dialog">
                <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-geo-alt-fill"></i></div>
                    <div style="min-width:0;">
                      <h3 id="cvAddrTitle" class="mb-0">Add address</h3>
                      <div class="small text-muted">GG COMPANY · New shipping outlet</div>
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
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-map" role="tabpanel" aria-labelledby="cvSideLink-map" tabindex="0">
          <div class="cv-title">Map</div>



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
            <div class="alert alert-warning d-flex align-items-center gap-2 mb-3"><i class="bi bi-key-fill"></i><div>Setup Google API key in settings to unlock advanced map options for this customer map.</div></div>

            <!-- Live map preview (Google Maps embed — API key not required) -->
            <div class="ratio ratio-16x9 border rounded overflow-hidden bg-light position-relative">
              <div class="d-flex flex-column align-items-center justify-content-center h-100 text-muted p-4 text-center" id="cvMapPreview">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Enter coordinates and click "Show on map"</span>
                <span class="cv-err" id="cvMapErr" hidden>Please enter both Latitude and Longitude.</span>
              </div>
            </div>
          </div>

          
        </div>
        <div class="tab-pane fade" id="cvTab-files" role="tabpanel" aria-labelledby="cvSideLink-files" tabindex="0">
          <!-- Files — info note + drop-to-upload zone + namba table flow -->


          <div class="alert alert-info py-2 px-3 mx-3 mb-3 small d-flex align-items-center gap-2"><i class="bi bi-info-circle"></i><div>Files from projects and tasks linked to the customer are not shown on this table.</div></div>

          <!-- Share File With modal -->
          <div class="modal fade" id="cvShareFileModal" tabindex="-1" aria-hidden="true" aria-labelledby="cvShfTitle">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content" style="border:none;border-radius:14px;">
                <div class="modal-header" style="border-bottom:1px solid #eef0f3;padding:16px 22px;">
                  <h5 class="modal-title" id="cvShfTitle" style="font-size:15.5px;font-weight:800;">Share File With</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding:20px 22px;">
                  <div class="mb-3 mb-0"><label>Contacts</label><select class="form-control form-select" id="shfContact">
                      <option selected>Suresh s</option>
                      <option>Divya M</option>
                      <option>Karthik R</option>
                    </select></div>
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
                  <div class="mb-3"><label>Email Subject</label><input type="text" class="form-control" id="sfSubject" autocomplete="off"></div>
                  <div class="mb-3"><label>Email Address</label><input type="email" class="form-control" id="sfEmail" autocomplete="off"></div>
                  <div class="mb-3 mb-0"><label>Message</label><textarea class="form-control" id="sfMessage" rows="5"></textarea></div>
                </div>
                <div class="modal-footer" style="border-top:1px solid #eef0f3;padding:12px 22px;">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="sfSubmit">Send File</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Drop files to upload zone -->
          <div class="border border-2 border-dashed rounded p-4 text-center mx-3 mb-3 bg-light-subtle cursor-pointer cv-fl-drop" id="cvFlDropZone">
            <div class="fw-semibold text-muted"><i class="bi bi-cloud-arrow-up fs-2 d-block mb-1 text-primary"></i>Drop files here to upload</div>
            <input type="file" id="cvFlFileInput" multiple style="display:none;">
          </div>
          <div class="mx-3" id="cvFlFileList"></div>

          <div class="card-custom p-0 mx-3" id="cvCard-files">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-paperclip"></i></div>
                <div>
                  <h3 class="card-title mb-0">Files</h3>
                </div>
              </div>

            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-files">
                <thead>
                  <tr>
                    <th>File</th>
                    <th>Show to customers area</th>
                    <th>Date Uploaded</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody id="cvBody-files">
                  <tr class="cv-row">
                    <td>
                      <a href="#" class="cv-fl-file-link"><i class="bi bi-file-earmark-pdf"></i>PRO-140-GHARUDA-SOFTWARE-TECHNOLOGY-PRIVATE-LIMITED.pdf</a>
                    </td>
                    <td>
                      <div class="form-check form-switch m-0 cv-fl-switch" style="width:fit-content" data-tip="Only files uploaded from customer profile have ability to show/hide in Customers area">
                        <input class="form-check-input" type="checkbox" role="switch" disabled>
                      </div>
                    </td>
                    <td>
                      21-08-2026 14:15:57 </td>
                    <td>
                      <button type="button" class="cv-fl-mail-btn" title="Send via email"><i class="bi bi-envelope"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-vault" role="tabpanel" aria-labelledby="cvSideLink-vault" tabindex="0">
          <div class="card-custom p-0" id="cvCard-vault">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-lock-fill"></i></div>
                <div>
                  <h3 class="card-title mb-0">Vault</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewVaultBtn"><i class="bi bi-plus-lg me-1"></i>New Entry</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-vault">
                <thead>
                  <tr>
                    <th>Server Address</th>
                    <th>Port</th>
                    <th>Username</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody id="cvBody-vault">
                  <tr class="cv-row">
                    <td>
                      ftp.example.com </td>
                    <td>
                      21 </td>
                    <td>
                      ggcompany </td>
                    <td>
                      FTP access </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-reminders" role="tabpanel" aria-labelledby="cvSideLink-reminders" tabindex="0">
          <div class="card-custom p-0" id="cvCard-reminders">
            <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
              <div class="d-flex align-items-center gap-3">
                <div class="icon-chip"><i class="bi bi-clock"></i></div>
                <div>
                  <h3 class="card-title mb-0">Reminders</h3>
                </div>
              </div>
              <button type="button" class="btn btn-primary btn-sm" id="cvNewReminderBtn"><i class="bi bi-plus-lg me-1"></i>Set Reminder</button>
            </div>

            <div class="table-responsive table-modern-wrap overflow-auto column-border">
              <table class="table-modern w-100 datatable" id="cvTbl-reminders">
                <thead>
                  <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Remind</th>
                    <th>Notified</th>
                  </tr>
                </thead>
                <tbody id="cvBody-reminders">
                  <tr class="cv-row">
                    <td>
                      Follow up on proposal </td>
                    <td>
                      25-09-2026 10:00 </td>
                    <td>
                      Karthik R </td>
                    <td>
                      No </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="cvTab-activity_log" role="tabpanel" aria-labelledby="cvSideLink-activity_log" tabindex="0">
          <div class="font-display fw-bold fs-5 mb-3">Activity Log</div>

          <div class="card border-0 shadow-sm p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
              <div>
                <div class="fw-bold fs-6 text-dark d-flex align-items-center gap-2"><i class="bi bi-card-list text-primary"></i> Activity Trail</div>
                <div class="small text-muted">All activities for GG COMPANY — latest first</div>
              </div>
              <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill">2 activities</span>
            </div>

            <div class="position-relative ps-4" style="border-left: 2px solid #e9ecef; margin-left: 14px;">
              <div class="position-relative mb-4">
                <span class="position-absolute rounded-circle bg-white border border-2 border-primary text-primary d-flex align-items-center justify-content-center shadow-sm" style="left: -38px; top: 0; width: 28px; height: 28px; font-size: 13px;">
                  <i class="bi bi-person-up"></i>
                </span>
                <div class="card p-3 border shadow-sm rounded-3 bg-light-subtle">
                  <div class="fw-semibold text-dark mb-1">Customer converted from lead</div>
                  <div class="d-flex gap-3 text-muted small">
                    <span><i class="bi bi-person-fill me-1"></i>Admin</span>
                    <span><i class="bi bi-clock me-1"></i>16-09-2026 11:53:29</span>
                  </div>
                </div>
              </div>
              <div class="position-relative mb-2">
                <span class="position-absolute rounded-circle bg-white border border-2 border-primary text-primary d-flex align-items-center justify-content-center shadow-sm" style="left: -38px; top: 0; width: 28px; height: 28px; font-size: 13px;">
                  <i class="bi bi-person-plus-fill"></i>
                </span>
                <div class="card p-3 border shadow-sm rounded-3 bg-light-subtle">
                  <div class="fw-semibold text-dark mb-1">Contact added: MOHAN S</div>
                  <div class="d-flex gap-3 text-muted small">
                    <span><i class="bi bi-person-fill me-1"></i>Admin</span>
                    <span><i class="bi bi-clock me-1"></i>16-09-2026 11:53:29</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Assign Admin modal (same modal pattern as Leave Report) -->
  <div class="leave-reject-modal" id="cvAssignModal" role="dialog" aria-modal="true" aria-labelledby="cvAssignTitle">
    <div class="leave-reject-dialog">
      <div class="leave-reject-head">
        <h3 id="cvAssignTitle">Assign Admin</h3><button type="button" class="modal-close" id="cvAssignClose" aria-label="Close">&times;</button>
      </div>
      <div class="leave-reject-body">
        <select class="form-select" id="cvAssignSelect" aria-label="Staff member">
          <option value="">Non selected</option>
          <option>Karthik R</option>
          <option>Divya M</option>
          <option>Arun Kumar</option>
          <option>Bala Kumar</option>
          <option>Chandran</option>
        </select>
        <div class="text-danger small mt-2" id="cvAssignError" hidden>Select a staff member.</div>
      </div>
      <div class="leave-reject-foot pt-3"><button type="button" class="btn btn-reject" id="cvAssignCancel">Close</button><button type="button" class="btn btn-primary" id="cvAssignSubmit">Submit</button></div>
    </div>
  </div>
  <!-- Add new contact modal (same modal pattern as Leave Report) -->
  <div class="leave-reject-modal" id="cvContactModal" role="dialog" aria-modal="true" aria-labelledby="cvContactTitle">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 780px; width: 100%; max-height: 90vh; display: flex; flex-direction: column; margin: auto;"><div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-person-plus-fill"></i></div>
          <div style="min-width:0;">
            <h5 id="cvContactTitle" class="mb-0 fw-bold">Add new contact</h5>
            <div class="small text-muted">GG COMPANY · Contact information & permissions</div>
          </div>
        </div>
        <button type="button" class="btn-close" id="cvContactClose" aria-label="Close"></button>
      </div>

      <div class="card-body p-4 overflow-auto">
        <!-- Avatar + identity -->
        <div class="card p-3 border mb-3 bg-light-subtle d-flex flex-row align-items-center gap-3">
          <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center fs-3" style="width:54px;height:54px;flex-shrink:0;" id="ctAvatarPreview"><i class="bi bi-person-fill"></i></div>
          <div style="min-width:0;">
            <div class="fw-bold small mb-1">Profile image</div>
            <p class="small text-muted mb-2">PNG or JPG, up to 2MB. Square images look best.</p>
            <input type="file" class="form-control form-control-sm" id="ctImage" accept="image/*">
          </div>
        </div>

        <!-- Contact details -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-person-vcard"></i> Contact details</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label cv-required" for="ctFirst">First Name</label>
                <input type="text" class="form-control" id="ctFirst" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" hidden>First name is required.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label cv-required" for="ctLast">Last Name</label>
                <input type="text" class="form-control" id="ctLast" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" hidden>Last name is required.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label cv-required" for="ctEmail">Email</label>
                <input type="email" class="form-control" id="ctEmail" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" hidden>Email is required.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="ctPhone">Phone</label>
                <input type="tel" class="form-control" id="ctPhone" value="+91 " autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="ctRole">Role Position</label>
                <input type="text" class="form-control" id="ctRole" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
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
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-shield-lock"></i> Security</div>
          <div class="mb-3">
            <label class="form-label cv-required" for="ctPassword" id="ctPasswordLabel">Password</label>
            <div class="input-group mb-2">
              <input type="password" class="form-control" id="ctPassword" autocomplete="new-password">
              <button type="button" class="btn btn-outline-secondary" id="ctTogglePass" title="Show / hide password" aria-label="Show password"><i class="bi bi-eye-fill"></i></button>
              <button type="button" class="btn btn-outline-secondary" id="ctGenPass" title="Generate password" aria-label="Generate password"><i class="bi bi-arrow-repeat"></i></button>
            </div>
            <div class="text-danger small mt-1 cv-err" hidden>Password is required.</div>
            <div class="cv-pass-meter"><i id="ctPassMeter"></i></div>
            <div class="form-text small text-muted" id="ctPassHint">Password strength — type to see strength</div>
          </div>
        </div>

        <!-- Options -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-envelope-gear"></i> Email options</div>
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
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2">
            <i class="bi bi-key"></i> Permissions
            <label class="cv-sec-all" title="Toggle all permissions"><input type="checkbox" class="form-check-input" id="ctAllPerms" checked> Toggle all</label>
          </div>
          <p class="cv-warn">Make sure to set appropriate permissions for this contact.</p>
          <div class="d-flex flex-column gap-2">
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Invoices</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Invoices" checked aria-label="Invoices permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Estimates</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Estimates" checked aria-label="Estimates permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Contracts</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Contracts" checked aria-label="Contracts permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Proposals</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Proposals" checked aria-label="Proposals permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Support</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Support" checked aria-label="Support permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Projects</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Projects" checked aria-label="Projects permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Purchase Orders</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Purchase Orders" checked aria-label="Purchase Orders permission"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Assets</span>
              <label class="cust-switch"><input type="checkbox" class="ct-perm" data-perm="Assets" checked aria-label="Assets permission"><span class="slider"></span></label>
            </div>
          </div>
        </div>

        <!-- Email notifications -->
        <div class="cv-section mb-0">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2">
            <i class="bi bi-bell"></i> Email notifications
            <label class="cv-sec-all" title="Toggle all notifications"><input type="checkbox" class="form-check-input" id="ctAllNotifs" checked> Toggle all</label>
          </div>
          <div class="d-flex flex-column gap-2">
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Invoice</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Invoice" checked aria-label="Invoice email notification"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Estimate</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Estimate" checked aria-label="Estimate email notification"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Credit Note</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Credit Note" checked aria-label="Credit Note email notification"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Project</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Project" checked aria-label="Project email notification"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Support Tickets</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Support Tickets" checked aria-label="Support Tickets email notification"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark">Contract</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Contract" checked aria-label="Contract email notification"><span class="slider"></span></label>
            </div>
            <div class="border rounded p-3 mb-3 bg-light-subtle">
              <span class="small fw-bold text-dark"><i class="bi bi-question-circle"></i>Task</span>
              <label class="cust-switch"><input type="checkbox" class="ct-notif" data-notif="Task" checked aria-label="Task email notification"><span class="slider"></span></label>
            </div>
          </div>
        </div>
      </div>

      <div class="card-footer bg-white border-top p-3 d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-outline-secondary" id="cvContactCancel">Close</button>
        <button type="button" class="btn btn-outline-primary me-2" id="cvContactReset"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset</button>
        <button type="button" class="btn btn-primary" id="cvContactSubmit"><i class="bi bi-check2 me-1"></i>Save contact</button>
      </div>
    </div>
  </div>
  <!-- Add note modal -->
  <div class="leave-reject-modal" id="cvNoteModal" role="dialog" aria-modal="true" aria-labelledby="cvNoteTitle">
    <div class="leave-reject-dialog cv-note-dialog">
      <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-journal-text"></i></div>
          <div style="min-width:0;">
            <h3 id="cvNoteTitle" class="mb-0">Add new note</h3>
            <div class="small text-muted">GG COMPANY · Internal note for this customer</div>
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


  <!-- New Appointment modal (appointments.php la irundhu copy — customer details prefill aagum) -->
  <div class="modal fade" id="apmContactModal" tabindex="-1" aria-hidden="true">
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
        <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-telephone-fill"></i></div>
            <div style="min-width:0;">
              <h5 id="cvCallLogTitle" class="mb-0 fw-bold">Add new call log</h5>
              <div class="small text-muted">GG COMPANY · Record call details & follow-ups</div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-4 bg-light-subtle">
          <div class="row g-4"><!-- Left column --><div class="col-12 col-lg-6"><div class="card border-0 shadow-sm p-4 bg-white h-100">
              <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-telephone-outbound"></i> Call details</div>

              <div class="mb-3">
                <label class="form-label small fw-bold"><span class="text-danger">* </span>Related</label>
                <select class="form-select" id="clRelated">
                  <option value="Customer" selected>Customer</option>
                  <option value="Lead">Lead</option>
                  <option value="Project">Project</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold"><span class="text-danger">* </span>Customer</label>
                <select class="form-select" id="clCustomer">
                  <option selected>GG COMPANY</option>
                </select>
              </div>

              <div class="row g-3">
                <div class="mb-3">
                  <label class="form-label small fw-bold"><span class="text-danger">* </span>Type</label>
                  <select class="form-select" id="clType">
                    <option value="">Non selected</option>
                    <option value="Outgoing">Outgoing</option>
                    <option value="Incoming">Incoming</option>
                    <option value="Missed">Missed</option>
                  </select>
                  <div class="text-danger small mt-1 cv-err" id="clTypeErr" hidden>Please select a call type.</div>
                </div><div class="col-12 col-sm-6 mb-3"><label class="form-label small fw-bold">Call Type</label>
                  <select class="form-select" id="clCallType">
                    <option value="">Non selected</option>
                    <option value="Support">Support</option>
                    <option value="Sales">Sales</option>
                    <option value="Follow-up">Follow-up</option>
                    <option value="General">General</option>
                  </select>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold"><span class="text-danger">* </span>Caller</label>
                <input type="text" class="form-control" id="clCaller" placeholder="Caller name" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" id="clCallerErr" hidden>Caller is required.</div>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold"><span class="text-danger">* </span>Contact</label>
                <input type="tel" class="form-control" id="clContact" placeholder="Contact number" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" id="clContactErr" hidden>Contact number is required.</div>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold"><span class="text-danger">* </span>Call Purpose</label>
                <input type="text" class="form-control" id="clPurpose" placeholder="e.g. Discuss proposal" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" id="clPurposeErr" hidden>Call purpose is required.</div>
              </div>

              <div class="mb-3">
                <label class="form-label small fw-bold"><span class="text-danger">* </span>Call Summary</label>
                <textarea class="form-control cv-cl-textarea" id="clSummary" rows="4" placeholder="What was discussed in the call?"></textarea>
                <div class="text-danger small mt-1 cv-err" id="clSummaryErr" hidden>Call summary is required.</div>
              </div>

              <div class="cv-cl-inline">
                <span class="cv-cl-inline-lbl">Follow-up Required</span>
                <div class="cv-cl-yn" role="radiogroup">
                  <label><input type="radio" name="clFollowup" value="Yes"><span>Yes</span></label>
                  <label><input type="radio" name="clFollowup" value="No" checked><span>No</span></label>
                </div>
              </div>
            </div>
          </div>

            <!-- Right: advanced options -->
            <div class="col-12 col-lg-6">
              <div class="card border-0 shadow-sm p-4 bg-white h-100">
                <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-sliders"></i> Advanced options</div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Call Start Time</label>
                  <input type="datetime-local" class="form-control" id="clStart">
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Call End Time</label>
                  <input type="datetime-local" class="form-control" id="clEnd">
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Call Duration</label>
                  <input type="text" class="form-control" id="clDuration" readonly placeholder="Auto-calculated from start & end time">
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Call Owner</label>
                  <input type="text" class="form-control" id="clOwner" value="info@GHARUDAtechnology.com" readonly style="background:#f8f9fa;">
                </div>

                <div class="mb-3">
                  <label class="form-label small fw-bold">Call with Staff Member</label>
                  <select class="form-select" id="clStaff">
                    <option value="">Non selected</option>
                    <option>gharuda SOFTWARE</option>
                    <option>Karthik R</option>
                    <option>Divya M</option>
                    <option>Madhupriya S</option>
                  </select>
                </div>

                <div class="cv-cl-inline mb-3">
                  <span class="cv-cl-inline-lbl">Completed</span>
                  <div class="cv-cl-yn" role="radiogroup">
                    <label><input type="radio" name="clCompleted" value="Yes"><span>Yes</span></label>
                    <label><input type="radio" name="clCompleted" value="No" checked><span>No</span></label>
                  </div>
                </div>

                <div class="cv-cl-inline mb-0">
                  <span class="cv-cl-inline-lbl">Important</span>
                  <div class="cv-cl-yn" role="radiogroup">
                    <label><input type="radio" name="clImportant" value="Yes"><span>Yes</span></label>
                    <label><input type="radio" name="clImportant" value="No" checked><span>No</span></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer bg-white border-top p-3 d-flex justify-content-end gap-2">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="clSubmit"><i class="bi bi-telephone-fill me-1"></i>Submit</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add vault entry modal -->
  <div class="leave-reject-modal" id="cvVaultModal" role="dialog" aria-modal="true" aria-labelledby="cvVaultTitle">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" style="max-width: 720px; width: 100%; max-height: 90vh; display: flex; flex-direction: column; margin: auto;"><div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-lock-fill"></i></div>
          <div style="min-width:0;">
            <h5 id="cvVaultTitle" class="mb-0 fw-bold">Add vault entry</h5>
            <div class="small text-muted">GG COMPANY · Securely store server & login credentials</div>
          </div>
        </div>
        <button type="button" class="btn-close" id="cvVaultClose" aria-label="Close"></button>
      </div>

      <div class="card-body p-4 overflow-auto">
        <!-- Server details -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-hdd-network"></i> Server details</div>
          <div class="row g-3">
            <div class="col-md-8">
              <div class="mb-3">
                <label class="form-label cv-required" for="cvServer">Server Address</label>
                <input type="text" class="form-control" id="cvServer" placeholder="e.g. ftp.example.com" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" id="cvServerErr" hidden>Server address is required.</div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="cvPort">Port</label>
                <input type="text" class="form-control" id="cvPort" placeholder="e.g. 21" autocomplete="off">
              </div>
            </div>
          </div>
        </div>

        <!-- Login credentials -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-person-fill-lock"></i> Login credentials</div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label cv-required" for="cvUser">Username</label>
                <input type="text" class="form-control" id="cvUser" placeholder="Login username" autocomplete="off">
                <div class="text-danger small mt-1 cv-err" id="cvUserErr" hidden>Username is required.</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label cv-required" for="cvPass">Password</label>
                <div class="input-group mb-1">
                  <input type="password" class="form-control" id="cvPass" placeholder="••••••••" autocomplete="new-password">
                  <button type="button" class="btn btn-outline-secondary" id="cvPassToggle" aria-label="Show password" tabindex="-1"><i class="bi bi-eye"></i></button>
                  <button type="button" class="btn btn-outline-secondary" id="cvPassGen" title="Generate strong password" aria-label="Generate password" tabindex="-1"><i class="bi bi-magic"></i></button>
                </div>
                <div class="text-danger small mt-1 cv-err" id="cvPassErr" hidden>Password is required.</div>
                <div class="cv-pass-meter"><i id="cvPassBar"></i></div>
                <div class="form-text small text-muted" id="cvPassHint">Use 8+ characters with letters, numbers & symbols.</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Description -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-card-text"></i> Description</div>
          <div class="mb-3">
            <label class="form-label" for="cvDesc">Short Description</label>
            <textarea class="form-control cv-vault-textarea" id="cvDesc" rows="4" placeholder="What is this credential for? e.g. cPanel login, FTP access..."></textarea>
          </div>
        </div>

        <!-- Visibility -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-shield-lock"></i> Who can see this entry?</div>
          <div class="row g-2 mb-3">
            <label class="col-12 col-md-4">
              <input type="radio" name="cvVisibility" value="staff" checked>
              <span class="card p-3 border h-100 bg-light-subtle cursor-pointer">
                <span class="small fw-bold text-dark mb-1"><i class="bi bi-people-fill"></i> All staff</span>
                <span class="small text-muted">Visible to all staff members who have access to this customer</span>
              </span>
            </label>
            <label class="col-12 col-md-4">
              <input type="radio" name="cvVisibility" value="admins">
              <span class="card p-3 border h-100 bg-light-subtle cursor-pointer">
                <span class="small fw-bold text-dark mb-1"><i class="bi bi-person-badge-fill"></i> Administrators only</span>
                <span class="small text-muted">Visible only to administrators of this customer</span>
              </span>
            </label>
            <label class="col-12 col-md-4">
              <input type="radio" name="cvVisibility" value="me">
              <span class="card p-3 border h-100 bg-light-subtle cursor-pointer">
                <span class="small fw-bold text-dark mb-1"><i class="bi bi-person-lock"></i> Only me</span>
                <span class="small text-muted">Visible only to me (administrators are not excluded)</span>
              </span>
            </label>
          </div>

          <label class="cv-vault-share">
            <input type="checkbox" id="cvShareProjects">
            <span class="border rounded p-3 bg-light-subtle mb-3"><i class="bi bi-check2"></i></span>
            <span class="small text-muted">
              <span class="t">Share in projects</span>
              <span class="d">Share this vault entry in projects with project members</span>
            </span>
          </label>
        </div>
      </div>

      <div class="card-footer bg-white border-top p-3 d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-outline-secondary" id="cvVaultCancel">Close</button>
        <button type="button" class="btn btn-primary" id="cvVaultSubmit"><i class="bi bi-lock-fill me-1"></i>Save entry</button>
      </div>
    </div>
  </div>
  <!-- Set reminder modal -->
  <div class="leave-reject-modal" id="cvReminderModal" role="dialog" aria-modal="true" aria-labelledby="cvReminderTitle">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden" id="cvReminderDialog" style="max-width: 650px; width: 100%; max-height: 90vh; display: flex; flex-direction: column; margin: auto;"><div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
          <div class="rounded-circle bg-primary-subtle text-primary p-2 d-flex align-items-center justify-content-center" style="width:40px;height:40px;"><i class="bi bi-bell-fill"></i></div>
          <div style="min-width:0;">
            <h5 id="cvReminderTitle" class="mb-0 fw-bold">Set reminder</h5>
            <div class="small text-muted">GG COMPANY · Get notified about important follow-ups</div>
          </div>
        </div>
        <button type="button" class="btn-close" id="cvReminderClose" aria-label="Close"></button>
      </div>

      <div class="card-body p-4 overflow-auto">
        <!-- Date to be notified -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-calendar-event"></i> Reminder date & time</div>
          <div class="row g-3">
            <div class="col-md-7">
              <div class="mb-3">
                <label class="form-label cv-required" for="cvRemDate">Date to be notified</label>
                <input type="date" class="form-control" id="cvRemDate">
                <div class="text-danger small mt-1 cv-err" id="cvRemDateErr" hidden>Date to be notified is required.</div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="cvRemTime">Time</label>
                <input type="time" class="form-control" id="cvRemTime">
              </div>
            </div>
          </div>
        </div>

        <!-- Assign to -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-person-check"></i> Notify whom?</div>
          <div class="mb-3">
            <label class="form-label cv-required" for="cvRemStaff">Set reminder to</label>
            <select class="form-select" id="cvRemStaff">
              <option value="">Select staff member</option>
              <option>gharuda SOFTWARE</option>
              <option>Karthik R</option>
              <option>Divya M</option>
              <option>Madhupriya S</option>
            </select>
            <div class="text-danger small mt-1 cv-err" id="cvRemStaffErr" hidden>Please select a staff member.</div>
          </div>
        </div>

        <!-- Description -->
        <div class="card border p-3 mb-3 bg-white">
          <div class="fw-bold text-dark mb-3 pb-2 border-bottom d-flex align-items-center gap-2"><i class="bi bi-card-text"></i> Description</div>
          <div class="mb-3">
            <label class="form-label cv-required" for="cvRemDesc">Description</label>
            <textarea class="form-control cv-reminder-textarea" id="cvRemDesc" rows="4" placeholder="What should they be reminded about? e.g. Follow up on proposal..."></textarea>
            <div class="text-danger small mt-1 cv-err" id="cvRemDescErr" hidden>Description is required.</div>
            <div class="form-text small text-muted">Tip: press Ctrl + Enter to submit quickly.</div>
          </div>
        </div>

        <!-- Email option -->
        <label class="cv-reminder-email">
          <input type="checkbox" id="cvRemEmail">
          <span class="border rounded p-3 bg-light-subtle mb-3"><i class="bi bi-check2"></i></span>
          <span class="small text-muted">
            <span class="t">Send email notification</span>
            <span class="d">Also send an email for this reminder to the selected staff</span>
          </span>
        </label>
      </div>

      <div class="card-footer bg-white border-top p-3 d-flex justify-content-end gap-2">
        <button type="button" class="btn btn-outline-secondary" id="cvReminderCancel">Close</button>
        <button type="button" class="btn btn-primary" id="cvReminderSubmit"><i class="bi bi-bell-fill me-1"></i>Set reminder</button>
      </div>
    </div>
  </div>
</main>

<?php include 'footer.php'; ?>







<!-- New Proposal modal — copied from lead.php #newProposalModal -->
<div class="modal fade" id="newProposalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" style="border:none;">

      <div class="modal-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
        <h5>New Proposal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="display:flex;flex-direction:column;flex:1 1 auto;min-height:0;overflow-y:auto;padding:0;">
        <div class="modal-body p-4 bg-light-subtle">
          <div class="np-grid">
            <!-- Left Column -->
            <div>
              <div class="mb-3"><label><span class="text-danger">* </span>Subject</label><input type="text" class="form-control" placeholder="Proposal subject"></div>
              <div class="mb-3"><label><span class="text-danger">* </span>Related</label><select class="form-select">
                  <option selected>Lead</option>
                  <option>Customer</option>
                </select></div>
              <div class="mb-3"><label><span class="text-danger">* </span>Lead</label><select class="form-select" id="npLeadSelect">
                  <option>Suresh - gh@gharuda.com</option>
                  <option>Arun Kumar - info@vetri.co</option>
                  <option>Meena Ramesh - meena@srlakshmi.in</option>
                </select></div>
              <div class="row g-3 mb-3">
                <div class="mb-3"><label><span class="text-danger">* </span>Date</label><input type="date" class="form-control" value="2026-09-19"></div>
                <div class="mb-3"><label>Open Till</label><input type="date" class="form-control" value="2026-09-26"></div>
              </div>
              <div class="row g-3 mb-3">
                <div class="mb-3"><label><span class="text-danger">* </span>Currency</label><select class="form-select">
                    <option selected>INR ₹</option>
                    <option>USD $</option>
                    <option>EUR €</option>
                    <option>GBP £</option>
                  </select></div>
                <div class="mb-3"><label>Discount type</label><select class="form-select">
                    <option selected>No discount</option>
                    <option>Before Tax</option>
                    <option>After Tax</option>
                  </select></div>
              </div>
              <div class="mb-3">
                <label><i class="bi bi-tag me-1"></i>Tags</label>
                <div class="nl-tags-wrap" id="npTagsWrap" style="max-width:100%;">
                  <div class="nl-tags-chips" id="npTagsChips"></div>
                  <input type="text" class="nl-tags-input" id="npTagsInput" placeholder="Type and press Enter...">
                </div>
                <input type="hidden" id="np_tags" value="">
              </div>
              <div class="mb-3">
                <div class="np-toggle"><input type="checkbox" checked id="npAllowComments"><label for="npAllowComments">Allow Comments</label></div>
              </div>
            </div>
            <!-- Right Column -->
            <div>
              <div class="row g-3 mb-3">
                <div class="mb-3"><label>Status</label><select class="form-select">
                    <option selected>Draft</option>
                    <option>Sent</option>
                    <option>Accepted</option>
                    <option>Rejected</option>
                  </select></div>
                <div class="mb-3"><label>Assigned</label><select class="form-select">
                    <option selected>GHRAUDA SOFTWARE</option>
                    <option>Harish D.</option>
                    <option>Divya A.</option>
                  </select></div>
              </div>
              <div class="mb-3"><label><span class="text-danger">* </span>To</label><input type="text" class="form-control" value="GHARUDA TECHNOLOGY"></div>
              <div class="mb-3"><label>Address</label><textarea class="form-control" rows="2">214, Velachery - Tambaram Main Rd, Narayanapuram, Pallikaranai, Chennai, Tamil Nadu 600100</textarea></div>
              <div class="row g-3 mb-3">
                <div class="mb-3"><label>Country</label><select class="form-select">
                    <option selected>India</option>
                    <option>USA</option>
                    <option>UK</option>
                  </select></div>
                <div class="mb-3"><label>State</label><select class="form-select">
                    <option value="">Nothing selected</option>
                    <option>Tamil Nadu</option>
                    <option>Karnataka</option>
                    <option>Maharashtra</option>
                  </select></div>
              </div>
              <div class="row g-3 mb-3">
                <div class="mb-3"><label>City</label><select class="form-select">
                    <option value="">Nothing selected</option>
                    <option>Chennai</option>
                    <option>Bangalore</option>
                    <option>Mumbai</option>
                  </select></div>
                <div class="mb-3"><label>Zip Code</label><input type="text" class="form-control" value="600100"></div>
              </div>
              <div class="row g-3 mb-3">
                <div class="mb-3"><label><span class="text-danger">* </span>Email</label><input type="email" class="form-control" value="gh@gharuda.com"></div>
                <div class="mb-3"><label>Phone</label><input type="text" class="form-control" value="9876543218"></div>
              </div>
            </div>
          </div>

          <!-- Items Section -->
          <div class="np-items-section">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
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
              <div class="d-flex align-items-center gap-3 small">
                <span>Show quantity as:</span>
                <label><input type="radio" name="npQtyType" checked> Qty</label>
                <label><input type="radio" name="npQtyType"> Hours</label>
                <label><input type="radio" name="npQtyType"> Qty/Hours</label>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered align-middle">
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
                <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="total-label">Sub Total :</span><span class="total-val" style="margin-right: -10px;">₹ 0.00</span></div>
                <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="total-label">Adjustment</span><input type="number" class="form-control" value="0" style="width:120px;"><span class="total-val">₹ 0.00</span></div>
                <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="total-label">Transport Amount</span><input type="number" class="form-control" value="0" style="width:120px;"><span class="total-val">₹ 0.00</span></div>
                <div class="d-flex justify-content-between align-items-center mb-2 small"><span class="total-label">Total :</span><span class="total-val total-grand" style="margin-right: -10px;">₹ 0.00</span></div>
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
      <div class="modal-footer bg-white border-top p-3 d-flex justify-content-between align-items-center">
        <span class="small text-muted">Include proposal items with merge field anywhere in proposal content as {proposal_items}</span>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">View PDF</button>
          <button type="button" class="btn btn-primary">Download</button>
          <button type="button" class="btn btn-primary">Print</button>
        </div>
      </div>
    </div>
  </div>
</div>














<script src="./assets/js/pages/customer-view.js?v=<?php echo time(); ?>"></script>