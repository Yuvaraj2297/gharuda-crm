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

<script>
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var table = document.getElementById('policyTable');
    var tbody = document.getElementById('policyTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    // Upload Elements
    var uploadArea = document.getElementById('policyUploadArea');
    var fileInput = document.getElementById('policyFileInput');
    var filePreview = document.getElementById('policyFilePreview');
    var selectedFile = null;

    function getFileIconClass(type) {
        if (!type) return 'other';
        type = type.toLowerCase();
        if (type === 'pdf') return 'pdf';
        if (type === 'doc' || type === 'docx') return 'doc';
        if (type === 'xls' || type === 'xlsx') return 'xls';
        if (type === 'jpg' || type === 'jpeg' || type === 'png') return 'img';
        return 'other';
    }

    function getFileIconName(type) {
        if (!type) return 'bi-file-earmark';
        type = type.toLowerCase();
        if (type === 'pdf') return 'bi-filetype-pdf';
        if (type === 'doc' || type === 'docx') return 'bi-filetype-docx';
        if (type === 'xls' || type === 'xlsx') return 'bi-filetype-xlsx';
        if (type === 'jpg' || type === 'jpeg' || type === 'png') return 'bi-file-image';
        return 'bi-file-earmark';
    }

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    function resetCreationForm() {
        var form = document.getElementById('creationForm');
        if (form) form.reset();
        selectedFile = null;
        if (fileInput) fileInput.value = '';
        if (filePreview) filePreview.classList.remove('show');
        if (uploadArea) uploadArea.classList.remove('d-none');

        var statusInput = document.getElementById('create_status');
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
            var nameCell = tr.querySelector('.policy-name') || tr.children[1];
            if (nameCell) names.push(nameCell.textContent.trim().toLowerCase());
        });
        return names;
    }

    // File Drag & Drop / Browse
    if (uploadArea && fileInput) {
        uploadArea.addEventListener('click', function() { fileInput.click(); });
        var browseBtn = document.getElementById('policyBrowseBtn');
        if (browseBtn) {
            browseBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                fileInput.click();
            });
        }

        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });
        uploadArea.addEventListener('dragleave', function() {
            uploadArea.classList.remove('dragover');
        });
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            if (e.dataTransfer.files.length) handleFileSelect(e.dataTransfer.files[0]);
        });

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length) handleFileSelect(fileInput.files[0]);
        });
    }

    function handleFileSelect(file) {
        var maxSize = 10 * 1024 * 1024;
        if (file.size > maxSize) {
            alert('File size must be under 10MB.');
            return;
        }
        selectedFile = file;
        var ext = file.name.split('.').pop().toLowerCase();
        var iconNm = getFileIconName(ext);
        var iconCls = getFileIconClass(ext);

        var previewIcon = document.getElementById('policyFileIcon');
        var previewName = document.getElementById('policyFileName');
        var previewSize = document.getElementById('policyFileSize');

        if (previewIcon) previewIcon.className = 'bi ' + iconNm + ' file-icon ' + iconCls;
        if (previewName) previewName.textContent = file.name;
        if (previewSize) previewSize.textContent = (file.size / 1024).toFixed(1) + ' KB';
        if (filePreview) filePreview.classList.add('show');
        if (uploadArea) uploadArea.classList.add('d-none');
    }

    var removeFileBtn = document.getElementById('policyFileRemove');
    if (removeFileBtn) {
        removeFileBtn.addEventListener('click', function() {
            selectedFile = null;
            if (fileInput) fileInput.value = '';
            if (filePreview) filePreview.classList.remove('show');
            if (uploadArea) uploadArea.classList.remove('d-none');
        });
    }

    // Initialize tooltips helper
    function initTooltips() {
        if (window.bootstrap && bootstrap.Tooltip) {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
                bootstrap.Tooltip.getOrCreateInstance(el);
            });
        }
    }

    // Create Save
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var nameInput = document.getElementById('create_policy_name');
            var catInput = document.getElementById('create_policy_category');
            var statusInput = document.getElementById('create_status');
            var dateInput = document.getElementById('create_policy_date');
            var descInput = document.getElementById('create_policy_desc');

            var name = nameInput ? nameInput.value.trim() : '';
            var category = catInput ? catInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }
            if (!category) {
                if (catInput) catInput.focus();
                return;
            }
            if (!selectedFile) {
                alert('Please upload a policy file.');
                return;
            }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Policy with this name already exists.');
                return;
            }

            var today = (function () {
                var d = new Date();
                return String(d.getDate()).padStart(2, '0') + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + d.getFullYear();
            })();
            var dateVal = (dateInput && dateInput.value.trim()) ? dateInput.value.trim() : today;

            var ext = selectedFile.name.split('.').pop().toLowerCase();
            var iconCls = getFileIconClass(ext);
            var iconNm = getFileIconName(ext);
            var newId = Date.now();
            var statusVal = statusInput ? statusInput.value : 'Enable';
            var descVal = descInput ? descInput.value.trim() : '';

            var rowHtml =
                '<tr data-id="' + newId + '" data-desc="' + descVal.replace(/"/g, '&quot;') + '" data-file="' + selectedFile.name + '" data-file-type="' + ext + '">' +
                    '<td></td>' +
                    '<td class="policy-name-cell">' +
                        '<div class="d-flex align-items-center gap-2">' +
                            '<div class="policy-file-icon ' + iconCls + '"><i class="bi ' + iconNm + '"></i></div>' +
                            '<div>' +
                                '<div class="fw-semibold policy-name">' + name + '</div>' +
                                '<div class="policy-file-sub">' + selectedFile.name + '</div>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="policy-category">' + category + '</td>' +
                    '<td class="policy-uploaded-by">Admin</td>' +
                    '<td class="policy-date">' + dateVal + '</td>' +
                    '<td class="policy-status">' + statusPill(statusVal) + '</td>' +
                    '<td>' +
                        '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm view btn-download" data-id="' + newId + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Download"><i class="mdi mdi-download"></i></button>' +
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

            initTooltips();
            resetCreationForm();
            if (creationModal) creationModal.hide();
        });
    }

    // Delegate Edit, Download, and Delete on Table Body
    if (tbody) {
        tbody.addEventListener('click', function (e) {
            var downloadBtn = e.target.closest('.btn-download');
            var editBtn = e.target.closest('.btn-edit');
            var deleteBtn = e.target.closest('.btn-delete');

            if (downloadBtn) {
                var dTr = downloadBtn.closest('tr');
                var fileName = dTr ? dTr.getAttribute('data-file') : '';
                if (!fileName && dTr) {
                    var sub = dTr.querySelector('.policy-file-sub');
                    fileName = sub ? sub.textContent.trim() : 'policy-document';
                }
                alert('Downloading: ' + fileName);
                return;
            }

            if (editBtn) {
                var tr = editBtn.closest('tr');
                if (!tr) return;
                var id = tr.getAttribute('data-id') || editBtn.getAttribute('data-id');
                var nameEl = tr.querySelector('.policy-name');
                var catEl = tr.querySelector('.policy-category');
                var dateEl = tr.querySelector('.policy-date');
                var statusPillEl = tr.querySelector('.status-pill');
                var desc = tr.getAttribute('data-desc') || '';
                var fileName = tr.getAttribute('data-file') || '';

                var editIdEl = document.getElementById('edit_policy_id');
                var editNameEl = document.getElementById('edit_policy_name');
                var editCatEl = document.getElementById('edit_policy_category');
                var editStatusEl = document.getElementById('edit_status');
                var editDateEl = document.getElementById('edit_policy_date');
                var editDescEl = document.getElementById('edit_policy_desc');
                var editCurrentFileName = document.getElementById('editCurrentFileName');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = nameEl ? nameEl.textContent.trim() : '';
                if (editCatEl) editCatEl.value = catEl ? catEl.textContent.trim() : '';
                if (editStatusEl) editStatusEl.value = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';
                if (editDateEl) editDateEl.value = dateEl ? dateEl.textContent.trim() : '';
                if (editDescEl) editDescEl.value = desc;
                if (editCurrentFileName) editCurrentFileName.textContent = fileName || (nameEl ? nameEl.textContent.trim() : 'Document');

                if (typeof window.ghSyncSelect2 === 'function') {
                    window.ghSyncSelect2('#editModal');
                }

                if (editModal) editModal.show();
                return;
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this policy?')) {
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
            var editIdEl = document.getElementById('edit_policy_id');
            var nameInput = document.getElementById('edit_policy_name');
            var catInput = document.getElementById('edit_policy_category');
            var statusInput = document.getElementById('edit_status');
            var dateInput = document.getElementById('edit_policy_date');
            var descInput = document.getElementById('edit_policy_desc');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var category = catInput ? catInput.value.trim() : '';

            if (!name) {
                if (nameInput) nameInput.focus();
                return;
            }
            if (!category) {
                if (catInput) catInput.focus();
                return;
            }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Policy with this name already exists.');
                return;
            }

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                var nameEl = tr.querySelector('.policy-name');
                if (nameEl) nameEl.textContent = name;

                var catEl = tr.querySelector('.policy-category');
                if (catEl) catEl.textContent = category;

                var dateEl = tr.querySelector('.policy-date');
                if (dateEl && dateInput && dateInput.value.trim()) dateEl.textContent = dateInput.value.trim();

                var statusCell = tr.querySelector('.policy-status') || tr.children[5];
                if (statusCell) statusCell.innerHTML = statusPill(statusInput ? statusInput.value : 'Enable');

                if (descInput) tr.setAttribute('data-desc', descInput.value.trim());

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
