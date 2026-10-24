<?php include 'header.php'; ?>

 

<style>
    /* Modern Executive KPI & Score Chips */
    .dept-kpi-card {
        padding: 18px;
        border: 1px solid var(--border-soft, #e2e8f0);
        border-radius: 14px;
        background: var(--white, #ffffff);
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        transition: transform .2s ease;
    }
    .dept-kpi-card:hover { transform: translateY(-2px); }
    
    .dept-kpi-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .score-chip {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12.5px;
        font-weight: 700;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: all 0.2s ease;
    }
    .score-chip-high { background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%); color: #047857; border: 1px solid #a7f3d0; }
    .score-chip-good { background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%); color: #15803d; border: 1px solid #bbf7d0; }
    .score-chip-active { background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%); color: #0284c7; border: 1px solid #bae6fd; }
    .score-chip-warning { background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); color: #b45309; border: 1px solid #fde68a; }

    .status-capsule {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 600;
        white-space: nowrap;
    }
    .status-capsule-completed { background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; }

    /* Toast Notification */
    .rpt-toast {
        position: fixed;
        bottom: 24px;
        right: 24px;
        background: #0f172a;
        color: #fff;
        padding: 12px 20px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        z-index: 999999;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13.5px;
        font-weight: 500;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        pointer-events: none;
    }
    .rpt-toast.show { opacity: 1; transform: translateY(0); pointer-events: auto; }
</style>

<!-- Top Title & Navigation Bar -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <a href="performance-reports.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3 me-1">
                <i class="bi bi-arrow-left me-1"></i> Back to Reports
            </a>
            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fs-6 fw-bold" id="deptTitleBadge">
                <i class="bi bi-building me-1"></i> Engineering Department
            </span>
        </div>
        <h1 class="font-display fw-bold mb-0" style="font-size:1.6rem;" id="deptHeaderTitle">Department Performance & Employee Breakdown</h1>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <button class="btn btn-outline-danger" type="button" onclick="exportDeptReport('PDF')">
            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export Dept PDF
        </button>
        <button class="btn btn-success" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);" type="button" onclick="exportDeptReport('Excel')">
            <i class="bi bi-file-earmark-excel-fill me-1"></i> Export Dept Excel
        </button>
    </div>
</div>

<!-- 1. Top KPI Summary Cards for Department -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-md-3">
        <div class="dept-kpi-card d-flex align-items-center gap-3">
            <div class="dept-kpi-icon" style="background:#e0f2fe;color:#0284c7;"><i class="bi bi-people-fill"></i></div>
            <div>
                <div class="text-muted fw-bold" style="font-size:12px;">Total Headcount</div>
                <div class="fs-4 fw-bold text-dark" id="deptKpiCount">120</div>
                <div class="text-muted" style="font-size:11px;">Active Employees</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="dept-kpi-card d-flex align-items-center gap-3">
            <div class="dept-kpi-icon" style="background:#dcfce7;color:#15803d;"><i class="bi bi-star-fill text-warning"></i></div>
            <div>
                <div class="text-muted fw-bold" style="font-size:12px;">Avg Department Score</div>
                <div class="fs-4 fw-bold text-dark" id="deptKpiAvg">4.3 <span style="font-size:12px;" class="text-muted">/ 5.0</span></div>
                <div class="text-success fw-bold" style="font-size:11px;"><i class="bi bi-award me-1"></i>High Performance</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="dept-kpi-card d-flex align-items-center gap-3">
            <div class="dept-kpi-icon" style="background:#f3e8ff;color:#7e22ce;"><i class="bi bi-trophy-fill"></i></div>
            <div>
                <div class="text-muted fw-bold" style="font-size:12px;">Avg KPI Achievement</div>
                <div class="fs-4 fw-bold text-purple" style="color:#7e22ce;" id="deptKpiGoals">88%</div>
                <div class="text-muted" style="font-size:11px;">Targets Completed</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="dept-kpi-card d-flex align-items-center gap-3">
            <div class="dept-kpi-icon" style="background:#ecfdf5;color:#047857;"><i class="bi bi-person-badge-fill"></i></div>
            <div>
                <div class="text-muted fw-bold" style="font-size:12px;">Top Performer</div>
                <div class="fs-6 fw-bold text-dark text-truncate" style="max-width:140px;" id="deptKpiTopEmp">Vikram Sethi</div>
                <div class="text-success fw-bold" style="font-size:11px;" id="deptKpiTopScore">4.8 / 5.0 Rating</div>
            </div>
        </div>
    </div>
</div>

<!-- 2. Section Grid: Department Bell Curve Rating Distribution -->
<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
        <div>
            <h5 class="fw-bold text-dark mb-0 font-display"><i class="bi bi-pie-chart-fill text-success me-2"></i>Department Rating Distribution</h5>
            <div class="text-muted small" style="font-size:12px;">Score spread across all department team members</div>
        </div>
        <span class="badge bg-light text-dark border px-3 py-1" id="deptReviewBadge"><i class="bi bi-shield-check text-success me-1"></i>100% HR Approved</span>
    </div>

    <!-- Rating Distribution Progress Bar -->
    <div class="progress rounded-pill overflow-hidden mb-1" style="height: 18px; box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);" id="deptDistBar">
        <div class="progress-bar bg-success" style="width: 40%;" title="Rating 5: 40%">Rating 5★ (40%)</div>
        <div class="progress-bar bg-info" style="width: 40%;" title="Rating 4: 40%">Rating 4★ (40%)</div>
        <div class="progress-bar bg-primary" style="width: 20%;" title="Rating 3: 20%">Rating 3★ (20%)</div>
    </div>
</div>

<!-- 3. Executive Performance Breakdown Table Card (Matching Screenshot Design) -->
<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <!-- Top toolbar controls bar matching screenshot -->
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
        <!-- Left side: Department Select, Columns Button, Export Dropdown -->
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <select class="form-select form-select-sm border-0 fw-semibold shadow-sm rounded-3 px-3 py-2 text-dark" id="deptSelect" style="width: auto; min-width: 170px; background-color: #f1f5f9; font-size: 13.5px;" onchange="onDepartmentChange(this.value)">
                <option value="All Departments">All Departments</option>
                <option value="Engineering" selected>Engineering</option>
                <option value="UI/UX Design">UI/UX Design</option>
                <option value="Infrastructure">Infrastructure</option>
                <option value="Quality Assurance">Quality Assurance</option>
                <option value="Human Resources">Human Resources</option>
            </select>

            <button class="btn btn-sm px-3 py-2 rounded-3 fw-bold d-inline-flex align-items-center gap-1 border-0" style="background:#fef3c7; color:#b45309; font-size:13px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#columnToggleOffcanvas">
                <i class="bi bi-columns-gap text-warning"></i> Columns
            </button>

            <div class="dropdown d-inline-block">
                <button class="btn btn-sm px-3 py-2 rounded-3 fw-bold d-inline-flex align-items-center gap-1 text-success border-0 dropdown-toggle" style="background:#dcfce7; color:#15803d; font-size:13px;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-download"></i> Export
                </button>
                <ul class="dropdown-menu shadow border-0 rounded-3 mt-1">
                    <li><a class="dropdown-item py-2 fw-semibold" href="javascript:void(0)" onclick="exportDeptReport('Excel')"><i class="bi bi-file-earmark-excel-fill text-success me-2"></i>Export to Excel (CSV)</a></li>
                    <li><a class="dropdown-item py-2 fw-semibold" href="javascript:void(0)" onclick="exportDeptReport('PDF')"><i class="bi bi-file-earmark-pdf-fill text-danger me-2"></i>Export to PDF Layout</a></li>
                </ul>
            </div>
        </div>

        <!-- Right side: Search Box -->
        <div class="position-relative" style="width: 250px;">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted" style="font-size:14px;"></i>
            <input type="text" class="form-control form-control-sm rounded-pill ps-5 pe-3 py-2 border-secondary-subtle" id="deptSearchInput" placeholder="Search employee..." onkeyup="filterDeptTable()" style="font-size:13px; background:#f8fafc;">
        </div>
    </div>

    <!-- Table Responsive Wrap -->
    <div class="table-responsive rounded-3 border">
        <table class="table table-hover align-middle mb-0" id="perfBreakdownTable" style="font-size:13px;">
            <thead style="background:#e2e8f0; color:#334155;">
                <tr class="text-uppercase" style="font-size:11.5px; letter-spacing:0.04em;">
                    <th class="py-3 px-3 col-sno" style="width: 60px;">S.NO</th>
                    <th class="py-3 px-3 col-employee">EMPLOYEE</th>
                    <th class="py-3 px-3 col-dept">DEPARTMENT / ROLE</th>
                    <th class="py-3 px-3 col-cycle">FEEDBACK CYCLE</th>
                    <th class="py-3 px-3 text-success col-mgr">MGR SCORE</th>
                    <th class="py-3 px-3 text-success col-tl">TL SCORE</th>
                    <th class="py-3 px-3 text-success col-hr">HR SCORE</th>
                    <th class="py-3 px-3 col-overall">OVERALL 360°</th>
                    <th class="py-3 px-3 col-status">WORKFLOW STATUS</th>
                </tr>
            </thead>
            <tbody id="deptEmpTableBody">
                <!-- Dynamically Rendered -->
            </tbody>
        </table>
    </div>
</div>

<!-- Offcanvas: Toggle Columns -->
<div class="offcanvas offcanvas-end rounded-start-4 border-0 shadow" tabindex="-1" id="columnToggleOffcanvas" aria-labelledby="columnToggleOffcanvasLabel">
    <div class="offcanvas-header bg-light">
        <h5 class="offcanvas-title fw-bold font-display" id="columnToggleOffcanvasLabel"><i class="bi bi-sliders text-success me-2"></i>Toggle Table Columns</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <p class="text-muted small mb-3">Select columns to display in the performance breakdown table:</p>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_dept" checked onchange="toggleColumn('col-dept', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_dept">Department / Role</label>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_cycle" checked onchange="toggleColumn('col-cycle', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_cycle">Feedback Cycle</label>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_mgr" checked onchange="toggleColumn('col-mgr', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_mgr">Manager Score</label>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_tl" checked onchange="toggleColumn('col-tl', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_tl">TL Score</label>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_hr" checked onchange="toggleColumn('col-hr', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_hr">HR Score</label>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_overall" checked onchange="toggleColumn('col-overall', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_overall">Overall 360°</label>
        </div>
        <div class="form-check form-switch mb-3">
            <input class="form-check-input" type="checkbox" id="chk_col_status" checked onchange="toggleColumn('col-status', this.checked)">
            <label class="form-check-label fw-semibold" for="chk_col_status">Workflow Status</label>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="rptToast" class="rpt-toast">
    <i class="bi bi-info-circle-fill text-success fs-5"></i>
    <span id="rptToastMsg">Action completed successfully!</span>
</div>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/tabel.js"></script>

<script>
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
</script>

<?php include 'footer.php'; ?>

