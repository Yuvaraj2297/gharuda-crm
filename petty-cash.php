<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Exact Petty Cash List data matching user uploaded image
    var pettyCashData = [
        { id: 1, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2025-10-31', amount: '2500.00', remarks: '', splitup: 'No' },
        { id: 2, fromStaff: 'thilak ma', toStaff: '-', date: '2025-11-12', amount: '5000.00', remarks: 'Petty cash', splitup: 'No' },
        { id: 3, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2025-11-15', amount: '2500.00', remarks: 'tra', splitup: 'No' },
        { id: 4, fromStaff: 'PREM KUMAR.R', toStaff: '-', date: '2025-11-17', amount: '2000.00', remarks: 'Petty', splitup: 'No' },
        { id: 5, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-01-06', amount: '16.00', remarks: 'xerox', splitup: 'No' },
        { id: 6, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-03-30', amount: '5000.00', remarks: 'Petty', splitup: 'No' },
        { id: 7, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-04-09', amount: '50000.00', remarks: 'pett6 cash', splitup: 'No' },
        { id: 8, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-04-10', amount: '15000.00', remarks: 'petty cash', splitup: 'No' }
    ];

    function esc(s) {
        return String(s == null ? '' : s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    if (typeof MasterTable !== 'undefined') {
        MasterTable.init({
            tableId: 'pcTable',
            tbodyId: 'pcTbody',
            idPrefix: 'pc',
            data: pettyCashData,
            tableName: 'Petty_Cash_List',
            primaryKey: 'id',
            searchFields: ['fromStaff', 'toStaff', 'date', 'amount', 'remarks', 'splitup'],
            columns: [
                {
                    field: 'fromStaff',
                    title: 'From Staff',
                    sortable: true,
                    render: function(v) {
                        return '<span class="fw-semibold text-dark">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'toStaff',
                    title: 'To Staff',
                    sortable: true,
                    render: function(v) {
                        return '<span class="text-muted">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'date',
                    title: 'Date',
                    sortable: true,
                    render: function(v) {
                        return '<div class="text-center"><span class="text-secondary font-monospace" style="font-size:13px;">' + esc(v) + '</span></div>';
                    }
                },
                {
                    field: 'amount',
                    title: 'Amount',
                    sortable: true,
                    render: function(v) {
                        return '<div class="text-end"><span class="fw-bold text-dark font-monospace" style="font-size:13.5px;">₹ ' + esc(v) + '</span></div>';
                    }
                },
                {
                    field: 'remarks',
                    title: 'Remarks',
                    sortable: true,
                    render: function(v) {
                        return v ? '<span class="text-dark">' + esc(v) + '</span>' : '<span class="text-muted">—</span>';
                    }
                },
                {
                    field: 'splitup',
                    title: 'Splitup',
                    sortable: true,
                    render: function(v) {
                        return '<div class="text-center"><span class="pc-split-pill">' + esc(v) + '</span></div>';
                    }
                }
            ]
        });
    }
});
</script>

<?php include 'footer.php'; ?>

