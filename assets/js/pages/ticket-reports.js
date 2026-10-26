/**
 * Gharuda CRM - Ticket Reports Page Script
 * File: assets/js/pages/ticket-reports.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
    'use strict';

    var BAR_COLORS = ['#3564e0', '#7c3aed', '#087a24', '#9a6200', '#be3035', '#be185d', '#0e7490', '#4d7c0f', '#c2410c', '#334155', '#6d28d9', '#15803d', '#b45309', '#9f1239', '#475569'];

    function barsHtml(items, colorize) {
        var max = Math.max.apply(null, items.map(function (i) { return i.value; }).concat([1]));
        return items.map(function (item, idx) {
            var pct = Math.round((item.value / max) * 100);
            var color = colorize ? colorize(item, idx) : BAR_COLORS[idx % BAR_COLORS.length];
            return '<div class="tr-bar-row">' +
                '<span class="b-label" title="' + TicketingData.escapeHtml(item.label) + '">' + item.icon + ' ' + TicketingData.escapeHtml(item.label) + '</span>' +
                '<div class="b-track"><div class="b-fill" style="width:' + pct + '%;background:' + color + ';"></div></div>' +
                '<span class="b-val">' + item.value + '</span>' +
                '</div>';
        }).join('');
    }

    /* ---------- KPIs ---------- */
    function renderKpis() {
        var all = TicketingData.getAllTickets();
        var c = TicketingData.counts();
        document.getElementById('trTotal').textContent = c.total;
        document.getElementById('trPending').textContent = c.pending;
        document.getElementById('trResolved').textContent = c.resolved + c.closed;
        document.getElementById('trReopened').textContent = c.reopened;
        document.getElementById('trBreached').textContent = c.breached;
        document.getElementById('trAvg').textContent = TicketingData.avgResolutionHours() + 'h';
    }

    /* ---------- Category-wise ---------- */
    function renderCategoryBars() {
        var all = TicketingData.getAllTickets();
        var map = {};
        all.forEach(function (t) { map[t.category] = (map[t.category] || 0) + 1; });
        var items = Object.keys(map).map(function (name) {
            var cat = TicketingData.getCategoryByName(name);
            return { label: name, value: map[name], icon: cat ? cat.icon : '📢' };
        }).sort(function (a, b) { return b.value - a.value; });
        document.getElementById('trCategoryBars').innerHTML = barsHtml(items);
    }

    /* ---------- Priority-wise ---------- */
    function renderPriorityBars() {
        var all = TicketingData.getAllTickets();
        var colors = { 'Low': '#087a24', 'Medium': '#d97706', 'High': '#ea580c', 'Urgent': '#be3035' };
        var items = ['Low', 'Medium', 'High', 'Urgent'].map(function (p) {
            return {
                label: p,
                value: all.filter(function (t) { return t.priority === p; }).length,
                icon: '●'
            };
        });
        document.getElementById('trPriorityBars').innerHTML = barsHtml(items, function (item) { return colors[item.label]; });
    }

    /* ---------- Department-wise ---------- */
    function renderDeptBars() {
        var all = TicketingData.getAllTickets();
        var colors = { 'HR': '#3564e0', 'IT': '#7c3aed', 'Payroll': '#087a24', 'Finance': '#9a6200', 'Admin': '#be185d' };
        var items = Object.keys(colors).map(function (dept) {
            return {
                label: dept,
                value: all.filter(function (t) {
                    var cat = TicketingData.getCategoryByName(t.category);
                    return (t.assignedDept === dept) || (!t.assignedDept && cat && cat.dept === dept);
                }).length,
                icon: '●'
            };
        });
        document.getElementById('trDeptBars').innerHTML = barsHtml(items, function (item) { return colors[item.label]; });
    }

    /* ---------- Status distribution ---------- */
    function renderStatusBars() {
        var all = TicketingData.getAllTickets();
        var statuses = ['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Resolved', 'Closed', 'Reopened', 'Rejected'];
        var items = statuses.map(function (s) {
            return {
                label: s,
                value: all.filter(function (t) { return t.status === s; }).length,
                icon: '●'
            };
        }).filter(function (i) { return i.value > 0; });
        document.getElementById('trStatusBars').innerHTML = items.length
            ? barsHtml(items, function (item, idx) {
                var meta = TicketingData.statusMeta(item.label);
                return meta.color;
            })
            : '<div class="text-center text-muted py-3" style="font-size:12px;">No tickets</div>';
    }

    /* ---------- Employee-wise ---------- */
    function renderEmployeeTable() {
        var all = TicketingData.getAllTickets();
        var map = {};
        all.forEach(function (t) {
            var key = t.createdByEmp;
            if (!map[key]) map[key] = { name: t.createdBy, emp: t.createdByEmp, total: 0, open: 0, resolved: 0 };
            map[key].total++;
            if (['Open', 'Assigned', 'In Progress', 'Waiting for Employee', 'Reopened'].indexOf(t.status) !== -1) map[key].open++;
            if (['Resolved', 'Closed'].indexOf(t.status) !== -1) map[key].resolved++;
        });
        var rows = Object.keys(map).map(function (k) { return map[k]; })
            .sort(function (a, b) { return b.total - a.total; });

        document.getElementById('trEmployeeRows').innerHTML = rows.map(function (r) {
            return '<tr>' +
                '<td>' + TicketingData.escapeHtml(r.name) + ' <span class="text-muted" style="font-size:10.5px;">(' + r.emp + ')</span></td>' +
                '<td class="num">' + r.total + '</td>' +
                '<td class="num" style="color:#9a6200;">' + r.open + '</td>' +
                '<td class="num" style="color:#087a24;">' + r.resolved + '</td>' +
                '</tr>';
        }).join('') || '<tr><td colspan="4" class="text-center text-muted py-3">No data</td></tr>';
    }

    /* ---------- SLA breached table ---------- */
    function renderSlaTable() {
        var breached = TicketingData.getAllTickets().filter(function (t) {
            return TicketingData.slaState(t) === 'breached';
        });
        var body = document.getElementById('trSlaRows');
        if (!breached.length) {
            body.innerHTML = '<tr><td colspan="4" class="text-center text-muted py-3">No SLA breaches 🎉</td></tr>';
            return;
        }
        body.innerHTML = breached.map(function (t) {
            var overdueHrs = Math.round((Date.now() - new Date(t.resolutionDueTs).getTime()) / 3600000 * 10) / 10;
            return '<tr>' +
                '<td><a href="ticket-dashboard.php?ticket=' + t.id + '" class="text-primary fw-bold text-decoration-none">' + t.id + '</a>' +
                '<div style="font-size:10.5px;color:var(--ink-500,#6b7684);">' + TicketingData.escapeHtml(t.subject) + '</div></td>' +
                '<td><span class="badge rounded-pill" style="background:' + TicketingData.priorityMeta(t.priority).bg + ';color:' + TicketingData.priorityMeta(t.priority).color + ';font-size:10px;">' + t.priority + '</span></td>' +
                '<td>' + t.createdDate + '</td>' +
                '<td class="num" style="color:#be3035;">' + overdueHrs + ' hrs</td>' +
                '</tr>';
        }).join('');
    }

    /* ---------- Monthly report ---------- */
    function renderMonthly() {
        var all = TicketingData.getAllTickets();
        var map = {};
        all.forEach(function (t) {
            var d = new Date(t.createdTs);
            var key = d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0');
            if (!map[key]) map[key] = { label: d.toLocaleString('en', { month: 'long', year: 'numeric' }), created: 0, resolved: 0, reopened: 0, breached: 0, resHours: [], };
            map[key].created++;
            if (t.status === 'Reopened') map[key].reopened++;
            if (TicketingData.slaState(t) === 'breached') map[key].breached++;
            if (t.resolvedTs) {
                map[key].resolved++;
                map[key].resHours.push((new Date(t.resolvedTs) - new Date(t.createdTs)) / 3600000);
            }
        });

        var keys = Object.keys(map).sort().reverse();
        document.getElementById('trMonthlyRows').innerHTML = keys.map(function (k) {
            var m = map[k];
            var avg = m.resHours.length
                ? Math.round(m.resHours.reduce(function (a, b) { return a + b; }, 0) / m.resHours.length * 10) / 10
                : '—';
            return '<tr>' +
                '<td>' + m.label + '</td>' +
                '<td class="num">' + m.created + '</td>' +
                '<td class="num" style="color:#087a24;">' + m.resolved + '</td>' +
                '<td class="num" style="color:#c2410c;">' + m.reopened + '</td>' +
                '<td class="num" style="color:#be3035;">' + m.breached + '</td>' +
                '<td class="num">' + avg + '</td>' +
                '</tr>';
        }).join('') || '<tr><td colspan="6" class="text-center text-muted py-3">No data</td></tr>';
    }

    /* ---------- Export (CSV) ---------- */
    function exportCsv() {
        var all = TicketingData.getAllTickets();
        var headers = ['Ticket ID', 'Employee', 'Emp ID', 'Category', 'Sub Category', 'Subject', 'Priority', 'Status', 'Assigned Dept', 'Assigned To', 'Created', 'Resolution Due', 'SLA State'];
        var lines = [headers.join(',')];
        all.forEach(function (t) {
            lines.push([
                t.id, '"' + t.createdBy + '"', t.createdByEmp, t.category, '"' + t.subCategory + '"', '"' + t.subject + '"',
                t.priority, t.status, t.assignedDept || '', '"' + (t.assignedTo || '') + '"',
                t.createdDate, TicketingData.fmtTs(t.resolutionDueTs), TicketingData.slaState(t)
            ].join(','));
        });
        var blob = new Blob(['\ufeff' + lines.join('\n')], { type: 'text/csv' });
        var a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'ticket-report-' + new Date().toISOString().slice(0, 10) + '.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }

    document.getElementById('trExportBtn').addEventListener('click', exportCsv);

    /* ---------- Init ---------- */
    renderKpis();
    renderCategoryBars();
    renderPriorityBars();
    renderDeptBars();
    renderStatusBars();
    renderEmployeeTable();
    renderSlaTable();
    renderMonthly();
})();
