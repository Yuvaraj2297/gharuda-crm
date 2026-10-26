<?php include 'header.php'; ?>
<!-- Leaflet (map) -->
<link rel="stylesheet" href="./assets/css/leaflet.css">

<main class="py-3 pb-5">
    <div class="container-fluid px-3 px-md-4">

        <div class="d-flex align-items-center justify-content-between mb-3">
            <h1 class="font-display fw-bold mb-0 fs-3 text-dark d-flex align-items-center">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i> Staff Location Map
            </h1>
        </div>

        <div id="leadMapWrap">

            <!-- Filter -->
            <div class="card border-0 shadow-sm rounded-3 mb-3 bg-white">
                <div class="card-body p-3">
                    <form id="filterForm" onsubmit="return false;">
                        <div class="row align-items-end g-3">
                            <div class="col-md-4">
                                <label class="form-label small fw-bold text-secondary mb-1" for="filter_date">Date Filter</label>
                                <input type="text" class="date-input form-control form-control-sm" id="filter_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary btn-sm px-3 shadow-sm" id="btnSearch"><i class="bi bi-search me-1"></i>Search</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm px-3" id="btnReset"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table (toolbar auto-created by datatable class) -->
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white mb-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 datatable" id="leadMapTable" data-table-name="Staff Location">
                        <thead class="table-light text-secondary small">
                            <tr>
                                <th class="ps-3" style="width: 60px;">S.No</th>
                                <th class="text-nowrap">Id</th>
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Login Time</th>
                                <th class="text-nowrap">Login Area</th>
                                <th class="text-nowrap">Logout Time</th>
                                <th class="text-nowrap">Logout Area</th>
                                <th class="text-nowrap text-center">Tot. Visit</th>
                                <th class="text-nowrap">Tot. Kms</th>
                                <th class="text-nowrap">Battery</th>
                                <th class="text-nowrap text-center">Status</th>
                                <th class="text-nowrap text-end pe-3" style="width: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="leadMapTbody" class="small">
                            <tr data-id="GHRA0011">
                                <td class="ps-3">1</td>
                                <td class="fw-semibold">GHRA0011</td>
                                <td class="fw-bold text-dark">GHRAUDA SOFTWARE</td>
                                <td>09:02 AM</td>
                                <td>Nungambakkam</td>
                                <td>06:15 PM</td>
                                <td>T. Nagar</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0011">5</button></td>
                                <td>32.4 km</td>
                                <td>78 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-success d-inline-block" style="width:10px;height:10px;" title="Online"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0011" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="1234">
                                <td class="ps-3">2</td>
                                <td class="fw-semibold">1234</td>
                                <td class="fw-bold text-dark">thilak ma</td>
                                <td>09:30 AM</td>
                                <td>Anna Nagar</td>
                                <td>05:45 PM</td>
                                <td>Koyambedu</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="1234">3</button></td>
                                <td>18.7 km</td>
                                <td>54 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-success d-inline-block" style="width:10px;height:10px;" title="Online"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="1234" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0012">
                                <td class="ps-3">3</td>
                                <td class="fw-semibold">GHRA0012</td>
                                <td class="fw-bold text-dark">ARUN KUMAR</td>
                                <td>08:55 AM</td>
                                <td>Guindy</td>
                                <td>06:00 PM</td>
                                <td>Adyar</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0012">6</button></td>
                                <td>41.2 km</td>
                                <td>66 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-danger d-inline-block" style="width:10px;height:10px;" title="Offline"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0012" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0013">
                                <td class="ps-3">4</td>
                                <td class="fw-semibold">GHRA0013</td>
                                <td class="fw-bold text-dark">MOHAN RAJ</td>
                                <td>09:10 AM</td>
                                <td>Velachery</td>
                                <td>05:30 PM</td>
                                <td>Tambaram</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0013">4</button></td>
                                <td>27.9 km</td>
                                <td>91 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-success d-inline-block" style="width:10px;height:10px;" title="Online"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0013" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0014">
                                <td class="ps-3">5</td>
                                <td class="fw-semibold">GHRA0014</td>
                                <td class="fw-bold text-dark">PRIYA DHARSHINI</td>
                                <td>09:45 AM</td>
                                <td>Mylapore</td>
                                <td>06:20 PM</td>
                                <td>Egmore</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0014">7</button></td>
                                <td>35.0 km</td>
                                <td>43 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-danger d-inline-block" style="width:10px;height:10px;" title="Offline"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0014" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0015">
                                <td class="ps-3">6</td>
                                <td class="fw-semibold">GHRA0015</td>
                                <td class="fw-bold text-dark">SURESH BABU</td>
                                <td>Nill</td>
                                <td>Nill</td>
                                <td>Nill</td>
                                <td>Nill</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0015">0</button></td>
                                <td>0 km</td>
                                <td>0 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-danger d-inline-block" style="width:10px;height:10px;" title="Offline"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0015" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0016">
                                <td class="ps-3">7</td>
                                <td class="fw-semibold">GHRA0016</td>
                                <td class="fw-bold text-dark">DIVYA LAKSHMI</td>
                                <td>10:00 AM</td>
                                <td>Porur</td>
                                <td>06:05 PM</td>
                                <td>Vadapalani</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0016">2</button></td>
                                <td>14.3 km</td>
                                <td>82 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-success d-inline-block" style="width:10px;height:10px;" title="Online"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0016" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0017">
                                <td class="ps-3">8</td>
                                <td class="fw-semibold">GHRA0017</td>
                                <td class="fw-bold text-dark">KARTHIK RAJA</td>
                                <td>09:20 AM</td>
                                <td>Perambur</td>
                                <td>05:50 PM</td>
                                <td>Tondiarpet</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0017">5</button></td>
                                <td>29.6 km</td>
                                <td>60 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-success d-inline-block" style="width:10px;height:10px;" title="Online"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0017" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0018">
                                <td class="ps-3">9</td>
                                <td class="fw-semibold">GHRA0018</td>
                                <td class="fw-bold text-dark">NANDHINI S</td>
                                <td>Nill</td>
                                <td>Nill</td>
                                <td>Nill</td>
                                <td>Nill</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-secondary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0018">0</button></td>
                                <td>0 km</td>
                                <td>0 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-danger d-inline-block" style="width:10px;height:10px;" title="Offline"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0018" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0019">
                                <td class="ps-3">10</td>
                                <td class="fw-semibold">GHRA0019</td>
                                <td class="fw-bold text-dark">VIGNESH R</td>
                                <td>09:05 AM</td>
                                <td>Ashok Nagar</td>
                                <td>06:30 PM</td>
                                <td>Saidapet</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0019">6</button></td>
                                <td>38.1 km</td>
                                <td>37 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-danger d-inline-block" style="width:10px;height:10px;" title="Offline"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0019" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                            <tr data-id="GHRA0020">
                                <td class="ps-3">11</td>
                                <td class="fw-semibold">GHRA0020</td>
                                <td class="fw-bold text-dark">SANTHOSH M</td>
                                <td>09:40 AM</td>
                                <td>Kodambakkam</td>
                                <td>05:55 PM</td>
                                <td>Ambattur</td>
                                <td class="text-center"><button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 rounded-pill btn-view-map fw-bold" data-id="GHRA0020">3</button></td>
                                <td>21.5 km</td>
                                <td>72 %</td>
                                <td class="text-center"><span class="badge rounded-circle p-1 bg-success d-inline-block" style="width:10px;height:10px;" title="Online"></span></td>
                                <td class="text-end pe-3"><button type="button" class="btn btn-primary btn-sm rounded-circle d-inline-flex align-items-center justify-content-center btn-view-map" data-id="GHRA0020" title="View Map" style="width:32px;height:32px;"><i class="bi bi-eye-fill"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Map + Timeline Section -->
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden bg-white p-3 mb-4" id="mapSection">
                <div class="p-2.5 px-3 mb-3 bg-light rounded-3 border d-flex align-items-center justify-content-between flex-wrap gap-2" id="mapTitle">
                    <div class="fw-bold text-dark small d-flex align-items-center gap-2">
                        <i class="bi bi-map-fill text-primary fs-5"></i>
                        <span>Staff Route View: <span id="mapUserName" class="text-primary">GHRAUDA SOFTWARE</span> (<span id="mapUserId">GHRA0011</span>)</span>
                    </div>
                    <span class="badge bg-secondary rounded-pill" id="mapDate">--</span>
                </div>

                <div class="row g-3">
                    <div class="col-lg-8 col-12">
                        <div id="leadMap" class="rounded-3 border overflow-hidden shadow-sm" style="width: 100%; height: 520px;"></div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="card border rounded-3 h-100 bg-light-subtle d-flex flex-column">
                            <div class="p-3 border-bottom bg-white d-flex align-items-center justify-content-between rounded-top-3">
                                <span class="fw-bold text-dark small"><i class="bi bi-clock-history me-1 text-primary"></i> Daily Activity Timeline</span>
                                <span class="badge bg-primary rounded-pill" id="timelineCount">7</span>
                            </div>
                            <div class="p-3 overflow-auto flex-grow-1" style="max-height: 460px;">
                                <div class="list-group list-group-flush gap-2" id="timelineList">
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm border-primary bg-primary-subtle" data-index="0" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-success d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-box-arrow-in-right" style="font-size:12px;"></i>
                                                </span>
                                                Login
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">09:02 AM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> Nungambakkam</div>
                                            <small class="text-muted" style="font-size:11px;">Battery 92%</small>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm bg-white" data-index="1" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-primary d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-geo-alt-fill" style="font-size:12px;"></i>
                                                </span>
                                                Visit - Hona Traders
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">09:40 AM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> Thousand Lights</div>
                                            <small class="text-muted" style="font-size:11px;">Duration 25 min</small>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm bg-white" data-index="2" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-primary d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-geo-alt-fill" style="font-size:12px;"></i>
                                                </span>
                                                Visit - Sri Vel Agencies
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">10:45 AM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> Royapettah</div>
                                            <small class="text-muted" style="font-size:11px;">Duration 30 min</small>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm bg-white" data-index="3" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-warning text-dark d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-cup-hot-fill" style="font-size:12px;"></i>
                                                </span>
                                                Idle / Lunch Break
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">12:30 PM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> Mylapore</div>
                                            <small class="text-muted" style="font-size:11px;">Duration 45 min</small>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm bg-white" data-index="4" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-primary d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-geo-alt-fill" style="font-size:12px;"></i>
                                                </span>
                                                Visit - Kumar Stores
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">02:10 PM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> Teynampet</div>
                                            <small class="text-muted" style="font-size:11px;">Duration 20 min</small>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm bg-white" data-index="5" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-primary d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-geo-alt-fill" style="font-size:12px;"></i>
                                                </span>
                                                Visit - Balaji Motors
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">03:35 PM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> Guindy</div>
                                            <small class="text-muted" style="font-size:11px;">Duration 35 min</small>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm bg-white" data-index="6" role="button">
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <span class="fw-bold text-dark small d-flex align-items-center gap-2">
                                                <span class="badge rounded-circle p-1 text-white bg-danger d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">
                                                    <i class="bi bi-box-arrow-right" style="font-size:12px;"></i>
                                                </span>
                                                Logout
                                            </span>
                                            <span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">06:15 PM</span>
                                        </div>
                                        <div class="small text-muted ps-4 ms-2">
                                            <div><i class="bi bi-geo-alt text-secondary"></i> T. Nagar</div>
                                            <small class="text-muted" style="font-size:11px;">Total 32.4 km travelled</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

<!-- Leaflet JS -->
<script src="./assets/js/leaflet.js"></script>
<!-- Date Picker JS -->
<script src="./assets/js/date-picker.js"></script>
<script src="./assets/js/pages/lead-map.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>