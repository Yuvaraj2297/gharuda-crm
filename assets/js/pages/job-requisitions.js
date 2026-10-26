/**
 * Gharuda CRM - Job Requisitions Page Script
 * File: assets/js/pages/job-requisitions.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
function openHrReplyModal(btn) {
    try {
        const dataStr = btn.getAttribute('data-req');
        if (!dataStr) return;
        const data = JSON.parse(dataStr);

        if (document.getElementById('vhrReqId')) document.getElementById('vhrReqId').textContent = data.req_id || 'REQ';
        if (document.getElementById('vhrProjectName')) document.getElementById('vhrProjectName').textContent = data.project_name || 'Project';
        if (document.getElementById('vhrJobTitle')) document.getElementById('vhrJobTitle').textContent = data.job_title || 'Developer';
        if (document.getElementById('vhrStatusBadge')) document.getElementById('vhrStatusBadge').textContent = data.status || 'Pending';
        if (document.getElementById('vhrRequestedBy')) document.getElementById('vhrRequestedBy').textContent = data.requested_by || 'Team Lead';
        if (document.getElementById('vhrDateRequested')) document.getElementById('vhrDateRequested').textContent = data.date_requested || '';
        if (document.getElementById('vhrTlMessage')) document.getElementById('vhrTlMessage').textContent = data.tl_message || 'No specific message provided.';
        if (document.getElementById('vhrOpenings')) document.getElementById('vhrOpenings').textContent = data.openings || '1';
        if (document.getElementById('vhrBudget')) document.getElementById('vhrBudget').textContent = data.budget || 'Best in Industry';
        if (document.getElementById('vhrPriority')) document.getElementById('vhrPriority').textContent = data.priority || 'Normal';
        
        if (document.getElementById('vhrHrReplyText')) document.getElementById('vhrHrReplyText').textContent = data.hr_reply || 'HR has reviewed and acknowledged the requisition.';
        if (document.getElementById('vhrReplyDate')) document.getElementById('vhrReplyDate').textContent = data.hr_reply_date || 'Recently';

        const jobCodeBox = document.getElementById('vhrJobCodeLinkBox');
        const jobCodeText = document.getElementById('vhrJobCodeText');
        if (jobCodeBox && jobCodeText) {
            if (data.job_code) {
                jobCodeText.textContent = data.job_code;
                jobCodeBox.style.display = 'block';
            } else {
                jobCodeBox.style.display = 'none';
            }
        }

        const modalEl = document.getElementById('viewHrReplyModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    } catch(err) {
        console.error("Error opening HR Reply Modal:", err);
    }
}

function openEditReqModal(btn) {
    try {
        const dataStr = btn.getAttribute('data-req');
        if (!dataStr) return;
        const req = JSON.parse(dataStr);

        if (document.getElementById('eReqIdBadge')) document.getElementById('eReqIdBadge').textContent = req.req_id;
        if (document.getElementById('eReqId')) document.getElementById('eReqId').value = req.req_id;
        if (document.getElementById('eProjectName')) document.getElementById('eProjectName').value = req.project_name || '';
        if (document.getElementById('eJobTitle')) document.getElementById('eJobTitle').value = req.job_title || '';
        if (document.getElementById('eDept')) document.getElementById('eDept').value = req.department || 'Engineering';
        if (document.getElementById('eOpenings')) document.getElementById('eOpenings').value = req.openings || 1;
        if (document.getElementById('ePriority')) document.getElementById('ePriority').value = req.priority || 'Normal';
        if (document.getElementById('eExp')) document.getElementById('eExp').value = req.experience || '';
        if (document.getElementById('eBudget')) document.getElementById('eBudget').value = req.budget || '';
        if (document.getElementById('eRequestedBy')) document.getElementById('eRequestedBy').value = req.requested_by || '';
        if (document.getElementById('eTlEmail')) document.getElementById('eTlEmail').value = req.tl_email || '';
        if (document.getElementById('eStatus')) document.getElementById('eStatus').value = req.status || 'Pending HR Review';
        if (document.getElementById('eTlMessage')) document.getElementById('eTlMessage').value = req.tl_message || '';
        if (document.getElementById('eHrNotes')) document.getElementById('eHrNotes').value = req.hr_notes || '';

        const modalEl = document.getElementById('editReqModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    } catch(err) {
        console.error("Error opening Edit Req Modal:", err);
    }
}

document.addEventListener('DOMContentLoaded', function() {

    var defaultReqData = [
        {
            req_id: "REQ-2026-001",
            project_name: "Gharuda HRMS Enterprise v2",
            job_title: "Senior React & Node.js Lead Developer",
            department: "Engineering",
            openings: 2,
            priority: "Urgent",
            experience: "4-6 Years",
            budget: "₹16L - ₹22L",
            status: "Pending HR Review",
            requested_by: "Santhosh Kumar (Tech Lead)",
            tl_email: "santhosh.k@gharuda.com",
            date_requested: "12-Oct-2026",
            tl_message: "We urgently need 2 Fullstack React + Node developers for module expansion. Client deadline is approaching end of next month. Please check and post this job opening as soon as possible.",
            job_code: "",
            hr_notes: ""
        },
        {
            req_id: "REQ-2026-002",
            project_name: "Fintech Core Banking API",
            job_title: "Go / Microservices Backend Architect",
            department: "Engineering",
            openings: 3,
            priority: "High",
            experience: "5-8 Years",
            budget: "₹22L - ₹30L",
            status: "Approved & Job Posted",
            requested_by: "Karthik V (Principal Lead)",
            tl_email: "karthik.v@gharuda.com",
            date_requested: "09-Oct-2026",
            tl_message: "High-throughput API microservices work requires senior Go backend developers experienced in distributed caching and Redis.",
            job_code: "JOB-102",
            hr_notes: "Job posted on LinkedIn & Naukri portals. Initial candidate screening in progress."
        },
        {
            req_id: "REQ-2026-003",
            project_name: "Retail Mobile App Solution",
            job_title: "iOS Native App Developer (SwiftUI)",
            department: "iOS Dev",
            openings: 1,
            priority: "Normal",
            experience: "3-5 Years",
            budget: "₹12L - ₹16L",
            status: "Pending HR Review",
            requested_by: "Anitha R (Mobile Lead)",
            tl_email: "anitha.r@gharuda.com",
            date_requested: "13-Oct-2026",
            tl_message: "iOS developer needed for payment gateway integration and checkout screen redesign in Sprint 4.",
            job_code: "",
            hr_notes: ""
        }
    ];

    var reqData;
    try {
        var stored = localStorage.getItem('gh_job_requisitions');
        if (stored) {
            reqData = JSON.parse(stored);
        } else {
            reqData = defaultReqData.slice();
            localStorage.setItem('gh_job_requisitions', JSON.stringify(reqData));
        }
    } catch(e) {
        reqData = defaultReqData.slice();
    }

    function saveReqData() {
        try {
            localStorage.setItem('gh_job_requisitions', JSON.stringify(reqData));
        } catch(e) {}
    }

    function updateKpiCounts() {
        var total = reqData.length;
        var pending = 0;
        var posted = 0;
        var devs = 0;
        reqData.forEach(function(r) {
            devs += parseInt(r.openings, 10) || 0;
            var st = (r.status || '').toLowerCase();
            if (st.includes('pending')) pending++;
            else if (st.includes('posted') || st.includes('approved')) posted++;
        });

        var elTotal = document.getElementById('kpiTotalReqs');
        var elPending = document.getElementById('kpiPendingHr');
        var elPosted = document.getElementById('kpiApprovedPosted');
        var elDevs = document.getElementById('kpiTotalDevs');

        if (elTotal) elTotal.textContent = total;
        if (elPending) elPending.textContent = pending;
        if (elPosted) elPosted.textContent = posted;
        if (elDevs) elDevs.textContent = devs;

        var cAll = document.getElementById('countAll');
        var cPending = document.getElementById('countPending');
        var cPosted = document.getElementById('countPosted');

        if (cAll) cAll.textContent = total;
        if (cPending) cPending.textContent = pending;
        if (cPosted) cPosted.textContent = posted;
    }

    var reqTable = MasterTable.init({
        tableId: 'requisitionsTable',
        tbodyId: 'requisitionsTbody',
        data: reqData,
        tableName: 'TL Developer Requisitions',
        primaryKey: 'req_id',
        searchFields: ['project_name', 'requested_by', 'job_title', 'department', 'experience', 'priority', 'status', 'date_requested'],
        columns: [
            { field: 'project_name', title: 'Project Name', sortable: true, render: function(v) {
                return '<div class="fw-bold text-dark">' + (v || '') + '</div>';
            }},
            { field: 'requested_by', title: 'Requested By', sortable: true, render: function(v) {
                return '<div class="fw-semibold text-dark"><i class="bi bi-person me-1 text-secondary"></i>' + (v || '') + '</div>';
            }},
            { field: 'date_requested', title: 'Requested Date', sortable: true, render: function(v) {
                return '<div class="fw-medium text-dark" style="font-size:12.5px;"><i class="bi bi-calendar3 me-1 text-muted"></i>' + (v || '') + '</div>';
            }},
            { field: 'job_title', title: 'Developer Role Requested', sortable: true, render: function(v, row) {
                var safeMsg = row.tl_message ? String(row.tl_message).replace(/"/g, '&quot;') : '';
                var msg = row.tl_message ? '<div class="text-truncate text-muted" style="max-width:240px; font-size:11.5px;" title="' + safeMsg + '"><i class="bi bi-quote me-1 text-primary"></i> ' + row.tl_message + '</div>' : '';
                return '<div class="fw-bold text-dark">' + (v || '') + '</div>' + msg;
            }},
            { field: 'department', title: 'Department', sortable: true, render: function(v) {
                return '<span class="badge bg-light text-dark border">' + (v || '') + '</span>';
            }},
            { field: 'experience', title: 'Experience', sortable: true, render: function(v) {
                return '<span class="fw-medium text-dark" style="font-size:12.5px;">' + (v || '') + '</span>';
            }},
            { field: 'openings', title: 'Openings', sortable: true, render: function(v) {
                return '<div class="text-center fw-bold fs-6 text-dark">' + (v || 1) + '</div>';
            }},
            { field: 'priority', title: 'Priority', sortable: true, render: function(v) {
                var prioClass = 'priority-tag-normal';
                if (v === 'Urgent') prioClass = 'priority-tag-urgent';
                else if (v === 'High') prioClass = 'priority-tag-high';
                return '<span class="' + prioClass + '">' + (v || 'Normal') + '</span>';
            }},
            { field: 'status', title: 'Status', sortable: true, render: function(v, row) {
                var statusClass = 'badge-status-pending';
                if (v === 'Approved & Job Posted') statusClass = 'badge-status-posted';
                else if (v === 'Rejected') statusClass = 'badge-status-rejected';
                var jCode = row.job_code ? '<div class="mt-1" style="font-size:11px;"><a href="job-openings.php" class="fw-bold text-success text-decoration-none"><i class="bi bi-link-45deg"></i> ' + row.job_code + '</a></div>' : '';
                return '<span class="' + statusClass + '"><i class="bi bi-circle-fill" style="font-size:7px;"></i> ' + (v || '') + '</span>' + jCode;
            }},
            { field: null, title: 'Action', sortable: false, render: function(v, row) {
                var reqStr = JSON.stringify(row).replace(/"/g, '&quot;');
                var replyBtn = row.hr_reply ?
                    '<button type="button" class="btn btn-action-icon btn-action-reply position-relative shadow-xs" onclick="openHrReplyModal(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="View HR Reply & Activity Timeline" data-req="' + reqStr + '"><i class="bi bi-chat-left-text-fill"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-success border border-white shadow-sm" style="font-size:9.5px; padding:3px 5px; transform: translate(-30%, -30%) !important;">1</span></button>' :
                    '<button type="button" class="btn btn-action-icon btn-action-pending shadow-xs" onclick="openHrReplyModal(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="Pending HR Review (Click to view details)" data-req="' + reqStr + '"><i class="bi bi-clock-history"></i></button>';
                var editBtn = '<button type="button" class="btn btn-action-icon btn-action-edit shadow-xs" onclick="openEditReqModal(this)" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Requisition Details" data-req="' + reqStr + '"><i class="bi bi-pencil-fill" style="font-size:13.5px;"></i></button>';
                return '<div class="d-flex align-items-center justify-content-center gap-2">' + replyBtn + editBtn + '</div>';
            }}
        ]
    });

    updateKpiCounts();

    // Segment Filter Buttons
    var filterContainer = document.getElementById('statusFilterGroup');
    if (filterContainer) {
        var filterBtns = filterContainer.querySelectorAll('.status-segment-btn');
        filterBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                filterBtns.forEach(function(b) { b.classList.remove('active'); });
                this.classList.add('active');
                var currentFilter = this.getAttribute('data-filter') || 'all';
                if (currentFilter === 'all') {
                    reqTable.setData(reqData);
                } else if (currentFilter === 'Pending') {
                    reqTable.setData(reqData.filter(function(r) { return (r.status || '').toLowerCase().includes('pending'); }));
                } else if (currentFilter === 'Posted') {
                    reqTable.setData(reqData.filter(function(r) { return (r.status || '').toLowerCase().includes('posted') || (r.status || '').toLowerCase().includes('approved'); }));
                }
            });
        });
    }

    // Form Submit: New Requisition (Client-side JS + Bootstrap modal)
    const formNew = document.getElementById('formNewRequisition');
    if (formNew) {
        formNew.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const d = new Date();
            const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            const dateStr = `${String(d.getDate()).padStart(2,'0')}-${months[d.getMonth()]}-${d.getFullYear()}`;
            const newId = 'REQ-2026-' + String(reqData.length + 1).padStart(3, '0');

            const newReq = {
                req_id: newId,
                project_name: (fd.get('Project_Name') || fd.get('project_name') || 'New Project').trim(),
                job_title: (fd.get('job_title') || 'Developer').trim(),
                department: fd.get('department') || 'Engineering',
                openings: parseInt(fd.get('openings'), 10) || 1,
                priority: fd.get('priority') || 'Normal',
                experience: fd.get('experience') || '3-5 Years',
                budget: fd.get('budget') || 'Best in Industry',
                status: 'Pending HR Review',
                requested_by: (fd.get('requested_by') || 'Team Lead').trim(),
                tl_email: (fd.get('tl_email') || 'tl@gharuda.com').trim(),
                date_requested: dateStr,
                tl_message: (fd.get('tl_message') || '').trim(),
                job_code: '',
                hr_notes: ''
            };

            reqData.unshift(newReq);
            saveReqData();
            reqTable.setData(reqData);
            updateKpiCounts();

            const modalEl = document.getElementById('newRequisitionModal');
            if (modalEl && typeof bootstrap !== 'undefined') {
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            }
            formNew.reset();
            alert('✅ Resource Requisition (' + newId + ') submitted to HR successfully!');
        });
    }

    // Form Submit: Edit Requisition (Client-side JS)
    const formEdit = document.getElementById('formEditRequisition');
    if (formEdit) {
        formEdit.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const reqId = fd.get('req_id');
            const item = reqData.find(function(r) { return r.req_id === reqId; });
            if (item) {
                item.project_name = fd.get('project_name') || item.project_name;
                item.job_title = fd.get('job_title') || item.job_title;
                item.department = fd.get('department') || item.department;
                item.openings = parseInt(fd.get('openings'), 10) || item.openings;
                item.priority = fd.get('priority') || item.priority;
                item.experience = fd.get('experience') || item.experience;
                item.requested_by = fd.get('requested_by') || item.requested_by;
                item.tl_email = fd.get('tl_email') || item.tl_email;
                item.status = fd.get('status') || item.status;
                item.tl_message = fd.get('tl_message') || item.tl_message;
                item.hr_notes = fd.get('hr_notes') || item.hr_notes;

                saveReqData();
                reqTable.setData(reqData);
                updateKpiCounts();

                const modalEl = document.getElementById('editReqModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
                alert('✅ Requisition ' + reqId + ' updated successfully!');
            }
        });
    }

    // HR Approve Buttons in table
    document.querySelectorAll('.btn-hr-approve').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const dataStr = this.getAttribute('data-req');
            if (!dataStr) return;
            const req = JSON.parse(dataStr);
            openApproveModal(req);
        });
    });

    window.openApproveModal = function(req) {
        if (document.getElementById('apReqId')) document.getElementById('apReqId').textContent = req.req_id;
        if (document.getElementById('apHiddenReqId')) document.getElementById('apHiddenReqId').value = req.req_id;
        if (document.getElementById('apJobTitle')) document.getElementById('apJobTitle').value = req.job_title;
        if (document.getElementById('apOpenings')) document.getElementById('apOpenings').value = req.openings;
        if (document.getElementById('apDept')) document.getElementById('apDept').value = req.department;
        if (document.getElementById('apPriority')) document.getElementById('apPriority').value = req.priority;
        if (document.getElementById('apBudget')) document.getElementById('apBudget').value = req.budget || 'Best in Industry';

        const modalEl = document.getElementById('approvePostModal');
        if (modalEl && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
            modal.show();
        }
    };

    // HR Approve & Publish Form Submit (Client-side JS)
    const formApprove = document.getElementById('formApprovePost');
    if (formApprove) {
        formApprove.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const reqId = fd.get('req_id');
            const jobCode = 'JOB-' + Math.floor(105 + Math.random() * 95);
            const item = reqData.find(function(r) { return r.req_id === reqId; });
            if (item) {
                item.status = 'Approved & Job Posted';
                item.job_code = jobCode;
                item.hr_notes = fd.get('hr_notes') || 'Approved and posted as new Job Opening by HR.';

                saveReqData();
                reqTable.setData(reqData);
                updateKpiCounts();

                // Create job object and sync with localStorage for job-openings.php
                const createdJob = {
                    id: Date.now(),
                    code: jobCode,
                    title: fd.get('job_title') || item.job_title,
                    dept: fd.get('department') || item.department,
                    location: fd.get('location') || 'Bangalore (Hybrid)',
                    type: 'Full-Time',
                    openings: fd.get('openings') || item.openings,
                    exp: item.experience || '3-5 Years',
                    budget: fd.get('budget') || item.budget,
                    priority: fd.get('priority') || item.priority,
                    description: 'Created from TL Requisition for ' + item.project_name,
                    postLinkedin: true,
                    postNaukri: true,
                    postCareers: true
                };
                try {
                    localStorage.setItem('gh_newly_created_job', JSON.stringify(createdJob));
                } catch(e){}

                const modalEl = document.getElementById('approvePostModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
                alert('✅ Requisition ' + reqId + ' checked & approved by HR! New job post ' + jobCode + ' has been published.');
            }
        });
    }

    // Initialize Bootstrap Tooltips for Action Icon Buttons
    try {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    } catch(e) {}
});
