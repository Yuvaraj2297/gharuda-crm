/**
 * Gharuda CRM - Manage Shift Page Script
 * File: assets/js/pages/manage-shift.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var wrap = document.querySelector('.table-modern-wrap');
        if (!wrap) return;
        function toggleStickyShadow() {
            wrap.classList.toggle('is-scrolled', wrap.scrollLeft > 0);
        }
        wrap.addEventListener('scroll', toggleStickyShadow);
        toggleStickyShadow();
    });

/* ==========================================================================
   Script Block 2
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var wrap = document.querySelector('.table-modern-wrap');
        if (!wrap) return;
        function toggleStickyShadow() {
            wrap.classList.toggle('is-scrolled', wrap.scrollLeft > 0);
        }
        wrap.addEventListener('scroll', toggleStickyShadow);
        toggleStickyShadow();
    });

/* ==========================================================================
   Script Block 3
   ========================================================================== */
var shiftData = [
        { id: 1, shift_name: 'Default Shift', tag: 'Default', tag_color: '#3b82f6', dot_color: '#3b82f6', timing: { start: '10:00', end: '19:00' }, status: 'Enable', department: 'All Departments', position: 'All Positions' },
        { id: 2, shift_name: 'Open Shift', tag: 'System Defined', tag_color: '#f59e0b', dot_color: '#f59e0b', timing: null, status: 'Enable', department: 'All Departments', position: 'All Positions' },
        { id: 3, shift_name: 'Morning Shift', tag: '', tag_color: '', dot_color: '#16a34a', timing: { start: '06:00', end: '14:00' }, status: 'Enable', department: 'Developer', position: 'Frontend' },
        { id: 4, shift_name: 'Night Shift', tag: '', tag_color: '', dot_color: '#8b5cf6', timing: { start: '22:00', end: '06:00' }, status: 'Enable', department: 'Developer', position: 'Backend' }
    ];
    var shiftDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    // Update shift count
    document.getElementById('shiftCount').textContent = shiftData.length;

    // Build tbody rows
    var tbody = document.getElementById('pgBody');
    var html = '';
    shiftData.forEach(function(s, i) {
        html += '<tr data-id="' + s.id + '">';
        html += '<td data-label="S.No">' + (i + 1) + '</td>';
        html += '<td data-label="Shift Name"><div class="shift-name-cell">';
        html += '<span class="shift-dot" style="background:' + s.dot_color + ';"></span>';
        html += '<span class="shift-name-text">' + s.shift_name + '</span>';
        if (s.tag) {
            html += '<span class="shift-tag" style="color:' + s.tag_color + ';border-color:' + s.tag_color + '20;background:' + s.tag_color + '10;">' + s.tag + '</span>';
        }
        html += '</div></td>';
        html += '<td data-label="Department">' + (s.department || '-') + '</td>';
        html += '<td data-label="Position">' + (s.position || '-') + '</td>';
        shiftDays.forEach(function(d) {
            if (s.timing) {
                var startTime = formatTime(s.timing.start);
                var endTime = formatTime(s.timing.end);
                html += '<td class="day-col" data-label="' + d + '">' + startTime + ' - ' + endTime + '</td>';
            } else {
                html += '<td class="day-col flexible" data-label="' + d + '">Flexible timing</td>';
            }
        });
        html += '</tr>';
    });
    tbody.innerHTML = html;

    function formatTime(timeStr) {
        var parts = timeStr.split(':');
        var h = parseInt(parts[0], 10);
        var m = parts[1];
        var ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12;
        if (h === 0) h = 12;
        return h + ':' + m + ' ' + ampm;
    }

    MasterTable.init({
        tableId: 'shiftTable',
        tbodyId: 'pgBody',
        data: shiftData,
        tableName: 'Shift',
        primaryKey: 'id',
        searchFields: ['shift_name', 'tag', 'status'],
        columns: [
            { field: 'shift_name', title: 'Shift Name', sortable: true },
            { field: 'department', title: 'Department', sortable: true },
            { field: 'position', title: 'Position', sortable: true },
            { field: 'status', title: 'Status', sortable: true }
        ],
        skipRender: true,
        onEdit: function () {},
        onDelete: function () {}
    });
