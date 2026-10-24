document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    var statusClass = function (status) {
        return status === 'Enable' ? 'status-approved' : 'status-rejected';
    };

    var documentData = [
        { id: 1, name: 'Aadhaar Card', status: 'Enable', created_at: '18-12-2025' },
        { id: 2, name: 'PAN Card', status: 'Enable', created_at: '20-12-2025' },
        { id: 3, name: 'Passport', status: 'Enable', created_at: '22-12-2025' },
        { id: 4, name: 'Degree Certificate', status: 'Enable', created_at: '02-01-2026' },
        { id: 5, name: 'Experience Letter', status: 'Enable', created_at: '03-01-2026' },
        { id: 6, name: 'Photo', status: 'Disable', created_at: '05-01-2026' }
    ];

    var docTable = MasterTable.init({
        tableId: 'documentTable',
        tbodyId: 'docTbody',

        data: documentData,
        tableName: 'Document Upload',
        primaryKey: 'id',
        searchFields: ['name', 'status', 'created_at'],

        columns: [
            {
                field: 'name',
                title: 'Document Name',
                sortable: true
            },
            {
                field: 'status',
                title: 'Status',
                sortable: true,
                render: function (val) {
                    return '<span class="status-pill ' + statusClass(val) + '">' + val + '</span>';
                }
            },
            {
                field: 'created_at',
                title: 'Create Date',
                sortable: true
            },
            {
                field: null,
                title: 'Action',
                sortable: false,
                render: function (val, row, escapeHtml) {
                    return '<div class="btn-group">' +
                        '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + row.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                        '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + row.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>' +
                    '</div>';
                }
            }
        ],

        onEdit: function (record, editModal) {
            document.getElementById('edit_document_id').value = record.id;
            document.getElementById('edit_document_name').value = record.name;
            document.getElementById('edit_status').value = record.status;
            editModal.show();
        },

        onDelete: function (id, data) {
            docTable.deleteItem(id);
        }
    });

    // ---- Create ----
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;

    function resetCreationForm() {
        document.getElementById('create_document_name').value = '';
        document.getElementById('create_status').value = 'Enable';
    }

    document.getElementById('btnCreateSave').addEventListener('click', function () {
        var nameInput = document.getElementById('create_document_name');
        var statusInput = document.getElementById('create_status');
        var name = nameInput.value.trim();

        if (!name) { nameInput.focus(); return; }

        var duplicate = docTable.getData().some(function (item) {
            return item.name.toLowerCase() === name.toLowerCase();
        });
        if (duplicate) { alert('Document name already exists.'); return; }

        docTable.addItem({
            id: docTable.getNextId(),
            name: name,
            status: statusInput.value,
            created_at: (function () {
                var d = new Date();
                return String(d.getDate()).padStart(2, '0') + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + d.getFullYear();
            })()
        });

        resetCreationForm();
        creationModal.hide();
    });

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', resetCreationForm);
    }

    // ---- Edit ----
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    document.getElementById('btnEditSave').addEventListener('click', function () {
        var id = Number(document.getElementById('edit_document_id').value);
        var nameInput = document.getElementById('edit_document_name');
        var statusInput = document.getElementById('edit_status');
        var name = nameInput.value.trim();

        if (!name) { nameInput.focus(); return; }

        var duplicate = docTable.getData().some(function (item) {
            return Number(item.id) !== id && item.name.toLowerCase() === name.toLowerCase();
        });
        if (duplicate) { alert('Document name already exists.'); return; }

        docTable.updateItem(id, { name: name, status: statusInput.value });
        editModal.hide();
    });
});
