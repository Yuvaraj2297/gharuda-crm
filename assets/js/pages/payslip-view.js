/**
 * Gharuda CRM - Payslip View Page Script
 * File: assets/js/pages/payslip-view.js
 */

function triggerDownload() {
    window.print();
}

window.addEventListener('DOMContentLoaded', function() {
    if (window.PAYSLIP_AUTO_PRINT) {
        setTimeout(function() {
            window.print();
        }, 500);
    }
});