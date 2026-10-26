/**
 * Gharuda CRM - Salary Structure Page Script
 * File: assets/js/pages/salary-structure.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function(){
    var addType = '';
    var baseCtcInput = document.getElementById('baseCtcInput');

    function fmtINR(n) {
        return '\u20B9' + Math.round(n).toLocaleString('en-IN');
    }

    function recalcAll() {
        var ctc = parseFloat(baseCtcInput.value) || 0;

        // Earnings
        var totalEarnings = 0;
        document.querySelectorAll('#earningsList .structure-item').forEach(function(item) {
            var pct = parseFloat(item.getAttribute('data-pct')) || 0;
            var fixedAmt = parseFloat(item.getAttribute('data-fixed'));
            var amount;
            if (!isNaN(fixedAmt)) {
                amount = fixedAmt;
            } else {
                amount = Math.round(ctc * pct / 100);
            }
            totalEarnings += amount;
            var amountEl = item.querySelector('.pct-amount');
            if (amountEl) amountEl.textContent = fmtINR(amount);
        });

        // Deductions
        var totalDeductions = 0;
        document.querySelectorAll('#deductionsList .structure-item').forEach(function(item) {
            var pct = parseFloat(item.getAttribute('data-pct')) || 0;
            var fixedAmt = parseFloat(item.getAttribute('data-fixed'));
            var amount;
            if (!isNaN(fixedAmt)) {
                amount = fixedAmt;
            } else {
                amount = Math.round(ctc * pct / 100);
            }
            totalDeductions += amount;
            var amountEl = item.querySelector('.pct-amount');
            if (amountEl) amountEl.textContent = fmtINR(amount);
        });

        var netSalary = totalEarnings - totalDeductions;

        document.getElementById('totalEarningsVal').textContent = fmtINR(totalEarnings);
        document.getElementById('totalDeductionsVal').textContent = fmtINR(totalDeductions);
        document.getElementById('netSalaryVal').textContent = fmtINR(netSalary);
    }

    baseCtcInput.addEventListener('input', recalcAll);

    // Add Earning
    document.getElementById('addEarningBtn').addEventListener('click', function(){
        addType = 'earning';
        document.getElementById('addComponentTitle').textContent = 'Add Earning Component';
        document.getElementById('compType').value = 'Earning';
        document.getElementById('compName').value = '';
        document.getElementById('compPct').value = '';
        document.getElementById('addComponentModal').classList.add('show');
    });

    // Add Deduction
    document.getElementById('addDeductionBtn').addEventListener('click', function(){
        addType = 'deduction';
        document.getElementById('addComponentTitle').textContent = 'Add Deduction Component';
        document.getElementById('compType').value = 'Deduction';
        document.getElementById('compName').value = '';
        document.getElementById('compPct').value = '';
        document.getElementById('addComponentModal').classList.add('show');
    });

    document.getElementById('addComponentClose').addEventListener('click', function(){ document.getElementById('addComponentModal').classList.remove('show'); });
    document.getElementById('cancelAddComp').addEventListener('click', function(){ document.getElementById('addComponentModal').classList.remove('show'); });
    document.getElementById('addComponentModal').addEventListener('click', function(e){ if(e.target===this) this.classList.remove('show'); });

    document.getElementById('saveAddComp').addEventListener('click', function(){
        var name = document.getElementById('compName').value.trim();
        var cat = document.getElementById('compCategory').value;
        var pct = document.getElementById('compPct').value;
        if(!name){ document.getElementById('compName').focus(); return; }
        var listId = addType === 'earning' ? 'earningsList' : 'deductionsList';
        var cls = addType === 'earning' ? 'earning' : 'deduction';
        var pctVal = parseFloat(pct) || 0;
        var ctc = parseFloat(baseCtcInput.value) || 0;
        var amount = Math.round(ctc * pctVal / 100);
        var item = document.createElement('div');
        item.className = 'structure-item';
        item.setAttribute('data-pct', pctVal);
        item.innerHTML = '<div class="name"><i class="bi bi-plus-circle"></i> '+name+'</div><div class="type '+cls+'">'+cat+'</div><div class="pct"><span class="pct-label">'+(pct?pct+'%':'—')+'</span><span class="pct-amount">'+fmtINR(amount)+'</span></div>';
        document.getElementById(listId).appendChild(item);
        document.getElementById('addComponentModal').classList.remove('show');
        if(addType==='earning') document.getElementById('earningsCount').textContent = document.querySelectorAll('#earningsList .structure-item').length;
        else document.getElementById('deductionsCount').textContent = document.querySelectorAll('#deductionsList .structure-item').length;
        recalcAll();
    });
})();
