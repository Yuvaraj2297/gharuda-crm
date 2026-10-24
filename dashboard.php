<?php include 'header.php'; ?>


 

<!-- Greeting -->
<div class="d-flex flex-wrap justify-content-between align-items-start mb-4 gap-3">
  <div>
    <h1 class="font-display fw-800 mb-1 page-title">Good Morning, Admin <span>👋</span></h1>
    <div style="color:var(--ink-500);font-size:13.5px;">Here's what's happening with your organization today.</div>
  </div>
  <div class="d-flex gap-2">
    <button class="btn btn-light border d-flex align-items-center gap-2" style="border-radius:10px;font-weight:600;font-size:13px;color:var(--ink-700);">
      <i class="bi bi-calendar3"></i> Aug 19, 2026
    </button>
    <button class="btn d-flex align-items-center gap-2" style="background:var(--primary);color:#fff;border-radius:10px;font-weight:700;font-size:13px;">
      <i class="bi bi-person-plus-fill"></i> Add Employee
    </button>
  </div>
</div>

<!-- Stat strip -->
<div class="row row-cols-2 row-cols-md-3 row-cols-xl-6 g-3 mb-4">
  <div class="col">
    <div class="stat-card stat-theme-blue">
      <div class="label">Total Employees <span class="stat-icon"><i class="bi bi-people-fill"></i></span></div>
      <div class="value">1,247</div>
      <div class="delta text-up"><i class="bi bi-arrow-up-short"></i>+12 this month</div>
    </div>
  </div>
  <div class="col">
    <div class="stat-card stat-theme-primary">
      <div class="label">Active Today <span class="stat-icon"><i class="bi bi-check-circle-fill"></i></span></div>
      <div class="value">1,089</div>
      <div class="delta text-up">87% attendance rate</div>
    </div>
  </div>
  <div class="col">
    <div class="stat-card stat-theme-amber">
      <div class="label">On Leave <span class="stat-icon"><i class="bi bi-calendar-x-fill"></i></span></div>
      <div class="value">43</div>
      <div class="delta text-neutral">18 pending approvals</div>
    </div>
  </div>
  <div class="col">
    <div class="stat-card stat-theme-violet">
      <div class="label">Open Positions <span class="stat-icon"><i class="bi bi-briefcase-fill"></i></span></div>
      <div class="value">28</div>
      <div class="delta text-up">6 interviews today</div>
    </div>
  </div>
  <div class="col">
    <div class="stat-card stat-theme-primary">
      <div class="label">New Hires <span class="stat-icon"><i class="bi bi-person-plus-fill"></i></span></div>
      <div class="value">15</div>
      <div class="delta text-up">+25% vs last month</div>
    </div>
  </div>
  <div class="col">
    <div class="stat-card stat-theme-red">
      <div class="label">Late Count <span class="stat-icon"><i class="bi bi-graph-down-arrow"></i></span></div>
      <div class="value">12</div>
      <div class="delta text-down">+3 vs yesterday</div>
    </div>
  </div>
</div>

<!-- Check-in + Pending leave -->
<div class="row g-4 mb-1">
  <div class="col-lg-5">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Employee Check-in / Check-out</h3>
          <div class="card-sub">Today's attendance tracking</div>
        </div>
        <div class="icon-chip icon-chip-blue"><i class="bi bi-clock-fill"></i></div>
      </div>
      <div class="row g-3 mb-3">
        <div class="col-6">
          <div style="background:var(--primary-soft);border-radius:12px;padding:14px;">
            <div style="font-family:'Sora';font-weight:800;font-size:1.6rem;color:var(--primary-dark);">1,089</div>
            <div style="font-size:12px;color:var(--primary-dark);font-weight:600;">Checked In</div>
          </div>
        </div>
        <div class="col-6">
          <div style="background:var(--accent-red-soft);border-radius:12px;padding:14px;">
            <div style="font-family:'Sora';font-weight:800;font-size:1.6rem;color:#c0362c;">158</div>
            <div style="font-size:12px;color:#c0362c;font-weight:600;">Yet to Check In</div>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-between" style="font-size:12.5px;font-weight:600;color:var(--ink-700);">
        <span>Check-in Rate</span><span>87.3%</span>
      </div>
      <div class="thin-progress my-2">
        <div style="width:87.3%;background:var(--primary);"></div>
      </div>
      <div class="row g-3 mt-2">
        <div class="col-6">
          <div style="font-size:12px;color:var(--ink-500);">Avg Check-in</div>
          <div style="font-weight:700;">09:12 AM</div>
        </div>
        <div class="col-6">
          <div style="font-size:12px;color:var(--ink-500);">Avg Check-out</div>
          <div style="font-weight:700;">06:18 PM</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Pending Leave Requests <span class="badge rounded-pill" style="background:var(--accent-red-soft);color:var(--accent-red);font-size:11px;">3 New</span></h3>
        </div>
        <a href="#" class="section-link">Review All Requests</a>
      </div>

      <div class="person-row">
        <img class="avatar-sm" src="./assets/img/profile-2.jpg">
        <div class="flex-grow-1">
          <div class="person-name">Emily Johnson</div>
          <div class="person-meta">Annual Vacation Leave &nbsp;•&nbsp; <a href="#">Aug 24 - Aug 28 (5 Days)</a></div>
        </div>
        <button class="btn-reject me-2">Reject</button>
        <button class="btn-approve">Approve</button>
      </div>
      <div class="person-row">
        <img class="avatar-sm" src="./assets/img/profile-3.jpg">
        <div class="flex-grow-1">
          <div class="person-name">Marcus Brody</div>
          <div class="person-meta">Medical Leave (Surgical) &nbsp;•&nbsp; <a href="#">Aug 20 - Aug 21 (2 Days)</a></div>
        </div>
        <button class="btn-reject me-2">Reject</button>
        <button class="btn-approve">Approve</button>
      </div>
      <div class="person-row">
        <img class="avatar-sm" src="./assets/img/profile-4.jpg">
        <div class="flex-grow-1">
          <div class="person-name">Sarah Connor</div>
          <div class="person-meta">Maternity Leave &nbsp;•&nbsp; <a href="#">Sep 01 - Nov 30 (90 Days)</a></div>
        </div>
        <button class="btn-reject me-2">Reject</button>
        <button class="btn-approve">Approve</button>
      </div>
    </div>
  </div>
</div>

<!-- Pending approvals + Performance -->
<div class="row g-4 mt-1">
  <div class="col-lg-6">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Pending Approvals</h3>
          <div class="card-sub">Items requiring your review</div>
        </div>
        <div class="icon-chip icon-chip-amber"><i class="bi bi-clipboard-check-fill"></i></div>
      </div>
      <div style="font-family:'Sora';font-weight:800;font-size:1.8rem;">18 <span style="font-family:'Manrope';font-weight:600;font-size:13px;color:var(--ink-500);">pending approvals</span></div>
      <div class="mt-3">
        <div class="approval-row" style="background:var(--accent-amber-soft);color:#8a5a08;">
          <span><span class="dot" style="background:var(--accent-amber);"></span>Leave requests</span><span>12</span>
        </div>
        <div class="approval-row" style="background:var(--accent-amber-soft);color:#8a5a08;opacity:.85;">
          <span><span class="dot" style="background:var(--accent-amber);"></span>Shift changes</span><span>3</span>
        </div>
        <div class="approval-row" style="background:#fbe3d4;color:#9a4a1a;">
          <span><span class="dot" style="background:#e8823a;"></span>Offboarding</span><span>3</span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Employee Performance &amp; Goals</h3>
          <div class="card-sub">Progress toward quarterly objectives</div>
        </div>
        <div class="icon-chip icon-chip-violet"><i class="bi bi-gift-fill"></i></div>
      </div>
      <div style="font-family:'Sora';font-weight:800;font-size:1.8rem;">74% <span style="font-family:'Manrope';font-weight:600;font-size:13px;color:var(--ink-500);">avg goal completion</span></div>
      <div class="mt-3">
        <div class="legend-row"><span><span class="dot dot-primary"></span>On track</span><span>62%</span></div>
        <div class="legend-row"><span><span class="dot dot-amber"></span>Needs attention</span><span>21%</span></div>
        <div class="legend-row"><span><span class="dot dot-danger"></span>At risk</span><span>17%</span></div>
      </div>
    </div>
  </div>
</div>

<!-- Attendance chart + Today's schedule -->
<div class="row g-4 mt-1">
  <div class="col-lg-7">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Attendance Overview</h3>
          <div class="card-sub">Weekly reporting trend for present, late, and absent records</div>
        </div>
        <div class="d-flex gap-3" style="font-size:11.5px;font-weight:600;color:var(--ink-500);">
          <span><span class="dot d-inline-block" style="width:8px;height:8px;border-radius:50%;background:var(--primary);"></span> Present</span>
          <span><span class="dot d-inline-block" style="width:8px;height:8px;border-radius:50%;background:#0d7a3d;"></span> Late</span>
          <span><span class="dot d-inline-block" style="width:8px;height:8px;border-radius:50%;background:var(--accent-amber);"></span> Absent</span>
        </div>
      </div>
      <canvas id="attendanceChart" height="150"></canvas>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card-custom">
      <div class="card-head">
        <h3 class="card-title">Today's Schedule</h3>
        <a href="#" class="section-link">View Calendar</a>
      </div>
      <div class="schedule-row">
        <div class="time-chip">09:30 AM</div>
        <div>
          <div class="person-name">New Hire Onboarding</div>
          <div class="person-meta">Cohort 4</div>
        </div>
      </div>
      <div class="schedule-row">
        <div class="time-chip icon-chip-blue">11:00 AM</div>
        <div>
          <div class="person-name">Tech Team Mid-Year Review</div>
          <div class="person-meta">Performance</div>
        </div>
      </div>
      <div class="schedule-row">
        <div class="time-chip icon-chip-red">02:00 PM</div>
        <div>
          <div class="person-name">Exit Interview - David K.</div>
          <div class="person-meta">Offboarding</div>
        </div>
      </div>
      <div class="schedule-row">
        <div class="time-chip icon-chip-amber">04:30 PM</div>
        <div>
          <div class="person-name">Shift Scheduler Refinement</div>
          <div class="person-meta">Operations</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Recent activity + Department distribution -->
<div class="row g-4 mt-1">
  <div class="col-lg-7">
    <div class="card-custom">
      <div class="card-head">
        <h3 class="card-title">Recent Activity &amp; Status</h3>
        <a href="#" class="section-link">See All Activity</a>
      </div>
      <div class="table-responsive">
        <table class="table-clean">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Department</th>
              <th>Action Event</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold">John Doe</td>
              <td>Engineering</td>
              <td>Requested A...</td>
              <td>Aug 19, 2026</td>
              <td><span class="status-pill status-pending">Pending</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Jane Smith</td>
              <td>HR &amp; Talent</td>
              <td>Signed Empl...</td>
              <td>Aug 18, 2026</td>
              <td><span class="status-pill status-completed">Completed</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Robert Johnson</td>
              <td>Finance</td>
              <td>Loan Disbur...</td>
              <td>Aug 18, 2026</td>
              <td><span class="status-pill status-completed">Completed</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Emily Davis</td>
              <td>Product Design</td>
              <td>Submitted P...</td>
              <td>Aug 17, 2026</td>
              <td><span class="status-pill status-completed">Completed</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Michael Chang</td>
              <td>Engineering</td>
              <td>Shift Chang...</td>
              <td>Aug 16, 2026</td>
              <td><span class="status-pill status-rejected">Rejected</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card-custom">
      <h3 class="card-title mb-3">Department Distribution</h3>
      <div class="donut-wrap mb-3">
        <canvas id="deptDonut" class="w-100 h-100"></canvas>
        <div class="donut-center">
          <div class="num">1,247</div>
          <div class="lbl">TOTAL</div>
        </div>
      </div>
      <div class="legend-row"><span><span class="dot" style="background:var(--primary);"></span>Engineering</span><span>520</span></div>
      <div class="legend-row"><span><span class="dot" style="background:#0d7a3d;"></span>Sales &amp; Marketing</span><span>310</span></div>
      <div class="legend-row"><span><span class="dot" style="background:var(--accent-amber);"></span>HR &amp; Finance</span><span>210</span></div>
      <div class="legend-row"><span><span class="dot" style="background:#cfe8d8;"></span>Operations &amp; Support</span><span>207</span></div>
    </div>
  </div>
</div>

<!-- Quick shortcuts + Leave approval -->
<div class="row g-4 mt-1">
  <div class="col-lg-5">
    <div class="card-custom">
      <h3 class="card-title mb-2">Quick Shortcuts</h3>
      <div class="shortcut-row">
        <div class="shortcut-icon"><i class="bi bi-file-earmark-bar-graph-fill"></i></div>
        <div class="flex-grow-1">
          <div class="person-name">Generate Report</div>
          <div class="person-meta">Generate custom HR, financial, or shift reports</div>
        </div>
        <i class="bi bi-chevron-right text-muted"></i>
      </div>
      <div class="shortcut-row">
        <div class="shortcut-icon shortcut-icon-blue"><i class="bi bi-cloud-arrow-up-fill"></i></div>
        <div class="flex-grow-1">
          <div class="person-name">Bulk Import</div>
          <div class="person-meta">Upload and parse employee list CSV records</div>
        </div>
        <i class="bi bi-chevron-right text-muted"></i>
      </div>
      <div class="shortcut-row">
        <div class="shortcut-icon shortcut-icon-amber"><i class="bi bi-megaphone-fill"></i></div>
        <div class="flex-grow-1">
          <div class="person-name">Send Announcement</div>
          <div class="person-meta">Broadcast messages to active workspace devices</div>
        </div>
        <i class="bi bi-chevron-right text-muted"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Leave Approval</h3>
          <div class="card-sub">Recent leave requests status</div>
        </div>
        <div class="icon-chip"><i class="bi bi-clipboard2-check-fill"></i></div>
      </div>
      <div class="table-responsive">
        <table class="table-clean">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Leave Type</th>
              <th>Days</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fw-bold">Alex Turner</td>
              <td>Sick Leave</td>
              <td>2 Days</td>
              <td><span class="status-pill status-pending">Pending</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Maria Garcia</td>
              <td>Vacation</td>
              <td>5 Days</td>
              <td><span class="status-pill status-approved">Approved</span></td>
            </tr>
            <tr>
              <td class="fw-bold">James Lee</td>
              <td>Personal</td>
              <td>1 Day</td>
              <td><span class="status-pill status-pending">Pending</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Holidays + Team productivity -->
<div class="row g-4 mt-1">
  <div class="col-lg-5">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Upcoming Holidays</h3>
          <div class="card-sub">Official company holidays</div>
        </div>
        <div class="icon-chip icon-chip-blue"><i class="bi bi-calendar-heart-fill"></i></div>
      </div>
      <div class="schedule-row">
        <div class="holiday-date">Sep 1</div>
        <div class="flex-grow-1">
          <div class="person-name">Labor Day</div>
          <div class="person-meta">Sep 1, 2026 • Monday</div>
        </div>
        <span class="holiday-soon">Soon</span>
      </div>
      <div class="schedule-row">
        <div class="holiday-date">Nov 26</div>
        <div class="flex-grow-1">
          <div class="person-name">Thanksgiving</div>
          <div class="person-meta">Nov 26, 2026 • Thursday</div>
        </div>
        <span class="holiday-later">3 mo</span>
      </div>
      <div class="schedule-row">
        <div class="holiday-date">Dec 25</div>
        <div class="flex-grow-1">
          <div class="person-name">Christmas Day</div>
          <div class="person-meta">Dec 25, 2026 • Friday</div>
        </div>
        <span class="holiday-later">4 mo</span>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Team Productivity</h3>
          <div class="card-sub">Core metrics across departments</div>
        </div>
        <div class="icon-chip"><i class="bi bi-graph-up-arrow"></i></div>
      </div>
      <div class="legend-row"><span>Avg meeting time / week</span><span>6.2h</span></div>
      <div class="legend-row"><span>Avg focus time / day</span><span>3.8h</span></div>
      <div class="legend-row"><span>Tickets resolved / day</span><span>128</span></div>
      <div class="legend-row"><span>Avg response time</span><span>12m</span></div>
      <div class="d-flex justify-content-between mt-2" style="font-size:12.5px;font-weight:600;color:var(--ink-700);">
        <span>Productivity trend</span><span class="text-up">+4%</span>
      </div>
      <div class="thin-progress mt-2">
        <div style="width:78%;background:var(--primary);"></div>
      </div>
    </div>
  </div>
</div>

<!-- Anniversary + Birthdays -->
<div class="row g-4 mt-1">
  <div class="col-lg-5">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Employee Anniversary</h3>
          <div class="card-sub">Upcoming work anniversaries</div>
        </div>
        <div class="icon-chip icon-chip-violet"><i class="bi bi-gift-fill"></i></div>
      </div>
      <div class="schedule-row">
        <div class="time-chip" style="background:var(--accent-violet-soft);color:var(--accent-violet);min-width:34px;">3</div>
        <div class="flex-grow-1">
          <div class="person-name">Sarah Mitchell</div>
          <div class="person-meta">3 Years • Aug 22</div>
        </div>
        <span class="link-strong">3 yrs</span>
      </div>
      <div class="schedule-row">
        <div class="time-chip" style="background:var(--accent-amber-soft);color:var(--accent-amber);min-width:34px;">5</div>
        <div class="flex-grow-1">
          <div class="person-name">David Chen</div>
          <div class="person-meta">5 Years • Aug 25</div>
        </div>
        <span class="link-strong">5 yrs</span>
      </div>
      <div class="schedule-row">
        <div class="time-chip" style="background:var(--primary-soft);color:var(--primary-dark);min-width:34px;">1</div>
        <div class="flex-grow-1">
          <div class="person-name">Emily Parker</div>
          <div class="person-meta">1 Year • Aug 28</div>
        </div>
        <span class="link-strong">1 yr</span>
      </div>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Today's Birthdays</h3>
          <div class="card-sub">Celebrating today</div>
        </div>
        <div class="icon-chip icon-chip-pink"><i class="bi bi-cake2-fill"></i></div>
      </div>
      <div class="birthday-banner">
        <div class="birthday-stack">
          <img src="https://i.pravatar.cc/80?img=45">
          <img src="https://i.pravatar.cc/80?img=15">
        </div>
        <div style="font-weight:700;color:var(--accent-pink);font-size:13px;">2 Birthdays Today 🎉</div>
      </div>
      <div class="person-row">
        <img class="avatar-sm" src="https://i.pravatar.cc/80?img=15">
        <div class="flex-grow-1">
          <div class="person-name">John Doe</div>
          <div class="person-meta">Marketing</div>
        </div>
        <span style="font-size:18px;">🎈</span>
      </div>
      <div class="person-row">
        <img class="avatar-sm" src="https://i.pravatar.cc/80?img=45">
        <div class="flex-grow-1">
          <div class="person-name">Lisa Wang</div>
          <div class="person-meta">Engineering</div>
        </div>
        <span style="font-size:18px;">🎈</span>
      </div>
    </div>
  </div>
</div>

<!-- Today's Timeline -->
<div class="row g-4 mt-1">
  <div class="col-12">
    <div class="card-custom">
      <div class="card-head">
        <div>
          <h3 class="card-title">Today's Timeline</h3>
          <div class="card-sub">Check-in, Break, Lunch &amp; Check-out overview</div>
        </div>
        <div class="icon-chip"><i class="bi bi-hourglass-split"></i></div>
      </div>

      <div class="day-timeline">
        <div class="tl-track">
          <div class="tl-fill" style="width:70%;"></div>
        </div>

        <div class="tl-points">
          <div class="tl-point done">
            <div class="tl-dot" style="background:var(--primary);"><i class="bi bi-box-arrow-in-right"></i></div>
            <div class="tl-label">Check-in</div>
            <div class="tl-time">09:12 AM</div>
          </div>

          <div class="tl-point done">
            <div class="tl-dot" style="background:var(--accent-amber);"><i class="bi bi-cup-hot-fill"></i></div>
            <div class="tl-label">Break</div>
            <div class="tl-time">11:00 - 11:15 AM</div>
          </div>

          <div class="tl-point active">
            <div class="tl-dot" style="background:var(--accent-blue);"><i class="bi bi-egg-fried"></i></div>
            <div class="tl-label">Lunch</div>
            <div class="tl-time">01:00 - 02:00 PM</div>
          </div>

          <div class="tl-point">
            <div class="tl-dot" style="background:var(--ink-300);"><i class="bi bi-box-arrow-right"></i></div>
            <div class="tl-label">Check-out</div>
            <div class="tl-time">--:-- PM</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
// Page-specific chart scripts (echoed inside footer.php's shared <script> block)
$pageScripts = <<<'JS'
    const rootStyles = getComputedStyle(document.documentElement);
    const green = rootStyles.getPropertyValue('--primary').trim();
    const amber = rootStyles.getPropertyValue('--accent-amber').trim();
    const lateGreen = '#0d7a3d';

    // Attendance bar chart
    new Chart(document.getElementById('attendanceChart'), {
      type: 'bar',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Present',
            data: [92, 88, 90, 96, 94, 60, 45],
            backgroundColor: green,
            borderRadius: 4,
            maxBarThickness: 16
          },
          {
            label: 'Late',
            data: [4, 5, 3, 2, 3, 15, 20],
            backgroundColor: lateGreen,
            borderRadius: 4,
            maxBarThickness: 16
          },
          {
            label: 'Absent',
            data: [4, 7, 7, 2, 3, 25, 35],
            backgroundColor: amber,
            borderRadius: 4,
            maxBarThickness: 16
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          x: {
            stacked: true,
            grid: {
              display: false
            }
          },
          y: {
            stacked: true,
            display: false
          }
        }
      }
    });

    // Department donut
    new Chart(document.getElementById('deptDonut'), {
      type: 'doughnut',
      data: {
        labels: ['Engineering', 'Sales & Marketing', 'HR & Finance', 'Operations & Support'],
        datasets: [{
          data: [520, 310, 210, 207],
          backgroundColor: [green, lateGreen, amber, '#cfe8d8'],
          borderWidth: 0
        }]
      },
      options: {
        cutout: '72%',
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
JS;

include 'footer.php'; ?>