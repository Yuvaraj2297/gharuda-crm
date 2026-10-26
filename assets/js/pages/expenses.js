/**
 * Gharuda CRM - Expenses Page Script
 * File: assets/js/pages/expenses.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function () {
        if (window.jQuery && jQuery.fn.select2) {
            jQuery('.select2').select2({
                width: '100%'
            });
        }

        /* Sample Expense Records matching user attached image */
        var expensesData = [
            { id: 1, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 20,000.00', name: 'stationery', receipt: '', date: '09-04-2028', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 2, category: 'Food & Accomodation', subCategory: '', amount: '₹ 2,000.00', name: 'Food Expense', receipt: '', date: '01-08-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: '', vendor: '', billed: false },
            { id: 3, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 5,000.00', name: 'Salarey', receipt: '', date: '02-05-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 4, category: 'test', subCategory: '', amount: '₹ 10,000.00', name: 'MONITOR', receipt: '', date: '10-09-2026', project: 'bel', attachment: '', customer: 'KOKA', invoice: 'INV-256', reference: '4567890', paymentMode: 'Bank', vendor: '', billed: true },
            { id: 5, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 50,000.00', name: 'Salary', receipt: '', date: '05-05-2026', project: 'Solar Panel Installation', attachment: '', customer: 'Sundar Arumugam', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 6, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 50,000.00', name: 'freight charges', receipt: '', date: '30-09-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 7, category: 'Petrol', subCategory: '', amount: '₹ 50,000.00', name: 'Salary', receipt: '', date: '03-03-2028', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Bank', vendor: '', billed: false },
            { id: 8, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 15,000.00', name: 'Salary', receipt: '', date: '05-05-2026', project: 'Solar Panel Installation', attachment: '', customer: 'Sundar Arumugam', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 9, category: 'Petrol', subCategory: '', amount: '₹ 500.00', name: 'petrol', receipt: '', date: '04-03-2026', project: '', attachment: '', customer: 'Power Spares Engineering', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 10, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 50,000.00', name: 'Personal', receipt: '', date: '05-05-2026', project: 'Solar Panel Installation', attachment: '', customer: 'Sundar Arumugam', invoice: '', reference: '', paymentMode: 'Cash', vendor: '', billed: false },
            { id: 11, category: 'Fleet: Work Order', subCategory: '', amount: '₹ 5,000.00', name: 'Salary', receipt: '', date: '20-03-2026', project: '', attachment: '', customer: '', invoice: '', reference: '', paymentMode: 'Bank', vendor: '', billed: false }
        ];

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        window.expMasterTable = null;

        if (typeof MasterTable !== 'undefined') {
            window.expMasterTable = MasterTable.init({
                tableId: 'expTable',
                tbodyId: 'expTbody',
                idPrefix: 'exp',
                data: expensesData,
                tableName: 'Expenses_Report',
                primaryKey: 'id',
                searchFields: ['category', 'name', 'project', 'customer', 'invoice', 'reference', 'paymentMode'],
                columns: [
                    {
                        field: null,
                        title: '<input type="checkbox" id="expSelectAllCheckbox" class="form-check-input" onclick="toggleExpSelectAllRows(this)">',
                        sortable: false,
                        render: function(v, row) {
                            return '<input type="checkbox" class="form-check-input exp-row-checkbox" data-id="' + row.id + '">';
                        }
                    },
                    {
                        field: 'category',
                        title: 'CATEGORY',
                        sortable: true,
                        render: function(v, row) {
                            var billedHtml = row.billed ? '<div class="mt-1"><span class="st-pill exp-pill-billed">Billed</span></div>' : '';
                            return '<div><a href="#" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' + billedHtml + '</div>';
                        }
                    },
                    {
                        field: 'subCategory',
                        title: 'SUB CATEGORY',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'amount',
                        title: 'AMOUNT',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-bold text-dark" style="font-size:13.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'name',
                        title: 'NAME',
                        sortable: true,
                        render: function(v) {
                            return '<a href="#" class="fw-semibold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>';
                        }
                    },
                    {
                        field: 'receipt',
                        title: 'RECEIPT',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'date',
                        title: 'DATE',
                        sortable: true,
                        render: function(v) {
                            return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'project',
                        title: 'PROJECT',
                        sortable: true,
                        render: function(v) {
                            return v ? '<a href="#" class="fw-semibold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                        }
                    },
                    {
                        field: 'attachment',
                        title: 'ATTACHMENT',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'customer',
                        title: 'CUSTOMER',
                        sortable: true,
                        render: function(v) {
                            return v ? '<a href="#" class="fw-semibold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                        }
                    },
                    {
                        field: 'invoice',
                        title: 'INVOICE',
                        sortable: true,
                        render: function(v) {
                            return v ? '<a href="#" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' : '—';
                        }
                    },
                    {
                        field: 'reference',
                        title: 'REFERENCE #',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'paymentMode',
                        title: 'PAYMENT MODE',
                        sortable: true,
                        render: function(v) {
                            if (!v) return '—';
                            var cls = v === 'Cash' ? 'exp-pill-cash' : 'exp-pill-bank';
                            return '<span class="st-pill ' + cls + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'vendor',
                        title: 'VENDOR',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    }
                ]
            });
        }

        /* Category Filter listener */
        jQuery('#filterCategory').on('change', function() {
            var cat = jQuery(this).val();
            if (!window.expMasterTable) return;
            if (!cat) {
                window.expMasterTable.setData(expensesData);
            } else {
                var filtered = expensesData.filter(function(e) {
                    return e.category === cat;
                });
                window.expMasterTable.setData(filtered);
            }
        });

        /* Payment Mode Filter listener */
        jQuery('#filterPaymentMode').on('change', function() {
            var mode = jQuery(this).val();
            if (!window.expMasterTable) return;
            if (!mode) {
                window.expMasterTable.setData(expensesData);
            } else {
                var filtered = expensesData.filter(function(e) {
                    return e.paymentMode === mode;
                });
                window.expMasterTable.setData(filtered);
            }
        });
    });

    function toggleExpSelectAllRows(masterCheckbox) {
        var isChecked = masterCheckbox.checked;
        var checkboxes = document.querySelectorAll('.exp-row-checkbox');
        checkboxes.forEach(function(cb) {
            cb.checked = isChecked;
        });
    }

    function filterExpensesByMode(modeName) {
        if (!window.expMasterTable) return;
        if (!modeName) {
            window.expMasterTable.setData(expensesData);
            return;
        }
        var filtered = expensesData.filter(function(e) {
            return e.paymentMode === modeName;
        });
        window.expMasterTable.setData(filtered);
    }

    function filterExpensesByBilled() {
        if (!window.expMasterTable) return;
        var filtered = expensesData.filter(function(e) {
            return e.billed === true;
        });
        window.expMasterTable.setData(filtered);
    }
