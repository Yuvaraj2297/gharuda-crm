/**
 * Gharuda CRM - Organization Policy Page Script
 * File: assets/js/pages/organization-policy.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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
