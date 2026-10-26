<?php include 'header.php'; ?>

<div class="card-custom p-0">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-box-seam"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Product Catalog Master</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i> Add Product
        </button>
    </div>

    <!-- Table -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" data-table-name="Product Catalog Master">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Product Code</th>
                    <th>Product / Service Name</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Tax Rate</th>
                    <th>Status</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr data-id="1">
                    <td>1</td>
                    <td class="fw-medium">PRD-001</td>
                    <td class="fw-medium">Cloud CRM Enterprise License</td>
                    <td class="fw-medium">Software License</td>
                    <td class="fw-medium">₹25,000 / yr</td>
                    <td class="fw-medium">18% GST</td>
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
                    <td class="fw-medium">PRD-002</td>
                    <td class="fw-medium">API Integration Add-on</td>
                    <td class="fw-medium">Integration</td>
                    <td class="fw-medium">₹15,000</td>
                    <td class="fw-medium">18% GST</td>
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
                    <td class="fw-medium">PRD-003</td>
                    <td class="fw-medium">Onboarding &amp; Training Pack</td>
                    <td class="fw-medium">Consulting</td>
                    <td class="fw-medium">₹10,000</td>
                    <td class="fw-medium">18% GST</td>
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
                    <td class="fw-medium">PRD-004</td>
                    <td class="fw-medium">Custom Report Builder Module</td>
                    <td class="fw-medium">Software Module</td>
                    <td class="fw-medium">₹8,500</td>
                    <td class="fw-medium">18% GST</td>
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
                <h5 class="modal-title">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Product Code</label>
                        <input type="text" class="form-control" placeholder="Enter Product Code" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Product / Service Name <span class=\"text-danger\">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Product / Service Name" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Category</label>
                        <input type="text" class="form-control" placeholder="Enter Category" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Unit Price</label>
                        <input type="text" class="form-control" placeholder="Enter Unit Price" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Tax Rate</label>
                        <input type="text" class="form-control" placeholder="Enter Tax Rate" autocomplete="off">
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
                <h5 class="modal-title">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Product Code</label>
                        <input type="text" class="form-control" placeholder="Enter Product Code" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Product / Service Name <span class=\"text-danger\">*</span></label>
                        <input type="text" class="form-control" placeholder="Enter Product / Service Name" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Category</label>
                        <input type="text" class="form-control" placeholder="Enter Category" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Unit Price</label>
                        <input type="text" class="form-control" placeholder="Enter Unit Price" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Tax Rate</label>
                        <input type="text" class="form-control" placeholder="Enter Tax Rate" autocomplete="off">
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