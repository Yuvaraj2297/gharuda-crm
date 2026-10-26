/**
 * Gharuda CRM - Recruitment Report Page Script
 * File: assets/js/pages/recruitment-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
        const datePresetSelect = document.getElementById('datePresetSelect');
        const fromDateInput = document.getElementById('fromDate');
        const toDateInput = document.getElementById('toDate');
        const statusFilterSelect = document.getElementById('statusFilterSelect');
        const btnFilterApply = document.getElementById('btnFilterApply');
        const btnFilterReset = document.getElementById('btnFilterReset');
        const filterBadge = document.getElementById('filterStatusBadge');

        // Preset Date Handler
        if (datePresetSelect) {
            datePresetSelect.addEventListener('change', function () {
                const val = this.value;
                const today = new Date();

                if (val === 'last_month') {
                    // August 2026 (Last Month)
                    fromDateInput.value = '2026-08-01';
                    toDateInput.value = '2026-08-31';
                } else if (val === 'this_month') {
                    // September 2026 (This Month)
                    fromDateInput.value = '2026-09-01';
                    toDateInput.value = '2026-09-30';
                } else if (val === 'last_30') {
                    // Last 30 Days
                    const prior30 = new Date(today);
                    prior30.setDate(prior30.getDate() - 30);
                    fromDateInput.value = prior30.toISOString().split('T')[0];
                    toDateInput.value = today.toISOString().split('T')[0];
                } else if (val === 'all') {
                    fromDateInput.value = '';
                    toDateInput.value = '';
                }
                applyFilters();
            });
        }

        function applyFilters() {
            const fromVal = fromDateInput.value ? new Date(fromDateInput.value) : null;
            const toVal = toDateInput.value ? new Date(toDateInput.value + 'T23:59:59') : null;
            const statusVal = statusFilterSelect.value;

            let visibleCount = 0;
            let hiredCount = 0;
            let onboardingCount = 0;
            let waitingCount = 0;

            const rows = document.querySelectorAll('.report-row');
            rows.forEach(row => {
                const rowStatus = row.getAttribute('data-status') || '';
                const rowDateStr = row.getAttribute('data-date') || '';
                const rowDate = rowDateStr ? new Date(rowDateStr) : null;

                let matchesDate = true;
                if (fromVal && rowDate && rowDate < fromVal) matchesDate = false;
                if (toVal && rowDate && rowDate > toVal) matchesDate = false;

                let matchesStatus = true;
                if (statusVal !== 'all' && rowStatus !== statusVal) matchesStatus = false;

                if (matchesDate && matchesStatus) {
                    row.style.display = '';
                    visibleCount++;
                    if (rowStatus === 'Hired') hiredCount++;
                    if (rowStatus === 'Onboarding') onboardingCount++;
                    if (rowStatus === 'Waiting List') waitingCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Update S.No for visible rows
            let sno = 1;
            rows.forEach(row => {
                if (row.style.display !== 'none') {
                    const snoCell = row.querySelector('.row-sno');
                    if (snoCell) snoCell.textContent = sno++;
                }
            });

            // Update KPIs
            document.getElementById('kpiHiredCount').textContent = hiredCount;
            document.getElementById('kpiOnboardingCount').textContent = onboardingCount;
            document.getElementById('kpiWaitingCount').textContent = waitingCount;
            document.getElementById('kpiTotalRecords').textContent = visibleCount;

            // Update badge text
            let presetText = datePresetSelect.options[datePresetSelect.selectedIndex]?.text || 'Filtered';
            let statusText = statusFilterSelect.options[statusFilterSelect.selectedIndex]?.text || 'All Statuses';
            filterBadge.textContent = `Filtered: ${presetText} • ${statusText}`;
        }

        if (btnFilterApply) {
            btnFilterApply.addEventListener('click', applyFilters);
        }

        if (btnFilterReset) {
            btnFilterReset.addEventListener('click', function () {
                datePresetSelect.value = 'all';
                fromDateInput.value = '';
                toDateInput.value = '';
                statusFilterSelect.value = 'all';
                applyFilters();
            });
        }

        // Initial filter execution
        applyFilters();
    });
