<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/table.css">
<!-- Leaflet (map) -->
<link rel="stylesheet" href="./assets/css/leaflet.css">
<link rel="stylesheet" href="./assets/css/lead-map.css">

<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <h1 class="font-display fw-bold mb-1 page-title">Map View</h1>
</div>

<div class="card-custom p-0" id="leadMapWrap">

    <!-- Filter -->
    <form id="filterForm" onsubmit="return false;">
        <div class="row align-items-end g-2 p-4 pb-1">
            <div class="col-md-4">
                <div class="date-picker">
                    <label class="form-label fw-bold mb-1" for="filter_date">Map View :</label>
                    <input type="text" class="date-input form-control form-control-sm" id="filter_date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                </div>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" id="btnSearch">Search</button>
                <button type="button" class="btn btn-warning text-white" id="btnReset">Reset</button>
            </div>
        </div>
    </form>

    <hr class="my-3 mb-2">

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="leadMapTable" data-table-name="Staff Location">
            <thead>
                <tr>
                    <th class="col-sno">S.No</th>
                    <th class="text-nowrap">Id</th>
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">Login Time</th>
                    <th class="text-nowrap">Login Area</th>
                    <th class="text-nowrap">Logout Time</th>
                    <th class="text-nowrap">Logout Area</th>
                    <th class="text-nowrap">Tot. Visit</th>
                    <th class="text-nowrap">Tot. Kms</th>
                    <th class="text-nowrap">User Battery</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap col-action">Action</th>
                </tr>
            </thead>
            <tbody id="leadMapTbody">
                <tr data-id="GHRA0011">
                    <td>1</td>
                    <td>GHRA0011</td>
                    <td>GHRAUDA SOFTWARE</td>
                    <td>09:02 AM</td>
                    <td>Nungambakkam</td>
                    <td>06:15 PM</td>
                    <td>T. Nagar</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0011">5</button></td>
                    <td>32.4 km</td>
                    <td>78 %</td>
                    <td><span class="status-dot online"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0011" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="1234">
                    <td>2</td>
                    <td>1234</td>
                    <td>thilak ma</td>
                    <td>09:30 AM</td>
                    <td>Anna Nagar</td>
                    <td>05:45 PM</td>
                    <td>Koyambedu</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="1234">3</button></td>
                    <td>18.7 km</td>
                    <td>54 %</td>
                    <td><span class="status-dot online"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="1234" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0012">
                    <td>3</td>
                    <td>GHRA0012</td>
                    <td>ARUN KUMAR</td>
                    <td>08:55 AM</td>
                    <td>Guindy</td>
                    <td>06:00 PM</td>
                    <td>Adyar</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0012">6</button></td>
                    <td>41.2 km</td>
                    <td>66 %</td>
                    <td><span class="status-dot"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0012" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0013">
                    <td>4</td>
                    <td>GHRA0013</td>
                    <td>MOHAN RAJ</td>
                    <td>09:10 AM</td>
                    <td>Velachery</td>
                    <td>05:30 PM</td>
                    <td>Tambaram</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0013">4</button></td>
                    <td>27.9 km</td>
                    <td>91 %</td>
                    <td><span class="status-dot online"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0013" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0014">
                    <td>5</td>
                    <td>GHRA0014</td>
                    <td>PRIYA DHARSHINI</td>
                    <td>09:45 AM</td>
                    <td>Mylapore</td>
                    <td>06:20 PM</td>
                    <td>Egmore</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0014">7</button></td>
                    <td>35.0 km</td>
                    <td>43 %</td>
                    <td><span class="status-dot"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0014" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0015">
                    <td>6</td>
                    <td>GHRA0015</td>
                    <td>SURESH BABU</td>
                    <td>Nill</td>
                    <td>Nill</td>
                    <td>Nill</td>
                    <td>Nill</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0015">0</button></td>
                    <td>0 km</td>
                    <td>0 %</td>
                    <td><span class="status-dot"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0015" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0016">
                    <td>7</td>
                    <td>GHRA0016</td>
                    <td>DIVYA LAKSHMI</td>
                    <td>10:00 AM</td>
                    <td>Porur</td>
                    <td>06:05 PM</td>
                    <td>Vadapalani</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0016">2</button></td>
                    <td>14.3 km</td>
                    <td>82 %</td>
                    <td><span class="status-dot online"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0016" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0017">
                    <td>8</td>
                    <td>GHRA0017</td>
                    <td>KARTHIK RAJA</td>
                    <td>09:20 AM</td>
                    <td>Perambur</td>
                    <td>05:50 PM</td>
                    <td>Tondiarpet</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0017">5</button></td>
                    <td>29.6 km</td>
                    <td>60 %</td>
                    <td><span class="status-dot online"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0017" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0018">
                    <td>9</td>
                    <td>GHRA0018</td>
                    <td>NANDHINI S</td>
                    <td>Nill</td>
                    <td>Nill</td>
                    <td>Nill</td>
                    <td>Nill</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0018">0</button></td>
                    <td>0 km</td>
                    <td>0 %</td>
                    <td><span class="status-dot"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0018" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0019">
                    <td>10</td>
                    <td>GHRA0019</td>
                    <td>VIGNESH R</td>
                    <td>09:05 AM</td>
                    <td>Ashok Nagar</td>
                    <td>06:30 PM</td>
                    <td>Saidapet</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0019">6</button></td>
                    <td>38.1 km</td>
                    <td>37 %</td>
                    <td><span class="status-dot"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0019" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
                <tr data-id="GHRA0020">
                    <td>11</td>
                    <td>GHRA0020</td>
                    <td>SANTHOSH M</td>
                    <td>09:40 AM</td>
                    <td>Kodambakkam</td>
                    <td>05:55 PM</td>
                    <td>Ambattur</td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0020">3</button></td>
                    <td>21.5 km</td>
                    <td>72 %</td>
                    <td><span class="status-dot online"></span></td>
                    <td><button type="button" class="btn btn-primary btn-sm btn-view-map" data-id="GHRA0020" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="View Map"><i class="bi bi-eye-fill"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="my-2">

    <!-- Map + Timeline -->
    <div class="row mt-4" id="mapSection">
        <div class="col-12">
            <div class="map-title" id="mapTitle">
                Map View For - <span id="mapUserName">GHRAUDA SOFTWARE</span> |
                <span id="mapUserId">GHRA0011</span> |
                <span id="mapDate">--</span>
            </div>
        </div>

        <div class="col-lg-8 col-12 mb-3">
            <div id="leadMap"></div>
        </div>

        <div class="col-lg-4 col-12 mb-3">
            <div class="timeline-box">
                <div class="timeline-head">Timeline <span class="count" id="timelineCount">7</span></div>
                <ul class="timeline-list" id="timelineList">
                    <li class="tl-item tl-login active" data-index="0">
                        <div class="tl-icon"><i class="bi bi-box-arrow-in-right"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Login</span><span class="tl-time">09:02 AM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> Nungambakkam</div>
                            <div class="tl-meta">Battery 92%</div>
                        </div>
                    </li>
                    <li class="tl-item tl-visit" data-index="1">
                        <div class="tl-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Visit - Hona Traders</span><span class="tl-time">09:40 AM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> Thousand Lights</div>
                            <div class="tl-meta">Duration 25 min</div>
                        </div>
                    </li>
                    <li class="tl-item tl-visit" data-index="2">
                        <div class="tl-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Visit - Sri Vel Agencies</span><span class="tl-time">10:45 AM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> Royapettah</div>
                            <div class="tl-meta">Duration 30 min</div>
                        </div>
                    </li>
                    <li class="tl-item tl-idle" data-index="3">
                        <div class="tl-icon"><i class="bi bi-cup-hot-fill"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Idle / Lunch Break</span><span class="tl-time">12:30 PM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> Mylapore</div>
                            <div class="tl-meta">Duration 45 min</div>
                        </div>
                    </li>
                    <li class="tl-item tl-visit" data-index="4">
                        <div class="tl-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Visit - Kumar Stores</span><span class="tl-time">02:10 PM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> Teynampet</div>
                            <div class="tl-meta">Duration 20 min</div>
                        </div>
                    </li>
                    <li class="tl-item tl-visit" data-index="5">
                        <div class="tl-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Visit - Balaji Motors</span><span class="tl-time">03:35 PM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> Guindy</div>
                            <div class="tl-meta">Duration 35 min</div>
                        </div>
                    </li>
                    <li class="tl-item tl-logout" data-index="6">
                        <div class="tl-icon"><i class="bi bi-box-arrow-right"></i></div>
                        <div class="tl-card">
                            <div class="tl-top"><span class="tl-title">Logout</span><span class="tl-time">06:15 PM</span></div>
                            <div class="tl-area"><i class="bi bi-geo-alt"></i> T. Nagar</div>
                            <div class="tl-meta">Total 32.4 km travelled</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<!-- Leaflet JS -->
<script src="./assets/js/leaflet.js"></script>
<!-- Date Picker JS -->
<script src="./assets/js/date-picker.js"></script>
<script>
    (function() {
        'use strict';

        // ---------- Dummy data ----------
        var TL = {
            login: {
                icon: 'bi-box-arrow-in-right',
                label: 'Login',
                color: '#1fb141'
            },
            visit: {
                icon: 'bi-geo-alt-fill',
                label: 'Visit',
                color: '#3b9bff'
            },
            idle: {
                icon: 'bi-cup-hot-fill',
                label: 'Idle',
                color: '#f0a500'
            },
            logout: {
                icon: 'bi-box-arrow-right',
                label: 'Logout',
                color: '#e60000'
            }
        };

        var users = [{
                id: 'GHRA0011',
                name: 'GHRAUDA SOFTWARE',
                login: '09:02 AM',
                loginArea: 'Nungambakkam',
                logout: '06:15 PM',
                logoutArea: 'T. Nagar',
                visits: 5,
                kms: 32.4,
                battery: 78,
                online: true
            },
            {
                id: '1234',
                name: 'thilak ma',
                login: '09:30 AM',
                loginArea: 'Anna Nagar',
                logout: '05:45 PM',
                logoutArea: 'Koyambedu',
                visits: 3,
                kms: 18.7,
                battery: 54,
                online: true
            },
            {
                id: 'GHRA0012',
                name: 'ARUN KUMAR',
                login: '08:55 AM',
                loginArea: 'Guindy',
                logout: '06:00 PM',
                logoutArea: 'Adyar',
                visits: 6,
                kms: 41.2,
                battery: 66,
                online: false
            },
            {
                id: 'GHRA0013',
                name: 'MOHAN RAJ',
                login: '09:10 AM',
                loginArea: 'Velachery',
                logout: '05:30 PM',
                logoutArea: 'Tambaram',
                visits: 4,
                kms: 27.9,
                battery: 91,
                online: true
            },
            {
                id: 'GHRA0014',
                name: 'PRIYA DHARSHINI',
                login: '09:45 AM',
                loginArea: 'Mylapore',
                logout: '06:20 PM',
                logoutArea: 'Egmore',
                visits: 7,
                kms: 35.0,
                battery: 43,
                online: false
            },
            {
                id: 'GHRA0015',
                name: 'SURESH BABU',
                login: 'Nill',
                loginArea: 'Nill',
                logout: 'Nill',
                logoutArea: 'Nill',
                visits: 0,
                kms: 0,
                battery: 0,
                online: false
            },
            {
                id: 'GHRA0016',
                name: 'DIVYA LAKSHMI',
                login: '10:00 AM',
                loginArea: 'Porur',
                logout: '06:05 PM',
                logoutArea: 'Vadapalani',
                visits: 2,
                kms: 14.3,
                battery: 82,
                online: true
            },
            {
                id: 'GHRA0017',
                name: 'KARTHIK RAJA',
                login: '09:20 AM',
                loginArea: 'Perambur',
                logout: '05:50 PM',
                logoutArea: 'Tondiarpet',
                visits: 5,
                kms: 29.6,
                battery: 60,
                online: true
            },
            {
                id: 'GHRA0018',
                name: 'NANDHINI S',
                login: 'Nill',
                loginArea: 'Nill',
                logout: 'Nill',
                logoutArea: 'Nill',
                visits: 0,
                kms: 0,
                battery: 0,
                online: false
            },
            {
                id: 'GHRA0019',
                name: 'VIGNESH R',
                login: '09:05 AM',
                loginArea: 'Ashok Nagar',
                logout: '06:30 PM',
                logoutArea: 'Saidapet',
                visits: 6,
                kms: 38.1,
                battery: 37,
                online: false
            },
            {
                id: 'GHRA0020',
                name: 'SANTHOSH M',
                login: '09:40 AM',
                loginArea: 'Kodambakkam',
                logout: '05:55 PM',
                logoutArea: 'Ambattur',
                visits: 3,
                kms: 21.5,
                battery: 72,
                online: true
            }
        ];

        // Dummy timeline (same route used for every user that has visits)
        var routeTemplate = [{
                type: 'login',
                time: '09:02 AM',
                title: 'Login',
                area: 'Nungambakkam',
                note: 'Battery 92%',
                lat: 13.0605,
                lng: 80.2425
            },
            {
                type: 'visit',
                time: '09:40 AM',
                title: 'Visit - Hona Traders',
                area: 'Thousand Lights',
                note: 'Duration 25 min',
                lat: 13.0580,
                lng: 80.2590
            },
            {
                type: 'visit',
                time: '10:45 AM',
                title: 'Visit - Sri Vel Agencies',
                area: 'Royapettah',
                note: 'Duration 30 min',
                lat: 13.0530,
                lng: 80.2640
            },
            {
                type: 'idle',
                time: '12:30 PM',
                title: 'Idle / Lunch Break',
                area: 'Mylapore',
                note: 'Duration 45 min',
                lat: 13.0339,
                lng: 80.2690
            },
            {
                type: 'visit',
                time: '02:10 PM',
                title: 'Visit - Kumar Stores',
                area: 'Teynampet',
                note: 'Duration 20 min',
                lat: 13.0450,
                lng: 80.2500
            },
            {
                type: 'visit',
                time: '03:35 PM',
                title: 'Visit - Balaji Motors',
                area: 'Guindy',
                note: 'Duration 35 min',
                lat: 13.0100,
                lng: 80.2200
            },
            {
                type: 'logout',
                time: '06:15 PM',
                title: 'Logout',
                area: 'T. Nagar',
                note: 'Total 32.4 km travelled',
                lat: 13.0418,
                lng: 80.2341
            }
        ];

        // ---------- State ----------
        var map, layerGroup, markers = [];
        var selectedUser = users[0];

        // ---------- Helpers ----------
        function todayDMY() {
            var d = new Date();
            var m = ('0' + (d.getMonth() + 1)).slice(-2);
            var day = ('0' + d.getDate()).slice(-2);
            return day + '-' + m + '-' + d.getFullYear();
        }

        function currentDate() {
            var el = document.getElementById('filter_date');
            var val = (el ? el.value : '').trim();
            return val || todayDMY();
        }


        // ---------- Map ----------
        function initMap() {
            if (typeof L === 'undefined') return;
            try {
                map = L.map('leadMap').setView([13.0605, 80.2425], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);
                layerGroup = L.layerGroup().addTo(map);
                setTimeout(function() {
                    if (map) map.invalidateSize();
                }, 300);
            } catch (e) {
                console.warn('Map initialization error:', e);
            }
        }

        function markerIcon(type, label) {
            if (typeof L === 'undefined') return null;
            return L.divIcon({
                className: '',
                html: '<div class="lm-marker lm-' + type + '">' + label + '</div>',
                iconSize: [28, 28],
                iconAnchor: [14, 14],
                popupAnchor: [0, -14]
            });
        }

        function getTimeline(user) {
            return user && user.visits > 0 ? routeTemplate : [];
        }

        function renderMap(user) {
            if (!map || typeof L === 'undefined') return;
            try {
                layerGroup.clearLayers();
                markers = [];
                var items = getTimeline(user);

                if (!items.length) {
                    map.setView([13.0605, 80.2425], 13);
                    return;
                }

                var latlngs = [];
                items.forEach(function(it, i) {
                    var icon = markerIcon(it.type, i + 1);
                    var opts = icon ? { icon: icon } : {};
                    var m = L.marker([it.lat, it.lng], opts)
                        .bindPopup('<b>' + it.title + '</b><br>' + it.area + '<br>' + it.time)
                        .addTo(layerGroup);
                    markers.push(m);
                    latlngs.push([it.lat, it.lng]);
                });

                if (latlngs.length > 0) {
                    L.polyline(latlngs, {
                        color: '#3b9bff',
                        weight: 4,
                        opacity: .8,
                        dashArray: '8 6'
                    }).addTo(layerGroup);

                    try {
                        map.fitBounds(latlngs, { padding: [40, 40] });
                    } catch (e) {
                        map.setView(latlngs[0], 13);
                    }
                }

                setTimeout(function() {
                    try {
                        map.invalidateSize();
                        if (markers.length > 0 && markers[0].openPopup) {
                            markers[0].openPopup();
                        }
                    } catch (e) {}
                }, 200);
            } catch (err) {
                console.warn('renderMap warning:', err);
            }
        }

        // ---------- Timeline ----------
        function renderTimeline(user) {
            var items = getTimeline(user);
            document.getElementById('timelineCount').textContent = items.length;
            var ul = document.getElementById('timelineList');

            if (!items.length) {
                ul.innerHTML = '<li class="tl-empty">No activity found for this user.</li>';
                return;
            }

            var html = '';
            items.forEach(function(it, i) {
                var t = TL[it.type] || { icon: 'bi-geo-alt', color: '#3b9bff' };
                html += '<li class="tl-item tl-' + it.type + (i === 0 ? ' active' : '') + '" data-index="' + i + '">' +
                    '<div class="tl-icon"><i class="bi ' + t.icon + '"></i></div>' +
                    '<div class="tl-card">' +
                    '<div class="tl-top"><span class="tl-title">' + it.title + '</span><span class="tl-time">' + it.time + '</span></div>' +
                    '<div class="tl-area"><i class="bi bi-geo-alt"></i> ' + it.area + '</div>' +
                    '<div class="tl-meta">' + it.note + '</div>' +
                    '</div></li>';
            });
            ul.innerHTML = html;
        }

        // ---------- Titles ----------
        function updateTitles(user) {
            var d = currentDate();
            var mapDateEl = document.getElementById('mapDate');
            if (mapDateEl) mapDateEl.textContent = d;
            var nameEl = document.getElementById('mapUserName');
            if (nameEl) nameEl.textContent = user.name;
            var idEl = document.getElementById('mapUserId');
            if (idEl) idEl.textContent = user.id;
        }

        function scrollToMap() {
            var mapSec = document.getElementById('mapSection');
            if (!mapSec) return;
            try {
                mapSec.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } catch (e) {}
            var rect = mapSec.getBoundingClientRect();
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop || 0;
            window.scrollTo({
                top: rect.top + scrollTop - 80,
                behavior: 'smooth'
            });
        }

        function selectUser(id) {
            if (!id) return;
            var u = users.filter(function(x) {
                return String(x.id).trim() === String(id).trim();
            })[0];
            if (!u) return;
            selectedUser = u;
            updateTitles(u);
            renderMap(u);
            renderTimeline(u);
        }

        // ---------- Events ----------
        document.addEventListener('DOMContentLoaded', function() {
            var dateEl = document.getElementById('filter_date');
            if (dateEl && !dateEl.value) {
                dateEl.value = todayDMY();
            }

            initMap();
            selectUser(selectedUser.id);

            // eye / visit button click delegation across pagination & search
            document.addEventListener('click', function(e) {
                var btn = e.target.closest('.btn-view-map');
                if (!btn) return;
                e.preventDefault();
                var id = btn.getAttribute('data-id');
                if (id) {
                    selectUser(id);
                    scrollToMap();
                }
            });

            // timeline click -> focus marker
            document.getElementById('timelineList').addEventListener('click', function(e) {
                var li = e.target.closest('.tl-item');
                if (!li) return;
                var idx = +li.getAttribute('data-index');
                document.querySelectorAll('#timelineList .tl-item').forEach(function(n) {
                    n.classList.remove('active');
                });
                li.classList.add('active');
                if (markers[idx] && map) {
                    map.flyTo(markers[idx].getLatLng(), 15, {
                        duration: .8
                    });
                    markers[idx].openPopup();
                }
            });

            document.getElementById('btnSearch').addEventListener('click', function() {
                selectUser(selectedUser.id);
            });

            document.getElementById('btnReset').addEventListener('click', function() {
                var dateEl = document.getElementById('filter_date');
                if (dateEl) dateEl.value = todayDMY();
                selectUser(users[0].id);
            });
        });
    })();
</script>

<?php include 'footer.php'; ?>