<?php include 'header.php'; ?>

 

<div class="card-custom p-0" id="branchTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-buildings"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Branch</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="branchTable">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Branch Name</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>District</th>
                    <th>Addresses</th>
                    <th>Contact Person</th>
                    <th>Branch Contact Number</th>
                    <th>Email ID</th>
                    <th>Attachments</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="branchTbody">
                <tr data-id="1" data-addresses='[{"line1":"Tower B, 4th Floor, Tek Meadows, OMR","line2":"Sholinganallur","pincode":"600119"},{"line1":"No. 45, Mount Road","line2":"Opp. LIC Building, Anna Salai","pincode":"600002"}]' data-attachment="chennai_branch_license.pdf">
                    <td>1</td>
                    <td class="branch-name">Chennai Head Office</td>
                    <td class="branch-country">India</td>
                    <td class="branch-state">Tamil Nadu</td>
                    <td class="branch-district">Chennai</td>
                    <td class="branch-addresses">
                        <div class="d-flex align-items-center gap-1">
                            <span class="small text-truncate addr-summary" style="max-width:180px;" title="Tower B, 4th Floor, Tek Meadows, OMR, Sholinganallur, 600119">Tower B, 4th Floor, Tek Meadows, OMR...</span>
                            <button type="button" class="badge bg-primary-subtle text-primary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view all 2 addresses"><i class="bi bi-geo-alt me-1"></i>+1 more</button>
                        </div>
                    </td>
                    <td class="branch-person">Ramesh Kumar</td>
                    <td class="branch-phone"><a href="tel:044-28192001" class="text-decoration-none">044-28192001</a></td>
                    <td class="branch-email"><a href="mailto:chennai.branch@gharuda.com" class="text-decoration-none">chennai.branch@gharuda.com</a></td>
                    <td class="branch-attachment"><span class="badge bg-light text-primary border" title="chennai_branch_license.pdf"><i class="bi bi-paperclip me-1"></i>chennai_branch_license.pdf</span></td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>18-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2" data-addresses='[{"line1":"Prestige Meridian, 8th Floor, M.G. Road","line2":"Near Trinity Metro Station","pincode":"560001"},{"line1":"Plot 22, Phase 1, Electronic City","line2":"Hosur Road","pincode":"560100"}]' data-attachment="blr_rental_agreement.pdf">
                    <td>2</td>
                    <td class="branch-name">Bengaluru Branch</td>
                    <td class="branch-country">India</td>
                    <td class="branch-state">Karnataka</td>
                    <td class="branch-district">Bengaluru</td>
                    <td class="branch-addresses">
                        <div class="d-flex align-items-center gap-1">
                            <span class="small text-truncate addr-summary" style="max-width:180px;" title="Prestige Meridian, 8th Floor, M.G. Road, Near Trinity Metro Station, 560001">Prestige Meridian, 8th Floor, M.G. Road...</span>
                            <button type="button" class="badge bg-primary-subtle text-primary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view all 2 addresses"><i class="bi bi-geo-alt me-1"></i>+1 more</button>
                        </div>
                    </td>
                    <td class="branch-person">Ananya Sharma</td>
                    <td class="branch-phone"><a href="tel:080-41235678" class="text-decoration-none">080-41235678</a></td>
                    <td class="branch-email"><a href="mailto:blr.branch@gharuda.com" class="text-decoration-none">blr.branch@gharuda.com</a></td>
                    <td class="branch-attachment"><span class="badge bg-light text-primary border" title="blr_rental_agreement.pdf"><i class="bi bi-paperclip me-1"></i>blr_rental_agreement.pdf</span></td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>20-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3" data-addresses='[{"line1":"Cyber Towers, Hitec City","line2":"Madhapur","pincode":"500081"}]' data-attachment="hyd_certificate.pdf">
                    <td>3</td>
                    <td class="branch-name">Hyderabad Branch</td>
                    <td class="branch-country">India</td>
                    <td class="branch-state">Telangana</td>
                    <td class="branch-district">Hyderabad</td>
                    <td class="branch-addresses">
                        <div class="d-flex align-items-center gap-1">
                            <span class="small text-truncate addr-summary" style="max-width:180px;" title="Cyber Towers, Hitec City, Madhapur, 500081">Cyber Towers, Hitec City, Madhapur...</span>
                            <button type="button" class="badge bg-light text-secondary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view address details"><i class="bi bi-geo-alt"></i></button>
                        </div>
                    </td>
                    <td class="branch-person">Suresh Reddy</td>
                    <td class="branch-phone"><a href="tel:040-23456789" class="text-decoration-none">040-23456789</a></td>
                    <td class="branch-email"><a href="mailto:hyd.branch@gharuda.com" class="text-decoration-none">hyd.branch@gharuda.com</a></td>
                    <td class="branch-attachment"><span class="badge bg-light text-primary border" title="hyd_certificate.pdf"><i class="bi bi-paperclip me-1"></i>hyd_certificate.pdf</span></td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>22-12-2025</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4" data-addresses='[{"line1":"Unit 502, Platina, Bandra Kurla Complex (BKC)","line2":"Bandra East","pincode":"400051"},{"line1":"Nariman Point, Express Towers","line2":"Marine Drive","pincode":"400021"}]' data-attachment="mumbai_registration.pdf">
                    <td>4</td>
                    <td class="branch-name">Mumbai Branch</td>
                    <td class="branch-country">India</td>
                    <td class="branch-state">Maharashtra</td>
                    <td class="branch-district">Mumbai</td>
                    <td class="branch-addresses">
                        <div class="d-flex align-items-center gap-1">
                            <span class="small text-truncate addr-summary" style="max-width:180px;" title="Unit 502, Platina, Bandra Kurla Complex (BKC), Bandra East, 400051">Unit 502, Platina, Bandra Kurla Complex (BKC)...</span>
                            <button type="button" class="badge bg-primary-subtle text-primary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view all 2 addresses"><i class="bi bi-geo-alt me-1"></i>+1 more</button>
                        </div>
                    </td>
                    <td class="branch-person">Vikram Joshi</td>
                    <td class="branch-phone"><a href="tel:022-26543210" class="text-decoration-none">022-26543210</a></td>
                    <td class="branch-email"><a href="mailto:mumbai.branch@gharuda.com" class="text-decoration-none">mumbai.branch@gharuda.com</a></td>
                    <td class="branch-attachment"><span class="badge bg-light text-primary border" title="mumbai_registration.pdf"><i class="bi bi-paperclip me-1"></i>mumbai_registration.pdf</span></td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>05-01-2026</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5" data-addresses='[{"line1":"Hanudev Info Park, Nava India","line2":"Avinashi Road","pincode":"641004"}]' data-attachment="cbe_incorporation.pdf">
                    <td>5</td>
                    <td class="branch-name">Coimbatore Branch</td>
                    <td class="branch-country">India</td>
                    <td class="branch-state">Tamil Nadu</td>
                    <td class="branch-district">Coimbatore</td>
                    <td class="branch-addresses">
                        <div class="d-flex align-items-center gap-1">
                            <span class="small text-truncate addr-summary" style="max-width:180px;" title="Hanudev Info Park, Nava India, Avinashi Road, 641004">Hanudev Info Park, Nava India, Avinashi Road...</span>
                            <button type="button" class="badge bg-light text-secondary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view address details"><i class="bi bi-geo-alt"></i></button>
                        </div>
                    </td>
                    <td class="branch-person">Karthik Subramanian</td>
                    <td class="branch-phone"><a href="tel:0422-2456789" class="text-decoration-none">0422-2456789</a></td>
                    <td class="branch-email"><a href="mailto:cbe.branch@gharuda.com" class="text-decoration-none">cbe.branch@gharuda.com</a></td>
                    <td class="branch-attachment"><span class="badge bg-light text-primary border" title="cbe_incorporation.pdf"><i class="bi bi-paperclip me-1"></i>cbe_incorporation.pdf</span></td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td>15-01-2026</td>
                    <td>
                        <div class="btn-group">
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
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creationModalLabel">Branch Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="create_branch_name">Branch Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="create_branch_name" placeholder="Enter branch name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_country">Country <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="create_country">
                                <option value="">-- Select Country --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_state">State <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="create_state">
                                <option value="">-- Select State --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_district">District <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="create_district">
                                <option value="">-- Select District --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_contact_person">Contact Person</label>
                            <input type="text" class="form-control" id="create_contact_person" placeholder="Enter contact person name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_contact_number">Branch Contact Number</label>
                            <input type="tel" class="form-control" id="create_contact_number" placeholder="Enter branch contact number" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_email">Email ID</label>
                            <input type="email" class="form-control" id="create_email" placeholder="Enter email address" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="create_attachment">Attachments</label>
                            <input type="file" class="form-control" id="create_attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <small class="text-muted">Allowed: PDF, DOC, Images</small>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="create_status">Status</label>
                            <select class="form-select select2" id="create_status">
                                <option value="Enable" selected>Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>

                        <!-- Section: Multiple Addresses -->
                        <div class="col-12 mt-4">
                            <div class="d-flex align-items-center justify-content-between p-2 px-3 rounded-2 bg-light border mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                    <span class="fw-bold">Branch Addresses</span>
                                    <span class="badge bg-secondary-subtle text-secondary rounded-pill" id="create_address_count">1 Address</span>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="btnCreateAddAddress">
                                    <i class="bi bi-plus-circle me-1"></i> Add Another Address
                                </button>
                            </div>
                            <div id="create_address_list" class="d-flex flex-column gap-3">
                                <!-- Dynamic Address items rendered here -->
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
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Branch</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;" enctype="multipart/form-data">
                    <input type="hidden" id="edit_branch_id">
                    <input type="hidden" id="edit_existing_attachment">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="edit_branch_name">Branch Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_branch_name" placeholder="Enter branch name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_country">Country <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="edit_country">
                                <option value="">-- Select Country --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_state">State <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="edit_state">
                                <option value="">-- Select State --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_district">District <span class="text-danger">*</span></label>
                            <select class="form-select select2" id="edit_district">
                                <option value="">-- Select District --</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_contact_person">Contact Person</label>
                            <input type="text" class="form-control" id="edit_contact_person" placeholder="Enter contact person name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_contact_number">Branch Contact Number</label>
                            <input type="tel" class="form-control" id="edit_contact_number" placeholder="Enter branch contact number" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_email">Email ID</label>
                            <input type="email" class="form-control" id="edit_email" placeholder="Enter email address" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_attachment">Attachments</label>
                            <input type="file" class="form-control" id="edit_attachment" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <div id="edit_attachment_preview" class="small mt-1 text-muted"></div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="edit_status">Status</label>
                            <select class="form-select select2" id="edit_status">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>

                        <!-- Section: Multiple Addresses -->
                        <div class="col-12 mt-4">
                            <div class="d-flex align-items-center justify-content-between p-2 px-3 rounded-2 bg-light border mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-geo-alt-fill text-primary"></i>
                                    <span class="fw-bold">Branch Addresses</span>
                                    <span class="badge bg-secondary-subtle text-secondary rounded-pill" id="edit_address_count">1 Address</span>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-primary" id="btnEditAddAddress">
                                    <i class="bi bi-plus-circle me-1"></i> Add Another Address
                                </button>
                            </div>
                            <div id="edit_address_list" class="d-flex flex-column gap-3">
                                <!-- Dynamic Address items rendered here -->
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

<!-- View Addresses Modal -->
<div class="modal fade" id="viewAddressesModal" tabindex="-1" aria-labelledby="viewAddressesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-2">
                    <div class="icon-chip sm">
                        <i class="bi bi-geo-alt text-primary"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0" id="viewAddressesModalLabel">Branch Addresses</h5>
                        <div class="text-muted small" id="viewAddressesBranchName">Branch Name</div>
                    </div>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body p-3">
                <div id="viewAddressesList" class="d-flex flex-column gap-3">
                    <!-- Populated by JS -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/pages/branch.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
