/**
 * Gharuda CRM - Organization Page Script
 * File: assets/js/pages/organization.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.querySelectorAll('.org-dept-item').forEach(function (item) {
        item.addEventListener('click', function () {
            document.querySelectorAll('.org-dept-item').forEach(function (i) {
                i.classList.remove('active');
            });
            item.classList.add('active');
        });
    });
