/**
 * Gharuda CRM - Permission Modules Page Script
 * File: assets/js/pages/permission-modules.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function (window) {
    'use strict';

    var STORAGE_KEY = 'gh_permission_modules';

    function slug(value) {
        return String(value || '').toLowerCase()
            .replace(/&/g, 'and')
            .replace(/[^a-z0-9]+/g, '_')
            .replace(/^_+|_+$/g, '');
    }

    window.PermissionModules = {
        storageKey: STORAGE_KEY,
        save: function (list) {
            try {
                window.localStorage.setItem(STORAGE_KEY, JSON.stringify(list));
            } catch (e) {}
        },
        load: function () {
            try {
                var raw = window.localStorage.getItem(STORAGE_KEY);
                if (raw) return JSON.parse(raw);
            } catch (e) {}
            return [];
        },
        makeKey: function (group, name, id) {
            return 'module_' + slug(group + '_' + name) + '_' + id;
        }
    };
})(window);

document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var CAP_LABELS = {
        view_own: 'View(Own)',
        view_global: 'View(Global)',
        create: 'Create',
        edit: 'Edit',
        delete: 'Delete'
    };

    var table = document.getElementById('permissionModuleTable');
    var tbody = document.getElementById('pmTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    function renderCaps(caps) {
        if (!Array.isArray(caps) || !caps.length) return '<span class="text-muted">—</span>';
        return caps.map(function (c) {
            return '<span class="pm-cap-chip">' + (CAP_LABELS[c] || c) + '</span>';
        }).join('');
    }

    function getCheckedCaps(sel) {
        return Array.prototype.slice.call(document.querySelectorAll(sel + ':checked')).map(function (cb) {
            return cb.value;
        });
    }

    function resetCreationForm() {
        var groupInput = document.getElementById('create_pm_group');
        var modInput = document.getElementById('create_pm_module');
        var nameInput = document.getElementById('create_pm_name');
        if (groupInput) groupInput.value = '';
        if (modInput) modInput.value = '';
        if (nameInput) nameInput.value = '';
        document.querySelectorAll('.pm-cap').forEach(function (cb) {
            cb.checked = false;
        });
    }

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', resetCreationForm);
    }

    function isDuplicate(group, name, excludeId) {
        if (!tbody) return false;
        var gLower = group.trim().toLowerCase();
        var nLower = name.trim().toLowerCase();
        var rows = tbody.querySelectorAll('tr');
        for (var i = 0; i < rows.length; i++) {
            var tr = rows[i];
            if (tr.classList.contains('no-record-row')) continue;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) continue;
            var trGroup = (tr.getAttribute('data-group') || '').trim().toLowerCase();
            var trName = (tr.getAttribute('data-name') || '').trim().toLowerCase();
            if (trGroup === gLower && trName === nLower) {
                return true;
            }
        }
        return false;
    }

    function syncStorage() {
        if (!tbody || !window.PermissionModules) return;
        var list = [];
        tbody.querySelectorAll('tr').forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            var id = tr.getAttribute('data-id');
            var group = tr.getAttribute('data-group') || '';
            var mod = tr.getAttribute('data-module') || '';
            var name = tr.getAttribute('data-name') || '';
            var caps = [];
            try {
                caps = JSON.parse(tr.getAttribute('data-caps') || '[]');
            } catch (e) {}
            list.push({
                id: Number(id) || id,
                group: group,
                module: mod,
                name: name,
                caps: caps
            });
        });
        PermissionModules.save(list);
    }

    // Create Save
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var groupInput = document.getElementById('create_pm_group');
            var moduleInput = document.getElementById('create_pm_module');
            var nameInput = document.getElementById('create_pm_name');

            var group = groupInput ? groupInput.value.trim() : '';
            var mod = moduleInput ? moduleInput.value.trim() : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var caps = getCheckedCaps('.pm-cap');

            if (!group) {
                if (groupInput) groupInput.focus();
                return;
            }
            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (isDuplicate(group, name)) {
                alert('Submodule already exists in this group.');
                return;
            }

            var newId = Date.now();
            var capsJson = JSON.stringify(caps).replace(/"/g, '&quot;');

            var rowHtml =
                '<tr data-id="' + newId + '" data-group="' + group + '" data-module="' + mod + '" data-name="' + name + '" data-caps="' + capsJson + '">' +
                    '<td></td>' +
                    '<td class="pm-group"><span class="fw-semibold text-primary">' + group + '</span></td>' +
                    '<td class="pm-module"><span class="fw-medium">' + (mod || '—') + '</span></td>' +
                    '<td class="pm-name">' + name + '</td>' +
                    '<td class="pm-caps">' + renderCaps(caps) + '</td>' +
                    '<td>' +
                        '<div class="btn-group">' +
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

            syncStorage();
            resetCreationForm();
            if (creationModal) creationModal.hide();
        });
    }

    // Delegate Edit and Delete on Table Body
    if (tbody) {
        tbody.addEventListener('click', function (e) {
            var editBtn = e.target.closest('.btn-edit');
            var deleteBtn = e.target.closest('.btn-delete');

            if (editBtn) {
                var tr = editBtn.closest('tr');
                if (!tr) return;
                var id = tr.getAttribute('data-id') || editBtn.getAttribute('data-id');
                var group = tr.getAttribute('data-group') || '';
                var mod = tr.getAttribute('data-module') || '';
                var name = tr.getAttribute('data-name') || '';
                var caps = [];
                try {
                    caps = JSON.parse(tr.getAttribute('data-caps') || '[]');
                } catch (err) {}

                var editIdEl = document.getElementById('edit_pm_id');
                var editGroupEl = document.getElementById('edit_pm_group');
                var editModEl = document.getElementById('edit_pm_module');
                var editNameEl = document.getElementById('edit_pm_name');

                if (editIdEl) editIdEl.value = id;
                if (editGroupEl) editGroupEl.value = group;
                if (editModEl) editModEl.value = mod;
                if (editNameEl) editNameEl.value = name;

                document.querySelectorAll('.pm-cap-edit').forEach(function (cb) {
                    cb.checked = (caps.indexOf(cb.value) !== -1);
                });

                if (editModal) editModal.show();
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this module?')) {
                    var delTr = deleteBtn.closest('tr');
                    if (delTr) {
                        delTr.remove();
                        if (table && table.autoTable) {
                            table.autoTable.refresh();
                        }
                        syncStorage();
                    }
                }
            }
        });
    }

    // Edit Save
    var btnEditSave = document.getElementById('btnEditSave');
    if (btnEditSave) {
        btnEditSave.addEventListener('click', function () {
            var editIdEl = document.getElementById('edit_pm_id');
            var groupInput = document.getElementById('edit_pm_group');
            var moduleInput = document.getElementById('edit_pm_module');
            var nameInput = document.getElementById('edit_pm_name');

            var id = editIdEl ? editIdEl.value : '';
            var group = groupInput ? groupInput.value.trim() : '';
            var mod = moduleInput ? moduleInput.value.trim() : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var caps = getCheckedCaps('.pm-cap-edit');

            if (!group) {
                if (groupInput) groupInput.focus();
                return;
            }
            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (isDuplicate(group, name, id)) {
                alert('Submodule already exists in this group.');
                return;
            }

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                tr.setAttribute('data-group', group);
                tr.setAttribute('data-module', mod);
                tr.setAttribute('data-name', name);
                tr.setAttribute('data-caps', JSON.stringify(caps));

                var groupCell = tr.querySelector('.pm-group');
                if (groupCell) groupCell.innerHTML = '<span class="fw-semibold text-primary">' + group + '</span>';

                var modCell = tr.querySelector('.pm-module');
                if (modCell) modCell.innerHTML = '<span class="fw-medium">' + (mod || '—') + '</span>';

                var nameCell = tr.querySelector('.pm-name');
                if (nameCell) nameCell.textContent = name;

                var capsCell = tr.querySelector('.pm-caps');
                if (capsCell) capsCell.innerHTML = renderCaps(caps);

                if (table && table.autoTable) {
                    table.autoTable.refresh();
                }
                syncStorage();
            }

            if (editModal) editModal.hide();
        });
    }
});
