<?php include 'header.php'; ?>

<style>
    /* ===== Page ===== */
    .lf-page {
        padding: 18px 22px 28px;
        max-width: 1560px;
        margin: 0 auto;
    }

    .lf-title-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 2px 2px 16px;
    }

    .lf-title-row h5 {
        font-size: 17px;
        font-weight: 800;
        color: #111827;
        margin: 0;
        letter-spacing: -.01em;
    }

    /* ===== Filters card ===== */
    .lf-filters-card {
        background: #fff;
        border: 1px solid #eef0f2;
        border-radius: 14px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .05), 0 4px 14px rgba(17, 24, 39, .04);
        padding: 18px 20px 14px;
        margin-bottom: 18px;
    }

    .lf-filters-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding-bottom: 14px;
        margin-bottom: 16px;
        border-bottom: 1px solid #f1f3f5;
    }

    .lf-filters-head h6 {
        font-size: 14.5px;
        font-weight: 800;
        color: #111827;
        margin: 0;
    }

    .lf-filters-head .btn {
        font-size: 12.5px;
        font-weight: 800;
        border-radius: 9px;
        padding: 7px 18px;
    }

    .lf-filters-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 14px 16px;
    }

    .lf-field label {
        display: block;
        font-size: 12px;
        font-weight: 800;
        color: #374151;
        margin-bottom: 6px;
    }

    .lf-field .form-select,
    .lf-field .form-control {
        font-size: 12.5px;
        border-radius: 9px;
        border-color: #e5e7eb;
        color: #6b7280;
        font-weight: 600;
        padding: 7px 12px;
        width: 100%;
    }

    .lf-field .form-select:focus,
    .lf-field .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-soft);
        color: #111827;
    }

    /* template row */
    .lf-template-row {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8faf9;
        border: 1px dashed #e2e8e4;
        border-radius: 10px;
        padding: 10px 14px;
        margin-top: 16px;
    }

    .lf-template-row input[type="radio"] {
        width: 16px;
        height: 16px;
        accent-color: var(--primary);
        flex-shrink: 0;
        cursor: pointer;
    }

    .lf-template-row span {
        font-size: 12.5px;
        font-weight: 600;
        color: #9ca3af;
    }

    .lf-template-row input.lf-tpl-input {
        border: none;
        background: transparent;
        font-size: 12.5px;
        font-weight: 700;
        color: #111827;
        flex: 1;
        outline: none;
        padding: 2px 4px;
    }

    .lf-template-row input.lf-tpl-input::placeholder {
        color: #c3cbd3;
    }

    @media (max-width: 1200px) {
        .lf-filters-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 700px) {
        .lf-filters-grid {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* ===== Table card extras ===== */
    .lf-period-note {
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        padding: 0 3px 8px;
    }

    /* Name link */
    .lf-name-link {
        color: var(--primary);
        font-weight: 700;
        font-size: 12.5px;
        text-decoration: none;
    }

    .lf-name-link:hover {
        text-decoration: underline;
        color: var(--primary-dark);
    }

    /* Status pills */
    .lf-status-pill {
        display: inline-block;
        font-size: 10.5px;
        font-weight: 800;
        border-radius: 999px;
        padding: 3px 13px;
        border: 1.5px solid;
    }

    .lf-status-pill.lead { color: #16a34a; border-color: #86efac; background: #f0fdf4; }
    .lf-status-pill.new  { color: #0891b2; border-color: #67e8f9; background: #ecfeff; }
    .lf-status-pill.quotation { color: #7c3aed; border-color: #c4b5fd; background: #f5f3ff; }
    .lf-status-pill.followup  { color: #b45309; border-color: #fcd34d; background: #fffbeb; }

    /* Assigned avatar */
    .lf-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #7b1fa2;
        color: #fff;
        font-size: 9px;
        font-weight: 800;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: default;
    }

    /* Tags */
    .lf-tag {
        display: inline-block;
        font-size: 10px;
        font-weight: 800;
        border-radius: 6px;
        padding: 3px 9px;
        background: var(--primary-soft);
        color: var(--primary-dark);
        margin-right: 4px;
    }
</style>

<div class="lf-page">

    <!-- Title row -->
    <div class="lf-title-row">
        <h5><i class="bi bi-funnel me-2" style="color:var(--primary);"></i>Lead Filters</h5>
    </div>

    <!-- ===== Filters card ===== -->
    <div class="lf-filters-card">
        <div class="lf-filters-head">
            <h6><i class="bi bi-sliders me-2" style="color:var(--primary);"></i>Lead Filters</h6>
            <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-primary" id="lfNewBtn"><i class="bi bi-plus-lg me-1"></i>New</button>
                <button type="button" class="btn btn-primary" id="lfApplyBtn" style="background:var(--primary);border-color:var(--primary);"><i class="bi bi-funnel me-1"></i>Filter</button>
                <button type="button" class="btn btn-outline-secondary" title="Filter templates"><i class="bi bi-list-ul"></i></button>
            </div>
        </div>

        <div class="lf-filters-grid">
            <div class="lf-field">
                <label>Staff Members</label>
                <select class="form-select" id="lfStaff">
                    <option selected>All Staff Members</option>
                    <option>GHRAUDA SOFTWARE</option>
                    <option>Harish D.</option>
                    <option>Divya A.</option>
                    <option>Priya S.</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Lead Status</label>
                <select class="form-select" id="lfStatus">
                    <option selected>All</option>
                    <option>Lead</option>
                    <option>Quotation</option>
                    <option>Followup</option>
                    <option>Qualified</option>
                    <option>New</option>
                    <option>Customer</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Lead Source</label>
                <select class="form-select" id="lfSource">
                    <option selected>All</option>
                    <option>Indiamart</option>
                    <option>Google</option>
                    <option>Direct</option>
                    <option>Website Form</option>
                    <option>Referral</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Country</label>
                <select class="form-select" id="lfCountry">
                    <option selected>All</option>
                    <option>India</option>
                    <option>USA</option>
                    <option>UK</option>
                    <option>UAE</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Tags</label>
                <select class="form-select" id="lfTags">
                    <option selected>All</option>
                    <option>Hot</option>
                    <option>Warm</option>
                    <option>Cold</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Lead Type</label>
                <select class="form-select" id="lfType">
                    <option selected>Non selected</option>
                    <option>Customer</option>
                    <option>Lead</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Hide Export Columns</label>
                <select class="form-select" id="lfHideCols">
                    <option selected>Nothing selected</option>
                    <option>Email</option>
                    <option>Phone</option>
                    <option>Profession</option>
                    <option>Public</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Filter By Date</label>
                <select class="form-select" id="lfDateBy">
                    <option selected>Created Date</option>
                    <option>Last Contact</option>
                    <option>Next Follow up</option>
                </select>
            </div>
            <div class="lf-field">
                <label>Period</label>
                <select class="form-select" id="lfPeriod">
                    <option selected>this month</option>
                    <option>today</option>
                    <option>this week</option>
                    <option>last month</option>
                    <option>this year</option>
                </select>
            </div>
        </div>

        <!-- Save as Filter Template -->
        <div class="lf-template-row">
            <input type="radio" id="lfTplRadio" name="lfTpl">
            <span id="lfTplText">Save as Filter Template (Add Filter Name here)</span>
            <input type="text" class="lf-tpl-input" id="lfTplInput" placeholder="" style="display:none;">
        </div>
    </div>

    <!-- ===== Table (MasterTable flow) ===== -->
    <div class="card-custom lf-list-card" style="padding:0;border:1px solid var(--border-soft);border-radius:14px;box-shadow:none;overflow:hidden;">
        <div class="table-responsive">
            <table class="table-modern w-100 mb-0" id="leadFilterTable">
                <thead>
                    <tr>
                        <th class="text-nowrap">S.No</th>
                        <th class="text-nowrap">#</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">Company</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Phone</th>
                        <th class="text-nowrap">Country</th>
                        <th class="text-nowrap">Profession</th>
                        <th class="text-nowrap">Status</th>
                        <th class="text-nowrap">Source</th>
                        <th class="text-nowrap">Created Date</th>
                        <th class="text-nowrap">Last Contact</th>
                        <th class="text-nowrap">Public</th>
                        <th class="text-nowrap">Assigned</th>
                        <th class="text-nowrap">Tags</th>
                    </tr>
                </thead>
                <tbody id="leadFilterTbody">
                    <!-- Rows injected by master-table.js -->
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
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
</script>

<?php include 'footer.php'; ?>
