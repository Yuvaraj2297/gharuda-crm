/**
 * Gharuda CRM - Payslip Page Script
 * File: assets/js/pages/payslip.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {

        /* ============================================================
           DATA
        ============================================================ */
        var allEmployees = [{
                id: 1,
                name: 'Amelia Curr',
                empId: 'EMP0001',
                dept: 'Design',
                designation: 'UI/UX Designer',
                type: 'Full-Time',
                joining: '15 Jan 2024',
                location: 'Chennai',
                present: 26,
                absent: 2,
                period: 'Aug 2026',
                basic: 25000,
                hra: 10000,
                da: 5000,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3000,
                esi: 375,
                profTax: 200,
                tds: 2500
            },
            {
                id: 2,
                name: 'Daniel Martinez',
                empId: 'EMP0002',
                dept: 'Engineering',
                designation: 'Senior Developer',
                type: 'Full-Time',
                joining: '01 Mar 2023',
                location: 'Bangalore',
                present: 28,
                absent: 0,
                period: 'Aug 2026',
                basic: 35000,
                hra: 14000,
                da: 7000,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 4200,
                esi: 375,
                profTax: 200,
                tds: 3500
            },
            {
                id: 3,
                name: 'David Anderson',
                empId: 'EMP0003',
                dept: 'Engineering',
                designation: 'Backend Developer',
                type: 'Full-Time',
                joining: '10 Jun 2024',
                location: 'Chennai',
                present: 24,
                absent: 4,
                period: 'Aug 2026',
                basic: 30000,
                hra: 12000,
                da: 6000,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3600,
                esi: 375,
                profTax: 200,
                tds: 3000
            },
            {
                id: 4,
                name: 'Emily Clark',
                empId: 'EMP0004',
                dept: 'Finance',
                designation: 'Accountant',
                type: 'Full-Time',
                joining: '20 Sep 2023',
                location: 'Hyderabad',
                present: 27,
                absent: 1,
                period: 'Aug 2026',
                basic: 28000,
                hra: 11200,
                da: 5600,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3360,
                esi: 375,
                profTax: 200,
                tds: 2800
            },
            {
                id: 5,
                name: 'Sophia Johnson',
                empId: 'EMP0005',
                dept: 'Marketing',
                designation: 'Marketing Lead',
                type: 'Full-Time',
                joining: '05 Apr 2024',
                location: 'Bangalore',
                present: 22,
                absent: 6,
                period: 'Aug 2026',
                basic: 26000,
                hra: 10400,
                da: 5200,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3120,
                esi: 375,
                profTax: 200,
                tds: 2600
            },
            {
                id: 6,
                name: 'Michael Brown',
                empId: 'EMP0006',
                dept: 'Design',
                designation: 'Graphic Designer',
                type: 'Contract',
                joining: '01 Jul 2025',
                location: 'Chennai',
                present: 25,
                absent: 3,
                period: 'Aug 2026',
                basic: 22000,
                hra: 8800,
                da: 4400,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 2640,
                esi: 375,
                profTax: 200,
                tds: 2200
            },
            {
                id: 7,
                name: 'Olivia Wilson',
                empId: 'EMP0007',
                dept: 'Marketing',
                designation: 'Content Writer',
                type: 'Full-Time',
                joining: '12 Nov 2023',
                location: 'Hyderabad',
                present: 28,
                absent: 0,
                period: 'Aug 2026',
                basic: 24000,
                hra: 9600,
                da: 4800,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 2880,
                esi: 375,
                profTax: 200,
                tds: 2400
            },
            {
                id: 8,
                name: 'James Taylor',
                empId: 'EMP0008',
                dept: 'Engineering',
                designation: 'Frontend Developer',
                type: 'Full-Time',
                joining: '01 Feb 2024',
                location: 'Bangalore',
                present: 27,
                absent: 1,
                period: 'Aug 2026',
                basic: 32000,
                hra: 12800,
                da: 6400,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3840,
                esi: 375,
                profTax: 200,
                tds: 3200
            },
            {
                id: 9,
                name: 'Isabella Moore',
                empId: 'EMP0009',
                dept: 'Finance',
                designation: 'Financial Analyst',
                type: 'Full-Time',
                joining: '08 Aug 2023',
                location: 'Chennai',
                present: 23,
                absent: 5,
                period: 'Aug 2026',
                basic: 29000,
                hra: 11600,
                da: 5800,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3480,
                esi: 375,
                profTax: 200,
                tds: 2900
            },
            {
                id: 10,
                name: 'William Thomas',
                empId: 'EMP0010',
                dept: 'Design',
                designation: 'Product Designer',
                type: 'Full-Time',
                joining: '15 May 2024',
                location: 'Hyderabad',
                present: 28,
                absent: 0,
                period: 'Aug 2026',
                basic: 27000,
                hra: 10800,
                da: 5400,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3240,
                esi: 375,
                profTax: 200,
                tds: 2700
            },
            {
                id: 11,
                name: 'Mia Harris',
                empId: 'EMP0011',
                dept: 'HR',
                designation: 'HR Manager',
                type: 'Full-Time',
                joining: '01 Jan 2023',
                location: 'Chennai',
                present: 21,
                absent: 7,
                period: 'Aug 2026',
                basic: 30000,
                hra: 12000,
                da: 6000,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3600,
                esi: 375,
                profTax: 200,
                tds: 3000
            },
            {
                id: 12,
                name: 'Benjamin Martin',
                empId: 'EMP0012',
                dept: 'Engineering',
                designation: 'DevOps Engineer',
                type: 'Full-Time',
                joining: '10 Sep 2024',
                location: 'Bangalore',
                present: 28,
                absent: 0,
                period: 'Aug 2026',
                basic: 33000,
                hra: 13200,
                da: 6600,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3960,
                esi: 375,
                profTax: 200,
                tds: 3300
            },
            {
                id: 13,
                name: 'Charlotte Lee',
                empId: 'EMP0013',
                dept: 'Finance',
                designation: 'Payroll Specialist',
                type: 'Full-Time',
                joining: '20 Mar 2024',
                location: 'Hyderabad',
                present: 25,
                absent: 3,
                period: 'Aug 2026',
                basic: 26000,
                hra: 10400,
                da: 5200,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3120,
                esi: 375,
                profTax: 200,
                tds: 2600
            },
            {
                id: 14,
                name: 'Henry Walker',
                empId: 'EMP0014',
                dept: 'Operations',
                designation: 'Operations Manager',
                type: 'Full-Time',
                joining: '05 Jul 2023',
                location: 'Chennai',
                present: 27,
                absent: 1,
                period: 'Aug 2026',
                basic: 31000,
                hra: 12400,
                da: 6200,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 3720,
                esi: 375,
                profTax: 200,
                tds: 3100
            },
            {
                id: 15,
                name: 'Evelyn Hall',
                empId: 'EMP0015',
                dept: 'Marketing',
                designation: 'SEO Specialist',
                type: 'Contract',
                joining: '01 Nov 2025',
                location: 'Bangalore',
                present: 26,
                absent: 2,
                period: 'Aug 2026',
                basic: 23000,
                hra: 9200,
                da: 4600,
                convey: 3200,
                medical: 2000,
                special: 4800,
                pf: 2760,
                esi: 375,
                profTax: 200,
                tds: 2300
            }
        ];

        /* requests = [{reqId, empId, empName, dept, period, status, requestedOn, generated, genType}] */
        var requests = [
            { reqId: 1, empId: 1, empId_str: 'EMP0001', empName: 'Amelia Curr', dept: 'Design', period: 'Aug 2026', status: 'generated', requestedOn: '01 Sep 2026', generated: true, genType: 'auto' },
            { reqId: 2, empId: 2, empId_str: 'EMP0002', empName: 'Daniel Martinez', dept: 'Engineering', period: 'Aug 2026', status: 'generated', requestedOn: '01 Sep 2026', generated: true, genType: 'auto' },
            { reqId: 3, empId: 2, empId_str: 'EMP0002', empName: 'Daniel Martinez', dept: 'Engineering', period: 'Jul 2026', status: 'generated', requestedOn: '25 Sep 2026', generated: true, genType: 'auto' }
        ];
        var reqCounter = 4;
        var rejectTargetId = null;

        /* ============================================================
           POPULATE DROPDOWNS & FILTER LISTENERS
        ============================================================ */
        var reqEmpSel = document.getElementById('reqEmployee');
        if (reqEmpSel) {
            reqEmpSel.innerHTML = '<option value="">-- Select Employee --</option>';
            allEmployees.forEach(function(e) {
                var o = document.createElement('option');
                o.value = e.id;
                o.textContent = e.empId + ' — ' + e.name;
                reqEmpSel.appendChild(o);
            });
        }

        var reqPeriodSel = document.getElementById('reqPeriod');

        if (reqEmpSel) reqEmpSel.addEventListener('change', renderMyRequests);
        if (reqPeriodSel) reqPeriodSel.addEventListener('change', renderMyRequests);

        if (window.jQuery) {
            window.jQuery('#reqEmployee, #reqPeriod').on('change', function() {
                renderMyRequests();
            });
        }

        /* ============================================================
           TAB SWITCH
        ============================================================ */
        window.switchTab = function(tab) {
            document.getElementById('tabPanelEmployee').style.display = tab === 'employee' ? '' : 'none';
            document.getElementById('tabPanelAdmin').style.display = tab === 'admin' ? '' : 'none';
            document.getElementById('tabEmployee').classList.toggle('active', tab === 'employee');
            document.getElementById('tabAdmin').classList.toggle('active', tab === 'admin');
            if (tab === 'admin') renderAdminTables();
        };

        /* ============================================================
           STEP PANEL NAVIGATION
        ============================================================ */
        var currentStep = 1;

        window.showStepPanel = function(n) {
            currentStep = n;
            // panels
            [1, 2, 3, 4].forEach(function(i) {
                var p = document.getElementById('stepPanel' + i);
                if (p) p.classList.toggle('active', i === n);
            });
            // dot states: done = completed steps, active = current
            [1, 2, 3, 4].forEach(function(i) {
                var s = document.getElementById('step' + i);
                if (!s) return;
                s.classList.remove('done', 'active');
                if (i < n) s.classList.add('done');
                else if (i === n) s.classList.add('active');
            });
            // render step-specific content
            renderStepPanel(n);
        };

        function renderStepPanel(n) {
            if (n === 2) renderStepPending();
            if (n === 3) renderStepApproved();
            if (n === 4) renderStepGenerated();
        }

        function renderStepPending() {
            var tbody = document.getElementById('stepPendingTbody');
            if (!tbody) return;
            var rows = requests.filter(function(r) {
                return r.status === 'pending';
            });
            if (!rows.length) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted py-4" style="font-size:13px;">No pending requests.</td></tr>';
                return;
            }
            tbody.innerHTML = rows.map(function(r, i) {
                return '<tr><td class="text-nowrap">' + (i + 1) + '</td><td class="text-nowrap"><div class="fw-bold" style="font-size:12px;">' + escHtml(r.empName) + '</div>' +
                    '<div style="font-size:11px;color:#5d6570;">' + escHtml(r.empId_str) + '</div></td>' +
                    '<td class="text-nowrap">' + escHtml(r.period) + '</td><td class="text-nowrap" style="font-size:12px;">' + escHtml(r.requestedOn) + '</td>' +
                    '<td class="text-nowrap" style="font-size:12px;">' + escHtml(r.note || '—') + '</td>' +
                    '<td class="text-nowrap">' + statusBadge(r.status) + '</td></tr>';
            }).join('');
        }

        function renderStepApproved() {
            var tbody = document.getElementById('stepApprovedTbody');
            if (!tbody) return;
            var rows = requests.filter(function(r) {
                return r.status === 'approved';
            });
            if (!rows.length) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted py-4" style="font-size:13px;">No approved requests.</td></tr>';
                return;
            }
            tbody.innerHTML = rows.map(function(r, i) {
                return '<tr><td class="text-nowrap">' + (i + 1) + '</td><td class="text-nowrap"><div class="fw-bold" style="font-size:12px;">' + escHtml(r.empName) + '</div>' +
                    '<div style="font-size:11px;color:#5d6570;">' + escHtml(r.empId_str) + '</div></td>' +
                    '<td class="text-nowrap">' + escHtml(r.period) + '</td><td class="text-nowrap" style="font-size:12px;">' + escHtml(r.requestedOn) + '</td>' +
                    '<td class="text-nowrap" style="font-size:12px;">' + escHtml(r.note || '—') + '</td>' +
                    '<td class="text-nowrap">' + statusBadge(r.status) + '</td></tr>';
            }).join('');
        }

        function renderStepGenerated() {
            var tbody = document.getElementById('stepGeneratedTbody');
            if (!tbody) return;
            var rows = requests.filter(function(r) {
                return r.status === 'generated';
            });
            if (!rows.length) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-muted py-4" style="font-size:13px;">No payslips generated yet.</td></tr>';
                return;
            }
            tbody.innerHTML = rows.map(function(r, i) {
                return '<tr><td class="text-nowrap">' + (i + 1) + '</td><td class="text-nowrap"><div class="fw-bold" style="font-size:12px;">' + escHtml(r.empName) + '</div>' +
                    '<div style="font-size:11px;color:#5d6570;">' + escHtml(r.empId_str) + '</div></td>' +
                    '<td class="text-nowrap">' + escHtml(r.period) + '</td>' +
                    '<td class="text-nowrap" style="font-size:12px;">' + today() + '</td>' +
                    '<td class="text-nowrap"><span class="ps-badge generated" style="font-size:10px;">' + (r.genType === 'manual' ? 'Manual' : 'Auto') + '</span></td>' +
                    '<td class="text-nowrap"><div class="d-flex gap-1">' +
                    '<button class="btn btn-sm btn-outline-primary" style="border-radius:7px;font-size:11px;padding:3px 9px;" onclick="previewPayslip(' + r.reqId + ')"><i class="bi bi-eye me-1"></i>View</button>' +
                    '<button class="btn btn-sm btn-outline-secondary" style="border-radius:7px;font-size:11px;padding:3px 9px;" onclick="printPayslip(' + r.reqId + ')"><i class="bi bi-printer"></i></button>' +
                    '</div></td></tr>';
            }).join('');
        }

        /* ============================================================
           HELPERS
        ============================================================ */
        function today() {
            var d = new Date();
            return ('0' + d.getDate()).slice(-2) + ' ' + (d.toLocaleString('en', {
                month: 'short'
            })) + ' ' + d.getFullYear();
        }

        function fmt(n) {
            return Number(n).toLocaleString('en-IN');
        }

        function statusBadge(s) {
            var map = {
                pending: 'Pending',
                approved: 'Approved',
                rejected: 'Rejected',
                generated: 'Generated'
            };
            return '<span class="ps-badge ' + s + '">' + (map[s] || s) + '</span>';
        }

        function updateKPIs(count) {
            var g = count !== undefined ? count : requests.filter(function(r) { return r.status === 'generated'; }).length;
            var el = document.getElementById('kpiGenerated');
            if (el) el.textContent = g + ' Generated';
        }

        window.generatePayslipDirect = function(reqId) {
            var rq = requests.find(function(r) { return r.reqId === reqId; });
            if (!rq) return;
            rq.status = 'generated';
            rq.generated = true;
            renderMyRequests();
            previewPayslip(reqId);
        };

        /* ============================================================
           GENERATED PAYSLIPS TABLE (FILTERED BY EMPLOYEE & PERIOD)
        ============================================================ */
        function renderMyRequests() {
            var tbody = document.getElementById('myReqTbody');
            if (!tbody) return;

            var selEmp = reqEmpSel ? reqEmpSel.value : '';
            var selPeriod = reqPeriodSel ? reqPeriodSel.value : '';

            var filteredRequests = requests.filter(function(rq) {
                if (rq.status !== 'generated') return false;
                var matchEmp = !selEmp || String(rq.empId) === String(selEmp);
                var matchPeriod = !selPeriod || rq.period === selPeriod;
                return matchEmp && matchPeriod;
            });

            updateKPIs(filteredRequests.length);

            if (!filteredRequests.length) {
                tbody.innerHTML = '<tr class="no-record-row"><td colspan="6" class="text-center text-muted py-4" style="font-size:13px;">No payslips generated for the selected employee and pay period.</td></tr>';
            } else {
                tbody.innerHTML = filteredRequests.slice().reverse().map(function(rq, i) {
                    var vUrl = getPayslipViewUrl(rq, 'view');
                    var pUrl = getPayslipViewUrl(rq, 'print');
                    var dUrl = getPayslipViewUrl(rq, 'download');

                    var actionBtn = '' +
                        '<div class="dropdown">' +
                        '<button class="payslip-action-btn" type="button" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false" title="Actions">' +
                        '<i class="bi bi-three-dots-vertical fs-6"></i>' +
                        '</button>' +
                        '<ul class="dropdown-menu dropdown-menu-end payslip-dropdown-menu">' +
                        '<li><a href="' + vUrl + '" target="_blank" class="payslip-dropdown-item text-decoration-none"><span class="action-icon-badge icon-badge-view"><i class="bi bi-eye"></i></span><span>View / Preview</span></a></li>' +
                        '<li><a href="' + pUrl + '" target="_blank" class="payslip-dropdown-item text-decoration-none"><span class="action-icon-badge icon-badge-print"><i class="bi bi-printer"></i></span><span>Print</span></a></li>' +
                        '<li><a href="' + dUrl + '" target="_blank" class="payslip-dropdown-item text-decoration-none"><span class="action-icon-badge icon-badge-download"><i class="bi bi-download"></i></span><span>Download PDF</span></a></li>' +
                        '</ul>' +
                        '</div>';

                    return '<tr>' +
                        '<td class="text-nowrap">' + (i + 1) + '</td>' +
                        '<td class="text-nowrap"><span class="fw-bold" style="font-size:12px;">' + escHtml(rq.empName) + '</span> <span style="font-size:11px;color:#5d6570;">(' + escHtml(rq.empId_str || rq.empId) + ')</span></td>' +
                        '<td class="text-nowrap">' + escHtml(rq.period) + '</td>' +
                        '<td class="text-nowrap" style="font-size:12px;">' + escHtml(rq.requestedOn) + '</td>' +
                        '<td class="text-nowrap"><span class="ps-badge generated"><i class="bi bi-check-circle me-1"></i>Generated</span></td>' +
                        '<td class="text-nowrap">' + actionBtn + '</td>' +
                        '</tr>';
                }).join('');
            }

            var tableEl = document.getElementById('myReqTable');
            if (tableEl) {
                if (tableEl.autoTable) {
                    tableEl.autoTable.refresh();
                } else if (window.AutoMasterTable) {
                    window.AutoMasterTable.init(tableEl);
                }
            }
        }

        /* ============================================================
           GENERATE PAYSLIP DIRECTLY ON SUBMIT
        ============================================================ */
        document.getElementById('submitReqBtn').addEventListener('click', function() {
            var empId = parseInt(document.getElementById('reqEmployee').value, 10);
            var period = document.getElementById('reqPeriod').value;
            var emp = allEmployees.find(function(e) {
                return e.id === empId;
            });
            if (!emp) {
                alert('Please select an employee.');
                return;
            }

            var existingIndex = requests.findIndex(function(r) {
                return String(r.empId) === String(emp.id) && r.period === period;
            });

            var targetReq;
            if (existingIndex !== -1) {
                targetReq = requests[existingIndex];
                targetReq.requestedOn = today();
                targetReq.status = 'generated';
                targetReq.generated = true;
            } else {
                targetReq = {
                    reqId: reqCounter++,
                    empId: emp.id,
                    empId_str: emp.empId,
                    empName: emp.name,
                    dept: emp.dept,
                    period: period,
                    status: 'generated',
                    requestedOn: today(),
                    generated: true,
                    genType: 'auto'
                };
                requests.push(targetReq);
            }

            renderMyRequests();

            // Preview generated payslip modal immediately
            previewPayslip(targetReq.reqId);

            // show success toast-like feedback
            var btn = document.getElementById('submitReqBtn');
            btn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Payslip Generated!';
            btn.style.background = '#087a24';
            setTimeout(function() {
                btn.innerHTML = '<i class="bi bi-lightning-charge me-2"></i>Generate Payslip';
                btn.style.background = '';
            }, 2000);
        });

        /* ============================================================
           APPROVE / REJECT (Admin)
        ============================================================ */
        window.approveSingle = function(reqId) {
            var rq = requests.find(function(r) {
                return r.reqId === reqId;
            });
            if (rq) {
                rq.status = 'approved';
            }
            renderAdminTables();
            renderMyRequests();
            // Auto-navigate employee stepper to Approved step
            showStepPanel(3);
        };

        window.rejectSingle = function(reqId) {
            var rq = requests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!rq) return;
            rejectTargetId = reqId;
            document.getElementById('rejectEmpName').textContent = rq.empName;
            document.getElementById('rejectPeriod').textContent = rq.period;
            document.getElementById('rejectReason').value = '';
            var m = new bootstrap.Modal(document.getElementById('rejectModal'));
            m.show();
        };

        document.getElementById('confirmRejectBtn').addEventListener('click', function() {
            if (rejectTargetId === null) return;
            var rq = requests.find(function(r) {
                return r.reqId === rejectTargetId;
            });
            if (rq) {
                rq.status = 'rejected';
                rq.rejectReason = document.getElementById('rejectReason').value.trim() || 'No reason provided';
            }
            rejectTargetId = null;
            bootstrap.Modal.getInstance(document.getElementById('rejectModal')).hide();
            renderAdminTables();
            renderMyRequests();
        });

        /* Bulk approve/reject */
        function bindPendingCheckboxes() {
            document.getElementById('pendingSelectAll').onchange = function() {
                document.querySelectorAll('.pending-chk').forEach(function(c) {
                    c.checked = this.checked;
                }, this);
                toggleBulkBar();
            };
            document.querySelectorAll('.pending-chk').forEach(function(c) {
                c.onchange = toggleBulkBar;
            });
        }

        function toggleBulkBar() {
            var any = document.querySelectorAll('.pending-chk:checked').length > 0;
            document.getElementById('adminBulkBar').style.display = any ? 'flex' : 'none';
        }

        document.getElementById('bulkApproveBtn').addEventListener('click', function() {
            document.querySelectorAll('.pending-chk:checked').forEach(function(c) {
                var id = parseInt(c.getAttribute('data-req-id'), 10);
                var rq = requests.find(function(r) {
                    return r.reqId === id;
                });
                if (rq) rq.status = 'approved';
            });
            document.getElementById('pendingSelectAll').checked = false;
            renderAdminTables();
            renderMyRequests();
            showStepPanel(3);
        });

        document.getElementById('bulkRejectBtn').addEventListener('click', function() {
            document.querySelectorAll('.pending-chk:checked').forEach(function(c) {
                var id = parseInt(c.getAttribute('data-req-id'), 10);
                var rq = requests.find(function(r) {
                    return r.reqId === id;
                });
                if (rq) {
                    rq.status = 'rejected';
                    rq.rejectReason = 'Bulk rejected by HR';
                }
            });
            document.getElementById('pendingSelectAll').checked = false;
            renderAdminTables();
            renderMyRequests();
        });

        /* ============================================================
           GENERATE PAYSLIP (Admin)
        ============================================================ */
        window.generateAutoPayslip = function(reqId) {
            var rq = requests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!rq) return;
            rq.status = 'generated';
            rq.generated = true;
            rq.genType = 'auto';
            renderAdminTables();
            renderMyRequests();
        };

        window.generateManualPayslip = function(reqId) {
            var rq = requests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!rq) return;
            var e = allEmployees.find(function(emp) {
                return emp.id === rq.empId;
            });
            if (!e) return;

            // Store current reqId for save
            document.getElementById('saveManualPayslipBtn').setAttribute('data-req-id', reqId);

            // Populate subtitle
            document.getElementById('manualModalSubtitle').textContent = e.name + ' (' + e.empId + ') — ' + rq.period;

            // Populate fields with employee defaults
            document.getElementById('mWorkingDays').value = 28;
            document.getElementById('mPresent').value = e.present;
            document.getElementById('mAbsent').value = e.absent;
            document.getElementById('mPeriod').value = rq.period;
            document.getElementById('mBasic').value = e.basic;
            document.getElementById('mHra').value = e.hra;
            document.getElementById('mDa').value = e.da;
            document.getElementById('mConvey').value = e.convey;
            document.getElementById('mMedical').value = e.medical;
            document.getElementById('mSpecial').value = e.special;
            document.getElementById('mPf').value = e.pf;
            document.getElementById('mEsi').value = e.esi;
            document.getElementById('mProfTax').value = e.profTax;
            document.getElementById('mTds').value = e.tds;

            updateManualPreview();

            var m = new bootstrap.Modal(document.getElementById('manualPayslipModal'));
            m.show();
        };

        function updateManualPreview() {
            var gross = ['mBasic', 'mHra', 'mDa', 'mConvey', 'mMedical', 'mSpecial']
                .reduce(function(s, id) {
                    return s + (parseFloat(document.getElementById(id).value) || 0);
                }, 0);
            var deduct = ['mPf', 'mEsi', 'mProfTax', 'mTds']
                .reduce(function(s, id) {
                    return s + (parseFloat(document.getElementById(id).value) || 0);
                }, 0);
            var net = gross - deduct;
            document.getElementById('mGrossPreview').textContent = '&#8377;' + fmt(gross);
            document.getElementById('mDeductPreview').textContent = '&#8377;' + fmt(deduct);
            document.getElementById('mNetPreview').textContent = '&#8377;' + fmt(net);
        }

        // Live preview on input
        document.querySelectorAll('.manual-earn, .manual-deduct').forEach(function(inp) {
            inp.addEventListener('input', updateManualPreview);
        });

        document.getElementById('saveManualPayslipBtn').addEventListener('click', function() {
            var reqId = parseInt(this.getAttribute('data-req-id'), 10);
            var rq = requests.find(function(r) {
                return r.reqId === reqId;
            });
            if (!rq) return;

            // Save edited values back into a manualOverride on the request
            rq.manualOverride = {
                present: parseInt(document.getElementById('mPresent').value) || 0,
                absent: parseInt(document.getElementById('mAbsent').value) || 0,
                basic: parseFloat(document.getElementById('mBasic').value) || 0,
                hra: parseFloat(document.getElementById('mHra').value) || 0,
                da: parseFloat(document.getElementById('mDa').value) || 0,
                convey: parseFloat(document.getElementById('mConvey').value) || 0,
                medical: parseFloat(document.getElementById('mMedical').value) || 0,
                special: parseFloat(document.getElementById('mSpecial').value) || 0,
                pf: parseFloat(document.getElementById('mPf').value) || 0,
                esi: parseFloat(document.getElementById('mEsi').value) || 0,
                profTax: parseFloat(document.getElementById('mProfTax').value) || 0,
                tds: parseFloat(document.getElementById('mTds').value) || 0
            };
            rq.status = 'generated';
            rq.generated = true;
            rq.genType = 'manual';

            bootstrap.Modal.getInstance(document.getElementById('manualPayslipModal')).hide();
            renderAdminTables();
            renderMyRequests();
            // Open preview with overridden values
            setTimeout(function() {
                previewPayslip(reqId);
            }, 400);
        });

        window.downloadPayslipPdf = function(reqId) {
            var rq = requests.find(function(r) {
                return r.reqId === reqId;
            });
            if (rq) alert('Downloading payslip PDF for ' + rq.empName + ' — ' + rq.period);
        };

        /* ============================================================
           PAYSLIP PREVIEW
        ============================================================ */
        function buildPayslipHtml(rq) {
            var e = allEmployees.find(function(emp) {
                return emp.id === rq.empId;
            });
            if (!e) return '<p>Employee not found.</p>';

            var d = rq.manualOverride || e;
            var present  = d.present  !== undefined ? d.present  : e.present;
            var absent   = d.absent   !== undefined ? d.absent   : e.absent;
            var basic    = d.basic    || e.basic;
            var hra      = d.hra      || e.hra;
            var da       = d.da       || e.da;
            var convey   = d.convey   || e.convey;
            var medical  = d.medical  || e.medical;
            var special  = d.special  || e.special;
            var pf       = d.pf       !== undefined ? d.pf       : e.pf;
            var esi      = d.esi      !== undefined ? d.esi      : e.esi;
            var profTax  = d.profTax  !== undefined ? d.profTax  : e.profTax;
            var tds      = d.tds      !== undefined ? d.tds      : e.tds;

            var gross  = basic + hra + da + convey + medical + special;
            var deduct = pf + esi + profTax + tds;
            var net    = gross - deduct;
            var inWords = numToWords(net);
            var payDate = rq.payDate || '03/10/2023';

            return ''
                + '<div class="payslip-sheet">'
                    + '<div class="payslip-header">'
                        + '<div class="payslip-brand">'
                            + '<div class="payslip-brand-mark">G</div>'
                            + '<div>'
                                + '<div class="payslip-company-name">GHARUDA INFOTECH PVT LTD</div>'
                                + '<div class="payslip-company-address">3rd Floor  Kathalbari, Darbhanga 846004 India</div>'
                            + '</div>'
                        + '</div>'
                        + '<div class="payslip-header-side">'
                            + '<div class="payslip-header-label">Payslip for the Month</div>'
                            + '<div class="payslip-header-month">' + escHtml(rq.period) + '</div>'
                        + '</div>'
                    + '</div>'

                    + '<div class="payslip-summary">'
                        + '<div class="payslip-summary-left">'
                            + '<div class="payslip-summary-title">EMPLOYEE SUMMARY</div>'
                            + '<div class="payslip-summary-row"><span>Employee Name</span><strong>' + escHtml(e.name) + '</strong></div>'
                            + '<div class="payslip-summary-row"><span>Employee ID</span><strong>' + escHtml(e.empId) + '</strong></div>'
                            + '<div class="payslip-summary-row"><span>Pay Period</span><strong>' + escHtml(rq.period) + '</strong></div>'
                            + '<div class="payslip-summary-row"><span>Pay Date</span><strong>' + escHtml(payDate) + '</strong></div>'
                        + '</div>'
                        + '<div class="payslip-summary-right">'
                            + '<div class="payslip-amount-box">'
                                + '<div class="payslip-amount">&#8377;' + fmt(net) + '</div>'
                                + '<div class="payslip-amount-label">Employee Net Pay</div>'
                                + '<div class="payslip-sub-row"><span>Paid Days</span><strong>' + present + '</strong></div>'
                                + '<div class="payslip-sub-row"><span>LOP Days</span><strong>' + absent + '</strong></div>'
                            + '</div>'
                        + '</div>'
                    + '</div>'

                    + '<div class="payslip-table-grid">'
                        + '<div class="payslip-col">'
                            + '<div class="payslip-col-title">EARNINGS</div>'
                            + '<div class="payslip-row"><span>Basic</span><strong>&#8377;' + fmt(basic) + '</strong></div>'
                            + '<div class="payslip-row"><span>House Rent Allowance</span><strong>&#8377;' + fmt(hra) + '</strong></div>'
                            + '<div class="payslip-row"><span>Dearness Allowance</span><strong>&#8377;' + fmt(da) + '</strong></div>'
                            + '<div class="payslip-row"><span>Conveyance</span><strong>&#8377;' + fmt(convey) + '</strong></div>'
                            + '<div class="payslip-row"><span>Medical Allowance</span><strong>&#8377;' + fmt(medical) + '</strong></div>'
                            + '<div class="payslip-row"><span>Special Allowance</span><strong>&#8377;' + fmt(special) + '</strong></div>'
                            + '<div class="payslip-row p-total"><span>Gross Earning</span><strong>&#8377;' + fmt(gross) + '</strong></div>'
                        + '</div>'

                        + '<div class="payslip-col">'
                            + '<div class="payslip-col-title">DEDUCTIONS</div>'
                            + '<div class="payslip-row"><span>Income Tax</span><strong>&#8377;' + fmt(tds) + '</strong></div>'
                            + '<div class="payslip-row"><span>Provident Fund</span><strong>&#8377;' + fmt(pf) + '</strong></div>'
                            + '<div class="payslip-row"><span>ESI</span><strong>&#8377;' + fmt(esi) + '</strong></div>'
                            + '<div class="payslip-row"><span>Professional Tax</span><strong>&#8377;' + fmt(profTax) + '</strong></div>'
                            + '<div class="payslip-row p-total"><span>Total Deductions</span><strong>&#8377;' + fmt(deduct) + '</strong></div>'
                        + '</div>'
                    + '</div>'

                    + '<div class="payslip-net-total">'
                        + '<span>TOTAL NET PAYABLE</span>'
                        + '<strong>&#8377;' + fmt(net) + '</strong>'
                    + '</div>'

                    + '<div class="payslip-words">Amount in Words: <em>Indian Rupee ' + escHtml(inWords) + ' Thousand Only</em></div>'
                    + '<div class="payslip-footer-text">This is a system-generated payslip, hence the signature is not required.</div>'
                + '</div>';
        }

        function slipInfoBox(label, val){
            return '<div class="slip-info-box">'
                + '<div class="slip-info-label">' + label + '</div>'
                + '<div class="slip-info-val">' + escHtml(String(val||'&mdash;')) + '</div>'
                + '</div>';
        }

        function slipTr(label, val, color){
            var c = color === 'red' ? 'red' : 'green';
            return '<tr><td>' + label + '</td><td class="slip-amt ' + c + '">&#8377;' + fmt(val) + '</td></tr>';
        }

        function psRow(label, val, color) {
            var c = color === 'red' ? '#be3035' : '#087a24';
            return '<tr style="border-bottom:1px solid #f0f0f0;">' +
                '<td style="padding:7px 14px;color:#4b5563;">' + label + '</td>' +
                '<td style="padding:7px 14px;text-align:right;font-weight:600;color:' + c + ';">&#8377;' + fmt(val) + '</td>' +
                '</tr>';
        }

        /* simple number to words (Indian) */
        function numToWords(n){
            var a=['','One','Two','Three','Four','Five','Six','Seven','Eight','Nine',
                   'Ten','Eleven','Twelve','Thirteen','Fourteen','Fifteen','Sixteen',
                   'Seventeen','Eighteen','Nineteen'];
            var b=['','','Twenty','Thirty','Forty','Fifty','Sixty','Seventy','Eighty','Ninety'];
            function t(num){
                if(num===0) return '';
                if(num<20) return a[num]+' ';
                if(num<100) return b[Math.floor(num/10)]+' '+(num%10?a[num%10]+' ':'');
                return a[Math.floor(num/100)]+' Hundred '+(num%100?t(num%100):'');
            }
            n=Math.floor(n);
            if(n===0) return 'Zero';
            var cr=Math.floor(n/10000000); n%=10000000;
            var lac=Math.floor(n/100000);  n%=100000;
            var th=Math.floor(n/1000);     n%=1000;
            var res='';
            if(cr)  res+=t(cr)+'Crore ';
            if(lac) res+=t(lac)+'Lakh ';
            if(th)  res+=t(th)+'Thousand ';
            if(n)   res+=t(n);
            return res.trim();
        }

        var previewReqId = null;

        function getPayslipViewUrl(rq, action) {
            var url = 'payslip-view.php?id=' + (rq.empId || 1) + '&period=' + encodeURIComponent(rq.period || 'May 2026');
            if (action) url += '&action=' + encodeURIComponent(action);
            if (rq.manualOverride) {
                var m = rq.manualOverride;
                url += '&basic=' + (m.basic || 0) +
                       '&hra=' + (m.hra || 0) +
                       '&da=' + (m.da || 0) +
                       '&convey=' + (m.convey || 0) +
                       '&medical=' + (m.medical || 0) +
                       '&special=' + (m.special || 0) +
                       '&pf=' + (m.pf || 0) +
                       '&esi=' + (m.esi || 0) +
                       '&profTax=' + (m.profTax || 0) +
                       '&tds=' + (m.tds || 0) +
                       '&present=' + (m.present || 0) +
                       '&absent=' + (m.absent || 0);
            }
            return url;
        }

        window.previewPayslip = function(reqId) {
            var rq = requests.find(function(r) { return r.reqId === reqId; });
            if (!rq) return;
            window.open(getPayslipViewUrl(rq, 'view'), '_blank');
        };

        window.printPayslip = function(reqId) {
            var rq = requests.find(function(r) { return r.reqId === reqId; });
            if (!rq) return;
            window.open(getPayslipViewUrl(rq, 'print'), '_blank');
        };

        window.downloadPayslipPdf = function(reqId) {
            var rq = requests.find(function(r) { return r.reqId === reqId; });
            if (!rq) return;
            window.open(getPayslipViewUrl(rq, 'download'), '_blank');
        };

        /* ============================================================
           UTILITY
        ============================================================ */
        function escHtml(s) {
            return String(s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        /* init */
        renderMyRequests();

    })();
