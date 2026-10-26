<?php include 'header.php'; ?>

 

<style>
    .loan-apply-form { max-width: 720px; margin: 0 auto; }
    .form-section { background: #fff; border: 1px solid var(--border-soft); border-radius: 14px; padding: 22px; margin-bottom: 18px; }
    .form-section h6 { font-size: 14px; font-weight: 700; color: var(--ink-900); margin-bottom: 14px; display: flex; align-items: center; gap: 8px; }
    .form-section h6 i { color: var(--primary); font-size: 16px; }
    .form-note { background: #f8f9fa; border: 1px solid var(--border-soft); border-radius: 10px; padding: 12px 14px; font-size: 12px; color: var(--ink-500); display: flex; align-items: flex-start; gap: 10px; }
    .form-note i { color: var(--ink-500); font-size: 14px; margin-top: 1px; flex-shrink: 0; }
    .eligibility-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
    .eligibility-card { background: #f8f9fa; border: 1px solid var(--border-soft); border-radius: 10px; padding: 12px; text-align: center; }
    .eligibility-card .val { font-size: 16px; font-weight: 800; color: var(--ink-900); }
    .eligibility-card .lbl { font-size: 11px; font-weight: 600; color: var(--ink-500); margin-top: 2px; }
    .quick-amt { display: inline-flex; gap: 6px; margin-top: 6px; }
    .quick-amt button { font-size: 11px; padding: 4px 10px; border-radius: 6px; border: 1px solid var(--border-soft); background: #fff; color: var(--ink-700); font-weight: 600; cursor: pointer; transition: all .15s; }
    .quick-amt button:hover { background: var(--primary-light); border-color: var(--primary); color: var(--primary-dark); }
    .summary-box { background: var(--primary-light); border: 1px solid rgba(22,163,74,.2); border-radius: 12px; padding: 16px; }
    .summary-row { display: flex; justify-content: space-between; align-items: center; padding: 6px 0; font-size: 13px; }
    .summary-row .lbl { color: var(--ink-500); font-weight: 600; }
    .summary-row .val { font-weight: 700; color: var(--ink-900); }
    .summary-row.total { border-top: 1px solid rgba(22,163,74,.2); margin-top: 4px; padding-top: 10px; }
    .summary-row.total .val { font-size: 16px; color: var(--primary-dark); font-weight: 800; }
</style>

<!-- Page header -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1 page-title">Request Salary Advance</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral breadcrumb-text">
            <i class="bi bi-cash-coin fs-6"></i>
            <span>Loan & Advances</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Apply for Advance</span>
        </nav>
    </div>
    <a href="loan-requests.php" class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-1"></i> Back to Loan Requests
    </a>
</div>

<div class="loan-apply-form">


 <!-- Employee Eligibility -->
    <div class="form-section">
        <h6><i class="bi bi-person-check"></i> Employee Eligibility</h6>
        <div class="eligibility-grid">
            <div class="eligibility-card">
                <div class="val" id="netSalaryVal">₹75,000</div>
                <div class="lbl">Monthly Net Salary</div>
            </div>
            <div class="eligibility-card">
                <div class="val text-success" id="maxAdvanceVal">₹37,500</div>
                <div class="lbl">Max Advance (50%)</div>
            </div>
            <div class="eligibility-card">
                <div class="val">₹0</div>
                <div class="lbl">Current Outstanding</div>
            </div>
        </div>
    </div>

    <!-- Employee Information -->
    <div class="form-section">
        <h6><i class="bi bi-person-badge"></i> Employee Information</h6>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label fw-bold" style="font-size:12.5px;">Employee Name / ID <span style="color:var(--accent-red);">*</span></label>
                <input type="text" class="form-control" placeholder="Employee Name / ID" >
                
            </div>
            <div class="col-md-6">
                <label class="form-label fw-bold" style="font-size:12.5px;">Department</label>
                <input type="text" class="form-control bg-light" id="departmentInput"  placeholder=" Department" >
            </div>
        </div>
    </div>

   

    <!-- Loan Details Form -->
    <div class="form-section">
        <h6><i class="bi bi-file-earmark-text"></i> Advance Details</h6>
        <form id="loanApplyForm">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold" style="font-size:12.5px;">Scheme Name <span style="color:var(--accent-red);">*</span></label>
                    <select class="form-select select2" id="advanceType" required>
                        <option value="">Select Type</option>
                        <option value="salary-advance">Salary Advance</option>
                        <option value="personal-loan">Personal Loan</option>
                        <option value="medical">Medical Assistance</option>
                        <option value="education">Education Support</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold" style="font-size:12.5px;">Amount (₹) <span style="color:var(--accent-red);">*</span></label>
                    <input type="number" class="form-control" id="advanceAmount" placeholder="Enter amount" min="1000" max="37500" required>
                    <div class="quick-amt">
                        <button type="button" class="amt-btn" data-amt="10000">₹10K</button>
                        <button type="button" class="amt-btn" data-amt="20000">₹20K</button>
                        <button type="button" class="amt-btn" data-amt="30000">₹30K</button>
                        <button type="button" class="amt-btn" data-amt="37500">Max</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold" style="font-size:12.5px;">Repayment Tenure <span style="color:var(--accent-red);">*</span></label>
                    <select class="form-select" id="tenure" required>
                        <option value="">Select Tenure</option>
                        <option value="1">1 Month (Full deduction)</option>
                        <option value="2">2 Months</option>
                        <option value="3">3 Months</option>
                        <option value="6">6 Months</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold" style="font-size:12.5px;">Preferred Start Date</label>
                    <input type="date" class="form-control" id="startDate">
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold" style="font-size:12.5px;">Reason for Advance</label>
                    <textarea class="form-control" id="reason" rows="3" placeholder="Brief description of why you need this advance..."></textarea>
                </div>
            </div>
        </form>
    </div>

    <!-- Repayment Summary -->
    <div class="form-section">
        <h6><i class="bi bi-calculator"></i> Repayment Summary</h6>
        <div class="summary-box">
            <div class="summary-row">
                <span class="lbl">Advance Amount</span>
                <span class="val" id="summaryAmount">₹0</span>
            </div>
            <div class="summary-row">
                <span class="lbl">Interest Rate</span>
                <span class="val text-success">0% (Interest Free)</span>
            </div>
            <div class="summary-row">
                <span class="lbl">Repayment Tenure</span>
                <span class="val" id="summaryTenure">—</span>
            </div>
            <div class="summary-row">
                <span class="lbl">Monthly EMI Deduction</span>
                <span class="val" id="summaryEmi">₹0</span>
            </div>
            <div class="summary-row total">
                <span class="lbl">Total Repayment</span>
                <span class="val" id="summaryTotal">₹0</span>
            </div>
        </div>
    </div>

    <div class="form-note mb-3">
        <i class="bi bi-info-circle"></i>
        <span>By submitting this request, you agree to the salary advance recovery being auto-deducted from your monthly payroll. The advance is subject to HR and Finance approval.</span>
    </div>

    <div class="d-flex gap-2">
        <a href="loan-requests.php" class="btn btn-reject flex-fill">Cancel</a>
        <button type="button" class="btn btn-primary flex-fill" id="submitLoanBtn">
            <i class="bi bi-send me-1"></i> Submit Request
        </button>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/pages/loan-apply.js?v=<?php echo time(); ?>"></script>
