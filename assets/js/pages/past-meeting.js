/**
 * Gharuda CRM - Past Meeting Page Script
 * File: assets/js/pages/past-meeting.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
        'use strict';

        document.addEventListener('DOMContentLoaded', function () {
            var tableEl = document.getElementById('pm5Table');
            if (window.AutoMasterTable && tableEl && !tableEl.autoTable) {
                window.AutoMasterTable.init(tableEl);
            }

            /* Select2 inside modal binding */
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('.modal').on('shown.bs.modal', function () {
                    var $m = $(this);
                    $m.find('select.select2').each(function () {
                        if ($(this).data('select2')) $(this).select2('destroy');
                        $(this).select2({
                            dropdownParent: $m,
                            width: '100%'
                        });
                    });
                });
            }

            /* Modals */
            var viewModalEl = document.getElementById('pm5ViewModal');
            var editModalEl = document.getElementById('pm5EditModal');
            var edQuill = null;

            function initEditQuill() {
                if (edQuill || typeof Quill === 'undefined' || !document.querySelector('#pm5EdQuill')) return;
                edQuill = new Quill('#pm5EdQuill', {
                    theme: 'snow',
                    placeholder: 'Write appointment notes here...',
                    modules: {
                        toolbar: [
                            [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                            ['bold', 'italic', 'underline'],
                            [{ align: [] }],
                            [{ list: 'bullet' }, { list: 'ordered' }],
                            ['link'], ['clean']
                        ]
                    }
                });
                edQuill.root.innerHTML = '<p>Sample appointment notes for past meeting record.</p>';
            }

            if (editModalEl) {
                editModalEl.addEventListener('shown.bs.modal', function () {
                    setTimeout(initEditQuill, 100);
                });
            }

            /* Pure Bootstrap 5 Toast Notification */
            var toastContainer = null;
            function showToast(msg) {
                if (!toastContainer) {
                    toastContainer = document.createElement('div');
                    toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
                    toastContainer.style.zIndex = '1090';
                    document.body.appendChild(toastContainer);
                }
                var toastEl = document.createElement('div');
                toastEl.className = 'toast align-items-center text-bg-primary border-0 shadow';
                toastEl.setAttribute('role', 'alert');
                toastEl.setAttribute('aria-live', 'assertive');
                toastEl.setAttribute('aria-atomic', 'true');
                toastEl.innerHTML = '<div class="d-flex"><div class="toast-body d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill fs-5"></i><span>' + msg + '</span></div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
                toastContainer.appendChild(toastEl);
                var bsToast = new bootstrap.Toast(toastEl, { delay: 4000 });
                bsToast.show();
                toastEl.addEventListener('hidden.bs.toast', function () { toastEl.remove(); });
            }

            /* Table Row Action Delegation */
            var tbody = document.getElementById('pm5Tbody');
            if (tbody) {
                tbody.addEventListener('click', function (e) {
                    var tr = e.target.closest('tr');
                    if (!tr) return;

                    var viewBtn = e.target.closest('[data-pm5="view"]') || e.target.closest('.pm5-subject-link');
                    if (viewBtn) {
                        e.preventDefault();
                        var subj = tr.querySelector('.pm5-subject-link') ? tr.querySelector('.pm5-subject-link').textContent.trim() : 'Meeting';
                        var st = tr.getAttribute('data-status') || 'FINISHED';
                        var dt = tr.querySelector('.pm5-date-chip') ? tr.querySelector('.pm5-date-chip').textContent.trim() : '';
                        var init = tr.querySelector('.pm5-initiated') ? tr.querySelector('.pm5-initiated').textContent.trim() : '';
                        var desc = tr.querySelector('.pm5-desc') ? tr.querySelector('.pm5-desc').textContent.trim() : '';
                        var src = tr.getAttribute('data-source') || '';
                        var cal = tr.querySelector('.pm5-cal-note') ? tr.querySelector('.pm5-cal-note').textContent.trim() : '';

                        if (document.getElementById('pm5ViewSubject')) document.getElementById('pm5ViewSubject').textContent = subj;
                        if (document.getElementById('pm5ViewSubjectTitle')) document.getElementById('pm5ViewSubjectTitle').textContent = subj;
                        if (document.getElementById('pm5ViewStatus')) {
                            var statusEl = document.getElementById('pm5ViewStatus');
                            statusEl.textContent = st.toUpperCase();
                            var badgeColor = st === 'Finished' ? 'bg-success-subtle text-success border-success-subtle' : (st === 'Missed' ? 'bg-warning-subtle text-warning border-warning-subtle' : 'bg-danger-subtle text-danger border-danger-subtle');
                            statusEl.className = 'badge border px-3 py-2 fs-6 ' + badgeColor;
                        }
                        if (document.getElementById('pm5ViewDate')) document.getElementById('pm5ViewDate').textContent = dt;
                        if (document.getElementById('pm5ViewInitiated')) document.getElementById('pm5ViewInitiated').textContent = init;
                        if (document.getElementById('pm5ViewDesc')) document.getElementById('pm5ViewDesc').textContent = desc;
                        if (document.getElementById('pm5ViewSource')) document.getElementById('pm5ViewSource').textContent = src;
                        if (document.getElementById('pm5ViewCalendar')) document.getElementById('pm5ViewCalendar').textContent = cal;

                        if (viewModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(viewModalEl).show();
                        }
                        return;
                    }

                    var editBtn = e.target.closest('[data-pm5="edit"]');
                    if (editBtn) {
                        e.preventDefault();
                        var editSubj = tr.querySelector('.pm5-subject-link') ? tr.querySelector('.pm5-subject-link').textContent.trim() : '';
                        var editDesc = tr.querySelector('.pm5-desc') ? tr.querySelector('.pm5-desc').textContent.trim() : '';
                        if (document.getElementById('pm5EdSubject')) document.getElementById('pm5EdSubject').value = editSubj;
                        if (document.getElementById('pm5EdDesc')) document.getElementById('pm5EdDesc').value = editDesc;
                        if (editModalEl && typeof bootstrap !== 'undefined') {
                            bootstrap.Modal.getOrCreateInstance(editModalEl).show();
                        }
                        return;
                    }

                    var fbBtn = e.target.closest('[data-pm5="feedback"]');
                    if (fbBtn) {
                        e.preventDefault();
                        showToast('Feedback was successfully requested. You will be notified by email if feedback is given!');
                        return;
                    }
                });
            }

            /* Edit submit */
            var edSubmit = document.getElementById('pm5EdSubmit');
            if (edSubmit) {
                edSubmit.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (editModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(editModalEl).hide();
                        showToast('Appointment updated successfully');
                    }
                });
            }
        });
    })();
