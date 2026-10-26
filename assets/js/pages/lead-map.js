/**
 * Gharuda CRM - Lead Map Page Script
 * File: assets/js/pages/lead-map.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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
            var colors = { login: '#198754', visit: '#0d6efd', idle: '#ffc107', logout: '#dc3545' };
            var c = colors[type] || '#0d6efd';
            return L.divIcon({
                className: '',
                html: '<div style="width:28px;height:28px;border-radius:50%;color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;border:2px solid #fff;box-shadow:0 1px 5px rgba(0,0,0,.5);background:' + c + ';">' + label + '</div>',
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
                ul.innerHTML = '<div class="text-center text-muted p-4 small"><i class="bi bi-inbox fs-3 d-block mb-2"></i>No activity found for this staff member.</div>';
                return;
            }

            var html = '';
            items.forEach(function(it, i) {
                var t = TL[it.type] || { icon: 'bi-geo-alt', color: '#0d6efd' };
                var badgeBg = it.type === 'login' ? 'bg-success' : (it.type === 'logout' ? 'bg-danger' : (it.type === 'idle' ? 'bg-warning text-dark' : 'bg-primary'));
                var activeClass = i === 0 ? ' border-primary bg-primary-subtle' : ' bg-white';
                html += '<div class="list-group-item list-group-item-action border rounded-3 p-2.5 tl-item shadow-sm' + activeClass + '" data-index="' + i + '" role="button">' +
                    '<div class="d-flex align-items-center justify-content-between mb-1">' +
                    '<span class="fw-bold text-dark small d-flex align-items-center gap-2">' +
                    '<span class="badge rounded-circle p-1 text-white ' + badgeBg + ' d-inline-flex align-items-center justify-content-center" style="width:24px;height:24px;">' +
                    '<i class="bi ' + t.icon + '" style="font-size:12px;"></i>' +
                    '</span>' +
                    it.title +
                    '</span>' +
                    '<span class="badge bg-light text-secondary border rounded-pill" style="font-size:10px;">' + it.time + '</span>' +
                    '</div>' +
                    '<div class="small text-muted ps-4 ms-2">' +
                    '<div><i class="bi bi-geo-alt text-secondary"></i> ' + it.area + '</div>' +
                    '<small class="text-muted" style="font-size:11px;">' + it.note + '</small>' +
                    '</div>' +
                    '</div>';
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
                    n.classList.remove('border-primary', 'bg-primary-subtle');
                    n.classList.add('bg-white');
                });
                li.classList.remove('bg-white');
                li.classList.add('border-primary', 'bg-primary-subtle');
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
