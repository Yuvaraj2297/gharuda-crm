/**
 * Gharuda CRM - Performance Reports Page Script
 * File: assets/js/pages/performance-reports.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
function showRptToast(msg) {
        const toast = document.getElementById('rptToast');
        const msgEl = document.getElementById('rptToastMsg');
        if (toast && msgEl) {
            msgEl.innerText = msg;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3500);
        }
    }

    // Master HR Approved Evaluation Dataset
    const masterEvaluations = [
        { year: '2026', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Arun Kumar', kpi: 92, self: 4.2, mgrRating: 4.5, final: 4.5, status: 'Approved' },
        { year: '2026', cycle: 'probation', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Karthik Raja', emp: 'Sanjay V', kpi: 88, self: 4.6, mgrRating: 4.4, final: 4.5, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Manoj Kumar', kpi: 75, self: 3.5, mgrRating: 3.8, final: 3.8, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Vikram Sethi', kpi: 95, self: 4.8, mgrRating: 4.8, final: 4.8, status: 'Approved' },
        { year: '2026', cycle: 'q1', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Deepa N', kpi: 84, self: 4.0, mgrRating: 4.1, final: 4.1, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Rajesh Sharma', emp: 'Amelia Curr', kpi: 96, self: 4.9, mgrRating: 4.8, final: 4.8, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Amelia Curr', emp: 'Priya Sharma', kpi: 85, self: 4.2, mgrRating: 4.0, final: 4.1, status: 'Approved' },
        { year: '2026', cycle: 'q1', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Amelia Curr', emp: 'Rohan Mehra', kpi: 90, self: 4.2, mgrRating: 4.3, final: 4.3, status: 'Approved' },
        { year: '2026', cycle: 'q1', dept: 'Infrastructure', desig: 'DevOps Lead', mgr: 'Rajesh Sharma', emp: 'Daniel Martinez', kpi: 94, self: 4.8, mgrRating: 4.7, final: 4.65, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Infrastructure', desig: 'DevOps Lead', mgr: 'Daniel Martinez', emp: 'Karthik Raja', kpi: 89, self: 4.2, mgrRating: 4.4, final: 4.4, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Quality Assurance', desig: 'QA Engineer', mgr: 'Karthik Raja', emp: 'Swati P', kpi: 82, self: 3.8, mgrRating: 3.9, final: 3.9, status: 'Approved' },
        { year: '2026', cycle: 'probation', dept: 'Quality Assurance', desig: 'QA Engineer', mgr: 'Karthik Raja', emp: 'Anand K', kpi: 78, self: 3.5, mgrRating: 3.6, final: 3.6, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Human Resources', desig: 'Design Lead', mgr: 'Divya Ramesh', emp: 'Divya Ramesh', kpi: 95, self: 4.9, mgrRating: 4.9, final: 4.9, status: 'Approved' },
        { year: '2026', cycle: 'annual', dept: 'Human Resources', desig: 'Design Lead', mgr: 'Divya Ramesh', emp: 'Kavitha M', kpi: 90, self: 4.4, mgrRating: 4.5, final: 4.5, status: 'Approved' },
        
        // 2025 evaluations
        { year: '2025', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Arun Kumar', kpi: 86, self: 4.0, mgrRating: 4.0, final: 4.0, status: 'Approved' },
        { year: '2025', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Rajesh Sharma', emp: 'Amelia Curr', kpi: 90, self: 4.5, mgrRating: 4.5, final: 4.5, status: 'Approved' },
        { year: '2025', cycle: 'annual', dept: 'Infrastructure', desig: 'DevOps Lead', mgr: 'Rajesh Sharma', emp: 'Daniel Martinez', kpi: 88, self: 4.4, mgrRating: 4.3, final: 4.3, status: 'Approved' },
        
        // 2024 evaluations
        { year: '2024', cycle: 'annual', dept: 'Engineering', desig: 'Software Engineer', mgr: 'Rajesh Sharma', emp: 'Arun Kumar', kpi: 78, self: 3.5, mgrRating: 3.5, final: 3.5, status: 'Approved' },
        { year: '2024', cycle: 'annual', dept: 'UI/UX Design', desig: 'Design Lead', mgr: 'Rajesh Sharma', emp: 'Amelia Curr', kpi: 84, self: 4.2, mgrRating: 4.2, final: 4.2, status: 'Approved' }
    ];

    const empHistoryData = {
        'Arun Kumar': {
            role: 'Senior Software Engineer',
            dept: 'Engineering',
            avatar: './assets/img/profile-1.jpg',
            badgeText: '<strong>Top Performer Trajectory:</strong> Consistent year-on-year rating improvement of <strong>+1.0</strong> over 3 cycles.',
            rows: [
                { cycle: 'FY25-26 Annual 360° Review (2026)', kpi: '92%', kpiBadge: '+6%', self: '4.2', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '86%', kpiBadge: '+8%', self: '4.0', mgr: '4.0', final: '4.0 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Annual Review (2024)', kpi: '78%', kpiBadge: '', self: '3.5', mgr: '3.5', final: '3.5 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Amelia Curr': {
            role: 'Design Lead',
            dept: 'UI/UX Design',
            avatar: './assets/img/profile-1.jpg',
            badgeText: '<strong>Outstanding Design Leadership:</strong> Achieved 96% KPI completion rate & 4.8 final HR approved rating.',
            rows: [
                { cycle: 'FY25-26 Annual 360° Review (2026)', kpi: '96%', kpiBadge: '+6%', self: '4.9', mgr: '4.8', final: '4.8 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '90%', kpiBadge: '+6%', self: '4.5', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY23-24 Annual Review (2024)', kpi: '84%', kpiBadge: '', self: '4.2', mgr: '4.2', final: '4.2 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Sanjay V': {
            role: 'Associate Software Engineer',
            dept: 'Engineering',
            avatar: './assets/img/profile-1.jpg',
            badgeText: '<strong>Rapid Career Progression:</strong> Promoted from Associate to Software Engineer in 2 years with 4.5 rating.',
            rows: [
                { cycle: 'FY25-26 Probation Review (2026)', kpi: '88%', kpiBadge: '+8%', self: '4.6', mgr: '4.4', final: '4.5 / 5.0', chip: 'score-chip-high' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '80%', kpiBadge: '+5%', self: '4.0', mgr: '4.0', final: '4.0 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Intern Review (2024)', kpi: '75%', kpiBadge: '', self: '3.8', mgr: '3.8', final: '3.8 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Daniel Martinez': {
            role: 'DevOps & Cloud Lead',
            dept: 'Infrastructure',
            avatar: './assets/img/profile-2.jpg',
            badgeText: '<strong>High Infrastructure Reliability:</strong> 99.99% uptime achieved across multi-cloud infrastructure.',
            rows: [
                { cycle: 'FY25-26 Leadership Check-in (2026)', kpi: '94%', kpiBadge: '+6%', self: '4.8', mgr: '4.7', final: '4.65 / 5.0', chip: 'score-chip-active' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '88%', kpiBadge: '+6%', self: '4.4', mgr: '4.3', final: '4.3 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Annual Review (2024)', kpi: '82%', kpiBadge: '', self: '4.0', mgr: '4.0', final: '4.0 / 5.0', chip: 'score-chip-good' }
            ]
        },
        'Priya Sharma': {
            role: 'Frontend Developer',
            dept: 'UI/UX Design',
            avatar: './assets/img/profile-3.jpg',
            badgeText: '<strong>Consistent Skill Expansion:</strong> Mastered React.js & automated Cypress end-to-end testing.',
            rows: [
                { cycle: 'FY25-26 Annual Review (2026)', kpi: '85%', kpiBadge: '+7%', self: '4.2', mgr: '4.0', final: '4.1 / 5.0', chip: 'score-chip-warning' },
                { cycle: 'FY24-25 Annual Review (2025)', kpi: '78%', kpiBadge: '+6%', self: '3.8', mgr: '3.8', final: '3.8 / 5.0', chip: 'score-chip-good' },
                { cycle: 'FY23-24 Probation Review (2024)', kpi: '72%', kpiBadge: '', self: '3.6', mgr: '3.6', final: '3.6 / 5.0', chip: 'score-chip-good' }
            ]
        }
    };

    function renderEmployeeHistoryProfile(empName) {
        const data = empHistoryData[empName] || empHistoryData['Arun Kumar'];
        const nameEl = document.getElementById('histEmpName');
        const roleEl = document.getElementById('histEmpRole');
        const deptEl = document.getElementById('histEmpDept');
        const avatarEl = document.getElementById('histEmpAvatar');
        const ratingEl = document.getElementById('histLatestRating');
        const kpiEl = document.getElementById('histLatestKpi');
        const badgeTextEl = document.getElementById('histEmpBadgeText');
        const tbody = document.getElementById('histTableBody');
        const selectEl = document.getElementById('rptHistoryEmpSelect');

        if (selectEl && selectEl.value !== empName) {
            selectEl.value = empName;
        }

        if (nameEl) nameEl.innerText = empName;
        if (roleEl) roleEl.innerText = data.role;
        if (deptEl) deptEl.innerText = data.dept;
        if (avatarEl && data.avatar) avatarEl.src = data.avatar;
        if (ratingEl) ratingEl.innerText = data.rows[0].final;
        if (kpiEl) kpiEl.innerText = data.rows[0].kpi;
        if (badgeTextEl && data.badgeText) badgeTextEl.innerHTML = data.badgeText;

        if (tbody) {
            tbody.innerHTML = data.rows.map(r => `
                <tr>
                    <td class="fw-bold text-dark">
                        <i class="bi bi-calendar-check text-success me-1"></i> ${r.cycle}
                    </td>
                    <td class="text-center fw-bold text-success">
                        ${r.kpi} ${r.kpiBadge ? `<span class="badge bg-success-subtle text-success ms-1">${r.kpiBadge}</span>` : ''}
                    </td>
                    <td class="text-center fw-semibold text-secondary">${r.self}</td>
                    <td class="text-center fw-semibold text-primary">${r.mgr}</td>
                    <td class="text-center">
                        <span class="score-chip ${r.chip}"><i class="bi bi-star-fill text-warning me-1"></i>${r.final}</span>
                    </td>
                    <td class="text-end">
                        <span class="status-capsule status-capsule-completed"><i class="bi bi-check-circle-fill me-1"></i> Approved</span>
                    </td>
                </tr>
            `).join('');
        }
    }

    const deptEmployeesData = {
        'Engineering': [
            { name: 'Arun Kumar', role: 'Senior Software Engineer', kpi: '92%', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' },
            { name: 'Sanjay V', role: 'Associate Software Engineer', kpi: '88%', mgr: '4.4', final: '4.5 / 5.0', chip: 'score-chip-high' },
            { name: 'Manoj Kumar', role: 'Junior Software Engineer', kpi: '75%', mgr: '3.8', final: '3.8 / 5.0', chip: 'score-chip-good' },
            { name: 'Vikram Sethi', role: 'Lead Architect', kpi: '95%', mgr: '4.8', final: '4.8 / 5.0', chip: 'score-chip-high' },
            { name: 'Deepa N', role: 'Backend Engineer', kpi: '84%', mgr: '4.1', final: '4.1 / 5.0', chip: 'score-chip-good' }
        ],
        'UI/UX Design': [
            { name: 'Amelia Curr', role: 'Design Lead', kpi: '96%', mgr: '4.8', final: '4.8 / 5.0', chip: 'score-chip-high' },
            { name: 'Priya Sharma', role: 'Frontend Developer', kpi: '85%', mgr: '4.0', final: '4.1 / 5.0', chip: 'score-chip-warning' },
            { name: 'Rohan Mehra', role: 'UI Specialist', kpi: '90%', mgr: '4.3', final: '4.3 / 5.0', chip: 'score-chip-good' }
        ],
        'Infrastructure': [
            { name: 'Daniel Martinez', role: 'DevOps & Cloud Lead', kpi: '94%', mgr: '4.7', final: '4.65 / 5.0', chip: 'score-chip-active' },
            { name: 'Karthik Raja', role: 'Systems Admin', kpi: '89%', mgr: '4.4', final: '4.4 / 5.0', chip: 'score-chip-good' }
        ],
        'Quality Assurance': [
            { name: 'Swati P', role: 'QA Lead', kpi: '82%', mgr: '3.9', final: '3.9 / 5.0', chip: 'score-chip-good' },
            { name: 'Anand K', role: 'Automation Engineer', kpi: '78%', mgr: '3.6', final: '3.6 / 5.0', chip: 'score-chip-good' }
        ],
        'Human Resources': [
            { name: 'Divya Ramesh', role: 'HR Admin', kpi: '95%', mgr: '4.9', final: '4.9 / 5.0', chip: 'score-chip-high' },
            { name: 'Kavitha M', role: 'Talent Specialist', kpi: '90%', mgr: '4.5', final: '4.5 / 5.0', chip: 'score-chip-high' }
        ]
    };

    function openDeptDrillDownModal(deptName) {
        const titleEl = document.getElementById('deptDrillModalTitle');
        const nameEl = document.getElementById('deptModalName');
        const countEl = document.getElementById('deptModalCount');
        const avgEl = document.getElementById('deptModalAvg');
        const bodyEl = document.getElementById('deptDrillBody');

        const list = deptEmployeesData[deptName] || deptEmployeesData['Engineering'];

        if (titleEl) titleEl.innerHTML = `<i class="bi bi-building text-success me-2"></i> ${deptName} - Employee Ratings Breakdown`;
        if (nameEl) nameEl.innerText = deptName;
        if (countEl) countEl.innerText = list.length + ' Employees Listed';

        let total = 0;
        list.forEach(e => total += parseFloat(e.final));
        const avg = (total / list.length).toFixed(1);
        if (avgEl) avgEl.innerText = avg + ' / 5.0';

        if (bodyEl) {
            bodyEl.innerHTML = list.map((emp, idx) => `
                <tr>
                    <td>${idx + 1}</td>
                    <td class="fw-bold text-dark">${emp.name}</td>
                    <td><span class="badge bg-light text-dark border">${emp.role}</span></td>
                    <td class="text-center fw-bold text-success">${emp.kpi}</td>
                    <td class="text-center fw-bold text-primary">${emp.mgr}</td>
                    <td class="text-center">
                        <span class="score-chip ${emp.chip}"><i class="bi bi-star-fill text-warning me-1"></i>${emp.final}</span>
                    </td>
                </tr>
            `).join('');
        }

        $('#deptDrillDownModal').modal('show');
    }

    // Dynamic Real-time Calculation Engine
    function applyAnalyticsFilters() {
        const year = document.getElementById('rptFilterYear') ? document.getElementById('rptFilterYear').value : 'all';
        const cycle = document.getElementById('rptFilterCycle') ? document.getElementById('rptFilterCycle').value : 'all';
        const dept = document.getElementById('rptFilterDept') ? document.getElementById('rptFilterDept').value : 'all';
        const desig = document.getElementById('rptFilterDesig') ? document.getElementById('rptFilterDesig').value : 'all';
        const mgr = document.getElementById('rptFilterMgr') ? document.getElementById('rptFilterMgr').value : 'all';
        const emp = document.getElementById('rptFilterEmp') ? document.getElementById('rptFilterEmp').value : 'all';

        // Filter evaluations dataset
        let filtered = masterEvaluations.filter(item => {
            if (year !== 'all' && item.year !== year) return false;
            if (cycle !== 'all' && item.cycle !== cycle) return false;
            if (dept !== 'all' && item.dept !== dept) return false;
            if (desig !== 'all' && item.desig !== desig) return false;
            if (mgr !== 'all' && item.mgr !== mgr) return false;
            if (emp !== 'all' && item.emp !== emp) return false;
            return true;
        });

        // Fallback to full master if overly strict filter yields empty
        if (filtered.length === 0) {
            filtered = masterEvaluations;
        }

        // Re-calculate KPI Metrics
        const totalEmp = filtered.length * 9; // Scaling factor to mimic company wide numbers
        const completed = Math.round(totalEmp * 0.90);
        const pending = totalEmp - completed;
        
        let sumRating = 0;
        let sumKpi = 0;
        filtered.forEach(item => {
            sumRating += item.final;
            sumKpi += item.kpi;
        });

        const avgRating = (sumRating / filtered.length).toFixed(1);
        const avgKpi = Math.round(sumKpi / filtered.length);

        // Update KPI Card UI
        const kpiEmpEl = document.getElementById('rptKpiTotalEmp');
        const kpiCompEl = document.getElementById('rptKpiCompleted');
        const kpiPendEl = document.getElementById('rptKpiPending');
        const kpiRatingEl = document.getElementById('rptKpiAvgRating');
        const kpiGoalEl = document.getElementById('rptKpiAvgGoal');

        if (kpiEmpEl) kpiEmpEl.innerText = totalEmp;
        if (kpiCompEl) kpiCompEl.innerHTML = `${completed} <span style="font-size:12px; font-weight:600; color:#15803d;">(90%)</span>`;
        if (kpiPendEl) kpiPendEl.innerHTML = `${pending} <span style="font-size:12px; font-weight:600; color:#b56b00;">(10%)</span>`;
        if (kpiRatingEl) kpiRatingEl.innerHTML = `${avgRating} <span style="font-size:12px; font-weight:600; color:#64748b;">/ 5.0</span>`;
        if (kpiGoalEl) kpiGoalEl.innerText = avgKpi + '%';

        // Recalculate Rating Bell Curve Distribution
        let r5 = 0, r4 = 0, r3 = 0, r2 = 0, r1 = 0;
        filtered.forEach(item => {
            if (item.final >= 4.5) r5++;
            else if (item.final >= 4.0) r4++;
            else if (item.final >= 3.5) r3++;
            else if (item.final >= 3.0) r2++;
            else r1++;
        });

        const totalFiltered = filtered.length;
        const p5 = Math.round((r5 / totalFiltered) * 100);
        const p4 = Math.round((r4 / totalFiltered) * 100);
        const p3 = Math.round((r3 / totalFiltered) * 100);
        const p2 = Math.round((r2 / totalFiltered) * 100);
        const p1 = Math.max(0, 100 - (p5 + p4 + p3 + p2));

        const distCountEl = document.getElementById('rptRatingDistCount');
        if (distCountEl) distCountEl.innerText = `${completed} Approved Reviews`;

        const distBarEl = document.getElementById('rptRatingDistBar');
        if (distBarEl) {
            distBarEl.innerHTML = `
                <div class="progress-bar bg-success" style="width: ${p5}%;" title="Rating 5: ${p5}%">5★ (${p5}%)</div>
                <div class="progress-bar bg-info" style="width: ${p4}%;" title="Rating 4: ${p4}%">4★ (${p4}%)</div>
                <div class="progress-bar bg-primary" style="width: ${p3}%;" title="Rating 3: ${p3}%">3★ (${p3}%)</div>
                <div class="progress-bar bg-warning" style="width: ${p2}%;" title="Rating 2: ${p2}%">2★ (${p2}%)</div>
                <div class="progress-bar bg-danger" style="width: ${p1}%;" title="Rating 1: ${p1}%">1★</div>
            `;
        }

        const distBodyEl = document.getElementById('rptRatingDistBody');
        if (distBodyEl) {
            distBodyEl.innerHTML = `
                <tr>
                    <td><span class="badge bg-success-subtle text-success border border-success-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 5 (Outstanding)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p5/100))}</td>
                    <td class="text-center fw-bold text-success">${p5}%</td>
                    <td class="text-end" style="width: 110px;"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-success" style="width: ${p5}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-info-subtle text-info border border-info-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 4 (Exceeds)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p4/100))}</td>
                    <td class="text-center fw-bold text-info">${p4}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-info" style="width: ${p4}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-primary-subtle text-primary border border-primary-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 3 (Meets Expectations)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p3/100))}</td>
                    <td class="text-center fw-bold text-primary">${p3}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-primary" style="width: ${p3}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-warning-subtle text-dark border border-warning fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 2 (Needs Improvement)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p2/100))}</td>
                    <td class="text-center fw-bold text-warning">${p2}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-warning" style="width: ${p2}%;"></div></div></td>
                </tr>
                <tr>
                    <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-bold"><i class="bi bi-star-fill text-warning me-1"></i> Rating 1 (Unsatisfactory)</span></td>
                    <td class="text-center fw-bold">${Math.round(completed * (p1/100))}</td>
                    <td class="text-center fw-bold text-danger">${p1}%</td>
                    <td class="text-end"><div class="progress rounded-pill" style="height: 8px;"><div class="progress-bar bg-danger" style="width: ${p1}%;"></div></div></td>
                </tr>
            `;
        }

        // Sync employee history profile view
        if (emp !== 'all') {
            renderEmployeeHistoryProfile(emp);
        }

        showRptToast(`📊 Performance Analytics synchronized! Filters active: Dept [${dept.toUpperCase()}] • Cycle [${cycle.toUpperCase()}] • Employee [${emp}]`);
    }

    // Export Handler (Excel CSV Download Blob & PDF Print View)
    function exportAnalyticsReport(format) {
        if (format === 'Excel') {
            const headers = ['Year', 'Cycle', 'Department', 'Designation', 'Manager', 'Employee', 'KPI Achievement (%)', 'Self Rating', 'Manager Rating', 'HR Approved Final Rating', 'Status'];
            const rows = masterEvaluations.map(e => [
                e.year,
                e.cycle.toUpperCase(),
                `"${e.dept}"`,
                `"${e.desig}"`,
                `"${e.mgr}"`,
                `"${e.emp}"`,
                `${e.kpi}%`,
                e.self,
                e.mgrRating,
                e.final,
                e.status
            ]);

            const csvContent = 'data:text/csv;charset=utf-8,' + [headers.join(','), ...rows.map(r => r.join(','))].join('\n');
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', `Gharuda_HRMS_Performance_Analytics_Report_${new Date().toISOString().slice(0, 10)}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            showRptToast('📥 Excel Analytics dataset generated & downloaded successfully!');
        } else if (format === 'PDF') {
            showRptToast('📄 Preparing PDF Analytics print layout...');
            setTimeout(() => {
                window.print();
            }, 500);
        }
    }

    // Initial render on page load
    $(document).ready(function() {
        renderEmployeeHistoryProfile('Arun Kumar');
    });
