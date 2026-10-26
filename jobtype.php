<?php include 'header.php'; ?>

 

<div class="card-custom p-0" id="jobtypeTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-briefcase"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Job Type</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="jobTypeTable">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Job Type</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="jobTypeTbody">
                <tr data-id="1">
                    <td>1</td>
                    <td class="jobtype-name">Work from Office</td>
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
                    <td class="jobtype-name">Work from Home</td>
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
                    <td class="jobtype-name">Hybrid</td>
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
                    <td class="jobtype-name">Remote</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>05-01-2026</td>
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
<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creationModalLabel">Job Type Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label" for="create_jobtype_name">Job Type</label>
                        <input type="text" class="form-control" id="create_jobtype_name" placeholder="Enter Job Type" autocomplete="off">
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
                <h5 class="modal-title" id="editModalLabel">Edit Job Type</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_jobtype_id">
                    <div class="mb-3">
                        <label class="form-label" for="edit_jobtype_name">Job Type</label>
                        <input type="text" class="form-control" id="edit_jobtype_name" placeholder="Enter Job Type" autocomplete="off">
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

<script src="./assets/js/pages/jobtype.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
