/**
 * Gharuda CRM - Follow Up List Page Script
 * File: assets/js/pages/follow-up-list.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        /* ---------- Helpers ---------- */
        var pad = function(n) { return String(n).padStart(2, '0'); };
        function fmtDMY(d) { return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear(); }
        function fmtISO(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }
        function inrFmt(n) {
            var s = n.toFixed(2).split('.');
            var int = s[0], last3 = int.slice(-3), rest = int.slice(0, -3);
            if (rest) rest = rest.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + ',';
            return '\u20B9 ' + rest + last3 + '.' + s[1];
        }
        function midnight(d) { return new Date(d.getFullYear(), d.getMonth(), d.getDate()); }

        var TODAY = midnight(new Date());
        document.getElementById('fulToday').textContent = fmtDMY(TODAY);

        /* ---------- Dummy follow-up data (reminder dates: today oda relative offset) ---------- */
        function rel(days) { var d = new Date(TODAY); d.setDate(d.getDate() + days); return d; }
        var fulData = [
            { id: 1,  name: 'Suresh Babu',   phone: '9500123456', company: 'GHARUDA TECHNOLOGY', value: 23629,    reminder: rel(0),  closure: rel(12), product: 'Solar Panel 3kW',   assigned: 'GHARUDA SOFTWARE', sourcer: 'IndiaMART',  status: 'Followup',    call: 'Pending' },
            { id: 2,  name: 'Ravi Kumar',    phone: '9841023456', company: 'Ravi Enterprises',   value: 48500,    reminder: rel(0),  closure: rel(20), product: 'Inverter 5kVA',     assigned: 'Harish D.',        sourcer: 'Website',    status: 'Quotation',   call: 'Completed' },
            { id: 3,  name: 'Priya R',       phone: '9791023456', company: 'Sri Priya Traders',  value: 15600,    reminder: rel(1),  closure: rel(9),  product: 'CCTV 4-Cam Kit',    assigned: 'Divya A.',         sourcer: 'Referral',   status: 'Lead',        call: 'Pending' },
            { id: 4,  name: 'Karthik M',     phone: '9884023456', company: 'KM Solar Solutions', value: 112000,   reminder: rel(2),  closure: rel(18), product: 'Solar Panel 5kW',   assigned: 'GHARUDA SOFTWARE', sourcer: 'IndiaMART',  status: 'Qualified',   call: 'Pending' },
            { id: 5,  name: 'Divya Shankar', phone: '9962023456', company: 'DS Interiors',       value: 30800,    reminder: rel(3),  closure: rel(15), product: 'AMC Contract',      assigned: 'Priya S.',         sourcer: 'Facebook Ads', status: 'Followup',  call: 'Missed' },
            { id: 6,  name: 'Mohan Raj',     phone: '9176023456', company: 'MR Motors',          value: 75999,    reminder: rel(4),  closure: rel(25), product: 'Home Automation',   assigned: 'Karthik R.',       sourcer: 'Google Ads', status: 'Quotation',   call: 'Completed' },
            { id: 7,  name: 'Lakshmi Devi',  phone: '9345023456', company: 'Lakshmi Textiles',   value: 18999,    reminder: rel(6),  closure: rel(28), product: 'Solar Street Light',assigned: 'Divya A.',         sourcer: 'Walk-in',    status: 'Lead',        call: 'Pending' },
            { id: 8,  name: 'Arun Prakash',  phone: '9094023456', company: 'AP Constructions',   value: 254000,   reminder: rel(8),  closure: rel(35), product: 'Solar Panel 10kW',  assigned: 'GHARUDA SOFTWARE', sourcer: 'IndiaMART',  status: 'DIRECT',      call: 'Completed' },
            { id: 9,  name: 'Nithya Sri',    phone: '9003023456', company: 'NS Beauty Clinic',   value: 12800,    reminder: rel(11), closure: rel(40), product: 'CCTV 8-Cam Kit',    assigned: 'Priya S.',         sourcer: 'Referral',   status: 'New Enquiry', call: 'Pending' },
            { id: 10, name: 'Vikram S',      phone: '9382023456', company: 'VS Enterprises',     value: 54200,    reminder: rel(14), closure: rel(45), product: 'Inverter 3kVA',     assigned: 'Harish D.',        sourcer: 'Website',    status: 'Followup',    call: 'Missed' },
            { id: 11, name: 'Gopal Krishnan',phone: '9444023456', company: 'GK Traders',         value: 36750,    reminder: rel(-1), closure: rel(10), product: 'AMC Contract',      assigned: 'Karthik R.',       sourcer: 'Cold Call',  status: 'Quotation',   call: 'Completed' },
            { id: 12, name: 'Meena K',       phone: '9566023456', company: 'Meena Silks',        value: 22400,    reminder: rel(-3), closure: rel(6),  product: 'Solar Panel 2kW',   assigned: 'Divya A.',         sourcer: 'IndiaMART',  status: 'Lead',        call: 'Missed' }
        ];

        /* ---------- State ---------- */
        var urlParams = new URLSearchParams(window.location.search);
        var state = {
            range: ['today', 'weekly', 'monthly'].indexOf(urlParams.get('range')) !== -1 ? urlParams.get('range') : 'today',
            type: urlParams.get('type') === 'completed' ? 'completed' : 'actual',
            from: null,
            to: null,
            assigned: '',
            statuses: null /* null = "all" (initial, select2 pre-selected list use pannum) */
        };

        /* ---------- Range window ---------- */
        function rangeWindow(range) {
            var s = new Date(TODAY), e = new Date(TODAY);
            if (range === 'weekly') {
                var day = (s.getDay() + 6) % 7; /* Monday = 0 */
                s.setDate(s.getDate() - day);
                e = new Date(s);
                e.setDate(e.getDate() + 6);
            } else if (range === 'monthly') {
                s = new Date(TODAY.getFullYear(), TODAY.getMonth(), 1);
                e = new Date(TODAY.getFullYear(), TODAY.getMonth() + 1, 0);
            }
            return { start: s, end: e };
        }

        function inRange(d, range) {
            var w = rangeWindow(range);
            return d >= w.start && d <= w.end;
        }

        /* ---------- Summary cards (matrix info — live counts) ---------- */
        function renderSummary() {
            ['today', 'weekly', 'monthly'].forEach(function(r) {
                var actual = 0, done = 0;
                fulData.forEach(function(row) {
                    if (!inRange(row.reminder, r)) return;
                    actual++;
                    if (row.call === 'Completed') done++;
                });
                document.getElementById('fulCnt-' + r).textContent = actual;
                var sub = document.getElementById('fulCntDone-' + r);
                sub.textContent = done;
            });
            document.querySelectorAll('.ful-card').forEach(function(c) {
                c.classList.toggle('active', c.getAttribute('data-range') === state.range);
            });
        }

        /* ---------- Filters ---------- */
        function getFiltered() {
            var statuses = state.statuses; /* null = ellame include */
            return fulData.filter(function(row) {
                if (!inRange(row.reminder, state.range)) return false;
                if (state.type === 'completed' && row.call !== 'Completed') return false;
                if (state.from && row.reminder < midnight(new Date(state.from + 'T00:00:00'))) return false;
                if (state.to && row.reminder > midnight(new Date(state.to + 'T00:00:00'))) return false;
                if (state.assigned && row.assigned !== state.assigned) return false;
                if (statuses && statuses.indexOf(row.status) === -1) return false;
                return true;
            });
        }

        /* ---------- Chip renderers (MasterTable column render) ---------- */
        function statusChip(s) {
            var map = {
                'Lead': 'c-blue', 'Quotation': 'c-violet', 'Followup': 'c-amber',
                'Qualified': 'c-green', 'DIRECT': 'c-red', 'New Enquiry': 'c-blue', 'New': 'c-gray'
            };
            return '<span class="ful-chip ' + (map[s] || 'c-gray') + '">' + s + '</span>';
        }
        function callChip(s) {
            var map = { 'Completed': 'c-green', 'Pending': 'c-amber', 'Missed': 'c-red' };
            return '<span class="ful-chip ' + (map[s] || 'c-gray') + '">' + s + '</span>';
        }

        /* ---------- MasterTable init ---------- */
        var fulTable = null;
        if (typeof MasterTable !== 'undefined') {
            fulTable = MasterTable.init({
                tableId: 'fulTable',
                tbodyId: 'fulTbody',
                idPrefix: 'ful',
                data: [],
                tableName: 'Follow Up List',
                primaryKey: 'id',
                searchFields: ['name', 'phone', 'company', 'product'],
                columns: [
                    {
                        field: 'name',
                        title: 'Name',
                        sortable: true,
                        render: function(v) {
                            return '<a href="#" class="ful-name" onclick="return false;">' + v + '</a>';
                        }
                    },
                    {
                        field: 'phone',
                        title: 'Phone',
                        sortable: true,
                        render: function(v) {
                            return '<a href="tel:' + v + '" class="ful-phone">' + v + '</a>';
                        }
                    },
                    {
                        field: 'company',
                        title: 'Company Name',
                        sortable: true
                    },
                    {
                        field: 'value_fmt',
                        title: 'Lead Value',
                        sortable: false,
                        render: function(v, row) {
                            return '<span class="ful-val">' + row.value_fmt + '</span>';
                        }
                    },
                    {
                        field: 'closure',
                        title: 'Closure Date',
                        sortable: false
                    },
                    {
                        field: 'reminder',
                        title: 'Next Reminder Date',
                        sortable: false,
                        render: function(v) {
                            return '<span class="fw-bold">' + v + '</span>';
                        }
                    },
                    {
                        field: 'product',
                        title: 'Product',
                        sortable: true
                    },
                    {
                        field: 'assigned',
                        title: 'Assigned',
                        sortable: true
                    },
                    {
                        field: 'sourcer',
                        title: 'Sourcer',
                        sortable: true
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        sortable: true,
                        render: statusChip
                    },
                    {
                        field: 'call',
                        title: 'Call Status',
                        sortable: true,
                        render: callChip
                    }
                ]
            });
        }

        /* ---------- Table sync (filtered rows -> MasterTable) ----------
           fulData la Date objects irukku; MasterTable ku formatted-string copies pass pannrom
           (original-a mutate pannama — repeated sync safe-a irukum) */
        function syncTable() {
            var rows = getFiltered().map(function(r) {
                return {
                    id: r.id,
                    name: r.name,
                    phone: r.phone,
                    company: r.company,
                    value: r.value,
                    value_fmt: inrFmt(r.value),
                    closure: fmtDMY(r.closure),
                    reminder: fmtDMY(r.reminder),
                    product: r.product,
                    assigned: r.assigned,
                    sourcer: r.sourcer,
                    status: r.status,
                    call: r.call
                };
            });
            if (fulTable) fulTable.setData(rows);
            var total = rows.reduce(function(sum, r) { return sum + r.value; }, 0);
            document.getElementById('fulTotalValue').textContent = inrFmt(total);
            document.getElementById('fulShowing').textContent = 'Showing ' + rows.length + ' follow-up' + (rows.length === 1 ? '' : 's');
        }

        function renderAll() {
            renderSummary();
            syncTable();
            /* URL sync — refresh pannalum same state */
            var p = new URLSearchParams();
            p.set('range', state.range);
            p.set('type', state.type);
            window.history.replaceState({}, '', window.location.pathname + '?' + p.toString());
        }

        /* ---------- Wiring ---------- */
        /* Range cards click */
        document.querySelectorAll('.ful-card').forEach(function(card) {
            card.addEventListener('click', function() {
                state.range = card.getAttribute('data-range');
                renderAll();
            });
        });

        /* Actual / Completed toggle */
        var typeToggle = document.getElementById('fulTypeToggle');
        function syncTypeToggle() {
            typeToggle.querySelectorAll('button').forEach(function(b) {
                b.classList.toggle('active', b.getAttribute('data-type') === state.type);
            });
        }
        typeToggle.querySelectorAll('button').forEach(function(b) {
            b.addEventListener('click', function() {
                state.type = b.getAttribute('data-type');
                syncTypeToggle();
                renderAll();
            });
        });
        syncTypeToggle();

        /* Submit -> apply form filters (search MasterTable toolbar la auto irukku) */
        document.getElementById('fulSubmit').addEventListener('click', function() {
            state.from = document.getElementById('fulFrom').value || null;
            state.to = document.getElementById('fulTo').value || null;
            state.assigned = document.getElementById('fulAssigned').value || '';
            var sel = document.getElementById('fulStatus');
            var picked = Array.from(sel.selectedOptions || []).map(function(o) { return o.text; });
            state.statuses = picked.length ? picked : [];
            renderAll();
        });

        /* Clear -> reset filters (range/type remain) */
        document.getElementById('fulClear').addEventListener('click', function() {
            document.getElementById('fulFrom').value = '';
            document.getElementById('fulTo').value = '';
            document.getElementById('fulAssigned').value = '';
            var sel = document.getElementById('fulStatus');
            Array.from(sel.options || []).forEach(function(o) { o.selected = false; });
            if (typeof $ !== 'undefined' && $.fn.select2) $(sel).val(null).trigger('change');
            state.from = null;
            state.to = null;
            state.assigned = '';
            state.statuses = null;
            renderAll();
        });

        /* ---------- Init ---------- */
        renderAll();
    })();
