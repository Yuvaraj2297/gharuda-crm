<?php
include 'header.php';

$employees = [
    [
        'id'          => 'EMP0001',
        'name'        => 'ghrA TESTER',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '0 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '1 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0002',
        'name'        => 'GHARUDA SOFTWARE',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '82 / 2',
        'sourcer_pct' => 2,
        'bv'          => '₹ -105,708.24',
        'bv_pct'      => 100,
        'bv_neg'      => true,
        'cv'          => '₹ 999.00',
        'cv_pct'      => 100,
        'visits'      => '51 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0003',
        'name'        => 'ASHISH',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '0 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '0 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0004',
        'name'        => 'Thilak Ma',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '0 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '0 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0005',
        'name'        => 'Jude S',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '0 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '0 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0006',
        'name'        => 'PREM KUMAR.R',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '1 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '0 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0007',
        'name'        => 'Akash Kumar',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '0 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '0 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
    [
        'id'          => 'EMP0008',
        'name'        => 'ARUN KUMAR',
        'leads'       => '0 / 0',
        'leads_pct'   => 0,
        'sourcer'     => '0 / 0',
        'sourcer_pct' => 0,
        'bv'          => '₹ 0.00',
        'bv_pct'      => 0,
        'bv_neg'      => false,
        'cv'          => '₹ 0.00',
        'cv_pct'      => 0,
        'visits'      => '0 / 0',
        'visits_pct'  => 0,
        'km'          => '0 km',
        'km_pct'      => 0,
    ],
];

$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
$fromDate    = isset($_GET['from'])   ? trim($_GET['from'])   : '01-10-2026';
$toDate      = isset($_GET['to'])     ? trim($_GET['to'])     : '31-10-2026';
?>

<main class="container-fluid px-0">
    <!-- Single-Row Enterprise Page Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip bg-primary-subtle text-primary d-flex align-items-center justify-content-center rounded-3" style="width:42px;height:42px;">
                <i class="bi bi-currency-rupee fs-5"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Employee Revenue Report</h1>
                <p class="text-muted font-12 mb-0">Employee-wise revenue (BV/CV), converted leads, sourcing volume &amp; field visit performance</p>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <span class="badge bg-white text-dark border px-3 py-2 rounded-pill shadow-xs font-12 fw-semibold" id="revDateBadge">
                <i class="bi bi-calendar3 text-primary me-1"></i><?= htmlspecialchars($fromDate) ?> to <?= htmlspecialchars($toDate) ?>
            </span>

            <!-- Offcanvas Filter Button -->
            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" data-bs-toggle="offcanvas" data-bs-target="#revFilterOffcanvas">
                <i class="bi bi-funnel text-primary"></i>
                <span>Filters</span>
                <span class="badge rounded-pill bg-primary text-white font-10 d-none" id="revFilterCountBadge">0</span>
            </button>

            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" onclick="window.print()">
                <i class="bi bi-printer text-secondary"></i>
                <span>Print</span>
            </button>

            <button type="button" class="btn btn-primary fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-sm" onclick="exportRevenueCSV()">
                <i class="bi bi-file-earmark-excel"></i>
                <span>Export Excel</span>
            </button>
        </div>
    </div>

    <!-- Summary KPI cards -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-row align-items-center gap-3 bg-white">
                <span class="badge bg-info-subtle text-info p-3 rounded-3 fs-5"><i class="bi bi-people"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Employees</small>
                    <div class="fs-4 fw-bold text-dark">8</div>
                    <small class="text-muted">In this report</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-row align-items-center gap-3 bg-white">
                <span class="badge bg-success-subtle text-success p-3 rounded-3 fs-5"><i class="bi bi-person-check"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Success Leads</small>
                    <div class="fs-4 fw-bold text-dark">23</div>
                    <small class="text-muted">By assign</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-row align-items-center gap-3 bg-white">
                <span class="badge bg-warning-subtle text-warning p-3 rounded-3 fs-5"><i class="bi bi-search"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Sourcer</small>
                    <div class="fs-4 fw-bold text-dark">83</div>
                    <small class="text-muted">Overall</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-row align-items-center gap-3 bg-white">
                <span class="badge bg-primary-subtle text-primary p-3 rounded-3 fs-5"><i class="bi bi-geo-alt"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Total Visits</small>
                    <div class="fs-4 fw-bold text-dark">52</div>
                    <small class="text-muted">Overall</small>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl">
            <div class="card border-0 shadow-sm rounded-4 p-3 h-100 d-flex flex-row align-items-center gap-3 bg-white">
                <span class="badge bg-danger-subtle text-danger p-3 rounded-3 fs-5"><i class="bi bi-speedometer2"></i></span>
                <div>
                    <small class="text-muted fw-semibold d-block">Total Kilometers</small>
                    <div class="fs-4 fw-bold text-dark">0</div>
                    <small class="text-muted">Travelled</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Employee cards Grid -->
    <div class="row g-3" id="revCards">
        <?php foreach ($employees as $emp): ?>
            <div class="col-xl-3 col-lg-4 col-md-6 rev-col" data-empid="<?= htmlspecialchars($emp['id']) ?>" data-name="<?= htmlspecialchars(strtolower($emp['name'])) ?>">
                <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                    <!-- Card Header -->
                    <div class="card-header bg-white border-bottom p-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center flex-shrink-0" style="width: 38px; height: 38px; font-size: 13px;">
                                <?= strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $emp['name']), 0, 2) ?: 'EM') ?>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-bold mb-0 text-dark text-truncate" title="<?= htmlspecialchars($emp['name']) ?>" style="max-width: 140px;">
                                    <?= htmlspecialchars($emp['name']) ?>
                                </h6>
                                <small class="text-muted fw-semibold"><?= htmlspecialchars($emp['id']) ?></small>
                            </div>
                        </div>
                        <span class="badge bg-light text-secondary border small">Overall / Now</span>
                    </div>

                    <!-- Card Body with Structured Metrics -->
                    <div class="card-body p-3 bg-light-subtle d-flex flex-column gap-2">
                        <!-- Metric 1: Success Leads -->
                        <div class="bg-white p-2 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-info-subtle text-info p-1 rounded-2"><i class="bi bi-people"></i></span>
                                    <span class="text-secondary small fw-medium text-truncate" style="max-width: 130px;">Success Leads</span>
                                </div>
                                <span class="fw-bold small text-dark rev-metric-val"><?= htmlspecialchars($emp['leads']) ?></span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= (int)$emp['leads_pct'] ?>%;" aria-valuenow="<?= (int)$emp['leads_pct'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Metric 2: Sourcer -->
                        <div class="bg-white p-2 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-primary-subtle text-primary p-1 rounded-2"><i class="bi bi-search"></i></span>
                                    <span class="text-secondary small fw-medium text-truncate" style="max-width: 130px;">Sourcer</span>
                                </div>
                                <span class="fw-bold small text-dark rev-metric-val"><?= htmlspecialchars($emp['sourcer']) ?></span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?= (int)$emp['sourcer_pct'] ?>%;" aria-valuenow="<?= (int)$emp['sourcer_pct'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Metric 3: Total BV -->
                        <div class="bg-white p-2 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-warning-subtle text-warning p-1 rounded-2"><i class="bi bi-currency-rupee"></i></span>
                                    <span class="text-secondary small fw-medium">Total BV</span>
                                </div>
                                <span class="fw-bold small <?= $emp['bv_neg'] ? 'text-danger' : 'text-dark' ?> rev-metric-val">
                                    <?= htmlspecialchars($emp['bv']) ?>
                                </span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar <?= $emp['bv_neg'] ? 'bg-danger' : 'bg-warning' ?>" role="progressbar" style="width: <?= (int)$emp['bv_pct'] ?>%;" aria-valuenow="<?= (int)$emp['bv_pct'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Metric 4: Total CV -->
                        <div class="bg-white p-2 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success-subtle text-success p-1 rounded-2"><i class="bi bi-wallet2"></i></span>
                                    <span class="text-secondary small fw-medium">Total CV</span>
                                </div>
                                <span class="fw-bold small text-dark rev-metric-val"><?= htmlspecialchars($emp['cv']) ?></span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= (int)$emp['cv_pct'] ?>%;" aria-valuenow="<?= (int)$emp['cv_pct'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Metric 5: Total Visits -->
                        <div class="bg-white p-2 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-primary-subtle text-primary p-1 rounded-2"><i class="bi bi-geo-alt"></i></span>
                                    <span class="text-secondary small fw-medium">Total Visits</span>
                                </div>
                                <span class="fw-bold small text-dark rev-metric-val"><?= htmlspecialchars($emp['visits']) ?></span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: <?= (int)$emp['visits_pct'] ?>%;" aria-valuenow="<?= (int)$emp['visits_pct'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <!-- Metric 6: Total Kilometers -->
                        <div class="bg-white p-2 rounded-3 border">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-danger-subtle text-danger p-1 rounded-2"><i class="bi bi-speedometer2"></i></span>
                                    <span class="text-secondary small fw-medium">Total Kilometers</span>
                                </div>
                                <span class="fw-bold small text-dark rev-metric-val"><?= htmlspecialchars($emp['km']) ?></span>
                            </div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= (int)$emp['km_pct'] ?>%;" aria-valuenow="<?= (int)$emp['km_pct'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Empty Results Fallback -->
    <div id="revNoResults" class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white my-4 d-none">
        <i class="bi bi-person-x text-muted fs-1 mb-2"></i>
        <h5 class="fw-bold text-dark mb-1">No Matching Employees Found</h5>
        <p class="text-muted small mb-0">Try clearing your search query or adjusting your filters.</p>
    </div>

    <!-- Slide-Over Offcanvas Filter Drawer -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="revFilterOffcanvas" aria-labelledby="revFilterOffcanvasLabel" style="width: 380px;">
        <div class="offcanvas-header border-bottom bg-light py-3 px-4">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-chip bg-primary-subtle text-primary rounded-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                    <i class="bi bi-sliders"></i>
                </div>
                <div>
                    <h6 class="offcanvas-title fw-bold mb-0 font-14" id="revFilterOffcanvasLabel">Filter Employee Revenue</h6>
                    <span class="text-muted font-11">Filter by employee name, ID &amp; date range</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4 py-3">
            <form id="revFiltersForm" autocomplete="off" onsubmit="return false;">
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="revSearch">Name / Mobile / Employee ID</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input class="form-control border-start-0 font-13" id="revSearch" name="search" placeholder="Enter Name / Mobile / Employee ID..." value="<?= htmlspecialchars($searchQuery) ?>">
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="revFrom">From Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="revFrom" name="from" value="<?= htmlspecialchars($fromDate) ?>" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="revTo">To Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="revTo" name="to" value="<?= htmlspecialchars($toDate) ?>" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="offcanvas-footer border-top bg-light p-3 d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-semibold font-13" id="revClear">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
            <button type="button" class="btn btn-primary flex-fill fw-semibold font-13" id="revApplyBtn" data-bs-dismiss="offcanvas">
                <i class="bi bi-check2-circle me-1"></i>Apply Filters
            </button>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const DEFAULT_FROM = '01-10-2026';
    const DEFAULT_TO   = '31-10-2026';
    const searchInput = document.getElementById('revSearch');
    const fromInput   = document.getElementById('revFrom');
    const toInput     = document.getElementById('revTo');
    const clearBtn    = document.getElementById('revClear');
    const applyBtn    = document.getElementById('revApplyBtn');
    const cards       = document.querySelectorAll('.rev-col');
    const noResults   = document.getElementById('revNoResults');

    function filterCards() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const fromV = (fromInput ? fromInput.value : '').trim();
        const toV   = (toInput ? toInput.value : '').trim();
        let visibleCount = 0;

        let fCount = 0;
        if (query) fCount++;
        if (fromV && fromV !== DEFAULT_FROM) fCount++;
        if (toV && toV !== DEFAULT_TO) fCount++;

        const badge = document.getElementById('revFilterCountBadge');
        if (badge) {
            badge.textContent = fCount;
            badge.classList.toggle('d-none', fCount === 0);
        }

        const dateBadge = document.getElementById('revDateBadge');
        if (dateBadge) {
            dateBadge.innerHTML = '<i class="bi bi-calendar3 text-primary me-1"></i>' + (fromV || DEFAULT_FROM) + ' to ' + (toV || DEFAULT_TO);
        }

        cards.forEach(card => {
            const empId = (card.getAttribute('data-empid') || '').toLowerCase();
            const name  = (card.getAttribute('data-name') || '').toLowerCase();
            const text  = card.textContent.toLowerCase();

            if (!query || empId.includes(query) || name.includes(query) || text.includes(query)) {
                card.classList.remove('d-none');
                visibleCount++;
            } else {
                card.classList.add('d-none');
            }
        });

        if (noResults) {
            noResults.classList.toggle('d-none', visibleCount > 0);
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterCards);
    }
    if (applyBtn) {
        applyBtn.addEventListener('click', filterCards);
    }
    if (clearBtn) {
        clearBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (searchInput) searchInput.value = '';
            if (fromInput) fromInput.value = DEFAULT_FROM;
            if (toInput) toInput.value = DEFAULT_TO;
            filterCards();
        });
    }
});

function exportRevenueCSV() {
    let csv = "Employee ID,Employee Name,Success Leads,Sourcer,Total BV,Total CV,Total Visits,Total Kilometers\n";
    document.querySelectorAll('.rev-col').forEach(card => {
        const id   = card.getAttribute('data-empid');
        const name = card.querySelector('h6').textContent.trim();
        const metrics = card.querySelectorAll('.rev-metric-val');
        const values  = Array.from(metrics).map(m => `"${m.textContent.trim()}"`);
        csv += `"${id}","${name}",` + values.join(',') + "\n";
    });

    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = `employee_revenue_report_${new Date().toISOString().slice(0, 10)}.csv`;
    link.click();
}
</script>

<?php include 'footer.php'; ?>
