/**
 * Gharuda CRM - Projects List Page Script
 * File: assets/js/pages/projects-list.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
// Action Link Handlers
    function copyProject(name) {
        if (confirm('Are you sure you want to duplicate/copy project "' + name + '"?')) {
            alert('Project "' + name + '" copied successfully as a duplicate draft!');
        }
    }

    function editProject(name) {
        var modalEl = document.getElementById('newProjectModal');
        var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        document.getElementById('newProjectModalTitle').innerHTML = '<i class="bi bi-pencil-square me-2" style="color:var(--primary, #16a34a);"></i> Edit Project - ' + name;
        document.getElementById('modalProjectName').value = name;
        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(r) {
            if (r.innerText.indexOf(name) > -1) {
                var cust = r.getAttribute('data-customer') || '';
                if (cust && typeof $ !== 'undefined' && $.fn.select2) {
                    $('#modalCustomer').val(cust).trigger('change.select2');
                }
                var startDate = r.cells[5] ? r.cells[5].textContent.trim() : '';
                var deadline = r.cells[6] ? r.cells[6].textContent.trim() : '';
                if (startDate && startDate !== '--') {
                    document.getElementById('modalStartDate').value = startDate;
                }
                if (deadline && deadline !== '--') {
                    document.getElementById('modalDeadline').value = deadline;
                }
            }
        });
        modal.show();
    }

    function deleteProject(name) {
        if (confirm('Are you sure you want to DELETE project "' + name + '"? This action cannot be undone.')) {
            var rows = document.querySelectorAll('#projectsTableBody tr');
            rows.forEach(function(row) {
                if (row.innerText.indexOf(name) > -1) {
                    row.remove();
                }
            });
            alert('Project "' + name + '" deleted successfully.');
        }
    }

    function openSendEmailModal(projName, clientName) {
        document.getElementById('emailProjectName').value = projName;
        document.getElementById('emailSubject').value = 'Project Update: ' + projName + ' (' + clientName + ')';
        document.getElementById('emailTo').value = clientName.toLowerCase().replace(/\s+/g, '') + '@example.com';
        document.getElementById('emailBody').value = 'Dear ' + clientName + ',\n\nHere is the latest progress update regarding your project "' + projName + '".\n\nBest regards,\nProject Management Team';
        var modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('sendEmailModal'));
        modal.show();
    }

    function handleSendEmail(e) {
        e.preventDefault();
        var modalEl = document.getElementById('sendEmailModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
        alert('Email sent successfully!');
    }

    // Filter Toggle
    document.getElementById('toggleFilterBtn').addEventListener('click', function() {
        var card = document.getElementById('filterCardSection');
        if (card.style.display === 'none') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });

    // Toggle Summary Overview Visibility
    function toggleSummaryOverview() {
        var card = document.getElementById('summaryOverviewCard');
        if (card.style.display === 'none') {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    }

    // Quick Action Filter Pills Logic
    function filterByQuickPill(type) {
        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(row) {
            var remainingTag = row.querySelector('.remaining-tag');
            if (!remainingTag) return;
            var isOverdue = remainingTag.classList.contains('overdue');
            var isActive = remainingTag.classList.contains('active');

            if (type === 'overdue') {
                row.style.display = isOverdue ? '' : 'none';
            } else if (type === 'upcoming') {
                row.style.display = isActive ? '' : 'none';
            } else if (type === 'today' || type === 'deadline_today') {
                row.style.display = (row.innerText.indexOf('0 days') > -1 || row.innerText.indexOf('0d') > -1) ? '' : 'none';
            } else {
                row.style.display = '';
            }
        });
    }

    // Helper to parse DD-MM-YYYY to comparable number YYYYMMDD
    function parseDmy(s) {
        if (!s) return null;
        var p = s.trim().split('-');
        if (p.length === 3) {
            var d = Number(p[0]), m = Number(p[1]), y = Number(p[2]);
            if (y && m && d) return y * 10000 + m * 100 + d;
        }
        return null;
    }

    // Reset Filters
    function resetProjectFilters() {
        document.getElementById('filterStaff').value = '';
        document.getElementById('filterFromDate').value = '';
        document.getElementById('filterToDate').value = '';
        if (window.jQuery && jQuery.fn.select2) {
            $('#filterStaff').val('').trigger('change.select2');
        }
        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(row) {
            row.style.display = '';
        });
    }

    // Apply Project Filters from form
    function applyProjectFilters() {
        var staff = document.getElementById('filterStaff').value.toLowerCase().trim();
        var fromVal = document.getElementById('filterFromDate').value.trim();
        var toVal = document.getElementById('filterToDate').value.trim();
        var fromKey = parseDmy(fromVal);
        var toKey = parseDmy(toVal);

        if (fromKey && toKey && fromKey > toKey) {
            alert('From Start Date cannot be after To Deadline Date.');
            return;
        }

        var rows = document.querySelectorAll('#projectsTableBody tr');
        rows.forEach(function(row) {
            var cust = row.getAttribute('data-customer') ? row.getAttribute('data-customer').toLowerCase() : '';
            var rowStartStr = row.cells[5] ? row.cells[5].textContent.trim() : '';
            var rowDeadStr = row.cells[6] ? row.cells[6].textContent.trim() : '';
            var rowStartKey = parseDmy(rowStartStr);
            var rowDeadKey = parseDmy(rowDeadStr);

            var matchesStaff = !staff || cust.indexOf(staff) > -1 || row.innerText.toLowerCase().indexOf(staff) > -1;
            var matchesFrom = !fromKey || (rowStartKey && rowStartKey >= fromKey);
            var matchesTo = !toKey || (rowDeadKey && rowDeadKey <= toKey);

            if (matchesStaff && matchesFrom && matchesTo) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    ['filterFromDate', 'filterToDate'].forEach(function(id) {
        var el = document.getElementById(id);
        if (el) {
            el.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') applyProjectFilters();
            });
        }
    });

    // Handle New Project Creation submit
    function handleCreateProject(e) {
        e.preventDefault();
        var name = document.getElementById('modalProjectName').value;
        var cust = document.getElementById('modalCustomer').value;
        var modalEl = document.getElementById('newProjectModal');
        var modal = bootstrap.Modal.getInstance(modalEl);
        if (modal) modal.hide();
        alert('Project "' + name + '" created successfully!');
    }

    // Reload Data
    function reloadTableData() {
        resetProjectFilters();
    }

    // Modal & Filter Select2 Binding
    if (typeof $ !== 'undefined' && $.fn.select2) {
        $('#filterStaff').select2({
            width: '100%',
            placeholder: 'All Staff / Customers',
            allowClear: true
        });

        $('.modal').on('shown.bs.modal', function () {
            var $m = $(this);
            $m.find('select.select2').each(function () {
                if ($(this).data('select2')) {
                    $(this).select2('destroy');
                }
                $(this).select2({
                    dropdownParent: $m,
                    width: '100%',
                    placeholder: $(this).attr('data-placeholder') || 'Select...'
                });
            });
        });
    }
