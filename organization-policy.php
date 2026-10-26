<?php include 'header.php'; ?>

 
 

<style>
    /* Policy file icon in table */
    .policy-file-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }
    .policy-file-icon.pdf { background: #fef2f2; color: #dc2626; }
    .policy-file-icon.doc { background: #eff6ff; color: #2563eb; }
    .policy-file-icon.xls { background: #f0fdf4; color: #16a34a; }
    .policy-file-icon.img { background: #fefce8; color: #ca8a04; }
    .policy-file-icon.other { background: #f3f4f6; color: #6b7280; }
    .policy-name { font-size: 13px; }
    .policy-file-sub { font-size: 11px; color: #6b7280; }
    .th-w-70 { width: 70px; }
    .th-w-120 { width: 120px; }

    /* Upload area in modal */
    .policy-upload-area {
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 30px 20px;
        text-align: center;
        cursor: pointer;
        transition: all .2s ease;
        background: #fafbfc;
    }
    .policy-upload-area:hover,
    .policy-upload-area.dragover {
        border-color: var(--primary, #0ca308);
        background: #f0fdf4;
    }
    .policy-upload-area .upload-icon {
        font-size: 36px;
        color: #d1d5db;
        margin-bottom: 8px;
    }
    .policy-upload-area:hover .upload-icon,
    .policy-upload-area.dragover .upload-icon {
        color: var(--primary, #0ca308);
    }
    .policy-upload-area .upload-text {
        font-size: 13.5px;
        font-weight: 600;
        color: #4b5563;
    }
    .policy-upload-area .upload-hint {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 4px;
    }
    .policy-upload-area .upload-browse {
        color: var(--primary, #0ca308);
        font-weight: 700;
        text-decoration: underline;
        cursor: pointer;
    }

    /* File preview */
    .policy-file-preview {
        display: none;
        align-items: center;
        gap: 12px;
        padding: 10px 14px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        margin-top: 10px;
    }
    .policy-file-preview.show {
        display: flex;
    }
    .policy-file-preview .file-icon {
        font-size: 26px;
        color: #16a34a;
    }
    .policy-file-preview .file-info {
        flex: 1;
        overflow: hidden;
    }
    .policy-file-preview .file-name {
        font-size: 13px;
        font-weight: 700;
        color: #15803d;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .policy-file-preview .file-size {
        font-size: 11px;
        color: #6b7280;
    }
    .policy-file-preview .file-remove {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        border: none;
        background: #dcfce7;
        color: #16a34a;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
        transition: background .15s;
    }
    .policy-file-preview .file-remove:hover {
        background: #bbf7d0;
    }
</style>

<div class="card-custom p-0" id="policyTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Organization Policy</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="policyTable">
            <thead>
                <tr>
                    <th class="th-w-70">S.No</th>
                    <th>Policy Name</th>
                    <th>Category</th>
                    <th>Uploaded By</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th class="th-w-120">Action</th>
                </tr>
            </thead>
            <tbody id="policyTbody">
                <tr data-id="1" data-desc="Annual leave policy covering casual, sick, and earned leaves." data-file="leave-policy-2026.pdf" data-file-type="pdf">
                    <td>1</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Leave Policy 2026</div>
                                <div class="policy-file-sub">leave-policy-2026.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Leave Policy</td>
                    <td class="policy-uploaded-by">Admin</td>
                    <td class="policy-date">01-01-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2" data-desc="Guidelines for remote work eligibility and expectations." data-file="wfh-policy.pdf" data-file-type="pdf">
                    <td>2</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Work From Home Policy</div>
                                <div class="policy-file-sub">wfh-policy.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Work From Home</td>
                    <td class="policy-uploaded-by">HR Manager</td>
                    <td class="policy-date">15-02-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3" data-desc="Workplace behavior standards and ethical guidelines." data-file="code-of-conduct.docx" data-file-type="doc">
                    <td>3</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon doc"><i class="bi bi-filetype-docx"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Code of Conduct</div>
                                <div class="policy-file-sub">code-of-conduct.docx</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Code of Conduct</td>
                    <td class="policy-uploaded-by">Admin</td>
                    <td class="policy-date">01-01-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4" data-desc="Information security and data protection measures." data-file="data-security.pdf" data-file-type="pdf">
                    <td>4</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Data Security Policy</div>
                                <div class="policy-file-sub">data-security.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Data Security</td>
                    <td class="policy-uploaded-by">CTO</td>
                    <td class="policy-date">10-03-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5" data-desc="Zero tolerance policy against workplace harassment." data-file="anti-harassment.pdf" data-file-type="pdf">
                    <td>5</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Anti-Harassment Policy</div>
                                <div class="policy-file-sub">anti-harassment.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Anti-Harassment</td>
                    <td class="policy-uploaded-by">HR Manager</td>
                    <td class="policy-date">01-01-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="6" data-desc="Salary structure and benefits framework." data-file="compensation-2025.xlsx" data-file-type="xls">
                    <td>6</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon xls"><i class="bi bi-filetype-xlsx"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Compensation Guidelines</div>
                                <div class="policy-file-sub">compensation-2025.xlsx</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Compensation &amp; Benefits</td>
                    <td class="policy-uploaded-by">Finance Head</td>
                    <td class="policy-date">20-03-2026</td>
                    <td class="policy-status"><span class="status-pill status-rejected">Disable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="6" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="6" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="6" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="7" data-desc="Workplace health and safety compliance rules." data-file="health-safety.pdf" data-file-type="pdf">
                    <td>7</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Health &amp; Safety Rules</div>
                                <div class="policy-file-sub">health-safety.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Health &amp; Safety</td>
                    <td class="policy-uploaded-by">Admin</td>
                    <td class="policy-date">05-01-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="7" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="8" data-desc="Steps and consequences for policy violations." data-file="disciplinary.pdf" data-file-type="pdf">
                    <td>8</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Disciplinary Action Policy</div>
                                <div class="policy-file-sub">disciplinary.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Disciplinary Policy</td>
                    <td class="policy-uploaded-by">HR Manager</td>
                    <td class="policy-date">01-01-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="8" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="9" data-desc="Punch-in rules, late marks, and overtime policy." data-file="attendance-policy.docx" data-file-type="doc">
                    <td>9</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon doc"><i class="bi bi-filetype-docx"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Attendance Policy 2026</div>
                                <div class="policy-file-sub">attendance-policy.docx</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Attendance Policy</td>
                    <td class="policy-uploaded-by">Admin</td>
                    <td class="policy-date">01-01-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="9" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="9" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="9" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="10" data-desc="Business travel reimbursement and expense claims." data-file="travel-expense.pdf" data-file-type="pdf">
                    <td>10</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Travel &amp; Expense Policy</div>
                                <div class="policy-file-sub">travel-expense.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Other</td>
                    <td class="policy-uploaded-by">Finance Head</td>
                    <td class="policy-date">12-04-2026</td>
                    <td class="policy-status"><span class="status-pill status-rejected">Disable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="10" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="11" data-desc="Guidelines for employee social media usage." data-file="social-media.docx" data-file-type="doc">
                    <td>11</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon doc"><i class="bi bi-filetype-docx"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Social Media Policy</div>
                                <div class="policy-file-sub">social-media.docx</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Code of Conduct</td>
                    <td class="policy-uploaded-by">Marketing Head</td>
                    <td class="policy-date">18-05-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="11" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="12" data-desc="Security protocols for remote access and VPN usage." data-file="remote-security.pdf" data-file-type="pdf">
                    <td>12</td>
                    <td class="policy-name-cell">
                        <div class="d-flex align-items-center gap-2">
                            <div class="policy-file-icon pdf"><i class="bi bi-filetype-pdf"></i></div>
                            <div>
                                <div class="fw-semibold policy-name">Remote Work Security</div>
                                <div class="policy-file-sub">remote-security.pdf</div>
                            </div>
                        </div>
                    </td>
                    <td class="policy-category">Data Security</td>
                    <td class="policy-uploaded-by">CTO</td>
                    <td class="policy-date">22-06-2026</td>
                    <td class="policy-status"><span class="status-pill status-approved">Enable</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm view btn-download" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="12" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<!-- Creation Modal -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creationModalLabel">Organization Policy Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="create_policy_name">Policy Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="create_policy_name" placeholder="e.g. Leave Policy 2026" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_policy_category">Category <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="create_policy_category">
                                <option value="">Select category</option>
                                <option value="Leave Policy">Leave Policy</option>
                                <option value="Attendance Policy">Attendance Policy</option>
                                <option value="Code of Conduct">Code of Conduct</option>
                                <option value="Disciplinary Policy">Disciplinary Policy</option>
                                <option value="Compensation & Benefits">Compensation & Benefits</option>
                                <option value="Data Security">Data Security</option>
                                <option value="Work From Home">Work From Home</option>
                                <option value="Health & Safety">Health & Safety</option>
                                <option value="Anti-Harassment">Anti-Harassment</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_status">Status</label>
                            <select class="form-select select2" id="create_status">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_policy_date">Effective Date</label>
                            <div class="date-picker right-0">
                                <input type="text" class="date-input form-control" id="create_policy_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="create_policy_desc">Description <span class="text-muted fw-normal">(optional)</span></label>
                            <textarea class="form-control" id="create_policy_desc" rows="3" placeholder="Brief description about this policy..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Upload File <span class="text-danger">*</span></label>
                            <div class="policy-upload-area" id="policyUploadArea">
                                <div class="upload-icon"><i class="bi bi-cloud-arrow-up"></i></div>
                                <div class="upload-text">Drag &amp; drop your file here</div>
                                <div class="upload-hint">or <span class="upload-browse" id="policyBrowseBtn">browse</span> to choose a file</div>
                                <div class="upload-hint mt-1">Supports PDF, DOC, DOCX, XLS, XLSX, JPG, PNG (Max 10MB)</div>
                            </div>
                            <input type="file" id="policyFileInput" class="d-none" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                            <div class="policy-file-preview" id="policyFilePreview">
                                <i class="bi bi-file-earmark file-icon" id="policyFileIcon"></i>
                                <div class="file-info">
                                    <div class="file-name" id="policyFileName">—</div>
                                    <div class="file-size" id="policyFileSize">—</div>
                                </div>
                                <button type="button" class="file-remove" id="policyFileRemove"><i class="bi bi-x"></i></button>
                            </div>
                        </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Organization Policy</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_policy_id">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="edit_policy_name">Policy Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_policy_name" placeholder="Enter Policy Name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_policy_category">Category <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="edit_policy_category">
                                <option value="Leave Policy">Leave Policy</option>
                                <option value="Attendance Policy">Attendance Policy</option>
                                <option value="Code of Conduct">Code of Conduct</option>
                                <option value="Disciplinary Policy">Disciplinary Policy</option>
                                <option value="Compensation & Benefits">Compensation & Benefits</option>
                                <option value="Data Security">Data Security</option>
                                <option value="Work From Home">Work From Home</option>
                                <option value="Health & Safety">Health & Safety</option>
                                <option value="Anti-Harassment">Anti-Harassment</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_status">Status</label>
                            <select class="form-select select2" id="edit_status">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_policy_date">Effective Date</label>
                            <div class="date-picker right-0">
                                <input type="text" class="date-input form-control" id="edit_policy_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="edit_policy_desc">Description</label>
                            <textarea class="form-control" id="edit_policy_desc" rows="3" placeholder="Brief description..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Current File</label>
                            <div class="p-2 border rounded-3 bg-light d-flex align-items-center gap-2">
                                <i class="bi bi-file-earmark fs-5 text-primary"></i>
                                <span id="editCurrentFileName" class="fw-semibold small text-dark">—</span>
                            </div>
                        </div>
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

<script src="./assets/js/pages/organization-policy.js?v=<?php echo time(); ?>"></script>

 

<?php include 'footer.php'; ?>
