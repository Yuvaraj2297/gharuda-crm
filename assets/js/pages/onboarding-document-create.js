/**
 * Gharuda CRM - Onboarding Document Create Page Script
 * File: assets/js/pages/onboarding-document-create.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {

    // Dynamic Candidate Selection Metadata update
    const candSelect = document.getElementById('docCandidateSelect');
    if (candSelect) {
        candSelect.addEventListener('change', function() {
            const opt = this.options[this.selectedIndex];
            const dept = opt.getAttribute('data-dept') || '';
            const id = opt.getAttribute('data-id') || '';
            const date = opt.getAttribute('data-date') || '';

            document.getElementById('dispJoinerId').innerText = id;
            document.getElementById('dispDept').innerText = dept;
            document.getElementById('dispJoiningDate').innerText = date;
        });
    }

    // Form submission handler
    const form = document.getElementById('documentSubmissionForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Candidate onboarding documents successfully submitted for HR verification!');
            window.location.href = 'onboarding-documents.php';
        });
    }
});
