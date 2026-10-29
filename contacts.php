<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Contacts Directory</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">30 Active Contacts</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-people fs-6"></i>
                <a href="customers.php" class="text-decoration-none text-muted">Customers</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Global Contacts Directory</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="customer-dashboard.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-pie-chart"></i><span>Customer 360&deg;</span>
            </a>
            <a href="customers.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-building"></i><span>Customers List</span>
            </a>
            <a href="customer-new.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-building-add"></i><span>Onboard Account</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download Excel</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#newContactModal">
                <i class="bi bi-person-plus"></i><span>New Contact</span>
            </button>
        </div>
    </div>

    <!-- Contact KPI Cards (Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Client Contacts</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-people-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">30 Contacts</h3>
                <span class="text-muted small">Across 7 Active Accounts</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Primary Decision Makers</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-star-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">8 Contacts</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-shield-check me-1"></i>Sign-off Authority</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Mobile &amp; Email Verified</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-patch-check-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">28 Contacts</h3>
                <span class="text-muted small">93.3% Reachability</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Portal Access Active</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-person-check-fill"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">24 Enabled</h3>
                <span class="text-muted small">Support &amp; Invoices</span>
            </div>
        </div>
    </div>

    <!-- Contacts Directory Table Card -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">All Contacts Registry</h3>
                    <small class="text-muted">Key stakeholders, procurement heads &amp; finance SPOCs</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm select2" id="contactCompanyFilter">
                    <option value="">All Companies</option>
                    <option value="Power Spares Engineering">Power Spares Engineering</option>
                    <option value="Zen Publications">Zen Publications</option>
                    <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                    <option value="Gharuda Software">Gharuda Software</option>
                    <option value="GG COMPANY">GG COMPANY</option>
                </select>
                <button type="button" class="btn btn-primary btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#newContactModal">
                    <i class="bi bi-plus-lg me-1"></i>Add Contact
                </button>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="globalContactsTable" data-table-name="Contacts_Directory">
                <thead>
                    <tr>
                        <th>Contact Name</th>
                        <th>Company / Account</th>
                        <th>Email</th>
                        <th>Role / Position</th>
                        <th>Phone</th>
                        <th>Active</th>
                        <th>Last Login</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody id="globalContactsBody">
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-success text-white p-2 d-inline-flex align-items-center justify-content-center">MS</span>
                                <div>
                                    <div class="fw-bold text-dark">MOHAN S</div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">Primary SPOC</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><a href="mailto:kaviyarasu@ghratechnology.com" class="text-secondary text-decoration-none">kaviyarasu@ghratechnology.com</a></td>
                        <td><span class="badge bg-light text-dark border">Managing Director</span></td>
                        <td><a href="tel:9677063368" class="text-dark text-decoration-none">+91 96770 63368</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">16-09-2026 11:53</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="whatsapp-chat.php" class="btn btn-sm btn-light border text-success px-2 py-1" title="WhatsApp Contact"><i class="bi bi-whatsapp"></i></a>
                                <a href="mailto:kaviyarasu@ghratechnology.com" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Send Email"><i class="bi bi-envelope"></i></a>
                                <a href="quotation-create.php?client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-primary text-white p-2 d-inline-flex align-items-center justify-content-center">KM</span>
                                <div>
                                    <div class="fw-bold text-dark">Kaviyarasu M</div>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Decision Maker</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><a href="mailto:kaviyarasu@gmail.com" class="text-secondary text-decoration-none">kaviyarasu@gmail.com</a></td>
                        <td><span class="badge bg-light text-dark border">Project Manager</span></td>
                        <td><a href="tel:9840123456" class="text-dark text-decoration-none">+91 98401 23456</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">14-09-2026 10:20</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="whatsapp-chat.php" class="btn btn-sm btn-light border text-success px-2 py-1" title="WhatsApp Contact"><i class="bi bi-whatsapp"></i></a>
                                <a href="mailto:kaviyarasu@gmail.com" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Send Email"><i class="bi bi-envelope"></i></a>
                                <a href="quotation-create.php?client=Zen+Publications" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-info text-white p-2 d-inline-flex align-items-center justify-content-center">SB</span>
                                <div>
                                    <div class="fw-bold text-dark">Suresh Babu</div>
                                    <span class="badge bg-info-subtle text-info border border-info-subtle">Operations</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><a href="mailto:suresh@hindustanhydraulics.com" class="text-secondary text-decoration-none">suresh@hindustanhydraulics.com</a></td>
                        <td><span class="badge bg-light text-dark border">Operations Head</span></td>
                        <td><a href="tel:9444123890" class="text-dark text-decoration-none">+91 94441 23890</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">12-09-2026 15:45</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="whatsapp-chat.php" class="btn btn-sm btn-light border text-success px-2 py-1" title="WhatsApp Contact"><i class="bi bi-whatsapp"></i></a>
                                <a href="mailto:suresh@hindustanhydraulics.com" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Send Email"><i class="bi bi-envelope"></i></a>
                                <a href="quotation-create.php?client=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge rounded-circle bg-warning text-dark p-2 d-inline-flex align-items-center justify-content-center">PS</span>
                                <div>
                                    <div class="fw-bold text-dark">Priya S</div>
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">Finance SPOC</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="customer-view.php?id=5&amp;name=GG+COMPANY" class="text-dark fw-semibold text-decoration-none">
                                <i class="bi bi-building me-1 text-muted"></i>GG COMPANY
                            </a>
                        </td>
                        <td><a href="mailto:priya@ggcompany.com" class="text-secondary text-decoration-none">priya@ggcompany.com</a></td>
                        <td><span class="badge bg-light text-dark border">Finance &amp; Accounts</span></td>
                        <td><a href="tel:9841198765" class="text-dark text-decoration-none">+91 98411 98765</a></td>
                        <td>
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" checked aria-label="Active">
                            </div>
                        </td>
                        <td class="text-muted small">09-09-2026 09:12</td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="whatsapp-chat.php" class="btn btn-sm btn-light border text-success px-2 py-1" title="WhatsApp Contact"><i class="bi bi-whatsapp"></i></a>
                                <a href="mailto:priya@ggcompany.com" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Send Email"><i class="bi bi-envelope"></i></a>
                                <a href="quotation-create.php?client=GG+COMPANY" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create Quotation"><i class="bi bi-file-earmark-text"></i></a>
                                <a href="customer-view.php?id=5&amp;name=GG+COMPANY" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal: New Contact (Pure Bootstrap 5 Utilities) -->
<div class="modal fade" id="newContactModal" tabindex="-1" aria-labelledby="newContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
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
                <div class="modal-footer border-top p-3 bg-light">
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
    var encComp = encodeURIComponent(company);
    var role = document.getElementById('ncRole').value;
    var first = document.getElementById('ncFirst').value.trim();
    var last = document.getElementById('ncLast').value.trim();
    var name = first + ' ' + last;
    var initials = ((first.charAt(0) || 'C') + (last.charAt(0) || 'P')).toUpperCase();
    var email = document.getElementById('ncEmail').value.trim();
    var phone = document.getElementById('ncPhone').value.trim();

    var tbody = document.getElementById('globalContactsBody');
    var tr = document.createElement('tr');
    tr.innerHTML =
        '<td><div class="d-flex align-items-center gap-2">' +
            '<span class="badge rounded-circle bg-success text-white p-2 d-inline-flex align-items-center justify-content-center">' + initials + '</span>' +
            '<div><div class="fw-bold text-dark">' + name + '</div><span class="badge bg-success-subtle text-success border border-success-subtle">Verified SPOC</span></div>' +
        '</div></td>' +
        '<td><a href="customer-view.php?id=1&name=' + encComp + '" class="text-dark fw-semibold text-decoration-none"><i class="bi bi-building me-1 text-muted"></i>' + company + '</a></td>' +
        '<td><a href="mailto:' + email + '" class="text-secondary text-decoration-none">' + email + '</a></td>' +
        '<td><span class="badge bg-light text-dark border">' + role + '</span></td>' +
        '<td><a href="tel:' + phone.replace(/\s+/g, '') + '" class="text-dark text-decoration-none">' + phone + '</a></td>' +
        '<td><div class="form-check form-switch mb-0"><input class="form-check-input" type="checkbox" role="switch" checked></div></td>' +
        '<td class="text-muted small">Just now</td>' +
        '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
            '<a href="whatsapp-chat.php" class="btn btn-sm btn-light border text-success px-2 py-1" title="WhatsApp Contact"><i class="bi bi-whatsapp"></i></a>' +
            '<a href="mailto:' + email + '" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Send Email"><i class="bi bi-envelope"></i></a>' +
            '<a href="quotation-create.php?client=' + encComp + '" class="btn btn-sm btn-light border text-info px-2 py-1" title="Create Quotation"><i class="bi bi-file-earmark-text"></i></a>' +
            '<a href="customer-view.php?id=1&name=' + encComp + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Open Customer 360°"><i class="bi bi-person-vcard"></i></a>' +
        '</div></td>';
    tbody.prepend(tr);

    var modalEl = document.getElementById('newContactModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    var tbl = document.getElementById('globalContactsTable');
    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
}

document.addEventListener('DOMContentLoaded', function () {
    var compEl = document.getElementById('contactCompanyFilter');
    function filterContacts() {
        var comp = (compEl ? compEl.value : '').toLowerCase().trim();
        document.querySelectorAll('#globalContactsTable tbody tr').forEach(function (tr) {
            var text = tr.textContent.toLowerCase();
            tr.style.display = (!comp || text.indexOf(comp) !== -1) ? '' : 'none';
        });
    }
    if (compEl) {
        compEl.addEventListener('change', filterContacts);
        if (window.jQuery) jQuery(compEl).on('change', filterContacts);
    }
});
</script>

<?php include 'footer.php'; ?>
