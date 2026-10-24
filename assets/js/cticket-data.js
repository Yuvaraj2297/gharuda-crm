/**
 * CustomerTicketData — shared data layer for the Customer Self-Service
 * Project Support Ticketing module.
 * Demo prototype: all state kept in localStorage so the Customer pages and
 * the Company/Admin pages stay in sync without a backend.
 */
var CustomerTicketData = (function () {
    'use strict';

    var STORE_KEY = 'gh_cticket_tickets_v1';
    var SEQ_KEY = 'gh_cticket_seq_v1';
    var PROJECTS_KEY = 'gh_cticket_projects_v1';

    /* ================= Projects ================= */
    var projects = [
        { id: 'jails-court', name: 'Jails Court Project', icon: '⚖️', color: '#3564e0', bg: '#eaf1ff' },
        { id: 'hrms',        name: 'HRMS Portal',        icon: '🖥️', color: '#087a24', bg: '#e7f7eb' },
        { id: 'crm',         name: 'CRM Application',    icon: '🤝', color: '#7c3aed', bg: '#ede9fe' },
        { id: 'website',     name: 'Corporate Website',  icon: '🌐', color: '#9a6200', bg: '#fff4d9' },
        { id: 'mobile',      name: 'Mobile App',         icon: '📱', color: '#be185d', bg: '#fce7f3' }
    ];

    /* ================= Issue types ================= */
    var issueTypes = [
        { id: 'bug',         icon: '🐞', name: 'Bug / Error',         sla: { response: '1 hr',  resolution: '4 hrs',  responseHrs: 1,  resolutionHrs: 4 } },
        { id: 'technical',   icon: '🔧', name: 'Technical Issue',     sla: { response: '2 hrs', resolution: '1 Day',  responseHrs: 2,  resolutionHrs: 24 } },
        { id: 'ui',          icon: '🎨', name: 'UI / Design Issue',   sla: { response: '8 hrs', resolution: '3 Days', responseHrs: 8,  resolutionHrs: 72 } },
        { id: 'access',      icon: '🔐', name: 'Access / Login Issue',sla: { response: '2 hrs', resolution: '8 hrs',  responseHrs: 2,  resolutionHrs: 8 } },
        { id: 'data',        icon: '📊', name: 'Data Issue',          sla: { response: '4 hrs', resolution: '1 Day',  responseHrs: 4,  resolutionHrs: 24 } },
        { id: 'integration', icon: '🔄', name: 'Integration Issue',   sla: { response: '4 hrs', resolution: '2 Days', responseHrs: 4,  resolutionHrs: 48 } },
        { id: 'change',      icon: '💡', name: 'Change Request',      sla: { response: '24 hrs', resolution: '5 Days', responseHrs: 24, resolutionHrs: 120 } },
        { id: 'feature',     icon: '➕', name: 'New Feature Request', sla: { response: '48 hrs', resolution: '10 Days', responseHrs: 48, resolutionHrs: 240 } },
        { id: 'query',       icon: '❓', name: 'General Query',       sla: { response: '24 hrs', resolution: '3 Days', responseHrs: 24, resolutionHrs: 72 } }
    ];

    /* ================= Priority → SLA boost ================= */
    /* Issue type sets the base SLA; priority tightens it (Critical tightest) */
    var priorityFactor = {
        'Low':      1.5,
        'Medium':   1,
        'High':     0.5,
        'Critical': 0.25
    };

    /* ================= Status flow ================= */
    /* Customer → Company flow: New → Assigned → In Progress → Waiting for
       Customer Review → Resolved → Closed (+ Reopened) */
    var statusFlow = ['New', 'Assigned', 'In Progress', 'Waiting for Customer', 'Resolved', 'Closed'];
    var statusMetaMap = {
        'New':                  { bg: '#eaf1ff', color: '#3564e0', icon: 'bi-inbox' },
        'Assigned':             { bg: '#ede9fe', color: '#7c3aed', icon: 'bi-person-check' },
        'In Progress':          { bg: '#fff4d9', color: '#9a6200', icon: 'bi-hourglass-split' },
        'Waiting for Customer': { bg: '#fce7f3', color: '#be185d', icon: 'bi-eye' },
        'Resolved':             { bg: '#e7f7eb', color: '#087a24', icon: 'bi-check-circle' },
        'Closed':               { bg: '#e5e7eb', color: '#4b5563', icon: 'bi-lock' },
        'Reopened':             { bg: '#ffedd5', color: '#c2410c', icon: 'bi-arrow-counterclockwise' }
    };

    var priorityMetaMap = {
        'Low':      { bg: '#e7f7eb', color: '#087a24' },
        'Medium':   { bg: '#fff4d9', color: '#9a6200' },
        'High':     { bg: '#ffedd5', color: '#c2410c' },
        'Critical': { bg: '#fdebed', color: '#be3035' }
    };

    /* ================= Teams (company side assignment) ================= */
    var teams = {
        'Development': ['Yuvaraj (Developer)', 'Karthik (Developer)', 'Sneha (Developer)'],
        'Design':      ['Deepa (UI Designer)'],
        'Support':     ['Manoj (Support Lead)', 'Fathima (Support Exec)'],
        'QA':          ['Ramesh (QA Engineer)']
    };

    /* Issue type → default team routing */
    var issueTeamMap = {
        'bug': 'Development',
        'technical': 'Development',
        'integration': 'Development',
        'ui': 'Design',
        'access': 'Support',
        'data': 'Support',
        'change': 'Development',
        'feature': 'Development',
        'query': 'Support'
    };

    /* ================= Seed demo tickets ================= */
    var dayMs = 86400000;
    function iso(daysAgo) {
        return new Date(Date.now() - daysAgo * dayMs).toISOString();
    }
    function fmt(dateIso) {
        var d = new Date(dateIso);
        var dd = String(d.getDate()).padStart(2, '0');
        var mm = String(d.getMonth() + 1).padStart(2, '0');
        return dd + '-' + mm + '-' + d.getFullYear();
    }

    function seedTickets() {
        return [
            {
                id: 'TKT-2001', projectId: 'jails-court', projectName: 'Jails Court Project', projectIcon: '⚖️',
                issueType: 'Bug / Error', issueIcon: '🐞',
                subject: 'Case creation page not loading',
                description: 'When I click "New Case" the page spins for a while and shows a blank screen. Happens every time since yesterday.',
                priority: 'Critical', status: 'In Progress',
                customerName: 'Ramesh Iyer', customerOrg: 'Madurai Central Prison',
                contactPerson: 'Ramesh Iyer', contactPhone: '9843011223',
                assignedTeam: 'Development', assignedTo: 'Yuvaraj (Developer)',
                createdTs: iso(0.1), createdDate: fmt(iso(0.1)), updatedTs: iso(0.05),
                responseDueTs: iso(0.1 - 0.25 / 24), resolutionDueTs: iso(0.1 - 1 / 24),
                expectedDate: fmt(iso(-3)), attachment: 'error-screenshot.png',
                conversation: [
                    { by: 'customer', name: 'Ramesh Iyer', ts: iso(0.1), text: 'Unable to open the case creation page since yesterday. Getting a blank screen after the spinner.', attachment: 'error-screenshot.png' },
                    { by: 'staff', name: 'Manoj (Support Lead)', ts: iso(0.08), text: 'Thanks for reporting. Our team is looking into it on priority.', attachment: null },
                    { by: 'staff', name: 'Yuvaraj (Developer)', ts: iso(0.05), text: 'Login API issue identified — a null check is failing for court codes with special characters. Fix is in testing.', attachment: null }
                ]
            },
            {
                id: 'TKT-2002', projectId: 'hrms', projectName: 'HRMS Portal', projectIcon: '🖥️',
                issueType: 'Data Issue', issueIcon: '📊',
                subject: 'Attendance report showing wrong totals',
                description: 'Monthly attendance summary shows 2 extra present days for some employees.',
                priority: 'High', status: 'Assigned',
                customerName: 'Priya Venkatesh', customerOrg: 'Sunrise Textiles',
                contactPerson: 'Priya Venkatesh', contactPhone: '9440055667',
                assignedTeam: 'Support', assignedTo: 'Manoj (Support Lead)',
                createdTs: iso(0.6), createdDate: fmt(iso(0.6)), updatedTs: iso(0.4),
                responseDueTs: iso(0.35), resolutionDueTs: iso(0.1),
                expectedDate: fmt(iso(-1)), attachment: null,
                conversation: [
                    { by: 'customer', name: 'Priya Venkatesh', ts: iso(0.6), text: 'Monthly attendance summary shows 2 extra present days for a few employees who took leave.', attachment: null },
                    { by: 'staff', name: 'Manoj (Support Lead)', ts: iso(0.4), text: 'Ticket assigned to the support team. We are replicating the issue with your data.', attachment: null }
                ]
            },
            {
                id: 'TKT-2003', projectId: 'crm', projectName: 'CRM Application', projectIcon: '🤝',
                issueType: 'UI / Design Issue', issueIcon: '🎨',
                subject: 'Dashboard chart labels overlapping',
                description: 'On the CRM dashboard, the pipeline chart labels overlap when there are more than 6 stages.',
                priority: 'Low', status: 'Resolved',
                customerName: 'Karthik Raja', customerOrg: 'Nova Enterprises',
                contactPerson: 'Karthik Raja', contactPhone: '9952788990',
                assignedTeam: 'Design', assignedTo: 'Deepa (UI Designer)',
                createdTs: iso(3), createdDate: fmt(iso(3)), updatedTs: iso(1.2),
                responseDueTs: iso(2.6), resolutionDueTs: iso(2),
                expectedDate: fmt(iso(2)), attachment: null, resolvedTs: iso(1.2),
                conversation: [
                    { by: 'customer', name: 'Karthik Raja', ts: iso(3), text: 'Pipeline chart labels overlap when there are more than 6 stages.', attachment: null },
                    { by: 'staff', name: 'Deepa (UI Designer)', ts: iso(1.2), text: 'Fixed — labels now rotate and wrap. Please hard refresh and confirm.', attachment: null },
                    { by: 'customer', name: 'Karthik Raja', ts: iso(1.1), text: 'Working fine now, thank you!', attachment: null }
                ]
            },
            {
                id: 'TKT-2004', projectId: 'jails-court', projectName: 'Jails Court Project', projectIcon: '⚖️',
                issueType: 'Change Request', issueIcon: '💡',
                subject: 'Add case hearing reminder feature',
                description: 'We need an automatic reminder 2 days before every hearing date, sent by email to the jailer.',
                priority: 'Medium', status: 'New',
                customerName: 'Ramesh Iyer', customerOrg: 'Madurai Central Prison',
                contactPerson: 'Suresh Babu (Jailer)', contactPhone: '9843011223',
                assignedTeam: null, assignedTo: null,
                createdTs: iso(0.3), createdDate: fmt(iso(0.3)), updatedTs: iso(0.3),
                responseDueTs: iso(0.05), resolutionDueTs: iso(-4.7),
                expectedDate: fmt(iso(-20)), attachment: null,
                conversation: [
                    { by: 'customer', name: 'Ramesh Iyer', ts: iso(0.3), text: 'We need an automatic hearing reminder 2 days before every hearing, by email to the jailer.', attachment: null }
                ]
            },
            {
                id: 'TKT-2005', projectId: 'website', projectName: 'Corporate Website', projectIcon: '🌐',
                issueType: 'Access / Login Issue', issueIcon: '🔐',
                subject: 'Admin login OTP not received',
                description: 'OTP for admin panel login is not reaching the registered mobile number.',
                priority: 'High', status: 'Waiting for Customer',
                customerName: 'Divya Shankar', customerOrg: 'Gharuda Group',
                contactPerson: 'Divya Shankar', contactPhone: '9600123443',
                assignedTeam: 'Support', assignedTo: 'Fathima (Support Exec)',
                createdTs: iso(1), createdDate: fmt(iso(1)), updatedTs: iso(0.5),
                responseDueTs: iso(0.75), resolutionDueTs: iso(0.25),
                expectedDate: fmt(iso(0)), attachment: null,
                conversation: [
                    { by: 'customer', name: 'Divya Shankar', ts: iso(1), text: 'Admin panel OTP is not reaching my registered mobile. Tried 4 times.', attachment: null },
                    { by: 'staff', name: 'Fathima (Support Exec)', ts: iso(0.5), text: 'We updated the SMS gateway settings. Could you confirm the registered mobile number ends with 43? We will re-test.', attachment: null }
                ]
            },
            {
                id: 'TKT-2006', projectId: 'mobile', projectName: 'Mobile App', projectIcon: '📱',
                issueType: 'Integration Issue', issueIcon: '🔄',
                subject: 'Payment gateway callback failing',
                description: 'UPI payments succeed on the gateway side but the app still shows payment pending.',
                priority: 'Critical', status: 'Reopened',
                customerName: 'Vignesh Kumar', customerOrg: 'Quick Retail',
                contactPerson: 'Vignesh Kumar', contactPhone: '9840987650',
                assignedTeam: 'Development', assignedTo: 'Karthik (Developer)',
                createdTs: iso(2.2), createdDate: fmt(iso(2.2)), updatedTs: iso(0.2),
                responseDueTs: iso(2.14), resolutionDueTs: iso(1.95),
                expectedDate: fmt(iso(-1)), attachment: null,
                conversation: [
                    { by: 'customer', name: 'Vignesh Kumar', ts: iso(2.2), text: 'UPI payments succeed but the app still shows pending. Customers are complaining.', attachment: null },
                    { by: 'staff', name: 'Karthik (Developer)', ts: iso(1.9), text: 'Callback URL fix deployed. Please retest with a live transaction.', attachment: null },
                    { by: 'customer', name: 'Vignesh Kumar', ts: iso(0.2), text: 'Still showing pending on real transactions. Reopening.', attachment: null }
                ]
            }
        ];
    }

    /* ================= Store helpers ================= */
    function loadJson(key, fallback) {
        try {
            var raw = localStorage.getItem(key);
            if (!raw) return fallback;
            var v = JSON.parse(raw);
            return (v === null || v === undefined) ? fallback : v;
        } catch (e) { return fallback; }
    }
    function saveJson(key, value) {
        try { localStorage.setItem(key, JSON.stringify(value)); } catch (e) { /* ignore */ }
    }

    function readAll() {
        try {
            var raw = localStorage.getItem(STORE_KEY);
            if (!raw) {
                var seeded = seedTickets();
                localStorage.setItem(STORE_KEY, JSON.stringify(seeded));
                return seeded;
            }
            return JSON.parse(raw);
        } catch (e) {
            return seedTickets();
        }
    }

    function writeAll(tickets) {
        try { localStorage.setItem(STORE_KEY, JSON.stringify(tickets)); } catch (e) { /* ignore */ }
    }

    function nextSeq() {
        try {
            var s = parseInt(localStorage.getItem(SEQ_KEY), 10) || 2006;
            s += 1;
            localStorage.setItem(SEQ_KEY, String(s));
            return s;
        } catch (e) {
            return 2007;
        }
    }

    /* ================= Projects API (custom project add/remove) ================= */
    function loadProjects() { return loadJson(PROJECTS_KEY, projects.slice()); }
    function saveProjects(list) { saveJson(PROJECTS_KEY, list); }

    /* ================= Public API ================= */
    return {
        projects: loadProjects(),
        issueTypes: issueTypes,
        teams: teams,
        issueTeamMap: issueTeamMap,
        statusFlow: statusFlow,

        getProject: function (id) {
            return this.projects.find(function (p) { return p.id === id; }) || null;
        },
        getProjectByName: function (name) {
            return this.projects.find(function (p) { return p.name === name; }) || null;
        },
        addProject: function (input) {
            var name = String((input && input.name) || '').trim();
            var icon = String((input && input.icon) || '📁');
            if (!name) return null;
            if (this.projects.some(function (p) { return p.name.toLowerCase() === name.toLowerCase(); })) return null;
            var colors = ['#3564e0|#eaf1ff', '#087a24|#e7f7eb', '#7c3aed|#ede9fe', '#9a6200|#fff4d9', '#be185d|#fce7f3'];
            var c = colors[this.projects.length % colors.length].split('|');
            var p = { id: 'p-' + Date.now(), name: name, icon: icon, color: c[0], bg: c[1] };
            this.projects.push(p);
            saveProjects(this.projects);
            return p;
        },

        getIssueType: function (name) {
            return issueTypes.find(function (i) { return i.name === name; }) || null;
        },

        statusMeta: function (status) {
            return statusMetaMap[status] || { bg: '#e5e7eb', color: '#4b5563', icon: 'bi-tag' };
        },
        priorityMeta: function (priority) {
            return priorityMetaMap[priority] || { bg: '#e5e7eb', color: '#4b5563' };
        },

        /* Demo "current customer" */
        currentCustomer: function () {
            return { name: 'Ramesh Iyer', org: 'Madurai Central Prison' };
        },

        getMyTickets: function () {
            var u = this.currentCustomer();
            return readAll().filter(function (t) { return t.customerName === u.name; })
                .sort(function (a, b) { return new Date(b.createdTs) - new Date(a.createdTs); });
        },

        getAllTickets: function () {
            return readAll().sort(function (a, b) { return new Date(b.createdTs) - new Date(a.createdTs); });
        },

        getTicket: function (id) {
            return readAll().find(function (t) { return t.id === id; }) || null;
        },

        createTicket: function (input) {
            var tickets = readAll();
            var it = this.getIssueType(input.issueType);
            var factor = priorityFactor[input.priority] || 1;
            var base = it ? it.sla : { responseHrs: 24, resolutionHrs: 72 };
            var now = new Date().toISOString();
            var proj = this.getProject(input.projectId);
            var ticket = {
                id: 'TKT-' + nextSeq(),
                projectId: input.projectId,
                projectName: proj ? proj.name : input.projectName || 'Unknown Project',
                projectIcon: proj ? proj.icon : '📁',
                issueType: input.issueType,
                issueIcon: it ? it.icon : '❓',
                subject: input.subject,
                description: input.description,
                priority: input.priority,
                status: 'New',
                customerName: input.customerName,
                customerOrg: input.customerOrg,
                contactPerson: input.contactPerson || input.customerName,
                contactPhone: input.contactPhone || null,
                assignedTeam: null,
                assignedTo: null,
                createdTs: now,
                createdDate: fmt(now),
                updatedTs: now,
                responseDueTs: new Date(Date.now() + base.responseHrs * factor * 3600000).toISOString(),
                resolutionDueTs: new Date(Date.now() + base.resolutionHrs * factor * 3600000).toISOString(),
                expectedDate: input.expectedDate || null,
                attachment: input.attachment || null,
                conversation: [
                    { by: 'customer', name: input.customerName, ts: now, text: input.description, attachment: input.attachment || null }
                ]
            };
            tickets.unshift(ticket);
            writeAll(tickets);
            return ticket;
        },

        updateTicket: function (id, updates) {
            var tickets = readAll();
            tickets = tickets.map(function (t) {
                if (t.id === id) {
                    var merged = Object.assign({}, t, updates);
                    merged.updatedTs = new Date().toISOString();
                    return merged;
                }
                return t;
            });
            writeAll(tickets);
        },

        addReply: function (id, text, attachment, byStaff, senderName) {
            var tickets = readAll();
            var u = this.currentCustomer();
            tickets = tickets.map(function (t) {
                if (t.id === id) {
                    t.conversation.push({
                        by: byStaff ? 'staff' : 'customer',
                        name: byStaff ? (senderName || 'Support Team') : u.name,
                        ts: new Date().toISOString(),
                        text: text,
                        attachment: attachment || null
                    });
                    t.updatedTs = new Date().toISOString();
                }
                return t;
            });
            writeAll(tickets);
        },

        /* Company-side transitions */
        allowedNextStatuses: function (ticket) {
            switch (ticket.status) {
                case 'New':                  return ['Assigned', 'In Progress', 'Closed'];
                case 'Assigned':             return ['In Progress', 'Closed'];
                case 'In Progress':          return ['Waiting for Customer', 'Resolved'];
                case 'Waiting for Customer': return ['In Progress', 'Resolved'];
                case 'Resolved':             return ['Closed'];
                case 'Closed':               return [];
                case 'Reopened':             return ['Assigned', 'In Progress'];
                default:                     return [];
            }
        },

        /* Customer-side transitions */
        customerAllowedActions: function (ticket) {
            switch (ticket.status) {
                case 'New':                  return ['Close'];
                case 'Assigned':             return ['Close'];
                case 'In Progress':          return ['Close'];
                case 'Waiting for Customer': return ['Reply', 'Close'];
                case 'Resolved':             return ['Reopen', 'Close'];
                case 'Closed':               return [];
                case 'Reopened':             return ['Close'];
                default:                     return [];
            }
        },

        /* --- Derived metrics --- */
        slaState: function (ticket) {
            var openish = ['New', 'Assigned', 'In Progress', 'Waiting for Customer', 'Reopened'].indexOf(ticket.status) !== -1;
            var now = Date.now();
            var res = new Date(ticket.resolutionDueTs).getTime();
            var resp = new Date(ticket.responseDueTs).getTime();
            var firstStaff = (ticket.conversation || []).some(function (m) { return m.by === 'staff'; });
            if (!openish) return 'ok';
            if (!firstStaff && now > resp) return 'breached';
            if (now > res) return 'breached';
            if (res - now < 8 * 3600000) return 'at-risk';
            return 'ok';
        },

        overdueState: function (ticket) {
            /* Customer-agreed Expected Resolution Date breach */
            if (!ticket.expectedDate) return false;
            var openish = ['New', 'Assigned', 'In Progress', 'Waiting for Customer', 'Reopened'].indexOf(ticket.status) !== -1;
            if (!openish) return false;
            var parts = String(ticket.expectedDate).split('-');
            if (parts.length !== 3) return false;
            var exp = new Date(parts[2], parts[1] - 1, parts[0], 23, 59, 59).getTime();
            return Date.now() > exp;
        },

        counts: function () {
            var self = this;
            var all = readAll();
            var c = { total: all.length, newT: 0, assigned: 0, inProgress: 0, waiting: 0, resolved: 0, closed: 0, reopened: 0, breached: 0, unassigned: 0, highCritical: 0, overdue: 0 };
            all.forEach(function (t) {
                if (t.status === 'New') c.newT++;
                else if (t.status === 'Assigned') c.assigned++;
                else if (t.status === 'In Progress') c.inProgress++;
                else if (t.status === 'Waiting for Customer') c.waiting++;
                else if (t.status === 'Resolved') c.resolved++;
                else if (t.status === 'Closed') c.closed++;
                else if (t.status === 'Reopened') c.reopened++;
                if (!t.assignedTo) c.unassigned++;
                if (t.priority === 'High' || t.priority === 'Critical') c.highCritical++;
                if (self.overdueState(t)) c.overdue++;
                if (self.slaState(t) === 'breached') c.breached++;
            });
            return c;
        },

        /* Bug vs Change Request split for reports */
        issueSplit: function () {
            var all = readAll();
            var bugs = 0, changes = 0, others = 0;
            all.forEach(function (t) {
                if (t.issueType === 'Bug / Error') bugs++;
                else if (t.issueType === 'Change Request' || t.issueType === 'New Feature Request') changes++;
                else others++;
            });
            return { bugs: bugs, changes: changes, others: others };
        },

        avgResolutionHours: function () {
            var all = readAll().filter(function (t) { return t.resolvedTs; });
            if (!all.length) return 0;
            var sum = 0;
            all.forEach(function (t) {
                sum += (new Date(t.resolvedTs) - new Date(t.createdTs)) / 3600000;
            });
            return Math.round((sum / all.length) * 10) / 10;
        },

        escapeHtml: function (value) {
            return String(value == null ? '' : value)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#039;');
        },

        fmtTs: function (dateIso) {
            var d = new Date(dateIso);
            var t = d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
            return fmt(dateIso) + ' · ' + t;
        },

        resetDemoData: function () {
            try {
                localStorage.removeItem(STORE_KEY);
                localStorage.removeItem(SEQ_KEY);
            } catch (e) { /* ignore */ }
        }
    };
})();
