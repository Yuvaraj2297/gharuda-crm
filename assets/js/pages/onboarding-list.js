/**
 * Gharuda CRM - Onboarding List Page Script
 * File: assets/js/pages/onboarding-list.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
    let currentFilter = 'all';

    // Hook used by tabel.js to filter rows based on external tabs
    window.attendanceRowMatches = function(row) {
        if (!row || !row.getAttribute) return true;
        const code = (row.getAttribute('data-statuscode') || '').toLowerCase();

        if (currentFilter === 'preboarding') return code === 'preboarding';
        if (currentFilter === 'induction') return code === 'induction';
        if (currentFilter === 'completed') return code === 'completed';

        return true;
    };

    // Filter Tabs Handler
    document.querySelectorAll('#onbTabsWrap .ln-stage-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('#onbTabsWrap .ln-stage-tab').forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            currentFilter = this.getAttribute('data-filter');
            if (typeof window.refreshAttendanceTable === 'function') {
                window.refreshAttendanceTable();
            }
        });
    });

    // View Candidate Details Click
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.btn-view-cand-details');
        if (!btn) return;

        const row = btn.closest('tr');
        if (!row) return;

        const fname = row.getAttribute('data-fname') || '';
        const lname = row.getAttribute('data-lname') || '';
        const fullName = `${fname} ${lname}`;
        const email = row.getAttribute('data-email') || '';
        const offemail = row.getAttribute('data-offemail') || '';
        const phone = row.getAttribute('data-phone') || '';
        const dept = row.getAttribute('data-dept') || '';
        const source = row.getAttribute('data-source') || '';
        const pan = row.getAttribute('data-pan') || '-';
        const aadhaar = row.getAttribute('data-aadhaar') || '-';
        const uan = row.getAttribute('data-uan') || '-';

        document.getElementById('candAvatar').innerText = fname ? fname.charAt(0).toUpperCase() : 'C';
        document.getElementById('candNameDisplay').innerText = fullName;
        document.getElementById('candRoleDisplay').innerText = `${dept} • ${source}`;
        document.getElementById('candEmail').innerText = email;
        document.getElementById('candOffEmail').innerText = offemail;
        document.getElementById('candPhone').innerText = phone;
        document.getElementById('candSource').innerText = source;
        document.getElementById('candPan').innerText = pan;
        document.getElementById('candAadhaar').innerText = aadhaar;
        document.getElementById('candUan').innerText = uan;

        const modal = new bootstrap.Modal(document.getElementById('viewCandidateModal'));
        modal.show();
    });

    // Form Submit for Add Candidate
    const addForm = document.getElementById('addCandidateForm');
    if (addForm) {
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const modalInst = bootstrap.Modal.getInstance(document.getElementById('addCandidateModal'));
            if (modalInst) modalInst.hide();
            alert('New candidate successfully added to onboarding pipeline!');
            location.reload();
        });
    }
});
