/**
 * Gharuda CRM - Offer Management Page Script
 * File: assets/js/pages/offer-management.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {

        // Live CTC Calculation in Generate Offer Modal
        const ctcInput = document.getElementById('offerCtcInput');
        if (ctcInput) {
            ctcInput.addEventListener('input', function () {
                const annual = parseFloat(this.value) || 0;
                const monthly = annual / 12;
                const basic = monthly * 0.50;
                const hra = monthly * 0.25;
                const special = monthly * 0.25;

                document.getElementById('offerGrossDisplay').value = `₹${Math.round(monthly).toLocaleString('en-IN')} / month`;
                document.getElementById('offerBasicDisp').innerText = `₹${Math.round(basic).toLocaleString('en-IN')} / mo`;
                document.getElementById('offerHraDisp').innerText = `₹${Math.round(hra).toLocaleString('en-IN')} / mo`;
                document.getElementById('offerSpecialDisp').innerText = `₹${Math.round(special).toLocaleString('en-IN')} / mo`;
            });
        }

        // Candidate dropdown selection auto-fill
        const candSelect = document.getElementById('offerCandidateSelect');
        if (candSelect) {
            candSelect.addEventListener('change', function () {
                const opt = this.options[this.selectedIndex];
                const email = opt.getAttribute('data-email') || '';
                const job = opt.getAttribute('data-job') || '';
                const ctc = opt.getAttribute('data-ctc') || '1500000';

                document.getElementById('offerCandidateEmail').value = email;
                document.getElementById('offerJobTitle').value = job;
                document.getElementById('offerCtcInput').value = ctc;
                document.getElementById('offerCtcInput').dispatchEvent(new Event('input'));
            });
        }

        // Navigate to Official Offer Letter Document Page
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-view-offer-pdf');
            if (!btn) return;

            const row = btn.closest('tr');
            if (!row) return;

            const candName = encodeURIComponent(row.getAttribute('data-candname') || '');
            const email = encodeURIComponent(row.getAttribute('data-email') || '');
            const phone = encodeURIComponent(row.getAttribute('data-phone') || '');
            const job = encodeURIComponent(row.getAttribute('data-job') || '');
            const dept = encodeURIComponent(row.getAttribute('data-dept') || '');
            const ctc = encodeURIComponent(row.getAttribute('data-ctc') || '');
            const gross = encodeURIComponent(row.getAttribute('data-gross') || '');
            const basic = encodeURIComponent(row.getAttribute('data-basic') || '');
            const hra = encodeURIComponent(row.getAttribute('data-hra') || '');
            const allowance = encodeURIComponent(row.getAttribute('data-allowance') || '');
            const joining = encodeURIComponent(row.getAttribute('data-joining') || '');
            const expiry = encodeURIComponent(row.getAttribute('data-expiry') || '');
            const ref = encodeURIComponent(row.getAttribute('data-ref') || '');
            const status = encodeURIComponent(row.getAttribute('data-status') || '');

            window.location.href = `offer-letter-view.php?ref=${ref}&candidate=${candName}&job=${job}&dept=${dept}&ctc=${ctc}&gross=${gross}&basic=${basic}&hra=${hra}&allowance=${allowance}&joining=${joining}&expiry=${expiry}&status=${status}&email=${email}&phone=${phone}`;
        });

        // Handle "Send" Offer Button click -> Populate and show Send Offer Modal
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-send-offer');
            if (!btn) return;

            const row = btn.closest('tr');
            if (!row) return;

            const candName = row.getAttribute('data-candname') || 'Candidate';
            const email = row.getAttribute('data-email') || '';
            const phone = row.getAttribute('data-phone') || '';
            const job = row.getAttribute('data-job') || '';
            const dept = row.getAttribute('data-dept') || '';
            const ctc = row.getAttribute('data-ctc') || '';
            const gross = row.getAttribute('data-gross') || '';
            const basic = row.getAttribute('data-basic') || '';
            const hra = row.getAttribute('data-hra') || '';
            const allowance = row.getAttribute('data-allowance') || '';
            const joining = row.getAttribute('data-joining') || '';
            const expiry = row.getAttribute('data-expiry') || '';
            const ref = row.getAttribute('data-ref') || 'GHR/2026/OFF-101';
            const status = row.getAttribute('data-status') || '';

            // Build full view URL
            const basePath = window.location.origin + window.location.pathname.replace('offer-management.php', '');
            const offerViewUrl = `${basePath}offer-letter-view.php?ref=${encodeURIComponent(ref)}&candidate=${encodeURIComponent(candName)}&job=${encodeURIComponent(job)}&dept=${encodeURIComponent(dept)}&ctc=${encodeURIComponent(ctc)}&gross=${encodeURIComponent(gross)}&basic=${encodeURIComponent(basic)}&hra=${encodeURIComponent(hra)}&allowance=${encodeURIComponent(allowance)}&joining=${encodeURIComponent(joining)}&expiry=${encodeURIComponent(expiry)}&status=${encodeURIComponent(status)}&email=${encodeURIComponent(email)}&phone=${encodeURIComponent(phone)}`;

            // Populate Modal Fields
            document.getElementById('sendCandRef').value = ref;
            document.getElementById('sendOfferLinkHidden').value = offerViewUrl;
            document.getElementById('sendCandName').innerText = candName;
            document.getElementById('sendCandRole').innerText = `${job} • ${dept}`;
            document.getElementById('sendOfferRef').innerText = ref;
            document.getElementById('sendWaPhone').value = phone;
            document.getElementById('sendEmailAddr').value = email;

            // Populate WhatsApp Preview Message
            const waMsg = `Dear ${candName},\n\nGreetings from Gharuda HR Technologies!\n\nWe are pleased to extend your official Employment Offer Letter for the position of *${job}* (${dept}) with an offered CTC of *${ctc}*.\n\n📋 *Offer Ref:* ${ref}\n📅 *Target Joining:* ${joining}\n⏳ *Offer Expiry:* ${expiry}\n\nYou can view and accept your official Offer Letter document online here:\n${offerViewUrl}\n\nKindly confirm your acceptance at your earliest convenience.\n\nBest Regards,\n*Talent Acquisition Team*\nGharuda HR Technologies`;
            document.getElementById('sendWaMsg').value = waMsg;

            // Populate Email Subject & Body Preview
            document.getElementById('sendEmailSubj').value = `Letter of Intent & Employment Offer - ${job} (${ref})`;
            const emailBody = `Dear ${candName},\n\nFollowing our interview discussions, we are delighted to offer you the position of ${job} in the ${dept} at Gharuda HR Technologies.\n\nOffer Details:\n- Position: ${job}\n- Department: ${dept}\n- Offered CTC: ${ctc}\n- Target Joining Date: ${joining}\n- Offer Expiry Date: ${expiry}\n- Reference Number: ${ref}\n\nPlease click the link below to view your full official Employment Offer Letter online:\n${offerViewUrl}\n\nWe look forward to having you on board!\n\nBest Regards,\nHead of Talent Acquisition & HR\nGharuda HR Technologies`;
            document.getElementById('sendEmailBody').value = emailBody;

            // Open Modal
            const sendModal = new bootstrap.Modal(document.getElementById('sendOfferModal'));
            sendModal.show();
        });

        // Send via WhatsApp Button Handler
        const btnSendWaNow = document.getElementById('btnSendWaNow');
        if (btnSendWaNow) {
            btnSendWaNow.addEventListener('click', function () {
                const rawPhone = document.getElementById('sendWaPhone').value.trim();
                const msg = document.getElementById('sendWaMsg').value.trim();
                const cleanPhone = rawPhone.replace(/[^\d+]/g, '');

                if (!cleanPhone) {
                    alert('Please enter a valid WhatsApp phone number.');
                    return;
                }

                const waUrl = `https://api.whatsapp.com/send?phone=${encodeURIComponent(cleanPhone)}&text=${encodeURIComponent(msg)}`;
                window.open(waUrl, '_blank');
            });
        }

        // Send via Email Button Handler
        const btnSendEmailNow = document.getElementById('btnSendEmailNow');
        if (btnSendEmailNow) {
            btnSendEmailNow.addEventListener('click', function () {
                const emailAddr = document.getElementById('sendEmailAddr').value.trim();
                const subj = document.getElementById('sendEmailSubj').value.trim();
                const body = document.getElementById('sendEmailBody').value.trim();

                if (!emailAddr) {
                    alert('Please enter a valid candidate email address.');
                    return;
                }

                const mailtoUrl = `mailto:${encodeURIComponent(emailAddr)}?subject=${encodeURIComponent(subj)}&body=${encodeURIComponent(body)}`;
                window.location.href = mailtoUrl;
            });
        }

        // Copy Offer Link Button Handler
        const btnCopyOfferLink = document.getElementById('btnCopyOfferLink');
        if (btnCopyOfferLink) {
            btnCopyOfferLink.addEventListener('click', function () {
                const link = document.getElementById('sendOfferLinkHidden').value;
                if (navigator.clipboard && link) {
                    navigator.clipboard.writeText(link).then(() => {
                        const origHtml = this.innerHTML;
                        this.innerHTML = '<i class="bi bi-check2 text-success me-1"></i> Copied!';
                        setTimeout(() => {this.innerHTML = origHtml;}, 2000);
                    }).catch(() => {
                        alert('Copy failed. URL: ' + link);
                    });
                } else {
                    alert('Offer Link: ' + link);
                }
            });
        }

        // Form submit for Generate Offer Letter -> Redirects to Offer Letter Page
        const offerForm = document.getElementById('generateOfferForm');
        if (offerForm) {
            offerForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const modalInst = bootstrap.Modal.getInstance(document.getElementById('generateOfferModal'));
                if (modalInst) modalInst.hide();

                const candName = encodeURIComponent(this.elements['candidate_name'].value || 'Candidate');
                const job = encodeURIComponent(this.elements['job_title'].value || 'Position');
                const dept = encodeURIComponent(this.elements['department'].value || 'Department');
                const annualCtc = parseFloat(this.elements['annual_ctc'].value) || 1800000;
                const grossVal = Math.round(annualCtc / 12);
                const basicVal = Math.round(grossVal * 0.5);
                const hraVal = Math.round(grossVal * 0.25);
                const allowVal = Math.round(grossVal * 0.25);

                const ctc = encodeURIComponent(`₹${annualCtc.toLocaleString('en-IN')} / yr`);
                const gross = encodeURIComponent(`₹${grossVal.toLocaleString('en-IN')} / mo`);
                const basic = encodeURIComponent(`₹${basicVal.toLocaleString('en-IN')}`);
                const hra = encodeURIComponent(`₹${hraVal.toLocaleString('en-IN')}`);
                const allowance = encodeURIComponent(`₹${allowVal.toLocaleString('en-IN')}`);
                const joining = encodeURIComponent(this.elements['joining_date'].value || '2026-03-20');
                const expiry = encodeURIComponent(this.elements['expiry_date'].value || '2026-03-15');
                const email = encodeURIComponent(this.elements['email'].value || '');

                alert('Job Offer Letter successfully generated! Opening official Offer Letter Document page...');
                window.location.href = `offer-letter-view.php?ref=GHR/2026/OFF-105&candidate=${candName}&job=${job}&dept=${dept}&ctc=${ctc}&gross=${gross}&basic=${basic}&hra=${hra}&allowance=${allowance}&joining=${joining}&expiry=${expiry}&status=Sent+to+Candidate&email=${email}`;
            });
        }
    });
