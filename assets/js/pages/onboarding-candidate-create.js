/**
 * Gharuda CRM - Onboarding Candidate Create Page Script
 * File: assets/js/pages/onboarding-candidate-create.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {

    // Auto-fill Permanent Address when "Same as Present address" checkbox is checked
    const sameCheckbox = document.getElementById('sameAsPresent');
    if (sameCheckbox) {
        sameCheckbox.addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('perm_line1').value = document.getElementById('pres_line1').value;
                document.getElementById('perm_line2').value = document.getElementById('pres_line2').value;
                document.getElementById('perm_city').value = document.getElementById('pres_city').value;
                document.getElementById('perm_country').value = document.getElementById('pres_country').value;
                document.getElementById('perm_state').value = document.getElementById('pres_state').value;
                document.getElementById('perm_pincode').value = document.getElementById('pres_pincode').value;
            }
        });
    }

    // Add Dynamic Education Row
    const addEduRowBtn = document.getElementById('addEduRowBtn');
    if (addEduRowBtn) {
        addEduRowBtn.addEventListener('click', function() {
            const tbody = document.querySelector('#educationTable tbody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="text" class="form-control form-control-sm" name="edu_school[]" placeholder="College / University Name"></td>
                <td><input type="text" class="form-control form-control-sm" name="edu_degree[]" placeholder="B.E / B.Tech / M.Sc"></td>
                <td><input type="text" class="form-control form-control-sm" name="edu_field[]" placeholder="Computer Science / Design"></td>
                <td><input type="date" class="form-control form-control-sm" name="edu_date[]"></td>
                <td><textarea class="form-control form-control-sm" name="edu_notes[]" rows="1" placeholder="Additional Notes"></textarea></td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-link text-danger p-0 delete-row-btn"><i class="bi bi-trash fs-6"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Add Dynamic Experience Row
    const addExpRowBtn = document.getElementById('addExpRowBtn');
    if (addExpRowBtn) {
        addExpRowBtn.addEventListener('click', function() {
            const tbody = document.querySelector('#experienceTable tbody');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><input type="text" class="form-control form-control-sm" name="exp_occupation[]" placeholder="Designation"></td>
                <td><input type="text" class="form-control form-control-sm" name="exp_company[]" placeholder="Company Name"></td>
                <td><textarea class="form-control form-control-sm" name="exp_summary[]" rows="1" placeholder="Responsibilities"></textarea></td>
                <td><input type="text" class="form-control form-control-sm" name="exp_duration[]" placeholder="Duration"></td>
                <td>
                    <select class="form-select form-select-sm" name="exp_current[]">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-sm btn-link text-danger p-0 delete-row-btn"><i class="bi bi-trash fs-6"></i></button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Dynamic Row Deletion Delegation
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('.delete-row-btn');
        if (!btn) return;
        const tr = btn.closest('tr');
        if (tr) tr.remove();
    });

    // Form Submit Handler
    const form = document.getElementById('addCandidateForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('New onboarding candidate successfully created and added to the joining pipeline!');
            window.location.href = 'onboarding-list.php';
        });
    }
});
