<?php include 'header.php'; ?>

<style>
    .payroll-kpi { min-height:112px; padding:18px; border:1px solid var(--border-soft); border-radius:14px; background:var(--white); box-shadow:0 4px 16px rgba(20,30,25,.04); }
    .payroll-kpi .icon { width:42px; height:42px; border-radius:12px; display:grid; place-items:center; font-size:18px; }
    .payroll-kpi .label { color:var(--ink-500); font-size:12px; font-weight:700; margin-bottom:3px; }
    .payroll-kpi .value { color:var(--ink-900); font-size:20px; font-weight:800; }
    .payroll-kpi .sub { color:var(--ink-500); font-size:11px; margin-top:3px; }
    .structure-card { border:1px solid var(--border-soft); border-radius:14px; background:#fff; padding:20px; }
    .structure-card h6 { font-size:14px; font-weight:700; color:var(--ink-900); margin-bottom:14px; display:flex; align-items:center; gap:8px; }
    .structure-item { display:flex; align-items:center; justify-content:space-between; padding:10px 12px; border:1px solid var(--ink-100,#eef0f3); border-radius:10px; margin-bottom:8px; transition:all .15s ease; }
    .structure-item:hover { border-color:var(--primary); background:var(--primary-light,#e8f7ea); }
    .structure-item .name { font-size:13px; font-weight:600; color:var(--ink-900); display:flex; align-items:center; gap:8px; flex:1; min-width:0; }
    .structure-item .name i { color:var(--primary); font-size:14px; flex-shrink:0; }
    .structure-item .type { font-size:11px; font-weight:700; padding:3px 8px; border-radius:6px; min-width:72px; text-align:center; flex-shrink:0; margin-left:8px; }
    .structure-item .type.earning { color:#087a24; background:#e7f7eb; }
    .structure-item .type.deduction { color:#be3035; background:#fdebed; }
    .structure-item .pct { display:flex; flex-direction:column; align-items:flex-end; gap:1px; min-width:100px; flex-shrink:0; margin-left:8px; }
    .structure-item .pct .pct-label { font-size:13px; font-weight:700; color:var(--ink-700); }
    .structure-item .pct .pct-amount { font-size:11px; font-weight:600; color:var(--ink-500); }

    .base-ctc-wrap { display:flex; align-items:center; gap:14px; padding:14px 18px; background:linear-gradient(135deg,#f0fbf3,#e9f7ec); border:1px solid rgba(22,163,74,.2); border-radius:12px; margin-bottom:18px; flex-wrap:wrap; }
    .base-ctc-wrap label { font-size:13px; font-weight:700; color:var(--ink-900); white-space:nowrap; margin:0; }
    .base-ctc-wrap input { width:140px; font-size:15px; font-weight:800; color:var(--primary-dark); border:1px solid var(--border-soft); border-radius:8px; padding:6px 10px; text-align:right; outline:none; transition:border-color .2s; }
    .base-ctc-wrap input:focus { border-color:var(--primary); box-shadow:0 0 0 3px var(--primary-light); }
    .base-ctc-wrap .ctc-total { margin-left:auto; text-align:right; }
    .base-ctc-wrap .ctc-total .lbl { font-size:11px; font-weight:600; color:var(--ink-500); }
    .base-ctc-wrap .ctc-total .val { font-size:16px; font-weight:800; color:var(--primary-dark); }

    .payslip-modal { position:fixed; inset:0; z-index:1060; display:none; align-items:center; justify-content:center; background:rgba(0,0,0,.45); }
    .payslip-modal.show { display:flex; }
    .payslip-modal-dialog { background:#fff; border-radius:16px; max-width:460px; width:94%; max-height:90vh; overflow-y:auto; box-shadow:0 20px 60px rgba(0,0,0,.2); animation:modalIn .25s ease; }
    @keyframes modalIn { from{opacity:0;transform:scale(.95)} to{opacity:1;transform:scale(1)} }

    /* ===== Extracted inline styles ===== */
    /* .val already inherits var(--primary-dark) here, so only the red variant needs a rule */
    .base-ctc-wrap .ctc-total .val-red { color: var(--accent-red); }
    .sal-ic-primary { color: var(--primary); }
    .sal-ic-danger { color: var(--accent-red); }
    .sal-modal-title { font-size: 15px; }
    .sal-modal-close { font-size: 18px; color: var(--ink-500); }
    .sal-label { font-size: 12px; }
    .sal-req-star { color: var(--accent-red); }
</style>

<!-- Page header -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1 page-title">Salary Structure</h1>
    </div>
</div>

<!-- KPI cards -->
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon icon-chip"><i class="bi bi-plus-circle"></i></div>
            <div><div class="label">Earnings</div><div class="value" id="earningsCount">6</div><div class="sub">Active components</div></div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon icon-chip-red"><i class="bi bi-dash-circle"></i></div>
            <div><div class="label">Deductions</div><div class="value" id="deductionsCount">5</div><div class="sub">Active components</div></div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon icon-chip-blue"><i class="bi bi-percent"></i></div>
            <div><div class="label">Total Deduction %</div><div class="value" id="totalDeductionPct">14.1%</div><div class="sub">Of gross salary</div></div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="payroll-kpi d-flex align-items-center gap-3">
            <div class="icon icon-chip-amber"><i class="bi bi-shield-check"></i></div>
            <div><div class="label">Statutory</div><div class="value">4</div><div class="sub">PF, ESI, PT, TDS</div></div>
        </div>
    </div>
</div>

<!-- Base CTC -->
<div class="base-ctc-wrap">
    <label for="baseCtcInput"><i class="bi bi-cash-stack me-1"></i> Base CTC (Monthly)</label>
    <input type="number" id="baseCtcInput" value="50000" min="0" step="1000" aria-label="Base CTC amount">
    <div class="ctc-total">
        <div class="lbl">Total Earnings</div>
        <div class="val" id="totalEarningsVal">₹50,000</div>
    </div>
    <div class="ctc-total">
        <div class="lbl">Total Deductions</div>
        <div class="val val-red" id="totalDeductionsVal">₹7,050</div>
    </div>
    <div class="ctc-total">
        <div class="lbl">Net Salary</div>
        <div class="val" id="netSalaryVal">₹42,950</div>
    </div>
</div>

<div class="row g-3">
    <!-- Earnings -->
    <div class="col-lg-6">
        <div class="structure-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="mb-0"><i class="bi bi-plus-circle sal-ic-primary"></i> Earning Components</h6>
                <button class="btn btn-add-entry btn-sm" id="addEarningBtn"><i class="bi bi-plus-lg me-1"></i>Add</button>
            </div>
            <div id="earningsList">
                <div class="structure-item" data-pct="50"><div class="name"><i class="bi bi-cash"></i> Basic Salary</div><div class="type earning">Fixed</div><div class="pct"><span class="pct-label">50%</span><span class="pct-amount">₹25,000</span></div></div>
                <div class="structure-item" data-pct="20"><div class="name"><i class="bi bi-house"></i> House Rent Allowance</div><div class="type earning">Fixed</div><div class="pct"><span class="pct-label">20%</span><span class="pct-amount">₹10,000</span></div></div>
                <div class="structure-item" data-pct="10"><div class="name"><i class="bi bi-graph-up"></i> Dearness Allowance</div><div class="type earning">Fixed</div><div class="pct"><span class="pct-label">10%</span><span class="pct-amount">₹5,000</span></div></div>
                <div class="structure-item" data-pct="6.4"><div class="name"><i class="bi bi-car-front"></i> Conveyance Allowance</div><div class="type earning">Fixed</div><div class="pct"><span class="pct-label">6.4%</span><span class="pct-amount">₹3,200</span></div></div>
                <div class="structure-item" data-pct="4"><div class="name"><i class="bi bi-heart-pulse"></i> Medical Allowance</div><div class="type earning">Fixed</div><div class="pct"><span class="pct-label">4%</span><span class="pct-amount">₹2,000</span></div></div>
                <div class="structure-item" data-pct="9.6"><div class="name"><i class="bi bi-star"></i> Special Allowance</div><div class="type earning">Variable</div><div class="pct"><span class="pct-label">9.6%</span><span class="pct-amount">₹4,800</span></div></div>
            </div>
        </div>
    </div>
    <!-- Deductions -->
    <div class="col-lg-6">
        <div class="structure-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h6 class="mb-0"><i class="bi bi-dash-circle sal-ic-danger"></i> Deduction Components</h6>
                <button class="btn btn-add-entry btn-sm" id="addDeductionBtn"><i class="bi bi-plus-lg me-1"></i>Add</button>
            </div>
            <div id="deductionsList">
                <div class="structure-item" data-pct="6"><div class="name"><i class="bi bi-shield-lock"></i> Provident Fund (PF)</div><div class="type deduction">Statutory</div><div class="pct"><span class="pct-label">6%</span><span class="pct-amount">₹3,000</span></div></div>
                <div class="structure-item" data-pct="1"><div class="name"><i class="bi bi-hospital"></i> Employee State Insurance</div><div class="type deduction">Statutory</div><div class="pct"><span class="pct-label">1%</span><span class="pct-amount">₹500</span></div></div>
                <div class="structure-item" data-pct="0" data-fixed="200"><div class="name"><i class="bi bi-receipt"></i> Professional Tax</div><div class="type deduction">Statutory</div><div class="pct"><span class="pct-label">₹200</span><span class="pct-amount">Fixed</span></div></div>
                <div class="structure-item" data-pct="0" data-fixed="0"><div class="name"><i class="bi bi-bank"></i> Income Tax (TDS)</div><div class="type deduction">Statutory</div><div class="pct"><span class="pct-label">Slab</span><span class="pct-amount">₹0</span></div></div>
                <div class="structure-item" data-pct="0" data-fixed="0"><div class="name"><i class="bi bi-credit-card"></i> Loan Deduction</div><div class="type deduction">Voluntary</div><div class="pct"><span class="pct-label">Variable</span><span class="pct-amount">₹0</span></div></div>
            </div>
        </div>
    </div>
</div>

<!-- Add Component Modal -->
<div class="payslip-modal" id="addComponentModal">
    <div class="payslip-modal-dialog">
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <h6 class="fw-bold mb-0 sal-modal-title" id="addComponentTitle">Add Earning Component</h6>
            <button type="button" class="btn btn-sm sal-modal-close" id="addComponentClose">&times;</button>
        </div>
        <div class="p-3">
            <div class="mb-3">
                <label class="form-label fw-bold sal-label">Component Name <span class="sal-req-star">*</span></label>
                <input type="text" class="form-control" id="compName" placeholder="e.g. Travel Allowance">
            </div>
            <div class="row g-3 mb-3">
                <div class="col-6">
                    <label class="form-label fw-bold sal-label">Type</label>
                    <select class="form-select" id="compType"><option>Earning</option><option>Deduction</option></select>
                </div>
                <div class="col-6">
                    <label class="form-label fw-bold sal-label">Category</label>
                    <select class="form-select" id="compCategory"><option>Fixed</option><option>Variable</option><option>Statutory</option><option>Voluntary</option></select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold sal-label">Percentage (%)</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="compPct" placeholder="e.g. 5" min="0" max="100" step="0.1">
                    <span class="input-group-text">%</span>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-reject flex-fill" id="cancelAddComp">Cancel</button>
                <button class="btn btn-primary flex-fill" id="saveAddComp"><i class="bi bi-check-lg me-1"></i>Save Component</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
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
</script>
