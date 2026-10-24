<?php include 'header.php'; ?>

 

<div class="card-custom js-report-table p-0 overflow-hidden" id="loanTypeTableWrap" data-export-name="loan-policies-report">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3 d-flex flex-wrap gap-2">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip" style="background:var(--primary-soft);color:var(--primary-dark);">
                <i class="bi bi-sliders"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Loan & Advance Policies Master</h3>
                <span class="text-muted" style="font-size:12px;">Configure scheme eligibility, interest rates, tenure, and limits</span>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus me-1"></i> Add Policy Scheme
        </button>
    </div>

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 p-3">
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn columns-btn"><i class="bi bi-eye me-1"></i>Columns</button>
            <button type="button" class="btn export-btn-pdf"><i class="bi bi-download me-1"></i>Export <i class="bi bi-chevron-down ms-1" style="font-size:10px;"></i></button>
        </div>

        <div class="mt-search-wrap">
            <i class="bi bi-search mt-search-icon"></i>
            <input type="text" class="mt-search-input" placeholder="Search loan policy..." id="employeeSearch">
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 mb-0" id="loanTypeTable">
            <thead>
                <tr>
                    <th class="text-nowrap">S.No</th>
                    <th class="text-nowrap">Policy Scheme Name</th>
                    <th class="text-nowrap">Category</th>
                    <th class="text-nowrap">Interest Rate (p.a.)</th>
                    <th class="text-nowrap">Max Limit</th>
                    <th class="text-nowrap">Max Tenure</th>
                    <th class="text-nowrap">Eligibility Criteria</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody id="pgBody">
                <tr data-id="1">
                    <td>1</td>
                    <td class="fw-bold text-dark">Personal Emergency Loan</td>
                    <td><span class="badge bg-primary-subtle text-primary">Loan</span></td>
                    <td class="fw-semibold">0.00%</td>
                    <td class="fw-bold text-success">₹1,50,000</td>
                    <td>12 Months</td>
                    <td style="font-size:12px;">Min 6 Mos Service</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>2</td>
                    <td class="fw-bold text-dark">Salary Advance</td>
                    <td><span class="badge bg-warning-subtle text-warning">Advance</span></td>
                    <td class="fw-semibold">0.00%</td>
                    <td class="fw-bold text-success">50% Net Salary</td>
                    <td>3 Months</td>
                    <td style="font-size:12px;">Min 3 Mos Service</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>3</td>
                    <td class="fw-bold text-dark">Medical Assistance Scheme</td>
                    <td><span class="badge bg-primary-subtle text-primary">Loan</span></td>
                    <td class="fw-semibold">0.00%</td>
                    <td class="fw-bold text-success">₹3,00,000</td>
                    <td>24 Months</td>
                    <td style="font-size:12px;">All Confirmed Staff</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>4</td>
                    <td class="fw-bold text-dark">Higher Education & Certification Support</td>
                    <td><span class="badge bg-primary-subtle text-primary">Loan</span></td>
                    <td class="fw-semibold">4.50%</td>
                    <td class="fw-bold text-success">₹2,00,000</td>
                    <td>18 Months</td>
                    <td style="font-size:12px;">Min 1 Year Service</td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>5</td>
                    <td class="fw-bold text-dark">Vehicle Purchase Assistance</td>
                    <td><span class="badge bg-primary-subtle text-primary">Loan</span></td>
                    <td class="fw-semibold">6.00%</td>
                    <td class="fw-bold text-success">₹4,00,000</td>
                    <td>36 Months</td>
                    <td style="font-size:12px;">Min 2 Years Service</td>
                    <td><span class="status-pill status-rejected">Disable</span></td>
                    <td class="text-nowrap action-btns">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" data-bs-toggle="tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Table Footer with Show Entries & Pagination -->
    <div class="d-flex justify-content-between align-items-center report-footer p-3">
        <div class="d-flex gap-2 align-items-center">
            <span class="small text-muted text-nowrap">Show:</span>
            <select class="form-select form-select-sm gh-w-auto" id="showEntries">
                <option selected>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            <span class="small text-muted text-nowrap">Showing <strong id="pgStart">1</strong>–<strong id="pgEnd">5</strong> of <strong id="pgTotal">5</strong></span>
        </div>
        <nav>
            <ul class="pagination pagination-sm mb-0" id="pgList"></ul>
        </nav>
    </div>
</div>

<!-- Creation Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="creationModalLabel">Create New Loan Policy Scheme</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="creationForm" onsubmit="return false;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Scheme Name *</label>
                            <input type="text" class="form-control" placeholder="e.g. Festival Salary Advance" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Classification *</label>
                            <select class="form-select select2">
                                <option value="Loan">Company Term Loan (Multi-Month EMI)</option>
                                <option value="Advance">Salary Advance (Short Term Payroll Recovery)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Annual Interest Rate (%)</label>
                            <input type="number" step="0.1" class="form-control" placeholder="0.0" value="0.0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Maximum Limit (₹)</label>
                            <input type="text" class="form-control" placeholder="e.g. 150000 or 50% Salary">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Max Tenure (Months)</label>
                            <input type="number" class="form-control" placeholder="e.g. 12" value="12">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Min Service Required</label>
                            <select class="form-select">
                                <option>Immediately on Joining</option>
                                <option selected>After Probation (3-6 Months)</option>
                                <option>Minimum 1 Year</option>
                                <option>Minimum 2 Years</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold" style="font-size:12.5px;">Status</label>
                            <select class="form-select select2">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="alert('Loan Policy Scheme added successfully!'); $('#creationModal').modal('hide');">
                    <i class="mdi mdi-content-save me-1"></i> Save Scheme
                </button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/tabel.js"></script>

<?php include 'footer.php'; ?>
