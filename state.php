<?php include 'header.php'; ?>

 

<div class="card-custom p-0" id="stateTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip icon-chip-amber">
                <i class="bi bi-map"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">State</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="stateTable">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>State Name</th>
                    <th>State Code</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="stateTbody">
                <tr data-id="1">
                    <td>1</td>
                    <td class="state-name">Tamil Nadu</td>
                    <td class="state-code">TN</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>10-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>2</td>
                    <td class="state-name">Maharashtra</td>
                    <td class="state-code">MH</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>12-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>3</td>
                    <td class="state-name">Karnataka</td>
                    <td class="state-code">KA</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>15-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>4</td>
                    <td class="state-name">Kerala</td>
                    <td class="state-code">KL</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>18-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>5</td>
                    <td class="state-name">Andhra Pradesh</td>
                    <td class="state-code">AP</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>20-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="6">
                    <td>6</td>
                    <td class="state-name">Telangana</td>
                    <td class="state-code">TS</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>22-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="6" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="6" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="7">
                    <td>7</td>
                    <td class="state-name">Gujarat</td>
                    <td class="state-code">GJ</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>25-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="8">
                    <td>8</td>
                    <td class="state-name">Rajasthan</td>
                    <td class="state-code">RJ</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-rejected">Disable</span></td>
                    <td>28-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="9">
                    <td>9</td>
                    <td class="state-name">West Bengal</td>
                    <td class="state-code">WB</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>30-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="9" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="9" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="10">
                    <td>10</td>
                    <td class="state-name">Uttar Pradesh</td>
                    <td class="state-code">UP</td>
                    <td class="state-country">India</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>02-02-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
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
                <h5 class="modal-title" id="creationModalLabel">State Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label" for="create_state_name">State Name</label>
                        <input type="text" class="form-control" id="create_state_name" placeholder="Enter state name" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="create_state_code">State Code</label>
                        <input type="text" class="form-control" id="create_state_code" placeholder="e.g. TN" maxlength="5" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="create_country">Country</label>
                        <select class="form-select select2" id="create_country" data-placeholder="Select country">
                            <option value=""></option>
                            <option value="India">India</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Australia">Australia</option>
                            <option value="Canada">Canada</option>
                            <option value="Germany">Germany</option>
                            <option value="Singapore">Singapore</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                        </select>
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
                <h5 class="modal-title" id="editModalLabel">Edit State</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_state_id">
                    <div class="mb-3">
                        <label class="form-label" for="edit_state_name">State Name</label>
                        <input type="text" class="form-control" id="edit_state_name" placeholder="Enter state name" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_state_code">State Code</label>
                        <input type="text" class="form-control" id="edit_state_code" placeholder="e.g. TN" maxlength="5" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_country">Country</label>
                        <select class="form-select select2" id="edit_country" data-placeholder="Select country">
                            <option value=""></option>
                            <option value="India">India</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Australia">Australia</option>
                            <option value="Canada">Canada</option>
                            <option value="Germany">Germany</option>
                            <option value="Singapore">Singapore</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                        </select>
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

    var table = document.getElementById('stateTable');
    var tbody = document.getElementById('stateTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    function resetCreationForm() {
        var nameInput = document.getElementById('create_state_name');
        var codeInput = document.getElementById('create_state_code');
        var countryInput = document.getElementById('create_country');
        var statusInput = document.getElementById('create_status');
        if (nameInput) nameInput.value = '';
        if (codeInput) codeInput.value = '';
        if (countryInput) countryInput.value = '';
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
            var nameCell = tr.querySelector('.state-name') || tr.children[1];
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
            var nameInput = document.getElementById('create_state_name');
            var codeInput = document.getElementById('create_state_code');
            var countryInput = document.getElementById('create_country');
            var statusInput = document.getElementById('create_status');

            var name = nameInput ? nameInput.value.trim() : '';
            var code = codeInput ? codeInput.value.trim().toUpperCase() : '';
            var country = countryInput ? countryInput.value.trim() : '';

            if (!name) { if (nameInput) nameInput.focus(); return; }
            if (!code) { if (codeInput) codeInput.focus(); return; }
            if (!country) { if (countryInput) countryInput.focus(); return; }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('State name already exists.');
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
                    '<td class="state-name">' + name + '</td>' +
                    '<td class="state-code">' + code + '</td>' +
                    '<td class="state-country">' + country + '</td>' +
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
                var nameCell = tr.querySelector('.state-name') || tr.children[1];
                var codeCell = tr.querySelector('.state-code') || tr.children[2];
                var countryCell = tr.querySelector('.state-country') || tr.children[3];
                var statusPillEl = tr.querySelector('.status-pill');

                var editIdEl = document.getElementById('edit_state_id');
                var editNameEl = document.getElementById('edit_state_name');
                var editCodeEl = document.getElementById('edit_state_code');
                var editCountryEl = document.getElementById('edit_country');
                var editStatusEl = document.getElementById('edit_status');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
                if (editCodeEl) editCodeEl.value = codeCell ? codeCell.textContent.trim() : '';
                if (editCountryEl) editCountryEl.value = countryCell ? countryCell.textContent.trim() : '';
                if (editStatusEl) editStatusEl.value = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';

                if (typeof window.ghSyncSelect2 === 'function') {
                    window.ghSyncSelect2('#editModal');
                }

                if (editModal) editModal.show();
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this state?')) {
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
            var editIdEl = document.getElementById('edit_state_id');
            var nameInput = document.getElementById('edit_state_name');
            var codeInput = document.getElementById('edit_state_code');
            var countryInput = document.getElementById('edit_country');
            var statusInput = document.getElementById('edit_status');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var code = codeInput ? codeInput.value.trim().toUpperCase() : '';
            var country = countryInput ? countryInput.value.trim() : '';

            if (!name) { if (nameInput) nameInput.focus(); return; }
            if (!code) { if (codeInput) codeInput.focus(); return; }
            if (!country) { if (countryInput) countryInput.focus(); return; }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('State name already exists.');
                return;
            }

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                var nameCell = tr.querySelector('.state-name') || tr.children[1];
                if (nameCell) nameCell.textContent = name;
                var codeCell = tr.querySelector('.state-code') || tr.children[2];
                if (codeCell) codeCell.textContent = code;
                var countryCell = tr.querySelector('.state-country') || tr.children[3];
                if (countryCell) countryCell.textContent = country;
                var statusCell = tr.children[4];
                if (statusCell) statusCell.innerHTML = statusPill(statusInput ? statusInput.value : 'Enable');

                if (table && table.autoTable) {
                    table.autoTable.refresh();
                }
            }

            if (editModal) editModal.hide();
        });
    }
});
</script>

<?php include 'footer.php'; ?>