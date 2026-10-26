/**
 * Gharuda CRM - Payroll Report Page Script
 * File: assets/js/pages/payroll-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function(){
    var contentArea = document.getElementById('payrollContentArea');
    var runTopBtn = document.getElementById('runPayrollTopBtn');
    var rpModal = document.getElementById('runPayrollModal');
    var progressModal = document.getElementById('payrollProgressModal');
    var processBtn = document.getElementById('rpProcessBtn');
    var viewResultBtn = document.getElementById('rpViewResultBtn');
    var progressBar = document.getElementById('rpProgressBar');
    var progressPct = document.getElementById('rpProgressPct');
    var progressTitle = document.getElementById('rpProgressTitle');
    var progressSub = document.getElementById('rpProgressSub');
    var spinner = document.getElementById('rpSpinner');
    var completeIcon = document.getElementById('rpCompleteIcon');
    var bsRpModal, bsProgressModal;

    // Bootstrap modals
    if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
        bsRpModal = bootstrap.Modal.getOrCreateInstance(rpModal);
        bsProgressModal = bootstrap.Modal.getOrCreateInstance(progressModal);
    }

    function showRpModal() {
        if (bsRpModal) bsRpModal.show();
    }

    var step1 = document.getElementById('rpStep1');
    var step2Bulk = document.getElementById('rpStep2Bulk');
    var step2Individual = document.getElementById('rpStep2Individual');
    var step2Department = document.getElementById('rpStep2Department');
    var backBtn = document.getElementById('rpBackBtn');
    var cancelBtn = document.getElementById('rpCancelBtn');
    var nextBtn = document.getElementById('rpNextBtn');
    var bulkCard = document.getElementById('rpBulkCard');
    var individualCard = document.getElementById('rpIndividualCard');
    var rpEmpSelect = document.getElementById('rpEmpSelect');
    var rpBulkPeriodSelect = document.getElementById('rpBulkPeriodSelect');
    var rpIndPeriodSelect = document.getElementById('rpIndPeriodSelect');
    var rpBulkPeriodSummary = document.getElementById('rpBulkPeriodSummary');
    var rpDeptCard = document.getElementById('rpDeptCard');
    var rpDeptSelect = document.getElementById('rpDeptSelect');
    var rpDeptPeriodSelect = document.getElementById('rpDeptPeriodSelect');
    var rpDeptSummaryName = document.getElementById('rpDeptSummaryName');
    var rpDeptSummaryCount = document.getElementById('rpDeptSummaryCount');
    var rpDeptSummaryGross = document.getElementById('rpDeptSummaryGross');
    var rpDeptSummaryDed = document.getElementById('rpDeptSummaryDed');
    // Per-department dummy numbers (demo) — count, gross (₹), deductions (₹)
    var RP_DEPT_STATS = {
        'Design':      { count: 42, gross: 5320000, ded: 731000 },
        'Engineering': { count: 58, gross: 7240000, ded: 998000 },
        'Finance':     { count: 24, gross: 3010000, ded: 415000 },
        'Marketing':   { count: 36, gross: 4520000, ded: 623000 },
        'HR':          { count: 26, gross: 3260000, ded: 449000 }
    };
    function rpFormatINR(n) {
        if (n >= 100000) return '₹' + (n / 100000).toFixed(2) + 'L';
        return '₹' + n.toLocaleString('en-IN');
    }
    function rpUpdateDeptSummary() {
        var dept = rpDeptSelect ? rpDeptSelect.value : '';
        var stats = RP_DEPT_STATS[dept];
        if (rpDeptSummaryName) rpDeptSummaryName.textContent = dept || '—';
        if (rpDeptSummaryCount) rpDeptSummaryCount.textContent = stats ? stats.count + ' employees' : '—';
        if (rpDeptSummaryGross) rpDeptSummaryGross.textContent = stats ? rpFormatINR(stats.gross) : '—';
        if (rpDeptSummaryDed) rpDeptSummaryDed.textContent = stats ? rpFormatINR(stats.ded) : '—';
    }
    var selectedType = '';

    function resetRpModal() {
        selectedType = '';
        step1.classList.add('active');
        step2Bulk.classList.remove('active');
        step2Individual.classList.remove('active');
        backBtn.classList.add('rp-hidden');
        nextBtn.classList.remove('rp-hidden');
        nextBtn.disabled = true;
        processBtn.classList.add('rp-hidden');
        cancelBtn.classList.remove('rp-hidden');
        bulkCard.classList.remove('selected');
        individualCard.classList.remove('selected');
        if (rpDeptCard) rpDeptCard.classList.remove('selected');
        if (rpEmpSelect) rpEmpSelect.value = '';
        if (rpEmpSelect && window.jQuery) jQuery(rpEmpSelect).val(null).trigger('change');
        if (rpBulkPeriodSelect) rpBulkPeriodSelect.value = '';
        if (rpBulkPeriodSelect && window.jQuery) jQuery(rpBulkPeriodSelect).val(null).trigger('change');
        if (rpIndPeriodSelect) rpIndPeriodSelect.value = '';
        if (rpIndPeriodSelect && window.jQuery) jQuery(rpIndPeriodSelect).val(null).trigger('change');
        if (rpDeptSelect) rpDeptSelect.value = '';
        if (rpDeptSelect && window.jQuery) jQuery(rpDeptSelect).val(null).trigger('change');
        if (rpDeptPeriodSelect) rpDeptPeriodSelect.value = '';
        if (rpDeptPeriodSelect && window.jQuery) jQuery(rpDeptPeriodSelect).val(null).trigger('change');
        if (rpBulkPeriodSummary) rpBulkPeriodSummary.textContent = '—';
        rpUpdateDeptSummary();
    }

    // Run Payroll top button click
    runTopBtn.addEventListener('click', function() {
        resetRpModal();
        showRpModal();
    });

    // Bulk card click
    bulkCard.addEventListener('click', function() {
        selectedType = 'bulk';
        bulkCard.classList.add('selected');
        individualCard.classList.remove('selected');
        if (rpDeptCard) rpDeptCard.classList.remove('selected');
        nextBtn.disabled = false;
    });

    // Individual card click
    individualCard.addEventListener('click', function() {
        selectedType = 'individual';
        individualCard.classList.add('selected');
        bulkCard.classList.remove('selected');
        if (rpDeptCard) rpDeptCard.classList.remove('selected');
        nextBtn.disabled = false;
    });

    // Department card click
    if (rpDeptCard) {
        rpDeptCard.addEventListener('click', function() {
            selectedType = 'department';
            rpDeptCard.classList.add('selected');
            bulkCard.classList.remove('selected');
            individualCard.classList.remove('selected');
            nextBtn.disabled = false;
        });
    }

    // Bulk period change -> update summary line
    if (rpBulkPeriodSelect) {
        rpBulkPeriodSelect.addEventListener('change', function() {
            if (rpBulkPeriodSummary) rpBulkPeriodSummary.textContent = this.value || '—';
        });
    }

    // Department select / period change -> update summary line
    if (rpDeptSelect) {
        rpDeptSelect.addEventListener('change', rpUpdateDeptSummary);
    }
    if (rpDeptPeriodSelect) {
        rpDeptPeriodSelect.addEventListener('change', function() {
            rpUpdateDeptSummary();
        });
    }

    // Next button click
    nextBtn.addEventListener('click', function() {
        if (selectedType === 'bulk') {
            step1.classList.remove('active');
            step2Bulk.classList.add('active');
        } else if (selectedType === 'department') {
            step1.classList.remove('active');
            step2Department.classList.add('active');
        } else if (selectedType === 'individual') {
            step1.classList.remove('active');
            step2Individual.classList.add('active');
        }
        backBtn.classList.remove('rp-hidden');
        nextBtn.classList.add('rp-hidden');
        processBtn.classList.remove('rp-hidden');
        cancelBtn.classList.add('rp-hidden');
    });

    // Back button click
    backBtn.addEventListener('click', function() {
        step2Bulk.classList.remove('active');
        step2Individual.classList.remove('active');
        if (step2Department) step2Department.classList.remove('active');
        step1.classList.add('active');
        backBtn.classList.add('rp-hidden');
        nextBtn.classList.remove('rp-hidden');
        nextBtn.disabled = false;
        processBtn.classList.add('rp-hidden');
        cancelBtn.classList.remove('rp-hidden');
    });

    // Process Payroll button click
    processBtn.addEventListener('click', function() {
        // Resolve the period select for the current type
        var periodSelect = selectedType === 'bulk' ? rpBulkPeriodSelect
            : (selectedType === 'department' ? rpDeptPeriodSelect : rpIndPeriodSelect);
        // Validate pay period selection
        if (!periodSelect || !periodSelect.value) {
            if (periodSelect && window.jQuery) jQuery(periodSelect).select2('open');
            else if (periodSelect) periodSelect.focus();
            return;
        }
        var payPeriod = periodSelect.value;
        // Validate department selection
        if (selectedType === 'department' && (!rpDeptSelect || !rpDeptSelect.value)) {
            if (window.jQuery) jQuery(rpDeptSelect).select2('open');
            else if (rpDeptSelect) rpDeptSelect.focus();
            return;
        }
        // Validate individual selection
        if (selectedType === 'individual' && (!rpEmpSelect || !rpEmpSelect.value)) {
            if (window.jQuery) jQuery(rpEmpSelect).select2('open');
            else rpEmpSelect.focus();
            return;
        }
        if (bsRpModal) bsRpModal.hide();
        var empLabel;
        if (selectedType === 'bulk') {
            empLabel = '186 employees';
        } else if (selectedType === 'department') {
            var stats = RP_DEPT_STATS[rpDeptSelect.value];
            empLabel = rpDeptSelect.value + ' department (' + (stats ? stats.count : 0) + ' employees)';
        } else {
            empLabel = rpEmpSelect.options[rpEmpSelect.selectedIndex].text;
        }
        // Reset progress
        progressBar.style.width = '0%';
        progressPct.textContent = '0%';
        progressTitle.textContent = 'Processing Payroll...';
        progressSub.textContent = 'Calculating salaries for ' + empLabel + ' — ' + payPeriod;
        spinner.classList.remove('rp-hidden');
        completeIcon.classList.add('rp-hidden');
        viewResultBtn.classList.add('rp-hidden');
        if (bsProgressModal) bsProgressModal.show();

        // Animate progress bar
        var pct = 0;
        var interval = setInterval(function() {
            pct += Math.random() * 15 + 5;
            if (pct >= 100) {
                pct = 100;
                clearInterval(interval);
                progressBar.style.width = '100%';
                progressPct.textContent = '100%';
                progressTitle.textContent = 'Payroll Processed!';
                progressSub.textContent = empLabel + ' processed successfully for ' + payPeriod;
                spinner.classList.add('rp-hidden');
                completeIcon.classList.remove('rp-hidden');
                viewResultBtn.classList.remove('rp-hidden');
                return;
            }
            progressBar.style.width = Math.round(pct) + '%';
            progressPct.textContent = Math.round(pct) + '%';
            if (pct > 40) progressSub.textContent = 'Validating deductions... (' + payPeriod + ')';
            if (pct > 70) progressSub.textContent = 'Finalizing payroll... (' + payPeriod + ')';
        }, 300);
    });

    // View Result button click
    viewResultBtn.addEventListener('click', function() {
        if (bsProgressModal) bsProgressModal.hide();
        // Show the payroll content
        contentArea.classList.remove('rp-hidden');
    });
});
