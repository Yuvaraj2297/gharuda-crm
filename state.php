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

<script src="./assets/js/pages/state.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>