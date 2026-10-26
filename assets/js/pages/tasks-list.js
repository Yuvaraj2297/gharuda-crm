/**
 * Gharuda CRM - Tasks List Page Script
 * File: assets/js/pages/tasks-list.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        /* ---------------- Constants ---------------- */
        var STATUS_POOL = ['Not Started', 'In Progress', 'Testing', 'Awaiting Feedback', 'Complete'];

        var STATUS_PILL = {
            'Not Started': 'st-not-started',
            'In Progress': 'st-in-progress',
            'Testing': 'st-testing',
            'Awaiting Feedback': 'st-awaiting',
            'Complete': 'st-complete'
        };

        var STATUS_COLOR = {
            'Not Started': '#94a3b8',
            'In Progress': '#2563eb',
            'Testing': '#f59e0b',
            'Awaiting Feedback': '#7c3aed',
            'Complete': '#16a34a'
        };

        var SUMMARY = [
            { status: 'Not Started', cls: 's-not-started', bar: 'bars-not-started' },
            { status: 'In Progress', cls: 's-in-progress', bar: 'bars-in-progress' },
            { status: 'Testing', cls: 's-testing', bar: 'bars-testing' },
            { status: 'Awaiting Feedback', cls: 's-awaiting', bar: 'bars-awaiting' },
            { status: 'Complete', cls: 's-complete', bar: 'bars-complete' }
        ];

        var STAFF = ['Harish D.', 'Divya A.', 'Priya S.', 'Karthik R.', 'Meena V.', 'Arun K.'];
        var ME = 'Harish D.';
        var PROJECTS = ['ERP Implementation', 'Solar AMC', 'HRMS Rollout', 'Website Revamp', 'Inventory App'];
        var QC_STATUSES = ['Pending', 'Passed', 'Failed'];
        var TAGS = ['Urgent', 'ERP', 'AMC', 'Client', 'Internal', 'Solar', 'Support'];
        var WORKS = ['Appointment', 'Follow-up', 'Site Visit', 'Demo', 'Documentation', 'Quotation', 'Installation', 'Support Call', 'Training', 'Audit'];
        var CLIENTS = ['Sundar', 'Shalu', 'Raj Kumar', 'Divya', 'Karthik', 'Meena', 'Arun', 'Priya', 'Vetri', 'Naveen'];

        var AV_CLASSES = ['av-violet', 'av-amber', 'av-blue', 'av-green', 'av-rose', 'av-grey'];

        /* Status plan — reference summary distribution (30/37/1/1/36 = 105) */
        var STATUS_PLAN = [];
        (function() {
            var plan = [
                ['Not Started', 30],
                ['In Progress', 37],
                ['Testing', 1],
                ['Awaiting Feedback', 1],
                ['Complete', 36]
            ];
            plan.forEach(function(p) {
                for (var i = 0; i < p[1]; i++) STATUS_PLAN.push(p[0]);
            });
        })();

        var TOTAL = STATUS_PLAN.length;   /* 105 */

        /* ---------------- Helpers ---------------- */
        function pad2(n) { return (n < 10 ? '0' : '') + n; }

        function mulberry32(a) {
            return function() {
                a |= 0;
                a = a + 0x6D2B79F5 | 0;
                var t = Math.imul(a ^ a >>> 15, 1 | a);
                t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
                return ((t ^ t >>> 14) >>> 0) / 4294967296;
            };
        }

        function toISO(d) {
            return d.getFullYear() + '-' + pad2(d.getMonth() + 1) + '-' + pad2(d.getDate());
        }

        function fmtDate(iso) {
            if (!iso) return '—';
            var p = iso.split('-');
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        function initials(name) {
            return String(name).trim().charAt(0).toUpperCase();
        }

        function avatarClass(name) {
            var sum = 0;
            for (var i = 0; i < name.length; i++) sum += name.charCodeAt(i);
            return AV_CLASSES[sum % AV_CLASSES.length];
        }

        function addDays(d, n) {
            var x = new Date(d.getTime());
            x.setDate(x.getDate() + n);
            return x;
        }

        /* ---------------- Data (deterministic demo set) ---------------- */
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var TODAY_ISO = toISO(today);

        function makeTasks() {
            var rows = [];
            var rnd = mulberry32(20260928);

            for (var i = 0; i < TOTAL; i++) {
                /* 37 prime-a irukkuradhala (i * 37) % 105 oru bijection —
                   statuses plan-a follow aagum aana interleave aagi varum */
                var status = STATUS_PLAN[(i * 37) % TOTAL];

                var startOffset = -Math.floor(rnd() * 70);         /* past */
                var start = addDays(today, startOffset);
                var due = addDays(start, 1 + Math.floor(rnd() * 21));

                /* Quick filter buttons-ku results irukkanum */
                if (i % 17 === 0) due = new Date(today.getTime());
                if (i % 23 === 0) start = new Date(today.getTime());

                var progress = 0;
                if (status === 'In Progress') progress = Math.floor(rnd() * 10) * 10;
                else if (status === 'Testing') progress = 90;
                else if (status === 'Awaiting Feedback') progress = 95;
                else if (status === 'Complete') progress = 100;

                var assigned = STAFF[Math.floor(rnd() * STAFF.length)];
                var fCount = Math.floor(rnd() * 3) + 1;
                var followers = [];
                for (var f = 0; f < fCount; f++) {
                    followers.push(STAFF[Math.floor(rnd() * STAFF.length)]);
                }

                var tagCount = Math.floor(rnd() * 3);
                var tags = [];
                for (var g = 0; g < tagCount; g++) {
                    var tag = TAGS[Math.floor(rnd() * TAGS.length)];
                    if (tags.indexOf(tag) === -1) tags.push(tag);
                }

                var priority = rnd() < .2 ? 'High' : (rnd() < .65 ? 'Medium' : 'Low');
                var overdue = status !== 'Complete' && due < today;

                rows.push({
                    id: i + 1,
                    no: TOTAL - i,
                    name: WORKS[Math.floor(rnd() * WORKS.length)] + ': Contact name [ ' + CLIENTS[Math.floor(rnd() * CLIENTS.length)] + ' ]',
                    dependency: i > 3 && rnd() < .28 ? '#' + (TOTAL - i + 1) : '',
                    status: status,
                    progress: progress,
                    start: toISO(start),
                    due: toISO(due),
                    completed: status === 'Complete' ? toISO(addDays(due, -1)) : '',
                    timeTaken: status === 'Complete' ? (1 + Math.floor(rnd() * 6)) + 'd ' + Math.floor(rnd() * 8) + 'h' : '',
                    rating: status === 'Complete' ? (3 + Math.floor(rnd() * 3)) + '/5' : 'NA',
                    assigned: assigned,
                    followers: followers,
                    tags: tags,
                    priority: priority,
                    project: PROJECTS[Math.floor(rnd() * PROJECTS.length)],
                    qcStatus: QC_STATUSES[Math.floor(rnd() * QC_STATUSES.length)],
                    checklistDone: Math.floor(rnd() * 4),
                    checklistTotal: 3 + Math.floor(rnd() * 4),
                    dueCrossed: overdue ? Math.floor(rnd() * 3) + 1 : 0,
                    overdue: overdue
                });
            }

            return rows;
        }

        var tasks = makeTasks();

        /* ---------------- Element refs ---------------- */
        var staffSel = document.getElementById('tkStaff');
        var statusSel = document.getElementById('tkStatus');
        var fromInput = document.getElementById('tkFrom');
        var toInput = document.getElementById('tkTo');
        var projectSel = document.getElementById('tkProject');
        var qcSel = document.getElementById('tkQc');

        var tkTable = null;
        var quickFilter = '';

        /* ---------------- Select population ---------------- */
        function fillSelect(sel, allLabel, values) {
            var html = '<option value="">' + allLabel + '</option>';
            values.forEach(function(v) {
                html += '<option value="' + esc(v) + '">' + esc(v) + '</option>';
            });
            sel.innerHTML = html;
        }

        function populateFilters() {
            fillSelect(staffSel, 'All Staff', STAFF);
            fillSelect(statusSel, 'All Statuses', STATUS_POOL);
            fillSelect(projectSel, 'All Projects', PROJECTS);
            fillSelect(qcSel, 'Select QC Status', QC_STATUSES);

            fillSelect(document.getElementById('tkNewProject'), 'Select Project', PROJECTS);
            fillSelect(document.getElementById('tkNewAssigned'), 'Select Staff', STAFF);
            fillSelect(document.getElementById('tkNewStatus'), 'Status', STATUS_POOL);
        }

        /* ---------------- Filtering ---------------- */
        function matchesQuick(t) {
            if (!quickFilter) return true;
            if (quickFilter === 'todayDeadline') return t.due === TODAY_ISO;
            if (quickFilter === 'upcoming') return t.due > TODAY_ISO;
            if (quickFilter === 'todayTask') return t.start === TODAY_ISO;
            if (quickFilter === 'duePassed') return t.overdue;
            return true;
        }

        function parseToIso(str) {
            if (!str) return '';
            if (str.indexOf('-') !== -1) {
                var parts = str.split('-');
                if (parts[0].length === 2) {
                    return parts[2] + '-' + parts[1] + '-' + parts[0];
                }
            }
            return str;
        }

        function filteredTasks() {
            var staff = staffSel.value;
            var status = statusSel.value;
            var from = fromInput ? parseToIso(fromInput.value) : '';
            var to = toInput ? parseToIso(toInput.value) : '';
            var project = projectSel.value;
            var qc = qcSel.value;

            return tasks.filter(function(t) {
                if (staff && t.assigned !== staff) return false;
                if (status && t.status !== status) return false;
                if (from && t.start < from) return false;
                if (to && t.start > to) return false;
                if (project && t.project !== project) return false;
                if (qc && t.qcStatus !== qc) return false;
                return matchesQuick(t);
            });
        }

        /* ---------------- Summary strip ---------------- */
        function renderSummary() {
            var total = tasks.length;
            document.getElementById('tkSumGrid').innerHTML = SUMMARY.map(function(s) {
                var count = tasks.filter(function(t) { return t.status === s.status; }).length;
                var mine = tasks.filter(function(t) { return t.status === s.status && t.assigned === ME; }).length;
                var pct = total > 0 ? Math.round(count / total * 100) : 0;

                return '<div class="tk-sum">' +
                    '<div><span class="num ' + s.cls + '">' + count + '</span>' +
                    '<span class="lbl ' + s.cls + '">' + s.status + '</span></div>' +
                    '<div class="bar ' + s.bar + '"><span style="width:' + pct + '%;"></span></div>' +
                    '<div class="sub">Tasks assigned to me: ' + mine + '</div>' +
                    '</div>';
            }).join('');
        }

        function renderOverdueAlert() {
            var overdue = tasks.filter(function(t) {
                return t.status !== 'Complete' && t.status !== 'Not Started' && t.overdue;
            }).length;
            var el1 = document.getElementById('tkOverdueCount');
            var el2 = document.getElementById('tkOverdueCount2');
            if (el1) el1.textContent = overdue;
            if (el2) el2.textContent = overdue;
        }

        /* ---------------- Table ---------------- */
        if (typeof MasterTable !== 'undefined') {
            tkTable = MasterTable.init({
                tableId: 'tkTable',
                tbodyId: 'tkTbody',
                idPrefix: 'tk',
                data: [],
                tableName: 'Tasks',
                primaryKey: 'id',
                showCheckbox: true,
                searchFields: ['name', 'assigned', 'project', 'status', 'priority', 'tags'],
                columns: [
                    {
                        field: 'no',
                        title: '#',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-no">' + v + '</span>';
                        }
                    },
                    {
                        field: 'name',
                        title: 'Name',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-name-cell">' +
                                '<span class="tk-name">' + esc(v) + '</span>' +
                                '<span class="tk-meta' + (r.overdue ? ' is-overdue' : '') + '">Total Checklist: ' + r.checklistDone + ' / ' + r.checklistTotal + '</span>' +
                                '<span class="tk-meta' + (r.overdue ? ' is-overdue' : '') + '">Total Due Date Crossed: ' + r.dueCrossed + '</span>' +
                                (r.overdue ? '<span class="tk-warn"><i class="bi bi-exclamation-triangle-fill"></i></span>' : '') +
                                '</span>';
                        }
                    },
                    {
                        field: 'dependency',
                        title: 'Dependency Task',
                        sortable: false,
                        render: function(v) {
                            return v ? '<span class="tk-no">' + esc(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-pill ' + (STATUS_PILL[v] || 'st-not-started') + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'progress',
                        title: 'Progress',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-donut" style="--p:' + v + ';--dc:' + (STATUS_COLOR[r.status] || '#16a34a') + ';"><b>' + v + '%</b></span>';
                        }
                    },
                    {
                        field: 'start',
                        title: 'Start Date',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-date-txt">' + fmtDate(v) + '</span>';
                        }
                    },
                    {
                        field: 'due',
                        title: 'Due Date',
                        sortable: true,
                        render: function(v, r) {
                            return '<span class="tk-date-txt' + (r.overdue ? ' is-overdue' : '') + '">' + fmtDate(v) + '</span>';
                        }
                    },
                    {
                        field: 'completed',
                        title: 'Completed Date',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="tk-date-txt">' + fmtDate(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'timeTaken',
                        title: 'Time Taken',
                        sortable: false,
                        render: function(v) {
                            return v ? '<span class="tk-date-txt">' + esc(v) + '</span>' : '<span class="tk-muted">—</span>';
                        }
                    },
                    {
                        field: 'rating',
                        title: 'Rating',
                        sortable: false,
                        render: function(v) {
                            return v === 'NA' ? '<span class="tk-muted">NA</span>' : '<span class="tk-date-txt">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'assigned',
                        title: 'Assigned to',
                        sortable: true,
                        render: function(v) {
                            return '<span class="tk-avatar ' + avatarClass(v) + '" title="' + esc(v) + '">' + initials(v) + '</span>';
                        }
                    },
                    {
                        field: 'followers',
                        title: 'Followers',
                        sortable: false,
                        render: function(v) {
                            if (!v || !v.length) return '<span class="tk-muted">—</span>';
                            var shown = v.slice(0, 3);
                            var html = '<span class="tk-avatars">' + shown.map(function(f) {
                                return '<span class="tk-avatar ' + avatarClass(f) + '" title="' + esc(f) + '">' + initials(f) + '</span>';
                            }).join('');
                            if (v.length > 3) html += '<span class="tk-avatar more">+' + (v.length - 3) + '</span>';
                            return html + '</span>';
                        }
                    },
                    {
                        field: 'tags',
                        title: 'Tags',
                        sortable: false,
                        render: function(v) {
                            if (!v || !v.length) return '<span class="tk-muted">—</span>';
                            return v.map(function(t) { return '<span class="tk-tag">' + esc(t) + '</span>'; }).join('');
                        }
                    },
                    {
                        field: 'priority',
                        title: 'Priority',
                        sortable: true,
                        render: function(v) {
                            var cls = v === 'High' ? 'p-high' : (v === 'Low' ? 'p-low' : 'p-medium');
                            return '<span class="tk-pri ' + cls + '">' + esc(v) + '</span>';
                        }
                    }
                ]
            });
        }

        /* ---------------- Render ---------------- */
        function renderAll() {
            var rows = filteredTasks();
            if (tkTable) tkTable.setData(rows);
        }

        /* ---------------- Bindings ---------------- */
        document.getElementById('tkSearchBtn').addEventListener('click', function() {
            renderAll();
            showToast(filteredTasks().length + ' tasks found');
        });

        document.getElementById('tkClearBtn').addEventListener('click', function() {
            resetFilters();
            showToast('Filters cleared');
        });

        function resetFilters() {
            staffSel.value = '';
            statusSel.value = '';
            if (fromInput) fromInput.value = '';
            if (toInput) toInput.value = '';
            projectSel.value = '';
            qcSel.value = '';
            quickFilter = '';
            document.querySelectorAll('.tk-quick-btn').forEach(function(b) { b.classList.remove('active'); });

            if (window.jQuery && jQuery.fn.select2) {
                ['#tkStaff', '#tkStatus', '#tkProject', '#tkQc'].forEach(function(id) {
                    jQuery(id).val('').trigger('change.select2');
                });
            }
            renderAll();
        }

        var quickContainer = document.querySelector('.tk-quick');
        if (quickContainer) {
            quickContainer.addEventListener('click', function(e) {
                var btn = e.target.closest('.tk-quick-btn');
                if (!btn) return;
                var key = btn.getAttribute('data-quick');

                if (key === 'reset') {
                    resetFilters();
                    showToast('Filters reset');
                    return;
                }

                var same = quickFilter === key;
                quickFilter = same ? '' : key;
                this.querySelectorAll('.tk-quick-btn').forEach(function(b) {
                    b.classList.toggle('active', !same && b === btn);
                });
                renderAll();
            });
        }

        /* ---------------- New Task modal ---------------- */
        var tkModalEl = document.getElementById('tkModal');
        var tkModal = null;

        function getTkModal() {
            if (!tkModal && tkModalEl && typeof bootstrap !== 'undefined') {
                tkModal = bootstrap.Modal.getOrCreateInstance(tkModalEl);
            }
            return tkModal;
        }

        function nextTaskNo() {
            return tasks.reduce(function(max, t) { return Math.max(max, t.no); }, 0) + 1;
        }

        var newBtn = document.getElementById('tkNewBtn');
        if (newBtn && newBtn.tagName === 'BUTTON') {
            newBtn.addEventListener('click', function() {
                document.getElementById('tkNewName').value = '';
                document.getElementById('tkNewName').classList.remove('is-invalid');
                document.getElementById('tkNewStart').value = TODAY_ISO;
                document.getElementById('tkNewDue').value = toISO(addDays(today, 7));
                document.getElementById('tkNewPriority').value = 'Medium';
                document.getElementById('tkNewProject').value = '';
                document.getElementById('tkNewAssigned').value = '';
                document.getElementById('tkNewStatus').value = 'Not Started';
                getTkModal().show();
            });
        }

        document.getElementById('tkNewSubmit').addEventListener('click', function() {
            var nameInput = document.getElementById('tkNewName');
            var startInput = document.getElementById('tkNewStart');
            var dueInput = document.getElementById('tkNewDue');
            var name = nameInput.value.trim();

            if (!name) {
                nameInput.classList.add('is-invalid');
                nameInput.focus();
                showToast('Please enter the task name');
                return;
            }
            if (!startInput.value || !dueInput.value) {
                showToast('Please pick the start and due dates');
                return;
            }

            var assigned = document.getElementById('tkNewAssigned').value || ME;
            var status = document.getElementById('tkNewStatus').value || 'Not Started';

            tasks.unshift({
                id: Date.now(),
                no: nextTaskNo(),
                name: name,
                dependency: '',
                status: status,
                progress: status === 'Complete' ? 100 : 0,
                start: startInput.value,
                due: dueInput.value,
                completed: '',
                timeTaken: '',
                rating: 'NA',
                assigned: assigned,
                followers: [ME],
                tags: [],
                priority: document.getElementById('tkNewPriority').value,
                project: document.getElementById('tkNewProject').value,
                qcStatus: 'Pending',
                checklistDone: 0,
                checklistTotal: 0,
                dueCrossed: dueInput.value < TODAY_ISO && status !== 'Complete' ? 1 : 0,
                overdue: dueInput.value < TODAY_ISO && status !== 'Complete'
            });

            getTkModal().hide();
            renderSummary();
            renderOverdueAlert();
            renderAll();
            showToast('Task "' + name + '" created');
        });

        if (tkModalEl) {
            /* Modal-kkulla select2 — dropdownParent fix (project idiom) */
            tkModalEl.addEventListener('shown.bs.modal', function() {
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#tkModal .select2').each(function() {
                        var $s = jQuery(this);
                        if ($s.data('select2')) $s.select2('destroy');
                        $s.select2({ width: '100%', dropdownParent: jQuery(tkModalEl) });
                    });
                }
                document.getElementById('tkNewName').focus();
            });
        }

        /* ---------------- Toast ---------------- */
        var toastWrap = null;

        function getToastWrap() {
            if (!toastWrap) {
                toastWrap = document.createElement('div');
                toastWrap.className = 'tk-toast-wrap';
                document.body.appendChild(toastWrap);
            }
            return toastWrap;
        }

        function showToast(msg) {
            var wrap = getToastWrap();
            var t = document.createElement('div');
            t.className = 'tk-toast';
            t.innerHTML = '<span class="tk-toast-ico"><i class="bi bi-check-lg"></i></span>' +
                '<span class="tk-toast-msg"></span>' +
                '<button type="button" class="tk-toast-x" title="Close"><i class="bi bi-x-lg"></i></button>';
            t.querySelector('.tk-toast-msg').textContent = msg;
            wrap.appendChild(t);

            function dismiss() {
                t.classList.add('tk-toast-out');
                setTimeout(function() { t.remove(); }, 260);
            }
            t.querySelector('.tk-toast-x').addEventListener('click', dismiss);
            setTimeout(dismiss, 4000);
        }

        /* ---------------- Init ---------------- */
        populateFilters();
        renderSummary();
        renderOverdueAlert();
        renderAll();
    })();
