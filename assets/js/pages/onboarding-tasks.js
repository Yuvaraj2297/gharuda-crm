/**
 * Gharuda CRM - Onboarding Tasks Page Script
 * File: assets/js/pages/onboarding-tasks.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    let currentEditRow = null;

    // Helper functions for date conversion
    function parseDateForInput(str) {
        if (!str) return '';
        str = str.trim();
        if (/^\d{4}-\d{2}-\d{2}$/.test(str)) return str;
        const months = { Jan: '01', Feb: '02', Mar: '03', Apr: '04', May: '05', Jun: '06', Jul: '07', Aug: '08', Sep: '09', Oct: '10', Nov: '11', Dec: '12' };
        const parts = str.split('-');
        if (parts.length === 3) {
            const day = parts[0].padStart(2, '0');
            const month = months[parts[1]] || '01';
            const year = parts[2];
            return `${year}-${month}-${day}`;
        }
        return '';
    }

    function formatDateForDisplay(str) {
        if (!str) return '';
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const d = new Date(str);
        if (isNaN(d.getTime())) return str;
        const day = String(d.getDate()).padStart(2, '0');
        const month = months[d.getMonth()];
        const year = d.getFullYear();
        return `${day}-${month}-${year}`;
    }

    // Checkbox toggle
    document.addEventListener('change', function(e) {
        if (e.target && e.target.classList.contains('task-checkbox')) {
            const isChecked = e.target.checked;
            const row = e.target.closest('tr');
            if (!row) return;
            const textSpan = e.target.nextElementSibling || e.target.parentElement.querySelector('span');
            const statusTd = row.children[7];

            if (isChecked) {
                if (statusTd) statusTd.innerHTML = '<span class="task-status-done"><i class="bi bi-check-circle-fill"></i> Completed</span>';
                if (textSpan) textSpan.classList.add('text-decoration-line-through', 'text-muted');
                row.setAttribute('data-status', 'Completed');
            } else {
                if (statusTd) statusTd.innerHTML = '<span class="task-status-pending"><i class="bi bi-hourglass-split"></i> Pending</span>';
                if (textSpan) textSpan.classList.remove('text-decoration-line-through', 'text-muted');
                row.setAttribute('data-status', 'Pending');
            }
        }
    });

    // Edit button click handler
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-edit-task, .edit');
        if (!btn) return;
        e.preventDefault();

        const row = btn.closest('tr');
        if (!row) return;
        currentEditRow = row;

        const title = row.getAttribute('data-title') || (row.children[1] ? row.children[1].innerText.trim() : '');
        const phase = row.getAttribute('data-phase') || (row.children[2] ? row.children[2].innerText.trim() : '');
        const joiner = row.getAttribute('data-joiner') || (row.children[3] ? row.children[3].innerText.trim() : '');
        const owner = row.getAttribute('data-owner') || (row.children[5] ? row.children[5].innerText.trim() : '');
        const dueDateRaw = row.getAttribute('data-duedate') || (row.children[6] ? row.children[6].innerText.trim() : '');
        const status = row.getAttribute('data-status') || (row.children[7] ? row.children[7].innerText.trim() : '');

        const titleInput = document.getElementById('editTaskTitle');
        if (titleInput) titleInput.value = title;

        // Match Phase
        const phaseSelect = document.getElementById('editTaskPhase');
        if (phaseSelect) {
            for (let opt of phaseSelect.options) {
                if (phase.toLowerCase().includes(opt.value.toLowerCase()) || opt.value.toLowerCase().includes(phase.toLowerCase())) {
                    opt.selected = true;
                    break;
                }
            }
        }

        // Match Joiner
        const joinerSelect = document.getElementById('editTaskJoiner');
        if (joinerSelect) {
            for (let opt of joinerSelect.options) {
                if (opt.value.toLowerCase().includes(joiner.toLowerCase()) || joiner.toLowerCase().includes(opt.value.toLowerCase())) {
                    opt.selected = true;
                    break;
                }
            }
        }

        const ownerInput = document.getElementById('editTasgharudaner');
        if (ownerInput) ownerInput.value = owner;

        const dateInput = document.getElementById('editTaskDueDate');
        if (dateInput) dateInput.value = parseDateForInput(dueDateRaw);

        const statusSelect = document.getElementById('editTaskStatus');
        if (statusSelect) {
            if (status.toLowerCase().includes('completed') || status.toLowerCase().includes('done')) {
                statusSelect.value = 'Completed';
            } else if (status.toLowerCase().includes('progress')) {
                statusSelect.value = 'In Progress';
            } else if (status.toLowerCase().includes('upcoming')) {
                statusSelect.value = 'Upcoming';
            } else {
                statusSelect.value = 'Pending';
            }
        }

        const editModalEl = document.getElementById('editTaskModal');
        if (editModalEl && typeof bootstrap !== 'undefined') {
            const editModal = bootstrap.Modal.getOrCreateInstance(editModalEl);
            editModal.show();
        }
    });

    // Save Edit Task handler
    const btnSaveEdit = document.getElementById('btnSaveEditTask');
    if (btnSaveEdit) {
        btnSaveEdit.addEventListener('click', function() {
            if (!currentEditRow) return;

            const titleInput = document.getElementById('editTaskTitle');
            const title = titleInput ? titleInput.value.trim() : '';

            if (!title) {
                alert('Please enter a task title.');
                return;
            }

            const phase = document.getElementById('editTaskPhase')?.value || 'Pre-Boarding';
            const joinerVal = document.getElementById('editTaskJoiner')?.value || 'All Joiners';
            const owner = document.getElementById('editTasgharudaner')?.value.trim() || 'HR Ops';
            const dueDate = document.getElementById('editTaskDueDate')?.value || '';
            const status = document.getElementById('editTaskStatus')?.value || 'Pending';

            let role = 'Joiner';
            let dept = 'General';
            let joinerName = joinerVal;
            if (joinerVal.includes('Kavitha')) { joinerName = 'Kavitha Raman'; role = 'UI/UX Designer'; dept = 'Design'; }
            else if (joinerVal.includes('Rahul')) { joinerName = 'Rahul Verma'; role = 'Backend Engineer'; dept = 'Engineering'; }
            else if (joinerVal.includes('Siddharth')) { joinerName = 'Siddharth Nair'; role = 'iOS App Developer'; dept = 'iOS Dev'; }
            else if (joinerVal.includes('Priya')) { joinerName = 'Priya Sundaram'; role = 'Financial Analyst'; dept = 'Finance'; }
            else { joinerName = 'All Joiners'; role = 'Template Default'; dept = 'General'; }

            let phaseBadgeHtml = '';
            if (phase.includes('Pre-Boarding')) {
                phaseBadgeHtml = '<span class="milestone-badge milestone-pre">Pre-Boarding</span>';
            } else if (phase.includes('Day 1')) {
                phaseBadgeHtml = '<span class="milestone-badge milestone-day1">Day 1</span>';
            } else if (phase.includes('Week 1')) {
                phaseBadgeHtml = '<span class="milestone-badge milestone-week1">Week 1</span>';
            } else {
                phaseBadgeHtml = '<span class="milestone-badge milestone-month1">' + phase.replace(' Review', '').replace(' Goal', '') + '</span>';
            }

            let statusBadgeHtml = '';
            let isChecked = false;
            let strikeClass = '';
            if (status === 'Completed') {
                statusBadgeHtml = '<span class="task-status-done"><i class="bi bi-check-circle-fill"></i> Completed</span>';
                isChecked = true;
                strikeClass = 'text-decoration-line-through text-muted';
            } else if (status === 'In Progress') {
                statusBadgeHtml = '<span class="task-status-progress"><i class="bi bi-arrow-repeat"></i> In Progress</span>';
            } else if (status === 'Upcoming') {
                statusBadgeHtml = '<span class="task-status-pending"><i class="bi bi-clock-history"></i> Upcoming</span>';
            } else {
                statusBadgeHtml = '<span class="task-status-pending"><i class="bi bi-hourglass-split"></i> Pending</span>';
            }

            // Update attributes
            currentEditRow.setAttribute('data-title', title);
            currentEditRow.setAttribute('data-phase', phase);
            currentEditRow.setAttribute('data-joiner', joinerName);
            currentEditRow.setAttribute('data-role', role);
            currentEditRow.setAttribute('data-dept', dept);
            currentEditRow.setAttribute('data-owner', owner);
            currentEditRow.setAttribute('data-duedate', dueDate);
            currentEditRow.setAttribute('data-status', status);

            // Update DOM cells
            const cells = currentEditRow.querySelectorAll('td');
            if (cells[1]) {
                cells[1].innerHTML = `
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input mt-0 task-checkbox" type="checkbox" ${isChecked ? 'checked' : ''}>
                        <span class="fw-bold text-dark ${strikeClass}">${title}</span>
                    </div>
                `;
            }
            if (cells[2]) cells[2].innerHTML = phaseBadgeHtml;
            if (cells[3]) {
                cells[3].innerHTML = `
                    <div class="fw-bold text-dark">${joinerName}</div>
                    <div class="text-muted" style="font-size:11px;">${role}</div>
                `;
            }
            if (cells[4]) cells[4].innerHTML = `<span class="badge bg-light text-dark border">${dept}</span>`;
            if (cells[5]) cells[5].textContent = owner;
            if (cells[6]) cells[6].textContent = formatDateForDisplay(dueDate);
            if (cells[7]) cells[7].innerHTML = statusBadgeHtml;

            const modalEl = document.getElementById('editTaskModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const modalInst = bootstrap.Modal.getInstance(modalEl);
                if (modalInst) modalInst.hide();
            }
        });
    }

    // Save Add Task handler
    const btnSaveAdd = document.getElementById('btnSaveAddTask');
    if (btnSaveAdd) {
        btnSaveAdd.addEventListener('click', function() {
            const titleInput = document.getElementById('addTaskTitle');
            const title = titleInput ? titleInput.value.trim() : '';

            if (!title) {
                alert('Please enter a task title.');
                return;
            }

            const phase = document.getElementById('addTaskPhase')?.value || 'Pre-Boarding';
            const joinerVal = document.getElementById('addTaskJoiner')?.value || 'All Joiners';
            const owner = document.getElementById('addTasgharudaner')?.value.trim() || 'HR Ops';
            const dueDate = document.getElementById('addTaskDueDate')?.value || '2026-03-20';

            let role = 'Joiner';
            let dept = 'General';
            let joinerName = joinerVal;
            if (joinerVal.includes('Kavitha')) { joinerName = 'Kavitha Raman'; role = 'UI/UX Designer'; dept = 'Design'; }
            else if (joinerVal.includes('Rahul')) { joinerName = 'Rahul Verma'; role = 'Backend Engineer'; dept = 'Engineering'; }
            else if (joinerVal.includes('Siddharth')) { joinerName = 'Siddharth Nair'; role = 'iOS App Developer'; dept = 'iOS Dev'; }
            else if (joinerVal.includes('Priya')) { joinerName = 'Priya Sundaram'; role = 'Financial Analyst'; dept = 'Finance'; }
            else { joinerName = 'All Joiners'; role = 'Template Default'; dept = 'General'; }

            let phaseBadgeHtml = '';
            if (phase.includes('Pre-Boarding')) {
                phaseBadgeHtml = '<span class="milestone-badge milestone-pre">Pre-Boarding</span>';
            } else if (phase.includes('Day 1')) {
                phaseBadgeHtml = '<span class="milestone-badge milestone-day1">Day 1</span>';
            } else if (phase.includes('Week 1')) {
                phaseBadgeHtml = '<span class="milestone-badge milestone-week1">Week 1</span>';
            } else {
                phaseBadgeHtml = '<span class="milestone-badge milestone-month1">' + phase.replace(' Review', '').replace(' Goal', '') + '</span>';
            }

            const pgBody = document.getElementById('pgBody');
            const rowCount = pgBody ? pgBody.querySelectorAll('tr').length + 1 : 1;

            const tr = document.createElement('tr');
            tr.className = 'task-row';
            tr.setAttribute('data-title', title);
            tr.setAttribute('data-phase', phase);
            tr.setAttribute('data-joiner', joinerName);
            tr.setAttribute('data-role', role);
            tr.setAttribute('data-dept', dept);
            tr.setAttribute('data-owner', owner);
            tr.setAttribute('data-duedate', dueDate);
            tr.setAttribute('data-status', 'Pending');

            tr.innerHTML = `
                <td class="sno-value">${rowCount}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <input class="form-check-input mt-0 task-checkbox" type="checkbox">
                        <span class="fw-bold text-dark">${title}</span>
                    </div>
                </td>
                <td>${phaseBadgeHtml}</td>
                <td>
                    <div class="fw-bold text-dark">${joinerName}</div>
                    <div class="text-muted" style="font-size:11px;">${role}</div>
                </td>
                <td><span class="badge bg-light text-dark border">${dept}</span></td>
                <td>${owner}</td>
                <td class="text-nowrap">${formatDateForDisplay(dueDate)}</td>
                <td><span class="task-status-pending"><i class="bi bi-hourglass-split"></i> Pending</span></td>
                <td>
                    <button type="button" class="btn btn-sm edit btn-edit-task" data-bs-toggle="tooltip" data-bs-title="Edit Task"><i class="mdi mdi-pencil"></i></button>
                </td>
            `;

            if (pgBody) pgBody.appendChild(tr);

            const modalEl = document.getElementById('addTaskModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const modalInst = bootstrap.Modal.getInstance(modalEl);
                if (modalInst) modalInst.hide();
            }

            const addForm = document.getElementById('addTaskForm');
            if (addForm) addForm.reset();

            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    }
});
