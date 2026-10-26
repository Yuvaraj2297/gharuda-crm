/**
 * Gharuda CRM - My Tickets Page Script
 * File: assets/js/pages/my-tickets.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
    'use strict';

    var modalEl = document.getElementById('ticketViewModal');
    var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
    var currentTicket = null;
    var replyFileName = null;

    var activeFilter = 'all';
    var currentPage = 1;

    /* ---------- KPI counts ---------- */
    function renderKpis() {
        var mine = TicketingData.getMyTickets();
        var open = 0, progress = 0, resolved = 0;
        mine.forEach(function (t) {
            if (['Open', 'Assigned', 'Rejected', 'Cancelled', 'Reopened'].indexOf(t.status) !== -1) open++;
            else if (['In Progress', 'Waiting for Employee'].indexOf(t.status) !== -1) progress++;
            else resolved++;
        });
        document.getElementById('mtkAll').textContent = mine.length;
        document.getElementById('mtkOpen').textContent = open;
        document.getElementById('mtkProgress').textContent = progress;
        document.getElementById('mtkResolved').textContent = resolved;
    }

    /* ---------- Select2 filters (self-healing init) ---------- */
    var TICKET_CATEGORIES = TicketingData.categories.map(function (c) {
        return { id: c.name, text: c.icon + ' ' + c.name };
    });
    var TICKET_STATUSES = ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Resolved', 'Closed', 'Reopened', 'Rejected', 'Cancelled']
        .map(function (s) { return { id: s, text: s }; });

    function buildTicketSelect2(selector, options, width) {
        var $sel = $(selector);
        if (!$sel.length || !$.fn.select2) return;
        var el = $sel[0];
        var healing = false;

        function rebuildOptions() {
            el.innerHTML = '';
            options.forEach(function (item) {
                var o = document.createElement('option');
                o.value = item.id;
                o.textContent = item.text;
                el.appendChild(o);
            });
        }

        function setup() {
            healing = true;
            if ($sel.hasClass('select2-hidden-accessible')) $sel.select2('destroy');
            rebuildOptions();
            /* dropdownParent: body — the table card has overflow-hidden, which
               clips the default in-container dropdown and hides all options */
            $sel.select2({ width: width, dropdownParent: $(document.body), minimumResultsForSearch: 5 });
            $sel.val(options[0].id).trigger('change');
            healing = false;
        }

        setup();

        /* Self-heal: if any external script wipes the options after init,
           rebuild + re-init immediately (before the user can click) */
        var mo = new MutationObserver(function () {
            if (healing) return;
            if (el.querySelectorAll('option').length < options.length) {
                mo.disconnect();
                setup();
                mo.observe(el, { childList: true });
            }
        });
        mo.observe(el, { childList: true });
    }

    function initSelect2Filters() {
        if (!window.jQuery || !$.fn.select2) return; // native selects remain as fallback
        buildTicketSelect2('#mtkCategoryFilter', [{ id: '', text: 'All Categories' }].concat(TICKET_CATEGORIES), '190px');
        buildTicketSelect2('#mtkStatusFilter', [{ id: '', text: 'All Statuses' }].concat(TICKET_STATUSES), '175px');
    }

    /* ---------- Table ---------- */
    function getFiltered() {
        var q = document.getElementById('mtkSearch').value.trim().toLowerCase();
        var cat = document.getElementById('mtkCategoryFilter').value;
        var st = document.getElementById('mtkStatusFilter').value;

        return TicketingData.getMyTickets().filter(function (t) {
            if (activeFilter === 'open' && ['Open', 'Assigned', 'Reopened', 'Rejected', 'Cancelled'].indexOf(t.status) === -1) return false;
            if (activeFilter === 'progress' && ['In Progress', 'Waiting for Employee'].indexOf(t.status) === -1) return false;
            if (activeFilter === 'resolved' && ['Resolved', 'Closed'].indexOf(t.status) === -1) return false;
            if (cat && t.category !== cat) return false;
            if (st && t.status !== st) return false;
            if (q && (t.subject + ' ' + t.id).toLowerCase().indexOf(q) === -1) return false;
            return true;
        });
    }

    function slaBadgeHtml(t) {
        var s = TicketingData.slaState(t);
        if (s === 'breached') return '<span class="badge rounded-pill" style="background:#fdebed;color:#be3035;font-size:10.5px;">Breached</span>';
        if (s === 'at-risk') return '<span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;font-size:10.5px;">At Risk</span>';
        return '<span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;font-size:10.5px;">On Track</span>';
    }

    function renderTable() {
        var rows = getFiltered();
        var pageSize = parseInt(document.getElementById('mtkShow').value, 10) || 10;
        var totalPages = Math.max(1, Math.ceil(rows.length / pageSize));
        if (currentPage > totalPages) currentPage = totalPages;
        var start = (currentPage - 1) * pageSize;
        var pageRows = rows.slice(start, start + pageSize);

        var tbody = document.getElementById('mtkBody');
        if (!pageRows.length) {
            tbody.innerHTML = '<tr><td colspan="9"><div class="mtk-empty">' +
                '<div class="empty-icon"><i class="bi bi-ticket-perforated"></i></div>' +
                '<div class="fw-bold" style="font-family:\'Sora\',sans-serif;">No tickets found</div>' +
                '<div style="font-size:12px;color:var(--ink-500,#6b7684);">Create a ticket and it will appear here.</div></div></td></tr>';
        } else {
            tbody.innerHTML = pageRows.map(function (t) {
                var st = TicketingData.statusMeta(t.status);
                var pr = TicketingData.priorityMeta(t.priority);
                return '<tr>' +
                    '<td><a href="javascript:void(0);" class="fw-bold text-primary text-decoration-none tkt-open" data-id="' + t.id + '">' + t.id + '</a></td>' +
                    '<td><span style="font-size:13px;">' + t.categoryIcon + '</span> <span class="fw-semibold" style="font-size:12.5px;">' + TicketingData.escapeHtml(t.category) + '</span></td>' +
                    '<td style="max-width:220px;" class="text-truncate fw-semibold" title="' + TicketingData.escapeHtml(t.subject) + '">' + TicketingData.escapeHtml(t.subject) + '</td>' +
                    '<td><span class="tkt-priority-badge" style="background:' + pr.bg + ';color:' + pr.color + ';">' + t.priority + '</span></td>' +
                    '<td style="font-size:12.5px;">' + (t.assignedTo ? TicketingData.escapeHtml(t.assignedTo) : '<span class="text-muted">—</span>') + '</td>' +
                    '<td>' + slaBadgeHtml(t) + '</td>' +
                    '<td><span class="tkt-status-badge" style="background:' + st.bg + ';color:' + st.color + ';"><i class="bi ' + st.icon + '"></i>' + t.status + '</span></td>' +
                    '<td style="font-size:12.5px;">' + t.createdDate + '</td>' +
                    '<td class="text-center"><button class="btn btn-action-icon btn-primary btn-view-details tkt-open" data-id="' + t.id + '" data-bs-toggle="tooltip" data-bs-title="View Ticket"><i class="bi bi-eye"></i></button></td>' +
                    '</tr>';
            }).join('');
        }

        document.getElementById('mtkTotal').textContent = rows.length;
        document.getElementById('mtkStart').textContent = rows.length ? start + 1 : 0;
        document.getElementById('mtkEnd').textContent = rows.length ? start + pageRows.length : 0;
        renderPagination(totalPages);
        initTooltips();
    }

    function renderPagination(totalPages) {
        var pgList = document.getElementById('mtkPgList');
        pgList.innerHTML = '';
        function add(label, page, opts) {
            opts = opts || {};
            var li = document.createElement('li');
            li.className = 'page-item' + (opts.active ? ' active' : '') + (opts.disabled ? ' disabled' : '');
            var a = document.createElement('a');
            a.className = 'page-link'; a.href = '#'; a.innerHTML = label;
            if (!opts.disabled) {
                a.addEventListener('click', function (e) { e.preventDefault(); currentPage = page; renderTable(); });
            }
            li.appendChild(a); pgList.appendChild(li);
        }
        add('<i class="bi bi-chevron-left"></i>', currentPage - 1, { disabled: currentPage === 1 });
        for (var p = 1; p <= totalPages; p++) add(String(p), p, { active: p === currentPage });
        add('<i class="bi bi-chevron-right"></i>', currentPage + 1, { disabled: currentPage === totalPages });
    }

    function initTooltips() {
        document.querySelectorAll('#myTicketsTable [data-bs-toggle="tooltip"]').forEach(function (el) {
            var ex = bootstrap.Tooltip.getInstance(el); if (ex) ex.dispose();
            new bootstrap.Tooltip(el, { trigger: 'hover' });
        });
    }

    /* ---------- Ticket view modal ---------- */
    var STEP_CAPTIONS = {
        'Open': 'Ticket submitted',
        'Assigned': 'Assigned to department',
        'In Progress': 'Being worked on',
        'Waiting for Employee': 'Awaiting your reply',
        'Resolved': 'Issue resolved',
        'Closed': 'Ticket archived'
    };

    function buildStepper(t) {
        var wrap = document.getElementById('tvmStepper');
        var special = ['Rejected', 'Cancelled', 'Reopened'];
        if (special.indexOf(t.status) !== -1) {
            var cls = t.status.toLowerCase();
            var notes = {
                'Rejected': t.rejectNote || 'This ticket was rejected by the helpdesk team.',
                'Cancelled': t.rejectNote || 'This ticket was cancelled.',
                'Reopened': 'Ticket reopened — back with the support team.'
            };
            wrap.innerHTML = '<div class="tkt-status-banner ' + cls + '">' +
                '<span class="sb-icon"><i class="bi ' + TicketingData.statusMeta(t.status).icon + '"></i></span>' +
                '<div><div class="sb-title">' + t.status + '</div>' +
                '<div class="sb-note">' + TicketingData.escapeHtml(notes[t.status] || '') + '</div></div>' +
                '</div>';
            return;
        }
        var idx = TicketingData.statusFlow.indexOf(t.status);
        wrap.innerHTML = TicketingData.statusFlow.map(function (s, i) {
            var cls = i < idx ? 'done' : (i === idx ? 'current' : '');
            var dot = i < idx ? '<i class="bi bi-check-lg"></i>' : '';
            var caption = (i === idx) ? (STEP_CAPTIONS[s] || '') : '';
            return '<div class="tkt-step ' + cls + '">' +
                '<span class="st-dot">' + dot + '</span>' +
                '<span class="st-info"><span class="st-label">' + s + '</span>' +
                (caption ? '<span class="st-caption">' + caption + '</span>' : '') +
                '</span></div>';
        }).join('');
    }

    function avatarFor(name) {
        var initials = name.split(' ').map(function (p) { return p[0]; }).slice(0, 2).join('').toUpperCase();
        var colors = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d'];
        var color = colors[name.length % colors.length];
        return '<span class="tkt-avatar" style="background:' + color + ';">' + TicketingData.escapeHtml(initials) + '</span>';
    }

    function renderChat(t) {
        var chat = document.getElementById('tvmChat');
        document.getElementById('tvmChatCount').textContent =
            t.conversation.length + (t.conversation.length === 1 ? ' message' : ' messages');
        chat.innerHTML = t.conversation.map(function (m) {
            var att = m.attachment
                ? '<span class="msg-attachment"><i class="bi bi-paperclip"></i>' + TicketingData.escapeHtml(m.attachment) + '</span>'
                : '';
            return '<div class="tkt-msg ' + m.by + '">' + avatarFor(m.name) +
                '<div class="tkt-msg-main">' +
                    '<div class="msg-meta">' + TicketingData.escapeHtml(m.name) + ' · ' + TicketingData.fmtTs(m.ts) + '</div>' +
                    '<div class="msg-bubble">' + TicketingData.escapeHtml(m.text) + att + '</div>' +
                '</div>' +
                '</div>';
        }).join('');
        chat.scrollTop = chat.scrollHeight;
    }

    function resetComposer() {
        replyFileName = null;
        var fileBtn = document.getElementById('tvmReplyFileBtn');
        fileBtn.classList.remove('has-file');
        fileBtn.innerHTML = '<i class="bi bi-paperclip"></i>';
        document.getElementById('tvmReplyFile').value = '';
        var input = document.getElementById('tvmReplyText');
        input.value = '';
        input.style.height = 'auto';
    }

    function openTicket(id) {
        var t = TicketingData.getTicket(id);
        if (!t) return;
        currentTicket = t;
        resetComposer();

        var st = TicketingData.statusMeta(t.status);
        var pr = TicketingData.priorityMeta(t.priority);
        var sla = TicketingData.slaState(t);

        document.getElementById('tvmTicketId').textContent = t.id;
        document.getElementById('tvmSubject').textContent = t.subject;
        document.getElementById('tvmStatusBadge').textContent = t.status;
        document.getElementById('tvmStatusBadge').style.cssText = 'background:' + st.bg + ';color:' + st.color + ';';
        document.getElementById('tvmPriorityBadge').textContent = t.priority;
        document.getElementById('tvmPriorityBadge').style.cssText = 'background:' + pr.bg + ';color:' + pr.color + ';';

        var slaBadge = document.getElementById('tvmSlaBadge');
        slaBadge.textContent = sla === 'breached' ? 'SLA Breached' : (sla === 'at-risk' ? 'SLA At Risk' : 'SLA On Track');
        slaBadge.style.background = sla === 'breached' ? '#fdebed' : (sla === 'at-risk' ? '#fff4d9' : '#e7f7eb');
        slaBadge.style.color = sla === 'breached' ? '#be3035' : (sla === 'at-risk' ? '#9a6200' : '#087a24');

        document.getElementById('tvmDescription').textContent = t.description;
        document.getElementById('tvmCategory').textContent = t.categoryIcon + ' ' + t.category;
        document.getElementById('tvmSubCategory').textContent = t.subCategory;
        document.getElementById('tvmCreatedBy').textContent = t.createdBy + ' (' + t.createdByEmp + ')';
        document.getElementById('tvmAssignedTo').textContent = t.assignedTo || 'Not yet assigned';
        document.getElementById('tvmCreatedDate').textContent = t.createdDate;
        document.getElementById('tvmContact').textContent = t.preferredContact;
        document.getElementById('tvmResolutionDue').textContent = TicketingData.fmtTs(t.resolutionDueTs);
        /* truncated values → full text on hover */
        ['tvmCategory', 'tvmSubCategory', 'tvmCreatedBy', 'tvmAssignedTo', 'tvmCreatedDate', 'tvmContact', 'tvmResolutionDue'].forEach(function (mid) {
            var el = document.getElementById(mid);
            el.setAttribute('title', el.textContent);
        });
        document.getElementById('tvmAttachment').innerHTML = t.attachment
            ? '<span style="color:#3564e0;"><i class="bi bi-paperclip me-1"></i>' + TicketingData.escapeHtml(t.attachment) + '</span>'
            : '—';

        buildStepper(t);
        renderChat(t);

        /* Resolved → Reopen button for employee */
        var resActions = document.getElementById('tvmResolvedActions');
        resActions.style.display = 'none';
        resActions.innerHTML = '';
        if (t.status === 'Resolved') {
            resActions.style.display = 'flex';
            resActions.innerHTML = '<button type="button" class="btn btn-outline-warning btn-sm" id="tvmReopenBtn">' +
                '<i class="bi bi-arrow-counterclockwise me-1"></i> Reopen Ticket</button>';
            document.getElementById('tvmReopenBtn').addEventListener('click', function () {
                TicketingData.updateTicket(t.id, { status: 'Reopened' });
                modal.hide();
                refresh();
            });
        }

        modal.show();
    }

    document.getElementById('tvmSendReply').addEventListener('click', function () {
        var input = document.getElementById('tvmReplyText');
        var text = input.value.trim();
        if (!text || !currentTicket) return;
        TicketingData.addReply(currentTicket.id, text, replyFileName, false);
        resetComposer();
        openTicket(currentTicket.id);
        renderKpis();
        renderTable();
    });

    /* Enter = send, Shift+Enter = new line */
    document.getElementById('tvmReplyText').addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            document.getElementById('tvmSendReply').click();
        }
    });

    /* Composer auto-grow */
    document.getElementById('tvmReplyText').addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = Math.min(this.scrollHeight, 130) + 'px';
    });

    document.getElementById('tvmReplyFileBtn').addEventListener('click', function () {
        document.getElementById('tvmReplyFile').click();
    });
    document.getElementById('tvmReplyFile').addEventListener('change', function (e) {
        replyFileName = e.target.files.length ? e.target.files[0].name : null;
        var fileBtn = document.getElementById('tvmReplyFileBtn');
        if (replyFileName) {
            fileBtn.classList.add('has-file');
            fileBtn.innerHTML = '<i class="bi bi-paperclip"></i>' + TicketingData.escapeHtml(replyFileName);
        } else {
            fileBtn.classList.remove('has-file');
            fileBtn.innerHTML = '<i class="bi bi-paperclip"></i>';
        }
    });

    /* ---------- Events ---------- */
    document.getElementById('mtkBody').addEventListener('click', function (e) {
        var btn = e.target.closest('.tkt-open');
        if (btn) openTicket(btn.getAttribute('data-id'));
    });

    document.getElementById('mtkSearch').addEventListener('input', function () { currentPage = 1; renderTable(); });
    /* Select2 fires change via jQuery — bind with jQuery so it fires reliably */
    $('#mtkCategoryFilter, #mtkStatusFilter').on('change', function () { currentPage = 1; renderTable(); });
    document.getElementById('mtkShow').addEventListener('change', function () { currentPage = 1; renderTable(); });

    document.querySelectorAll('.mtk-kpi').forEach(function (k) {
        k.addEventListener('click', function () {
            document.querySelectorAll('.mtk-kpi').forEach(function (x) { x.classList.remove('active'); });
            k.classList.add('active');
            activeFilter = k.getAttribute('data-filter');
            currentPage = 1;
            renderTable();
        });
    });

    document.getElementById('mtkResetBtn').addEventListener('click', function () {
        TicketingData.resetDemoData();
        refresh();
    });

    function refresh() {
        renderKpis();
        renderTable();
    }

    /* ---------- Init ---------- */
    /* Init select2 on jQuery ready — after every global script has run */
    if (window.jQuery) {
        $(function () { initSelect2Filters(); });
    }

    /* Deep-link: my-tickets.php?ticket=TKT-1001 */
    var params = new URLSearchParams(window.location.search);
    refresh();
    if (params.get('ticket')) openTicket(params.get('ticket'));
})();
