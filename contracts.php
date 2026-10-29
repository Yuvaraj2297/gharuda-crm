<?php
include 'header.php';
$preQuote  = isset($_GET['quote']) ? htmlspecialchars($_GET['quote']) : '';
$preClient = isset($_GET['client']) ? htmlspecialchars($_GET['client']) : (isset($_GET['customer']) ? htmlspecialchars($_GET['customer']) : '');
?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Contracts &amp; SLA Agreements</h1>
                <span class="badge rounded-pill bg-success-subtle text-success border border-success-subtle px-3 py-2 fw-semibold">₹48.6 Lakh Active Value</span>
                <?php if ($preQuote): ?>
                    <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">
                        <i class="bi bi-link-45deg me-1"></i>From Quote #<?php echo $preQuote; ?>
                    </span>
                <?php endif; ?>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-pen fs-6"></i>
                <a href="deals.php" class="text-decoration-none text-muted">CRM</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Contracts &amp; SLAs</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="quotations.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-text"></i><span>Quotations</span>
            </a>
            <a href="projects-list.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-briefcase"></i><span>Delivery Projects</span>
            </a>
            <a href="Gharuda-ERP-Visual-Diagram.xlsx" download="Gharuda-ERP-Visual-Diagram.xlsx" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-excel"></i><span>Download Excel</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#newContractModal">
                <i class="bi bi-plus-lg"></i><span>New Contract</span>
            </button>
        </div>
    </div>

    <!-- KPI Cards (Bootstrap 5 Utilities) -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Active Contracts Value</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹48,60,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-check-circle me-1"></i>14 Active Accounts</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Expiring in 30 Days</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">3 Contracts</h3>
                <span class="text-warning small fw-semibold"><i class="bi bi-exclamation-triangle me-1"></i>Requires Renewal Action</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">AMC &amp; SLA Retainers</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-shield-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹24,50,000</h3>
                <span class="text-muted small">Annual Recurring Support</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Signed This Quarter</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-pen"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">6 Agreements</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 100% SLA Compliance</span>
            </div>
        </div>
    </div>

    <!-- Contracts Table Card -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-file-earmark-ruled"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Client Agreements Registry</h3>
                    <small class="text-muted">Manage Annual AMC, Software SLAs, Retainers &amp; Project SOWs</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm" id="contractFilterStatus">
                    <option value="">All Statuses</option>
                    <option value="Active">Active</option>
                    <option value="Expiring">Expiring Soon</option>
                    <option value="Negotiation">In Negotiation</option>
                    <option value="Expired">Expired</option>
                </select>
                <button type="button" class="btn btn-primary btn-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#newContractModal">
                    <i class="bi bi-plus-lg me-1"></i>New Agreement
                </button>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="contractsTable" data-table-name="Contracts">
                <thead>
                    <tr>
                        <th>Contract #</th>
                        <th>Subject / Scope</th>
                        <th>Customer</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody id="contractsTbody">
                    <tr>
                        <td><strong class="text-primary">CTR-2026-001</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Enterprise ERP &amp; Cloud Maintenance</div>
                            <small class="text-muted">Includes 24/7 SLA and quarterly server upgrades</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Annual AMC</span></td>
                        <td><strong>₹12,50,000</strong></td>
                        <td>01-Jan-2026</td>
                        <td>31-Dec-2026</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Agreement" onclick="viewContract('CTR-2026-001', 'Enterprise ERP & Cloud Maintenance', 'Power Spares Engineering', '₹12,50,000', 'Annual AMC', '01-Jan-2026', '31-Dec-2026', 'Active')"><i class="bi bi-eye"></i></button>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="invoice-create.php?client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-success px-2 py-1" title="Generate Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="text-primary">CTR-2026-002</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Publishing CRM Portal Customization</div>
                            <small class="text-muted">Module delivery and annual API sync SLA</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Software SLA</span></td>
                        <td><strong>₹8,40,000</strong></td>
                        <td>15-Feb-2026</td>
                        <td>14-Nov-2026</td>
                        <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill"><i class="bi bi-clock-history me-1"></i>Expiring Soon</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Agreement" onclick="viewContract('CTR-2026-002', 'Publishing CRM Portal Customization', 'Zen Publications', '₹8,40,000', 'Software SLA', '15-Feb-2026', '14-Nov-2026', 'Expiring Soon')"><i class="bi bi-eye"></i></button>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="invoice-create.php?client=Zen+Publications" class="btn btn-sm btn-light border text-success px-2 py-1" title="Generate Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="text-primary">CTR-2026-003</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Hydraulic Machinery Telemetry IoT Service</div>
                            <small class="text-muted">Telemetry sensor integration &amp; cloud storage</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Retainer</span></td>
                        <td><strong>₹18,00,000</strong></td>
                        <td>01-Mar-2026</td>
                        <td>28-Feb-2027</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Agreement" onclick="viewContract('CTR-2026-003', 'Hydraulic Machinery Telemetry IoT Service', 'Hindustan Hydraulics', '₹18,00,000', 'Retainer', '01-Mar-2026', '28-Feb-2027', 'Active')"><i class="bi bi-eye"></i></button>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="invoice-create.php?client=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-success px-2 py-1" title="Generate Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong class="text-primary">CTR-2026-004</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Mobile Application Retainer &amp; DevOps</div>
                            <small class="text-muted">Monthly sprint cycles and automated QA</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=4&amp;name=Gharuda+Software" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Gharuda Software
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Retainer</span></td>
                        <td><strong>₹9,70,000</strong></td>
                        <td>01-Apr-2026</td>
                        <td>31-Mar-2027</td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill"><i class="bi bi-hourglass-split me-1"></i>In Negotiation</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Agreement" onclick="viewContract('CTR-2026-004', 'Mobile Application Retainer & DevOps', 'Gharuda Software', '₹9,70,000', 'Retainer', '01-Apr-2026', '31-Mar-2027', 'In Negotiation')"><i class="bi bi-eye"></i></button>
                                <a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="invoice-create.php?client=Gharuda+Software" class="btn btn-sm btn-light border text-success px-2 py-1" title="Generate Tax Invoice"><i class="bi bi-receipt"></i></a>
                                <a href="customer-view.php?id=4&amp;name=Gharuda+Software" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal: New Contract -->
<div class="modal fade" id="newContractModal" tabindex="-1" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3 bg-light bg-opacity-50">
                <div class="d-flex align-items-center gap-2">
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-plus"></i></span>
                    <h5 class="modal-title fw-bold text-dark" id="newContractModalLabel">Create New Client Contract</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="newContractForm" onsubmit="event.preventDefault(); saveContract();">
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label small fw-bold">Contract Subject / Scope <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="cSubject" placeholder="e.g. Annual Software Maintenance SLA" value="<?php echo $preQuote ? 'SLA Agreement for Quote #' . $preQuote : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-bold">Contract Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="cType" required>
                                <option value="Annual AMC">Annual AMC</option>
                                <option value="Software SLA">Software SLA</option>
                                <option value="Retainer">Monthly Retainer</option>
                                <option value="Implementation">Implementation SOW</option>
                                <option value="Consulting">Consulting Agreement</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Customer <span class="text-danger">*</span></label>
                            <select class="form-select" id="cCustomer" required>
                                <option value="">Select Client</option>
                                <option value="Power Spares Engineering" <?php if ($preClient == 'Power Spares Engineering') echo 'selected'; ?>>Power Spares Engineering</option>
                                <option value="Zen Publications" <?php if ($preClient == 'Zen Publications') echo 'selected'; ?>>Zen Publications</option>
                                <option value="Hindustan Hydraulics" <?php if ($preClient == 'Hindustan Hydraulics') echo 'selected'; ?>>Hindustan Hydraulics</option>
                                <option value="Gharuda Software" <?php if ($preClient == 'Gharuda Software') echo 'selected'; ?>>Gharuda Software</option>
                                <option value="GG COMPANY" <?php if ($preClient == 'GG COMPANY') echo 'selected'; ?>>GG COMPANY</option>
                                <?php if ($preClient && !in_array($preClient, ['Power Spares Engineering', 'Zen Publications', 'Hindustan Hydraulics', 'Gharuda Software', 'GG COMPANY'])): ?>
                                    <option value="<?php echo $preClient; ?>" selected><?php echo $preClient; ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Contract Value (INR ₹) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="cValue" placeholder="e.g. 500000" value="590000" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cStartDate" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cEndDate" value="<?php echo date('Y-m-d', strtotime('+1 year')); ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Terms &amp; Special Conditions</label>
                            <textarea class="form-control" id="cTerms" rows="3" placeholder="SLA response hours, penalty clauses, payment cycles...">Uptime guarantee 99.8%. Priority 1 response within 1 hour, resolution within 4 hours.</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3 bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-check2 me-1"></i>Save &amp; Activate Contract</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: View Contract Details -->
<div class="modal fade" id="viewContractModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3">
                <h5 class="modal-title fw-bold text-dark" id="vcModalTitle">Contract Overview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="vcModalBody"></div>
            <div class="modal-footer border-top p-3 bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="window.print();"><i class="bi bi-printer me-1"></i>Print PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
function viewContract(id, subject, customer, value, type, start, end, status) {
    document.getElementById('vcModalTitle').textContent = id + ' · ' + subject;
    document.getElementById('vcModalBody').innerHTML =
        '<div class="d-flex align-items-center justify-content-between mb-3 p-3 bg-light rounded-3">' +
            '<div><span class="text-muted small d-block">Contract Value</span><strong class="fs-4 text-dark">' + value + '</strong></div>' +
            '<span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">' + status + '</span>' +
        '</div>' +
        '<div class="row g-2 mb-3 small">' +
            '<div class="col-6"><strong>Client:</strong> <span class="text-muted">' + customer + '</span></div>' +
            '<div class="col-6"><strong>Type:</strong> <span class="text-muted">' + type + '</span></div>' +
            '<div class="col-6"><strong>Start Date:</strong> <span class="text-muted">' + start + '</span></div>' +
            '<div class="col-6"><strong>End Date:</strong> <span class="text-muted">' + end + '</span></div>' +
        '</div>' +
        '<div class="border-top pt-3">' +
            '<h6 class="small fw-bold text-dark mb-1">SLA Commitments</h6>' +
            '<p class="text-muted small mb-0">Uptime guarantee 99.8%. Priority 1 issue resolution within 4 business hours. Scheduled maintenance outside standard operational hours.</p>' +
        '</div>';
    bootstrap.Modal.getOrCreateInstance(document.getElementById('viewContractModal')).show();
}

function saveContract() {
    var subject = document.getElementById('cSubject').value;
    var customer = document.getElementById('cCustomer').value;
    var encCust = encodeURIComponent(customer);
    var val = Number(document.getElementById('cValue').value).toLocaleString('en-IN');
    var type = document.getElementById('cType').value;
    var start = document.getElementById('cStartDate').value;
    var end = document.getElementById('cEndDate').value;
    var ctrId = 'CTR-2026-00' + (document.querySelectorAll('#contractsTable tbody tr').length + 1);

    var tbody = document.getElementById('contractsTbody');
    var tr = document.createElement('tr');
    tr.innerHTML =
        '<td><strong class="text-primary">' + ctrId + '</strong></td>' +
        '<td><div class="fw-semibold text-dark">' + subject + '</div><small class="text-muted">Direct client agreement</small></td>' +
        '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="text-dark text-decoration-none fw-semibold"><i class="bi bi-building me-1 text-muted"></i>' + customer + '</a></td>' +
        '<td><span class="badge bg-light text-dark border">' + type + '</span></td>' +
        '<td><strong>₹' + val + '</strong></td>' +
        '<td>' + start + '</td>' +
        '<td>' + end + '</td>' +
        '<td><span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>' +
        '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
            '<button type="button" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="View Agreement" onclick="viewContract(\'' + ctrId + '\', \'' + subject + '\', \'' + customer + '\', \'₹' + val + '\', \'' + type + '\', \'' + start + '\', \'' + end + '\', \'Active\')"><i class="bi bi-eye"></i></button>' +
            '<a href="project-create.php" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>' +
            '<a href="invoice-create.php?client=' + encCust + '" class="btn btn-sm btn-light border text-success px-2 py-1" title="Generate Tax Invoice"><i class="bi bi-receipt"></i></a>' +
            '<a href="customer-view.php?id=1&name=' + encCust + '" class="btn btn-sm btn-light border text-primary px-2 py-1" title="Customer 360°"><i class="bi bi-person-vcard"></i></a>' +
        '</div></td>';
    tbody.prepend(tr);

    var modalEl = document.getElementById('newContractModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    var tbl = document.getElementById('contractsTable');
    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
}

document.addEventListener('DOMContentLoaded', function () {
    var statusEl = document.getElementById('contractFilterStatus');
    if (statusEl) {
        statusEl.addEventListener('change', function () {
            var st = statusEl.value.toLowerCase().trim();
            document.querySelectorAll('#contractsTable tbody tr').forEach(function (tr) {
                tr.style.display = (!st || tr.textContent.toLowerCase().indexOf(st) !== -1) ? '' : 'none';
            });
        });
    }

    <?php if ($preClient || $preQuote): ?>
    if (window.bootstrap && bootstrap.Modal) {
        bootstrap.Modal.getOrCreateInstance(document.getElementById('newContractModal')).show();
    }
    <?php endif; ?>
});
</script>

<?php include 'footer.php'; ?>
