/**
 * Gharuda CRM - Staff Visting Report Page Script
 * File: assets/js/pages/staff-visting-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        var DEFAULT_FROM = '2026-10-03';
        var DEFAULT_TO = '2026-10-17';

        var tbody = document.getElementById('staffVisitTbody');
        var table = document.getElementById('staffVisitTable');

        // Keep a pristine copy of the static rows (taken before the datatable initialises)
        var allRows = Array.prototype.map.call(tbody.querySelectorAll('tr'), function(tr) {
            return {
                staff: tr.getAttribute('data-staff'),
                date: tr.getAttribute('data-date'),
                html: tr.outerHTML
            };
        });

        function applyFilter() {
            var staffId = document.getElementById('filter_staff').value;
            var from = document.getElementById('filter_from').value;
            var to = document.getElementById('filter_to').value;
            var err = document.getElementById('dateError');

            if (from && to && from > to) {
                err.classList.remove('d-none');
                return;
            }
            err.classList.add('d-none');

            var html = allRows.filter(function(r) {
                if (staffId !== 'all' && r.staff !== staffId) return false;
                if (from && r.date < from) return false;
                if (to && r.date > to) return false;
                return true;
            }).map(function(r) {
                return r.html;
            }).join('');

            tbody.innerHTML = html;
            if (table && table.autoTable) table.autoTable.refresh(); // re-run search / sort / pagination / S.No
        }

        document.getElementById('btnSearch').addEventListener('click', applyFilter);

        document.getElementById('btnReset').addEventListener('click', function() {
            document.getElementById('filter_staff').value = 'all';
            if (window.jQuery) window.jQuery('#filter_staff').trigger('change'); // refresh select2
            document.getElementById('filter_from').value = DEFAULT_FROM;
            document.getElementById('filter_to').value = DEFAULT_TO;
            applyFilter();
        });
    })();
