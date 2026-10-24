<?php 
include 'header.php'; 

$message = '';
$messageType = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $staff = trim($_POST['staff'] ?? '');
    $amount = trim($_POST['amount'] ?? '0');
    
    if (!empty($staff) && !empty($amount)) {
        $message = "Petty Cash entry of ₹" . number_format((float)$amount, 2) . " created successfully for $staff!";
        $messageType = "success";
    } else {
        $message = "Please fill in all required fields (Staff and Amount).";
        $messageType = "danger";
    }
}
?>

<link rel="stylesheet" href="./assets/css/table.css">
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    .pc-create-page {
        padding: 24px 20px 60px 20px;
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Header Card */
    .pc-header-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 24px;
        box-shadow: 0 2px 10px rgba(15, 23, 42, 0.03);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }

    .pc-title-group {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .pc-title-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: #f0fdf4;
        color: #087a24;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        box-shadow: 0 2px 8px rgba(8, 122, 36, 0.15);
    }

    .pc-title-text {
        font-size: 1.35rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }

    /* Form Container Card */
    .pc-form-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 28px 32px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
        max-width: 900px;
        margin: 0 auto;
    }

    .pc-card-header {
        font-size: 17px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 24px;
        padding-bottom: 14px;
        border-bottom: 1.5px solid #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    /* Form Labels & Controls */
    .form-label-custom {
        font-size: 13px;
        font-weight: 700;
        color: #334155;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .form-label-custom .req-star {
        color: #ef4444;
        font-weight: 800;
        margin-left: 2px;
    }

    .form-control-custom, .form-select-custom {
        height: 46px;
        border-radius: 10px;
        border: 1.5px solid #cbd5e1;
        font-size: 14px;
        font-weight: 500;
        color: #0f172a;
        padding: 9px 15px;
        transition: all 0.2s ease;
        background-color: #ffffff;
    }

    textarea.form-control-custom {
        height: auto;
        min-height: 110px;
        padding: 12px 15px;
    }

    .form-control-custom:focus, .form-select-custom:focus {
        border-color: #087a24;
        box-shadow: 0 0 0 3.5px rgba(8, 122, 36, 0.18);
        outline: none;
    }

    /* Select2 Custom Styling */
    .select2-container--default .select2-selection--single {
        height: 46px !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 8px 14px !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        display: flex !important;
        align-items: center !important;
        background-color: #ffffff !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 44px !important;
        right: 12px !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #087a24 !important;
        box-shadow: 0 0 0 3.5px rgba(8, 122, 36, 0.18) !important;
    }

    .select2-dropdown {
        border-radius: 12px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12) !important;
        z-index: 99999 !important;
    }

    /* Action Buttons Bar */
    .pc-actions-bar {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1.5px solid #f1f5f9;
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569 !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 11px 24px;
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        transition: all 0.2s ease;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
        color: #1e293b !important;
    }

    .btn-save-pc {
        background: #087a24;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 11px 28px;
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 14px rgba(8, 122, 36, 0.3);
        transition: all 0.2s ease;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-save-pc:hover {
        background: #06601c;
        box-shadow: 0 6px 18px rgba(8, 122, 36, 0.4);
    }
</style>

<main class="pc-create-page">
    <!-- Header Navigation Card -->
    <div class="pc-header-card max-width-wrapper" style="max-width: 900px; margin: 0 auto 24px auto;">
        <div class="pc-title-group">
            <div class="pc-title-icon">
                <i class="bi bi-safe2"></i>
            </div>
            <div>
                <h3 class="pc-title-text">Petty Cash Create</h3>
                <span class="text-muted small">Record new petty cash disbursements, staff assignments, splitups, and remarks</span>
            </div>
        </div>
        <div>
            <a href="petty-cash.php" class="btn-cancel">
                <i class="bi bi-arrow-left"></i> Back to Petty Cash List
            </a>
        </div>
    </div>

    <!-- Alert Notification -->
    <?php if (!empty($message)): ?>
    <div class="alert alert-<?= $messageType ?> alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="max-width: 900px; margin: 0 auto 24px auto; border-radius:12px;">
        <i class="bi bi-check-circle-fill me-2 fs-5 align-middle"></i>
        <strong><?= htmlspecialchars($message) ?></strong>
        <a href="petty-cash.php" class="btn btn-sm btn-outline-<?= $messageType ?> ms-3 fw-bold">View Petty Cash List ↗</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Petty Cash Create Form Container -->
    <div class="pc-form-card">
        <form action="" method="POST" id="formPettyCashCreate">
            
            <!-- Petty Cash Splitup * -->
            <div class="mb-4">
                <label class="form-label-custom" for="pcSplitup">
                    <i class="bi bi-diagram-3-fill text-primary fs-6"></i>
                    Petty Cash Splitup <span class="req-star">*</span>
                </label>
                <select class="form-select select2" id="pcSplitup" name="splitup" required>
                    <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
            </div>

            <!-- Staff * -->
            <div class="mb-4">
                <label class="form-label-custom" for="pcStaff">
                    <i class="bi bi-person-fill text-primary fs-6"></i>
                    Staff <span class="req-star">*</span>
                </label>
                <select class="form-select select2" id="pcStaff" name="staff" required>
                    <option value="" disabled selected>Nothing selected</option>
                    <option value="KOWSHIK SOFTWARE">KOWSHIK SOFTWARE</option>
                    <option value="thilak ma">thilak ma</option>
                    <option value="PREM KUMAR.R">PREM KUMAR.R</option>
                    <option value="Priya Sharma">Priya Sharma</option>
                    <option value="Siddharth N">Siddharth N</option>
                    <option value="Rajesh Kumar">Rajesh Kumar</option>
                    <option value="Ananya Sundaram">Ananya Sundaram</option>
                </select>
            </div>

            <!-- Expense Date * -->
            <div class="mb-4">
                <label class="form-label-custom" for="pcDate">
                    <i class="bi bi-calendar-event-fill text-primary fs-6"></i>
                    Expense Date <span class="req-star">*</span>
                </label>
                <div class="input-group">
                    <input type="date" class="form-control form-control-custom" id="pcDate" name="expense_date" value="<?= date('Y-m-d') ?>" required>
                    <span class="input-group-text bg-white border-start-0 text-muted px-3" style="border-radius:0 10px 10px 0; border: 1.5px solid #cbd5e1;">
                        <i class="bi bi-calendar3 fs-6"></i>
                    </span>
                </div>
            </div>

            <!-- Amount * -->
            <div class="mb-4">
                <label class="form-label-custom" for="pcAmount">
                    <i class="bi bi-currency-rupee text-primary fs-6"></i>
                    Amount <span class="req-star">*</span>
                </label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 fw-bold text-secondary px-3" style="border-radius:10px 0 0 10px; border: 1.5px solid #cbd5e1;">₹</span>
                    <input type="number" step="0.01" class="form-control form-control-custom" id="pcAmount" name="amount" placeholder="e.g. 2500.00" required style="border-radius:0 10px 10px 0;">
                </div>
            </div>

            <!-- Remarks -->
            <div class="mb-3">
                <label class="form-label-custom" for="pcRemarks">
                    <i class="bi bi-chat-left-text-fill text-primary fs-6"></i>
                    Remarks
                </label>
                <textarea class="form-control form-control-custom" id="pcRemarks" name="remarks" rows="4" placeholder="Enter remarks or details about this petty cash disbursement..."></textarea>
            </div>

            <!-- Form Actions -->
            <div class="pc-actions-bar">
                <a href="petty-cash.php" class="btn-cancel">
                    <i class="bi bi-x-lg"></i> Cancel
                </a>
                <button type="submit" class="btn-save-pc">
                    <i class="bi bi-check2-circle fs-6"></i> Save Petty Cash
                </button>
            </div>
        </form>
    </div>
</main>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/select2.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    if (window.jQuery && jQuery.fn.select2) {
        jQuery('.select2').select2({
            width: '100%'
        });
    }
});
</script>

<?php include 'footer.php'; ?>
