/**
 * Gharuda CRM - Cticket Admin Page Script
 * File: assets/js/pages/cticket-admin.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
    'use strict';

    var modalEl = document.getElementById('akModal');
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    var quickAssignModalEl = document.getElementById('quickAssignModal');
    var quickAssignModal = bootstrap.Modal.getOrCreateInstance(quickAssignModalEl);
    
    var currentTicket = null;
    var quickFilter = '';
    var toastTimer = null;

    function showToast(msg) {
        var t = document.getElementById('akToast');
        t.querySelector('span').textContent = msg;
        t.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { t.classList.remove('show'); }, 3200);
    }

    /* ---------- KPIs ---------- */
    function renderKpis() {
        var c = CustomerTicketData.counts();
        document.getElementById('akTotal').textContent = c.total;
        document.getElementById('akNew').textContent = c.newT + c.reopened;
        document.getElementById('akProgress').textContent = c.assigned + c.inProgress + c.waiting;
        document.getElementById('akResolved').textContent = c.resolved + c.closed;
        document.getElementById('akHigh').textContent = c.highCritical;
    }

    /* ---------- Filters ---------- */
    function populateFilters() {
        var pj = document.getElementById('akFProject');
        CustomerTicketData.projects.forEach(function (p) {
            var o = document.createElement('option');
            o.value = p.id; o.textContent = p.icon + ' ' + p.name;
            pj.appendChild(o);
        });
        var it = document.getElementById('akFIssue');
        CustomerTicketData.issueTypes.forEach(function (i) {
            var o = document.createElement('option');
            o.value = i.name; o.textContent = i.icon + ' ' + i.name;
            it.appendChild(o);
        });
        var st = document.getElementById('akFStatus');
        ['New', 'Assigned', 'In Progress', 'Waiting for Customer', 'Resolved', 'Closed', 'Reopened'].forEach(function (s) {
            var o = document.createElement('option');
            o.value = s; o.textContent = s;
            st.appendChild(o);
        });
    }

    function getFiltered() {
        var q = document.getElementById('akSearch').value.trim().toLowerCase();
        var pj = document.getElementById('akFProject').value;
        var it = document.getElementById('akFIssue').value;
        var st = document.getElementById('akFStatus').value;

        return CustomerTicketData.getAllTickets().filter(function (t) {
            if (quickFilter === 'new' && ['New', 'Reopened'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'progress' && ['Assigned', 'In Progress', 'Waiting for Customer'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'resolved' && ['Resolved', 'Closed'].indexOf(t.status) === -1) return false;
            if (quickFilter === 'high' && ['High', 'Critical'].indexOf(t.priority) === -1) return false;
            if (pj && t.projectId !== pj) return false;
            if (it && t.issueType !== it) return false;
            if (st && t.status !== st) return false;
            if (q && (t.id + ' ' + t.subject + ' ' + t.customerName + ' ' + t.customerOrg).toLowerCase().indexOf(q) === -1) return false;
            return true;
        });
    }

    /* ---------- Table ---------- */
    function slaBadge(t) {
        var s = CustomerTicketData.slaState(t);
        var due = new Date(t.resolutionDueTs);
        var dueStr = due.toLocaleDateString([], { day: '2-digit', month: 'short' }) + ' ' +
            due.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        var dueHtml = '<div class="sla-due">Due ' + dueStr + '</div>';
        if (s === 'breached') return '<span class="badge rounded-pill" style="background:#fdebed;color:#be3035;font-size:10.5px;">Breached</span>' + dueHtml;
        if (s === 'at-risk') return '<span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;font-size:10.5px;">At Risk</span>' + dueHtml;
        return '<span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;font-size:10.5px;">On Track</span>' + dueHtml;
    }

    function renderTable() {
        var rows = getFiltered();
        document.getElementById('akCountBadge').textContent = rows.length;
        document.getElementById('akShown').textContent = rows.length;
        document.getElementById('akTotalCount').textContent = rows.length;

        var tbody = document.getElementById('akBody');
        if (!rows.length) {
            tbody.innerHTML = '<tr><td colspan="9" class="text-center text-muted py-4">No tickets match the current filters</td></tr>';
            return;
        }

        tbody.innerHTML = rows.map(function (t) {
            var st = CustomerTicketData.statusMeta(t.status);
            var pr = CustomerTicketData.priorityMeta(t.priority);
            var pj = CustomerTicketData.getProject(t.projectId);
            var pjStyle = pj ? 'background:' + pj.bg + ';color:' + pj.color + ';' : 'background:#f3f4f6;color:#475569;';
            
            // Action Column: Status "New" ah irundha 'Assign' Button, illana standard 'Manage' Button
            var actionBtnHtml = '';
            if (t.status.toLowerCase() === 'new') {
                actionBtnHtml = '<button class="btn btn-sm btn-primary btn-assign-ticket text-nowrap" data-id="' + t.id + '" style="font-size:11px; padding:3px 8px;"><i class="bi bi-person-plus me-1"></i>Assign</button>';
            } else {
                actionBtnHtml = '<button class="btn btn-action-icon btn-view-details" data-bs-toggle="tooltip" data-bs-title="Manage Ticket"><i class="bi bi-pencil-square"></i></button>';
            }

            return '<tr class="ak-row" data-id="' + t.id + '" style="cursor:pointer;">' +
                '<td><span class="fw-bold" style="color:#2563eb;">' + t.id + '</span>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + t.createdDate + '</div></td>' +
                '<td><div class="fw-bold" style="font-size:12.5px;">' + CustomerTicketData.escapeHtml(t.customerName) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + CustomerTicketData.escapeHtml(t.customerOrg) + '</div>' +
                (t.contactPhone ? '<div style="font-size:10.5px;color:#1d4ed8;"><i class="bi bi-telephone me-1"></i>' + CustomerTicketData.escapeHtml(t.contactPhone) + '</div>' : '') + '</td>' +
                '<td><span class="prj-chip" style="' + pjStyle + '"><span>' + t.projectIcon + '</span>' + CustomerTicketData.escapeHtml(t.projectName) + '</span></td>' +
                '<td><span style="font-size:13px;">' + t.issueIcon + '</span> <span style="font-size:12px;">' + CustomerTicketData.escapeHtml(t.issueType) + '</span></td>' +
                '<td><span class="tkt-priority-badge" style="background:' + pr.bg + ';color:' + pr.color + ';">' + t.priority + '</span></td>' +
                '<td style="font-size:12px;">' + (t.assignedTo
                    ? '<div class="fw-semibold">' + CustomerTicketData.escapeHtml(t.assignedTo) + '</div><div style="font-size:10px;color:var(--ink-500,#6b7684);">' + CustomerTicketData.escapeHtml(t.assignedTeam || '') + '</div>'
                    : '<span class="badge rounded-pill" style="background:#f3f4f6;color:#6b7280;font-size:10px;">Unassigned</span>') + '</td>' +
                '<td>' + slaBadge(t) + '</td>' +
                '<td><span class="tkt-status-badge" style="background:' + st.bg + ';color:' + st.color + ';"><i class="bi ' + st.icon + '"></i>' + t.status + '</span></td>' +
                '<td class="text-center">' + actionBtnHtml + '</td>' +
                '</tr>';
        }).join('');
    }

    /* ---------- Project-wise card ---------- */
    function renderProjects() {
        var wrap = document.getElementById('ctPrjList');
        var all = CustomerTicketData.getAllTickets();
        var rows = [];

        CustomerTicketData.projects.forEach(function (p) {
            var list = all.filter(function (t) { return t.projectId === p.id; });
            if (!list.length) return;
            var active = list.filter(function (t) { return ['Resolved', 'Closed'].indexOf(t.status) === -1; }).length;
            var unassigned = list.filter(function (t) { return !t.assignedTo; }).length;
            rows.push('<div class="attn-row ak-row" data-id="' + (list[0] ? list[0].id : '') + '">' +
                
                '<span style="font-size:15px;">' + p.icon + '</span>' +
                '<div class="min-w-0"><div class="fw-bold text-truncate" style="font-size:12px;">' + CustomerTicketData.escapeHtml(p.name) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + list.length + ' tickets · ' + active + ' active</div></div>' +
                (unassigned
                    ? '<span class="badge rounded-pill ms-auto" style="background:' + p.bg + ';color:' + p.color + ';font-size:9.5px;">' + unassigned + ' unassigned</span>'
                    : '<span class="badge rounded-pill ms-auto" style="background:#e7f7eb;color:#087a24;font-size:9.5px;">✓ clear</span>') +
                '</div>');
        });

        document.getElementById('akPrjBadge').textContent = rows.length;
        wrap.innerHTML = rows.length ? rows.join('') : '<div class="text-center text-muted py-3" style="font-size:12px;">No tickets yet</div>';
    }

    /* ---------- Team workload card ---------- */
    function renderTeams() {
        var wrap = document.getElementById('ctTeamList');
        var people = {};
        var maxActive = 1;

        Object.keys(CustomerTicketData.teams).forEach(function (team) {
            CustomerTicketData.teams[team].forEach(function (person) {
                var active = CustomerTicketData.getAllTickets().filter(function (t) {
                    return t.assignedTo === person && ['Resolved', 'Closed'].indexOf(t.status) === -1;
                }).length;
                people[person] = { team: team, active: active };
                if (active > maxActive) maxActive = active;
            });
        });

        wrap.innerHTML = Object.keys(people).map(function (person) {
            var s = people[person];
            var color = s.active >= 3 ? '#be3035' : (s.active >= 1 ? '#9a6200' : '#087a24');
            var pct = Math.round((s.active / maxActive) * 100);
            var initials = person.split(' ')[0][0];
            var teamColor = { 'Development': '#2563eb', 'Design': '#7c3aed', 'Support': '#087a24', 'QA': '#9a6200' }[s.team] || '#475569';
            return '<div class="attn-row" style="cursor:default;">' +
                '<span style="width:32px;height:32px;border-radius:50%;display:grid;place-items:center;font-size:13px;font-weight:800;color:#fff;background:' + teamColor + ';flex-shrink:0;">' + initials + '</span>' +
                '<div class="min-w-0 flex-grow-1"><div class="fw-bold text-truncate" style="font-size:12px;">' + CustomerTicketData.escapeHtml(person) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + s.team + '</div>' +
                '<div style="height:5px;border-radius:99px;background:#eef0f3;margin-top:5px;overflow:hidden;"><span style="display:block;height:100%;width:' + pct + '%;background:' + color + ';border-radius:99px;"></span></div></div>' +
                '<span class="badge rounded-pill ms-auto" style="background:' + color + '18;color:' + color + ';font-size:10px;">' + s.active + ' active</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- Needs attention card ---------- */
    function renderAttention() {
        var wrap = document.getElementById('ctAttnList');
        var items = [];

        CustomerTicketData.getAllTickets().forEach(function (t) {
            if (CustomerTicketData.slaState(t) === 'breached') {
                items.push({ t: t, label: 'SLA breached', color: '#be3035', bar: '#be3035' });
            } else if (CustomerTicketData.overdueState(t)) {
                items.push({ t: t, label: 'Past expected date', color: '#c2410c', bar: '#c2410c' });
            } else if (!t.assignedTo) {
                items.push({ t: t, label: 'Unassigned', color: '#2563eb', bar: '#2563eb' });
            } else if (t.status === 'Waiting for Customer') {
                items.push({ t: t, label: 'Waiting on customer', color: '#be185d', bar: '#be185d' });
            }
        });

        document.getElementById('akAttnBadge').textContent = items.length;

        if (!items.length) {
            wrap.innerHTML = '<div class="text-center text-muted py-3" style="font-size:12px;">All good — nothing pending 🎉</div>';
            return;
        }

        wrap.innerHTML = items.slice(0, 5).map(function (item) {
            return '<div class="attn-row ak-row" data-id="' + item.t.id + '">' +
                
                '<span style="font-size:15px;">' + item.t.projectIcon + '</span>' +
                '<div class="min-w-0"><div class="fw-bold text-truncate" style="font-size:12px;">' + item.t.id + ' · ' + CustomerTicketData.escapeHtml(item.t.subject) + '</div>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + CustomerTicketData.escapeHtml(item.t.customerName) + ' · ' + item.t.createdDate + '</div></div>' +
                '<span class="badge rounded-pill ms-auto" style="background:' + item.color + '15;color:' + item.color + ';font-size:9.5px;">' + item.label + '</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- Bug vs Change split ---------- */
    function renderSplit() {
        var s = CustomerTicketData.issueSplit();
        var total = s.bugs + s.changes + s.others || 1;
        document.getElementById('akSplitBugs').style.width = (s.bugs / total * 100) + '%';
        document.getElementById('akSplitChanges').style.width = (s.changes / total * 100) + '%';
        document.getElementById('akSplitOthers').style.width = (s.others / total * 100) + '%';
        document.getElementById('akBugsN').textContent = s.bugs;
        document.getElementById('akChangesN').textContent = s.changes;
        document.getElementById('akOthersN').textContent = s.others;
    }

    /* ---------- Manage modal ---------- */
    function avatarColor(name) {
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d', '#0ea5e9'];
        return colors[name.length % colors.length];
    }

    function renderChat(t) {
        var wrap = document.getElementById('amChat');
        var msgs = t.conversation || [];
        document.getElementById('amMsgCount').textContent = msgs.length + ' messages';
        wrap.innerHTML = msgs.map(function (m) {
            var isStaff = m.by === 'staff';
            var initials = m.name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
            return '<div class="cm-msg ' + (isStaff ? 'staff' : 'customer') + '">' +
                '<span class="m-av" style="background:' + avatarColor(m.name) + ';">' + initials + '</span>' +
                '<div><div class="m-meta">' + CustomerTicketData.escapeHtml(m.name) + ' · ' + CustomerTicketData.fmtTs(m.ts) + '</div>' +
                '<div class="m-bubble">' + CustomerTicketData.escapeHtml(m.text) +
                (m.attachment ? '<div class="m-att"><i class="bi bi-paperclip"></i>' + CustomerTicketData.escapeHtml(m.attachment) + '</div>' : '') +
                '</div></div></div>';
        }).join('');
        wrap.scrollTop = wrap.scrollHeight;
    }

    function fillTeamOptions(selectedTeam, selectedPerson) {
        var sel = document.getElementById('amTeam');
        sel.innerHTML = '<option value="">Select...</option>' +
            Object.keys(CustomerTicketData.teams).map(function (team) {
                return '<option ' + (team === selectedTeam ? 'selected' : '') + '>' + team + '</option>';
            }).join('');
        fillAssignees(selectedTeam, selectedPerson);
    }

    function fillAssignees(team, selected) {
        var sel = document.getElementById('amAssignee');
        if (!team || !CustomerTicketData.teams[team]) {
            sel.innerHTML = '<option value="">Select team first</option>';
            sel.disabled = true;
            return;
        }
        sel.disabled = false;
        sel.innerHTML = '<option value="">Select person...</option>' +
            CustomerTicketData.teams[team].map(function (p) {
                return '<option ' + (p === selected ? 'selected' : '') + '>' + p + '</option>';
            }).join('');
        if (selected) sel.value = selected;
    }

    function fillStatusOptions(t) {
        var sel = document.getElementById('amStatus');
        var opts = [t.status].concat(CustomerTicketData.allowedNextStatuses(t));
        sel.innerHTML = opts.map(function (s) { return '<option>' + s + '</option>'; }).join('');
        sel.value = t.status;
    }

    function openManage(id) {
        var t = CustomerTicketData.getTicket(id);
        if (!t) return;
        currentTicket = t;

        var st = CustomerTicketData.statusMeta(t.status);
        var pr = CustomerTicketData.priorityMeta(t.priority);

        document.getElementById('amId').textContent = t.id;
        document.getElementById('amSubject').textContent = t.subject;
        document.getElementById('amStatusBadge').textContent = t.status;
        document.getElementById('amStatusBadge').style.cssText = 'background:' + st.bg + ';color:' + st.color + ';';
        document.getElementById('amPriorityBadge').textContent = t.priority;
        document.getElementById('amPriorityBadge').style.cssText = 'background:' + pr.bg + ';color:' + pr.color + ';';

        document.getElementById('amCustomer').textContent = t.customerName + ' (' + t.customerOrg + ')';
        document.getElementById('amContactPerson').textContent = t.contactPerson || t.customerName;
        document.getElementById('amContactPhone').innerHTML = t.contactPhone
            ? '<a href="tel:' + CustomerTicketData.escapeHtml(t.contactPhone) + '" style="color:#1d4ed8;text-decoration:none;"><i class="bi bi-telephone me-1"></i>' + CustomerTicketData.escapeHtml(t.contactPhone) + '</a>'
            : '—';
        document.getElementById('amProject').textContent = t.projectIcon + ' ' + t.projectName;
        document.getElementById('amIssue').textContent = t.issueIcon + ' ' + t.issueType;
        document.getElementById('amCreated').textContent = t.createdDate;
        var due = new Date(t.resolutionDueTs);
        document.getElementById('amSla').textContent = due.toLocaleDateString([], { day: '2-digit', month: 'short' }) + ' · ' + due.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        document.getElementById('amExpected').textContent = t.expectedDate || '—';
        document.getElementById('amAttachment').innerHTML = t.attachment
            ? '<span style="color:#1d4ed8;"><i class="bi bi-paperclip me-1"></i>' + CustomerTicketData.escapeHtml(t.attachment) + '</span>'
            : '—';
        document.getElementById('amDesc').textContent = t.description;

        document.getElementById('amPriority').value = t.priority;
        document.getElementById('amReply').value = '';
        fillTeamOptions(t.assignedTeam, t.assignedTo);
        fillStatusOptions(t);
        renderChat(t);

        modal.show();
    }

    document.getElementById('amTeam').addEventListener('change', function () {
        fillAssignees(this.value, '');
    });

    function sendReplyOnly() {
        if (!currentTicket) return;
        var input = document.getElementById('amReply');
        var text = input.value.trim();
        if (!text) return;
        var sender = document.getElementById('amAssignee').value || 'Support Team';
        CustomerTicketData.addReply(currentTicket.id, text, null, true, sender);
        input.value = '';
        input.style.height = 'auto';
        currentTicket = CustomerTicketData.getTicket(currentTicket.id);
        renderChat(currentTicket);
        showToast('Reply sent on ' + currentTicket.id);
    }

    document.getElementById('amSendBtn').addEventListener('click', sendReplyOnly);
    document.getElementById('amReply').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendReplyOnly(); }
    });
    document.getElementById('amReply').addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 130) + 'px';
    });

    document.getElementById('amUpdateBtn').addEventListener('click', function () {
        if (!currentTicket) return;
        var team = document.getElementById('amTeam').value;
        var assignee = document.getElementById('amAssignee').value;
        var newStatus = document.getElementById('amStatus').value;
        var priority = document.getElementById('amPriority').value;

        var updates = {
            assignedTeam: team || null,
            assignedTo: assignee || null,
            priority: priority,
            status: newStatus
        };

        if (newStatus === 'Resolved' && currentTicket.status !== 'Resolved') {
            updates.resolvedTs = new Date().toISOString();
        }
        if (newStatus === 'Reopened') {
            updates.resolvedTs = null;
        }

        CustomerTicketData.updateTicket(currentTicket.id, updates);
        modal.hide();
        refresh();
        showToast(currentTicket.id + ' updated');
    });

    /* ---------- Events ---------- */
    document.addEventListener('click', function (e) {
        // Quick Assign button event
        var assignBtn = e.target.closest('.btn-assign-ticket');
        if (assignBtn) {
            e.stopPropagation(); // Row click event trigger aagamarukka
            var ticketId = assignBtn.getAttribute('data-id');
            document.getElementById('assignTicketId').value = ticketId;
            document.getElementById('profileDropdown').value = '';
            quickAssignModal.show();
            return;
        }

        // Row click event (Open manage modal)
        var row = e.target.closest('.ak-row');
        if (row && row.getAttribute('data-id')) openManage(row.getAttribute('data-id'));
    });

    // Save Assign Action
    document.getElementById('saveAssignBtn').addEventListener('click', function () {
        var ticketId = document.getElementById('assignTicketId').value;
        var selectedPerson = document.getElementById('profileDropdown').value;

        if (!selectedPerson) {
            alert('Please select a person to assign!');
            return;
        }

        CustomerTicketData.updateTicket(ticketId, {
            assignedTo: selectedPerson,
            status: 'Assigned' // Assign senjakapram status ah "Assigned" nu maathugiron
        });

        quickAssignModal.hide();
        refresh();
        showToast(ticketId + ' assigned to ' + selectedPerson);
    });

    document.getElementById('akSearch').addEventListener('input', renderTable);
    ['akFProject', 'akFIssue', 'akFStatus'].forEach(function (id) {
        document.getElementById(id).addEventListener('change', renderTable);
    });

    document.querySelectorAll('.cta-kpi').forEach(function (k) {
        k.addEventListener('click', function () {
            var jump = k.getAttribute('data-jump');
            quickFilter = (quickFilter === jump) ? '' : jump;
            document.querySelectorAll('.cta-kpi').forEach(function (x) { x.classList.remove('active'); });
            if (quickFilter) k.classList.add('active');
            renderTable();
        });
    });

    function refresh() {
        renderKpis();
        renderTable();
        renderProjects();
        renderTeams();
        renderAttention();
        renderSplit();
    }

    populateFilters();
    refresh();

    /* Sidebar quick-filter links (New / In Progress / Resolved / High-Critical) */
    var sidebarFilter = null;
    try { sidebarFilter = sessionStorage.getItem('ctQuickFilter'); sessionStorage.removeItem('ctQuickFilter'); } catch (e) { /* ignore */ }
    if (sidebarFilter) {
        quickFilter = sidebarFilter;
        document.querySelectorAll('.cta-kpi').forEach(function (k) {
            if (k.getAttribute('data-jump') === quickFilter) k.classList.add('active');
        });
        renderTable();
    }

    /* Deep link: cticket-admin.php?ticket=TKT-2001 */
    var params = new URLSearchParams(window.location.search);
    if (params.get('ticket')) openManage(params.get('ticket'));
})();
