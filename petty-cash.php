<?php include 'header.php'; ?>
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    .pc-page {
        padding: 24px 20px;
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Header Card matching expenses.php */
    .pc-header-card {
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

    .pc-title-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pc-title-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: #f0fdf4;
        color: #087a24;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 2px 6px rgba(8, 122, 36, 0.15);
    }

    .btn-new-pc {
        background: #087a24;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(8, 122, 36, 0.25);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none !important;
        cursor: pointer;
    }

    .btn-new-pc:hover {
        background: #06601c;
        box-shadow: 0 6px 16px rgba(8, 122, 36, 0.35);
    }

    /* Card Wrapper matching expenses.php */
    .card-custom {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        overflow: hidden;
    }

    /* Splitup Pill */
    .pc-split-pill {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        background-color: #f1f5f9;
        color: #475569;
        border: 1px solid #cbd5e1;
    }
</style>

<main class="pc-page">
    <!-- Header Card -->
    <div class="pc-header-card">
        <div class="pc-title-group">
            <div class="pc-title-icon">
                <i class="bi bi-safe2"></i>
            </div>
            <div>
                <h3 class="fw-bold m-0 text-dark">Petty Cash Management</h3>
                <span class="text-muted small">View, track, and record petty cash disbursements and staff transactions</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <a href="petty-cash-create.php" class="btn-new-pc">
                <i class="bi bi-plus-lg fw-bold"></i> New Petty Cash
            </a>
        </div>
    </div>

    <!-- Table Container matching expenses.php & master-table.js -->
    <div class="card-custom mb-4 p-4">
        <div class="table-responsive">
            <table class="table-modern master-table column-border" id="pcTable">
                <thead>
                    <tr>
                        <th style="width: 50px; text-align: center;">#</th>
                        <th class="text-nowrap" style="min-width: 180px; text-align: left;">From Staff</th>
                        <th class="text-nowrap" style="min-width: 140px; text-align: left;">To Staff</th>
                        <th class="text-nowrap" style="width: 120px; text-align: center;">Date</th>
                        <th class="text-nowrap" style="width: 130px; text-align: right;">Amount</th>
                        <th class="text-nowrap" style="min-width: 180px; text-align: left;">Remarks</th>
                        <th class="text-nowrap text-center" style="width: 100px;">Splitup</th>
                    </tr>
                </thead>
                <tbody id="pcTbody"></tbody>
            </table>
        </div>
    </div>
</main>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>
<script src="./assets/js/master-table.js"></script>

<script src="./assets/js/pages/petty-cash.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>

