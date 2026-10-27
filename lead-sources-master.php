<?php include 'header.php'; ?>

<div class="card-custom p-0" id="leadSourceTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-diagram-2"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Lead Source</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class via auto-master-table.js) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="leadSourceTable" data-table-name="Lead Sources">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Lead Source</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="leadSourceTbody">
                <tr data-id="1">
                    <td>1</td>
                    <td class="source-name">IndiaMart</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>18-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>2</td>
                    <td class="source-name">Website</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>20-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>3</td>
                    <td class="source-name">Facebook Ads</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>22-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>4</td>
                    <td class="source-name">Google Ads</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>05-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>5</td>
                    <td class="source-name">Referral</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>12-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="6">
                    <td>6</td>
                    <td class="source-name">Walk-in</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>15-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="6" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="6" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="7">
                    <td>7</td>
                    <td class="source-name">Cold Call</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>20-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="7" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="7" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Creation Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creationModalLabel">Lead Source Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label" for="create_source_name">Lead Source <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="create_source_name" placeholder="Enter Lead Source" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="create_status">Status</label>
                        <select class="form-select select2" id="create_status">
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnCreateSave">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Lead Source</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_source_id">
                    <div class="mb-3">
                        <label class="form-label" for="edit_source_name">Lead Source <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="edit_source_name" placeholder="Enter Lead Source" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_status">Status</label>
                        <select class="form-select select2" id="edit_status">
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnEditSave">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var table = document.getElementById('leadSourceTable');
    var editModalEl = document.getElementById('editModal');
    var creationModalEl = document.getElementById('creationModal');

    function getExistingNames(excludeId) {
        var names = [];
        var rows = document.querySelectorAll('#leadSourceTable tbody tr');
        rows.forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) return;
            var nameCell = tr.querySelector('.source-name') || tr.children[1];
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
        var nameCell = tr.querySelector('.source-name') || tr.children[1];
        var statusPillEl = tr.querySelector('.status-pill');

        var editIdEl = document.getElementById('edit_source_id');
        var editNameEl = document.getElementById('edit_source_name');
        var editStatusEl = document.getElementById('edit_status');

        if (editIdEl) editIdEl.value = id || '';
        if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
        var statusVal = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';
        if (editStatusEl) {
            editStatusEl.value = statusVal;
            if (window.jQuery && $(editStatusEl).data('select2')) {
                $(editStatusEl).val(statusVal).trigger('change');
            }
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
            var nameInput = document.getElementById('create_source_name');
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
            if (confirm('Are you sure you want to delete this lead source?')) {
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
            var nameInput = document.getElementById('create_source_name');
            var statusInput = document.getElementById('create_status');
            var name = nameInput ? nameInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Lead source already exists.');
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
                    '<td class="source-name">' + escapeHtml(name) + '</td>' +
                    '<td>' + statusPill(statusInput ? statusInput.value : 'Enable') + '</td>' +
                    '<td>' + today + '</td>' +
                    '<td>' +
                        '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + newId + '" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                            '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + newId + '" title="Delete"><i class="mdi mdi-delete"></i></button>' +
                        </div>' +
                    '</td>' +
                '</tr>';

            var tbodyEl = document.getElementById('leadSourceTbody');
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
            var editIdEl = document.getElementById('edit_source_id');
            var nameInput = document.getElementById('edit_source_name');
            var statusInput = document.getElementById('edit_status');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Lead source already exists.');
                return;
            }

            var tr = document.querySelector('#leadSourceTable tr[data-id="' + id + '"]');
            if (tr) {
                var nameCell = tr.querySelector('.source-name') || tr.children[1];
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
</script>

<?php include 'footer.php'; ?>
