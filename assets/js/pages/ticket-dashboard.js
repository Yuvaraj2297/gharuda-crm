/**
 * Gharuda CRM - Ticket Dashboard Page Script
 * File: assets/js/pages/ticket-dashboard.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
    'use strict';

    var modalEl = document.getElementById('assignModal');
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    var currentTicket = null;
    var quickFilter = '';

    /* ---------- KPIs ---------- */
    function renderKpis() {
        var c = TicketingData.counts();
        document.getElementById('kpiTotal').textContent = c.total;
        document.getElementById('kpiOpen').textContent = c.open;
        document.getElementById('kpiProgress').textContent = c.inProgress + c.assigned + c.waiting;
        document.getElementById('kpiResolved').textContent = c.resolved + c.closed;
        document.getElementById('kpiBreached').textContent = c.breached;
    }

    /* ---------- Filters ---------- */
    function populateFilters() {
        var catSel = document.getElementById('tdfCategory');
        TicketingData.categories.forEach(function (c) {
            var o = document.createElement('option');
            o.value = c.name; o.textContent = c.icon + ' ' + c.name;
            catSel.appendChild(o);
        });
        var stSel = document.getElementById('tdfStatus');
        ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Resolved', 'Closed', 'Reopened', 'Rejected', 'Cancelled'].forEach(function (s) {
            var o = document.createElement('option');
            o.value = s; o.textContent = s;
            stSel.appendChild(o);
        });
    }

    /* ---------- Select2 filters (self-healing init, same pattern as Create Ticket) ---------- */
    function buildDashSelect2(selector, placeholder) {
        if (!window.jQuery || !$.fn.select2) return;
        var $sel = $(selector);
        if (!$sel.length) return;
        var el = $sel[0];
        var optionCount = el.options.length;
        var healing = false;

        function setup() {
            healing = true;
            if ($sel.hasClass('select2-hidden-accessible')) $sel.select2('destroy');
            $sel.select2({
                width: '100%',
                dropdownParent: $(document.body),
                minimumResultsForSearch: 6,
                placeholder: placeholder || null,
                allowClear: !!placeholder
            });
            healing = false;
        }

        setup();

        var mo = new MutationObserver(function () {
            if (healing) return;
            if (el.options.length < optionCount) {
                mo.disconnect();
                setup();
                mo.observe(el, { childList: true });
            }
        });
        mo.observe(el, { childList: true });
    }

    function initDashSelect2() {
        buildDashSelect2('#tdfCategory', 'All Categories');
        buildDashSelect2('#tdfPriority', 'All Priorities');
        buildDashSelect2('#tdfStatus', 'All Statuses');
        buildDashSelect2('#tdfDept', 'All Departments');

        /* Live re-render on filter change (select2 fires native change) */
        ['#tdfCategory', '#tdfPriority', '#tdfStatus', '#tdfDept'].forEach(function (sel) {
            $(sel).on('change', renderTable);
        });
    }

    function getFiltered() {
        var q = document.getElementById('tdashSearch').value.trim().toLowerCase();
        var cat = document.getElementById('tdfCategory').value;
        var pr = document.getElementById('tdfPriority').value;
        var st = document.getElementById('tdfStatus').value;
        var dept = document.getElementById('tdfDept').value;

        return TicketingData.getAllTickets().filter(function (t) {
            if (quickFilter === 'breached' && TicketingData.slaState(t) !== 'breached') return false;
            if (quickFilter === 'open' && t.status !== 'Open') return false;
            if (quickFilter === 'assigned' && t.status !== 'Assigned') return false;
            if (quickFilter === 'pending' && ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Reopened'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'progress' && ['Assigned', 'In Progress', 'Waiting for Employee'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'resolved' && ['Resolved', 'Closed'].indexOf(t.status) === -1) return false;
            if (cat && t.category !== cat) return false;
            if (pr && t.priority !== pr) return false;
            if (st && t.status !== st) return false;
            if (dept && t.assignedDept !== dept && !(dept === 'IT' && ['IT Support', 'Internet', 'Access Request'].indexOf(t.category) !== -1 && !t.assignedDept)) return false;
            if (q && (t.id + ' ' + t.subject + ' ' + t.createdBy + ' ' + t.createdByEmp).toLowerCase().indexOf(q) === -1) return false;
            return true;
        });
    }

    /* ---------- Table ---------- */
    function slaBadge(t) {
        var s = TicketingData.slaState(t);
        var due = new Date(t.resolutionDueTs);
        var dueStr = due.toLocaleDateString([], { day: '2-digit', month: 'short' }) + ' ' +
            due.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        var dueHtml = '<div class="sla-due">Due ' + dueStr + '</div>';
        if (s === 'breached') return '<span class="badge rounded-pill" style="background:#fdebed;color:#be3035;font-size:10.5px;">Breached</span>' + dueHtml;
        if (s === 'at-risk') return '<span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;font-size:10.5px;">At Risk</span>' + dueHtml;
        return '<span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;font-size:10.5px;">On Track</span>' + dueHtml;
    }

    /* Employee photo avatars — deterministic pick from assets/img/profile-*.jpg,
       falls back to coloured initials if the image is missing */
    var EMPLOYEE_PHOTOS = ['./assets/img/profile-1.jpg', './assets/img/profile-2.jpg', './assets/img/profile-3.jpg', './assets/img/profile-4.jpg'];

    function employeePhoto(empId, name) {
        var key = String(empId || name || '');
        var hash = 0;
        for (var i = 0; i < key.length; i++) hash = (hash * 31 + key.charCodeAt(i)) >>> 0;
        return EMPLOYEE_PHOTOS[hash % EMPLOYEE_PHOTOS.length];
    }

    function empAvatarHtml(name, empId) {
        var initials = name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d'];
        var color = colors[name.length % colors.length];
        return '<span class="a-avatar emp-av" style="background:' + color + ';width:34px;height:34px;font-size:11px;">' +
            '<img class="emp-img" src="' + employeePhoto(empId, name) + '" alt="" loading="lazy" ' +
            'onerror="this.style.display=\'none\';">' +
            '<span class="emp-init">' + initials + '</span>' +
            '</span>';
    }

    function renderTable() {
        var rows = getFiltered();
        document.getElementById('tdfCountBadge').textContent = rows.length;
        document.getElementById('tdashTotal').textContent = rows.length;
        document.getElementById('tdashShown').textContent = rows.length;

        var tbody = document.getElementById('tdashBody');
        if (!rows.length) {
            tbody.innerHTML = '<tr><td colspan="8"><div class="tdash-empty">' +
                '<div class="e-ico"><i class="bi bi-inbox"></i></div>' +
                '<div class="e-title">No tickets match the current filters</div>' +
                '<div class="e-sub">Try clearing a filter or searching a different keyword</div>' +
                '</div></td></tr>';
            return;
        }

        tbody.innerHTML = rows.map(function (t) {
            var st = TicketingData.statusMeta(t.status);
            var pr = TicketingData.priorityMeta(t.priority);
            var deptCls = (t.assignedDept || '').toLowerCase();
            return '<tr class="tkt-row" data-id="' + t.id + '" style="cursor:pointer;">' +
                '<td><span class="fw-bold text-primary">' + t.id + '</span><div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + t.createdDate + '</div></td>' +
                '<td><div class="d-flex align-items-center gap-2">' + empAvatarHtml(t.createdBy, t.createdByEmp) +
                    '<div><div class="fw-bold" style="font-size:12.5px;">' + TicketingData.escapeHtml(t.createdBy) + '</div>' +
                    '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + t.createdByEmp + '</div></div></div></td>' +
                '<td><span style="font-size:13px;">' + t.categoryIcon + '</span> <span class="fw-semibold" style="font-size:12.5px;">' + TicketingData.escapeHtml(t.category) + '</span>' +
                    '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + TicketingData.escapeHtml(t.subCategory) + '</div></td>' +
                '<td><span class="tkt-priority-badge" style="background:' + pr.bg + ';color:' + pr.color + ';">' + t.priority + '</span></td>' +
                '<td style="font-size:12px;">' + (t.assignedTo
                    ? TicketingData.escapeHtml(t.assignedTo) + (t.assignedDept ? '<div class="dept-chip ' + deptCls + ' mt-1" style="font-size:9.5px;">' + t.assignedDept + '</div>' : '')
                    : '<span class="badge rounded-pill" style="background:#f3f4f6;color:#6b7280;font-size:10px;">Unassigned</span>') + '</td>' +
                '<td>' + slaBadge(t) + '</td>' +
                '<td><span class="tkt-status-badge" style="background:' + st.bg + ';color:' + st.color + ';"><i class="bi ' + st.icon + '"></i>' + t.status + '</span></td>' +
                '<td class="text-center"><button class="btn btn-action-icon btn-view-details" data-bs-toggle="tooltip" data-bs-title="Manage Ticket"><i class="bi bi-pencil-square"></i></button></td>' +
                '</tr>';
        }).join('');
    }

    /* ---------- Side lists ---------- */
    function renderDeptMap() {
        var wrap = document.getElementById('deptMapList');
        var all = TicketingData.getAllTickets();
        var seen = {};
        var rows = [];

        var deptMeta = {
            'HR':      { icon: 'bi-people',           bg: '#eaf1ff', color: '#3564e0' },
            'IT':      { icon: 'bi-pc-display',       bg: '#ede9fe', color: '#7c3aed' },
            'Payroll': { icon: 'bi-cash-coin',        bg: '#e7f7eb', color: '#087a24' },
            'Finance': { icon: 'bi-bank',             bg: '#fff4d9', color: '#9a6200' },
            'Admin':   { icon: 'bi-building',         bg: '#fce7f3', color: '#be185d' }
        };

        TicketingData.categories.forEach(function (c) {
            if (seen[c.dept]) return;
            seen[c.dept] = true;
            var meta = deptMeta[c.dept] || { icon: 'bi-grid', bg: '#eef2f7', color: '#475569' };
            var cats = TicketingData.categories.filter(function (x) { return x.dept === c.dept; });
            var count = all.filter(function (t) {
                return t.category && !t.assignedTo && cats.some(function (x) { return x.name === t.category; });
            }).length;

            rows.push('<div class="dm-row">' +
                '<div class="dm-head">' +
                    '<span class="dm-ico" style="background:' + meta.bg + ';color:' + meta.color + ';"><i class="bi ' + meta.icon + '"></i></span>' +
                    '<span class="dept-chip ' + c.dept.toLowerCase() + '">' + c.dept + '</span>' +
                    '<i class="bi bi-arrow-right dm-arrow"></i>' +
                    (count
                        ? '<span class="dm-new" style="background:' + meta.bg + ';color:' + meta.color + ';">' + count + ' unassigned</span>'
                        : '<span class="dm-new" style="background:#e7f7eb;color:#087a24;"><i class="bi bi-check"></i> clear</span>') +
                '</div>' +
                '<div class="dm-cats">' +
                    cats.map(function (x) { return '<span class="dm-cat">' + x.icon + ' ' + TicketingData.escapeHtml(x.name) + '</span>'; }).join('') +
                '</div>' +
            '</div>');
        });
        document.getElementById('deptMapBadge').textContent = rows.length;
        wrap.innerHTML = rows.join('');
    }

    function renderWorkload() {
        var wrap = document.getElementById('workloadList');
        var staff = {};
        var maxActive = 1;
        Object.keys(TicketingData.deptAssignees).forEach(function (dept) {
            TicketingData.deptAssignees[dept].forEach(function (person) {
                var active = TicketingData.getAllTickets().filter(function (t) {
                    return t.assignedTo === person && ['Resolved', 'Closed', 'Rejected', 'Cancelled'].indexOf(t.status) === -1;
                }).length;
                staff[person] = { dept: dept, active: active };
                if (active > maxActive) maxActive = active;
            });
        });
        wrap.innerHTML = Object.keys(staff).map(function (person) {
            var s = staff[person];
            var color = s.active >= 3 ? '#be3035' : (s.active >= 1 ? '#9a6200' : '#087a24');
            var pct = Math.round((s.active / maxActive) * 100);
            return '<div class="assign-row">' +
                '<span class="a-avatar" style="background:' + (s.dept === 'IT' ? '#7c3aed' : s.dept === 'HR' ? '#3564e0' : s.dept === 'Finance' ? '#9a6200' : s.dept === 'Admin' ? '#be185d' : '#087a24') + ';">' +
                person.split(' ')[0][0] + '</span>' +
                '<div class="min-w-0 flex-grow-1"><div class="a-name text-truncate">' + TicketingData.escapeHtml(person) + '</div>' +
                '<div class="a-role">' + s.dept + '</div>' +
                '<div class="wl-bar"><span style="width:' + pct + '%;background:' + color + ';"></span></div></div>' +
                '<span class="a-count" style="background:' + color + '18;color:' + color + ';">' + s.active + ' active</span>' +
                '</div>';
        }).join('');
    }

    function renderAttention() {
        var wrap = document.getElementById('attentionList');
        var items = [];

        TicketingData.getAllTickets().forEach(function (t) {
            if (TicketingData.slaState(t) === 'breached') {
                items.push({ t: t, label: 'SLA breached', bg: '#fdebed', color: '#be3035' });
            } else if (!t.assignedTo) {
                items.push({ t: t, label: 'Unassigned', bg: '#eaf1ff', color: '#3564e0' });
            } else if (t.status === 'Waiting for Employee') {
                items.push({ t: t, label: 'Waiting on employee', bg: '#fce7f3', color: '#be185d' });
            }
        });

        document.getElementById('attentionBadge').textContent = items.length;

        if (!items.length) {
            wrap.innerHTML = '<div class="text-center text-muted py-3" style="font-size:12px;">All good — nothing pending 🎉</div>';
            return;
        }

        wrap.innerHTML = items.slice(0, 5).map(function (item) {
            var barCls = item.label === 'SLA breached' ? 'bar-red' : (item.label === 'Unassigned' ? 'bar-blue' : 'bar-pink');
            return '<div class="assign-row tkt-row ' + barCls + '" data-id="' + item.t.id + '">' +
                
                '<span style="font-size:15px;">' + item.t.categoryIcon + '</span>' +
                '<div class="min-w-0"><div class="a-name text-truncate">' + item.t.id + ' · ' + TicketingData.escapeHtml(item.t.subject) + '</div>' +
                '<div class="a-role">' + TicketingData.escapeHtml(item.t.createdBy) + ' · ' + item.t.createdDate + '</div></div>' +
                '<span class="badge rounded-pill ms-auto" style="background:' + item.bg + ';color:' + item.color + ';font-size:9.5px;">' + item.label + '</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- Assign modal ---------- */
    function avatarColor(name) {
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d'];
        return colors[name.length % colors.length];
    }

    function renderConversation(t) {
        var wrap = document.getElementById('amConversation');
        document.getElementById('amConvCount').textContent = (t.conversation || []).length + ' messages';
        wrap.innerHTML = (t.conversation || []).map(function (m) {
            var isStaff = m.by === 'staff';
            var initials = m.name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
            return '<div class="am-msg ' + (isStaff ? 'staff' : 'emp') + '">' +
                '<span class="am-av" style="background:' + avatarColor(m.name) + ';">' + initials + '</span>' +
                '<div><div class="am-meta">' + TicketingData.escapeHtml(m.name) + ' · ' + TicketingData.fmtTs(m.ts) + '</div>' +
                '<div class="am-bubble">' + TicketingData.escapeHtml(m.text) +
                (m.attachment ? '<div class="am-att"><i class="bi bi-paperclip me-1"></i>' + TicketingData.escapeHtml(m.attachment) + '</div>' : '') +
                '</div></div></div>';
        }).join('');
        wrap.scrollTop = wrap.scrollHeight;
    }

    function fillStatusOptions(t) {
        var sel = document.getElementById('amStatus');
        var opts = [t.status].concat(TicketingData.allowedNextStatuses(t));
        sel.innerHTML = opts.map(function (s) { return '<option>' + s + '</option>'; }).join('');
        sel.value = t.status;
        document.getElementById('amRejectWrap').style.display =
            (TicketingData.allowedNextStatuses(t).indexOf('Rejected') !== -1 && t.status !== 'Rejected') ? 'block' : 'none';
    }

    function openAssign(id) {
        var t = TicketingData.getTicket(id);
        if (!t) return;
        currentTicket = t;

        var st = TicketingData.statusMeta(t.status);
        var pr = TicketingData.priorityMeta(t.priority);
        document.getElementById('amTicketId').textContent = t.id;
        document.getElementById('amSubject').textContent = t.subject;
        document.getElementById('amEmp').textContent = t.createdBy + ' (' + t.createdByEmp + ')';
        document.getElementById('amCreated').textContent = t.createdDate;
        document.getElementById('amCat').textContent = t.categoryIcon + ' ' + t.category + ' · ' + t.subCategory;
        document.getElementById('amContact').textContent = t.preferredContact;
        document.getElementById('amDescription').textContent = t.description;
        document.getElementById('amStatusBadge').textContent = t.status;
        document.getElementById('amStatusBadge').style.cssText = 'background:' + st.bg + ';color:' + st.color + ';';
        document.getElementById('amPriorityBadge').textContent = t.priority;
        document.getElementById('amPriorityBadge').style.cssText = 'background:' + pr.bg + ';color:' + pr.color + ';';

        document.getElementById('amDept').value = t.assignedDept || '';
        document.getElementById('amPriority').value = t.priority;
        document.getElementById('amReply').value = '';
        document.getElementById('amRejectNote').value = '';
        fillAssignees(t.assignedDept || '', t.assignedTo || '');
        fillStatusOptions(t);
        renderConversation(t);

        modal.show();
    }

    function fillAssignees(dept, selected) {
        var sel = document.getElementById('amAssignee');
        if (!dept || !TicketingData.deptAssignees[dept]) {
            sel.innerHTML = '<option value="">Select a department first</option>';
            sel.disabled = true;
            return;
        }
        sel.disabled = false;
        sel.innerHTML = '<option value="">Select person...</option>' +
            TicketingData.deptAssignees[dept].map(function (p) {
                return '<option ' + (p === selected ? 'selected' : '') + '>' + p + '</option>';
            }).join('');
        if (selected) sel.value = selected;
    }

    document.getElementById('amDept').addEventListener('change', function () {
        fillAssignees(this.value, '');
    });

    /* Priority change → recalc SLA dates */
    document.getElementById('amPriority').addEventListener('change', function () {
        var sla = TicketingData.slaMatrix[this.value];
        if (currentTicket) {
            document.getElementById('amPriority').title = 'Response ' + sla.response + ' · Resolution ' + sla.resolution;
        }
    });

    /* ---------- Toast ---------- */
    var toastEl = null;
    var toastTimer = null;

    function showToast(msg) {
        if (!toastEl) {
            toastEl = document.createElement('div');
            toastEl.className = 'tdash-toast';
            toastEl.innerHTML = '<i class="bi bi-check-circle-fill t-ico"></i><span></span>';
            document.body.appendChild(toastEl);
        }
        toastEl.querySelector('span').textContent = msg;
        toastEl.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.classList.remove('show'); }, 3200);
    }

    document.getElementById('amUpdateBtn').addEventListener('click', function () {
        if (!currentTicket) return;
        var dept = document.getElementById('amDept').value;
        var assignee = document.getElementById('amAssignee').value;
        var newStatus = document.getElementById('amStatus').value;
        var priority = document.getElementById('amPriority').value;
        var reply = document.getElementById('amReply').value.trim();
        var rejectNote = document.getElementById('amRejectNote').value.trim();

        var updates = {
            assignedDept: dept || null,
            assignedTo: assignee || null,
            priority: priority,
            status: newStatus
        };

        /* SLA recalc on priority change */
        if (priority !== currentTicket.priority) {
            var sla = TicketingData.slaMatrix[priority];
            updates.resolutionDueTs = new Date(new Date(currentTicket.createdTs).getTime() + sla.resolutionHrs * 3600000).toISOString();
        }

        if (newStatus === 'Resolved' && currentTicket.status !== 'Resolved') {
            updates.resolvedTs = new Date().toISOString();
        }
        if (newStatus === 'Rejected' || newStatus === 'Cancelled') {
            updates.rejectNote = rejectNote || 'Ticket ' + newStatus.toLowerCase() + ' by helpdesk';
        }
        if (newStatus === 'Reopened') {
            updates.resolvedTs = null;
        }

        TicketingData.updateTicket(currentTicket.id, updates);
        if (reply) {
            TicketingData.addReply(currentTicket.id, reply, null, true);
        }

        modal.hide();
        refresh();
        showToast(currentTicket.id + ' updated' + (reply ? ' · reply sent' : ''));
    });

    /* Composer: send button adds reply without closing the modal */
    function sendReplyOnly() {
        if (!currentTicket) return;
        var input = document.getElementById('amReply');
        var reply = input.value.trim();
        if (!reply) return;
        TicketingData.addReply(currentTicket.id, reply, null, true);
        input.value = '';
        input.style.height = 'auto';
        renderConversation(TicketingData.getTicket(currentTicket.id));
        showToast('Reply added to ' + currentTicket.id);
    }

    document.getElementById('amSendBtn').addEventListener('click', sendReplyOnly);

    document.getElementById('amReply').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendReplyOnly();
        }
    });

    document.getElementById('amReply').addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 130) + 'px';
    });

    /* ---------- Events ---------- */
    document.addEventListener('click', function (e) {
        var row = e.target.closest('.tkt-row');
        if (row && row.getAttribute('data-id')) {
            openAssign(row.getAttribute('data-id'));
        }
    });

    document.getElementById('tdashSearch').addEventListener('input', renderTable);
    document.getElementById('tdfApply').addEventListener('click', renderTable);
    document.getElementById('tdfClear').addEventListener('click', function () {
        ['tdfCategory', 'tdfPriority', 'tdfStatus', 'tdfDept'].forEach(function (id) {
            var el = document.getElementById(id);
            el.value = '';
            if (window.jQuery && $(el).hasClass('select2-hidden-accessible')) $(el).trigger('change');
        });
        document.getElementById('tdashSearch').value = '';
        quickFilter = '';
        document.querySelectorAll('.tdash-kpi').forEach(function (x) { x.classList.remove('active'); });
        renderTable();
    });

    document.querySelectorAll('.tdash-kpi').forEach(function (k) {
        k.addEventListener('click', function () {
            var jump = k.getAttribute('data-jump');
            quickFilter = (quickFilter === jump) ? '' : jump;
            document.querySelectorAll('.tdash-kpi').forEach(function (x) { x.classList.remove('active'); });
            if (quickFilter) k.classList.add('active');
            renderTable();
        });
    });

    /* ---------- Refresh all ---------- */
    function refresh() {
        renderKpis();
        renderTable();
        renderDeptMap();
        renderWorkload();
        renderAttention();
    }

    populateFilters();
    refresh();

    /* Init select2 filters on jQuery ready — after global scripts have run */
    if (window.jQuery) {
        $(function () { initDashSelect2(); });
    }

    /* Sidebar quick-filter links (New / Assigned / Pending / Resolved / SLA) */
    var sidebarFilter = null;
    try { sidebarFilter = sessionStorage.getItem('tktQuickFilter'); sessionStorage.removeItem('tktQuickFilter'); } catch (e) { /* ignore */ }
    if (sidebarFilter) {
        quickFilter = sidebarFilter;
        document.querySelectorAll('.tdash-kpi').forEach(function (k) {
            if (k.getAttribute('data-jump') === quickFilter) k.classList.add('active');
        });
        renderTable();
    }

    /* Deep link: ticket-dashboard.php?ticket=TKT-1001 */
    var params = new URLSearchParams(window.location.search);
    if (params.get('ticket')) openAssign(params.get('ticket'));
})();
