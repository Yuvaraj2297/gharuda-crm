/**
 * Gharuda CRM - Linkedin Applications Page Script
 * File: assets/js/pages/linkedin-applications.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
        let currentSelectedId = null;
        let currentSourceFilter = 'all';

        var defaultApplicants = [
            {
                id: "LNK-2026-001",
                job_id: "JOB-101",
                job_title: "Senior UI/UX Designer",
                full_name: "Ananya Sundaram",
                email: "ananya.s@linkedin-profile.com",
                phone: "+91 98842 11223",
                linkedin_url: "https://www.linkedin.com/in/ananyasundaram-uiux",
                experience: "5.5 Years",
                current_company: "Cognizant Digital",
                current_ctc: "₹12.0 LPA",
                expected_ctc: "₹17.5 LPA",
                notice_period: "15 Days",
                applied_date: "14-Oct-2026 16:30",
                source: "Walk-in Application",
                stage: "Screening",
                rating: 5,
                skills: ["Figma", "Design Systems", "User Research", "Prototyping"],
                resume: "Ananya_Sundaram_Resume.pdf",
                cover_letter: "Hi Hiring Team, I saw this role on LinkedIn and am excited to apply! Over 5+ years crafting enterprise SaaS product designs."
            },
            {
                id: "LNK-2026-002",
                job_id: "JOB-102",
                job_title: "Lead Backend Engineer",
                full_name: "Vikramaditya Rao",
                email: "vikram.rao@devnet.io",
                phone: "+91 97110 55432",
                linkedin_url: "https://www.linkedin.com/in/vikram-backend-lead",
                experience: "7.0 Years",
                current_company: "Zoho Corporation",
                current_ctc: "₹20.0 LPA",
                expected_ctc: "₹28.0 LPA",
                notice_period: "Immediate",
                applied_date: "14-Oct-2026 13:30",
                source: "LinkedIn Job Share",
                stage: "Tech Round",
                rating: 4,
                skills: ["PHP / Laravel", "Node.js", "MySQL", "Docker", "Redis"],
                resume: "Vikram_Rao_Backend_Lead.pdf",
                cover_letter: "Extensive background in scalable Microservices & high-throughput API architecture."
            },
            {
                id: "LNK-2026-003",
                job_id: "JOB-103",
                job_title: "iOS App Developer",
                full_name: "Priya Ramakrishnan",
                email: "priya.ram@gmail.com",
                phone: "+91 94451 88990",
                linkedin_url: "https://www.linkedin.com/in/priya-swift-dev",
                experience: "3.5 Years",
                current_company: "Paytm Payments",
                current_ctc: "₹10.5 LPA",
                expected_ctc: "₹15.0 LPA",
                notice_period: "30 Days",
                applied_date: "13-Oct-2026 11:20",
                source: "Walk-in Application",
                stage: "HR Round",
                rating: 5,
                skills: ["Swift", "SwiftUI", "CoreData", "Combine"],
                resume: "Priya_Ramakrishnan_iOS.pdf",
                cover_letter: "Built payment mobile apps used by millions of active daily users."
            }
        ];

        var applicantsData;
        try {
            var raw = localStorage.getItem('gh_linkedin_applications');
            if (raw) {
                applicantsData = JSON.parse(raw);
            } else {
                applicantsData = defaultApplicants.slice();
                localStorage.setItem('gh_linkedin_applications', JSON.stringify(applicantsData));
            }
        } catch (e) {
            applicantsData = defaultApplicants.slice();
        }

        // Initialize Modal Dates
        var schedDateEl = document.getElementById('schedDateInput');
        if (schedDateEl && !schedDateEl.value) {
            schedDateEl.value = new Date().toISOString().split('T')[0];
        }
        var reschedDateEl = document.getElementById('reschedDateInput');
        if (reschedDateEl && !reschedDateEl.value) {
            var tmrw = new Date();
            tmrw.setDate(tmrw.getDate() + 1);
            reschedDateEl.value = tmrw.toISOString().split('T')[0];
        }

        // Populate Candidate Select Dropdowns in Modals
        function populateCandidateSelects() {
            var selects = [document.getElementById('schedCandidateSelect'), document.getElementById('reschedCandidateSelect')];
            selects.forEach(function (sel) {
                if (!sel) return;
                var curVal = sel.value;
                sel.innerHTML = '<option value="" disabled selected>-- Select Candidate from Applications Table --</option>';
                applicantsData.forEach(function (app) {
                    var opt = document.createElement('option');
                    opt.value = app.id;
                    opt.setAttribute('data-id', app.id);
                    opt.setAttribute('data-name', app.full_name || '');
                    opt.setAttribute('data-job', app.job_title || '');
                    opt.setAttribute('data-source', app.source || 'Walk-in Application');
                    opt.setAttribute('data-email', app.email || '');
                    opt.setAttribute('data-phone', app.phone || '');
                    opt.textContent = (app.full_name || '') + ' (' + (app.job_title || '') + ' • ' + (app.id || '') + ')';
                    sel.appendChild(opt);
                });
                if (curVal) sel.value = curVal;
            });
        }
        populateCandidateSelects();

        // Update KPI Counts
        function updateKpiCounts() {
            var total = applicantsData.length;
            var easyApply = 0;
            var shortlisted = 0;
            var hired = 0;

            applicantsData.forEach(function (app) {
                var src = (app.source || '').toLowerCase();
                if (src.includes('walk') || src.includes('easy apply')) easyApply++;
                var stg = app.stage || '';
                if (['Tech Round', 'HR Round', 'Screening'].includes(stg)) shortlisted++;
                if (['Offered', 'Hired'].includes(stg)) hired++;
            });

            var elTotal = document.getElementById('kpiTotalCount');
            var elEasy = document.getElementById('kpiEasyApply');
            var elShort = document.getElementById('kpiShortlisted');
            var elHired = document.getElementById('kpiHired');

            if (elTotal) elTotal.textContent = total;
            if (elEasy) elEasy.textContent = easyApply;
            if (elShort) elShort.textContent = shortlisted;
            if (elHired) elHired.textContent = hired;
        }
        updateKpiCounts();

        function getFilteredApplicants() {
            if (currentSourceFilter === 'all') return applicantsData;
            return applicantsData.filter(function (a) {
                var src = (a.source || '').toLowerCase();
                if (currentSourceFilter === 'walkin' || currentSourceFilter === 'easy_apply') return src.includes('walk') || src.includes('easy apply');
                if (currentSourceFilter === 'job_share') return src.includes('share');
                if (currentSourceFilter === 'portal') return src.includes('portal');
                return true;
            });
        }

        var applicantsTable = MasterTable.init({
            tableId: 'applicantsTable',
            tbodyId: 'applicantsTbody',
            data: applicantsData,
            tableName: 'Social & Web Applications',
            primaryKey: 'id',
            searchFields: ['full_name', 'email', 'job_title', 'experience', 'current_company', 'expected_ctc', 'notice_period', 'source', 'stage'],
            columns: [
                {
                    field: 'full_name', title: 'Candidate Name', sortable: true, render: function (v, row) {
                        var initial = (v || 'C').charAt(0).toUpperCase();
                        return '<div class="d-flex align-items-center gap-2">' +
                            '<div class="rounded-circle text-white fw-bold d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width:34px;height:34px;min-width:34px;background:var(--primary, #087a24);font-size:13px;line-height:1;text-align:center;">' + initial + '</div>' +
                            '<div><div class="fw-bold applicant-name-text" style="color:var(--primary-dark, #087a24);">' + (v || '') + '</div></div>' +
                            '</div>';
                    }
                },
                {
                    field: 'email', title: 'Email Address', sortable: true, render: function (v) {
                        return '<div class="fw-medium text-dark applicant-email-text" style="font-size:12.5px;">' + (v || '') + '</div>';
                    }
                },
                {
                    field: 'source', title: 'Application Profile', sortable: true, render: function (v, row) {
                        var src = v || 'Walk-in Application';
                        var icon = 'bi-globe', label = 'Application Profile';
                        if (src.toLowerCase().includes('linkedin')) {icon = 'bi-linkedin'; label = 'LinkedIn Profile';}
                        else if (src.toLowerCase().includes('share')) {icon = 'bi-share-fill'; label = 'Shared Post Link';}
                        else if (src.toLowerCase().includes('portal')) {icon = 'bi-window-stack'; label = 'Web Portal';}
                        return '<a href="' + (row.linkedin_url || '#') + '" target="_blank" class="ln-badge"><i class="bi ' + icon + '"></i> ' + label + '</a>';
                    }
                },
                {
                    field: 'job_title', title: 'Applied Position', sortable: true, render: function (v, row) {
                        return '<div class="fw-semibold text-dark applicant-job-text">' + (v || '') + '</div>' +
                            '<span class="badge bg-light text-muted border" style="font-size:10px;">' + (row.id || '') + '</span>';
                    }
                },
                {
                    field: 'experience', title: 'Experience', sortable: true, render: function (v) {
                        return '<div class="fw-semibold text-dark applicant-exp-text" style="font-size:12.5px;">' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'current_company', title: 'Current Company', sortable: true, render: function (v) {
                        return '<div class="fw-semibold text-dark applicant-company-text" style="font-size:12.5px;"><i class="bi bi-building me-1 text-muted"></i>' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'expected_ctc', title: 'Expected CTC', sortable: true, render: function (v) {
                        return '<div class="fw-bold text-success applicant-ctc-text" style="font-size:12.5px;">' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'notice_period', title: 'Notice Period', sortable: true, render: function (v) {
                        return '<div class="fw-medium text-dark applicant-notice-text" style="font-size:12px;">' + (v || '-') + '</div>';
                    }
                },
                {
                    field: 'applied_date', title: 'Applied Date', sortable: true, render: function (v) {
                        return '<span style="font-size:12px;" class="text-nowrap">' + (v || '') + '</span>';
                    }
                },
                {
                    field: null, title: 'Action', sortable: false, render: function (v, row) {
                        return '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm btn-outline-primary btn-view-applicant" data-id="' + row.id + '" data-bs-toggle="tooltip" title="View Candidate Profile & Dossier">' +
                            '<i class="bi bi-eye me-1"></i> Profile' +
                            '</button>' +
                            '<a href="linkedin-applications.php?action=download_zip&ids=' + encodeURIComponent(row.id) + '" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Download Candidate Resume Archive">' +
                            '<i class="bi bi-file-earmark-zip"></i>' +
                            '</a>' +
                            '</div>';
                    }
                }
            ]
        });

        // Source Filter Tabs Handler
        document.querySelectorAll('#sourceTabsWrap .ln-stage-tab').forEach(tab => {
            tab.addEventListener('click', function () {
                document.querySelectorAll('#sourceTabsWrap .ln-stage-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                currentSourceFilter = this.getAttribute('data-source');
                applicantsTable.setData(getFilteredApplicants());
            });
        });

        // View Candidate Profile Click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-view-applicant');
            if (!btn) return;

            const row = btn.closest('tr');
            if (!row) return;

            currentSelectedId = btn.getAttribute('data-id') || row.getAttribute('data-id');
            const app = applicantsData.find(a => String(a.id) === String(currentSelectedId)) || {};
            const name = app.full_name || row.getAttribute('data-name') || '';
            const email = app.email || row.getAttribute('data-email') || '';
            const phone = app.phone || row.getAttribute('data-phone') || '';
            const linkedin = app.linkedin_url || row.getAttribute('data-linkedin') || '#';
            const job = app.job_title || row.getAttribute('data-job') || '';
            const source = app.source || row.getAttribute('data-source') || 'Walk-in Application';
            const exp = app.experience || row.getAttribute('data-exp') || '';
            const company = app.current_company || row.getAttribute('data-company') || '';
            const cctc = app.current_ctc || row.getAttribute('data-cctc') || 'N/A';
            const ectc = app.expected_ctc || row.getAttribute('data-ectc') || '';
            const notice = app.notice_period || row.getAttribute('data-notice') || '';
            const cover = app.cover_letter || row.getAttribute('data-cover') || 'Applied via LinkedIn Integration.';
            const stage = app.stage || row.getAttribute('data-stage') || 'Screening';
            const rating = app.rating || row.getAttribute('data-rating') || '5';
            const skillsRaw = Array.isArray(app.skills) ? app.skills.join(',') : (app.skills || row.getAttribute('data-skills') || '');

            // Avatar & Header Info
            const avatarEl = document.getElementById('modalAvatar');
            if (avatarEl) avatarEl.innerText = name ? name.charAt(0).toUpperCase() : 'A';

            const nameEl = document.getElementById('modalCandName');
            if (nameEl) nameEl.innerText = name;

            const idEl = document.getElementById('modalCandId');
            if (idEl) idEl.innerText = currentSelectedId;

            const subtitleEl = document.getElementById('modalCandSubtitle');
            if (subtitleEl) subtitleEl.innerText = job;

            const sourceBadgeEl = document.getElementById('modalSourceBadge');
            if (sourceBadgeEl) {
                let srcIcon = 'bi-person-walking';
                if (source.toLowerCase().includes('share')) srcIcon = 'bi-share-fill';
                else if (source.toLowerCase().includes('portal')) srcIcon = 'bi-globe';
                sourceBadgeEl.innerHTML = `<i class="bi ${srcIcon} me-1 text-success"></i> ${source}`;
            }

            // Contact Info
            const emailEl = document.getElementById('modalEmail');
            if (emailEl) emailEl.innerText = email;

            const emailLink = document.getElementById('modalEmailLink');
            if (emailLink) emailLink.href = `mailto:${email}`;

            const phoneEl = document.getElementById('modalPhone');
            if (phoneEl) phoneEl.innerText = phone || 'N/A';

            const phoneLink = document.getElementById('modalPhoneLink');
            if (phoneLink) phoneLink.href = phone ? `tel:${phone}` : '#';

            const linkedinUrlText = document.getElementById('modalLinkedInUrlText');
            if (linkedinUrlText) linkedinUrlText.innerText = linkedin;

            const linkedinLink = document.getElementById('modalLinkedInLink');
            if (linkedinLink) linkedinLink.href = linkedin;

            // Experience & Compensation
            const expEl = document.getElementById('modalExp');
            if (expEl) expEl.innerText = exp;

            const companyEl = document.getElementById('modalCompany');
            if (companyEl) companyEl.innerText = company;

            const cctcEl = document.getElementById('modalCurrentCtc');
            if (cctcEl) cctcEl.innerText = cctc;

            const ectcEl = document.getElementById('modalExpectedCtc');
            if (ectcEl) ectcEl.innerText = ectc;

            const noticeEl = document.getElementById('modalNotice');
            if (noticeEl) noticeEl.innerText = notice;

            // Dynamic Hike Percentage Calculation (Disabled as requested)
            const hikeBadge = document.getElementById('modalHikeBadge');
            if (hikeBadge) {
                hikeBadge.innerHTML = '';
            }

            // Dynamic Notice Urgency Badge
            const noticeBadge = document.getElementById('modalNoticeBadge');
            if (noticeBadge) {
                const noticeLower = (notice || '').toLowerCase();
                if (noticeLower.includes('immediate')) {
                    noticeBadge.innerHTML = `<span class="badge bg-danger text-white border ms-1" style="font-size:10px;"><i class="bi bi-lightning-fill me-1"></i>Immediate</span>`;
                } else if (noticeLower.includes('15') || noticeLower.includes('short')) {
                    noticeBadge.innerHTML = `<span class="badge bg-warning text-dark border ms-1" style="font-size:10px;"><i class="bi bi-clock me-1"></i>Short Notice</span>`;
                } else {
                    noticeBadge.innerHTML = '';
                }
            }

            // Key Skills formatting
            const skillsContainer = document.getElementById('modalSkills');
            if (skillsContainer) {
                skillsContainer.innerHTML = '';
                if (skillsRaw) {
                    skillsRaw.split(',').forEach(s => {
                        if (s.trim()) {
                            skillsContainer.innerHTML += `<span class="badge d-inline-flex align-items-center gap-1 bg-white text-dark border px-2.5 py-1.5 shadow-sm" style="font-size:12px; border-radius:8px;"><i class="bi bi-check-circle-fill text-success" style="font-size:11px;"></i> ${s.trim()}</span>`;
                        }
                    });
                } else {
                    skillsContainer.innerHTML = '<span class="text-muted small">No specific skill tags attached</span>';
                }
            }

            // Cover Note
            const coverEl = document.getElementById('modalCover');
            if (coverEl) coverEl.innerText = `"${cover}"`;

            // Controls & HR Actions
            const stageSel = document.getElementById('modalStageSelect');
            const ratingSel = document.getElementById('modalRatingSelect');
            const schedBtn = document.getElementById('scheduleInterviewModalBtn');
            const onboardBtn = document.getElementById('fastTrackOnboardBtn');

            if (stageSel) stageSel.value = stage;
            if (ratingSel) ratingSel.value = rating;
            if (schedBtn) schedBtn.href = `interview-schedule.php?candidate=${encodeURIComponent(name)}&job=${encodeURIComponent(job)}`;
            if (onboardBtn) onboardBtn.href = `employee-creation.php?name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}&designation=${encodeURIComponent(job)}`;

            const modal = new bootstrap.Modal(document.getElementById('viewApplicantModal'));
            modal.show();
        });

        // Copy Email & Phone helper actions
        const btnCopyEmail = document.getElementById('btnCopyEmail');
        if (btnCopyEmail) {
            btnCopyEmail.addEventListener('click', function () {
                const emailText = document.getElementById('modalEmail').innerText;
                if (emailText) {
                    navigator.clipboard.writeText(emailText);
                    this.innerHTML = '<i class="bi bi-check2 text-success"></i>';
                    setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard"></i>', 2000);
                }
            });
        }

        const btnCopyPhone = document.getElementById('btnCopyPhone');
        if (btnCopyPhone) {
            btnCopyPhone.addEventListener('click', function () {
                const phoneText = document.getElementById('modalPhone').innerText;
                if (phoneText) {
                    navigator.clipboard.writeText(phoneText);
                    this.innerHTML = '<i class="bi bi-check2 text-success"></i>';
                    setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard"></i>', 2000);
                }
            });
        }

        // Modal Forward Resume to TL Action
        const modalForwardTLBtn = document.getElementById('modalForwardTLBtn');
        if (modalForwardTLBtn) {
            modalForwardTLBtn.addEventListener('click', function () {
                const viewModalEl = document.getElementById('viewApplicantModal');
                const viewModalInst = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModalInst) viewModalInst.hide();

                setTimeout(() => {
                    if (currentSelectedId) {
                        const row = document.querySelector(`tr[data-id="${currentSelectedId}"]`);
                        if (row) {
                            const btnForward = row.querySelector('.btn-forward-tl');
                            if (btnForward) btnForward.click();
                        }
                    }
                }, 300);
            });
        }

        // Modal View TL Scorecard Action from Candidate Profile Modal
        const modalViewTLScorecardBtn = document.getElementById('modalViewTLScorecardBtn');
        if (modalViewTLScorecardBtn) {
            modalViewTLScorecardBtn.addEventListener('click', function () {
                const viewModalEl = document.getElementById('viewApplicantModal');
                const viewModalInst = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModalInst) viewModalInst.hide();

                setTimeout(() => {
                    if (currentSelectedId) {
                        const row = document.querySelector(`tr[data-id="${currentSelectedId}"]`);
                        if (row) {
                            const btnScore = row.querySelector('.btn-view-tl-scorecard');
                            if (btnScore) {
                                btnScore.click();
                            } else {
                                const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
                                modal.show();
                            }
                        } else {
                            const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
                            modal.show();
                        }
                    }
                }, 300);
            });
        }

        // Download Resume button handler in Candidate Modal
        const downloadResumeBtn = document.getElementById('downloadResumeBtn');
        if (downloadResumeBtn) {
            downloadResumeBtn.addEventListener('click', function () {
                if (currentSelectedId) {
                    window.location.href = `linkedin-applications.php?action=download_zip&ids=${encodeURIComponent(currentSelectedId)}`;
                } else {
                    alert('Downloading Candidate Resume Archive...');
                }
            });
        }

        // Save Modal Changes
        const saveBtn = document.getElementById('saveApplicantChangesBtn');
        if (saveBtn) {
            saveBtn.addEventListener('click', function () {
                if (!currentSelectedId) return;

                const row = document.querySelector(`tr[data-id="${currentSelectedId}"]`);
                if (!row) return;

                const newStage = document.getElementById('modalStageSelect').value;
                const newRating = document.getElementById('modalRatingSelect').value;

                row.setAttribute('data-stage', newStage);
                row.setAttribute('data-rating', newRating);

                // Update rating stars text
                let stars = '★★★★★';
                if (newRating == 4) stars = '★★★★☆';
                else if (newRating == 3) stars = '★★★☆☆';
                else if (newRating == 2) stars = '★★☆☆☆';

                const ratingEl = row.querySelector('.applicant-rating-text');
                if (ratingEl) ratingEl.textContent = stars;

                // Update stage badge
                let stageCss = 'stage-screening';
                if (newStage === 'Tech Round') stageCss = 'stage-tech';
                else if (newStage === 'HR Round') stageCss = 'stage-hr';
                else if (newStage === 'Offered') stageCss = 'stage-offered';
                else if (newStage === 'Hired') stageCss = 'stage-hired';
                else if (newStage === 'Archived') stageCss = 'stage-archived';

                const stageCell = row.querySelector('.applicant-stage-cell');
                if (stageCell) {
                    stageCell.innerHTML = `<span class="stage-badge ${stageCss}"><i class="bi bi-circle-fill" style="font-size:7px;"></i> ${newStage}</span>`;
                }

                updateKpisFromDOM();
                if (typeof window.refreshAttendanceTable === 'function') {
                    window.refreshAttendanceTable();
                }

                const modalInst = bootstrap.Modal.getInstance(document.getElementById('viewApplicantModal'));
                if (modalInst) modalInst.hide();
            });
        }

        // Add Candidate Form Submit
        const addForm = document.getElementById('addApplicantForm');
        if (addForm) {
            addForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);
                dataObj.source = 'Walk-in Application';

                fetch('api-linkedin-apply.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            const modalInst = bootstrap.Modal.getInstance(document.getElementById('addLinkedInApplicantModal'));
                            if (modalInst) modalInst.hide();
                            this.reset();
                            alert('Candidate added successfully to LinkedIn Recruitment pipeline!');
                            location.reload();
                        }
                    })
                    .catch(err => {
                        console.error('Failed adding applicant:', err);
                        alert('Candidate saved. Reloading page...');
                        location.reload();
                    });
            });
        }

        // Share Job Modal Logic
        const baseUrl = window.location.origin + window.location.pathname.replace('linkedin-applications.php', '');
        function updateShareModalContent() {
            const select = document.getElementById('shareJobSelect');
            if (!select) return;
            const selectedOpt = select.options[select.selectedIndex];
            const jobId = select.value;
            const title = selectedOpt.getAttribute('data-title') || 'Role';
            const exp = selectedOpt.getAttribute('data-exp') || '';
            const loc = selectedOpt.getAttribute('data-loc') || '';

            const applyUrl = `${baseUrl}job-apply.php?job_id=${jobId}`;
            const applyUrlInput = document.getElementById('shareApplyUrl');
            if (applyUrlInput) applyUrlInput.value = applyUrl;

            const postText = `🚀 WE ARE HIRING: ${title}!\n\n📍 Location: ${loc}\n💼 Experience: ${exp}\n\nJoin our fast-growing engineering & product design team at Gharuda HR. Apply directly via LinkedIn below 👇\n\nApply Link: ${applyUrl}\n\n#Hiring #JobOpportunity #${title.replace(/[^a-zA-Z0-9]/g, '')} #Jobs2026`;
            const postTextarea = document.getElementById('sharePostTemplate');
            if (postTextarea) postTextarea.value = postText;

            const linkedInShare = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(applyUrl)}`;
            const shareLinkBtn = document.getElementById('openLinkedInShareUrl');
            if (shareLinkBtn) shareLinkBtn.href = linkedInShare;
        }

        const shareSelect = document.getElementById('shareJobSelect');
        if (shareSelect) {
            shareSelect.addEventListener('change', updateShareModalContent);
            updateShareModalContent();
        }

        const copyShareUrlBtn = document.getElementById('copyShareUrlBtn');
        if (copyShareUrlBtn) {
            copyShareUrlBtn.addEventListener('click', function () {
                const urlInput = document.getElementById('shareApplyUrl');
                if (urlInput) {
                    urlInput.select();
                    navigator.clipboard.writeText(urlInput.value);
                    this.innerHTML = '<i class="bi bi-check2 me-1"></i> Copied!';
                    setTimeout(() => this.innerHTML = '<i class="bi bi-clipboard me-1"></i> Copy Link', 2000);
                }
            });
        }

        // Dynamic Team -> TL mapping
        const teamTLMapping = {
            "Frontend Engineering Team": [
                "Santhosh Kumar (Frontend Tech Lead)",
                "Anand (Senior Frontend Lead)"
            ],
            "Backend Engineering Team": [
                "Karthik V (Backend Tech Lead)",
                "Ramesh (Principal Backend Architect)"
            ],
            "UI/UX Design Team": [
                "Deepak (Lead UI/UX Designer)",
                "Ananya S (Senior Design Lead)"
            ],
            "Mobile / iOS Engineering Team": [
                "Anitha R (iOS Mobile Tech Lead)",
                "Priya (Mobile Lead)"
            ],
            "Marketing & PPC Team": [
                "Priya S (Performance Marketing Lead)",
                "Vikram (Growth Lead)"
            ],
            "HR & Talent Acquisition Team": [
                "Meena S (HR Operations Lead)",
                "Kavitha (Talent Lead)"
            ],
            "Finance & Accounts Team": [
                "Suresh Kumar (Finance Manager)"
            ]
        };

        function populateTLDropdown(teamName) {
            const tlSelect = document.getElementById('forward_tl_select');
            if (!tlSelect) return;
            tlSelect.innerHTML = '';

            const tls = teamTLMapping[teamName] || [
                "Santhosh Kumar (Frontend Tech Lead)",
                "Karthik V (Backend Tech Lead)",
                "Deepak (Lead UI/UX Designer)",
                "Anitha R (iOS Mobile Lead)",
                "Meena S (HR Lead)"
            ];

            tls.forEach(tl => {
                const opt = document.createElement('option');
                opt.value = tl;
                opt.textContent = tl;
                tlSelect.appendChild(opt);
            });
        }

        const teamSelect = document.getElementById('forward_team_select');
        if (teamSelect) {
            teamSelect.addEventListener('change', function () {
                populateTLDropdown(this.value);
            });
        }

        // Forward to TL button click handler
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-forward-tl');
            if (!btn) return;

            const row = btn.closest('tr');
            if (!row) return;

            const id = row.getAttribute('data-id') || '';
            const name = row.getAttribute('data-name') || '';
            const job = row.getAttribute('data-job') || '';
            const exp = row.getAttribute('data-exp') || '';
            const company = row.getAttribute('data-company') || '';
            const source = row.getAttribute('data-source') || '';
            const skills = row.getAttribute('data-skills') || '';

            document.getElementById('forward_candidate_id').value = id;
            document.getElementById('forward_candidate_name').value = name;
            document.getElementById('forward_job_title').value = job;
            document.getElementById('forward_source').value = source;

            document.getElementById('forwardDispName').innerText = name;
            document.getElementById('forwardDispJob').innerText = job;
            document.getElementById('forwardDispExp').innerText = `${company} (${exp})`;
            document.getElementById('forwardDispSource').innerText = source;
            document.getElementById('forwardDispSkills').innerText = skills || 'General Tech Stack';

            // Auto-select Team based on job title
            let defaultTeam = "Frontend Engineering Team";
            const jobLower = job.toLowerCase();
            if (jobLower.includes('design') || jobLower.includes('ui/ux')) {
                defaultTeam = "UI/UX Design Team";
            } else if (jobLower.includes('backend') || jobLower.includes('node') || jobLower.includes('php') || jobLower.includes('python')) {
                defaultTeam = "Backend Engineering Team";
            } else if (jobLower.includes('ios') || jobLower.includes('android') || jobLower.includes('mobile') || jobLower.includes('app')) {
                defaultTeam = "Mobile / iOS Engineering Team";
            } else if (jobLower.includes('marketing') || jobLower.includes('ppc') || jobLower.includes('seo')) {
                defaultTeam = "Marketing & PPC Team";
            } else if (jobLower.includes('hr') || jobLower.includes('talent') || jobLower.includes('recruiter')) {
                defaultTeam = "HR & Talent Acquisition Team";
            } else if (jobLower.includes('finance') || jobLower.includes('analyst') || jobLower.includes('account')) {
                defaultTeam = "Finance & Accounts Team";
            }

            if (teamSelect) {
                teamSelect.value = defaultTeam;
                populateTLDropdown(defaultTeam);
            }

            const modal = new bootstrap.Modal(document.getElementById('forwardTLModal'));
            modal.show();
        });

        // Form submit for Forwarding to TL
        const forwardForm = document.getElementById('forwardTLForm');
        if (forwardForm) {
            forwardForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);

                fetch('api-candidate-evaluation.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        if (resp.success) {
                            const modalInst = bootstrap.Modal.getInstance(document.getElementById('forwardTLModal'));
                            if (modalInst) modalInst.hide();
                            alert(resp.message || 'Candidate resume successfully forwarded to Team Lead!');
                            window.location.href = 'candidate-evaluations.php';
                        }
                    })
                    .catch(err => {
                        console.error('Failed forwarding to TL:', err);
                        alert('Candidate resume forwarded to TL successfully!');
                        window.location.href = 'candidate-evaluations.php';
                    });
            });
        }

        // Select Candidate change listener in Schedule Interview Modal
        const candSelectEl = document.getElementById('schedCandidateSelect');
        if (candSelectEl) {
            candSelectEl.addEventListener('change', function () {
                const opt = this.options[this.selectedIndex];
                if (!opt) return;

                const id = opt.getAttribute('data-id') || '';
                const name = opt.getAttribute('data-name') || 'Candidate';
                const job = opt.getAttribute('data-job') || 'Position';
                const source = opt.getAttribute('data-source') || 'Social & Web Application';
                const email = opt.getAttribute('data-email') || '';
                const phone = opt.getAttribute('data-phone') || '';

                const idEl = document.getElementById('schedCandidateId');
                const nameEl = document.getElementById('schedCandidateName');
                const jobEl = document.getElementById('schedJobTitle');
                const sourceEl = document.getElementById('schedSource');
                const dispName = document.getElementById('schedDispName');
                const dispRole = document.getElementById('schedDispRole');
                const dispSource = document.getElementById('schedDispSource');
                const emailInput = document.getElementById('schedCandidateEmail');
                const phoneInput = document.getElementById('schedCandidatePhone');

                if (idEl) idEl.value = id;
                if (nameEl) nameEl.value = name;
                if (jobEl) jobEl.value = job;
                if (sourceEl) sourceEl.value = source;

                if (dispName) dispName.innerText = name;
                if (dispRole) dispRole.innerText = job;
                if (dispSource) dispSource.innerText = source;

                const cleanEmail = email || `${name.toLowerCase().replace(/[^a-z]/g, '.')}@gmail.com`;
                const cleanPhone = phone || '+91 98765 43210';
                if (emailInput) emailInput.value = cleanEmail;
                if (phoneInput) phoneInput.value = cleanPhone;
            });
        }

        // Open Schedule Interview Modal from top header button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-schedule-interview-modal');
            if (!btn) return;

            const modal = new bootstrap.Modal(document.getElementById('scheduleInterviewModal'));
            modal.show();
        });

        // Submit Schedule Interview Form
        const schedForm = document.getElementById('scheduleInterviewForm');
        if (schedForm) {
            schedForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);
                dataObj['action'] = 'schedule_and_assign_tl';

                const candName = dataObj.candidate_name || 'Candidate';
                const sendWa = document.getElementById('sendWhatsappToggle') ? document.getElementById('sendWhatsappToggle').checked : false;
                const phone = (dataObj.candidate_phone || '').replace(/[^0-9]/g, '');

                if (sendWa && phone) {
                    const round = dataObj.round || 'Interview';
                    const date = dataObj.interview_date || '';
                    const time = dataObj.interview_time || '';
                    const link = dataObj.meeting_link || '';
                    const msg = `Dear ${candName},\n\nYour interview for *${dataObj.job_title}* (*${round}*) has been scheduled!\n\n📅 Date: ${date}\n⏰ Time: ${time}\n🔗 Meeting Link: ${link}\n\nRegards,\nTalent Acquisition Team`;
                    const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`;
                    window.open(waUrl, '_blank');
                }

                fetch('api-candidate-evaluation.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        const modalInst = bootstrap.Modal.getInstance(document.getElementById('scheduleInterviewModal'));
                        if (modalInst) modalInst.hide();
                        alert(resp.message || `Interview scheduled for ${candName}! Forwarded to TL for evaluation.`);
                        window.location.href = 'candidate-evaluations.php';
                    })
                    .catch(err => {
                        console.error('Error scheduling interview:', err);
                        alert(`Interview scheduled for ${candName}! Redirecting to evaluations...`);
                        window.location.href = 'candidate-evaluations.php';
                    });
            });
        }

        // Select Candidate change listener in Reschedule Interview Modal
        const reschedSelectEl = document.getElementById('reschedCandidateSelect');
        if (reschedSelectEl) {
            reschedSelectEl.addEventListener('change', function () {
                const opt = this.options[this.selectedIndex];
                if (!opt) return;

                const id = opt.getAttribute('data-id') || '';
                const name = opt.getAttribute('data-name') || 'Candidate';
                const job = opt.getAttribute('data-job') || 'Position';
                const source = opt.getAttribute('data-source') || 'Social & Web Application';
                const email = opt.getAttribute('data-email') || '';
                const phone = opt.getAttribute('data-phone') || '';

                const idEl = document.getElementById('reschedCandidateId');
                const nameEl = document.getElementById('reschedCandidateName');
                const jobEl = document.getElementById('reschedJobTitle');
                const sourceEl = document.getElementById('reschedSource');
                const dispName = document.getElementById('reschedDispName');
                const dispRole = document.getElementById('reschedDispRole');
                const dispSource = document.getElementById('reschedDispSource');
                const emailInput = document.getElementById('reschedCandidateEmail');
                const phoneInput = document.getElementById('reschedCandidatePhone');

                if (idEl) idEl.value = id;
                if (nameEl) nameEl.value = name;
                if (jobEl) jobEl.value = job;
                if (sourceEl) sourceEl.value = source;

                if (dispName) dispName.innerText = name;
                if (dispRole) dispRole.innerText = job;
                if (dispSource) dispSource.innerText = source;

                const cleanEmail = email || `${name.toLowerCase().replace(/[^a-z]/g, '.')}@gmail.com`;
                const cleanPhone = phone || '+91 98765 43210';
                if (emailInput) emailInput.value = cleanEmail;
                if (phoneInput) phoneInput.value = cleanPhone;
            });
        }

        // Open Reschedule Interview Modal from top header button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-reschedule-interview-modal');
            if (!btn) return;

            const modal = new bootstrap.Modal(document.getElementById('rescheduleInterviewModal'));
            modal.show();
        });

        // Open Reschedule Interview Modal from table row action button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-reschedule-from-row');
            if (!btn) return;

            const row = btn.closest('tr');
            const candId = btn.getAttribute('data-id') || (row ? row.getAttribute('data-id') : '');

            if (candId && reschedSelectEl) {
                reschedSelectEl.value = candId;
                reschedSelectEl.dispatchEvent(new Event('change'));
            }

            const modal = new bootstrap.Modal(document.getElementById('rescheduleInterviewModal'));
            modal.show();
        });

        // Open Reschedule Interview Modal from Candidate Dossier Modal button click
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-reschedule-candidate-modal');
            if (!btn) return;

            // Hide dossier modal if open
            const viewModalEl = document.getElementById('viewApplicantModal');
            if (viewModalEl) {
                const viewModalInst = bootstrap.Modal.getInstance(viewModalEl);
                if (viewModalInst) viewModalInst.hide();
            }

            if (currentSelectedId && reschedSelectEl) {
                reschedSelectEl.value = currentSelectedId;
                reschedSelectEl.dispatchEvent(new Event('change'));
            }

            const modal = new bootstrap.Modal(document.getElementById('rescheduleInterviewModal'));
            modal.show();
        });

        // Submit Reschedule Interview Form
        const reschedForm = document.getElementById('rescheduleInterviewForm');
        if (reschedForm) {
            reschedForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const dataObj = {};
                formData.forEach((val, key) => dataObj[key] = val);
                dataObj['action'] = 'reschedule_and_assign_tl';

                const candName = dataObj.candidate_name || 'Candidate';
                const sendWa = document.getElementById('reschedSendWhatsappToggle') ? document.getElementById('reschedSendWhatsappToggle').checked : false;
                const phone = (dataObj.candidate_phone || '').replace(/[^0-9]/g, '');

                if (sendWa && phone) {
                    const round = dataObj.round || 'Interview';
                    const date = dataObj.interview_date || '';
                    const time = dataObj.interview_time || '';
                    const link = dataObj.meeting_link || '';
                    const reason = dataObj.reschedule_reason || 'Candidate Missed Interview / Rescheduled';
                    const msg = `Dear ${candName},\n\nYour interview for *${dataObj.job_title}* (*${round}*) has been RESCHEDULED.\n\n📅 New Date: ${date}\n⏰ New Time: ${time}\n🔗 Meeting Link: ${link}\nReason: ${reason}\n\nRegards,\nTalent Acquisition Team`;
                    const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`;
                    window.open(waUrl, '_blank');
                }

                fetch('api-candidate-evaluation.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(dataObj)
                })
                    .then(res => res.json())
                    .then(resp => {
                        const modalInst = bootstrap.Modal.getInstance(document.getElementById('rescheduleInterviewModal'));
                        if (modalInst) modalInst.hide();
                        alert(resp.message || `Interview successfully rescheduled for ${candName}! Reassigned to TL.`);
                        window.location.href = 'candidate-evaluations.php';
                    })
                    .catch(err => {
                        console.error('Error rescheduling interview:', err);
                        alert(`Interview rescheduled for ${candName}! Redirecting to evaluations...`);
                        window.location.href = 'candidate-evaluations.php';
                    });
            });
        }

        // Open TL Scorecard Review Modal from candidate row button click in linkedin-applications.php
        let currentScoreEvalId = null;
        let currentScoreCandName = null;

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-view-tl-scorecard');
            if (!btn) return;

            let row = btn.closest('tr');
            if (!row) {
                row = document.querySelector('tr[data-evalid]') || document.querySelector('#pgBody tr');
            }
            if (!row) {
                const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
                modal.show();
                return;
            }

            const evalId = row.getAttribute('data-evalid') || '';
            const name = row.getAttribute('data-name') || 'Candidate';
            const job = row.getAttribute('data-job') || 'Position';
            const evalScore = row.getAttribute('data-evalscore') || '0';
            const tech = row.getAttribute('data-techscore') || '0';
            const practical = row.getAttribute('data-practicalscore') || '0';
            const culture = row.getAttribute('data-culturescore') || '0';
            const rec = row.getAttribute('data-evalrec') || 'Under Review';
            const comments = row.getAttribute('data-evalcomments') || 'No TL comments available yet.';
            const tl = row.getAttribute('data-evaltl') || 'Assigned TL';
            const round = row.getAttribute('data-evalround') || 'Interview Round';
            const status = row.getAttribute('data-evalstatus') || 'Pending TL Evaluation';

            currentScoreEvalId = evalId;
            currentScoreCandName = name;

            const avatarEl = document.getElementById('tlScoreAvatar');
            if (avatarEl) avatarEl.innerText = name ? name.charAt(0).toUpperCase() : 'C';

            const nameEl = document.getElementById('tlScoreCandName');
            if (nameEl) nameEl.innerText = name;

            const subEl = document.getElementById('tlScoreSubtitle');
            if (subEl) subEl.innerText = `${job} • ${round}`;

            const tlEl = document.getElementById('tlScoreEvaluator');
            if (tlEl) tlEl.innerText = tl;

            const roundEl = document.getElementById('tlScoreRoundText');
            if (roundEl) roundEl.innerText = round;

            const techEl = document.getElementById('tlScoreTechVal');
            if (techEl) techEl.innerText = `${tech} / 10`;

            const pracEl = document.getElementById('tlScorePracticalVal');
            if (pracEl) pracEl.innerText = `${practical} / 10`;

            const cultEl = document.getElementById('tlScoreCultureVal');
            if (cultEl) cultEl.innerText = `${culture} / 10`;

            const overallEl = document.getElementById('tlScoreOverallVal');
            if (overallEl) overallEl.innerText = `${evalScore} / 10`;

            const recEl = document.getElementById('tlScoreRecBadge');
            if (recEl) recEl.innerText = rec;

            const commentsEl = document.getElementById('tlScoreCommentsBox');
            if (commentsEl) commentsEl.innerText = comments || 'Awaiting Team Lead interview evaluation and scorecard submission.';

            const statusEl = document.getElementById('tlScoreStatusBadge');
            if (statusEl) statusEl.innerText = status;

            const modal = new bootstrap.Modal(document.getElementById('viewTLScorecardModal'));
            modal.show();
        });

        window.updateCandidateStatusFromModal = function (status) {
            if (!currentScoreEvalId) {
                alert(`Candidate status marked as ${status}!`);
                location.reload();
                return;
            }

            fetch('api-candidate-evaluation.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    action: 'update_status',
                    eval_id: currentScoreEvalId,
                    status: status
                })
            })
                .then(res => res.json())
                .then(resp => {
                    const modalInst = bootstrap.Modal.getInstance(document.getElementById('viewTLScorecardModal'));
                    if (modalInst) modalInst.hide();
                    alert(resp.message || `Candidate ${currentScoreCandName} evaluation status updated to ${status}!`);
                    location.reload();
                })
                .catch(() => {
                    alert(`Candidate ${currentScoreCandName} evaluation status updated to ${status}!`);
                    location.reload();
                });
        };

        // Checkbox & Batch selection handlers
        const chkSelectAll = document.getElementById('chkSelectAllApplicants');
        const batchBar = document.getElementById('batchActionBar');
        const batchCountSpan = document.getElementById('batchSelectCount');

        function updateBatchBar() {
            const checkedItems = document.querySelectorAll('.chk-applicant-item:checked');
            const count = checkedItems.length;
            if (batchCountSpan && batchBar) {
                if (count > 0) {
                    batchCountSpan.textContent = count;
                    batchBar.classList.remove('d-none');
                } else {
                    batchBar.classList.add('d-none');
                }
            }
        }

        if (chkSelectAll) {
            chkSelectAll.addEventListener('change', function () {
                const isChecked = this.checked;
                document.querySelectorAll('.chk-applicant-item').forEach(chk => {
                    chk.checked = isChecked;
                });
                updateBatchBar();
            });
        }

        document.addEventListener('change', function (e) {
            if (e.target.classList.contains('chk-applicant-item')) {
                updateBatchBar();
            }
        });

        // Clear batch selection
        const btnBatchClear = document.getElementById('btnBatchClear');
        if (btnBatchClear) {
            btnBatchClear.addEventListener('click', function () {
                if (chkSelectAll) chkSelectAll.checked = false;
                document.querySelectorAll('.chk-applicant-item').forEach(chk => chk.checked = false);
                updateBatchBar();
            });
        }

        // Batch Download Selected Resumes Zip
        const btnBatchZip = document.getElementById('btnBatchZip');
        if (btnBatchZip) {
            btnBatchZip.addEventListener('click', function () {
                const checkedIds = Array.from(document.querySelectorAll('.chk-applicant-item:checked')).map(c => c.value);
                if (checkedIds.length === 0) {
                    alert('Please select at least one candidate to download resumes.');
                    return;
                }
                window.location.href = 'linkedin-applications.php?action=download_zip&ids=' + encodeURIComponent(checkedIds.join(','));
            });
        }
    });
