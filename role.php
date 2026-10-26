<?php include 'header.php'; ?>

 

<style>
    /* ===== Fullscreen Permissions Modal (Modern Permission Matrix Design) ===== */
    .role-perm-modal .modal-content {
        border-radius: 16px;
        border: none;
        box-shadow: 0 20px 50px rgba(0,0,0,0.18);
        max-height: calc(100vh - 50px);
        overflow: hidden;
    }

    .role-perm-modal .rp-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 16px 24px;
        background: #ffffff;
        border-bottom: 1px solid #eef0f3;
        flex-wrap: wrap;
    }

    .role-perm-modal .rp-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        font-weight: 800;
        color: var(--ink-900, #14162b);
        margin: 0;
    }

    .role-perm-modal .rp-title .icon-chip {
        width: 38px;
        height: 38px;
    }

    .role-perm-modal .rp-role-name {
        font-size: 12px;
        font-weight: 700;
        color: var(--primary-dark, #0ca308);
        background: var(--primary-soft, #e8f7ea);
        padding: 5px 14px;
        border-radius: 999px;
        border: 1px solid rgba(12, 163, 8, 0.2);
    }

    .role-perm-modal .rp-tools {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .role-perm-modal .rp-search-wrap {
        position: relative;
    }

    .role-perm-modal .rp-search-wrap i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #7a7f8c;
        font-size: 13px;
        pointer-events: none;
    }

    .role-perm-modal .rp-search-wrap input {
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 7px 14px 7px 34px;
        font-size: 12.5px;
        font-weight: 500;
        width: 220px;
        transition: all 0.2s ease;
    }

    .role-perm-modal .rp-search-wrap input:focus {
        outline: none;
        border-color: var(--primary, #0ca308);
        box-shadow: 0 0 0 3px var(--primary-soft, #e8f7ea);
    }

    .role-perm-modal .rp-count-chip {
        font-size: 12px;
        font-weight: 700;
        color: var(--primary-dark, #0ca308);
        background: var(--primary-soft, #e8f7ea);
        padding: 6px 14px;
        border-radius: 999px;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1px solid rgba(12, 163, 8, 0.2);
    }

    .role-perm-modal .rp-body {
        display: flex;
        padding: 0;
        flex: 1 1 auto;
        min-height: 0;
        overflow: hidden;
        background: #f8fafc;
    }

    /* Matrix Content */
    .role-perm-modal .rp-matrix-content {
        flex: 1 1 auto;
        width: 100%;
        display: flex;
        flex-direction: column;
        min-height: 0;
        overflow-y: auto;
        background: #ffffff;
    }

    .rp-matrix-table-wrap {
        padding: 0;
    }

    .rp-matrix-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .rp-matrix-table thead th {
        position: sticky;
        top: 0;
        z-index: 10;
        background: #f8fafc;
        padding: 12px 14px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        border-bottom: 2px solid #e2e8f0;
        white-space: nowrap;
    }

    .rp-matrix-table th.col-center,
    .rp-matrix-table td.col-center {
        text-align: center;
    }

    .rp-matrix-group-banner-row td {
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        padding: 10px 18px;
        font-size: 12px;
        font-weight: 800;
        color: #334155;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        border-top: 1px solid #cbd5e1;
        border-bottom: 1px solid #cbd5e1;
    }

    .rp-matrix-module-row td {
        background: #f8fafc;
        padding: 8px 16px;
        border-top: 1px solid #eef0f3;
        border-bottom: 1px solid #eef0f3;
    }

    .rp-module-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .rp-module-tag {
        font-size: 10.5px;
        font-weight: 700;
        background: #e2e8f0;
        color: #475569;
        padding: 2px 8px;
        border-radius: 4px;
        margin-right: 8px;
        text-transform: uppercase;
    }

    .rp-module-title {
        font-size: 12.5px;
        font-weight: 700;
        color: #1e293b;
    }

    .rp-btn-toggle-module {
        font-size: 11px;
        font-weight: 600;
        color: var(--primary-dark, #0ca308);
        background: var(--primary-soft, #e8f7ea);
        border: 1px solid rgba(12, 163, 8, 0.2);
        padding: 2px 10px;
        border-radius: 999px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .rp-btn-toggle-module:hover {
        background: #cdefd2;
    }

    .rp-matrix-row {
        transition: background 0.12s ease;
    }

    .rp-matrix-row:hover {
        background: #f8fafc;
    }

    .rp-matrix-row td {
        padding: 10px 14px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
        font-size: 12.5px;
    }

    .rp-submodule-cell {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        color: #1e293b;
    }

    .rp-submodule-bullet {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #cbd5e1;
        flex-shrink: 0;
    }

    .rp-matrix-row:hover .rp-submodule-bullet {
        background: var(--primary, #0ca308);
    }

    /* Checkbox Styling */
    .rp-cb-wrap {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .rp-cb-wrap:hover {
        background: #f1f5f9;
    }

    .rp-cb-wrap input[type="checkbox"] {
        width: 17px;
        height: 17px;
        margin: 0;
        cursor: pointer;
        accent-color: var(--primary, #0ca308);
    }

    .rp-dash {
        color: #cbd5e1;
        font-size: 14px;
        font-weight: 700;
        user-select: none;
    }

    .rp-row-all-btn {
        font-size: 10.5px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 999px;
        background: #f1f5f9;
        color: #64748b;
        cursor: pointer;
        border: 1px solid #e2e8f0;
        white-space: nowrap;
        transition: all 0.15s ease;
    }

    .rp-row-all-btn:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .rp-row-all-btn.all-checked {
        background: var(--primary-soft, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        border-color: rgba(12, 163, 8, 0.3);
    }

    .role-perm-modal .rp-foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 12px 24px;
        border-top: 1px solid #eef0f3;
        background: #ffffff;
        border-radius: 0 0 16px 16px;
    }
</style>

<div class="card-custom p-0" id="roleTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-person-gear"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Role</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="roleTable">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Role Name</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody id="roleTbody">
                <tr data-id="1">
                    <td>1</td>
                    <td class="role-name">Employee</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>18-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm primary btn-role-perms" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Permissions"><i class="bi bi-shield-lock"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>2</td>
                    <td class="role-name">Manager</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>20-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm primary btn-role-perms" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Permissions"><i class="bi bi-shield-lock"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>3</td>
                    <td class="role-name">HR Admin</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>22-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm primary btn-role-perms" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Permissions"><i class="bi bi-shield-lock"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>4</td>
                    <td class="role-name">Finance</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>05-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm primary btn-role-perms" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Permissions"><i class="bi bi-shield-lock"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>5</td>
                    <td class="role-name">Admin</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>10-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm primary btn-role-perms" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Permissions"><i class="bi bi-shield-lock"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
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
                <h5 class="modal-title" id="creationModalLabel">Role Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label" for="create_role_name">Role Name</label>
                        <input type="text" class="form-control" id="create_role_name" placeholder="Enter Role Name" autocomplete="off">
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
                <h5 class="modal-title" id="editModalLabel">Edit Role</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_role_id">
                    <div class="mb-3">
                        <label class="form-label" for="edit_role_name">Role Name</label>
                        <input type="text" class="form-control" id="edit_role_name" placeholder="Enter Role Name" autocomplete="off">
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

<!-- Permissions Fullscreen Modal (Modern Permission Matrix Design) -->
<div class="modal fade role-perm-modal" id="rolePermModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content d-flex flex-column">
            <div class="rp-head">
                <h5 class="rp-title">
                    <span class="icon-chip"><i class="bi bi-shield-lock-fill"></i></span>
                    Role Permissions Matrix
                    <span class="rp-role-name" id="rpRoleName">—</span>
                </h5>
                <div class="rp-tools">
                    <div class="rp-search-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" id="rpSearch" placeholder="Search submodule or module…" autocomplete="off">
                    </div>
                    <span class="rp-count-chip">
                        <i class="bi bi-check-circle-fill"></i>
                        Granted: <strong id="rpSelectedCount">0</strong>
                    </span>
                    <button type="button" class="btn btn-sm btn-outline-success" id="rpSelectAll">
                        <i class="bi bi-check2-all me-1"></i> Select All
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="rpDeselectAll">
                        <i class="bi bi-dash-circle me-1"></i> Deselect All
                    </button>
                    <button type="button" class="modal-close ms-2" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
            </div>
            <div class="rp-body">
                <!-- Matrix Table -->
                <div class="rp-matrix-content">
                    <div class="rp-matrix-table-wrap">
                        <table class="rp-matrix-table">
                            <thead>
                                <tr>
                                    <th style="width: 32%;">Sub Module</th>
                                    <th class="col-center" style="width: 11%;">View (Own)</th>
                                    <th class="col-center" style="width: 12%;">View (Global)</th>
                                    <th class="col-center" style="width: 11%;">Create</th>
                                    <th class="col-center" style="width: 11%;">Edit</th>
                                    <th class="col-center" style="width: 11%;">Delete</th>
                                    <th class="col-center" style="width: 12%;">All</th>
                                </tr>
                            </thead>
                            <tbody id="rpPermRows">
                                <!-- Group, module & submodule rows populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="rp-foot">
                <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 12px;">
                    <i class="bi bi-shield-check text-primary"></i>
                    Configure capability matrix for this role. Click <strong>Save Permissions</strong> to store.
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-sm" id="rpSave">
                        <i class="mdi mdi-content-save me-1"></i> Save Permissions
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>

<?php include 'footer.php'; ?>
