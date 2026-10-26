/**
 * Gharuda CRM - Lead Filter Page Script
 * File: assets/js/pages/lead-filter.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
        'use strict';

        /* ---------------- Dummy data ---------------- */
        var leads = [
            { id: 172, name: 'f',      company: '',                  email: '',                               phone: '',           country: 'India', profession: 'Engineers', status: 'Lead',      source: 'Indiamart', created: '19-09-2026 14:51:59', lastContact: '19-09-2026 14:51:59', pub: 'No', assigned: 'GHRAUDA SOFTWARE', tags: '' },
            { id: 171, name: 'MOHAN',  company: 'GG COMPANY',        email: 'kaviyarasu@ghratechnology.com',  phone: '9677063368', country: 'India', profession: 'Builders',  status: 'New',       source: 'Google',    created: '16-09-2026 10:48:50', lastContact: '21-09-2026 11:51:38', pub: 'No', assigned: 'GHRAUDA SOFTWARE', tags: '' },
            { id: 170, name: 'Sample Data', company: 'Sample Data',  email: 'sample.data@ghratechnology.com', phone: '9800112233', country: 'India', profession: 'Engineers', status: 'Quotation', source: 'Direct',    created: '12-09-2026 09:30:12', lastContact: '20-09-2026 16:05:50', pub: 'Yes', assigned: 'GHRAUDA SOFTWARE', tags: 'Hot' },
            { id: 169, name: 'test',   company: 'q Traders',         email: 'test.q@ghratechnology.com',      phone: '8015603089', country: 'India', profession: 'Builders',  status: 'Lead',      source: 'Indiamart', created: '02-09-2026 15:09:55', lastContact: '18-09-2026 12:00:00', pub: 'No', assigned: 'Harish D.', tags: '' },
            { id: 168, name: 'Vasanth', company: 'Tgk TEST',         email: 'vasanth@tgktest.com',            phone: '09003247271',country: 'India', profession: 'Builders',  status: 'Followup',  source: 'Website Form', created: '28-08-2026 11:20:40', lastContact: '15-09-2026 10:12:22', pub: 'No', assigned: 'Divya A.', tags: 'Warm' },
            { id: 167, name: 'QA TEST ENGINEER', company: 'TGK',     email: 'qa.engineer@tgk.com',            phone: '8015998877', country: 'USA',   profession: 'Engineers', status: 'New',       source: 'Referral',  created: '20-08-2026 14:05:10', lastContact: '10-09-2026 09:45:30', pub: 'No', assigned: 'GHRAUDA SOFTWARE', tags: '' },
            { id: 166, name: 'Suresh', company: 'ghrA SOFTWARE TECHNOLOGY', email: 'suresh@ghratechnology.com', phone: '9876543218', country: 'India', profession: 'Builders', status: 'Lead', source: 'Google',    created: '15-08-2026 12:54:36', lastContact: '12-09-2026 14:42:55', pub: 'No', assigned: 'Priya S.', tags: 'Hot' },
            { id: 118, name: 'Priya Sundar', company: 'Sundar Enterprises', email: 'priya@sundarenterprises.com', phone: '9840011223', country: 'UK', profession: 'Engineers', status: 'Quotation', source: 'Direct', created: '01-08-2026 10:36:21', lastContact: '05-09-2026 10:37:58', pub: 'Yes', assigned: 'Divya A.', tags: 'Warm' }
        ];

        var leadFilterTable = null;

        function initLeadFilterTable() {
            if (typeof MasterTable === 'undefined') return;
            leadFilterTable = MasterTable.init({
                tableId: 'leadFilterTable',
                tbodyId: 'leadFilterTbody',
                idPrefix: 'lfilter',
                data: leads,
                tableName: 'Lead Filter',
                primaryKey: 'id',
                searchFields: ['name', 'company', 'email', 'phone', 'country', 'profession', 'status', 'source', 'assigned', 'tags'],
                columns: [
                    { field: 'id', title: '#', sortable: true },
                    {
                        field: 'name', title: 'Name', sortable: true,
                        render: function (v) {
                            if (!v) return '<span style="color:#adb5bd;">—</span>';
                            return '<a href="#" class="lf-name-link">' + v + '</a>';
                        }
                    },
                    { field: 'company', title: 'Company', sortable: true, render: function (v) { return v || ''; } },
                    { field: 'email', title: 'Email', sortable: false, render: function (v) { return v || ''; } },
                    { field: 'phone', title: 'Phone', sortable: false, render: function (v) { return v || ''; } },
                    { field: 'country', title: 'Country', sortable: true },
                    { field: 'profession', title: 'Profession', sortable: true },
                    {
                        field: 'status', title: 'Status', sortable: true,
                        render: function (v) {
                            var cls = { 'Lead': 'lead', 'New': 'new', 'Quotation': 'quotation', 'Followup': 'followup' }[v] || 'lead';
                            return '<span class="lf-status-pill ' + cls + '">' + v + '</span>';
                        }
                    },
                    { field: 'source', title: 'Source', sortable: true },
                    { field: 'created', title: 'Created Date', sortable: true },
                    { field: 'lastContact', title: 'Last Contact', sortable: true },
                    { field: 'pub', title: 'Public', sortable: false },
                    {
                        field: 'assigned', title: 'Assigned', sortable: false,
                        render: function (v) {
                            var initials = v.split(' ').map(function (w) { return w[0]; }).join('').substring(0, 4).toUpperCase();
                            return '<span class="lf-avatar" data-bs-toggle="tooltip" data-bs-title="' + v + '">' + initials + '</span>';
                        }
                    },
                    {
                        field: 'tags', title: 'Tags', sortable: false,
                        render: function (v) {
                            return v ? '<span class="lf-tag">' + v + '</span>' : '';
                        }
                    }
                ]
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            initLeadFilterTable();

            /* Period note under toolbar (MasterTable injects toolbar into card) */
            function updatePeriodNote() {
                var card = document.querySelector('.lf-list-card');
                var note = document.getElementById('lfPeriodNote');
                if (!note && card) {
                    var resp = card.querySelector('.table-responsive');
                    note = document.createElement('div');
                    note.className = 'lf-period-note';
                    note.id = 'lfPeriodNote';
                    resp.parentNode.insertBefore(note, resp);
                }
                if (note) note.textContent = 'for Period 01-09-2026 To 30-09-2026 (' + (leadFilterTable ? leadFilterTable.getData().length : 0) + ' entries)';
            }
            setTimeout(updatePeriodNote, 100);

            /* Filter apply (demo — reads filters, refilters data) */
            var applyBtn = document.getElementById('lfApplyBtn');
            if (applyBtn) {
                applyBtn.addEventListener('click', function () {
                    applyBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Filtering...';
                    setTimeout(function () {
                        applyBtn.innerHTML = '<i class="bi bi-funnel me-1"></i>Filter';
                        var status = document.getElementById('lfStatus').value;
                        var source = document.getElementById('lfSource').value;
                        var country = document.getElementById('lfCountry').value;
                        var filtered = leads.filter(function (r) {
                            if (status !== 'All' && r.status !== status) return false;
                            if (source !== 'All' && r.source !== source) return false;
                            if (country !== 'All' && r.country !== country) return false;
                            return true;
                        });
                        leadFilterTable.setData(filtered);
                        updatePeriodNote();
                        alert('Filters applied — ' + filtered.length + ' lead(s) found.');
                    }, 500);
                });
            }

            /* New button (demo) */
            var newBtn = document.getElementById('lfNewBtn');
            if (newBtn) {
                newBtn.addEventListener('click', function () {
                    alert('New Lead — open new lead form (demo).');
                });
            }

            /* Save as Filter Template — radio click shows name input */
            var tplRadio = document.getElementById('lfTplRadio');
            var tplInput = document.getElementById('lfTplInput');
            var tplText = document.getElementById('lfTplText');
            if (tplRadio) {
                tplRadio.addEventListener('change', function () {
                    if (tplRadio.checked) {
                        tplText.style.display = 'none';
                        tplInput.style.display = '';
                        tplInput.focus();
                    }
                });
                tplInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        var name = tplInput.value.trim();
                        if (!name) return;
                        tplText.textContent = '✅ Filter template "' + name + '" saved.';
                        tplText.style.color = 'var(--primary-dark)';
                        tplText.style.display = '';
                        tplInput.style.display = 'none';
                        tplRadio.checked = false;
                        tplInput.value = '';
                    }
                });
            }
        });
    })();
