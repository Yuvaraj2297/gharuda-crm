<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    .pcr-page {
        padding: 24px 20px;
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Header Card */
    .pcr-header-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .pcr-title-group {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .pcr-title-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        color: #087a24;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.15);
        border: 1px solid #bbf7d0;
    }

    /* Primary Action Buttons */
    .btn-pcr-primary {
        background: #2563eb;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 9px 22px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
        cursor: pointer;
    }

    .btn-pcr-primary:hover {
        background: #1d4ed8;
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
        transform: translateY(-1px);
    }

    .btn-pcr-success {
        background: #087a24;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 9px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.22);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
        cursor: pointer;
    }

    .btn-pcr-success:hover {
        background: #06601c;
        box-shadow: 0 6px 16px rgba(8, 122, 36, 0.32);
        transform: translateY(-1px);
    }

    .btn-pcr-outline {
        border: 1.5px solid #cbd5e1;
        background: #ffffff;
        color: #334155 !important;
        font-weight: 600;
        font-size: 13px;
        padding: 8px 18px;
        border-radius: 10px;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none !important;
    }

    .btn-pcr-outline:hover {
        background: #f8fafc;
        border-color: #94a3b8;
        color: #0f172a !important;
    }

    /* Card Wrapper matching expenses.php */
    .card-custom {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    /* Filter Card */
    .pcr-filter-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 22px 26px;
        margin-bottom: 20px;
        box-shadow: 0 2px 12px rgba(15, 23, 42, 0.03);
    }

    .pcr-filter-title {
        font-size: 14px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label-custom {
        font-size: 12.5px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 6px;
    }

    .input-date-custom {
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        padding: 8.5px 14px;
        font-size: 13px;
        font-weight: 500;
        color: #1e293b;
        background-color: #ffffff;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .input-date-custom:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        outline: none;
    }

    /* Stats Summary Grid */
    .pcr-stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }

    .pcr-stat-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 16px 20px;
        box-shadow: 0 2px 8px rgba(15, 23, 42, 0.02);
        display: flex;
        align-items: center;
        gap: 14px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .pcr-stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(15, 23, 42, 0.06);
    }

    .pcr-stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .pcr-stat-label {
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #64748b;
        margin-bottom: 2px;
    }

    .pcr-stat-value {
        font-size: 17px;
        font-weight: 800;
        font-family: 'JetBrains Mono', monospace, sans-serif;
    }

    /* Credit/Debit Amount Formatting */
    .amount-credit {
        color: #087a24;
        font-weight: 700;
        font-family: monospace;
    }

    .amount-debit {
        color: #dc2626;
        font-weight: 700;
        font-family: monospace;
    }

    .amount-balance {
        color: #0f172a;
        font-weight: 800;
        font-family: monospace;
    }

    /* Custom select2 restyling to match clean modern inputs */
    .select2-container--default .select2-selection--single {
        border-radius: 10px !important;
        border-color: #cbd5e1 !important;
        height: 40px !important;
        padding: 5px 8px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 28px !important;
        color: #1e293b !important;
        font-size: 13px !important;
        font-weight: 500 !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }
</style>

<main class="pcr-page">
    <!-- Top Header Card -->
    <div class="pcr-header-card">
        <div class="pcr-title-group">
            <div class="pcr-title-icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div>
                <h3 class="fw-bold m-0 text-dark" style="font-size:1.35rem;">Petty Cash Report</h3>
                <span class="text-muted small">Filter staff transactions, audit cash inflows & outflows, and export detailed statements</span>
            </div>
        </div>
    </div>

    <!-- Filter Card ("Filter by" matching user reference image) -->
    <div class="pcr-filter-card">
        <div class="pcr-filter-title">
            <i class="bi bi-funnel-fill text-primary"></i> Filter by
        </div>
        <div class="row g-3 align-items-end">
            <!-- Staff Dropdown -->
            <div class="col-md-4 col-lg-3">
                <label for="pcrStaff" class="form-label form-label-custom">Staff</label>
                <select id="pcrStaff" class="form-select select2">
                    <option value="">Nothing selected</option>
                    <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE</option>
                    <option value="thilak ma">thilak ma</option>
                    <option value="PREM KUMAR.R">PREM KUMAR.R</option>
                    <option value="Siddharth N">Siddharth N (Finance)</option>
                    <option value="Priya Sharma">Priya Sharma (HR)</option>
                    <option value="Rajesh Kumar">Rajesh Kumar (Ops)</option>
                </select>
            </div>

            <!-- From Date -->
            <div class="col-md-3 col-lg-3">
                <label for="pcrFromDate" class="form-label form-label-custom">From Date</label>
                <input type="date" id="pcrFromDate" class="form-control input-date-custom" value="2026-10-03">
            </div>

            <!-- To Date -->
            <div class="col-md-3 col-lg-3">
                <label for="pcrToDate" class="form-label form-label-custom">To Date</label>
                <input type="date" id="pcrToDate" class="form-control input-date-custom" value="2026-10-03">
            </div>

            <!-- Search Button -->
            <div class="col-md-2 col-lg-3">
                <button type="button" id="btnPcrSearch" class="btn-pcr-primary w-100 justify-content-center">
                    <i class="bi bi-search"></i> Search
                </button>
            </div>
        </div>
    </div>

    <!-- Stats Summary Tiles -->
    <div class="pcr-stats-grid">
        <div class="pcr-stat-card">
            <div class="pcr-stat-icon" style="background:#f0fdf4; color:#087a24;">
                <i class="bi bi-arrow-down-left-circle"></i>
            </div>
            <div>
                <div class="pcr-stat-label">Total Cash In (Credit)</div>
                <div class="pcr-stat-value text-success" id="statTotalCredit">₹ 0.00</div>
            </div>
        </div>

        <div class="pcr-stat-card">
            <div class="pcr-stat-icon" style="background:#fef2f2; color:#dc2626;">
                <i class="bi bi-arrow-up-right-circle"></i>
            </div>
            <div>
                <div class="pcr-stat-label">Total Cash Out (Debit)</div>
                <div class="pcr-stat-value text-danger" id="statTotalDebit">₹ 0.00</div>
            </div>
        </div>

        <div class="pcr-stat-card">
            <div class="pcr-stat-icon" style="background:#eff6ff; color:#2563eb;">
                <i class="bi bi-wallet2"></i>
            </div>
            <div>
                <div class="pcr-stat-label">Net Balance</div>
                <div class="pcr-stat-value text-dark" id="statNetBalance">₹ 0.00</div>
            </div>
        </div>

        <div class="pcr-stat-card">
            <div class="pcr-stat-icon" style="background:#faf5ff; color:#9333ea;">
                <i class="bi bi-receipt-cutoff"></i>
            </div>
            <div>
                <div class="pcr-stat-label">Total Transactions</div>
                <div class="pcr-stat-value text-dark" id="statTotalCount">0</div>
            </div>
        </div>
    </div>

    <!-- Data Table Container (matching expenses.php & master-table.js) -->
    <div class="card-custom mb-4 p-4">
        <div class="table-responsive">
            <table class="table-modern master-table column-border" id="pcrTable">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">#</th>
                        <th class="text-nowrap" style="width: 140px; text-align: center;">Date</th>
                        <th class="text-nowrap" style="min-width: 260px; text-align: left;">Description</th>
                        <th class="text-nowrap" style="width: 160px; text-align: right;">Credit</th>
                        <th class="text-nowrap" style="width: 160px; text-align: right;">Debit</th>
                        <th class="text-nowrap" style="width: 160px; text-align: right;">Balance</th>
                    </tr>
                </thead>
                <tbody id="pcrTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/master-table.js"></script>

<script src="./assets/js/pages/petty-cash-report.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
