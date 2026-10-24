<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/lead-board.css">


<main class="lead-dash-page">
    <!-- ===== Page header ===== -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Sales Analytics</h1>
        </div>
        <form method="get" class="ld-period-form">
            <i class="bi bi-calendar3"></i>
            <select class="form-select form-select-sm gh-w-auto select2" name="month" aria-label="Month">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10" selected>October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <select class="form-select form-select-sm gh-w-auto select2" name="year" aria-label="Year">
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026" selected>2026</option>
                <option value="2027">2027</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm px-3">Apply</button>
        </form>
    </div>

    <!-- ===== Overview: spotlight + KPI grid ===== -->
    <div class="row g-3 mb-3">
        <div class="col-xl-4 col-lg-5">
            <div class="ld-spot">
                <div class="ld-spot-head">
                    <span class="ld-spot-head-l"><span class="ld-spot-trophy"><i
                                class="bi bi-trophy-fill"></i></span>Revenue by sales rep</span>
                    <span>October 2026</span>
                </div>
                <div class="ld-spot-top">
                    <div class="ld-spot-avatar">
                        G <span class="crown"><i class="bi bi-trophy-fill"></i></span>
                    </div>
                    <div>
                        <div class="ld-spot-name">GHARUDA SOFTWARE</div>
                        <div class="ld-spot-amount">₹ 999.00</div>
                        <span class="ld-spot-tag"><i class="bi bi-patch-check-fill"></i>Top performer</span>
                    </div>
                </div>
                <ul class="ld-board">
                    <li>
                        <span class="rank">1</span>
                        <div class="who-wrap">
                            <span class="who">GHARUDA SOFTWARE</span>
                            <span class="bar"><i style="width:100%"></i></span>
                        </div>
                        <span class="amt">₹ 999.00</span>
                    </li>
                    <li>
                        <span class="rank">2</span>
                        <div class="who-wrap">
                            <span class="who">ASHISH</span>
                            <span class="bar"><i style="width:0%"></i></span>
                        </div>
                        <span class="amt">₹ 0.00</span>
                    </li>
                    <li>
                        <span class="rank">3</span>
                        <div class="who-wrap">
                            <span class="who">Thilak Ma</span>
                            <span class="bar"><i style="width:0%"></i></span>
                        </div>
                        <span class="amt">₹ 0.00</span>
                    </li>
                </ul>
                <div class="ld-spot-foot">
                    <span><i class="bi bi-people-fill me-1"></i>Team revenue · 3 reps</span>
                    <strong>₹ 999.00</strong>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="row g-3 h-100">
                <div class="col-xl-4 col-md-6">
                    <div class="ld-kpi is-green">
                        <div class="ld-kpi-top">
                            <span class="ld-ico tint-green"><i class="bi bi-people"></i></span>
                            <span class="ld-kpi-label">Total customers</span>
                            <span class="ld-kpi-delta up"><i class="bi bi-arrow-up-right"></i>+13</span>
                        </div>
                        <div class="ld-kpi-value">43</div>
                        <div class="ld-kpi-sub">All time</div>
                        <svg class="ld-spark" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon
                                points="0,34 0,31 14.29,27 28.57,21 42.86,19 57.14,15 71.43,11 85.71,9 100,5 100,34"
                                fill="#16a34a" opacity=".12" />
                            <polyline points="0,31 14.29,27 28.57,21 42.86,19 57.14,15 71.43,11 85.71,9 100,5"
                                fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="ld-kpi is-blue">
                        <div class="ld-kpi-top">
                            <span class="ld-ico tint-blue"><i class="bi bi-person-plus"></i></span>
                            <span class="ld-kpi-label">New customers</span>
                            <span class="ld-kpi-delta up"><i class="bi bi-arrow-up-right"></i>+4</span>
                        </div>
                        <div class="ld-kpi-value">4</div>
                        <div class="ld-kpi-sub">October 2026</div>
                        <svg class="ld-spark" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon
                                points="0,34 0,31 14.29,24.5 28.57,24.5 42.86,18 57.14,18 71.43,11.5 85.71,11.5 100,5 100,34"
                                fill="#3b82f6" opacity=".12" />
                            <polyline points="0,31 14.29,24.5 28.57,24.5 42.86,18 57.14,18 71.43,11.5 85.71,11.5 100,5"
                                fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="ld-kpi is-amber">
                        <div class="ld-kpi-top">
                            <span class="ld-ico tint-amber"><i class="bi bi-bullseye"></i></span>
                            <span class="ld-kpi-label">Total leads</span>
                            <span class="ld-kpi-delta up"><i class="bi bi-arrow-up-right"></i>+2</span>
                        </div>
                        <div class="ld-kpi-value">2</div>
                        <div class="ld-kpi-sub">₹ 5.60</div>
                        <svg class="ld-spark" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon
                                points="0,34 0,31 14.29,31 28.57,18 42.86,31 57.14,31 71.43,18 85.71,31 100,5 100,34"
                                fill="#f59e0b" opacity=".12" />
                            <polyline points="0,31 14.29,31 28.57,18 42.86,31 57.14,31 71.43,18 85.71,31 100,5"
                                fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="ld-kpi is-red">
                        <div class="ld-kpi-top">
                            <span class="ld-ico tint-red"><i class="bi bi-x-circle"></i></span>
                            <span class="ld-kpi-label">Leads lost</span>
                            <span class="ld-kpi-delta flat"><i class="bi bi-dash"></i>±0</span>
                        </div>
                        <div class="ld-kpi-value">0</div>
                        <div class="ld-kpi-sub">₹ 0.00</div>
                        <svg class="ld-spark" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon
                                points="0,34 0,17 14.29,17 28.57,17 42.86,17 57.14,17 71.43,17 85.71,17 100,17 100,34"
                                fill="#ef4444" opacity=".12" />
                            <polyline points="0,17 14.29,17 28.57,17 42.86,17 57.14,17 71.43,17 85.71,17 100,17"
                                fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="ld-kpi is-violet">
                        <div class="ld-kpi-top">
                            <span class="ld-ico tint-violet"><i class="bi bi-file-earmark-text"></i></span>
                            <span class="ld-kpi-label">Total quotes</span>
                            <span class="ld-kpi-delta flat"><i class="bi bi-dash"></i>±0</span>
                        </div>
                        <div class="ld-kpi-value">9</div>
                        <div class="ld-kpi-sub">₹ 5,35,498.18</div>
                        <svg class="ld-spark" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon
                                points="0,34 0,22.33 14.29,31 28.57,13.67 42.86,22.33 57.14,31 71.43,5 85.71,22.33 100,22.33 100,34"
                                fill="#8b5cf6" opacity=".12" />
                            <polyline
                                points="0,22.33 14.29,31 28.57,13.67 42.86,22.33 57.14,31 71.43,5 85.71,22.33 100,22.33"
                                fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="ld-kpi is-green">
                        <div class="ld-kpi-top">
                            <span class="ld-ico tint-green"><i class="bi bi-arrow-repeat"></i></span>
                            <span class="ld-kpi-label">Quotes converted</span>
                            <span class="ld-kpi-delta up"><i class="bi bi-arrow-up-right"></i>+1</span>
                        </div>
                        <div class="ld-kpi-value">1</div>
                        <div class="ld-kpi-sub">₹ 119.18</div>
                        <svg class="ld-spark" viewBox="0 0 100 34" preserveAspectRatio="none" aria-hidden="true">
                            <polygon
                                points="0,34 0,31 14.29,31 28.57,31 42.86,5 57.14,31 71.43,31 85.71,31 100,5 100,34"
                                fill="#16a34a" opacity=".12" />
                            <polyline points="0,31 14.29,31 28.57,31 42.86,5 57.14,31 71.43,31 85.71,31 100,5"
                                fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Section tabs ===== -->
    <div class="ld-tabs" id="ldTabs">
        <button type="button" class="ld-tab active" data-tab="targets"><i class="bi bi-bullseye"></i>Targets &amp;
            Team</button>
        <button type="button" class="ld-tab" data-tab="activity"><i class="bi bi-telephone"></i>Calls &amp;
            Pipeline</button>
        <button type="button" class="ld-tab" data-tab="sales"><i class="bi bi-graph-up-arrow"></i>Sales &amp;
            Funnel</button>
        <button type="button" class="ld-tab" data-tab="sources"><i class="bi bi-bar-chart"></i>Sources &amp;
            Averages</button>
    </div>

    <!-- ===== PANEL: Targets & Team ===== -->
    <div class="ld-panel active" id="ldPanel-targets">
        <!-- ===== Targets ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-6">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-green"><i class="bi bi-flag"></i></span>
                            <h2 class="ld-title">Goals</h2>
                        </div>
                        <span class="ld-pill">October 2026</span>
                    </div>
                    <div class="ld-body">
                        <div class="ld-target">
                            <div class="ld-gauge-wrap">
                                <svg class="ld-gauge" viewBox="0 0 100 100" aria-hidden="true">
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#eef0f3" stroke-width="9" />
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#16a34a" stroke-width="9"
                                        stroke-linecap="round" stroke-dasharray="263.89" stroke-dashoffset="263.89"
                                        transform="rotate(-90 50 50)" />
                                </svg>
                                <div class="ld-gauge-center"><strong>0%</strong><span>achieved</span></div>
                            </div>
                            <div class="ld-stats">
                                <div class="ld-stat" style="--dot:#3b82f6;"><span>Total</span><strong>₹ 0.00</strong>
                                </div>
                                <div class="ld-stat" style="--dot:#16a34a;"><span>Achieved</span><strong class="neg">₹
                                        -1,05,708.24</strong></div>
                                <div class="ld-stat" style="--dot:#ef4444;"><span>Pending</span><strong>₹ 0.00</strong>
                                </div>
                            </div>
                        </div>
                        <div class="ld-note"><i class="bi bi-info-circle me-1"></i>No target is set for October 2026.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-green"><i class="bi bi-cash-stack"></i></span>
                            <h2 class="ld-title">Revenue target</h2>
                        </div>
                        <span class="ld-pill">October 2026</span>
                    </div>
                    <div class="ld-body">
                        <div class="ld-target">
                            <div class="ld-gauge-wrap">
                                <svg class="ld-gauge" viewBox="0 0 100 100" aria-hidden="true">
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#eef0f3" stroke-width="9" />
                                    <circle cx="50" cy="50" r="42" fill="none" stroke="#16a34a" stroke-width="9"
                                        stroke-linecap="round" stroke-dasharray="263.89" stroke-dashoffset="263.89"
                                        transform="rotate(-90 50 50)" />
                                </svg>
                                <div class="ld-gauge-center"><strong>0%</strong><span>achieved</span></div>
                            </div>
                            <div class="ld-stats">
                                <div class="ld-stat" style="--dot:#3b82f6;"><span>Total</span><strong>₹ 0.00</strong>
                                </div>
                                <div class="ld-stat" style="--dot:#16a34a;"><span>Achieved</span><strong class="">₹
                                        999.00</strong></div>
                                <div class="ld-stat" style="--dot:#ef4444;"><span>Pending</span><strong>₹ 0.00</strong>
                                </div>
                            </div>
                        </div>
                        <div class="ld-note"><i class="bi bi-info-circle me-1"></i>No target is set for October 2026.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Staff-wise business summary ===== -->
        <div class="ld-card mb-3" style="height:auto;">
            <div class="ld-head">
                <div class="ld-head-left">
                    <span class="ld-ico tint-blue"><i class="bi bi-person-lines-fill"></i></span>
                    <div>
                        <h2 class="ld-title">Staff-wise business summary</h2>
                        <div class="ld-sub">Won deals · business wise</div>
                    </div>
                </div>
                <div class="ld-controls">
                    <span class="ld-pill"><i class="bi bi-people-fill me-1"></i>6 staff</span>
                    <div class="ld-sum-search">
                        <i class="bi bi-search"></i>
                        <input type="text" id="ldSumSearch" placeholder="Search staff..." autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="ld-table-wrap">
                <table class="ld-table ld-sum" id="ldSumTable">
                    <thead>
                        <tr>
                            <th rowspan="2" class="stick-1" style="background:#f4f6f8;">S.No</th>
                            <th rowspan="2" class="stick-2 left" style="background:#f4f6f8;">Staff name</th>
                            <th colspan="3" class="band band-b1">Current month<small>October 2026</small></th>
                            <th colspan="3" class="band band-b2">Quarterly<small>October 2026 to December 2026</small>
                            </th>
                            <th colspan="3" class="band band-b3">Halfly<small>October 2026 to March 2027</small></th>
                        </tr>
                        <tr>
                            <th class="sub-b1">Target</th>
                            <th class="sub-b1">Achieved</th>
                            <th class="sub-b1">%</th>
                            <th class="sub-b2">Target</th>
                            <th class="sub-b2">Achieved</th>
                            <th class="sub-b2">%</th>
                            <th class="sub-b3">Target</th>
                            <th class="sub-b3">Achieved</th>
                            <th class="sub-b3">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-staff="gharuda software">
                            <td class="stick-1">1</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-green">G</span>GHARUDA
                                    SOFTWARE</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="neg">₹ -1,05,708.24</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="ashish">
                            <td class="stick-1">2</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-blue">A</span>ASHISH</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="thilak ma">
                            <td class="stick-1">3</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-violet">T</span>Thilak Ma</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="kishore r">
                            <td class="stick-1">4</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-amber">K</span>KISHORE R</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="rokith r">
                            <td class="stick-1">5</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-red">R</span>Rokith R</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                        <tr data-staff="prabhu s">
                            <td class="stick-1">6</td>
                            <td class="stick-2 left">
                                <span class="ld-staff"><span class="ld-avatar tint-green">P</span>Prabhu S</span>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                            <td class="muted">—</td>
                            <td class="">₹ 0.00</td>
                            <td>
                                <div class="ld-pct"><b class="p-none">0%</b>
                                    <div class="ld-bar"><i style="width:0%"></i></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="stick-1"></td>
                            <td class="stick-2 left"><i class="bi bi-people-fill me-1"></i>Team total</td>
                            <td>—</td>
                            <td class="neg">₹ -1,05,708.24</td>
                            <td>0%</td>
                            <td>—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>0%</td>
                            <td>—</td>
                            <td class="">₹ 49,11,854.69</td>
                            <td>0%</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="ld-sum-empty" id="ldSumEmpty"><i class="bi bi-search me-1"></i>No staff found matching your
                    search</div>
            </div>
        </div>

    </div><!-- /ldPanel-targets -->

    <!-- ===== PANEL: Calls & Pipeline ===== -->
    <div class="ld-panel" id="ldPanel-activity">
        <!-- ===== Calls & meetings + Pipeline ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-7">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-green"><i class="bi bi-telephone"></i></span>
                            <h2 class="ld-title">Calls &amp; meeting summary</h2>
                        </div>
                        <span class="ld-pill">October 2026</span>
                    </div>
                    <div class="ld-body">
                        <div class="ld-chart"><canvas id="ldCallsChart"></canvas></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-violet"><i class="bi bi-pie-chart"></i></span>
                            <h2 class="ld-title">Pipeline breakdown</h2>
                        </div>
                        <span class="ld-pill">October 2026</span>
                    </div>
                    <div class="ld-body">
                        <div class="ld-chart sm"><canvas id="ldPipelineChart"></canvas></div>
                        <div class="ld-legend" id="ldPipelineLegend"></div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /ldPanel-activity -->

    <!-- ===== PANEL: Sales & Funnel ===== -->
    <div class="ld-panel" id="ldPanel-sales">
        <!-- ===== Sales - proposals / quotations ===== -->
        <div class="ld-card mb-3" style="height:auto;">
            <div class="ld-head">
                <div class="ld-head-left">
                    <span class="ld-ico tint-blue"><i class="bi bi-graph-up-arrow"></i></span>
                    <div>
                        <h2 class="ld-title">Sales – proposals / quotations</h2>
                        <div class="ld-sub">October 2026</div>
                    </div>
                </div>
                <div class="ld-controls">
                    <div class="ld-seg" id="ldPropSeg" role="group" aria-label="Proposal period">
                        <button type="button" class="active" data-period="monthly">Monthly</button>
                        <button type="button" data-period="weekly">Weekly</button>
                        <button type="button" data-period="yearly">Yearly</button>
                    </div>
                </div>
            </div>
            <div class="ld-body">
                <div class="ld-metrics" id="ldPropMetrics"></div>
                <div class="ld-chart"><canvas id="ldProposalChart"></canvas></div>
            </div>
        </div>

        <!-- ===== Sales funnel overview ===== -->
        <div class="ld-card mb-3" style="height:auto;">
            <div class="ld-head">
                <div class="ld-head-left">
                    <span class="ld-ico tint-amber"><i class="bi bi-funnel"></i></span>
                    <div>
                        <h2 class="ld-title">Sales funnel overview</h2>
                        <div class="ld-sub">October 2026</div>
                    </div>
                </div>
                <div class="ld-controls">
                    <select class="form-select form-select-sm gh-w-auto select2" id="ldFunnelStaff" aria-label="Staff">
                        <option value="">All staff</option>
                        <option>Thilak</option>
                        <option>ASHISH</option>
                        <option>Rokith</option>
                        <option>Prabhu</option>
                        <option>KISHORE</option>
                        <option>GHARUDA</option>
                    </select>
                    <div class="ld-seg" id="ldFunnelSeg" role="group" aria-label="Funnel period">
                        <button type="button" data-period="today">Today</button>
                        <button type="button" data-period="weekly">Weekly</button>
                        <button type="button" class="active" data-period="monthly">Monthly</button>
                        <button type="button" data-period="yearly">Yearly</button>
                    </div>
                </div>
            </div>
            <div class="ld-body">
                <div class="ld-steps" id="ldFunnelSteps"></div>
                <div class="ld-chart"><canvas id="ldFunnelChart"></canvas></div>
            </div>
        </div>

    </div><!-- /ldPanel-sales -->

    <!-- ===== PANEL: Sources & Averages ===== -->
    <div class="ld-panel" id="ldPanel-sources">
        <!-- ===== Source-wise summary ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-7">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-green"><i class="bi bi-diagram-3"></i></span>
                            <h2 class="ld-title">Source-wise summary</h2>
                        </div>
                        <span class="ld-pill">October 2026</span>
                    </div>
                    <div class="ld-table-wrap scroll-y">
                        <table class="ld-table sticky-head">
                            <thead>
                                <tr>
                                    <th style="width:60px;">S.No</th>
                                    <th class="left">Source</th>
                                    <th style="min-width:170px;">Total lead</th>
                                    <th>Total quote</th>
                                    <th>Customer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="ld-rank top">1</span></td>
                                    <td class="left"><strong>IndiaMART</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>97</b>
                                            <div class="ld-bar"><i style="width:100%"></i></div>
                                        </div>
                                    </td>
                                    <td>4</td>
                                    <td>17</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank top">2</span></td>
                                    <td class="left"><strong>test</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>5</b>
                                            <div class="ld-bar"><i style="width:5%"></i></div>
                                        </div>
                                    </td>
                                    <td>4</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank top">3</span></td>
                                    <td class="left"><strong>Exihibition</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>3</b>
                                            <div class="ld-bar"><i style="width:3%"></i></div>
                                        </div>
                                    </td>
                                    <td>3</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">4</span></td>
                                    <td class="left"><strong>Mail</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>2</b>
                                            <div class="ld-bar"><i style="width:2%"></i></div>
                                        </div>
                                    </td>
                                    <td>5</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">5</span></td>
                                    <td class="left"><strong>Gokul(Reference)</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>1</b>
                                            <div class="ld-bar"><i style="width:1%"></i></div>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">6</span></td>
                                    <td class="left"><strong>Telegram</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>1</b>
                                            <div class="ld-bar"><i style="width:1%"></i></div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">7</span></td>
                                    <td class="left"><strong>demo</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>0</b>
                                            <div class="ld-bar"><i style="width:0%"></i></div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">8</span></td>
                                    <td class="left"><strong>Market</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>0</b>
                                            <div class="ld-bar"><i style="width:0%"></i></div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">9</span></td>
                                    <td class="left"><strong>Facebook Lead Ads</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>0</b>
                                            <div class="ld-bar"><i style="width:0%"></i></div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td><span class="ld-rank">10</span></td>
                                    <td class="left"><strong>Insta</strong></td>
                                    <td>
                                        <div class="ld-pct"><b>0</b>
                                            <div class="ld-bar"><i style="width:0%"></i></div>
                                        </div>
                                    </td>
                                    <td>0</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-blue"><i class="bi bi-bar-chart"></i></span>
                            <h2 class="ld-title">Top lead sources</h2>
                        </div>
                    </div>
                    <div class="ld-body">
                        <div class="ld-chart" style="height:330px;"><canvas id="ldSourceChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== Average sales monthly ===== -->
        <div class="row g-3 mb-3">
            <div class="col-lg-4">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-green"><i class="bi bi-graph-up"></i></span>
                            <div>
                                <h2 class="ld-title">Average sales monthly</h2>
                                <div class="ld-sub">October 2026</div>
                            </div>
                        </div>
                    </div>
                    <div class="ld-body">
                        <div class="row g-3">
                            <div class="col-6 col-lg-12">
                                <div class="ld-mini">
                                    <div class="ld-mini-top"><span class="ld-ico tint-blue"><i
                                                class="bi bi-currency-rupee"></i></span>Revenue</div>
                                    <div class="ld-mini-value neg">₹ -94,708.24</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="ld-mini">
                                    <div class="ld-mini-top"><span class="ld-ico tint-green"><i
                                                class="bi bi-stars"></i></span>Quality leads</div>
                                    <div class="ld-mini-value">2 <span class="ld-sub">/ 150</span></div>
                                    <div class="ld-bar"><i style="width:2%"></i></div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="ld-mini">
                                    <div class="ld-mini-top"><span class="ld-ico tint-amber"><i
                                                class="bi bi-trophy"></i></span>Win rate</div>
                                    <div class="ld-mini-value">22.22%</div>
                                    <div class="ld-mini-sub">Lead : 2 / Quote : 9</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="ld-mini">
                                    <div class="ld-mini-top"><span class="ld-ico tint-red"><i
                                                class="bi bi-hand-thumbs-down"></i></span>Lost rate</div>
                                    <div class="ld-mini-value">0%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ld-card">
                    <div class="ld-head">
                        <div class="ld-head-left">
                            <span class="ld-ico tint-violet"><i class="bi bi-bar-chart-line"></i></span>
                            <h2 class="ld-title" id="ldAvgTitle">Revenue by staff</h2>
                        </div>
                        <div class="ld-seg" id="ldAvgTabs" role="tablist" aria-label="Average sales view">
                            <button type="button" class="active" data-tab="revenue" role="tab">Revenue</button>
                            <button type="button" data-tab="leads" role="tab">Leads</button>
                            <button type="button" data-tab="wl" role="tab">W/L</button>
                        </div>
                    </div>
                    <div class="ld-body">
                        <div class="ld-chart lg"><canvas id="ldAvgChart"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /ldPanel-sources -->
</main>

<script>
    (function () {
        var LD = { "period": "October 2026", "labels": [["1", "Thu"], ["2", "Fri"], ["3", "Sat"], ["4", "Sun"], ["5", "Mon"], ["6", "Tue"], ["7", "Wed"], ["8", "Thu"], ["9", "Fri"], ["10", "Sat"], ["11", "Sun"], ["12", "Mon"], ["13", "Tue"], ["14", "Wed"], ["15", "Thu"], ["16", "Fri"], ["17", "Sat"], ["18", "Sun"], ["19", "Mon"], ["20", "Tue"], ["21", "Wed"], ["22", "Thu"], ["23", "Fri"], ["24", "Sat"], ["25", "Sun"], ["26", "Mon"], ["27", "Tue"], ["28", "Wed"], ["29", "Thu"], ["30", "Fri"], ["31", "Sat"]], "daily": { "leads": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "quotes": [0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 3, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "pvalue": [0, 0, 0, 0, 0, 0, 0, 0, 85000, 0, 0, 0, 0, 0, 0, 14601, 0, 0, 0, 380000, 18000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "orders": [0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "ovalue": [0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "proforma": [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "pfvalue": [0, 0, 0, 0, 0, 0, 0, 0, 0, 101, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "invoice": [0, 0, 0, 0, 0, 0, 0, 0, 0, 5000, 0, 0, 0, 0, 0, 0, 0, 0, -100000, 291.76, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "icount": [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "payments": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5999, 5000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "paycount": [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] }, "yearly": { "leads": [2, 2, 1, 2, 2, 1, 3, 2, 1, 2, 2, 2], "quotes": [10, 7, 5, 11, 8, 5, 12, 9, 6, 9, 10, 7], "pvalue": [547361.1, 398080.8, 248800.5, 597121.2, 447840.9, 298560.6, 646881.3, 497601, 348320.7, 497601, 547361.1, 398080.8], "orders": [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], "ovalue": [55000, 40000, 25000, 60000, 45000, 30000, 65000, 50000, 35000, 50000, 55000, 40000], "proforma": [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1], "pfvalue": [111.1, 80.8, 50.5, 121.2, 90.9, 60.6, 131.3, 101, 70.7, 101, 111.1, 80.8], "invoice": [-104179.06, -75766.59, -47354.12, -113649.89, -85237.42, -56824.94, -123120.71, -94708.24, -66295.77, -94708.24, -104179.06, -75766.59], "icount": [3, 2, 2, 4, 3, 2, 4, 3, 2, 3, 3, 2], "payments": [12098.9, 8799.2, 5499.5, 13198.8, 9899.1, 6599.4, 14298.7, 10999, 7699.3, 10999, 12098.9, 8799.2], "paycount": [2, 2, 1, 2, 2, 1, 3, 2, 1, 2, 2, 2] }, "yearMonths": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], "todayIdx": 16, "staff": ["Thilak", "ASHISH", "Rokith", "Prabhu", "KISHORE", "GHARUDA"], "calls": { "meeting": [0, 0, 0, 0, 0, 0], "call": [1, 0, 0, 0, 0, 0] }, "pipeline": [["Lead", 5.6, 5.6], ["Proposal", 535498.18, 535498.18], ["Estimate", 119.18, 119.18], ["Invoice", 98000.98, -98000.98]], "sources": [["IndiaMART", 97], ["test", 5], ["Exihibition", 3], ["Mail", 2], ["Gokul(Reference)", 1], ["Telegram", 1]], "avgMonths": ["October", "November", "December"], "avgRevenue": [[0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0], [0, 0, 0], [5017562.93, 0, -105708.24]], "avgLeads": [[0, 0, 0], [0, 0, 0], [0, 0, 2], [0, 0, 0], [0, 0, 0], [40, 55, 17]], "avgWon": [12, 6, 2], "avgLost": [3, 2, 0] };

        // ===== Helpers =====
        function fmtInr(n, dec) {
            dec = (dec === undefined) ? 2 : dec;
            var neg = n < 0,
                s = Math.abs(n).toFixed(dec).split('.'),
                int = s[0],
                last3 = int.slice(-3),
                rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return '₹ ' + (neg ? '-' : '') + rest + last3 + (dec ? '.' + s[1] : '');
        }

        function shortInr(v) {
            var a = Math.abs(v),
                sign = v < 0 ? '-' : '';
            if (a >= 1e7) return sign + (a / 1e7) + 'Cr';
            if (a >= 1e5) return sign + (a / 1e5) + 'L';
            if (a >= 1e3) return sign + (a / 1e3) + 'K';
            return v;
        }

        function sum(arr) {
            return arr.reduce(function (a, b) {
                return a + b;
            }, 0);
        }

        function labelText(l) {
            return Array.isArray(l) ? l.join(' ') : l;
        }

        var C = {
            green: '#16a34a',
            blue: '#3b82f6',
            amber: '#f5b301',
            violet: '#8b5cf6',
            red: '#ef4444',
            grey: '#9ca3af',
            pink: '#ec4899'
        };
        var STAFF_COLORS = ['#3b82f6', '#16a34a', '#84cc16', '#8b5cf6', '#f59e0b', '#0f766e'];
        var GRID = {
            color: '#eef0f3',
            drawBorder: false
        };
        var charts = {};

        function ctxFor(id) {
            if (charts[id]) charts[id].destroy();
            return document.getElementById(id).getContext('2d');
        }

        function gradient(top, bottom) {
            return function (context) {
                var chart = context.chart,
                    area = chart.chartArea;
                if (!area) return top;
                var g = chart.ctx.createLinearGradient(0, area.top, 0, area.bottom);
                g.addColorStop(0, top);
                g.addColorStop(1, bottom);
                return g;
            };
        }

        // ===== Period aggregation (monthly = daily points) =====
        function agg(period, keys) {
            var out = {
                labels: [],
                series: {},
                unit: 'day'
            };
            keys.forEach(function (k) {
                out.series[k] = [];
            });

            if (period === 'yearly') {
                out.labels = LD.yearMonths;
                out.unit = 'month';
                keys.forEach(function (k) {
                    out.series[k] = LD.yearly[k].slice();
                });
            } else if (period === 'weekly') {
                out.unit = 'week';
                var n = LD.labels.length,
                    weeks = Math.ceil(n / 7);
                for (var w = 0; w < weeks; w++) {
                    var from = w * 7,
                        to = Math.min(from + 7, n);
                    out.labels.push(['W' + (w + 1), (from + 1) + '-' + to]);
                    keys.forEach(function (k) {
                        out.series[k].push(sum(LD.daily[k].slice(from, to)));
                    });
                }
            } else if (period === 'today') {
                out.labels = [LD.labels[LD.todayIdx]];
                keys.forEach(function (k) {
                    out.series[k] = [LD.daily[k][LD.todayIdx]];
                });
            } else {
                out.labels = LD.labels;
                keys.forEach(function (k) {
                    out.series[k] = LD.daily[k].slice();
                });
            }
            return out;
        }

        function baseOptions() {
            return {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'rectRounded',
                            boxWidth: 9,
                            boxHeight: 9,
                            padding: 14,
                            font: {
                                size: 11,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#111827',
                        padding: 10,
                        cornerRadius: 8,
                        titleFont: {
                            size: 12,
                            weight: '700'
                        },
                        bodyFont: {
                            size: 12
                        },
                        boxPadding: 4,
                        callbacks: {
                            title: function (items) {
                                return items.length ? labelText(items[0].chart.data.labels[items[0].dataIndex]) : '';
                            },
                            label: function (c) {
                                var v = (c.parsed.y !== undefined && c.parsed.y !== null) ? c.parsed.y : c.parsed;
                                var money = c.dataset.label && c.dataset.label.indexOf('₹') > -1;
                                return ' ' + c.dataset.label + ': ' + (money ? fmtInr(v) : v);
                            }
                        }
                    }
                }
            };
        }

        function moneyAndCountScales() {
            return {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 10
                        },
                        maxRotation: 0
                    }
                },
                y: {
                    position: 'left',
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        callback: shortInr,
                        font: {
                            size: 10
                        }
                    }
                },
                y1: {
                    position: 'right',
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    },
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
        }

        function metric(color, label, value) {
            return '<div class="ld-metric" style="--mc:' + color + ';"><div class="ld-metric-label">' + label + '</div><div class="ld-metric-value">' + value + '</div></div>';
        }

        // ===== Proposals / quotations =====
        function buildProposals(period) {
            var a = agg(period, ['quotes', 'pvalue']),
                opt = baseOptions();
            opt.scales = moneyAndCountScales();

            charts.proposals = new Chart(ctxFor('ldProposalChart'), {
                data: {
                    labels: a.labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Proposals count',
                        data: a.series.quotes,
                        backgroundColor: 'rgba(59,130,246,.55)',
                        hoverBackgroundColor: 'rgba(59,130,246,.85)',
                        borderRadius: 6,
                        maxBarThickness: 34,
                        yAxisID: 'y1',
                        order: 2
                    }, {
                        type: 'line',
                        label: 'Proposal value (₹)',
                        data: a.series.pvalue,
                        borderColor: C.green,
                        backgroundColor: gradient('rgba(22,163,74,.28)', 'rgba(22,163,74,0)'),
                        borderWidth: 2.5,
                        pointRadius: 3,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: C.green,
                        pointBorderWidth: 2,
                        tension: .35,
                        fill: true,
                        yAxisID: 'y',
                        order: 1
                    }]
                },
                options: opt
            });

            var counts = a.series.quotes,
                values = a.series.pvalue,
                total = sum(counts),
                totalVal = sum(values),
                active = values.filter(function (v) {
                    return v > 0;
                }).length,
                peakIdx = counts.indexOf(Math.max.apply(null, counts));
            document.getElementById('ldPropMetrics').innerHTML =
                metric(C.blue, 'Total proposals', total) +
                metric(C.green, 'Total value', fmtInr(totalVal)) +
                metric(C.amber, 'Average per ' + a.unit, fmtInr(active ? totalVal / active : 0)) +
                metric(C.violet, 'Peak ' + a.unit, total ? labelText(a.labels[peakIdx]) : '-');
        }

        // ===== Sales funnel =====
        function step(cls, icon, label, value, sub) {
            return '<div class="ld-step"><div class="ld-step-top"><span class="ld-ico tint-' + cls + '"><i class="bi ' + icon + '"></i></span>' + label + '</div>' +
                '<div class="ld-step-value">' + value + '</div><div class="ld-step-sub">' + (sub || '&nbsp;') + '</div></div>';
        }

        function buildFunnel(period) {
            var keys = ['leads', 'quotes', 'pvalue', 'orders', 'ovalue', 'proforma', 'pfvalue', 'invoice', 'icount', 'payments', 'paycount'];
            var a = agg(period, keys),
                s = a.series,
                arrow = '<i class="bi bi-chevron-right ld-step-arrow"></i>';

            document.getElementById('ldFunnelSteps').innerHTML =
                step('blue', 'bi-bullseye', 'Leads', sum(s.leads), '') + arrow +
                step('amber', 'bi-file-earmark-text', 'Quotes', sum(s.quotes), fmtInr(sum(s.pvalue))) + arrow +
                step('grey', 'bi-cart-check', 'Sales orders', sum(s.orders), fmtInr(sum(s.ovalue))) + arrow +
                step('pink', 'bi-receipt', 'Proforma', sum(s.proforma), fmtInr(sum(s.pfvalue))) + arrow +
                step('green', 'bi-cash-stack', 'Invoice value', fmtInr(sum(s.invoice)), sum(s.icount) + ' invoices') + arrow +
                step('violet', 'bi-wallet2', 'Payments', fmtInr(sum(s.payments)), sum(s.paycount) + ' payments');

            var opt = baseOptions();
            opt.scales = moneyAndCountScales();
            charts.funnel = new Chart(ctxFor('ldFunnelChart'), {
                data: {
                    labels: a.labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Leads',
                        data: s.leads,
                        backgroundColor: 'rgba(59,130,246,.7)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Quotes',
                        data: s.quotes,
                        backgroundColor: 'rgba(245,179,1,.75)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Sales orders',
                        data: s.orders,
                        backgroundColor: 'rgba(156,163,175,.75)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'bar',
                        label: 'Proforma',
                        data: s.proforma,
                        backgroundColor: 'rgba(236,72,153,.65)',
                        borderRadius: 5,
                        maxBarThickness: 22,
                        yAxisID: 'y1',
                        order: 3
                    },
                    {
                        type: 'line',
                        label: 'Invoice value (₹)',
                        data: s.invoice,
                        borderColor: C.green,
                        backgroundColor: C.green,
                        borderWidth: 2.5,
                        pointRadius: 3,
                        tension: .35,
                        yAxisID: 'y',
                        order: 1
                    },
                    {
                        type: 'line',
                        label: 'Payments (₹)',
                        data: s.payments,
                        borderColor: C.violet,
                        backgroundColor: C.violet,
                        borderWidth: 2.5,
                        borderDash: [5, 4],
                        pointRadius: 3,
                        tension: .35,
                        yAxisID: 'y',
                        order: 2
                    }
                    ]
                },
                options: opt
            });
        }

        // ===== Calls & meetings =====
        function buildCalls() {
            var opt = baseOptions();
            opt.scales = {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
            charts.calls = new Chart(ctxFor('ldCallsChart'), {
                type: 'bar',
                data: {
                    labels: LD.staff,
                    datasets: [{
                        label: 'Meeting',
                        data: LD.calls.meeting,
                        backgroundColor: 'rgba(59,130,246,.75)',
                        borderRadius: 6,
                        maxBarThickness: 30
                    }, {
                        label: 'Call summary',
                        data: LD.calls.call,
                        backgroundColor: 'rgba(22,163,74,.75)',
                        borderRadius: 6,
                        maxBarThickness: 30
                    }]
                },
                options: opt
            });
        }

        // ===== Pipeline doughnut =====
        function buildPipeline() {
            var colors = [C.blue, C.amber, C.green, C.violet],
                net = sum(LD.pipeline.map(function (p) {
                    return p[2];
                })),
                totalAbs = sum(LD.pipeline.map(function (p) {
                    return p[1];
                }));

            var centerText = {
                id: 'ldCenter',
                afterDraw: function (chart) {
                    var a = chart.chartArea,
                        x = (a.left + a.right) / 2,
                        y = (a.top + a.bottom) / 2,
                        c = chart.ctx,
                        ff = Chart.defaults.font.family;
                    c.save();
                    c.textAlign = 'center';
                    c.fillStyle = '#6b7280';
                    c.font = '600 11px ' + ff;
                    c.fillText('Net pipeline', x, y - 8);
                    c.fillStyle = '#111827';
                    c.font = '800 15px ' + ff;
                    c.fillText(fmtInr(net, 0), x, y + 12);
                    c.restore();
                }
            };

            var opt = baseOptions();
            opt.cutout = '68%';
            opt.plugins.legend.display = false;
            opt.plugins.tooltip.callbacks.label = function (c) {
                return ' ' + LD.pipeline[c.dataIndex][0] + ': ' + fmtInr(LD.pipeline[c.dataIndex][2]);
            };
            charts.pipeline = new Chart(ctxFor('ldPipelineChart'), {
                type: 'doughnut',
                data: {
                    labels: LD.pipeline.map(function (p) {
                        return p[0];
                    }),
                    datasets: [{
                        data: LD.pipeline.map(function (p) {
                            return p[1];
                        }),
                        backgroundColor: colors,
                        borderColor: '#fff',
                        borderWidth: 3,
                        hoverOffset: 6
                    }]
                },
                options: opt,
                plugins: [centerText]
            });

            document.getElementById('ldPipelineLegend').innerHTML = LD.pipeline.map(function (p, i) {
                var share = totalAbs ? Math.round(p[1] / totalAbs * 100) : 0;
                return '<div class="ld-legend-row" style="--c:' + colors[i] + ';"><i></i><span class="name">' + p[0] + ' <span class="ld-sub">(' + share + '%)</span></span><span class="val">' + fmtInr(p[2]) + '</span></div>';
            }).join('');
        }

        // ===== Top lead sources (horizontal bars) =====
        function buildSources() {
            var opt = baseOptions();
            opt.indexAxis = 'y';
            opt.plugins.legend.display = false;
            opt.plugins.tooltip.callbacks.title = function (items) {
                return items[0].label;
            };
            opt.plugins.tooltip.callbacks.label = function (c) {
                return ' Total lead: ' + c.parsed.x;
            };
            opt.scales = {
                x: {
                    beginAtZero: true,
                    grid: GRID,
                    border: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 11,
                            weight: '600'
                        }
                    }
                }
            };
            charts.sources = new Chart(ctxFor('ldSourceChart'), {
                type: 'bar',
                data: {
                    labels: LD.sources.map(function (s) {
                        return s[0];
                    }),
                    datasets: [{
                        data: LD.sources.map(function (s) {
                            return s[1];
                        }),
                        backgroundColor: gradient('rgba(22,163,74,.9)', 'rgba(74,222,128,.75)'),
                        borderRadius: 6,
                        maxBarThickness: 22
                    }]
                },
                options: opt
            });
        }

        // ===== Average sales tabs =====
        function buildAvg(tab) {
            var opt = baseOptions(),
                datasets, title, yTitle;

            if (tab === 'leads') {
                title = 'Leads by staff';
                yTitle = 'Leads';
                datasets = LD.staff.map(function (n, i) {
                    return {
                        label: n,
                        data: LD.avgLeads[i],
                        backgroundColor: STAFF_COLORS[i],
                        borderRadius: 6,
                        maxBarThickness: 26
                    };
                });
            } else if (tab === 'wl') {
                title = 'Won vs lost';
                yTitle = 'Deals';
                datasets = [{
                    label: 'Won',
                    data: LD.avgWon,
                    backgroundColor: C.green,
                    borderRadius: 6,
                    maxBarThickness: 34
                }, {
                    label: 'Lost',
                    data: LD.avgLost,
                    backgroundColor: C.red,
                    borderRadius: 6,
                    maxBarThickness: 34
                }];
            } else {
                title = 'Revenue by staff';
                yTitle = 'Amount';
                datasets = LD.staff.map(function (n, i) {
                    return {
                        label: n,
                        data: LD.avgRevenue[i],
                        backgroundColor: STAFF_COLORS[i],
                        borderRadius: 6,
                        maxBarThickness: 26
                    };
                });
            }
            document.getElementById('ldAvgTitle').textContent = title;

            opt.scales = {
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Month',
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    grid: GRID,
                    border: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: yTitle,
                        font: {
                            size: 10
                        }
                    },
                    ticks: {
                        precision: 0,
                        font: {
                            size: 10
                        }
                    }
                }
            };
            if (tab === 'revenue') {
                opt.scales.y.ticks.callback = shortInr;
                opt.plugins.tooltip.callbacks.label = function (c) {
                    return ' ' + c.dataset.label + ': ' + fmtInr(c.parsed.y);
                };
            }
            charts.avg = new Chart(ctxFor('ldAvgChart'), {
                type: 'bar',
                data: {
                    labels: LD.avgMonths,
                    datasets: datasets
                },
                options: opt
            });
        }

        // ===== Toggle wiring =====
        function bindSeg(id, handler) {
            var seg = document.getElementById(id);
            seg.querySelectorAll('button').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    seg.querySelectorAll('button').forEach(function (b) {
                        b.classList.remove('active');
                    });
                    btn.classList.add('active');
                    handler(btn.dataset.period || btn.dataset.tab);
                });
            });
        }

        // Backend hook: staff filter for the funnel. Define window.ldFunnelStaffChanged(value) to reload data via AJAX.
        var funnelStaff = document.getElementById('ldFunnelStaff');
        if (funnelStaff) {
            funnelStaff.addEventListener('change', function () {
                if (typeof window.ldFunnelStaffChanged === 'function') window.ldFunnelStaffChanged(this.value);
            });
            if (window.jQuery) {
                window.jQuery(funnelStaff).on('change.select2', function () {
                    if (typeof window.ldFunnelStaffChanged === 'function') window.ldFunnelStaffChanged(this.value);
                });
            }
        }

        function init() {
            Chart.defaults.font.family = getComputedStyle(document.body).fontFamily;
            Chart.defaults.color = '#6b7280';
            if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                Chart.defaults.animation = false;
            }
            buildCalls();
            buildPipeline();
            buildProposals('monthly');
            buildFunnel('monthly');
            buildSources();
            buildAvg('revenue');

            bindSeg('ldPropSeg', buildProposals);
            bindSeg('ldFunnelSeg', buildFunnel);
            bindSeg('ldAvgTabs', buildAvg);

            // Staff table search filter (hide & show rows)
            var sumSearch = document.getElementById('ldSumSearch');
            if (sumSearch) {
                sumSearch.addEventListener('input', function () {
                    var query = this.value.toLowerCase().trim();
                    var rows = document.querySelectorAll('#ldSumTable tbody tr');
                    var matched = 0;
                    rows.forEach(function (row) {
                        var staffName = (row.getAttribute('data-staff') || row.textContent).toLowerCase();
                        if (!query || staffName.indexOf(query) > -1) {
                            row.style.display = '';
                            matched++;
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    var emptyEl = document.getElementById('ldSumEmpty');
                    if (emptyEl) {
                        if (matched === 0) {
                            emptyEl.classList.add('show');
                        } else {
                            emptyEl.classList.remove('show');
                        }
                    }
                });
            }

        }

        // ===== Section tabs =====
        var ldTabs = document.querySelectorAll('#ldTabs .ld-tab');
        ldTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                ldTabs.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                var name = tab.dataset.tab;
                document.querySelectorAll('.lead-dash-page .ld-panel').forEach(function (p) { p.classList.remove('active'); });
                var panel = document.getElementById('ldPanel-' + name);
                if (panel) {
                    panel.classList.add('active');
                    /* hidden canvases had 0 size — re-measure charts on show */
                    requestAnimationFrame(function () {
                        panel.querySelectorAll('canvas').forEach(function (cv) {
                            var ch = window.Chart && Chart.getChart ? Chart.getChart(cv) : null;
                            if (ch) ch.resize();
                        });
                    });
                }
            });
        });

        // Use the page's Chart.js if v3+ is already loaded, otherwise load v4 from cdnjs
        function loadChart(cb) {
            if (window.Chart && parseInt(Chart.version, 10) >= 3) return cb();
            var s = document.createElement('script');
            s.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js';
            s.onload = cb;
            document.head.appendChild(s);
        }

        document.addEventListener('DOMContentLoaded', function () {
            loadChart(init);
        });
    })();
</script>
<?php include 'footer.php'; ?>
