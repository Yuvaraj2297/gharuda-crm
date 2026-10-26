/**
 * Gharuda CRM - Candidate Apply Page Script
 * File: assets/js/pages/candidate-apply.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
            'use strict';

            function $(id) { return document.getElementById(id); }

            function esc(s) {
                return String(s == null ? '' : s)
                    .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
            }

            /* ---------------- Select2 ---------------- */
            if (window.jQuery && jQuery.fn.select2) {
                jQuery('.cap-body .select2').select2({ width: '100%' });
            }

            /* ---------------- Toast ---------------- */
            var toastWrap = null;

            function getToastWrap() {
                if (!toastWrap) {
                    toastWrap = document.createElement('div');
                    toastWrap.className = 'cap-toast-wrap';
                    document.body.appendChild(toastWrap);
                }
                return toastWrap;
            }

            function showToast(msg, isWarn) {
                var wrap = getToastWrap();
                var t = document.createElement('div');
                t.className = 'cap-toast' + (isWarn ? ' is-warn' : '');
                t.innerHTML = '<span class="cap-toast-ico"><i class="bi ' + (isWarn ? 'bi-exclamation-triangle-fill' : 'bi-check-lg') + '"></i></span>' +
                    '<span class="cap-toast-msg"></span>';
                t.querySelector('.cap-toast-msg').textContent = msg;
                wrap.appendChild(t);
                setTimeout(function() {
                    t.classList.add('cap-toast-out');
                    setTimeout(function() { t.remove(); }, 260);
                }, 4200);
            }

            /* ---------------- Copy application link (HR share) ---------------- */
            $('capCopyLinkBtn').addEventListener('click', function() {
                var url = window.location.href;
                var done = function() { showToast('Application link copied — share it with the candidate'); };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(url).then(done, function() { showToast(url); });
                } else {
                    showToast(url);
                }
            });

            /* ---------------- Skills tag input ---------------- */
            var skills = [];
            var SUGGESTIONS = ['Figma', 'Photoshop', 'Illustrator', 'React', 'Node.js', 'Flutter', 'Swift',
                'SQL', 'Python', 'Java', 'PHP', 'Communication', 'Leadership', 'Problem Solving'];

            function renderSkillSuggest() {
                var wrap = $('capSkillSuggest');
                wrap.innerHTML = '<span class="lbl">Quick add</span>';
                SUGGESTIONS.forEach(function(s) {
                    if (skills.indexOf(s) !== -1) return;
                    var b = document.createElement('button');
                    b.type = 'button';
                    b.className = 'cap-sug-chip';
                    b.textContent = s;
                    b.addEventListener('click', function() { addSkill(s); });
                    wrap.appendChild(b);
                });
            }

            function addSkill(val) {
                val = String(val || '').trim().replace(/,+$/, '');
                if (!val) return;
                if (skills.some(function(s) { return s.toLowerCase() === val.toLowerCase(); })) {
                    showToast('"' + val + '" already added', true);
                    return;
                }
                skills.push(val);
                renderSkills();
                refreshProgress();
            }

            function renderSkills() {
                var wrap = $('capSkillsWrap');
                wrap.querySelectorAll('.cap-tag').forEach(function(t) { t.remove(); });
                skills.forEach(function(s, i) {
                    var chip = document.createElement('span');
                    chip.className = 'cap-tag';
                    chip.innerHTML = esc(s) + '<button type="button" class="x" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    chip.querySelector('.x').addEventListener('click', function() {
                        skills.splice(i, 1);
                        renderSkills();
                        renderSkillSuggest();
                        refreshProgress();
                    });
                    wrap.appendChild(chip);
                });
                renderSkillSuggest();
            }

            $('capSkillInput').addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addSkill(this.value);
                    this.value = '';
                } else if (e.key === 'Backspace' && !this.value && skills.length) {
                    skills.pop();
                    renderSkills();
                    renderSkillSuggest();
                    refreshProgress();
                }
            });

            $('capSkillsWrap').addEventListener('click', function() {
                $('capSkillInput').focus();
            });

            /* ---------------- Resume upload ---------------- */
            $('capResume').addEventListener('change', function() {
                var f = this.files && this.files[0];
                var box = this.closest('.cap-upload-box');
                if (f) {
                    if (f.size > 5 * 1024 * 1024) {
                        showToast('Resume file must be under 5 MB', true);
                        this.value = '';
                        box.classList.remove('has-file');
                        $('capResumeName').textContent = 'Choose resume file';
                        $('capResumeIco').innerHTML = '<i class="bi bi-file-earmark-pdf"></i>';
                        return;
                    }
                    box.classList.add('has-file');
                    $('capResumeName').textContent = f.name;
                    $('capResumeIco').innerHTML = '<i class="bi bi-file-earmark-check-fill"></i>';
                } else {
                    box.classList.remove('has-file');
                    $('capResumeName').textContent = 'Choose resume file';
                    $('capResumeIco').innerHTML = '<i class="bi bi-file-earmark-pdf"></i>';
                }
            });

            /* Applied position -> department auto-pick (job openings match) */
            $('capPosition').addEventListener('change', function() {
                var opt = this.options[this.selectedIndex];
                var dept = opt ? opt.getAttribute('data-dept') : '';
                if (dept) {
                    $('capDept').value = dept;
                    if (window.jQuery && jQuery.fn.select2) $('#capDept').val(dept).trigger('change.select2');
                }
            });

            /* ---------------- Progress ---------------- */
            function refreshProgress() {
                var total = 0, filled = 0;
                document.querySelectorAll('#capForm [data-required]').forEach(function(el) {
                    total++;
                    if (String(el.value || '').trim()) filled++;
                });
                if (skills.length) { /* skills count as one bonus signal — not in required total */ }
                var pct = total ? Math.round(filled / total * 100) : 0;
                $('capPct').textContent = pct + '%';
                $('capProgressFill').style.width = pct + '%';
                $('capFilledCount').textContent = filled + ' of ' + total + ' fields filled';
            }

            $('capForm').addEventListener('input', refreshProgress);
            $('capForm').addEventListener('change', refreshProgress);

            /* ---------------- Submit (no blocking validation — all fields optional) ---------------- */
            $('capSubmitBtn').addEventListener('click', function() {

                var name = $('capName').value.trim();
                var position = $('capPosition').value || 'our open position';
                var ref = 'CAP-' + String(Date.now()).slice(-6);

                var application = {
                    ref: ref,
                    name: name,
                    email: $('capEmail').value.trim(),
                    mobile: $('capMobile').value.trim(),
                    dob: $('capDob').value,
                    gender: $('capGender').value,
                    location: $('capLocation').value.trim(),
                    qual: $('capQual').value,
                    totalExp: $('capTotalExp').value.trim(),
                    relExp: $('capRelExp').value.trim(),
                    company: $('capCompany').value.trim(),
                    desig: $('capDesig').value.trim(),
                    ctc: $('capCtc').value.trim(),
                    expCtc: $('capExpCtc').value.trim(),
                    notice: $('capNotice').value,
                    skills: skills.slice(),
                    resume: ($('capResume').files && $('capResume').files[0]) ? $('capResume').files[0].name : '',
                    position: position,
                    dept: $('capDept').value,
                    jobType: $('capJobType').value,
                    source: $('capSource').value,
                    referred: $('capReferred').value.trim(),
                    status: 'Applied',
                    submittedAt: new Date().toLocaleString()
                };

                /* HR side ku save — candidates pipeline integration ku ready */
                try {
                    var list = JSON.parse(localStorage.getItem('gh_cand_applications') || '[]');
                    list.unshift(application);
                    localStorage.setItem('gh_cand_applications', JSON.stringify(list));
                } catch (e) { /* private mode */ }

                /* Success screen */
                $('capRefNo').textContent = ref;
                $('capDoneMsg').innerHTML = 'Thank you' + (name ? ', <b>' + esc(name) + '</b>' : '') + '! Your application for <b>' + esc(position) + '</b> has been sent to our HR team. We will reach out to you' + (application.email ? ' at <b>' + esc(application.email) + '</b>' : '') + '.';
                $('capForm').style.display = 'none';
                document.querySelector('.cap-hero').style.display = 'none';
                $('capDone').classList.add('show');
                window.scrollTo({ top: 0, behavior: 'smooth' });

                /* In production this would POST here:
                   fetch('save-candidate-application.php', { method: 'POST', body: new FormData(form) }) */
            });

            /* ---------------- Init ---------------- */
            renderSkillSuggest();
            refreshProgress();
        })();
