/**
 * Gharuda CRM - Support Tickets Page Script
 * File: assets/js/pages/support-tickets.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function () {
        if (window.jQuery && jQuery.fn.select2) {
            jQuery('.select2').select2({
                width: '100%'
            });
        }

        /* Sample Ticket Data matching user mockup image */
        var ticketsData = [
            {
                id: 1,
                no: 68,
                subject: 'general issue',
                dotColor: '#db2777',
                tags: 'Tech',
                department: 'Tech Support',
                service: '',
                contact: 'KOKA SOFTWARE (koka soft )',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '04-07-2026 12:40:07'
            },
            {
                id: 2,
                no: 67,
                subject: 'Fire Installation',
                dotColor: '#2563eb',
                tags: 'Production',
                department: 'Production',
                service: '',
                contact: 'Jeevajothi SOFTWARE (Abode)',
                status: 'In Progress',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '03-07-2026 11:23:18'
            },
            {
                id: 3,
                no: 66,
                subject: 'laptop not working',
                dotColor: '#db2777',
                tags: 'Hardware',
                department: 'Sales',
                service: '',
                contact: 'Sundar',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '20-06-2026 17:35:44'
            },
            {
                id: 4,
                no: 65,
                subject: 'machine issue',
                dotColor: '#db2777',
                tags: 'Tech',
                department: 'Tech Support',
                service: '',
                contact: 'Mahesh A (Raja Enterprises)',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '05-06-2026 11:40:05'
            },
            {
                id: 5,
                no: 64,
                subject: 'Reg - System Issue',
                dotColor: '#eab308',
                tags: 'System',
                department: 'Tech Support',
                service: '',
                contact: 'Chaki',
                status: 'Closed',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '25-05-2026 17:13:27'
            },
            {
                id: 6,
                no: 63,
                subject: 'assess',
                dotColor: '#9333ea',
                tags: 'HR',
                department: 'HR',
                service: 'test',
                contact: 'Heena B (Subra )',
                status: 'Closed',
                priority: 'Low',
                lastReply: '25-05-2026 13:29:03',
                created: '25-05-2026 13:22:12'
            },
            {
                id: 7,
                no: 62,
                subject: 'Solar Issue',
                dotColor: '#db2777',
                tags: 'Solar',
                department: 'Sales',
                service: '',
                contact: 'Sundar Arumugam (Sundar Arumugam)',
                status: 'Closed',
                priority: 'Medium',
                lastReply: '05-05-2026 13:58:46',
                created: '05-05-2026 11:55:18'
            },
            {
                id: 8,
                no: 61,
                subject: 'speaker not working',
                dotColor: '#db2777',
                tags: 'Audio',
                department: 'HR',
                service: 'sundar',
                contact: 'sundar',
                status: 'Open',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '14-04-2026 14:40:21'
            },
            {
                id: 9,
                no: 60,
                subject: 'System Issue',
                dotColor: '#db2777',
                tags: 'System',
                department: 'Tech Support',
                service: 'test',
                contact: 'Selvam Chokkanathan (Subra)',
                status: 'Open',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '27-03-2026 11:50:20'
            },
            {
                id: 10,
                no: 59,
                subject: 'loan request',
                dotColor: '#db2777',
                tags: 'Finance',
                department: 'HR',
                service: '',
                contact: 'Aarthi',
                status: 'Open',
                priority: 'Medium',
                lastReply: 'No Reply Yet',
                created: '06-01-2026 16:30:10'
            }
        ];

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        var stMasterTable = null;

        if (typeof MasterTable !== 'undefined') {
            stMasterTable = MasterTable.init({
                tableId: 'stTable',
                tbodyId: 'stTbody',
                idPrefix: 'st',
                data: ticketsData,
                tableName: 'Support_Tickets',
                primaryKey: 'id',
                searchFields: ['subject', 'contact', 'department', 'service', 'status', 'priority', 'no'],
                columns: [
                    {
                        field: null,
                        title: '<input type="checkbox" id="stSelectAllCheckbox" class="form-check-input" onclick="toggleStSelectAllRows(this)">',
                        sortable: false,
                        render: function(v, row) {
                            return '<input type="checkbox" class="form-check-input st-row-checkbox" data-id="' + row.id + '">';
                        }
                    },
                    {
                        field: 'subject',
                        title: 'SUBJECT',
                        sortable: true,
                        render: function(v, row) {
                            var dot = row.dotColor || '#db2777';
                            return '<div class="d-flex align-items-center gap-2">' +
                                   '<span style="width:9px;height:9px;border-radius:50%;background-color:' + dot + ';display:inline-block;flex-shrink:0;"></span>' +
                                   '<a href="#" class="fw-bold text-primary text-decoration-none" style="font-size:13px;">' + esc(v) + '</a>' +
                                   '</div>';
                        }
                    },
                    {
                        field: 'tags',
                        title: 'TAGS',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="badge bg-light text-secondary border">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'department',
                        title: 'DEPARTMENT',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-semibold text-dark" style="font-size:13px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'service',
                        title: 'SERVICE',
                        sortable: true,
                        render: function(v) {
                            return v ? '<span class="text-secondary" style="font-size:13px;">' + esc(v) + '</span>' : '—';
                        }
                    },
                    {
                        field: 'contact',
                        title: 'CONTACT',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-semibold text-secondary" style="font-size:13px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'status',
                        title: 'STATUS',
                        sortable: true,
                        render: function(v) {
                            var cls = 'st-pill-open';
                            if (v === 'Closed') cls = 'st-pill-closed';
                            if (v === 'In Progress') cls = 'st-pill-progress';
                            if (v === 'Answered') cls = 'st-pill-answered';
                            if (v === 'On Hold') cls = 'st-pill-hold';
                            return '<span class="st-pill ' + cls + '">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'priority',
                        title: 'PRIORITY',
                        sortable: true,
                        render: function(v) {
                            return '<span class="fw-semibold text-secondary" style="font-size:13px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'lastReply',
                        title: 'LAST REPLY',
                        sortable: true,
                        render: function(v) {
                            return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    },
                    {
                        field: 'created',
                        title: 'CREATED',
                        sortable: true,
                        render: function(v) {
                            return '<span class="text-muted" style="font-size:12.5px;">' + esc(v) + '</span>';
                        }
                    }
                ]
            });
        }

        /* Filter by Department listener */
        jQuery('#stDepartment').on('change', function() {
            var dept = jQuery(this).val();
            if (!stMasterTable) return;
            if (!dept) {
                stMasterTable.setData(ticketsData);
            } else {
                var filtered = ticketsData.filter(function(t) {
                    return t.department === dept;
                });
                stMasterTable.setData(filtered);
            }
        });
    });

    function toggleStSelectAllRows(masterCheckbox) {
        var isChecked = masterCheckbox.checked;
        var checkboxes = document.querySelectorAll('.st-row-checkbox');
        checkboxes.forEach(function(cb) {
            cb.checked = isChecked;
        });
    }

    function filterTicketsByStatus(statusName) {
        if (!stMasterTable) return;
        var filtered = ticketsData.filter(function(t) {
            return t.status === statusName;
        });
        stMasterTable.setData(filtered);
    }
