<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/lead.css">

<main class="container-fluid px-0">
    <!-- Page Header & Action Bar -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <h1 class="font-display fw-bold mb-0 page-title">Quotations &amp; Proposals</h1>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-2.5" data-bs-toggle="offcanvas" data-bs-target="#quoteFilterOffcanvas" aria-controls="quoteFilterOffcanvas" title="Filter Quotations">
                <i class="bi bi-funnel"></i>
                <span>Filters</span>
                <span class="badge bg-primary text-white rounded-pill px-1.5 py-0.5 d-none font-11" id="filterCountBadge">0</span>
            </button>
            <a href="quotation-create.php" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold px-3">
                <i class="bi bi-plus-lg"></i><span>Create Quotation</span>
            </a>
        </div>
    </div>

    <!-- Quotations Directory Table Card -->
    <div class="card border shadow-sm rounded-3 bg-white overflow-hidden mb-4">
        <div class="card-header bg-white py-3 px-4 d-flex align-items-center justify-content-between border-bottom">
            <div class="d-flex align-items-center gap-2">
                <h6 class="fw-bold text-dark mb-0"><i class="bi bi-file-earmark-text me-2 text-primary"></i>Quotations Directory</h6>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1" id="quoteCountBadge">7 Proposals</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center gap-1.5 fw-semibold" id="exportQuotesCsvBtn">
                    <i class="bi bi-download"></i><span>Export CSV</span>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="quotationsTable">
                <thead class="table-light text-muted small text-uppercase font-11">
                    <tr>
                        <th class="ps-4">Quote #</th>
                        <th>Client / Account</th>
                        <th>Issue Date</th>
                        <th>Valid Until</th>
                        <th>Taxable Amt</th>
                        <th>GST (18%)</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th class="text-end pe-4">CRM Downstream Actions</th>
                    </tr>
                </thead>
                <tbody id="quotationsTbody">
                    <tr data-client="Power Spares Engineering" data-status="Accepted">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-084</td>
                        <td>
                            <a href="customer-view.php?id=1&amp;name=Power+Spares+Engineering" class="fw-bold text-dark text-decoration-none">Power Spares Engineering</a>
                            <div class="text-muted small font-11">contact@powerspares.com</div>
                        </td>
                        <td class="small">20-Jan-2026</td>
                        <td class="small">20-Feb-2026</td>
                        <td class="small">&#8377;5,00,000</td>
                        <td class="small text-muted">&#8377;90,000</td>
                        <td class="fw-bold text-dark">&#8377;5,90,000</td>
                        <td><span class="badge bg-success text-white border border-success rounded-pill px-2.5 py-1 font-11">Accepted</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>
                                <a href="invoice-create.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering&amp;amount=590000" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-084&amp;client=Power+Spares+Engineering&amp;project=CRM+Enterprise+%26+Biometric+Rollout&amp;amount=590000" class="btn btn-sm btn-light border py-1 px-2 font-11 text-dark" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-084&amp;client=Power+Spares+Engineering" class="btn btn-sm btn-light border py-1 px-2 font-11 text-secondary" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-client="Zen Publications" data-status="Sent / Pending">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-089</td>
                        <td>
                            <a href="customer-view.php?id=2&amp;name=Zen+Publications" class="fw-bold text-dark text-decoration-none">Zen Publications</a>
                            <div class="text-muted small font-11">editor@zenpub.in</div>
                        </td>
                        <td class="small">24-Jan-2026</td>
                        <td class="small">24-Feb-2026</td>
                        <td class="small">&#8377;7,54,237</td>
                        <td class="small text-muted">&#8377;1,35,763</td>
                        <td class="fw-bold text-dark">&#8377;8,90,000</td>
                        <td><span class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-2.5 py-1 font-11">Sent / Pending</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-089&amp;client=Zen+Publications&amp;amount=890000" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>
                                <a href="invoice-create.php?quote=QT-2026-089&amp;client=Zen+Publications&amp;amount=890000" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-089&amp;client=Zen+Publications&amp;project=Digital+Journal+Publishing+Engine&amp;amount=890000" class="btn btn-sm btn-light border py-1 px-2 font-11 text-dark" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-089&amp;client=Zen+Publications" class="btn btn-sm btn-light border py-1 px-2 font-11 text-secondary" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-client="Hindustan Hydraulics" data-status="In Negotiation">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-092</td>
                        <td>
                            <a href="customer-view.php?id=3&amp;name=Hindustan+Hydraulics" class="fw-bold text-dark text-decoration-none">Hindustan Hydraulics</a>
                            <div class="text-muted small font-11">info@hindustanhydraulics.com</div>
                        </td>
                        <td class="small">28-Jan-2026</td>
                        <td class="small">28-Feb-2026</td>
                        <td class="small">&#8377;10,16,949</td>
                        <td class="small text-muted">&#8377;1,83,051</td>
                        <td class="fw-bold text-dark">&#8377;12,00,000</td>
                        <td><span class="badge bg-secondary-subtle text-dark border rounded-pill px-2.5 py-1 font-11">In Negotiation</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-092&amp;client=Hindustan+Hydraulics&amp;amount=1200000" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>
                                <a href="invoice-create.php?quote=QT-2026-092&amp;client=Hindustan+Hydraulics&amp;amount=1200000" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-092&amp;client=Hindustan+Hydraulics+%26+Pneumatics&amp;project=Annual+AMC+%26+Enterprise+SLA&amp;amount=1200000" class="btn btn-sm btn-light border py-1 px-2 font-11 text-dark" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-092&amp;client=Hindustan+Hydraulics" class="btn btn-sm btn-light border py-1 px-2 font-11 text-secondary" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-client="Lakshmi Pharma" data-status="In Negotiation">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-095</td>
                        <td>
                            <a href="customer-view.php?id=4&amp;name=Lakshmi+Pharma" class="fw-bold text-dark text-decoration-none">Lakshmi Pharma</a>
                            <div class="text-muted small font-11">procurement@lakshmipharma.com</div>
                        </td>
                        <td class="small">02-Feb-2026</td>
                        <td class="small">02-Mar-2026</td>
                        <td class="small">&#8377;5,25,424</td>
                        <td class="small text-muted">&#8377;94,576</td>
                        <td class="fw-bold text-dark">&#8377;6,20,000</td>
                        <td><span class="badge bg-secondary-subtle text-dark border rounded-pill px-2.5 py-1 font-11">In Negotiation</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-095&amp;client=Lakshmi+Pharma&amp;amount=620000" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>
                                <a href="invoice-create.php?quote=QT-2026-095&amp;client=Lakshmi+Pharma&amp;amount=620000" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-095&amp;client=Lakshmi+Pharma&amp;project=Mobile+App+iOS+%26+Android&amp;amount=620000" class="btn btn-sm btn-light border py-1 px-2 font-11 text-dark" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-095&amp;client=Lakshmi+Pharma" class="btn btn-sm btn-light border py-1 px-2 font-11 text-secondary" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-client="Anand Associates" data-status="Sent / Pending">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-098</td>
                        <td>
                            <a href="customer-view.php?id=5&amp;name=Anand+Associates" class="fw-bold text-dark text-decoration-none">Anand Associates</a>
                            <div class="text-muted small font-11">anand@anandassociates.org</div>
                        </td>
                        <td class="small">08-Feb-2026</td>
                        <td class="small">08-Mar-2026</td>
                        <td class="small">&#8377;2,96,610</td>
                        <td class="small text-muted">&#8377;53,390</td>
                        <td class="fw-bold text-dark">&#8377;3,50,000</td>
                        <td><span class="badge bg-warning-subtle text-dark border border-warning-subtle rounded-pill px-2.5 py-1 font-11">Sent / Pending</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-098&amp;client=Anand+Associates&amp;amount=350000" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>
                                <a href="invoice-create.php?quote=QT-2026-098&amp;client=Anand+Associates&amp;amount=350000" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="project-create.php?so=QT-2026-098&amp;client=Anand+Associates&amp;project=Website+ERP+Portal+Revamp&amp;amount=350000" class="btn btn-sm btn-light border py-1 px-2 font-11 text-dark" title="Launch Delivery Project"><i class="bi bi-briefcase"></i></a>
                                <a href="contracts.php?quote=QT-2026-098&amp;client=Anand+Associates" class="btn btn-sm btn-light border py-1 px-2 font-11 text-secondary" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-client="Kumar &amp; Sons" data-status="Draft">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-101</td>
                        <td>
                            <a href="customer-view.php?id=6&amp;name=Kumar+Sons" class="fw-bold text-dark text-decoration-none">Kumar &amp; Sons</a>
                            <div class="text-muted small font-11">orders@kumarandsons.in</div>
                        </td>
                        <td class="small">12-Feb-2026</td>
                        <td class="small">12-Mar-2026</td>
                        <td class="small">&#8377;5,50,847</td>
                        <td class="small text-muted">&#8377;99,153</td>
                        <td class="fw-bold text-dark">&#8377;6,50,000</td>
                        <td><span class="badge bg-secondary-subtle text-secondary border rounded-pill px-2.5 py-1 font-11">Draft</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="sales-order-create.php?quote=QT-2026-101&amp;client=Kumar+and+Sons&amp;amount=650000" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>
                                <a href="invoice-create.php?quote=QT-2026-101&amp;client=Kumar+and+Sons&amp;amount=650000" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>
                                <a href="contracts.php?quote=QT-2026-101&amp;client=Kumar+and+Sons" class="btn btn-sm btn-light border py-1 px-2 font-11 text-secondary" title="Create SLA Contract"><i class="bi bi-pen"></i></a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr data-client="Kalyan Steels" data-status="Rejected">
                        <td class="ps-4 fw-bold text-primary font-12">#QT-2026-104</td>
                        <td>
                            <a href="customer-view.php?id=7&amp;name=Kalyan+Steels" class="fw-bold text-dark text-decoration-none">Kalyan Steels</a>
                            <div class="text-muted small font-11">factory@kalyansteels.com</div>
                        </td>
                        <td class="small">15-Feb-2026</td>
                        <td class="small">28-Feb-2026</td>
                        <td class="small">&#8377;3,55,932</td>
                        <td class="small text-muted">&#8377;64,068</td>
                        <td class="fw-bold text-muted text-decoration-line-through">&#8377;4,20,000</td>
                        <td><span class="badge bg-danger text-white border border-danger rounded-pill px-2.5 py-1 font-11">Rejected</span></td>
                        <td class="text-end pe-4">
                            <div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">
                                <a href="quotation-create.php?clone=QT-2026-104&amp;client=Kalyan+Steels&amp;item=Legacy+ERP+Integration&amp;price=355932" class="btn btn-sm btn-light border py-1 px-2 font-11 text-info fw-semibold" title="Re-Quote / Clone"><i class="bi bi-arrow-repeat me-1"></i>Re-Quote</a>
                                <button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-white border-top py-3 px-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <span class="text-muted small" id="quoteSummaryText">Showing all quotations</span>
            <nav aria-label="Table pagination">
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item disabled"><a class="page-link" href="javascript:void(0)">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>

<!-- ==================== OFFCANVAS SLIDER: QUOTATIONS FILTER DRAWER ==================== -->
<div class="offcanvas offcanvas-end border-start shadow-lg" tabindex="-1" id="quoteFilterOffcanvas" aria-labelledby="quoteFilterTitle" style="width: 360px;">
    <div class="offcanvas-header border-bottom py-3 px-4 bg-light">
        <div class="d-flex align-items-center gap-2">
            <span class="p-1.5 rounded-2 bg-primary-subtle text-primary d-inline-flex"><i class="bi bi-funnel fs-6"></i></span>
            <h5 class="offcanvas-title fw-bold text-dark fs-6 mb-0" id="quoteFilterTitle">Filter Quotations</h5>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4 d-flex flex-column gap-3">
        <!-- Search Keyword -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Search Quotation / Account</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" class="form-control" id="filterQuoteSearch" placeholder="Quote #, client, email...">
            </div>
        </div>

        <!-- Status Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Quotation Status</label>
            <select class="form-select form-select-sm" id="filterQuoteStatus">
                <option value="">All Statuses</option>
                <option value="Accepted">Accepted by Client</option>
                <option value="Sent">Sent / Pending</option>
                <option value="Negotiation">In Negotiation</option>
                <option value="Draft">Draft</option>
                <option value="Rejected">Rejected</option>
                <option value="Expired">Expired</option>
            </select>
        </div>

        <!-- Period Filter -->
        <div>
            <label class="form-label fw-semibold small text-dark mb-1">Issue Period</label>
            <select class="form-select form-select-sm" id="filterQuotePeriod">
                <option value="all">All Timelines</option>
                <option value="this-month">This Month (Mar 2026)</option>
                <option value="this-quarter" selected>This Quarter (Q1 2026)</option>
                <option value="this-year">Full Year 2026</option>
            </select>
        </div>
    </div>
    <div class="offcanvas-footer border-top p-3 px-4 bg-light d-flex align-items-center justify-content-between">
        <button type="button" class="btn btn-outline-secondary btn-sm" id="resetQuoteFiltersBtn">
            <i class="bi bi-arrow-clockwise me-1"></i>Reset Filters
        </button>
        <button type="button" class="btn btn-primary btn-sm px-4 fw-semibold" data-bs-dismiss="offcanvas">
            Apply
        </button>
    </div>
</div>

<!-- ==================== JAVASCRIPT: QUOTATION ENGINE ==================== -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var tbody = document.getElementById('quotationsTbody');

    // Restore new quotes generated from CRM localStorage if any
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
            if (seenQuotes[cleanQ]) return;
            seenQuotes[cleanQ] = true;

            var encCust = encodeURIComponent(q.cust || 'Client');
            var encQ = encodeURIComponent(cleanQ);
            var rawAmt = Number(String(q.grand || '').replace(/[^0-9]/g, '')) || 150000;

            var tr = document.createElement('tr');
            tr.setAttribute('data-client', q.cust || 'Client');
            tr.setAttribute('data-status', 'Issued');
            tr.innerHTML =
                '<td class="ps-4 fw-bold text-primary font-12">#' + cleanQ + '</td>' +
                '<td><a href="customer-view.php?id=1&name=' + encCust + '" class="fw-bold text-dark text-decoration-none">' + q.cust + '</a><div class="text-muted small font-11">Newly Issued Proposal</div></td>' +
                '<td class="small">' + (q.issue || 'Today') + '</td>' +
                '<td class="small">' + (q.valid || '30 Days') + '</td>' +
                '<td class="small">' + (q.sub || '₹0') + '</td>' +
                '<td class="small text-muted">' + (q.tax || '₹0') + '</td>' +
                '<td class="fw-bold text-dark">' + (q.grand || '₹0') + '</td>' +
                '<td><span class="badge bg-success text-white border border-success rounded-pill px-2.5 py-1 font-11">Issued</span></td>' +
                '<td class="text-end pe-4"><div class="d-flex align-items-center justify-content-end gap-1 flex-nowrap">' +
                    '<a href="sales-order-create.php?quote=' + encQ + '&client=' + encCust + '&amount=' + rawAmt + '" class="btn btn-sm btn-outline-primary py-1 px-2 font-11 fw-semibold" title="Convert to Sales Order"><i class="bi bi-bag-check me-1"></i>SO</a>' +
                    '<a href="invoice-create.php?quote=' + encQ + '&client=' + encCust + '&amount=' + rawAmt + '" class="btn btn-sm btn-outline-success py-1 px-2 font-11 fw-semibold" title="Convert to Tax Invoice"><i class="bi bi-receipt me-1"></i>Invoice</a>' +
                    '<button type="button" class="btn btn-sm btn-light border py-1 px-2 font-11 text-muted" title="Print Quotation" onclick="window.print();"><i class="bi bi-printer"></i></button>' +
                '</div></td>';
            tbody.insertBefore(tr, tbody.firstChild);
        });
    } catch (e) {}

    // Universal Filter Engine (Offcanvas Slider)
    function applyQuoteFilters() {
        var q = (document.getElementById('filterQuoteSearch') ? document.getElementById('filterQuoteSearch').value : '').toLowerCase().trim();
        var st = (document.getElementById('filterQuoteStatus') ? document.getElementById('filterQuoteStatus').value : '').toLowerCase();

        var activeCount = 0;
        if (q) activeCount++;
        if (st) activeCount++;

        var badge = document.getElementById('filterCountBadge');
        if (badge) {
            badge.textContent = activeCount;
            badge.classList.toggle('d-none', activeCount === 0);
        }

        var visibleCount = 0;
        Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
            var text = r.textContent.toLowerCase();
            var statusText = (r.getAttribute('data-status') || '').toLowerCase();

            var matchQ = !q || text.indexOf(q) !== -1;
            var matchSt = !st || statusText.indexOf(st) !== -1;

            var show = matchQ && matchSt;
            r.style.display = show ? '' : 'none';
            if (show) visibleCount++;
        });

        var countBadge = document.getElementById('quoteCountBadge');
        if (countBadge) countBadge.textContent = visibleCount + ' Proposals';

        var summaryText = document.getElementById('quoteSummaryText');
        if (summaryText) summaryText.textContent = 'Showing ' + visibleCount + ' of ' + (tbody ? tbody.children.length : 0) + ' quotations';
    }

    var searchInput = document.getElementById('filterQuoteSearch');
    if (searchInput) searchInput.addEventListener('input', applyQuoteFilters);

    var statusSelect = document.getElementById('filterQuoteStatus');
    if (statusSelect) statusSelect.addEventListener('change', applyQuoteFilters);

    var resetBtn = document.getElementById('resetQuoteFiltersBtn');
    if (resetBtn) {
        resetBtn.addEventListener('click', function() {
            if (searchInput) searchInput.value = '';
            if (statusSelect) statusSelect.value = '';
            applyQuoteFilters();
        });
    }

    // Real-time Export CSV
    var exportBtn = document.getElementById('exportQuotesCsvBtn');
    if (exportBtn) {
        exportBtn.addEventListener('click', function() {
            var rows = [
                ['Quote #', 'Client / Account', 'Issue Date', 'Valid Until', 'Taxable Amt', 'GST (18%)', 'Grand Total', 'Status']
            ];
            Array.from(tbody ? tbody.querySelectorAll('tr') : []).forEach(function(r) {
                if (r.style.display === 'none') return;
                var cells = r.querySelectorAll('td');
                if (cells.length >= 8) {
                    rows.push([
                        cells[0].textContent.trim(),
                        cells[1].querySelector('a') ? cells[1].querySelector('a').textContent.trim() : cells[1].textContent.trim(),
                        cells[2].textContent.trim(),
                        cells[3].textContent.trim(),
                        cells[4].textContent.trim(),
                        cells[5].textContent.trim(),
                        cells[6].textContent.trim(),
                        cells[7].textContent.trim()
                    ]);
                }
            });
            var csvContent = 'data:text/csv;charset=utf-8,' + rows.map(function(e) {
                return e.map(function(v) { return '"' + String(v).replace(/"/g, '""') + '"'; }).join(',');
            }).join('\n');
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', 'quotations_export_' + new Date().toISOString().slice(0, 10) + '.csv');
            document.body.appendChild(link);
            link.click();
            link.remove();
        });
    }

    // Initial update
    applyQuoteFilters();
});
</script>

<?php include 'footer.php'; ?>
