/**
 * Gharuda CRM - Petty Cash Page Script
 * File: assets/js/pages/petty-cash.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function () {
    // Exact Petty Cash List data matching user uploaded image
    var pettyCashData = [
        { id: 1, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2025-10-31', amount: '2500.00', remarks: '', splitup: 'No' },
        { id: 2, fromStaff: 'thilak ma', toStaff: '-', date: '2025-11-12', amount: '5000.00', remarks: 'Petty cash', splitup: 'No' },
        { id: 3, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2025-11-15', amount: '2500.00', remarks: 'tra', splitup: 'No' },
        { id: 4, fromStaff: 'PREM KUMAR.R', toStaff: '-', date: '2025-11-17', amount: '2000.00', remarks: 'Petty', splitup: 'No' },
        { id: 5, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-01-06', amount: '16.00', remarks: 'xerox', splitup: 'No' },
        { id: 6, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-03-30', amount: '5000.00', remarks: 'Petty', splitup: 'No' },
        { id: 7, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-04-09', amount: '50000.00', remarks: 'pett6 cash', splitup: 'No' },
        { id: 8, fromStaff: 'KOWSHIK SOFTWARE', toStaff: '-', date: '2026-04-10', amount: '15000.00', remarks: 'petty cash', splitup: 'No' }
    ];

    function esc(s) {
        return String(s == null ? '' : s)
            .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
    }

    if (typeof MasterTable !== 'undefined') {
        MasterTable.init({
            tableId: 'pcTable',
            tbodyId: 'pcTbody',
            idPrefix: 'pc',
            data: pettyCashData,
            tableName: 'Petty_Cash_List',
            primaryKey: 'id',
            searchFields: ['fromStaff', 'toStaff', 'date', 'amount', 'remarks', 'splitup'],
            columns: [
                {
                    field: 'fromStaff',
                    title: 'From Staff',
                    sortable: true,
                    render: function(v) {
                        return '<span class="fw-semibold text-dark">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'toStaff',
                    title: 'To Staff',
                    sortable: true,
                    render: function(v) {
                        return '<span class="text-muted">' + esc(v) + '</span>';
                    }
                },
                {
                    field: 'date',
                    title: 'Date',
                    sortable: true,
                    render: function(v) {
                        return '<div class="text-center"><span class="text-secondary font-monospace" style="font-size:13px;">' + esc(v) + '</span></div>';
                    }
                },
                {
                    field: 'amount',
                    title: 'Amount',
                    sortable: true,
                    render: function(v) {
                        return '<div class="text-end"><span class="fw-bold text-dark font-monospace" style="font-size:13.5px;">₹ ' + esc(v) + '</span></div>';
                    }
                },
                {
                    field: 'remarks',
                    title: 'Remarks',
                    sortable: true,
                    render: function(v) {
                        return v ? '<span class="text-dark">' + esc(v) + '</span>' : '<span class="text-muted">—</span>';
                    }
                },
                {
                    field: 'splitup',
                    title: 'Splitup',
                    sortable: true,
                    render: function(v) {
                        return '<div class="text-center"><span class="pc-split-pill">' + esc(v) + '</span></div>';
                    }
                }
            ]
        });
    }
});
