/**
 * Gharuda CRM - Punch In Reports Page Script
 * File: assets/js/pages/punch-in-reports.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        // ================================================================
        // DATA (all in JS)
        // ================================================================
        var employees = [{
                id: 1,
                emp_id: 41,
                name: 'Vijai',
                role: 'Developer',
                sub_role: 'OpenSource',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 2,
                emp_id: 40,
                name: 'Anbarasan',
                role: 'Developer',
                sub_role: 'OpenSource',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 3,
                emp_id: 39,
                name: 'Shailni Raj',
                role: 'Branch Manager',
                sub_role: 'Branch Manager',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 4,
                emp_id: 36,
                name: 'venkatesanB',
                role: 'Developer',
                sub_role: 'Windows',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 5,
                emp_id: 35,
                name: 'Bhuvaneswari',
                role: 'Marketing',
                sub_role: 'Marketing Executive',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 6,
                emp_id: 34,
                name: 'Karthik Raja',
                role: 'Developer',
                sub_role: 'Backend',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 7,
                emp_id: 33,
                name: 'Priya Sharma',
                role: 'Designer',
                sub_role: 'UI/UX',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 8,
                emp_id: 32,
                name: 'Mohammed Farhan',
                role: 'Developer',
                sub_role: 'Frontend',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 9,
                emp_id: 31,
                name: 'Deepa Nair',
                role: 'HR',
                sub_role: 'Recruiter',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 10,
                emp_id: 30,
                name: 'Suresh Kumar',
                role: 'Developer',
                sub_role: 'DevOps',
                branch: 'Gharuda IT Park',
                avatar: 'profile-2.jpg'
            },
            {
                id: 11,
                emp_id: 29,
                name: 'Lakshmi Devi',
                role: 'Finance',
                sub_role: 'Accountant',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 12,
                emp_id: 28,
                name: 'Arun Prakash',
                role: 'Developer',
                sub_role: 'Mobile',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 13,
                emp_id: 27,
                name: 'Nithya Selvi',
                role: 'Marketing',
                sub_role: 'Content Writer',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 14,
                emp_id: 26,
                name: 'Rajesh Verma',
                role: 'Developer',
                sub_role: 'Full Stack',
                branch: 'Gharuda IT Park',
                avatar: 'profile-2.jpg'
            },
            {
                id: 15,
                emp_id: 25,
                name: 'Divya Prakash',
                role: 'HR',
                sub_role: 'HR Manager',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 16,
                emp_id: 24,
                name: 'Vignesh T',
                role: 'Developer',
                sub_role: 'QA',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 17,
                emp_id: 23,
                name: 'Meena Kumari',
                role: 'Admin',
                sub_role: 'Office Admin',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 18,
                emp_id: 22,
                name: 'Senthil Nathan',
                role: 'Developer',
                sub_role: 'ML Engineer',
                branch: 'Gharuda IT Park',
                avatar: 'profile-2.jpg'
            },
            {
                id: 19,
                emp_id: 21,
                name: 'Harini R',
                role: 'Designer',
                sub_role: 'Graphic Design',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 20,
                emp_id: 20,
                name: 'Kiran Patel',
                role: 'Developer',
                sub_role: 'Cloud',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 21,
                emp_id: 19,
                name: 'Swathi Reddy',
                role: 'Marketing',
                sub_role: 'Digital Marketing',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 22,
                emp_id: 18,
                name: 'Mohan Raj',
                role: 'Developer',
                sub_role: 'Java',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 23,
                emp_id: 17,
                name: 'Anitha J',
                role: 'Finance',
                sub_role: 'Payroll Officer',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 24,
                emp_id: 16,
                name: 'Prabhu K',
                role: 'Developer',
                sub_role: 'Python',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 25,
                emp_id: 15,
                name: 'Revathi M',
                role: 'HR',
                sub_role: 'Payroll',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 26,
                emp_id: 14,
                name: 'Thirunavukkarasu',
                role: 'Developer',
                sub_role: 'React',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 27,
                emp_id: 13,
                name: 'Kavitha B',
                role: 'Admin',
                sub_role: 'Facilities',
                branch: 'Gharuda Infotech',
                avatar: 'profile-3.jpg'
            },
            {
                id: 28,
                emp_id: 12,
                name: 'Yuvaraj S',
                role: 'Developer',
                sub_role: 'Node.js',
                branch: 'Gharuda IT Park',
                avatar: 'profile-4.jpg'
            },
            {
                id: 29,
                emp_id: 11,
                name: 'Sabari Ganesh',
                role: 'Designer',
                sub_role: 'Motion Design',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 30,
                emp_id: 10,
                name: 'Geetha Lakshmi',
                role: 'Finance',
                sub_role: 'Auditor',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 31,
                emp_id: 9,
                name: 'Ravi Shankar',
                role: 'Developer',
                sub_role: 'Angular',
                branch: 'Gharuda IT Park',
                avatar: 'profile-3.jpg'
            },
            {
                id: 32,
                emp_id: 8,
                name: 'Pooja Verma',
                role: 'Marketing',
                sub_role: 'SEO Specialist',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 33,
                emp_id: 7,
                name: 'Manikandan R',
                role: 'Developer',
                sub_role: 'Flutter',
                branch: 'Gharuda Infotech',
                avatar: 'profile-1.jpg'
            },
            {
                id: 34,
                emp_id: 6,
                name: 'Sunitha Devi',
                role: 'HR',
                sub_role: 'Training',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            },
            {
                id: 35,
                emp_id: 5,
                name: 'Balaji Venkat',
                role: 'Developer',
                sub_role: 'C++',
                branch: 'Gharuda IT Park',
                avatar: 'profile-3.jpg'
            },
            {
                id: 36,
                emp_id: 4,
                name: 'Aparna Rajan',
                role: 'Designer',
                sub_role: 'Product Design',
                branch: 'Gharuda Infotech',
                avatar: 'profile-4.jpg'
            },
            {
                id: 37,
                emp_id: 3,
                name: 'Gokul Krishna',
                role: 'Developer',
                sub_role: 'Spring Boot',
                branch: 'Gharuda IT Park',
                avatar: 'profile-1.jpg'
            },
            {
                id: 38,
                emp_id: 2,
                name: 'Nandhini K',
                role: 'Finance',
                sub_role: 'Billing',
                branch: 'Gharuda Infotech',
                avatar: 'profile-2.jpg'
            }
        ];
        var branches = ['Gharuda Infotech', 'Gharuda IT Park'];

        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        function makeDate(y, m, d) {
            return new Date(y, m - 1, d);
        }

        function fmtDateParts(s) {
            var p = s.split('-');
            return {
                y: +p[0],
                m: +p[1],
                d: +p[2]
            };
        }

        function fmtDateKey(dt) {
            return dt.getFullYear() + '-' + String(dt.getMonth() + 1).padStart(2, '0') + '-' + String(dt.getDate()).padStart(2, '0');
        }

        function dateRange(f, t) {
            var a = fmtDateParts(f),
                b = fmtDateParts(t),
                c = makeDate(a.y, a.y, a.d),
                e = makeDate(b.y, b.m, b.d),
                r = [];
            c = makeDate(a.y, a.m, a.d);
            while (c <= e) {
                r.push(fmtDateKey(c));
                c.setDate(c.getDate() + 1);
            }
            return r;
        }

        function formatDateHeader(s) {
            var p = fmtDateParts(s),
                dt = makeDate(p.y, p.m, p.d);
            return {
                date: p.d + '-' + String(p.m).padStart(2, '0') + '-' + p.y,
                full: p.d + ' ' + monthNames[dt.getMonth()] + ' ' + p.y,
                day: dayNames[dt.getDay()]
            };
        }

        // Punch generator
        var _seed = 42;

        function srand() {
            _seed = (_seed * 1664525 + 1013904223) & 0x7fffffff;
            return _seed / 0x7fffffff;
        }

        function randInt(a, b) {
            return a + Math.floor(srand() * (b - a + 1));
        }

        function randTime(h1, m1, h2, m2) {
            var h = randInt(h1, h2),
                m = (h === h1 && h === h2) ? randInt(m1, m2) : randInt(0, 59);
            var sfx = h >= 12 ? 'PM' : 'AM',
                h12 = h % 12;
            if (h12 === 0) h12 = 12;
            return String(h12).padStart(2, '0') + ':' + String(m).padStart(2, '0') + ' ' + sfx;
        }

        function generatePunchData() {
            var data = {};
            employees.forEach(function(emp) {
                var ps = {},
                    d = makeDate(2026, 8, 1),
                    end = makeDate(2026, 8, 31);
                while (d <= end) {
                    var key = fmtDateKey(d),
                        dow = d.getDay();
                    if (dow === 0) {
                        ps[key] = [];
                        d.setDate(d.getDate() + 1);
                        continue;
                    }
                    if (dow === 6 && emp.id % 3 === 0) {
                        ps[key] = [];
                        d.setDate(d.getDate() + 1);
                        continue;
                    }
                    var shift = 'general',
                        sr = emp.sub_role.toLowerCase();
                    if (sr.indexOf('marketing') >= 0 || sr.indexOf('content') >= 0 || sr.indexOf('graphic') >= 0 || sr.indexOf('seo') >= 0 || sr.indexOf('social') >= 0 || sr.indexOf('motion') >= 0 || sr.indexOf('brand') >= 0) shift = 'morning';
                    else if (sr.indexOf('devops') >= 0 || sr.indexOf('ml') >= 0 || sr.indexOf('cloud') >= 0 || sr.indexOf('angular') >= 0 || sr.indexOf('node') >= 0 || sr.indexOf('go') >= 0 || sr.indexOf('rust') >= 0 || sr.indexOf('ios') >= 0 || sr.indexOf('typescript') >= 0 || sr.indexOf('python') >= 0 || emp.branch === 'Gharuda IT Park') shift = 'evening';
                    if (randInt(1, 100) <= 10) {
                        ps[key] = [];
                        d.setDate(d.getDate() + 1);
                        continue;
                    }
                    var arr = [];
                    if (shift === 'morning') {
                        arr.push({
                            time: randTime(5, 50, 6, 20)
                        });
                        arr.push({
                            time: randTime(13, 45, 14, 15)
                        });
                        if (randInt(1, 100) <= 5) arr.splice(1, 0, {
                            time: randTime(10, 0, 12, 0),
                            warn: true
                        });
                    } else if (shift === 'evening') {
                        arr.push({
                            time: randTime(13, 45, 14, 15)
                        });
                        arr.push({
                            time: randTime(21, 45, 22, 15)
                        });
                        if (randInt(1, 100) <= 5) arr.splice(1, 0, {
                            time: randTime(17, 0, 19, 0),
                            warn: true
                        });
                    } else {
                        arr.push({
                            time: randTime(9, 15, 9, 45)
                        });
                        arr.push({
                            time: randTime(18, 15, 18, 45)
                        });
                        if (randInt(1, 100) <= 8) {
                            arr.splice(1, 0, {
                                time: randTime(12, 30, 13, 0)
                            });
                            arr.splice(2, 0, {
                                time: randTime(13, 15, 13, 45)
                            });
                        }
                        if (randInt(1, 100) <= 4) arr.splice(1, 0, {
                            time: randTime(15, 0, 17, 0),
                            warn: true
                        });
                    }
                    ps[key] = arr;
                    d.setDate(d.getDate() + 1);
                }
                data[emp.id] = ps;
            });
            return data;
        }
        var punchData = generatePunchData();

        // Override emp 1-3 with exact image data
        punchData[1] = {};
        '2026-08-01 01:05PM 01:32PM 07:08PM|2026-08-03 01:02PM 01:35PM 07:10PM|2026-08-04 01:08PM 01:30PM 07:05PM|2026-08-05 01:00PM 01:38PM 07:12PM|2026-08-06 01:10PM 01:33PM 07:08PM|2026-08-07 01:06PM 01:36PM 07:15PM|2026-08-08 01:03PM 01:31PM 07:09PM|2026-08-10 01:07PM 01:34PM 07:11PM|2026-08-11 01:01PM 01:37PM 07:06PM|2026-08-12 01:09PM 01:32PM 07:13PM|2026-08-13 01:04PM 01:35PM 07:07PM|2026-08-14 01:06PM 01:30PM 07:10PM|2026-08-17 01:03PM 01:36PM 07:12PM|2026-08-18 01:08PM 01:31PM 07:09PM|2026-08-19 01:05PM 01:33PM 07:08PM|2026-08-20 07:05PM 07:12PM|2026-08-21 01:04PM 01:35PM 07:08PM|2026-08-24 01:02PM 01:39PM 07:08PM|2026-08-25 01:05PM 01:39PM 07:10PM|2026-08-26 01:05PM 01:33PM 07:12PM|2026-08-27 01:04PM 01:37PM 07:13PM|2026-08-28 01:06PM 01:32PM 07:11PM|2026-08-29 01:03PM 01:34PM 07:09PM|2026-08-31 01:07PM 01:30PM 07:14PM'.split('|').forEach(function(s) {
            var p = s.split(' '),
                k = p[0],
                a = [];
            for (var i = 1; i < p.length; i++) a.push({
                time: p[i]
            });
            punchData[1][k] = a;
        });
        punchData[2] = {};
        '2026-08-01 09:55AM 07:02PM|2026-08-03 09:48AM 07:05PM|2026-08-04 09:52AM 07:08PM|2026-08-05 09:50AM 07:00PM|2026-08-06 09:58AM 07:03PM|2026-08-07 09:45AM 07:10PM|2026-08-08 09:53AM 07:06PM|2026-08-10 09:51AM 07:04PM|2026-08-11 09:47AM 07:09PM|2026-08-12 09:56AM 07:01PM|2026-08-13 09:49AM 07:07PM|2026-08-14 09:54AM 07:05PM|2026-08-17 09:50AM 07:08PM|2026-08-18 09:46AM 07:02PM|2026-08-19 09:52AM 07:06PM|2026-08-20 07:02PM 07:12PM|2026-08-21 09:50AM 07:09PM|2026-08-24 09:53AM 07:08PM|2026-08-25 09:54AM 01:05PM 01:29PM 07:20PM|2026-08-26 09:50AM 01:07PM 01:36PM 07:33PM|2026-08-28 09:51AM 07:05PM|2026-08-29 09:48AM 07:03PM|2026-08-31 09:55AM 07:07PM'.split('|').forEach(function(s) {
            var p = s.split(' '),
                k = p[0],
                a = [];
            for (var i = 1; i < p.length; i++) a.push({
                time: p[i]
            });
            punchData[2][k] = a;
        });
        punchData[3] = {};
        '2026-08-01 10:05AM 06:50PM|2026-08-03 10:02AM 06:55PM|2026-08-04 09:58AM 06:48PM|2026-08-05 10:08AM 06:52PM|2026-08-06 10:00AM 06:45PM|2026-08-07 09:55AM 06:58PM|2026-08-08 10:03AM 06:50PM|2026-08-10 10:01AM 06:53PM|2026-08-11 09:57AM 06:47PM|2026-08-12 10:06AM 06:55PM|2026-08-13 09:59AM 06:50PM|2026-08-14 10:04AM 06:52PM|2026-08-17 10:00AM 06:48PM|2026-08-18 09:56AM 06:55PM|2026-08-19 10:02AM 06:50PM|2026-08-20 09:52AM 03:53PM* 07:06PM|2026-08-21 10:01AM 10:03AM|2026-08-22 11:05AM 04:16PM|2026-08-24 10:03AM 06:56PM|2026-08-25 10:26AM 06:47PM|2026-08-26 10:05AM 06:55PM|2026-08-27 10:06AM 01:42PM|2026-08-28 10:00AM 06:50PM|2026-08-29 09:58AM 06:53PM|2026-08-31 10:04AM 06:48PM'.split('|').forEach(function(s) {
            var p = s.split(' '),
                k = p[0],
                a = [];
            for (var i = 1; i < p.length; i++) {
                if (p[i].indexOf('*') >= 0) a.push({
                    time: p[i].replace('*', ''),
                    warn: true
                });
                else a.push({
                    time: p[i]
                });
            }
            punchData[3][k] = a;
        });

        // Populate branch dropdown
        var branchSelect = document.getElementById('filterBranch');
        branches.forEach(function(b) {
            var o = document.createElement('option');
            o.value = b;
            o.textContent = b;
            branchSelect.appendChild(o);
        });

        // ================================================================
        // STATE
        // ================================================================
        var dates = dateRange('2026-08-01', '2026-08-31');
        var tbody = document.getElementById('pgBody'),
            thead = document.getElementById('punchTableHead');
        var showSelect = document.getElementById('mtShowEntries'),
            pgList = document.getElementById('pgList');
        var pgStart = document.getElementById('mtStart'),
            pgEnd = document.getElementById('mtEnd'),
            pgTotal = document.getElementById('mtTotal');
        var tableWrap = document.getElementById('punchReportTableWrap');
        var currentPage = 1,
            activeFilters = {
                branch: '',
                search: ''
            };

        function esc(v) {
            var d = document.createElement('div');
            d.appendChild(document.createTextNode(String(v)));
            return d.innerHTML;
        }

        // ================================================================
        // MASTER TABLE INIT
        // ================================================================
        var thead = document.getElementById('punchTableHead');
        var h = '<th class="gh-cursor-pointer text-nowrap col-sno-70">S.No</th><th class="gh-cursor-pointer text-nowrap">Employee</th><th class="gh-cursor-pointer text-nowrap">Roles</th>';
        
        var cols = [
            {
                field: 'employee', title: 'Employee', sortable: false,
                render: function(val, row) {
                    return '<div class="d-flex align-items-center gap-2"><img src="./assets/img/' + esc(row.avatar) + '" class="avatar-sm avatar-34"><div><div class="person-name">' + esc(row.name) + '</div><div class="emp-id">' + esc(row.emp_id) + '</div></div></div>';
                }
            },
            {
                field: 'roles', title: 'Roles', sortable: false,
                render: function(val, row) {
                    return '<div><div class="fw-semibold role-name">' + esc(row.role) + '</div><div class="sub-role-name">' + esc(row.sub_role) + '</div></div>';
                }
            }
        ];

        dates.forEach(function(d) {
            var hdr = formatDateHeader(d);
            h += '<th class="date-col-header"><div class="date-label">' + esc(hdr.full) + '</div><div class="day-label">' + esc(hdr.day) + '</div></th>';
            cols.push({
                field: 'date_' + d,
                title: hdr.full + ' ' + hdr.day.substring(0, 3),
                sortable: false,
                render: function(val, row) {
                    var p = punchData[row.id] || {}, ps = p[d] || [];
                    if (!ps.length) {
                        return '<div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '"><span class="no-punch">&mdash;</span></div>';
                    }
                    var t = '';
                    ps.forEach(function(x) {
                        t += '<span class="punch-time">' + esc(x.time) + '</span>';
                        if (x.warn) t += ' <span class="punch-warn" title="Irregular">&#9888;</span>';
                    });
                    return '<div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '">' + t + '</div>';
                }
            });
        });
        thead.innerHTML = h;

        function buildRowHtml(row, index) {
            var html = '<tr data-id="' + esc(row.id) + '">';
            html += '<td class="text-nowrap col-sno-70">' + index + '</td>';
            html += '<td class="text-nowrap">' +
                '<div class="d-flex align-items-center gap-2">' +
                    '<img src="./assets/img/' + esc(row.avatar) + '" class="avatar-sm avatar-34">' +
                    '<div>' +
                        '<div class="person-name">' + esc(row.name) + '</div>' +
                        '<div class="emp-id">' + esc(row.emp_id) + '</div>' +
                    '</div>' +
                '</div>' +
            '</td>';
            html += '<td class="text-nowrap">' +
                '<div>' +
                    '<div class="fw-semibold role-name">' + esc(row.role) + '</div>' +
                    '<div class="sub-role-name">' + esc(row.sub_role) + '</div>' +
                '</div>' +
            '</td>';

            dates.forEach(function(d) {
                var p = punchData[row.id] || {}, ps = p[d] || [];
                if (!ps.length) {
                    html += '<td><div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '"><span class="no-punch">&mdash;</span></div></td>';
                } else {
                    var t = '';
                    ps.forEach(function(x) {
                        t += '<span class="punch-time">' + esc(x.time) + '</span>';
                        if (x.warn) t += ' <span class="punch-warn" title="Irregular">&#9888;</span>';
                    });
                    html += '<td><div class="punch-cell" data-emp="' + row.id + '" data-date="' + d + '">' + t + '</div></td>';
                }
            });

            html += '</tr>';
            return html;
        }

        function renderPunchTable(list) {
            var dataList = list || employees;
            if (!dataList.length) {
                tbody.innerHTML = '<tr class="no-record-row"><td colspan="' + (3 + dates.length) + '" class="text-center text-muted py-4">No records found</td></tr>';
            } else {
                tbody.innerHTML = dataList.map(function(emp, i) {
                    return buildRowHtml(emp, i + 1);
                }).join('');
            }

            var tableEl = document.getElementById('myReqTable') || document.getElementById('punchReportTable');
            if (tableEl) {
                if (tableEl.autoTable) {
                    tableEl.autoTable.refresh();
                } else if (window.AutoMasterTable) {
                    window.AutoMasterTable.init(tableEl);
                }
            }
        }

        renderPunchTable(employees);

        document.getElementById('pgBody').addEventListener('click', function(e) {
            var cell = e.target.closest('.punch-cell');
            if (cell) {
                var empId = parseInt(cell.getAttribute('data-emp'), 10);
                var dateStr = cell.getAttribute('data-date');
                if (empId) openAttendanceLog(empId, dateStr);
            }
        });

        // Branch filter
        document.getElementById('searchBtn').addEventListener('click', function() {
            var bv = document.getElementById('filterBranch').value;
            activeFilters.branch = bv;
            
            var list = document.getElementById('activeFiltersList'),
                bar = document.getElementById('activeFiltersBar');
            list.innerHTML = '';
            
            if (bv) {
                var ch = document.createElement('span');
                ch.className = 'filter-chip';
                ch.innerHTML = '<span class="chip-key">Branch:</span> ' + esc(bv) + ' <button type="button" class="chip-close">&times;</button>';
                ch.querySelector('.chip-close').addEventListener('click', function() {
                    document.getElementById('filterBranch').value = '';
                    activeFilters.branch = '';
                    ch.classList.add('removing');
                    setTimeout(function() {
                        ch.remove();
                        if (!list.children.length) bar.classList.remove('show');
                        renderPunchTable(employees);
                    }, 220);
                });
                list.appendChild(ch);
                bar.classList.add('show');
                
                var filtered = employees.filter(function(e) { return e.branch === bv; });
                renderPunchTable(filtered);
            } else {
                bar.classList.remove('show');
                renderPunchTable(employees);
            }
        });

        document.getElementById('activeFiltersClearAll').addEventListener('click', function() {
            document.getElementById('filterBranch').value = '';
            activeFilters.branch = '';
            document.getElementById('activeFiltersList').innerHTML = '';
            document.getElementById('activeFiltersBar').classList.remove('show');
            var searchInput = document.querySelector('.mt-search-input');
            if (searchInput) {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('input'));
            }
            renderPunchTable(employees);
        });

        // ================================================================
        // ATTENDANCE LOG OFFCANVAS  (common refresh-animation fix — FINAL)
        // ================================================================
        var alOffcanvasEl = document.getElementById('attendanceLogOffcanvas');

        // alReqSeq prevents a mid-hide `hidden.bs.offcanvas` handler from
        // wiping fresher data that was populated while the hide was still animating.
        var alReqSeq = 0;

        // Get Bootstrap's SINGLETON offcanvas instance — never new-up another.
        // Bootstrap stores instances on the element; this avoids stale references.
        function getAlInstance() {
            if (!alOffcanvasEl) return null;
            return bootstrap.Offcanvas.getOrCreateInstance(alOffcanvasEl);
        }

        // ----------------------------------------------------------------
        // Delegated handlers: bound ONCE. No leak, no re-attaches.
        // ----------------------------------------------------------------
        if (alOffcanvasEl) {
            var alBody = document.getElementById('alBody');

            /* Context for Add Punch modal */
            var apCurrentEmpId = null;
            var apCurrentDate = null;
            var apEditMode = false;
            var apEditIndex = -1;

            alBody.addEventListener('click', function(e) {
                var toggleBtn = e.target.closest('.al-punch-more[data-action="toggle"]');
                if (toggleBtn) {
                    e.stopPropagation();
                    var dd = toggleBtn.nextElementSibling;
                    alBody.querySelectorAll('.al-punch-dropdown.show').forEach(function(d) {
                        if (d !== dd) d.classList.remove('show');
                    });
                    if (dd) dd.classList.toggle('show');
                    return;
                }

                /* Add Punch button click -> open modal */
                var addPunchBtn = e.target.closest('.al-add-punch');
                if (addPunchBtn) {
                    e.stopPropagation();
                    apEditMode = false;
                    apEditIndex = -1;
                    openAddPunchModal();
                    return;
                }

                /* Edit punch from three-dot dropdown */
                var editBtn = e.target.closest('.al-punch-dropdown-item[data-action="edit"]');
                if (editBtn) {
                    e.stopPropagation();
                    editBtn.closest('.al-punch-dropdown').classList.remove('show');
                    /* Find the punch row and its index */
                    var punchRow = editBtn.closest('.al-punch-row');
                    if (punchRow) {
                        var punchRows = alBody.querySelectorAll('.al-punch-row');
                        var idx = Array.from(punchRows).indexOf(punchRow);
                        if (idx >= 0) {
                            apEditMode = true;
                            apEditIndex = idx;
                            openAddPunchModal();
                        }
                    }
                    return;
                }

                if (!e.target.closest('.al-punch-dropdown')) {
                    alBody.querySelectorAll('.al-punch-dropdown.show').forEach(function(d) {
                        d.classList.remove('show');
                    });
                }
            });

            function openAddPunchModal() {
                var emp = employees.find(function(e) { return e.id === apCurrentEmpId; });
                if (!emp) return;
                var hdr = apCurrentDate ? formatDateHeader(apCurrentDate) : { full: '—' };
                document.getElementById('apDate').textContent = hdr.full;
                document.getElementById('apAvatar').src = './assets/img/' + (emp.avatar || 'profile-1.jpg');
                if (apEditMode) {
                    document.querySelector('#addPunchModal .ap-header .name').textContent = 'Edit Punch';
                    document.querySelector('#addPunchModal .ap-header .sub').innerHTML = '<span>Edit Punch</span>';
                } else {
                    document.querySelector('#addPunchModal .ap-header .name').textContent = emp.name;
                    document.querySelector('#addPunchModal .ap-header .sub').innerHTML = '<span>' + emp.emp_id + '</span> &middot; <span>' + emp.role + '</span>';
                }
                /* Reset to In type */
                document.getElementById('apPunchIn').checked = true;
                document.getElementById('apInTimeRow').classList.remove('ap-out-row-hidden');
                document.getElementById('apOutTimeRow').classList.add('ap-out-row-hidden');
                /* Edit mode: pre-fill with existing punch time */
                if (apEditMode && apEditIndex >= 0) {
                    var ps = (punchData[apCurrentEmpId] || {})[apCurrentDate] || [];
                    var punch = ps[apEditIndex];
                    if (punch) {
                        document.getElementById('apInTime').value = punch.time;
                    }
                } else {
                    document.getElementById('apInTime').value = '09:00 AM';
                    document.getElementById('apOutTime').value = '06:00 PM';
                }
                /* Init time pickers (created after DOMContentLoaded) */
                document.querySelectorAll('#addPunchModal .time-picker').forEach(function(tp) {
                    if (!tp._timePickerInit) initTimePicker(tp);
                });
                var modalEl = document.getElementById('addPunchModal');
                var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
                modal.show();
            }

            /* Reset edit mode when modal is closed (cancel, X, or backdrop) */
            document.getElementById('addPunchModal').addEventListener('hidden.bs.modal', function() {
                apEditMode = false;
                apEditIndex = -1;
            });

            /* In / Out toggle handler */
            document.querySelectorAll('input[name="apPunchType"]').forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var isIn = this.value === 'in';
                    document.getElementById('apInTimeRow').classList.toggle('ap-out-row-hidden', !isIn);
                    document.getElementById('apOutTimeRow').classList.toggle('ap-out-row-hidden', isIn);
                });
            });

            /* Preset time buttons */
            document.querySelectorAll('.ap-preset').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var targetId = this.getAttribute('data-target');
                    var timeVal = this.getAttribute('data-time');
                    var input = document.getElementById(targetId);
                    if (input) {
                        input.value = timeVal;
                        input.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                });
            });

            /* Save punch button */
            document.getElementById('apSaveBtn').addEventListener('click', function() {
                var isIn = document.getElementById('apPunchIn').checked;
                var time = isIn ? document.getElementById('apInTime').value : document.getElementById('apOutTime').value;
                if (!apCurrentEmpId || !apCurrentDate || !time) return;
                /* Time is already in 'HH:MM AM/PM' format from the TimePicker */
                var displayTime = time.trim();
                if (!displayTime) return;
                /* Add to punchData */
                if (!punchData[apCurrentEmpId]) punchData[apCurrentEmpId] = {};
                if (!punchData[apCurrentEmpId][apCurrentDate]) punchData[apCurrentEmpId][apCurrentDate] = [];
                var ps = punchData[apCurrentEmpId][apCurrentDate];
                if (apEditMode && apEditIndex >= 0 && apEditIndex < ps.length) {
                    /* Edit mode: update existing punch */
                    ps[apEditIndex].time = displayTime;
                } else {
                    /* Add mode: add new punch */
                    if (isIn) {
                        ps.unshift({ time: displayTime });
                    } else {
                        ps.push({ time: displayTime });
                    }
                }
                /* Show saved state */
                this.classList.add('ap-saved');
                var self = this;
                setTimeout(function() {
                    self.classList.remove('ap-saved');
                    bootstrap.Modal.getInstance(document.getElementById('addPunchModal')).hide();
                    /* Reset edit mode */
                    apEditMode = false;
                    apEditIndex = -1;
                    /* Refresh the offcanvas */
                    openAttendanceLog(apCurrentEmpId, apCurrentDate);
                }, 800);
            });

            // shown.bs.offcanvas: after slide-in fully complete. We keep as future hook
            // (al-once is now added BEFORE show() — see openAttendanceLog)
            // alOffcanvasEl.addEventListener('shown.bs.offcanvas', function() {});

            // Before slide-out starts: strip .al-once so no animation state lingers.
            alOffcanvasEl.addEventListener('hide.bs.offcanvas', function() {
                alOffcanvasEl.classList.remove('al-once');
            });

            // hidden fires AFTER slide-out finishes. If NO newer request has
            // populated alBody since the hide started, it is safe to clear.
            alOffcanvasEl.addEventListener('hidden.bs.offcanvas', function() {
                var stamped = parseInt(alBody.getAttribute('data-req-seq') || '0', 10);
                if (stamped === alReqSeq) {
                    // SAFE clear — no newer populate ran while hiding
                    alBody.classList.remove('al-loading');
                    alBody.innerHTML = '';
                    alBody.removeAttribute('data-req-seq');
                }
                // Always sweep stale Bootstrap transition classes here.
                // This is the "anti double-refresh" safety net: next open()
                // starts 100% clean of showing/show/hiding/backdrop leftovers.
                alOffcanvasEl.classList.remove('showing', 'hiding', 'al-once');
                alOffcanvasEl.style.visibility = '';
            });
        }

        // Synchronous body populate. NO setTimeout, NO rAF wrappers on content.
        // CRITICAL: strips .al-once BEFORE touching innerHTML so the global
        // fadeSlideUp animation in app.css never replays on repopulate.
        // (If we're doing a fresh open, caller will re-ADD al-once AFTER set + BEFORE show().)
        function setAlBodyHtml(html) {
            var body = document.getElementById('alBody');
            if (!body) return;

            // Kill animation permission BEFORE innerHTML set.
            // Once al-once is removed, our CSS override forces:
            //   animation: none !important; opacity: 1 !important; transform: none !important;
            // So swap is instant and invisible. No "again animation refresh".
            if (alOffcanvasEl) alOffcanvasEl.classList.remove('al-once');

            body.classList.remove('al-loading');
            body.innerHTML = html;
            body.setAttribute('data-req-seq', String(alReqSeq));
        }

        function computeBreakTime(outTime, inTime) {
            // Parse times and compute difference
            function parseT(t) {
                var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                if (!m) return null;
                var h = parseInt(m[1], 10),
                    mn = parseInt(m[2], 10),
                    ap = m[3].toUpperCase();
                if (ap === 'PM' && h !== 12) h += 12;
                if (ap === 'AM' && h === 12) h = 0;
                return h * 60 + mn;
            }
            var o = parseT(outTime),
                i = parseT(inTime);
            if (o === null || i === null) return null;
            var diff = i - o;
            if (diff < 0) diff += 24 * 60;
            var bh = Math.floor(diff / 60),
                bm = diff % 60;
            return String(bh).padStart(2, '0') + 'h ' + String(bm).padStart(2, '0') + 'm';
        }

        function getStatusBadge(empId, dateStr) {
            var p = punchData[empId] || {};
            var ps = p[dateStr] || [];
            var dt = new Date(dateStr + 'T00:00:00');
            var dow = dt.getDay();
            if (dow === 0 || (dow === 6 && empId % 3 === 0)) return {
                cls: 'weekoff',
                text: 'Week Off'
            };
            if (ps.length === 0) return {
                cls: 'absent',
                text: 'Absent'
            };
            // Determine status based on punch count and times
            if (ps.length === 2) {
                // Check if total hours < 5 => half day
                var inT = ps[0].time,
                    outT = ps[1].time;

                function parseM(t) {
                    var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                    if (!m) return 0;
                    var h = parseInt(m[1], 10),
                        mn = parseInt(m[2]),
                        ap = m[3].toUpperCase();
                    if (ap === 'PM' && h !== 12) h += 12;
                    if (ap === 'AM' && h === 12) h = 0;
                    return h * 60 + mn;
                }
                var diff = parseM(outT) - parseM(inT);
                if (diff < 0) diff += 1440;
                if (diff < 360) return {
                    cls: 'half-day',
                    text: 'Half Day'
                };
            }
            return {
                cls: 'full-day',
                text: 'Full Day'
            };
        }

        function openAttendanceLog(empId, dateStr) {
            /* Store context for Add Punch modal */
            apCurrentEmpId = empId;
            apCurrentDate = dateStr;
            var emp = employees.find(function(e) {
                return e.id === empId;
            });
            if (!emp) return;
            var p = punchData[empId] || {};

            document.getElementById('alTitle').textContent = emp.name;
            document.getElementById('alSub').textContent = emp.role;

            var ps0 = p[dateStr] || [];
            var hdr0 = formatDateHeader(dateStr);
            var status0 = getStatusBadge(empId, dateStr);
            var dt0 = new Date(dateStr + 'T00:00:00');
            var isOff0 = (dt0.getDay() === 0 || (dt0.getDay() === 6 && empId % 3 === 0));

            // Day total hours (paired punches)
            var dayMin = 0;
            for (var k = 0; k + 1 < ps0.length; k += 2) {
                (function(a, b) {
                    function parseM(t) {
                        var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                        if (!m) return 0;
                        var h = parseInt(m[1], 10),
                            mn = parseInt(m[2]),
                            ap = m[3].toUpperCase();
                        if (ap === 'PM' && h !== 12) h += 12;
                        if (ap === 'AM' && h === 12) h = 0;
                        return h * 60 + mn;
                    }
                    var diff = parseM(b) - parseM(a);
                    if (diff < 0) diff += 1440;
                    dayMin += diff;
                })(ps0[k].time, ps0[k + 1].time);
            }
            var dayH = Math.floor(dayMin / 60),
                dayM = dayMin % 60;

            var html = '<div class="al-hero">';
            html += '<div><div class="al-hero-date">' + esc(hdr0.full) + '</div><div class="al-hero-day">' + esc(hdr0.day) + '</div></div>';
            if (!isOff0 && ps0.length > 0 && dayMin > 0) {
                html += '<div class="al-hero-hours"><div class="al-hero-hours-val">' + dayH + 'h ' + dayM + 'm</div><div class="al-hero-hours-label">Hours Logged</div></div>';
            }
            html += '</div>';
            html += '<div class="al-status-badge-wrap"><span class="al-status-badge ' + status0.cls + '"><i class="bi ' + (status0.cls === 'half-day' ? 'bi-hourglass-split' : status0.cls === 'full-day' ? 'bi-check-circle-fill' : status0.cls === 'absent' ? 'bi-x-circle-fill' : 'bi-moon-stars-fill') + '"></i>' + status0.text + '</span></div>';

            html += '<div class="al-section-label">Punch Timeline</div>';
            html += '<div class="al-timeline">';

            // Only show the clicked date
            (function() {
                var d = dateStr;
                var ps = p[d] || [];
                var dt = new Date(d + 'T00:00:00');
                var dow = dt.getDay();
                var isOff = (dow === 0 || (dow === 6 && empId % 3 === 0));

                html += '<div class="al-date-group">';

                if (isOff || ps.length === 0) {
                    html += '<div class="al-empty"><i class="bi bi-clock-history"></i> No punches recorded for this day</div>';
                } else {
                    // Render each punch as In/Out pairs
                    for (var i = 0; i < ps.length; i++) {
                        var isIn = (i % 2 === 0);
                        var nodeCls = isIn ? 'in' : 'out';
                        var labelCls = isIn ? 'in' : 'out';
                        var arrow = isIn ? '<i class="bi bi-box-arrow-in-right"></i>' : '<i class="bi bi-box-arrow-right"></i>';
                        var labelText = isIn ? 'In' : 'Out';
                        var timeVal = ps[i].time.replace(/\s+/, ''); // '01:05 PM' -> '01:05PM'
                        var isWarn = !!ps[i].warn;
                        var dotIcon = isIn ? '<i class="bi bi-arrow-down"></i>' : '<i class="bi bi-arrow-up"></i>';

                        html += '<div class="al-timeline-item">';
                        html += '<div class="al-timeline-dot ' + nodeCls + '">' + dotIcon + '</div>';
                        html += '<div class="al-timeline-connector"></div>';
                        html += '<div class="al-punch-row ' + nodeCls + '">';
                        // html += '<span class="al-punch-time-tag">PUNCH ' + (i + 1) + '</span>';
                        html += '<div class="al-punch-node ' + nodeCls + '">' + arrow + '</div>';
                        html += '<div class="al-punch-text"><span class="al-punch-label ' + labelCls + '">' + labelText + '</span></div>';
                        html += '<input type="text" class="al-punch-time-input" value="' + esc(timeVal) + '" readonly>';
                        if (isWarn) html += '<span class="punch-warn punch-warn-mr" title="Irregular punch">&#9888;</span>';
                        html += '<div class="al-punch-actions">';
                        html += '<button type="button" class="al-punch-more" data-action="toggle"><i class="bi bi-three-dots"></i></button>';
                        html += '<div class="al-punch-dropdown">';
                        html += '<button type="button" class="al-punch-dropdown-item" data-action="edit"><i class="bi bi-pencil-square me-2"></i>Edit</button>';
                        html += '<button type="button" class="al-punch-dropdown-item al-punch-dropdown-danger" data-action="delete"><i class="bi bi-trash3 me-2"></i>Delete</button>';
                        html += '</div></div>';
                        html += '</div>';
                        html += '</div>';

                        // After an Out, show break time if next is In
                        if (!isIn && i + 1 < ps.length) {
                            var prevOut = ps[i].time;
                            var nextIn = ps[i + 1] ? ps[i + 1].time : '';
                            var bt = computeBreakTime(prevOut, nextIn);
                            if (bt) html += '<div class="al-break-badge"><i class="bi bi-cup-hot"></i> Break Time : ' + esc(bt) + '</div>';
                        }
                    }
                    // Add punch button
                    html += '<button type="button" class="al-add-punch" title="Add Punch"><i class="bi bi-plus-lg"></i> Add Punch</button>';
                }

                html += '</div>';
            })();

            html += '</div>';

            // Quick Actions section
            html += '<div class="al-section">';
            html += '<button type="button" class="al-section-toggle open" onclick="this.classList.toggle(\'open\');this.nextElementSibling.classList.toggle(\'open\');">';
            html += '<span><i class="bi bi-lightning-charge-fill me-2 text-brand-primary"></i>Quick Actions</span><i class="bi bi-chevron-up chevron"></i></button>';
            html += '<div class="al-section-body open"><div class="al-section-body-inner">';
            html += '<div class="d-flex flex-wrap gap-2">';
            html += '<button class="al-qa-btn">Mark Full Day</button>';
            html += '<button class="al-qa-btn">Add Penalty</button>';
            html += '<button class="al-qa-btn">Mark Half Day</button>';
            html += '<button class="al-qa-btn">Mark Absent</button>';
            html += '<button class="al-qa-btn">Add Working Hours</button>';
            html += '<button class="al-qa-btn">Convert To Paid Leave</button>';
            html += '<button class="al-qa-btn">Mark Week Off</button>';
            html += '</div></div></div></div>';

            // Insight section
            html += '<div class="al-section">';
            html += '<button type="button" class="al-section-toggle open" onclick="this.classList.toggle(\'open\');this.nextElementSibling.classList.toggle(\'open\');">';
            html += '<span><i class="bi bi-bar-chart-fill me-2 text-brand-primary"></i>Insight (This Month)</span><i class="bi bi-chevron-up chevron"></i></button>';
            html += '<div class="al-section-body open"><div class="al-section-body-inner">';

            // Compute stats
            var totalDays = 0,
                totalPunches = 0,
                totalMin = 0;
            dates.forEach(function(d) {
                var ps = p[d] || [];
                if (ps.length) totalDays++;
                totalPunches += ps.length;
                // Sum hours for paired punches
                for (var i = 0; i + 1 < ps.length; i += 2) {
                    function parseM(t) {
                        var m = t.match(/(\d+):(\d+)\s*(AM|PM)/i);
                        if (!m) return 0;
                        var h = parseInt(m[1], 10),
                            mn = parseInt(m[2]),
                            ap = m[3].toUpperCase();
                        if (ap === 'PM' && h !== 12) h += 12;
                        if (ap === 'AM' && h === 12) h = 0;
                        return h * 60 + mn;
                    }
                    var diff = parseM(ps[i + 1].time) - parseM(ps[i].time);
                    if (diff < 0) diff += 1440;
                    totalMin += diff;
                }
            });
            var totalH = Math.floor(totalMin / 60),
                totalM = totalMin % 60;

            html += '<div class="al-stat-grid">';
            html += '<div class="al-stat-card"><i class="bi bi-calendar-check"></i><div class="al-stat-val">' + totalDays + '</div><div class="al-stat-label">WORKING DAYS</div></div>';
            html += '<div class="al-stat-card"><i class="bi bi-fingerprint"></i><div class="al-stat-val">' + totalPunches + '</div><div class="al-stat-label">TOTAL PUNCHES</div></div>';
            html += '<div class="al-stat-card"><i class="bi bi-clock-history"></i><div class="al-stat-val">' + totalH + 'h ' + totalM + 'm</div><div class="al-stat-label">TOTAL HOURS</div></div>';
            html += '</div></div></div></div>';

            // ---------- FINAL FIX v2: populate BEFORE show() + gate fadeSlideUp once ----------
            ++alReqSeq;

            // 1) Clean any lingering Bootstrap transition classes BEFORE we touch anything.
            //    This guarantees the guard checks below reflect real state.
            if (alOffcanvasEl && !alOffcanvasEl.classList.contains('show')) {
                alOffcanvasEl.classList.remove('showing', 'hiding');
            }

            // 2) Populate body synchronously. setAlBodyHtml STRIPS .al-once so
            //    during repop (offcanvas already visible) animation never replays.
            setAlBodyHtml(html);

            // 3) Decide if show() is actually needed.
            //    show() ONLY when element has ZERO Bootstrap lifecycle classes.
            //    Otherwise: already visible / mid-transition → do NOT re-trigger.
            var needsShow = alOffcanvasEl &&
                !alOffcanvasEl.classList.contains('show')   &&
                !alOffcanvasEl.classList.contains('showing')&&
                !alOffcanvasEl.classList.contains('hiding');

            if (needsShow) {
                // CRITICAL ORDER for the user-reported "cards appear static then animate":
                //   a) Add .al-once BEFORE show() — this is the animation GATE class
                //   b) .fadeSlideUp has `backwards` fill-mode — so when Bootstrap adds .show
                //      on the offcanvas root, the child <div class="p-3 py-2 border rounded mb-2">
                //      elements already match the gated animation selector, fill-mode keeps
                //      them at opacity:0 / translate:14px UNTIL their nth-child delay fires.
                //   c) Then show() triggers slide-in + fadeSlideUp stagger simultaneously —
                //      never first shows static cards, then "refreshes" them.
                alOffcanvasEl.classList.add('al-once');
                var inst = getAlInstance();
                inst && inst.show();
            }
            // If needsShow=false (offcanvas already open) → .al-once is NOT added back,
            // so the CSS kill-switch keeps: animation:none !important on new cards →
            // instantly rendered, zero replay.
        }

    })();
