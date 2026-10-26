/**
 * Gharuda CRM - Loan Report Page Script
 * File: assets/js/pages/loan-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
window.attendanceRowMatches = function(row) {
    if (!row || !row.dataset) return true;

    const rowStatus = row.getAttribute('data-status') || '';
    const rowCategory = row.getAttribute('data-category') || '';
    const rowDept = row.getAttribute('data-dept') || '';
    const rowProgress = parseFloat(row.getAttribute('data-progress')) || 0;
    const rowBalance = parseFloat(row.getAttribute('data-balance')) || 0;
    const rowTenure = row.getAttribute('data-tenure') || '';

    // Parse total tenure EMIs
    let totalEmis = 12;
    if (rowTenure.includes('/')) {
        totalEmis = parseInt(rowTenure.split('/')[1], 10) || 12;
    }

    // 1. Status Filter (Tab or Dropdown)
    const filterPaymentStatus = document.getElementById('filterPaymentStatus');
    const selectedStatus = filterPaymentStatus ? filterPaymentStatus.value : 'all';
    if (selectedStatus !== 'all' && rowStatus !== selectedStatus) {
        return false;
    }

    // 2. Category Filter
    const filterLoanCategory = document.getElementById('filterLoanCategory');
    const selectedCat = filterLoanCategory ? filterLoanCategory.value : 'all';
    if (selectedCat !== 'all' && rowCategory !== selectedCat && !rowCategory.toLowerCase().includes(selectedCat.toLowerCase())) {
        return false;
    }

    // 3. Department Filter
    const filterDepartment = document.getElementById('filterDepartment');
    const selectedDept = filterDepartment ? filterDepartment.value : 'all';
    if (selectedDept !== 'all' && rowDept.toLowerCase() !== selectedDept.toLowerCase()) {
        return false;
    }

    // 3.5 Employee Filter
    const filterEmployee = document.getElementById('filterEmployee');
    const selectedEmp = filterEmployee ? filterEmployee.value : 'all';
    const rowEmp = row.getAttribute('data-emp') || '';
    if (selectedEmp !== 'all' && !rowEmp.toLowerCase().includes(selectedEmp.toLowerCase())) {
        return false;
    }

    // 4. Repayment Progress Filter
    const filterRepaymentProgress = document.getElementById('filterRepaymentProgress');
    const selectedProg = filterRepaymentProgress ? filterRepaymentProgress.value : 'all';
    if (selectedProg === 'low' && rowProgress >= 30) return false;
    if (selectedProg === 'mid' && (rowProgress < 30 || rowProgress > 70)) return false;
    if (selectedProg === 'high' && (rowProgress <= 70 || rowProgress >= 100)) return false;
    if (selectedProg === 'full' && rowProgress < 100) return false;

    // 5. Active Preset Filter (if any)
    const activePresetBtn = document.querySelector('.preset-chip.active');
    if (activePresetBtn) {
        const preset = activePresetBtn.getAttribute('data-preset');
        if (preset === 'high-balance' && rowBalance < 100000) return false;
        if (preset === 'near-complete' && (rowProgress <= 70 || rowProgress >= 100)) return false;
        if (preset === 'salary-adv' && rowCategory !== 'Salary Advance') return false;
        if (preset === 'medical' && rowCategory !== 'Medical Assistance') return false;
        if (preset === 'eng-dept' && rowDept !== 'Engineering') return false;
        if (preset === 'long-tenure' && totalEmis <= 12) return false;
    }

    return true;
};

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {

    const pillTabAll = document.getElementById('pillTabAll');
    const pillTabPending = document.getElementById('pillTabPending');
    const pillTabCompleted = document.getElementById('pillTabCompleted');
    
    const filterPaymentStatus = document.getElementById('filterPaymentStatus');
    const filterLoanCategory = document.getElementById('filterLoanCategory');
    const filterRepaymentProgress = document.getElementById('filterRepaymentProgress');
    const filterDepartment = document.getElementById('filterDepartment');
    const filterEmployee = document.getElementById('filterEmployee');
    const employeeSearch = document.getElementById('employeeSearch');
    const btnResetLoanFilters = document.getElementById('btnResetLoanFilters');
    const activeFilterBadge = document.getElementById('activeFilterBadge');
    const activeTagsContainer = document.getElementById('activeTagsContainer');
    const activeTagsList = document.getElementById('activeTagsList');
    const btnClearAllTags = document.getElementById('btnClearAllTags');

    let currentStatusFilter = 'all';

    function updateActiveFilterTags() {
        if (!activeTagsContainer || !activeTagsList) return;

        activeTagsList.innerHTML = '';
        let tags = [];

        // Status tag
        if (filterPaymentStatus && filterPaymentStatus.value !== 'all') {
            tags.push({
                type: 'status',
                label: `Status: ${filterPaymentStatus.value === 'Pending' ? 'Pending Repayments' : 'Fully Settled'}`,
                clear: () => {
                    filterPaymentStatus.value = 'all';
                    document.querySelectorAll('.filter-pill-btn').forEach(btn => btn.classList.remove('active'));
                    if (pillTabAll) pillTabAll.classList.add('active');
                }
            });
        }

        // Category tag
        if (filterLoanCategory && filterLoanCategory.value !== 'all') {
            tags.push({
                type: 'category',
                label: `Category: ${filterLoanCategory.value}`,
                clear: () => { filterLoanCategory.value = 'all'; }
            });
        }

        // Progress tag
        if (filterRepaymentProgress && filterRepaymentProgress.value !== 'all') {
            tags.push({
                type: 'progress',
                label: `Progress: ${filterRepaymentProgress.options[filterRepaymentProgress.selectedIndex].text.split('(')[0].trim()}`,
                clear: () => { filterRepaymentProgress.value = 'all'; }
            });
        }

        // Department tag
        if (filterDepartment && filterDepartment.value !== 'all') {
            tags.push({
                type: 'dept',
                label: `Dept: ${filterDepartment.value}`,
                clear: () => { filterDepartment.value = 'all'; }
            });
        }

        // Employee tag
        if (filterEmployee && filterEmployee.value !== 'all') {
            tags.push({
                type: 'emp',
                label: `Employee: ${filterEmployee.value}`,
                clear: () => { filterEmployee.value = 'all'; }
            });
        }

        // Preset tag
        const activePreset = document.querySelector('.preset-chip.active');
        if (activePreset) {
            tags.push({
                type: 'preset',
                label: `Preset: ${activePreset.textContent.trim()}`,
                clear: () => { activePreset.classList.remove('active'); }
            });
        }

        // Render tags
        if (tags.length > 0) {
            activeTagsContainer.style.display = 'flex';
            tags.forEach(tag => {
                const span = document.createElement('span');
                span.className = 'active-filter-tag';
                span.innerHTML = `
                    <span>${tag.label}</span>
                    <button type="button" class="btn-remove-tag" title="Remove filter">&times;</button>
                `;
                span.querySelector('.btn-remove-tag').addEventListener('click', function() {
                    tag.clear();
                    triggerTableFilter();
                });
                activeTagsList.appendChild(span);
            });
        } else {
            activeTagsContainer.style.display = 'none';
        }

        // Update select highlights
        [filterPaymentStatus, filterLoanCategory, filterRepaymentProgress, filterDepartment, filterEmployee].forEach(sel => {
            if (sel) {
                if (sel.value !== 'all') sel.classList.add('has-value');
                else sel.classList.remove('has-value');
            }
        });
    }

    function triggerTableFilter() {
        if (employeeSearch) {
            employeeSearch.dispatchEvent(new Event('input'));
        }

        updateActiveFilterTags();

        // Update badge text
        let filterDesc = [];
        if (filterPaymentStatus && filterPaymentStatus.value === 'Pending') filterDesc.push('Pending Repayments');
        else if (filterPaymentStatus && filterPaymentStatus.value === 'Completed') filterDesc.push('Fully Settled');

        if (filterLoanCategory && filterLoanCategory.value !== 'all') filterDesc.push(filterLoanCategory.value);
        if (filterDepartment && filterDepartment.value !== 'all') filterDesc.push(filterDepartment.value);
        if (filterEmployee && filterEmployee.value !== 'all') filterDesc.push(filterEmployee.value);
        if (filterRepaymentProgress && filterRepaymentProgress.value !== 'all') filterDesc.push(filterRepaymentProgress.options[filterRepaymentProgress.selectedIndex].text.split('(')[0].trim());

        const activePreset = document.querySelector('.preset-chip.active');
        if (activePreset) filterDesc.push(activePreset.textContent.trim());

        if (activeFilterBadge) {
            if (filterDesc.length > 0) {
                activeFilterBadge.innerHTML = `Filter Active: <strong>${filterDesc.join(' • ')}</strong>`;
                activeFilterBadge.className = 'badge bg-success-subtle text-success border border-success-subtle px-2 py-1';
            } else {
                activeFilterBadge.innerHTML = 'Showing: <strong>All Accounts</strong>';
                activeFilterBadge.className = 'badge bg-light text-dark border px-2 py-1';
            }
        }
    }

    // Pill Tab Click Handlers
    function setPillActive(tabElement, statusVal) {
        document.querySelectorAll('.filter-pill-btn').forEach(btn => btn.classList.remove('active'));
        tabElement.classList.add('active');
        currentStatusFilter = statusVal;
        if (filterPaymentStatus) filterPaymentStatus.value = statusVal;
        triggerTableFilter();
    }

    if (pillTabAll) pillTabAll.addEventListener('click', function() { setPillActive(this, 'all'); });
    if (pillTabPending) pillTabPending.addEventListener('click', function() { setPillActive(this, 'Pending'); });
    if (pillTabCompleted) pillTabCompleted.addEventListener('click', function() { setPillActive(this, 'Completed'); });

    // Dropdown Change Listeners
    if (filterPaymentStatus) {
        filterPaymentStatus.addEventListener('change', function() {
            currentStatusFilter = this.value;
            document.querySelectorAll('.filter-pill-btn').forEach(btn => btn.classList.remove('active'));
            if (this.value === 'Pending' && pillTabPending) pillTabPending.classList.add('active');
            else if (this.value === 'Completed' && pillTabCompleted) pillTabCompleted.classList.add('active');
            else if (pillTabAll) pillTabAll.classList.add('active');
            triggerTableFilter();
        });
    }

    if (filterLoanCategory) filterLoanCategory.addEventListener('change', triggerTableFilter);
    if (filterRepaymentProgress) filterRepaymentProgress.addEventListener('change', triggerTableFilter);
    if (filterDepartment) filterDepartment.addEventListener('change', triggerTableFilter);
    if (filterEmployee) filterEmployee.addEventListener('change', triggerTableFilter);

    // Preset Chips Handlers
    document.querySelectorAll('.preset-chip').forEach(chip => {
        chip.addEventListener('click', function() {
            const wasActive = this.classList.contains('active');
            document.querySelectorAll('.preset-chip').forEach(c => c.classList.remove('active'));
            if (!wasActive) {
                this.classList.add('active');
            }
            triggerTableFilter();
        });
    });

    // Reset All Filters
    function resetAllFilters() {
        currentStatusFilter = 'all';
        if (filterPaymentStatus) filterPaymentStatus.value = 'all';
        if (filterLoanCategory) filterLoanCategory.value = 'all';
        if (filterRepaymentProgress) filterRepaymentProgress.value = 'all';
        if (filterDepartment) filterDepartment.value = 'all';
        if (filterEmployee) filterEmployee.value = 'all';
        if (employeeSearch) employeeSearch.value = '';
        document.querySelectorAll('.preset-chip').forEach(c => c.classList.remove('active'));
        document.querySelectorAll('.filter-pill-btn').forEach(btn => btn.classList.remove('active'));
        if (pillTabAll) pillTabAll.classList.add('active');
        triggerTableFilter();
    }

    if (btnResetLoanFilters) btnResetLoanFilters.addEventListener('click', resetAllFilters);
    if (btnClearAllTags) btnClearAllTags.addEventListener('click', resetAllFilters);

    // Initial Filter trigger
    triggerTableFilter();

    // Statement Breakdown Modal Handler
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-statement');
        if (!btn) return;
        const row = btn.closest('tr');
        if (!row) return;

        const ref = row.getAttribute('data-ref') || 'LN-2026';
        const emp = row.getAttribute('data-emp') || 'Employee';
        const empId = row.getAttribute('data-empid') || 'EMP';
        const cat = row.getAttribute('data-category') || 'Loan';
        const disbursed = parseFloat(row.getAttribute('data-disbursed')) || 100000;
        const recovered = parseFloat(row.getAttribute('data-recovered')) || 0;
        const balance = parseFloat(row.getAttribute('data-balance')) || 0;
        const emi = parseFloat(row.getAttribute('data-emi')) || 10000;
        const tenureStr = row.getAttribute('data-tenure') || '4/12';
        const status = row.getAttribute('data-status') || 'Pending';

        const [clearedEmis, totalEmis] = tenureStr.split('/').map(v => parseInt(v, 10));

        document.getElementById('stmtEmpName').textContent = emp;
        document.getElementById('stmtEmpId').textContent = empId;
        document.getElementById('stmtLoanRef').textContent = ref;
        document.getElementById('stmtLoanCat').textContent = cat;
        document.getElementById('stmtDisbursed').textContent = `₹${disbursed.toLocaleString('en-IN')}`;
        document.getElementById('stmtRecovered').textContent = `Recovered: ₹${recovered.toLocaleString('en-IN')}`;
        document.getElementById('stmtBalance').textContent = `₹${balance.toLocaleString('en-IN')}`;
        document.getElementById('stmtTenureInfo').textContent = `${clearedEmis} of ${totalEmis} EMIs Processed`;

        const badgeContainer = document.getElementById('stmtStatusBadge');
        if (status === 'Completed') {
            badgeContainer.innerHTML = '<span class="ledger-badge completed mt-1"><i class="bi bi-check-circle-fill"></i> Fully Settled</span>';
        } else {
            badgeContainer.innerHTML = '<span class="ledger-badge pending mt-1"><i class="bi bi-hourglass-split"></i> Pending Repayment</span>';
        }

        // Build Schedule Rows
        const tbody = document.getElementById('stmtScheduleBody');
        tbody.innerHTML = '';
        const months = ['Aug 2026', 'Jul 2026', 'Jun 2026', 'May 2026', 'Apr 2026', 'Mar 2026', 'Feb 2026', 'Jan 2026', 'Dec 2025', 'Nov 2025', 'Oct 2025', 'Sep 2025'];
        
        let runningBal = disbursed;
        for (let i = 1; i <= Math.min(totalEmis, 12); i++) {
            const isDeducted = i <= clearedEmis;
            const currentBal = isDeducted ? Math.max(0, runningBal - emi) : runningBal;
            if (isDeducted) runningBal = currentBal;

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="fw-semibold">EMI #${i}</td>
                <td>${months[i - 1] || 'Upcoming'}</td>
                <td class="fw-semibold text-dark">₹${emi.toLocaleString('en-IN')}</td>
                <td>₹${emi.toLocaleString('en-IN')}</td>
                <td class="fw-bold ${currentBal === 0 ? 'text-success' : 'text-dark'}">₹${Math.round(currentBal).toLocaleString('en-IN')}</td>
                <td class="text-end">
                    ${isDeducted 
                        ? '<span class="badge bg-success-subtle text-success border"><i class="bi bi-check-circle me-1"></i>Deducted in Payroll</span>' 
                        : '<span class="badge bg-warning-subtle text-warning-emphasis border"><i class="bi bi-clock me-1"></i>Scheduled Upcoming</span>'
                    }
                </td>
            `;
            tbody.appendChild(tr);
        }

        new bootstrap.Modal(document.getElementById('loanStatementModal')).show();
    });

    // Excel Export simulation
    const btnExportLedger = document.getElementById('btnExportLedger');
    if (btnExportLedger) {
        btnExportLedger.addEventListener('click', function() {
            alert('Exporting official Loan & Advance Recovery Ledger Report to Excel (.xlsx)...');
        });
    }
});
