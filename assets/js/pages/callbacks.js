/**
 * Callbacks Page Module (callbacks.js)
 * Manages client callback requests, status updates, date filters, and modal lifecycle.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
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

        var cbModalEl = document.getElementById('cb5Modal');

        /* Pure Bootstrap 5 Toast Notification */
        var toastContainer = null;
        function showToast(msg, isWarn) {
            if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.className = 'toast-container position-fixed bottom-0 end-0 p-3';
                toastContainer.style.zIndex = '1090';
                document.body.appendChild(toastContainer);
            }
            var toastEl = document.createElement('div');
            toastEl.className = 'toast align-items-center text-bg-' + (isWarn ? 'warning' : 'primary') + ' border-0 shadow';
            toastEl.setAttribute('role', 'alert');
            toastEl.setAttribute('aria-live', 'assertive');
            toastEl.setAttribute('aria-atomic', 'true');
            toastEl.innerHTML = '<div class="d-flex"><div class="toast-body d-flex align-items-center gap-2"><i class="bi ' + (isWarn ? 'bi-exclamation-triangle-fill' : 'bi-check-circle-fill') + ' fs-5"></i><span>' + msg + '</span></div><button type="button" class="btn-close ' + (isWarn ? '' : 'btn-close-white') + ' me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
            toastContainer.appendChild(toastEl);
            var bsToast = new bootstrap.Toast(toastEl, { delay: 4000 });
            bsToast.show();
            toastEl.addEventListener('hidden.bs.toast', function () { toastEl.remove(); });
        }

        /* New Callback button */
        var newBtn = document.getElementById('cb5NewBtn');
        if (newBtn) {
            newBtn.addEventListener('click', function () {
                document.getElementById('cb5EditId').value = '';
                document.getElementById('cb5ModalTitle').textContent = 'New Callback';
                document.getElementById('cb5NmName').value = '';
                document.getElementById('cb5NmPhone').value = '';
                document.getElementById('cb5NmNote').value = '';

                if (document.getElementById('cb5NmFromDate')) document.getElementById('cb5NmFromDate').value = '28-09-2026';
                if (document.getElementById('cb5NmToDate')) document.getElementById('cb5NmToDate').value = '28-09-2026';
                if (document.getElementById('cb5NmFromTime')) document.getElementById('cb5NmFromTime').value = '10:30';
                if (document.getElementById('cb5NmToTime')) document.getElementById('cb5NmToTime').value = '11:00';
                if (document.getElementById('cb5NmRequested')) document.getElementById('cb5NmRequested').value = '28-09-2026';

                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#cb5NmTz').val('Asia/Kolkata (GMT+5:30)').trigger('change.select2');
                    jQuery('#cb5NmSource').val('Contact').trigger('change.select2');
                    jQuery('#cb5NmStatus').val('Upcoming').trigger('change.select2');
                    jQuery('#cb5NmPriority').val('Medium').trigger('change.select2');
                    jQuery('#cb5NmAssignees').val('Harish D.').trigger('change.select2');
                }

                if (cbModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(cbModalEl).show();
                }
            });
        }

        /* Table Row Actions (delegation) */
        var tbody = document.getElementById('cb5Tbody');
        if (tbody) {
            tbody.addEventListener('click', function (e) {
                var tr = e.target.closest('tr');
                if (!tr) return;

                var delBtn = e.target.closest('[data-cb5="del"]');
                if (delBtn) {
                    e.preventDefault();
                    var name = delBtn.getAttribute('data-name') || 'Callback';
                    if (confirm('Delete callback for "' + name + '"?')) {
                        tr.remove();
                        showToast('Callback "' + name + '" deleted successfully');
                    }
                    return;
                }

                var editBtn = e.target.closest('[data-cb5="edit"]');
                if (editBtn) {
                    e.preventDefault();
                    document.getElementById('cb5EditId').value = editBtn.getAttribute('data-id') || '';
                    document.getElementById('cb5ModalTitle').textContent = 'Edit Callback';
                    document.getElementById('cb5NmName').value = editBtn.getAttribute('data-name') || '';
                    document.getElementById('cb5NmPhone').value = editBtn.getAttribute('data-phone') || '';
                    document.getElementById('cb5NmNote').value = editBtn.getAttribute('data-note') || '';

                    var tz = editBtn.getAttribute('data-tz');
                    var src = editBtn.getAttribute('data-source');
                    var st = editBtn.getAttribute('data-status');
                    var pri = editBtn.getAttribute('data-priority');
                    var asg = editBtn.getAttribute('data-assignee');
                    var fromDate = editBtn.getAttribute('data-from-date') || '';
                    var toDate = editBtn.getAttribute('data-to-date') || fromDate;
                    var fromTime = editBtn.getAttribute('data-from-time') || '10:30';
                    var toTime = editBtn.getAttribute('data-to-time') || '11:00';
                    var reqDate = editBtn.getAttribute('data-req-date') || '';

                    if (document.getElementById('cb5NmFromDate')) document.getElementById('cb5NmFromDate').value = fromDate;
                    if (document.getElementById('cb5NmToDate')) document.getElementById('cb5NmToDate').value = toDate;
                    if (document.getElementById('cb5NmFromTime')) document.getElementById('cb5NmFromTime').value = fromTime;
                    if (document.getElementById('cb5NmToTime')) document.getElementById('cb5NmToTime').value = toTime;
                    if (document.getElementById('cb5NmRequested')) document.getElementById('cb5NmRequested').value = reqDate;

                    if (window.jQuery && jQuery.fn.select2) {
                        if (tz) jQuery('#cb5NmTz').val(tz).trigger('change.select2');
                        if (src) jQuery('#cb5NmSource').val(src).trigger('change.select2');
                        if (st) jQuery('#cb5NmStatus').val(st).trigger('change.select2');
                        if (pri) jQuery('#cb5NmPriority').val(pri).trigger('change.select2');
                        if (asg) jQuery('#cb5NmAssignees').val(asg).trigger('change.select2');
                    }

                    if (cbModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(cbModalEl).show();
                    }
                    return;
                }
            });

            /* Inline table select2 status change */
            if (window.jQuery) {
                jQuery(document).on('change', '.cb5-status-select', function () {
                    var sel = this;
                    var tr = sel.closest('tr');
                    if (!tr) return;
                    var name = tr.querySelector('.fw-bold') ? tr.querySelector('.fw-bold').textContent.trim() : 'Callback';
                    var val = sel.value;
                    tr.setAttribute('data-status', val);
                    showToast('"' + name + '" status changed to ' + val);
                });
            }
        }

        /* Modal Submit */
        var submitBtn = document.getElementById('cb5NmSubmit');
        if (submitBtn) {
            submitBtn.addEventListener('click', function () {
                var nm = document.getElementById('cb5NmName').value.trim();
                var ph = document.getElementById('cb5NmPhone').value.trim();
                if (!nm) {
                    showToast('Please enter the customer name', true);
                    return;
                }
                if (!ph) {
                    showToast('Please enter a phone number', true);
                    return;
                }
                if (cbModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(cbModalEl).hide();
                }
                showToast('Callback saved successfully');
            });
        }

        /* Date formatting helper DD-MM-YYYY -> YYYY-MM-DD */
        function parseDMY(str) {
            if (!str || str.length < 10) return null;
            var p = str.split('-');
            if (p.length !== 3) return null;
            return p[2] + '-' + p[1] + '-' + p[0];
        }

        /* Filter helper */
        function filterTableRows(attr, val) {
            var rows = document.querySelectorAll('#cb5Tbody tr');
            rows.forEach(function (tr) {
                if (!val) {
                    tr.style.display = '';
                } else if (tr.getAttribute('data-' + attr) === val) {
                    tr.style.display = '';
                } else {
                    tr.style.display = 'none';
                }
            });
        }

        /* Quick Filters */
        document.querySelectorAll('.cb5-quick-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var type = this.getAttribute('data-quick');
                document.querySelectorAll('.cb5-quick-btn').forEach(function (b) { b.classList.remove('active'); });
                if (type === 'reset') {
                    if (window.jQuery && jQuery.fn.select2) {
                        jQuery('#cb5Assignees, #cb5Status, #cb5Tz, #cb5Source').val('').trigger('change.select2');
                    }
                    var f1 = document.getElementById('cb5From');
                    var f2 = document.getElementById('cb5To');
                    if (f1) f1.value = '';
                    if (f2) f2.value = '';
                    filterTableRows('', '');
                    showToast('Filters reset');
                    return;
                }
                this.classList.add('active');
                if (type === 'upcoming') filterTableRows('status', 'Upcoming');
                else if (type === 'postponed') filterTableRows('status', 'Postponed');
                else if (type === 'todayCallback') filterTableRows('status', 'Upcoming');
                else if (type === 'datePassed') filterTableRows('status', 'Upcoming');
                showToast('Filtered by ' + this.textContent.trim());
            });
        });

        /* Summary Card Clicks */
        document.querySelectorAll('.cb5-sum').forEach(function (card) {
            card.addEventListener('click', function () {
                var st = this.getAttribute('data-sum-status');
                document.querySelectorAll('.cb5-sum').forEach(function (c) { c.classList.remove('active'); });
                this.classList.add('active');
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#cb5Status').val(st).trigger('change.select2');
                }
                filterTableRows('status', st);
                showToast('Filtered: ' + st);
            });
        });

        /* Search button with Date filtering */
        var searchBtn = document.getElementById('cb5SearchBtn');
        if (searchBtn) {
            searchBtn.addEventListener('click', function () {
                var st = document.getElementById('cb5Status') ? document.getElementById('cb5Status').value : '';
                var asg = document.getElementById('cb5Assignees') ? document.getElementById('cb5Assignees').value : '';
                var tz = document.getElementById('cb5Tz') ? document.getElementById('cb5Tz').value : '';
                var src = document.getElementById('cb5Source') ? document.getElementById('cb5Source').value : '';
                var fromVal = document.getElementById('cb5From') ? document.getElementById('cb5From').value.trim() : '';
                var toVal = document.getElementById('cb5To') ? document.getElementById('cb5To').value.trim() : '';

                var fromIso = parseDMY(fromVal);
                var toIso = parseDMY(toVal);

                var rows = document.querySelectorAll('#cb5Tbody tr');
                var count = 0;
                rows.forEach(function (tr) {
                    var match = true;
                    if (st && tr.getAttribute('data-status') !== st) match = false;
                    if (asg && tr.getAttribute('data-assignee') !== asg) match = false;
                    if (tz && tr.getAttribute('data-tz') !== tz) match = false;
                    if (src && tr.getAttribute('data-source') !== src) match = false;

                    var rowDate = tr.getAttribute('data-from-date') || '';
                    var rowIso = parseDMY(rowDate);
                    if (rowIso) {
                        if (fromIso && rowIso < fromIso) match = false;
                        if (toIso && rowIso > toIso) match = false;
                    }

                    tr.style.display = match ? '' : 'none';
                    if (match) count++;
                });
                showToast(count + ' callbacks found');
            });
        }

        /* Clear button */
        var clearBtn = document.getElementById('cb5ClearBtn');
        if (clearBtn) {
            clearBtn.addEventListener('click', function () {
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery('#cb5Assignees, #cb5Status, #cb5Tz, #cb5Source').val('').trigger('change.select2');
                }
                var f1 = document.getElementById('cb5From');
                var f2 = document.getElementById('cb5To');
                if (f1) f1.value = '';
                if (f2) f2.value = '';
                document.querySelectorAll('.cb5-quick-btn').forEach(function (b) { b.classList.remove('active'); });
                document.querySelectorAll('.cb5-sum').forEach(function (c) { c.classList.remove('active'); });
                filterTableRows('', '');
                showToast('Filters cleared');
            });
        }

        /* Check URL parameter ?new=1 */
        if (new URLSearchParams(window.location.search).get('new') === '1') {
            if (newBtn) newBtn.click();
        }
    });
})();
