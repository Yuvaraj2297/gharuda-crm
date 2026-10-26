/**
 * Gharuda CRM - Shift Page Script
 * File: assets/js/pages/shift.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function () {
    'use strict';

    // Shift colors and Days data in JavaScript as requested
    var shiftColors = [
        { id: 'primary', name: 'Green',      hex: '#16a34a' },
        { id: 'blue',    name: 'Sky Blue',   hex: '#3b82f6' },
        { id: 'amber',   name: 'Amber',      hex: '#f59e0b' },
        { id: 'red',     name: 'Coral Red',  hex: '#ef4444' },
        { id: 'violet',  name: 'Violet',     hex: '#8b5cf6' },
        { id: 'pink',    name: 'Pink',       hex: '#ec4899' }
    ];

    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    var table = document.getElementById('shiftTable');
    var tbody = document.getElementById('shiftTbody');

    // Modals
    var creationModalEl = document.getElementById('creationModal');
    var creationModal = creationModalEl ? bootstrap.Modal.getOrCreateInstance(creationModalEl) : null;
    var editModalEl = document.getElementById('editModal');
    var editModal = editModalEl ? bootstrap.Modal.getOrCreateInstance(editModalEl) : null;

    // Helper: timing conversions
    function toMinutes(val) {
        if (!val) return null;
        val = String(val).trim();
        var ampmMatch = val.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
        if (ampmMatch) {
            var h = parseInt(ampmMatch[1], 10);
            var m = parseInt(ampmMatch[2], 10);
            var ap = ampmMatch[3].toUpperCase();
            if (ap === 'PM' && h !== 12) h += 12;
            if (ap === 'AM' && h === 12) h = 0;
            return h * 60 + m;
        }
        var parts = val.split(':');
        var h2 = parseInt(parts[0], 10);
        var m2 = parseInt(parts[1], 10) || 0;
        if (isNaN(h2)) return null;
        return h2 * 60 + m2;
    }

    function to24h(val) {
        if (!val) return '';
        val = String(val).trim();
        var ampmMatch = val.match(/(\d{1,2}):(\d{2})\s*(AM|PM)/i);
        if (ampmMatch) {
            var h = parseInt(ampmMatch[1], 10);
            var m = ampmMatch[2];
            var ap = ampmMatch[3].toUpperCase();
            if (ap === 'PM' && h !== 12) h += 12;
            if (ap === 'AM' && h === 12) h = 0;
            return String(h).padStart(2, '0') + ':' + m;
        }
        return val;
    }

    function formatTime12h(timeStr) {
        if (!timeStr) return '-';
        timeStr = String(timeStr).trim();
        if (/AM|PM/i.test(timeStr)) return timeStr;
        var parts = timeStr.split(':');
        var h = parseInt(parts[0], 10);
        var m = parts[1] || '00';
        if (isNaN(h)) return timeStr;
        var suffix = h >= 12 ? 'PM' : 'AM';
        var h12 = h % 12 || 12;
        return String(h12).padStart(2, '0') + ':' + m + ' ' + suffix;
    }

    function computeWorkingMinutes(start, end) {
        var s = toMinutes(start);
        var e = toMinutes(end);
        if (s == null || e == null) return null;
        var total = e - s;
        if (total <= 0) total += 24 * 60; // overnight shift
        return Math.max(total, 0);
    }

    function formatDuration(mins) {
        if (mins == null || mins <= 0) return '-';
        var h = Math.floor(mins / 60);
        var m = mins % 60;
        return h + 'h ' + String(m).padStart(2, '0') + 'm';
    }

    function statusPill(status) {
        var cls = status === 'Enable' ? 'status-approved' : 'status-rejected';
        return '<span class="status-pill ' + cls + '">' + status + '</span>';
    }

    function getColorInfo(id) {
        return shiftColors.find(function (c) { return c.id === id; }) || shiftColors[0];
    }

    // Generic Color Picker
    function setupColorPicker(prefix) {
        var trigger = document.getElementById(prefix + 'ColorPickerTrigger');
        var dropdown = document.getElementById(prefix + 'ColorPickerDropdown');
        var dot = document.getElementById(prefix + 'ColorPickerDot');
        var nameEl = document.getElementById(prefix + 'ColorPickerName');
        var hidden = document.getElementById(prefix + '_shift_color');

        if (!trigger || !dropdown) return;

        function close() {
            dropdown.classList.remove('open');
            trigger.classList.remove('open');
        }

        trigger.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.classList.toggle('open');
            trigger.classList.toggle('open');
        });

        dropdown.querySelectorAll('.color-picker-option').forEach(function (opt) {
            opt.addEventListener('click', function (e) {
                e.stopPropagation();
                var cId = opt.getAttribute('data-id');
                var cHex = opt.getAttribute('data-hex');
                var cName = opt.getAttribute('data-name');

                if (hidden) {
                    hidden.value = cId;
                    hidden.dataset.hex = cHex;
                    hidden.dataset.name = cName;
                }
                if (dot) dot.style.background = cHex;
                if (nameEl) nameEl.textContent = cName;

                dropdown.querySelectorAll('.color-picker-option').forEach(function (o) {
                    o.classList.remove('selected');
                });
                opt.classList.add('selected');
                close();
            });
        });

        document.addEventListener('click', function (e) {
            if (!trigger.contains(e.target) && !dropdown.contains(e.target)) {
                close();
            }
        });
    }

    setupColorPicker('create');
    setupColorPicker('edit');

    // Reset creation form
    function resetCreationForm() {
        var nameInput = document.getElementById('create_shift_name');
        var startInput = document.getElementById('create_common_start');
        var endInput = document.getElementById('create_common_end');
        var statusInput = document.getElementById('create_status');
        var colHidden = document.getElementById('create_shift_color');
        var dot = document.getElementById('createColorPickerDot');
        var nameEl = document.getElementById('createColorPickerName');

        if (nameInput) nameInput.value = '';
        if (startInput) startInput.value = '';
        if (endInput) endInput.value = '';
        if (statusInput) statusInput.value = 'Enable';

        if (colHidden) {
            colHidden.value = 'primary';
            colHidden.dataset.hex = '#16a34a';
            colHidden.dataset.name = 'Green';
        }
        if (dot) dot.style.background = '#16a34a';
        if (nameEl) nameEl.textContent = 'Green';

        var createDropdown = document.getElementById('createColorPickerDropdown');
        if (createDropdown) {
            createDropdown.querySelectorAll('.color-picker-option').forEach(function (opt) {
                opt.classList.toggle('selected', opt.getAttribute('data-id') === 'primary');
            });
        }

        if (typeof window.ghSyncSelect2 === 'function') {
            window.ghSyncSelect2('#creationModal');
        }
    }

    if (creationModalEl) {
        creationModalEl.addEventListener('hidden.bs.modal', resetCreationForm);
    }

    // Helper: get existing names to check for duplicates
    function getExistingNames(excludeId) {
        var names = [];
        if (!tbody) return names;
        tbody.querySelectorAll('tr').forEach(function (tr) {
            if (tr.classList.contains('no-record-row')) return;
            if (excludeId && tr.getAttribute('data-id') === String(excludeId)) return;
            var sName = tr.getAttribute('data-shift-name');
            if (sName) {
                names.push(sName.trim().toLowerCase());
            } else {
                var nameEl = tr.querySelector('.shift-name-text');
                if (nameEl) names.push(nameEl.textContent.trim().toLowerCase());
            }
        });
        return names;
    }

    // Create Save
    var btnCreateSave = document.getElementById('btnCreateSave');
    if (btnCreateSave) {
        btnCreateSave.addEventListener('click', function () {
            var nameInput = document.getElementById('create_shift_name');
            var colorHidden = document.getElementById('create_shift_color');
            var startInput = document.getElementById('create_common_start');
            var endInput = document.getElementById('create_common_end');
            var statusInput = document.getElementById('create_status');

            var name = nameInput ? nameInput.value.trim() : '';
            var startTime = startInput ? startInput.value.trim() : '';
            var endTime = endInput ? endInput.value.trim() : '';

            if (!name) {
                alert('Please enter a shift name.');
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames().indexOf(name.toLowerCase()) !== -1) {
                alert('Shift name already exists.');
                return;
            }

            if (!startTime || !endTime) {
                alert('Please enter Shift Timing (Start Time and End Time).');
                if (startInput && !startTime) startInput.focus();
                else if (endInput) endInput.focus();
                return;
            }

            var colorId = colorHidden ? colorHidden.value : 'primary';
            var colorInfo = getColorInfo(colorId);
            var colorHex = colorInfo.hex;
            var colorName = colorInfo.name;

            var start24 = to24h(startTime);
            var end24 = to24h(endTime);
            var mins = computeWorkingMinutes(start24, end24);
            var wh = formatDuration(mins);

            var today = (function () {
                var d = new Date();
                return String(d.getDate()).padStart(2, '0') + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + d.getFullYear();
            })();

            var newId = Date.now();
            var statusVal = statusInput ? statusInput.value : 'Enable';

            var rowHtml =
                '<tr data-id="' + newId + '" data-shift-name="' + name + '" data-color-id="' + colorId + '" data-color-hex="' + colorHex + '" data-color-name="' + colorName + '" data-start-time="' + start24 + '" data-end-time="' + end24 + '" data-status="' + statusVal + '">' +
                    '<td></td>' +
                    '<td class="shift-name-col">' +
                        '<div class="shift-name-cell">' +
                            '<span class="shift-dot" style="background:' + colorHex + ';box-shadow:0 0 0 3px ' + colorHex + '25;"></span>' +
                            '<div class="shift-name-text">' + name + '</div>' +
                        '</div>' +
                    '</td>' +
                    '<td class="shift-timing-col">' +
                        '<div class="d-flex align-items-center gap-1 text-nowrap">' +
                            '<i class="bi bi-clock text-primary fs-7"></i>' +
                            '<span class="fw-semibold text-dark">' + formatTime12h(start24) + ' – ' + formatTime12h(end24) + '</span>' +
                        '</div>' +
                    '</td>' +
                    '<td class="shift-hours-col">' +
                        '<span class="working-hours-pill ' + (wh && wh !== '-' ? 'has-value' : '') + '">' +
                            '<i class="bi bi-hourglass-split me-1 text-primary"></i>' + wh +
                        '</span>' +
                    '</td>' +
                    '<td>' + statusPill(statusVal) + '</td>' +
                    '<td><span class="text-muted small">' + today + '</span></td>' +
                    '<td>' +
                        '<div class="btn-group">' +
                            '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + newId + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                            '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + newId + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>' +
                        '</div>' +
                    '</td>' +
                '</tr>';

            if (table && table.autoTable) {
                table.autoTable.addRow(rowHtml);
            } else if (tbody) {
                tbody.insertAdjacentHTML('afterbegin', rowHtml);
            }

            resetCreationForm();
            if (creationModal) creationModal.hide();
        });
    }

    // Delegate Edit and Delete on Table Body
    if (tbody) {
        tbody.addEventListener('click', function (e) {
            var editBtn = e.target.closest('.btn-edit');
            var deleteBtn = e.target.closest('.btn-delete');

            if (editBtn) {
                var tr = editBtn.closest('tr');
                if (!tr) return;
                var id = tr.getAttribute('data-id') || editBtn.getAttribute('data-id');
                var sName = tr.getAttribute('data-shift-name') || (tr.querySelector('.shift-name-text') ? tr.querySelector('.shift-name-text').textContent.trim() : '');
                var cId = tr.getAttribute('data-color-id') || 'primary';
                var colorInfo = getColorInfo(cId);
                var startTime = tr.getAttribute('data-start-time') || '';
                var endTime = tr.getAttribute('data-end-time') || '';
                var statusVal = tr.getAttribute('data-status') || (tr.querySelector('.status-pill') ? tr.querySelector('.status-pill').textContent.trim() : 'Enable');

                var editIdEl = document.getElementById('edit_shift_id');
                var editNameEl = document.getElementById('edit_shift_name');
                var editColHidden = document.getElementById('edit_shift_color');
                var editDot = document.getElementById('editColorPickerDot');
                var editColName = document.getElementById('editColorPickerName');
                var editStart = document.getElementById('edit_common_start');
                var editEnd = document.getElementById('edit_common_end');
                var editStatus = document.getElementById('edit_status');

                if (editIdEl) editIdEl.value = id;
                if (editNameEl) editNameEl.value = sName;
                if (editColHidden) {
                    editColHidden.value = cId;
                    editColHidden.dataset.hex = colorInfo.hex;
                    editColHidden.dataset.name = colorInfo.name;
                }
                if (editDot) editDot.style.background = colorInfo.hex;
                if (editColName) editColName.textContent = colorInfo.name;

                var editDropdown = document.getElementById('editColorPickerDropdown');
                if (editDropdown) {
                    editDropdown.querySelectorAll('.color-picker-option').forEach(function (opt) {
                        opt.classList.toggle('selected', opt.getAttribute('data-id') === cId);
                    });
                }

                if (editStart) editStart.value = startTime;
                if (editEnd) editEnd.value = endTime;
                if (editStatus) editStatus.value = statusVal;

                if (typeof window.ghSyncSelect2 === 'function') {
                    window.ghSyncSelect2('#editModal');
                }

                if (editModal) editModal.show();
            }

            if (deleteBtn) {
                if (confirm('Are you sure you want to delete this shift?')) {
                    var delTr = deleteBtn.closest('tr');
                    if (delTr) {
                        delTr.remove();
                        if (table && table.autoTable) {
                            table.autoTable.refresh();
                        }
                    }
                }
            }
        });
    }

    // Edit Save
    var btnEditSave = document.getElementById('btnEditSave');
    if (btnEditSave) {
        btnEditSave.addEventListener('click', function () {
            var editIdEl = document.getElementById('edit_shift_id');
            var nameInput = document.getElementById('edit_shift_name');
            var colorHidden = document.getElementById('edit_shift_color');
            var startInput = document.getElementById('edit_common_start');
            var endInput = document.getElementById('edit_common_end');
            var statusInput = document.getElementById('edit_status');

            var id = editIdEl ? editIdEl.value : '';
            var name = nameInput ? nameInput.value.trim() : '';
            var startTime = startInput ? startInput.value.trim() : '';
            var endTime = endInput ? endInput.value.trim() : '';

            if (!name) {
                alert('Please enter a shift name.');
                if (nameInput) nameInput.focus();
                return;
            }

            if (getExistingNames(id).indexOf(name.toLowerCase()) !== -1) {
                alert('Shift name already exists.');
                return;
            }

            if (!startTime || !endTime) {
                alert('Please enter Shift Timing (Start Time and End Time).');
                if (startInput && !startTime) startInput.focus();
                else if (endInput) endInput.focus();
                return;
            }

            var colorId = colorHidden ? colorHidden.value : 'primary';
            var colorInfo = getColorInfo(colorId);
            var colorHex = colorInfo.hex;
            var colorName = colorInfo.name;

            var start24 = to24h(startTime);
            var end24 = to24h(endTime);
            var mins = computeWorkingMinutes(start24, end24);
            var wh = formatDuration(mins);
            var statusVal = statusInput ? statusInput.value : 'Enable';

            var tr = tbody ? tbody.querySelector('tr[data-id="' + id + '"]') : null;
            if (tr) {
                tr.setAttribute('data-shift-name', name);
                tr.setAttribute('data-color-id', colorId);
                tr.setAttribute('data-color-hex', colorHex);
                tr.setAttribute('data-color-name', colorName);
                tr.setAttribute('data-start-time', start24);
                tr.setAttribute('data-end-time', end24);
                tr.setAttribute('data-status', statusVal);

                var nameCell = tr.querySelector('.shift-name-col') || tr.children[1];
                if (nameCell) {
                    nameCell.innerHTML =
                        '<div class="shift-name-cell">' +
                            '<span class="shift-dot" style="background:' + colorHex + ';box-shadow:0 0 0 3px ' + colorHex + '25;"></span>' +
                            '<div class="shift-name-text">' + name + '</div>' +
                        '</div>';
                }

                var timingCell = tr.querySelector('.shift-timing-col') || tr.children[2];
                if (timingCell) {
                    timingCell.innerHTML =
                        '<div class="d-flex align-items-center gap-1 text-nowrap">' +
                            '<i class="bi bi-clock text-primary fs-7"></i>' +
                            '<span class="fw-semibold text-dark">' + formatTime12h(start24) + ' – ' + formatTime12h(end24) + '</span>' +
                        '</div>';
                }

                var hoursCell = tr.querySelector('.shift-hours-col') || tr.children[3];
                if (hoursCell) {
                    hoursCell.innerHTML =
                        '<span class="working-hours-pill ' + (wh && wh !== '-' ? 'has-value' : '') + '">' +
                            '<i class="bi bi-hourglass-split me-1 text-primary"></i>' + wh +
                        '</span>';
                }

                var statusCell = tr.children[4];
                if (statusCell) {
                    statusCell.innerHTML = statusPill(statusVal);
                }

                if (table && table.autoTable) {
                    table.autoTable.refresh();
                }
            }

            if (editModal) editModal.hide();
        });
    }
});
