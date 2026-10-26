/**
 * Gharuda CRM - Onboarding Assets Page Script
 * File: assets/js/pages/onboarding-assets.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    let currentFilter = 'all';
    let currentEditRow = null;

    // Helper functions for date formatting
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
        if (!str) return 'N/A';
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const d = new Date(str);
        if (isNaN(d.getTime())) return str;
        const day = String(d.getDate()).padStart(2, '0');
        const month = months[d.getMonth()];
        const year = d.getFullYear();
        return `${day}-${month}-${year}`;
    }

    function getAssetIconClass(type) {
        switch((type || '').toLowerCase()) {
            case 'laptop': return 'bi-laptop text-primary';
            case 'desktop': return 'bi-pc-display text-info';
            case 'monitor': return 'bi-display text-info';
            case 'mobile': return 'bi-phone text-warning';
            case 'headset': return 'bi-headphones text-danger';
            case 'id card': return 'bi-person-badge text-success';
            case 'access card': return 'bi-key-fill text-success';
            default: return 'bi-box-seam text-secondary';
        }
    }

    // Hook used by tabel.js for stage filtering
    window.attendanceRowMatches = function(row) {
        if (!row || !row.getAttribute) return true;
        const status = (row.getAttribute('data-status') || '').toLowerCase();

        if (currentFilter === 'requested') return status === 'requested';
        if (currentFilter === 'approved') return status === 'approved';
        if (currentFilter === 'assigned') return status === 'assigned';
        if (currentFilter === 'returned') return status === 'returned' || status === 'damaged';

        return true;
    };

    // Filter Tabs Click
    document.querySelectorAll('#assetTabsWrap .ln-stage-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('#assetTabsWrap .ln-stage-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.getAttribute('data-filter');
            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    });

    // View Asset Click Handler
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-asset');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;

        const empName = row.getAttribute('data-empname') || '';
        const empId = row.getAttribute('data-empid') || '';
        const dept = row.getAttribute('data-dept') || '';
        const role = row.getAttribute('data-role') || '';
        const type = row.getAttribute('data-type') || 'Asset';
        const model = row.getAttribute('data-model') || '';
        const assetId = row.getAttribute('data-assetid') || '-';
        const serial = row.getAttribute('data-serial') || '-';
        const assignedDate = row.getAttribute('data-assigneddate') || '';
        const assignedBy = row.getAttribute('data-assignedby') || '-';
        const condition = row.getAttribute('data-condition') || 'New';
        const accessories = row.getAttribute('data-accessories') || 'Standard accessories';
        const location = row.getAttribute('data-location') || 'Office';
        const returnDate = row.getAttribute('data-returndate') || 'N/A';
        const status = row.getAttribute('data-status') || 'Assigned';
        const remarks = row.getAttribute('data-remarks') || 'No remarks provided.';

        document.getElementById('viewAssetTitle').innerText = model || type;
        document.getElementById('viewEmpSub').innerText = `${empName} • ${empId} • ${role} (${dept})`;
        document.getElementById('viewAssetType').innerText = type;
        document.getElementById('viewAssetTag').innerText = assetId;
        document.getElementById('viewSerial').innerText = serial;
        document.getElementById('viewCondition').innerText = condition;
        document.getElementById('viewLocation').innerText = location;
        document.getElementById('viewReturnDate').innerText = formatDateForDisplay(returnDate);
        document.getElementById('viewAssignedDate').innerText = formatDateForDisplay(assignedDate);
        document.getElementById('viewAssignedBy').innerText = assignedBy;
        document.getElementById('viewRemarks').innerText = remarks;

        // Render Accessories Badges
        const accWrap = document.getElementById('viewAccessoriesWrap');
        accWrap.innerHTML = '';
        accessories.split(',').forEach(item => {
            const span = document.createElement('span');
            span.className = 'badge bg-light text-dark border me-1 mb-1';
            span.style.fontSize = '11px';
            span.innerHTML = `<i class="bi bi-check2 text-success me-1"></i>${item.trim()}`;
            accWrap.appendChild(span);
        });

        // Set Workflow Steps
        const s1 = document.getElementById('wfStep1');
        const s2 = document.getElementById('wfStep2');
        const s3 = document.getElementById('wfStep3');
        const s4 = document.getElementById('wfStep4');
        const s5 = document.getElementById('wfStep5');

        [s1, s2, s3, s4, s5].forEach(s => { if (s) s.className = 'workflow-step'; });

        if (status === 'Requested') {
            s1.className = 'workflow-step active';
        } else if (status === 'Approved') {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step active';
        } else if (status === 'Assigned') {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step completed';
            s3.className = 'workflow-step active';
        } else if (status === 'Returned') {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step completed';
            s3.className = 'workflow-step completed';
            s4.className = 'workflow-step active';
        } else {
            s1.className = 'workflow-step completed';
            s2.className = 'workflow-step completed';
            s3.className = 'workflow-step completed';
            s4.className = 'workflow-step completed';
            s5.className = 'workflow-step active';
        }

        const modalEl = document.getElementById('viewAssetModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    });

    // Edit Asset Click Handler
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-edit-asset');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;
        currentEditRow = row;

        const empName = row.getAttribute('data-empname') || '';
        const empId = row.getAttribute('data-empid') || '';
        const dept = row.getAttribute('data-dept') || '';
        const type = row.getAttribute('data-type') || 'Laptop';
        const model = row.getAttribute('data-model') || '';
        const assetId = row.getAttribute('data-assetid') || '';
        const serial = row.getAttribute('data-serial') || '';
        const assignedDate = row.getAttribute('data-assigneddate') || '';
        const assignedBy = row.getAttribute('data-assignedby') || '';
        const condition = row.getAttribute('data-condition') || 'New';
        const accessories = row.getAttribute('data-accessories') || '';
        const location = row.getAttribute('data-location') || 'Office (HQ - Chennai)';
        const returnDate = row.getAttribute('data-returndate') || '';
        const status = row.getAttribute('data-status') || 'Assigned';
        const remarks = row.getAttribute('data-remarks') || '';

        document.getElementById('editEmpName').value = empName;
        document.getElementById('editEmpInfo').value = `${empId} • ${dept}`;
        document.getElementById('editAssetType').value = type;
        document.getElementById('editAssetModel').value = model;
        document.getElementById('editAssetId').value = assetId;
        document.getElementById('editSerial').value = serial;
        document.getElementById('editAssignedDate').value = parseDateForInput(assignedDate);
        document.getElementById('editAssignedBy').value = assignedBy;
        document.getElementById('editCondition').value = condition;
        document.getElementById('editAccessories').value = accessories;
        document.getElementById('editLocation').value = location;
        document.getElementById('editReturnDate').value = parseDateForInput(returnDate);
        document.getElementById('editStatus').value = status;
        document.getElementById('editRemarks').value = remarks;

        const modalEl = document.getElementById('editAssetModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }
    });

    // Update Asset Submit Handler
    const btnUpdate = document.getElementById('btnUpdateAsset');
    if (btnUpdate) {
        btnUpdate.addEventListener('click', function() {
            if (!currentEditRow) return;

            const empName = document.getElementById('editEmpName').value.trim();
            const type = document.getElementById('editAssetType').value;
            const model = document.getElementById('editAssetModel').value.trim();
            const assetId = document.getElementById('editAssetId').value.trim();
            const serial = document.getElementById('editSerial').value.trim();
            const assignedDate = document.getElementById('editAssignedDate').value;
            const assignedBy = document.getElementById('editAssignedBy').value.trim();
            const condition = document.getElementById('editCondition').value;
            const accessories = document.getElementById('editAccessories').value.trim();
            const location = document.getElementById('editLocation').value;
            const returnDate = document.getElementById('editReturnDate').value;
            const status = document.getElementById('editStatus').value;
            const remarks = document.getElementById('editRemarks').value.trim();

            if (!empName || !model || !assetId) {
                alert('Please fill out mandatory fields.');
                return;
            }

            let statusPillHtml = '';
            if (status === 'Assigned') statusPillHtml = '<span class="asset-status-pill asset-status-assigned"><i class="bi bi-check-circle-fill"></i> Assigned</span>';
            else if (status === 'Approved') statusPillHtml = '<span class="asset-status-pill asset-status-approved"><i class="bi bi-hand-thumbs-up-fill"></i> Approved</span>';
            else if (status === 'Requested') statusPillHtml = '<span class="asset-status-pill asset-status-requested"><i class="bi bi-hourglass-split"></i> Requested</span>';
            else if (status === 'Returned') statusPillHtml = '<span class="asset-status-pill asset-status-returned"><i class="bi bi-box-arrow-in-left"></i> Returned</span>';
            else statusPillHtml = '<span class="asset-status-pill asset-status-damaged"><i class="bi bi-exclamation-triangle-fill"></i> Damaged</span>';

            const iconClass = getAssetIconClass(type);

            // Update row dataset
            currentEditRow.setAttribute('data-empname', empName);
            currentEditRow.setAttribute('data-type', type);
            currentEditRow.setAttribute('data-model', model);
            currentEditRow.setAttribute('data-assetid', assetId);
            currentEditRow.setAttribute('data-serial', serial);
            currentEditRow.setAttribute('data-assigneddate', assignedDate);
            currentEditRow.setAttribute('data-assignedby', assignedBy);
            currentEditRow.setAttribute('data-condition', condition);
            currentEditRow.setAttribute('data-accessories', accessories);
            currentEditRow.setAttribute('data-location', location);
            currentEditRow.setAttribute('data-returndate', returnDate);
            currentEditRow.setAttribute('data-status', status);
            currentEditRow.setAttribute('data-remarks', remarks);

            // Update DOM Cells
            const cells = currentEditRow.querySelectorAll('td');
            if (cells[2]) cells[2].innerHTML = `<div class="fw-bold text-dark"><i class="bi ${iconClass} me-1"></i> ${type}</div><div class="text-muted" style="font-size:11.5px;">${model}</div>`;
            if (cells[3]) cells[3].innerHTML = `<div><span class="tag-badge">${assetId}</span></div><div class="text-muted" style="font-size:11px; font-family:monospace;">SN: ${serial}</div>`;
            if (cells[4]) cells[4].innerHTML = `<div class="fw-semibold text-dark" style="font-size:12.5px;">${formatDateForDisplay(assignedDate)}</div><div class="text-muted" style="font-size:11px;">${assignedBy}</div>`;
            if (cells[5]) cells[5].innerHTML = `<span class="badge bg-light text-dark border me-1">${condition}</span><span class="badge bg-light text-dark border">${location}</span>`;
            if (cells[6]) cells[6].innerHTML = `<span class="badge bg-light text-dark border" style="font-size:10.5px;">${accessories || 'Standard'}</span>`;
            if (cells[7]) cells[7].textContent = formatDateForDisplay(returnDate);
            if (cells[8]) cells[8].innerHTML = statusPillHtml;

            const modalEl = document.getElementById('editAssetModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getInstance(modalEl).hide();
            }

            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    }

    // Allocate / Save New Asset Handler
    const btnSaveAsset = document.getElementById('btnSaveAsset');
    if (btnSaveAsset) {
        btnSaveAsset.addEventListener('click', function() {
            const empVal = document.getElementById('addEmpSelect').value.split('|');
            const empName = empVal[0] || 'Employee';
            const empId = empVal[1] || 'EMP-2026-000';
            const dept = empVal[2] || 'Operations';
            const role = empVal[3] || 'Staff';

            const type = document.getElementById('addAssetType').value;
            const model = document.getElementById('addAssetModel').value.trim();
            const assetId = document.getElementById('addAssetId').value.trim();
            const serial = document.getElementById('addSerial').value.trim();
            const assignedDate = document.getElementById('addAssignedDate').value;
            const assignedBy = document.getElementById('addAssignedBy').value;
            const condition = document.getElementById('addCondition').value;
            const accessories = document.getElementById('addAccessories').value.trim();
            const location = document.getElementById('addLocation').value;
            const returnDate = document.getElementById('addReturnDate').value;
            const status = document.getElementById('addStatus').value;
            const remarks = document.getElementById('addRemarks').value.trim();

            if (!model || !assetId || !serial) {
                alert('Please fill out model name, asset tag ID, and serial number.');
                return;
            }

            const iconClass = getAssetIconClass(type);
            const pgBody = document.getElementById('pgBody');
            const rowCount = pgBody ? pgBody.querySelectorAll('tr').length + 1 : 1;

            let statusPillHtml = '';
            if (status === 'Assigned') statusPillHtml = '<span class="asset-status-pill asset-status-assigned"><i class="bi bi-check-circle-fill"></i> Assigned</span>';
            else if (status === 'Approved') statusPillHtml = '<span class="asset-status-pill asset-status-approved"><i class="bi bi-hand-thumbs-up-fill"></i> Approved</span>';
            else if (status === 'Requested') statusPillHtml = '<span class="asset-status-pill asset-status-requested"><i class="bi bi-hourglass-split"></i> Requested</span>';
            else if (status === 'Returned') statusPillHtml = '<span class="asset-status-pill asset-status-returned"><i class="bi bi-box-arrow-in-left"></i> Returned</span>';
            else statusPillHtml = '<span class="asset-status-pill asset-status-damaged"><i class="bi bi-exclamation-triangle-fill"></i> Damaged</span>';

            const tr = document.createElement('tr');
            tr.className = 'asset-row';
            tr.setAttribute('data-empname', empName);
            tr.setAttribute('data-empid', empId);
            tr.setAttribute('data-dept', dept);
            tr.setAttribute('data-role', role);
            tr.setAttribute('data-type', type);
            tr.setAttribute('data-model', model);
            tr.setAttribute('data-assetid', assetId);
            tr.setAttribute('data-serial', serial);
            tr.setAttribute('data-assigneddate', assignedDate);
            tr.setAttribute('data-assignedby', assignedBy);
            tr.setAttribute('data-condition', condition);
            tr.setAttribute('data-accessories', accessories);
            tr.setAttribute('data-location', location);
            tr.setAttribute('data-returndate', returnDate);
            tr.setAttribute('data-status', status);
            tr.setAttribute('data-remarks', remarks);

            tr.innerHTML = `
                <td class="sno-value">${rowCount}</td>
                <td>
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar-sm d-flex align-items-center justify-content-center bg-primary text-white fw-bold" style="width:34px;height:34px;border-radius:50%;">${empName.charAt(0)}</div>
                        <div>
                            <div class="fw-bold text-dark">${empName}</div>
                            <div class="text-muted" style="font-size:11px;">${empId} • ${role}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="fw-bold text-dark"><i class="bi ${iconClass} me-1"></i> ${type}</div>
                    <div class="text-muted" style="font-size:11.5px;">${model}</div>
                </td>
                <td>
                    <div><span class="tag-badge">${assetId}</span></div>
                    <div class="text-muted" style="font-size:11px; font-family:monospace;">SN: ${serial}</div>
                </td>
                <td>
                    <div class="fw-semibold text-dark" style="font-size:12.5px;">${formatDateForDisplay(assignedDate)}</div>
                    <div class="text-muted" style="font-size:11px;">${assignedBy}</div>
                </td>
                <td>
                    <span class="badge bg-light text-dark border me-1">${condition}</span>
                    <span class="badge bg-light text-dark border">${location}</span>
                </td>
                <td>
                    <span class="badge bg-light text-dark border" style="font-size:10.5px;">${accessories || 'Standard'}</span>
                </td>
                <td class="text-muted" style="font-size:12px;">${formatDateForDisplay(returnDate)}</td>
                <td>${statusPillHtml}</td>
                <td class="text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-primary btn-view-asset" data-bs-toggle="tooltip" title="View Handover & Lifecycle Sheet"><i class="bi bi-file-earmark-text"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-secondary btn-edit-asset" data-bs-toggle="tooltip" title="Edit Asset / Change Status"><i class="bi bi-pencil"></i></button>
                    </div>
                </td>
            `;

            if (pgBody) pgBody.appendChild(tr);

            const modalEl = document.getElementById('provisionAssetModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getInstance(modalEl).hide();
            }

            const form = document.getElementById('provisionAssetForm');
            if (form) form.reset();

            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    }
});
