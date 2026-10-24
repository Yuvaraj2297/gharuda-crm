document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    var statusClass = function (status) {
        if (status === 'Present' || status === 'Late' || status === 'Half Day') {
            return 'status-approved';
        }
        return 'status-rejected';
    };

    // Static employee data for dropdown
    var employeeData = [
        { id: 41, name: 'Salman', role: 'Developer', branch: 'Gharuda Infotech' },
        { id: 40, name: 'Thangamuniyandi', role: 'Senior Developer', branch: 'Gharuda IT Park' },
        { id: 39, name: 'Arun Kumar', role: 'Developer', branch: 'Gharuda Infotech' },
        { id: 38, name: 'Mohammed Suhail', role: 'Developer', branch: 'Gharuda IT Park' },
        { id: 37, name: 'Rajeshwaran', role: 'Mobile App Developer', branch: 'Gharuda Infotech' },
        { id: 36, name: 'Subananthan', role: 'Developer', branch: 'Gharuda IT Park' },
        { id: 35, name: 'Jayaraj JR', role: 'Developer', branch: 'Gharuda Infotech' },
        { id: 34, name: 'Krishna Moorthy', role: 'Developer', branch: 'Gharuda IT Park' }
    ];

    // Static attendance data
    var attendanceData = [
        { id: 1, emp_id: 'EMP041', name: 'Salman', role: 'Developer', branch: 'Gharuda Infotech', shift: 'Morning Shift', date: '02-09-2026', check_in: '09:00', check_out: '18:00', work_hours: '9h 00m', status: 'Present' },
        { id: 2, emp_id: 'EMP040', name: 'Thangamuniyandi', role: 'Senior Developer', branch: 'Gharuda IT Park', shift: 'General Shift', date: '02-09-2026', check_in: '09:15', check_out: '18:30', work_hours: '9h 15m', status: 'Present' },
        { id: 3, emp_id: 'EMP039', name: 'Arun Kumar', role: 'Developer', branch: 'Gharuda Infotech', shift: 'Morning Shift', date: '02-09-2026', check_in: '09:05', check_out: '18:05', work_hours: '9h 00m', status: 'Present' },
        { id: 4, emp_id: 'EMP038', name: 'Mohammed Suhail', role: 'Developer', branch: 'Gharuda IT Park', shift: 'Night Shift', date: '02-09-2026', check_in: '21:30', check_out: '06:15', work_hours: '8h 45m', status: 'Late' },
        { id: 5, emp_id: 'EMP037', name: 'Rajeshwaran', role: 'Mobile App Developer', branch: 'Gharuda Infotech', shift: 'General Shift', date: '02-09-2026', check_in: '-', check_out: '-', work_hours: '0h 00m', status: 'Absent' }
    ];

    // Populate employee dropdown
    var empSelect = document.getElementById('add_employee');
    if (empSelect) {
        employeeData.forEach(function (emp) {
            var opt = document.createElement('option');
            opt.value = emp.id;
            opt.setAttribute('data-empid', 'EMP' + String(emp.id).padStart(3, '0'));
            opt.setAttribute('data-name', emp.name);
            opt.setAttribute('data-role', emp.role);
            opt.setAttribute('data-branch', emp.branch);
            opt.textContent = 'EMP' + String(emp.id).padStart(3, '0') + ' - ' + emp.name;
            empSelect.appendChild(opt);
        });
    }

    var attTable = MasterTable.init({
        tableId: 'attendanceLogTable',
        tbodyId: 'attTbody',

        data: attendanceData,
        tableName: 'Manual Attendance Check-in / Check-out',
        primaryKey: 'id',
        searchFields: ['name', 'emp_id', 'date', 'status'],

        columns: [
            { field: 'date', title: 'Date', sortable: true },
            {
                field: 'emp_id',
                title: 'Employee',
                sortable: true,
                render: function (val, row) {
                    var idx = (row.id - 1) % 4 + 1;
                    return '<div class="d-flex align-items-center gap-2">' +
                        '<img src="./assets/img/profile-' + idx + '.jpg" class="avatar-sm" style="width:34px;height:34px;border-radius:10px;object-fit:cover;" alt="">' +
                        '<div>' +
                        '<div class="fw-bold" style="color:var(--primary-dark);font-size:12px;">' + val + '</div>' +
                        '<div class="fw-bold" style="font-size:13px;">' + row.name + '</div>' +
                        '</div></div>';
                }
            },
            { field: 'role', title: 'Role', sortable: true },
            { field: 'branch', title: 'Branch', sortable: true },
            { field: 'shift', title: 'Shift', sortable: true },
            { field: 'check_in', title: 'Check In', sortable: true },
            { field: 'check_out', title: 'Check Out', sortable: true },
            { field: 'work_hours', title: 'Work Hours', sortable: true },
            {
                field: 'status',
                title: 'Status',
                sortable: true,
                render: function (val) {
                    return '<span class="status-pill ' + statusClass(val) + '">' + val + '</span>';
                }
            },
            {
                field: null,
                title: 'Action',
                sortable: false,
                render: function (val, row) {
                    var uid = 'act-' + row.id;
                    return '<div class="profile-menu" style="position:relative">' +
                        '<button type="button" class="menu-trigger btn border btn-sm" onclick="toggleActionMenu(this)" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>' +
                        '<div class="profile-menu-dropdown" style="position:fixed;z-index:1100;width:180px;padding:8px;background:var(--bg-card);border:1px solid var(--border-soft);border-radius:12px;box-shadow:0 14px 32px rgba(20,30,25,.14);opacity:0;visibility:hidden;transform:translateY(-6px);transition:opacity .16s,transform .16s,visibility .16s;display:none;">' +
                        '<button type="button" class="leave-action-item edit-att-btn" data-id="' + row.id + '"><i class="bi bi-pencil me-2"></i>Edit</button>' +
                        '<button type="button" class="leave-action-item delete-att-btn" data-id="' + row.id + '"><i class="bi bi-trash me-2" style="color:var(--accent-red);"></i>Delete</button>' +
                        '</div></div>';
                }
            }
        ],

        onEdit: function (record, editModal) {
            document.getElementById('edit_id').value = record.id;
            document.getElementById('edit_name').value = record.name;
            document.getElementById('edit_date').value = record.date;
            
            document.getElementById('edit_check_in').value = record.check_in === '-' ? '' : record.check_in;
            document.getElementById('edit_check_out').value = record.check_out === '-' ? '' : record.check_out;
            
            document.getElementById('edit_status').value = record.status;
            editModal.show();
        }
    });

    // ---- Add ----
    var addModalEl = document.getElementById('addModal');
    var addModal = addModalEl ? bootstrap.Modal.getOrCreateInstance(addModalEl) : null;

    function resetAddForm() {
        var empSelect = document.getElementById('add_employee');
        if (empSelect) empSelect.value = '';
        document.getElementById('add_date').value = '';
        document.getElementById('add_check_in').value = '';
        document.getElementById('add_check_out').value = '';
        document.getElementById('add_status').value = 'Present';
    }

    document.getElementById('btnAddSave').addEventListener('click', function () {
        var empSelect = document.getElementById('add_employee');
        var selectedOption = empSelect.options[empSelect.selectedIndex];
        
        var empId = selectedOption ? selectedOption.getAttribute('data-empid') : '';
        var name = selectedOption ? selectedOption.getAttribute('data-name') : '';
        var role = selectedOption ? selectedOption.getAttribute('data-role') : '';
        var branch = selectedOption ? selectedOption.getAttribute('data-branch') : '';
        var rawDate = document.getElementById('add_date').value; // YYYY-MM-DD
        
        var checkInVal = document.getElementById('add_check_in').value || '-';
        var checkOutVal = document.getElementById('add_check_out').value || '-';
        var statusVal = document.getElementById('add_status').value;

        if (!empSelect.value || !rawDate) {
            alert('Please select an Employee and a Date.');
            return;
        }

        // Convert YYYY-MM-DD to DD-MM-YYYY format to match dummy data
        var dateParts = rawDate.split('-');
        var formattedDate = dateParts.length === 3 ? dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0] : rawDate;

        attTable.addItem({
            id: attTable.getNextId(),
            emp_id: empId,
            name: name,
            role: role,
            branch: branch,
            shift: 'General Shift', // Default shift for manual entry
            date: formattedDate,
            check_in: checkInVal,
            check_out: checkOutVal,
            work_hours: '-', // Work hours can be calculated on backend later
            status: statusVal
        });

        resetAddForm();
        addModal.hide();
    });

    if (addModalEl) {
        addModalEl.addEventListener('hidden.bs.modal', resetAddForm);
    }

    // ---- Edit ----
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    document.getElementById('btnEditSave').addEventListener('click', function () {
        var id = Number(document.getElementById('edit_id').value);
        
        var checkInVal = document.getElementById('edit_check_in').value || '-';
        var checkOutVal = document.getElementById('edit_check_out').value || '-';
        var statusVal = document.getElementById('edit_status').value;

        attTable.updateItem(id, { 
            check_in: checkInVal, 
            check_out: checkOutVal,
            status: statusVal
        });
        
        editModal.hide();
    });

    // ========== Action Button Handlers ==========
    // Edit button from dropdown
    document.addEventListener('click', function(e) {
        var btn = e.target.closest('.edit-att-btn');
        if (!btn) return;

        // Close dropdown
        var dd = btn.closest('.profile-menu-dropdown');
        if (dd) { dd.style.display = 'none'; dd.classList.remove('action-dropdown-open'); }

        var id = Number(btn.getAttribute('data-id'));
        var row = attTable.getData().find(function(r) { return r.id === id; });
        if (!row) return;

        // Open edit modal with data
        document.getElementById('edit_id').value = row.id;
        document.getElementById('edit_name').value = row.name;
        document.getElementById('edit_date').value = row.date;
        document.getElementById('edit_check_in').value = row.check_in === '-' ? '' : row.check_in;
        document.getElementById('edit_check_out').value = row.check_out === '-' ? '' : row.check_out;
        document.getElementById('edit_status').value = row.status;
        editModal.show();
    });

    // Delete button
    document.addEventListener('click', function(e) {
        var btn = e.target.closest('.delete-att-btn');
        if (!btn) return;

        // Close dropdown
        var dd = btn.closest('.profile-menu-dropdown');
        if (dd) { dd.style.display = 'none'; dd.classList.remove('action-dropdown-open'); }

        var id = Number(btn.getAttribute('data-id'));
        var row = attTable.getData().find(function(r) { return r.id === id; });
        if (!row) return;

        if (confirm('Are you sure you want to delete attendance for ' + row.name + '?')) {
            attTable.deleteItem(id);
        }
    });

    // ========== Date Picker Navigation ==========
    var dateInput = document.getElementById('attendanceDateSelect');
    var prevBtn = document.getElementById('prevDate');
    var nextBtn = document.getElementById('nextDate');
    var currentDate = new Date(2026, 8, 2); // 02-09-2026 (month is 0-indexed)

    function formatDate(date) {
        var day = String(date.getDate()).padStart(2, '0');
        var month = String(date.getMonth() + 1).padStart(2, '0');
        var year = date.getFullYear();
        return day + '-' + month + '-' + year;
    }

    function parseDate(dateStr) {
        var parts = dateStr.split('-');
        return new Date(parts[2], parts[1] - 1, parts[0]);
    }

    function filterByDate() {
        var selectedDate = dateInput.value;
        if (!selectedDate) return;

        var filtered = attendanceData.filter(function(row) {
            return row.date === selectedDate;
        });

        attTable.getData().length = 0;
        filtered.forEach(function(r) { attTable.getData().push(r); });
        attTable.refresh();
    }

    if (prevBtn && nextBtn && dateInput) {
        prevBtn.addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() - 1);
            dateInput.value = formatDate(currentDate);
            filterByDate();
        });

        nextBtn.addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() + 1);
            dateInput.value = formatDate(currentDate);
            filterByDate();
        });

        dateInput.addEventListener('change', function() {
            currentDate = parseDate(dateInput.value);
            filterByDate();
        });
    }
});
