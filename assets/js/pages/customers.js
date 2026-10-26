/**
 * Gharuda CRM - Customers Page Script
 * File: assets/js/pages/customers.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
/* New Customer modal — profile sub-tabs flow (copied from customer-view.php #cvProfile) */
    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('cvNewCustomerModal');
        if (!modalEl) return;
        var root = document.getElementById('ncProfile');
        var s2Ready = false;

        function toastMsg(msg, ok) {
            var t = document.createElement('div');
            t.className = 'cust-toast';
            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
            document.body.appendChild(t);
            setTimeout(function() {
                t.classList.add('show');
            }, 10);
            setTimeout(function() {
                t.classList.remove('show');
                setTimeout(function() {
                    t.remove();
                }, 350);
            }, 2600);
        }

        /* select2 with dropdownParent so the dropdown renders inside the modal */
        function initSelect2() {
            if (s2Ready) return;
            if (!(window.jQuery && jQuery.fn.select2)) return;
            jQuery('#ncProfile .cv-select').select2({
                width: '100%',
                dropdownParent: jQuery('#cvNewCustomerModal')
            });
            s2Ready = true;
        }
        modalEl.addEventListener('shown.bs.modal', initSelect2);

        /* every open starts on the first sub-tab with validation flags cleared */
        modalEl.addEventListener('show.bs.modal', function() {
            root.querySelectorAll('button.cv-subtab').forEach(function(b, i) {
                b.classList.toggle('active', i === 0);
            });
            root.querySelectorAll('.cv-pane').forEach(function(p) {
                p.classList.toggle('active', p.dataset.pane === 'details');
            });
            root.querySelectorAll('.cv-invalid').forEach(function(el) {
                el.classList.remove('cv-invalid');
            });
            root.querySelectorAll('.cv-err').forEach(function(e) {
                e.hidden = true;
            });
        });

        /* Sub tabs: Customer Details / Custom fields / Billing & Shipping switch in-modal */
        var subtabs = root.querySelectorAll('button.cv-subtab'),
            panes = root.querySelectorAll('.cv-pane');
        subtabs.forEach(function(btn) {
            btn.addEventListener('click', function() {
                subtabs.forEach(function(b) {
                    b.classList.toggle('active', b === btn);
                });
                panes.forEach(function(p) {
                    p.classList.toggle('active', p.dataset.pane === btn.dataset.sub);
                });
            });
        });

        function setVal(id, v) {
            var el = document.getElementById(id);
            el.value = v;
            if (el.tagName === 'SELECT' && window.jQuery && jQuery.fn.select2) jQuery(el).trigger('change');
        }

        function getVal(id) {
            return document.getElementById(id).value;
        }

        document.getElementById('cvNewSameAsInfo').addEventListener('click', function() {
            setVal('bStreet', getVal('dAddress'));
            setVal('bCountry', getVal('dCountry'));
            setVal('bState', getVal('dState'));
            setVal('bCity', getVal('dCity'));
            setVal('bZip', getVal('dZip'));
            toastMsg('Billing address copied from customer info');
        });
        document.getElementById('cvNewCopyBilling').addEventListener('click', function() {
            setVal('sStreet', getVal('bStreet'));
            setVal('sCountry', getVal('bCountry'));
            setVal('sState', getVal('bState'));
            setVal('sCity', getVal('bCity'));
            setVal('sZip', getVal('bZip'));
            toastMsg('Shipping address copied from billing');
        });
        root.querySelectorAll('.js-demo').forEach(function(b) {
            b.addEventListener('click', function() {
                toastMsg('Demo only — not connected yet');
            });
        });

        function flag(id, bad) {
            var el = document.getElementById(id),
                err = el.closest('.cv-field').querySelector('.cv-err');
            el.classList.toggle('cv-invalid', bad);
            if (err) err.hidden = !bad;
        }
        document.getElementById('cvNewSubmit').addEventListener('click', function() {
            var noCompany = !getVal('dCompany').trim(),
                noProf = !getVal('cProfession');
            flag('dCompany', noCompany);
            flag('cProfession', noProf);
            if (noCompany || noProf) {
                root.querySelector('.cv-subtab[data-sub="' + (noCompany ? 'details' : 'custom') + '"]').click();
                toastMsg('Please fill the required fields', false);
                return;
            }
            toastMsg('Customer created (demo)');
            if (window.bootstrap) bootstrap.Modal.getOrCreateInstance(modalEl).hide();
        });
    });

/* ==========================================================================
   Script Block 2
   ========================================================================== */
/* Import Customers offcanvas — dropzone flow (same as new-employee.php bulk upload) */
    document.addEventListener('DOMContentLoaded', function() {
        var ocEl = document.getElementById('custImportOffcanvas');
        if (!ocEl) return;
        var input = document.getElementById('custImportInput');
        var dropzone = document.getElementById('custImportDropzone');
        var filePreview = document.getElementById('custImportFile');
        var fileName = document.getElementById('custImportFileName');
        var countBox = document.getElementById('custImportCount');
        var confirmBtn = document.getElementById('custImportConfirm');

        function toastMsg(msg, ok) {
            var t = document.createElement('div');
            t.className = 'cust-toast';
            t.innerHTML = '<i class="bi ' + (ok === false ? 'bi-exclamation-circle-fill' : 'bi-check-circle-fill') + '"></i> ' + msg;
            document.body.appendChild(t);
            setTimeout(function() {
                t.classList.add('show');
            }, 10);
            setTimeout(function() {
                t.classList.remove('show');
                setTimeout(function() {
                    t.remove();
                }, 350);
            }, 2600);
        }

        if (dropzone && input) {
            dropzone.addEventListener('click', function() {
                input.click();
            });

            input.addEventListener('change', function() {
                var file = input.files[0];
                if (!file) return;
                var ext = file.name.split('.').pop().toLowerCase();
                if (['xlsx', 'xls', 'csv'].indexOf(ext) === -1) {
                    toastMsg('Please upload a valid Excel or CSV file.', false);
                    input.value = '';
                    return;
                }
                fileName.textContent = file.name;
                filePreview.classList.add('show');
                countBox.classList.add('show');
                confirmBtn.disabled = false;
            });

            confirmBtn.addEventListener('click', function() {
                if (!input.files[0]) return;
                toastMsg('7 customers are ready to import from ' + input.files[0].name + '.');
                if (window.bootstrap) bootstrap.Offcanvas.getOrCreateInstance(ocEl).hide();
            });
        }

        /* Groups select2 (dropdownParent so it opens above offcanvas) + add-group demo */
        var groupsSel = document.getElementById('custImportGroups');
        if (groupsSel && window.jQuery && jQuery.fn.select2) {
            jQuery(groupsSel).select2({
                width: '100%',
                dropdownParent: jQuery('#custImportOffcanvas')
            });
        }
        /* ➕ Add group → Add New Customer Group modal */
        var addGroupBtn = document.getElementById('custImportAddGroup');
        var groupModal = document.getElementById('custGroupModal');
        if (addGroupBtn && groupModal) {
            addGroupBtn.addEventListener('click', function() {
                document.getElementById('custGroupName').value = '';
                document.getElementById('custGroupNameErr').hidden = true;
                if (window.bootstrap) bootstrap.Modal.getOrCreateInstance(groupModal).show();
            });
        }

        /* Group modal submit — validate name, add to Groups select and select it */
        var groupSubmit = document.getElementById('custGroupSubmit');
        if (groupSubmit && groupModal) {
            var groupName = document.getElementById('custGroupName'),
                groupNameErr = document.getElementById('custGroupNameErr');
            groupName.addEventListener('input', function() {
                groupNameErr.hidden = true;
            });
            groupSubmit.addEventListener('click', function() {
                var name = groupName.value.trim();
                if (!name) {
                    groupNameErr.hidden = false;
                    groupName.focus();
                    return;
                }
                var sel = document.getElementById('custImportGroups'),
                    opt = document.createElement('option');
                opt.value = name;
                opt.textContent = name;
                sel.appendChild(opt);
                sel.value = name;
                if (window.jQuery && jQuery.fn.select2) jQuery(sel).trigger('change');
                groupName.value = '';
                if (window.bootstrap) bootstrap.Modal.getOrCreateInstance(groupModal).hide();
                toastMsg('Customer group "' + name + '" added');
            });
        }

        /* Download sample CSV (demo blob — same pattern as lead.php import) */
        var sampleLink = document.getElementById('custImportSample');
        if (sampleLink) sampleLink.addEventListener('click', function() {
            var csv = 'Company,Primary Contact,Primary Email,Phone,Active,Groups,Profession\n' +
                'GG COMPANY,MOHAN S,kaviyarasu@ghratechnology.com,9677063368,1,,Builders\n' +
                'Bijlipay,Madhupriya S,madhupriyas2911@gmail.com,,0,,Retail\n' +
                'SUNGWOO HITECH INDIA PRIVATE LIMITED,,,,1,,Manufacturing';
            var blob = new Blob([csv], {
                type: 'text/csv'
            });
            var a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'customers-sample-template.csv';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(a.href);
        });
    });

/* ==========================================================================
   Script Block 3
   ========================================================================== */
/* Contacts modal — MasterTable flow (department.php madhiri: toolbar/footer auto, add/edit/delete) */
    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('contactsModal');
        if (!modalEl || typeof MasterTable === 'undefined') return;

        function toastC(msg) {
            var t = document.createElement('div');
            t.className = 'cust-toast';
            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
            document.body.appendChild(t);
            setTimeout(function() {
                t.classList.add('show');
            }, 10);
            setTimeout(function() {
                t.classList.remove('show');
                setTimeout(function() {
                    t.remove();
                }, 350);
            }, 2600);
        }

        var contactData = [
            { id: 1,  first_name: 'abul',        last_name: 'rahim',  email: 'amirtharaja@assureintermediary.com', company: 'asd',   phone: '88072299557212112121212121121111', role: '',          last_login: '', active: 1 },
            { id: 2,  first_name: 'Heera',       last_name: 'B',      email: 'subraddy@subrascientific.in',        company: 'Subra', phone: '',              role: 'Manager',         last_login: '', active: 1 },
            { id: 3,  first_name: 'Jeevajothi',  last_name: 'SOFTWARE', email: 'GHARUDAsoftwares@gmail.com',          company: 'Abcde', phone: '09876543219',   role: '',                last_login: '', active: 1 },
            { id: 4,  first_name: 'GHARUDA',        last_name: 'SOFTWARE', email: 'madhupriya111999@gmail.com',       company: 'GHARUDA soft', phone: '09876543219', role: '',              last_login: '', active: 1 },
            { id: 5,  first_name: 'kumar',       last_name: 'v',      email: 'stars.engineering@gmail.com',        company: 'Stars Engineering Equipment', phone: '91 93840 45159', role: 'Kaniyur Post, Karumathampathy', last_login: '', active: 1 },
            { id: 6,  first_name: 'M.Suresh',    last_name: 'Kumar',  email: 'msk@mctindia.co',                    company: 'MICRO CONCEPT TOOLS', phone: '+91 90030 65004', role: 'Maneging Director', last_login: '', active: 1 },
            { id: 7,  first_name: 'Madhupriya',  last_name: 'S',      email: 'madhupriyas2911@gmail.com',          company: 'Bijlipay', phone: '+916148533320', role: '',               last_login: '', active: 1 },
            { id: 8,  first_name: 'Mahesh',      last_name: 'A',      email: 'mahesh@gmail.com',                   company: 'Raja Enterprises', phone: '',   role: '',                last_login: '', active: 1 },
            { id: 9,  first_name: 'manikandan',  last_name: 'C',      email: 'hhp@industriahydraulic.in',          company: 'HINDUSTAN HYDRAULICS & PNEUMATICS', phone: '9840921889', role: 'MAINT', last_login: '', active: 1 },
            { id: 10, first_name: 'MOHAN',       last_name: 'S',      email: 'kaviyarasu@GHARUDAtechnology.com',      company: 'GG COMPANY', phone: '9677063368', role: 'EVENT MANGAMENT', last_login: '', active: 1 },
            { id: 11, first_name: 'Mr',          last_name: 'prabhu', email: 'prabhu@gmail.com',                   company: 'Prabhu photos', phone: '8122780121', role: '',           last_login: '', active: 1 },
            { id: 12, first_name: 'Mrs.Rani',    last_name: 'J',      email: 'uhp@universalhydraulic.in',          company: 'UNIVERSAL HYDRAULICS & PNEUMATICS', phone: '9500023351', role: 'sales', last_login: '', active: 1 },
            { id: 13, first_name: 'selvakumar',  last_name: 'wtdg',   email: 'aaa2@gmail.com',                     company: 'gta',   phone: '9384055381',    role: '',                last_login: '', active: 1 }
        ];

        var contactTable = MasterTable.init({
            tableId: 'contactsTable',
            tbodyId: 'ctTbody',
            idPrefix: 'ct',
            data: contactData,
            tableName: 'Contacts',
            primaryKey: 'id',
            searchFields: ['first_name', 'last_name', 'email', 'company', 'phone', 'role'],

            columns: [
                { field: 'first_name', title: 'First Name', sortable: true, render: function(val) {
                    return '<div class="d-flex align-items-center gap-2"><span class="ct-avatar"><i class="bi bi-person"></i></span><span class="ct-link">' + val + '</span></div>';
                } },
                { field: 'last_name', title: 'Last Name', sortable: true },
                { field: 'email', title: 'Email', sortable: true, render: function(val) {
                    return '<a href="mailto:' + val + '" class="ct-link">' + val + '</a>';
                } },
                { field: 'company', title: 'Company', sortable: true },
                { field: 'phone', title: 'Phone', sortable: true },
                { field: 'role', title: 'Role Position', sortable: true },
                { field: 'last_login', title: 'Last Login', sortable: true },
                { field: 'active', title: 'Active', sortable: false, render: function(val) {
                    return '<label class="ct-switch"><input type="checkbox" ' + (val ? 'checked' : '') + ' aria-label="Active"><span class="slider"></span></label>';
                } },
                { field: null, title: 'Action', sortable: false, render: function(val, row) {
                    return '<div class="btn-group">' +
                        '<button type="button" class="btn btn-sm edit btn-edit" data-id="' + row.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>' +
                        '<button type="button" class="btn btn-sm danger btn-delete" data-id="' + row.id + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>' +
                        '</div>';
                } }
            ],


            onEdit: function() {
                toastC('Edit contact (demo)');
            },


            onDelete: function(id) {
                contactTable.deleteItem(id);
                toastC('Contact deleted');
            }
        });


        /* Active toggle toast */
        modalEl.addEventListener('change', function(e) {
            if (e.target.matches('#ctTbody .ct-switch input')) {
                var row = e.target.closest('tr'),
                    id = Number(row && row.dataset.id);
                contactTable.updateItem(id, { active: e.target.checked ? 1 : 0 });
                toastC('Contact marked ' + (e.target.checked ? 'active' : 'inactive'));
            }
        });


        /* ---- Create (demo — no modal yet) ---- */
        var ctAddBtn = document.getElementById('ctAddBtn');
        if (ctAddBtn) ctAddBtn.addEventListener('click', function() {
            toastC('Add contact (demo)');
        });
    });

/* ==========================================================================
   Script Block 4
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        var rows = Array.from(document.querySelectorAll('.cust-row')),
            searchEl = document.getElementById('custSearch'),
            checkAll = document.getElementById('custCheckAll'),
            appliedSearch = '',
            appliedFilter = 'all';

        function refreshTable() {
            var tbl = document.getElementById('customersTable');
            if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') {
                tbl.autoTable.refresh();
            } else if (window.refreshAttendanceTable) {
                window.refreshAttendanceTable();
            }
        }

        function liveRows() {
            return Array.from(document.querySelectorAll('#pgBody .cust-row'));
        }

        // Same hook tabel.js / auto-master-table.js uses
        window.attendanceRowMatches = function(row) {
            if (appliedFilter === 'active' && row.dataset.active !== '1') return false;
            if (appliedFilter === 'inactive' && row.dataset.active !== '0') return false;
            var q = appliedSearch.toLowerCase().trim();
            return !q || row.textContent.toLowerCase().indexOf(q) > -1;
        };

        function toast(msg) {
            var t = document.createElement('div');
            t.className = 'cust-toast';
            t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
            document.body.appendChild(t);
            setTimeout(function() {
                t.classList.add('show');
            }, 10);
            setTimeout(function() {
                t.classList.remove('show');
                setTimeout(function() {
                    t.remove();
                }, 350);
            }, 2600);
        }

        function updateSummary() {
            var list = liveRows(),
                active = list.filter(function(r) {
                    return r.dataset.active === '1';
                }).length;
            var elTot = document.getElementById('sumTotal'),
                elAct = document.getElementById('sumActive'),
                elIna = document.getElementById('sumInactive');
            if (elTot) elTot.textContent = list.length;
            if (elAct) elAct.textContent = active;
            if (elIna) elIna.textContent = list.length - active;
        }
        updateSummary();

        // Search (live) if manual search element exists
        if (searchEl) {
            searchEl.addEventListener('input', function() {
                appliedSearch = this.value;
                refreshTable();
            });
        }

        // Summary click -> filter
        document.querySelectorAll('#custSummary [data-filter]').forEach(function(item) {
            item.addEventListener('click', function() {
                document.querySelectorAll('#custSummary .cust-summary-item').forEach(function(i) {
                    i.classList.remove('active');
                });
                this.classList.add('active');
                appliedFilter = this.dataset.filter;
                refreshTable();
            });
        });

        // Refresh
        var custRefreshBtn = document.getElementById('custRefresh');
        if (custRefreshBtn) {
            custRefreshBtn.addEventListener('click', function() {
                if (searchEl) searchEl.value = '';
                appliedSearch = '';
                appliedFilter = 'all';
                document.querySelectorAll('#custSummary .cust-summary-item').forEach(function(i) {
                    i.classList.toggle('active', i.dataset.filter === 'all');
                });
                liveRows().forEach(function(r) {
                    var chk = r.querySelector('.cust-check');
                    if (chk) chk.checked = false;
                    r.classList.remove('selected');
                });
                if (checkAll) checkAll.checked = false;
                refreshTable();
                toast('Table reloaded');
            });
        }

        document.getElementById('custFormSync').addEventListener('click', function() {
            toast('Form sync started');
        });

        // Selection + active toggle (delegated)
        var pgBody = document.getElementById('pgBody');
        pgBody.addEventListener('change', function(e) {
            var row = e.target.closest('.cust-row');
            if (!row) return;
            if (e.target.classList.contains('cust-check')) {
                row.classList.toggle('selected', e.target.checked);
                var vis = liveRows().filter(function(r) {
                    return r.style.display !== 'none';
                });
                checkAll.checked = vis.length > 0 && vis.every(function(r) {
                    return r.querySelector('.cust-check').checked;
                });
            }
            if (e.target.classList.contains('js-active-toggle')) {
                row.dataset.active = e.target.checked ? '1' : '0';
                updateSummary();
                if (appliedFilter !== 'all') refreshTable();
                toast(e.target.checked ? 'Customer marked active' : 'Customer marked inactive');
            }
        });
        checkAll.addEventListener('change', function() {
            var on = this.checked;
            liveRows().forEach(function(r) {
                if (r.style.display === 'none') return;
                r.querySelector('.cust-check').checked = on;
                r.classList.toggle('selected', on);
            });
        });

        // Phone eye
        pgBody.addEventListener('click', function(e) {
            var reveal = e.target.closest('.js-reveal-phone');
            if (reveal) {
                var wrap = reveal.closest('.cust-phone'),
                    shown = wrap.dataset.shown === '1';
                wrap.querySelector('.phone-text').textContent = shown ? '••••••' + wrap.dataset.phone.slice(-4) : wrap.dataset.phone;
                wrap.dataset.shown = shown ? '0' : '1';
                reveal.querySelector('i').className = shown ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill';
            }
            if (e.target.closest('.js-no-permission')) toast("You don't have permission to view this number");
        });

        // Row click -> customer detail page (any row click navigates to customer-view.php)
        pgBody.addEventListener('click', function(e) {
            if (e.target.closest('input[type="checkbox"], label.cust-switch, .cust-switch, button, a[href^="mailto:"], a[href^="tel:"], .cust-eye')) return;
            var row = e.target.closest('.cust-row');
            if (row) window.location.href = 'customer-view.php';
        });

        // Bulk actions
        document.querySelectorAll('[data-bulk]').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var selected = liveRows().filter(function(r) {
                    return r.querySelector('.cust-check').checked;
                });
                if (!selected.length) {
                    toast('Select at least one customer first');
                    return;
                }
                var action = this.dataset.bulk;
                if (action === 'delete') {
                    if (!confirm('Delete ' + selected.length + ' selected customer(s)?')) return;
                    selected.forEach(function(r) {
                        r.remove();
                    });
                } else {
                    var on = action === 'activate';
                    selected.forEach(function(r) {
                        r.dataset.active = on ? '1' : '0';
                        r.querySelector('.js-active-toggle').checked = on;
                    });
                }
                checkAll.checked = false;
                updateSummary();
                refreshTable();
                toast('Bulk action applied to ' + selected.length + ' customer(s)');
            });
        });

        // Dropdown open/close (Export + Bulk)
        function bindMenu(triggerId, menuId) {
            var trigger = document.getElementById(triggerId),
                menu = document.getElementById(menuId);

            function close() {
                menu.classList.remove('show');
                trigger.setAttribute('aria-expanded', 'false');
            }
            trigger.addEventListener('click', function(e) {
                e.stopPropagation();
                var wasOpen = menu.classList.contains('show');
                document.querySelectorAll('.mt-export-dropdown.show').forEach(function(d) {
                    d.classList.remove('show');
                });
                document.querySelectorAll('.mt-export-trigger').forEach(function(t) {
                    t.setAttribute('aria-expanded', 'false');
                });
                if (wasOpen) return;
                menu.classList.add('show');
                trigger.setAttribute('aria-expanded', 'true');
                var r = trigger.getBoundingClientRect(),
                    w = menu.offsetWidth || 170,
                    left = Math.max(8, Math.min(r.left, window.innerWidth - w - 8));
                menu.style.left = left + 'px';
                menu.style.top = (r.bottom + 6) + 'px';
            });
            document.addEventListener('click', function(e) {
                if (!menu.contains(e.target) && e.target !== trigger) close();
            });
            window.addEventListener('scroll', close, true);
            window.addEventListener('resize', close);
            menu.addEventListener('click', close);
        }
        bindMenu('mtExportTrigger', 'mtExportDropdown');
        bindMenu('custBulkTrigger', 'custBulkDropdown');

        // Export: all rows matching current search/filter (not only current page)
        function getTableData() {
            var headers = ['#', 'Company', 'Primary Contact', 'Primary Email', 'Phone', 'Active', 'Groups', 'Date Created', 'Profession'];
            var data = liveRows().filter(window.attendanceRowMatches).map(function(r) {
                var c = r.cells;
                return [c[1], c[2], c[3], c[4], c[5]].map(function(td) {
                        return td.textContent.replace(/\s+/g, ' ').trim();
                    })
                    .concat([r.dataset.active === '1' ? 'Yes' : 'No'])
                    .concat([c[7], c[8], c[9]].map(function(td) {
                        return td.textContent.trim();
                    }));
            });
            return {
                headers: headers,
                rows: data
            };
        }

        function q(s) {
            return '"' + String(s).replace(/"/g, '""') + '"';
        }

        function download(name, content, mime) {
            var a = document.createElement('a');
            a.href = URL.createObjectURL(new Blob([content], {
                type: mime
            }));
            a.download = name;
            a.click();
        }

        function htmlTable(d) {
            return '<table border="1"><thead><tr>' + d.headers.map(function(h) {
                return '<th>' + h + '</th>';
            }).join('') + '</tr></thead><tbody>' + d.rows.map(function(r) {
                return '<tr>' + r.map(function(c) {
                    return '<td>' + c + '</td>';
                }).join('') + '</tr>';
            }).join('') + '</tbody></table>';
        }
        document.getElementById('mtCopyBtn').addEventListener('click', function() {
            var d = getTableData();
            navigator.clipboard.writeText(d.headers.join('\t') + '\n' + d.rows.map(function(r) {
                return r.join('\t');
            }).join('\n'));
            toast('Copied to clipboard');
        });
        document.getElementById('mtCsvBtn').addEventListener('click', function() {
            var d = getTableData();
            download('customers.csv', d.headers.map(q).join(',') + '\n' + d.rows.map(function(r) {
                return r.map(q).join(',');
            }).join('\n'), 'text/csv');
        });
        document.getElementById('mtExcelBtn').addEventListener('click', function() {
            download('customers.xls', '<html><head><meta charset="UTF-8"></head><body>' + htmlTable(getTableData()) + '</body></html>', 'application/vnd.ms-excel');
        });
        document.getElementById('mtPdfBtn').addEventListener('click', function() {
            var d = getTableData();
            if (typeof pdfMake === 'undefined') {
                alert('PDF library not loaded.');
                return;
            }
            pdfMake.createPdf({
                content: [{
                    table: {
                        headerRows: 1,
                        widths: 'auto',
                        body: [d.headers].concat(d.rows)
                    }
                }],
                defaultStyle: {
                    fontSize: 9
                }
            }).download('customers.pdf');
        });
        document.getElementById('mtPrintBtn').addEventListener('click', function() {
            var w = window.open('');
            w.document.write('<html><head><title>Customers</title><style>table{border-collapse:collapse;width:100%}th,td{border:1px solid #ddd;padding:8px;text-align:left;font-size:12px}th{background:#f5f5f5}</style></head><body>' + htmlTable(getTableData()) + '</body></html>');
            w.document.close();
            w.print();
        });

        updateSummary();
        refreshTable();
    });
