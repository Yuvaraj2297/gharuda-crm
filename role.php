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

<script src="./assets/js/pages/role.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
