/**
 * Gharuda CRM - Offer Letter View Page Script
 * File: assets/js/pages/offer-letter-view.js
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';
    const cfg = window.OFFER_LETTER_CONFIG || {};
    const candName = cfg.candName || '';
    const jobTitle = cfg.jobTitle || '';
    const gross = cfg.gross || '';
    const pageUrl = window.location.href;

    const waMsgText = `Dear ${candName},\n\nWe are pleased to inform you that you have been appointed as a ${jobTitle} at GHARUDA INFOTECH PRIVATE LIMITED.\n\nPlease find the terms and conditions of your employment below:\n1. You will receive a monthly salary of ${gross} on the company's payroll.\n2. You will be eligible for a salary increment once every 12 months, based on your performance, work quality, and professional attitude.\n3. The first three months of your employment will be considered as a probation period.\n4. You agree to serve the company for a minimum of two years from your start date.\n5. If you leave before completing two years without a valid reason, the company will not issue an experience certificate.\n\nKindly reply confirming your acceptance of the above terms and conditions.\n\nWe look forward to your contribution and wish you a successful career with us.\n\nWarm regards,\nHR Department\nGHARUDA INFOTECH PRIVATE LIMITED\n\nView Document Online:\n${pageUrl}`;
    
    const emailBodyText = `Dear ${candName},\n\nWe are pleased to inform you that you have been appointed as a ${jobTitle} at GHARUDA INFOTECH PRIVATE LIMITED.\n\nPlease find the terms and conditions of your employment below:\n1. You will receive a monthly salary of ${gross} on the company's payroll.\n2. You will be eligible for a salary increment once every 12 months, based on your performance, work quality, and professional attitude.\n3. The first three months of your employment will be considered as a probation period.\n4. You agree to serve the company for a minimum of two years from your start date.\n5. If you leave before completing two years without a valid reason, the company will not issue an experience certificate.\n\nKindly reply to this email confirming your acceptance of the above terms and conditions.\n\nWe look forward to your contribution and wish you a successful career with us.\n\nWarm regards,\nHR Department\nGHARUDA INFOTECH PRIVATE LIMITED\n\nView Document Online:\n${pageUrl}`;

    const docWaMsgEl = document.getElementById('docWaMsg');
    if (docWaMsgEl) docWaMsgEl.value = waMsgText;

    const docEmailBodyEl = document.getElementById('docEmailBody');
    if (docEmailBodyEl) docEmailBodyEl.value = emailBodyText;

    // Send WhatsApp Direct button handler
    const btnDocWaSend = document.getElementById('btnDocWaSend');
    if (btnDocWaSend) {
        btnDocWaSend.addEventListener('click', function() {
            const phone = document.getElementById('docWaPhone').value.replace(/[^\d+]/g, '');
            const msg = document.getElementById('docWaMsg').value;
            if (!phone) { alert('Please provide a valid phone number.'); return; }
            window.open(`https://api.whatsapp.com/send?phone=${encodeURIComponent(phone)}&text=${encodeURIComponent(msg)}`, '_blank');
        });
    }

    // Send Email Direct button handler
    const btnDocEmailSend = document.getElementById('btnDocEmailSend');
    if (btnDocEmailSend) {
        btnDocEmailSend.addEventListener('click', function() {
            const email = document.getElementById('docEmailAddr').value;
            const subj = document.getElementById('docEmailSubj').value;
            const body = document.getElementById('docEmailBody').value;
            if (!email) { alert('Please provide a valid email address.'); return; }
            window.location.href = `mailto:${encodeURIComponent(email)}?subject=${encodeURIComponent(subj)}&body=${encodeURIComponent(body)}`;
        });
    }

    // Header buttons trigger modal with specific tabs
    const btnTopWa = document.getElementById('btnTopWa');
    if (btnTopWa) {
        btnTopWa.addEventListener('click', function() {
            const tabEl = document.getElementById('doc-wa-tab');
            if (tabEl) bootstrap.Tab.getOrCreateInstance(tabEl).show();
            new bootstrap.Modal(document.getElementById('sendOfferDocModal')).show();
        });
    }

    const btnTopEmail = document.getElementById('btnTopEmail');
    if (btnTopEmail) {
        btnTopEmail.addEventListener('click', function() {
            const tabEl = document.getElementById('doc-email-tab');
            if (tabEl) bootstrap.Tab.getOrCreateInstance(tabEl).show();
            new bootstrap.Modal(document.getElementById('sendOfferDocModal')).show();
        });
    }
});