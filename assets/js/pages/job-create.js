/**
 * Gharuda CRM - Job Create Page Script
 * File: assets/js/pages/job-create.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    // Generate public careers link based on current domain & next job code
    const baseUrl = window.location.origin + window.location.pathname.replace('job-create.php', 'careers.php');
    const generatedUrl = `${baseUrl}?job=JOB-106`;

    const linkInput = document.getElementById('page_careers_link');
    const displayInput = document.getElementById('page_url_careers_display');
    const previewBtn = document.getElementById('btnPagePreviewCareersLink');

    if (linkInput) linkInput.value = generatedUrl;
    if (displayInput) displayInput.value = generatedUrl;
    if (previewBtn) previewBtn.href = generatedUrl;

    // Copy Careers Link
    const copyBtn = document.getElementById('btnPageCopyCareersLink');
    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            if (linkInput && linkInput.value) {
                navigator.clipboard.writeText(linkInput.value).then(function() {
                    alert('🔗 Official Careers Portal Link copied to clipboard!\n\nLink: ' + linkInput.value);
                }).catch(function() {
                    prompt('Copy this Official Careers Link:', linkInput.value);
                });
            }
        });
    }

    // Submit Job Requisition Page
    const btnPublish = document.getElementById('btnPagePublishJob');
    if (btnPublish) {
        btnPublish.addEventListener('click', function() {
            const title = (document.getElementById('page_job_title')?.value || '').trim();
            const dept = document.getElementById('page_job_dept')?.value || 'Engineering';
            const location = (document.getElementById('page_job_location')?.value || '').trim();
            const type = document.getElementById('page_job_type')?.value || 'Full-Time';
            const openings = (document.getElementById('page_job_openings')?.value || '1').trim();
            const exp = (document.getElementById('page_job_exp')?.value || '').trim() || '3-5 Years';
            const budget = (document.getElementById('page_job_budget')?.value || '').trim() || 'Best in Industry';
            const priority = document.getElementById('page_job_priority')?.value || 'High';
            const description = (document.getElementById('page_job_desc')?.value || '').trim();

            const postLinkedin = document.getElementById('page_post_linkedin')?.checked;
            const postNaukri = document.getElementById('page_post_naukri')?.checked;
            const postIndeed = document.getElementById('page_post_indeed')?.checked;
            const postCareers = document.getElementById('page_post_careers')?.checked;

            const urlLinkedin = document.getElementById('page_url_linkedin')?.value || '';
            const urlNaukri = document.getElementById('page_url_naukri')?.value || '';
            const urlIndeed = document.getElementById('page_url_indeed')?.value || '';
            const urlCareers = generatedUrl;
            const urlWhatsapp = document.getElementById('page_url_whatsapp')?.value || '';
            const urlSocial = document.getElementById('page_url_social')?.value || '';

            if (!title) {
                alert('Please enter a Job Title / Position Name.');
                document.getElementById('page_job_title').focus();
                return;
            }
            if (!location) {
                alert('Please enter a Work Location.');
                document.getElementById('page_job_location').focus();
                return;
            }

            // Construct new job payload
            const newJob = {
                id: 6,
                code: 'JOB-106',
                title: title,
                dept: dept,
                location: location,
                type: type,
                openings: openings,
                exp: exp,
                budget: budget,
                priority: priority,
                description: description,
                postLinkedin: postLinkedin,
                postNaukri: postNaukri,
                postIndeed: postIndeed,
                postCareers: postCareers,
                urlLinkedin: urlLinkedin,
                urlNaukri: urlNaukri,
                urlIndeed: urlIndeed,
                urlCareers: urlCareers,
                urlWhatsapp: urlWhatsapp,
                urlSocial: urlSocial
            };

            // Save in sessionStorage or localStorage for job-openings.php
            try {
                localStorage.setItem('gh_newly_created_job', JSON.stringify(newJob));
            } catch(e){}

            btnPublish.disabled = true;
            btnPublish.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Publishing & Syndicating...';

            setTimeout(function() {
                window.location.href = 'job-openings.php?created=true&title=' + encodeURIComponent(title);
            }, 800);
        });
    }
});
