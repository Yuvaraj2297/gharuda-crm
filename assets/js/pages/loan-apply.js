/**
 * Gharuda CRM - Loan Apply Page Script
 * File: assets/js/pages/loan-apply.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
function autoFillLoanDept(selectEl) {
    const selectedOpt = selectEl.options[selectEl.selectedIndex];
    const dept = selectedOpt.getAttribute('data-dept') || '';
    const salary = parseFloat(selectedOpt.getAttribute('data-salary')) || 0;
    
    document.getElementById('departmentInput').value = dept;
    if (salary > 0) {
        document.getElementById('netSalaryVal').textContent = '₹' + salary.toLocaleString('en-IN');
        document.getElementById('maxAdvanceVal').textContent = '₹' + Math.round(salary * 0.5).toLocaleString('en-IN');
        document.getElementById('advanceAmount').max = Math.round(salary * 0.5);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var amountInput = document.getElementById('advanceAmount');
    var tenureSelect = document.getElementById('tenure');
    var summaryAmount = document.getElementById('summaryAmount');
    var summaryTenure = document.getElementById('summaryTenure');
    var summaryEmi = document.getElementById('summaryEmi');
    var summaryTotal = document.getElementById('summaryTotal');

    function fmtINR(n) {
        return '₹' + Math.round(n).toLocaleString('en-IN');
    }

    function updateSummary() {
        var amt = parseFloat(amountInput.value) || 0;
        var tenure = parseInt(tenureSelect.value) || 0;
        var emi = tenure > 0 ? Math.round(amt / tenure) : 0;
        summaryAmount.textContent = fmtINR(amt);
        summaryTenure.textContent = tenure ? tenure + ' Month' + (tenure > 1 ? 's' : '') : '—';
        summaryEmi.textContent = fmtINR(emi);
        summaryTotal.textContent = fmtINR(amt);
    }

    amountInput.addEventListener('input', updateSummary);
    tenureSelect.addEventListener('change', updateSummary);

    // Quick amount buttons
    document.querySelectorAll('.amt-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            amountInput.value = this.dataset.amt;
            updateSummary();
        });
    });

    // Submit
    document.getElementById('submitLoanBtn').addEventListener('click', function() {
        var emp = document.getElementById('employeeSelect').value;
        var type = document.getElementById('advanceType').value;
        var amt = amountInput.value;
        var tenure = tenureSelect.value;
        if (!emp || !type || !amt || !tenure) {
            alert('Please fill in all required fields including Employee Name.');
            return;
        }
        alert('Salary advance request of ' + fmtINR(amt) + ' submitted successfully! It will be reviewed by HR/Finance.');
        window.location.href = 'loan-requests.php';
    });
});
