/**
 * Appointments Page Module (appointments.js)
 * Manages appointments table filtering, row actions, quill editors, modal handlers, and task creation.
 */
(function () {
    'use strict';

    var summaryFilter = 'all';
    var statusFilterVal = '';
    var dateRangeFrom = '';
    var dateRangeTo = '';

    /* External filter matcher used automatically by auto-master-table.js */
    window.attendanceRowMatches = function (tr) {
        if (!tr || tr.classList.contains('no-record-row')) return true;
        if (tr.closest('#apmAppointmentsTable')) {
            var st = tr.getAttribute('data-status') || '';
            var src = tr.getAttribute('data-source') || '';
            var app = tr.getAttribute('data-approved') === '1';
            var dVal = tr.getAttribute('data-date') || '';

            if (dateRangeFrom && dVal && dVal < dateRangeFrom) return false;
            if (dateRangeTo && dVal && dVal > dateRangeTo) return false;

            if (summaryFilter === 'upcoming' && st !== 'Scheduled') return false;
            if (summaryFilter === 'pending' && st !== 'Pending Approval') return false;
            if (summaryFilter === 'cancelled' && st !== 'Cancelled') return false;
            if (summaryFilter === 'missed' && st !== 'Missed') return false;
            if (summaryFilter === 'finished' && st !== 'Finished') return false;

            if (statusFilterVal) {
                if (statusFilterVal === 'Approved' && !app) return false;
                if (statusFilterVal === 'Upcoming' && st !== 'Scheduled') return false;
                if (statusFilterVal === 'Internal' && src !== 'Internal') return false;
                if (statusFilterVal === 'External' && src !== 'External') return false;
                if (statusFilterVal === 'Lead' && src !== 'Lead') return false;
                if (statusFilterVal !== 'Approved' && statusFilterVal !== 'Upcoming' && statusFilterVal !== 'Internal' && statusFilterVal !== 'External' && statusFilterVal !== 'Lead' && st !== statusFilterVal) return false;
            }
            return true;
        }
        return true;
    };

    function refreshTable() {
        var tableEl = document.getElementById('apmAppointmentsTable');
        if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.render === 'function') {
            tableEl.autoTable.render();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var tableEl = document.getElementById('apmAppointmentsTable');
        if (window.AutoMasterTable && tableEl && !tableEl.autoTable) {
            window.AutoMasterTable.init(tableEl);
        }

        var contactModalEl = document.getElementById('apmContactModal');
        var staffModalEl = document.getElementById('apmStaffModal');
        var viewModalEl = document.getElementById('apmViewModal');
        var editModalEl = document.getElementById('apmEditModal');
        var newTaskModalEl = document.getElementById('apmNewTaskModal');
        var newLeadModalEl = document.getElementById('newLeadModal');

        var ctQuill = null, stQuill = null, edQuill = null;
        function initQuills() {
            if (typeof Quill === 'undefined') return;
            var toolbarOpts = [
                [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline'],
                [{ align: [] }],
                [{ list: 'bullet' }, { list: 'ordered' }],
                ['link'], ['clean']
            ];
            if (!ctQuill && document.querySelector('#apmCtQuill')) {
                ctQuill = new Quill('#apmCtQuill', { theme: 'snow', placeholder: 'Write appointment notes here...', modules: { toolbar: toolbarOpts } });
            }
            if (!stQuill && document.querySelector('#apmStQuill')) {
                stQuill = new Quill('#apmStQuill', { theme: 'snow', placeholder: 'Write appointment notes here...', modules: { toolbar: toolbarOpts } });
            }
            if (!edQuill && document.querySelector('#apmEdQuill')) {
                edQuill = new Quill('#apmEdQuill', { theme: 'snow', placeholder: 'Write appointment notes here...', modules: { toolbar: toolbarOpts } });
                edQuill.root.innerHTML = '<p>Customer requested quotation and demonstration for HRMS package.</p>';
            }
        }

        if (contactModalEl) contactModalEl.addEventListener('shown.bs.modal', initQuills);
        if (staffModalEl) staffModalEl.addEventListener('shown.bs.modal', initQuills);
        if (editModalEl) editModalEl.addEventListener('shown.bs.modal', initQuills);

        /* Table Row Actions */
        var tbody = document.getElementById('apmAppointmentsTbody');
        if (tbody) {
            tbody.addEventListener('click', function (e) {
                var tr = e.target.closest('tr');
                if (!tr) return;

                var del = e.target.closest('.apm-delete-btn');
                if (del) {
                    e.preventDefault();
                    if (tableEl && tableEl.autoTable && typeof tableEl.autoTable.deleteRow === 'function') {
                        tableEl.autoTable.deleteRow(tr);
                    } else {
                        tr.remove();
                    }
                    return;
                }

                var view = e.target.closest('.apm-view-btn') || e.target.closest('.apm-subject-link');
                if (view) {
                    e.preventDefault();
                    var subj = tr.querySelector('.apm-subject-link') ? tr.querySelector('.apm-subject-link').textContent.trim() : 'Appointment';
                    var dt = tr.querySelector('.apm-date-chip') ? tr.querySelector('.apm-date-chip').textContent.trim() : '';
                    var st = tr.getAttribute('data-status') || 'SCHEDULED';
                    var src = tr.getAttribute('data-source') || 'Lead';
                    var init = tr.querySelector('.apm-initiated') ? tr.querySelector('.apm-initiated').textContent.trim() : 'Staff';

                    var statusEl = document.getElementById('apmViewStatus');
                    if (statusEl) {
                        statusEl.textContent = st.toUpperCase();
                        var badgeCls = st === 'Finished' ? 'bg-success-subtle text-success border-success-subtle' :
                                       (st === 'Missed' ? 'bg-warning-subtle text-warning border-warning-subtle' :
                                       (st === 'Cancelled' ? 'bg-danger-subtle text-danger border-danger-subtle' :
                                       (st === 'Pending Approval' ? 'bg-info-subtle text-info border-info-subtle' : 'bg-primary-subtle text-primary border-primary-subtle')));
                        statusEl.className = 'badge border px-3 py-2 fs-6 ' + badgeCls;
                    }
                    if (document.getElementById('apmViewSubject')) document.getElementById('apmViewSubject').textContent = subj;
                    if (document.getElementById('apmViewDate')) document.getElementById('apmViewDate').textContent = dt;
                    if (document.getElementById('apmViewInitiated')) document.getElementById('apmViewInitiated').textContent = init;
                    if (document.getElementById('apmViewSource')) document.getElementById('apmViewSource').textContent = src;
                    if (viewModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(viewModalEl).show();
                    }
                    return;
                }

                var edit = e.target.closest('.apm-edit-btn');
                if (edit) {
                    e.preventDefault();
                    var editSubj = tr.querySelector('.apm-subject-link') ? tr.querySelector('.apm-subject-link').textContent.trim() : '';
                    if (document.getElementById('apmEdSubject')) document.getElementById('apmEdSubject').value = editSubj;
                    if (editModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(editModalEl).show();
                    }
                    return;
                }

                var task = e.target.closest('.apm-newtask-btn');
                if (task) {
                    e.preventDefault();
                    var taskSubj = tr.querySelector('.apm-subject-link') ? tr.querySelector('.apm-subject-link').textContent.trim() : '';
                    var atkSubj = document.getElementById('atkSubject');
                    if (atkSubj) atkSubj.value = taskSubj;
                    if (newTaskModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(newTaskModalEl).show();
                    }
                    return;
                }

                var convert = e.target.closest('.apm-convert-btn');
                if (convert) {
                    e.preventDefault();
                    if (newLeadModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(newLeadModalEl).show();
                    }
                    return;
                }

                var pill = e.target.closest('.apm-status-pill');
                if (pill) {
                    e.preventDefault();
                    var cur = pill.getAttribute('data-status');
                    var next = cur === 'Missed' ? 'Finished' : (cur === 'Pending Approval' ? 'Finished' : (cur === 'Cancelled' ? 'Scheduled' : cur));
                    pill.setAttribute('data-status', next);
                    pill.textContent = next.toUpperCase() + ' ▾';
                    tr.setAttribute('data-status', next);
                }
            });
        }

        /* Date Range Picker Filter */
        var rangeInput = document.getElementById('apmDateRangeFilter');
        if (rangeInput) {
            function parseRange() {
                var val = rangeInput.value.trim();
                var parts = val.split(' to ');
                function toISO(dStr) {
                    if (!dStr) return '';
                    var p = dStr.trim().split('-');
                    if (p.length === 3 && p[2].length === 4) {
                        return p[2] + '-' + p[1] + '-' + p[0];
                    }
                    return '';
                }
                if (parts.length === 2) {
                    dateRangeFrom = toISO(parts[0]);
                    dateRangeTo = toISO(parts[1]);
                } else if (parts.length === 1 && parts[0] && parts[0].length === 10) {
                    dateRangeFrom = toISO(parts[0]);
                    dateRangeTo = toISO(parts[0]);
                } else {
                    dateRangeFrom = '';
                    dateRangeTo = '';
                }
                refreshTable();
            }
            rangeInput.addEventListener('input', parseRange);
            rangeInput.addEventListener('change', parseRange);
        }

        /* Summary Chips Filtering */
        document.querySelectorAll('.apm-chip').forEach(function (chip) {
            chip.addEventListener('click', function () {
                document.querySelectorAll('.apm-chip').forEach(function (c) { c.classList.remove('active'); });
                chip.classList.add('active');
                summaryFilter = chip.getAttribute('data-summary') || 'all';
                refreshTable();
            });
        });

        /* Status Filter Menu */
        var filterBtn = document.getElementById('apmFilterBtn');
        var filterMenu = document.getElementById('apmFilterMenu');
        if (filterBtn && filterMenu) {
            filterBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                filterMenu.classList.toggle('show');
            });
            document.addEventListener('click', function () {
                filterMenu.classList.remove('show');
            });
            filterMenu.querySelectorAll('.apm-list-item').forEach(function (item) {
                item.addEventListener('click', function () {
                    filterMenu.querySelectorAll('.apm-list-item').forEach(function (i) { i.classList.remove('active'); });
                    item.classList.add('active');
                    statusFilterVal = item.getAttribute('data-status-filter') || '';
                    filterBtn.classList.toggle('has-filter', statusFilterVal !== '');
                    refreshTable();
                });
            });
        }

        /* Bootstrap Modal Select2 dropdownParent binding */
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $('.modal').on('shown.bs.modal', function () {
                var $m = $(this);
                $m.find('select.select2').each(function () {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                    $(this).select2({
                        dropdownParent: $m,
                        width: '100%'
                    });
                });
            });
        }

        /* Create Segment Dropdown */
        var newDropBtn = document.getElementById('apmNewDropBtn');
        var createMenu = document.getElementById('apmCreateMenu');
        if (newDropBtn && createMenu) {
            newDropBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                createMenu.classList.toggle('show');
            });
            document.addEventListener('click', function () {
                createMenu.classList.remove('show');
            });
            createMenu.querySelectorAll('[data-create-type]').forEach(function (item) {
                item.addEventListener('click', function () {
                    createMenu.classList.remove('show');
                    if (item.getAttribute('data-create-type') === 'staff') {
                        if (staffModalEl) bootstrap.Modal.getOrCreateInstance(staffModalEl).show();
                    } else {
                        if (contactModalEl) bootstrap.Modal.getOrCreateInstance(contactModalEl).show();
                    }
                });
            });
        }

        /* Modal Submissions */
        var forms = ['apmCtSubmit', 'apmStSubmit', 'apmEdSubmit', 'atkTaskSubmit'];
        forms.forEach(function (btnId) {
            var btn = document.getElementById(btnId);
            if (btn) {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    var modal = btn.closest('.modal');
                    if (modal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(modal).hide();
                    }
                });
            }
        });

        var nlForm = document.getElementById('newLeadForm');
        if (nlForm) {
            nlForm.addEventListener('submit', function (e) {
                e.preventDefault();
                if (newLeadModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(newLeadModalEl).hide();
                }
            });
        }
    });
})();
