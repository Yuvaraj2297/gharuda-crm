<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/lead-source-report.css">



<main class="lsr-page">
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3 overflow-auto">
        <div class="overflow-auto">
            <h1 class="font-display fw-bold mb-1 page-title">Lead Source Report</h1>
        </div>
    </div>

    <!-- Filters -->
    <form method="get" class="card-custom mb-3 filters-card" autocomplete="off">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="lsrFrom">From Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="lsrFrom" name="from"
                        value="17-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <label class="form-label" for="lsrTo">To Date</label>
                <div class="date-picker"><input type="text" class="date-input form-control" id="lsrTo" name="to"
                        value="17-10-2026" placeholder="Select date" autocomplete="off"></div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-reject flex-fill" id="lsrClear">Clear</button>
                    <button type="submit" class="btn btn-primary flex-fill"><i
                            class="bi bi-search me-1"></i>Search</button>
                </div>
            </div>
        </div>
    </form>

    <!-- ===== View tabs ===== -->
    <div class="lsr-tabs" id="lsrTabs">
        <button type="button" class="lsr-tab active" data-tab="overview"><i
                class="bi bi-speedometer2"></i>Overview</button>
        <button type="button" class="lsr-tab" data-tab="sources"><i class="bi bi-grid-3x3-gap-fill"></i>All
            Sources</button>
    </div>

    <!-- ============ PANEL: Overview ============ -->
    <div class="lsr-panel active" id="lsrPanel-overview">

        <div class="lsr-hero">
            <div>
                <div class="lsr-hero-eyebrow">Total leads across all sources</div>
                <div class="lsr-hero-num">143</div>
                <div class="lsr-hero-sub"><i class="bi bi-calendar3 me-1"></i>17-10-2026 · combined result</div>
            </div>
            <div class="lsr-hero-stats">
                <div class="lsr-hero-chip"><b>17</b>Sources</div>
                <div class="lsr-hero-chip"><b title="INDIAMART">INDIAMART</b>Top source</div>
                <div class="lsr-hero-chip"><b>8.4</b>Avg / source</div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-green"><i class="bi bi-person-check-fill"></i></span>
                    <div>
                        <div class="lsr-stat-val">25</div>
                        <div class="lsr-stat-lbl">Customer</div>
                    </div>
                    <span class="lsr-stat-share">17%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-blue"><i class="bi bi-person-fill"></i></span>
                    <div>
                        <div class="lsr-stat-val">101</div>
                        <div class="lsr-stat-lbl">Lead</div>
                    </div>
                    <span class="lsr-stat-share">71%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-violet"><i class="bi bi-file-earmark-text"></i></span>
                    <div>
                        <div class="lsr-stat-val">8</div>
                        <div class="lsr-stat-lbl">Quotation</div>
                    </div>
                    <span class="lsr-stat-share">6%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-amber"><i class="bi bi-hourglass-split"></i></span>
                    <div>
                        <div class="lsr-stat-val">1</div>
                        <div class="lsr-stat-lbl">Waiting for Response</div>
                    </div>
                    <span class="lsr-stat-share">1%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-green"><i class="bi bi-arrow-repeat"></i></span>
                    <div>
                        <div class="lsr-stat-val">4</div>
                        <div class="lsr-stat-lbl">Followup</div>
                    </div>
                    <span class="lsr-stat-share">3%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-blue"><i class="bi bi-patch-check-fill"></i></span>
                    <div>
                        <div class="lsr-stat-val">0</div>
                        <div class="lsr-stat-lbl">Qualified</div>
                    </div>
                    <span class="lsr-stat-share">0%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-red"><i class="bi bi-signpost-2-fill"></i></span>
                    <div>
                        <div class="lsr-stat-val">1</div>
                        <div class="lsr-stat-lbl">DIRECT</div>
                    </div>
                    <span class="lsr-stat-share">1%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-violet"><i class="bi bi-envelope-plus-fill"></i></span>
                    <div>
                        <div class="lsr-stat-val">0</div>
                        <div class="lsr-stat-lbl">New Enquiry</div>
                    </div>
                    <span class="lsr-stat-share">0%</span>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-stat">
                    <span class="lsr-stat-ico t-amber"><i class="bi bi-stars"></i></span>
                    <div>
                        <div class="lsr-stat-val">3</div>
                        <div class="lsr-stat-lbl">New</div>
                    </div>
                    <span class="lsr-stat-share">2%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- ============ PANEL: All Sources ============ -->
    <div class="lsr-panel" id="lsrPanel-sources">

        <!-- Source cards -->
        <div class="row g-3">
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card is-total">
                    <div class="lsr-head">
                        <span class="lsr-title" title="TOTAL">TOTAL</span>
                        <span class="lsr-badge total">143</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value hot">25</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value hot">101</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value hot">8</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value hot">4</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value hot">3</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="AGENCY">AGENCY</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="DEMO">DEMO</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="DIGITAL ADS">DIGITAL ADS</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="DIRECT">DIRECT</span>
                        <span class="lsr-badge ">8</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value hot">3</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value hot">3</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="EXIHIBITION">EXIHIBITION</span>
                        <span class="lsr-badge ">3</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value hot">2</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="FACEBOOK">FACEBOOK</span>
                        <span class="lsr-badge ">1</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="FACEBOOK LEAD ADS">FACEBOOK LEAD ADS</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="GOKUL(REFERENCE)">GOKUL(REFERENCE)</span>
                        <span class="lsr-badge ">1</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="GOOGLE">GOOGLE</span>
                        <span class="lsr-badge ">1</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="INDIAMART">INDIAMART</span>
                        <span class="lsr-badge ">122</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value hot">17</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value hot">97</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value hot">4</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value hot">3</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="INSTA">INSTA</span>
                        <span class="lsr-badge ">3</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value hot">3</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="JUSTDIAL">JUSTDIAL</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="LINKEDIN">LINKEDIN</span>
                        <span class="lsr-badge ">1</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="MAIL">MAIL</span>
                        <span class="lsr-badge ">2</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="MARKET">MARKET</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="OFFICE VISIT">OFFICE VISIT</span>
                        <span class="lsr-badge zero">0</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="lsr-card">
                    <div class="lsr-head">
                        <span class="lsr-title" title="TELEGRAM">TELEGRAM</span>
                        <span class="lsr-badge ">1</span>
                    </div>
                    <div class="lsr-body">
                        <ul class="lsr-list">
                            <li class="lsr-row">
                                <span class="lsr-label">Customer</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Lead</span>
                                <span class="lsr-value hot">1</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Quotation</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Waiting for Response</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Followup</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">Qualified</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">DIRECT</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New Enquiry</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                            <li class="lsr-row">
                                <span class="lsr-label">New</span>
                                <span class="lsr-value zero">0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /lsrPanel-sources -->
</main>

<?php include 'footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // View tabs: Overview / All Sources (Hide & Show via JavaScript)
        var tabBtns = document.querySelectorAll("#lsrTabs .lsr-tab");
        var panels = document.querySelectorAll(".lsr-panel");

        tabBtns.forEach(function (tab) {
            tab.addEventListener("click", function (e) {
                e.preventDefault();
                tabBtns.forEach(function (t) { t.classList.remove("active"); });
                tab.classList.add("active");

                var targetTab = tab.getAttribute("data-tab");
                panels.forEach(function (p) {
                    if (p.id === "lsrPanel-" + targetTab) {
                        p.classList.add("active");
                        p.style.display = "block";
                    } else {
                        p.classList.remove("active");
                        p.style.display = "none";
                    }
                });
            });
        });

        // Filter search / clear client-side handling
        var filterForm = document.querySelector(".filters-card");
        var fromInput = document.getElementById("lsrFrom");
        var toInput = document.getElementById("lsrTo");
        var dateRangeLabel = document.querySelector(".lsr-date-range");
        var heroDateSub = document.querySelector(".lsr-hero-sub");

        if (filterForm) {
            filterForm.addEventListener("submit", function (e) {
                e.preventDefault();
                var fromVal = fromInput ? fromInput.value.trim() : "";
                var toVal = toInput ? toInput.value.trim() : "";
                var label = (fromVal && toVal && fromVal !== toVal) ? (fromVal + " to " + toVal) : (fromVal || toVal || "17-10-2026");
                if (dateRangeLabel) {
                    dateRangeLabel.innerHTML = '<i class="bi bi-calendar3 me-1"></i>Date: ' + label;
                }
                if (heroDateSub) {
                    heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + label + ' · combined result';
                }
            });
        }

        var clearBtn = document.getElementById("lsrClear");
        if (clearBtn) {
            clearBtn.addEventListener("click", function (e) {
                e.preventDefault();
                var today = "17-10-2026";
                if (fromInput) fromInput.value = today;
                if (toInput) toInput.value = today;
                if (dateRangeLabel) {
                    dateRangeLabel.innerHTML = '<i class="bi bi-calendar3 me-1"></i>Date: ' + today;
                }
                if (heroDateSub) {
                    heroDateSub.innerHTML = '<i class="bi bi-calendar3 me-1"></i>' + today + ' · combined result';
                }
            });
        }
    });
</script>