/**
 * Gharuda CRM - Branch Page Script
 * File: assets/js/pages/branch.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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
