<?php include 'header.php'; ?>


<style>
    .lead-report-page .lead-date-range {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink-700);
        white-space: nowrap;
    }

    .lead-report-page .lead-date-range i {
        color: var(--primary);
    }

    .lead-report-page .table-modern thead th,
    .lead-report-page .table-modern tbody td {
        padding-left: 12px;
        padding-right: 12px;
        white-space: nowrap;
    }

    .lead-report-page .table-modern thead th:nth-child(1) {
        width: 60px;
    }

    .lead-report-page .person-name {
        font-weight: 700;
        color: var(--ink-900);
    }

    .lead-report-page .lead-count {
        font-weight: 800;
        color: var(--ink-900);
    }

    .lead-report-page .lead-count.zero {
        font-weight: 600;
        color: var(--ink-500);
    }
</style>

<main class="lead-report-page">
    <!-- Single-Row Enterprise Page Header -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip bg-primary-subtle text-primary d-flex align-items-center justify-content-center rounded-3" style="width:42px;height:42px;">
                <i class="bi bi-person-vcard fs-5"></i>
            </div>
            <div>
                <h1 class="font-display fw-bold mb-0 page-title">Employee Lead Report</h1>
                <p class="text-muted font-12 mb-0">Employee-wise lead stage distribution, conversions, quotations &amp; follow-up metrics</p>
            </div>
        </div>

        <div class="d-flex align-items-center flex-wrap gap-2">
            <span class="badge bg-white text-dark border px-3 py-2 rounded-pill shadow-xs font-12 fw-semibold" id="elrDateLabel">
                <i class="bi bi-calendar3 text-primary me-1"></i>01-10-2026 to 31-10-2026
            </span>

            <!-- Offcanvas Filter Button -->
            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" data-bs-toggle="offcanvas" data-bs-target="#elrFilterOffcanvas">
                <i class="bi bi-funnel text-primary"></i>
                <span>Filters</span>
                <span class="badge rounded-pill bg-primary text-white font-10 d-none" id="elrFilterCountBadge">0</span>
            </button>

            <button type="button" class="btn btn-light border bg-white fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-xs" onclick="window.print()">
                <i class="bi bi-printer text-secondary"></i>
                <span>Print</span>
            </button>

            <a href="employee-revenue-report.php" class="btn btn-primary fw-semibold font-13 px-3 py-2 d-inline-flex align-items-center gap-2 rounded-3 shadow-sm">
                <i class="bi bi-currency-rupee"></i>
                <span>Revenue Report</span>
            </a>
        </div>
    </div>

    <!-- Table (toolbar: Columns, Export, Search, Show entries, Pagination are auto-created by the datatable class) -->
    <div class="card-custom p-0 mb-4" id="employeeLeadTableWrap">
        <div class="table-responsive table-modern-wrap overflow-auto column-border">
            <table class="table-modern w-100 datatable" id="employeeLeadTable" data-table-name="Employee Lead Report">
                <thead>
                    <tr>
                        <th style="width: 60px;">S.no</th>
                        <th>Name</th>
                        <th>Customer</th>
                        <th>Lead</th>
                        <th>Quotation</th>
                        <th>Waiting for Response</th>
                        <th>Followup</th>
                        <th>Qualified</th>
                        <th>DIRECT</th>
                        <th>New Enquiry</th>
                        <th>New</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="lead-row" data-empid="EMP0001">
                        <td>1</td>
                        <td>
                            <div class="person-name">GHARUDA SOFTWARE</div>
                        </td>
                        <td><span class="lead-count">17</span></td>
                        <td><span class="lead-count">87</span></td>
                        <td><span class="lead-count">5</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count">4</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count">1</span></td>
                        <td><span class="lead-count">2</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0002">
                        <td>2</td>
                        <td>
                            <div class="person-name">ASHISH</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0003">
                        <td>3</td>
                        <td>
                            <div class="person-name">Thilak Ma</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0004">
                        <td>4</td>
                        <td>
                            <div class="person-name">KISHORE R</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0005">
                        <td>5</td>
                        <td>
                            <div class="person-name">Rokith R</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count">2</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                    <tr class="lead-row" data-empid="EMP0006">
                        <td>6</td>
                        <td>
                            <div class="person-name">Prabhu S</div>
                        </td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                        <td><span class="lead-count zero">0</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Slide-Over Offcanvas Filter Drawer -->
    <div class="offcanvas offcanvas-end border-0 shadow-lg" tabindex="-1" id="elrFilterOffcanvas" aria-labelledby="elrFilterOffcanvasLabel" style="width: 380px;">
        <div class="offcanvas-header border-bottom bg-light py-3 px-4">
            <div class="d-flex align-items-center gap-2">
                <div class="icon-chip bg-primary-subtle text-primary rounded-2 d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                    <i class="bi bi-sliders"></i>
                </div>
                <div>
                    <h6 class="offcanvas-title fw-bold mb-0 font-14" id="elrFilterOffcanvasLabel">Filter Employee Leads</h6>
                    <span class="text-muted font-11">Filter by employee name, ID &amp; date range</span>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-4 py-3">
            <form id="elrFilterForm" autocomplete="off" onsubmit="return false;">
                <div class="mb-3">
                    <label class="form-label font-12 fw-semibold text-secondary mb-1" for="leadSearch">Name / Mobile / Employee Id</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-search"></i></span>
                        <input class="form-control border-start-0 font-13" id="leadSearch" name="search" placeholder="Enter Name / Mobile / Employee Id" value="">
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="leadFrom">From Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="leadFrom" name="from" value="01-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label font-12 fw-semibold text-secondary mb-1" for="leadTo">To Date</label>
                        <div class="date-picker">
                            <input type="text" class="date-input form-control font-13" id="leadTo" name="to" value="31-10-2026" placeholder="DD-MM-YYYY" autocomplete="off">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="offcanvas-footer border-top bg-light p-3 d-flex gap-2">
            <button type="button" class="btn btn-light border flex-fill fw-semibold font-13" id="leadClear">
                <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
            </button>
            <button type="button" class="btn btn-primary flex-fill fw-semibold font-13" id="leadApplyBtn" data-bs-dismiss="offcanvas">
                <i class="bi bi-check2-circle me-1"></i>Apply Filters
            </button>
        </div>
    </div>
</main>

<script>
    (function() {
        'use strict';
        var DEFAULT_FROM = '01-10-2026';
        var DEFAULT_TO = '31-10-2026';
        var table = document.getElementById('employeeLeadTable');
        var tbody = table ? table.querySelector('tbody') : null;
        if (!tbody) return;

        var allRows = Array.prototype.map.call(tbody.querySelectorAll('tr'), function(tr) {
            return {
                text: (tr.textContent || '').toLowerCase() + ' ' + (tr.getAttribute('data-empid') || '').toLowerCase(),
                html: tr.outerHTML
            };
        });

        function applyElrFilter() {
            var q = (document.getElementById('leadSearch').value || '').trim().toLowerCase();
            var from = (document.getElementById('leadFrom').value || '').trim();
            var to = (document.getElementById('leadTo').value || '').trim();

            var count = 0;
            if (q) count++;
            if (from && from !== DEFAULT_FROM) count++;
            if (to && to !== DEFAULT_TO) count++;

            var badge = document.getElementById('elrFilterCountBadge');
            if (badge) {
                badge.textContent = count;
                badge.classList.toggle('d-none', count === 0);
            }

            var dateLbl = document.getElementById('elrDateLabel');
            if (dateLbl) {
                dateLbl.innerHTML = '<i class="bi bi-calendar3 text-primary me-1"></i>' + (from || DEFAULT_FROM) + ' to ' + (to || DEFAULT_TO);
            }

            tbody.innerHTML = allRows.filter(function(r) {
                if (q && r.text.indexOf(q) === -1) return false;
                return true;
            }).map(function(r) { return r.html; }).join('');

            if (table && table.autoTable) table.autoTable.refresh();
        }

        document.getElementById('leadApplyBtn').addEventListener('click', applyElrFilter);
        document.getElementById('leadClear').addEventListener('click', function() {
            document.getElementById('leadSearch').value = '';
            document.getElementById('leadFrom').value = DEFAULT_FROM;
            document.getElementById('leadTo').value = DEFAULT_TO;
            applyElrFilter();
        });
    })();
</script>

<?php include 'footer.php'; ?>

