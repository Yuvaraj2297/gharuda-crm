/**
 * Gharuda CRM - Petty Cash Report Page Script
 * File: assets/js/pages/petty-cash-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function () {
    // Initialize Select2 dropdown for Staff filter
    if (window.jQuery && jQuery.fn.select2) {
        jQuery('.select2').select2({
            width: '100%',
            placeholder: 'Nothing selected',
            allowClear: true
        });
    }

    // Comprehensive Petty Cash dataset with transactions, credits, debits & balance
    var rawPettyCashLogs = [
        { id: 1, date: '2025-10-31', staff: 'KOWSHIK SOFTWARE', description: 'Bank Top-up for Petty Cash', credit: 2500.00, debit: 0 },
        { id: 2, id_ref: 2, date: '2025-11-12', staff: 'thilak ma', description: 'Petty cash top-up from main ledger', credit: 5000.00, debit: 0 },
        { id: 3, date: '2025-11-13', staff: 'thilak ma', description: 'Tea & snacks for client meeting', credit: 0, debit: 450.00 },
        { id: 4, date: '2025-11-15', staff: 'KOWSHIK SOFTWARE', description: 'tra - Conveyance & courier', credit: 2500.00, debit: 0 },
        { id: 5, date: '2025-11-17', staff: 'PREM KUMAR.R', description: 'Petty disbursement for office items', credit: 2000.00, debit: 0 },
        { id: 6, date: '2025-12-04', staff: 'PREM KUMAR.R', description: 'Local speed post & parcel dispatch', credit: 0, debit: 320.00 },
        { id: 7, date: '2026-01-06', staff: 'KOWSHIK SOFTWARE', description: 'xerox and document printouts', credit: 16.00, debit: 0 },
        { id: 8, date: '2026-02-14', staff: 'Siddharth N', description: 'Office drinking water cans purchase', credit: 0, debit: 600.00 },
        { id: 9, date: '2026-03-30', staff: 'KOWSHIK SOFTWARE', description: 'Petty topup for end-of-month minor expenses', credit: 5000.00, debit: 0 },
        { id: 10, date: '2026-04-09', staff: 'KOWSHIK SOFTWARE', description: 'pett6 cash - Quarterly cash pool refill', credit: 50000.00, debit: 0 },
        { id: 11, date: '2026-04-10', staff: 'KOWSHIK SOFTWARE', description: 'petty cash - Advance payout to operational staff', credit: 15000.00, debit: 0 },
        { id: 12, date: '2026-10-03', staff: 'KOWSHIK SOFTWARE', description: 'Daily refreshment & stationery replenishment', credit: 1200.00, debit: 350.00 }
    ];

    function esc(s) {
        return String(s == null ? '' : s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    function formatINR(val) {
        var num = parseFloat(val) || 0;
        return num.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    var tableInstance = null;

    function processAndRenderReport(dataset) {
        var runningBalance = 0;
        var totalCredit = 0;
        var totalDebit = 0;

        var processed = dataset.map(function (item) {
            var cr = parseFloat(item.credit) || 0;
            var dr = parseFloat(item.debit) || 0;
            totalCredit += cr;
            totalDebit += dr;
            runningBalance += (cr - dr);

            return {
                id: item.id,
                date: item.date,
                staff: item.staff,
                description: item.description,
                credit: cr,
                debit: dr,
                balance: runningBalance
            };
        });

        // Update KPI Summary Badges
        document.getElementById('statTotalCredit').textContent = '₹ ' + formatINR(totalCredit);
        document.getElementById('statTotalDebit').textContent = '₹ ' + formatINR(totalDebit);
        var net = totalCredit - totalDebit;
        document.getElementById('statNetBalance').textContent = '₹ ' + formatINR(net);
        document.getElementById('statTotalCount').textContent = processed.length;

        if (tableInstance) {
            tableInstance.setData(processed);
        } else {
            tableInstance = MasterTable.init({
                tableId: 'pcrTable',
                tbodyId: 'pcrTbody',
                idPrefix: 'pcr',
                data: processed,
                tableName: 'Petty_Cash_Report',
                primaryKey: 'id',
                searchFields: ['date', 'description', 'staff', 'credit', 'debit', 'balance'],
                columns: [
                    {
                        field: 'date',
                        title: 'Date',
                        sortable: true,
                        render: function (v) {
                            return '<div class="text-center"><span class="text-secondary font-monospace" style="font-size:13px;">' + esc(v) + '</span></div>';
                        }
                    },
                    {
                        field: 'description',
                        title: 'Description',
                        sortable: true,
                        render: function (v, row) {
                            var staffBadge = row.staff ? '<span class="badge bg-light text-secondary border ms-2" style="font-size:11px; font-weight:500;">Staff: ' + esc(row.staff) + '</span>' : '';
                            return '<div><span class="fw-semibold text-dark">' + esc(v) + '</span>' + staffBadge + '</div>';
                        }
                    },
                    {
                        field: 'credit',
                        title: 'Credit',
                        sortable: true,
                        render: function (v) {
                            var num = parseFloat(v) || 0;
                            return num > 0
                                ? '<div class="text-end"><span class="amount-credit font-monospace" style="font-size:13.5px;">+ ₹ ' + formatINR(num) + '</span></div>'
                                : '<div class="text-end"><span class="text-muted">—</span></div>';
                        }
                    },
                    {
                        field: 'debit',
                        title: 'Debit',
                        sortable: true,
                        render: function (v) {
                            var num = parseFloat(v) || 0;
                            return num > 0
                                ? '<div class="text-end"><span class="amount-debit font-monospace" style="font-size:13.5px;">- ₹ ' + formatINR(num) + '</span></div>'
                                : '<div class="text-end"><span class="text-muted">—</span></div>';
                        }
                    },
                    {
                        field: 'balance',
                        title: 'Balance',
                        sortable: true,
                        render: function (v) {
                            return '<div class="text-end"><span class="amount-balance font-monospace" style="font-size:13.5px;">₹ ' + formatINR(v) + '</span></div>';
                        }
                    }
                ]
            });
        }
    }

    // Initial load
    processAndRenderReport(rawPettyCashLogs);

    // Search / Filter Button Click Handler
    document.getElementById('btnPcrSearch').addEventListener('click', function () {
        var selectedStaff = jQuery('#pcrStaff').val() || '';
        var fromDate = document.getElementById('pcrFromDate').value;
        var toDate = document.getElementById('pcrToDate').value;

        var filtered = rawPettyCashLogs.filter(function (item) {
            var matchStaff = true;
            if (selectedStaff && selectedStaff.trim() !== '') {
                matchStaff = (item.staff.toLowerCase().indexOf(selectedStaff.toLowerCase()) !== -1);
            }

            var matchFromDate = true;
            if (fromDate) {
                matchFromDate = (item.date >= fromDate);
            }

            var matchToDate = true;
            if (toDate) {
                matchToDate = (item.date <= toDate);
            }

            return matchStaff && matchFromDate && matchToDate;
        });

        processAndRenderReport(filtered);
    });
});
