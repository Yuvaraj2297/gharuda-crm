/**
 * Gharuda CRM - Performance Department Report Page Script
 * File: assets/js/pages/performance-department-report.js
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
            setTimeout(() => { toast.classList.remove('show'); }, 3500);
        }
    }

    function toggleColumn(colClass, isVisible) {
        const elements = document.querySelectorAll('.' + colClass);
        elements.forEach(el => {
            if (isVisible) {
                el.style.display = '';
            } else {
                el.style.display = 'none';
            }
        });
    }

    // Complete Performance Database matching user screenshot & department structure
    const allEmployeesList = [
        {
            sno: 1,
            id: 'EMP-101',
            name: 'Arun Kumar',
            role: 'Senior Software Engineer',
            dept: 'Engineering',
            cycle: 'FY25-26 Annual 360° Review',
            mgrScore: '4.5',
            tlScore: '4.2',
            hrScore: '4.0',
            overall: '4.1',
            status: 'Completed',
            statusClass: 'completed',
            avatarType: 'img',
            avatarVal: './assets/img/profile-1.jpg'
        },
        {
            sno: 2,
            id: 'EMP-201',
            name: 'Amelia Curr',
            role: 'Design Lead',
            dept: 'UI/UX Design',
            cycle: 'Q1 Leadership Check-in',
            mgrScore: '4.9',
            tlScore: '4.8',
            hrScore: '4.7',
            overall: '4.8',
            status: 'Completed',
            statusClass: 'completed',
            avatarType: 'initials',
            avatarVal: 'AC',
            bgColor: '#f3e8ff',
            textColor: '#7e22ce'
        },
        {
            sno: 3,
            id: 'EMP-103',
            name: 'Sanjay V',
            role: 'Associate Software Engineer',
            dept: 'Engineering',
            cycle: 'Probation 360 Review',
            mgrScore: '4.6',
            tlScore: '4.4',
            hrScore: '4.5',
            overall: '4.5',
            status: 'Completed',
            statusClass: 'completed',
            avatarType: 'initials',
            avatarVal: 'SV',
            bgColor: '#e2e8f0',
            textColor: '#475569'
        },
        {
            sno: 4,
            id: 'EMP-301',
            name: 'Daniel Martinez',
            role: 'DevOps & Cloud Lead',
            dept: 'Infrastructure',
            cycle: 'Leadership Check-in',
            mgrScore: '4.8',
            tlScore: '4.7',
            hrScore: '4.5',
            overall: '4.65',
            status: 'Stage 3: HR Review',
            statusClass: 'stage3',
            avatarType: 'img',
            avatarVal: './assets/img/profile-2.jpg'
        },
        {
            sno: 5,
            id: 'EMP-203',
            name: 'Priya Sharma',
            role: 'Frontend Developer',
            dept: 'UI/UX Design',
            cycle: 'FY25-26 Annual Review',
            mgrScore: '4.2',
            tlScore: '4.0',
            hrScore: '-',
            overall: '4.1',
            status: 'Stage 2: TL Review',
            statusClass: 'stage2',
            avatarType: 'img',
            avatarVal: './assets/img/profile-3.jpg'
        },
        {
            sno: 6,
            id: 'EMP-105',
            name: 'Manoj Kumar',
            role: 'Junior Software Engineer',
            dept: 'Engineering',
            cycle: 'FY25-26 Annual Review',
            mgrScore: '-',
            tlScore: '-',
            hrScore: '-',
            overall: 'Pending',
            status: 'Stage 1: Pending (Manager)',
            statusClass: 'stage1',
            avatarType: 'initials',
            avatarVal: 'MK',
            bgColor: '#f1f5f9',
            textColor: '#334155'
        },
        {
            sno: 7,
            id: 'EMP-102',
            name: 'Vikram Sethi',
            role: 'Lead Architect',
            dept: 'Engineering',
            cycle: 'FY25-26 Annual 360° Review',
            mgrScore: '4.8',
            tlScore: '4.8',
            hrScore: '4.8',
            overall: '4.8',
            status: 'Completed',
            statusClass: 'completed',
            avatarType: 'img',
            avatarVal: './assets/img/profile-2.jpg'
        },
        {
            sno: 8,
            id: 'EMP-401',
            name: 'Swati P',
            role: 'QA Lead',
            dept: 'Quality Assurance',
            cycle: 'FY25-26 Annual Review',
            mgrScore: '3.9',
            tlScore: '3.9',
            hrScore: '3.9',
            overall: '3.9',
            status: 'Completed',
            statusClass: 'completed',
            avatarType: 'img',
            avatarVal: './assets/img/profile-3.jpg'
        },
        {
            sno: 9,
            id: 'EMP-501',
            name: 'Divya Ramesh',
            role: 'HR Admin',
            dept: 'Human Resources',
            cycle: 'FY25-26 Annual 360° Review',
            mgrScore: '4.9',
            tlScore: '4.9',
            hrScore: '4.9',
            overall: '4.9',
            status: 'Completed',
            statusClass: 'completed',
            avatarType: 'img',
            avatarVal: './assets/img/profile-1.jpg'
        }
    ];

    const departmentDatabase = {
        'All Departments': { headcount: 220, avgRating: '4.4', kpiAvg: '89%', topEmp: 'Amelia Curr', topScore: '4.8 / 5.0 Rating' },
        'Engineering': { headcount: 120, avgRating: '4.3', kpiAvg: '88%', topEmp: 'Vikram Sethi', topScore: '4.8 / 5.0 Rating' },
        'UI/UX Design': { headcount: 35, avgRating: '4.4', kpiAvg: '90%', topEmp: 'Amelia Curr', topScore: '4.8 / 5.0 Rating' },
        'Infrastructure': { headcount: 28, avgRating: '4.5', kpiAvg: '91%', topEmp: 'Daniel Martinez', topScore: '4.65 / 5.0 Rating' },
        'Quality Assurance': { headcount: 22, avgRating: '3.8', kpiAvg: '80%', topEmp: 'Swati P', topScore: '3.9 / 5.0 Rating' },
        'Human Resources': { headcount: 15, avgRating: '4.7', kpiAvg: '93%', topEmp: 'Divya Ramesh', topScore: '4.9 / 5.0 Rating' }
    };

    function getUrlDept() {
        const params = new URLSearchParams(window.location.search);
        return params.get('dept') || 'Engineering';
    }

    let currentDept = 'Engineering';

    function renderDepartmentView(deptName) {
        currentDept = deptName;
        const data = departmentDatabase[deptName] || departmentDatabase['Engineering'];

        // Header & Title updates
        const titleBadge = document.getElementById('deptTitleBadge');
        const headerTitle = document.getElementById('deptHeaderTitle');
        const selectEl = document.getElementById('deptSelect');

        if (titleBadge) {
            titleBadge.innerHTML = deptName === 'All Departments' 
                ? `<i class="bi bi-globe me-1"></i> All Departments` 
                : `<i class="bi bi-building me-1"></i> ${deptName} Department`;
        }
        if (headerTitle) {
            headerTitle.innerText = deptName === 'All Departments'
                ? `All Departments - Performance & Employee Breakdown`
                : `${deptName} - Performance & Employee Breakdown`;
        }
        if (selectEl && selectEl.value !== deptName) selectEl.value = deptName;

        // KPI Summary Cards
        const countEl = document.getElementById('deptKpiCount');
        const avgEl = document.getElementById('deptKpiAvg');
        const goalsEl = document.getElementById('deptKpiGoals');
        const topEmpEl = document.getElementById('deptKpiTopEmp');
        const topScoreEl = document.getElementById('deptKpiTopScore');

        if (countEl) countEl.innerText = data.headcount;
        if (avgEl) avgEl.innerHTML = `${data.avgRating} <span style="font-size:12px;" class="text-muted">/ 5.0</span>`;
        if (goalsEl) goalsEl.innerText = data.kpiAvg;
        if (topEmpEl) topEmpEl.innerText = data.topEmp;
        if (topScoreEl) topScoreEl.innerText = data.topScore;

        filterDeptTable();
    }

    function onDepartmentChange(newDept) {
        const newUrl = window.location.pathname + '?dept=' + encodeURIComponent(newDept);
        window.history.pushState({ path: newUrl }, '', newUrl);
        renderDepartmentView(newDept);
        showRptToast(`🏢 Filtered by ${newDept}`);
    }

    function renderWorkflowStatus(emp) {
        if (emp.statusClass === 'completed') {
            return `<span class="badge rounded-pill px-3 py-2 text-white fw-semibold" style="background:#059669; font-size:12px;"><i class="bi bi-check-circle-fill me-1"></i> Completed</span>`;
        } else if (emp.statusClass === 'stage3') {
            return `<span class="badge rounded-pill px-3 py-2 text-white fw-semibold" style="background:#0284c7; font-size:12px;"><i class="bi bi-lightbulb-fill me-1"></i> Stage 3: HR Review</span>`;
        } else if (emp.statusClass === 'stage2') {
            return `<span class="badge rounded-pill px-3 py-2 text-white fw-semibold" style="background:#d97706; font-size:12px;"><i class="bi bi-bullseye me-1"></i> Stage 2: TL Review</span>`;
        } else if (emp.statusClass === 'stage1') {
            return `<span class="badge rounded-pill px-3 py-2 text-white fw-semibold" style="background:#475569; font-size:12px;"><i class="bi bi-clock me-1"></i> Stage 1: Pending (Manager)</span>`;
        }
        return `<span class="badge rounded-pill px-3 py-2 bg-secondary text-white fw-semibold" style="font-size:12px;">${emp.status}</span>`;
    }

    function renderOverallScore(overall) {
        if (overall === 'Pending') {
            return `<span class="badge rounded-pill border px-3 py-2 fw-medium text-secondary" style="background:#f8fafc; border-color:#e2e8f0!important; font-size:12px;"><i class="bi bi-hourglass-split me-1"></i> Pending</span>`;
        } else {
            const num = parseFloat(overall);
            let bgStyle = 'background:#fef9c3; color:#854d0e; border-color:#fde047!important;';
            if (num >= 4.7) {
                bgStyle = 'background:#dcfce7; color:#15803d; border-color:#bbf7d0!important;';
            } else if (num >= 4.5) {
                bgStyle = 'background:#fef9c3; color:#854d0e; border-color:#fde047!important;';
            }
            return `<span class="badge rounded-pill border px-3 py-2 fw-bold" style="${bgStyle} font-size:12.5px;"><i class="bi bi-star-fill text-warning me-1"></i>${overall} <span class="fw-normal text-muted" style="font-size:11px;">/ 5.0</span></span>`;
        }
    }

    function renderAvatar(emp) {
        if (emp.avatarType === 'img') {
            return `<img src="${emp.avatarVal}" class="rounded-circle border flex-shrink-0" style="width:38px; height:38px; object-fit:cover;" alt="${emp.name}">`;
        } else {
            return `<div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 fw-bold border" style="width:38px; height:38px; background:${emp.bgColor}; color:${emp.textColor}; font-size:13px;">${emp.avatarVal}</div>`;
        }
    }

    function filterDeptTable() {
        const searchInput = document.getElementById('deptSearchInput') ? document.getElementById('deptSearchInput').value.toLowerCase().trim() : '';
        const tbody = document.getElementById('deptEmpTableBody');

        let filtered = allEmployeesList.filter(emp => {
            if (currentDept !== 'All Departments' && emp.dept !== currentDept) {
                return false;
            }

            if (searchInput !== '') {
                const matchName = emp.name.toLowerCase().includes(searchInput);
                const matchRole = emp.role.toLowerCase().includes(searchInput);
                const matchDept = emp.dept.toLowerCase().includes(searchInput);
                const matchCycle = emp.cycle.toLowerCase().includes(searchInput);
                if (!matchName && !matchRole && !matchDept && !matchCycle) return false;
            }

            return true;
        });

        if (tbody) {
            if (filtered.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9" class="text-center py-5 text-muted"><i class="bi bi-inbox fs-2 d-block mb-2"></i>No employee performance records found.</td></tr>`;
            } else {
                tbody.innerHTML = filtered.map((emp, idx) => `
                    <tr>
                        <td class="px-3 py-3 text-muted fw-bold col-sno">${idx + 1}</td>
                        <td class="px-3 py-3 col-employee">
                            <div class="d-flex align-items-center gap-2">
                                ${renderAvatar(emp)}
                                <div>
                                    <div class="fw-bold text-dark" style="font-size:13.5px;">${emp.name}</div>
                                    <div class="text-muted" style="font-size:11.5px;">${emp.role}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-3 col-dept">
                            <span class="badge rounded-pill bg-light text-dark border px-3 py-1-5 fw-semibold" style="font-size:11.5px;">${emp.dept}</span>
                        </td>
                        <td class="px-3 py-3 text-secondary fw-medium col-cycle" style="font-size:12.5px;">
                            ${emp.cycle}
                        </td>
                        <td class="px-3 py-3 fw-bold text-success col-mgr" style="font-size:13.5px;">
                            ${emp.mgrScore !== '-' ? emp.mgrScore : '<span class="text-muted fw-normal">-</span>'}
                        </td>
                        <td class="px-3 py-3 fw-bold text-success col-tl" style="font-size:13.5px;">
                            ${emp.tlScore !== '-' ? emp.tlScore : '<span class="text-muted fw-normal">-</span>'}
                        </td>
                        <td class="px-3 py-3 fw-bold text-success col-hr" style="font-size:13.5px;">
                            ${emp.hrScore !== '-' ? emp.hrScore : '<span class="text-muted fw-normal">-</span>'}
                        </td>
                        <td class="px-3 py-3 col-overall">
                            ${renderOverallScore(emp.overall)}
                        </td>
                        <td class="px-3 py-3 col-status">
                            ${renderWorkflowStatus(emp)}
                        </td>
                    </tr>
                `).join('');
            }
        }
    }

    function exportDeptReport(format) {
        let list = allEmployeesList;
        if (currentDept !== 'All Departments') {
            list = allEmployeesList.filter(e => e.dept === currentDept);
        }

        if (format === 'Excel') {
            const headers = ['S.NO', 'Employee Name', 'Role', 'Department', 'Feedback Cycle', 'MGR Score', 'TL Score', 'HR Score', 'Overall 360', 'Workflow Status'];
            const rows = list.map((e, idx) => [
                idx + 1,
                `"${e.name}"`,
                `"${e.role}"`,
                `"${e.dept}"`,
                `"${e.cycle}"`,
                e.mgrScore,
                e.tlScore,
                e.hrScore,
                e.overall,
                `"${e.status}"`
            ]);

            const csvContent = 'data:text/csv;charset=utf-8,' + [headers.join(','), ...rows.map(r => r.join(','))].join('\n');
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement('a');
            link.setAttribute('href', encodedUri);
            link.setAttribute('download', `${currentDept.replace(/[^a-zA-Z0-9]/g, '_')}_Performance_Report_${new Date().toISOString().slice(0, 10)}.csv`);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

            showRptToast(`📥 ${currentDept} Excel Performance Report downloaded!`);
        } else if (format === 'PDF') {
            showRptToast(`📄 Preparing ${currentDept} PDF Report print layout...`);
            setTimeout(() => { window.print(); }, 500);
        }
    }

    $(document).ready(function() {
        const deptFromUrl = getUrlDept();
        renderDepartmentView(deptFromUrl);
    });
