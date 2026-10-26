/**
 * Gharuda CRM - Employee Revenue Report Page Script
 * File: assets/js/pages/employee-revenue-report.js
 * Handles: Employee card live search filter and CSV export
 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('revSearch');
        var clearBtn    = document.getElementById('revClear');
        var cards       = document.querySelectorAll('.rev-col');
        var noResults   = document.getElementById('revNoResults');

        function filterCards() {
            var query = (searchInput.value || '').toLowerCase().trim();
            var visibleCount = 0;

            cards.forEach(function (card) {
                var empId = (card.getAttribute('data-empid') || '').toLowerCase();
                var name  = (card.getAttribute('data-name') || '').toLowerCase();
                var text  = card.textContent.toLowerCase();

                if (!query || empId.indexOf(query) !== -1 || name.indexOf(query) !== -1 || text.indexOf(query) !== -1) {
                    card.classList.remove('d-none');
                    visibleCount++;
                } else {
                    card.classList.add('d-none');
                }
            });

            if (noResults) {
                noResults.classList.toggle('d-none', visibleCount > 0);
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', filterCards);
        }

        if (clearBtn) {
            clearBtn.addEventListener('click', function (e) {
                e.preventDefault();
                if (searchInput) {
                    searchInput.value = '';
                    filterCards();
                }
            });
        }
    });

    /**
     * Export revenue metrics to CSV file
     */
    function exportRevenueCSV() {
        var csv = "Employee ID,Employee Name,Success Leads,Sourcer,Total BV,Total CV,Total Visits,Total Kilometers\n";
        document.querySelectorAll('.rev-col').forEach(function (card) {
            var id   = card.getAttribute('data-empid') || '';
            var nameEl = card.querySelector('h6');
            var name = nameEl ? nameEl.textContent.trim() : '';
            var metrics = card.querySelectorAll('.rev-metric-val');
            var values  = Array.from(metrics).map(function (m) {
                return '"' + m.textContent.trim() + '"';
            });
            csv += '"' + id + '","' + name + '",' + values.join(',') + "\n";
        });

        var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
        var link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = 'employee_revenue_report_' + new Date().toISOString().slice(0, 10) + '.csv';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // Expose export function to global scope
    window.exportRevenueCSV = exportRevenueCSV;
})();
