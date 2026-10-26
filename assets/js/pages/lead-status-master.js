/**
 * Gharuda CRM - Lead Status Master Page Script
 * File: assets/js/pages/lead-status-master.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var table = document.getElementById('leadStatusTable');
    var editModalEl = document.getElementById('editModal');
    var creationModalEl = document.getElementById('creationModal');

    function getExistingNames(excludeId) {
        var names = [];
        var rows = document.querySelectorAll('#leadStatusTable tbody tr');
        rows.forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) return;
            var nameCell = tr.querySelector('.status-name') || tr.children[1];
            if (nameCell) names.push(nameCell.textContent.trim().toLowerCase());
        });
        return names;
    }

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    function populateEditData(btn) {
        var tr = btn.closest('tr');
        if (!tr) return;
        var id = tr.getAttribute('data-id') || btn.getAttribute('data-id');
        var nameCell = tr.querySelector('.status-name') || tr.children[1];
        var statusPillEl = tr.querySelector('.status-pill');

        var editIdEl = document.getElementById('edit_status_id');
        var editNameEl = document.getElementById('edit_status_name');
        var editStatusEl = document.getElementById('edit_status_val');

        if (editIdEl) editIdEl.value = id || '';
        if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
        var statusVal = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';
        if (editStatusEl) {
            editStatusEl.value = statusVal;
            if (window.jQuery && $(editStatusEl).data('select2')) {
                $(editStatusEl).val(statusVal).trigger('change');
            }
        }
        if (typeof window.ghSyncSelect2 === 'function') {
            window.ghSyncSelect2('#editModal');
        }
    }

    // Modal show hook: whenever editModal is triggered, ensure fields are populated
    if (editModalEl) {
        editModalEl.addEventListener('show.bs.modal', function (event) {
            var btn = event.relatedTarget;
            if (btn && btn.classList.contains('btn-edit')) {
                populateEditData(btn);
            }
        });
    }

    // Reset creation form when creationModal closes
    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', function () {
            var nameInput = document.getElementById('create_status_name');
            var statusInput = document.getElementById('create_status');
            if (nameInput) nameInput.value = '';
            if (statusInput) {
                statusInput.value = 'Enable';
                if (window.jQuery && $(statusInput).data('select2')) {
                    $(statusInput).val('Enable').trigger('change');
                }
            }
        });
    }

    // Document-level event delegation for Edit and Delete
    document.addEventListener('click', function (e) {
        var editBtn = e.target.closest('.btn-edit');
        var deleteBtn = e.target.closest('.btn-delete');

        if (editBtn) {
            populateEditData(editBtn);
            if (editModalEl && window.bootstrap && window.bootstrap.Modal) {
                var modal = bootstrap.Modal.getOrCreateInstance(editModalEl);
                modal.show();
            }
        }

        if (deleteBtn) {
            if (confirm('Are you sure you want to delete this lead status?')) {
                var delTr = deleteBtn.closest('tr');
                if (delTr) {
                    delTr.remove();
                    if (table && table.autoTable && typeof table.autoTable.render === 'function') {
                        table.autoTable.render();
                    }
                }
            }
        }
    });

    // Create Save
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var nameInput = document.getElementById('create_status_name');
            var statusInput = document.getElementById('create_status');
            var name = nameInput ? nameInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Lead status already exists.');
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
                    '<td class="status-name">' + escapeHtml(name) + '</td>' +
                    '<td>' + statusPill(statusInput ? statusInput.value : 'Enable') + '</td>' +
                    '<td>' + today + '</td>' +
                    '<td>' +
                        '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + newId + '" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                            '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + newId + '" title="Delete"><i class="mdi mdi-delete"></i></button>' +
                            '</div>' +
                    '</td>' +
                '</tr>';

            var tbodyEl = document.getElementById('leadStatusTbody');
            if (tbodyEl) {
                tbodyEl.insertAdjacentHTML('afterbegin', rowHtml);
                if (table && table.autoTable && typeof table.autoTable.render === 'function') {
                    table.autoTable.render();
                }
            }

            if (creationModalEl && window.bootstrap && window.bootstrap.Modal) {
                var modal = bootstrap.Modal.getInstance(creationModalEl);
                if (modal) modal.hide();
            }
        });
    }

    // Edit Save
    var btnEditSave = document.getElementById('btnEditSave');
    if (btnEditSave) {
        btnEditSave.addEventListener('click', function () {
            var editIdEl = document.getElementById('edit_status_id');
            var nameInput = document.getElementById('edit_status_name');
            var statusInput = document.getElementById('edit_status_val');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Lead status already exists.');
                return;
            }

            var tr = document.querySelector('#leadStatusTable tr[data-id="' + id + '"]');
            if (tr) {
                var nameCell = tr.querySelector('.status-name') || tr.children[1];
                if (nameCell) nameCell.textContent = name;
                var statusCell = tr.children[2];
                if (statusCell) statusCell.innerHTML = statusPill(statusInput ? statusInput.value : 'Enable');

                if (table && table.autoTable && typeof table.autoTable.render === 'function') {
                    table.autoTable.render();
                }
            }

            if (editModalEl && window.bootstrap && window.bootstrap.Modal) {
                var modal = bootstrap.Modal.getInstance(editModalEl);
                if (modal) modal.hide();
            }
        });
    }

    function escapeHtml(text) {
        if (!text) return '';
        return String(text).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
    }
});
