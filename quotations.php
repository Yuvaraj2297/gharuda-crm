<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Quotations &amp; Proposals</h1>
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">18 Proposals Issued</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-file-earmark-text fs-6"></i>
                <a href="deals.php" class="text-decoration-none text-muted">CRM</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Quotations &amp; Proposals</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="deals.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-kanban"></i><span>Deals Pipeline</span>
            </a>
            <a href="sales-orders.php" class="btn btn-outline-success btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-bag-check"></i><span>Sales Orders (SO)</span>
            </a>
            <a href="contracts.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-pen"></i><span>SLA Contracts</span>
            </a>
            <a href="quotation-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-plus-lg"></i><span>Create Quotation</span>
            </a>
        </div>
    </div>

    <!-- Summary KPI Cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Proposals Value</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-file-earmark-text"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹64,20,000</h3>
                <span class="text-muted small">18 Quotations Sent</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Accepted / Won</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-check-circle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹32,50,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 50.6% Conversion</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Awaiting Client Response</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-hourglass-split"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹24,10,000</h3>
                <span class="text-muted small">7 Pending Follow-up</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Declined / Expired</span>
                    <span class="p-2 rounded-3 bg-danger-subtle text-danger"><i class="bi bi-x-circle"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹7,60,000</h3>
                <span class="text-muted small">2 Re-quote requested</span>
            </div>
        </div>
    </div>

    <!-- Quotations Directory Card -->
    <div class="card-custom p-0 overflow-hidden mb-4">
        <div class="card-head d-flex align-items-center justify-content-between flex-wrap gap-2 border-bottom p-3 mb-0">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-chip">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <h3 class="card-title mb-0">Quotations Directory</h3>
                    <small class="text-muted">Convert accepted quotes into Tax Invoices, SLA Contracts, or Delivery Projects in 1 click</small>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select form-select-sm" id="quoteStatusFilter">
                    <option value="">All Statuses</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Sent / Pending">Sent / Pending</option>
                    <option value="In Negotiation">In Negotiation</option>
                    <option value="Issued">Issued</option>
                </select>
            </div>
        </div>

        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable mb-0" id="quotationsTable" data-table-name="Quotations">
                <thead>
                    <tr>
                        <th>Quote #</th>
                        <th>Client / Account</th>
                        <th>Issue Date</th>
                        <th>Valid Until</th>
                        <th>Taxable Amt</th>
                        <th>GST (18%)</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th>CRM Action</th>
                    </tr>
                </thead>
                <tbody id="quotationsTbody">
                    <tr>
                        <td class="fw-bold text-primary">#QT-2026-084</td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="fw-bold text-dark text-decoration-none">Power Spares Engineering</a>
                            <div class="text-muted small">contact@powerspares.com</div>
                        </td>
                        <td>20-Jan-2026</td>
                        <td>20-Feb-2026</td>
                        <td>₹5,00,000</td>
                        <td>₹90,000</td>
                        <td class="fw-bold text-dark">₹5,90,000</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">Accepted</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000" class="btn btn-sm btn-outline-primary py-1 px-2 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>Sales Order</a>
                                <a href="invoice-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000" class="btn btn-sm btn-outline-success py-1 px-2 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-084&amp;client=Power+Spares+Engineering&amp;project=CRM+Enterprise+%26+Biometric+Rollout&amp;amount=590000" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <a href="quotation-create.php?clone=QT-2026-084&amp;client=Power+Spares+Engineering&amp;item=Cloud+CRM+Enterprise+License+%26+Biometric+Pack&amp;price=500000" class="btn btn-sm btn-light border text-info px-2 py-1" title="Duplicate / Re-Quote"><i class="bi bi-copy"></i></a>
                                <button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#QT-2026-089</td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="fw-bold text-dark text-decoration-none">Zen Publications</a>
                            <div class="text-muted small">editor@zenpub.in</div>
                        </td>
                        <td>24-Jan-2026</td>
                        <td>24-Feb-2026</td>
                        <td>₹7,54,237</td>
                        <td>₹1,35,763</td>
                        <td class="fw-bold text-dark">₹8,90,000</td>
                        <td><span class="badge bg-warning-subtle text-warning border border-warning-subtle">Sent / Pending</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-089&amp;client=Zen+Publications&amp;amount=890000" class="btn btn-sm btn-outline-primary py-1 px-2 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>Sales Order</a>
                                <a href="invoice-create.php?quote=QT-2026-089&amp;client=Zen+Publications&amp;amount=890000" class="btn btn-sm btn-outline-success py-1 px-2 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-089&amp;client=Zen+Publications&amp;project=Digital+Journal+Publishing+Engine&amp;amount=890000" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-089&amp;client=Zen+Publications" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <a href="quotation-create.php?clone=QT-2026-089&amp;client=Zen+Publications&amp;item=Digital+Journal+Publishing+Engine&amp;price=754237" class="btn btn-sm btn-light border text-info px-2 py-1" title="Duplicate / Re-Quote"><i class="bi bi-copy"></i></a>
                                <button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-primary">#QT-2026-092</td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="fw-bold text-dark text-decoration-none">Hindustan Hydraulics</a>
                            <div class="text-muted small">info@hindustanhydraulics.com</div>
                        </td>
                        <td>28-Jan-2026</td>
                        <td>28-Feb-2026</td>
                        <td>₹10,16,949</td>
                        <td>₹1,83,051</td>
                        <td class="fw-bold text-dark">₹12,00,000</td>
                        <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle">In Negotiation</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-092&amp;client=Hindustan+Hydraulics&amp;amount=1200000" class="btn btn-sm btn-outline-primary py-1 px-2 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>Sales Order</a>
                                <a href="invoice-create.php?quote=QT-2026-092&amp;client=Hindustan+Hydraulics&amp;amount=1200000" class="btn btn-sm btn-outline-success py-1 px-2 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-092&amp;client=Hindustan+Hydraulics+%26+Pneumatics&amp;project=Annual+AMC+%26+Enterprise+SLA&amp;amount=1200000" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-092&amp;client=Hindustan+Hydraulics" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <a href="quotation-create.php?clone=QT-2026-092&amp;client=Hindustan+Hydraulics&amp;item=Annual+AMC+%26+Enterprise+SLA&amp;price=1016949" class="btn btn-sm btn-light border text-info px-2 py-1" title="Duplicate / Re-Quote"><i class="bi bi-copy"></i></a>
                                <button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var tbody = document.getElementById('quotationsTbody');
    try {
        var list = JSON.parse(localStorage.getItem('gh_new_quotes') || '[]');
        var seenQuotes = {};
        Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
            var code = (r.cells[0] ? r.cells[0].textContent.trim().replace('#', '') : '');
            if (code) seenQuotes[code] = true;
        });

        list.forEach(function(q) {
            if (!tbody || !q.qNum) return;
            var cleanQ = String(q.qNum).replace('#', '').trim();
            if (seenQuotes[cleanQ]) return; // Prevent duplicate rows
            seenQuotes[cleanQ] = true;

            var encCust = encodeURIComponent(q.cust || 'Client');
            var encQ = encodeURIComponent(cleanQ);
            var rawAmt = Number(String(q.grand || '').replace(/[^0-9]/g, '')) || 150000;
            var rawSub = Number(String(q.sub || '').replace(/[^0-9]/g, '')) || 125000;
            var tr = document.createElement('tr');
            tr.innerHTML =
                '<td class="fw-bold text-primary">#' + cleanQ + '</td>' +
                '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="fw-bold text-dark text-decoration-none">' + q.cust + '</a><div class="text-muted small">Newly Issued Proposal</div></td>' +
                '<td>' + q.issue + '</td>' +
                '<td>' + q.valid + '</td>' +
                '<td>' + q.sub + '</td>' +
                '<td>' + q.tax + '</td>' +
                '<td class="fw-bold text-dark">' + q.grand + '</td>' +
                '<td><span class="badge bg-success-subtle text-success border border-success-subtle">Issued</span></td>' +
                '<td><div class="d-flex align-items-center gap-1 flex-nowrap">' +
                    '<a href="sales-order-create.php?quote=' + encQ + '&client=' + encCust + '&amount=' + rawAmt + '" class="btn btn-sm btn-outline-primary py-1 px-2 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>Sales Order</a>' +
                    '<a href="invoice-create.php?quote=' + encQ + '&client=' + encCust + '&amount=' + rawAmt + '" class="btn btn-sm btn-outline-success py-1 px-2 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>' +
                    '<a href="project-create.php?so=' + encQ + '&client=' + encCust + '&project=' + encodeURIComponent((q.item || 'Delivery Project')) + '&amount=' + rawAmt + '" class="btn btn-sm btn-light border text-dark px-2 py-1" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>' +
                    '<a href="contracts.php?quote=' + encQ + '&client=' + encCust + '" class="btn btn-sm btn-light border text-secondary px-2 py-1" title="Create SLA Contract"><i class="bi bi-pen"></i></a>' +
                    '<a href="quotation-create.php?clone=' + encQ + '&client=' + encCust + '&item=' + encodeURIComponent((q.item || 'Proposal Scope')) + '&price=' + rawSub + '" class="btn btn-sm btn-light border text-info px-2 py-1" title="Duplicate / Re-Quote"><i class="bi bi-copy"></i></a>' +
                    '<button type="button" class="btn btn-sm btn-light border px-2 py-1" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>' +
                '</div></td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

    var statusFilter = document.getElementById('quoteStatusFilter');
    if (statusFilter && tbody) {
        statusFilter.addEventListener('change', function() {
            var val = statusFilter.value.toLowerCase();
            Array.from(tbody.querySelectorAll('tr')).forEach(function(r) {
                var stText = r.cells[7] ? r.cells[7].textContent.trim().toLowerCase() : '';
                r.style.display = (!val || stText.indexOf(val) !== -1) ? '' : 'none';
            });
        });
    }
});
</script>

<?php include 'footer.php'; ?>
