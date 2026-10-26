<?php include 'header.php'; ?>

<div class="card-custom p-0" id="brandTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-patch-check"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Brand Master</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i> Add Brand
        </button>
    </div>

    <!-- Table -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="brandTable" data-table-name="Brands">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Brand Name</th>
                    <th>Code / Prefix</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="brandTbody">
                <tr data-id="1">
                    <td>1</td>
                    <td class="brand-name fw-medium">PhDAssistance</td>
                    <td class="brand-code">PHD</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>15-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>2</td>
                    <td class="brand-name fw-medium">GEO Care</td>
                    <td class="brand-code">GEO</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>18-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>3</td>
                    <td class="brand-name fw-medium">Gharuda Software</td>
                    <td class="brand-code">GHR</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>20-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>4</td>
                    <td class="brand-name fw-medium">Zen Publications</td>
                    <td class="brand-code">ZEN</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>22-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>5</td>
                    <td class="brand-name fw-medium">Thesis Writing</td>
                    <td class="brand-code">THS</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>01-02-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" title="Delete"><i class="mdi mdi-delete"></i></button>
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
                <h5 class="modal-title" id="creationModalLabel">Create Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label" for="create_brand_name"><span class="text-danger">*</span> Brand Name</label>
                        <input type="text" class="form-control" id="create_brand_name" placeholder="Enter Brand Name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="create_brand_code">Brand Code / Prefix</label>
                        <input type="text" class="form-control" id="create_brand_code" placeholder="e.g. GHR, PHD" autocomplete="off">
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
                <h5 class="modal-title" id="editModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_brand_id">
                    <div class="mb-3">
                        <label class="form-label" for="edit_brand_name"><span class="text-danger">*</span> Brand Name</label>
                        <input type="text" class="form-control" id="edit_brand_name" placeholder="Enter Brand Name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="edit_brand_code">Brand Code / Prefix</label>
                        <input type="text" class="form-control" id="edit_brand_code" placeholder="e.g. GHR, PHD" autocomplete="off">
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

    var editModalEl = document.getElementById('editModal');
    var creationModalEl = document.getElementById('creationModal');

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    function populateEditData(btn) {
        var tr = btn.closest('tr');
        if (!tr) return;
        var id = tr.getAttribute('data-id') || btn.getAttribute('data-id');
        var nameCell = tr.querySelector('.brand-name');
        var codeCell = tr.querySelector('.brand-code');
        var statusPillEl = tr.querySelector('.status-pill');

        var editIdEl = document.getElementById('edit_brand_id');
        var editNameEl = document.getElementById('edit_brand_name');
        var editCodeEl = document.getElementById('edit_brand_code');
        var editStatusEl = document.getElementById('edit_status');

        if (editIdEl) editIdEl.value = id || '';
        if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';
        if (editCodeEl) editCodeEl.value = codeCell ? codeCell.textContent.trim() : '';
        var statusVal = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';
        if (editStatusEl) {
            editStatusEl.value = statusVal;
            if (window.jQuery && $(editStatusEl).data('select2')) {
                $(editStatusEl).val(statusVal).trigger('change');
            }
        }
    }

    if (editModalEl) {
        editModalEl.addEventListener('show.bs.modal', function (event) {
            var btn = event.relatedTarget;
            if (btn && btn.classList.contains('btn-edit')) {
                populateEditData(btn);
            }
        });
    }

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', function () {
            var nameInput = document.getElementById('create_brand_name');
            var codeInput = document.getElementById('create_brand_code');
            var statusInput = document.getElementById('create_status');
            if (nameInput) nameInput.value = '';
            if (codeInput) codeInput.value = '';
            if (statusInput) {
                statusInput.value = 'Enable';
                if (window.jQuery && $(statusInput).data('select2')) {
                    $(statusInput).val('Enable').trigger('change');
                }
            }
        });
    }

    // Save Create
    var btnCreate = document.getElementById('btnCreateSave');
    if (btnCreate) {
        btnCreate.addEventListener('click', function () {
            var nameInput = document.getElementById('create_brand_name');
            var codeInput = document.getElementById('create_brand_code');
            var statusInput = document.getElementById('create_status');
            var name = nameInput ? nameInput.value.trim() : '';
            var code = codeInput ? codeInput.value.trim().toUpperCase() : '';
            var status = statusInput ? statusInput.value : 'Enable';

            if (!name) {
                alert('Please enter a Brand Name');
                if (nameInput) nameInput.focus();
                return;
            }

            var tbody = document.getElementById('brandTbody');
            var rowCount = tbody.querySelectorAll('tr').length + 1;
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            var dateStr = dd + '-' + mm + '-' + yyyy;

            var tr = document.createElement('tr');
            tr.setAttribute('data-id', rowCount);
            tr.innerHTML = '<td>' + rowCount + '</td>' +
                '<td class="brand-name fw-medium">' + name + '</td>' +
                '<td class="brand-code">' + (code || '-') + '</td>' +
                '<td>' + statusPill(status) + '</td>' +
                '<td>' + dateStr + '</td>' +
                '<td>' +
                    '<div class="btn-group">' +
                        '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + rowCount + '" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                        '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + rowCount + '" title="Delete"><i class="mdi mdi-delete"></i></button>' +
                    '</div>' +
                '</td>';

            tbody.appendChild(tr);

            var modal = bootstrap.Modal.getInstance(creationModalEl);
            if (modal) modal.hide();
        });
    }

    // Save Edit
    var btnEdit = document.getElementById('btnEditSave');
    if (btnEdit) {
        btnEdit.addEventListener('click', function () {
            var idInput = document.getElementById('edit_brand_id');
            var nameInput = document.getElementById('edit_brand_name');
            var codeInput = document.getElementById('edit_brand_code');
            var statusInput = document.getElementById('edit_status');

            var id = idInput ? idInput.value : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var code = codeInput ? codeInput.value.trim().toUpperCase() : '';
            var status = statusInput ? statusInput.value : 'Enable';

            if (!name) {
                alert('Please enter a Brand Name');
                if (nameInput) nameInput.focus();
                return;
            }

            var tr = document.querySelector('#brandTbody tr[data-id="' + id + '"]');
            if (tr) {
                var nameEl = tr.querySelector('.brand-name');
                var codeEl = tr.querySelector('.brand-code');
                var statusCell = tr.children[3];
                if (nameEl) nameEl.textContent = name;
                if (codeEl) codeEl.textContent = code || '-';
                if (statusCell) statusCell.innerHTML = statusPill(status);
            }

            var modal = bootstrap.Modal.getInstance(editModalEl);
            if (modal) modal.hide();
        });
    }

    // Delete delegation
    document.addEventListener('click', function (e) {
        var delBtn = e.target.closest('.btn-delete');
        if (delBtn) {
            if (confirm('Are you sure you want to delete this brand?')) {
                var tr = delBtn.closest('tr');
                if (tr) tr.remove();
            }
        }
    });
});
</script>

<?php include 'footer.php'; ?>
