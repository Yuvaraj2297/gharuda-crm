<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/organization-calendar.css">

<!-- ===== Page header ===== -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div class="w-100">
        <h1 class="font-display fw-bold mb-1 cal-main-title">Calendar</h1>
    </div>
</div>

<!-- ===== Calendar card ===== -->
<div class="cal-wrap" id="calWrap" data-view="absent-leave">
    <!-- Header -->
    <div class="cal-header">
        <div class="cal-nav">
            <button type="button" class="cal-nav-btn" id="calPrev" title="Previous month">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button type="button" class="cal-nav-btn today-btn" id="calToday">
                <i class="bi bi-calendar3"></i> Today
            </button>
            <button type="button" class="cal-nav-btn" id="calNext" title="Next month">
                <i class="bi bi-chevron-right"></i>
            </button>
            <span class="cal-month-label">January 2026</span>
            <span class="cal-month-label">February 2026</span>
            <span class="cal-month-label">March 2026</span>
            <span class="cal-month-label">April 2026</span>
            <span class="cal-month-label">May 2026</span>
            <span class="cal-month-label">June 2026</span>
            <span class="cal-month-label">July 2026</span>
            <span class="cal-month-label">August 2026</span>
            <span class="cal-month-label">September 2026</span>
            <span class="cal-month-label active">October 2026</span>
            <span class="cal-month-label">November 2026</span>
            <span class="cal-month-label">December 2026</span>
        </div>
        <button type="button" class="cal-filter-btn d-none" id="calFilterBtn" title="Toggle filters">
            <i class="bi bi-funnel"></i>
        </button>
    </div>

    <!-- View tabs -->
    <div class="cal-view-tabs" id="calViewTabs">
        <button type="button" class="cal-view-tab active" data-status="absent-leave"><span class="vt-dot vt-dot-purple"></span>Leave Status</button>
        <button type="button" class="cal-view-tab" data-status="shift"><span class="vt-dot vt-dot-blue"></span>Shift Status</button>
    </div>

    <!-- Filter panel -->
    <div class="cal-filter-panel" id="calFilterPanel">
        <div class="form-group">
            <label>Department</label>
            <select class="form-select select2 select-minw-160" id="calFilterDept">
                <option value="">All Departments</option>
                <option value="HR">HR</option>
                <option value="IT">IT</option>
                <option value="Management">Management</option>
                <option value="Marketing">Marketing</option>
            </select>
        </div>
        <div class="form-group">
            <label>Employee</label>
            <select class="form-select select2 select-minw-180" id="calFilterEmp">
                <option value="">All Employees</option>
                <option value="1">1 - 5056 - Vickey G</option>
                <option value="2">S2 - Lilly Williams</option>
                <option value="3">S3 - Clarkson Walter</option>
                <option value="4">S5 - Priya Sharma</option>
                <option value="5">S6 - Arjun Nair</option>
                <option value="6">S9 - Rahul Verma</option>
                <option value="7">S10 - Sneha Iyer</option>
                <option value="8">S14 - Emily Davis</option>
                <option value="9">S12 - Karthik Raja</option>
                <option value="10">S15 - James Wilson</option>
                <option value="11">S16 - Ethan Taylor</option>
                <option value="12">S17 - Grace Lee</option>
                <option value="13">S18 - Isabella Moore</option>
                <option value="14">S21 - Aiden Thomas</option>
                <option value="15">S22 - Mia Anderson</option>
                <option value="16">S23 - Lucas White</option>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-select select2 select-minw-160" id="calFilterStatus">
                <option value="">All Status</option>
                <option value="absent">Absent</option>
                <option value="leave">Leave</option>
                <option value="shift">Shift</option>
            </select>
        </div>
    </div>

    <!-- ===== Months (static, Jan - Dec 2026) ===== -->
    <div class="cal-month" data-month="2026-01">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2025-12-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2025-12-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2025-12-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2025-12-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-01-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-01-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-02">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day weekend" data-date="2026-02-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-02-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-02-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-03">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day weekend" data-date="2026-03-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-03-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-03-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-04">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-03-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-03-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-03-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-04-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-04-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-05-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-05-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-05">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-04-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-04-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-05-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-05-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-06">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-05-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-06-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-06-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-07">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-06-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-06-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-07-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-07-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-08-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-08">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-07-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-07-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-08-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-08-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-09">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-08-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-08-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-09-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-09-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-10-01"><div class="cal-day-num">1</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Priya Sharma" data-bs-toggle="modal" data-bs-target="#lr-2026-10-01-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Clarkson Walter, Arjun Nair, Rahul Verma, Sneha Iyer, Emily Davis, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas" data-bs-toggle="modal" data-bs-target="#sh-2026-10-01"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day other-month" data-date="2026-10-02"><div class="cal-day-num">2</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Clarkson Walter, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#lr-2026-10-02-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Arjun Nair, Rahul Verma, Emily Davis, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-02"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day other-month" data-date="2026-10-03"><div class="cal-day-num">3</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Clarkson Walter, Karthik Raja" data-bs-toggle="modal" data-bs-target="#lr-2026-10-03-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Arjun Nair, Rahul Verma, Sneha Iyer, Emily Davis, James Wilson" data-bs-toggle="modal" data-bs-target="#sh-2026-10-03"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">7</span></div></div></div>
        </div>
    </div>
    <div class="cal-month active" data-month="2026-10">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header today-dow"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-09-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-09-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-10-01"><div class="cal-day-num">1</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Priya Sharma" data-bs-toggle="modal" data-bs-target="#lr-2026-10-01-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Clarkson Walter, Arjun Nair, Rahul Verma, Sneha Iyer, Emily Davis, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas" data-bs-toggle="modal" data-bs-target="#sh-2026-10-01"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day" data-date="2026-10-02"><div class="cal-day-num">2</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Clarkson Walter, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#lr-2026-10-02-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Arjun Nair, Rahul Verma, Emily Davis, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-02"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-03"><div class="cal-day-num">3</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Clarkson Walter, Karthik Raja" data-bs-toggle="modal" data-bs-target="#lr-2026-10-03-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Arjun Nair, Rahul Verma, Sneha Iyer, Emily Davis, James Wilson" data-bs-toggle="modal" data-bs-target="#sh-2026-10-03"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">7</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-04"><div class="cal-day-num">4</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Clarkson Walter, Arjun Nair, James Wilson" data-bs-toggle="modal" data-bs-target="#lr-2026-10-04-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Priya Sharma, Rahul Verma, Sneha Iyer, Emily Davis, Karthik Raja, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson" data-bs-toggle="modal" data-bs-target="#sh-2026-10-04"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day" data-date="2026-10-05"><div class="cal-day-num">5</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Arjun Nair, Lilly Williams, Sneha Iyer, Ethan Taylor" data-bs-toggle="modal" data-bs-target="#lr-2026-10-05-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Priya Sharma, Rahul Verma, Emily Davis, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-05"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-06"><div class="cal-day-num">6</div><div class="cal-events"><div class="cal-event evt-red" data-emp-id="1" data-status="absent" title="1 - 5056 - Vickey G (Absent)" data-bs-toggle="modal" data-bs-target="#lr-2026-10-06-absent"><img src="./assets/img/profile-1.jpg" alt="Vickey G"><span class="evt-text">1 - 5056 - Vickey G</span></div><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Rahul Verma, Lilly Williams, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#lr-2026-10-06-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Clarkson Walter, Priya Sharma, Arjun Nair, Emily Davis, Karthik Raja, James Wilson" data-bs-toggle="modal" data-bs-target="#sh-2026-10-06"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-07"><div class="cal-day-num">7</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Sneha Iyer, Clarkson Walter, Rahul Verma" data-bs-toggle="modal" data-bs-target="#lr-2026-10-07-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Priya Sharma, Arjun Nair, Emily Davis, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson" data-bs-toggle="modal" data-bs-target="#sh-2026-10-07"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day" data-date="2026-10-08"><div class="cal-day-num">8</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Priya Sharma, Lilly Williams, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#lr-2026-10-08-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Arjun Nair, Rahul Verma, Emily Davis, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-08"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-09"><div class="cal-day-num">9</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Lilly Williams, Priya Sharma, Emily Davis" data-bs-toggle="modal" data-bs-target="#lr-2026-10-09-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Arjun Nair, Rahul Verma, Sneha Iyer, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-09"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-10"><div class="cal-day-num">10</div><div class="cal-events"><div class="cal-event evt-red" data-emp-id="8" data-status="absent" title="S14 - Emily Davis (Absent)" data-bs-toggle="modal" data-bs-target="#lr-2026-10-10-absent"><img src="./assets/img/profile-2.jpg" alt="Emily Davis"><span class="evt-text">S14 - Emily Davis</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Clarkson Walter, Priya Sharma, Arjun Nair, Rahul Verma, Sneha Iyer, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore" data-bs-toggle="modal" data-bs-target="#sh-2026-10-10"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-11"><div class="cal-day-num">11</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Arjun Nair, Rahul Verma" data-bs-toggle="modal" data-bs-target="#lr-2026-10-11-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Clarkson Walter, Vickey G, Emily Davis" data-bs-toggle="modal" data-bs-target="#lr-2026-10-11-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Sneha Iyer, Karthik Raja, James Wilson, Ethan Taylor" data-bs-toggle="modal" data-bs-target="#sh-2026-10-11"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-12"><div class="cal-day-num">12</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Lilly Williams, Emily Davis" data-bs-toggle="modal" data-bs-target="#lr-2026-10-12-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Clarkson Walter, Priya Sharma, Arjun Nair, Rahul Verma, Sneha Iyer, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-12"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-13"><div class="cal-day-num">13</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Clarkson Walter, Arjun Nair, Karthik Raja" data-bs-toggle="modal" data-bs-target="#lr-2026-10-13-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Rahul Verma, Sneha Iyer, Emily Davis, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson, Lucas White" data-bs-toggle="modal" data-bs-target="#sh-2026-10-13"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day" data-date="2026-10-14"><div class="cal-day-num">14</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Rahul Verma, Sneha Iyer, James Wilson" data-bs-toggle="modal" data-bs-target="#lr-2026-10-14-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Clarkson Walter, Priya Sharma, Arjun Nair, Emily Davis" data-bs-toggle="modal" data-bs-target="#sh-2026-10-14"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-15"><div class="cal-day-num">15</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Rahul Verma, Lilly Williams, Priya Sharma, Emily Davis" data-bs-toggle="modal" data-bs-target="#lr-2026-10-15-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Clarkson Walter, James Wilson" data-bs-toggle="modal" data-bs-target="#lr-2026-10-15-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Arjun Nair, Sneha Iyer, Karthik Raja, Ethan Taylor, Grace Lee" data-bs-toggle="modal" data-bs-target="#sh-2026-10-15"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day today" data-date="2026-10-16"><div class="cal-day-num">16</div><span class="cal-today-tag">Today</span><div class="cal-events"><div class="cal-event evt-red" data-emp-id="7" data-status="absent" title="S10 - Sneha Iyer (Absent)" data-bs-toggle="modal" data-bs-target="#lr-2026-10-16-absent"><img src="./assets/img/profile-2.jpg" alt="Sneha Iyer"><span class="evt-text">S10 - Sneha Iyer</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Clarkson Walter, Priya Sharma, Arjun Nair, Rahul Verma, Emily Davis, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore" data-bs-toggle="modal" data-bs-target="#sh-2026-10-16"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-17"><div class="cal-day-num">17</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Clarkson Walter, Arjun Nair" data-bs-toggle="modal" data-bs-target="#lr-2026-10-17-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Priya Sharma, Rahul Verma, Sneha Iyer, Emily Davis" data-bs-toggle="modal" data-bs-target="#sh-2026-10-17"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-18"><div class="cal-day-num">18</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Priya Sharma, Vickey G, Rahul Verma, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#lr-2026-10-18-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Arjun Nair, Emily Davis" data-bs-toggle="modal" data-bs-target="#lr-2026-10-18-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Clarkson Walter, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee" data-bs-toggle="modal" data-bs-target="#sh-2026-10-18"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-19"><div class="cal-day-num">19</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Lilly Williams, Priya Sharma, Karthik Raja, Ethan Taylor" data-bs-toggle="modal" data-bs-target="#lr-2026-10-19-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Arjun Nair, Rahul Verma, Sneha Iyer, Emily Davis, James Wilson, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson, Lucas White" data-bs-toggle="modal" data-bs-target="#sh-2026-10-19"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day" data-date="2026-10-20"><div class="cal-day-num">20</div><div class="cal-events"><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Lilly Williams, Arjun Nair, Karthik Raja" data-bs-toggle="modal" data-bs-target="#lr-2026-10-20-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Priya Sharma, Rahul Verma, Sneha Iyer, Emily Davis" data-bs-toggle="modal" data-bs-target="#sh-2026-10-20"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-21"><div class="cal-day-num">21</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Arjun Nair, Emily Davis, Grace Lee" data-bs-toggle="modal" data-bs-target="#lr-2026-10-21-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Clarkson Walter, Priya Sharma, Rahul Verma, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#sh-2026-10-21"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-22"><div class="cal-day-num">22</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Arjun Nair, Vickey G, Clarkson Walter, Rahul Verma, Sneha Iyer" data-bs-toggle="modal" data-bs-target="#lr-2026-10-22-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">5</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Emily Davis, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson, Lucas White" data-bs-toggle="modal" data-bs-target="#sh-2026-10-22"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">11</span></div></div></div>
            <div class="cal-day" data-date="2026-10-23"><div class="cal-day-num">23</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Lilly Williams, Priya Sharma, Arjun Nair, James Wilson" data-bs-toggle="modal" data-bs-target="#lr-2026-10-23-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Rahul Verma, Sneha Iyer, Emily Davis, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-23"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-24"><div class="cal-day-num">24</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Sneha Iyer, Emily Davis, Isabella Moore" data-bs-toggle="modal" data-bs-target="#lr-2026-10-24-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">3</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Clarkson Walter, Priya Sharma, Arjun Nair, Rahul Verma" data-bs-toggle="modal" data-bs-target="#sh-2026-10-24"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-25"><div class="cal-day-num">25</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Emily Davis, Vickey G, Clarkson Walter, Rahul Verma" data-bs-toggle="modal" data-bs-target="#lr-2026-10-25-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Priya Sharma, Arjun Nair, Sneha Iyer, Karthik Raja, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson, Lucas White" data-bs-toggle="modal" data-bs-target="#sh-2026-10-25"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">12</span></div></div></div>
            <div class="cal-day" data-date="2026-10-26"><div class="cal-day-num">26</div><div class="cal-events"><div class="cal-event evt-red" data-emp-id="1" data-status="absent" title="1 - 5056 - Vickey G (Absent)" data-bs-toggle="modal" data-bs-target="#lr-2026-10-26-absent"><img src="./assets/img/profile-1.jpg" alt="Vickey G"><span class="evt-text">1 - 5056 - Vickey G</span></div><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Sneha Iyer, Ethan Taylor" data-bs-toggle="modal" data-bs-target="#lr-2026-10-26-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Clarkson Walter, Priya Sharma, Arjun Nair, Rahul Verma, Emily Davis" data-bs-toggle="modal" data-bs-target="#sh-2026-10-26"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-27"><div class="cal-day-num">27</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Clarkson Walter, Lilly Williams, Arjun Nair, Sneha Iyer, Emily Davis" data-bs-toggle="modal" data-bs-target="#lr-2026-10-27-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">5</span></div><div class="cal-event evt-purple evt-grouped" data-status="leave" title="Leave: Rahul Verma, Karthik Raja" data-bs-toggle="modal" data-bs-target="#lr-2026-10-27-leave"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Leave</span><span class="evt-count-badge">2</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Priya Sharma, James Wilson, Ethan Taylor, Grace Lee, Isabella Moore" data-bs-toggle="modal" data-bs-target="#sh-2026-10-27"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-28"><div class="cal-day-num">28</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Vickey G, Priya Sharma, Rahul Verma, Karthik Raja, Ethan Taylor" data-bs-toggle="modal" data-bs-target="#lr-2026-10-28-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">5</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Lilly Williams, Clarkson Walter, Arjun Nair, Sneha Iyer, Emily Davis, James Wilson, Grace Lee, Isabella Moore, Aiden Thomas, Mia Anderson, Lucas White" data-bs-toggle="modal" data-bs-target="#sh-2026-10-28"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">11</span></div></div></div>
            <div class="cal-day" data-date="2026-10-29"><div class="cal-day-num">29</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Clarkson Walter, Arjun Nair, Emily Davis, Isabella Moore" data-bs-toggle="modal" data-bs-target="#lr-2026-10-29-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">4</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Lilly Williams, Priya Sharma, Rahul Verma, Sneha Iyer, Karthik Raja" data-bs-toggle="modal" data-bs-target="#sh-2026-10-29"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">6</span></div></div></div>
            <div class="cal-day" data-date="2026-10-30"><div class="cal-day-num">30</div><div class="cal-events"><div class="cal-event evt-red evt-grouped" data-status="absent" title="Absent: Lilly Williams, Priya Sharma, Sneha Iyer, James Wilson, Grace Lee" data-bs-toggle="modal" data-bs-target="#lr-2026-10-30-absent"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Absent</span><span class="evt-count-badge">5</span></div><div class="cal-event evt-blue evt-grouped" data-status="shift" title="Shift: Vickey G, Clarkson Walter, Arjun Nair, Rahul Verma, Emily Davis, Karthik Raja, Ethan Taylor, Isabella Moore, Aiden Thomas, Mia Anderson, Lucas White" data-bs-toggle="modal" data-bs-target="#sh-2026-10-30"><span class="evt-group-icon"><i class="bi bi-person-fill"></i></span><span class="evt-text">Shift</span><span class="evt-count-badge">11</span></div></div></div>
            <div class="cal-day weekend" data-date="2026-10-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-11">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day weekend" data-date="2026-11-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-11-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-11-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-12-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-12-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-12-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-12-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-12-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
        </div>
    </div>
    <div class="cal-month" data-month="2026-12">
        <div class="cal-dow-bar">
            <div class="cal-day-header weekend"><span class="dow-name">Sun</span><i class="bi bi-sun"></i></div>
            <div class="cal-day-header"><span class="dow-name">Mon</span></div>
            <div class="cal-day-header"><span class="dow-name">Tue</span></div>
            <div class="cal-day-header"><span class="dow-name">Wed</span></div>
            <div class="cal-day-header"><span class="dow-name">Thu</span></div>
            <div class="cal-day-header"><span class="dow-name">Fri</span></div>
            <div class="cal-day-header weekend"><span class="dow-name">Sat</span><i class="bi bi-sun"></i></div>
        </div>
        <div class="cal-grid">
            <div class="cal-day other-month" data-date="2026-11-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2026-11-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-03"><div class="cal-day-num">3</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-04"><div class="cal-day-num">4</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-05"><div class="cal-day-num">5</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-06"><div class="cal-day-num">6</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-07"><div class="cal-day-num">7</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-08"><div class="cal-day-num">8</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-09"><div class="cal-day-num">9</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-10"><div class="cal-day-num">10</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-11"><div class="cal-day-num">11</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-12"><div class="cal-day-num">12</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-13"><div class="cal-day-num">13</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-14"><div class="cal-day-num">14</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-15"><div class="cal-day-num">15</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-16"><div class="cal-day-num">16</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-17"><div class="cal-day-num">17</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-18"><div class="cal-day-num">18</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-19"><div class="cal-day-num">19</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-20"><div class="cal-day-num">20</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-21"><div class="cal-day-num">21</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-22"><div class="cal-day-num">22</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-23"><div class="cal-day-num">23</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-24"><div class="cal-day-num">24</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-25"><div class="cal-day-num">25</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-26"><div class="cal-day-num">26</div><div class="cal-events"></div></div>
            <div class="cal-day weekend" data-date="2026-12-27"><div class="cal-day-num">27</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-28"><div class="cal-day-num">28</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-29"><div class="cal-day-num">29</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-30"><div class="cal-day-num">30</div><div class="cal-events"></div></div>
            <div class="cal-day" data-date="2026-12-31"><div class="cal-day-num">31</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2027-01-01"><div class="cal-day-num">1</div><div class="cal-events"></div></div>
            <div class="cal-day other-month" data-date="2027-01-02"><div class="cal-day-num">2</div><div class="cal-events"></div></div>
        </div>
    </div>

    <!-- Legend -->
    <div class="cal-legend">
        <span class="legend-label">Status</span>
        <span class="legend-item"><span class="legend-dot dot-absent"></span>Absent</span>
        <span class="legend-item"><span class="legend-dot dot-leave"></span>Leave</span>
        <span class="legend-item"><span class="legend-dot dot-shift"></span>Shift</span>
    </div>
</div>

<!-- ===== Report modals (static, opened with Bootstrap data attributes) ===== -->

<!-- Leave report: 01-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-01-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 01-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-01-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>01-10-2026</td>
                                    <td>01-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>01-10-2026</td>
                                    <td>01-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 01-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-01" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 01-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-01-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 02-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-02-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 02-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-02-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>02-10-2026</td>
                                    <td>02-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>02-10-2026</td>
                                    <td>02-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>02-10-2026</td>
                                    <td>02-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 02-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-02" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 02-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">2 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-02-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 03-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-03-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 03-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-03-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>03-10-2026</td>
                                    <td>03-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>03-10-2026</td>
                                    <td>03-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>03-10-2026</td>
                                    <td>03-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 03-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-03" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 03-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 7 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-03-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 04-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-04-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 04-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-04-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>04-10-2026</td>
                                    <td>04-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>04-10-2026</td>
                                    <td>04-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>04-10-2026</td>
                                    <td>04-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 04-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-04" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 04-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">6</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-04-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 05-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-05-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 05-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-05-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>05-10-2026</td>
                                    <td>05-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>05-10-2026</td>
                                    <td>05-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>05-10-2026</td>
                                    <td>05-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Work From Home</td>
                                    <td>05-10-2026</td>
                                    <td>05-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 05-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-05" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 05-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-05-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 06-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-06-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 06-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">0</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-06-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>06-10-2026</td>
                                    <td>06-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 06-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-06-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 06-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-06-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>06-10-2026</td>
                                    <td>06-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>06-10-2026</td>
                                    <td>06-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>06-10-2026</td>
                                    <td>06-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 06-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-06" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 06-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-06-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 07-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-07-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 07-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-07-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>07-10-2026</td>
                                    <td>07-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>07-10-2026</td>
                                    <td>07-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>07-10-2026</td>
                                    <td>07-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 07-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-07" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 07-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">5</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">5</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-07-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 08-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-08-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 08-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-08-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>08-10-2026</td>
                                    <td>08-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>08-10-2026</td>
                                    <td>08-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>08-10-2026</td>
                                    <td>08-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 08-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-08" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 08-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-08-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 09-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-09-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 09-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-09-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>09-10-2026</td>
                                    <td>09-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>09-10-2026</td>
                                    <td>09-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>09-10-2026</td>
                                    <td>09-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 09-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-09" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 09-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-09-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 10-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-10-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 10-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">0</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-10-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>10-10-2026</td>
                                    <td>10-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 10-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-10" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 10-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">6</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-10-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 11-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-11-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 11-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-11-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>11-10-2026</td>
                                    <td>11-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>11-10-2026</td>
                                    <td>11-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 11-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-11-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 11-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-11-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>11-10-2026</td>
                                    <td>11-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>11-10-2026</td>
                                    <td>11-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>11-10-2026</td>
                                    <td>11-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 11-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-11" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 11-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-11-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 12-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-12-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 12-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-12-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>12-10-2026</td>
                                    <td>12-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>12-10-2026</td>
                                    <td>12-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>12-10-2026</td>
                                    <td>12-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 12-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-12" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 12-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-12-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 13-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-13-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 13-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-13-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>13-10-2026</td>
                                    <td>13-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>13-10-2026</td>
                                    <td>13-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>13-10-2026</td>
                                    <td>13-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>Work From Home</td>
                                    <td>13-10-2026</td>
                                    <td>13-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 13-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-13" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 13-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">5</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-13-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S23</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Lucas White"><span class="fw-semibold fs-13">Lucas White</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 14-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-14-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 14-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-14-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>14-10-2026</td>
                                    <td>14-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>14-10-2026</td>
                                    <td>14-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>14-10-2026</td>
                                    <td>14-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 14-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-14" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 14-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-14-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 15-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-15-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 15-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-15-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>15-10-2026</td>
                                    <td>15-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>15-10-2026</td>
                                    <td>15-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>15-10-2026</td>
                                    <td>15-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Work From Home</td>
                                    <td>15-10-2026</td>
                                    <td>15-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 15-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-15-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 15-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-15-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>15-10-2026</td>
                                    <td>15-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>15-10-2026</td>
                                    <td>15-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 15-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-15" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 15-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-15-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 16-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-16-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 16-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">0</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-16-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>16-10-2026</td>
                                    <td>16-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 16-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-16" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 16-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">6</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-16-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 17-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-17-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 17-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-17-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>17-10-2026</td>
                                    <td>17-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>17-10-2026</td>
                                    <td>17-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 17-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-17" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 17-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-17-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 18-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-18-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 18-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-18-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>18-10-2026</td>
                                    <td>18-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>18-10-2026</td>
                                    <td>18-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>18-10-2026</td>
                                    <td>18-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Work From Home</td>
                                    <td>18-10-2026</td>
                                    <td>18-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 18-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-18-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 18-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-18-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>18-10-2026</td>
                                    <td>18-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>18-10-2026</td>
                                    <td>18-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 18-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-18" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 18-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-18-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 19-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-19-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 19-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-19-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>19-10-2026</td>
                                    <td>19-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>19-10-2026</td>
                                    <td>19-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>19-10-2026</td>
                                    <td>19-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Work From Home</td>
                                    <td>19-10-2026</td>
                                    <td>19-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 19-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-19" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 19-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-19-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S23</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Lucas White"><span class="fw-semibold fs-13">Lucas White</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 20-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-20-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 20-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-20-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>20-10-2026</td>
                                    <td>20-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>20-10-2026</td>
                                    <td>20-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>20-10-2026</td>
                                    <td>20-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 20-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-20" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 20-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-20-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 21-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-21-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 21-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-21-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>21-10-2026</td>
                                    <td>21-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>21-10-2026</td>
                                    <td>21-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>21-10-2026</td>
                                    <td>21-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 21-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-21" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 21-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-21-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 22-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-22-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 22-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">5</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-22-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>22-10-2026</td>
                                    <td>22-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>22-10-2026</td>
                                    <td>22-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>22-10-2026</td>
                                    <td>22-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Work From Home</td>
                                    <td>22-10-2026</td>
                                    <td>22-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>22-10-2026</td>
                                    <td>22-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Fever and rest</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 22-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-22" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 22-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 11 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">5</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-22-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S23</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Lucas White"><span class="fw-semibold fs-13">Lucas White</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 23-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-23-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 23-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-23-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>23-10-2026</td>
                                    <td>23-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>23-10-2026</td>
                                    <td>23-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>23-10-2026</td>
                                    <td>23-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Work From Home</td>
                                    <td>23-10-2026</td>
                                    <td>23-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 23-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-23" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 23-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-23-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 24-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-24-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 24-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">3</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-24-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>24-10-2026</td>
                                    <td>24-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>24-10-2026</td>
                                    <td>24-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>24-10-2026</td>
                                    <td>24-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 24-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-24" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 24-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-24-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 25-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-25-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 25-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-25-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>25-10-2026</td>
                                    <td>25-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>25-10-2026</td>
                                    <td>25-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>25-10-2026</td>
                                    <td>25-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Work From Home</td>
                                    <td>25-10-2026</td>
                                    <td>25-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 25-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-25" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 25-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 12 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">5</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-25-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="12">
                                    <td>12</td>
                                    <td>S23</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Lucas White"><span class="fw-semibold fs-13">Lucas White</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 26-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-26-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 26-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">0</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-26-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>26-10-2026</td>
                                    <td>26-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 26-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-26-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 26-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-26-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>26-10-2026</td>
                                    <td>26-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>26-10-2026</td>
                                    <td>26-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 26-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-26" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 26-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-26-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 27-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-27-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 27-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">5</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-27-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Work From Home</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Fever and rest</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 27-10-2026 / On Leave -->
<div class="modal fade report-modal" id="lr-2026-10-27-leave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 27-10-2026</span>
                            <span class="lr-type-badge type-leave">On Leave</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">On Leave</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">0</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-27-leave-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>27-10-2026</td>
                                    <td>27-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 27-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-27" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 27-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-27-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 28-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-28-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 28-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">5</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-28-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>28-10-2026</td>
                                    <td>28-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>28-10-2026</td>
                                    <td>28-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>28-10-2026</td>
                                    <td>28-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>Work From Home</td>
                                    <td>28-10-2026</td>
                                    <td>28-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>28-10-2026</td>
                                    <td>28-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Fever and rest</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 28-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-28" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 28-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">4 shifts · 11 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">5</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">2</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-28-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S23</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Lucas White"><span class="fw-semibold fs-13">Lucas White</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 29-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-29-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 29-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">4</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">1</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-29-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>29-10-2026</td>
                                    <td>29-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>29-10-2026</td>
                                    <td>29-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>29-10-2026</td>
                                    <td>29-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>Work From Home</td>
                                    <td>29-10-2026</td>
                                    <td>29-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 29-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-29" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 29-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 6 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">4</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">1</span></button><button type="button" class="sh-shift-chip" data-shift="Evening Shift"><span>Evening Shift</span><span class="chip-count">1</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-29-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Evening Shift</span></td>
                                    <td>02:00 PM - 10:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Leave report: 30-10-2026 / Absent -->
<div class="modal fade report-modal" id="lr-2026-10-30-absent" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-slate"><i class="bi bi-calendar2-check"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Employee Attendance Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 30-10-2026</span>
                            <span class="lr-type-badge type-absent">Absent</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="row g-3 mb-4">
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-blue"><i class="bi bi-people"></i></div><div><div class="lr-stat-label">Total Absent</div><div class="lr-stat-value">5</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-green"><i class="bi bi-check2-circle"></i></div><div><div class="lr-stat-label">Approved</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-amber"><i class="bi bi-hourglass-split"></i></div><div><div class="lr-stat-label">Pending</div><div class="lr-stat-value">2</div></div></div></div>
                    <div class="col-xl-3 col-md-6"><div class="lr-stat-card"><div class="lr-stat-icon icon-red"><i class="bi bi-x-circle"></i></div><div><div class="lr-stat-label">Rejected</div><div class="lr-stat-value">1</div></div></div></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-table"></i></div>
                            <div><h3 class="card-title mb-0">Leave Records</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="lr-2026-10-30-absent-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th class="th-w-80">Days</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>S2</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Lilly Williams"><span class="fw-semibold fs-13">Lilly Williams</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>30-10-2026</td>
                                    <td>30-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Personal work</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S5</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Priya Sharma"><span class="fw-semibold fs-13">Priya Sharma</span></div></td>
                                    <td>Sick Leave</td>
                                    <td>30-10-2026</td>
                                    <td>30-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Medical appointment</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S10</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Sneha Iyer"><span class="fw-semibold fs-13">Sneha Iyer</span></div></td>
                                    <td>Earned Leave</td>
                                    <td>30-10-2026</td>
                                    <td>30-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Family function</td>
                                    <td><span class="status-pill status-rejected">Rejected</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S15</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="James Wilson"><span class="fw-semibold fs-13">James Wilson</span></div></td>
                                    <td>Work From Home</td>
                                    <td>30-10-2026</td>
                                    <td>30-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Home maintenance</td>
                                    <td><span class="status-pill status-approved">Approved</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S17</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Grace Lee"><span class="fw-semibold fs-13">Grace Lee</span></div></td>
                                    <td>Casual Leave</td>
                                    <td>30-10-2026</td>
                                    <td>30-10-2026</td>
                                    <td><span class="badge rounded-pill text-bg-light">1</span></td>
                                    <td>Fever and rest</td>
                                    <td><span class="status-pill status-pending">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shift report: 30-10-2026 -->
<div class="modal fade report-modal" id="sh-2026-10-30" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header report-modal-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="report-modal-icon icon-blue"><i class="bi bi-clock-history"></i></div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 report-modal-title">Shift Schedule Report</h5>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="report-modal-date">Date: 30-10-2026</span>
                            <span class="lr-type-badge type-shift">Shift</span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body report-modal-body">
                <div class="sh-filter-bar mb-4">
                    <div class="sh-filter-head">
                        <div class="sh-filter-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <div class="sh-filter-label">Shifts on this day</div>
                            <div class="sh-filter-sub">3 shifts · 11 employees</div>
                        </div>
                    </div>
                    <div class="sh-shift-chips"><button type="button" class="sh-shift-chip" data-shift="General Shift"><span>General Shift</span><span class="chip-count">6</span></button><button type="button" class="sh-shift-chip" data-shift="Night Shift"><span>Night Shift</span><span class="chip-count">2</span></button><button type="button" class="sh-shift-chip" data-shift="Morning Shift"><span>Morning Shift</span><span class="chip-count">3</span></button></div>
                </div>
                <div class="card-custom p-0">
                    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-chip"><i class="bi bi-clock-history"></i></div>
                            <div><h3 class="card-title mb-0">Shift Schedule</h3></div>
                        </div>
                    </div>
                    <div class="table-responsive table-modern-wrap overflow-auto column-border">
                        <table class="table-modern w-100 datatable" id="sh-2026-10-30-table">
                            <thead>
                                <tr>
                                    <th class="th-w-70">S.No</th>
                                    <th>Employee ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Shift</th>
                                    <th>Timings</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td>1</td>
                                    <td>1 - 5056</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Vickey G"><span class="fw-semibold fs-13">Vickey G</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="2">
                                    <td>2</td>
                                    <td>S3</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Clarkson Walter"><span class="fw-semibold fs-13">Clarkson Walter</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="3">
                                    <td>3</td>
                                    <td>S6</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Arjun Nair"><span class="fw-semibold fs-13">Arjun Nair</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="4">
                                    <td>4</td>
                                    <td>S9</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Rahul Verma"><span class="fw-semibold fs-13">Rahul Verma</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="5">
                                    <td>5</td>
                                    <td>S14</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-2.jpg" class="rounded-circle avatar-32" alt="Emily Davis"><span class="fw-semibold fs-13">Emily Davis</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="6">
                                    <td>6</td>
                                    <td>S12</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Karthik Raja"><span class="fw-semibold fs-13">Karthik Raja</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="7">
                                    <td>7</td>
                                    <td>S16</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Ethan Taylor"><span class="fw-semibold fs-13">Ethan Taylor</span></div></td>
                                    <td>Marketing</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="8">
                                    <td>8</td>
                                    <td>S18</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Isabella Moore"><span class="fw-semibold fs-13">Isabella Moore</span></div></td>
                                    <td>HR</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="9">
                                    <td>9</td>
                                    <td>S21</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-1.jpg" class="rounded-circle avatar-32" alt="Aiden Thomas"><span class="fw-semibold fs-13">Aiden Thomas</span></div></td>
                                    <td>IT</td>
                                    <td><span class="status-pill status-approved">Night Shift</span></td>
                                    <td>10:00 PM - 06:00 AM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="10">
                                    <td>10</td>
                                    <td>S22</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-3.jpg" class="rounded-circle avatar-32" alt="Mia Anderson"><span class="fw-semibold fs-13">Mia Anderson</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">Morning Shift</span></td>
                                    <td>06:00 AM - 02:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                                <tr data-id="11">
                                    <td>11</td>
                                    <td>S23</td>
                                    <td><div class="d-flex align-items-center gap-2"><img src="./assets/img/profile-4.jpg" class="rounded-circle avatar-32" alt="Lucas White"><span class="fw-semibold fs-13">Lucas White</span></div></td>
                                    <td>Management</td>
                                    <td><span class="status-pill status-approved">General Shift</span></td>
                                    <td>09:00 AM - 06:00 PM</td>
                                    <td><span class="status-pill status-approved">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* Everything above is static HTML. This script only shows / hides things on click. */
(function () {
    var wrap    = document.getElementById('calWrap');
    var months  = wrap.querySelectorAll('.cal-month');
    var labels  = wrap.querySelectorAll('.cal-month-label');
    var prevBtn = document.getElementById('calPrev');
    var nextBtn = document.getElementById('calNext');
    var current = 0, todayIdx = 0;

    months.forEach(function (m, i) { if (m.classList.contains('active')) current = todayIdx = i; });

    /* ---------- Month navigation: show one month, hide the rest ---------- */
    function showMonth(i) {
        current = Math.max(0, Math.min(months.length - 1, i));
        months.forEach(function (m, k) { m.classList.toggle('active', k === current); });
        labels.forEach(function (l, k) { l.classList.toggle('active', k === current); });
        prevBtn.disabled = current === 0;
        nextBtn.disabled = current === months.length - 1;
    }
    prevBtn.addEventListener('click', function () { showMonth(current - 1); });
    nextBtn.addEventListener('click', function () { showMonth(current + 1); });
    document.getElementById('calToday').addEventListener('click', function () { showMonth(todayIdx); });

    /* ---------- View tabs: show Leave / Shift chips (click the active tab again = show all) ---------- */
    var tabs = document.querySelectorAll('#calViewTabs .cal-view-tab');
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            var status = tab.getAttribute('data-status');
            if (wrap.getAttribute('data-view') === status) {
                wrap.setAttribute('data-view', '');
                tab.classList.remove('active');
            } else {
                wrap.setAttribute('data-view', status);
                tabs.forEach(function (t) { t.classList.toggle('active', t === tab); });
            }
        });
    });

    /* ---------- Filter panel show / hide ---------- */
    var filterBtn = document.getElementById('calFilterBtn');
    var filterPanel = document.getElementById('calFilterPanel');
    filterBtn.addEventListener('click', function () {
        filterPanel.classList.toggle('show');
        filterBtn.classList.toggle('active');
    });

    /* ---------- Shift modal: a shift chip shows only that shift's rows
       (uses the table's own search box, click the chip again to show all) ---------- */
    document.addEventListener('click', function (e) {
        var chip = e.target.closest('.sh-shift-chip');
        if (!chip) return;
        var body = chip.closest('.modal-body');
        var turnOn = !chip.classList.contains('active');
        body.querySelectorAll('.sh-shift-chip').forEach(function (c) { c.classList.remove('active'); });
        if (turnOn) chip.classList.add('active');
        var search = body.querySelector('.mt-search-input');
        if (search) {
            search.value = turnOn ? chip.getAttribute('data-shift') : '';
            search.dispatchEvent(new Event('input'));
        }
    });
})();
</script>

<?php include 'footer.php'; ?>