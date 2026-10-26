/**
 * Gharuda CRM - Lead Stage Page Script
 * File: assets/js/pages/lead-stage.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var table = document.getElementById('leadStageTable');
    var tbody = document.getElementById('leadStageTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    function resetCreationForm() {
        var nameInput = document.getElementById('create_stage_name');
        var orderInput = document.getElementById('create_order_no');
        var statusInput = document.getElementById('create_status');
        if (nameInput) nameInput.value = '';
        if (orderInput) orderInput.value = '1';
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
            var nameCell = tr.querySelector('.stage-name') || tr.children[1];
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
            var nameInput = document.getElementById('create_stage_name');
            var orderInput = document.getElementById('create_order_no');
            var statusInput = document.getElementById('create_status');
            var name = nameInput ? nameInput.value.trim() : '';
            var orderNo = orderInput ? parseInt(orderInput.value, 10) : 1;

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (isNaN(orderNo) || orderNo < 1) {
                if (orderInput) orderInput.focus();
                return;
            }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Stage name already exists.');
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
                    '<td class="stage-name">' + name + '</td>' +
                    '<td class="stage-order">' + orderNo + '</td>' +
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
                var nameCell = tr.querySelector('.stage-name') || tr.children[1];
                var orderCell = tr.querySelector('.stage-order') || tr.children[2];
                var statusPillEl = tr.querySelector('.status-pill');

                var editIdEl = document.getElementById('edit_stage_id');
                var editNameEl = document.getElementById('edit_stage_name');
                var editOrderEl = document.getElementById('edit_order_no');
                var editStatusEl = document.getElementById('edit_status');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
                if (editOrderEl) editOrderEl.value = orderCell ? orderCell.textContent.trim() : '1';
                if (editStatusEl) editStatusEl.value = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';

                if (typeof window.ghSyncSelect2 === 'function') {
                    window.ghSyncSelect2('#editModal');
                }

                if (editModal) editModal.show();
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this stage?')) {
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
            var editIdEl = document.getElementById('edit_stage_id');
            var nameInput = document.getElementById('edit_stage_name');
            var orderInput = document.getElementById('edit_order_no');
            var statusInput = document.getElementById('edit_status');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var orderNo = orderInput ? parseInt(orderInput.value, 10) : 1;

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (isNaN(orderNo) || orderNo < 1) {
                if (orderInput) orderInput.focus();
                return;
            }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Stage name already exists.');
                return;
            }

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                var nameCell = tr.querySelector('.stage-name') || tr.children[1];
                if (nameCell) nameCell.textContent = name;
                var orderCell = tr.querySelector('.stage-order') || tr.children[2];
                if (orderCell) orderCell.textContent = orderNo;
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
