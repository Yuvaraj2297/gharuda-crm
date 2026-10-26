<?php include 'header.php'; ?>

<style>
/* Scoped Contacts Page Styling */
.contacts-avatar {
    width: 38px !important;
    height: 38px !important;
    min-width: 38px !important;
    max-width: 38px !important;
    border-radius: 50% !important;
    object-fit: cover !important;
    border: 2px solid #e2e8f0;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
}
.cust-switch {
    position: relative;
    display: inline-flex;
    align-items: center;
    width: 38px;
    height: 22px;
    margin: 0;
    cursor: pointer;
    vertical-align: middle;
}
.cust-switch input {
    opacity: 0;
    width: 0;
    height: 0;
    position: absolute;
}
.cust-switch .slider {
    position: absolute;
    inset: 0;
    background-color: #cbd5e1;
    border-radius: 22px;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
}
.cust-switch .slider::before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 3px;
    bottom: 3px;
    background-color: #ffffff;
    border-radius: 50%;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
}
.cust-switch input:checked + .slider {
    background-color: var(--primary, #16a34a);
    box-shadow: 0 2px 6px rgba(22, 163, 74, 0.35);
}
.cust-switch input:checked + .slider::before {
    transform: translateX(16px);
}
</style>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <a href="customers.php" class="text-decoration-none text-muted hover-primary">Customers</a>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Global Contacts Directory</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Contacts Directory</h1>
                <span class="badge bg-success-subtle text-success rounded-pill fw-semibold">30 Active Contacts</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="customers.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-building me-1"></i>Customers
            </a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newContactModal">
                <i class="bi bi-person-plus me-1"></i>New Contact
            </button>
        </div>
    </div>

    <!-- Contact KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Client Contacts</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-people-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">30 Contacts</h3>
                <span class="text-muted small">Across 7 Active Accounts</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Primary Decision Makers</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-star-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">8 Contacts</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-shield-check me-1"></i>Sign-off Authority</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Mobile &amp; Email Verified</span>
                    <span class="p-2 rounded-2 bg-info-subtle text-info"><i class="bi bi-patch-check-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">28 Contacts</h3>
                <span class="text-muted small">93.3% Reachability</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Portal Access Active</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-person-check-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">24 Enabled</h3>
                <span class="text-muted small">Support &amp; Invoices</span>
            </div>
        </div>
    </div>

    <!-- Contacts Table Card -->
    <div class="card border-0 shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-person-badge"></i></span>
                <h6 class="fw-bold mb-0 text-dark">All Contacts Registry</h6>
            </div>
            <div class="d-flex align-items-center gap-2">
                <input type="text" class="form-control form-control-sm" id="contactSearchInput" placeholder="Search by name, email, company..." style="width: 250px;">
                <select class="form-select form-select-sm" id="contactCompanyFilter" style="width: 170px;">
                    <option value="">All Companies</option>
                    <option value="Power Spares Engineering">Power Spares Engineering</option>
                    <option value="Zen Publications">Zen Publications</option>
                    <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                    <option value="Gharuda Software">Gharuda Software</option>
                    <option value="GG COMPANY">GG COMPANY</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="globalContactsTable">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:12px;font-weight:700;">CONTACT NAME</th>
                        <th style="font-size:12px;font-weight:700;">COMPANY / ACCOUNT</th>
                        <th style="font-size:12px;font-weight:700;">EMAIL</th>
                        <th style="font-size:12px;font-weight:700;">ROLE / POSITION</th>
                        <th style="font-size:12px;font-weight:700;">PHONE</th>
                        <th style="font-size:12px;font-weight:700; text-align: center;">ACTIVE</th>
                        <th style="font-size:12px;font-weight:700;">LAST LOGIN</th>
                        <th class="text-end pe-3" style="font-size:12px;font-weight:700;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13.5px;" id="globalContactsBody">
                    <tr>
                        <td class="ps-3">
                            <span class="d-inline-flex align-items-center gap-2.5">
                                <img src="./assets/img/profile-1.jpg" class="contacts-avatar" alt="MOHAN S">
                                <div>
                                    <strong class="text-dark d-block">MOHAN S</strong>
                                    <span class="badge bg-success-subtle text-success" style="font-size: 10.5px; padding: 2px 6px;">Primary Contact</span>
                                </div>
                            </span>
                        </td>
                        <td>
                            <a href="customer-view.php?id=1&name=Power+Spares+Engineering" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td>
                            <a href="mailto:kaviyarasu@ghratechnology.com" class="text-muted text-decoration-none small">
                                <i class="bi bi-envelope me-1 text-primary"></i>kaviyarasu@ghratechnology.com
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border"><i class="bi bi-briefcase me-1 text-secondary"></i>Event Management</span></td>
                        <td>
                            <a href="tel:9677063368" class="text-dark text-decoration-none small">
                                <i class="bi bi-telephone me-1 text-primary"></i>+91 9677063368
                            </a>
                        </td>
                        <td class="text-center">
                            <label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label>
                        </td>
                        <td><span class="text-muted small"><i class="bi bi-clock me-1"></i>16-09-2026 11:53</span></td>
                        <td class="text-end pe-3">
                            <a href="mailto:kaviyarasu@ghratechnology.com" class="btn btn-sm btn-outline-secondary py-1 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
                            <a href="customer-view.php?id=1" class="btn btn-sm btn-outline-primary py-1 px-2" title="View in Customer 360"><i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <span class="d-inline-flex align-items-center gap-2.5">
                                <img src="./assets/img/profile-2.jpg" class="contacts-avatar" alt="Kaviyarasu M">
                                <div>
                                    <strong class="text-dark d-block">Kaviyarasu M</strong>
                                    <span class="badge bg-primary-subtle text-primary" style="font-size: 10.5px; padding: 2px 6px;">Staff</span>
                                </div>
                            </span>
                        </td>
                        <td>
                            <a href="customer-view.php?id=2&name=Zen+Publications" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td>
                            <a href="mailto:kaviyarasu@gmail.com" class="text-muted text-decoration-none small">
                                <i class="bi bi-envelope me-1 text-primary"></i>kaviyarasu@gmail.com
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border"><i class="bi bi-briefcase me-1 text-secondary"></i>Project Manager</span></td>
                        <td>
                            <a href="tel:9840123456" class="text-dark text-decoration-none small">
                                <i class="bi bi-telephone me-1 text-primary"></i>+91 9840123456
                            </a>
                        </td>
                        <td class="text-center">
                            <label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label>
                        </td>
                        <td><span class="text-muted small"><i class="bi bi-clock me-1"></i>14-09-2026 10:20</span></td>
                        <td class="text-end pe-3">
                            <a href="mailto:kaviyarasu@gmail.com" class="btn btn-sm btn-outline-secondary py-1 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
                            <a href="customer-view.php?id=2" class="btn btn-sm btn-outline-primary py-1 px-2" title="View in Customer 360"><i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <span class="d-inline-flex align-items-center gap-2.5">
                                <img src="./assets/img/profile-3.jpg" class="contacts-avatar" alt="Suresh Babu">
                                <div>
                                    <strong class="text-dark d-block">Suresh Babu</strong>
                                    <span class="badge bg-primary-subtle text-primary" style="font-size: 10.5px; padding: 2px 6px;">Staff</span>
                                </div>
                            </span>
                        </td>
                        <td>
                            <a href="customer-view.php?id=3&name=Hindustan+Hydraulics" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td>
                            <a href="mailto:suresh@ggcompany.com" class="text-muted text-decoration-none small">
                                <i class="bi bi-envelope me-1 text-primary"></i>suresh@ggcompany.com
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border"><i class="bi bi-briefcase me-1 text-secondary"></i>Operations Head</span></td>
                        <td>
                            <a href="tel:9444123890" class="text-dark text-decoration-none small">
                                <i class="bi bi-telephone me-1 text-primary"></i>+91 9444123890
                            </a>
                        </td>
                        <td class="text-center">
                            <label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label>
                        </td>
                        <td><span class="text-muted small"><i class="bi bi-clock me-1"></i>12-09-2026 15:45</span></td>
                        <td class="text-end pe-3">
                            <a href="mailto:suresh@ggcompany.com" class="btn btn-sm btn-outline-secondary py-1 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
                            <a href="customer-view.php?id=3" class="btn btn-sm btn-outline-primary py-1 px-2" title="View in Customer 360"><i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3">
                            <span class="d-inline-flex align-items-center gap-2.5">
                                <img src="./assets/img/profile-4.jpg" class="contacts-avatar" alt="Priya S">
                                <div>
                                    <strong class="text-dark d-block">Priya S</strong>
                                    <span class="badge bg-primary-subtle text-primary" style="font-size: 10.5px; padding: 2px 6px;">Staff</span>
                                </div>
                            </span>
                        </td>
                        <td>
                            <a href="customer-view.php?id=5&name=GG+COMPANY" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>GG COMPANY
                            </a>
                        </td>
                        <td>
                            <a href="mailto:priya@ggcompany.com" class="text-muted text-decoration-none small">
                                <i class="bi bi-envelope me-1 text-primary"></i>priya@ggcompany.com
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border"><i class="bi bi-briefcase me-1 text-secondary"></i>Finance &amp; Accounts</span></td>
                        <td>
                            <a href="tel:9841198765" class="text-dark text-decoration-none small">
                                <i class="bi bi-telephone me-1 text-primary"></i>+91 9841198765
                            </a>
                        </td>
                        <td class="text-center">
                            <label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label>
                        </td>
                        <td><span class="text-muted small"><i class="bi bi-clock me-1"></i>09-09-2026 09:12</span></td>
                        <td class="text-end pe-3">
                            <a href="mailto:priya@ggcompany.com" class="btn btn-sm btn-outline-secondary py-1 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
                            <a href="customer-view.php?id=5" class="btn btn-sm btn-outline-primary py-1 px-2" title="View in Customer 360"><i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Contact -->
<div class="modal fade" id="newContactModal" tabindex="-1" aria-labelledby="newContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-person-plus-fill"></i></span>
                    <h5 class="modal-title fw-bold text-dark" id="newContactModalLabel">Add New Client Contact</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newContactForm" onsubmit="event.preventDefault(); saveGlobalContact();">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer Company <span class="text-danger">*</span></label>
                            <select class="form-select" id="ncCompany" required>
                                <option value="">Select Customer Company...</option>
                                <option value="Power Spares Engineering">Power Spares Engineering</option>
                                <option value="Zen Publications">Zen Publications</option>
                                <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                                <option value="Gharuda Software">Gharuda Software</option>
                                <option value="GG COMPANY">GG COMPANY</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Role / Job Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ncRole" placeholder="e.g. Procurement Lead / General Manager" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ncFirst" placeholder="First name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ncLast" placeholder="Last name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="ncEmail" placeholder="contact@company.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" id="ncPhone" value="+91 ">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2 me-1"></i>Save Contact</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function saveGlobalContact() {
    var company = document.getElementById('ncCompany').value;
    var role = document.getElementById('ncRole').value;
    var name = (document.getElementById('ncFirst').value.trim() + ' ' + document.getElementById('ncLast').value.trim());
    var email = document.getElementById('ncEmail').value.trim();
    var phone = document.getElementById('ncPhone').value.trim();

    var tbody = document.getElementById('globalContactsBody');
    var tr = document.createElement('tr');
    tr.innerHTML = `
        <td class="ps-3">
            <span class="d-inline-flex align-items-center gap-2.5">
                <img src="./assets/img/profile-1.jpg" class="contacts-avatar" alt="${name}">
                <div>
                    <strong class="text-dark d-block">${name}</strong>
                    <span class="badge bg-primary-subtle text-primary" style="font-size: 10.5px; padding: 2px 6px;">Staff</span>
                </div>
            </span>
        </td>
        <td>
            <a href="customers.php" class="text-dark fw-semibold text-decoration-none">
                <i class="bi bi-building me-1 text-muted"></i>${company}
            </a>
        </td>
        <td>
            <a href="mailto:${email}" class="text-muted text-decoration-none small">
                <i class="bi bi-envelope me-1 text-primary"></i>${email}
            </a>
        </td>
        <td><span class="badge bg-light text-dark border"><i class="bi bi-briefcase me-1 text-secondary"></i>${role}</span></td>
        <td>
            <a href="tel:${phone.replace(/\\s+/g, '')}" class="text-dark text-decoration-none small">
                <i class="bi bi-telephone me-1 text-primary"></i>${phone}
            </a>
        </td>
        <td class="text-center">
            <label class="cust-switch"><input type="checkbox" checked><span class="slider"></span></label>
        </td>
        <td><span class="text-muted small"><i class="bi bi-clock me-1"></i>Just now</span></td>
        <td class="text-end pe-3">
            <a href="mailto:${email}" class="btn btn-sm btn-outline-secondary py-1 px-2" title="Send Email"><i class="bi bi-envelope"></i></a>
            <a href="customers.php" class="btn btn-sm btn-outline-primary py-1 px-2" title="View"><i class="bi bi-box-arrow-up-right"></i></a>
        </td>
    `;
    tbody.prepend(tr);

    var modalEl = document.getElementById('newContactModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    alert('Contact ' + name + ' added successfully!');
}
</script>

<?php include 'footer.php'; ?>
