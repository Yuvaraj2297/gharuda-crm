/**
 * Gharuda CRM - Staff Visiting Location Report Page Script
 * File: assets/js/pages/staff-visiting-location-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        var DEFAULT_FROM = '17-09-2026';
        var DEFAULT_TO = '17-10-2026';

        var tbody = document.getElementById('svrTbody');
        var table = document.getElementById('svrTable');

        // Keep a pristine copy of the static rows (taken before the datatable initialises)
        var allRows = Array.prototype.map.call(tbody.querySelectorAll('tr'), function(tr) {
            return {
                staff: tr.getAttribute('data-staff'),
                branch: tr.getAttribute('data-branch'),
                date: tr.getAttribute('data-date'), // yyyy-mm-dd
                html: tr.outerHTML
            };
        });

        // dd-mm-yyyy  ->  yyyy-mm-dd (or '' when invalid)
        function dmyToISO(str) {
            var m = /^(\d{2})-(\d{2})-(\d{4})$/.exec((str || '').trim());
            return m ? (m[3] + '-' + m[2] + '-' + m[1]) : '';
        }

        function isoToDMY(iso) {
            var p = iso.split('-');
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        function applyFilter() {
            var staff = document.getElementById('svrStaff').value;
            var branch = document.getElementById('svrBranch').value;
            var fromEl = document.getElementById('svrFrom');
            var toEl = document.getElementById('svrTo');
            var from = dmyToISO(fromEl.value);
            var to = dmyToISO(toEl.value);

            // swap when From is after To
            if (from && to && from > to) {
                var t = from;
                from = to;
                to = t;
                fromEl.value = isoToDMY(from);
                toEl.value = isoToDMY(to);
            }

            var html = allRows.filter(function(r) {
                if (staff !== '0' && r.staff !== staff) return false;
                if (branch !== '' && r.branch !== branch) return false;
                if (from && r.date < from) return false;
                if (to && r.date > to) return false;
                return true;
            }).map(function(r) {
                return r.html;
            }).join('');

            tbody.innerHTML = html;
            if (table && table.autoTable) table.autoTable.refresh(); // re-run search / sort / pagination / S.No
        }

        document.getElementById('svrSearch').addEventListener('click', applyFilter);

        document.getElementById('svrReset').addEventListener('click', function() {
            document.getElementById('svrStaff').value = '0';
            document.getElementById('svrBranch').value = '';
            if (window.jQuery) window.jQuery('#svrStaff, #svrBranch').trigger('change'); // refresh select2
            document.getElementById('svrFrom').value = DEFAULT_FROM;
            document.getElementById('svrTo').value = DEFAULT_TO;
            applyFilter();
        });
    })();
