/**
 * Gharuda CRM - New Employee Page Script
 * File: assets/js/pages/new-employee.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var TOTAL_STEPS = 14;
        var current = 1;

        var tabs = document.querySelectorAll('#neTabs .ne-tab');
        var panels = document.querySelectorAll('.ne-panel');
        var prevBtn = document.getElementById('nePrevBtn');
        var nextBtn = document.getElementById('neNextBtn');
        var submitBtn = document.getElementById('neSubmitBtn');
        var form = document.getElementById('newEmployeeForm');

        function goToStep(target) {
            panels.forEach(function(p) {
                p.classList.toggle('active', +p.dataset.panel === target);
            });
            tabs.forEach(function(t) {
                var n = +t.dataset.step;
                t.classList.toggle('active', n === target);
                t.classList.toggle('completed', n < target);
            });

            prevBtn.disabled = target === 1;
            nextBtn.style.display = target === TOTAL_STEPS ? 'none' : 'inline-flex';
            submitBtn.style.display = target === TOTAL_STEPS ? 'inline-flex' : 'none';

            if (target === TOTAL_STEPS) buildReview();
            current = target;
            document.querySelector('.card-custom').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
        window.goToStep = goToStep;

        tabs.forEach(function(t) {
            t.addEventListener('click', function() {
                var target = +t.dataset.step;
                if (target !== current) goToStep(target);
            });
        });

        nextBtn.addEventListener('click', function() {
            if (current < TOTAL_STEPS) goToStep(current + 1);
        });

        prevBtn.addEventListener('click', function() {
            if (current > 1) goToStep(current - 1);
        });

        // ----- Profile image preview -----
        var photoInput = document.getElementById('nePhotoInput');
        photoInput.addEventListener('change', function() {
            var file = photoInput.files[0];
            var box = photoInput.closest('.ne-upload-box');
            if (!file) return;
            var reader = new FileReader();
            reader.onload = function(e) {
                var existing = box.querySelector('img.ne-preview');
                if (!existing) {
                    existing = document.createElement('img');
                    existing.className = 'ne-preview';
                    box.appendChild(existing);
                }
                existing.src = e.target.result;
                box.classList.add('ne-has-image');
            };
            reader.readAsDataURL(file);
        });

        // ----- Password toggle visibility -----
        function setupPasswordToggle(toggleId, inputId) {
            var toggleBtn = document.getElementById(toggleId);
            var input = document.getElementById(inputId);
            if (!toggleBtn || !input) return;
            toggleBtn.addEventListener('click', function() {
                var icon = toggleBtn.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        }
        setupPasswordToggle('neTogglePassword', 'nePassword');
        setupPasswordToggle('neToggleConfirmPassword', 'neConfirmPassword');

        // ----- Permissions: Select All / Deselect All -----
        function syncPermUi(justChanged) {
            /* selected count + bump animation */
            var countEl = document.getElementById('nePermSelectedCount');
            var chip = countEl ? countEl.closest('.ne-perm-count-chip') : null;
            if (countEl) {
                countEl.textContent = String(document.querySelectorAll('input[name="nePerm"]:checked').length);
            }
            if (chip) {
                chip.classList.remove('bump');
                void chip.offsetWidth; /* restart animation */
                chip.classList.add('bump');
            }
            /* switch ripple restart on the toggle that just changed (only when turning ON) */
            if (justChanged && justChanged.checked) {
                justChanged.classList.remove('ne-just-toggled');
                void justChanged.offsetWidth;
                justChanged.classList.add('ne-just-toggled');
            }
            /* pill highlight (fallback for browsers without :has()) */
            document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                cb.closest('.ne-perm-check').classList.toggle('perm-checked', cb.checked);
            });
            /* per-row select-all pill text + complete-row glow */
            document.querySelectorAll('.ne-perm-row').forEach(function(row) {
                var boxes = row.querySelectorAll('input[name="nePerm"]');
                var btn = row.querySelector('.ne-perm-check-all');
                if (!btn || !boxes.length) return;
                var allChecked = Array.from(boxes).every(function(cb) { return cb.checked; });
                btn.textContent = allChecked ? 'Deselect All' : 'Select All';
                row.classList.toggle('perm-row-complete', allChecked);
            });
        }

        function applyPermSearch() {
            var q = (document.getElementById('nePermSearch').value || '').trim().toLowerCase();
            document.querySelectorAll('.ne-perm-row').forEach(function(row) {
                var name = row.querySelector('.ne-perm-col-feature');
                var match = !q || (name && name.textContent.toLowerCase().indexOf(q) !== -1);
                row.style.display = match ? '' : 'none';
            });
            /* hide group headers with no visible rows */
            document.querySelectorAll('.ne-perm-group-label').forEach(function(label) {
                var visible = false;
                var el = label.nextElementSibling;
                while (el && !el.classList.contains('ne-perm-group-label')) {
                    if (el.classList.contains('ne-perm-row') && el.style.display !== 'none') {
                        visible = true;
                        break;
                    }
                    el = el.nextElementSibling;
                }
                label.style.display = visible ? '' : 'none';
            });
        }

        var permSearch = document.getElementById('nePermSearch');
        if (permSearch) permSearch.addEventListener('input', applyPermSearch);

        /* initial paint: highlight pre-checked pills + count */
        syncPermUi();

        var selectAllPerms = document.getElementById('neSelectAllPerms');
        if (selectAllPerms) {
            selectAllPerms.addEventListener('click', function() {
                document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                    cb.checked = true;
                });
                syncPermUi();
                applyPermSearch();
            });
        }
        var deselectAllPerms = document.getElementById('neDeselectAllPerms');
        if (deselectAllPerms) {
            deselectAllPerms.addEventListener('click', function() {
                document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                    cb.checked = false;
                });
                syncPermUi();
                applyPermSearch();
            });
        }
        document.getElementById('neDeselectAllPerms').addEventListener('click', function() {
            document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                cb.checked = false;
            });
            syncPermUi();
            applyPermSearch();
        });

        /* row stagger index for entrance animation */
        document.querySelectorAll('.ne-perm-row').forEach(function(row, i) {
            row.style.setProperty('--i', i);
        });

        /* pill highlight + live count on every checkbox toggle */
        document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
            cb.addEventListener('change', function() {
                syncPermUi(cb);
            });
        });

        /* ripple CSS hook for the toggle that just changed */
        var neStyle = document.createElement('style');
        neStyle.textContent = '.ne-just-toggled::before { animation: neSwitchRipple .5s ease-out; }';
        document.head.appendChild(neStyle);

        // ----- Per-row Select All -----
        document.querySelectorAll('.ne-perm-check-all').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var row = btn.closest('.ne-perm-row');
                if (!row) return;
                var checkboxes = row.querySelectorAll('input[name="nePerm"]');
                var allChecked = Array.from(checkboxes).every(function(cb) {
                    return cb.checked;
                });
                checkboxes.forEach(function(cb) {
                    cb.checked = !allChecked;
                });
                btn.textContent = allChecked ? 'Select All' : 'Deselect All';
                syncPermUi();
                applyPermSearch();
            });
        });

        // ----- Role-based permission presets -----
        var rolePermissions = {
            'Employee': [
                // HR Management — View(Own) only
                'hr_dashboard_view_own',
                'hr_records_view_own',
                'hr_shift_view_own',
                'hr_loan_view_own',
                'hr_payroll_view_own',
                // Timesheet & Leave — View(Own) only
                'ts_checkin_view_own',
                'ts_att_view_own',
                'ts_leave_view_own',
                'ts_permreq_view_own'
            ],
            'Manager': [
                // CRM
                'leads_view_own', 'leads_view_global', 'leads_create', 'leads_edit',
                'tasks_view_own', 'tasks_view_global', 'tasks_create', 'tasks_edit',
                'projects_view_own', 'projects_view_global', 'projects_create', 'projects_edit',
                'customers_view_own', 'customers_view_global', 'customers_create', 'customers_edit',
                'support_view_own', 'support_view_global', 'support_create', 'support_edit',
                'estimates_view_own', 'estimates_view_global', 'estimates_create', 'estimates_edit',
                'proposals_view_own', 'proposals_view_global', 'proposals_create', 'proposals_edit',
                // HR Management
                'hr_dashboard_view_own', 'hr_dashboard_view_global',
                'hr_org_view_own', 'hr_org_view_global',
                'hr_records_view_own', 'hr_records_view_global',
                'hr_shift_view_own', 'hr_shift_view_global',
                'hr_loan_view_own', 'hr_loan_view_global',
                'hr_payroll_view_own', 'hr_payroll_view_global',
                // Timesheet & Leave
                'ts_checkin_view_own',
                'ts_att_view_own', 'ts_att_view_global',
                'ts_punch_view_own', 'ts_punch_view_global',
                'ts_ot_view_own', 'ts_ot_view_global',
                'ts_leave_view_own', 'ts_leave_view_global',
                'ts_leave_report_view_own', 'ts_leave_report_view_global',
                'ts_permreq_view_own', 'ts_permreq_view_global'
            ],
            'HR Admin': [
                'leads_view_own', 'leads_view_global', 'leads_create', 'leads_edit', 'leads_delete',
                'tasks_view_own', 'tasks_view_global', 'tasks_create', 'tasks_edit', 'tasks_delete',
                'projects_view_own', 'projects_view_global', 'projects_create', 'projects_edit', 'projects_delete',
                'customers_view_own', 'customers_view_global', 'customers_create', 'customers_edit', 'customers_delete',
                'support_view_own', 'support_view_global', 'support_create', 'support_edit', 'support_delete',
                'estimates_view_own', 'estimates_view_global', 'estimates_create', 'estimates_edit', 'estimates_delete',
                'proposals_view_own', 'proposals_view_global', 'proposals_create', 'proposals_edit', 'proposals_delete',
                'contracts_view_own', 'contracts_view_global', 'contracts_create', 'contracts_edit', 'contracts_delete',
                'invoices_view_own', 'invoices_view_global', 'invoices_create', 'invoices_edit', 'invoices_delete',
                'payments_view_own', 'payments_view_global', 'payments_create', 'payments_edit',
                'credit_notes_view_own', 'credit_notes_view_global', 'credit_notes_create', 'credit_notes_edit', 'credit_notes_delete',
                'expenses_view_own', 'expenses_view_global', 'expenses_create', 'expenses_edit', 'expenses_delete',
                'items_view_global', 'items_create', 'items_edit', 'items_delete',
                'subs_view_own', 'subs_view_global', 'subs_create', 'subs_edit', 'subs_delete',
                'staff_view_global', 'staff_create', 'staff_edit', 'staff_delete',
                'staff_roles_view_global', 'staff_roles_create', 'staff_roles_edit', 'staff_roles_delete',
                'hr_dashboard_view_own', 'hr_dashboard_view_global', 'hr_org_view_own', 'hr_org_view_global', 'hr_org_create', 'hr_org_edit', 'hr_org_delete',
                'hr_records_view_own', 'hr_records_view_global', 'hr_records_create', 'hr_records_edit', 'hr_records_delete',
                'hr_shift_view_own', 'hr_shift_view_global', 'hr_shift_create', 'hr_shift_edit', 'hr_shift_delete',
                'hr_loan_view_own', 'hr_loan_view_global', 'hr_loan_create', 'hr_loan_edit', 'hr_loan_delete',
                'hr_payroll_view_own', 'hr_payroll_view_global', 'hr_payroll_create', 'hr_payroll_edit', 'hr_payroll_delete',
                'hr_settings_view_global', 'hr_settings_create', 'hr_settings_edit', 'hr_settings_delete',
                'recruit_view_global', 'recruit_create', 'recruit_edit', 'recruit_delete',
                'hr_onboard_view_own', 'hr_onboard_view_global', 'hr_onboard_create', 'hr_onboard_edit', 'hr_onboard_delete',
                'hr_perf_view_own', 'hr_perf_view_global', 'hr_perf_create', 'hr_perf_edit', 'hr_perf_delete',
                'ts_checkin_view_own', 'ts_att_view_own', 'ts_att_view_global', 'ts_leave_view_own', 'ts_leave_view_global',
                'ts_leave_report_view_own', 'ts_leave_report_view_global', 'ts_permreq_view_own', 'ts_permreq_view_global',
                'ts_att_create', 'ts_att_edit', 'ts_att_delete',
                'ts_punch_view_own', 'ts_punch_view_global', 'ts_punch_create', 'ts_punch_edit', 'ts_punch_delete',
                'ts_ot_view_own', 'ts_ot_view_global', 'ts_ot_create', 'ts_ot_edit', 'ts_ot_delete',
                'ts_leave_create', 'ts_leave_edit', 'ts_leave_delete',
                'ts_permreq_create', 'ts_permreq_edit', 'ts_permreq_delete',
                'reports_view_global', 'reports_view_own', 'proj_report_view_own', 'proj_report_view_global', 'scorecard_view_own', 'scorecard_view_global',
                'po_view_own', 'po_view_global', 'po_create', 'po_edit', 'po_delete',
                'pi_view_own', 'pi_view_global', 'pi_create', 'pi_edit', 'pi_delete',
                'pq_view_own', 'pq_view_global', 'pq_create', 'pq_edit', 'pq_delete',
                'preq_view_own', 'preq_view_global', 'preq_create', 'preq_edit', 'preq_delete',
                'webhooks_view_global', 'webhooks_create', 'webhooks_edit', 'webhooks_delete'
            ],
            'Finance': [
                'invoices_view_own', 'invoices_view_global', 'invoices_create', 'invoices_edit', 'invoices_delete',
                'payments_view_own', 'payments_view_global', 'payments_create', 'payments_edit', 'payments_delete',
                'credit_notes_view_own', 'credit_notes_view_global', 'credit_notes_create', 'credit_notes_edit', 'credit_notes_delete',
                'expenses_view_own', 'expenses_view_global', 'expenses_create', 'expenses_edit', 'expenses_delete',
                'estimates_view_own', 'estimates_view_global', 'estimates_create', 'estimates_edit', 'estimates_delete',
                'proposals_view_own', 'proposals_view_global', 'proposals_create', 'proposals_edit', 'proposals_delete',
                'contracts_view_own', 'contracts_view_global', 'contracts_create', 'contracts_edit', 'contracts_delete',
                'target_view_own', 'target_view_global', 'target_create', 'target_edit', 'target_delete',
                'subs_view_own', 'subs_view_global', 'subs_create', 'subs_edit', 'subs_delete',
                'items_view_global', 'items_create', 'items_edit', 'items_delete',
                'acct_dashboard_view', 'acct_banking_view', 'acct_banking_create', 'acct_banking_edit', 'acct_banking_delete',
                'acct_trans_view', 'acct_trans_create', 'acct_trans_edit', 'acct_trans_delete',
                'acct_bills_view', 'acct_bills_create',
                'acct_vendors_view', 'acct_vendors_create', 'acct_vendors_edit', 'acct_vendors_delete',
                'acct_reports_view',
                'inv_items_view_global', 'inv_items_create', 'inv_items_edit', 'inv_items_delete',
                'inv_warehouse_view_global', 'inv_warehouse_create', 'inv_warehouse_edit', 'inv_warehouse_delete',
                'inv_reports_view_global',
                'po_view_own', 'po_view_global', 'po_create', 'po_edit', 'po_delete',
                'pi_view_own', 'pi_view_global', 'pi_create', 'pi_edit', 'pi_delete',
                'pq_view_own', 'pq_view_global', 'pq_create', 'pq_edit', 'pq_delete',
                'preq_view_own', 'preq_view_global', 'preq_create', 'preq_edit', 'preq_delete',
                'reports_view_global', 'reports_view_own',
                'hr_records_view_own', 'hr_records_view_global',
                'hr_payroll_view_own', 'hr_payroll_view_global',
                'hr_loan_view_own', 'hr_loan_view_global',
                // Timesheet & Leave — own access
                'ts_checkin_view_own', 'ts_att_view_own', 'ts_leave_view_own', 'ts_permreq_view_own'
            ],
            'Admin': []
        };

        // Admin = all permissions
        rolePermissions['Admin'] = Array.from(document.querySelectorAll('input[name="nePerm"]')).map(function(cb) {
            return cb.value;
        });

        var roleSelect = document.getElementById('neRole');
        var roleDescriptions = {
            'Employee': 'Basic access: View own dashboard, records, shifts, loans, payroll & attendance',
            'Manager': 'Team access: View/edit team projects, leads, reports & approvals',
            'HR Admin': 'Full HR: Manage staff, records, contracts, recruitment & all modules',
            'Finance': 'Finance focus: Invoices, payments, expenses, accounting & reports',
            'Admin': 'Full access: All modules, all capabilities, system settings'
        };

        function applyRolePermissions(role) {
            var perms = rolePermissions[role] || [];

            document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                cb.checked = perms.indexOf(cb.value) !== -1;
            });
            syncPermUi();

            // Update role badge
            var badge = document.getElementById('neRoleDesc');
            var badgeText = document.getElementById('neRoleDescText');
            badge.className = 'ne-role-badge';
            if (role === 'Manager') badge.classList.add('manager');
            else if (role === 'HR Admin') badge.classList.add('hr');
            else if (role === 'Finance') badge.classList.add('finance');
            else if (role === 'Admin') badge.classList.add('admin');
            badgeText.textContent = roleDescriptions[role] || '';
        }

        if (roleSelect) {
            // Native change event (fallback)
            roleSelect.addEventListener('change', function() {
                applyRolePermissions(roleSelect.value);
            });

            // Apply the default role preset on first load
            applyRolePermissions(roleSelect.value);

            // Select2 event (primary - select2 wraps the native select)
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $(roleSelect).on('select2:select', function(e) {
                    applyRolePermissions(e.params.data.id);
                });
                $(roleSelect).on('select2:unselect', function(e) {
                    applyRolePermissions('');
                });
            }
        }

        // ----- Password strength indicator -----
        var nePassword = document.getElementById('nePassword');
        var strengthBar = document.getElementById('nePasswordStrength');
        if (nePassword && strengthBar) {
            nePassword.addEventListener('input', function() {
                var val = nePassword.value;
                var strength = 0;
                if (val.length >= 8) strength++;
                if (val.length >= 12) strength++;
                if (/[A-Z]/.test(val)) strength++;
                if (/[0-9]/.test(val)) strength++;
                if (/[^A-Za-z0-9]/.test(val)) strength++;
                strengthBar.style.width = (strength * 20) + '%';
                if (strength <= 1) {
                    strengthBar.style.background = '#e5484d';
                } else if (strength <= 3) {
                    strengthBar.style.background = '#f5a623';
                } else {
                    strengthBar.style.background = '#0ca308';
                }
            });
        }

        // ----- Age auto-calculation from Birthday -----
        var birthdayInput = document.getElementById('neBirthday');
        var ageInput = document.getElementById('neAge');

        function calcAge() {
            var val = (birthdayInput.value || '').trim();
            if (!val) {
                ageInput.value = '';
                return;
            }
            var parsed = null;
            if (typeof moment !== 'undefined') {
                parsed = moment(val, ['DD/MM/YYYY', 'YYYY-MM-DD'], false);
                if (!parsed.isValid()) parsed = null;
            }
            if (!parsed) {
                var parts = val.split(/[-\/]/);
                if (parts.length === 3) {
                    // dd/mm/yyyy or yyyy-mm-dd
                    var d = parts[0].length === 4 ? parts : [parts[2], parts[1], parts[0]];
                    parsed = {
                        year: function() {
                            return parseInt(d[2], 10);
                        },
                        month: function() {
                            return parseInt(d[1], 10) - 1;
                        },
                        date: function() {
                            return parseInt(d[0], 10);
                        }
                    };
                    var by = parsed.year(),
                        bm = parsed.month(),
                        bd = parsed.date();
                    var now = new Date();
                    var age = now.getFullYear() - by;
                    var m = now.getMonth() - bm;
                    if (m < 0 || (m === 0 && now.getDate() < bd)) age--;
                    ageInput.value = age >= 0 && age < 150 ? age : '';
                    return;
                }
                ageInput.value = '';
                return;
            }
            ageInput.value = Math.floor(moment().diff(parsed, 'years', true));
        }
        birthdayInput.addEventListener('change', calcAge);
        birthdayInput.addEventListener('blur', calcAge);

        // ----- Welcome kit: Add More / Remove -----
        var wkAddMore = document.getElementById('neWkAddMore');
        var wkRows = document.getElementById('neWkRows');
        wkAddMore.addEventListener('click', function() {
            var first = wkRows.querySelector('.wk-row');
            if (!first) return;
            var clone = first.cloneNode(true);
            clone.querySelectorAll('select').forEach(function(sel) {
                sel.selectedIndex = 0;
                sel.removeAttribute('data-select2-id');
                sel.removeAttribute('aria-hidden');
                sel.style.display = '';
                var sib = sel.nextElementSibling;
                while (sib) {
                    var next = sib.nextElementSibling;
                    if (sib.classList && sib.classList.contains('select2-container')) sib.remove();
                    sib = next;
                }
                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $(sel).removeData('select2');
                    $(sel).select2({
                        width: '100%'
                    });
                }
            });
            clone.querySelectorAll('input').forEach(function(inp) {
                inp.value = '';
            });
            var rm = clone.querySelector('.wk-remove');
            if (rm) {
                rm.style.display = '';
                rm.addEventListener('click', function() {
                    clone.remove();
                });
            }
            wkRows.appendChild(clone);
        });

        // ----- Review builder -----
        function fieldVal(id, defaultVal) {
            var el = document.getElementById(id);
            if (!el) return defaultVal || '';
            var v = el.value ? el.value.trim() : '';
            if (el.tagName === 'SELECT' && (!v || v === 'Non selected' || v === 'Nothing selected' || v.toLowerCase().indexOf('select') !== -1)) {
                return defaultVal || '';
            }
            return v || (defaultVal || '');
        }

        function row(label, value) {
            return '<div class="ne-review-item"><div class="k">' + label + '</div><div class="v">' + (value || '—') + '</div></div>';
        }

        function rowById(label, id, defaultVal) {
            return row(label, fieldVal(id, defaultVal));
        }

        function buildReview() {
            // Tab 1: Profile - Personal Details
            var elPersonal = document.getElementById('neReviewPersonal');
            if (elPersonal) {
                elPersonal.innerHTML =
                    rowById('Employee Code', 'neEmployeeCode', 'GH-EMP-0421') +
                    rowById('First Name', 'neFirstName', 'Arun') +
                    rowById('Last Name', 'neLastName', 'Kumar') +
                    rowById('Gender', 'neGender', 'Male') +
                    rowById('Birthday', 'neBirthday', '14-06-1996') +
                    rowById('Age', 'neAge', '29') +
                    rowById('Birthplace', 'neBirthplace', 'Chennai') +
                    rowById('Present address', 'nePresentAddress', '12, Anna Nagar Main Road, Chennai - 600040') +
                    rowById('Home town', 'neHomeTown', 'Coimbatore') +
                    rowById('Nation', 'neNation', 'Indian') +
                    rowById('Religion', 'neReligion', 'Hindu') +
                    rowById('ID Document Type', 'neIdDocType', 'Aadhaar Card') +
                    rowById('Permanent Address', 'nePermanentAddress', '5/B, Gandhi Street, RS Puram, Coimbatore - 641002') +
                    rowById('Blood Group', 'neBloodGroup', 'O+') +
                    rowById('Latitude', 'neLatitude', '13.0827') +
                    rowById('Longitude', 'neLongitude', '80.2707') +
                    rowById('Other information', 'neOtherInfo', 'Comfortable in English & Tamil communication. Enjoys sports.');
            }

            // Tab 1: Emergency Contact
            var elEmergency = document.getElementById('neReviewEmergency');
            if (elEmergency) {
                elEmergency.innerHTML =
                    rowById('Emergency Contact Name', 'neEmergencyName', 'Suresh Kumar') +
                    rowById('Emergency Contact Number', 'neEmergencyPhone', '+91 98765 43210') +
                    rowById('Emergency Contact Blood Group', 'neEmergencyBloodGroup', 'B+') +
                    rowById('Type of Relationship', 'neEmergencyRelation', 'Father');
            }

            // Tab 1: Job Details
            var elJob = document.getElementById('neReviewJob');
            if (elJob) {
                elJob.innerHTML =
                    rowById('Date of Joining', 'neDoj', '01-09-2026') +
                    rowById('Experience', 'neExperience', '3 - 5 Years') +
                    rowById('Role', 'neRole', 'Employee') +
                    rowById('Job Type', 'neJobType', 'Work from Office') +
                    rowById('Department', 'neDepartment', 'Tech Support') +
                    rowById('Designation', 'neDesignation', 'Senior Tech Specialist') +
                    rowById('Phone', 'nePhone', '+91 91234 56780') +
                    rowById('Official Email', 'neOfficialEmail', 'arun.kumar@gharuda.com') +
                    rowById('Personal Email', 'nePersonalEmail', 'arun.kumar@gmail.com') +
                    rowById('Branch', 'neBranch', 'Chennai Head Office') +
                    rowById('Reporting To', 'neReportingTo', 'Victoria Celestie') +
                    rowById('Status', 'neStatus', 'Active') +
                    rowById('Employee Type', 'neEmployeeType', 'Permanent') +
                    row('Week Off', (window.neGetWeekOffText && window.neGetWeekOffText() ? window.neGetWeekOffText() : fieldVal('neWeekOff', 'Sunday')));
            }

            // Tab 1: Account Password
            var elPassword = document.getElementById('neReviewPassword');
            if (elPassword) {
                var pwEl = document.getElementById('nePassword');
                var pwVal = pwEl ? pwEl.value : '';
                elPassword.innerHTML =
                    row('Login Username', fieldVal('neOfficialEmail', 'arun.kumar@gharuda.com')) +
                    row('Account Password', pwVal ? '••••••••' : '•••••••• (Configured)') +
                    row('Password Status', '✓ Verified & Encrypted');
            }

            // Tab 2: Family Details
            var elFamily = document.getElementById('neReviewFamily');
            if (elFamily) {
                elFamily.innerHTML =
                    rowById('Father Name', 'neFatherName', 'Suresh Kumar') +
                    rowById('Mother Name', 'neMotherName', 'Lakshmi Suresh') +
                    rowById('Contact Number', 'neFamilyContactNumber', '+91 98401 23456') +
                    rowById('Father Occupation', 'neFatherOccupation', 'Govt Employee (Retd)') +
                    rowById('Mother Occupation', 'neMotherOccupation', 'Home Maker') +
                    rowById('Mention If Others (Name)', 'neOtherFamilyName', 'Kavitha S') +
                    rowById('Relationship', 'neFamilyRelationship', 'Sister') +
                    rowById('Marital Status', 'neMaritalStatus', 'Married') +
                    rowById('Spouse Name', 'neSpouseName', 'Priyanka Arun') +
                    row('Children Details', '1. Aarav Kumar (Son - 4 Yrs), 2. Ananya Kumar (Daughter - 1 Yr)');
            }

            // Tab 3: Educational Details
            var elEducation = document.getElementById('neReviewEducation');
            if (elEducation) {
                var inst = document.querySelector('input[name="education[0][institution_name]"]');
                var qual = document.querySelector('input[name="education[0][qualification]"]');
                var fld = document.querySelector('input[name="education[0][field_of_study]"]');
                var fromD = document.querySelector('input[name="education[0][from_date]"]');
                var toD = document.querySelector('input[name="education[0][to_date]"]');
                var pct = document.querySelector('input[name="education[0][percentage_cgpa]"]');

                elEducation.innerHTML =
                    row('Highest Qualification', (qual && qual.value) ? qual.value : 'B.E. Computer Science & Engineering') +
                    row('Institution Name', (inst && inst.value) ? inst.value : 'Anna University, Guindy Campus, Chennai') +
                    row('Field of Study', (fld && fld.value) ? fld.value : 'Computer Science & Engineering') +
                    row('Study Period', ((fromD && fromD.value) ? fromD.value : '01-08-2014') + ' to ' + ((toD && toD.value) ? toD.value : '15-05-2018')) +
                    row('Percentage / CGPA', (pct && pct.value) ? pct.value : '8.45 CGPA (First Class with Distinction)') +
                    row('Secondary Education (HSC)', 'St. Joseph Higher Secondary School — 93.5% (2014)');
            }

            // Tab 4: Work Experience Details
            var elExperience = document.getElementById('neReviewExperience');
            if (elExperience) {
                var comp = document.querySelector('input[name="experience[0][company_name]"]');
                var jtitle = document.querySelector('input[name="experience[0][job_title]"]');
                var desig = document.querySelector('input[name="experience[0][designation]"]');
                var expFrom = document.querySelector('input[name="experience[0][from_date]"]');
                var expTo = document.querySelector('input[name="experience[0][to_date]"]');

                elExperience.innerHTML =
                    row('Most Recent Company', (comp && comp.value) ? comp.value : 'Tata Consultancy Services (TCS), Siruseri Chennai') +
                    row('Job Title', (jtitle && jtitle.value) ? jtitle.value : 'Senior Software Engineer') +
                    row('Designation', (desig && desig.value) ? desig.value : 'Module Lead - Web Applications') +
                    row('Period of Employment', ((expFrom && expFrom.value) ? expFrom.value : '01-07-2018') + ' to ' + ((expTo && expTo.value) ? expTo.value : '31-08-2022')) +
                    row('Previous Employer', 'Infosys Limited — Systems Engineer (01-09-2022 to 15-08-2026)') +
                    row('Total Verified Experience', fieldVal('neExperience', '8 Years 1 Month'));
            }

            // Tab 5: Bank Account Details
            var elBank = document.getElementById('neReviewBank');
            if (elBank) {
                var bType = document.querySelector('input[name="bank_accounts[0][account_type]"]');
                var bName = document.querySelector('input[name="bank_accounts[0][bank_name]"]');
                var bNum = document.querySelector('input[name="bank_accounts[0][account_number]"]');
                var bIfsc = document.querySelector('input[name="bank_accounts[0][ifsc_code]"]');
                var bBranch = document.querySelector('input[name="bank_accounts[0][branch_name]"]');
                var bUpi = document.querySelector('input[name="bank_accounts[0][upi_id]"]');

                elBank.innerHTML =
                    row('Account Type', (bType && bType.value) ? bType.value : 'Savings Account') +
                    row('Bank Name', (bName && bName.value) ? bName.value : 'HDFC Bank Ltd') +
                    row('Account Number', (bNum && bNum.value) ? bNum.value : '50100438291045') +
                    row('Account Status', '✓ Verified & Confirmed') +
                    row('IFSC Code', (bIfsc && bIfsc.value) ? bIfsc.value : 'HDFC0001234') +
                    row('Branch Name', (bBranch && bBranch.value) ? bBranch.value : 'Anna Nagar Branch, Chennai') +
                    row('UPI ID', (bUpi && bUpi.value) ? bUpi.value : 'arun.kumar@okhdfcbank');
            }

            // Tab 6: KYC Documents
            var elKyc = document.getElementById('neReviewKyc');
            if (elKyc) {
                var kycDocs = [];
                document.querySelectorAll('.ne-kyc-row').forEach(function(r) {
                    var docNameEl = r.querySelector('.ne-kyc-doc-name');
                    var docName = docNameEl ? docNameEl.textContent.trim() : 'Document';
                    var status = r.querySelector('.ne-kyc-file-status');
                    var uploaded = status && status.classList.contains('uploaded');
                    kycDocs.push(row(docName, uploaded ? '✓ Uploaded & Verified' : '✓ Verified (Pre-check Active)'));
                });
                if (!kycDocs.length) {
                    kycDocs = [
                        row('Aadhaar Card', '✓ Uploaded (aadhaar_front_back.pdf) — Verified'),
                        row('PAN Card', '✓ Uploaded (pan_card_doc.pdf) — Verified'),
                        row('Passport', '✓ Uploaded (passport_copy.pdf)'),
                        row('Driving License', '✓ Uploaded (driving_license.jpg)'),
                        row('Voter ID', '✓ Uploaded (voter_id_card.pdf)'),
                        row('Bank Passbook / Cheque', '✓ Uploaded (cancelled_cheque.pdf)'),
                        row('Degree Certificate', '✓ Uploaded (degree_convocation.pdf)')
                    ];
                }
                elKyc.innerHTML = kycDocs.join('');
            }

            // Tab 7: Relieving Request
            var elRelieving = document.getElementById('neReviewRelieving');
            if (elRelieving) {
                elRelieving.innerHTML =
                    row('Employee Name', fieldVal('neFirstName', 'Arun') + ' ' + fieldVal('neLastName', 'Kumar') + ' (' + fieldVal('neEmployeeCode', 'GH-EMP-0421') + ')') +
                    rowById('Relieving Type', 'neRelType', 'Resignation') +
                    rowById('Resignation Date', 'neRelResignDate', '15-09-2026') +
                    rowById('Proposed Last Working Date', 'neRelLastDay', '15-11-2026') +
                    rowById('Notice Period', 'neRelNoticePeriod', '60 Days') +
                    rowById('Reason for Leaving', 'neRelReason', 'Career Growth & Higher Studies') +
                    rowById('Handover Status', 'neRelNotes', 'Knowledge Transfer document ready for Team Lead');
            }

            // Tab 8: CTC Report / Salary
            var elSalary = document.getElementById('neReviewSalary');
            if (elSalary) {
                var ctcVal = fieldVal('neCtc', '6,00,000');
                elSalary.innerHTML =
                    row('Annual CTC Total', '₹' + ctcVal) +
                    row('Monthly Gross Salary', '₹50,000 / month') +
                    row('Basic Salary (40%)', '₹20,000 / month (₹2,40,000 / yr)') +
                    row('House Rent Allowance (HRA)', '₹8,000 / month (₹96,000 / yr)') +
                    row('Conveyance Allowance', '₹1,600 / month (₹19,200 / yr)') +
                    row('Medical Allowance', '₹1,250 / month (₹15,000 / yr)') +
                    row('Special Allowance', '₹14,150 / month (₹1,69,800 / yr)') +
                    row('Total Monthly Deductions', '₹4,800 (PF, PT & Tax)') +
                    row('Net Monthly Take-Home', '₹45,200 / month');
            }

            // Tab 10: Reporting To Flow
            var elRpt = document.getElementById('neReviewReportingTo');
            if (elRpt) {
                var rpt1 = document.querySelector('.ne-rptto-select[data-level="1"]');
                var rpt1Val = (rpt1 && rpt1.value && rpt1.value !== 'Non selected') ? rpt1.value : 'Victoria Celestie';
                elRpt.innerHTML =
                    row('1st Level Approval', rpt1Val + ' (Technical Team Lead)') +
                    row('2nd Level Approval', 'Madison Andrew (Engineering Manager)') +
                    row('3rd Level Approval / HoD', 'Ryan Christopher (VP of Engineering)') +
                    row('Escalation Window', '24 Hours response SLA');
            }

            // Tab 11: Leave Approval Hierarchy
            var elLeaveApp = document.getElementById('neReviewLeaveApproval');
            if (elLeaveApp) {
                var lApp1 = document.querySelector('.ne-approval-select[data-level="1"]');
                var lFollow = document.getElementById('neApprovalFollower');
                var lApp1Val = (lApp1 && lApp1.value && lApp1.value !== 'Non selected') ? lApp1.value : 'Victoria Celestie';
                var lFollowVal = (lFollow && lFollow.value && lFollow.value !== 'None') ? lFollow.value : 'Emily Lauren';
                elLeaveApp.innerHTML =
                    row('1st Level Leave Approval', lApp1Val + ' (Team Lead)') +
                    row('2nd Level Leave Approval', 'Madison Andrew (Department Manager)') +
                    row('Follower (CC / Notification)', lFollowVal + ' (HR Operations)') +
                    row('Auto-Approval Escalation', 'Auto-escalates after 48 hours without action');
            }

            // Tab 12: OT Approval Hierarchy
            var elOtApp = document.getElementById('neReviewOtApproval');
            if (elOtApp) {
                var ot1 = document.querySelector('.ne-otapp-select[data-level="1"]');
                var ot1Val = (ot1 && ot1.value && ot1.value !== 'Non selected') ? ot1.value : 'Ryan Christopher';
                elOtApp.innerHTML =
                    row('1st Level OT Approval', ot1Val + ' (Project Manager)') +
                    row('2nd Level OT Approval', 'Victoria Celestie (Operations Lead)') +
                    row('Minimum OT Threshold', '1 Hour (Rounded to 30 mins interval)') +
                    row('OT Compensation Rate', '1.5x Standard Hourly Rate');
            }

            // Tab 13: Leave Auto-Update Rules
            var elLeaveRules = document.getElementById('neReviewLeaveRules');
            if (elLeaveRules) {
                elLeaveRules.innerHTML =
                    row('Casual Leave (CL)', 'Trainee: [✓] | Probation: [✓] | Confirmation: [✓] — 12 Days / Year') +
                    row('Sick Leave (SL)', 'Trainee: [✓] | Probation: [✓] | Confirmation: [✓] — 10 Days / Year') +
                    row('Earned Leave (EL)', 'Trainee: [—] | Probation: [✓] | Confirmation: [✓] — 15 Days / Year') +
                    row('Maternity Leave (ML)', 'Trainee: [—] | Probation: [✓] | Confirmation: [✓] — 90 Days') +
                    row('Paternity Leave (PL)', 'Trainee: [—] | Probation: [✓] | Confirmation: [✓] — 15 Days');
            }
        }
        buildReview();


        // ----- KYC Document upload handling -----

        var kycProgress = document.getElementById('neKycProgress');
        var kycProgressBar = document.getElementById('neKycProgressBar');
        var kycBody = document.getElementById('neKycBody');
        var addCustomKycBtn = document.getElementById('neAddCustomKyc');

        var mandatoryDocs =
            document.querySelectorAll(
                '.ne-kyc-row[data-mandatory="yes"]'
            ).length;


        // ----- Update KYC Progress -----

        function updateKycProgress() {

            var uploaded =
                document.querySelectorAll(
                    '.ne-kyc-row[data-mandatory="yes"] .ne-kyc-file-status.uploaded'
                ).length;

            kycProgress.textContent =
                uploaded + ' / ' + mandatoryDocs + ' uploaded';

            var percentage =
                mandatoryDocs > 0 ?
                (uploaded / mandatoryDocs * 100) :
                0;

            kycProgressBar.style.width = percentage + '%';
        }


        // ----- Existing + Custom File Upload -----

        kycBody.addEventListener('change', function(e) {

            if (!e.target.classList.contains('ne-kyc-file')) {
                return;
            }

            var input = e.target;
            var row = input.closest('.ne-kyc-row');

            if (!row) {
                return;
            }

            var fileName =
                row.querySelector('.ne-kyc-file-name');

            var fileStatus =
                row.querySelector('.ne-kyc-file-status');

            var removeBtn =
                row.querySelector('.ne-kyc-remove');


            if (input.files && input.files[0]) {

                var file = input.files[0];

                fileName.textContent = file.name;

                fileStatus.textContent = file.name;

                fileStatus.classList.add('uploaded');

                if (removeBtn) {
                    removeBtn.style.display = 'inline-block';
                }

                updateKycProgress();
            }

        });


        // ----- Existing File Remove -----

        kycBody.addEventListener('click', function(e) {

            var removeBtn =
                e.target.closest('.ne-kyc-remove');

            if (!removeBtn) {
                return;
            }

            var row =
                removeBtn.closest('.ne-kyc-row');

            if (!row) {
                return;
            }


            // Custom row
            if (row.classList.contains('ne-custom-kyc-row')) {

                row.remove();

                return;
            }


            // Normal KYC row
            var input =
                row.querySelector('.ne-kyc-file');

            var fileName =
                row.querySelector('.ne-kyc-file-name');

            var fileStatus =
                row.querySelector('.ne-kyc-file-status');


            if (input) {
                input.value = '';
            }

            if (fileName) {
                fileName.textContent = 'No file chosen';
            }

            if (fileStatus) {
                fileStatus.textContent = 'No file';
                fileStatus.classList.remove('uploaded');
            }

            removeBtn.style.display = 'none';

            updateKycProgress();

        });


        // ----- Add Custom KYC Document -----

        addCustomKycBtn.addEventListener('click', function() {

            var row = document.createElement('tr');

            row.className = 'ne-kyc-row ne-custom-kyc-row';

            row.setAttribute('data-doc', 'custom');
            row.setAttribute('data-mandatory', 'no');


            row.innerHTML = `

        <!-- Document Name -->
        <td>

            <input type="text"
                class="form-control ne-custom-doc-name"
                name="custom_kyc_document[]"
                placeholder="Enter document name">
        </td>


        <!-- Upload Field -->
        <td>

            <label class="ne-kyc-upload-btn">

                <i class="bi bi-cloud-arrow-up"></i>
                Choose File

                <input type="file"
                    class="ne-kyc-file"
                    name="custom_kyc_file[]"
                    accept=".pdf,.jpg,.jpeg,.png"
                    hidden>

            </label>

            <span class="ne-kyc-file-name">
                No file chosen
            </span>

        </td>


        <!-- Mandatory -->
        <td style="text-align:center;">

            <span class="ne-kyc-badge no">
                No
            </span>

        </td>


        <!-- File View -->
        <td>

            <span class="ne-kyc-file-status">
                No file
            </span>

        </td>


        <!-- Actions -->
        <td style="text-align:center;">

            <button type="button"
                class="ne-kyc-remove"
                title="Delete">

                <i class="bi bi-trash"></i>

            </button>

        </td>

    `;


            kycBody.appendChild(row);

        });


        // ----- Password match indicator -----
        var neConfirmPw = document.getElementById('neConfirmPassword');
        var nePwMatch = document.getElementById('nePasswordMatch');
        if (neConfirmPw && nePwMatch) {
            neConfirmPw.addEventListener('input', function() {
                var pw = document.getElementById('nePassword').value;
                var cpw = neConfirmPw.value;
                if (!cpw) {
                    nePwMatch.textContent = '';
                    neConfirmPw.style.borderColor = '';
                } else if (pw === cpw) {
                    nePwMatch.textContent = 'Passwords match';
                    nePwMatch.style.color = '#0ca308';
                    neConfirmPw.style.borderColor = '#0ca308';
                } else {
                    nePwMatch.textContent = 'Passwords do not match';
                    nePwMatch.style.color = '#e5484d';
                    neConfirmPw.style.borderColor = '#e5484d';
                }
            });
        }

        // ----- Final submit -----
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var pw = document.getElementById('nePassword').value;
            var cpw = document.getElementById('neConfirmPassword').value;

            if (!pw || pw.length < 8) {
                alert('Password must be at least 8 characters long.');
                document.getElementById('nePassword').focus();
                return;
            }

            if (pw !== cpw) {
                alert('Passwords do not match. Please re-enter.');
                document.getElementById('neConfirmPassword').focus();
                return;
            }

            if (!document.getElementById('neConfirmAccuracy').checked) {
                alert('Please confirm the details are accurate before submitting.');
                return;
            }

            // TODO: replace with real AJAX call to your backend
            // e.g. fetch('save-new-employee.php', { method: 'POST', body: new FormData(form) })

            alert('Employee created successfully!');
            window.location.href = 'employees-report.php';
        });

        goToStep(1);
    });

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function() {

        const educationContainer =
            document.getElementById("neEducationContainer");

        const addEducationBtn =
            document.getElementById("neAddEducation");

        let educationIndex = 1;

        // Add Education
        addEducationBtn.addEventListener("click", function() {

            const firstEducation =
                educationContainer.querySelector(".ne-education-item");

            const newEducation =
                firstEducation.cloneNode(true);

            // Clear input values
            newEducation.querySelectorAll("input").forEach(function(input) {

                input.value = "";

                // Update name index
                if (input.name) {
                    input.name = input.name.replace(
                        /education\[\d+\]/,
                        "education[" + educationIndex + "]"
                    );
                }
            });

            // Show delete button for duplicated education
            const deleteWrapper =
                newEducation.querySelector(".education-delete-wrapper");

            deleteWrapper.classList.remove("d-none");

            // Reset the cloned date-picker(s) and re-initialise them so the
            // duplicated row gets a fresh, working calendar
            newEducation.querySelectorAll(".date-picker").forEach(function (dp) {
                dp.querySelectorAll(".calendar-dropdown, .calendar-icon").forEach(function (el) {
                    el.remove();
                });
                delete dp.dataset.dpReady;
            });
            if (typeof window.initDatePickers === "function") {
                window.initDatePickers(newEducation);
            }

            educationContainer.appendChild(newEducation);

            educationIndex++;
        });


        // Delete Education
        educationContainer.addEventListener("click", function(e) {

            if (e.target.classList.contains("neDeleteEducation")) {

                const educationItem =
                    e.target.closest(".ne-education-item");

                educationItem.remove();
            }

        });

    });

/* ==========================================================================
   Script Block 3
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function() {

        const experienceContainer =
            document.getElementById("neExperienceContainer");

        const addExperienceBtn =
            document.getElementById("neAddExperience");

        let experienceIndex = 1;


        // Add Experience
        addExperienceBtn.addEventListener("click", function() {

            const firstExperience =
                experienceContainer.querySelector(".ne-experience-item");

            const newExperience =
                firstExperience.cloneNode(true);


            // Clear all input values
            newExperience.querySelectorAll("input").forEach(function(input) {

                input.value = "";

                // Update name index
                if (input.name) {
                    input.name = input.name.replace(
                        /experience\[\d+\]/,
                        "experience[" + experienceIndex + "]"
                    );
                }

            });


            // Show delete button
            const deleteWrapper =
                newExperience.querySelector(
                    ".experience-delete-wrapper"
                );

            deleteWrapper.classList.remove("d-none");


            // Reset the cloned date-picker(s) and re-initialise them so the
            // duplicated row gets a fresh, working calendar
            newExperience.querySelectorAll(".date-picker").forEach(function (dp) {
                dp.querySelectorAll(".calendar-dropdown, .calendar-icon").forEach(function (el) {
                    el.remove();
                });
                delete dp.dataset.dpReady;
            });
            if (typeof window.initDatePickers === "function") {
                window.initDatePickers(newExperience);
            }


            // Append new experience
            experienceContainer.appendChild(newExperience);


            experienceIndex++;

        });


        // Delete Experience
        experienceContainer.addEventListener("click", function(e) {

            if (e.target.classList.contains("neDeleteExperience")) {

                const experienceItem =
                    e.target.closest(".ne-experience-item");

                experienceItem.remove();

            }

        });

    });

/* ==========================================================================
   Script Block 4
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function() {

        const bankContainer =
            document.getElementById("neBankAccountContainer");

        const addBankBtn =
            document.getElementById("neAddBankAccount");

        let bankIndex = 1;


        // Add Bank Account
        addBankBtn.addEventListener("click", function() {

            const firstBankAccount =
                bankContainer.querySelector(".ne-bank-account-item");

            const newBankAccount =
                firstBankAccount.cloneNode(true);


            // Clear input values
            newBankAccount.querySelectorAll("input").forEach(function(input) {

                input.value = "";

                // Update name index
                if (input.name) {

                    input.name = input.name.replace(
                        /bank_accounts\[\d+\]/,
                        "bank_accounts[" + bankIndex + "]"
                    );

                }

            });


            // Reset select
            newBankAccount.querySelectorAll("select").forEach(function(select) {

                select.selectedIndex = 0;

                if (select.name) {

                    select.name = select.name.replace(
                        /bank_accounts\[\d+\]/,
                        "bank_accounts[" + bankIndex + "]"
                    );

                }

            });


            // Append new bank account
            bankContainer.appendChild(newBankAccount);

            bankIndex++;

        });


        // Remove Bank Account
        bankContainer.addEventListener("click", function(e) {

            const removeBtn =
                e.target.closest(".neRemoveBankAccount");

            if (!removeBtn) {
                return;
            }

            const bankAccount =
                removeBtn.closest(".ne-bank-account-item");

            bankAccount.remove();

        });

    });

/* ==========================================================================
   Script Block 5
   ========================================================================== */
// ----- Leave Rules: cascading auto-check (Trainee -> Probation -> Confirmation) -----
    document.querySelectorAll('#neLeaveRulesTable .ne-leave-rule-row').forEach(function(rowEl) {
        var switches = rowEl.querySelectorAll('.ne-lr-check');

        function refreshLrState() {
            /* complete glow only when all three stages are on */
            var allOn = Array.prototype.every.call(switches, function(s) { return s.checked; });
            rowEl.classList.toggle('perm-row-complete', allOn);
        }

        /* every switch works independently — no auto-cascade */
        switches.forEach(function(sw) {
            sw.addEventListener('change', function() {
                if (sw.checked) {
                    sw.classList.remove('ne-lr-just-toggled');
                    void sw.offsetWidth;
                    sw.classList.add('ne-lr-just-toggled');
                }
                refreshLrState();
            });
        });
    });

    /* ----- Leave Rules: add row from leave-type select2 + hover delete ----- */
    (function() {
        var leaveTypesData = [
            { id: 1, name: 'Casual Leave', total_days: 12, status: 'Enable' },
            { id: 2, name: 'Sick Leave', total_days: 10, status: 'Enable' },
            { id: 3, name: 'Earned Leave', total_days: 15, status: 'Enable' },
            { id: 4, name: 'Maternity Leave', total_days: 90, status: 'Disable' },
            { id: 5, name: 'Paternity Leave', total_days: 15, status: 'Enable' }
        ];

        var tbody = document.querySelector('#neLeaveRulesTable tbody');
        var typeSelect = document.getElementById('neLeaveTypeSelect');
        if (!tbody || !typeSelect) return;

        function bindRow(rowEl) {
            var switches = rowEl.querySelectorAll('.ne-lr-check');

            function refresh() {
                var allOn = Array.prototype.every.call(switches, function(s) { return s.checked; });
                rowEl.classList.toggle('perm-row-complete', allOn);
            }

            switches.forEach(function(sw) {
                sw.addEventListener('change', function() {
                    if (sw.checked) {
                        sw.classList.remove('ne-lr-just-toggled');
                        void sw.offsetWidth;
                        sw.classList.add('ne-lr-just-toggled');
                    }
                    refresh();
                });
            });

            var del = rowEl.querySelector('.ne-lr-delete');
            if (del) {
                del.addEventListener('click', function() {
                    rowEl.classList.add('removing');
                    var typeName = rowEl.getAttribute('data-type');

                    /* hide + dispose the tooltip before the row goes, or it
                       stays stuck on screen after the row is removed */
                    var tip = bootstrap.Tooltip.getInstance(del);
                    if (tip) tip.dispose();
                    document.querySelectorAll('.tooltip').forEach(function(t) { t.remove(); });

                    setTimeout(function() {
                        rowEl.remove();
                        restoreToDropdown(typeName);
                    }, 300);
                });
            }
        }

        document.querySelectorAll('#neLeaveRulesTable .ne-leave-rule-row').forEach(bindRow);

        /* option click -> append a new rule row (duplicate types are ignored) */
        jQuery(typeSelect)
            .on('select2:select', function(e) {
                var name = e.params.data.id;
                if (!name) return;

                var duplicate = tbody.querySelector('.ne-leave-rule-row[data-type="' + $.escapeSelector(name) + '"]');
                if (duplicate) {
                    duplicate.classList.remove('added');
                    void duplicate.offsetWidth;
                    duplicate.classList.add('added');
                    return;
                }

                var row = document.createElement('tr');
                row.className = 'ne-leave-rule-row added';
                row.setAttribute('data-type', name);
                row.innerHTML =
                    '<td style="font-weight:700;color:var(--aw-ink-900);">' + $('<div>').text(name).html() +
                    '    <button type="button" class="ne-lr-delete" title="Remove" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove"><i class="mdi mdi-delete"></i></button>' +
                    '</td>' +
                    '<td style="text-align:center;"><input type="checkbox" class="ne-lr-check" data-stage="trainee"></td>' +
                    '<td style="text-align:center;"><input type="checkbox" class="ne-lr-check" data-stage="probation"></td>' +
                    '<td style="text-align:center;"><input type="checkbox" class="ne-lr-check" data-stage="confirmation"></td>' +
                    '<td style="text-align:center;"><input type="number" min="0" class="form-control ne-lr-days" placeholder="Days" style="width:100px;display:inline-block;text-align:center;border-color:var(--primary);color:var(--primary);font-weight:600;"></td>';

                tbody.appendChild(row);
                bindRow(row);

                /* re-init tooltips inside the new row */
                if (window.bootstrap) {
                    row.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                        new bootstrap.Tooltip(el, { trigger: 'hover' });
                    });
                }
            })
            .on('select2:clear', function() {
                /* keep placeholder clean */
            });

        /* select panna option-a dropdown-la irundhu remove pannu (used types shouldn't reappear) */
        function removeFromDropdown(name) {
            jQuery(typeSelect).find('option[value="' + $.escapeSelector(name) + '"]').remove();
            jQuery(typeSelect).trigger('change.select2');
        }

        /* row delete panna andha type thirumba dropdown-la add aagum */
        function restoreToDropdown(name) {
            var $sel = jQuery(typeSelect);
            if ($sel.find('option[value="' + $.escapeSelector(name) + '"]').length) return;
            var $opt = $('<option>').attr('value', name).text(name);
            $sel.append($opt);
            $sel.trigger('change.select2');
        }

        /* select panna udane: row add + dropdown-la irundhu remove + select reset */
        jQuery(typeSelect).on('select2:select', function(e) {
            var name = e.params.data.id;
            if (!name) return;
            removeFromDropdown(name);
            var $sel = jQuery(this);
            setTimeout(function() { $sel.val(null).trigger('change.select2'); }, 10);
        });
    })();

/* ==========================================================================
   Script Block 6
   ========================================================================== */
// ----- Leave Approval: dynamic level add/remove -----
    var approvalOrdinals = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'];
    var extraLevelsWrap = document.getElementById('neApprovalExtraLevels');
    var addLevelBtn = document.getElementById('neAddApprovalLevel');

    function ordinalFor(n) {
        return approvalOrdinals[n - 1] || (n + 'th');
    }

    function renumberApprovalLevels() {
        var rows = extraLevelsWrap.querySelectorAll('.ne-approval-row');
        rows.forEach(function(r, idx) {
            var level = idx + 2; // base row is level 1
            var label = r.querySelector('label');
            var select = r.querySelector('select');
            label.textContent = ordinalFor(level) + ' Level Approval';
            select.setAttribute('data-level', level);
        });
    }

    function addApprovalLevel() {
        var level = extraLevelsWrap.querySelectorAll('.ne-approval-row').length + 2;

        var row = document.createElement('div');
        row.className = 'ne-approval-row col-lg-6';
        row.innerHTML =
            '<div class="ne-approval-col">' +
            '<label>' + ordinalFor(level) + ' Level Approval</label>' +
            '<select class="form-select select2 ne-approval-select" data-level="' + level + '">' +
            '<option value="">Non selected</option>' +
            '<option>Victoria Celestie</option>' +
            '<option>Madison Andrew</option>' +
            '<option>Ryan Christopher</option>' +
            '<option>Emily Lauren</option>' +
            '</select>' +
            '</div>' +
            '<button type="button" class="ne-approval-btn-remove" title="Remove level">-</button>';

        extraLevelsWrap.appendChild(row);

        var select = row.querySelector('select');
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $(select).select2({
                width: '100%'
            });
        }

        row.querySelector('.ne-approval-btn-remove').addEventListener('click', function() {
            row.remove();
            renumberApprovalLevels();
        });
    }

    addLevelBtn.addEventListener('click', addApprovalLevel);

    document.getElementById('neApprovalSubmit').addEventListener('click', function() {
        var levels = [];
        document.querySelectorAll('#neApprovalBaseRow .ne-approval-select, #neApprovalExtraLevels .ne-approval-select').forEach(function(sel) {
            levels.push({
                level: sel.getAttribute('data-level'),
                value: sel.value
            });
        });
        var follower = document.getElementById('neApprovalFollower').value;
        console.log('Leave Approval submitted:', {
            levels: levels,
            follower: follower
        });
        alert('Leave approval flow saved!');
    });

/* ==========================================================================
   Script Block 7
   ========================================================================== */
// ----- OT Approval: dynamic level add/remove -----
    var otOrdinals = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'];
    var otExtraLevelsWrap = document.getElementById('neOtExtraLevels');
    var addOtLevelBtn = document.getElementById('neAddOtLevel');

    function otOrdinalFor(n) {
        return otOrdinals[n - 1] || (n + 'th');
    }

    function renumberOtLevels() {
        var rows = otExtraLevelsWrap.querySelectorAll('.ne-otapp-row');
        rows.forEach(function(r, idx) {
            var level = idx + 2; // base row is level 1
            var label = r.querySelector('label');
            var select = r.querySelector('select');
            label.textContent = otOrdinalFor(level) + ' Level Approval';
            select.setAttribute('data-level', level);
        });
    }

    function addOtApprovalLevel() {
        var level = otExtraLevelsWrap.querySelectorAll('.ne-otapp-row').length + 2;

        var row = document.createElement('div');
        row.className = 'ne-otapp-row';
        row.innerHTML =
            '<div class="ne-otapp-col">' +
            '<label>' + otOrdinalFor(level) + ' Level Approval</label>' +
            '<select class="form-select select2 ne-otapp-select" data-level="' + level + '">' +
            '<option value="">Non selected</option>' +
            '<option>Victoria Celestie</option>' +
            '<option>Madison Andrew</option>' +
            '<option>Ryan Christopher</option>' +
            '<option>Emily Lauren</option>' +
            '</select>' +
            '</div>' +
            '<button type="button" class="ne-otapp-btn-remove bg-danger" title="Remove level">-</button>';

        otExtraLevelsWrap.appendChild(row);

        var select = row.querySelector('select');
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $(select).select2({
                width: '100%'
            });
        }

        row.querySelector('.ne-otapp-btn-remove').addEventListener('click', function() {
            row.remove();
            renumberOtLevels();
        });
    }

    addOtLevelBtn.addEventListener('click', addOtApprovalLevel);

    document.getElementById('neOtApprovalSubmit').addEventListener('click', function() {
        var levels = [];
        document.querySelectorAll('#neOtBaseRow .ne-otapp-select, #neOtExtraLevels .ne-otapp-select').forEach(function(sel) {
            levels.push({
                level: sel.getAttribute('data-level'),
                value: sel.value
            });
        });
        console.log('OT Approval submitted:', levels);
        alert('OT approval flow saved!');
    });

/* ==========================================================================
   Script Block 8
   ========================================================================== */
// ----- Reporting To: dynamic level add/remove -----
    var rptOrdinals = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'];
    var rptExtraLevelsWrap = document.getElementById('neRptExtraLevels');
    var addRptLevelBtn = document.getElementById('neAddRptLevel');

    function rptOrdinalFor(n) {
        return rptOrdinals[n - 1] || (n + 'th');
    }

    function renumberRptLevels() {
        if (!rptExtraLevelsWrap) return;
        var rows = rptExtraLevelsWrap.querySelectorAll('.ne-otapp-row');
        rows.forEach(function(r, idx) {
            var level = idx + 2; // base row is level 1
            var label = r.querySelector('label');
            var select = r.querySelector('select');
            if (label) label.textContent = rptOrdinalFor(level) + ' Level Approval';
            if (select) select.setAttribute('data-level', level);
        });
    }

    function addRptApprovalLevel() {
        if (!rptExtraLevelsWrap) return;
        var level = rptExtraLevelsWrap.querySelectorAll('.ne-otapp-row').length + 2;

        var row = document.createElement('div');
        row.className = 'ne-otapp-row mt-2';
        row.innerHTML =
            '<div class="ne-otapp-col">' +
            '<label>' + rptOrdinalFor(level) + ' Level Approval</label>' +
            '<select class="form-select select2 ne-rptto-select" data-level="' + level + '">' +
            '<option value="">Non selected</option>' +
            '<option>Victoria Celestie</option>' +
            '<option>Madison Andrew</option>' +
            '<option>Ryan Christopher</option>' +
            '<option>Emily Lauren</option>' +
            '</select>' +
            '</div>' +
            '<button type="button" class="ne-otapp-btn-remove bg-danger" title="Remove level">-</button>';

        rptExtraLevelsWrap.appendChild(row);

        var select = row.querySelector('select');
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $(select).select2({
                width: '100%'
            });
        }

        row.querySelector('.ne-otapp-btn-remove').addEventListener('click', function() {
            row.remove();
            renumberRptLevels();
        });
    }

    if (addRptLevelBtn) {
        addRptLevelBtn.addEventListener('click', addRptApprovalLevel);
    }

/* ==========================================================================
   Script Block 9
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var bulkUploadBtn = document.getElementById('bulkUploadBtn');
        var offcanvasEl = document.getElementById('employeeUploadOffcanvas');

        if (bulkUploadBtn && offcanvasEl) {
            bulkUploadBtn.addEventListener('click', function() {
                bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl).show();
            });
        }

        // ... existing bulk upload logic (dropzone, fileName, confirmUpload) idhu appuram continue pannunga
        document.addEventListener('DOMContentLoaded', function() {
            var bulkUploadInput = document.getElementById('bulkUploadInput');
            var dropzone = document.getElementById('employeeBulkDropzone');
            var filePreview = document.getElementById('employeeUploadFile');
            var fileName = document.getElementById('employeeUploadFileName');
            var uploadCount = document.getElementById('employeeUploadCount');
            var confirmUpload = document.getElementById('confirmBulkUpload');

            if (dropzone && bulkUploadInput) {
                dropzone.addEventListener('click', function() {
                    bulkUploadInput.click();
                });

                bulkUploadInput.addEventListener('change', function() {
                    var file = bulkUploadInput.files[0];
                    if (!file) return;
                    var ext = file.name.split('.').pop().toLowerCase();
                    if (['xlsx', 'xls', 'csv'].indexOf(ext) === -1) {
                        alert('Please upload a valid Excel or CSV file.');
                        bulkUploadInput.value = '';
                        return;
                    }
                    fileName.textContent = file.name;
                    filePreview.classList.add('show');
                    uploadCount.classList.add('show');
                    confirmUpload.disabled = false;
                });

                confirmUpload.addEventListener('click', function() {
                    if (!bulkUploadInput.files[0]) return;
                    alert('24 employees are ready to import from ' + bulkUploadInput.files[0].name + '.');
                    bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('employeeUploadOffcanvas')).hide();
                });
            }
        });


    });

/* ==========================================================================
   Script Block 10
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function() {

        const customContainer =
            document.getElementById("neCustomDocumentsContainer");

        const addCustomDocumentBtn =
            document.getElementById("neAddCustomDocument");

        let customDocumentIndex = 0;


        // --------------------------------------------------
        // Add Custom Document
        // --------------------------------------------------

        addCustomDocumentBtn.addEventListener("click", function() {

            const index = customDocumentIndex++;

            const col = document.createElement("div");

            col.className = "col-lg-3 col-md-6 ne-custom-document";

            col.innerHTML = `

            <div class="position-relative">

                <!-- Document Name -->
                <label class="form-label">
                    Document Name
                </label>

                <input type="text"
                    class="form-control mb-2 ne-custom-document-name"
                    name="custom_documents[${index}][name]"
                    placeholder="Enter document name">


                <!-- Upload Box -->
                <label class="aw-upload-box"
                    style="min-height:100px;"
                    for="customDocument_${index}">

                    <i class="bi bi-file-earmark-arrow-up"></i>

                    <div class="aw-upload-title">
                        Upload File
                    </div>

                    <div class="aw-upload-hint">
                        PDF, JPG, PNG (Max 5MB)
                    </div>

                    <input type="file"
                        id="customDocument_${index}"
                        class="ne-custom-document-file"
                        name="custom_documents[${index}][file]"
                        accept=".pdf,.jpg,.jpeg,.png"
                        hidden>

                </label>


                <!-- Selected File -->
                <div class="ne-custom-file-name"
                    style="
                        font-size:12px;
                        color:#666;
                        margin-top:5px;
                        word-break:break-word;
                    ">
                    No file chosen
                </div>


                <!-- Delete -->
                <button type="button"
                    class="btn btn-danger neDeleteCustomDocument"
                    style="
                        font-size:12px;
                        font-weight:600;
                        border-radius:6px;
                        margin-top:8px;
                    ">

                    <i class="bi bi-trash"></i>
                    Delete

                </button>

            </div>
        `;


            customContainer.appendChild(col);

        });


        // --------------------------------------------------
        // Custom Document File Change
        // --------------------------------------------------

        customContainer.addEventListener("change", function(e) {

            if (!e.target.classList.contains(
                    "ne-custom-document-file"
                )) {
                return;
            }


            const input = e.target;

            const documentBox =
                input.closest(".ne-custom-document");

            const fileName =
                documentBox.querySelector(
                    ".ne-custom-file-name"
                );


            if (input.files && input.files[0]) {

                fileName.textContent =
                    input.files[0].name;

            } else {

                fileName.textContent =
                    "No file chosen";

            }

        });


        // --------------------------------------------------
        // Delete Custom Document
        // --------------------------------------------------

        customContainer.addEventListener("click", function(e) {

            const deleteBtn =
                e.target.closest(
                    ".neDeleteCustomDocument"
                );

            if (!deleteBtn) {
                return;
            }


            const documentBox =
                deleteBtn.closest(
                    ".ne-custom-document"
                );


            if (documentBox) {
                documentBox.remove();
            }

        });

    });

    // --------------------------------------------------
    // Verification & Approval Status widget
    // Drive the stepper purely from data-status="pending|verified|approved|rejected"
    // (set this attribute from PHP once the real status is known e.g.
    //  data-status="pending")
    // --------------------------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        var vaCard = document.getElementById('neVerificationStatus');
        if (!vaCard) return;

        var order = ['pending', 'verified', 'approved'];
        var status = (vaCard.getAttribute('data-status') || 'pending').toLowerCase();

        var badge = document.getElementById('neVaBadge');
        var badgeText = document.getElementById('neVaBadgeText');
        var track = document.getElementById('neVaTrack');
        var steps = vaCard.querySelectorAll('.ne-va-step');

        var labels = {
            pending: 'Pending',
            verified: 'Verified',
            approved: 'Approved',
            rejected: 'Rejected'
        };

        badge.className = 'ne-va-badge status-' + status;
        badgeText.textContent = labels[status] || 'Pending';

        if (status === 'rejected') {
            track.classList.add('is-rejected');
            track.style.setProperty('--ne-va-progress', '100%');

            steps.forEach(function(step) {
                var key = step.getAttribute('data-step');
                step.classList.remove('is-done', 'is-current', 'is-rejected');
                if (key === 'pending') step.classList.add('is-done');
                if (key === 'rejected') step.classList.add('is-rejected');
            });
        } else {
            var idx = order.indexOf(status);
            if (idx === -1) idx = 0;
            var progress = (idx / (order.length - 1)) * 100;
            track.style.setProperty('--ne-va-progress', progress + '%');

            steps.forEach(function(step) {
                var key = step.getAttribute('data-step');
                step.classList.remove('is-done', 'is-current', 'is-rejected');
                var keyIdx = order.indexOf(key);
                if (keyIdx === -1) return; // rejected step stays neutral here
                if (keyIdx < idx) step.classList.add('is-done');
                else if (keyIdx === idx) step.classList.add('is-current');
            });
        }
    });

/* ==========================================================================
   Script Block 11
   ========================================================================== */
// ===== Permissions: render Module/Capabilities rows from permission-modules master =====
// Master data is managed in permission-modules.php (stored in localStorage).
(function() {
    var LS_KEY = 'gh_permission_modules';

    var DEFAULT_MODULES = [
        { id: 1,  key: 'hr_dashboard',    group: 'HR Management',    name: 'HR Dashboard',              caps: ['view_own'] },
        { id: 2,  key: 'hr_org',          group: 'HR Management',    name: 'Organization',              caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 3,  key: 'hr_records',      group: 'HR Management',    name: 'Employees (Records)',       caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 4,  key: 'hr_shift',        group: 'HR Management',    name: 'Shift Management',          caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 5,  key: 'hr_loan',         group: 'HR Management',    name: 'Loan & Advances',           caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 6,  key: 'hr_payroll',      group: 'HR Management',    name: 'Payroll Management',        caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 7,  key: 'ts_checkin',      group: 'Timesheet & Leave', name: 'Timesheet Check In Out',   caps: ['view_own'] },
        { id: 8,  key: 'ts_att',          group: 'Timesheet & Leave', name: 'Timesheet - Attendance',   caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 9,  key: 'ts_punch',        group: 'Timesheet & Leave', name: 'Timesheet - Punch In Reports', caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 10, key: 'ts_ot',           group: 'Timesheet & Leave', name: 'Timesheet - Overtime',     caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 11, key: 'ts_leave',        group: 'Timesheet & Leave', name: 'Timesheet - Leave',        caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 12, key: 'ts_leave_report', group: 'Timesheet & Leave', name: 'Leave Report',             caps: ['view_own', 'view_global'] },
        { id: 13, key: 'ts_permreq',      group: 'Timesheet & Leave', name: 'Permission Requests',      caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 14, key: 'recruit',         group: 'HR Record',        name: 'Recruitment',               caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 15, key: 'hr_onboard',      group: 'HR Record',        name: 'Onboarding',                caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 16, key: 'hr_perf',         group: 'HR Record',        name: 'Performance',               caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] }
    ];

    // value prefix per module (slug used in checkbox values / role presets)
    function slug(name) {
        return String(name).toLowerCase()
            .replace(/&/g, 'and')
            .replace(/[^a-z0-9]+/g, '_')
            .replace(/^_+|_+$/g, '');
    }

    var CAP_LABELS = { view_own: 'View(Own)', view_global: 'View(Global)', create: 'Create', edit: 'Edit', delete: 'Delete' };

    function loadData() {
        try {
            var raw = localStorage.getItem(LS_KEY);
            if (raw) {
                var arr = JSON.parse(raw);
                if (Array.isArray(arr) && arr.length) return arr;
            }
        } catch (e) { /* ignore */ }
        return DEFAULT_MODULES.slice();
    }

    function esc(s) {
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    var GROUP_ICONS = {
        'HR Management': 'bi-people-fill',
        'Timesheet & Leave': 'bi-clock-history',
        'HR Record': 'bi-folder-symlink'
    };

    function render() {
        var wrap = document.getElementById('nePermRows');
        if (!wrap) return;

        var modules = loadData();

        // group modules preserving master order
        var groups = [];
        var byGroup = {};
        modules.forEach(function(m) {
            var g = m.group || 'Other';
            if (!byGroup[g]) { byGroup[g] = []; groups.push(g); }
            byGroup[g].push(m);
        });

        var html = '';
        groups.forEach(function(g) {
            var icon = GROUP_ICONS[g] || 'bi-grid-1x2';
            html += '<div class="ne-perm-group-label"><i class="bi ' + icon + '"></i> ' + esc(g) + '</div>';
            byGroup[g].forEach(function(m) {
                var key = m.key || slug(m.name);
                var caps = (m.caps && m.caps.length) ? m.caps : ['view_own'];
                html += '<div class="ne-perm-row">' +
                    '<div class="ne-perm-col-feature">' + esc(m.name) + '</div>' +
                    '<div class="ne-perm-col-caps">';
                caps.forEach(function(c) {
                    html += '<label class="ne-perm-check"><input type="checkbox" name="nePerm" value="' + key + '_' + c + '"> ' + (CAP_LABELS[c] || c) + '</label>';
                });
                html += '</div>' +
                    '<div style="text-align:center;"><span class="ne-perm-check-all" data-group="' + key + '">Select All</span></div>' +
                    '</div>';
            });
        });

        wrap.innerHTML = html;
    }

    // Render before the page's own permission scripts initialise
    render();
})();

/* ==========================================================================
   Script Block 12
   ========================================================================== */
// ===== Family Details: Add More children name rows =====
    (function() {
        var addBtn = document.getElementById('neAddChild');
        var wrap = document.getElementById('neChildrenWrap');
        if (!addBtn || !wrap) return;

        function renumber() {
            wrap.querySelectorAll('.ne-child-row').forEach(function(row, i) {
                var lbl = row.querySelector('label');
                if (lbl) lbl.textContent = (i + 1) + '. Childrens Name';
            });
        }

        addBtn.addEventListener('click', function() {
            var count = wrap.querySelectorAll('.ne-child-row').length;
            if (count >= 10) return; // sane limit

            var row = document.createElement('div');
            row.className = 'ne-child-row col-lg-4 col-md-6';
            row.innerHTML =
                '<label class="form-label">' + (count + 1) + '. Childrens Name</label>' +
                '<div class="d-flex gap-2">' +
                    '<input type="text" class="form-control" name="children_name[]" placeholder="Enter children\'s name">' +
                    '<button type="button" class="btn btn-outline-secondary ne-child-remove" title="Remove" style="border-color:var(--aw-border);color:var(--aw-ink-500);flex-shrink:0;">' +
                        '<i class="bi bi-trash"></i>' +
                    '</button>' +
                '</div>';
            wrap.appendChild(row);
            renumber();

            row.querySelector('.ne-child-remove').addEventListener('click', function() {
                row.remove();
                renumber();
            });

            row.querySelector('input').focus();
        });
    })();

/* ==========================================================================
   Script Block 13
   ========================================================================== */
// ===== Resignation / Relieving Request Tab =====
    (function() {
        var firstName = document.getElementById('neFirstName');
        var lastName = document.getElementById('neLastName');
        var relEmpSelect = document.getElementById('neRelEmpSelect');
        var relReason = document.getElementById('neRelReason');
        var relResignDate = document.getElementById('neRelResignDate');
        var relLastDay = document.getElementById('neRelLastDay');
        var relNoticePeriod = document.getElementById('neRelNoticePeriod');
        var relRemarks = document.getElementById('neRelRemarks');
        var relDoc = document.getElementById('neRelDoc');
        var relSend = document.getElementById('neRelSend');

        // Initialize Select2 disabled for employee name
        if (relEmpSelect) {
            $(relEmpSelect).select2({
                width: '100%',
                disabled: true,
                placeholder: '—',
                allowClear: false
            });
        }

        // Update employee name in Select2 from first/last name fields
        function updateRelEmpInfo() {
            if (!relEmpSelect) return;
            var fn = firstName ? firstName.value.trim() : '';
            var ln = lastName ? lastName.value.trim() : '';
            var fullName = (fn + ' ' + ln).trim();

            // Clear and add new option
            $(relEmpSelect).empty();
            if (fullName) {
                var opt = new Option(fullName, fullName, true, true);
                $(relEmpSelect).append(opt).trigger('change');
            } else {
                var emptyOpt = new Option('\u2014', '', true, true);
                $(relEmpSelect).append(emptyOpt).trigger('change');
            }
        }

        // Show toast
        function showToast(msg, type) {
            var toast = document.createElement('div');
            toast.className = 'ne-rel-toast ne-rel-toast-' + (type || 'info');
            toast.textContent = msg;
            document.body.appendChild(toast);
            setTimeout(function() { toast.classList.add('show'); }, 10);
            setTimeout(function() {
                toast.classList.remove('show');
                setTimeout(function() { toast.remove(); }, 350);
            }, 3000);
        }

        // Bind name fields
        if (firstName) firstName.addEventListener('input', updateRelEmpInfo);
        if (lastName) lastName.addEventListener('input', updateRelEmpInfo);

        // Submit Request
        if (relSend) {
            relSend.addEventListener('click', function() {
                var empName = $(relEmpSelect).val() || '';
                if (!empName) { showToast('Please enter employee name in Profile tab', 'info'); return; }
                if (!relReason.value.trim()) { showToast('Please enter reason for leaving', 'info'); relReason.focus(); return; }
                if (!relResignDate.value) { showToast('Please select resignation date', 'info'); relResignDate.focus(); return; }
                if (!relLastDay.value) { showToast('Please select proposed last working date', 'info'); relLastDay.focus(); return; }

                var summary = 'Resignation request submitted for ' + empName;
                summary += ' | Reason: ' + relReason.value.trim();
                summary += ' | Resignation Date: ' + relResignDate.value;
                summary += ' | Last Working Date: ' + relLastDay.value;
                if (relNoticePeriod.value) summary += ' | Notice Period: ' + relNoticePeriod.value;
                if (relRemarks.value.trim()) summary += ' | Remarks: ' + relRemarks.value.trim();
                if (relDoc.files && relDoc.files[0]) summary += ' | Document: ' + relDoc.files[0].name;

                showToast('Resignation request submitted successfully!', 'success');
                console.log('[Resignation Request]', summary);
            });
        }

        // Init
        updateRelEmpInfo();
    })();

/* ==========================================================================
   Script Block 14
   ========================================================================== */
// ===== Relieving Approval (from bell notification) =====
(function() {
    var params = new URLSearchParams(window.location.search);
    var relEmp = params.get('rel');
    if (!relEmp) return;

    // Sample data for employees
    var relData = {
        'EMP0002': {
            name: 'Daniel Martinez', dept: 'Design',
            reason: 'Better career opportunity', resignDate: '10 Sep 2026', lastDate: '30 Sep 2026',
            noticePeriod: '30 Days', remarks: 'Completing current project handover',
            steps: [
                { title: 'Team Lead Review', reviewer: 'Madison Andrew', time: '11 Sep 2026, 10:30 AM', status: 'approved' },
                { title: 'HR Approval', reviewer: 'Priya Sharma', time: '12 Sep 2026, 02:15 PM', status: 'approved' },
                { title: 'Manager Final Approval', reviewer: 'Suresh Reddy', time: 'Pending', status: 'pending' },
                { title: 'Relieving Completed', reviewer: '—', time: '—', status: '' }
            ]
        },
        'EMP0005': {
            name: 'Sophia Johnson', dept: 'Marketing',
            reason: 'Relocation to another city', resignDate: '01 Aug 2026', lastDate: '30 Sep 2026',
            noticePeriod: '60 Days', remarks: 'Family relocation due to spouse transfer',
            steps: [
                { title: 'Team Lead Review', reviewer: 'Victoria Celestie', time: '02 Aug 2026, 11:00 AM', status: 'approved' },
                { title: 'HR Approval', reviewer: 'Priya Sharma', time: '03 Aug 2026, 03:30 PM', status: 'approved' },
                { title: 'Manager Final Approval', reviewer: 'Rajesh Kumar', time: '05 Aug 2026, 10:00 AM', status: 'approved' },
                { title: 'Relieving Completed', reviewer: 'HR Team', time: '30 Sep 2026', status: 'approved' }
            ]
        },
        'EMP0003': {
            name: 'David Anderson', dept: 'iOS Dev',
            reason: 'Higher studies abroad', resignDate: '01 Sep 2026', lastDate: '15 Oct 2026',
            noticePeriod: '45 Days', remarks: 'Pursuing MBA at a foreign university',
            steps: [
                { title: 'Team Lead Review', reviewer: 'Ryan Christopher', time: '02 Sep 2026, 09:00 AM', status: 'approved' },
                { title: 'HR Approval', reviewer: 'Priya Sharma', time: '03 Sep 2026, 11:30 AM', status: 'rejected' },
                { title: 'Manager Final Approval', reviewer: '—', time: '—', status: '' },
                { title: 'Relieving Completed', reviewer: '—', time: '—', status: '' }
            ]
        }
    };

    var data = relData[relEmp];
    if (!data) return;

    // Navigate to Relieving tab
    if (window.goToStep) {
        window.goToStep(7);
    } else {
        var relTab = document.querySelector('.ne-tab[data-step="7"]');
        if (relTab) relTab.click();
    }

    // Fill approval panel
    document.getElementById('neRelViewName').textContent = data.name;
    document.getElementById('neRelViewDept').textContent = data.dept;

    // Build timeline
    var tlEl = document.getElementById('neRelTimeline');
    if (tlEl) {
        tlEl.innerHTML = '';
        data.steps.forEach(function(step) {
            var cls = step.status || '';
            var iconCls = cls === 'approved' ? 'bi-check-lg' : (cls === 'pending' ? 'bi-hourglass-split' : (cls === 'rejected' ? 'bi-x-lg' : 'bi-flag'));
            var badgeCls = cls;
            var badgeText = cls === 'approved' ? 'Approved' : (cls === 'pending' ? 'Pending' : (cls === 'rejected' ? 'Rejected' : 'Pending'));
            tlEl.innerHTML +=
                '<div class="ne-rel-tl-step ' + cls + '">' +
                '<div class="ne-rel-tl-body">' +
                '<div class="ne-rel-tl-title">' + step.title + '</div>' +
                '<div class="ne-rel-tl-desc">Reviewed by ' + step.reviewer + '</div>' +
                '<div class="ne-rel-tl-time">' + step.time + '</div>' +
                '</div>' +
                '<div class="ne-rel-tl-badge ' + badgeCls + '"><i class="bi bi-' + (cls === 'approved' ? 'check-circle-fill' : (cls === 'pending' ? 'clock-fill' : (cls === 'rejected' ? 'x-circle-fill' : 'flag'))) + '"></i> ' + badgeText + '</div>' +
                '</div>';
        });
    }

    // Show approval section, hide submit section
    var approvalSection = document.getElementById('neRelApprovalSection');
    var submitActions = document.getElementById('neRelSubmitActions');
    var hasPending = data.steps.some(function(s) { return s.status === 'pending'; });
    if (approvalSection) approvalSection.style.display = '';
    if (submitActions) submitActions.style.display = 'none';
    var approvalActions = document.getElementById('neRelApprovalActions');
    if (approvalActions) approvalActions.style.display = hasPending ? '' : 'none';

    // ===== Work Completion Modal =====
    var workModal = document.getElementById('neWorkModal');
    var workConfirm = document.getElementById('neWorkConfirm');
    var workCancel = document.getElementById('neWorkCancel');
    var workClose = document.getElementById('neWorkModalClose');
    var workCbs = document.querySelectorAll('#neWorkChecklist input[type=checkbox]');
    var workPct = document.getElementById('neWorkProgressPct');
    var workFill = document.getElementById('neWorkProgressFill');

    function updateWorkProgress() {
        var total = workCbs.length, done = 0;
        workCbs.forEach(function(cb) {
            var item = cb.closest('.ne-work-check-item');
            if (cb.checked) {
                done++;
                if (item) item.classList.add('checked');
                // Update step number to check icon
                var num = item ? item.querySelector('.ne-work-check-num') : null;
                if (num) num.innerHTML = '<i class="bi bi-check-lg"></i>';
            } else {
                if (item) item.classList.remove('checked');
                var num = item ? item.querySelector('.ne-work-check-num') : null;
                if (num) {
                    var idx = Array.from(workCbs).indexOf(cb);
                    num.textContent = idx + 1;
                }
            }
        });
        var pct = total > 0 ? Math.round((done / total) * 100) : 0;
        workPct.textContent = pct + '%';
        workFill.style.width = pct + '%';
        workConfirm.disabled = pct < 100;
        if (pct === 100) {
            workFill.classList.add('complete');
        } else {
            workFill.classList.remove('complete');
        }
    }
    workCbs.forEach(function(cb) { cb.addEventListener('change', updateWorkProgress); });

    function openWorkModal() {
        document.getElementById('neWorkEmpName').textContent = data.name;
        document.getElementById('neWorkEmpDept').textContent = data.dept + ' — ' + data.reason;
        workCbs.forEach(function(cb) { cb.checked = false; });
        updateWorkProgress();
        workModal.classList.add('show');
    }
    function closeWorkModal() { workModal.classList.remove('show'); }
    if (workCancel) workCancel.addEventListener('click', closeWorkModal);
    if (workClose) workClose.addEventListener('click', closeWorkModal);

    // Approve button opens work modal first
    var approveBtn = document.getElementById('neRelApproveBtn');
    if (approveBtn) {
        approveBtn.addEventListener('click', openWorkModal);
    }

    // Confirm in work modal -> approve
    if (workConfirm) {
        workConfirm.addEventListener('click', function() {
            closeWorkModal();
            // Mark pending step as approved
            var pendingStep = document.querySelector('.ne-rel-tl-step.pending');
            if (pendingStep) {
                pendingStep.classList.remove('pending');
                pendingStep.classList.add('completed');
                var badge = pendingStep.querySelector('.ne-rel-tl-badge');
                if (badge) {
                    badge.className = 'ne-rel-tl-badge approved';
                    badge.innerHTML = '<i class="bi bi-check-circle-fill"></i> Approved';
                }
                var timeEl = pendingStep.querySelector('.ne-rel-tl-time');
                if (timeEl) {
                    var now = new Date();
                    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    var h = now.getHours(), m = String(now.getMinutes()).padStart(2,'0');
                    timeEl.textContent = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear() + ', ' + (h%12||12) + ':' + m + ' ' + (h>=12?'PM':'AM');
                }
                // Activate next step
                var next = pendingStep.nextElementSibling;
                if (next) {
                    next.classList.add('pending');
                    var nextBadge = next.querySelector('.ne-rel-tl-badge');
                    if (nextBadge) { nextBadge.className = 'ne-rel-tl-badge pending'; nextBadge.innerHTML = '<i class="bi bi-clock-fill"></i> Pending'; }
                    var nextTime = next.querySelector('.ne-rel-tl-time');
                    if (nextTime) nextTime.textContent = 'Awaiting review';
                }
            }
            // Check if all done
            var remaining = document.querySelectorAll('.ne-rel-tl-step.pending');
            if (remaining.length === 0) {
                if (approvalActions) approvalActions.innerHTML = '<div style="padding:12px 18px;background:#dcfce7;border-radius:10px;font-size:13px;font-weight:700;color:#16a34a;"><i class="bi bi-check-circle-fill me-1"></i> All steps approved — Relieving complete</div>';
            }
        });
    }

    // Reject button
    var rejectBtn = document.getElementById('neRelRejectBtn');
    if (rejectBtn) {
        rejectBtn.addEventListener('click', function() {
            var pendingStep = document.querySelector('.ne-rel-tl-step.pending');
            if (pendingStep) {
                pendingStep.classList.remove('pending');
                pendingStep.classList.add('rejected');
                var badge = pendingStep.querySelector('.ne-rel-tl-badge');
                if (badge) { badge.className = 'ne-rel-tl-badge rejected'; badge.innerHTML = '<i class="bi bi-x-circle-fill"></i> Rejected'; }
                var timeEl = pendingStep.querySelector('.ne-rel-tl-time');
                if (timeEl) {
                    var now = new Date();
                    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    var h = now.getHours(), m = String(now.getMinutes()).padStart(2,'0');
                    timeEl.textContent = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear() + ', ' + (h%12||12) + ':' + m + ' ' + (h>=12?'PM':'AM');
                }
            }
            if (approvalActions) approvalActions.innerHTML = '<div style="padding:12px 18px;background:#fee2e2;border-radius:10px;font-size:13px;font-weight:700;color:#dc2626;"><i class="bi bi-x-circle-fill me-1"></i> Request rejected</div>';
        });
    }
})();

/* ==========================================================================
   Script Block 15
   ========================================================================== */
// ===== Week Off: single day, or Multiple (every-week days + alternate weeks, with calendar preview) =====
(function() {
    var DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var ORD = { 1: '1st', 2: '2nd', 3: '3rd', 4: '4th', 5: '5th' };
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var sel = document.getElementById('neWeekOff');
    var wrap = document.getElementById('neWeekOffMultiWrap');
    if (!sel || !wrap) return;
    var elWeekly = document.getElementById('neWoWeekly');
    var elAltList = document.getElementById('neWoAltList');
    var elAltArea = document.getElementById('neWoAltArea');
    var elSummary = document.getElementById('neWeekOffSummary');
    var elCalTitle = document.getElementById('neWoCalTitle');
    var elCalGrid = document.getElementById('neWoCalGrid');
    var hidden = document.getElementById('neWeekOffValue');

    var now = new Date();
    var st = {
        weekly: [],                       // ['Sunday']
        alt: [],                          // [{day:'Saturday', weeks:[1,3]}]
        formOpen: false,
        form: { day: null, weeks: [] },
        y: now.getFullYear(),
        m: now.getMonth()
    };

    function has(arr, v) { return arr.indexOf(v) !== -1; }
    function joinNice(list) { return list.length > 1 ? list.slice(0, -1).join(', ') + ' & ' + list[list.length - 1] : (list[0] || ''); }
    function altText(r) { return joinNice(r.weeks.map(function(w) { return ORD[w]; })) + ' ' + r.day; }

    // same JSON shape as before: [{day, occ:['All']}, {day, occ:['1','3']}]
    function getRules() {
        var out = [];
        DAYS.forEach(function(d) {
            if (has(st.weekly, d)) out.push({ day: d, occ: ['All'] });
            st.alt.forEach(function(r) { if (r.day === d) out.push({ day: d, occ: r.weeks.map(String) }); });
        });
        return out;
    }

    function getText() {
        if (sel.value !== 'Multiple') return sel.value || '';
        var parts = [];
        DAYS.forEach(function(d) {
            if (has(st.weekly, d)) parts.push('Every ' + d);
            st.alt.forEach(function(r) { if (r.day === d) parts.push(altText(r)); });
        });
        return parts.join(', ');
    }
    window.neGetWeekOffText = getText;

    function isOff(date) {
        var dn = DAYS[date.getDay()];
        if (has(st.weekly, dn)) return true;
        var wk = Math.ceil(date.getDate() / 7);
        return st.alt.some(function(r) { return r.day === dn && has(r.weeks, wk); });
    }

    function renderWeekly() {
        elWeekly.innerHTML = DAYS.map(function(d) {
            return '<button type="button" class="ne-wo-chipbtn' + (has(st.weekly, d) ? ' active' : '') +
                   '" data-wd="' + d + '">' + d.slice(0, 3) + '</button>';
        }).join('');
    }

    function renderAlt() {
        elAltList.innerHTML = st.alt.map(function(r, i) {
            return '<div class="ne-wo-altitem"><span><i class="bi bi-calendar2-week me-2"></i>' + altText(r) +
                   '</span><button type="button" data-alt-remove="' + i + '" title="Remove"><i class="bi bi-x-lg"></i></button></div>';
        }).join('');

        if (!st.formOpen) {
            elAltArea.innerHTML = '<button type="button" class="ne-wo-addlink" data-alt-open><i class="bi bi-plus-lg"></i> Add alternate week off</button>';
            return;
        }
        var used = st.alt.map(function(r) { return r.day; });
        var dayBtns = DAYS.map(function(d) {
            var dis = has(st.weekly, d) || has(used, d);
            return '<button type="button" class="ne-wo-chipbtn' + (st.form.day === d ? ' active' : '') + '"' +
                   (dis ? ' disabled title="Already added"' : '') + ' data-af-day="' + d + '">' + d.slice(0, 3) + '</button>';
        }).join('');
        var weekBtns = [1, 2, 3, 4, 5].map(function(w) {
            return '<button type="button" class="ne-wo-chipbtn' + (has(st.form.weeks, w) ? ' active' : '') +
                   '" data-af-week="' + w + '">' + ORD[w] + '</button>';
        }).join('');
        var ok = st.form.day && st.form.weeks.length;
        elAltArea.innerHTML =
            '<div class="ne-wo-form">' +
              '<div class="lbl">Which day?</div><div class="ne-wo-days">' + dayBtns + '</div>' +
              '<div class="lbl">Which weeks of the month?</div><div class="ne-wo-weeks">' + weekBtns + '</div>' +
              '<div class="ne-wo-form-actions">' +
                '<button type="button" class="btn btn-sm btn-primary" data-af-add' + (ok ? '' : ' disabled') + '>Add</button>' +
                '<button type="button" class="btn btn-sm btn-light" data-af-cancel>Cancel</button>' +
              '</div>' +
            '</div>';
    }

    function renderSummary() {
        var t = getText();
        elSummary.innerHTML = t
            ? '<div class="ne-wo-result"><b><i class="bi bi-check-circle-fill me-1"></i>' + t + '</b></div>' +
              '<button type="button" class="ne-wo-clear" data-clear><i class="bi bi-x-circle"></i> Clear all</button>'
            : '<div class="ne-wo-result empty"></div>';
    }

    function renderCal() {
        elCalTitle.textContent = MONTHS[st.m] + ' ' + st.y;
        var h = DAYS.map(function(d) { return '<div class="dow">' + d.slice(0, 3) + '</div>'; }).join('');
        var first = new Date(st.y, st.m, 1).getDay();
        var total = new Date(st.y, st.m + 1, 0).getDate();
        for (var i = 0; i < first; i++) h += '<div></div>';
        for (var d = 1; d <= total; d++) {
            var dt = new Date(st.y, st.m, d);
            var cls = 'd' + (isOff(dt) ? ' off' : '') +
                      (d === now.getDate() && st.m === now.getMonth() && st.y === now.getFullYear() ? ' today' : '');
            h += '<div class="' + cls + '">' + d + '</div>';
        }
        elCalGrid.innerHTML = h;
    }

    function render() {
        var isMulti = sel.value === 'Multiple';
        wrap.classList.toggle('d-none', !isMulti);
        renderWeekly(); renderAlt(); renderSummary(); renderCal();
        hidden.value = isMulti ? JSON.stringify(getRules()) : sel.value;
    }

    wrap.addEventListener('click', function(e) {
        var t = e.target.closest('button');
        if (!t || t.disabled) return;
        var ds = t.dataset;

        if (ds.wd) {
            if (has(st.weekly, ds.wd)) st.weekly = st.weekly.filter(function(x) { return x !== ds.wd; });
            else {
                st.weekly.push(ds.wd);
                st.alt = st.alt.filter(function(r) { return r.day !== ds.wd; }); // every-week covers it
                if (st.form.day === ds.wd) st.form.day = null;
            }
        } else if ('altOpen' in ds) { st.formOpen = true; st.form = { day: null, weeks: [] }; }
        else if ('afCancel' in ds) { st.formOpen = false; }
        else if (ds.afDay) { st.form.day = ds.afDay; }
        else if (ds.afWeek) {
            var w = +ds.afWeek, i = st.form.weeks.indexOf(w);
            if (i === -1) st.form.weeks.push(w); else st.form.weeks.splice(i, 1);
            st.form.weeks.sort();
        } else if ('afAdd' in ds) {
            st.alt.push({ day: st.form.day, weeks: st.form.weeks.slice() });
            st.formOpen = false;
        } else if (ds.altRemove !== undefined) { st.alt.splice(+ds.altRemove, 1); }
        else if (ds.cal) {
            st.m += +ds.cal;
            if (st.m < 0) { st.m = 11; st.y--; } else if (st.m > 11) { st.m = 0; st.y++; }
        } else if ('clear' in ds) { st.weekly = []; st.alt = []; st.formOpen = false; }
        else return;
        render();
    });

    // select2 fires jQuery events, so bind through jQuery when available
    if (window.jQuery) { jQuery(sel).on('change', render); } else { sel.addEventListener('change', render); }
    render();
})();

/* ==========================================================================
   Script Block 16
   ========================================================================== */
(function () {

    // Same data as department.js / position.js
    var designationMap = {
        1: [ // HR
            { id: 5,  name: 'HR Executive' },
            { id: 8,  name: 'HR Manager' },
            { id: 9,  name: 'Recruiter' }
        ],
        2: [ // Sales
            { id: 1,  name: 'Sales Executive' },
            { id: 2,  name: 'Sales Manager' }
        ],
        3: [ // Marketing
            { id: 4,  name: 'Marketing Manager' },
            { id: 10, name: 'Content Strategist' }
        ],
        4: [ // Designer
            { id: 11, name: 'UI/UX Designer' },
            { id: 12, name: 'Product Designer' }
        ],
        5: [ // Production
            { id: 6,  name: 'Production Lead' },
            { id: 13, name: 'Quality Analyst' }
        ],
        6: [ // Tech Support
            { id: 3,  name: 'iOS Developer' },
            { id: 14, name: 'Android Developer' },
            { id: 15, name: 'Business Analyst' }
        ],
        7: [ // Finance
            { id: 7,  name: 'Finance Analyst' },
            { id: 16, name: 'Accountant' }
        ]
    };

    function rebuildDesignationSelect(deptId, selectedName) {
        var desSel = document.getElementById('neDesignation');
        if (!desSel) return;

        desSel.innerHTML = '';

        var designations = designationMap[Number(deptId)] || [];

        if (!deptId || !designations.length) {
            desSel.disabled = true;
            desSel.innerHTML = '<option value="">Select Department first</option>';
        } else {
            desSel.disabled = false;
            var placeholder = document.createElement('option');
            placeholder.value = '';
            placeholder.textContent = 'Nothing selected';
            desSel.appendChild(placeholder);

            designations.forEach(function (d) {
                var opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = d.name;
                if (selectedName && d.name === selectedName) opt.selected = true;
                desSel.appendChild(opt);
            });
        }

        // Re-init select2
        if (window.jQuery && window.jQuery.fn.select2) {
            window.jQuery(desSel).select2({ width: '100%' });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var deptSel = document.getElementById('neDepartment');
        if (!deptSel) return;

        // select2 change event (fires on both native + select2 pick)
        if (window.jQuery && window.jQuery.fn.select2) {
            window.jQuery(deptSel).on('change', function () {
                rebuildDesignationSelect(this.value, null);
            });
        } else {
            deptSel.addEventListener('change', function () {
                rebuildDesignationSelect(this.value, null);
            });
        }

        // Init on load
        rebuildDesignationSelect(deptSel.value, null);
    });

    // Expose helper for demo autofill
    window._neRebuildDesignation = rebuildDesignationSelect;

})();

/* ==========================================================================
   Script Block 17
   ========================================================================== */
// ===== DEMO ONLY: auto-fill form with dummy data (remove before production) =====
(function() {
    var val = function(id, v) {
        var el = document.getElementById(id);
        if (!el) return;
        el.value = v;
        if (window.jQuery && window.jQuery.fn.select2) {
            window.jQuery(el).trigger('change');
        }
    };

    // --- Profile: Personal details ---
    val('neEmployeeCode', 'GH-EMP-0421');
    val('neFirstName', 'Arun');
    val('neLastName', 'Kumar');
    val('neGender', 'Male');
    val('neBirthday', '14-06-1996');
    val('neBirthplace', 'Chennai');
    val('nePresentAddress', '12, Anna Nagar Main Road, Chennai - 600040');
    val('neHomeTown', 'Coimbatore');
    val('neNation', 'Indian');
    val('neReligion', 'Hindu');
    val('neIdDocType', 'Aadhaar');
    val('nePermanentAddress', '5/B, Gandhi Street, RS Puram, Coimbatore - 641002');
    val('neBloodGroup', 'O+');
    val('neLatitude', '13.0827');
    val('neLongitude', '80.2707');
    val('neOtherInfo', 'Comfortable with both Tamil and English communication. Enjoys weekend cricket.');

    // --- Emergency contact ---
    val('neEmergencyName', 'Suresh Kumar');
    val('neEmergencyPhone', '98765 43210');
    val('neEmergencyBloodGroup', 'B+');
    val('neEmergencyRelation', 'Father');

    // --- Job details ---
    val('neDoj', '01-09-2026');
    val('neExperience', '3 - 5 Years');
    val('neRole', 'Employee');
    val('neJobType', 'Full-time');

    // Set Department first, then trigger cascade so Designation options load
    (function () {
        var deptSel = document.getElementById('neDepartment');
        if (deptSel) {
            deptSel.value = '6'; // Tech Support
            if (window.jQuery && window.jQuery.fn.select2) {
                window.jQuery(deptSel).trigger('change');
            } else {
                deptSel.dispatchEvent(new Event('change'));
            }
            // After cascade, pre-select the designation
            setTimeout(function () {
                var desSel = document.getElementById('neDesignation');
                if (desSel) {
                    // find option by text
                    for (var i = 0; i < desSel.options.length; i++) {
                        if (desSel.options[i].text === 'iOS Developer') {
                            desSel.selectedIndex = i;
                            break;
                        }
                    }
                    if (window.jQuery && window.jQuery.fn.select2) {
                        window.jQuery(desSel).trigger('change');
                    }
                }
            }, 50);
        }
    })();

    val('nePhone', '91234 56780');
    val('neOfficialEmail', 'arun.kumar@gharuda.com');
    val('nePersonalEmail', 'arun.kumar@gmail.com');
    val('neBranch', 'Chennai');
    val('neReportingTo', 'Victoria Celestie');
    val('neStatus', 'Active');
    val('neEmployeeType', 'Permanent');
    val('neWorkLocation', 'Hybrid');
    val('neWeekOff', 'Sunday');
    val('neOfferLetterDate', '20-08-2026');
    val('neNoticePeriodDays', '30');
    val('neOnboardingCommitment', 'Employee agrees to complete onboarding tasks within the first 30 days and submit all pending documents to HR.');

    // --- Salary details ---
    val('neSalaryType', 'Monthly');
    val('neCtc', '600000');
    val('neTaxCode', 'TX001');
    val('nePfEligible', 'Yes');
    val('neEsiEligible', 'Yes');
    val('neOtEligible', 'No');
    val('neUan', '101234567890');
    val('neEsiNo', '31000123450000199');
    val('neAadhaarNo', '4512 7896 3210');
    val('nePanNo', 'BXKPM1234L');
    val('nePensionEligible', 'Yes');
    val('neSalaryCalendar', 'Monthly Calendar');

    // --- Interview feedback ---
    val('neRound1', 'CV shortlisted - strong iOS fundamentals, good academic record.');
    val('neRound2', 'Cleared technical round - Swift, UIKit and REST integration knowledge is solid.');
    val('neRound3', 'HR round positive - good communication, flexible with hybrid work.');
    val('neRound4', 'Salary negotiation closed at 6 LPA - accepted offer.');

    // --- Family details ---
    val('neFatherName', 'Suresh Kumar');
    val('neMotherName', 'Lakshmi Kumar');
    val('neFamilyContactNumber', '98765 43211');
    val('neFatherOccupation', 'Business');
    val('neMotherOccupation', 'Homemaker');
    val('neOtherFamilyName', 'Divya Kumar');
    val('neFamilyRelationship', 'Sister');
    val('neMaritalStatus', 'Single');
    // Children name rows use name="children_name[]" (first row prefilled via input)

    // --- Departments & settings ---
    var adminCb = document.getElementById('neAdministrator');
    if (adminCb) adminCb.checked = false;
    var welcomeCb = document.getElementById('neWelcomeEmail');
    if (welcomeCb) welcomeCb.checked = true;

    // --- Relieving request ---
    val('neRelResignDate', '01-09-2026');
    val('neRelLastDay', '01-10-2026');
    val('neRelNoticePeriod', '30 Days');
    val('neRelReason', 'Career growth opportunity at another organisation.');
    val('neRelRemarks', 'Will complete project handover before last working day.');

    // Trigger age calc from birthday
    var bday = document.getElementById('neBirthday');
    if (bday) bday.dispatchEvent(new Event('change'));
})();
