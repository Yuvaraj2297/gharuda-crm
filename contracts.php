<?php include 'header.php'; ?>

<div class="container-fluid px-0">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div>
            <nav class="d-flex align-items-center gap-2 text-muted small mb-1">
                <span>Sales &amp; Legal</span>
                <i class="bi bi-chevron-right fs-10"></i>
                <span class="text-dark fw-semibold">Client Contracts &amp; SLAs</span>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <h1 class="h3 fw-bold mb-0 text-dark">Contracts &amp; Agreements</h1>
                <span class="badge bg-success-subtle text-success rounded-pill fw-semibold">₹48.6 Lakh Active Value</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="quotations.php" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-file-earmark-text me-1"></i>Quotations
            </a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newContractModal">
                <i class="bi bi-plus-lg me-1"></i>New Contract
            </button>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Active Contracts Value</span>
                    <span class="p-2 rounded-2 bg-success-subtle text-success"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹48,60,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-check-circle me-1"></i>14 Active Accounts</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Expiring in 30 Days</span>
                    <span class="p-2 rounded-2 bg-warning-subtle text-warning"><i class="bi bi-clock-history"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">3 Contracts</h3>
                <span class="text-warning small fw-semibold"><i class="bi bi-exclamation-triangle me-1"></i>Requires Renewal Action</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">AMC &amp; SLA Retainers</span>
                    <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-shield-check"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹24,50,000</h3>
                <span class="text-muted small">Annual Recurring Support</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Signed This Quarter</span>
                    <span class="p-2 rounded-2 bg-info-subtle text-info"><i class="bi bi-pen"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">6 Agreements</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 100% SLA Compliance</span>
            </div>
        </div>
    </div>

    <!-- Contracts Table Card -->
    <div class="card border-0 shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <span class="p-2 rounded-2 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-ruled"></i></span>
                <h6 class="fw-bold mb-0 text-dark">Client Agreements Registry</h6>
            </div>
            <div class="d-flex align-items-center gap-2">
                <input type="text" class="form-control form-control-sm" id="contractSearch" placeholder="Search contracts or clients..." style="width: 240px;">
                <select class="form-select form-select-sm" id="contractFilterStatus" style="width: 140px;">
                    <option value="">All Statuses</option>
                    <option value="Active">Active</option>
                    <option value="Expiring">Expiring Soon</option>
                    <option value="Negotiation">In Negotiation</option>
                    <option value="Expired">Expired</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 datatable" id="contractsTable" data-table-name="Contracts">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3" style="font-size:12px;font-weight:700;">CONTRACT #</th>
                        <th style="font-size:12px;font-weight:700;">SUBJECT / SCOPE</th>
                        <th style="font-size:12px;font-weight:700;">CUSTOMER</th>
                        <th style="font-size:12px;font-weight:700;">TYPE</th>
                        <th style="font-size:12px;font-weight:700;">VALUE</th>
                        <th style="font-size:12px;font-weight:700;">START DATE</th>
                        <th style="font-size:12px;font-weight:700;">END DATE</th>
                        <th style="font-size:12px;font-weight:700;">STATUS</th>
                        <th class="text-end pe-3" style="font-size:12px;font-weight:700;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 13.5px;">
                    <tr>
                        <td class="ps-3"><strong class="text-primary">CTR-2026-001</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Enterprise ERP &amp; Cloud Maintenance</div>
                            <small class="text-muted">Includes 24/7 SLA and quarterly server upgrades</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=1&name=Power+Spares+Engineering" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Power Spares Engineering
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Annual AMC</span></td>
                        <td><strong>₹12,50,000</strong></td>
                        <td>01-Jan-2026</td>
                        <td>31-Dec-2026</td>
                        <td><span class="badge bg-success-subtle text-success px-2.5 py-1 rounded-pill fw-semibold"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Agreement" onclick="viewContract('CTR-2026-001', 'Enterprise ERP & Cloud Maintenance', 'Power Spares Engineering', '₹12,50,000', 'Annual AMC', '01-Jan-2026', '31-Dec-2026', 'Active')"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download Document" onclick="alert('Downloading agreement PDF for CTR-2026-001...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3"><strong class="text-primary">CTR-2026-002</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Publishing CRM Portal Customization</div>
                            <small class="text-muted">Module delivery and annual API sync SLA</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=2&name=Zen+Publications" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Zen Publications
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Software SLA</span></td>
                        <td><strong>₹8,40,000</strong></td>
                        <td>15-Feb-2026</td>
                        <td>14-Nov-2026</td>
                        <td><span class="badge bg-warning-subtle text-warning px-2.5 py-1 rounded-pill fw-semibold"><i class="bi bi-clock-history me-1"></i>Expiring Soon</span></td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Agreement" onclick="viewContract('CTR-2026-002', 'Publishing CRM Portal Customization', 'Zen Publications', '₹8,40,000', 'Software SLA', '15-Feb-2026', '14-Nov-2026', 'Expiring Soon')"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download Document" onclick="alert('Downloading agreement PDF for CTR-2026-002...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3"><strong class="text-primary">CTR-2026-003</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Hydraulic Machinery Telemetry IoT Service</div>
                            <small class="text-muted">Telemetry sensor integration &amp; cloud storage</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=3&name=Hindustan+Hydraulics" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Hindustan Hydraulics
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Retainer</span></td>
                        <td><strong>₹18,00,000</strong></td>
                        <td>01-Mar-2026</td>
                        <td>28-Feb-2027</td>
                        <td><span class="badge bg-success-subtle text-success px-2.5 py-1 rounded-pill fw-semibold"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Agreement" onclick="viewContract('CTR-2026-003', 'Hydraulic Machinery Telemetry IoT Service', 'Hindustan Hydraulics', '₹18,00,000', 'Retainer', '01-Mar-2026', '28-Feb-2027', 'Active')"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download Document" onclick="alert('Downloading agreement PDF for CTR-2026-003...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="ps-3"><strong class="text-primary">CTR-2026-004</strong></td>
                        <td>
                            <div class="fw-semibold text-dark">Mobile Application Retainer &amp; DevOps</div>
                            <small class="text-muted">Monthly sprint cycles and automated QA</small>
                        </td>
                        <td>
                            <a href="customer-view.php?id=4&name=Gharuda+Software" class="text-dark text-decoration-none fw-semibold">
                                <i class="bi bi-building me-1 text-muted"></i>Gharuda Software
                            </a>
                        </td>
                        <td><span class="badge bg-light text-dark border">Retainer</span></td>
                        <td><strong>₹9,70,000</strong></td>
                        <td>01-Apr-2026</td>
                        <td>31-Mar-2027</td>
                        <td><span class="badge bg-primary-subtle text-primary px-2.5 py-1 rounded-pill fw-semibold"><i class="bi bi-hourglass-split me-1"></i>In Negotiation</span></td>
                        <td class="text-end pe-3">
                            <button class="btn btn-sm btn-outline-secondary py-1 px-2" title="View Agreement" onclick="viewContract('CTR-2026-004', 'Mobile Application Retainer & DevOps', 'Gharuda Software', '₹9,70,000', 'Retainer', '01-Apr-2026', '31-Mar-2027', 'In Negotiation')"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-outline-primary py-1 px-2" title="Download Document" onclick="alert('Downloading agreement PDF for CTR-2026-004...')"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: New Contract -->
<div class="modal fade" id="newContractModal" tabindex="-1" aria-labelledby="newContractModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom p-3">
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
                            <input type="text" class="form-control" id="cSubject" placeholder="e.g. Annual Software Maintenance SLA" required>
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
                                <option value="Power Spares Engineering">Power Spares Engineering</option>
                                <option value="Zen Publications">Zen Publications</option>
                                <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                                <option value="Gharuda Software">Gharuda Software</option>
                                <option value="GG COMPANY">GG COMPANY</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Contract Value (INR ₹) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="cValue" placeholder="e.g. 500000" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cStartDate" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold">End Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="cEndDate" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold">Terms &amp; Special Conditions</label>
                            <textarea class="form-control" id="cTerms" rows="3" placeholder="SLA response hours, penalty clauses, payment cycles..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top p-3">
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
            <div class="modal-body p-4" id="vcModalBody">
                <!-- Injected via JavaScript -->
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="alert('Agreement printed / exported!')"><i class="bi bi-printer me-1"></i>Print PDF</button>
            </div>
        </div>
    </div>
</div>

<script>
function viewContract(id, subject, customer, value, type, start, end, status) {
    document.getElementById('vcModalTitle').textContent = id + ' · ' + subject;
    document.getElementById('vcModalBody').innerHTML = `
        <div class="d-flex align-items-center justify-content-between mb-3 p-3 bg-light rounded-3">
            <div>
                <span class="text-muted small d-block">Contract Value</span>
                <strong class="fs-4 text-dark">${value}</strong>
            </div>
            <span class="badge bg-success-subtle text-success px-3 py-1.5 rounded-pill fw-semibold">${status}</span>
        </div>
        <div class="row g-2 mb-3 small">
            <div class="col-6"><strong>Client:</strong> <span class="text-muted">${customer}</span></div>
            <div class="col-6"><strong>Type:</strong> <span class="text-muted">${type}</span></div>
            <div class="col-6"><strong>Start Date:</strong> <span class="text-muted">${start}</span></div>
            <div class="col-6"><strong>End Date:</strong> <span class="text-muted">${end}</span></div>
        </div>
        <div class="border-top pt-3">
            <h6 class="small fw-bold text-dark mb-1">SLA Commitments</h6>
            <p class="text-muted small mb-0">Uptime guarantee 99.8%. Priority 1 issue resolution within 4 business hours. Scheduled maintenance outside standard operational hours.</p>
        </div>
    `;
    var modal = new bootstrap.Modal(document.getElementById('viewContractModal'));
    modal.show();
}

function saveContract() {
    var subject = document.getElementById('cSubject').value;
    var customer = document.getElementById('cCustomer').value;
    var val = Number(document.getElementById('cValue').value).toLocaleString('en-IN');
    var type = document.getElementById('cType').value;
    var start = document.getElementById('cStartDate').value;
    var end = document.getElementById('cEndDate').value;
    var ctrId = 'CTR-2026-00' + (document.querySelectorAll('#contractsTable tbody tr').length + 1);

    var tbody = document.querySelector('#contractsTable tbody');
    var tr = document.createElement('tr');
    tr.innerHTML = `
        <td class="ps-3"><strong class="text-primary">${ctrId}</strong></td>
        <td>
            <div class="fw-semibold text-dark">${subject}</div>
            <small class="text-muted">Direct client agreement</small>
        </td>
        <td>
            <a href="customers.php" class="text-dark text-decoration-none fw-semibold">
                <i class="bi bi-building me-1 text-muted"></i>${customer}
            </a>
        </td>
        <td><span class="badge bg-light text-dark border">${type}</span></td>
        <td><strong>₹${val}</strong></td>
        <td>${start}</td>
        <td>${end}</td>
        <td><span class="badge bg-success-subtle text-success px-2.5 py-1 rounded-pill fw-semibold"><i class="bi bi-patch-check-fill me-1"></i>Active</span></td>
        <td class="text-end pe-3">
            <button class="btn btn-sm btn-outline-secondary py-1 px-2" onclick="viewContract('${ctrId}', '${subject}', '${customer}', '₹${val}', '${type}', '${start}', '${end}', 'Active')"><i class="bi bi-eye"></i></button>
            <button class="btn btn-sm btn-outline-primary py-1 px-2" onclick="alert('Downloading agreement...')"><i class="bi bi-download"></i></button>
        </td>
    `;
    tbody.prepend(tr);

    var modalEl = document.getElementById('newContractModal');
    var modal = bootstrap.Modal.getInstance(modalEl);
    if (modal) modal.hide();
    var tbl = document.getElementById('contractsTable');
    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
    alert('Contract ' + ctrId + ' created successfully!');
}

document.addEventListener('DOMContentLoaded', function () {
    var searchEl = document.getElementById('contractSearch');
    var statusEl = document.getElementById('contractFilterStatus');
    function filterContracts() {
        var q = (searchEl ? searchEl.value : '').toLowerCase().trim();
        var st = (statusEl ? statusEl.value : '').toLowerCase().trim();
        document.querySelectorAll('#contractsTable tbody tr').forEach(function (tr) {
            var text = tr.textContent.toLowerCase();
            var matchQ = !q || text.indexOf(q) !== -1;
            var matchSt = !st || text.indexOf(st) !== -1;
            tr.style.display = (matchQ && matchSt) ? '' : 'none';
        });
    }
    if (searchEl) searchEl.addEventListener('input', filterContracts);
    if (statusEl) statusEl.addEventListener('change', filterContracts);
});
</script>

<?php include 'footer.php'; ?>
