/**
 * Gharuda CRM - Permission Requests Page Script
 * File: assets/js/pages/permission-requests.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// ================================================================
    // EMPLOYEE PERMISSION MODAL — team members oda requests review
    // panni Approve / Reject panna (fullscreen)
    // ================================================================
    (function() {
        'use strict';

        var MONTHS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Team members (approver paakura employees)
        var epEmployees = [{
                emp_id: 40, name: 'Anbarasan', role: 'Developer', avatar: 'profile-2.jpg'
            },
            {
                emp_id: 39, name: 'Shailni Raj', role: 'Branch Manager', avatar: 'profile-3.jpg'
            },
            {
                emp_id: 36, name: 'venkatesanB', role: 'Developer', avatar: 'profile-4.jpg'
            },
            {
                emp_id: 35, name: 'Bhuvaneswari', role: 'Marketing', avatar: 'profile-1.jpg'
            },
            {
                emp_id: 34, name: 'Karthik Raja', role: 'Developer', avatar: 'profile-2.jpg'
            },
            {
                emp_id: 33, name: 'Priya Sharma', role: 'Designer', avatar: 'profile-3.jpg'
            },
            {
                emp_id: 32, name: 'Mohammed Farhan', role: 'Developer', avatar: 'profile-4.jpg'
            },
            {
                emp_id: 31, name: 'Deepa Nair', role: 'HR', avatar: 'profile-1.jpg'
            }
        ];

        var epTypes = ['Late Coming', 'Early Leaving', 'Out Permission', 'Go on business'];
        var epReasons = [
            'Traffic delay due to vehicle breakdown',
            'Family function at home',
            'Bank work - loan document submission',
            'Child school pickup',
            'Train delayed by 45 minutes',
            'Aadhaar update at government office',
            'Eye checkup appointment',
            'Courier pickup at residence',
            'Flat tyre on the way to office',
            'Property document signing'
        ];

        function tmin(s) {
            var m = s.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
            var hh = (parseInt(m[1], 10) % 12) + (m[3].toUpperCase() === 'PM' ? 12 : 0);
            return hh * 60 + parseInt(m[2], 10);
        }

        function durText(mins) {
            var hh = Math.floor(mins / 60),
                mm = mins % 60,
                p = [];
            if (hh) p.push(hh + 'h');
            if (mm || !hh) p.push(mm + 'm');
            return p.join(' ');
        }

        function hhmm12(mins) {
            var h24 = Math.floor(mins / 60),
                mm = mins % 60,
                sfx = h24 >= 12 ? 'PM' : 'AM',
                h12 = h24 % 12;
            if (!h12) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(mm).padStart(2, '0') + ' ' + sfx;
        }

        function epEsc(v) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(String(v)));
            return d.innerHTML;
        }

        // Seeded PRNG — same month ku same dummy data
        var _s = 99;

        function srand(s) { _s = s; }

        function rnd() {
            _s = (_s * 1664525 + 1013904223) & 0x7fffffff;
            return _s / 0x7fffffff;
        }

        function rint(a, b) { return a + Math.floor(rnd() * (b - a + 1)); }

        var epRequests = [];

        function buildEpData() {
            epRequests = [];
            var today = new Date();
            var yr = today.getFullYear(),
                mo = today.getMonth(),
                todayD = today.getDate();
            srand(yr * 100 + mo + 21);

            // 14 team requests — indha month-la, random members
            for (var i = 0; i < 14; i++) {
                var back = rint(0, Math.max(0, todayD - 1));
                var d = todayD - back;
                if (d < 1) continue;
                var emp = epEmployees[rint(0, epEmployees.length - 1)];
                var type = epTypes[rint(0, epTypes.length - 1)];
                var f, t;
                if (type === 'Late Coming') {
                    f = rint(9 * 60 + 40, 11 * 60);
                    t = f + rint(30, 60);
                } else if (type === 'Early Leaving') {
                    t = rint(16 * 60 + 30, 18 * 60);
                    f = t - rint(30, 60);
                } else {
                    f = rint(10 * 60, 14 * 60);
                    t = f + rint(30, 120);
                }
                if (t - f > 120) t = f + 120;
                var sr = rint(1, 100);
                var status = sr <= 55 ? 'Pending' : (sr <= 82 ? 'Approved' : 'Rejected');
                var dayStr = d + ' ' + MONTHS[mo] + ' ' + yr;
                epRequests.push({
                    id: i + 1,
                    emp_id: emp.emp_id, name: emp.name, role: emp.role, avatar: emp.avatar,
                    type: type,
                    date: dayStr,
                    dateKey: yr + '-' + String(mo + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0'),
                    from: hhmm12(f), to: hhmm12(t),
                    totalMin: t - f, total: durText(t - f),
                    reason: epReasons[rint(0, epReasons.length - 1)],
                    status: status,
                    requestedOn: dayStr
                });
            }
            epRequests.sort(function(a, b) { return b.dateKey.localeCompare(a.dateKey); });
        }

        var epTypeMeta = {
            'Late Coming': { icon: 'bi-sunrise', cls: 'type-late' },
            'Early Leaving': { icon: 'bi-sunset', cls: 'type-early' },
            'Out Permission': { icon: 'bi-box-arrow-right', cls: 'type-out' },
            'Go on business': { icon: 'bi-briefcase', cls: 'type-business' }
        };

        // Modal-la PENDING requests mattum dha kaatanum — approve/reject pannadhu
        // list-la irundhu remove aagum, ella mudinja "No permission request" empty state
        function epRender() {
            var tbody = document.getElementById('epPermTbody');
            var list = epRequests.filter(function(r) { return r.status === 'Pending'; });

            if (!list.length) {
                tbody.innerHTML = '<tr><td colspan="10" class="text-center py-5">' +
                    '<div class="perm-empty-state">' +
                    '<div class="empty-icon empty-icon-success"><i class="bi bi-check-circle-fill"></i></div>' +
                    '<div class="empty-title">No permission request</div>' +
                    '<div class="empty-sub">All employee permission requests have been reviewed. Great job!</div>' +
                    '</div></td></tr>';
                return;
            }

            var html = '';
            list.forEach(function(r, i) {
                var tm = epTypeMeta[r.type] || { icon: 'bi-clock', cls: 'type-out' };
                html += '<tr data-id="' + r.id + '">' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td><div class="d-flex align-items-center gap-2"><img src="./assets/img/' + epEsc(r.avatar) + '" class="avatar-sm ep-avatar-size"><div><div class="person-name ep-name-text">' + epEsc(r.name) + '</div><div class="emp-id ep-meta-text">EMP ' + epEsc(r.emp_id) + ' \u00b7 ' + epEsc(r.role) + '</div></div></div></td>' +
                    '<td><span class="perm-type-chip ' + tm.cls + '"><i class="bi ' + tm.icon + '"></i>' + epEsc(r.type) + '</span></td>' +
                    '<td><span class="perm-cell-semibold">' + epEsc(r.date) + '</span></td>' +
                    '<td><span class="perm-cell-semibold">' + epEsc(r.from) + '</span></td>' +
                    '<td><span class="perm-cell-semibold">' + epEsc(r.to) + '</span></td>' +
                    '<td><span class="perm-cell-total">' + epEsc(r.total) + '</span></td>' +
                    '<td><div class="perm-reason-cell" title="' + epEsc(r.reason).replace(/"/g, '&quot;') + '">' + epEsc(r.reason) + '</div></td>' +
                    '<td><span class="perm-cell-muted">' + epEsc(r.requestedOn) + '</span></td>' +
                    '<td>' +
                    '<div class="ep-action-btns"><button type="button" class="btn ep-approve" data-act="approve" data-id="' + r.id + '"><i class="bi bi-check-lg"></i> Approve</button><button type="button" class="btn ep-reject" data-act="reject" data-id="' + r.id + '"><i class="bi bi-x-lg"></i> Reject</button></div>' +
                    '</td></tr>';
            });
            tbody.innerHTML = html;
        }

        function epFlash(row) {
            row.classList.remove('ep-decided-flash');
            void row.offsetWidth;
            row.classList.add('ep-decided-flash');
        }

        var epModalEl = document.getElementById('employeePermModal');

        function updateHeaderBadge() {
            var pending = epRequests.filter(function(r) { return r.status === 'Pending'; }).length;
            var badge = document.getElementById('epBadgeCount');
            if (!badge) return;
            badge.textContent = String(pending);
            badge.style.display = pending > 0 ? 'flex' : 'none';
        }

        // Page load-la badge set — dummy data build panni count edu
        buildEpData();
        updateHeaderBadge();

        epModalEl.addEventListener('show.bs.modal', function() {
            buildEpData();
            updateHeaderBadge();
            epRender();
        });

        // Approve / Reject (delegated)
        document.getElementById('epPermTbody').addEventListener('click', function(e) {
            var btn = e.target.closest('.ep-approve, .ep-reject');
            if (!btn) return;
            var id = parseInt(btn.getAttribute('data-id'), 10);
            var act = btn.getAttribute('data-act');
            var req = epRequests.find(function(r) { return r.id === id; });
            if (!req || req.status !== 'Pending') return;

            req.status = (act === 'approve') ? 'Approved' : 'Rejected';
            updateHeaderBadge();
            epRender();
            // Flash the updated row for feedback (inno still pending render-la irundha)
            var row = document.querySelector('#epPermTbody tr[data-id="' + id + '"]');
            if (row) epFlash(row);
        });
    })();

/* ==========================================================================
   Script Block 2
   ========================================================================== */
(function() {
        'use strict';

        // ================================================================
        // DUMMY DATA — Logged-in employee (Vijai) oda permission requests.
        // CURRENT MONTH base panni dynamic-a generate aagum — page refresh
        // panna ella thadavayum indha month dates (today varai) dha varum.
        // ================================================================
        var MONTHS_SHORT = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var MONTHS_FULL = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        var TODAY_DT = new Date();
        var CUR_YR = TODAY_DT.getFullYear(),
            CUR_MO = TODAY_DT.getMonth();
        var VIEW_YR = CUR_YR,
            VIEW_MO = CUR_MO;

        var REASONS = [
            'Traffic delay due to vehicle breakdown',
            'Family function at home',
            'Bank work - loan document submission',
            'Annual medical checkup',
            'Courier pickup at residence',
            'Child school pickup',
            'Train delayed by 45 minutes',
            'Aadhaar update at government office',
            'Eye checkup appointment',
            'Flat tyre on the way to office',
            'Property document signing',
            'Tenant house visit',
            'Home maintenance work',
            'Medical shop visit'
        ];

        function tmin(s) {
            var m = s.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
            var hh = (parseInt(m[1], 10) % 12) + (m[3].toUpperCase() === 'PM' ? 12 : 0);
            return hh * 60 + parseInt(m[2], 10);
        }

        function durText(mins) {
            var hh = Math.floor(mins / 60),
                mm = mins % 60,
                p = [];
            if (hh) p.push(hh + 'h');
            if (mm || !hh) p.push(mm + 'm');
            return p.join(' ');
        }

        function hhmm12(mins) {
            var h24 = Math.floor(mins / 60),
                mm = mins % 60,
                sfx = h24 >= 12 ? 'PM' : 'AM',
                h12 = h24 % 12;
            if (!h12) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(mm).padStart(2, '0') + ' ' + sfx;
        }

        // Seeded PRNG — past month data stable-a irukkum (same month = same dummy data)
        var _seed = 1;

        function srand(s) { _seed = s; }

        function rnd() {
            _seed = (_seed * 1664525 + 1013904223) & 0x7fffffff;
            return _seed / 0x7fffffff;
        }

        function rint(a, b) { return a + Math.floor(rnd() * (b - a + 1)); }

        function pushRow(rows, yr, mo, d, type, from, to, approver, reason, status) {
            var dayStr = d + ' ' + MONTHS_SHORT[mo] + ' ' + yr;
            var key = yr + '-' + String(mo + 1).padStart(2, '0') + '-' + String(d).padStart(2, '0');
            var total = tmin(to) - tmin(from);
            rows.push({
                id: rows.length + 1,
                emp_id: 41, name: 'Vijai', avatar: 'profile-1.jpg',
                type: type, date: dayStr, dateKey: key,
                from: from, to: to, totalMin: total, total: durText(total),
                approver: approver, reason: reason,
                status: status,
                requestedOn: dayStr, requestedOnKey: key
            });
        }

        function buildMonthData(yr, mo) {
            var rows = [];

            // Current month: fixed configs (today-la irundhu days back)
            if (yr === CUR_YR && mo === CUR_MO) {
                var configs = [
                    [0, 'Late Coming', '09:45 AM', '10:45 AM', 'Manager', 'Traffic delay due to vehicle breakdown', 'Pending'],
                    [1, 'Early Leaving', '04:30 PM', '05:30 PM', 'Team Lead', 'Family function at home', 'Pending'],
                    [2, 'Out Permission', '11:00 AM', '01:00 PM', 'HR', 'Bank work - loan document submission', 'Pending'],
                    [4, 'Late Coming', '10:00 AM', '11:00 AM', 'Manager', 'Annual medical checkup', 'Rejected'],
                    [5, 'Out Permission', '02:00 PM', '03:30 PM', 'Team Lead', 'Courier pickup at residence', 'Approved'],
                    [6, 'Early Leaving', '05:00 PM', '06:00 PM', 'Manager', 'Child school pickup', 'Approved'],
                    [7, 'Late Coming', '09:30 AM', '10:30 AM', 'HR', 'Train delayed by 45 minutes', 'Approved'],
                    [9, 'Out Permission', '12:00 PM', '02:00 PM', 'Manager', 'Aadhaar update at government office', 'Rejected'],
                    [10, 'Early Leaving', '03:30 PM', '05:00 PM', 'Team Lead', 'Eye checkup appointment', 'Approved'],
                    [11, 'Late Coming', '10:15 AM', '11:15 AM', 'Manager', 'Flat tyre on the way to office', 'Approved'],
                    [13, 'Out Permission', '10:00 AM', '11:00 AM', 'HR', 'Property document signing', 'Approved'],
                    [14, 'Early Leaving', '04:00 PM', '05:00 PM', 'Team Lead', 'Tenant house visit', 'Approved']
                ];
                var todayD = TODAY_DT.getDate();
                configs.forEach(function(c) {
                    var d = todayD - c[0];
                    if (d < 1) return; // indha month-la andha date innum vandha illa — skip
                    pushRow(rows, yr, mo, d, c[1], c[2], c[3], c[4], c[5], c[6]);
                });
                return rows;
            }

            // Past months: seeded deterministic dummy data (refresh panna same dha varum)
            srand(yr * 100 + mo + 7);
            var daysInMonth = new Date(yr, mo + 1, 0).getDate();
            for (var d = daysInMonth; d >= 1; d--) {
                var dow = new Date(yr, mo, d).getDay();
                if (dow === 0) continue; // week off
                if (rint(1, 100) > 32) continue; // ~1/3 working days la permission
                var tr = rint(1, 4);
                var type = tr === 1 ? 'Late Coming' : (tr === 2 ? 'Early Leaving' : (tr === 3 ? 'Out Permission' : 'Go on business'));
                var f, t;
                if (type === 'Late Coming') {
                    f = rint(9 * 60 + 40, 11 * 60);
                    t = f + rint(30, 60);
                } else if (type === 'Early Leaving') {
                    t = rint(16 * 60 + 30, 18 * 60);
                    f = t - rint(30, 60);
                } else {
                    f = rint(10 * 60, 14 * 60 + 30);
                    t = f + rint(30, 120);
                }
                if (t - f > 120) t = f + 120; // max 2h
                var sr = rint(1, 100);
                var status = sr <= 68 ? 'Approved' : (sr <= 88 ? 'Rejected' : 'Pending');
                pushRow(rows, yr, mo, d, type, hhmm12(f), hhmm12(t),
                    ['Manager', 'Team Lead', 'HR'][rint(0, 2)], REASONS[rint(0, REASONS.length - 1)], status);
            }
            return rows;
        }

        var permRequests = buildMonthData(CUR_YR, CUR_MO);

        function updateMonthLabel() {
            var el = document.getElementById('permMonthLabel');
            if (el) el.textContent = 'Permission history \u00b7 ' + MONTHS_FULL[VIEW_MO] + ' ' + VIEW_YR;
        }
        updateMonthLabel();

        // Current user (requests are self-applied, same as Apply Leave flow)
        var currentUser = {
            emp_id: 41,
            name: 'Vijai',
            avatar: 'profile-1.jpg'
        };

        var typeMeta = {
            'Late Coming': { icon: 'bi-sunrise', cls: 'type-late' },
            'Early Leaving': { icon: 'bi-sunset', cls: 'type-early' },
            'Out Permission': { icon: 'bi-box-arrow-right', cls: 'type-out' },
            'Go on business': { icon: 'bi-briefcase', cls: 'type-business' }
        };

        var statusMeta = {
            'Pending': { icon: 'bi-hourglass-split', cls: 'pending' },
            'Approved': { icon: 'bi-check-circle-fill', cls: 'approved' },
            'Rejected': { icon: 'bi-x-circle-fill', cls: 'rejected' }
        };

        function esc(v) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(String(v)));
            return d.innerHTML;
        }

        var currentStatusFilter = '';

        function refreshKpis() {
            var pending = 0,
                approved = 0,
                rejected = 0;
            permRequests.forEach(function(r) {
                if (r.status === 'Pending') pending++;
                else if (r.status === 'Approved') approved++;
                else if (r.status === 'Rejected') rejected++;
            });
            document.getElementById('permCountTotal').textContent = String(permRequests.length);
            document.getElementById('permCountPending').textContent = String(pending);
            document.getElementById('permCountApproved').textContent = String(approved);
            document.getElementById('permCountRejected').textContent = String(rejected);
        }

        // Show only rows matching the clicked status block;
        // clicking the active block again resets to all.
        function applyStatusFilter() {
            var list = currentStatusFilter ?
                permRequests.filter(function(r) { return r.status === currentStatusFilter; }) :
                permRequests;
            renderPermissionTable(list);
            document.querySelectorAll('#permStatBlocks .perm-stat-card').forEach(function(card) {
                card.classList.toggle('active', card.getAttribute('data-status') === currentStatusFilter);
            });
        }

        document.querySelectorAll('#permStatBlocks .perm-stat-card').forEach(function(card) {
            card.addEventListener('click', function() {
                var status = card.getAttribute('data-status');
                // Total block = reset to all; status blocks = toggle filter
                currentStatusFilter = status ? ((currentStatusFilter === status) ? '' : status) : '';
                applyStatusFilter();
            });
        });

        // ================================================================
        // MASTER TABLE INIT (same flow as Punch In Report)
        // ================================================================
        var thead = document.getElementById('permTableHead');
        var h = '<th class="gh-cursor-pointer text-nowrap col-sno-70">S.No</th><th class="gh-cursor-pointer text-nowrap">Employee</th><th class="gh-cursor-pointer text-nowrap">Permission Type</th><th class="gh-cursor-pointer text-nowrap">Date</th><th class="gh-cursor-pointer text-nowrap">From Time</th><th class="gh-cursor-pointer text-nowrap">To Time</th><th class="gh-cursor-pointer text-nowrap">Total Hours</th><th class="gh-cursor-pointer text-nowrap">Approved By</th><th class="gh-cursor-pointer text-nowrap">Reason</th><th class="gh-cursor-pointer text-nowrap">Requested On</th><th class="gh-cursor-pointer text-nowrap">Status</th>';
        thead.innerHTML = h;

        function buildRowHtml(row, index) {
            var mType = typeMeta[row.type] || { icon: 'bi-clock', cls: 'type-out' };
            var mStatus = statusMeta[row.status] || { icon: 'bi-clock', cls: 'pending' };

            var html = '<tr data-id="' + esc(row.id) + '">';
            html += '<td class="text-nowrap col-sno-70">' + index + '</td>';
            html += '<td class="text-nowrap">' +
                '<div class="d-flex align-items-center gap-2">' +
                    '<img src="./assets/img/' + esc(row.avatar) + '" class="avatar-sm ep-avatar-size">' +
                    '<div>' +
                        '<div class="person-name">' + esc(row.name) + '</div>' +
                        '<div class="emp-id">' + esc(row.emp_id) + '</div>' +
                    '</div>' +
                '</div>' +
            '</td>';
            html += '<td class="text-nowrap"><span class="perm-type-chip ' + mType.cls + '"><i class="bi ' + mType.icon + '"></i>' + esc(row.type) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-semibold">' + esc(row.date) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-semibold">' + esc(row.from) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-semibold">' + esc(row.to) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-total">' + esc(row.total) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-regular">' + esc(row.approver) + '</span></td>';
            html += '<td><div class="perm-reason-cell" title="' + esc(row.reason).replace(/"/g, '&quot;') + '">' + esc(row.reason) + '</div></td>';
            html += '<td class="text-nowrap"><span class="perm-cell-muted">' + esc(row.requestedOn) + '</span></td>';
            html += '<td class="text-nowrap"><span class="perm-status-badge ' + mStatus.cls + '"><i class="bi ' + mStatus.icon + '"></i>' + esc(row.status) + '</span></td>';
            html += '</tr>';
            return html;
        }

        function renderPermissionTable(list) {
            var dataList = list || permRequests;
            var tbody = document.getElementById('permBody');
            if (!tbody) return;

            if (!dataList.length) {
                tbody.innerHTML = '<tr class="no-record-row"><td colspan="11" class="text-center text-muted py-4">' +
                    '<div class="perm-empty-state">' +
                        '<div class="empty-icon"><i class="bi bi-inbox"></i></div>' +
                        '<div class="empty-title">No permission requests</div>' +
                        '<div class="empty-sub">You have not applied for any permission in this period.</div>' +
                    '</div>' +
                '</td></tr>';
            } else {
                tbody.innerHTML = dataList.map(function(item, i) {
                    return buildRowHtml(item, i + 1);
                }).join('');
            }

            var tableEl = document.getElementById('myReqTable') || document.getElementById('permissionTable');
            if (tableEl) {
                if (tableEl.autoTable) {
                    tableEl.autoTable.refresh();
                } else if (window.AutoMasterTable) {
                    window.AutoMasterTable.init(tableEl);
                }
            }
        }

        renderPermissionTable(permRequests);

        refreshKpis();

        // ================================================================
        // MONTH + YEAR SELECT2 — thani thaniya select panni,
        // Apply button click panna mattum dummy data filter aagum
        // ================================================================
        var monthSelect = document.getElementById('permMonthSelect');
        var yearSelect = document.getElementById('permYearSelect');

        (function populateMonthYearOptions() {
            // Month options — 12 months full name
            for (var m = 0; m < 12; m++) {
                var opt = document.createElement('option');
                opt.value = String(m);
                opt.textContent = MONTHS_FULL[m];
                monthSelect.appendChild(opt);
            }
            // Year options — current year irundhu 2 varsham back
            for (var y = CUR_YR; y >= CUR_YR - 2; y--) {
                var yopt = document.createElement('option');
                yopt.value = String(y);
                yopt.textContent = y;
                yearSelect.appendChild(yopt);
            }
        })();

        function updateMonthNavState() {
            jQuery(monthSelect).val(String(VIEW_MO)).trigger('change.select2');
            jQuery(yearSelect).val(String(VIEW_YR)).trigger('change.select2');
        }

        function switchMonth(yr, mo) {
            VIEW_YR = yr;
            VIEW_MO = mo;
            permRequests = buildMonthData(yr, mo);
            currentStatusFilter = '';
            applyStatusFilter();
            refreshKpis();
            updateMonthLabel();
            updateMonthNavState();
        }

        // Apply click panna mattum dha filter aagum — select maathina udane illa
        document.getElementById('permApplyFilter').addEventListener('click', function() {
            var btnEl = this;
            var mo = parseInt(jQuery(monthSelect).val(), 10);
            var yr = parseInt(jQuery(yearSelect).val(), 10);
            if (isNaN(mo) || isNaN(yr)) return;
            if (mo === VIEW_MO && yr === VIEW_YR) return; // same selection — nothing to do

            // Short loading flash for feedback
            btnEl.disabled = true;
            btnEl.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Loading…';
            setTimeout(function() {
                switchMonth(yr, mo);
                btnEl.disabled = false;
                btnEl.innerHTML = '<i class="bi bi-funnel-fill me-1"></i> Apply';
                // Filter apply aana odane table-ku scroll
                var sc = document.getElementById('permTableScroll');
                if (sc) sc.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 400);
        });

        // ================================================================
        // SELECT2 INIT — month/year picker + modal dropdowns
        // ================================================================
        jQuery(function() {
            var commonOpts = {
                width: '100%',
                minimumResultsForSearch: Infinity
            };
            jQuery(monthSelect).select2(commonOpts);
            jQuery(yearSelect).select2(commonOpts);
            updateMonthNavState();

            jQuery('#permType').select2({
                width: '100%',
                placeholder: 'Select permission type',
                allowClear: true,
                minimumResultsForSearch: Infinity,
                dropdownParent: jQuery('#permissionApplyModal')
            });

            jQuery('#permApprover').select2({
                width: '100%',
                placeholder: 'Select approver',
                allowClear: true,
                dropdownParent: jQuery('#permissionApplyModal')
            });
        });

        // ================================================================
        // APPLY PERMISSION MODAL
        // ================================================================
        var modal = document.getElementById('permissionApplyModal'),
            formWrap = document.getElementById('permFormWrap'),
            resultWrap = document.getElementById('permResult'),
            resultSub = document.getElementById('permResultSub'),
            formFoot = document.getElementById('permFormFoot'),
            resultFoot = document.getElementById('permResultFoot'),
            submitBtn = document.getElementById('permSubmitBtn'),
            dateInput = document.getElementById('permDate'),
            fromTimeInput = document.getElementById('permFromTime'),
            toTimeInput = document.getElementById('permToTime'),
            reasonInput = document.getElementById('permReason'),
            totalText = document.getElementById('permTotalText');

        var MAX_MINUTES = 120; // Permission maximum = 2 hours

        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        function parseTimeToMinutes(str) {
            if (!str) return null;
            var m = str.trim().match(/^(\d{1,2}):(\d{2})$/);
            if (!m) return null;
            var hh = parseInt(m[1], 10),
                min = parseInt(m[2], 10);
            if (hh > 23 || min > 59) return null;
            return hh * 60 + min;
        }

        // '14:30' -> '02:30 PM'
        function to12h(str) {
            var mins = parseTimeToMinutes(str);
            if (mins === null) return '';
            var hh = Math.floor(mins / 60),
                min = mins % 60;
            var sfx = hh >= 12 ? 'PM' : 'AM',
                h12 = hh % 12;
            if (h12 === 0) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(min).padStart(2, '0') + ' ' + sfx;
        }

        function formatDuration(mins) {
            var hh = Math.floor(mins / 60),
                min = mins % 60,
                parts = [];
            if (hh) parts.push(hh + 'h');
            if (min || !hh) parts.push(min + 'm');
            return parts.join(' ');
        }

        // date-picker format dd-mm-yyyy -> '16 Sep 2026'
        function formatDisplayDate(str) {
            var p = (str || '').split('-');
            if (p.length !== 3) return str;
            var mi = parseInt(p[1], 10) - 1;
            return p[0] + ' ' + (monthNames[mi] || p[1]) + ' ' + p[2];
        }

        // Returns duration in minutes or null when invalid; updates the Total display.
        function recalcTotal() {
            var from = parseTimeToMinutes(fromTimeInput.value),
                to = parseTimeToMinutes(toTimeInput.value);

            totalText.classList.remove('is-ok', 'is-over');

            if (from === null || to === null) {
                totalText.innerHTML = '&ndash;';
                return null;
            }

            var diff = to - from;
            if (diff <= 0) {
                totalText.textContent = 'Invalid range';
                totalText.classList.add('is-over');
                return null;
            }

            totalText.textContent = formatDuration(diff);
            totalText.classList.add(diff > MAX_MINUTES ? 'is-over' : 'is-ok');
            return diff;
        }

        [fromTimeInput, toTimeInput].forEach(function(el) {
            el.addEventListener('input', recalcTotal);
            el.addEventListener('change', recalcTotal);
        });

        submitBtn.addEventListener('click', function() {
            var type = jQuery('#permType').val();
            var approver = jQuery('#permApprover').val();
            var totalMinutes = recalcTotal();

            // ---- Inline validation (red borders + per-field messages) ----
            var errors = {};
            if (!dateInput.value) errors.date = true;
            if (!type) errors.type = true;
            if (!fromTimeInput.value || !toTimeInput.value) errors.time = 'Please select both From and To time';
            else if (totalMinutes === null) errors.time = 'To time should be after From time';
            else if (totalMinutes > MAX_MINUTES) errors.time = 'Permission total cannot be more than 2 hours';
            if (!approver) errors.approver = true;
            if (!reasonInput.value.trim() || reasonInput.value.trim().length < 5) errors.reason = true;

            document.querySelectorAll('#permFormWrap .perm-row[data-field]').forEach(function(row) {
                var f = row.getAttribute('data-field');
                row.classList.toggle('has-error', !!errors[f]);
                if (f === 'time' && typeof errors.time === 'string') {
                    document.getElementById('permTimeError').textContent = errors.time;
                }
            });

            if (Object.keys(errors).length) {
                var firstErr = document.querySelector('#permFormWrap .perm-row.has-error');
                if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // ---- Loading state (fake save delay — dummy flow) ----
            submitBtn.classList.add('loading');
            var btn = this;
            setTimeout(function() {
                submitBtn.classList.remove('loading');

                // Pudhu request current month-ku dha — vera month paakumbothu current-ku jump
                if (!(VIEW_YR === CUR_YR && VIEW_MO === CUR_MO)) switchMonth(CUR_YR, CUR_MO);

                // Add as a new Pending row in the table (dummy flow)
                var nextId = permRequests.reduce(function(m, r) {
                    return Math.max(m, r.id);
                }, 0) + 1;
                var now = new Date();
                var todayStr = now.getDate() + ' ' + monthNames[now.getMonth()] + ' ' + now.getFullYear();
                var todayKey = now.getFullYear() + '-' + String(now.getMonth() + 1).padStart(2, '0') + '-' + String(now.getDate()).padStart(2, '0');

                permRequests.unshift({
                    id: nextId,
                    emp_id: currentUser.emp_id,
                    name: currentUser.name,
                    avatar: currentUser.avatar,
                    type: type,
                    date: formatDisplayDate(dateInput.value),
                    dateKey: dateInput.value.split('-').reverse().join('-'),
                    from: to12h(fromTimeInput.value),
                    to: to12h(toTimeInput.value),
                    totalMin: totalMinutes,
                    total: formatDuration(totalMinutes),
                    approver: approver,
                    reason: reasonInput.value.trim(),
                    status: 'Pending',
                    requestedOn: todayStr,
                    requestedOnKey: todayKey
                });
                renderPermissionTable(permRequests);
                refreshKpis();
                // New requests are Pending — jump to the Pending block view
                currentStatusFilter = 'Pending';
                applyStatusFilter();

                // Success step
                formWrap.style.display = 'none';
                formFoot.classList.add('d-none');
                resultWrap.classList.add('show');
                resultFoot.classList.remove('d-none');
                resultSub.textContent = type + ' \u00b7 ' + formatDuration(totalMinutes) + ' request sent to ' + approver + ' for approval.';
            }, 650);
        });

        // Error state live clear — user type panna udane poidum
        [dateInput, reasonInput, fromTimeInput, toTimeInput].forEach(function(el) {
            el.addEventListener('input', function() {
                var row = el.closest('.perm-row[data-field]');
                if (row) row.classList.remove('has-error');
            });
        });
        ['#permType', '#permApprover'].forEach(function(sel) {
            jQuery(document).on('change', sel, function() {
                var row = jQuery(sel).closest('.perm-row[data-field]');
                if (this.value) row.removeClass('has-error');
            });
        });

        // Toggle Advance Payment Section when Permission Type is 'Go on business'
        function getAdvRowTemplate(isFirst) {
            var btnHtml = isFirst ?
                '<button type="button" class="btn btn-adv-add" id="advAddRowBtn" title="Add row"><i class="bi bi-plus-lg"></i></button>' :
                '<button type="button" class="btn btn-adv-remove" title="Remove row"><i class="bi bi-dash-lg"></i></button>';

            return '<div class="adv-pay-row">' +
                '<div class="adv-pay-col">' +
                '<select class="form-select adv-used-to">' +
                '<option value="" disabled selected>Select category</option>' +
                '<option value="Food Reimbursement">Food Reimbursement</option>' +
                '<option value="Travel Expense">Travel Expense</option>' +
                '<option value="Lodging & Hotel">Lodging & Hotel</option>' +
                '<option value="Client Meeting">Client Meeting</option>' +
                '<option value="Fuel Expense">Fuel Expense</option>' +
                '<option value="Other Expenses">Other Expenses</option>' +
                '</select>' +
                '</div>' +
                '<div class="adv-pay-col">' +
                '<input type="number" min="0" step="1" class="form-control adv-amount" placeholder="Enter amount (₹)">' +
                '</div>' +
                '<div class="adv-pay-col-btn">' +
                btnHtml +
                '</div>' +
                '</div>';
        }

        function resetAdvPaySection() {
            var rowsContainer = document.getElementById('advPayRows');
            if (rowsContainer) {
                rowsContainer.innerHTML = getAdvRowTemplate(true);
            }
            var advSec = document.getElementById('advancePaymentSection');
            if (advSec) advSec.style.display = 'none';
        }

        jQuery('#permType').on('change', function() {
            var val = jQuery(this).val();
            if (val === 'Go on business') {
                jQuery('#advancePaymentSection').slideDown(220);
            } else {
                jQuery('#advancePaymentSection').slideUp(200);
            }
        });

        var advRowsContainer = document.getElementById('advPayRows');
        if (advRowsContainer) {
            advRowsContainer.addEventListener('click', function(e) {
                var addBtn = e.target.closest('#advAddRowBtn');
                if (addBtn) {
                    var temp = document.createElement('div');
                    temp.innerHTML = getAdvRowTemplate(false);
                    advRowsContainer.appendChild(temp.firstElementChild);
                    return;
                }
                var removeBtn = e.target.closest('.btn-adv-remove');
                if (removeBtn) {
                    var row = removeBtn.closest('.adv-pay-row');
                    if (row) row.remove();
                }
            });
        }

        // Enter key = submit (textarea avoid)
        modal.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA' && !e.shiftKey &&
                formWrap.style.display !== 'none') {
                e.preventDefault();
                submitBtn.click();
            }
        });

        // Reset to the form step on close
        modal.addEventListener('hidden.bs.modal', function() {
            formWrap.style.display = '';
            formFoot.classList.remove('d-none');
            resultWrap.classList.remove('show');
            resultFoot.classList.add('d-none');
            dateInput.value = '';
            fromTimeInput.value = '';
            toTimeInput.value = '';
            reasonInput.value = '';
            totalText.innerHTML = '&ndash;';
            totalText.classList.remove('is-ok', 'is-over');
            document.querySelectorAll('#permFormWrap .perm-row.has-error').forEach(function(row) {
                row.classList.remove('has-error');
            });
            submitBtn.classList.remove('loading');
            jQuery('#permType').val(null).trigger('change');
            jQuery('#permApprover').val(null).trigger('change');
            resetAdvPaySection();
        });
    })();
