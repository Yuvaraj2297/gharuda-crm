<?php include 'header.php'; ?>

<main class="container-fluid px-0">
    <!-- Page Header -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div>
            <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                <h1 class="font-display fw-bold mb-0 page-title">Deals Pipeline</h1>
                <span class="badge rounded-pill bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 fw-semibold">₹84.5 Lakh Total Pipeline</span>
            </div>
            <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap breadcrumb-text">
                <i class="bi bi-currency-rupee fs-6"></i>
                <a href="lead.php" class="text-decoration-none text-muted">CRM</a>
                <i class="bi bi-chevron-right small"></i>
                <span class="fw-bold text-dark">Deals &amp; Pipeline</span>
            </nav>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <a href="lead.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-person-lines-fill"></i><span>All Leads</span>
            </a>
            <a href="quotations.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-file-earmark-text"></i><span>Quotations</span>
            </a>
            <a href="contracts.php" class="btn btn-outline-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold">
                <i class="bi bi-pen"></i><span>SLA Contracts</span>
            </a>
            <button type="button" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-1 fw-semibold" data-bs-toggle="modal" data-bs-target="#newDealModal">
                <i class="bi bi-plus-lg"></i><span>New Deal</span>
            </button>
        </div>
    </div>

    <!-- Pipeline KPI Strip -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Total Pipeline Value</span>
                    <span class="p-2 rounded-3 bg-primary-subtle text-primary"><i class="bi bi-cash-stack"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹84,50,000</h3>
                <span class="text-muted small">24 Active Opportunities</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Weighted Forecast</span>
                    <span class="p-2 rounded-3 bg-info-subtle text-info"><i class="bi bi-graph-up-arrow"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹52,80,000</h3>
                <span class="text-info small fw-semibold"><i class="bi bi-check2"></i> Based on stage probability</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Closed Won (This Month)</span>
                    <span class="p-2 rounded-3 bg-success-subtle text-success"><i class="bi bi-trophy"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹18,25,000</h3>
                <span class="text-success small fw-semibold"><i class="bi bi-arrow-up"></i> 5 Deals Finalized</span>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card-custom p-3 h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-semibold">Average Deal Size</span>
                    <span class="p-2 rounded-3 bg-warning-subtle text-warning"><i class="bi bi-pie-chart"></i></span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">₹3,52,000</h3>
                <span class="text-muted small">Avg cycle: 26 days</span>
            </div>
        </div>
    </div>

    <!-- Filter Strip -->
    <div class="card-custom p-3 mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-md-3">
                <select class="form-select form-select-sm select2" id="filterDealRep">
                    <option value="">All Sales Reps</option>
                    <option value="Harish">Harish D.</option>
                    <option value="Divya">Divya A.</option>
                    <option value="Karthik">Karthik R.</option>
                    <option value="Priya">Priya S.</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm select2" id="filterDealBrand">
                    <option value="">All Brands</option>
                    <option value="PhDAssistance">PhDAssistance</option>
                    <option value="GEOCare">GEO Care</option>
                    <option value="Gharuda">Gharuda Software</option>
                    <option value="Zen">Zen Publications</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select form-select-sm" id="filterDealPeriod">
                    <option value="this-quarter">This Quarter</option>
                    <option value="this-month">This Month</option>
                    <option value="this-year">Full Year 2026</option>
                </select>
            </div>
            <div class="col-md-3 text-md-end">
                <button type="button" class="btn btn-outline-secondary btn-sm fw-semibold" onclick="location.reload();">
                    <i class="bi bi-arrow-clockwise me-1"></i>Reset Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Deals Kanban Pipeline Columns (Bootstrap 5 Responsive Grid) -->
    <div class="row g-3 pb-4" id="dealsKanbanRow">
        <!-- Column 1: Discovery / Qualified (20%) -->
        <div class="col-12 col-md-6 col-xl">
            <div class="card border shadow-sm rounded-3 bg-light h-100">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">1. Discovery</h6>
                        <span class="text-muted small">₹8,50,000 &middot; 2 deals</span>
                    </div>
                    <span class="badge bg-secondary-subtle text-secondary border">20%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2 deal-col-body">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-primary-subtle text-primary small">Enterprise</span>
                            <span class="fw-bold text-primary">₹5,00,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">CRM Cloud Migration Pack</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Power Spares Engineering</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 20-Mar</span>
                            <span class="badge rounded-circle bg-primary text-white p-1 px-2">H</span>
                        </div>
                    </div>

                    <div class="card border shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-info-subtle text-info small">SME</span>
                            <span class="fw-bold text-primary">₹3,50,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Website ERP Portal Revamp</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Anand Associates</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 28-Mar</span>
                            <span class="badge rounded-circle bg-info text-white p-1 px-2">D</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2: Demo & Evaluation (40%) -->
        <div class="col-12 col-md-6 col-xl">
            <div class="card border shadow-sm rounded-3 bg-light h-100">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">2. Demo &amp; Eval</h6>
                        <span class="text-muted small">₹18,50,000 &middot; 2 deals</span>
                    </div>
                    <span class="badge bg-info-subtle text-info border border-info-subtle">40%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2 deal-col-body">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-danger-subtle text-danger small">Urgent</span>
                            <span class="fw-bold text-primary">₹12,00,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Annual AMC &amp; Tech SLA</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Hindustan Hydraulics</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 15-Mar</span>
                            <span class="badge rounded-circle bg-success text-white p-1 px-2">K</span>
                        </div>
                    </div>

                    <div class="card border shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-primary-subtle text-primary small">Software</span>
                            <span class="fw-bold text-primary">₹6,50,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Inventory Barcode Add-on</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Kumar &amp; Sons</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 22-Mar</span>
                            <span class="badge rounded-circle bg-warning text-dark p-1 px-2">P</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 3: Proposal Sent (60%) -->
        <div class="col-12 col-md-6 col-xl">
            <div class="card border shadow-sm rounded-3 bg-light h-100">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">3. Proposal Sent</h6>
                        <span class="text-muted small">₹8,90,000 &middot; 1 deal</span>
                    </div>
                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">60%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2 deal-col-body">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-success-subtle text-success small">Quote #089</span>
                            <span class="fw-bold text-primary">₹8,90,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Digital Journal Publishing Engine</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Zen Publications</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 10-Mar</span>
                            <span class="badge rounded-circle bg-primary text-white p-1 px-2">H</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 4: Negotiation (80%) -->
        <div class="col-12 col-md-6 col-xl">
            <div class="card border shadow-sm rounded-3 bg-light h-100">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">4. Negotiation</h6>
                        <span class="text-muted small">₹6,20,000 &middot; 1 deal</span>
                    </div>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">80%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2 deal-col-body">
                    <div class="card border shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-warning-subtle text-warning small">Terms Review</span>
                            <span class="fw-bold text-primary">₹6,20,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Mobile App iOS &amp; Android</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Lakshmi Pharma</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Close: 05-Mar</span>
                            <span class="badge rounded-circle bg-info text-white p-1 px-2">D</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 5: Closed Won (100%) -->
        <div class="col-12 col-md-6 col-xl">
            <div class="card border shadow-sm rounded-3 bg-light h-100">
                <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold text-dark mb-0">5. Closed Won</h6>
                        <span class="text-muted small">₹7,50,000 &middot; 1 deal</span>
                    </div>
                    <span class="badge bg-success-subtle text-success border border-success-subtle">100%</span>
                </div>
                <div class="card-body p-2 d-flex flex-column gap-2 deal-col-body">
                    <div class="card border border-success shadow-sm p-3 rounded-3 bg-white" role="button">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="badge bg-success text-white small"><i class="bi bi-check2"></i> Won</span>
                            <span class="fw-bold text-success">₹7,50,000</span>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">API Microservices Gateway</h6>
                        <span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>Gharuda Software</span>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">
                            <span><i class="bi bi-calendar3 me-1"></i>Won: Today</span>
                            <span class="badge rounded-circle bg-success text-white p-1 px-2">H</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal: New Deal -->
<div class="modal fade" id="newDealModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom bg-light bg-opacity-50">
                <h5 class="modal-title fw-bold">Create New Opportunity / Deal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="newDealForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Deal Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="e.g. ERP Cloud Migration" required>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Deal Value (₹) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="500000" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Expected Close Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime('+14 days')); ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Client / Lead Account</label>
                        <select class="form-select select2" id="dealClientSelect">
                            <option value="Power Spares Engineering">Power Spares Engineering</option>
                            <option value="Zen Publications">Zen Publications</option>
                            <option value="Hindustan Hydraulics">Hindustan Hydraulics</option>
                            <option value="GG COMPANY">GG COMPANY</option>
                            <option value="Anand Associates">Anand Associates</option>
                        </select>
                    </div>
                    <div class="row g-2 mb-0">
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Pipeline Stage</label>
                            <select class="form-select">
                                <option value="1">1. Discovery</option>
                                <option value="2">2. Demo &amp; Eval</option>
                                <option value="3">3. Proposal Sent</option>
                                <option value="4">4. Negotiation</option>
                                <option value="5">5. Closed Won</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold small">Sales Rep</label>
                            <select class="form-select">
                                <option value="Harish">Harish D.</option>
                                <option value="Divya">Divya A.</option>
                                <option value="Karthik">Karthik R.</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveNewDealBtn" data-bs-dismiss="modal"><i class="bi bi-check2 me-1"></i>Save Opportunity</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var colBodies = document.querySelectorAll('.deal-col-body');
    var draggedCard = null;

    function parseRupees(str) {
        return Number(String(str || '').replace(/[^0-9]/g, '')) || 0;
    }

    function formatRupees(num) {
        return '₹' + Number(num || 0).toLocaleString('en-IN');
    }

    function updateColumnTotals() {
        colBodies.forEach(function (colBody) {
            var cards = Array.prototype.slice.call(colBody.querySelectorAll('.deal-k-card')).filter(function (c) {
                return !c.classList.contains('d-none');
            });
            var sum = 0;
            cards.forEach(function (c) {
                sum += parseRupees(c.getAttribute('data-val'));
            });
            var headerSub = colBody.parentElement.querySelector('.card-header span.text-muted.small');
            if (headerSub) {
                headerSub.innerHTML = formatRupees(sum) + ' &middot; ' + cards.length + (cards.length === 1 ? ' deal' : ' deals');
            }
        });
    }

    function enhanceCard(card) {
        if (card.classList.contains('deal-k-card')) return;
        card.classList.add('deal-k-card');
        card.setAttribute('draggable', 'true');

        var priceEl = card.querySelector('.fw-bold.text-primary, .fw-bold.text-success');
        var val = priceEl ? parseRupees(priceEl.textContent) : 0;
        card.setAttribute('data-val', val);

        var clientEl = card.querySelector('.bi-building') ? card.querySelector('.bi-building').parentElement : null;
        var clientName = clientEl ? clientEl.textContent.trim() : 'Client';
        var encClient = encodeURIComponent(clientName);

        if (!card.querySelector('.deal-quick-actions')) {
            var actBar = document.createElement('div');
            actBar.className = 'deal-quick-actions d-flex align-items-center justify-content-between gap-1 flex-wrap mt-2 pt-2 border-top';
            actBar.innerHTML =
                '<a href="quotation-create.php?client=' + encClient + '" class="btn btn-sm btn-light border py-0 px-2 small" title="Create Quotation"><i class="bi bi-file-earmark-text text-primary me-1"></i>Quote</a>' +
                '<a href="customer-new.php?company=' + encClient + '" class="btn btn-sm btn-light border py-0 px-2 small" title="Onboard Customer"><i class="bi bi-building-add text-success me-1"></i>Onboard</a>' +
                '<a href="invoice-create.php?client=' + encClient + '" class="btn btn-sm btn-light border py-0 px-2 small" title="Create Tax Invoice"><i class="bi bi-receipt text-dark me-1"></i>Invoice</a>';
            card.appendChild(actBar);
        }

        card.addEventListener('dragstart', function (e) {
            draggedCard = card;
            card.classList.add('opacity-50');
            e.dataTransfer.effectAllowed = 'move';
        });
        card.addEventListener('dragend', function () {
            card.classList.remove('opacity-50');
            draggedCard = null;
            colBodies.forEach(function (cb) { cb.classList.remove('bg-success-subtle'); });
            updateColumnTotals();
        });
    }

    colBodies.forEach(function (colBody) {
        Array.prototype.slice.call(colBody.children).forEach(enhanceCard);
        colBody.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            colBody.classList.add('bg-success-subtle');
        });
        colBody.addEventListener('dragleave', function () {
            colBody.classList.remove('bg-success-subtle');
        });
        colBody.addEventListener('drop', function (e) {
            e.preventDefault();
            colBody.classList.remove('bg-success-subtle');
            if (draggedCard) {
                colBody.appendChild(draggedCard);
                updateColumnTotals();
            }
        });
    });

    var saveBtn = document.getElementById('saveNewDealBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', function () {
            var form = document.getElementById('newDealForm');
            if (!form) return;
            var inputs = form.querySelectorAll('input, select');
            var title = (inputs[0] && inputs[0].value.trim()) || 'New Enterprise Opportunity';
            var amount = (inputs[1] && Number(inputs[1].value)) || 450000;
            var closeDate = (inputs[2] && inputs[2].value) || '30-Mar';
            var client = (inputs[3] && inputs[3].value) || 'Power Spares Engineering';
            var stageIdx = (inputs[4] && Number(inputs[4].value) - 1) || 0;
            var repSel = inputs[5];
            var repInitial = (repSel && repSel.value) ? repSel.value.charAt(0).toUpperCase() : 'H';

            var newCard = document.createElement('div');
            newCard.className = 'card border shadow-sm p-3 rounded-3 bg-white';
            newCard.setAttribute('role', 'button');
            newCard.innerHTML =
                '<div class="d-flex align-items-center justify-content-between mb-1">' +
                    '<span class="badge bg-primary-subtle text-primary small">New Deal</span>' +
                    '<span class="fw-bold text-primary">' + formatRupees(amount) + '</span>' +
                '</div>' +
                '<h6 class="fw-bold text-dark mb-1">' + title.replace(/</g, '&lt;') + '</h6>' +
                '<span class="text-muted small d-block mb-2"><i class="bi bi-building me-1"></i>' + client.replace(/</g, '&lt;') + '</span>' +
                '<div class="d-flex align-items-center justify-content-between pt-2 border-top small text-muted">' +
                    '<span><i class="bi bi-calendar3 me-1"></i>Close: ' + closeDate + '</span>' +
                    '<span class="badge rounded-circle bg-primary text-white p-1 px-2">' + repInitial + '</span>' +
                '</div>';

            var targetCol = colBodies[Math.min(Math.max(0, stageIdx), colBodies.length - 1)];
            if (targetCol) {
                targetCol.prepend(newCard);
                enhanceCard(newCard);
                updateColumnTotals();
            }
            form.reset();
        });
    }

    function applyDealFilters() {
        var rep = (document.getElementById('filterDealRep') ? document.getElementById('filterDealRep').value : '').toLowerCase();
        var repInitial = rep ? rep.charAt(0).toUpperCase() : '';
        document.querySelectorAll('.deal-k-card').forEach(function (card) {
            var badge = card.querySelector('.badge.rounded-circle');
            var cardRep = badge ? badge.textContent.trim() : '';
            var matchRep = !repInitial || cardRep === repInitial;
            card.classList.toggle('d-none', !matchRep);
        });
        updateColumnTotals();
    }
    if (window.jQuery) {
        jQuery('#filterDealRep, #filterDealBrand').on('change', applyDealFilters);
    }
});
</script>

<?php include 'footer.php'; ?>
