<?php include 'header.php'; ?>

<div class="card-custom p-0">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">SLA Policies & Severity</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i> Add SLA Policy
        </button>
    </div>

    <!-- Table -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" data-table-name="SLA Policies & Severity">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Policy Code</th>
                    <th>Severity Level</th>
                    <th>First Response Within</th>
                    <th>Resolution Target</th>
                    <th>Status</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>1</td>
                    <td class="fw-medium">SLA-URG</td>
                    <td class="fw-medium">Critical / Blocker</td>
                    <td class="fw-medium">15 Minutes</td>
                    <td class="fw-medium">2 Hours</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>2</td>
                    <td class="fw-medium">SLA-HI</td>
                    <td class="fw-medium">High Severity</td>
                    <td class="fw-medium">1 Hour</td>
                    <td class="fw-medium">6 Hours</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>3</td>
                    <td class="fw-medium">SLA-MED</td>
                    <td class="fw-medium">Medium Severity</td>
                    <td class="fw-medium">4 Hours</td>
                    <td class="fw-medium">24 Hours</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>4</td>
                    <td class="fw-medium">SLA-LOW</td>
                    <td class="fw-medium">Low / Inquiry</td>
                    <td class="fw-medium">8 Hours</td>
                    <td class="fw-medium">48 Hours</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="modal" data-bs-target="#editModal" title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Creation Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create SLA Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Policy Code</label>
                        <input type="text" class="form-control" placeholder="Enter Policy Code" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Severity Level <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Severity Level" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">First Response Within</label>
                        <input type="text" class="form-control" placeholder="Enter First Response Within" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Resolution Target</label>
                        <input type="text" class="form-control" placeholder="Enter Resolution Target" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Status</label>
                        <select class="form-select select2">
                            <option value="Enable" selected>Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit SLA Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Policy Code</label>
                        <input type="text" class="form-control" placeholder="Enter Policy Code" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Severity Level <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Severity Level" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">First Response Within</label>
                        <input type="text" class="form-control" placeholder="Enter First Response Within" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Resolution Target</label>
                        <input type="text" class="form-control" placeholder="Enter Resolution Target" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Status</label>
                        <select class="form-select select2">
                            <option value="Enable" selected>Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="mdi mdi-content-save me-1"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>