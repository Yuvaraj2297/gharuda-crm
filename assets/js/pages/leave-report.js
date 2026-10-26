/**
 * Gharuda CRM - Leave Report Page Script
 * File: assets/js/pages/leave-report.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var trigger = document.getElementById('mtExportTrigger');
        var dropdown = document.getElementById('mtExportDropdown');
        if (!trigger || !dropdown) return;

        function position() {
            if (!dropdown.classList.contains('show')) return;
            var r = trigger.getBoundingClientRect(),
                dw = dropdown.offsetWidth || 160,
                dh = dropdown.offsetHeight || 200;
            var left = r.left + (r.width / 2) - (dw / 2);
            left = Math.max(8, Math.min(left, window.innerWidth - dw - 8));
            var top = r.bottom + 6;
            if (top + dh > window.innerHeight - 8) top = r.top - dh - 6;
            dropdown.style.left = left + 'px';
            dropdown.style.top = Math.max(8, top) + 'px';
        }

        function close() {
            dropdown.classList.remove('show');
            trigger.setAttribute('aria-expanded', 'false');
        }
        trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelectorAll('.mt-export-dropdown.show').forEach(function(d) {
                d.classList.remove('show');
            });
            if (!dropdown.classList.contains('show')) {
                dropdown.classList.add('show');
                trigger.setAttribute('aria-expanded', 'true');
                position();
            } else close();
        });
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && e.target !== trigger) close();
        });
        window.addEventListener('resize', position);
        window.addEventListener('scroll', position, true);

        function getTableData() {
            var table = document.querySelector('.js-report-table table');
            if (!table) return null;
            var headers = [];
            table.querySelectorAll('thead th').forEach(function(th) {
                headers.push(th.textContent.trim());
            });
            var rows = [];
            table.querySelectorAll('tbody tr').forEach(function(tr) {
                if (tr.style.display === 'none' || tr.classList.contains('no-record-row')) return;
                var cells = [];
                tr.querySelectorAll('td').forEach(function(td) {
                    cells.push(td.textContent.trim());
                });
                if (cells.length) rows.push(cells);
            });
            return {
                headers: headers,
                rows: rows
            };
        }

        function toCSV(data) {
            return data.headers.map(function(h) {
                    return '"' + h.replace(/"/g, '""') + '"';
                }).join(',') + '\n' +
                data.rows.map(function(r) {
                    return r.map(function(c) {
                        return '"' + c.replace(/"/g, '""') + '"';
                    }).join(',');
                }).join('\n');
        }

        function download(filename, content, mime) {
            var blob = new Blob([content], {
                type: mime
            });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = filename;
            a.click();
        }

        function printTable() {
            var table = document.querySelector('.js-report-table table');
            if (!table) return;
            var w = window.open('');
            w.document.write('<html><head><title>Leave Report</title><style>table{border-collapse:collapse;width:100%}th,td{border:1px solid #ddd;padding:8px;text-align:left;font-size:12px}th{background:#f5f5f5}</style></head><body>' + table.outerHTML + '</body></html>');
            w.document.close();
            w.print();
        }
        var copyBtn = document.getElementById('mtCopyBtn');
        var csvBtn = document.getElementById('mtCsvBtn');
        var excelBtn = document.getElementById('mtExcelBtn');
        var pdfBtn = document.getElementById('mtPdfBtn');
        var printBtn = document.getElementById('mtPrintBtn');
        if (copyBtn) copyBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d) return;
            var text = d.headers.join('\t') + '\n' + d.rows.map(function(r) {
                return r.join('\t');
            }).join('\n');
            navigator.clipboard.writeText(text);
            close();
        });
        if (csvBtn) csvBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d) return;
            download('leave-report.csv', toCSV(d), 'text/csv');
            close();
        });
        if (excelBtn) excelBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d) return;
            var html = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel"><head><meta charset="UTF-8"></head><body><table>' + document.querySelector('.js-report-table table').outerHTML + '</table></body></html>';
            download('leave-report.xls', html, 'application/vnd.ms-excel');
            close();
        });
        if (pdfBtn) pdfBtn.addEventListener('click', function() {
            var d = getTableData();
            if (!d || typeof pdfMake === 'undefined') {
                alert('PDF library not loaded.');
                return;
            }
            var body = [d.headers];
            d.rows.forEach(function(r) {
                body.push(r);
            });
            pdfMake.createPdf({
                content: [{
                    table: {
                        headerRows: 1,
                        widths: 'auto',
                        body: body
                    }
                }],
                defaultStyle: {
                    fontSize: 10
                }
            }).download('leave-report.pdf');
            close();
        });
        if (printBtn) printBtn.addEventListener('click', function() {
            printTable();
            close();
        });
    });

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var dateInput = document.getElementById('leaveDateSelect'),
            rows = Array.from(document.querySelectorAll('.leave-row')),
            rejectModal = document.getElementById('leaveRejectModal'),
            rejectRow = null,
            selectedDate = '',
            rangeStart = '',
            rangeEnd = '',
            appliedSearch = '',
            appliedType = 'All Types',
            appliedStatus = 'All Status';

        function iso(value) {
            var p = value.split('-');
            return p.length === 3 ? p[2] + '-' + p[1] + '-' + p[0] : '';
        }

        function range(value) {
            var p = value.split(' to ').map(iso).filter(Boolean);
            return {
                start: p[0] || '',
                end: p[1] || p[0] || ''
            };
        }

        window.attendanceRowMatches = function(row) {
            var search = appliedSearch.toLowerCase().trim();
            var dateMatch = rangeStart ? row.dataset.date >= rangeStart && row.dataset.date <= rangeEnd : (!selectedDate || row.dataset.date === selectedDate);
            return dateMatch && (!search || row.textContent.toLowerCase().includes(search)) &&
                (appliedType === 'All Types' || row.dataset.type === appliedType) &&
                (appliedStatus === 'All Status' || row.dataset.status === appliedStatus);
        };

        // Find a table row by employee id + from-date (buttons live in a teleported dropdown on <body>,
        // so closest('.leave-row') does not work from them)
        function findRowByEmp(empId, fromDate) {
            var found = null;
            document.querySelectorAll('.leave-row').forEach(function(r) {
                if (r.dataset.empid !== empId || r.dataset.date !== fromDate) return;
                // Prefer the Pending row — partial approve only applies to pending requests
                if (!found || (r.dataset.status === 'Pending' && found.dataset.status !== 'Pending')) found = r;
            });
            return found;
        }

        function refreshTable() {
            if (window.refreshAttendanceTable) window.refreshAttendanceTable();
        }

        function updateActionState(row) {
            var status = row.dataset.status;
            var profileMenu = row.querySelector('.leave-action-profile');
            var toggle = profileMenu.querySelector('.menu-trigger');
            var menu = profileMenu.querySelector('.leave-action-menu');
            var approveAction = menu.querySelector('.approve-action');
            var rejectAction = menu.querySelector('.reject-action');
            var viewReasonAction = menu.querySelector('.view-reason-action');

            var isPending = status === 'Pending';
            var isRejected = status === 'Rejected';
            // Partial rows have status='Approved' but their text contains 'Partial ('
            var statusText = row.querySelector('.leave-status') ? row.querySelector('.leave-status').textContent : '';
            var isPartial = /partial/i.test(statusText);
            var isReviewed = isRejected || isPartial;

            // Enable actions for pending, rejected, and partial status
            toggle.disabled = !isPending && !isReviewed;
            toggle.classList.toggle('leave-action-disabled', !isPending && !isReviewed);
            toggle.title = isPending ? 'Review request' : (isReviewed ? 'View rejection reason' : 'Action unavailable for ' + status + ' request');
            menu.hidden = !isPending && !isReviewed;

            // Show/hide actions based on status
            // NOTE: hidden attribute is required because app.css forces .leave-action-item { display: flex !important }
            // which overrides inline style.display — the [hidden] selector beats it via !important in the page CSS.
            var partialAction = menu.querySelector('.partial-approve-action');
            var rowDays = parseInt(row.querySelector('td.fw-bold') ? row.querySelector('td.fw-bold').textContent.trim() : '1', 10);
            if (approveAction) {
                approveAction.hidden = !isPending;
                approveAction.style.display = isPending ? 'block' : 'none';
            }
            if (partialAction) {
                partialAction.hidden = !(isPending && rowDays > 1);
                partialAction.style.display = (isPending && rowDays > 1) ? 'block' : 'none';
            }
            if (rejectAction) {
                rejectAction.hidden = !isPending;
                rejectAction.style.display = isPending ? 'block' : 'none';
            }
            if (viewReasonAction) {
                viewReasonAction.hidden = !isReviewed;
                viewReasonAction.style.display = isReviewed ? 'block' : 'none';
            }

            if (!isPending && !isReviewed) {
                menu.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
            }
        }

        rows.forEach(updateActionState);

        function closeRejectModal() {
            rejectModal.classList.remove('show');
            document.getElementById('leaveRejectReason').value = '';
            document.getElementById('leaveRejectError').hidden = true;
            rejectRow = null;
        }

        document.querySelectorAll('.approve-action').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!row) return;
                row.dataset.status = 'Approved';
                row.querySelector('.leave-status').className = 'leave-status approved';
                row.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Approved';
                updateActionState(row);
                refreshTable();
            });
        });

        document.addEventListener('click', function(event) {
            document.querySelectorAll('.leave-action-profile').forEach(function(profileMenu) {
                if (!profileMenu.contains(event.target)) {
                    profileMenu.querySelector('.leave-action-menu').classList.remove('open');
                    profileMenu.querySelector('.menu-trigger').setAttribute('aria-expanded', 'false');
                }
            });
        });

        document.querySelectorAll('.reject-action').forEach(function(button) {
            button.addEventListener('click', function() {
                rejectRow = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!rejectRow) return;
                document.getElementById('leaveRejectEmployee').textContent = button.dataset.employee;
                rejectModal.classList.add('show');
                document.getElementById('leaveRejectReason').focus();
            });
        });

        document.getElementById('leaveRejectSubmit').addEventListener('click', function() {
            var reason = document.getElementById('leaveRejectReason').value.trim();
            if (!reason || !rejectRow) {
                document.getElementById('leaveRejectError').hidden = false;
                return;
            }
            rejectRow.dataset.status = 'Rejected';
            rejectRow.dataset.rejectionReason = reason;
            rejectRow.querySelector('.leave-status').className = 'leave-status rejected';
            rejectRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Rejected';

            // Update the view reason button with the rejection reason
            var viewReasonBtn = rejectRow.querySelector('.view-reason-action');
            if (viewReasonBtn) {
                viewReasonBtn.dataset.reason = reason;
            }

            updateActionState(rejectRow);
            closeRejectModal();
            refreshTable();
        });

        document.getElementById('leaveRejectClose').addEventListener('click', closeRejectModal);
        document.getElementById('leaveRejectCancel').addEventListener('click', closeRejectModal);
        rejectModal.addEventListener('click', function(event) {
            if (event.target === rejectModal) closeRejectModal();
        });

        // View reason modal functionality
        var viewReasonModal = document.getElementById('leaveViewReasonModal');

        function closeViewReasonModal() {
            viewReasonModal.classList.remove('show');
        }

        document.querySelectorAll('.view-reason-action').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!row) return;
                var rejectionReason = row.dataset.rejectionReason || button.dataset.reason || 'No rejection reason provided';
                document.getElementById('leaveViewReasonEmployee').textContent = button.dataset.employee;
                document.getElementById('leaveViewReasonText').textContent = rejectionReason;
                viewReasonModal.classList.add('show');
            });
        });

        document.getElementById('leaveViewReasonClose').addEventListener('click', closeViewReasonModal);
        document.getElementById('leaveViewReasonOk').addEventListener('click', closeViewReasonModal);
        viewReasonModal.addEventListener('click', function(event) {
            if (event.target === viewReasonModal) closeViewReasonModal();
        });

        // ===== Partial Approval =====
        // ===== Partial Approval — Per-Day Cards =====
        var partialModal = document.getElementById('partialApproveModal');
        var partialRow = null;
        var partialTotal = 0;
        var partialDayStatuses = []; // array of 'approved' | 'rejected' | 'pending'
        var partialDayReasons = []; // per-day rejection reason text
        var weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        function openPartialModal(row) {
            partialRow = row;
            var name = row.querySelector('.person-name') ? row.querySelector('.person-name').textContent.trim() : '';
            var type = row.dataset.type || '';
            var from = row.dataset.date || '';
            var daysCell = row.querySelector('td.fw-bold');
            partialTotal = parseInt(daysCell ? daysCell.textContent.trim() : '1', 10);

            document.getElementById('partialEmpName').textContent = name;
            document.getElementById('partialLeaveType').textContent = type;

            // Build per-day cards
            var listEl = document.getElementById('partialDaysList');
            listEl.innerHTML = '';
            partialDayStatuses = [];
            partialDayReasons = [];

            var fromDate = new Date(from);
            for (var i = 0; i < partialTotal; i++) {
                var d = new Date(fromDate);
                d.setDate(d.getDate() + i);
                var status = 'pending';
                partialDayStatuses.push(status);

                var dayNum = i + 1;
                var dateStr = d.toLocaleDateString('en-GB', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
                var dow = weekdays[d.getDay()];

                var card = document.createElement('div');
                card.className = 'partial-day-card status-pending';
                card.dataset.index = i;
                card.innerHTML =
                    '<div class="partial-day-num">' + dayNum + '</div>' +
                    '<div class="partial-day-info">' +
                    '<div class="partial-day-date">' + dow + ', ' + dateStr + '</div>' +
                    '<div class="partial-day-dow">Day ' + dayNum + ' of ' + partialTotal + '</div>' +
                    '<button type="button" class="partial-day-view-reason" data-index="' + i + '" title="View rejection reason"><i class="bi bi-eye"></i> Reason</button>' +
                    '</div>' +
                    '<div class="partial-day-actions">' +
                    '<button type="button" class="partial-day-approve-btn" data-index="' + i + '" title="Approve this day"><i class="bi bi-check-lg"></i></button>' +
                    '<button type="button" class="partial-day-reject-btn" data-index="' + i + '" title="Reject this day"><i class="bi bi-x-lg"></i></button>' +
                    '</div>' +
                    '<div class="partial-day-status-badge badge-pending"><i class="bi bi-hourglass-split"></i> Pending</div>';

                listEl.appendChild(card);
            }

            updatePartialSummary();
            document.getElementById('partialNote').value = '';
            partialModal.classList.add('show');
        }

        function renderDayCard(idx) {
            var listEl = document.getElementById('partialDaysList');
            var card = listEl.children[idx];
            if (!card) return;
            var status = partialDayStatuses[idx];

            card.className = 'partial-day-card status-' + status;

            var badgeMap = {
                approved: '<i class="bi bi-check-circle-fill"></i> Approved',
                rejected: '<i class="bi bi-x-circle-fill"></i> Rejected',
                pending: '<i class="bi bi-hourglass-split"></i> Pending'
            };
            var badge = card.querySelector('.partial-day-status-badge');
            badge.className = 'partial-day-status-badge badge-' + status;
            badge.innerHTML = badgeMap[status];
        }

        function updatePartialSummary() {
            var approved = 0,
                rejected = 0,
                pending = 0;
            for (var i = 0; i < partialDayStatuses.length; i++) {
                if (partialDayStatuses[i] === 'approved') approved++;
                else if (partialDayStatuses[i] === 'rejected') rejected++;
                else pending++;
            }
            document.getElementById('paApprovedCount').textContent = approved;
            document.getElementById('paRejectedCount').textContent = rejected;
            document.getElementById('paPendingCount').textContent = pending;
        }

        // Event delegation: _inside_ partialDaysList — save reason + view reason
        document.getElementById('partialDaysList').addEventListener('click', function(e) {
            var approveBtn = e.target.closest('.partial-day-approve-btn');
            if (approveBtn) {
                var aIdx = parseInt(approveBtn.dataset.index, 10);
                var nextStatus = partialDayStatuses[aIdx] === 'approved' ? 'pending' : 'approved';
                partialDayStatuses[aIdx] = nextStatus;
                if (nextStatus !== 'rejected') partialDayReasons[aIdx] = '';
                renderDayCard(aIdx);
                updatePartialSummary();
                return;
            }

            var rejectBtn = e.target.closest('.partial-day-reject-btn');
            if (rejectBtn) {
                openPartialRejectModal(parseInt(rejectBtn.dataset.index, 10));
                return;
            }

            var viewBtn = e.target.closest('.partial-day-view-reason');
            if (viewBtn) {
                var vIdx = parseInt(viewBtn.dataset.index, 10);
                var empName = document.getElementById('partialEmpName');
                var reason = partialDayReasons[vIdx] || '';
                var card = viewBtn.closest('.partial-day-card');
                var dayDateLabel = card ? card.querySelector('.partial-day-date').textContent : '';

                var viewReasonModal = document.getElementById('leaveViewReasonModal');
                document.getElementById('leaveViewReasonEmployee').textContent = (empName ? empName.textContent : '') + (dayDateLabel ? ' (' + dayDateLabel + ')' : '');
                document.getElementById('leaveViewReasonText').textContent = reason || 'No rejection reason provided';
                viewReasonModal.classList.add('show');
                e.preventDefault();
                e.stopPropagation();
                return;
            }
        });

        // ===== Per-day Reject Reason Modal =====
        var partialRejectModal = document.getElementById('partialRejectModal');
        var partialRejectIdx = -1;

        function openPartialRejectModal(idx) {
            partialRejectIdx = idx;
            var empName = document.getElementById('partialEmpName').textContent;
            var listEl = document.getElementById('partialDaysList');
            var card = listEl.children[idx];
            var dayLabel = card ? card.querySelector('.partial-day-date').textContent : '';
            document.getElementById('partialRejectEmployee').textContent = empName;
            document.getElementById('partialRejectDay').textContent = dayLabel;
            document.getElementById('partialRejectReasonText').value = partialDayReasons[idx] || '';
            document.getElementById('partialRejectError').hidden = true;
            partialRejectModal.classList.add('show');
            document.getElementById('partialRejectReasonText').focus();
        }

        function closePartialRejectModal() {
            partialRejectModal.classList.remove('show');
            partialRejectIdx = -1;
        }

        document.getElementById('partialRejectSubmit').addEventListener('click', function() {
            var reason = document.getElementById('partialRejectReasonText').value.trim();
            if (!reason) {
                document.getElementById('partialRejectError').hidden = false;
                return;
            }
            if (partialRejectIdx > -1) {
                partialDayReasons[partialRejectIdx] = reason;
                partialDayStatuses[partialRejectIdx] = 'rejected';
                renderDayCard(partialRejectIdx);
                updatePartialSummary();
            }
            closePartialRejectModal();
        });

        document.getElementById('partialRejectClose').addEventListener('click', closePartialRejectModal);
        document.getElementById('partialRejectCancel').addEventListener('click', closePartialRejectModal);
        partialRejectModal.addEventListener('click', function(event) {
            if (event.target === partialRejectModal) closePartialRejectModal();
        });

        function closePartialModal() {
            partialModal.classList.remove('show');
            partialRow = null;
        }

        // Bind Partial Approve action buttons
        document.querySelectorAll('.partial-approve-action').forEach(function(button) {
            button.addEventListener('click', function() {
                var row = findRowByEmp(button.dataset.empid, button.dataset.from);
                if (!row) return;
                openPartialModal(row);
            });
        });

        // Submit partial approval
        document.getElementById('partialApproveSubmit').addEventListener('click', function() {
            if (!partialRow) return;
            var approvedCount = 0,
                rejectedCount = 0,
                pendingCount = 0;
            for (var i = 0; i < partialDayStatuses.length; i++) {
                if (partialDayStatuses[i] === 'approved') approvedCount++;
                else if (partialDayStatuses[i] === 'rejected') rejectedCount++;
                else pendingCount++;
            }

            var daysCell = partialRow.querySelector('td.fw-bold');

            if (approvedCount === 0 && rejectedCount === 0) {
                // Nothing decided — just close
                closePartialModal();
                return;
            }

            // Update the original row to reflect approved days
            if (approvedCount > 0) {
                daysCell.textContent = approvedCount;
                partialRow.dataset.status = 'Approved';
                partialRow.querySelector('.leave-status').className = 'leave-status approved';
                if (approvedCount < partialTotal) {
                    partialRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Partial (' + approvedCount + '/' + partialTotal + 'd)';
                } else {
                    partialRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Approved';
                }
            } else if (rejectedCount > 0 && pendingCount === 0) {
                // All rejected
                daysCell.textContent = rejectedCount;
                partialRow.dataset.status = 'Rejected';
                partialRow.querySelector('.leave-status').className = 'leave-status rejected';
                partialRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Rejected';
            }

            // Persist rejection reasons on the row for the View Reason modal
            var rejectedReasons = [];
            for (var r = 0; r < partialDayStatuses.length; r++) {
                if (partialDayStatuses[r] === 'rejected' && partialDayReasons[r]) rejectedReasons.push(partialDayReasons[r]);
            }
            if (rejectedReasons.length) partialRow.dataset.rejectionReason = rejectedReasons.join(' | ');

            // Create new rows for rejected and pending groups
            if (rejectedCount > 0 && approvedCount > 0) {
                addRemainderRow(partialRow, rejectedCount, 'Rejected');
            }
            if (pendingCount > 0 && approvedCount > 0) {
                addRemainderRow(partialRow, pendingCount, 'Pending');
            }

            var parts = [];
            if (approvedCount > 0) parts.push(approvedCount + ' approved');
            if (rejectedCount > 0) parts.push(rejectedCount + ' rejected');
            if (pendingCount > 0) parts.push(pendingCount + ' pending');
            showToast('Review complete — ' + parts.join(', '), 'success');

            updateActionState(partialRow);
            closePartialModal();
            refreshTable();
        });

        function addRemainderRow(afterRow, count, status) {
            var newRow = afterRow.cloneNode(true);
            var newDaysCell = newRow.querySelector('td.fw-bold');
            newDaysCell.textContent = count;

            var statusLower = status.toLowerCase();
            var newStatus = newRow.querySelector('.leave-status');
            newStatus.className = 'leave-status ' + statusLower;
            newStatus.innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>' + status;

            var allRows = document.querySelectorAll('#pgBody .leave-row');
            newRow.querySelector('.sno-value').textContent = allRows.length + 1;
            newRow.dataset.status = status;
            if (status !== 'Rejected') newRow.dataset.rejectionReason = '';

            afterRow.parentNode.insertBefore(newRow, afterRow.nextSibling);

            // Re-bind action events for new row
            var newToggle = newRow.querySelector('.menu-trigger');
            var newMenu = newRow.querySelector('.leave-action-menu');
            if (newMenu) newMenu.classList.remove('open');
            if (newToggle) newToggle.setAttribute('aria-expanded', 'false');

            var newApproveAction = newRow.querySelector('.approve-action');
            if (newApproveAction) {
                newApproveAction.addEventListener('click', function() {
                    newRow.dataset.status = 'Approved';
                    newRow.querySelector('.leave-status').className = 'leave-status approved';
                    newRow.querySelector('.leave-status').innerHTML = '<i class="bi bi-circle-fill" style="font-size:6px;"></i>Approved';
                    updateActionState(newRow);
                    refreshTable();
                });
            }

            var newRejectAction = newRow.querySelector('.reject-action');
            if (newRejectAction) {
                newRejectAction.addEventListener('click', function() {
                    rejectRow = newRow;
                    document.getElementById('leaveRejectEmployee').textContent = newRejectAction.dataset.employee;
                    rejectModal.classList.add('show');
                    document.getElementById('leaveRejectReason').focus();
                });
            }

            var newPartialAction = newRow.querySelector('.partial-approve-action');
            if (newPartialAction) {
                newPartialAction.addEventListener('click', function() {
                    var foundRow = findRowByEmp(newPartialAction.dataset.empid, newPartialAction.dataset.from);
                    if (foundRow) openPartialModal(foundRow);
                });
            }

            var newViewReason = newRow.querySelector('.view-reason-action');
            if (newViewReason) {
                newViewReason.addEventListener('click', function() {
                    var rejReason = newRow.dataset.rejectionReason || newViewReason.dataset.reason || 'No rejection reason provided';
                    document.getElementById('leaveViewReasonEmployee').textContent = newViewReason.dataset.employee;
                    document.getElementById('leaveViewReasonText').textContent = rejReason;
                    viewReasonModal.classList.add('show');
                });
            }

            updateActionState(newRow);
        }

        document.getElementById('partialApproveClose').addEventListener('click', closePartialModal);
        document.getElementById('partialApproveCancel').addEventListener('click', closePartialModal);
        partialModal.addEventListener('click', function(event) {
            if (event.target === partialModal) closePartialModal();
        });

        // Simple toast notification
        function showToast(message, type) {
            var toast = document.createElement('div');
            toast.className = 'partial-toast partial-toast-' + (type || 'info');
            toast.innerHTML = '<i class="bi ' + (type === 'success' ? 'bi-check-circle-fill' : 'bi-info-circle-fill') + '"></i> ' + message;
            document.body.appendChild(toast);
            setTimeout(function() {
                toast.classList.add('show');
            }, 10);
            setTimeout(function() {
                toast.classList.remove('show');
                setTimeout(function() {
                    toast.remove();
                }, 400);
            }, 3000);
        }

        function chips() {
            var list = document.getElementById('leaveActiveList'),
                items = [{
                    label: 'Employee',
                    value: document.getElementById('leaveSearch').value,
                    field: 'leaveSearch'
                }, {
                    label: 'Type',
                    value: document.getElementById('leaveType').value === 'All Types' ? '' : document.getElementById('leaveType').value,
                    field: 'leaveType'
                }, {
                    label: 'Status',
                    value: document.getElementById('leaveStatus').value === 'All Status' ? '' : document.getElementById('leaveStatus').value,
                    field: 'leaveStatus'
                }, {
                    label: 'Date Range',
                    value: document.getElementById('leaveRange').value,
                    field: 'leaveRange'
                }].filter(function(item) {
                    return item.value;
                });
            list.innerHTML = '';
            items.forEach(function(item) {
                var chip = document.createElement('span');
                chip.className = 'leave-chip';
                var text = document.createElement('span');
                text.textContent = item.label + ': ' + item.value;
                var close = document.createElement('button');
                close.type = 'button';
                close.className = 'leave-chip-close';
                close.setAttribute('aria-label', 'Remove ' + item.label + ' filter');
                close.innerHTML = '&times;';
                close.addEventListener('click', function() {
                    if (item.field === 'leaveType') document.getElementById(item.field).value = 'All Types';
                    else if (item.field === 'leaveStatus') document.getElementById(item.field).value = 'All Status';
                    else document.getElementById(item.field).value = '';
                    if (item.field === 'leaveRange') {
                        rangeStart = '';
                        rangeEnd = '';
                    }
                    if (item.field === 'leaveSearch') appliedSearch = '';
                    if (item.field === 'leaveType') appliedType = 'All Types';
                    if (item.field === 'leaveStatus') appliedStatus = 'All Status';
                    chips();
                    refreshTable();
                });
                chip.appendChild(text);
                chip.appendChild(close);
                list.appendChild(chip);
            });
            document.getElementById('leaveActiveBar').hidden = !items.length;
        }

        function setDate(delta) {
            var d = new Date(selectedDate || '2026-08-27');
            d.setDate(d.getDate() + delta);
            selectedDate = d.toISOString().slice(0, 10);
            dateInput.value = selectedDate.split('-').reverse().join('-');
            rangeStart = '';
            rangeEnd = '';
            refreshTable();
        }
        dateInput.addEventListener('change', function() {
            var date = iso(this.value);
            if (date) {
                selectedDate = date;
                rangeStart = '';
                rangeEnd = '';
                refreshTable();
            }
        });
        document.getElementById('leavePrevDate').onclick = function() {
            setDate(-1);
        };
        document.getElementById('leaveNextDate').onclick = function() {
            setDate(1);
        };
        document.getElementById('leaveApply').onclick = function() {
            var r = range(document.getElementById('leaveRange').value);
            appliedSearch = document.getElementById('leaveSearch').value;
            appliedType = document.getElementById('leaveType').value;
            appliedStatus = document.getElementById('leaveStatus').value;
            rangeStart = r.start;
            rangeEnd = r.end;
            chips();
            refreshTable();
        };
        document.getElementById('leaveClear').onclick = function() {
            document.getElementById('leaveSearch').value = '';
            document.getElementById('leaveType').value = 'All Types';
            document.getElementById('leaveStatus').value = 'All Status';
            document.getElementById('leaveRange').value = '';
            appliedSearch = '';
            appliedType = 'All Types';
            appliedStatus = 'All Status';
            rangeStart = '';
            rangeEnd = '';
            chips();
            refreshTable();
        };
        document.getElementById('leaveActiveClear').onclick = function() {
            document.getElementById('leaveClear').click();
        };
        document.getElementById('leaveFiltersToggle').onclick = function() {
            var panel = document.getElementById('leaveFiltersCollapse'),
                open = panel.classList.toggle('open');
            this.classList.toggle('open', open);
            this.querySelector('span').textContent = open ? 'Hide Filters' : 'Filters';
        };

        // Summary card click functionality
        document.querySelectorAll('.leave-summary-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Skip if card has no status filter
                if (!this.dataset.statusFilter) return;

                // Remove active class from all cards
                document.querySelectorAll('.leave-summary-card').forEach(function(c) {
                    c.classList.remove('active');
                    c.removeAttribute('aria-current');
                });

                // Add active class to clicked card
                this.classList.add('active');
                this.setAttribute('aria-current', 'true');

                // Get the status filter from data attribute
                var statusFilter = this.dataset.statusFilter;

                // Update the applied status
                if (statusFilter === 'all') {
                    appliedStatus = 'All Status';
                } else {
                    appliedStatus = statusFilter;
                }

                // Update the status dropdown in filter panel
                document.getElementById('leaveStatus').value = appliedStatus;

                // Update filter chips
                chips();

                // Refresh the table
                refreshTable();
            });
        });

        // ===== Tab switching: Leave Requests / Leave Balance / Team Calendar =====
        var leaveTabButtons = document.querySelectorAll('[data-leave-tab]'),
            requestsSection = document.getElementById('leaveSectionRequests'),
            balanceSection = document.getElementById('leaveSectionBalance'),
            teamCalSection = document.getElementById('leaveSectionTeamCalendar');

        leaveTabButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                leaveTabButtons.forEach(function(b) {
                    b.classList.remove('active');
                });
                this.classList.add('active');

                var tab = this.dataset.leaveTab;
                if (requestsSection) requestsSection.hidden = tab !== 'requests';
                if (balanceSection) balanceSection.hidden = tab !== 'balance';
                if (teamCalSection) {
                    teamCalSection.hidden = tab !== 'team-calendar';
                    if (tab === 'team-calendar' && typeof window.renderTeamCalendar === 'function') {
                        window.renderTeamCalendar();
                    }
                }
            });
        });

        // ===== Team Calendar (inline replica of the attendance calendar modal) =====
        (function() {
            var grid = document.getElementById('tcCalendarGrid');
            if (!grid) return;

            var TC_MONTHS = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];

            var TC_STATUS_COLORS = {
                present: {
                    bg: 'var(--att-present-bg)',
                    fg: 'var(--primary)'
                },
                absent: {
                    bg: 'var(--att-absent-bg)',
                    fg: 'var(--att-danger)'
                },
                late: {
                    bg: 'var(--att-late-bg)',
                    fg: 'var(--att-late-fg)'
                },
                half: {
                    bg: 'var(--att-half-bg)',
                    fg: 'var(--att-half-fg)'
                },
                leave: {
                    bg: 'var(--att-leave-bg)',
                    fg: 'var(--att-leave-fg)'
                },
                holiday: {
                    bg: 'var(--att-holiday-bg)',
                    fg: 'var(--att-holiday-fg)'
                }
            };

            // Build the team roster from the leave-request rows on this page
            var team = [];
            rows.forEach(function(row, i) {
                var nameEl = row.querySelector('.person-name');
                if (!nameEl || !row.cells[1]) return;
                team.push({
                    id: row.cells[1].textContent.trim(),
                    name: nameEl.textContent.trim(),
                    seed: i + 1
                });
            });

            var empSelect = document.getElementById('tcEmployeeSelect');
            var teamSelect = document.getElementById('tcTeamSelect');

            // Team mapping: employee ID -> team name
            var empTeamMap = {
                'EMP0001': 'Node JS',
                'EMP0002': 'Design',
                'EMP0003': 'iOS',
                'EMP0004': 'Business',
                'EMP0005': 'Marketing',
                'EMP0006': 'Design',
                'EMP0007': 'iOS',
                'EMP0008': 'Business',
                'EMP0009': 'Marketing',
                'EMP0010': 'Node JS',
                'EMP0011': 'iOS',
                'EMP0012': 'Business',
                'EMP0013': 'Marketing',
                'EMP0014': 'Node JS',
                'EMP0015': 'iOS',
                'EMP0016': 'Business',
                'EMP0017': 'Marketing',
                'EMP0018': 'Node JS',
                'EMP0019': 'iOS',
                'EMP0020': 'Business'
            };

            function populateMembers(selectedTeam) {
                empSelect.innerHTML = '';
                team.forEach(function(member) {
                    if (selectedTeam && empTeamMap[member.id] !== selectedTeam) return;
                    var opt = document.createElement('option');
                    opt.value = member.id;
                    opt.textContent = member.name + ' (' + member.id + ')';
                    empSelect.appendChild(opt);
                });
                if (window.jQuery && jQuery.fn.select2) {
                    jQuery(empSelect).select2({
                        width: 'style',
                        placeholder: 'Select Team Member'
                    });
                }
                if (empSelect.options.length > 0) {
                    currentEmpId = empSelect.options[0].value;
                    render();
                }
            }

            var currentEmpId = team.length ? team[0].id : null,
                todayInit = new Date(),
                currentYear = todayInit.getFullYear(),
                currentMonth = todayInit.getMonth();

            populateMembers('');

            // Team select filter
            if (window.jQuery && jQuery.fn.select2) {
                jQuery(teamSelect).select2({
                    width: 'style',
                    placeholder: 'All Teams'
                });
            }
            teamSelect.addEventListener('change', function() {
                populateMembers(this.value);
            });

            // Deterministic pseudo-random pattern per member/day (same formula
            // as the attendance calendar modal, so views stay consistent)
            function statusForDay(seed, year, month, day) {
                var dow = new Date(year, month, day).getDay();
                if (dow === 0 || dow === 6) return 'holiday';

                var n = (seed * 31 + year * 7 + (month + 1) * 13 + day * 3) % 100;

                if (n < 4) return 'leave';
                if (n < 10) return 'absent';
                if (n < 22) return 'late';
                if (n < 28) return 'half';
                return 'present';
            }

            function render() {
                var member = null;
                for (var t = 0; t < team.length; t++) {
                    if (team[t].id === currentEmpId) {
                        member = team[t];
                        break;
                    }
                }
                if (!member) return;

                document.getElementById('tcMonthLabel').textContent =
                    TC_MONTHS[currentMonth] + ' ' + currentYear;

                // Only remove day cells — the 7 .acm-dow header cells stay put
                grid.querySelectorAll('.acm-day').forEach(function(cell) {
                    cell.remove();
                });

                var firstDay = new Date(currentYear, currentMonth, 1).getDay();
                var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

                var counts = {
                    present: 0,
                    absent: 0,
                    late: 0,
                    half: 0,
                    leave: 0
                };
                var totalHours = 0,
                    workedDays = 0,
                    delay = 0;

                var todayDate = new Date();
                var isCurrentMonth = (todayDate.getFullYear() === currentYear && todayDate.getMonth() === currentMonth);

                for (var i = 0; i < firstDay; i++) {
                    var empty = document.createElement('div');
                    empty.className = 'acm-day empty';
                    grid.appendChild(empty);
                }

                for (var d = 1; d <= daysInMonth; d++) {
                    var status = statusForDay(member.seed, currentYear, currentMonth, d);
                    var colors = TC_STATUS_COLORS[status];

                    var cell = document.createElement('div');
                    cell.className = 'acm-day' +
                        (status === 'holiday' ? ' acm-holiday' : '') +
                        (isCurrentMonth && d === todayDate.getDate() ? ' acm-today' : '');
                    cell.style.background = colors.bg;
                    cell.style.color = colors.fg;
                    cell.style.animationDelay = (delay * 12) + 'ms';
                    cell.dataset.day = d;
                    cell.dataset.status = status;
                    cell.style.cursor = status !== 'holiday' ? 'pointer' : 'default';
                    delay++;

                    var numSpan = document.createElement('span');
                    numSpan.className = 'num';
                    numSpan.textContent = d;
                    cell.appendChild(numSpan);

                    var tagSpan = document.createElement('span');
                    tagSpan.className = 'tag';
                    tagSpan.textContent = status === 'holiday' ? 'Off' :
                        status === 'half' ? 'Half' :
                        status.charAt(0).toUpperCase() + status.slice(1);
                    cell.appendChild(tagSpan);

                    if (counts.hasOwnProperty(status)) counts[status]++;

                    if (status === 'present') {
                        totalHours += 8.5;
                        workedDays++;
                    } else if (status === 'late') {
                        totalHours += 7.8;
                        workedDays++;
                    } else if (status === 'half') {
                        totalHours += 4.2;
                        workedDays++;
                    }

                    grid.appendChild(cell);
                }

                document.getElementById('tcPresentCount').textContent = counts.present;
                document.getElementById('tcAbsentCount').textContent = counts.absent;
                document.getElementById('tcLateCount').textContent = counts.late;
                document.getElementById('tcLeaveCount').textContent = counts.leave;
                document.getElementById('tcAvgHours').textContent =
                    workedDays > 0 ? (totalHours / workedDays).toFixed(1) + 'h' : '0h';
            }

            empSelect.addEventListener('change', function() {
                currentEmpId = this.value;
                render();
            });

            document.getElementById('tcPrevMonth').addEventListener('click', function() {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                render();
            });

            document.getElementById('tcNextMonth').addEventListener('click', function() {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                render();
            });

            // Exposed so the tab switch can (re)render when the tab opens
            window.renderTeamCalendar = render;
        })();

        // Leave Balance scroll arrows
        var balanceScroll = document.getElementById('leaveBalanceScroll');
        if (balanceScroll) {
            var prevArrow = document.querySelector('.leave-balance-nav-prev'),
                nextArrow = document.querySelector('.leave-balance-nav-next');
            if (prevArrow) prevArrow.addEventListener('click', function() {
                balanceScroll.scrollBy({
                    left: -240,
                    behavior: 'smooth'
                });
            });
            if (nextArrow) nextArrow.addEventListener('click', function() {
                balanceScroll.scrollBy({
                    left: 240,
                    behavior: 'smooth'
                });
            });
        }

        // ===== Leave Type badge click -> open Apply Leave modal with that type preselected =====
        function openApplyModalWithType(type) {
            var typeSelect = document.getElementById('leaveApplyType');
            var matched = Array.from(typeSelect.options).some(function(opt) {
                return opt.value === type;
            });
            typeSelect.value = matched ? type : '';

            var modalEl = document.getElementById('leaveApplyModal');
            var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modal.show();
        }

        // Generic: any element carrying data-leave-type, OR any element inside
        // a ".leave-balance-card" whose text matches a known leave type
        // (covers cards like "Annual leave" / "PTO" / "Compensatory off" in
        // the Leave Balance tab, even without exact markup being known here).
        var knownLeaveTypes = Array.from(document.getElementById('leaveApplyType').options)
            .map(function(o) {
                return o.value;
            })
            .filter(Boolean);

        function normalize(str) {
            return (str || '').trim().toLowerCase().replace(/\s+/g, ' ');
        }

        document.addEventListener('click', function(event) {
            var card = event.target.closest('.leave-balance-card, [data-leave-type]');
            if (!card) return;

            var type = card.dataset.leaveType;
            if (!type) {
                var text = normalize(card.textContent);
                type = knownLeaveTypes.find(function(t) {
                    return normalize(t) === text || text.indexOf(normalize(t)) === 0;
                });
            }
            if (!type) return;

            event.stopPropagation();
            openApplyModalWithType(type);
        });

        document.addEventListener('keydown', function(event) {
            if (event.key !== 'Enter' && event.key !== ' ') return;
            var card = event.target.closest('.leave-balance-card');
            if (!card) return;
            event.preventDefault();
            event.stopPropagation();
            openApplyModalWithType(card.dataset.leaveType);
        });

        document.querySelectorAll('.leave-type[data-leave-type]').forEach(function(badge) {
            badge.style.cursor = 'pointer';

            badge.addEventListener('click', function(event) {
                event.stopPropagation();
                openApplyModalWithType(this.dataset.leaveType);
            });

            // keyboard accessibility (Enter / Space)
            badge.addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    event.stopPropagation();
                    openApplyModalWithType(this.dataset.leaveType);
                }
            });
        });

        // ===== Leave Apply Modal: date summary + balance auto-calc (Bootstrap-managed modal) =====
        (function() {
            var applyModal = document.getElementById('leaveApplyModal'),
                fromInput = document.getElementById('leaveApplyFromDate'),
                toInput = document.getElementById('leaveApplyToDate'),
                dayTypeSel = document.getElementById('leaveApplyDayType'),
                summaryEl = document.getElementById('leaveApplyDateSummary'),
                totalEl = document.getElementById('leaveApplyTotalDays'),
                availableEl = document.getElementById('availableBalance'),
                bookedEl = document.getElementById('currentlyBooked'),
                afterEl = document.getElementById('balanceAfterBooking'),
                estimatedEl = document.getElementById('estimatedBalance'),
                asOfEl = document.getElementById('balanceAsOfDate'),
                empSelect = document.getElementById('leaveEmployeeSelect');

            var weekday = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            // Static per-employee balances (swap for a real data source as needed)
            var employeeBalances = {
                EMP0001: 14,
                EMP0002: 7,
                EMP0003: 10,
                EMP0004: 8,
                EMP0005: 12,
                EMP0006: 5,
                EMP0007: 9,
                EMP0008: 16
            };

            function parseDMY(str) {
                var p = (str || '').split('-');
                if (p.length !== 3) return null;
                var d = new Date(p[2], p[1] - 1, p[0]);
                return isNaN(d.getTime()) ? null : d;
            }

            function fmt(d) {
                var dd = String(d.getDate()).padStart(2, '0'),
                    months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                return dd + '-' + months[d.getMonth()] + '-' + d.getFullYear();
            }

            function currentAvailable() {
                var val = employeeBalances[empSelect.value];
                return typeof val === 'number' ? val : (parseFloat(availableEl.textContent) || 0);
            }

            function recalc() {
                var fromDate = parseDMY(fromInput.value),
                    toDate = parseDMY(toInput.value) || fromDate,
                    dayType = dayTypeSel.value;

                if (!fromDate) {
                    summaryEl.textContent = 'Select a date';
                    totalEl.textContent = '0 Day(s)';
                    return;
                }

                var label = weekday[fromDate.getDay()] + ' ' + fromInput.value;
                if (toDate && toInput.value && toInput.value !== fromInput.value) {
                    label += '  –  ' + weekday[toDate.getDay()] + ' ' + toInput.value;
                }
                summaryEl.textContent = label;

                var days = Math.round((toDate - fromDate) / 86400000) + 1;
                if (days < 1) days = 1;
                if (dayType !== 'Full Day') days = days > 1 ? days - 0.5 : 0.5;
                totalEl.textContent = days + ' Day(s)';

                var available = currentAvailable(),
                    after = Math.max(available - days, 0);

                availableEl.textContent = available;
                bookedEl.textContent = days;
                afterEl.textContent = after;
                estimatedEl.textContent = after;
                asOfEl.textContent = fmt(new Date());
            }

            [fromInput, toInput, dayTypeSel, empSelect].forEach(function(el) {
                el.addEventListener('change', recalc);
            });

            // Bootstrap fires this automatically after the modal (opened via
            // data-bs-toggle/data-bs-target) has fully finished animating in.
            applyModal.addEventListener('shown.bs.modal', recalc);

            document.getElementById('leaveApplySubmit').addEventListener('click', function() {
                // Wire this up to your actual submit/API call before hiding.
                var instance = bootstrap.Modal.getInstance(applyModal);
                if (instance) instance.hide();
            });

            recalc();
        })();

        refreshTable();
    });

/* ==========================================================================
   Script Block 3
   ========================================================================== */
$('#employeeSelect').select2({
        width: '100%',
        placeholder: 'Select Employee',
        allowClear: true,

        templateResult: function(data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-option">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        },

        templateSelection: function(data) {

            if (!data.id) {
                return data.text;
            }

            const image = $(data.element).data('image');

            return $(`
            <div class="select2-user-selected">
                <img src="${image}" class="select2-user-image">
                <span>${data.text}</span>
            </div>
        `);
        }
    });

/* ==========================================================================
   Script Block 4
   ========================================================================== */
$(document).ready(function() {
        $('#leaveApplyType').select2({
            width: '100%',
        });
    });
