<?php 
include 'header.php'; 

// Process form submission
$message = '';
$messageType = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expenseName = trim($_POST['expense_name'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $amount = trim($_POST['amount'] ?? '0');
    
    if (!empty($category) && !empty($amount)) {
        $message = "Expense '$expenseName' of ₹" . number_format((float)$amount, 2) . " recorded successfully!";
        $messageType = "success";
    } else {
        $message = "Please fill in all required fields (Category and Amount).";
        $messageType = "danger";
    }
}
?>
<link rel="stylesheet" href="./assets/css/select2.css">

<style>
    .exp-create-page {
        padding: 24px 20px 60px 20px;
        background-color: #f8fafc;
        min-height: calc(100vh - 70px);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Header Card */
    .exp-header-card {
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

    .exp-title-group {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .exp-title-icon {
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

    /* ParsePilot Pill Button */
    .parsepilot-btn {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        font-size: 13.5px;
        padding: 10px 22px;
        border-radius: 99px;
        box-shadow: 0 4px 14px rgba(124, 58, 237, 0.35);
        transition: all 0.25 ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        text-decoration: none !important;
    }

    .parsepilot-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(124, 58, 237, 0.45);
        background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
    }

    /* Form Section Cards */
    .exp-form-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 26px 28px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
        height: 100%;
    }

    .exp-card-title {
        font-size: 16px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 22px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Form Control Enhancements */
    .form-label {
        font-size: 12.5px;
        font-weight: 700;
        color: #475569;
        margin-bottom: 6px;
    }

    .form-control, .form-select {
        height: 44px;
        border-radius: 10px;
        border: 1.5px solid #cbd5e1;
        font-size: 13.5px;
        font-weight: 500;
        color: #0f172a;
        padding: 8px 14px;
        transition: all 0.2s ease;
    }

    textarea.form-control {
        height: auto;
    }

    .form-control:focus, .form-select:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3.5px rgba(37, 99, 235, 0.15);
    }

    /* Select2 Customization */
    .select2-container--default .select2-selection--single {
        height: 44px !important;
        border-radius: 10px !important;
        border: 1.5px solid #cbd5e1 !important;
        padding: 7px 14px !important;
        font-size: 13.5px !important;
        font-weight: 500 !important;
        display: flex !important;
        align-items: center !important;
        background-color: #ffffff !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 42px !important;
        right: 12px !important;
    }

    .select2-container--default.select2-container--open .select2-selection--single,
    .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: #2563eb !important;
        box-shadow: 0 0 0 3.5px rgba(37, 99, 235, 0.15) !important;
    }

    .select2-dropdown {
        border-radius: 12px !important;
        border: 1px solid #cbd5e1 !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12) !important;
        z-index: 99999 !important;
    }

    /* File Dropzone Box */
    .exp-dropzone {
        border: 2px dashed #cbd5e1;
        background: #f8fafc;
        border-radius: 12px;
        padding: 24px 16px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .exp-dropzone:hover {
        border-color: #2563eb;
        background: #eff6ff;
    }

    /* Sticky Footer Bar */
    .exp-footer-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 16px 24px;
        margin-top: 24px;
        box-shadow: 0 4px 20px rgba(15, 23, 42, 0.05);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    /* Tooltip Helper */
    .field-help-icon {
        color: #94a3b8;
        font-size: 13px;
        cursor: help;
        margin-right: 4px;
    }
</style>

<main class="exp-create-page">
    <!-- Header Navigation & Title -->
    <div class="exp-header-card">
        <div class="exp-title-group">
            <div class="exp-title-icon">
                <i class="bi bi-receipt"></i>
            </div>
            <div>
                <h3 class="fw-bold m-0 text-dark" style="font-size:1.4rem;">Record New Expense</h3>
                <span class="text-muted small">Log company expenditures, vendor bills, tax options, and receipt attachments</span>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="parsepilot-btn" data-bs-toggle="modal" data-bs-target="#parsePilotModal">
                <i class="bi bi-camera-fill"></i>
                <span>ParsePilot — Scan & Fill</span>
            </button>
        </div>
    </div>

    <!-- Alert Message -->
    <?php if (!empty($message)): ?>
    <div class="alert alert-<?= $messageType ?> alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius:12px;">
        <i class="bi bi-check-circle-fill me-2 fs-5 align-middle"></i>
        <strong><?= htmlspecialchars($message) ?></strong>
        <a href="expenses.php" class="btn btn-sm btn-outline-<?= $messageType ?> ms-3 fw-bold">View All Expenses ↗</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Expense Creation Form -->
    <form action="" method="POST" enctype="multipart/form-data" id="expenseForm">
        <div class="row g-4">
            
            <!-- Left Column: Primary Expense Details -->
            <div class="col-lg-6">
                <div class="exp-form-card">
                    <div class="exp-card-title">
                        <i class="bi bi-plus-circle-fill text-primary"></i>
                        <span>Add new Expense of</span>
                    </div>

                    <!-- Vendors -->
                    <div class="mb-3.5 mb-3">
                        <label class="form-label" for="vendorSelect">Vendors</label>
                        <select class="form-select select2" id="vendorSelect" name="vendor_id">
                            <option value="">None</option>
                            <option value="Amazon Business">Amazon Business Pvt Ltd</option>
                            <option value="Flipkart Wholesale">Flipkart Wholesale</option>
                            <option value="HP India">HP India Tech Services</option>
                            <option value="Apple Store">Apple Store India</option>
                            <option value="Indian Oil">Indian Oil Fuel Station</option>
                            <option value="Swiggy Corporate">Swiggy Corporate Food</option>
                            <option value="Air India">Air India Express</option>
                        </select>
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseName">
                            <i class="bi bi-question-circle field-help-icon" data-bs-toggle="tooltip" title="Short description or title of the expense item"></i>
                            Name
                        </label>
                        <input type="text" class="form-control" id="expenseName" name="expense_name" placeholder="Enter expense item name (e.g. AWS Cloud Hosting)">
                    </div>

                    <!-- Note -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseNote">
                            <i class="bi bi-question-circle field-help-icon" data-bs-toggle="tooltip" title="Detailed explanation or project requirement notes"></i>
                            Note
                        </label>
                        <textarea class="form-control" id="expenseNote" name="note" rows="3" placeholder="Add specific details, purpose, or remarks for this expense..."></textarea>
                    </div>

                    <!-- Expense Category + Quick Add Button -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseCategory">
                            <span class="text-danger">*</span> Expense Category
                        </label>
                        <div class="input-group">
                            <div class="flex-grow-1">
                                <select class="form-select select2" id="expenseCategory" name="category" required>
                                    <option value="">Non selected</option>
                                    <option value="Fleet: Work Order">Fleet: Work Order</option>
                                    <option value="Food & Accomodation">Food & Accomodation</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Stationery">Stationery</option>
                                    <option value="Hardware & Electronics">Hardware & Electronics</option>
                                    <option value="Software & Licenses">Software & Licenses</option>
                                    <option value="Travel & Conveyance">Travel & Conveyance</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-outline-secondary border-start-0 px-3" style="border-radius:0 10px 10px 0; border-color:#cbd5e1;" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="bi bi-plus-lg fw-bold"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Expense Sub Category -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseSubCategory">Expense Sub Category</label>
                        <select class="form-select select2" id="expenseSubCategory" name="sub_category">
                            <option value="">Non selected</option>
                            <option value="Vehicle Maintenance">Vehicle Maintenance</option>
                            <option value="Office Consumables">Office Consumables</option>
                            <option value="Fuel Refill">Fuel Refill</option>
                            <option value="Cloud Infrastructure">Cloud Infrastructure</option>
                            <option value="Client Business Lunch">Client Business Lunch</option>
                        </select>
                    </div>

                    <!-- Expense Date -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseDate">
                            <span class="text-danger">*</span> Expense Date
                        </label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="expenseDate" name="expense_date" value="2026-10-01" required>
                            <span class="input-group-text bg-white text-muted" style="border-radius:0 10px 10px 0; border-color:#cbd5e1;">
                                <i class="bi bi-calendar3"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseAmount">
                            <span class="text-danger">*</span> Amount
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light fw-bold text-secondary" style="border-radius:10px 0 0 10px; border-color:#cbd5e1;">₹</span>
                            <input type="number" step="0.01" class="form-control" id="expenseAmount" name="amount" placeholder="0.00" required style="border-radius:0 10px 10px 0;">
                        </div>
                    </div>

                    <!-- Customer -->
                    <div class="mb-1">
                        <label class="form-label" for="expenseCustomer">Customer / Client Project</label>
                        <select class="form-select select2" id="expenseCustomer" name="customer">
                            <option value="">Select and begin typing</option>
                            <option value="Gharuda HRMS">Gharuda HRMS (Internal)</option>
                            <option value="Apex Logistics">Apex Logistics Ltd</option>
                            <option value="Zenith Retail">Zenith Retail Pvt Ltd</option>
                            <option value="Titan Tech">Titan Tech Solutions</option>
                            <option value="Global Trade">Global Trade Co</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Right Column: Advanced Options -->
            <div class="col-lg-6">
                <div class="exp-form-card">
                    <div class="exp-card-title">
                        <i class="bi bi-sliders text-primary"></i>
                        <span>Advanced Options</span>
                    </div>

                    <!-- Currency -->
                    <div class="mb-3">
                        <label class="form-label" for="expenseCurrency">
                            <span class="text-danger">*</span> Currency
                        </label>
                        <select class="form-select select2" id="expenseCurrency" name="currency">
                            <option value="INR" selected>INR ₹</option>
                            <option value="USD">USD $</option>
                            <option value="EUR">EUR €</option>
                            <option value="GBP">GBP £</option>
                            <option value="AED">AED د.إ</option>
                        </select>
                    </div>

                    <!-- Tax 1 & Tax 2 -->
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label" for="tax1Select">Tax 1</label>
                            <select class="form-select select2" id="tax1Select" name="tax1">
                                <option value="No Tax">No Tax</option>
                                <option value="GST 18%">GST 18%</option>
                                <option value="GST 12%">GST 12%</option>
                                <option value="GST 5%">GST 5%</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="tax2Select">Tax 2</label>
                            <select class="form-select select2" id="tax2Select" name="tax2">
                                <option value="No Tax">No Tax</option>
                                <option value="CGST 9%">CGST 9%</option>
                                <option value="SGST 9%">SGST 9%</option>
                                <option value="IGST 18%">IGST 18%</option>
                            </select>
                        </div>
                    </div>

                    <!-- Attachment -->
                    <div class="mb-3">
                        <label class="form-label">Attachment (Receipt / Invoice)</label>
                        <div class="exp-dropzone" onclick="document.getElementById('receiptFile').click()">
                            <input type="file" id="receiptFile" name="attachment" class="d-none" accept=".pdf,.jpg,.jpeg,.png">
                            <i class="bi bi-cloud-arrow-up fs-2 text-primary d-block mb-1"></i>
                            <div class="fw-bold text-dark small mb-1" id="fileLabel">Drop file here or click to upload receipt</div>
                            <div class="text-muted" style="font-size:11.5px;">Supports PDF, PNG, JPG (Max 5MB)</div>
                        </div>
                    </div>

                    <!-- Payment Mode & Reference # -->
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label" for="paymentMode">Payment Mode</label>
                            <select class="form-select select2" id="paymentMode" name="payment_mode">
                                <option value="">Non selected</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank">Bank Transfer</option>
                                <option value="UPI">UPI / QR Code</option>
                                <option value="Credit Card">Corporate Credit Card</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="refNumber">Reference #</label>
                            <input type="text" class="form-control" id="refNumber" name="reference_no" placeholder="e.g. TXN98765432">
                        </div>
                    </div>

                    <!-- Repeat every -->
                    <div class="mb-3">
                        <label class="form-label" for="repeatEvery">Repeat every</label>
                        <select class="form-select select2" id="repeatEvery" name="repeat_every">
                            <option value="">Non selected</option>
                            <option value="1 Month">Every 1 Month</option>
                            <option value="3 Months">Every 3 Months</option>
                            <option value="6 Months">Every 6 Months</option>
                            <option value="1 Year">Every 1 Year</option>
                        </select>
                    </div>

                    <!-- Staff -->
                    <div class="mb-3">
                        <label class="form-label" for="staffSelect">Staff / Claimed By</label>
                        <select class="form-select select2" id="staffSelect" name="staff_id">
                            <option value="">Nothing selected</option>
                            <option value="Priya Sharma">Priya Sharma (HR Lead)</option>
                            <option value="Karthik V">Karthik V (Principal Lead)</option>
                            <option value="Ananya Sundaram">Ananya Sundaram (Tech Lead)</option>
                            <option value="Siddharth N">Siddharth N (Finance)</option>
                            <option value="Rajesh Kumar">Rajesh Kumar (Operations)</option>
                        </select>
                    </div>

                    <!-- Payment Account & Deposit To -->
                    <div class="row g-3 mb-1">
                        <div class="col-6">
                            <label class="form-label" for="paymentAccount">Payment Account</label>
                            <select class="form-select select2" id="paymentAccount" name="payment_account">
                                <option value="">Non selected</option>
                                <option value="Petty Cash">Petty Cash Account</option>
                                <option value="HDFC Corporate">HDFC Bank Corporate</option>
                                <option value="ICICI Bank">ICICI Current Account</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="depositTo">Deposit To</label>
                            <select class="form-select select2" id="depositTo" name="deposit_to">
                                <option value="">Non selected</option>
                                <option value="Vendor Account">Vendor Direct Account</option>
                                <option value="Employee Reimbursement">Employee Reimbursement</option>
                                <option value="Tax Account">Tax Authority</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sticky Bottom Action Bar -->
        <div class="exp-footer-card">
            <a href="expenses.php" class="btn btn-light px-4 py-2.5 fw-bold border" style="border-radius:10px; font-size:13.5px; color:#475569;">
                <i class="bi bi-arrow-left me-1"></i> Cancel
            </a>
            <div class="d-flex align-items-center gap-2">
                <button type="submit" name="action" value="save_another" class="btn btn-outline-success px-4 py-2.5 fw-bold" style="border-radius:10px; font-size:13.5px; color:#087a24; border-color:#86efac;">
                    <i class="bi bi-plus-circle me-1"></i> Save & Add Another
                </button>
                <button type="submit" name="action" value="save" class="btn btn-success px-4 py-2.5 fw-bold shadow-sm" style="background:#087a24; border-color:#087a24; border-radius:10px; font-size:13.5px;">
                    <i class="bi bi-check2-circle me-1"></i> Save Expense
                </button>
            </div>
        </div>
    </form>
</main>

<!-- Modal: Quick Add Category -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-bottom p-3.5 p-3">
                <h5 class="modal-title fw-bold text-dark"><i class="bi bi-folder-plus text-primary me-2"></i> Add Expense Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Category Name *</label>
                    <input type="text" class="form-control" id="newCategoryInput" placeholder="e.g. Subscriptions & Software">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Description</label>
                    <textarea class="form-control" rows="2" placeholder="Brief note about this category..."></textarea>
                </div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-light fw-semibold" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary fw-bold px-4" onclick="saveNewCategory()">Save Category</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal: ParsePilot AI Scan & Fill -->
<div class="modal fade" id="parsePilotModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:20px;">
            <div class="modal-header text-white p-3.5 p-4" style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); border-radius: 20px 20px 0 0;">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2">
                    <i class="bi bi-camera-fill fs-5"></i> ParsePilot AI — Receipt Scanner
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 text-center">
                <div class="p-4 rounded-4 bg-light border border-dashed mb-3" style="border-color:#cbd5e1 !important;">
                    <i class="bi bi-file-earmark-pdf-fill fs-1 text-primary d-block mb-2"></i>
                    <h6 class="fw-bold text-dark">Upload Receipt Image or PDF</h6>
                    <p class="text-muted small m-0">ParsePilot automatically scans vendor, date, amount, GST tax, and items!</p>
                </div>
                <div class="progress mb-3 d-none" id="scanProgress" style="height: 8px; border-radius: 99px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-indigo" role="progressbar" style="width: 100%; background:#6366f1;"></div>
                </div>
            </div>
            <div class="modal-footer border-top p-3 justify-content-between">
                <button type="button" class="btn btn-light fw-semibold" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn text-white fw-bold px-4" style="background:#6366f1; border-radius:10px;" onclick="simulateParsePilotScan()">
                    <i class="bi bi-stars me-1"></i> Scan & Auto-Fill Sample Data
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/select2.js"></script>
<script>
$(document).ready(function() {
    if ($.fn.select2) {
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('body')
        });
    }

    // Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // File input label update
    $('#receiptFile').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        if (fileName) {
            $('#fileLabel').html('<i class="bi bi-check-circle-fill text-success me-1"></i> Attached: <strong>' + fileName + '</strong>');
        }
    });
});

function saveNewCategory() {
    var catVal = $('#newCategoryInput').val().trim();
    if (catVal) {
        var newOption = new Option(catVal, catVal, true, true);
        $('#expenseCategory').append(newOption).trigger('change');
        $('#addCategoryModal').modal('hide');
        $('#newCategoryInput').val('');
    } else {
        alert('Please enter a category name');
    }
}

function simulateParsePilotScan() {
    $('#scanProgress').removeClass('d-none');
    setTimeout(function() {
        $('#scanProgress').addClass('d-none');
        $('#parsePilotModal').modal('hide');

        // Auto fill form with sample scanned receipt data
        $('#expenseName').val('Amazon Office Ergonomic Chairs & Desk Supplies');
        $('#expenseCategory').val('Hardware & Electronics').trigger('change');
        $('#expenseAmount').val('14850.00');
        $('#vendorSelect').val('Amazon Business').trigger('change');
        $('#expenseDate').val('2026-10-01');
        $('#refNumber').val('INV-AMZ-2026-8841');
        $('#paymentMode').val('Credit Card').trigger('change');
        $('#tax1Select').val('GST 18%').trigger('change');
        $('#expenseNote').val('Scanned via ParsePilot AI: 2x Ergonomic Office Chairs for Engineering team.');

        alert('✨ ParsePilot Scan Complete!\nVendor: Amazon Business\nAmount: ₹14,850.00\nTax: GST 18%\nInvoice: INV-AMZ-2026-8841');
    }, 1200);
}
</script>

<?php include 'footer.php'; ?>
