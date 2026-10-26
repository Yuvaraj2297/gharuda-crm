/**
 * Gharuda CRM - Loan Requests Page Script
 * File: assets/js/pages/loan-requests.js
 */

// Master Loan Dataset
const loansMasterData = {
    'LN-2026-001': {
        ref: 'LN-2026-001',
        empId: 'EMP0001',
        name: 'Amelia Curr',
        avatar: './assets/img/profile-1.jpg',
        dept: 'Design',
        salary: '₹75,000',
        purpose: 'Personal relocation & family support',
        category: 'Personal Loan',
        principal: 120000,
        tenure: 12,
        emi: 10000,
        repaid: 40000,
        balance: 80000,
        paidCount: 4,
        startDate: '15-Jan-2026',
        maturityDate: '31-Dec-2026',
        startMonth: 'Jan 2026',
        nextEmiDate: '31-May-2026',
        status: 'approved',
        statusText: 'Active',
        transactions: [
            { date: '15-Jan-2026', ref: 'TXN-DSB-101', type: 'Disbursement', amount: 120000, isCredit: true, balance: 120000, mode: 'Direct Bank Transfer', by: 'Accounts Team', status: 'Completed', filter: 'disburse' },
            { date: '31-Jan-2026', ref: 'PAY-JAN-2026', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 110000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '28-Feb-2026', ref: 'PAY-FEB-2026', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 100000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Mar-2026', ref: 'PAY-MAR-2026', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 90000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '30-Apr-2026', ref: 'PAY-APR-2026', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 80000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' }
        ]
    },
    'ADV-2026-088': {
        ref: 'ADV-2026-088',
        empId: 'EMP0002',
        name: 'Daniel Martinez',
        avatar: './assets/img/profile-2.jpg',
        dept: 'Engineering',
        salary: '₹95,000',
        purpose: 'Festival season advance',
        category: 'Salary Advance',
        principal: 30000,
        tenure: 1,
        emi: 30000,
        repaid: 0,
        balance: 30000,
        paidCount: 0,
        startDate: '28-Feb-2026',
        maturityDate: '31-Mar-2026',
        startMonth: 'Mar 2026',
        nextEmiDate: '31-Mar-2026',
        status: 'pending',
        statusText: 'Pending Approval',
        transactions: [
            { date: '28-Feb-2026', ref: 'REQ-ADV-088', type: 'Advance Request', amount: 30000, isCredit: true, balance: 30000, mode: 'Pending Disbursal', by: 'Employee Self-Service', status: 'Pending Review', filter: 'disburse' }
        ]
    },
    'LN-2026-004': {
        ref: 'LN-2026-004',
        empId: 'EMP0003',
        name: 'David Anderson',
        avatar: './assets/img/profile-3.jpg',
        dept: 'Engineering',
        salary: '₹1,20,000',
        purpose: 'Medical emergency hospitalization',
        category: 'Medical Assistance',
        principal: 200000,
        tenure: 24,
        emi: 8333,
        repaid: 100000,
        balance: 100000,
        paidCount: 12,
        startDate: '10-Nov-2025',
        maturityDate: '31-Oct-2027',
        startMonth: 'Nov 2025',
        nextEmiDate: '31-May-2026',
        status: 'approved',
        statusText: 'Active',
        transactions: [
            { date: '10-Nov-2025', ref: 'TXN-DSB-094', type: 'Disbursement', amount: 200000, isCredit: true, balance: 200000, mode: 'Direct NEFT Transfer', by: 'Accounts Team', status: 'Completed', filter: 'disburse' },
            { date: '30-Nov-2025', ref: 'PAY-NOV-2025', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 191667, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Dec-2025', ref: 'PAY-DEC-2025', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 183334, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Jan-2026', ref: 'PAY-JAN-2026', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 175001, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '28-Feb-2026', ref: 'PAY-FEB-2026', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 166668, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '15-Mar-2026', ref: 'MAN-PRP-401', type: 'Manual Prepayment', amount: 66668, isCredit: false, balance: 100000, mode: 'UPI Transfer', by: 'Finance Admin', status: 'Completed', filter: 'manual' }
        ]
    },
    'LN-2026-009': {
        ref: 'LN-2026-009',
        empId: 'EMP0004',
        name: 'Emily Clark',
        avatar: './assets/img/profile-4.jpg',
        dept: 'Finance',
        salary: '₹85,000',
        purpose: 'Higher education course certification',
        category: 'Education Support',
        principal: 80000,
        tenure: 8,
        emi: 10000,
        repaid: 80000,
        balance: 0,
        paidCount: 8,
        startDate: '05-Jun-2025',
        maturityDate: '31-Jan-2026',
        startMonth: 'Jun 2025',
        nextEmiDate: 'Completed',
        status: 'completed',
        statusText: 'Settled',
        transactions: [
            { date: '05-Jun-2025', ref: 'TXN-DSB-077', type: 'Disbursement', amount: 80000, isCredit: true, balance: 80000, mode: 'Direct Bank Transfer', by: 'Accounts Team', status: 'Completed', filter: 'disburse' },
            { date: '30-Jun-2025', ref: 'PAY-JUN-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 70000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Jul-2025', ref: 'PAY-JUL-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 60000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Aug-2025', ref: 'PAY-AUG-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 50000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '30-Sep-2025', ref: 'PAY-SEP-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 40000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Oct-2025', ref: 'PAY-OCT-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 30000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '30-Nov-2025', ref: 'PAY-NOV-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 20000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Dec-2025', ref: 'PAY-DEC-2025', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 10000, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Jan-2026', ref: 'PAY-JAN-2026', type: 'Payroll Auto-Debit', amount: 10000, isCredit: false, balance: 0, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' }
        ]
    },
    'ADV-2026-092': {
        ref: 'ADV-2026-092',
        empId: 'EMP0005',
        name: 'Sophia Johnson',
        avatar: './assets/img/profile-1.jpg',
        dept: 'Marketing',
        salary: '₹68,000',
        purpose: 'Short-term personal necessity',
        category: 'Salary Advance',
        principal: 20000,
        tenure: 2,
        emi: 10000,
        repaid: 0,
        balance: 20000,
        paidCount: 0,
        startDate: '01-Mar-2026',
        maturityDate: '30-Apr-2026',
        startMonth: 'Apr 2026',
        nextEmiDate: '30-Apr-2026',
        status: 'pending',
        statusText: 'Pending Approval',
        transactions: [
            { date: '01-Mar-2026', ref: 'REQ-ADV-092', type: 'Advance Request', amount: 20000, isCredit: true, balance: 20000, mode: 'Pending Disbursal', by: 'Employee Self-Service', status: 'Pending Review', filter: 'disburse' }
        ]
    },
    'LN-2026-012': {
        ref: 'LN-2026-012',
        empId: 'EMP0006',
        name: 'Michael Brown',
        avatar: './assets/img/profile-2.jpg',
        dept: 'Design',
        salary: '₹88,000',
        purpose: 'Personal home improvement',
        category: 'Personal Loan',
        principal: 150000,
        tenure: 18,
        emi: 8333,
        repaid: 50000,
        balance: 100000,
        paidCount: 6,
        startDate: '20-Oct-2025',
        maturityDate: '30-Apr-2027',
        startMonth: 'Nov 2025',
        nextEmiDate: '31-May-2026',
        status: 'approved',
        statusText: 'Active',
        transactions: [
            { date: '20-Oct-2025', ref: 'TXN-DSB-089', type: 'Disbursement', amount: 150000, isCredit: true, balance: 150000, mode: 'Direct Bank Transfer', by: 'Accounts Team', status: 'Completed', filter: 'disburse' },
            { date: '30-Nov-2025', ref: 'PAY-NOV-2025', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 141667, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Dec-2025', ref: 'PAY-DEC-2025', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 133334, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '31-Jan-2026', ref: 'PAY-JAN-2026', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 125001, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '28-Feb-2026', ref: 'PAY-FEB-2026', type: 'Payroll Auto-Debit', amount: 8333, isCredit: false, balance: 116668, mode: 'Salary Slip Deduction', by: 'Payroll Engine', status: 'Completed', filter: 'payroll' },
            { date: '10-Mar-2026', ref: 'MAN-PAY-112', type: 'Manual Partial Payment', amount: 16668, isCredit: false, balance: 100000, mode: 'Online UPI', by: 'Finance Admin', status: 'Completed', filter: 'manual' }
        ]
    }
};

var currentActiveRef = 'LN-2026-001';

// Helper to format currency
function fmtInr(num) {
    return '₹' + Number(Math.round(num)).toLocaleString('en-IN');
}

// Generate Dynamic Schedule Table for a Loan
function generateScheduleTable(loan, activeFilter) {
    activeFilter = activeFilter || 'all';
    var tbody = $('#scheduleTableBody');
    tbody.empty();

    var tenure = loan.tenure || 1;
    var emi = loan.emi;
    var principal = loan.principal;
    var paidCount = loan.paidCount || 0;
    var isPending = loan.status === 'pending';
    var isCompleted = loan.status === 'completed' || loan.balance <= 0;

    var startMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var parts = (loan.startMonth || 'Jan 2026').split(' ');
    var curMonthIdx = Math.max(0, startMonths.indexOf(parts[0]));
    var curYear = parseInt(parts[1]) || 2026;

    var runningBal = principal;
    var paidTally = 0;
    var upcomingTally = 0;
    var scheduledTally = 0;

    for (var i = 1; i <= tenure; i++) {
        var cycleStr = startMonths[curMonthIdx] + ' ' + curYear;
        var openBal = runningBal;
        var closeBal = Math.max(0, openBal - emi);
        runningBal = closeBal;

        var statusBadge = '';
        var rowClass = '';
        var statusCat = '';

        if (isPending) {
            statusBadge = '<span class="badge bg-warning text-dark">Pending Approval</span>';
            statusCat = 'scheduled';
            scheduledTally++;
        } else if (isCompleted || i <= paidCount) {
            statusBadge = '<span class="badge bg-success">Deducted</span>';
            statusCat = 'deducted';
            paidTally++;
        } else if (i === paidCount + 1 && !isCompleted) {
            statusBadge = '<span class="badge bg-warning text-dark">Upcoming</span>';
            rowClass = 'table-warning';
            statusCat = 'upcoming';
            upcomingTally++;
        } else {
            statusBadge = '<span class="badge bg-light text-dark border">Scheduled</span>';
            statusCat = 'scheduled';
            scheduledTally++;
        }

        if (activeFilter === 'all' || activeFilter === statusCat) {
            var rowHtml = '<tr class="' + rowClass + '">' +
                '<td class="fw-bold">' + i + '</td>' +
                '<td class="fw-semibold">' + cycleStr + '</td>' +
                '<td>' + fmtInr(openBal) + '</td>' +
                '<td class="text-primary fw-semibold">' + fmtInr(emi) + '</td>' +
                '<td>₹0</td>' +
                '<td class="fw-bold text-dark">' + fmtInr(emi) + '</td>' +
                '<td class="fw-bold">' + fmtInr(closeBal) + '</td>' +
                '<td>' + (i <= paidCount ? 'Payroll Salary Slip' : 'Auto-Debit Payroll') + '</td>' +
                '<td>' + statusBadge + '</td>' +
            '</tr>';
            tbody.append(rowHtml);
        }

        curMonthIdx++;
        if (curMonthIdx >= 12) {
            curMonthIdx = 0;
            curYear++;
        }
    }

    $('#countSchedAll').text(tenure);
    $('#countSchedPaid').text(paidTally);
    $('#countSchedUpcoming').text(upcomingTally);
    $('#countSchedScheduled').text(scheduledTally);
}

// Render Ledger History Table
function renderLedgerHistory(loan, filter) {
    filter = filter || 'all';
    var tbody = $('#ledgerHistoryBody');
    tbody.empty();

    var txns = loan.transactions || [];
    if (txns.length === 0) {
        tbody.append('<tr><td colspan="8" class="text-muted py-3">No ledger transactions found.</td></tr>');
        return;
    }

    txns.forEach(function(tx) {
        if (filter !== 'all' && tx.filter !== filter) return;

        var typeBadge = tx.isCredit 
            ? '<span class="badge bg-primary">' + tx.type + '</span>'
            : '<span class="badge bg-success">' + tx.type + '</span>';
        
        var amtDisplay = tx.isCredit 
            ? '<span class="text-dark fw-bold">+' + fmtInr(tx.amount) + '</span>'
            : '<span class="text-success fw-bold">-' + fmtInr(tx.amount) + '</span>';

        var row = '<tr>' +
            '<td>' + tx.date + '</td>' +
            '<td class="fw-bold">' + tx.ref + '</td>' +
            '<td>' + typeBadge + '</td>' +
            '<td>' + amtDisplay + '</td>' +
            '<td class="fw-bold">' + fmtInr(tx.balance) + '</td>' +
            '<td>' + tx.mode + '</td>' +
            '<td>' + tx.by + '</td>' +
            '<td><span class="badge bg-light text-dark border">' + tx.status + '</span></td>' +
        '</tr>';
        tbody.append(row);
    });
}

// Helper to switch tab inside Loan Details modal
function switchLoanModalTab(tabName) {
    var btnId = 'tab-overview-btn';
    if (tabName === 'schedule') {
        btnId = 'tab-schedule-btn';
    } else if (tabName === 'ledger' || tabName === 'record-pay') {
        btnId = 'tab-ledger-btn';
    } else if (tabName === 'foreclosure') {
        btnId = 'tab-foreclosure-btn';
    }

    var tabTriggerEl = document.getElementById(btnId);
    if (tabTriggerEl && typeof bootstrap !== 'undefined' && bootstrap.Tab) {
        var tabInstance = bootstrap.Tab.getInstance(tabTriggerEl) || new bootstrap.Tab(tabTriggerEl);
        tabInstance.show();
    } else if (typeof $ !== 'undefined') {
        $('#' + btnId).tab('show');
    }

    if (tabName === 'record-pay') {
        var ledgerEntryBtn = document.getElementById('ledger-entry-tab');
        if (ledgerEntryBtn && typeof bootstrap !== 'undefined' && bootstrap.Tab) {
            (bootstrap.Tab.getInstance(ledgerEntryBtn) || new bootstrap.Tab(ledgerEntryBtn)).show();
        } else if (typeof $ !== 'undefined') {
            $('#ledger-entry-tab').tab('show');
        }
    }
}

// Open Unified Loan Details & Action Hub Modal
function openLoanDetailsModal(ref, targetTab) {
    var loan = loansMasterData[ref];
    if (!loan) return;
    currentActiveRef = ref;

    // Header & Info
    $('#hubEmpAvatar').attr('src', loan.avatar || './assets/img/profile-1.jpg');
    $('#hubLoanRef').text(loan.ref);
    $('#hubEmpName').text(loan.name);
    $('#hubEmpCode').text(loan.empId);
    $('#hubEmpDept').text(loan.dept);
    $('#hubCategoryBadge').text(loan.category);
    $('#hubApplyDate').text(loan.startDate || 'Recent');
    $('#hubFooterRef').text(loan.ref);

    var statusClass = loan.status === 'approved' ? 'approved' : (loan.status === 'completed' ? 'completed' : (loan.status === 'rejected' ? 'rejected' : 'pending'));
    $('#hubStatusBadge').attr('class', 'loan-status ' + statusClass).html('<i class="bi bi-circle-fill"></i> ' + loan.statusText);

    // KPI stats
    $('#hubPrincipalDisplay').text(fmtInr(loan.principal));
    $('#hubTenureSub').text(loan.tenure + ' Months • Interest Free');
    $('#hubEmiDisplay').text(fmtInr(loan.emi) + '/mo');
    $('#hubRecoveredDisplay').text(fmtInr(loan.repaid));
    $('#hubBalanceDisplay').text(fmtInr(loan.balance));

    var remainCount = Math.max(0, loan.tenure - (loan.paidCount || 0));
    $('#hubPaidCountDisplay').text((loan.paidCount || 0) + ' of ' + loan.tenure + ' EMIs Cleared');
    $('#hubRemainCountDisplay').text(remainCount + ' EMIs Remaining');

    var pct = loan.principal > 0 ? ((loan.repaid / loan.principal) * 100).toFixed(1) : 0;
    if (pct > 100) pct = 100;
    $('#hubProgressPercent').text(pct + '% Paid');
    $('#hubProgressBar').css('width', pct + '%');

    // Tab 1 (Overview) Specs
    $('#dtLoanCat').text(loan.category);
    $('#dtLoanRef').text(loan.ref);
    $('#dtPrincipal').text(fmtInr(loan.principal));
    $('#dtTenure').text(loan.tenure + ' Months');
    $('#dtEmi').text(fmtInr(loan.emi) + ' / month');
    $('#dtDisburseDate').text(loan.startDate || 'N/A');
    $('#dtMaturityDate').text(loan.maturityDate || 'N/A');
    $('#dtEmpName').text(loan.name);
    $('#dtEmpCode').text(loan.empId);
    $('#dtEmpDept').text(loan.dept);
    $('#dtEmpSalary').text((loan.salary || '₹75,000') + ' / month');
    $('#dtPurpose').text(loan.purpose || 'Personal emergency support');

    // Tab 2 (Schedule)
    $('#schedFilterPills .btn-filter-pill').removeClass('active');
    $('#schedFilterPills .btn-filter-pill[data-filter="all"]').addClass('active');
    generateScheduleTable(loan, 'all');

    // Tab 3 (Ledger)
    $('#ledgerFilterPills .btn-filter-pill').removeClass('active');
    $('#ledgerFilterPills .btn-filter-pill[data-filter="all"]').addClass('active');
    renderLedgerHistory(loan, 'all');
    $('#ledgerProjectedBalance').val(fmtInr(loan.balance));
    $('#ledgerPayAmount').val('');
    $('#ledgerPayRef').val('');
    $('#ledgerPayRemarks').val('');

    // Tab 4 (Foreclosure)
    $('#foreclosureBalDisplay').text(fmtInr(loan.balance));
    $('#foreclosureTotalDisplay').text(fmtInr(loan.balance));

    // Switch to target tab
    switchLoanModalTab(targetTab || 'overview');

    // Show modal via Bootstrap 5 Modal
    var modalEl = document.getElementById('loanDetailsModal');
    if (modalEl) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            var modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.show();
        } else {
            $('#loanDetailsModal').modal('show');
        }
    }
}

// Sync Loan Changes to Table Row
function syncLoanToTableRow(loan) {
    var row = $('#row-' + loan.ref);
    if (!row.length) return;

    row.find('.text-repaid-display').text(fmtInr(loan.repaid));
    row.find('.text-balance-display').text(fmtInr(loan.balance));

    var pct = loan.principal > 0 ? ((loan.repaid / loan.principal) * 100).toFixed(1) : 0;
    if (pct > 100) pct = 100;
    row.find('.progress-fill').css('width', pct + '%');

    if (loan.balance <= 0) {
        loan.status = 'completed';
        loan.statusText = 'Settled';
        row.data('status', 'completed');
        row.find('.loan-status').attr('class', 'loan-status completed').html('<i class="bi bi-circle-fill"></i> Settled');
    }
}

$(document).ready(function() {
    // Initialize tooltips
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    // Toggle Filters Drawer
    $('#toggleLoanFiltersBtn').on('click', function() {
        $(this).toggleClass('open');
        $('#loanFiltersCollapse').toggleClass('open');
    });

    // Apply Filters Logic
    $('#applyLoanFilters').on('click', function() {
        var searchVal = $('#loanSearch').val().toLowerCase().trim();
        var catVal = $('#loanCategoryFilter').val();
        var deptVal = $('#loanDeptFilter').val();
        var statusVal = $('#loanStatusFilter').val();

        var activeChipsHtml = '';
        if (searchVal) activeChipsHtml += '<span class="filter-chip">Search: ' + searchVal + ' <button class="chip-close" data-field="search">×</button></span>';
        if (catVal) activeChipsHtml += '<span class="filter-chip">Category: ' + catVal + ' <button class="chip-close" data-field="category">×</button></span>';
        if (deptVal) activeChipsHtml += '<span class="filter-chip">Dept: ' + deptVal + ' <button class="chip-close" data-field="dept">×</button></span>';
        if (statusVal) activeChipsHtml += '<span class="filter-chip">Status: ' + statusVal + ' <button class="chip-close" data-field="status">×</button></span>';

        if (activeChipsHtml !== '') {
            $('#loanActiveFiltersList').html(activeChipsHtml);
            $('#loanActiveFiltersBar').addClass('show');
        } else {
            $('#loanActiveFiltersBar').removeClass('show');
        }

        $('.loan-row').each(function() {
            var row = $(this);
            var matchSearch = !searchVal || (row.data('search') && row.data('search').toLowerCase().indexOf(searchVal) > -1);
            var matchCat = !catVal || row.data('category') === catVal;
            var matchDept = !deptVal || row.data('dept') === deptVal;
            var matchStatus = !statusVal || row.data('status') === statusVal;

            if (matchSearch && matchCat && matchDept && matchStatus) {
                row.show();
            } else {
                row.hide();
            }
        });
    });

    // Clear filters
    $('#clearLoanFilters, #loanActiveFiltersClearAll').on('click', function() {
        $('#loanSearch').val('');
        $('#loanCategoryFilter').val('');
        $('#loanDeptFilter').val('');
        $('#loanStatusFilter').val('');
        $('#loanActiveFiltersBar').removeClass('show');
        $('.loan-row').show();
    });

    // Handle Individual Chip Close
    $(document).on('click', '.chip-close', function() {
        var field = $(this).data('field');
        if (field === 'search') $('#loanSearch').val('');
        if (field === 'category') $('#loanCategoryFilter').val('');
        if (field === 'dept') $('#loanDeptFilter').val('');
        if (field === 'status') $('#loanStatusFilter').val('');
        $('#applyLoanFilters').trigger('click');
    });

    // Open Loan Details Modal via Action Buttons & Dropdowns & Links
    $(document).on('click', '.open-details-action', function(e) {
        e.preventDefault();
        var ref = $(this).data('ref');
        var tab = $(this).data('tab') || 'overview';
        openLoanDetailsModal(ref, tab);
    });

    // Schedule Filter Pills
    $(document).on('click', '#schedFilterPills .btn-filter-pill', function() {
        $('#schedFilterPills .btn-filter-pill').removeClass('active');
        $(this).addClass('active');
        var filter = $(this).data('filter');
        var loan = loansMasterData[currentActiveRef];
        if (loan) generateScheduleTable(loan, filter);
    });

    // Ledger History Filter Pills
    $(document).on('click', '#ledgerFilterPills .btn-filter-pill', function() {
        $('#ledgerFilterPills .btn-filter-pill').removeClass('active');
        $(this).addClass('active');
        var filter = $(this).data('filter');
        var loan = loansMasterData[currentActiveRef];
        if (loan) renderLedgerHistory(loan, filter);
    });

    // Live Payment Amount Calculation
    $('#ledgerPayAmount').on('input', function() {
        var loan = loansMasterData[currentActiveRef];
        if (!loan) return;
        var amt = parseFloat($(this).val()) || 0;
        var newBal = Math.max(0, loan.balance - amt);
        $('#ledgerProjectedBalance').val(fmtInr(newBal));
    });

    // Quick Amount Buttons
    $('#btnQuickEmi').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (loan) {
            $('#ledgerPayAmount').val(loan.emi).trigger('input');
        }
    });

    $('#btnQuickHalf').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (loan) {
            $('#ledgerPayAmount').val(Math.round(loan.balance / 2)).trigger('input');
        }
    });

    $('#btnQuickFull').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (loan) {
            $('#ledgerPayAmount').val(loan.balance).trigger('input');
        }
    });

    // Post Manual Ledger Entry
    $('#btnPostLedger').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (!loan) return;

        var payDate = $('#ledgerPayDate').val() || 'new Date().toISOString().slice(0, 10)';
        var payAmount = parseFloat($('#ledgerPayAmount').val());
        var payType = $('#ledgerPayType').val();
        var payMode = $('#ledgerPayMode').val();
        var payRef = $('#ledgerPayRef').val() || ('MAN-REC-' + Math.floor(100000 + Math.random() * 900000));
        var payAdmin = $('#ledgerPayAdmin').val() || 'Finance Admin';
        var payRemarks = $('#ledgerPayRemarks').val();

        if (!payAmount || payAmount <= 0) {
            alert('Please enter a valid repayment amount.');
            return;
        }

        var newBalance = Math.max(0, loan.balance - payAmount);
        loan.repaid += payAmount;
        loan.balance = newBalance;
        if (loan.emi > 0) {
            loan.paidCount = Math.min(loan.tenure, Math.floor(loan.repaid / loan.emi));
        }

        var filterCat = payMode.indexOf('Payroll') > -1 ? 'payroll' : 'manual';
        var newTxn = {
            date: payDate,
            ref: payRef,
            type: payType,
            amount: payAmount,
            isCredit: false,
            balance: newBalance,
            mode: payMode,
            by: payAdmin,
            status: 'Completed',
            filter: filterCat
        };

        loan.transactions.unshift(newTxn);

        // Update modal metrics & history
        openLoanDetailsModal(currentActiveRef, 'ledger');
        syncLoanToTableRow(loan);

        alert('Payment of ' + fmtInr(payAmount) + ' recorded in loan ledger for ' + loan.ref + '! Balance is now ' + fmtInr(newBalance) + '.');
    });

    // Execute Full Foreclosure
    $('#btnExecuteForeclosure').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (!loan) return;

        if (loan.balance <= 0) {
            alert('This loan is already fully settled.');
            return;
        }

        if (confirm('Confirm full foreclosure & settlement of ' + fmtInr(loan.balance) + ' for loan ' + loan.ref + '?')) {
            var settleAmt = loan.balance;
            loan.repaid += settleAmt;
            loan.balance = 0;
            loan.paidCount = loan.tenure;
            loan.status = 'completed';
            loan.statusText = 'Settled';

            loan.transactions.unshift({
                date: new Date().toLocaleDateString('en-GB', {day:'2-digit', month:'short', year:'numeric'}).replace(/ /g, '-'),
                ref: 'FCL-STMT-' + Math.floor(100000 + Math.random() * 900000),
                type: 'Full Foreclosure Settlement',
                amount: settleAmt,
                isCredit: false,
                balance: 0,
                mode: 'Direct Bank Settlement',
                by: 'Finance Controller',
                status: 'Completed / NOC Issued',
                filter: 'manual'
            });

            openLoanDetailsModal(currentActiveRef, 'foreclosure');
            syncLoanToTableRow(loan);

            alert('Loan ' + loan.ref + ' has been fully settled and closed! Loan status updated to Settled.');
        }
    });

    // Export CSV Handlers
    $('#btnExportScheduleCSV').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (!loan) return;
        var csv = 'Inst #,Payroll Cycle,Opening Balance,Principal,Interest,EMI Amount,Closing Balance,Payment Mode,Status\n';
        var tenure = loan.tenure || 1;
        var emi = loan.emi;
        var principal = loan.principal;
        var runningBal = principal;
        var startMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var parts = (loan.startMonth || 'Jan 2026').split(' ');
        var curMonthIdx = Math.max(0, startMonths.indexOf(parts[0]));
        var curYear = parseInt(parts[1]) || 2026;

        for (var i = 1; i <= tenure; i++) {
            var cycleStr = startMonths[curMonthIdx] + ' ' + curYear;
            var openBal = runningBal;
            var closeBal = Math.max(0, openBal - emi);
            runningBal = closeBal;
            var st = i <= (loan.paidCount || 0) ? 'Deducted' : (i === (loan.paidCount || 0) + 1 ? 'Upcoming' : 'Scheduled');
            csv += [i, cycleStr, openBal, emi, 0, emi, closeBal, 'Payroll Salary Slip', st].join(',') + '\n';
            curMonthIdx++;
            if (curMonthIdx >= 12) { curMonthIdx = 0; curYear++; }
        }

        var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'Schedule_' + loan.ref + '.csv';
        link.click();
    });

    $('#btnExportLedgerCSV').on('click', function() {
        var loan = loansMasterData[currentActiveRef];
        if (!loan) return;
        var csv = 'Date,Txn Ref #,Type,Amount,Running Balance,Payment Mode,Processed By,Status\n';
        (loan.transactions || []).forEach(function(tx) {
            csv += [tx.date, tx.ref, '"' + tx.type + '"', tx.amount, tx.balance, '"' + tx.mode + '"', '"' + tx.by + '"', tx.status].join(',') + '\n';
        });
        var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'Ledger_Statement_' + loan.ref + '.csv';
        link.click();
    });

    // Approve / Reject actions
    $(document).on('click', '.approve-btn', function(e) {
        e.preventDefault();
        var ref = $(this).data('ref');
        if(confirm('Are you sure you want to approve request ' + ref + '?')) {
            var row = $('#row-' + ref);
            row.find('.loan-status').removeClass('pending').addClass('approved').html('<i class="bi bi-circle-fill"></i> Active');
            if (loansMasterData[ref]) {
                loansMasterData[ref].status = 'approved';
                loansMasterData[ref].statusText = 'Active';
            }
            row.find('.approve-btn, .reject-btn').remove();
            alert('Loan request ' + ref + ' approved successfully!');
        }
    });

    $(document).on('click', '.reject-btn', function(e) {
        e.preventDefault();
        var ref = $(this).data('ref');
        if(confirm('Are you sure you want to reject request ' + ref + '?')) {
            var row = $('#row-' + ref);
            row.find('.loan-status').removeClass('pending').addClass('rejected').html('<i class="bi bi-circle-fill"></i> Rejected');
            if (loansMasterData[ref]) {
                loansMasterData[ref].status = 'rejected';
                loansMasterData[ref].statusText = 'Rejected';
            }
            row.find('.approve-btn, .reject-btn').remove();
            alert('Loan request ' + ref + ' rejected.');
        }
    });

    $('#btnSubmitAdvance').on('click', function() {
        var emp = $('#advanceEmpSelect').val();
        var amt = $('#advanceAmountInput').val();
        if (!emp || !amt) {
            alert('Please select an employee and specify advance amount.');
            return;
        }
        alert('Salary advance request of ₹' + Number(amt).toLocaleString('en-IN') + ' for ' + emp + ' recorded and queued for upcoming payroll cycle!');
        
        var advModalEl = document.getElementById('advanceModal');
        if (advModalEl && typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            var advModal = bootstrap.Modal.getInstance(advModalEl) || new bootstrap.Modal(advModalEl);
            advModal.hide();
        } else {
            $('#advanceModal').modal('hide');
        }
    });
});
