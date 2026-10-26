/**
 * Gharuda CRM - Overtime Page Script
 * File: assets/js/pages/overtime.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
let activeReviewRow = null;
    let currentDeptReportName = "Engineering & IT";

    function openDeptOTReportModal(deptName, totalEmp, totalHrs, apprHrs, rejHrs, cost) {
        currentDeptReportName = deptName;
        document.getElementById('m-dept-title').innerText = `${deptName} Department`;
        document.getElementById('m-dept-emp-count').innerText = totalEmp;
        document.getElementById('m-dept-tot-hrs').innerText = totalHrs;
        document.getElementById('m-dept-appr-hrs').innerText = apprHrs;
        document.getElementById('m-dept-rej-hrs').innerText = rejHrs;
        document.getElementById('m-dept-cost').innerText = cost;

        const modal = new bootstrap.Modal(document.getElementById('deptOTReportModal'));
        modal.show();
    }

    function downloadDeptReportCSV() {
        let csv = `Department Overtime Audit Report - ${currentDeptReportName}\n`;
        csv += "Employee Name,Role,Approved OT Hours,Rate Multiplier,Total Payout (INR),Status\n";
        csv += `${currentDeptReportName} Lead,Senior Role,18.0 hrs,1.5x,4050,Approved\n`;
        csv += `${currentDeptReportName} Specialist,Technical Lead,24.0 hrs,2.0x,6000,Approved\n`;
        csv += `${currentDeptReportName} Analyst,Operations,26.0 hrs,1.5x,1150,Approved\n`;

        const blob = new Blob([csv], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.setAttribute('href', url);
        a.setAttribute('download', `${currentDeptReportName.replace(/[^a-zA-Z0-9]/g, '_')}_OT_Report.csv`);
        a.click();
    }

    // Tab Switcher
    function switchTab(tabId, btnElement) {
        document.querySelectorAll('.tab-content-sec').forEach(el => el.classList.add('d-none'));
        document.querySelectorAll('.ot-tab-btn').forEach(el => el.classList.remove('active'));

        const targetTab = document.getElementById('tab-' + tabId);
        if (targetTab) {
            targetTab.classList.remove('d-none');
        }

        if (btnElement) {
            btnElement.classList.add('active');
        } else {
            const btn = document.querySelector(`.ot-tab-btn[onclick*="'${tabId}'"]`);
            if (btn) btn.classList.add('active');
        }
    }

    // Auto-fill assignment details
    function autoFillAsgnDept() {
        const select = document.getElementById('asgnEmpSelect');
        const selectedOpt = select.options[select.selectedIndex];
        const dept = selectedOpt.getAttribute('data-dept') || '';
        const shift = selectedOpt.getAttribute('data-shift') || '9:00 AM - 6:00 PM';
        document.getElementById('asgnDept').value = dept;
        document.getElementById('asgnShift').value = shift;
    }

    // Hours Calculator
    function calcAsgnHours() {
        const start = document.getElementById('asgnStartTime').value;
        const end = document.getElementById('asgnEndTime').value;
        if (start && end) {
            const s = new Date(`1970-01-01T${start}:00`);
            const e = new Date(`1970-01-01T${end}:00`);
            let diff = (e - s) / (1000 * 60 * 60);
            if (diff < 0) diff += 24;
            document.getElementById('asgnHours').value = diff.toFixed(1) + " Hours";
        }
    }

    function calcReqHours() {
        const start = document.getElementById('reqStartTime').value;
        const end = document.getElementById('reqEndTime').value;
        if (start && end) {
            const s = new Date(`1970-01-01T${start}:00`);
            const e = new Date(`1970-01-01T${end}:00`);
            let diff = (e - s) / (1000 * 60 * 60);
            if (diff < 0) diff += 24;
            document.getElementById('reqHours').value = diff.toFixed(1) + " Hours";
        }
    }

    // Modal Triggers
    function openReviewOTModal(otId, empName, dept, date, slot, hours, work, path, btnElement) {
        if (btnElement) {
            activeReviewRow = btnElement.closest('tr');
        }
        document.getElementById('m-ot-id').innerText = otId;
        document.getElementById('m-ot-emp').innerText = empName;
        document.getElementById('m-ot-slot').innerText = `${date} (${slot})`;
        document.getElementById('m-ot-hrs').innerText = hours;
        document.getElementById('m-ot-work').innerText = work;
        document.getElementById('m-ot-path').innerText = path;

        const numHrs = parseFloat(hours) || 3.0;
        document.getElementById('m-ot-appr-hrs').value = numHrs;

        const modal = new bootstrap.Modal(document.getElementById('reviewOTModal'));
        modal.show();
    }

    // Open OT Salary Details Modal (from OT Reports Tab 5)
    function openOTSalaryModal(empId, empName, dept, baseSalary, hourlyRate, totalHrs, stdHrs, holHrs, otSalary) {
        const nameEl = document.getElementById('modal-sal-empname');
        if (nameEl) nameEl.innerText = `${empName} (${empId})`;

        const deptEl = document.getElementById('modal-sal-dept');
        if (deptEl) deptEl.innerText = dept;

        const baseEl = document.getElementById('modal-sal-base');
        if (baseEl) baseEl.innerText = baseSalary;

        const rateEl = document.getElementById('modal-sal-rate');
        if (rateEl) rateEl.innerText = hourlyRate;

        const hrsEl = document.getElementById('modal-sal-hrs');
        if (hrsEl) hrsEl.innerText = totalHrs;

        const stdEl = document.getElementById('modal-sal-std');
        if (stdEl) stdEl.innerText = stdHrs;

        const holEl = document.getElementById('modal-sal-hol');
        if (holEl) holEl.innerText = holHrs;

        const payoutEl = document.getElementById('modal-sal-payout');
        if (payoutEl) payoutEl.innerText = otSalary;

        const modal = new bootstrap.Modal(document.getElementById('otSalaryDetailsModal'));
        modal.show();
    }

    // Process Decision
    function processOTDecision(e) {
        e.preventDefault();
        const decision = document.getElementById('m-ot-decision').value;
        const apprHrs = parseFloat(document.getElementById('m-ot-appr-hrs').value) || 0;
        const rateMult = parseFloat(document.getElementById('m-ot-rate').value) || 1.5;
        const baseRate = parseFloat(document.getElementById('m-ot-base-rate').value) || 150;
        const otPay = Math.round(apprHrs * baseRate * rateMult);

        if (activeReviewRow) {
            const statusTd = activeReviewRow.cells[8];
            const actionTd = activeReviewRow.cells[9];

            if (decision === 'Approved') {
                statusTd.innerHTML = '<span class="ot-badge approved"><i class="bi bi-check-circle-fill"></i> Approved</span>';
                actionTd.innerHTML = `<span class="badge bg-success-subtle text-success fw-bold">Approved ₹ ${otPay}</span>`;
            } else {
                statusTd.innerHTML = '<span class="ot-badge rejected"><i class="bi bi-x-circle-fill"></i> Rejected</span>';
                actionTd.innerHTML = '<span class="badge bg-danger-subtle text-danger fw-bold">Rejected</span>';
            }
        }

        const modal = bootstrap.Modal.getInstance(document.getElementById('reviewOTModal'));
        modal.hide();

        alert(`OT Review Decision Saved!\nStatus: ${decision}\nApproved Hours: ${apprHrs} hrs\nCalculated OT Payout: ₹ ${otPay}`);
    }

    function rejectOTDirect(btn) {
        if (confirm("Are you sure you want to reject this Overtime request?")) {
            const tr = btn.closest('tr');
            tr.cells[8].innerHTML = '<span class="ot-badge rejected"><i class="bi bi-x-circle-fill"></i> Rejected</span>';
            tr.cells[9].innerHTML = '<span class="badge bg-danger-subtle text-danger fw-bold">Rejected</span>';
        }
    }

    // Save Assignment
    function saveOTAssignment(e) {
        e.preventDefault();
        const emp = document.getElementById('asgnEmpSelect').value;
        const dept = document.getElementById('asgnDept').value;
        const hours = document.getElementById('asgnHours').value;
        const otId = 'OT-2026-' + Math.floor(100 + Math.random() * 900);

        const tableBody = document.querySelector('#otQueueTable tbody');
        if (tableBody) {
            const rowCount = tableBody.rows.length + 1;
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${rowCount}</td>
                <td>22 Sep 2026</td>
                <td>
                    <div class="fw-bold text-dark">${emp}</div>
                    <div class="text-muted small">Company Assigned</div>
                </td>
                <td>${dept || 'Engineering'}</td>
                <td><span class="badge bg-primary-subtle text-primary fw-bold"><i class="bi bi-building me-1"></i> Company Assigned</span></td>
                <td>
                    <div class="fw-bold text-dark">6:00 PM – 9:00 PM</div>
                    <span class="badge bg-light text-dark border">${hours}</span>
                </td>
                <td>
                    <div class="fw-bold text-dark">Production Support</div>
                    <div class="text-muted small">Assigned by Manager</div>
                </td>
                <td><span class="badge bg-success-subtle text-success">Standard 1.5x</span></td>
                <td><span class="ot-badge assigned"><i class="bi bi-person-check-fill"></i> Assigned</span></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openReviewOTModal('${otId}', '${emp}', '${dept}', '22 Sep 2026', '6:00 PM - 9:00 PM', '${hours}', 'Production Support', 'Company Assigned', this)"><i class="bi bi-shield-check"></i> Review & Approve</button>
                        <button class="btn btn-sm btn-outline-danger" title="Reject Request" onclick="rejectOTDirect(this)"><i class="bi bi-x-lg"></i></button>
                    </div>
                </td>
            `;
            tableBody.insertBefore(newRow, tableBody.firstChild);
        }

        const modal = bootstrap.Modal.getInstance(document.getElementById('assignOTModal'));
        modal.hide();
        alert(`Company OT Assignment (${otId}) created for ${emp}!\nStatus: Assigned and notification sent to employee.`);
    }

    // Save Request
    function saveOTRequest(e) {
        e.preventDefault();
        const emp = document.getElementById('reqEmpSelect').value;
        const hours = document.getElementById('reqHours').value;
        const otId = 'OT-2026-' + Math.floor(100 + Math.random() * 900);

        const tableBody = document.querySelector('#otQueueTable tbody');
        if (tableBody) {
            const rowCount = tableBody.rows.length + 1;
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${rowCount}</td>
                <td>22 Sep 2026</td>
                <td>
                    <div class="fw-bold text-dark">${emp}</div>
                    <div class="text-muted small">Employee Requested</div>
                </td>
                <td>Engineering</td>
                <td><span class="badge bg-info-subtle text-info fw-bold"><i class="bi bi-person me-1"></i> Employee Request</span></td>
                <td>
                    <div class="fw-bold text-dark">6:30 PM – 8:30 PM</div>
                    <span class="badge bg-light text-dark border">${hours}</span>
                </td>
                <td>
                    <div class="fw-bold text-dark">Task Deadline</div>
                    <div class="text-muted small">Self Request</div>
                </td>
                <td><span class="badge bg-success-subtle text-success">Standard 1.5x</span></td>
                <td><span class="ot-badge pending"><i class="bi bi-clock"></i> Pending Approval</span></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-success fw-bold text-nowrap d-inline-flex align-items-center gap-1" onclick="openReviewOTModal('${otId}', '${emp}', 'Engineering', '22 Sep 2026', '6:30 PM - 8:30 PM', '${hours}', 'Task Deadline', 'Employee Request', this)"><i class="bi bi-shield-check"></i> Review & Approve</button>
                        <button class="btn btn-sm btn-outline-danger" title="Reject Request" onclick="rejectOTDirect(this)"><i class="bi bi-x-lg"></i></button>
                    </div>
                </td>
            `;
            tableBody.insertBefore(newRow, tableBody.firstChild);
        }

        const modal = bootstrap.Modal.getInstance(document.getElementById('requestOTModal'));
        modal.hide();
        alert(`OT Request (${otId}) submitted successfully!\nStatus: Pending Manager Approval.`);
    }

    // Comprehensive Filters for ALL 5 Tabs
    function filterQueueTable() {
        const dept = (document.getElementById('queueDeptFilter') ? document.getElementById('queueDeptFilter').value : '').toLowerCase();
        const emp = (document.getElementById('queueEmpFilter') ? document.getElementById('queueEmpFilter').value : '').toLowerCase();
        const search = (document.getElementById('searchQueue') ? document.getElementById('searchQueue').value : '').toLowerCase();

        const rows = document.querySelectorAll('#otQueueTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesDept = !dept || text.includes(dept);
            const matchesEmp = !emp || text.includes(emp);
            const matchesSearch = !search || text.includes(search);
            row.style.display = (matchesDept && matchesEmp && matchesSearch) ? '' : 'none';
        });
    }

    function filterHistoryTable() {
        const search = (document.getElementById('histSearch') ? document.getElementById('histSearch').value : '').toLowerCase();
        const dept = (document.getElementById('histDept') ? document.getElementById('histDept').value : '').toLowerCase();
        const emp = (document.getElementById('histEmp') ? document.getElementById('histEmp').value : '').toLowerCase();
        const status = (document.getElementById('histStatus') ? document.getElementById('histStatus').value : '').toLowerCase();

        const rows = document.querySelectorAll('#otHistoryTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesSearch = !search || text.includes(search);
            const matchesDept = !dept || text.includes(dept);
            const matchesEmp = !emp || text.includes(emp);
            const matchesStatus = !status || text.includes(status);
            row.style.display = (matchesSearch && matchesDept && matchesEmp && matchesStatus) ? '' : 'none';
        });
    }

    function filterValidationTable() {
        const dept = (document.getElementById('valDeptFilter') ? document.getElementById('valDeptFilter').value : '').toLowerCase();
        const emp = (document.getElementById('valEmpFilter') ? document.getElementById('valEmpFilter').value : '').toLowerCase();
        const search = (document.getElementById('valSearchInput') ? document.getElementById('valSearchInput').value : '').toLowerCase();

        const rows = document.querySelectorAll('#otValidationTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesDept = !dept || text.includes(dept);
            const matchesEmp = !emp || text.includes(emp);
            const matchesSearch = !search || text.includes(search);
            row.style.display = (matchesDept && matchesEmp && matchesSearch) ? '' : 'none';
        });
    }

    function filterPayrollTable() {
        const dept = (document.getElementById('payDeptFilter') ? document.getElementById('payDeptFilter').value : '').toLowerCase();
        const emp = (document.getElementById('payEmpFilter') ? document.getElementById('payEmpFilter').value : '').toLowerCase();
        const search = (document.getElementById('payrollSearchInput') ? document.getElementById('payrollSearchInput').value : '').toLowerCase();

        const rows = document.querySelectorAll('#otPayrollTable tbody tr');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesDept = !dept || text.includes(dept);
            const matchesEmp = !emp || text.includes(emp);
            const matchesSearch = !search || text.includes(search);
            row.style.display = (matchesDept && matchesEmp && matchesSearch) ? '' : 'none';
        });
    }

    function filterReportsTable() {
        const dept = (document.getElementById('rptDeptFilter') ? document.getElementById('rptDeptFilter').value : '').toLowerCase();
        const emp = (document.getElementById('rptEmpFilter') ? document.getElementById('rptEmpFilter').value : '').toLowerCase();
        const search = (document.getElementById('deptReportSearchInput') ? document.getElementById('deptReportSearchInput').value : '').toLowerCase();

        const deptRows = document.querySelectorAll('#otDepartmentReportTable tbody tr');
        deptRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesDept = !dept || text.includes(dept);
            const matchesSearch = !search || text.includes(search);
            row.style.display = (matchesDept && matchesSearch) ? '' : 'none';
        });

        const empRows = document.querySelectorAll('#otEmployeeSalaryReportTable tbody tr');
        empRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const matchesDept = !dept || text.includes(dept);
            const matchesEmp = !emp || text.includes(emp);
            const matchesSearch = !search || text.includes(search);
            row.style.display = (matchesDept && matchesEmp && matchesSearch) ? '' : 'none';
        });
    }

    function exportHistoryCSV() {
        let csv = "Date,Employee Name,Department,OT Time,OT Hours,Rate Multiplier,Total OT Pay (INR),Status\n";
        csv += "19 Sep 2026,Rajesh Kumar,Engineering,6:00 PM - 9:00 PM,3.0,1.5x,450,Approved\n";
        csv += "18 Sep 2026,Priya Sharma,HR & Admin,6:00 PM - 8:00 PM,2.0,1.5x,300,Approved\n";
        csv += "17 Sep 2026,Suresh Raina,Operations,5:30 PM - 9:30 PM,4.0,1.5x,720,Approved\n";
        csv += "15 Sep 2026,Anish Verma,Sales & Marketing,7:00 PM - 9:00 PM,2.0,1.5x,0,Rejected\n";

        const blob = new Blob([csv], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.setAttribute('href', url);
        a.setAttribute('download', 'Overtime_History_Report.csv');
        a.click();
    }

    function refreshQueue() {
        alert("Refreshed OT Queue live updates!");
    }
