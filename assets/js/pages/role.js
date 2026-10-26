/**
 * Gharuda CRM - Role Page Script
 * File: assets/js/pages/role.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    var table = document.getElementById('roleTable');
    var tbody = document.getElementById('roleTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    function resetCreationForm() {
        var nameInput = document.getElementById('create_role_name');
        var statusInput = document.getElementById('create_status');
        if (nameInput) nameInput.value = '';
        if (statusInput) statusInput.value = 'Enable';
        if (typeof window.ghSyncSelect2 === 'function') {
            window.ghSyncSelect2('#creationModal');
        }
    }

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', resetCreationForm);
    }

    // Helper: get existing names to check for duplicates
    function getExistingNames(excludeId) {
        var names = [];
        if (!tbody) return names;
        tbody.querySelectorAll('tr').forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) return;
            var nameCell = tr.querySelector('.role-name') || tr.children[1];
            if (nameCell) names.push(nameCell.textContent.trim().toLowerCase());
        });
        return names;
    }

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    // Create Save
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var nameInput = document.getElementById('create_role_name');
            var statusInput = document.getElementById('create_status');
            var name = nameInput ? nameInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Role name already exists.');
                return;
            }

            var today = (function () {
                var d = new Date();
                return String(d.getDate()).padStart(2, '0') + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + d.getFullYear();
            })();

            var newId = Date.now();
            var rowHtml =
                '<tr data-id="' + newId + '">' +
                    '<td></td>' +
                    '<td class="role-name">' + name + '</td>' +
                    '<td>' + statusPill(statusInput ? statusInput.value : 'Enable') + '</td>' +
                    '<td>' + today + '</td>' +
                    '<td>' +
                        '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm primary btn-role-perms" data-id="' + newId + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Permissions"><i class="bi bi-shield-lock"></i></button>' +
                            '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + newId + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                            '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + newId + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>' +
                        '</div>' +
                    '</td>' +
                '</tr>';

            if (table && table.autoTable) {
                table.autoTable.addRow(rowHtml);
            } else if (tbody) {
                tbody.insertAdjacentHTML('afterbegin', rowHtml);
            }

            resetCreationForm();
            if (creationModal) creationModal.hide();
        });
    }

    // Delegate Edit, Delete and Permissions on Table Body
    if (tbody) {
        tbody.addEventListener('click', function (e) {
            var permBtn = e.target.closest('.btn-role-perms');
            var editBtn = e.target.closest('.btn-edit');
            var deleteBtn = e.target.closest('.btn-delete');

            if (permBtn) {
                var pTr = permBtn.closest('tr');
                if (!pTr) return;
                var pId = pTr.getAttribute('data-id') || permBtn.getAttribute('data-id');
                var pNameCell = pTr.querySelector('.role-name') || pTr.children[1];
                var roleName = pNameCell ? pNameCell.textContent.trim() : '';

                currentPermRoleId = pId;
                currentPermRoleName = roleName;
                document.getElementById('rpRoleName').textContent = roleName;

                var allPerms = loadRolePerms();
                renderPermRows(allPerms[roleName] || {});

                if (permModal) permModal.show();
                return;
            }

            if (editBtn) {
                var tr = editBtn.closest('tr');
                if (!tr) return;
                var id = tr.getAttribute('data-id') || editBtn.getAttribute('data-id');
                var nameCell = tr.querySelector('.role-name') || tr.children[1];
                var statusPillEl = tr.querySelector('.status-pill');

                var editIdEl = document.getElementById('edit_role_id');
                var editNameEl = document.getElementById('edit_role_name');
                var editStatusEl = document.getElementById('edit_status');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
                if (editStatusEl) editStatusEl.value = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';

                if (typeof window.ghSyncSelect2 === 'function') {
                    window.ghSyncSelect2('#editModal');
                }

                if (editModal) editModal.show();
                return;
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this role?')) {
                    var delTr = deleteBtn.closest('tr');
                    if (delTr) {
                        delTr.remove();
                        if (table && table.autoTable) {
                            table.autoTable.refresh();
                        }
                    }
                }
                return;
            }
        });
    }

    // Edit Save
    var btnEditSave = document.getElementById('btnEditSave');
    if (btnEditSave) {
        btnEditSave.addEventListener('click', function () {
            var editIdEl = document.getElementById('edit_role_id');
            var nameInput = document.getElementById('edit_role_name');
            var statusInput = document.getElementById('edit_status');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Role name already exists.');
                return;
            }

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                var nameCell = tr.querySelector('.role-name') || tr.children[1];
                if (nameCell) nameCell.textContent = name;
                var statusCell = tr.children[2];
                if (statusCell) statusCell.innerHTML = statusPill(statusInput ? statusInput.value : 'Enable');

                if (table && table.autoTable) {
                    table.autoTable.refresh();
                }
            }

            if (editModal) editModal.hide();
        });
    }

    // =====================================================
    // Role Permissions (Modern Matrix Design & Master-driven)
    // =====================================================
    var ROLE_PERMS_KEY = 'gharuda_role_permissions';

    var CAP_KEYS = ['view_own', 'view_global', 'create', 'edit', 'delete'];
    var CAP_LABELS = {
        view_own: 'View(Own)',
        view_global: 'View(Global)',
        create: 'Create',
        edit: 'Edit',
        delete: 'Delete'
    };

    var GROUP_ICONS = {
        'ALL': 'bi-grid-fill',
        'HR Management': 'bi-people-fill',
        'Timesheet & Leave': 'bi-clock-history',
        'HR Record': 'bi-folder2-open',
        'Dashboard': 'bi-grid-1x2-fill',
        'Master': 'bi-database',
        'Recruitment': 'bi-person-plus',
        'Helpdesk / Ticketing': 'bi-life-preserver',
        'Lead Management': 'bi-kanban',
        'Customers': 'bi-person-vcard',
        'Appointments & MOM': 'bi-calendar2-week',
        'Target': 'bi-bullseye',
        'Inventory': 'bi-box-seam'
    };

    var DEFAULT_MODULES = [
        // 1. Dashboard
        { id: 101, group: 'Dashboard',   module: 'Dashboard',   name: 'Dashboard',                  caps: ['view_own', 'view_global'] },

        // 2. Recruitment
        { id: 102, group: 'Recruitment', module: 'Recruitment', name: 'TL Resource',                caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 27,  group: 'Recruitment', module: 'Recruitment', name: 'Job Openings',              caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 28,  group: 'Recruitment', module: 'Recruitment', name: 'Social & Web Applications', caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 29,  group: 'Recruitment', module: 'Recruitment', name: 'TL Evaluations & Scores',   caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 30,  group: 'Recruitment', module: 'Recruitment', name: 'Candidate Pipeline',        caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 31,  group: 'Recruitment', module: 'Recruitment', name: 'Offer Letters',             caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 32,  group: 'Recruitment', module: 'Recruitment', name: 'Recruitment Reports',       caps: ['view_global'] },

        // 3. HR Management
        { id: 1,  group: 'HR Management', module: 'Organization',        name: 'Department Directory',          caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 2,  group: 'HR Management', module: 'Organization',        name: 'Employee Tree',                 caps: ['view_own', 'view_global'] },
        { id: 3,  group: 'HR Management', module: 'Organization',        name: 'Policy',                        caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 4,  group: 'HR Management', module: 'Organization',        name: 'Calendar',                      caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },

        { id: 5,  group: 'HR Management', module: 'Employee Creation',   name: 'Employee Create',               caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 6,  group: 'HR Management', module: 'Employee Creation',   name: 'Pending',                       caps: ['view_global', 'edit'] },
        { id: 7,  group: 'HR Management', module: 'Employee Creation',   name: 'In Progress',                   caps: ['view_global', 'edit'] },

        { id: 8,  group: 'HR Management', module: 'Employee',            name: 'Employee Report',               caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 9,  group: 'HR Management', module: 'Employee',            name: 'Employee Insurance',            caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },

        { id: 10, group: 'HR Management', module: 'Shift',               name: 'Manage Shift',                  caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 11, group: 'HR Management', module: 'Shift',               name: 'Create Shift',                  caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 12, group: 'HR Management', module: 'Shift',               name: 'Shift Schedule',                caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 13, group: 'HR Management', module: 'Shift',               name: 'Shift Change Requests',         caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },

        { id: 14, group: 'HR Management', module: 'Loan & Advances',     name: 'Salary Advance & Loans',        caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 15, group: 'HR Management', module: 'Loan & Advances',     name: 'Advance & Loan Policies',       caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 16, group: 'HR Management', module: 'Loan & Advances',     name: 'Salary Deduction Ledger',       caps: ['view_global'] },

        { id: 17, group: 'HR Management', module: 'Payroll Management',  name: 'Attendance Adjustment',         caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 18, group: 'HR Management', module: 'Payroll Management',  name: 'Salary Structure',              caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 19, group: 'HR Management', module: 'Payroll Management',  name: 'Payroll Processing',            caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 20, group: 'HR Management', module: 'Payroll Management',  name: 'Payslip',                       caps: ['view_own', 'view_global'] },

        // 4. Timesheet & Leave
        { id: 21, group: 'Timesheet & Leave', module: 'Attendance',      name: 'Attendance Report',             caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 22, group: 'Timesheet & Leave', module: 'Attendance',      name: 'Punch In Reports',              caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 23, group: 'Timesheet & Leave', module: 'Attendance',      name: 'Over-time',                     caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },

        { id: 24, group: 'Timesheet & Leave', module: 'Leave',           name: 'Leave and Holiday',             caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 25, group: 'Timesheet & Leave', module: 'Leave',           name: 'Leave Report',                  caps: ['view_own', 'view_global'] },
        { id: 26, group: 'Timesheet & Leave', module: 'Leave',           name: 'Permission Request',            caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },

        // 5. HR Record
        { id: 33, group: 'HR Record',        module: 'Onboarding',       name: 'Joining Pipeline',              caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 34, group: 'HR Record',        module: 'Onboarding',       name: 'Document Verification',         caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 35, group: 'HR Record',        module: 'Onboarding',       name: 'Checklists',                    caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 36, group: 'HR Record',        module: 'Onboarding',       name: 'Asset Provisioning',            caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 37, group: 'HR Record',        module: 'Onboarding',       name: 'Induction & Orientation',       caps: ['view_global', 'create', 'edit', 'delete'] },

        { id: 38, group: 'HR Record',        module: 'Performance',      name: 'Appraisal Reviews',             caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 39, group: 'HR Record',        module: 'Performance',      name: '360° Feedback',                 caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 40, group: 'HR Record',        module: 'Performance',      name: 'Performance Reports',           caps: ['view_global'] }
    ];

    function slug(value) {
        return String(value || '').toLowerCase()
            .replace(/&/g, 'and')
            .replace(/[^a-z0-9]+/g, '_')
            .replace(/^_+|_+$/g, '');
    }

    function loadModules() {
        if (window.PermissionModules && typeof PermissionModules.load === 'function') {
            var loaded = PermissionModules.load();
            if (Array.isArray(loaded) && loaded.length) return loaded;
        }
        try {
            var raw = localStorage.getItem('gh_permission_modules');
            if (raw) {
                var parsed = JSON.parse(raw);
                if (Array.isArray(parsed) && parsed.length) return parsed;
            }
        } catch (e) {}
        return DEFAULT_MODULES;
    }

    function loadRolePerms() {
        try {
            var raw = localStorage.getItem(ROLE_PERMS_KEY);
            if (raw) return JSON.parse(raw);
        } catch (e) { /* ignore */ }
        return {};
    }

    function saveRolePerms(obj) {
        try { localStorage.setItem(ROLE_PERMS_KEY, JSON.stringify(obj)); } catch (e) { /* ignore */ }
    }

    function esc(s) {
        return String(s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    var permModalEl = document.getElementById('rolePermModal');
    var permModal = permModalEl ? bootstrap.Modal.getOrCreateInstance(permModalEl) : null;
    var currentPermRoleId = null;
    var currentPermRoleName = '';

    function renderPermRows(selected) {
        var tbodyEl = document.getElementById('rpPermRows');
        if (!tbodyEl) return;

        var modules = loadModules();
        var sel = {};
        if (Array.isArray(selected)) {
            selected.forEach(function (v) { sel[v] = true; });
        } else if (selected && typeof selected === 'object') {
            sel = selected;
        }

        // Group by Group, then Module
        var groups = [];
        var byGroup = {};
        modules.forEach(function (m) {
            var g = m.group || 'Other';
            if (!byGroup[g]) {
                byGroup[g] = { modules: {}, order: [], count: 0 };
                groups.push(g);
            }
            byGroup[g].count++;
            var modName = m.module || 'General';
            if (!byGroup[g].modules[modName]) {
                byGroup[g].modules[modName] = [];
                byGroup[g].order.push(modName);
            }
            byGroup[g].modules[modName].push(m);
        });

        // Priority sorting: Dashboard (1st) and Recruitment (2nd) appear first!
        groups.sort(function (a, b) {
            function getGroupPriority(grp) {
                var s = String(grp || '').trim().toLowerCase();
                if (s === 'dashboard') return 1;
                if (s === 'recruitment') return 2;
                if (s === 'hr management') return 3;
                if (s.indexOf('timesheet') !== -1 || s.indexOf('leave') !== -1) return 4;
                if (s.indexOf('record') !== -1) return 5;
                return 10;
            }
            return getGroupPriority(a) - getGroupPriority(b);
        });

        // Build Matrix Table Rows
        var rowsHtml = '';
        groups.forEach(function (g) {
            var icon = GROUP_ICONS[g] || 'bi-folder2';
            // Group Banner Row
            rowsHtml +=
                '<tr class="rp-matrix-group-banner-row" data-group="' + esc(g) + '">' +
                    '<td colspan="7"><i class="bi ' + icon + ' me-2"></i>' + esc(g) + '</td>' +
                '</tr>';

            byGroup[g].order.forEach(function (modName) {
                var subList = byGroup[g].modules[modName];
                var modSlug = slug(g + '_' + modName);

                // Module Bar Row
                rowsHtml +=
                    '<tr class="rp-matrix-module-row" data-group="' + esc(g) + '" data-module-slug="' + modSlug + '">' +
                        '<td colspan="7">' +
                            '<div class="rp-module-bar">' +
                                '<div>' +
                                    '<span class="rp-module-tag">Module</span>' +
                                    '<span class="rp-module-title">' + esc(modName) + '</span>' +
                                    '<span class="text-muted ms-2 fs-11">(' + subList.length + ' items)</span>' +
                                '</div>' +
                                '<button type="button" class="rp-btn-toggle-module" data-module-slug="' + modSlug + '">' +
                                    '<i class="bi bi-check2-all me-1"></i>Toggle Module' +
                                '</button>' +
                            '</div>' +
                        '</td>' +
                    '</tr>';

                // Submodule rows
                subList.forEach(function (m) {
                    var caps = Array.isArray(m.caps) ? m.caps : ['view_own'];
                    var rowSlug = slug(g + '_' + modName + '_' + m.name);

                    rowsHtml +=
                        '<tr class="rp-matrix-row" data-group="' + esc(g) + '" data-module="' + esc(modName) + '" data-module-slug="' + modSlug + '" data-name="' + esc(m.name) + '">' +
                            '<td>' +
                                '<div class="rp-submodule-cell">' +
                                    '<span class="rp-submodule-bullet"></span>' +
                                    '<span>' + esc(m.name) + '</span>' +
                                '</div>' +
                            '</td>';

                    // Capabilities: view_own, view_global, create, edit, delete
                    CAP_KEYS.forEach(function (cap) {
                        var hasCap = caps.indexOf(cap) !== -1;
                        if (hasCap) {
                            var valPrimary = m.id + '_' + cap;
                            var valSecondary = (m.key || slug(m.name)) + '_' + cap;
                            var isChecked = sel[valPrimary] || sel[valSecondary] || false;
                            rowsHtml +=
                                '<td class="col-center">' +
                                    '<label class="rp-cb-wrap" title="' + CAP_LABELS[cap] + '">' +
                                        '<input type="checkbox" name="rpPerm" value="' + valPrimary + '" data-cap="' + cap + '"' + (isChecked ? ' checked' : '') + '>' +
                                    '</label>' +
                                '</td>';
                        } else {
                            rowsHtml += '<td class="col-center"><span class="rp-dash">—</span></td>';
                        }
                    });

                    // Row All Toggle Button
                    rowsHtml +=
                        '<td class="col-center">' +
                            '<button type="button" class="rp-row-all-btn" title="Toggle all capabilities for this submodule">' +
                                'All' +
                            '</button>' +
                        '</td>' +
                    '</tr>';
                });
            });
        });

        tbodyEl.innerHTML = rowsHtml;
        bindMatrixEvents();
        filterRows();
        syncPermUi();
    }

    function filterRows() {
        var q = (document.getElementById('rpSearch') ? document.getElementById('rpSearch').value : '').trim().toLowerCase();
        var tbodyEl = document.getElementById('rpPermRows');
        if (!tbodyEl) return;

        // Rows visibility
        var subRows = tbodyEl.querySelectorAll('.rp-matrix-row');
        subRows.forEach(function (row) {
            var g = row.getAttribute('data-group') || '';
            var mod = (row.getAttribute('data-module') || '').toLowerCase();
            var name = (row.getAttribute('data-name') || '').toLowerCase();

            var matchesSearch = (!q || name.indexOf(q) !== -1 || mod.indexOf(q) !== -1 || g.toLowerCase().indexOf(q) !== -1);

            row.style.display = matchesSearch ? '' : 'none';
        });

        // Module Bar Rows visibility
        var modRows = tbodyEl.querySelectorAll('.rp-matrix-module-row');
        modRows.forEach(function (modRow) {
            var slugVal = modRow.getAttribute('data-module-slug');
            var anyVisible = false;
            tbodyEl.querySelectorAll('.rp-matrix-row[data-module-slug="' + slugVal + '"]').forEach(function (r) {
                if (r.style.display !== 'none') anyVisible = true;
            });
            modRow.style.display = anyVisible ? '' : 'none';
        });

        // Group Banner Rows visibility
        var bannerRows = tbodyEl.querySelectorAll('.rp-matrix-group-banner-row');
        bannerRows.forEach(function (bannerRow) {
            var g = bannerRow.getAttribute('data-group');
            var anyVisible = false;
            tbodyEl.querySelectorAll('.rp-matrix-row[data-group="' + g + '"]').forEach(function (r) {
                if (r.style.display !== 'none') anyVisible = true;
            });
            bannerRow.style.display = anyVisible ? '' : 'none';
        });
    }

    function syncPermUi() {
        var cbs = document.querySelectorAll('#rpPermRows input[name="rpPerm"]');
        var checkedCount = 0;
        Array.prototype.forEach.call(cbs, function (cb) {
            if (cb.checked) checkedCount++;
        });

        var countEl = document.getElementById('rpSelectedCount');
        if (countEl) countEl.textContent = String(checkedCount);

        // Update Row All Buttons
        document.querySelectorAll('#rpPermRows .rp-matrix-row').forEach(function (row) {
            var boxes = row.querySelectorAll('input[name="rpPerm"]');
            var btn = row.querySelector('.rp-row-all-btn');
            if (!btn || !boxes.length) return;
            var allChecked = Array.prototype.every.call(boxes, function (cb) { return cb.checked; });
            if (allChecked) {
                btn.classList.add('all-checked');
            } else {
                btn.classList.remove('all-checked');
            }
        });
    }

    function bindMatrixEvents() {
        // Individual Checkbox Change
        document.querySelectorAll('#rpPermRows input[name="rpPerm"]').forEach(function (cb) {
            cb.addEventListener('change', syncPermUi);
        });

        // Row All Toggle
        document.querySelectorAll('#rpPermRows .rp-row-all-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var row = btn.closest('.rp-matrix-row');
                if (!row) return;
                var boxes = row.querySelectorAll('input[name="rpPerm"]');
                var allChecked = Array.prototype.every.call(boxes, function (cb) { return cb.checked; });
                boxes.forEach(function (cb) { cb.checked = !allChecked; });
                syncPermUi();
            });
        });

        // Module Toggle
        document.querySelectorAll('#rpPermRows .rp-btn-toggle-module').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var modSlug = btn.getAttribute('data-module-slug');
                var rows = document.querySelectorAll('#rpPermRows .rp-matrix-row[data-module-slug="' + modSlug + '"]');
                var allBoxes = [];
                rows.forEach(function (r) {
                    r.querySelectorAll('input[name="rpPerm"]').forEach(function (b) { allBoxes.push(b); });
                });
                if (!allBoxes.length) return;
                var allChecked = allBoxes.every(function (b) { return b.checked; });
                allBoxes.forEach(function (b) { b.checked = !allChecked; });
                syncPermUi();
            });
        });
    }

    // Search input
    var searchInput = document.getElementById('rpSearch');
    if (searchInput) {
        searchInput.addEventListener('input', filterRows);
    }

    // Global Select All / Deselect All
    var selectAllBtn = document.getElementById('rpSelectAll');
    if (selectAllBtn) {
        selectAllBtn.addEventListener('click', function () {
            // Check only visible rows or all if searching
            document.querySelectorAll('#rpPermRows input[name="rpPerm"]').forEach(function (cb) {
                var row = cb.closest('tr');
                if (!row || row.style.display !== 'none') {
                    cb.checked = true;
                }
            });
            syncPermUi();
        });
    }

    var deselectAllBtn = document.getElementById('rpDeselectAll');
    if (deselectAllBtn) {
        deselectAllBtn.addEventListener('click', function () {
            document.querySelectorAll('#rpPermRows input[name="rpPerm"]').forEach(function (cb) {
                var row = cb.closest('tr');
                if (!row || row.style.display !== 'none') {
                    cb.checked = false;
                }
            });
            syncPermUi();
        });
    }

    // Save Permissions
    var saveBtn = document.getElementById('rpSave');
    if (saveBtn) {
        saveBtn.addEventListener('click', function () {
            if (!currentPermRoleName) return;

            var checked = Array.prototype.slice.call(document.querySelectorAll('#rpPermRows input[name="rpPerm"]:checked')).map(function (cb) {
                return cb.value;
            });

            var allPerms = loadRolePerms();
            allPerms[currentPermRoleName] = checked;
            saveRolePerms(allPerms);

            if (permModal) permModal.hide();
            alert('Permissions saved successfully for role: ' + currentPermRoleName + ' (' + checked.length + ' granted)');
        });
    }
});
