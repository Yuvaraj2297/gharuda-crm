/**
 * Gharuda CRM - Onboarding Orientation Create Page Script
 * File: assets/js/pages/onboarding-orientation-create.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    const empSelect = document.getElementById('empSelect');
    if (empSelect) {
        empSelect.addEventListener('change', function() {
            const parts = this.value.split('|');
            document.getElementById('empId').value = parts[1] || '';
            document.getElementById('empDept').value = parts[2] || '';
            document.getElementById('empRole').value = parts[3] || '';
            if (parts[4]) document.getElementById('joiningDate').value = parts[4];
            if (parts[6]) document.getElementById('reportingManager').value = parts[6];
        });
    }

    const form = document.getElementById('createOrientationForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            window.location.href = 'onboarding-orientation.php';
        });
    }

    const btnDraft = document.getElementById('btnSaveDraft');
    if (btnDraft) {
        btnDraft.addEventListener('click', function() {
            window.location.href = 'onboarding-orientation.php';
        });
    }
});
