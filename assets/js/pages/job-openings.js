/**
 * Gharuda CRM - Job Openings Page Script
 * File: assets/js/pages/job-openings.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    // Check if coming back from job-create.php with a newly created job
    try {
        const rawNewJob = localStorage.getItem('gh_newly_created_job');
        if (rawNewJob) {
            const jobData = JSON.parse(rawNewJob);
            localStorage.removeItem('gh_newly_created_job');

            const tbody = document.getElementById('pgBody');
            if (tbody && jobData && jobData.title) {
                const totalRows = tbody.querySelectorAll('tr').length;
                const newId = totalRows + 1;
                const jobCode = 'JOB-10' + newId;

                const d = new Date();
                const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                const todayStr = `${String(d.getDate()).padStart(2,'0')}-${months[d.getMonth()]}-${d.getFullYear()}`;

                let pillClass = 'priority-normal';
                if (jobData.priority === 'Urgent') pillClass = 'priority-urgent';
                else if (jobData.priority === 'High') pillClass = 'priority-high';

                let portalBadgesHtml = '';
                let postedList = [];
                if (jobData.postLinkedin) {
                    portalBadgesHtml += `<a href="${jobData.urlLinkedin || '#'}" target="_blank" class="portal-chip portal-linkedin text-decoration-none" title="Open LinkedIn Page"><i class="bi bi-linkedin"></i> LinkedIn</a> `;
                    postedList.push('LinkedIn');
                }
                if (jobData.postNaukri) {
                    portalBadgesHtml += `<a href="${jobData.urlNaukri || '#'}" target="_blank" class="portal-chip portal-naukri text-decoration-none" title="Open Naukri Listing"><i class="bi bi-briefcase-fill"></i> Naukri</a> `;
                    postedList.push('Naukri.com');
                }
                if (jobData.postIndeed) {
                    portalBadgesHtml += `<a href="${jobData.urlIndeed || '#'}" target="_blank" class="portal-chip portal-indeed text-decoration-none" title="Open Indeed Employer Page"><i class="bi bi-globe"></i> Indeed</a> `;
                    postedList.push('Indeed');
                }
                if (jobData.postCareers) {
                    portalBadgesHtml += `<a href="${jobData.urlCareers || 'careers.php'}" target="_blank" class="portal-chip portal-careers text-decoration-none" title="Open Careers Portal"><i class="bi bi-building"></i> Careers</a> `;
                    postedList.push('Career Portal');
                }
                if (jobData.urlWhatsapp) {
                    portalBadgesHtml += `<a href="${jobData.urlWhatsapp}" target="_blank" class="portal-chip bg-success-subtle text-success border-success-subtle text-decoration-none" title="WhatsApp Broadcast Link"><i class="bi bi-whatsapp"></i> WhatsApp</a> `;
                }
                if (jobData.urlSocial) {
                    portalBadgesHtml += `<a href="${jobData.urlSocial}" target="_blank" class="portal-chip bg-primary-subtle text-primary border-primary-subtle text-decoration-none" title="Social Media Careers Page"><i class="bi bi-instagram"></i> Social</a> `;
                }
                if (!portalBadgesHtml) {
                    portalBadgesHtml = `<span class="badge bg-light text-dark border" style="font-size:10px;">Internal Only</span>`;
                }

                const newTr = document.createElement('tr');
                newTr.setAttribute('data-id', newId);
                newTr.setAttribute('data-code', jobCode);
                newTr.setAttribute('data-title', jobData.title);
                newTr.setAttribute('data-exp', jobData.exp || 'Freshers');
                newTr.setAttribute('data-posted', todayStr);
                newTr.setAttribute('data-dept', jobData.dept || 'Engineering');
                newTr.setAttribute('data-location', jobData.location);
                newTr.setAttribute('data-type', jobData.type || 'Full-Time');
                newTr.setAttribute('data-openings', jobData.openings || '1');
                newTr.setAttribute('data-applicants', '0');
                newTr.setAttribute('data-budget', jobData.budget || 'Best in Industry');
                newTr.setAttribute('data-priority', jobData.priority || 'Normal');
                newTr.setAttribute('data-status', 'Active');
                newTr.setAttribute('data-description', jobData.description || '');

                newTr.innerHTML = `
                    <td class="job-sno">${newId}</td>
                    <td class="job-title-cell">
                        <div class="fw-bold text-dark job-title-text">${jobData.title}</div>
                        <div class="text-muted job-sub-text" style="font-size:11.5px;">Exp: ${jobData.exp || 'Freshers'}</div>
                    </td>
                    <td class="job-dept-cell"><span class="badge bg-light text-dark border">${jobData.dept || 'Engineering'}</span></td>
                    <td class="job-loc-cell">
                        <div class="text-dark fw-semibold job-loc-text" style="font-size:12.5px;">${jobData.location}</div>
                        <div class="text-muted job-type-text" style="font-size:11px;">${jobData.type || 'Full-Time'}</div>
                    </td>
                    <td class="job-postedby-cell">
                        <div class="fw-bold text-dark job-postedby-name" style="font-size:12.5px;"><i class="bi bi-person-fill text-primary me-1"></i> ${jobData.postedBy || 'Priya Sharma'}</div>
                        <div class="text-muted job-postedby-role" style="font-size:11px;">HR Recruiter</div>
                    </td>
                    <td class="job-posteddate-cell">
                        <div class="fw-semibold text-dark job-posted-date" style="font-size:12.5px;"><i class="bi bi-calendar-event me-1 text-secondary"></i> ${todayStr}</div>
                    </td>
                    <td class="job-postedage-cell text-center">
                        <span class="badge bg-success-subtle text-success border border-success-subtle job-posted-age" style="font-size:11px; font-weight:700;"><i class="bi bi-clock-history me-1"></i> Today (0 Days)</span>
                    </td>
                    <td class="fw-bold text-center job-openings-cell">${jobData.openings || 1}</td>
                    <td class="fw-bold text-success job-budget-cell">${jobData.budget || 'Best in Industry'}</td>
                    <td class="job-priority-cell"><span class="priority-pill ${pillClass}">${jobData.priority}</span></td>
                    <td class="job-portals-cell">
                        <div class="d-flex align-items-center gap-1 flex-wrap">${portalBadgesHtml}</div>
                    </td>
                    <td class="job-status-cell"><span class="status-badge-open"><i class="bi bi-circle-fill" style="font-size:7px;"></i> Active</span></td>
                    <td>
                        <a href="job-edit.php?id=${newId}" class="btn btn-sm edit btn-edit-job" data-id="${newId}" data-bs-toggle="tooltip" data-bs-title="Edit Job">
                            <i class="mdi mdi-pencil"></i>
                        </a>
                    </td>
                `;

                tbody.appendChild(newTr);
                setTimeout(function() {
                    newTr.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    newTr.classList.add('table-success');
                    setTimeout(() => newTr.classList.remove('table-success'), 2500);
                }, 200);
            }
        }
    } catch(e){}

    // Handle Edit button click in Action column - Navigate to job-edit.php page
    document.addEventListener('click', function(e) {
        const editBtn = e.target.closest('.btn-edit-job');
        if (!editBtn) return;

        const row = editBtn.closest('tr');
        const id = editBtn.getAttribute('data-id') || row?.getAttribute('data-id') || '1';
        
        // Save current row state into localStorage for job-edit.php sync
        if (row) {
            const jobInfo = {
                id: id,
                code: row.getAttribute('data-code') || row.querySelector('.job-code-cell')?.textContent.trim() || '',
                title: row.getAttribute('data-title') || row.querySelector('.job-title-text')?.textContent.trim() || '',
                dept: row.getAttribute('data-dept') || row.querySelector('.job-dept-cell .badge')?.textContent.trim() || 'Engineering',
                location: row.getAttribute('data-location') || row.querySelector('.job-loc-text')?.textContent.trim() || '',
                type: row.getAttribute('data-type') || row.querySelector('.job-type-text')?.textContent.trim() || 'Full-Time',
                openings: row.getAttribute('data-openings') || row.querySelector('.job-openings-cell')?.textContent.trim() || '1',
                exp: row.getAttribute('data-exp') || '',
                budget: row.getAttribute('data-budget') || row.querySelector('.job-budget-cell')?.textContent.trim() || '',
                priority: row.getAttribute('data-priority') || 'Normal',
                status: row.getAttribute('data-status') || 'Active',
                postedBy: row.getAttribute('data-postedby') || row.querySelector('.job-postedby-name')?.textContent.trim() || 'Priya Sharma (HR Lead)',
                description: row.getAttribute('data-description') || ''
            };
            try {
                localStorage.setItem('gh_edited_job_' + id, JSON.stringify(jobInfo));
            } catch(err){}
        }

        window.location.href = 'job-edit.php?id=' + id;
    });

    // Save changes from Edit modal
    const btnSaveJobEdit = document.getElementById('btnSaveJobEdit');
    if (btnSaveJobEdit) {
        btnSaveJobEdit.addEventListener('click', function() {
            const id = document.getElementById('edit_job_id').value;
            const title = document.getElementById('edit_job_title').value.trim();
            const dept = document.getElementById('edit_job_dept').value;
            const location = document.getElementById('edit_job_location').value.trim();
            const type = document.getElementById('edit_job_type').value;
            const openings = document.getElementById('edit_job_openings').value.trim();
            const exp = document.getElementById('edit_job_exp').value.trim();
            const budget = document.getElementById('edit_job_budget').value.trim();
            const priority = document.getElementById('edit_job_priority').value;
            const status = document.getElementById('edit_job_status').value;
            const description = document.getElementById('edit_job_desc').value.trim();
            const posted = document.getElementById('edit_job_posted').value || 'Recently';
            const code = document.getElementById('edit_job_code').value;

            if (!title) {
                alert('Please enter a Position Title.');
                document.getElementById('edit_job_title').focus();
                return;
            }
            if (!location) {
                alert('Please enter a Work Location.');
                document.getElementById('edit_job_location').focus();
                return;
            }
            if (!openings || parseInt(openings) < 1) {
                alert('Please enter a valid number of openings.');
                document.getElementById('edit_job_openings').focus();
                return;
            }

            // Find matching row
            const row = document.querySelector(`tr[data-id="${id}"]`);
            if (row) {
                // Update dataset attributes
                row.setAttribute('data-title', title);
                row.setAttribute('data-dept', dept);
                row.setAttribute('data-location', location);
                row.setAttribute('data-type', type);
                row.setAttribute('data-openings', openings);
                row.setAttribute('data-exp', exp);
                row.setAttribute('data-budget', budget);
                row.setAttribute('data-priority', priority);
                row.setAttribute('data-status', status);
                row.setAttribute('data-description', description);

                // Update Position Title & Exp text
                const titleTextEl = row.querySelector('.job-title-text');
                if (titleTextEl) titleTextEl.textContent = title;

                const subTextEl = row.querySelector('.job-sub-text');
                if (subTextEl) {
                    let subInfo = [];
                    if (exp) subInfo.push('Exp: ' + exp);
                    if (posted) subInfo.push('Posted ' + posted);
                    subTextEl.textContent = subInfo.join(' • ') || 'Posted Recently';
                }

                // Update Department badge
                const deptCell = row.querySelector('.job-dept-cell');
                if (deptCell) {
                    deptCell.innerHTML = `<span class="badge bg-light text-dark border">${dept}</span>`;
                }

                // Update Location & Type
                const locTextEl = row.querySelector('.job-loc-text');
                if (locTextEl) locTextEl.textContent = location;
                const typeTextEl = row.querySelector('.job-type-text');
                if (typeTextEl) typeTextEl.textContent = type;

                // Update Openings
                const openingsCell = row.querySelector('.job-openings-cell');
                if (openingsCell) openingsCell.textContent = openings;

                // Update Budget
                const budgetCell = row.querySelector('.job-budget-cell');
                if (budgetCell) budgetCell.textContent = budget || '-';

                // Update Priority Pill
                const priorityCell = row.querySelector('.job-priority-cell');
                if (priorityCell) {
                    let pillClass = 'priority-normal';
                    if (priority === 'Urgent') pillClass = 'priority-urgent';
                    else if (priority === 'High') pillClass = 'priority-high';
                    priorityCell.innerHTML = `<span class="priority-pill ${pillClass}">${priority}</span>`;
                }

                // Update Status Badge
                const statusCell = row.querySelector('.job-status-cell');
                if (statusCell) {
                    let statusBadgeClass = 'status-badge-open';
                    let statusIcon = 'bi-circle-fill';
                    if (status === 'Draft') {
                        statusBadgeClass = 'status-badge-draft';
                    } else if (status === 'On Hold') {
                        statusBadgeClass = 'status-badge-hold';
                    } else if (status === 'Closed') {
                        statusBadgeClass = 'status-badge-closed';
                    }
                    statusCell.innerHTML = `<span class="${statusBadgeClass}"><i class="bi ${statusIcon}" style="font-size:7px;"></i> ${status}</span>`;
                }

                // Close modal
                const editModalEl = document.getElementById('editJobModal');
                if (editModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(editModalEl).hide();
                }

                // Highlight row briefly
                row.classList.add('table-success');
                setTimeout(() => row.classList.remove('table-success'), 1500);
            }
        });
    }

    // Create Job Modal Link auto-populator
    const createJobModalEl = document.getElementById('createJobModal');
    if (createJobModalEl) {
        createJobModalEl.addEventListener('show.bs.modal', function() {
            const tbody = document.getElementById('pgBody');
            const totalRows = tbody ? tbody.querySelectorAll('tr').length : 5;
            const nextCode = 'JOB-10' + (totalRows + 1);
            const baseUrl = window.location.origin + window.location.pathname.replace('job-openings.php', 'careers.php');
            const generatedUrl = `${baseUrl}?job=${nextCode}`;

            const linkInput = document.getElementById('modal_create_careers_link');
            const previewBtn = document.getElementById('btnPreviewModalCreateLink');
            if (linkInput) linkInput.value = generatedUrl;
            if (previewBtn) previewBtn.href = generatedUrl;
        });
    }

    // Copy Button inside Create Job Modal
    const btnCopyModalCreateLink = document.getElementById('btnCopyModalCreateLink');
    if (btnCopyModalCreateLink) {
        btnCopyModalCreateLink.addEventListener('click', function() {
            const linkInput = document.getElementById('modal_create_careers_link');
            if (linkInput && linkInput.value) {
                navigator.clipboard.writeText(linkInput.value).then(function() {
                    alert('🔗 Official Careers Portal Link copied to clipboard!\n\nLink: ' + linkInput.value + '\n\nYou can now share this application link on Social Media or Job Posts.');
                }).catch(function() {
                    prompt('Copy this Official Careers Link:', linkInput.value);
                });
            }
        });
    }

    // Handle Publish Button & Form Submission for Create Job Modal
    const btnPublishJob = document.getElementById('btnPublishJob');
    const createJobForm = document.getElementById('createJobForm');

    if (btnPublishJob) {
        btnPublishJob.addEventListener('click', function() {
            if (createJobForm) {
                const titleInput = document.getElementById('create_job_title');
                const locInput = document.getElementById('create_job_location');
                if (titleInput && !titleInput.value.trim()) {
                    alert('Please enter a Position Title.');
                    titleInput.focus();
                    return;
                }
                if (locInput && !locInput.value.trim()) {
                    alert('Please enter a Work Location.');
                    locInput.focus();
                    return;
                }
                createJobForm.dispatchEvent(new Event('submit', { cancelable: true }));
            }
        });
    }

    if (createJobForm) {
        createJobForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const title = (document.getElementById('create_job_title')?.value || '').trim();
            const dept = document.getElementById('create_job_dept')?.value || 'Design';
            const location = (document.getElementById('create_job_location')?.value || '').trim();
            const type = document.getElementById('create_job_type')?.value || 'Full-Time';
            const openings = (document.getElementById('create_job_openings')?.value || '1').trim();
            const exp = (document.getElementById('create_job_exp')?.value || '').trim() || 'Freshers / Any';
            const budget = (document.getElementById('create_job_budget')?.value || '').trim() || 'Best in Industry';
            const priority = document.getElementById('create_job_priority')?.value || 'Normal';
            const description = (document.getElementById('create_job_desc')?.value || '').trim();

            const postLinkedin = document.getElementById('create_post_linkedin')?.checked;
            const postNaukri = document.getElementById('create_post_naukri')?.checked;
            const postIndeed = document.getElementById('create_post_indeed')?.checked;
            const postCareers = document.getElementById('create_post_careers')?.checked;

            const urlLinkedin = document.getElementById('create_url_linkedin')?.value || 'https://linkedin.com';
            const urlNaukri = document.getElementById('create_url_naukri')?.value || 'https://naukri.com';
            const urlIndeed = document.getElementById('create_url_indeed')?.value || 'https://indeed.com';
            const urlCareers = document.getElementById('modal_create_careers_link')?.value || 'careers.php';
            const urlWhatsapp = document.getElementById('create_url_whatsapp')?.value;
            const urlSocial = document.getElementById('create_url_social')?.value;

            if (!title) { alert('Please enter Position Title.'); return; }
            if (!location) { alert('Please enter Location.'); return; }
            if (!openings || parseInt(openings) < 1) { alert('Please enter valid openings count.'); return; }

            const tbody = document.getElementById('pgBody');
            const totalRows = tbody ? tbody.querySelectorAll('tr').length : 5;
            const newId = totalRows + 1;
            const jobCode = 'JOB-10' + newId;

            const d = new Date();
            const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
            const todayStr = `${String(d.getDate()).padStart(2,'0')}-${months[d.getMonth()]}-${d.getFullYear()}`;

            let pillClass = 'priority-normal';
            if (priority === 'Urgent') pillClass = 'priority-urgent';
            else if (priority === 'High') pillClass = 'priority-high';

            const newTr = document.createElement('tr');
            newTr.setAttribute('data-id', newId);
            newTr.setAttribute('data-code', jobCode);
            newTr.setAttribute('data-title', title);
            newTr.setAttribute('data-exp', exp);
            newTr.setAttribute('data-posted', todayStr);
            newTr.setAttribute('data-dept', dept);
            newTr.setAttribute('data-location', location);
            newTr.setAttribute('data-type', type);
            newTr.setAttribute('data-openings', openings);
            newTr.setAttribute('data-applicants', '0');
            newTr.setAttribute('data-budget', budget);
            newTr.setAttribute('data-priority', priority);
            newTr.setAttribute('data-status', 'Active');
            newTr.setAttribute('data-description', description);

            let portalBadgesHtml = '';
            let postedList = [];
            if (postLinkedin) {
                portalBadgesHtml += `<a href="${urlLinkedin}" target="_blank" class="portal-chip portal-linkedin text-decoration-none" title="Open LinkedIn Page"><i class="bi bi-linkedin"></i> LinkedIn</a> `;
                postedList.push('LinkedIn');
            }
            if (postNaukri) {
                portalBadgesHtml += `<a href="${urlNaukri}" target="_blank" class="portal-chip portal-naukri text-decoration-none" title="Open Naukri Listing"><i class="bi bi-briefcase-fill"></i> Naukri</a> `;
                postedList.push('Naukri.com');
            }
            if (postIndeed) {
                portalBadgesHtml += `<a href="${urlIndeed}" target="_blank" class="portal-chip portal-indeed text-decoration-none" title="Open Indeed Employer Page"><i class="bi bi-globe"></i> Indeed</a> `;
                postedList.push('Indeed');
            }
            if (postCareers) {
                portalBadgesHtml += `<a href="${urlCareers}" target="_blank" class="portal-chip portal-careers text-decoration-none" title="Open Careers Portal"><i class="bi bi-building"></i> Careers</a> `;
                postedList.push('Career Portal');
            }
            if (urlWhatsapp) {
                portalBadgesHtml += `<a href="${urlWhatsapp}" target="_blank" class="portal-chip bg-success-subtle text-success border-success-subtle text-decoration-none" title="WhatsApp Broadcast Link"><i class="bi bi-whatsapp"></i> WhatsApp</a> `;
            }
            if (urlSocial) {
                portalBadgesHtml += `<a href="${urlSocial}" target="_blank" class="portal-chip bg-primary-subtle text-primary border-primary-subtle text-decoration-none" title="Social Media Careers Page"><i class="bi bi-instagram"></i> Social</a> `;
            }
            if (!portalBadgesHtml) {
                portalBadgesHtml = `<span class="badge bg-light text-dark border" style="font-size:10px;">Internal Only</span>`;
            }

            const postedByVal = document.getElementById('create_job_posted_by')?.value || 'Priya Sharma (HR Lead)';

            newTr.innerHTML = `
                <td class="job-sno">${newId}</td>
                <td class="fw-bold job-code-cell" style="color:var(--primary-dark);">${jobCode}</td>
                <td class="job-title-cell">
                    <div class="fw-bold text-dark job-title-text">${title}</div>
                    <div class="text-muted job-sub-text" style="font-size:11.5px;">Exp: ${exp}</div>
                </td>
                <td class="job-dept-cell"><span class="badge bg-light text-dark border">${dept}</span></td>
                <td class="job-loc-cell">
                    <div class="text-dark fw-semibold job-loc-text" style="font-size:12.5px;">${location}</div>
                    <div class="text-muted job-type-text" style="font-size:11px;">${type}</div>
                </td>
                <td class="job-postedby-cell">
                    <div class="fw-bold text-dark job-postedby-name" style="font-size:12.5px;"><i class="bi bi-person-fill text-primary me-1"></i> ${postedByVal}</div>
                    <div class="text-muted job-postedby-role" style="font-size:11px;">HR Recruiter</div>
                </td>
                <td class="job-posteddate-cell">
                    <div class="fw-semibold text-dark job-posted-date" style="font-size:12.5px;"><i class="bi bi-calendar-event me-1 text-secondary"></i> ${todayStr}</div>
                </td>
                <td class="job-postedage-cell text-center">
                    <span class="badge bg-success-subtle text-success border border-success-subtle job-posted-age" style="font-size:11px; font-weight:700;"><i class="bi bi-clock-history me-1"></i> Today (0 Days)</span>
                </td>
                <td class="fw-bold text-center job-openings-cell">${openings}</td>
                <td class="fw-bold text-success job-budget-cell">${budget}</td>
                <td class="job-priority-cell"><span class="priority-pill ${pillClass}">${priority}</span></td>
                <td class="job-portals-cell">
                    <div class="d-flex align-items-center gap-1 flex-wrap">${portalBadgesHtml}</div>
                </td>
                <td class="job-status-cell"><span class="status-badge-open"><i class="bi bi-circle-fill" style="font-size:7px;"></i> Active</span></td>
                <td>
                    <a href="job-edit.php?id=${newId}" class="btn btn-sm edit btn-edit-job" data-id="${newId}" data-bs-toggle="tooltip" data-bs-title="Edit Job">
                        <i class="mdi mdi-pencil"></i>
                    </a>
                </td>
            `;

            if (tbody) {
                tbody.appendChild(newTr);
            }

            // Close modal & reset form
            const createModalEl = document.getElementById('createJobModal');
            if (createModalEl && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getOrCreateInstance(createModalEl).hide();
            }
            document.getElementById('createJobForm').reset();

            if (postedList.length > 0) {
                alert(`🚀 Job "${title}" (${jobCode}) successfully published & cross-posted to: ${postedList.join(', ')}!\n\nAll office social links saved and connected to candidate application tracking.`);
            } else {
                alert(`✅ Job "${title}" (${jobCode}) published internally.`);
            }
        });
    }

    // Broadcast Job Modal Handler (Multi-Channel Cross-Post)
    function populateBroadcastModal(btn) {
        if (!btn) return;
        const row = btn.closest('tr');
        if (!row) return;

        const id = row.getAttribute('data-id') || btn.getAttribute('data-id') || '';
        const code = row.getAttribute('data-code') || row.querySelector('.job-code-cell')?.textContent.trim() || '';
        const title = row.getAttribute('data-title') || row.querySelector('.job-title-text')?.textContent.trim() || '';
        const location = row.getAttribute('data-location') || row.querySelector('.job-loc-text')?.textContent.trim() || '';
        const budget = row.getAttribute('data-budget') || row.querySelector('.job-budget-cell')?.textContent.trim() || '';

        const idEl = document.getElementById('broadcast_job_id');
        const titleEl = document.getElementById('broadcast_job_title');
        const codeEl = document.getElementById('broadcast_job_code');
        const locEl = document.getElementById('broadcast_job_loc');
        const budgetEl = document.getElementById('broadcast_job_budget');
        const captionEl = document.getElementById('broadcast_caption');
        const progressArea = document.getElementById('broadcastProgressArea');

        if (idEl) idEl.value = id;
        if (titleEl) titleEl.textContent = title;
        if (codeEl) codeEl.textContent = code;
        if (locEl) locEl.textContent = location;
        if (budgetEl) budgetEl.textContent = budget;

        const baseUrl = window.location.origin + window.location.pathname.replace('job-openings.php', 'careers.php');
        const shareUrl = `${baseUrl}?job=${code}`;
        
        const broadcastLinkEl = document.getElementById('broadcast_careers_link');
        const testLinkEl = document.getElementById('btnTestBroadcastLink');
        if (broadcastLinkEl) broadcastLinkEl.value = shareUrl;
        if (testLinkEl) testLinkEl.href = shareUrl;

        if (captionEl) {
            captionEl.value = `🚀 We are hiring! Join our team as ${title} (${code}) in ${location}.\nApply directly on our Official Careers Link: ${shareUrl}`;
        }
        if (progressArea) progressArea.classList.add('d-none');
    }

    // Copy Link Event Handler for Table Action Buttons
    document.addEventListener('click', function(e) {
        const copyBtn = e.target.closest('.btn-copy-careers-link');
        if (!copyBtn) return;

        const code = copyBtn.getAttribute('data-code') || 'JOB';
        const title = copyBtn.getAttribute('data-title') || 'Position';
        const baseUrl = window.location.origin + window.location.pathname.replace('job-openings.php', 'careers.php');
        const shareUrl = `${baseUrl}?job=${code}`;

        navigator.clipboard.writeText(shareUrl).then(function() {
            alert(`🔗 Official Careers Link copied to clipboard!\n\nPosition: ${title} (${code})\nLink: ${shareUrl}\n\nYou can now paste this link on WhatsApp, LinkedIn, or Social Media.`);
        }).catch(function() {
            prompt('Copy this Official Careers Link:', shareUrl);
        });
    });

    // Copy Button inside Broadcast Modal
    const btnCopyBroadcastLink = document.getElementById('btnCopyBroadcastLink');
    if (btnCopyBroadcastLink) {
        btnCopyBroadcastLink.addEventListener('click', function() {
            const linkInput = document.getElementById('broadcast_careers_link');
            if (linkInput && linkInput.value) {
                navigator.clipboard.writeText(linkInput.value).then(function() {
                    alert('🔗 Official Careers Link copied to clipboard!\n' + linkInput.value);
                });
            }
        });
    }

    // Share to WhatsApp Handler
    const shareWhatsappBtn = document.getElementById('shareWhatsappBtn');
    if (shareWhatsappBtn) {
        shareWhatsappBtn.addEventListener('click', function() {
            const caption = document.getElementById('broadcast_caption')?.value || 'Join our team!';
            const waUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(caption)}`;
            window.open(waUrl, '_blank');
        });
    }

    // Share to LinkedIn Handler
    const shareLinkedinBtn = document.getElementById('shareLinkedinBtn');
    if (shareLinkedinBtn) {
        shareLinkedinBtn.addEventListener('click', function() {
            const link = document.getElementById('broadcast_careers_link')?.value || window.location.href;
            const liUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(link)}`;
            window.open(liUrl, '_blank');
        });
    }

    const broadcastModalEl = document.getElementById('broadcastJobModal');
    if (broadcastModalEl) {
        broadcastModalEl.addEventListener('show.bs.modal', function(e) {
            const btn = e.relatedTarget || document.activeElement;
            populateBroadcastModal(btn);
        });
    }

    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-broadcast-job');
        if (!btn) return;

        populateBroadcastModal(btn);

        if (broadcastModalEl && typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            bootstrap.Modal.getOrCreateInstance(broadcastModalEl).show();
        } else if (typeof $ !== 'undefined' && $.fn.modal) {
            $('#broadcastJobModal').modal('show');
        }
    });

    const btnExecuteBroadcast = document.getElementById('btnExecuteBroadcast');
    if (btnExecuteBroadcast) {
        btnExecuteBroadcast.addEventListener('click', function() {
            const id = document.getElementById('broadcast_job_id').value;
            const syncLinkedin = document.getElementById('sync_linkedin')?.checked;
            const syncNaukri = document.getElementById('sync_naukri')?.checked;
            const syncIndeed = document.getElementById('sync_indeed')?.checked;
            const syncCareers = document.getElementById('sync_careers')?.checked;

            const progressArea = document.getElementById('broadcastProgressArea');
            if (progressArea) progressArea.classList.remove('d-none');

            btnExecuteBroadcast.disabled = true;
            btnExecuteBroadcast.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Syndicating Live...';

            setTimeout(function() {
                btnExecuteBroadcast.disabled = false;
                btnExecuteBroadcast.innerHTML = '<i class="bi bi-send-check me-1"></i> Broadcast & Sync to All Platforms';

                let portalBadgesHtml = '';
                if (syncLinkedin) portalBadgesHtml += `<span class="portal-chip portal-linkedin"><i class="bi bi-linkedin"></i> LinkedIn</span> `;
                if (syncNaukri) portalBadgesHtml += `<span class="portal-chip portal-naukri"><i class="bi bi-briefcase-fill"></i> Naukri</span> `;
                if (syncIndeed) portalBadgesHtml += `<span class="portal-chip portal-indeed"><i class="bi bi-globe"></i> Indeed</span> `;
                if (syncCareers) portalBadgesHtml += `<span class="portal-chip portal-careers"><i class="bi bi-building"></i> Careers</span> `;
                if (!portalBadgesHtml) portalBadgesHtml = `<span class="badge bg-light text-dark border" style="font-size:10px;">Internal Only</span>`;

                const row = document.querySelector(`tr[data-id="${id}"]`);
                if (row) {
                    const portalsCell = row.querySelector('.job-portals-cell');
                    if (portalsCell) {
                        portalsCell.innerHTML = `<div class="d-flex align-items-center gap-1 flex-wrap">${portalBadgesHtml}</div>`;
                    }
                }

                const broadcastModalEl = document.getElementById('broadcastJobModal');
                if (broadcastModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(broadcastModalEl).hide();
                }

                alert('🚀 Job Requisition successfully broadcasted & synchronized to external platforms!');
            }, 1200);
        });
    }
});

/* ==========================================================================
   Script Block 2
   ========================================================================== */
function switchReqTab(reqId) {
    // Update nav items
    document.querySelectorAll('.req-nav-item').forEach(item => {
        item.style.background = '#ffffff';
        item.style.borderColor = '#e2e8f0';
        item.style.opacity = '0.85';
        item.style.boxShadow = '0 1px 3px rgba(0,0,0,0.02)';
        item.classList.remove('active-req-item');
    });

    const activeNav = document.getElementById('reqNavItem_' + reqId);
    if (activeNav) {
        activeNav.style.background = '#ffffff';
        activeNav.style.borderColor = '#087a24';
        activeNav.style.opacity = '1';
        activeNav.style.boxShadow = '0 2px 8px rgba(8,122,36,0.12)';
        activeNav.classList.add('active-req-item');
    }

    // Update detail panes
    document.querySelectorAll('.req-detail-pane').forEach(pane => {
        pane.classList.add('d-none');
    });

    const activePane = document.getElementById('reqPane_' + reqId);
    if (activePane) {
        activePane.classList.remove('d-none');
    }
}

/* ==========================================================================
   Script Block 3
   ========================================================================== */
function fillQuickReply(inputId, text) {
    const el = document.getElementById(inputId);
    if (el) {
        el.value = text;
        el.focus();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    function getJobAgeDays(dateStr) {
        if (!dateStr) return 'Today (0 Days)';
        var t = Date.parse(dateStr);
        if (!t) return 'Today (0 Days)';
        var diff = Math.floor((Date.now() - t) / 86400000);
        if (diff <= 0) return 'Today (0 Days)';
        if (diff === 1) return '1 Day Old';
        return diff + ' Days Old';
    }

    var jobOpeningsData = [
        {
            id: 1,
            code: 'JOB-101',
            title: 'Senior UI/UX Designer',
            exp: '4-6 Years',
            posted_date: '20-Feb-2026',
            posted_by_name: 'Ananya Sundaram',
            posted_by_role: 'HR Recruiter',
            dept: 'Design',
            location: 'Bangalore (Hybrid)',
            type: 'Full-Time',
            openings: 2,
            budget: '₹14L - ₹18L',
            priority: 'Urgent',
            portals: ['LinkedIn', 'Naukri', 'Indeed'],
            status: 'Active',
            description: 'Responsible for crafting intuitive user experiences, design systems, wireframing, and user research.'
        },
        {
            id: 2,
            code: 'JOB-102',
            title: 'Lead Backend Engineer (Node.js/Go)',
            exp: '5-8 Years',
            posted_date: '15-Feb-2026',
            posted_by_name: 'Priya Sharma',
            posted_by_role: 'HR Lead',
            dept: 'Engineering',
            location: 'Bangalore (On-site)',
            type: 'Full-Time',
            openings: 3,
            budget: '₹20L - ₹28L',
            priority: 'High',
            portals: ['LinkedIn', 'Naukri', 'Careers'],
            status: 'Active',
            description: 'Lead our backend infrastructure, architect microservices, and optimize cloud systems.'
        },
        {
            id: 3,
            code: 'JOB-103',
            title: 'iOS App Developer (Swift)',
            exp: '3-5 Years',
            posted_date: '10-Feb-2026',
            posted_by_name: 'Siddharth N',
            posted_by_role: 'TA Manager',
            dept: 'iOS Dev',
            location: 'Chennai (Hybrid)',
            type: 'Full-Time',
            openings: 2,
            budget: '₹12L - ₹16L',
            priority: 'Normal',
            portals: ['LinkedIn', 'Indeed'],
            status: 'Active',
            description: 'Build responsive and performant iOS applications utilizing modern Swift and SwiftUI frameworks.'
        },
        {
            id: 4,
            code: 'JOB-104',
            title: 'Financial Analyst',
            exp: '2-4 Years',
            posted_date: '05-Feb-2026',
            posted_by_name: 'Ananya Sundaram',
            posted_by_role: 'HR Recruiter',
            dept: 'Finance',
            location: 'Bangalore (On-site)',
            type: 'Full-Time',
            openings: 1,
            budget: '₹8L - ₹11L',
            priority: 'Normal',
            portals: ['Naukri', 'Careers'],
            status: 'Active',
            description: 'Conduct financial planning, quarterly forecast variance analysis, and manage operational expenditure reports.'
        },
        {
            id: 5,
            code: 'JOB-105',
            title: 'Performance Marketing Specialist',
            exp: '3-5 Years',
            posted_date: '28-Sep-2026',
            posted_by_name: 'Priya Sharma',
            posted_by_role: 'HR Lead',
            dept: 'Marketing',
            location: 'Remote',
            type: 'Contract',
            openings: 1,
            budget: '₹10L - ₹13L',
            priority: 'High',
            portals: ['LinkedIn', 'Naukri', 'Indeed'],
            status: 'Active',
            description: 'Manage and optimize digital PPC campaigns across Google Ads, Meta Ads, and LinkedIn to maximize lead conversions.'
        }
    ];

    try {
        var savedJob = localStorage.getItem('gh_newly_created_job');
        if (savedJob) {
            var parsed = JSON.parse(savedJob);
            if (parsed && !jobOpeningsData.some(function(j) { return j.code === parsed.code; })) {
                jobOpeningsData.unshift({
                    id: parsed.id || Date.now(),
                    code: parsed.code || 'JOB-' + (100 + jobOpeningsData.length + 1),
                    title: parsed.title,
                    exp: parsed.exp || '3-5 Years',
                    posted_date: new Date().toLocaleDateString('en-GB', { day: '2-digit', month: 'Short', year: 'numeric' }).replace(/ /g, '-'),
                    posted_by_name: parsed.posted_by_name || 'HR Team',
                    posted_by_role: 'HR Recruiter',
                    dept: parsed.dept || 'Engineering',
                    location: parsed.location || 'Bangalore (Hybrid)',
                    type: parsed.type || 'Full-Time',
                    openings: parseInt(parsed.openings, 10) || 1,
                    budget: parsed.budget || 'Best in Industry',
                    priority: parsed.priority || 'Normal',
                    portals: ['LinkedIn', 'Careers'],
                    status: 'Active',
                    description: parsed.description || ''
                });
            }
        }
    } catch (e) {}

    var jobOpeningsTable = MasterTable.init({
        tableId: 'jobOpeningsTable',
        tbodyId: 'jobOpeningsTbody',
        data: jobOpeningsData,
        tableName: 'Job Openings',
        primaryKey: 'id',
        searchFields: ['title', 'dept', 'location', 'posted_by_name', 'posted_date', 'budget', 'priority', 'status'],
        columns: [
            { field: 'title', title: 'Position Title', sortable: true, render: function(v, row) {
                return '<div class="fw-bold text-dark job-title-text">' + v + '</div>' +
                       '<div class="text-muted job-sub-text" style="font-size:11.5px;">Exp: ' + (row.exp || '3-5 Years') + '</div>';
            }},
            { field: 'dept', title: 'Department', sortable: true, render: function(v) {
                return '<span class="badge bg-light text-dark border">' + v + '</span>';
            }},
            { field: 'location', title: 'Location & Type', sortable: true, render: function(v, row) {
                return '<div class="text-dark fw-semibold job-loc-text" style="font-size:12.5px;">' + v + '</div>' +
                       '<div class="text-muted job-type-text" style="font-size:11px;">' + (row.type || 'Full-Time') + '</div>';
            }},
            { field: 'posted_by_name', title: 'Posted By (HR)', sortable: true, render: function(v, row) {
                return '<div class="fw-bold text-dark job-postedby-name" style="font-size:12.5px;"><i class="bi bi-person-fill text-primary me-1"></i> ' + v + '</div>' +
                       '<div class="text-muted job-postedby-role" style="font-size:11px;">' + (row.posted_by_role || 'HR Recruiter') + '</div>';
            }},
            { field: 'posted_date', title: 'Posted Date', sortable: true, render: function(v) {
                return '<div class="fw-semibold text-dark job-posted-date" style="font-size:12.5px;"><i class="bi bi-calendar-event me-1 text-secondary"></i> ' + v + '</div>';
            }},
            { field: 'posted_date', title: 'Post Age', sortable: false, render: function(v) {
                return '<div class="text-center"><span class="badge bg-success-subtle text-success border border-success-subtle job-posted-age" style="font-size:11px; font-weight:700;"><i class="bi bi-clock-history me-1"></i> ' + getJobAgeDays(v) + '</span></div>';
            }},
            { field: 'openings', title: 'Openings', sortable: true, render: function(v) {
                return '<div class="fw-bold text-center job-openings-cell">' + (v || 1) + '</div>';
            }},
            { field: 'budget', title: 'Budget (CTC)', sortable: true, render: function(v) {
                return '<span class="fw-bold text-success job-budget-cell">' + v + '</span>';
            }},
            { field: 'priority', title: 'Priority', sortable: true, render: function(v) {
                var pClass = 'priority-normal';
                if (v === 'Urgent') pClass = 'priority-urgent';
                else if (v === 'High') pClass = 'priority-high';
                return '<span class="priority-pill ' + pClass + '">' + v + '</span>';
            }},
            { field: 'portals', title: 'Posted Portals', sortable: false, render: function(v) {
                var list = Array.isArray(v) ? v : (v ? String(v).split(',') : []);
                var html = '<div class="d-flex align-items-center gap-1 flex-wrap">';
                list.forEach(function(p) {
                    p = p.trim();
                    var pLow = p.toLowerCase();
                    var icon = 'bi-globe', cls = 'portal-careers';
                    if (pLow.includes('linkedin')) { icon = 'bi-linkedin'; cls = 'portal-linkedin'; }
                    else if (pLow.includes('naukri')) { icon = 'bi-briefcase-fill'; cls = 'portal-naukri'; }
                    else if (pLow.includes('indeed')) { icon = 'bi-globe'; cls = 'portal-indeed'; }
                    html += '<span class="portal-chip ' + cls + '"><i class="bi ' + icon + '"></i> ' + p + '</span>';
                });
                html += '</div>';
                return html;
            }},
            { field: 'status', title: 'Status', sortable: true, render: function(v) {
                return '<span class="status-badge-open"><i class="bi bi-circle-fill" style="font-size:7px;"></i> ' + (v || 'Active') + '</span>';
            }},
            { field: null, title: 'Action', sortable: false, render: function(v, row) {
                return '<a href="job-edit.php?id=' + row.id + '" class="btn btn-sm edit btn-edit-job" data-id="' + row.id + '" data-bs-toggle="tooltip" data-bs-title="Edit Job"><i class="mdi mdi-pencil"></i></a>';
            }}
        ]
    });

    // Explicit Modal Trigger
    const btnOpenModal = document.getElementById('btnOpenTlRequestsModal');
    if (btnOpenModal) {
        btnOpenModal.addEventListener('click', function(e) {
            const modalEl = document.getElementById('tlRequestsModal');
            if (modalEl) {
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    const modalObj = bootstrap.Modal.getOrCreateInstance(modalEl);
                    modalObj.show();
                } else if (typeof $ !== 'undefined') {
                    $('#tlRequestsModal').modal('show');
                }
            }
        });
    }

    // --- Client-Side TL Resource Requisitions Handler ---
    function escapeHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    function getStoredRequisitions() {
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

        try {
            var raw = localStorage.getItem('gh_job_requisitions');
            if (raw) {
                var parsed = JSON.parse(raw);
                if (Array.isArray(parsed) && parsed.length > 0) return parsed;
            } else {
                localStorage.setItem('gh_job_requisitions', JSON.stringify(defaultReqData));
            }
        } catch(e) {}
        return defaultReqData;
    }

    function renderTlRequisitionsModal() {
        var reqs = getStoredRequisitions();
        var pendingCount = 0;
        reqs.forEach(function(r) {
            if ((r.status || '').toLowerCase().includes('pending')) pendingCount++;
        });

        var badgeEl = document.getElementById('tlPendingBadge');
        if (badgeEl) {
            if (pendingCount > 0) {
                badgeEl.textContent = pendingCount + ' New';
                badgeEl.classList.remove('d-none');
            } else {
                badgeEl.classList.add('d-none');
            }
        }

        var emptyBox = document.getElementById('tlRequestsEmpty');
        var contentBox = document.getElementById('tlRequestsContent');
        var listGroup = document.getElementById('reqListGroup');
        var detailContainer = document.getElementById('reqDetailContainer');
        var countHeader = document.getElementById('tlActiveReqsCount');

        if (!listGroup || !detailContainer) return;

        if (!reqs || reqs.length === 0) {
            if (emptyBox) emptyBox.classList.remove('d-none');
            if (contentBox) contentBox.classList.add('d-none');
            return;
        }

        if (emptyBox) emptyBox.classList.add('d-none');
        if (contentBox) contentBox.classList.remove('d-none');
        if (countHeader) countHeader.textContent = reqs.length + ' Active Requisitions';

        var navHtml = '';
        var detailHtml = '';

        reqs.forEach(function(req, index) {
            var isFirst = (index === 0);
            var statusPill = '<span class="badge" style="background:#f0fdf4; color:#16a34a; border:1px solid #bbf7d0; font-size:11px; padding:4px 8px; border-radius:6px; font-weight:700;">Posted</span>';
            var stLow = (req.status || '').toLowerCase();
            if (stLow.includes('pending')) {
                statusPill = '<span class="badge" style="background:#fffbeb; color:#d97706; border:1px solid #fde68a; font-size:11px; padding:4px 8px; border-radius:6px; font-weight:700;">Pending</span>';
            } else if (stLow.includes('under review')) {
                statusPill = '<span class="badge" style="background:#eff6ff; color:#2563eb; border:1px solid #bfdbfe; font-size:11px; padding:4px 8px; border-radius:6px; font-weight:700;">Under Review</span>';
            }

            navHtml += '<div class="req-nav-item p-3 ' + (isFirst ? 'active-req-item' : '') + '" ' +
                       'id="reqNavItem_' + escapeHtml(req.req_id) + '" ' +
                       'onclick="switchReqTab(\'' + escapeHtml(req.req_id) + '\')" ' +
                       'style="border-radius:12px; cursor:pointer; transition:all 0.15s ease; border:1.5px solid ' + (isFirst ? '#087a24' : '#e2e8f0') + '; background:#ffffff; box-shadow:' + (isFirst ? '0 2px 8px rgba(8,122,36,0.12)' : '0 1px 3px rgba(0,0,0,0.02)') + '; opacity:' + (isFirst ? '1' : '0.85') + ';">' +
                       '<div class="fw-bold text-dark mb-2" style="font-size:14.5px; line-height:1.3; color:#0f172a !important;">' + escapeHtml(req.project_name) + '</div>' +
                       '<div>' + statusPill + '</div>' +
                       '</div>';

            var prioBadge = '<span class="badge shadow-sm" style="background:#fef2f2; color:#dc2626; border:1px solid #fecaca; font-size:12px; padding:6px 14px; border-radius:8px; font-weight:700;"><i class="bi bi-exclamation-circle-fill me-1"></i> Urgent</span>';
            if (req.priority === 'High') {
                prioBadge = '<span class="badge shadow-sm" style="background:#fff7ed; color:#c2410c; border:1px solid #ffedd5; font-size:12px; padding:6px 14px; border-radius:8px; font-weight:700;"><i class="bi bi-arrow-up-circle-fill me-1"></i> High Priority</span>';
            } else if (req.priority === 'Normal') {
                prioBadge = '<span class="badge" style="background:#f8fafc; color:#475569; border:1px solid #e2e8f0; font-size:12px; padding:6px 14px; border-radius:8px; font-weight:600;">Normal</span>';
            }

            var hrResponseHtml = '';
            if (req.hr_reply) {
                hrResponseHtml = '<div class="rounded-3 border shadow-sm mb-4" style="background:#f0fdf4; border-color:#bbf7d0 !important; border-left:4px solid #16a34a !important; padding:20px 22px !important; margin-top:20px !important; margin-bottom:24px !important;">' +
                                 '<div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color:#dcfce7 !important;">' +
                                 '<div class="d-flex align-items-center gap-2">' +
                                 '<div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-sm" style="width:30px; height:30px; font-size:12px; background:#16a34a;"><i class="bi bi-check-lg"></i></div>' +
                                 '<span class="fw-bold text-success small" style="font-size:13.5px; color:#15803d !important;">HR Response</span>' +
                                 '</div>' +
                                 '<span class="badge bg-white text-success border fw-semibold shadow-sm" style="font-size:11.5px; padding:6px 12px; border-radius:6px; border-color:#bbf7d0 !important;"><i class="bi bi-clock me-1"></i>' + escapeHtml(req.hr_reply_date || '') + '</span>' +
                                 '</div>' +
                                 '<div class="text-dark fw-medium lh-base pt-1" style="font-size:14px; color:#0f172a !important; line-height:1.65;">' + escapeHtml(req.hr_reply) + '</div>' +
                                 '</div>';
            }

            var curStatus = req.status || 'Pending HR Review';

            detailHtml += '<div class="req-detail-pane ' + (isFirst ? '' : 'd-none') + '" id="reqPane_' + escapeHtml(req.req_id) + '">' +
                          '<div class="d-flex align-items-start justify-content-between gap-3 mb-3 pb-2 border-bottom">' +
                          '<div>' +
                          '<div class="d-flex align-items-center gap-2 mb-1">' +
                          '<h5 class="fw-bold text-dark mb-0" style="font-size:22px; font-weight:800; color:#0f172a !important; letter-spacing:-0.3px;">' + escapeHtml(req.job_title) + '</h5>' +
                          '</div>' +
                          '<div class="d-flex align-items-center gap-3 text-secondary small mt-1.5" style="font-size:13.5px; font-weight:500;">' +
                          '<span class="d-inline-flex align-items-center"><i class="bi bi-person-circle me-1.5 text-primary"></i> ' + escapeHtml(req.requested_by) + '</span>' +
                          '<span class="text-muted">•</span>' +
                          '<span class="d-inline-flex align-items-center text-muted"><i class="bi bi-calendar3 me-1.5"></i> ' + escapeHtml(req.date_requested) + '</span>' +
                          '</div>' +
                          '</div>' +
                          '<div>' + prioBadge + '</div>' +
                          '</div>' +
                          '<div class="row g-3 mb-4">' +
                          '<div class="col-md-4">' +
                          '<div class="p-3 rounded-3 border bg-light h-100" style="border-color:#e2e8f0 !important;">' +
                          '<div class="text-secondary small mb-1 fw-semibold" style="font-size:11.5px;"><i class="bi bi-building me-1 text-muted"></i> Department</div>' +
                          '<div class="fw-bold text-dark fs-6" style="color:#0f172a !important;">' + escapeHtml(req.department) + '</div>' +
                          '</div>' +
                          '</div>' +
                          '<div class="col-md-4">' +
                          '<div class="p-3 rounded-3 border bg-light h-100" style="border-color:#e2e8f0 !important;">' +
                          '<div class="text-secondary small mb-1 fw-semibold" style="font-size:11.5px;"><i class="bi bi-briefcase me-1 text-muted"></i> Experience</div>' +
                          '<div class="fw-bold text-dark fs-6" style="color:#0f172a !important;">' + escapeHtml(req.experience) + '</div>' +
                          '</div>' +
                          '</div>' +
                          '<div class="col-md-4">' +
                          '<div class="p-3 rounded-3 border h-100" style="background:#f0fdf4; border-color:#bbf7d0 !important;">' +
                          '<div class="text-secondary small mb-1 fw-semibold" style="font-size:11.5px; color:#15803d !important;"><i class="bi bi-people me-1"></i> Openings</div>' +
                          '<div class="fw-bold text-success fs-6" style="color:#087a24 !important;">' + (parseInt(req.openings, 10) || 1) + ' Developers</div>' +
                          '</div>' +
                          '</div>' +
                          '</div>' +
                          '<div class="rounded-3 border shadow-sm mb-4" style="background:#f8fafc; border-color:#e2e8f0 !important; border-left:4px solid #0284c7 !important; padding:20px 22px !important; margin-bottom:24px !important;">' +
                          '<div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom" style="border-color:#e2e8f0 !important;">' +
                          '<div class="d-flex align-items-center gap-2">' +
                          '<div class="rounded-circle d-flex align-items-center justify-content-center bg-primary text-white fw-bold shadow-sm" style="width:30px; height:30px; font-size:12px;"><i class="bi bi-person-fill"></i></div>' +
                          '<span class="fw-bold text-dark small" style="font-size:13.5px;">Message from TL (' + escapeHtml(req.requested_by) + ')</span>' +
                          '</div>' +
                          '<span class="badge bg-white text-secondary border fw-medium shadow-sm" style="font-size:11.5px; padding:6px 12px; border-radius:6px; border-color:#cbd5e1 !important;">' + escapeHtml(req.date_requested) + '</span>' +
                          '</div>' +
                          '<div class="text-dark fw-normal lh-base pt-1" style="font-size:14px; color:#1e293b !important; line-height:1.65;">' + escapeHtml(req.tl_message) + '</div>' +
                          '</div>' +
                          hrResponseHtml +
                          '<div class="mb-3" style="margin-top:24px !important;">' +
                          '<label class="form-label fw-bold text-dark small mb-2"><i class="bi bi-reply-fill text-success me-1"></i> Send Reply to Team Lead:</label>' +
                          '<textarea class="form-control hr-reply-input shadow-sm" rows="3" style="background:#ffffff; border:1.5px solid #cbd5e1; border-radius:12px; color:#0f172a; font-size:13.5px; padding:14px;" placeholder="Write a reply to the Team Lead..." id="replyText_' + escapeHtml(req.req_id) + '">' + escapeHtml(req.hr_reply || '') + '</textarea>' +
                          '</div>' +
                          '<div class="d-flex align-items-center justify-content-end flex-wrap gap-2">' +
                          '<div class="d-flex align-items-center gap-2">' +
                          '<select class="form-select form-select-sm hr-status-select fw-bold text-dark me-1" style="background:#ffffff; border:1.5px solid #cbd5e1; border-radius:8px; font-size:12.5px; width:auto; height:38px;" id="replyStatus_' + escapeHtml(req.req_id) + '">' +
                          '<option value="Approved & Job Posted"' + (curStatus === 'Approved & Job Posted' ? ' selected' : '') + '>Approved & Job Posted</option>' +
                          '<option value="Under Review"' + (curStatus === 'Under Review' ? ' selected' : '') + '>Under Review</option>' +
                          '<option value="Pending HR Review"' + (curStatus === 'Pending HR Review' ? ' selected' : '') + '>Pending HR Review</option>' +
                          '<option value="On Hold"' + (curStatus === 'On Hold' ? ' selected' : '') + '>On Hold</option>' +
                          '<option value="Rejected"' + (curStatus === 'Rejected' ? ' selected' : '') + '>Rejected</option>' +
                          '</select>' +
                          '<button type="button" class="btn btn-sm text-white px-4 py-2 fw-bold btn-send-reply-tl shadow-sm" style="background:#087a24; border:1px solid #087a24; border-radius:8px; font-size:13px; height:38px;" data-req-id="' + escapeHtml(req.req_id) + '">Send reply ↗</button>' +
                          '</div>' +
                          '</div>' +
                          '</div>';
        });

        listGroup.innerHTML = navHtml;
        detailContainer.innerHTML = detailHtml;

        // Attach Reply Listeners
        detailContainer.querySelectorAll('.btn-send-reply-tl').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var rId = this.getAttribute('data-req-id');
                var textEl = document.getElementById('replyText_' + rId);
                var statusEl = document.getElementById('replyStatus_' + rId);
                var textVal = textEl ? textEl.value.trim() : '';
                var statVal = statusEl ? statusEl.value : 'Approved & Job Posted';

                if (!textVal) {
                    alert('Please enter a reply message for Team Lead.');
                    return;
                }

                var reqList = getStoredRequisitions();
                var target = reqList.find(function(item) { return item.req_id === rId; });
                if (target) {
                    target.hr_reply = textVal;
                    target.status = statVal;
                    var now = new Date();
                    target.hr_reply_date = String(now.getDate()).padStart(2, '0') + '-' +
                                           ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][now.getMonth()] + '-' +
                                           now.getFullYear();
                    try {
                        localStorage.setItem('gh_job_requisitions', JSON.stringify(reqList));
                    } catch(e) {}
                    alert('✅ Reply sent to Team Lead successfully! Status updated to: ' + statVal);
                    renderTlRequisitionsModal();
                    switchReqTab(rId);
                }
            });
        });
    }

    renderTlRequisitionsModal();
});
