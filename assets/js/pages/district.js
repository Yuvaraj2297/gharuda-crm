/**
 * Gharuda CRM - District Page Script
 * File: assets/js/pages/district.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var table = document.getElementById('districtTable');
    var tbody = document.getElementById('districtTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    function resetCreationForm() {
        var nameInput = document.getElementById('create_district_name');
        var stateInput = document.getElementById('create_state');
        var statusInput = document.getElementById('create_status');
        if (nameInput) nameInput.value = '';
        if (stateInput) stateInput.value = '';
        if (statusInput) statusInput.value = 'Enable';
        if (typeof window.ghSyncSelect2 === 'function') {
            window.ghSyncSelect2('#creationModal');
        }
    }

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', resetCreationForm);
    }

    // Helper: get existing district + state combos to check for duplicates
    function getExistingDistricts(excludeId) {
        var items = [];
        if (!tbody) return items;
        tbody.querySelectorAll('tr').forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) return;
            var nameCell = tr.querySelector('.district-name') || tr.children[1];
            var stateCell = tr.querySelector('.district-state') || tr.children[2];
            if (nameCell && stateCell) {
                items.push(nameCell.textContent.trim().toLowerCase() + '||' + stateCell.textContent.trim().toLowerCase());
            }
        });
        return items;
    }

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    // Create Save
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var nameInput = document.getElementById('create_district_name');
            var stateInput = document.getElementById('create_state');
            var statusInput = document.getElementById('create_status');

            var name = nameInput ? nameInput.value.trim() : '';
            var state = stateInput ? stateInput.value.trim() : '';

            if (!name) { if (nameInput) nameInput.focus(); return; }
            if (!state) { if (stateInput) stateInput.focus(); return; }

            var combo = name.toLowerCase() + '||' + state.toLowerCase();
            if (getExistingDistricts().indexOf(combo) !== -1) {
                alert('District already exists for this state.');
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
                    '<td class="district-name">' + name + '</td>' +
                    '<td class="district-state">' + state + '</td>' +
                    '<td>' + statusPill(statusInput ? statusInput.value : 'Enable') + '</td>' +
                    '<td>' + today + '</td>' +
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
                var nameCell = tr.querySelector('.district-name') || tr.children[1];
                var stateCell = tr.querySelector('.district-state') || tr.children[2];
                var statusPillEl = tr.querySelector('.status-pill');

                var editIdEl = document.getElementById('edit_district_id');
                var editNameEl = document.getElementById('edit_district_name');
                var editStateEl = document.getElementById('edit_state');
                var editStatusEl = document.getElementById('edit_status');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
                if (editStateEl) editStateEl.value = stateCell ? stateCell.textContent.trim() : '';
                if (editStatusEl) editStatusEl.value = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';

                if (typeof window.ghSyncSelect2 === 'function') {
                    window.ghSyncSelect2('#editModal');
                }

                if (editModal) editModal.show();
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this district?')) {
                    var delTr = deleteBtn.closest('tr');
                    if (delTr) {
                        delTr.remove();
                        if (table && table.autoTable) {
                            table.autoTable.refresh();
                        }
                    }
                }
            }
        });
    }

    // Edit Save
    var btnEditSave = document.getElementById('btnEditSave');
    if (btnEditSave) {
        btnEditSave.addEventListener('click', function () {
            var editIdEl = document.getElementById('edit_district_id');
            var nameInput = document.getElementById('edit_district_name');
            var stateInput = document.getElementById('edit_state');
            var statusInput = document.getElementById('edit_status');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var state = stateInput ? stateInput.value.trim() : '';

            if (!name) { if (nameInput) nameInput.focus(); return; }
            if (!state) { if (stateInput) stateInput.focus(); return; }

            var combo = name.toLowerCase() + '||' + state.toLowerCase();
            if (getExistingDistricts(id).indexOf(combo) !== -1) {
                alert('District already exists for this state.');
                return;
            }

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                var nameCell = tr.querySelector('.district-name') || tr.children[1];
                if (nameCell) nameCell.textContent = name;
                var stateCell = tr.querySelector('.district-state') || tr.children[2];
                if (stateCell) stateCell.textContent = state;
                var statusCell = tr.children[3];
                if (statusCell) statusCell.innerHTML = statusPill(statusInput ? statusInput.value : 'Enable');

                if (table && table.autoTable) {
                    table.autoTable.refresh();
                }
            }

            if (editModal) editModal.hide();
        });
    }
});
