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

<script>
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    var table = document.getElementById('branchTable');
    var tbody = document.getElementById('branchTbody');

    var countryStateMap = {
        'India': ['Tamil Nadu', 'Karnataka', 'Maharashtra', 'Telangana', 'Kerala', 'Andhra Pradesh', 'Gujarat', 'Rajasthan', 'West Bengal', 'Uttar Pradesh', 'Delhi'],
        'United States': ['California', 'New York', 'Texas', 'Florida', 'Washington', 'Illinois'],
        'United Kingdom': ['England', 'Scotland', 'Wales', 'Northern Ireland'],
        'United Arab Emirates': ['Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman'],
        'Singapore': ['Central Region', 'East Region', 'North Region', 'West Region'],
        'Australia': ['New South Wales', 'Victoria', 'Queensland', 'Western Australia'],
        'Canada': ['Ontario', 'British Columbia', 'Quebec', 'Alberta'],
        'Germany': ['Bavaria', 'Berlin', 'Hamburg', 'Hesse']
    };

    var stateDistrictMap = {
        'Tamil Nadu': ['Chennai', 'Coimbatore', 'Madurai', 'Salem', 'Tiruchirappalli', 'Tirunelveli', 'Erode', 'Vellore'],
        'Karnataka': ['Bengaluru', 'Mysuru', 'Hubballi', 'Mangaluru', 'Belagavi'],
        'Maharashtra': ['Mumbai', 'Pune', 'Nagpur', 'Nashik', 'Thane'],
        'Telangana': ['Hyderabad', 'Warangal', 'Nizamabad'],
        'Kerala': ['Thiruvananthapuram', 'Kochi', 'Kozhikode', 'Thrissur'],
        'Andhra Pradesh': ['Visakhapatnam', 'Vijayawada', 'Guntur'],
        'Gujarat': ['Ahmedabad', 'Surat', 'Vadodara', 'Rajkot'],
        'Rajasthan': ['Jaipur', 'Jodhpur', 'Udaipur', 'Kota'],
        'West Bengal': ['Kolkata', 'Howrah', 'Durgapur', 'Siliguri'],
        'Uttar Pradesh': ['Lucknow', 'Kanpur', 'Noida', 'Varanasi'],
        'Delhi': ['New Delhi', 'Central Delhi', 'North Delhi', 'South Delhi'],
        'California': ['Los Angeles', 'San Francisco', 'San Diego', 'San Jose'],
        'New York': ['New York City', 'Buffalo', 'Albany', 'Rochester'],
        'Texas': ['Houston', 'Dallas', 'Austin', 'San Antonio'],
        'Dubai': ['Downtown Dubai', 'Business Bay', 'Deira', 'Jumeirah'],
        'Abu Dhabi': ['Al Ain', 'Al Dhafra', 'Abu Dhabi City'],
        'Central Region': ['Downtown Core', 'Marina East', 'Orchard'],
        'England': ['London', 'Birmingham', 'Manchester', 'Leeds']
    };

    function populateCountryDropdown(countrySelectEl, preselectedCountry) {
        if (!countrySelectEl) return;
        countrySelectEl.innerHTML = '<option value="">-- Select Country --</option>';
        Object.keys(countryStateMap).forEach(function(country) {
            var opt = document.createElement('option');
            opt.value = country;
            opt.textContent = country;
            if (preselectedCountry && preselectedCountry === country) {
                opt.selected = true;
            }
            countrySelectEl.appendChild(opt);
        });
    }

    function populateStateDropdown(stateSelectEl, selectedCountry, preselectedState) {
        if (!stateSelectEl) return;
        stateSelectEl.innerHTML = '<option value="">-- Select State --</option>';
        var states = selectedCountry && countryStateMap[selectedCountry] ? countryStateMap[selectedCountry] : [];
        states.forEach(function(state) {
            var opt = document.createElement('option');
            opt.value = state;
            opt.textContent = state;
            if (preselectedState && preselectedState === state) {
                opt.selected = true;
            }
            stateSelectEl.appendChild(opt);
        });
    }

    function populateDistrictDropdown(districtSelectEl, selectedState, preselectedDistrict) {
        if (!districtSelectEl) return;
        districtSelectEl.innerHTML = '<option value="">-- Select District --</option>';
        var districts = selectedState && stateDistrictMap[selectedState] ? stateDistrictMap[selectedState] : [];
        districts.forEach(function(dist) {
            var opt = document.createElement('option');
            opt.value = dist;
            opt.textContent = dist;
            if (preselectedDistrict && preselectedDistrict === dist) {
                opt.selected = true;
            }
            districtSelectEl.appendChild(opt);
        });
    }

    var createCountryEl  = document.getElementById('create_country');
    var createStateEl    = document.getElementById('create_state');
    var createDistrictEl = document.getElementById('create_district');
    var createStatusEl   = document.getElementById('create_status');

    var editCountryEl    = document.getElementById('edit_country');
    var editStateEl      = document.getElementById('edit_state');
    var editDistrictEl   = document.getElementById('edit_district');
    var editStatusEl     = document.getElementById('edit_status');

    function s2(el) {
        if (!el || !window.jQuery || !window.jQuery.fn.select2) return;
        var parent = el.closest('.modal') || document.body;
        window.jQuery(el).select2({ dropdownParent: window.jQuery(parent), width: '100%' });
    }

    populateCountryDropdown(createCountryEl, 'India');
    populateStateDropdown(createStateEl, 'India', '');
    populateCountryDropdown(editCountryEl, '');

    s2(createCountryEl);
    s2(createStateEl);
    s2(createDistrictEl);
    s2(createStatusEl);
    s2(editCountryEl);
    s2(editStateEl);
    s2(editDistrictEl);
    s2(editStatusEl);

    if (window.jQuery) {
        window.jQuery(createCountryEl).on('change', function() {
            populateStateDropdown(createStateEl, this.value, '');
            if (createDistrictEl) createDistrictEl.innerHTML = '<option value="">-- Select District --</option>';
            s2(createStateEl);
            s2(createDistrictEl);
        });

        window.jQuery(createStateEl).on('change', function() {
            populateDistrictDropdown(createDistrictEl, this.value, '');
            s2(createDistrictEl);
        });

        window.jQuery(editCountryEl).on('change', function() {
            populateStateDropdown(editStateEl, this.value, '');
            if (editDistrictEl) editDistrictEl.innerHTML = '<option value="">-- Select District --</option>';
            s2(editStateEl);
            s2(editDistrictEl);
        });

        window.jQuery(editStateEl).on('change', function() {
            populateDistrictDropdown(editDistrictEl, this.value, '');
            s2(editDistrictEl);
        });
    }

    // ---------------- Multiple Addresses Helpers ----------------
    function createAddressCardHtml(addr, index, mode) {
        addr = addr || {};
        var line1 = addr.line1 || '';
        var line2 = addr.line2 || '';
        var pincode = addr.pincode || '';

        return '<div class="card p-3 border rounded-3 position-relative branch-addr-card" data-idx="' + index + '">' +
            '<div class="d-flex align-items-center justify-content-between mb-2">' +
                '<span class="badge bg-primary-subtle text-primary fw-semibold addr-num-badge">Address #' + (index + 1) + '</span>' +
                '<button type="button" class="btn btn-sm btn-outline-danger btn-remove-addr p-1 px-2" title="Remove Address">' +
                    '<i class="bi bi-trash"></i>' +
                '</button>' +
            '</div>' +
            '<div class="row g-2">' +
                '<div class="col-12">' +
                    '<label class="form-label small mb-1 fw-semibold">Address Line 1 (Door No, Building, Street) <span class="text-danger">*</span></label>' +
                    '<input type="text" class="form-control form-control-sm addr-line1" value="' + String(line1).replace(/"/g, '&quot;') + '" placeholder="e.g. Door No. 12, Anna Salai" autocomplete="off">' +
                '</div>' +
                '<div class="col-md-7">' +
                    '<label class="form-label small mb-1 fw-semibold">Address Line 2 (Area, Landmark)</label>' +
                    '<input type="text" class="form-control form-control-sm addr-line2" value="' + String(line2).replace(/"/g, '&quot;') + '" placeholder="e.g. Near Gemini Flyover, T. Nagar" autocomplete="off">' +
                '</div>' +
                '<div class="col-md-5">' +
                    '<label class="form-label small mb-1 fw-semibold">Pincode / Postal Code</label>' +
                    '<input type="text" class="form-control form-control-sm addr-pincode" value="' + String(pincode).replace(/"/g, '&quot;') + '" placeholder="e.g. 600006" autocomplete="off">' +
                '</div>' +
            '</div>' +
        '</div>';
    }

    function refreshAddressIndices(containerEl, mode) {
        var cards = containerEl.querySelectorAll('.branch-addr-card');
        cards.forEach(function(card, idx) {
            card.setAttribute('data-idx', idx);
            var numBadge = card.querySelector('.addr-num-badge');
            if (numBadge) numBadge.textContent = 'Address #' + (idx + 1);
        });
        var countBadge = document.getElementById(mode + '_address_count');
        if (countBadge) {
            countBadge.textContent = cards.length + (cards.length === 1 ? ' Address' : ' Addresses');
        }
    }

    function setAddressesInContainer(containerEl, addressesList, mode) {
        if (!containerEl) return;
        containerEl.innerHTML = '';
        var list = Array.isArray(addressesList) && addressesList.length > 0 ? addressesList : [
            { line1: '', line2: '', pincode: '' }
        ];

        list.forEach(function(addr, i) {
            var div = document.createElement('div');
            div.innerHTML = createAddressCardHtml(addr, i, mode);
            var cardEl = div.firstElementChild;
            containerEl.appendChild(cardEl);
        });
        refreshAddressIndices(containerEl, mode);
    }

    function getAddressesFromContainer(containerEl) {
        if (!containerEl) return [];
        var cards = containerEl.querySelectorAll('.branch-addr-card');
        var result = [];
        cards.forEach(function(card) {
            var line1 = card.querySelector('.addr-line1').value.trim();
            var line2 = card.querySelector('.addr-line2').value.trim();
            var pincode = card.querySelector('.addr-pincode').value.trim();
            if (line1 || line2 || pincode) {
                result.push({
                    line1: line1,
                    line2: line2,
                    pincode: pincode
                });
            }
        });
        return result;
    }

    function wireAddressRepeater(containerEl, addBtnEl, mode) {
        if (!containerEl || !addBtnEl) return;

        addBtnEl.addEventListener('click', function() {
            var currentCount = containerEl.querySelectorAll('.branch-addr-card').length;
            var div = document.createElement('div');
            div.innerHTML = createAddressCardHtml({
                line1: '',
                line2: '',
                pincode: ''
            }, currentCount, mode);
            var cardEl = div.firstElementChild;
            containerEl.appendChild(cardEl);
            refreshAddressIndices(containerEl, mode);
        });

        containerEl.addEventListener('click', function(e) {
            var removeBtn = e.target.closest('.btn-remove-addr');
            if (!removeBtn) return;
            var cards = containerEl.querySelectorAll('.branch-addr-card');
            if (cards.length <= 1) {
                alert('At least one address block must be kept.');
                return;
            }
            var card = removeBtn.closest('.branch-addr-card');
            card.remove();
            refreshAddressIndices(containerEl, mode);
        });
    }

    var createAddressListEl = document.getElementById('create_address_list');
    var btnCreateAddAddress = document.getElementById('btnCreateAddAddress');
    var editAddressListEl   = document.getElementById('edit_address_list');
    var btnEditAddAddress   = document.getElementById('btnEditAddAddress');

    wireAddressRepeater(createAddressListEl, btnCreateAddAddress, 'create');
    wireAddressRepeater(editAddressListEl, btnEditAddAddress, 'edit');
    setAddressesInContainer(createAddressListEl, [], 'create');

    // ---------------- Modals ----------------
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;
    var viewAddressesModalEl = document.getElementById('viewAddressesModal');
    var viewAddressesModal = viewAddressesModalEl ? bootstrap.Modal.getOrCreateInstance(viewAddressesModalEl) : null;

    function resetCreationForm() {
        var elName = document.getElementById('create_branch_name');
        var elCountry = document.getElementById('create_country');
        var elPerson = document.getElementById('create_contact_person');
        var elPhone = document.getElementById('create_contact_number');
        var elEmail = document.getElementById('create_email');
        var elAttach = document.getElementById('create_attachment');
        var elStatus = document.getElementById('create_status');

        if (elName) elName.value = '';
        if (elCountry) elCountry.value = 'India';
        populateStateDropdown(createStateEl, 'India', '');
        if (createDistrictEl) createDistrictEl.innerHTML = '<option value="">-- Select District --</option>';
        if (elPerson) elPerson.value = '';
        if (elPhone) elPhone.value = '';
        if (elEmail) elEmail.value = '';
        if (elAttach) elAttach.value = '';
        if (elStatus) elStatus.value = 'Enable';

        s2(createCountryEl);
        s2(createStateEl);
        s2(createDistrictEl);
        s2(createStatusEl);

        setAddressesInContainer(createAddressListEl, [], 'create');
    }

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', resetCreationForm);
    }

    function getExistingNames(excludeId) {
        var names = [];
        if (!tbody) return names;
        tbody.querySelectorAll('tr').forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) return;
            var nameCell = tr.querySelector('.branch-name') || tr.children[1];
            if (nameCell) names.push(nameCell.textContent.trim().toLowerCase());
        });
        return names;
    }

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    function escapeAttr(s) {
        return String(s || '').replace(/"/g, '&quot;');
    }

    function renderAddressesCellHtml(addrs) {
        if (!addrs || !addrs.length) return '<span class="text-muted">-</span>';
        var first = addrs[0];
        var line = [first.line1, first.line2, first.pincode].filter(Boolean).join(', ');
        var moreBadge = '';
        if (addrs.length > 1) {
            moreBadge = ' <button type="button" class="badge bg-primary-subtle text-primary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view all ' + addrs.length + ' addresses"><i class="bi bi-geo-alt me-1"></i>+' + (addrs.length - 1) + ' more</button>';
        } else {
            moreBadge = ' <button type="button" class="badge bg-light text-secondary border-0 p-1 px-2 btn-view-addr" style="cursor:pointer;" title="Click to view address details"><i class="bi bi-geo-alt"></i></button>';
        }
        var shortText = line.length > 30 ? line.substring(0, 30) + '...' : line;
        return '<div class="d-flex align-items-center gap-1"><span class="small text-truncate addr-summary" style="max-width:180px;" title="' + escapeAttr(line) + '">' + (shortText || '<span class="text-muted">No street address</span>') + '</span>' + moreBadge + '</div>';
    }

    // ---------------- View Addresses Modal Click ----------------
    if (tbody) {
        tbody.addEventListener('click', function(e) {
            var btn = e.target.closest('.btn-view-addr');
            if (!btn) return;
            var tr = btn.closest('tr');
            if (!tr || !viewAddressesModal) return;

            var nameCell = tr.querySelector('.branch-name') || tr.children[1];
            var stateCell = tr.querySelector('.branch-state') || tr.children[3];
            var countryCell = tr.querySelector('.branch-country') || tr.children[2];
            var branchName = nameCell ? nameCell.textContent.trim() : 'Branch';
            var branchState = stateCell ? stateCell.textContent.trim() : '';
            var branchCountry = countryCell ? countryCell.textContent.trim() : '';

            document.getElementById('viewAddressesBranchName').textContent = branchName + ' (' + branchState + ', ' + branchCountry + ')';
            var listEl = document.getElementById('viewAddressesList');
            listEl.innerHTML = '';

            var addrs = [];
            try {
                addrs = JSON.parse(tr.getAttribute('data-addresses') || '[]');
            } catch(err) { addrs = []; }

            if (!addrs.length) {
                listEl.innerHTML = '<div class="text-center text-muted py-3">No addresses recorded for this branch.</div>';
            } else {
                addrs.forEach(function(a, idx) {
                    var card = document.createElement('div');
                    card.className = 'border rounded-3 p-3 bg-light-subtle';
                    card.innerHTML = '<div class="d-flex align-items-center justify-content-between mb-2">' +
                        '<span class="badge bg-primary-subtle text-primary fw-semibold"><i class="bi bi-geo-alt me-1"></i>Address #' + (idx + 1) + '</span>' +
                    '</div>' +
                    '<div class="text-dark fw-semibold mb-1">' + (a.line1 || '-') + '</div>' +
                    (a.line2 ? '<div class="text-muted small mb-1">' + a.line2 + '</div>' : '') +
                    '<div class="text-secondary small">' +
                        '<span>' + branchState + ', ' + branchCountry + '</span>' +
                        (a.pincode ? ' &bull; <strong>PIN:</strong> ' + a.pincode : '') +
                    '</div>';
                    listEl.appendChild(card);
                });
            }

            viewAddressesModal.show();
        });
    }

    // ---------------- Create Save ----------------
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var nameInput = document.getElementById('create_branch_name');
            var countryInput = document.getElementById('create_country');
            var stateInput = document.getElementById('create_state');
            var districtInput = document.getElementById('create_district');
            var contactPersonInput = document.getElementById('create_contact_person');
            var contactNumberInput = document.getElementById('create_contact_number');
            var emailInput = document.getElementById('create_email');
            var attachmentInput = document.getElementById('create_attachment');
            var statusInput = document.getElementById('create_status');

            var name = nameInput ? nameInput.value.trim() : '';
            var country = countryInput ? countryInput.value.trim() : '';
            var state = stateInput ? stateInput.value.trim() : '';
            var district = districtInput ? districtInput.value.trim() : '';

            if (!name) { alert('Please enter branch name.'); if (nameInput) nameInput.focus(); return; }
            if (!country) { alert('Please select a country.'); if (countryInput) countryInput.focus(); return; }
            if (!state) { alert('Please select a state.'); if (stateInput) stateInput.focus(); return; }
            if (!district) { alert('Please select a district.'); if (districtInput) districtInput.focus(); return; }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Branch name already exists.');
                if (nameInput) nameInput.focus();
                return;
            }

            var fileName = '';
            if (attachmentInput && attachmentInput.files && attachmentInput.files.length > 0) {
                fileName = attachmentInput.files[0].name;
            }

            var addresses = getAddressesFromContainer(createAddressListEl);
            var addressesJson = JSON.stringify(addresses);

            var person = contactPersonInput ? contactPersonInput.value.trim() : '';
            var phone = contactNumberInput ? contactNumberInput.value.trim() : '';
            var email = emailInput ? emailInput.value.trim() : '';
            var status = statusInput ? statusInput.value : 'Enable';

            var today = (function () {
                var d = new Date();
                return String(d.getDate()).padStart(2, '0') + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + d.getFullYear();
            })();

            var newId = Date.now();
            var rowHtml =
                '<tr data-id="' + newId + '" data-addresses="' + escapeAttr(addressesJson) + '" data-attachment="' + escapeAttr(fileName) + '">' +
                    '<td></td>' +
                    '<td class="branch-name">' + name + '</td>' +
                    '<td class="branch-country">' + country + '</td>' +
                    '<td class="branch-state">' + state + '</td>' +
                    '<td class="branch-district">' + district + '</td>' +
                    '<td class="branch-addresses">' + renderAddressesCellHtml(addresses) + '</td>' +
                    '<td class="branch-person">' + (person || '<span class="text-muted">-</span>') + '</td>' +
                    '<td class="branch-phone">' + (phone ? ('<a href="tel:' + encodeURIComponent(phone) + '" class="text-decoration-none">' + phone + '</a>') : '<span class="text-muted">-</span>') + '</td>' +
                    '<td class="branch-email">' + (email ? ('<a href="mailto:' + encodeURIComponent(email) + '" class="text-decoration-none">' + email + '</a>') : '<span class="text-muted">-</span>') + '</td>' +
                    '<td class="branch-attachment">' + (fileName ? ('<span class="badge bg-light text-primary border" title="' + escapeAttr(fileName) + '"><i class="bi bi-paperclip me-1"></i>' + fileName + '</span>') : '<span class="text-muted">-</span>') + '</td>' +
                    '<td>' + statusPill(status) + '</td>' +
                    '<td>' + today + '</td>' +
                    '<td>' +
                        '<div class="btn-group">' +
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

            resetCreationForm();
            if (creationModal) creationModal.hide();
        });
    }

    // ---------------- Delegate Edit and Delete on Table Body ----------------
    if (tbody) {
        tbody.addEventListener('click', function (e) {
            var editBtn = e.target.closest('.btn-edit');
            var deleteBtn = e.target.closest('.btn-delete');

            if (editBtn) {
                var tr = editBtn.closest('tr');
                if (!tr) return;
                var id = tr.getAttribute('data-id') || editBtn.getAttribute('data-id');
                var nameCell = tr.querySelector('.branch-name') || tr.children[1];
                var countryCell = tr.querySelector('.branch-country') || tr.children[2];
                var stateCell = tr.querySelector('.branch-state') || tr.children[3];
                var districtCell = tr.querySelector('.branch-district') || tr.children[4];
                var personCell = tr.querySelector('.branch-person') || tr.children[6];
                var phoneCell = tr.querySelector('.branch-phone') || tr.children[7];
                var emailCell = tr.querySelector('.branch-email') || tr.children[8];
                var statusPillEl = tr.querySelector('.status-pill');

                var countryVal = countryCell ? countryCell.textContent.trim() : 'India';
                var stateVal = stateCell ? stateCell.textContent.trim() : '';
                var districtVal = districtCell ? districtCell.textContent.trim() : '';

                var editIdEl = document.getElementById('edit_branch_id');
                var editNameEl = document.getElementById('edit_branch_name');
                var editContactPersonEl = document.getElementById('edit_contact_person');
                var editContactNumberEl = document.getElementById('edit_contact_number');
                var editEmailEl = document.getElementById('edit_email');
                var editStatusEl = document.getElementById('edit_status');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = nameCell ? nameCell.textContent.trim() : '';

                populateCountryDropdown(editCountryEl, countryVal);
                populateStateDropdown(editStateEl, countryVal, stateVal);
                populateDistrictDropdown(editDistrictEl, stateVal, districtVal);

                s2(editCountryEl);
                s2(editStateEl);
                s2(editDistrictEl);

                var personText = personCell ? personCell.textContent.trim() : '';
                if (personText === '-') personText = '';
                if (editContactPersonEl) editContactPersonEl.value = personText;

                var phoneText = phoneCell ? phoneCell.textContent.trim() : '';
                if (phoneText === '-') phoneText = '';
                if (editContactNumberEl) editContactNumberEl.value = phoneText;

                var emailText = emailCell ? emailCell.textContent.trim() : '';
                if (emailText === '-') emailText = '';
                if (editEmailEl) editEmailEl.value = emailText;

                if (editStatusEl) {
                    editStatusEl.value = statusPillEl ? statusPillEl.textContent.trim() : 'Enable';
                    s2(editStatusEl);
                }

                var existingAttachment = tr.getAttribute('data-attachment') || '';
                var existAttachInput = document.getElementById('edit_existing_attachment');
                if (existAttachInput) existAttachInput.value = existingAttachment;
                var previewEl = document.getElementById('edit_attachment_preview');
                if (previewEl) {
                    previewEl.innerHTML = existingAttachment
                        ? ('<span class="text-success"><i class="bi bi-file-earmark-check me-1"></i>Current: ' + existingAttachment + '</span>')
                        : '<span class="text-muted">No attachment uploaded</span>';
                }
                var attachFileEl = document.getElementById('edit_attachment');
                if (attachFileEl) attachFileEl.value = '';

                var addrs = [];
                try {
                    addrs = JSON.parse(tr.getAttribute('data-addresses') || '[]');
                } catch(err) { addrs = []; }
                setAddressesInContainer(editAddressListEl, addrs, 'edit');

                if (editModal) editModal.show();
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this branch?')) {
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

    // ---------------- Edit Save ----------------
    var btnEditSave = document.getElementById('btnEditSave');
    if (btnEditSave) {
        btnEditSave.addEventListener('click', function () {
            var editIdEl = document.getElementById('edit_branch_id');
            var id = editIdEl ? editIdEl.value : '';
            var nameInput = document.getElementById('edit_branch_name');
            var countryInput = document.getElementById('edit_country');
            var stateInput = document.getElementById('edit_state');
            var districtInput = document.getElementById('edit_district');
            var contactPersonInput = document.getElementById('edit_contact_person');
            var contactNumberInput = document.getElementById('edit_contact_number');
            var emailInput = document.getElementById('edit_email');
            var attachmentInput = document.getElementById('edit_attachment');
            var existAttachInput = document.getElementById('edit_existing_attachment');
            var existingAttachment = existAttachInput ? existAttachInput.value : '';
            var statusInput = document.getElementById('edit_status');

            var name = nameInput ? nameInput.value.trim() : '';
            var country = countryInput ? countryInput.value.trim() : '';
            var state = stateInput ? stateInput.value.trim() : '';
            var district = districtInput ? districtInput.value.trim() : '';

            if (!name) { alert('Please enter branch name.'); if (nameInput) nameInput.focus(); return; }
            if (!country) { alert('Please select a country.'); if (countryInput) countryInput.focus(); return; }
            if (!state) { alert('Please select a state.'); if (stateInput) stateInput.focus(); return; }
            if (!district) { alert('Please select a district.'); if (districtInput) districtInput.focus(); return; }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Branch name already exists.');
                if (nameInput) nameInput.focus();
                return;
            }

            var fileName = existingAttachment;
            if (attachmentInput && attachmentInput.files && attachmentInput.files.length > 0) {
                fileName = attachmentInput.files[0].name;
            }

            var addresses = getAddressesFromContainer(editAddressListEl);
            var addressesJson = JSON.stringify(addresses);

            var person = contactPersonInput ? contactPersonInput.value.trim() : '';
            var phone = contactNumberInput ? contactNumberInput.value.trim() : '';
            var email = emailInput ? emailInput.value.trim() : '';
            var status = statusInput ? statusInput.value : 'Enable';

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                tr.setAttribute('data-addresses', addressesJson);
                tr.setAttribute('data-attachment', fileName);

                var nameCell = tr.querySelector('.branch-name') || tr.children[1];
                if (nameCell) nameCell.textContent = name;

                var countryCell = tr.querySelector('.branch-country') || tr.children[2];
                if (countryCell) countryCell.textContent = country;

                var stateCell = tr.querySelector('.branch-state') || tr.children[3];
                if (stateCell) stateCell.textContent = state;

                var districtCell = tr.querySelector('.branch-district') || tr.children[4];
                if (districtCell) districtCell.textContent = district;

                var addressesCell = tr.querySelector('.branch-addresses') || tr.children[5];
                if (addressesCell) addressesCell.innerHTML = renderAddressesCellHtml(addresses);

                var personCell = tr.querySelector('.branch-person') || tr.children[6];
                if (personCell) personCell.innerHTML = person || '<span class="text-muted">-</span>';

                var phoneCell = tr.querySelector('.branch-phone') || tr.children[7];
                if (phoneCell) phoneCell.innerHTML = phone ? ('<a href="tel:' + encodeURIComponent(phone) + '" class="text-decoration-none">' + phone + '</a>') : '<span class="text-muted">-</span>';

                var emailCell = tr.querySelector('.branch-email') || tr.children[8];
                if (emailCell) emailCell.innerHTML = email ? ('<a href="mailto:' + encodeURIComponent(email) + '" class="text-decoration-none">' + email + '</a>') : '<span class="text-muted">-</span>';

                var attachmentCell = tr.querySelector('.branch-attachment') || tr.children[9];
                if (attachmentCell) attachmentCell.innerHTML = fileName ? ('<span class="badge bg-light text-primary border" title="' + escapeAttr(fileName) + '"><i class="bi bi-paperclip me-1"></i>' + fileName + '</span>') : '<span class="text-muted">-</span>';

                var statusCell = tr.children[10];
                if (statusCell) statusCell.innerHTML = statusPill(status);

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
