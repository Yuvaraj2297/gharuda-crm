/**
 * Gharuda CRM - Lead Page Script
 * File: assets/js/pages/lead.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {
        /* ---- Page view tabs: All Leads / Activity Stats ---- */
        var lpTabs = document.querySelectorAll('#lpTabs .lp-tab');
        lpTabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                lpTabs.forEach(function(t) {
                    t.classList.remove('active', 'btn-primary');
                    t.classList.add('btn-outline-primary');
                });
                tab.classList.add('active', 'btn-primary');
                tab.classList.remove('btn-outline-primary');
                document.querySelectorAll('.lp-panel').forEach(function(p) {
                    p.classList.remove('active');
                });
                var panel = document.getElementById('lpPanel-' + tab.dataset.tab);
                if (panel) panel.classList.add('active');
                /* re-measure responsive tables inside the shown panel */
                window.dispatchEvent(new Event('resize'));
            });
        });

        /* ---- Activity Stats group cards: ovvoru period cell um clickable ----
           fu-link (Follow Up) cells → follow-up-list.php page redirect (range+type params)
           matha group cells → demo toast */
        var statsToastTimer = null;
        function showStatsToast(msg) {
            var old = document.getElementById('astToast');
            if (old) old.remove();
            var t = document.createElement('div');
            t.id = 'astToast';
            t.style.cssText = 'position:fixed;bottom:24px;left:50%;transform:translateX(-50%);background:#111827;color:#fff;padding:10px 18px;border-radius:10px;font-size:12.5px;font-weight:700;z-index:9999;box-shadow:0 10px 28px rgba(0,0,0,.25);opacity:0;transition:opacity .18s;';
            t.textContent = msg;
            document.body.appendChild(t);
            requestAnimationFrame(function() { t.style.opacity = '1'; });
            clearTimeout(statsToastTimer);
            statsToastTimer = setTimeout(function() {
                t.style.opacity = '0';
                setTimeout(function() { t.remove(); }, 250);
            }, 2600);
        }
        document.querySelectorAll('#lpPanel-stats .ast-open').forEach(function(cell) {
            cell.addEventListener('click', function() {
                var group = cell.getAttribute('data-group') || '';
                var period = cell.getAttribute('data-period') || '';
                var range = cell.getAttribute('data-range') || '';
                var isFu = cell.classList.contains('fu-link');
                var label = group + ' — ' + period;
                if (isFu) {
                    /* Follow Up cells → follow-up-list.php page open (range + type param oda) */
                    var fuType = label.indexOf('Completed') !== -1 ? 'completed' : 'actual';
                    window.location.href = 'follow-up-list.php?range=' + encodeURIComponent(range) + '&type=' + fuType;
                } else {
                    /* Matha group cells: group+period filter panni lead list kaatum (demo toast) */
                    showStatsToast('📋 ' + label + ' leads list open aagudhu… (' + range + ')');
                }
            });
        });
    });

/* ==========================================================================
   Script Block 2
   ========================================================================== */
(function() {
                    var modal = document.getElementById('importLeadsModal');
                    if (!modal) return;
                    /* + button -> inline add row for status/source */
                    modal.querySelectorAll('.im-inline-add[data-im-target]').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            var wrap = btn.closest('.im-field').querySelector('.im-inline-wrap');
                            if (wrap) {
                                wrap.classList.toggle('show');
                                var inp = wrap.querySelector('input');
                                if (inp && wrap.classList.contains('show')) inp.focus();
                            }
                        });
                    });
                    /* inline save -> append option to sibling select */
                    modal.querySelectorAll('.im-inline-save').forEach(function(saveBtn) {
                        saveBtn.addEventListener('click', function() {
                            var wrap = saveBtn.closest('.im-inline-wrap');
                            var inp = wrap.querySelector('input');
                            var val = inp.value.trim();
                            if (!val) return;
                            var selId = wrap.id === 'imInlineStatus' ? 'importStatus' : 'importSource';
                            var sel = document.getElementById(selId);
                            var exists = Array.from(sel.options).some(function(o) {
                                return o.text.toLowerCase() === val.toLowerCase();
                            });
                            if (!exists) {
                                var opt = document.createElement('option');
                                opt.textContent = val;
                                sel.appendChild(opt);
                            }
                            sel.value = Array.from(sel.options).find(function(o) {
                                return o.text.toLowerCase() === val.toLowerCase();
                            }).value || val;
                            inp.value = '';
                            wrap.classList.remove('show');
                        });
                    });
                    /* Enter key in inline input triggers save */
                    modal.querySelectorAll('.im-inline-wrap input').forEach(function(inp) {
                        inp.addEventListener('keydown', function(e) {
                            if (e.key === 'Enter') {
                                e.preventDefault();
                                inp.closest('.im-inline-wrap').querySelector('.im-inline-save').click();
                            }
                        });
                    });
                    /* Download sample CSV (demo blob) */
                    var sampleLink = document.getElementById('importSampleLink');
                    if (sampleLink) sampleLink.addEventListener('click', function(e) {
                        e.preventDefault();
                        var csv = 'Name,Company,Phone,Email,Country,Product,Value,Tags,Profession\n' +
                            'Arun Kumar,Vetri Constructions,9840012345,arun@example.com,India,ERP Software License,85000,Hot Lead,Builder\n' +
                            'Meena Ramesh,Sri Lakshmi Traders,9884456789,meena@example.com,India,HRMS Annual Subscription,141629,Won,Retailer';
                        var blob = new Blob([csv], {
                            type: 'text/csv'
                        });
                        var a = document.createElement('a');
                        a.href = URL.createObjectURL(blob);
                        a.download = 'leads-sample-template.csv';
                        document.body.appendChild(a);
                        a.click();
                        document.body.removeChild(a);
                        URL.revokeObjectURL(a.href);
                    });
                    /* Simulate Import (demo) */
                    var simBtn = document.getElementById('btnSimulateImport');
                    if (simBtn) simBtn.addEventListener('click', function() {
                        var fileEl = document.getElementById('importFile');
                        if (!fileEl || !fileEl.files.length) {
                            alert('Please choose a CSV file first.');
                            return;
                        }
                        var original = simBtn.innerHTML;
                        simBtn.disabled = true;
                        simBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Simulating...';
                        setTimeout(function() {
                            simBtn.disabled = false;
                            simBtn.innerHTML = original;
                            alert('\u2705 Simulation complete: 2 leads will be imported (0 errors, 0 duplicates).');
                        }, 900);
                    });
                })();

/* ==========================================================================
   Script Block 3
   ========================================================================== */
document.addEventListener('DOMContentLoaded', function() {

        /* ---- Select2 inside modals needs dropdownParent ---- */
        var nlModal = document.getElementById('newLeadModal');
        if (nlModal && typeof $ !== 'undefined' && $.fn.select2) {
            nlModal.addEventListener('shown.bs.modal', function() {
                $('#newLeadModal .select2').each(function() {
                    if ($(this).data('select2')) {
                        $(this).select2('destroy');
                    }
                    $(this).select2({
                        width: '100%',
                        dropdownParent: $(nlModal)
                    });
                });
            });
        }

        /* ---- New Task modal: drop zone, file list, tags chip, submit ---- */
        (function() {
            var modalEl = document.getElementById('newTaskModal');
            if (!modalEl) return;

            /* Attach files: drag & drop zone + selected file list */
            var dropZone = document.getElementById('tkDropZone');
            var fileInput = document.getElementById('tkAttachInput');
            var fileList = document.getElementById('tkFileList');

            function fileIcon(f) {
                var n = (f.name || '').toLowerCase();
                if (f.type.indexOf('image/') === 0 || /\.(png|jpe?g|gif|webp|svg)$/.test(n)) return 'bi-file-earmark-image';
                if (f.type === 'application/pdf' || n.indexOf('.pdf') !== -1) return 'bi-file-earmark-pdf';
                if (/\.docx?$/.test(n)) return 'bi-file-earmark-word';
                if (/\.xlsx?$/.test(n)) return 'bi-file-earmark-excel';
                return 'bi-file-earmark';
            }

            function fmtSize(bytes) {
                if (bytes >= 1048576) return (bytes / 1048576).toFixed(1) + ' MB';
                if (bytes >= 1024) return (bytes / 1024).toFixed(1) + ' KB';
                return bytes + ' B';
            }

            function addFiles(list) {
                Array.prototype.forEach.call(list, function(f) {
                    var item = document.createElement('div');
                    item.className = 'tk-file-item';
                    item.innerHTML = '<i class="bi ' + fileIcon(f) + '"></i>' +
                        '<span class="nm"></span><span class="sz"></span>' +
                        '<button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    item.querySelector('.nm').textContent = f.name;
                    item.querySelector('.sz').textContent = fmtSize(f.size || 0);
                    item.querySelector('.rm').addEventListener('click', function() {
                        item.remove();
                    });
                    fileList.appendChild(item);
                });
            }
            if (dropZone && fileInput) {
                dropZone.addEventListener('click', function() {
                    fileInput.click();
                });
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('dragover');
                });
                dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('dragover');
                });
                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('dragover');
                    if (e.dataTransfer && e.dataTransfer.files.length) addFiles(e.dataTransfer.files);
                });
                fileInput.addEventListener('change', function() {
                    if (fileInput.files.length) addFiles(fileInput.files);
                    fileInput.value = '';
                });
            }

            /* Tags chip input (Enter to add, × to remove) */
            var tagsWrap = document.getElementById('tkTagsWrap');
            var tagsChips = document.getElementById('tkTagsChips');
            var tagsInput = document.getElementById('tkTagsInput');
            var tags = [];

            function addTag(text) {
                var val = (text || '').trim().replace(/,/g, '');
                if (!val || tags.indexOf(val) !== -1) return;
                tags.push(val);
                var chip = document.createElement('span');
                chip.className = 'nl-tag-chip';
                chip.innerHTML = '<span class="lbl"></span><button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                chip.querySelector('.lbl').textContent = val;
                chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                    var i = tags.indexOf(val);
                    if (i !== -1) tags.splice(i, 1);
                    chip.remove();
                });
                tagsChips.appendChild(chip);
            }
            if (tagsInput) {
                tagsInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        addTag(tagsInput.value);
                        tagsInput.value = '';
                    }
                });
                tagsInput.addEventListener('blur', function() {
                    if (tagsInput.value.trim()) {
                        addTag(tagsInput.value);
                        tagsInput.value = '';
                    }
                });
                if (tagsWrap) tagsWrap.addEventListener('click', function() {
                    tagsInput.focus();
                });
            }

            /* Submit -> add row into lead detail Tasks table (tkTasksTable) */
            var submitBtn = document.getElementById('tkTaskSubmit');
            if (submitBtn) {
                submitBtn.addEventListener('click', function() {
                    var subject = document.getElementById('tkSubject');
                    var startDate = document.getElementById('tkStartDate');
                    if (!subject || !subject.value.trim()) {
                        subject.focus();
                        alert('Subject is required.');
                        return;
                    }
                    if (!startDate || !startDate.value) {
                        startDate.focus();
                        alert('Start date is required.');
                        return;
                    }

                    var tbody = document.querySelector('#tkTasksTable tbody');
                    if (tbody) {
                        var d = new Date(startDate.value + 'T00:00:00');
                        var fmt = function(dt) {
                            return ('0' + dt.getDate()).slice(-2) + '-' + ('0' + (dt.getMonth() + 1)).slice(-2) + '-' + dt.getFullYear();
                        };
                        var due = document.getElementById('tkDueDate');
                        var dueVal = due && due.value ? fmt(new Date(due.value + 'T00:00:00')) : '-';
                        var assignee = document.getElementById('tkAssignees');
                        var prio = document.getElementById('tkPriority');
                        var p = prio ? prio.value : 'Medium';
                        var pCls = p === 'Low' ? 'accepted' : (p === 'High' || p === 'Urgent') ? 'rejected' : 'draft';

                        var tr = document.createElement('tr');
                        var tdNo = document.createElement('td');
                        tdNo.innerHTML = '<a href="#" class="lead-name-link"></a>';
                        tdNo.querySelector('a').textContent = '43';
                        var tdName = document.createElement('td');
                        tdName.innerHTML = '<a href="#" class="lead-name-link"></a>';
                        tdName.querySelector('a').textContent = subject.value.trim();
                        var tdStatus = document.createElement('td');
                        tdStatus.innerHTML = '<span class="ld-prop-status draft">Not Started</span>';
                        var tdStart = document.createElement('td');
                        tdStart.className = 'text-nowrap';
                        tdStart.textContent = fmt(d);
                        var tdDue = document.createElement('td');
                        tdDue.className = 'text-nowrap';
                        tdDue.textContent = dueVal;
                        var tdAssigned = document.createElement('td');
                        tdAssigned.textContent = assignee ? assignee.value : '-';
                        var tdTags = document.createElement('td');
                        tdTags.textContent = tags.join(', ') || '-';
                        var tdPrio = document.createElement('td');
                        tdPrio.innerHTML = '<span class="ld-prop-status ' + pCls + '"></span>';
                        tdPrio.querySelector('span').textContent = p;
                        [tdNo, tdName, tdStatus, tdStart, tdDue, tdAssigned, tdTags, tdPrio].forEach(function(td) {
                            tr.appendChild(td);
                        });
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('tkTasksTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }

                    /* Close + reset */
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(modalEl).hide();
                    subject.value = '';
                    document.getElementById('tkHourlyRate').value = '0';
                    document.getElementById('tkDescription').value = '';
                    tags = [];
                    if (tagsChips) tagsChips.innerHTML = '';
                    if (fileList) fileList.innerHTML = '';
                    var dueReset = document.getElementById('tkDueDate');
                    if (dueReset) dueReset.value = '';
                });
            }
        })();        /* ---- Inline add (+) button for Status / Source: mini modal flow ---- */
        (function() {
            var addModal = document.getElementById('nlAddOptionModal');
            var addInput = document.getElementById('nlAddOptionInput');
            var addTitle = document.getElementById('nlAddOptionTitle');
            var addSave = document.getElementById('nlAddOptionSave');
            var addCancel = document.getElementById('nlAddOptionCancel');
            if (!addModal || !addInput || !addTitle || !addSave || !addCancel) return;
            var targetSelect = null;
            var targetLabel = '';


            function fieldLabel(sel) {
                var col = sel ? sel.closest('.col-lg-3, .col-md-6, .col-md-4, .col-lg-4, .col-12') : null;
                var lbl = col ? col.querySelector('label.form-label') : null;
                return lbl ? lbl.textContent.replace('*', '').trim() : 'Option';
            }


            document.querySelectorAll('.nl-add-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var targetId = btn.getAttribute('data-nl-target');
                    targetSelect = targetId ? document.getElementById(targetId) : null;
                    if (!targetSelect) return;
                    targetLabel = fieldLabel(targetSelect);
                    addTitle.textContent = 'Add New ' + targetLabel;
                    addInput.placeholder = 'Type new ' + targetLabel.toLowerCase() + '...';
                    addInput.value = '';
                    if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(addModal).show();
                });
            });


            function saveOption() {
                var val = addInput.value.trim();
                if (!val) {
                    addInput.focus();
                    return;
                }
                var exists = Array.from(targetSelect.options).some(function(o) {
                    return o.value.toLowerCase() === val.toLowerCase();
                });
                if (!exists) {
                    targetSelect.appendChild(new Option(val, val, false, false));
                }
                targetSelect.value = val;
                if (typeof $ !== 'undefined' && $(targetSelect).data('select2')) {
                    $(targetSelect).trigger('change');
                }
                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(addModal).hide();
            }


            addSave.addEventListener('click', saveOption);
            addCancel.addEventListener('click', function() {
                if (typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(addModal).hide();
            });
            addInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    saveOption();
                }
            });
        })();

        /* ---- Tags chip input ---- */
        (function() {
            var chipsWrap = document.getElementById('nlTagsChips');
            var input = document.getElementById('nlTagsInput');
            var hidden = document.getElementById('nl_tags');
            var wrap = document.getElementById('nlTagsWrap');
            if (!chipsWrap || !input || !hidden) return;
            var tags = [];

            function syncHidden() {
                hidden.value = tags.join(',');
            }

            function addTag(text) {
                var val = text.trim().replace(/,/g, '');
                if (!val || tags.indexOf(val) !== -1) return;
                tags.push(val);
                var chip = document.createElement('span');
                chip.className = 'nl-tag-chip';
                chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                chipsWrap.appendChild(chip);
                chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                    var idx = tags.indexOf(val);
                    if (idx !== -1) tags.splice(idx, 1);
                    chip.remove();
                    syncHidden();
                });
                syncHidden();
            }

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addTag(input.value);
                    input.value = '';
                }
                if (e.key === 'Backspace' && !input.value && tags.length) {
                    var last = chipsWrap.lastElementChild;
                    if (last) last.querySelector('.nl-tag-x').click();
                }
            });
            input.addEventListener('blur', function() {
                if (input.value.trim()) {
                    addTag(input.value);
                    input.value = '';
                }
            });
            if (wrap) wrap.addEventListener('click', function() {
                input.focus();
            });
        })();

        /* ---- Follow Up stats: Today/Weekly/Monthly -> follow-up-list.php ---- */
        document.querySelectorAll('.lead-stats-table .fu-link').forEach(function(cell) {
            cell.addEventListener('click', function() {
                var range = cell.getAttribute('data-range') || 'today';
                window.location.href = 'follow-up-list.php?range=' + encodeURIComponent(range);
            });
        });

        /* ---- Filter panel toggle (closed by default — open only on button click) ---- */
        var filterBtn = document.getElementById('leadFilterToggle');
        var filterCollapse = document.getElementById('leadFilterCollapse');
        if (filterBtn && filterCollapse) {
            filterBtn.addEventListener('click', function() {
                filterBtn.classList.toggle('open');
                filterCollapse.classList.toggle('open');
            });
        }

        /* ---- View toggle (list / grid) — visual only ---- */
        document.querySelectorAll('.lead-view-toggle button').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.lead-view-toggle button').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
            });
        });

        /* ---- Apply / Clear filters -> active filter chips ---- */
        var activeBar = document.getElementById('leadActiveFilters');

        function renderChips() {
            var chips = [];
            document.querySelectorAll('#leadFilterCollapse select, #leadFilterCollapse input').forEach(function(el) {
                var label = el.getAttribute('data-label');
                if (!label) return;
                var val = '';
                if (el.tagName === 'SELECT' && el.multiple) {
                    val = Array.from(el.selectedOptions).map(function(o) {
                        return o.text;
                    }).join(', ');
                } else if (el.tagName === 'SELECT') {
                    val = el.selectedOptions[0] ? el.selectedOptions[0].text : '';
                } else {
                    val = el.value;
                }
                if (!val) return;
                chips.push('<span class="filter-chip"><span class="chip-key">' + label + ':</span> ' + val + '<button type="button" class="chip-close">&times;</button></span>');
            });
            if (chips.length) {
                activeBar.innerHTML = chips.join('') + '<button type="button" class="active-filters-clear" id="leadClearAllChip">Clear All</button>';
                activeBar.classList.add('show');
            } else {
                activeBar.innerHTML = '';
                activeBar.classList.remove('show');
            }
        }
        var applyBtn = document.getElementById('applyLeadFilters');
        if (applyBtn) applyBtn.addEventListener('click', renderChips);
        var clearBtn = document.getElementById('clearLeadFilters');
        if (clearBtn) {
            clearBtn.addEventListener('click', function() {
                document.querySelectorAll('#leadFilterCollapse select').forEach(function(s) {
                    if (typeof $ !== 'undefined' && $(s).data('select2')) {
                        $(s).val(null).trigger('change');
                    }
                });
                document.querySelectorAll('#leadFilterCollapse input[type="date"]').forEach(function(i) {
                    i.value = '';
                });
                renderChips();
            });
        }
        document.addEventListener('click', function(e) {
            if (e.target && (e.target.id === 'leadClearAllChip' || e.target.closest('.chip-close'))) {
                activeBar.innerHTML = '';
                activeBar.classList.remove('show');
            }
        });

        /* ---- Leads table: MasterTable flow (search/sort/pagination/export/columns) ---- */
        var leadsData = [{
                id: 1,
                lead_no: 5,
                name: 'Sample Data',
                company: 'Sample Data',
                enq_code: 'Sample Data',
                country: null,
                stage_pct: 0,
                stage_color: '#e5484d',
                next_reminder: null,
                closure_date: null,
                activity_log: null,
                phone: null,
                product: null,
                value: null,
                tags: 'tag1, tag2',
                assigned: null,
                assigned_initials: '',
                assigned_color: '#c9c9d1',
                source: null,
                source_initial: '',
                source_color: '#3564e0',
                wa_phone: null,
                status: 'Quotation',
                source_name: 'Direct',
                last_contact: '21-03-2026 16:05:50',
                created: '10-03-2026 12:54:36',
                profession: null,
                lead_score: 0
            },
            {
                id: 2,
                lead_no: 4,
                name: 'test',
                company: 'q',
                enq_code: null,
                country: 'India',
                stage_pct: 0,
                stage_color: '#e5484d',
                next_reminder: null,
                closure_date: null,
                activity_log: null,
                phone: '8015603089',
                product: null,
                value: null,
                tags: null,
                assigned: 'Harish D.',
                assigned_initials: 'HD',
                assigned_color: '#7c3aed',
                source: 'Harish D.',
                source_initial: 'HD',
                source_color: '#7c3aed',
                wa_phone: '8015603089',
                status: 'Lead',
                source_name: 'Indiamart',
                last_contact: '02-03-2026 15:09:55',
                created: '27-10-2025 10:26:19',
                profession: null,
                lead_score: 0
            },
            {
                id: 3,
                lead_no: 3,
                name: 'Arun Kumar',
                company: 'Vetri Constructions',
                enq_code: 'ENQ-0168',
                country: 'India',
                stage_pct: 65,
                stage_color: '#f0924a',
                next_reminder: '19-Sep-2026',
                closure_date: '30-Sep-2026',
                activity_log: '2 days ago',
                phone: '9840012345',
                product: 'ERP Software License',
                value: 85000,
                tags: 'Hot Lead, Follow-up',
                assigned: 'Divya A.',
                assigned_initials: 'DA',
                assigned_color: '#0ca308',
                source: 'Website Form',
                source_initial: 'WF',
                source_color: '#3564e0',
                wa_phone: '9840012345',
                status: 'Quotation',
                source_name: 'Direct',
                last_contact: '27-04-2026 12:49:13',
                created: '13-01-2026 12:53:55',
                profession: null,
                lead_score: 0
            },
            {
                id: 4,
                lead_no: 2,
                name: 'Meena Ramesh',
                company: 'Sri Lakshmi Traders',
                enq_code: 'ENQ-0167',
                country: 'India',
                stage_pct: 100,
                stage_color: '#0ca308',
                next_reminder: null,
                closure_date: '12-Sep-2026',
                activity_log: '5 days ago',
                phone: '9884456789',
                product: 'HRMS Annual Subscription',
                value: 141629,
                tags: 'Won',
                assigned: 'Karthik R.',
                assigned_initials: 'KR',
                assigned_color: '#d6336c',
                source: 'Referral',
                source_initial: 'RF',
                source_color: '#f0924a',
                wa_phone: '9884456789',
                status: 'Quotation',
                source_name: 'Direct',
                last_contact: '27-03-2026 10:37:58',
                created: '27-03-2026 10:36:21',
                profession: null,
                lead_score: 0
            },
            {
                id: 5,
                lead_no: 1,
                name: 'Suresh Babu',
                company: 'Anna Nagar Builders',
                enq_code: 'ENQ-0166',
                country: 'India',
                stage_pct: 25,
                stage_color: '#4dabf7',
                next_reminder: '22-Sep-2026',
                closure_date: null,
                activity_log: 'Today',
                phone: '9500123456',
                product: 'Payroll Add-on Module',
                value: 23629,
                tags: 'Warm Lead',
                assigned: 'Divya A.',
                assigned_initials: 'DA',
                assigned_color: '#0ca308',
                source: 'Harish D.',
                source_initial: 'HD',
                source_color: '#7c3aed',
                wa_phone: '9500123456',
                status: 'Lead',
                source_name: 'Exhibition',
                last_contact: '25-04-2026 14:42:55',
                created: '27-11-2025 15:45:21',
                profession: 'Builders',
                lead_score: 0
            }
        ];

                /* Lead table compatibility object for auto-master-table */
        var leadsTable = {
            getData: function() { return leadsData; },
            render: function() {
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            },
            deleteItem: function(id) {
                var tr = document.querySelector('#leadsTbody tr[data-id="' + id + '"]');
                if (tr) tr.remove();
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            },
            updateItem: function(id, data) {
                var tr = document.querySelector('#leadsTbody tr[data-id="' + id + '"]');
                if (!tr) return;
                if (data.status) {
                    var btn = tr.querySelector('.lead-status-btn');
                    if (btn) {
                        btn.innerHTML = data.status + ' <i class="bi bi-chevron-down fs-10"></i>';
                        if (data.status === 'Lead') btn.classList.add('lead-sel-lead');
                        else btn.classList.remove('lead-sel-lead');
                    }
                    tr.querySelectorAll('.lead-status-item').forEach(function(a) {
                        a.classList.toggle('active', a.getAttribute('data-val') === data.status);
                    });
                }
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            },
            getNextId: function() {
                return Date.now();
            },
            addItem: function(item) {
                var newId = item.id || Date.now();
                var newLeadNo = item.lead_no || 170;
                var valFormatted = item.value ? ('<span class="fw-bold text-success">₹' + Number(item.value).toLocaleString('en-IN', { minimumFractionDigits: 2 }) + '</span>') : '<span class="lead-empty-val">—</span>';
                var tagsHtml = item.tags ? item.tags.split(',').map(function(t){ return '<span class="lead-tag-pill">' + t.trim() + '</span>'; }).join(' ') : '<span class="lead-empty-val">—</span>';
                var assignedHtml = item.assigned ? item.assigned : 'Unassigned';
                var sourcerHtml = item.source ? item.source : '<span class="lead-empty-val">—</span>';

                var st = item.status || 'Lead';
                var opts = ['Lead', 'Quotation', 'Followup', 'Qualified', 'DIRECT', 'New Enquiry', 'New', 'Customer', 'Waiting for Response'];
                var statusDd = '<div class="dropdown lead-status-dd">' +
                    '<button type="button" class="lead-status-btn' + (st === 'Lead' ? ' lead-sel-lead' : '') + '" data-bs-toggle="dropdown" data-bs-popper-config=\'{"strategy":"fixed"}\' aria-expanded="false">' + st + ' <i class="bi bi-chevron-down fs-10"></i></button>' +
                    '<ul class="dropdown-menu lead-status-menu">' +
                    opts.map(function(o){
                        return '<li><a class="dropdown-item lead-status-item' + (o === st ? ' active' : '') + '" href="#" data-val="' + o + '">' + o + '</a></li>';
                    }).join('') +
                    '</ul></div>';

                var newTr = document.createElement('tr');
                newTr.setAttribute('data-id', newId);
                newTr.innerHTML = '<td><span class="fw-semibold">' + newLeadNo + '</span></td>' +
                    '<td><a href="#" class="lead-name-link">' + (item.name || '') + '</a></td>' +
                    '<td>' + (item.company || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td>' + (item.enq_code || ('ENQ-0' + newLeadNo)) + '</td>' +
                    '<td>' + (item.country || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td><div class="stage-ring" style="--pct:0;--ring-color:#e5484d;"><span>0%</span></div></td>' +
                    '<td><span class="lead-empty-val">—</span></td>' +
                    '<td><span class="lead-empty-val">—</span></td>' +
                    '<td><span class="text-nowrap">Just now</span></td>' +
                    '<td>' + (item.phone ? ('<a href="tel:' + item.phone + '" class="text-decoration-none fw-semibold">' + item.phone + '</a>') : '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td>' + (item.product || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td>' + valFormatted + '</td>' +
                    '<td>' + tagsHtml + '</td>' +
                    '<td>' + assignedHtml + '</td>' +
                    '<td>' + sourcerHtml + '</td>' +
                    '<td>' + statusDd + '</td>' +
                    '<td>' + (item.source_name || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td><span class="lead-link-text text-nowrap">Just now</span></td>' +
                    '<td><span class="lead-link-text text-nowrap">Just now</span></td>' +
                    '<td>' + (item.profession || '<span class="lead-empty-val">—</span>') + '</td>' +
                    '<td><span class="fw-semibold">' + (item.lead_score || 0) + '</span></td>' +
                    '<td><button type="button" class="lead-act-btn appt" title="Appointments" data-act="appt" data-id="' + newId + '"><i class="bi bi-calendar2-week"></i></button></td>' +
                    '<td><div class="d-flex align-items-center gap-1">' +
                        '<button type="button" class="lead-act-btn view" title="View" data-act="view" data-id="' + newId + '"><i class="bi bi-eye"></i></button>' +
                        '<button type="button" class="lead-act-btn edit" title="Edit" data-act="edit" data-id="' + newId + '"><i class="bi bi-pencil-square"></i></button>' +
                        '<button type="button" class="lead-act-btn del" title="Delete" data-act="del" data-id="' + newId + '"><i class="bi bi-trash"></i></button>' +
                        '<button type="button" class="lead-act-btn mail" title="Send to Email" data-act="mail" data-id="' + newId + '"><i class="bi bi-envelope"></i></button>' +
                    '</div></td>';

                var tbodyEl = document.getElementById('leadsTbody');
                if (tbodyEl) tbodyEl.prepend(newTr);
                leadsData.unshift(item);
                var tbl = document.getElementById('leadsTable');
                if (tbl && tbl.autoTable) tbl.autoTable.refresh();
            }
        };


        /* ---- Action buttons: view / edit / delete / send to email ---- */
        var leadsActBody = document.getElementById('leadsTbody');
        if (leadsActBody) {
            leadsActBody.addEventListener('click', function(e) {
                var btn = e.target.closest('.lead-act-btn');
                if (!btn) return;
                e.stopPropagation();
                var act = btn.getAttribute('data-act');
                var id = Number(btn.getAttribute('data-id'));
                var rec = leadsTable ? leadsTable.getData().filter(function(r) {
                    return Number(r.id) === id;
                })[0] : null;

                if (act === 'view') {
                    var detailModal = document.getElementById('leadDetailModal');
                    if (detailModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(detailModal).show();
                    }
                } else if (act === 'edit') {
                    if (rec) {
                        document.getElementById('nl_name').value = rec.name || '';
                        document.getElementById('nl_company').value = (rec.company && rec.company !== '—') ? rec.company : '';
                        document.getElementById('nl_phone').value = (rec.phone && rec.phone !== '—') ? rec.phone : '';
                        document.getElementById('nl_value').value = rec.value || '';
                    }
                    var em = document.getElementById('newLeadModal');
                    if (em && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(em).show();
                } else if (act === 'del') {
                    if (confirm('Delete this lead?')) {
                        if (leadsTable) leadsTable.deleteItem(id);
                    }
                } else if (act === 'mail') {
                    /* Compose Email modal (image flow): ldSendEmailBtn handler moolama
                       Quill lazy-init + SMTP/Templates/Attachment form open aagum,
                       appuram lead details subject la pre-fill */
                    var sendBtnEl = document.getElementById('ldSendEmailBtn');
                    if (sendBtnEl) sendBtnEl.click();
                    var subj = document.getElementById('ldCeSubject');
                    if (subj && rec) subj.value = 'Lead #' + rec.lead_no + ' – ' + rec.name;
                } else if (act === 'appt') {
                    /* Appointment icon: new appointment modal (appointments.php oda apmContactModal copy) open aagum */
                    var apmModalEl = document.getElementById('apmContactModal');
                    if (apmModalEl && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(apmModalEl).show();
                    }
                }
            });
        }

        /* ---- Status profile-dropdown item click -> update lead status ---- */
        var leadsStatusBody = document.getElementById('leadsTbody');
        if (leadsStatusBody) {
            leadsStatusBody.addEventListener('click', function(e) {
                var item = e.target.closest('.lead-status-item');
                if (!item) return;
                e.preventDefault();
                var tr = item.closest('tr[data-id]');
                if (!tr || !leadsTable) return;
                var val = item.getAttribute('data-val');
                /* close the dropdown, then update row (re-render shows new pill) */
                var dd = item.closest('.dropdown');
                if (dd && typeof bootstrap !== 'undefined') {
                    var ddBtn = dd.querySelector('[data-bs-toggle="dropdown"]');
                    if (ddBtn) bootstrap.Dropdown.getOrCreateInstance(ddBtn).hide();
                }
                leadsTable.updateItem(Number(tr.getAttribute('data-id')), {
                    status: val
                });
            });
        }

        /* ---- New Appointment modal (appointments.php copy): Quill + toggles + submit ---- */
        if (document.getElementById('apmContactModal')) {
            var ctQuillLd = null;
            function initCtQuillLd() {
                if (ctQuillLd || typeof Quill === 'undefined') return;
                ctQuillLd = new Quill('#apmCtQuill', {
                    theme: 'snow',
                    placeholder: 'Write appointment notes here...',
                    modules: {
                        toolbar: [
                            [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                            ['bold', 'italic', 'underline'],
                            [{ align: [] }],
                            [{ list: 'bullet' }, { list: 'ordered' }],
                            ['link'],
                            ['clean']
                        ]
                    }
                });
            }
            var apmModalElLd = document.getElementById('apmContactModal');
            apmModalElLd.addEventListener('shown.bs.modal', initCtQuillLd);

            /* Related select -> conditional fields (Lead / External / Internal Contact) */
            var relSelLd = document.getElementById('apmCtRelated');
            var relBlocksLd = {
                Lead: document.getElementById('apmRelLeadBlock'),
                External: document.getElementById('apmRelExternalBlock'),
                Contact: document.getElementById('apmRelInternalBlock')
            };
            function toggleRelBlocksLd() {
                Object.keys(relBlocksLd).forEach(function(k) {
                    if (relBlocksLd[k]) relBlocksLd[k].style.display = (relSelLd.value === k) ? '' : 'none';
                });
            }
            relSelLd.addEventListener('change', toggleRelBlocksLd);

            /* Leads select2: dropdownParent inside modal + open on shown */
            apmModalElLd.addEventListener('shown.bs.modal', function() {
                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $('#apmRelLead').each(function() {
                        if ($(this).data('select2')) $(this).select2('destroy');
                        $(this).select2({
                            width: '100%',
                            dropdownParent: $(apmModalElLd)
                        });
                    });
                }
            });

            /* Modal close -> reset related blocks */
            apmModalElLd.addEventListener('hidden.bs.modal', function() {
                relSelLd.value = '';
                toggleRelBlocksLd();
                if (typeof $ !== 'undefined') $('#apmRelLead').val(null).trigger('change');
            });

            /* SMS / Email notification checkboxes -> reminder value blocks */
            var smsChkLd = document.getElementById('apmCtSms');
            var smsBlockLd = document.getElementById('apmSmsReminderBlock');
            smsChkLd.addEventListener('change', function() {
                smsBlockLd.style.display = smsChkLd.checked ? '' : 'none';
            });
            var emailChkLd = document.getElementById('apmCtEmail');
            var emailBlockLd = document.getElementById('apmEmailReminderBlock');
            emailChkLd.addEventListener('change', function() {
                emailBlockLd.style.display = emailChkLd.checked ? '' : 'none';
            });

            /* Submit: demo action — modal close + form reset */
            document.getElementById('apmCtSubmit').addEventListener('click', function() {
                bootstrap.Modal.getOrCreateInstance(apmModalElLd).hide();
                apmModalElLd.querySelectorAll('input, textarea, select').forEach(function(el) {
                    if (el.type !== 'checkbox') el.value = '';
                });
                smsChkLd.checked = false;
                smsBlockLd.style.display = 'none';
                emailChkLd.checked = false;
                emailBlockLd.style.display = 'none';
                relSelLd.value = '';
                toggleRelBlocksLd();
                if (typeof $ !== 'undefined') $('#apmRelLead').val(null).trigger('change');
                ['apmRelExtName', 'apmRelExtEmail', 'apmRelExtPhone'].forEach(function(id) {
                    var el = document.getElementById(id);
                    if (el) el.value = '';
                });
                var projSel = document.getElementById('apmRelExtProject');
                if (projSel) projSel.value = '';
                var ctSel = document.getElementById('apmRelContact');
                if (ctSel) ctSel.value = '';
                if (ctQuillLd) ctQuillLd.root.innerHTML = '';
            });
        }

        /* ---- Sync Data buttons -> open Sync Data modal (image flow) ---- */
        document.querySelectorAll('#syncData').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var m = document.getElementById('syncDataModal');
                if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).show();
            });
        });

        /* ---- Sync Now -> demo sync flow ---- */
        var sdSyncNow = document.getElementById('sdSyncNow');
        if (sdSyncNow) {
            sdSyncNow.addEventListener('click', function() {
                var original = sdSyncNow.innerHTML;
                sdSyncNow.disabled = true;
                sdSyncNow.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Syncing...';
                setTimeout(function() {
                    sdSyncNow.disabled = false;
                    sdSyncNow.innerHTML = original;
                    var m = document.getElementById('syncDataModal');
                    if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).hide();
                    alert('\u2705 Lead data synced to associated proposals successfully.');
                }, 900);
            });
        }

        /* ---- Refresh button (re-render leads table) ---- */
        var refreshBtn = document.getElementById('leadRefreshBtn');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', function() {
                var icon = refreshBtn.querySelector('i');
                icon.classList.add('spin-once');
                if (leadsTable) leadsTable.render();
                setTimeout(function() {
                    icon.classList.remove('spin-once');
                }, 600);
            });
        }

        /* ---- Form Sync button ---- */
        var formSyncBtn = document.getElementById('formSyncBtn');
        if (formSyncBtn) {
            formSyncBtn.addEventListener('click', function() {
                var original = formSyncBtn.innerHTML;
                formSyncBtn.disabled = true;
                formSyncBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Syncing...';
                setTimeout(function() {
                    formSyncBtn.disabled = false;
                    formSyncBtn.innerHTML = original;
                    alert('✅ Lead forms synced successfully. No new leads found.');
                }, 1000);
            });
        }

        /* ---- Import leads (demo) ---- */
        var btnDoImport = document.getElementById('btnDoImport');
        if (btnDoImport) {
            btnDoImport.addEventListener('click', function() {
                var modalEl = document.getElementById('importLeadsModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(modalEl).hide();
                }
                alert('📥 File received. Leads will be imported and appear in the table shortly.');
            });
        }

        /* ---- New Lead form: Enquiry Code auto-increment on modal open ---- */
        var nlEnqSeq = 171;
        var nlModalEl = document.getElementById('newLeadModal');
        var nlEnqEl = document.getElementById('nl_enquiry_code');
        if (nlModalEl && nlEnqEl) {
            nlModalEl.addEventListener('shown.bs.modal', function() {
                nlEnqEl.value = 'ENQ-0' + nlEnqSeq;
            });
        }

        /* ---- Contacted Today checkbox -> Date Contacted auto-fill ---- */
        (function() {
            var chk = document.getElementById('nl_contacted_today');
            var dtEl = document.getElementById('nl_date_contacted');
            if (!chk || !dtEl) return;
            chk.addEventListener('change', function() {
                if (chk.checked) {
                    var d = new Date();
                    var pad = function(n) {
                        return String(n).padStart(2, '0');
                    };
                    dtEl.value = d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
                } else {
                    dtEl.value = '';
                }
            });
        })();

        /* ---- New Lead form: append a demo row ---- */
        var newLeadForm = document.getElementById('newLeadForm');
        if (newLeadForm) {
            newLeadForm.addEventListener('submit', function(e) {
                e.preventDefault();
                var name = document.getElementById('nl_name').value.trim();
                var company = document.getElementById('nl_company').value.trim() || '—';
                var phone = document.getElementById('nl_phone').value.trim();
                var countryEl = document.getElementById('nl_country');
                var country = countryEl ? countryEl.selectedOptions[0].text : '—';
                var productEl = document.getElementById('nl_product');
                var product = productEl && productEl.selectedOptions[0] ? productEl.selectedOptions[0].text : '—';
                var value = document.getElementById('nl_value').value;
                var tagsRaw = document.getElementById('nl_tags').value.trim();
                var assignedEl = document.getElementById('nl_assigned');
                var assignedText = assignedEl ? assignedEl.selectedOptions[0].text : '—';
                var sourceEl = document.getElementById('nl_source');
                var sourceText = sourceEl ? sourceEl.selectedOptions[0].text : '—';
                var statusEl = document.getElementById('nl_status');
                var statusText = statusEl ? statusEl.selectedOptions[0].text : 'Lead';

                if (!name) return;

                /* Company GST format check (15 chars: 2 digits + 10 chars + 3 units) — illana block */
                var gstEl = document.getElementById('nl_gst');
                var gstVal = gstEl ? gstEl.value.trim().toUpperCase() : '';
                if (gstVal && !/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/.test(gstVal)) {
                    gstEl.classList.add('is-invalid');
                    gstEl.focus();
                    alert('❌ Invalid GST number format — e.g. 33ABCDE1234F1Z5');
                    return;
                }
                if (gstEl) gstEl.classList.remove('is-invalid');

                var initials = assignedText.split(' ').map(function(w) {
                    return w.charAt(0);
                }).join('').toUpperCase().slice(0, 2);
                var waPhone = phone.replace(/\D/g, '');

                if (leadsTable) {
                    var rowCount = leadsTable.getData().length;
                    leadsTable.addItem({
                        id: leadsTable.getNextId(),
                        lead_no: 170 + rowCount,
                        name: name,
                        company: company,
                        enq_code: 'ENQ-0' + (170 + rowCount),
                        country: country,
                        stage_pct: 0,
                        stage_color: '#e5484d',
                        next_reminder: null,
                        closure_date: null,
                        activity_log: 'Just now',
                        phone: phone,
                        product: product,
                        value: value,
                        tags: tagsRaw,
                        assigned: assignedText,
                        assigned_initials: initials,
                        assigned_color: '#7c3aed',
                        source: sourceText,
                        source_initial: sourceText.charAt(0),
                        source_color: '#3564e0',
                        wa_phone: waPhone,
                        status: statusText || 'Lead',
                        source_name: sourceText,
                        last_contact: 'Just now',
                        created: 'Just now',
                        profession: (function(){ var el = document.getElementById('nl_profession'); return el && el.value ? el.selectedOptions[0].text : null; })(),
                        lead_score: 0,
                        gst: gstVal,
                        turnover: (function(){ var el = document.getElementById('nl_turnover'); return el && el.value.trim() ? el.value.trim() : null; })(),
                        emp_size: (function(){ var el = document.getElementById('nl_emp_size'); return el && el.value.trim() ? el.value.trim() : null; })(),
                        customer_type: (function(){ var el = document.getElementById('nl_cust_type'); return el && el.value ? el.selectedOptions[0].text : null; })()
                    });
                }

                var modalEl = document.getElementById('newLeadModal');
                if (modalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(modalEl).hide();
                }
                newLeadForm.reset();
                if (typeof $ !== 'undefined') {
                    $('#newLeadModal .select2').val(null).trigger('change');
                }
                alert('✅ Lead "' + name + '" added successfully.');
                nlEnqSeq++;
            });
        }

        /* ---- Add / Remove Item rows ---- */
        var nlItemBody = document.getElementById('nlItemBody');
        var nlAddItem = document.getElementById('nlAddItem');
        if (nlAddItem && nlItemBody) {
            nlAddItem.addEventListener('click', function() {
                var tr = document.createElement('tr');
                tr.innerHTML = '<td><input type="text" class="form-control form-control-sm" placeholder="Code"></td>' +
                    '<td><input type="text" class="form-control form-control-sm" placeholder="Name"></td>' +
                    '<td><input type="number" class="form-control form-control-sm" placeholder="0" min="1"></td>' +
                    '<td><button type="button" class="btn btn-sm btn-outline-danger nl-remove-item"><i class="bi bi-trash"></i></button></td>';
                nlItemBody.appendChild(tr);
            });
            nlItemBody.addEventListener('click', function(e) {
                var btn = e.target.closest('.nl-remove-item');
                if (btn) btn.closest('tr').remove();
            });
        }

        /* ---- Add / Remove Point of Contact rows ---- */
        var nlAddPoc = document.getElementById('nlAddPoc');
        var nlPocList = document.getElementById('nlPocList');
        if (nlAddPoc && nlPocList) {
            nlAddPoc.addEventListener('click', function() {
                var row = document.createElement('div');
                row.className = 'row g-2 mb-2 nl-poc-row';
                row.innerHTML = '<div class="col-md-4"><input type="text" class="form-control form-control-sm" placeholder="Name"></div>' +
                    '<div class="col-md-3"><input type="text" class="form-control form-control-sm" placeholder="Phone No."></div>' +
                    '<div class="col-md-3"><input type="email" class="form-control form-control-sm" placeholder="Email"></div>' +
                    '<div class="col-md-2"><button type="button" class="btn btn-sm btn-danger nl-remove-poc"><i class="bi bi-trash me-1"></i>Remove</button></div>';
                nlPocList.appendChild(row);
            });
            nlPocList.addEventListener('click', function(e) {
                var btn = e.target.closest('.nl-remove-poc');
                if (btn) btn.closest('.nl-poc-row').remove();
            });
        }

        /* ---- Lead detail: click any row cell to open static detail modal ---- */
        var leadsTableEl = document.getElementById('leadsTable');
        if (leadsTableEl) {
            leadsTableEl.addEventListener('click', function(e) {
                var nameLink = e.target.closest('.lead-name-link');
                if (nameLink) e.preventDefault();
                var tr = e.target.closest('tr[data-id]');
                if (!tr) return;
                /* ignore checkbox, whatsapp, action buttons and status dropdown clicks */
                if (e.target.closest('input[type=checkbox]') || e.target.closest('.whatsapp-quick-btn') || e.target.closest('.lead-act-btn') || e.target.closest('.lead-status-dd')) return;

                var detailModal = document.getElementById('leadDetailModal');
                if (detailModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(detailModal).show();
                }
            });
        }

        /* ---- Pipeline step click: image flow — current click = complete (+25% one time), done click = revert (-25% one time) ---- */
        var ldPipeWrap = document.querySelector('#leadDetailModal .ld-pipeline');
        if (ldPipeWrap) {
            var ldPipeSteps = ldPipeWrap.querySelectorAll('.ld-pipe-step');
            function ldPipeRefresh() {
                var doneCount = 0;
                var currentAssigned = false;
                ldPipeSteps.forEach(function(st) {
                    var icon = st.querySelector('i');
                    if (!icon) {
                        icon = document.createElement('i');
                        st.insertBefore(icon, st.firstChild);
                    }
                    if (st.classList.contains('done')) {
                        doneCount++;
                        st.classList.remove('current', 'pending');
                        icon.className = 'bi bi-check-circle-fill';
                    } else if (!currentAssigned) {
                        /* first incomplete step = current */
                        st.classList.remove('done', 'pending');
                        st.classList.add('current');
                        currentAssigned = true;
                        icon.className = 'bi bi-plus-circle';
                    } else {
                        st.classList.remove('done', 'current');
                        st.classList.add('pending');
                        icon.className = 'bi bi-plus-circle';
                    }
                });
                var pct = Math.round((doneCount / ldPipeSteps.length) * 100);
                var ring = document.querySelector('#leadDetailModal .ld-pipe-ring .stage-ring');
                var ringSpan = ring ? ring.querySelector('span') : null;
                if (ring && ringSpan) {
                    ringSpan.textContent = pct + '%';
                    ring.style.setProperty('--pct', pct);
                    var color = '#16a34a';
                    ring.style.setProperty('--ring-color', color);
                }
            }
            ldPipeWrap.addEventListener('click', function(e) {
                var step = e.target.closest('.ld-pipe-step');
                if (!step) return;
                /* oru stage oru thadava dha state maarum: current -> done (+25%), done -> revert (-25%) */
                if (step.classList.contains('done')) {
                    step.classList.remove('done');
                } else if (step.classList.contains('current')) {
                    step.classList.add('done');
                } else {
                    return; /* pending step ignore */
                }
                ldPipeRefresh();
            });
        }

        /* ---- More menu: Mark as lost / junk -> pill + activity + toast (reference flow) ---- */
        (function() {
            var moreMenu = document.querySelector('#leadDetailModal .ld-more-menu');
            if (!moreMenu) return;
            var pill = document.getElementById('ldStatePill');
            var dot = document.getElementById('ldContactDot');
            var avatar = document.getElementById('ldContactAvatar');
            var contactText = document.getElementById('ldContactText');
            var contactOriginal = contactText ? contactText.innerHTML : '';
            var state = {
                lost: false,
                junk: false
            };

            function showLdToast(message) {
                var container = document.getElementById('ldToastContainer');
                if (!container) {
                    container = document.createElement('div');
                    container.id = 'ldToastContainer';
                    container.className = 'toast-container position-fixed top-0 end-0 p-3';
                    container.style.zIndex = '3000';
                    document.body.appendChild(container);
                }
                var el = document.createElement('div');
                el.className = 'toast align-items-center border-0';
                el.setAttribute('role', 'alert');
                el.setAttribute('aria-atomic', 'true');
                el.style.background = '#0ca308';
                el.style.color = '#fff';
                el.innerHTML = '<div class="d-flex"><div class="toast-body"><i class="bi bi-bell me-2"></i>' + message +
                    '</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
                container.appendChild(el);
                var t = new bootstrap.Toast(el, {
                    delay: 2500
                });
                t.show();
                el.addEventListener('hidden.bs.toast', function() {
                    el.remove();
                });
            }

            function applyState() {
                /* header pill */
                if (pill) {
                    pill.className = 'ld-state-pill' + (state.lost ? ' st-lost' : state.junk ? ' st-junk' : '');
                    pill.textContent = state.lost ? 'Lost' : state.junk ? 'Junk' : '';
                    pill.style.display = (state.lost || state.junk) ? 'inline-block' : 'none';
                }
                /* contact bar: avatar + activity text */
                if (dot && avatar && contactText) {
                    var marked = state.lost || state.junk;
                    dot.style.display = marked ? 'none' : '';
                    avatar.style.display = marked ? 'inline-flex' : 'none';
                    contactText.innerHTML = marked
                        ? '<b>gharuda SOFTWARE</b> &middot; Marked as ' + (state.lost ? 'lost' : 'junk')
                        : contactOriginal;
                }
                /* more menu items swap */
                var danger = '<li><a class="dropdown-item ld-more-item ld-more-danger" href="#" data-ld-more="delete"><i class="bi bi-x-lg me-2"></i>Delete Lead</a></li>';
                if (state.lost) {
                    moreMenu.innerHTML = '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="unmark-lost">Unmark Lead as lost</a></li>' + danger;
                } else if (state.junk) {
                    moreMenu.innerHTML = '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="unmark-junk">Unmark Lead as junk</a></li>' + danger;
                } else {
                    moreMenu.innerHTML =
                        '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="lost"><i class="bi bi-arrow-counterclockwise me-2"></i>Mark as lost</a></li>' +
                        '<li><a class="dropdown-item ld-more-item" href="#" data-ld-more="junk"><i class="bi bi-x-lg me-2"></i>Mark as junk</a></li>' +
                        danger;
                }
            }

            moreMenu.addEventListener('click', function(e) {
                var item = e.target.closest('[data-ld-more]');
                if (!item) return;
                e.preventDefault();
                var act = item.getAttribute('data-ld-more');
                if (act === 'lost') {
                    state.lost = true;
                    state.junk = false;
                    applyState();
                    showLdToast('Lead marked as lost successfully');
                } else if (act === 'junk') {
                    state.junk = true;
                    state.lost = false;
                    applyState();
                    showLdToast('Lead marked as junk successfully');
                } else if (act === 'unmark-lost' || act === 'unmark-junk') {
                    state.lost = false;
                    state.junk = false;
                    applyState();
                }
            });

            applyState();
        })();

        /* ---- Lead detail: rail nav switching (delegated, data-panel) ---- */
        var ldRail = document.querySelector('#leadDetailModal .ld-rail');
        if (ldRail) {
            ldRail.addEventListener('click', function(e) {
                var btn = e.target.closest('.ld-nav');
                if (!btn) return;
                ldRail.querySelectorAll('.ld-nav').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
                var panelId = btn.getAttribute('data-panel');
                document.querySelectorAll('#leadDetailModal .ld-tab-panel').forEach(function(p) {
                    p.classList.remove('active');
                });
                var panel = document.getElementById(panelId);
                if (panel) panel.classList.add('active');
            });
        }

        /* ---- Lead detail: Notes tab -> Add Note flow ---- */
        (function() {
            var noteInput = document.getElementById('ldNoteInput');
            var noteList = document.getElementById('ldNoteList');
            var noteBadge = document.getElementById('ldNotesBadge');
            if (!noteInput || !noteList) return;
            var nextId = 2;

            function escN(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            }

            function updateBadge() {
                if (noteBadge) noteBadge.textContent = noteList.querySelectorAll('.ldn-item').length;
            }

            function stamp() {
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' +
                    pad(d.getHours()) + ':' + pad(d.getMinutes()) + ':' + pad(d.getSeconds());
            }

            function bindIcons(item) {
                var ed = item.querySelector('.ldn-icons .ed');
                var dl = item.querySelector('.ldn-icons .dl');
                if (ed) ed.addEventListener('click', function() {
                    var txtEl = item.querySelector('.ldn-text');
                    noteInput.value = txtEl.textContent;
                    noteInput.focus();
                    item.remove();
                    updateBadge();
                });
                if (dl) dl.addEventListener('click', function() {
                    item.remove();
                    updateBadge();
                });
            }
            noteList.querySelectorAll('.ldn-item').forEach(bindIcons);

            document.getElementById('ldNoteAdd').addEventListener('click', function() {
                var val = noteInput.value.trim();
                if (!val) {
                    noteInput.focus();
                    return;
                }
                var item = document.createElement('div');
                item.className = 'ldn-item';
                item.setAttribute('data-nid', nextId++);
                item.innerHTML =
                    '<span class="ldn-avatar">GHR</span>' +
                    '<div class="ldn-body">' +
                    '<div class="ldn-name">GHARUDA SOFTWARE</div>' +
                    '<div class="ldn-date">Note added: ' + stamp() + '</div>' +
                    '<div class="ldn-text"></div>' +
                    '</div>' +
                    '<div class="ldn-icons">' +
                    '<button type="button" class="ed" title="Edit note"><i class="bi bi-pencil-square"></i></button>' +
                    '<button type="button" class="dl" title="Delete note"><i class="bi bi-x-lg"></i></button>' +
                    '</div>';
                item.querySelector('.ldn-text').textContent = val;
                noteList.insertBefore(item, noteList.firstChild);
                bindIcons(item);
                noteInput.value = '';
                noteInput.focus();
                updateBadge();
            });
            updateBadge();
        })();

        /* ---- Lead detail: Activity Log tab -> Enter Activity flow ---- */
        (function() {
            var ldaInput = document.getElementById('ldaInput');
            var ldaFeed = document.getElementById('ldaFeed');
            if (!ldaInput || !ldaFeed) return;
            var nextAid = 2;

            function stampA() {
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' +
                    pad(d.getHours()) + ':' + pad(d.getMinutes()) + ':' + pad(d.getSeconds());
            }
            document.getElementById('ldaSubmit').addEventListener('click', function() {
                var val = ldaInput.value.trim();
                if (!val) {
                    ldaInput.focus();
                    return;
                }
                var status = document.querySelector('input[name="ldaStatus"]:checked');
                var statusTxt = status ? status.value : 'UnAnswered';
                var item = document.createElement('div');
                item.className = 'lda-item';
                item.setAttribute('data-aid', nextAid++);
                item.innerHTML =
                    '<div class="lda-date">' + stampA() + '<span class="lda-ago">just now</span></div>' +
                    '<div class="lda-who">' +
                    '<span class="lda-avatar">GHR</span>' +
                    '<span class="lda-name">GHARUDA SOFTWARE</span>' +
                    '<span class="lda-text"></span>' +
                    '</div>';
                item.querySelector('.lda-text').textContent = '- ' + statusTxt + ' · ' + val;
                ldaFeed.insertBefore(item, ldaFeed.firstChild);
                ldaInput.value = '';
                ldaInput.focus();
            });
        })();

        /* ---- Stacked modal backdrop z-index fix ----
       Bootstrap appends backdrops at default z-index 1050; custom-z modals
       (1075/1085/1090) open panna backdrop parent modal ku keezha pogum.
       shown event la last backdrop ah modal z-index - 1 ku bump panrom. */
        (function() {
            var stackedModals = ['ldComposeEmailModal', 'setLeadReminderModal', 'newTaskModal', 'setProposalReminderModal', 'apAddTaskModal', 'apAddTemplateModal', 'syncDataModal', 'apSendEmailModal', 'apAttachFileModal', 'newEstimateModal', 'newInvoiceModal', 'apRecordPaymentModal', 'apPaymentViewModal', 'newLeadModal', 'nlAddOptionModal', 'newProposalModal', 'npAddItemModal', 'apProposalPreviewModal', 'apSignModal'];
            stackedModals.forEach(function(id) {
                var el = document.getElementById(id);
                if (!el) return;
                el.addEventListener('shown.bs.modal', function() {
                    var z = parseInt(getComputedStyle(el).zIndex, 10) || 1090;
                    var backdrops = document.querySelectorAll('.modal-backdrop');
                    var last = backdrops[backdrops.length - 1];
                    if (last) last.style.zIndex = (z - 1);
                });
            });
        })();

        /* ---- Lead detail: Email Log tab -> Send Email flow ---- */
        (function() {
            var escEl = function(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            };
            var ldEmailTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('ldEmailLogTbody') || (document.getElementById('ldEmailLogTable') ? document.getElementById('ldEmailLogTable').querySelector('tbody') : null);
                    if (tbody) {
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td>' + escEl(r.id) + '</td>' +
                            '<td>' + escEl(r.staff) + '</td>' +
                            '<td>' + escEl(r.subject) + '</td>' +
                            '<td>' + escEl(r.date) + '</td>' +
                            '<td><span class="ld-prop-status ' + (r.status === 'Sent' ? 'sent' : 'draft') + '">' + escEl(r.status) + '</span></td>' +
                            '<td><span class="ld-prop-status ' + (r.opened === 'Yes' ? 'accepted' : 'draft') + '">' + escEl(r.opened) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('ldEmailLogTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Send Email button -> open Compose Email modal (lazy-init Quill) */
            var ceQuill = null;
            var ceTplSel = document.getElementById('ldCeTemplate');
            var fileList = document.getElementById('ldCeFileList');
            var sendEmailBtn = document.getElementById('ldSendEmailBtn');
            if (sendEmailBtn) sendEmailBtn.addEventListener('click', function() {
                var m = document.getElementById('ldComposeEmailModal');
                if (!m) return;
                if (!ceQuill && typeof Quill !== 'undefined') {
                    ceQuill = new Quill('#ldCeQuill', {
                        theme: 'snow',
                        placeholder: 'Write your email here...',
                        modules: {
                            toolbar: [
                                [{
                                    font: ['verdana', 'sans-serif', 'serif', 'monospace']
                                }, {
                                    size: ['small', false, 'large', 'huge']
                                }],
                                [{
                                    color: []
                                }, {
                                    background: []
                                }],
                                ['bold', 'italic', 'underline'],
                                [{
                                    align: []
                                }],
                                ['image', 'link'],
                                [{
                                    list: 'bullet'
                                }, {
                                    list: 'ordered'
                                }],
                                ['clean']
                            ]
                        }
                    });
                }
                var toEl = document.getElementById('ldCeTo');
                if (toEl && !toEl.value) {
                    var ldEmail = document.getElementById('ldEmail');
                    if (ldEmail && ldEmail.value) toEl.value = ldEmail.value;
                }
                bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Templates select -> fill editor with template content */
            if (ceTplSel) ceTplSel.addEventListener('change', function() {
                if (!ceQuill) return;
                var tpls = {
                    'Standard Quotation': '<p>Dear {client_name},</p><p>Thank you for your interest. Please find our standard quotation attached for your review.</p><p>Regards,<br>GHARUDA SOFTWARE</p>',
                    'Solar Installation': '<p>Dear {client_name},</p><p>Thank you for choosing our solar installation services. Please find the detailed installation proposal attached.</p><p>Regards,<br>GHARUDA SOFTWARE</p>'
                };
                var html = tpls[ceTplSel.value];
                if (html) ceQuill.root.innerHTML = html;
            });

            /* Attachment: + button -> add another file input row */
            var addFileBtn = document.getElementById('ldCeAddFile');
            if (addFileBtn && fileList) {
                addFileBtn.addEventListener('click', function() {
                    var row = document.createElement('div');
                    row.className = 'ce-attach-row mt-2';
                    row.innerHTML = '<input type="file" class="form-control" multiple>' +
                        '<button type="button" class="ce-add-file" style="background:#dc2626;" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    row.querySelector('button').addEventListener('click', function() {
                        row.remove();
                    });
                    fileList.appendChild(row);
                });
            }

            /* send -> validation + add row to email log table */
            var ceSendBtn = document.getElementById('ldCeSend');
            if (ceSendBtn) ceSendBtn.addEventListener('click', function() {
                var toEl = document.getElementById('ldCeTo');
                var subEl = document.getElementById('ldCeSubject');
                if (!toEl.value.trim()) {
                    alert('Email To is required.');
                    toEl.focus();
                    return;
                }
                if (!subEl.value.trim()) {
                    alert('Email Subject is required.');
                    subEl.focus();
                    return;
                }
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var dateStr = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + pad(d.getHours()) + ':' + pad(d.getMinutes());
                var ceModal = document.getElementById('ldComposeEmailModal');
                var original = ceSendBtn.innerHTML;
                ceSendBtn.disabled = true;
                ceSendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                setTimeout(function() {
                    ceSendBtn.disabled = false;
                    ceSendBtn.innerHTML = original;
                    if (ldEmailTable) ldEmailTable.addItem({
                        id: Date.now(),
                        staff: 'GHARUDA SOFTWARE',
                        subject: subEl.value.trim(),
                        date: dateStr,
                        status: 'Sent',
                        opened: 'No'
                    });
                    alert('\u2705 Email sent to ' + toEl.value.trim() + '.');
                    bootstrap.Modal.getOrCreateInstance(ceModal).hide();
                    toEl.value = '';
                    document.getElementById('ldCeCc').value = '';
                    subEl.value = '';
                    if (ceQuill) ceQuill.setText('');
                    ceTplSel.value = '';
                    if (fileList) fileList.innerHTML = '';
                }, 800);
            });
        })();

        /* ---- Lead detail: Reminders tab -> Set Lead Reminder flow ---- */
        (function() {
            var escLd = function(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            };
            var ldRemTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('ldRemTbody') || (document.getElementById('ldRemindersTable') ? document.getElementById('ldRemindersTable').querySelector('tbody') : null);
                    if (tbody) {
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td>' + escLd(r.desc) + '</td>' +
                            '<td>' + escLd(r.date) + '</td>' +
                            '<td>' + escLd(r.remindTo) + '</td>' +
                            '<td><span class="ld-prop-status ' + (r.notified === 'Yes' ? 'accepted' : 'draft') + '">' + escLd(r.notified) + '</span></td>' +
                            '<td><span class="ld-prop-status ' + (r.status === 'Active' ? 'sent' : 'draft') + '">' + escLd(r.status) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('ldRemindersTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Set Lead Reminder button -> open reminder modal */
            var ldSetRemBtn = document.getElementById('ldSetReminderBtn');
            if (ldSetRemBtn) ldSetRemBtn.addEventListener('click', function() {
                var m = document.getElementById('setLeadReminderModal');
                if (m && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Reminder modal Submit -> add row to lead reminders table */
            var ldRemSubmit = document.getElementById('ldReminderSubmit');
            if (ldRemSubmit) ldRemSubmit.addEventListener('click', function() {
                var dateEl = document.getElementById('ldReminderDate');
                var staffEl = document.getElementById('ldReminderStaff');
                var descEl = document.getElementById('ldReminderDesc');
                var emailEl = document.getElementById('ldReminderEmail');
                if (!dateEl.value || !descEl.value.trim()) {
                    alert('Please fill all the required fields.');
                    return;
                }
                var d = new Date(dateEl.value + 'T00:00:00');
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var fmt = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                if (ldRemTable) ldRemTable.addItem({
                    id: Date.now(),
                    desc: descEl.value.trim(),
                    date: fmt,
                    remindTo: staffEl.value,
                    notified: 'No',
                    status: 'Active'
                });
                if (emailEl.checked) alert('\uD83D\uDCE7 Reminder email will also be sent to ' + staffEl.value + '.');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('setLeadReminderModal')).hide();
                dateEl.value = '';
                descEl.value = '';
                emailEl.checked = false;
            });
        })();

        /* ---- Proposals table: Bridge for AutoMasterTable ---- */
        var npProposalsData = [
            { id: 147, no: 'PRO-147', subject: 'New Proposal', total: '₹ 0.00', date: '17-09-2026', openTill: '24-09-2026', tags: '—', created: '17-09-2026 15:52:49', status: 'Draft' },
            { id: 145, no: 'PRO-145', subject: 'Solar Panel Installation 10 × 10', total: '₹ 1,18,000.00', date: '09-09-2026', openTill: '16-09-2026', tags: '—', created: '09-09-2026 14:39:25', status: 'Accepted' },
            { id: 140, no: 'PRO-140', subject: 'Product', total: '₹ 5,407.50', date: '21-08-2026', openTill: '28-08-2026', tags: '—', created: '21-08-2026 14:13:03', status: 'Accepted' }
        ];
        var proposalsTable = {
            getData: function() { return npProposalsData; },
            render: function() {
                var tbl = document.getElementById('npProposalsTable');
                if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
            }
        };

        /* ---- Attachments: drop zone + upload + delete ---- */
        (function() {
            var dropZone = document.getElementById('atDropZone');
            var fileInput = document.getElementById('atFileInput');
            var list = document.getElementById('atList');
            if (!dropZone || !fileInput || !list) return;
            dropZone.addEventListener('click', function() {
                fileInput.click();
            });
            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropZone.style.background = '#eefdf2';
            });
            dropZone.addEventListener('dragleave', function() {
                dropZone.style.background = '';
            });
            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropZone.style.background = '';
                addFiles(e.dataTransfer.files);
            });
            fileInput.addEventListener('change', function() {
                addFiles(fileInput.files);
                fileInput.value = '';
            });

            function addFiles(files) {
                Array.from(files).forEach(function(f) {
                    var now = new Date();
                    var pad = function(n) {
                        return String(n).padStart(2, '0');
                    };
                    var dt = pad(now.getDate()) + '-' + pad(now.getMonth() + 1) + '-' + now.getFullYear() + ' ' + pad(now.getHours() % 12 || 12) + ':' + pad(now.getMinutes()) + ':' + pad(now.getSeconds()) + (now.getHours() >= 12 ? ' pm' : ' am');
                    var ext = (f.name.split('.').pop() || '').toLowerCase();
                    var isPdf = ext === 'pdf';
                    var isWord = ext === 'doc' || ext === 'docx';
                    var isImg = ext === 'jpg' || ext === 'jpeg' || ext === 'png' || ext === 'gif' || ext === 'webp';
                    var isXls = ext === 'xls' || ext === 'xlsx' || ext === 'csv';
                    var icoCls = isPdf ? 'bi-file-earmark-pdf-fill' : isWord ? 'bi-file-earmark-word-fill' : isImg ? 'bi-file-earmark-image-fill' : isXls ? 'bi-file-earmark-excel-fill' : 'bi-file-earmark-fill';
                    var icoCol = isPdf ? '#dc2626' : isWord ? '#2563eb' : isImg ? '#16a34a' : isXls ? '#16a34a' : '#6b7280';
                    var item = document.createElement('div');
                    item.className = 'at-item';
                    item.innerHTML = '<div class="at-meta"><span class="lbl">Date / Time :</span><br>' + dt + '</div>' +
                        '<div class="at-meta"><span class="lbl">Staff Name :</span><br>GHRAUDA SOFTWARE</div>' +
                        '<div class="at-file"><i class="bi ' + icoCls + '" style="color:' + icoCol + ';"></i><a href="#">' + f.name.replace(/</g, '&lt;') + '<span class="mime">' + (f.type || 'application/octet-stream') + '</span></a></div>' +
                        '<button type="button" class="at-del" title="Delete attachment"><i class="bi bi-x-lg"></i></button>';
                    list.prepend(item);
                    item.querySelector('.at-del').addEventListener('click', function() {
                        item.remove();
                    });
                });
            }
            list.addEventListener('click', function(e) {
                var del = e.target.closest('.at-del');
                if (del) del.closest('.at-item').remove();
            });
        })();

        /* ---- Appointments table: handled automatically by datatable class (AutoMasterTable) ---- */

        /* ---- New Proposal button -> open modal ---- */
        var npBtn = document.getElementById('npNewProposalBtn');
        if (npBtn) {
            npBtn.addEventListener('click', function() {
                var npModal = document.getElementById('newProposalModal');
                if (npModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(npModal).show();
                }
            });
        }

        /* ---- Manual Proposal button (lead detail Proposals tab) -> newLeadModal stacked open (leadDetailModal open-a irukum) ---- */
        var ldManualProposalBtn = document.getElementById('ldManualProposalBtn');
        if (ldManualProposalBtn) {
            ldManualProposalBtn.addEventListener('click', function() {
                var npModalM = document.getElementById('newProposalModal');
                if (npModalM && typeof bootstrap !== 'undefined') {
                    /* newProposalModal z-index 1085 > leadDetailModal 1055 — mela open aagum,
                       leadDetailModal close aagadhu. Backdrop fix stackedModals list la already irukku. */
                    bootstrap.Modal.getOrCreateInstance(npModalM).show();
                }
            });
        }

        /* ---- Proposals table edit icon -> open newProposalModal ---- */
        document.addEventListener('click', function(e) {
            var editBtn = e.target.closest('.np-act-edit');
            if (!editBtn) return;
            e.preventDefault();
            var npModalE = document.getElementById('newProposalModal');
            if (npModalE && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getOrCreateInstance(npModalE).show();
            }
        });

        /* ---- Modal swap helper: from-modal hide full-a complete aana appuram to-modal show ----
           hidden event miss aana safety fallback timer um ulla irukku */
        window.swapModal = window.swapModal || function(fromEl, toEl) {
            var openTarget = function() {
                bootstrap.Modal.getOrCreateInstance(toEl).show();
            };
            if (fromEl && fromEl.classList.contains('show')) {
                var opened = false;
                var openOnce = function() {
                    if (opened) return;
                    opened = true;
                    openTarget();
                };
                fromEl.addEventListener('hidden.bs.modal', openOnce, { once: true });
                setTimeout(openOnce, 600);
                bootstrap.Modal.getOrCreateInstance(fromEl).hide();
            } else {
                openTarget();
            }
        };

        /* ---- Lead detail edit (pencil) button -> newLeadModal mela open (leadDetailModal hide aagadhu) ---- */
        var ldEditLeadBtn = document.getElementById('ldEditLeadBtn');
        if (ldEditLeadBtn) {
            ldEditLeadBtn.addEventListener('click', function() {
                var newLeadM = document.getElementById('newLeadModal');
                if (newLeadM && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(newLeadM).show();
                }
            });
        }

        /* ---- Proposals table name/subject link click -> autoProposalModal (leadDetailModal hide aagi) ---- */
        document.addEventListener('click', function(e) {
            var nameLink = e.target.closest('#npProposalsTable .lead-name-link');
            if (!nameLink) return;
            e.preventDefault();
            var apModalE = document.getElementById('autoProposalModal');
            if (apModalE && typeof bootstrap !== 'undefined') {
                swapModal(document.getElementById('leadDetailModal'), apModalE);
            }
        });

        /* ---- New Task button -> open modal ---- */
        var tkBtn = document.getElementById('tkNewTaskBtn');
        if (tkBtn) {
            tkBtn.addEventListener('click', function() {
                var tkModal = document.getElementById('newTaskModal');
                if (tkModal && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(tkModal).show();
                }
            });
        }



        /* ---- Proposal tags chip input ---- */
        (function() {
            var chipsWrap = document.getElementById('npTagsChips');
            var input = document.getElementById('npTagsInput');
            var hidden = document.getElementById('np_tags');
            var wrap = document.getElementById('npTagsWrap');
            if (!chipsWrap || !input || !hidden) return;
            var tags = [];

            function syncHidden() {
                hidden.value = tags.join(',');
            }

            function addTag(text) {
                var val = text.trim().replace(/,/g, '');
                if (!val || tags.indexOf(val) !== -1) return;
                tags.push(val);
                var chip = document.createElement('span');
                chip.className = 'nl-tag-chip';
                chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                chipsWrap.appendChild(chip);
                chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                    var idx = tags.indexOf(val);
                    if (idx !== -1) tags.splice(idx, 1);
                    chip.remove();
                    syncHidden();
                });
                syncHidden();
            }
            input.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addTag(input.value);
                    input.value = '';
                }
                if (e.key === 'Backspace' && !input.value && tags.length) {
                    var last = chipsWrap.lastElementChild;
                    if (last) last.querySelector('.nl-tag-x').click();
                }
            });
            input.addEventListener('blur', function() {
                if (input.value.trim()) {
                    addTag(input.value);
                    input.value = '';
                }
            });
            if (wrap) wrap.addEventListener('click', function() {
                input.focus();
            });
        })();

        /* ---- Proposal: add item via Add New Item modal (image flow) ---- */
        (function() {
            var addBtn = document.getElementById('npAddItemBtn');
            var itemBody = document.getElementById('npItemBody');
            var addSelect = document.getElementById('npAddItemSelect');
            if (!addBtn || !itemBody) return;
            var addModalEl = document.getElementById('npAddItemModal');
            function esc(s) {
                return String(s == null ? '' : s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
            }
            addBtn.addEventListener('click', function() {
                if (addModalEl && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(addModalEl).show();
                }
            });
            /* Submit -> values vechu item row add + modal close + reset */
            var submitBtn = document.getElementById('npiSubmitBtn');
            if (submitBtn && addModalEl) {
                submitBtn.addEventListener('click', function() {
                    var desc = document.getElementById('npiDesc');
                    var longDesc = document.getElementById('npiLongDesc');
                    var rateInr = document.getElementById('npiRateInr');
                    var hsn = document.getElementById('npiHsn');
                    var rateUsd = document.getElementById('npiRateUsd');
                    var tax1 = document.getElementById('npiTax1');
                    var unit = document.getElementById('npiUnit');
                    var group = document.getElementById('npiGroup');
                    if (desc && !desc.value.trim()) {
                        desc.focus();
                        return;
                    }
                    var rate = parseFloat(rateInr && rateInr.value) || 0;
                    var taxVal = tax1 ? tax1.value : 'No Tax';
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;" title="' + esc(hsn ? hsn.value : '') + ' | ' + esc(group ? group.value : '') + '"></i></td>' +
                        '<td><textarea class="form-control" placeholder="Description" rows="2">' + esc(desc ? desc.value : '') + '</textarea></td>' +
                        '<td><textarea class="form-control" placeholder="Long description" rows="2">' + esc(longDesc ? longDesc.value : '') + '</textarea></td>' +
                        '<td><input type="number" class="form-control" value="1" min="0"><div style="font-size:10px;color:#9ca3af;margin-top:2px;">' + esc(unit && unit.value ? unit.value : 'Unit') + '</div></td>' +
                        '<td><input type="number" class="form-control" value="' + rate.toFixed(2) + '" step="0.01" title="USD: ' + esc(rateUsd ? rateUsd.value : '0.00') + '"></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><select class="form-select"><option' + (taxVal === 'No Tax' ? ' selected' : '') + '>No Tax</option><option' + (taxVal === 'GST 5%' ? ' selected' : '') + '>GST 5%</option><option' + (taxVal === 'GST 12%' ? ' selected' : '') + '>GST 12%</option><option' + (taxVal === 'GST 18%' ? ' selected' : '') + '>GST 18%</option></select></td>' +
                        '<td><span style="font-weight:700;color:#111827;">₹ ' + rate.toFixed(2) + '</span></td>' +
                        '<td><button type="button" class="np-check-btn np-remove-item" title="Remove"><i class="bi bi-trash"></i></button></td>';
                    itemBody.appendChild(tr);
                    if (addSelect) addSelect.value = '';
                    bootstrap.Modal.getOrCreateInstance(addModalEl).hide();
                    /* form reset */
                    ['npiDesc', 'npiLongDesc', 'npiHsn', 'npiRateUsd', 'npiUnit'].forEach(function(id) {
                        var el = document.getElementById(id);
                        if (el) el.value = '';
                    });
                    if (rateInr) rateInr.value = '0.00';
                    if (tax1) tax1.value = 'No Tax';
                    if (group) group.value = '';
                });
            }
            /* np-check-btn (✓) click -> keezha extra tr block add (clicked row oda ✓ maaranum);
               trash (np-remove-item) click -> andha row remove */
            itemBody.addEventListener('click', function(e) {
                var btn = e.target.closest('button');
                if (!btn) return;
                if (btn.classList.contains('np-remove-item')) {
                    btn.closest('tr').remove();
                    return;
                }
                if (btn.classList.contains('np-check-btn')) {
                    var tr = document.createElement('tr');
                    tr.innerHTML = '<td><i class="bi bi-info-circle" style="color:#9ca3af;font-size:12px;"></i></td>' +
                        '<td><textarea class="form-control" placeholder="Description" rows="2"></textarea></td>' +
                        '<td><textarea class="form-control" placeholder="Long description" rows="2"></textarea></td>' +
                        '<td><input type="number" class="form-control" value="1" min="0"><div style="font-size:10px;color:#9ca3af;margin-top:2px;">Unit</div></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><input type="number" class="form-control" value="0.00" step="0.01"></td>' +
                        '<td><select class="form-select"><option selected>No Tax</option><option>GST 5%</option><option>GST 12%</option><option>GST 18%</option></select></td>' +
                        '<td><span style="font-weight:700;color:#111827;">\u20B9 0.00</span></td>' +
                        '<td><button type="button" class="np-check-btn np-remove-item" title="Remove"><i class="bi bi-trash"></i></button></td>';
                    btn.closest('tr').after(tr);
                    /* clicked row oda check icon appadiyae irukum — thirumba click panna innum tr add aagum */
                }
            });
        })();

        /* ---- Automatic Proposal fullscreen modal flow ---- */
        (function() {
            var modalEl = document.getElementById('autoProposalModal');
            if (!modalEl || typeof bootstrap === 'undefined') return;

            /* Close aana stray backdrop / scroll lock cleanup — page stuck avoid */
            modalEl.addEventListener('hidden.bs.modal', function() {
                setTimeout(function() {
                    if (document.querySelector('.modal.show')) return;
                    document.querySelectorAll('.modal-backdrop').forEach(function(b) { b.remove(); });
                    document.body.classList.remove('modal-open');
                    document.body.style.overflow = '';
                    document.body.style.paddingRight = '';
                }, 60);
            });

            /* Open from the Proposals tab inside the lead detail modal (leadDetailModal hide aagadhu — mela open aagum) */
            var autoBtn = document.getElementById('ldAutoProposalBtn');
            if (autoBtn) {
                autoBtn.addEventListener('click', function() {
                    var ctx = document.getElementById('apLeadCtx');
                    var numEl = document.getElementById('ldNumber');
                    var nameEl = document.getElementById('ldName');
                    if (ctx && numEl && nameEl) ctx.textContent = 'Lead #' + numEl.textContent + ' \u2013 ' + nameEl.textContent;
                    if (typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(modalEl).show();
                    }
                });
            }

            /* ---- Demo data ---- */
            var apData = [{
                    id: 152,
                    no: 'PRO-152',
                    subject: 'New Proposal',
                    to: 'GHRA SOFTWARE TECHNOLOGY',
                    subTotal: '\u20B9 0.00',
                    tax: '\u20B9 0.00',
                    total: '\u20B9 0.00',
                    status: 'Draft',
                    phone: '9876543218',
                    email: 'pm@GHRatechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 151,
                    no: 'PRO-151',
                    subject: 'New Proposal',
                    to: 'GG COMPANY',
                    subTotal: '\u20B9 3,93,750.00',
                    tax: '\u20B9 3,75,000.00',
                    total: '\u20B9 18,750.00',
                    status: 'Draft',
                    phone: '9840012345',
                    email: 'info@ggcompany.in',
                    action: '',
                    content: 'Dear {client_name},\n\nPlease find our proposal {proposal_number} below.\n\n{proposal_items}\n\nSub Total: {sub_total}\nTotal: {total}\n\nRegards,\n{company_name}'
                },
                {
                    id: 148,
                    no: 'PRO-148',
                    subject: 'Test Quotation',
                    to: 'Sundar A',
                    subTotal: '\u20B9 119.18',
                    tax: '\u20B9 101.00',
                    total: '\u20B9 18,172.00',
                    status: 'Sent',
                    phone: '9500123456',
                    email: 'sundar.a@gmail.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 149,
                    no: 'PRO-149',
                    subject: 'New Proposal',
                    to: 'GHRA SOFTWARE TECHNOLOGY',
                    subTotal: '\u20B9 0.00',
                    tax: '\u20B9 0.00',
                    total: '\u20B9 0.00',
                    status: 'Accepted',
                    phone: '9876543218',
                    email: 'pm@GHRatechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 150,
                    no: 'PRO-150',
                    subject: 'New Proposal',
                    to: 'GHRA SOFTWARE TECHNOLOGY',
                    subTotal: '\u20B9 0.00',
                    tax: '\u20B9 0.00',
                    total: '\u20B9 0.00',
                    status: 'Rejected',
                    phone: '9876543218',
                    email: 'pm@GHRatechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 147,
                    no: 'PRO-147',
                    subject: 'Solar Panel Installation 10 \u00d7 10',
                    to: 'GHARUDA TECHNOLOGY',
                    subTotal: '\u20B9 1,18,000.00',
                    tax: '\u20B9 21,240.00',
                    total: '\u20B9 1,39,240.00',
                    status: 'Accepted',
                    phone: '8015603089',
                    email: 'pro@gharuraaitechnology.com',
                    action: '',
                    content: '{proposal_items}'
                },
                {
                    id: 140,
                    no: 'PRO-140',
                    subject: 'Product',
                    to: 'SRL AKSHMI Traders',
                    subTotal: '\u20B9 5,407.50',
                    tax: '\u20B9 972.50',
                    total: '\u20B9 6,380.00',
                    status: 'Draft',
                    phone: '9884456789',
                    email: 'meena@srlakshmi.in',
                    action: '',
                    content: '{proposal_items}'
                }
            ];
            var apState = {
                selected: 152
            };
            var apStatusMap = {
                'Draft': 'draft',
                'Sent': 'sent',
                'Accepted': 'accepted',
                'Rejected': 'rejected'
            };

            function esc(s) {
                return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;');
            }

            function statusChip(s) {
                return '<span class="ld-prop-status ' + (apStatusMap[s] || 'draft') + '">' + esc(s) + '</span>';
            }

            /* Row action buttons: Send to WhatsApp / Send to Email */
            /* ---- View flow: reference design preview modal populate ---- */
            var apvCurrentId = null; /* preview la open-a irukura proposal id */
            function numberToWordsIN(num) {
                var a = ['', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];
                var b = ['', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];
                function inWords(n) {
                    if (n < 20) return a[n];
                    if (n < 100) return b[Math.floor(n / 10)] + (n % 10 ? ' ' + a[n % 10] : '');
                    return a[Math.floor(n / 100)] + ' hundred' + (n % 100 ? ' ' + inWords(n % 100) : '');
                }
                num = Math.floor(num);
                if (!num) return 'Zero';
                var out = '';
                var crore = Math.floor(num / 10000000);
                num %= 10000000;
                var lakh = Math.floor(num / 100000);
                num %= 100000;
                var thousand = Math.floor(num / 1000);
                num %= 1000;
                if (crore) out += inWords(crore) + ' crore ';
                if (lakh) out += inWords(lakh) + ' lakh ';
                if (thousand) out += inWords(thousand) + ' thousand ';
                if (num) out += inWords(num);
                return out.trim().replace(/\b\w/g, function(c) {
                    return c.toUpperCase();
                });
            }

            function fillApPreview(r) {
                apvCurrentId = Number(r.id);
                var num = esc(r.no || '');
                document.getElementById('apvNo').textContent = '# ' + num;
                document.getElementById('apvSubject').textContent = r.subject || 'New Proposal';
                document.getElementById('apvLogo').textContent = (r.to || 'GHARUDA').replace(/[^A-Za-z]/g, '').slice(0, 3).toUpperCase() || 'KOH';
                document.getElementById('apvClient').textContent = r.to || '—';
                document.getElementById('apvClientAv').textContent = (r.to || 'KO').replace(/[^A-Za-z]/g, '').slice(0, 2).toUpperCase() || 'KO';
                document.getElementById('apvEmail').textContent = r.email || '—';
                document.getElementById('apvStatus').textContent = r.status || 'Draft';
                document.getElementById('apvStatusChip').textContent = (r.status || 'Draft').toUpperCase();
                /* status chip color: status ku thagundha maari */
                var chipEl = document.getElementById('apvStatusChip');
                var st = (r.status || 'Draft').toLowerCase();
                chipEl.style.background = (st === 'completed' || st === 'accepted') ? '#ecfdf5' : (st === 'cancelled' || st === 'declined') ? '#fef2f2' : '#f1f5f9';
                chipEl.style.borderColor = (st === 'completed' || st === 'accepted') ? '#a7f3d0' : (st === 'cancelled' || st === 'declined') ? '#fecaca' : '#e2e8f0';
                chipEl.style.color = (st === 'completed' || st === 'accepted') ? '#047857' : (st === 'cancelled' || st === 'declined') ? '#b91c1c' : '#475569';
                /* items: single demo row — data model la items illa, so summary la total mattum */
                var body = document.getElementById('apvItemBody');
                var totalNum = parseFloat(String(r.total || '0').replace(/[^0-9.]/g, '')) || 0;
                var subNum = parseFloat(String(r.subTotal || '0').replace(/[^0-9.]/g, '')) || 0;
                var inrFmt = function(n) {
                    return n.toLocaleString('en-IN', { minimumFractionDigits: 2 });
                };
                var rows = '<tr><td style="color:#9ca3af;">1</td><td><div class="apv-item-name">' + esc(r.subject || 'test') + '</div><div class="apv-item-sub">' + esc(r.subject || 'test') + '</div></td><td class="apv-item-sub">—</td><td style="text-align:right;">1</td>' +
                    '<td style="text-align:right;">' + inrFmt(subNum) + '</td>' +
                    '<td style="text-align:right;">5.00</td><td style="text-align:right;">0</td>' +
                    '<td style="text-align:right;font-weight:700;color:#111827;">' + inrFmt(totalNum) + '</td></tr>';
                body.innerHTML = rows;
                document.getElementById('apvSubTotal').textContent = '₹ ' + inrFmt(subNum);
                document.getElementById('apvTotal').textContent = '₹ ' + inrFmt(totalNum);
                document.getElementById('apvTotalBig').textContent = '₹ ' + inrFmt(totalNum);
                /* discount + words */
                var dRow = document.getElementById('apvDiscountRow');
                if (subNum && totalNum && subNum > totalNum) {
                    dRow.style.display = 'flex';
                    document.getElementById('apvDiscountLbl').textContent = ((subNum - totalNum).toFixed(2)) + ' (' + (((subNum - totalNum) / subNum) * 100).toFixed(2) + '%)';
                    document.getElementById('apvDiscountVal').textContent = '₹ ' + (subNum - totalNum).toLocaleString('en-IN', { minimumFractionDigits: 2 });
                } else {
                    dRow.style.display = 'none';
                }
                document.getElementById('apvWords').textContent = totalNum ? numberToWordsIN(totalNum) + ' Rupees Only' : '—';
                /* discussion reset to summary tab */
                switchApvTab('summary');
            }

            /* ---- Preview modal: Summary / Discussion tab switch ---- */
            function switchApvTab(name) {
                document.querySelectorAll('#apProposalPreviewModal .apv-tab').forEach(function(t) {
                    t.classList.toggle('active', t.getAttribute('data-apvtab') === name);
                });
                var s = document.getElementById('apvPanelSummary');
                var d = document.getElementById('apvPanelDiscussion');
                if (s) s.style.display = (name === 'summary') ? '' : 'none';
                if (d) d.style.display = (name === 'discussion') ? '' : 'none';
            }
            document.querySelectorAll('#apProposalPreviewModal .apv-tab').forEach(function(t) {
                t.addEventListener('click', function() {
                    switchApvTab(t.getAttribute('data-apvtab'));
                });
            });

            /* ---- Preview modal: discussion send ---- */
            var apvDiscSend = document.getElementById('apvDiscSend');
            if (apvDiscSend) {
                apvDiscSend.addEventListener('click', function() {
                    var inp = document.getElementById('apvDiscInput');
                    var list = document.getElementById('apvDiscList');
                    if (!inp || !list || !inp.value.trim()) return;
                    var item = document.createElement('div');
                    item.className = 'apv-disc-item';
                    item.innerHTML = '<span class="apv-disc-av" style="background:#16a34a;">YOU</span>' +
                        '<div><b style="color:#111827;">You</b>' +
                        '<div style="color:#374151;">' + esc(inp.value.trim()) + '</div>' +
                        '<div style="font-size:11px;color:#9ca3af;margin-top:2px;">Just now</div></div>';
                    list.appendChild(item);
                    inp.value = '';
                });
            }

            /* ---- Download button -> summary PDF download (pdfMake) ---- */
            var apvDownloadBtn = document.getElementById('apvDownloadBtn');
            if (apvDownloadBtn) {
                apvDownloadBtn.addEventListener('click', function() {
                    if (typeof pdfMake === 'undefined') {
                        alert('PDF library not loaded.');
                        return;
                    }
                    var get = function(id) {
                        var el = document.getElementById(id);
                        return el ? el.textContent.trim() : '';
                    };
                    /* address <br> tags-a newline aakka (PDF la multi-line) */
                    var getHtml = function(id) {
                        var el = document.getElementById(id);
                        return el ? el.innerHTML.replace(/<br\s*\/?>/gi, '\n').replace(/<[^>]+>/g, '').trim() : '';
                    };
                    /* items table rows DOM la irundhu extract */
                    var rows = [];
                    document.querySelectorAll('#apvItemBody tr').forEach(function(tr) {
                        var tds = tr.querySelectorAll('td');
                        if (tds.length < 8) return;
                        rows.push([
                            tds[0].textContent.trim(),
                            tds[1].textContent.trim().replace(/\s+/g, ' '),
                            tds[2].textContent.trim() || '-',
                            tds[3].textContent.trim(),
                            tds[4].textContent.trim(),
                            tds[5].textContent.trim(),
                            tds[6].textContent.trim(),
                            tds[7].textContent.trim()
                        ]);
                    });
                    var totalNum = parseFloat(String(get('apvTotal')).replace(/[^0-9.]/g, '')) || 0;
                    var body = [];
                    /* header block */
                    body.push({
                        columns: [{
                                text: get('apvLogo'),
                                bold: true,
                                fontSize: 16,
                                color: '#16a34a'
                            },
                            {
                                text: get('apvNo') + '\n' + get('apvSubject'),
                                alignment: 'right',
                                bold: true,
                                fontSize: 12
                            }
                        ],
                        margin: [0, 0, 0, 4]
                    });
                    body.push({
                        text: 'PROPOSAL SUMMARY',
                        fontSize: 9,
                        color: '#64748b',
                        margin: [0, 0, 0, 10]
                    });
                    /* client block */
                    body.push({
                        text: get('apvClient'),
                        bold: true,
                        fontSize: 11,
                        margin: [0, 0, 0, 2]
                    });
                    body.push({
                        text: getHtml('apvAddress'),
                        fontSize: 9.5,
                        color: '#475569',
                        margin: [0, 0, 0, 2]
                    });
                    body.push({
                        text: 'Phone: ' + get('apvPhone') + '  |  GST: ' + get('apvGst') + '  |  ' + get('apvEmail'),
                        fontSize: 9.5,
                        color: '#475569',
                        margin: [0, 0, 0, 12]
                    });
                    /* items table */
                    body.push({
                        table: {
                            headerRows: 1,
                            widths: ['5%', '35%', '10%', '8%', '12%', '8%', '8%', '14%'],
                            body: [
                                [{ text: '#', bold: true, fillColor: '#f1f5f9' },
                                    { text: 'ITEM', bold: true, fillColor: '#f1f5f9' },
                                    { text: 'HSN', bold: true, fillColor: '#f1f5f9' },
                                    { text: 'QTY', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'RATE', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'DIS', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'GST', bold: true, fillColor: '#f1f5f9', alignment: 'right' },
                                    { text: 'AMOUNT', bold: true, fillColor: '#f1f5f9', alignment: 'right' }
                                ]
                            ].concat(rows.map(function(r) {
                                return [{ text: r[0] }, { text: r[1] }, { text: r[2] }, { text: r[3], alignment: 'right' }, { text: r[4], alignment: 'right' }, { text: r[5], alignment: 'right' }, { text: r[6], alignment: 'right' }, { text: r[7], alignment: 'right', bold: true }];
                            }))
                        },
                        fontSize: 9,
                        margin: [0, 0, 0, 10]
                    });
                    /* totals */
                    var totalsRows = [
                        [{ text: 'Sub Total', alignment: 'right', bold: true }, { text: get('apvSubTotal'), alignment: 'right', width: 'auto' }]
                    ];
                    var dRowEl = document.getElementById('apvDiscountRow');
                    if (dRowEl && dRowEl.style.display !== 'none') {
                        totalsRows.push([{ text: get('apvDiscountLbl'), alignment: 'right' }, { text: get('apvDiscountVal'), alignment: 'right' }]);
                    }
                    totalsRows.push([{ text: 'Total', alignment: 'right', bold: true, fontSize: 11 }, { text: get('apvTotal'), alignment: 'right', bold: true, fontSize: 11, color: '#16a34a' }]);
                    body.push({
                        table: {
                            widths: ['*', 110],
                            body: totalsRows
                        },
                        fontSize: 9.5,
                        margin: [0, 0, 0, 8],
                        layout: 'lightHorizontalLines'
                    });
                    body.push({
                        text: 'With words: ' + get('apvWords'),
                        italics: true,
                        fontSize: 9,
                        color: '#64748b',
                        margin: [0, 0, 0, 14]
                    });
                    /* info block */
                    body.push({
                        columns: [{
                                text: 'Proposal Information\nRelated: ' + get('apvRelInfo'),
                                fontSize: 9.5,
                                color: '#475569'
                            },
                            {
                                text: 'Status: ' + get('apvStatus') + '\nDate: ' + get('apvDate') + '\nOpen Till: ' + get('apvOpenTill'),
                                fontSize: 9.5,
                                color: '#475569',
                                alignment: 'right'
                            }
                        ]
                    });
                    var fileBase = (get('apvNo') || 'proposal').replace(/[^A-Za-z0-9-]/g, '');
                    pdfMake.createPdf({
                        content: body,
                        defaultStyle: {
                            font: 'Roboto'
                        },
                        pageSize: 'A4',
                        pageMargins: [36, 36, 36, 36]
                    }).download(fileBase + '-proposal.pdf');
                });
            }

            /* ---- Decline button -> status chip DECLINED (red) ---- */
            var apvDeclineBtn = document.getElementById('apvDeclineBtn');
            if (apvDeclineBtn) {
                apvDeclineBtn.addEventListener('click', function() {
                    var chip = document.getElementById('apvStatusChip');
                    if (chip) {
                        chip.textContent = 'DECLINED';
                        chip.style.background = '#fef2f2';
                        chip.style.borderColor = '#fecaca';
                        chip.style.color = '#b91c1c';
                    }
                    var statusEl = document.getElementById('apvStatus');
                    if (statusEl) {
                        statusEl.textContent = 'Declined';
                        statusEl.classList.remove('apv-status-chip');
                    }
                    /* record um update — modal close/reopen pannalum irukanum */
                    if (apvCurrentId != null) {
                        var rec = apData.filter(function(x) {
                            return Number(x.id) === apvCurrentId;
                        })[0];
                        if (rec) {
                            rec.status = 'Declined';
                            if (typeof apTable !== 'undefined' && apTable) apTable.updateItem(apvCurrentId, { status: 'Declined' });
                        }
                    }
                    /* discussion la declined note */
                    var list = document.getElementById('apvDiscList');
                    if (list) {
                        var item = document.createElement('div');
                        item.className = 'apv-disc-item';
                        item.innerHTML = '<span class="apv-disc-av" style="background:#b91c1c;">\u2715</span>' +
                            '<div><b style="color:#111827;">Declined</b>' +
                            '<div style="color:#374151;">Proposal was declined by the client.</div>' +
                            '<div style="font-size:11px;color:#9ca3af;margin-top:2px;">Just now</div></div>';
                        list.appendChild(item);
                    }
                });
            }

            /* ---- Signature & Confirmation Of Identity (Accept flow) ---- */
            (function() {
                var signModalEl = document.getElementById('apSignModal');
                var acceptBtn = document.querySelector('#apProposalPreviewModal .apv-accept');
                if (!signModalEl || !acceptBtn) return;
                var currentSignId = null;

                acceptBtn.addEventListener('click', function() {
                    currentSignId = apvCurrentId;
                    /* context: name fields-a client info vechu pre-fill */
                    var clientName = (document.getElementById('apvClient').textContent || '').trim();
                    var parts = clientName.split(/\s+/);
                    document.getElementById('apvSignFirst').value = parts[0] || '';
                    document.getElementById('apvSignLast').value = parts.length > 1 ? parts.slice(1).join(' ') : '';
                    document.getElementById('apvSignEmail').value = document.getElementById('apvEmail').textContent.trim();
                    if (typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(signModalEl).show();
                    }
                });

                /* ===== Signature pad: mouse + touch draw ===== */
                var canvas = document.getElementById('apvSignCanvas');
                var wrap = document.getElementById('apvSignWrap');
                var placeholder = document.getElementById('apvSignPlaceholder');
                var ctx = canvas.getContext('2d');
                var drawing = false;
                var strokes = []; /* undo ku stroke history */
                var curStroke = null;

                function resizeCanvas() {
                    /* devicePixelRatio sharp lines ku + content preserve */
                    var ratio = window.devicePixelRatio || 1;
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    ctx.scale(ratio, ratio);
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    ctx.lineWidth = 2;
                    ctx.strokeStyle = '#0f172a';
                    /* puthu blank canvas la old strokes redraw */
                    strokes.forEach(function(s) {
                        drawStroke(s);
                    });
                }

                function drawStroke(s) {
                    if (!s || !s.length) return;
                    ctx.beginPath();
                    s.forEach(function(pt, i) {
                        if (i === 0) ctx.moveTo(pt.x, pt.y);
                        else ctx.lineTo(pt.x, pt.y);
                    });
                    if (s.length === 1) {
                        ctx.lineTo(s[0].x + 0.1, s[0].y + 0.1);
                    }
                    ctx.stroke();
                }

                function pos(e) {
                    var r = canvas.getBoundingClientRect();
                    return {
                        x: e.clientX - r.left,
                        y: e.clientY - r.top
                    };
                }

                function startDraw(e) {
                    drawing = true;
                    curStroke = [pos(e)];
                    placeholder.style.display = 'none';
                    wrap.classList.add('apv-has-sign');
                }

                function moveDraw(e) {
                    if (!drawing) return;
                    e.preventDefault();
                    curStroke.push(pos(e));
                    /* live segment draw */
                    var pts = curStroke;
                    ctx.beginPath();
                    ctx.moveTo(pts[pts.length - 2].x, pts[pts.length - 2].y);
                    ctx.lineTo(pts[pts.length - 1].x, pts[pts.length - 1].y);
                    ctx.stroke();
                }

                function endDraw() {
                    if (!drawing) return;
                    drawing = false;
                    strokes.push(curStroke);
                    curStroke = null;
                }

                canvas.addEventListener('mousedown', startDraw);
                window.addEventListener('mousemove', moveDraw);
                window.addEventListener('mouseup', endDraw);
                canvas.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                    startDraw(e.touches[0]);
                }, { passive: false });
                canvas.addEventListener('touchmove', function(e) {
                    e.preventDefault();
                    moveDraw(e.touches[0]);
                }, { passive: false });
                canvas.addEventListener('touchend', endDraw);

                /* modal open aana odane canvas resize (width 0 issue avoid) */
                signModalEl.addEventListener('shown.bs.modal', resizeCanvas);
                window.addEventListener('resize', function() {
                    if (signModalEl.classList.contains('show')) resizeCanvas();
                });

                /* Clear */
                document.getElementById('apvSignClear').addEventListener('click', function() {
                    strokes = [];
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    placeholder.style.display = '';
                    wrap.classList.remove('apv-has-sign');
                });

                /* Undo: last stroke remove + redraw */
                document.getElementById('apvSignUndo').addEventListener('click', function() {
                    strokes.pop();
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    strokes.forEach(function(s) {
                        drawStroke(s);
                    });
                    if (!strokes.length) {
                        placeholder.style.display = '';
                        wrap.classList.remove('apv-has-sign');
                    }
                });

                /* Sign submit -> proposal Accepted + table refresh + close */
                document.getElementById('apvSignSubmit').addEventListener('click', function() {
                    var first = document.getElementById('apvSignFirst');
                    if (!first.value.trim()) {
                        first.focus();
                        return;
                    }
                    if (!strokes.length) {
                        wrap.focus();
                        return;
                    }
                    /* proposal status update */
                    if (currentSignId != null && typeof apTable !== 'undefined' && apTable) {
                        apTable.updateItem(currentSignId, { status: 'Accepted' });
                    }
                    /* preview modal status texts refresh */
                    var rec = apData.filter(function(x) {
                        return Number(x.id) === currentSignId;
                    })[0];
                    if (rec) {
                        rec.status = 'Accepted';
                        fillApPreview(rec);
                    }
                    /* signed-by note in discussion */
                    var list = document.getElementById('apvDiscList');
                    if (list) {
                        var item = document.createElement('div');
                        item.className = 'apv-disc-item';
                        item.innerHTML = '<span class="apv-disc-av" style="background:#16a34a;">\u2713</span>' +
                            '<div><b style="color:#111827;">Signed</b>' +
                            '<div style="color:#374151;">' + esc((first.value.trim() + ' ' + document.getElementById('apvSignLast').value.trim()).trim()) + ' signed the proposal.</div>' +
                            '<div style="font-size:11px;color:#9ca3af;margin-top:2px;">Just now</div></div>';
                        list.appendChild(item);
                    }
                    bootstrap.Modal.getOrCreateInstance(signModalEl).hide();
                });
            })();

            /* npProposalsTable view icon handler um indha function use panna — global-a expose */
            window.fillApPreview = fillApPreview;

            function apActionButtons(r) {
                var phone = String(r.phone || '').replace(/\D/g, '');
                var waMsg = encodeURIComponent('Hello, sharing proposal ' + r.no + ' - ' + r.subject + '. Total: ' + r.total);
                var wa = phone ?
                    '<a href="https://wa.me/91' + phone + '?text=' + waMsg + '" target="_blank" class="ap-act-btn ap-wa" data-bs-toggle="tooltip" data-bs-title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></a>' :
                    '<button type="button" class="ap-act-btn ap-wa" disabled data-bs-toggle="tooltip" data-bs-title="Send to WhatsApp"><i class="bi bi-whatsapp"></i></button>';
                var mailBody = encodeURIComponent('Dear ' + r.to + ',\n\nPlease find our proposal ' + r.no + ' - ' + r.subject + '.\n\nTotal: ' + r.total + '\n\nRegards.');
                var mail = r.email ?
                    '<a href="mailto:' + r.email + '?subject=' + encodeURIComponent('Proposal ' + r.no + ' - ' + r.subject) + '&body=' + mailBody + '" class="ap-act-btn ap-mail" data-bs-toggle="tooltip" data-bs-title="Send to Email"><i class="bi bi-envelope"></i></a>' :
                    '<button type="button" class="ap-act-btn ap-mail" disabled data-bs-toggle="tooltip" data-bs-title="Send to Email"><i class="bi bi-envelope"></i></button>';
                /* Extra: view (content preview) + edit (newProposalModal) icons */
                var viewBtn = '<button type="button" class="ap-act-btn ap-view" data-apact="view" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-title="View"><i class="bi bi-eye"></i></button>';
                var editBtn = '<button type="button" class="ap-act-btn ap-edit" data-apact="edit" data-id="' + r.id + '" data-bs-toggle="tooltip" data-bs-title="Edit"><i class="bi bi-pencil-square"></i></button>';
                return '<div class="ap-act-wrap">' + viewBtn + editBtn + wa + mail + '</div>';
            }

            /* AutoMasterTable bridge for apProposalsTable */
            var apTable = {
                updateItem: function(id, patch) {
                    var tr = document.querySelector('#apProposalsTable tr[data-id="' + id + '"]');
                    if (tr && patch.status) {
                        var statusSpan = tr.querySelector('.ld-prop-status');
                        if (statusSpan) {
                            var s = patch.status.toLowerCase();
                            var cls = s === 'accepted' ? 'accepted' : (s === 'declined' ? 'rejected' : (s === 'sent' ? 'sent' : 'draft'));
                            statusSpan.className = 'ld-prop-status ' + cls;
                            statusSpan.textContent = patch.status;
                        }
                    }
                    var tbl = document.getElementById('apProposalsTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                },
                refresh: function() {
                    var tbl = document.getElementById('apProposalsTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                }
            };

            /* Keep the selected row highlighted after MasterTable re-renders (search/sort/page) */
            var apTbodyEl = document.getElementById('apPropTbody');
            if (apTbodyEl && typeof MutationObserver !== 'undefined') {
                new MutationObserver(function() {
                    apTbodyEl.querySelectorAll('tr[data-id]').forEach(function(tr) {
                        tr.classList.toggle('active', Number(tr.getAttribute('data-id')) === apState.selected);
                    });
                }).observe(apTbodyEl, {
                    childList: true
                });
            }

            /* ---- Reminders tab: Set Proposal Reminder flow ---- */
            var remData = [{
                    id: 1,
                    desc: 'Follow up on proposal feedback with Suresh Babu',
                    date: '24-09-2026',
                    remindTo: 'GHRA SOFTWARE',
                    notified: 'Yes'
                },
                {
                    id: 2,
                    desc: 'Send revised quote with discounted AMC pricing',
                    date: '28-09-2026',
                    remindTo: 'GHRA SOFTWARE',
                    notified: 'No'
                },
                {
                    id: 3,
                    desc: 'Contract agreement signing follow-up call',
                    date: '02-10-2026',
                    remindTo: 'Admin',
                    notified: 'No'
                }
            ];
            /* AutoMasterTable bridge for apRemindersTable */
            var remTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('apRemTbody') || (document.getElementById('apRemindersTable') ? document.getElementById('apRemindersTable').querySelector('tbody') : null);
                    if (tbody) {
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td>' + esc(r.desc) + '</td>' +
                            '<td>' + esc(r.date) + '</td>' +
                            '<td>' + esc(r.remindTo) + '</td>' +
                            '<td><span class="ld-prop-status ' + (r.notified === 'Yes' ? 'accepted' : 'draft') + '">' + esc(r.notified) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('apRemindersTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Set Proposal Reminder button -> open reminder modal */
            var setRemBtn = document.getElementById('apSetReminderBtn');
            if (setRemBtn) setRemBtn.addEventListener('click', function() {
                var m = document.getElementById('setProposalReminderModal');
                if (m) bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Reminder modal Submit -> add row to reminders table */
            var remSubmit = document.getElementById('apReminderSubmit');
            if (remSubmit) remSubmit.addEventListener('click', function() {
                var dateEl = document.getElementById('apReminderDate');
                var staffEl = document.getElementById('apReminderStaff');
                var descEl = document.getElementById('apReminderDesc');
                var emailEl = document.getElementById('apReminderEmail');
                if (!dateEl.value || !descEl.value.trim()) {
                    alert('Please fill all the required fields.');
                    return;
                }
                var d = new Date(dateEl.value + 'T00:00:00');
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var fmt = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                if (remTable) remTable.addItem({
                    id: Date.now(),
                    desc: descEl.value.trim(),
                    date: fmt,
                    remindTo: staffEl.value,
                    notified: 'No'
                });
                if (emailEl.checked) alert('\uD83D\uDCE7 Reminder email will also be sent to ' + staffEl.value + '.');
                bootstrap.Modal.getOrCreateInstance(document.getElementById('setProposalReminderModal')).hide();
                dateEl.value = '';
                descEl.value = '';
                emailEl.checked = false;
            });

            /* ---- Tasks tab: New Task flow ---- */
            var taskData = [{
                    id: 1,
                    name: 'Verify Technical Requirements',
                    status: 'Completed',
                    start: '18-09-2026',
                    due: '20-09-2026',
                    assigned: 'Suresh Babu',
                    tags: 'Technical, CRM',
                    priority: 'High'
                },
                {
                    id: 2,
                    name: 'Prepare Commercial Scope Document',
                    status: 'In Progress',
                    start: '21-09-2026',
                    due: '25-09-2026',
                    assigned: 'GHRA SOFTWARE',
                    tags: 'Proposal, Finance',
                    priority: 'Medium'
                },
                {
                    id: 3,
                    name: 'Client Negotiation & Final Sign-off',
                    status: 'Not Started',
                    start: '26-09-2026',
                    due: '30-09-2026',
                    assigned: 'Admin',
                    tags: 'Sales',
                    priority: 'Urgent'
                }
            ];
            /* AutoMasterTable bridge for apTasksTable */
            var apTaskTable = {
                addItem: function(r) {
                    var tbody = document.getElementById('apTaskTbody') || (document.getElementById('apTasksTable') ? document.getElementById('apTasksTable').querySelector('tbody') : null);
                    if (tbody) {
                        var pCls = (r.priority === 'High' || r.priority === 'Urgent') ? 'rejected' : (r.priority === 'Low' ? 'accepted' : 'draft');
                        var sCls = r.status === 'Completed' ? 'accepted' : (r.status === 'Cancelled' ? 'rejected' : (r.status === 'In Progress' ? 'sent' : 'draft'));
                        var tr = document.createElement('tr');
                        tr.setAttribute('data-id', r.id || Date.now());
                        tr.innerHTML = '<td><a href="#" class="lead-name-link">' + esc(r.name) + '</a></td>' +
                            '<td><span class="ld-prop-status ' + sCls + '">' + esc(r.status) + '</span></td>' +
                            '<td>' + esc(r.start) + '</td>' +
                            '<td>' + esc(r.due) + '</td>' +
                            '<td>' + esc(r.assigned) + '</td>' +
                            '<td>' + esc(r.tags) + '</td>' +
                            '<td><span class="ld-prop-status ' + pCls + '">' + esc(r.priority) + '</span></td>';
                        tbody.insertBefore(tr, tbody.firstChild);
                        var tbl = document.getElementById('apTasksTable');
                        if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                    }
                }
            };

            /* Populate the Proposal dropdown with current proposal numbers */
            (function() {
                var sel = document.getElementById('apTaskProposalSel');
                if (!sel) return;
                sel.innerHTML = apData.map(function(r) {
                    return '<option value="' + r.id + '"' + (r.id === apState.selected ? ' selected' : '') + '>' + esc(r.no) + '</option>';
                }).join('');
            })();

            /* New Task button -> open add task modal with current proposal pre-selected */
            var apNewTaskBtn = document.getElementById('apNewTaskBtn');
            if (apNewTaskBtn) apNewTaskBtn.addEventListener('click', function() {
                var sel = document.getElementById('apTaskProposalSel');
                if (sel && apState.selected) sel.value = String(apState.selected);
                var m = document.getElementById('apAddTaskModal');
                if (m) bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* Attach files: drag & drop + browse + selected file list */
            var apTaskFilesApi = {
                clear: function() {}
            };
            (function() {
                var drop = document.getElementById('apTaskDropZone');
                var input = document.getElementById('apTaskAttachInput');
                var list = document.getElementById('apTaskFileList');
                if (!drop || !input || !list) return;
                var files = [];
                drop.addEventListener('click', function() {
                    input.click();
                });
                drop.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    drop.classList.add('dragover');
                });
                drop.addEventListener('dragleave', function() {
                    drop.classList.remove('dragover');
                });
                drop.addEventListener('drop', function(e) {
                    e.preventDefault();
                    drop.classList.remove('dragover');
                    addFiles(e.dataTransfer.files);
                });
                input.addEventListener('change', function() {
                    addFiles(input.files);
                    input.value = '';
                });

                function fmtSize(b) {
                    if (b >= 1048576) return (b / 1048576).toFixed(1) + ' MB';
                    if (b >= 1024) return (b / 1024).toFixed(1) + ' KB';
                    return b + ' B';
                }

                function addFiles(fileArr) {
                    Array.from(fileArr).forEach(function(f) {
                        files.push(f);
                        var icon = 'bi-file-earmark';
                        if (f.type.indexOf('image') === 0) icon = 'bi-file-earmark-image';
                        else if (f.type.indexOf('pdf') !== -1) icon = 'bi-file-earmark-pdf';
                        else if (f.type.indexOf('word') !== -1 || /\.docx?$/.test(f.name)) icon = 'bi-file-earmark-word';
                        else if (f.type.indexOf('sheet') !== -1 || /\.xlsx?$/.test(f.name)) icon = 'bi-file-earmark-excel';
                        var item = document.createElement('div');
                        item.className = 'at2-file-item';
                        item.innerHTML = '<i class="bi ' + icon + '"></i><span class="nm">' + f.name.replace(/</g, '&lt;') + '</span><span class="sz">' + fmtSize(f.size) + '</span><button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                        list.appendChild(item);
                        item.querySelector('.rm').addEventListener('click', function() {
                            var idx = files.indexOf(f);
                            if (idx !== -1) files.splice(idx, 1);
                            item.remove();
                        });
                    });
                }
                apTaskFilesApi.clear = function() {
                    files = [];
                    list.innerHTML = '';
                };
            })();

            /* Task tags chip input */
            var apTaskTagsApi = (function() {
                var chipsWrap = document.getElementById('apTaskTagsChips');
                var input = document.getElementById('apTaskTagsInput');
                var wrap = document.getElementById('apTaskTagsWrap');
                if (!chipsWrap || !input) return {
                    get: function() {
                        return [];
                    },
                    clear: function() {}
                };
                var tags = [];

                function addTag(text) {
                    var val = text.trim().replace(/,/g, '');
                    if (!val || tags.indexOf(val) !== -1) return;
                    tags.push(val);
                    var chip = document.createElement('span');
                    chip.className = 'nl-tag-chip';
                    chip.innerHTML = val + '<button type="button" class="nl-tag-x" title="Remove">&times;</button>';
                    chipsWrap.appendChild(chip);
                    chip.querySelector('.nl-tag-x').addEventListener('click', function() {
                        var idx = tags.indexOf(val);
                        if (idx !== -1) tags.splice(idx, 1);
                        chip.remove();
                    });
                }
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        addTag(input.value);
                        input.value = '';
                    }
                    if (e.key === 'Backspace' && !input.value && tags.length) {
                        var last = chipsWrap.lastElementChild;
                        if (last) last.querySelector('.nl-tag-x').click();
                    }
                });
                input.addEventListener('blur', function() {
                    if (input.value.trim()) {
                        addTag(input.value);
                        input.value = '';
                    }
                });
                if (wrap) wrap.addEventListener('click', function() {
                    input.focus();
                });
                return {
                    get: function() {
                        return tags.slice();
                    },
                    clear: function() {
                        tags = [];
                        chipsWrap.innerHTML = '';
                    }
                };
            })();

            /* Add task modal Submit -> add row to tasks table */
            var apTaskSubmitBtn = document.getElementById('apTaskSubmit');
            if (apTaskSubmitBtn) apTaskSubmitBtn.addEventListener('click', function() {
                var subj = document.getElementById('apTaskSubject').value.trim();
                var startEl = document.getElementById('apTaskStart');
                var dueEl = document.getElementById('apTaskDue');
                if (!subj || !startEl.value) {
                    alert('Please fill all the required fields.');
                    return;
                }
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };

                function fmt(v) {
                    if (!v) return '\u2014';
                    var d = new Date(v + 'T00:00:00');
                    return pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                }
                var tagList = apTaskTagsApi.get();
                if (apTaskTable) apTaskTable.addItem({
                    id: Date.now(),
                    name: subj,
                    status: 'Not Started',
                    start: fmt(startEl.value),
                    due: fmt(dueEl.value),
                    assigned: document.getElementById('apTaskAssignees').value,
                    tags: tagList.length ? tagList.join(', ') : '\u2014',
                    priority: document.getElementById('apTaskPriority').value
                });
                bootstrap.Modal.getOrCreateInstance(document.getElementById('apAddTaskModal')).hide();
                document.getElementById('apTaskSubject').value = '';
                document.getElementById('apTaskDesc').value = '';
                document.getElementById('apTaskDue').value = '';
                apTaskTagsApi.clear();
                apTaskFilesApi.clear();
            });

            function selectProposal(id) {
                apState.selected = id;
                var r = null;
                for (var i = 0; i < apData.length; i++) {
                    if (apData[i].id === id) {
                        r = apData[i];
                        break;
                    }
                }
                if (!r) return;
                document.getElementById('apPropNo').textContent = r.no;
                document.getElementById('apPropSubject').textContent = r.subject;
                document.getElementById('apToName').textContent = r.to;
                var chip = document.getElementById('apStatusChip');
                chip.className = 'ld-prop-status ' + (apStatusMap[r.status] || 'draft');
                chip.textContent = r.status;
                document.getElementById('apContentArea').value = r.content;
                document.querySelectorAll('#apPropTbody tr[data-id]').forEach(function(tr) {
                    tr.classList.toggle('active', Number(tr.getAttribute('data-id')) === id);
                });
            }

            /* Row click -> select & show detail (Action buttons handle themselves) */
            document.getElementById('apPropTbody').addEventListener('click', function(e) {
                /* view icon -> reference design maari proposal preview modal open */
                var viewBtn = e.target.closest('.ap-act-btn.ap-view');
                if (viewBtn) {
                    e.preventDefault();
                    e.stopPropagation();
                    var vid = Number(viewBtn.getAttribute('data-id'));
                    var rec = apData.filter(function(x) {
                        return Number(x.id) === vid;
                    })[0];
                    if (rec) fillApPreview(rec);
                    var pv = document.getElementById('apProposalPreviewModal');
                    if (pv && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(pv).show();
                    }
                    return;
                }
                /* edit icon -> proposal detail la load + newProposalModal open */
                var editBtn = e.target.closest('.ap-act-btn.ap-edit');
                if (editBtn) {
                    e.preventDefault();
                    e.stopPropagation();
                    var eid = Number(editBtn.getAttribute('data-id'));
                    selectProposal(eid);
                    var npModal = document.getElementById('newProposalModal');
                    if (npModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(npModal).show();
                    }
                    return;
                }
                if (e.target.closest('.ap-act-btn')) return;
                var tr = e.target.closest('tr[data-id]');
                if (!tr) return;
                e.preventDefault();
                selectProposal(Number(tr.getAttribute('data-id')));
            });

            /* Detail tabs */
            function switchTab(name) {
                var iconTab = document.querySelector('#autoProposalModal .ap-email-tab');
                if (iconTab) iconTab.classList.toggle('active', name === 'tracked-emails');
                document.querySelectorAll('#autoProposalModal .ap-dtab').forEach(function(t) {
                    if (!t.getAttribute('data-aptab')) return; /* icon-only tabs handled separately */
                    t.classList.toggle('active', t.getAttribute('data-aptab') === name);
                });
                document.querySelectorAll('#autoProposalModal .ap-panel').forEach(function(p) {
                    p.classList.toggle('active', p.getAttribute('data-appanel') === name);
                });
            }
            document.querySelectorAll('#autoProposalModal .ap-dtab').forEach(function(tab) {
                if (!tab.getAttribute('data-aptab')) return; /* icon tabs (e.g. tracked emails) bind their own handlers */
                tab.addEventListener('click', function() {
                    switchTab(tab.getAttribute('data-aptab'));
                });
            });

            /* Toolbar buttons */
            var openNewProposal = function() {
                var npModal = document.getElementById('newProposalModal');
                if (npModal) bootstrap.Modal.getOrCreateInstance(npModal).show();
            };
            var apNew = document.getElementById('apNewProposalBtn');
            if (apNew) apNew.addEventListener('click', openNewProposal);
            /* Manual Proposal -> newProposalModal stacked open (autoProposalModal open-a irukum, hide aagadhu) */
            var apManual = document.getElementById('apManualBtn');
            if (apManual) apManual.addEventListener('click', function() {
                var npModal = document.getElementById('newProposalModal');
                if (npModal && typeof bootstrap !== 'undefined') {
                    /* newProposalModal z-index 1085 > autoProposalModal 1075 — mela open aagum,
                       autoProposalModal close aagadhu. Backdrop fix stackedModals list la already irukku. */
                    bootstrap.Modal.getOrCreateInstance(npModal).show();
                }
            });
            var apAuto = document.getElementById('apAutoBtn');
            if (apAuto) apAuto.addEventListener('click', function() {
                if (apTable) apTable.refresh();
                if (apData.length) {
                    apState.selected = apData[0].id;
                    selectProposal(apState.selected);
                }
                switchTab('proposal');
            });

            /* Templates -> fill editor */
            var tplContent = {
                standard: 'Dear {client_name},\n\nThank you for your interest. Please find our proposal {proposal_number} dated {proposal_date} below.\n\n{proposal_items}\n\nSub Total: {sub_total}\nTotal Tax: {total_tax}\nTotal: {total}\n\nThis proposal is valid until {open_till}.\n\nTerms & Conditions:\n{terms_conditions}\n\nRegards,\n{company_name}\n{company_phone}',
                solar: 'Dear {client_name},\n\nBased on our site survey, here is your customized solar installation proposal {proposal_number}.\n\n{proposal_items}\n\nSystem Summary:\n- Site survey completed\n- Installation timeline: 7 working days\n- Net metering application handled end-to-end\n\nTotal: {total}\n\nValid until {open_till}.\n\nRegards,\n{company_name}'
            };
            document.querySelectorAll('.ap-use-tpl').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    document.getElementById('apContentArea').value = tplContent[btn.getAttribute('data-tpl')] || '';
                    switchTab('proposal');
                });
            });

            /* Merge fields -> insert into editor */
            document.querySelectorAll('.ap-merge-field').forEach(function(mf) {
                mf.addEventListener('click', function(e) {
                    e.preventDefault();
                    var area = document.getElementById('apContentArea');
                    var insert = mf.textContent;
                    var s = area.selectionStart,
                        epos = area.selectionEnd;
                    area.value = area.value.slice(0, s) + insert + area.value.slice(epos);
                    area.focus();
                    area.setSelectionRange(s + insert.length, s + insert.length);
                });
            });

            /* Comments */
            var postBtn = document.getElementById('apCommentPost');
            if (postBtn) postBtn.addEventListener('click', function() {
                var input = document.getElementById('apCommentInput');
                var txt = input.value.trim();
                if (!txt) return;
                var item = document.createElement('div');
                item.className = 'ap-cmt-item';
                item.innerHTML = '<b>GHRAUDA SOFTWARE</b> &middot; just now<br>' + txt.replace(/</g, '&lt;');
                document.getElementById('apCommentList').prepend(item);
                input.value = '';
            });

            /* Notes: add note (same flow as comments) */
            var notePostBtn = document.getElementById('apNotePost');
            if (notePostBtn) notePostBtn.addEventListener('click', function() {
                var input = document.getElementById('apNoteInput');
                var txt = input.value.trim();
                if (!txt) return;
                var item = document.createElement('div');
                item.className = 'ap-cmt-item';
                item.innerHTML = '<b>GHRAUDA SOFTWARE</b> &middot; just now<br>' + txt.replace(/</g, '&lt;');
                document.getElementById('apNoteList').prepend(item);
                input.value = '';
            });

            /* ---- Templates tab: Add Template (Quill editor) ---- */
            var apQuill = null;
            var apTplCount = 0;
            var apAddTplBtn = document.getElementById('apAddTemplateBtn');
            if (apAddTplBtn) {
                apAddTplBtn.addEventListener('click', function() {
                    var m = document.getElementById('apAddTemplateModal');
                    if (!m) return;
                    if (!apQuill && typeof Quill !== 'undefined') {
                        apQuill = new Quill('#apTplQuill', {
                            theme: 'snow',
                            placeholder: 'Write template content here...',
                            modules: {
                                toolbar: [
                                    [{
                                        font: ['verdana', 'sans-serif', 'serif', 'monospace']
                                    }, {
                                        size: ['small', false, 'large', 'huge']
                                    }],
                                    [{
                                        color: []
                                    }, {
                                        background: []
                                    }],
                                    ['bold', 'italic', 'underline'],
                                    [{
                                        align: []
                                    }],
                                    ['image', 'link'],
                                    [{
                                        list: 'bullet'
                                    }, {
                                        list: 'ordered'
                                    }],
                                    ['clean']
                                ]
                            }
                        });
                    }
                    bootstrap.Modal.getOrCreateInstance(m).show();
                });
            }

            /* Add Template modal Submit -> append template card */
            var apTplSubmitBtn = document.getElementById('apTplSubmit');
            if (apTplSubmitBtn) apTplSubmitBtn.addEventListener('click', function() {
                var nameEl = document.getElementById('apTplName');
                var name = nameEl.value.trim();
                if (!name) {
                    alert('Please enter a template name.');
                    nameEl.focus();
                    return;
                }
                var html = apQuill ? apQuill.root.innerHTML : '';
                var plain = apQuill ? apQuill.getText().trim() : '';
                apTplCount++;
                var card = document.createElement('div');
                card.className = 'ap-tpl-card';
                card.innerHTML = '<div><div class="ap-tpl-name">' + name.replace(/</g, '&lt;') + '</div>' +
                    '<div class="ap-tpl-desc">' + (plain ? plain.slice(0, 90).replace(/</g, '&lt;') : 'Custom template') + '</div></div>' +
                    '<div class="d-flex gap-2"><button type="button" class="btn btn-outline-primary ap-use-custom-tpl" style="font-size:12px;font-weight:700;border-radius:8px;">Use</button>' +
                    '<button type="button" class="btn btn-outline-danger ap-del-tpl" style="font-size:12px;font-weight:700;border-radius:8px;"><i class="bi bi-trash"></i></button></div>';
                document.getElementById('apTplCardList').appendChild(card);
                card.querySelector('.ap-use-custom-tpl').addEventListener('click', function() {
                    var area = document.getElementById('apContentArea');
                    if (area) area.value = html;
                    switchTab('proposal');
                });
                card.querySelector('.ap-del-tpl').addEventListener('click', function() {
                    card.remove();
                });
                bootstrap.Modal.getOrCreateInstance(document.getElementById('apAddTemplateModal')).hide();
                nameEl.value = '';
                if (apQuill) apQuill.setText('');
            });

            /* ---- Tracked emails sent (envelope icon) ---- */
            var trackData = [{
                    id: 1,
                    to: 'pm@GHRatechnology.com',
                    subject: 'Proposal PRO-152 \u2013 New Proposal',
                    dateSent: '19-09-2026 10:42 AM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 2,
                    to: 'accounts@GHRatechnology.com',
                    subject: 'Proposal PRO-152 \u2013 New Proposal',
                    dateSent: '17-09-2026 04:18 PM',
                    opened: 'No',
                    status: 'Sent'
                },
                {
                    id: 3,
                    to: 'sundar.a@gmail.com',
                    subject: 'Test Quotation \u2013 PRO-148',
                    dateSent: '15-09-2026 11:10 AM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 4,
                    to: 'meena@srlakshmi.in',
                    subject: 'Product \u2013 PRO-140',
                    dateSent: '22-08-2026 09:25 AM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 5,
                    to: 'pro@gharuraaitechnology.com',
                    subject: 'Solar Panel Installation 10 \u00d7 10 \u2013 PRO-147',
                    dateSent: '10-09-2026 03:05 PM',
                    opened: 'Yes',
                    status: 'Sent'
                },
                {
                    id: 6,
                    to: 'info@ggcompany.in',
                    subject: 'Proposal PRO-151 \u2013 New Proposal',
                    dateSent: '18-09-2026 09:33 AM',
                    opened: 'No',
                    status: 'Sent'
                }
            ];
            var trackChip = function(s) {
                return '<span class="ld-prop-status ' + ({
                    'Yes': 'accepted',
                    'No': 'draft'
                } [s] || 'draft') + '">' + s + '</span>';
            };
            /* AutoMasterTable bridge for apTrackTable */
            var trackTable = {
                deleteItem: function(id) {
                    var tr = document.querySelector('#apTrackTable tr[data-id="' + id + '"]');
                    if (tr) tr.remove();
                    var tbl = document.getElementById('apTrackTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                }
            };
            /* Preview (eye) icon -> Tracked Views panel (proposal viewed by customer) */
            var viewData = [{
                    id: 1,
                    viewer: 'pm@GHRatechnology.com',
                    ip: '103.21.58.14',
                    dateViewed: '20-09-2026 04:12 PM',
                    device: 'Desktop · Chrome',
                    views: 3
                },
                {
                    id: 2,
                    viewer: 'pm@GHRatechnology.com',
                    ip: '103.21.58.14',
                    dateViewed: '20-09-2026 10:05 AM',
                    device: 'Desktop · Chrome',
                    views: 3
                },
                {
                    id: 3,
                    viewer: 'accounts@GHRatechnology.com',
                    ip: '157.32.14.201',
                    dateViewed: '18-09-2026 06:40 PM',
                    device: 'Mobile · Safari',
                    views: 1
                }
            ];
            /* AutoMasterTable bridge for apViewTable */
            var viewTable = {
                refresh: function() {
                    var tbl = document.getElementById('apViewTable');
                    if (tbl && tbl.autoTable && typeof tbl.autoTable.refresh === 'function') tbl.autoTable.refresh();
                }
            };
            var apPreviewTabBtn = document.querySelector('#autoProposalModal .ap-preview-tab');
            if (apPreviewTabBtn) apPreviewTabBtn.addEventListener('click', function() {
                var noEl = document.getElementById('apPropNo');
                var viewNo = document.getElementById('apViewPropNo');
                if (noEl && viewNo) viewNo.textContent = noEl.textContent;
                switchTab('tracked-views');
            });
            var apViewBack = document.getElementById('apViewBackBtn');
            if (apViewBack) apViewBack.addEventListener('click', function() {
                switchTab('proposal');
            });

            /* Expand (fullscreen) icon -> toggle the left proposals list pane */
            var apExpandTabBtn = document.querySelector('#autoProposalModal .ap-expand-tab');
            if (apExpandTabBtn) apExpandTabBtn.addEventListener('click', function() {
                var expanded = modalEl.classList.toggle('ap-expanded');
                apExpandTabBtn.classList.toggle('active', expanded);
                apExpandTabBtn.title = expanded ? 'Collapse' : 'Expand';
            });

            var apEmailTabBtn = document.querySelector('#autoProposalModal .ap-email-tab');
            if (apEmailTabBtn) apEmailTabBtn.addEventListener('click', function() {
                var noEl = document.getElementById('apPropNo');
                var trackNo = document.getElementById('apTrackPropNo');
                if (noEl && trackNo) trackNo.textContent = noEl.textContent;
                switchTab('tracked-emails');
            });
            var apTrackBack = document.getElementById('apTrackBackBtn');
            if (apTrackBack) apTrackBack.addEventListener('click', function() {
                switchTab('proposal');
            });
            var apTrackTbody = document.getElementById('apTrackTbody');
            if (apTrackTbody) apTrackTbody.addEventListener('click', function(e) {
                var resend = e.target.closest('.ap-track-resend');
                if (resend) {
                    var rid = Number(resend.getAttribute('data-rid'));
                    var rec = trackData.find(function(r) {
                        return r.id === rid;
                    });
                    var original = resend.innerHTML;
                    resend.disabled = true;
                    resend.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
                    setTimeout(function() {
                        resend.disabled = false;
                        resend.innerHTML = original;
                        alert('\u2705 Email resent to ' + (rec ? rec.to : 'recipient') + '.');
                    }, 800);
                    return;
                }
                var del = e.target.closest('.ap-track-delete');
                if (del) {
                    var rid = Number(del.getAttribute('data-rid'));
                    if (trackTable) trackTable.deleteItem(rid);
                }
            });

            /* Attach File modal: drop zone + file list */
            (function() {
                var drop = document.getElementById('apAfDrop');
                var input = document.getElementById('apAfInput');
                var list = document.getElementById('apAfList');
                if (!drop || !input || !list) return;

                function fmtSize(b) {
                    if (b >= 1048576) return (b / 1048576).toFixed(1) + ' MB';
                    if (b >= 1024) return (b / 1024).toFixed(1) + ' KB';
                    return b + ' B';
                }

                function addFiles(fileArr) {
                    Array.from(fileArr).forEach(function(f) {
                        var icon = 'bi-file-earmark';
                        if (f.type.indexOf('image') === 0) icon = 'bi-file-earmark-image';
                        else if (f.type.indexOf('pdf') !== -1) icon = 'bi-file-earmark-pdf';
                        else if (/\.docx?$/.test(f.name)) icon = 'bi-file-earmark-word';
                        else if (/\.xlsx?$/.test(f.name)) icon = 'bi-file-earmark-excel';
                        var item = document.createElement('div');
                        item.className = 'af-file-item';
                        item.innerHTML = '<i class="bi ' + icon + '"></i><span class="nm"></span><span class="sz"></span><button type="button" class="rm" title="Remove"><i class="bi bi-x-lg"></i></button>';
                        item.querySelector('.nm').textContent = f.name;
                        item.querySelector('.sz').textContent = fmtSize(f.size || 0);
                        list.appendChild(item);
                        item.querySelector('.rm').addEventListener('click', function() {
                            item.remove();
                        });
                    });
                }

                drop.addEventListener('click', function() {
                    input.click();
                });
                drop.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    drop.classList.add('dragover');
                });
                drop.addEventListener('dragleave', function() {
                    drop.classList.remove('dragover');
                });
                drop.addEventListener('drop', function(e) {
                    e.preventDefault();
                    drop.classList.remove('dragover');
                    if (e.dataTransfer && e.dataTransfer.files.length) addFiles(e.dataTransfer.files);
                });
                input.addEventListener('change', function() {
                    if (input.files.length) addFiles(input.files);
                    input.value = '';
                });
            })();

            /* Send via email button -> Send Proposal to Email modal (image flow) */
            var apSeQuill = null;
            var apSendEmailBtn = document.getElementById('apSendEmailBtn');
            if (apSendEmailBtn) apSendEmailBtn.addEventListener('click', function() {
                var m = document.getElementById('apSendEmailModal');
                if (!m) return;
                if (!apSeQuill && typeof Quill !== 'undefined') {
                    apSeQuill = new Quill('#apSendQuill', {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{
                                    font: ['verdana', 'sans-serif', 'serif', 'monospace']
                                }, {
                                    size: ['small', false, 'large', 'huge']
                                }],
                                [{
                                    color: []
                                }, {
                                    background: []
                                }],
                                ['bold', 'italic', 'underline'],
                                [{
                                    align: []
                                }],
                                ['image', 'link'],
                                [{
                                    list: 'bullet'
                                }, {
                                    list: 'ordered'
                                }],
                                ['clean']
                            ]
                        }
                    });
                    apSeQuill.root.innerHTML =
                        '<p>Dear {proposal_proposal_to}</p>' +
                        '<p>Please find our attached proposal.</p>' +
                        '<p>This proposal is valid until: {proposal_open_till}<br>' +
                        'You can view the proposal on the following link: <a href="#">{proposal_number}</a></p>' +
                        "<p>Please don't hesitate to comment online if you have any questions.</p>" +
                        '<p>We look forward to your communication.</p>' +
                        '<p>Kind Regards,<br>{email_signature}</p>';
                }
                bootstrap.Modal.getOrCreateInstance(m).show();
            });

            /* send -> demo send flow */
            var apSeSend = document.getElementById('apSeSend');
            if (apSeSend) apSeSend.addEventListener('click', function() {
                var original = apSeSend.innerHTML;
                apSeSend.disabled = true;
                apSeSend.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                setTimeout(function() {
                    apSeSend.disabled = false;
                    apSeSend.innerHTML = original;
                    var m = document.getElementById('apSendEmailModal');
                    if (m) bootstrap.Modal.getOrCreateInstance(m).hide();
                    var cc = document.getElementById('apSeCc').value.trim();
                    alert('\u2705 Proposal emailed successfully' + (cc ? ' (CC: ' + cc + ')' : '') + '.');
                    document.getElementById('apSeCc').value = '';
                }, 800);
            });

            /* Quotation HTML builder (View PDF in New Tab) — image format la */
            var apBuildQuotationHtml = function() {
                var no = (document.getElementById('apPropNo') || {}).textContent || 'PRO-152';
                var subj = (document.getElementById('apPropSubject') || {}).textContent || 'New Proposal';
                var fromCo = (document.getElementById('apFromCompany') || {}).textContent || '';
                var fromAddr = (document.getElementById('apFromAddr') || {}).innerHTML || '';
                var toCo = (document.getElementById('apToName') || {}).textContent || '';
                var toAddr = (document.getElementById('apToAddr') || {}).innerHTML || '';
                var toContact = (document.getElementById('apToContact') || {}).innerHTML || '';
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var qDate = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                var till = new Date(d.getTime() + 7 * 86400000);
                var openTill = pad(till.getDate()) + '-' + pad(till.getMonth() + 1) + '-' + till.getFullYear();
                return '<!DOCTYPE html><html><head><meta charset="utf-8"><title>Quotation ' + no + '</title><style>' +
                    'body{font-family:Arial,Helvetica,sans-serif;color:#1f2937;margin:0;background:#fff;}' +
                    '.page{max-width:820px;margin:0 auto;padding:40px 48px;}' +
                    'h1{font-size:20px;font-weight:bold;margin:0 0 22px;}' +
                    '.meta{font-size:13px;line-height:1.9;margin-bottom:26px;white-space:pre;}' +
                    '.addr-row{display:flex;justify-content:space-between;gap:40px;margin-bottom:26px;}' +
                    '.addr{font-size:12.5px;line-height:1.8;}' +
                    '.addr-title{font-weight:bold;margin-bottom:6px;font-size:13px;}' +
                    '.co{font-weight:bold;text-transform:uppercase;}' +
                    '.addr.right{text-align:right;}' +
                    '.subject{font-size:13px;margin:6px 0 18px;}' +
                    'table{width:100%;border-collapse:collapse;font-size:12.5px;margin-bottom:14px;}' +
                    'th{background:#334155;color:#fff;padding:9px 10px;text-align:left;font-weight:600;}' +
                    'td{padding:9px 10px;border-bottom:1px solid #f1f5f9;}' +
                    'tr.alt td{background:#f8fafc;}' +
                    'td.num,th.num{text-align:right;}' +
                    '.sum td{background:#f1f5f9;font-weight:bold;border:none;}' +
                    '.sum .lbl{text-align:right;}' +
                    '.row2{display:flex;justify-content:space-between;gap:40px;font-size:13px;margin-top:26px;}' +
                    '.sig{margin-top:70px;text-align:right;font-size:13px;}' +
                    '@media print{.page{padding:20px 24px;}}' +
                    '</style></head><body><div class="page">' +
                    '<h1>Quotation</h1>' +
                    '<div class="meta">Quotation#      : ' + no + '\nQuotation Date : ' + qDate + '\nOpen Till      : ' + openTill + '</div>' +
                    '<div class="addr-row">' +
                    '<div class="addr"><div class="addr-title">Quotation By Address:</div><div class="co">' + fromCo + '</div>' + fromAddr + '</div>' +
                    '<div class="addr right"><div class="addr-title">Quotation To Address:</div><div class="co">' + toCo + '</div>' + toAddr + '<br>' + toContact + '</div>' +
                    '</div>' +
                    '<div class="subject">' + subj + '</div>' +
                    '<table><thead><tr><th>S.No</th><th>Description</th><th>HSN</th><th>Qty</th><th class="num">Rate (\u20b9)</th><th class="num">Dis</th><th class="num">GST %</th><th class="num">Amount (\u20b9)</th></tr></thead>' +
                    '<tbody>' +
                    '<tr><td>1</td><td>Ashwagandha 3% - 1212</td><td></td><td>10 Kilograms</td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '<tr class="alt"><td>2</td><td>Ashwagandha - 454545</td><td></td><td>10 Kilograms</td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '</tbody>' +
                    '<tfoot>' +
                    '<tr class="sum"><td colspan="6"></td><td class="lbl">Sub Total</td><td class="num">\u20b9 0.00</td></tr>' +
                    '<tr class="sum"><td colspan="6"></td><td class="lbl">Total</td><td class="num">\u20b9 0.00</td></tr>' +
                    '</tfoot></table>' +
                    '<div class="row2"><div><b>Terms and Conditions:</b></div><div style="text-align:right;"><b>With words:</b><br>Rupees Only</div></div>' +
                    '<div class="row2"><div><b>Client Note:</b></div></div>' +
                    '<div class="sig">Authorized Signature:</div>' +
                    '</div></body></html>';
            };

            /* Customer proposal-view page builder (View Proposal) — image flow la */
            var apBuildProposalViewHtml = function() {
                var no = (document.getElementById('apPropNo') || {}).textContent || 'PRO-152';
                var subj = (document.getElementById('apPropSubject') || {}).textContent || 'New Proposal';
                var fromCo = (document.getElementById('apFromCompany') || {}).textContent || '';
                var fromAddr = (document.getElementById('apFromAddr') || {}).innerHTML || '';
                var toCo = (document.getElementById('apToName') || {}).textContent || '';
                var toAddr = (document.getElementById('apToAddr') || {}).innerHTML || '';
                var toContact = (document.getElementById('apToContact') || {}).innerHTML || '';
                var d = new Date();
                var pad = function(n) {
                    return String(n).padStart(2, '0');
                };
                var qDate = pad(d.getDate()) + '-' + pad(d.getMonth() + 1) + '-' + d.getFullYear();
                var till = new Date(d.getTime() + 7 * 86400000);
                var openTill = pad(till.getDate()) + '-' + pad(till.getMonth() + 1) + '-' + till.getFullYear();
                var shortName = fromCo.split(' ').slice(0, 1)[0] || 'ghrA';
                return '<!DOCTYPE html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Proposal ' + no + '</title><style>' +
                    '*{box-sizing:border-box;}' +
                    'body{font-family:"Segoe UI",Arial,Helvetica,sans-serif;color:#1f2937;margin:0;background:#eef1f5;padding:28px 20px;}' +
                    '.wrap{max-width:1060px;margin:0 auto;}' +
                    '.logo{width:130px;height:130px;border-radius:50%;background:#7c0f8e;color:#fff;display:flex;align-items:center;justify-content:center;font-size:30px;font-weight:800;letter-spacing:2px;margin:0 0 26px 60px;box-shadow:0 4px 14px rgba(124,15,142,.25);}' +
                    '.card{background:#fff;border-radius:14px;box-shadow:0 2px 12px rgba(15,23,42,.06);padding:26px 28px;margin-bottom:22px;}' +
                    '.head-row{display:flex;justify-content:space-between;align-items:flex-start;gap:24px;margin-bottom:20px;}' +
                    '.pno{font-size:22px;font-weight:800;margin:0 0 4px;}' +
                    '.psub{font-size:13px;color:#64748b;margin:0;}' +
                    '.hbtns{display:flex;gap:10px;flex-shrink:0;}' +
                    '.btn{border-radius:8px;padding:9px 16px;font-size:13px;font-weight:600;cursor:pointer;border:1px solid #d7dce3;background:#fff;color:#374151;display:inline-flex;align-items:center;gap:7px;transition:.15s;}' +
                    '.btn:hover{border-color:#94a3b8;}' +
                    '.btn.green{background:#16a34a;border-color:#16a34a;color:#fff;}' +
                    '.btn.green:hover{background:#15803d;}' +
                    '.btn.decline:hover{border-color:#dc2626;color:#dc2626;}' +
                    '.grid{display:grid;grid-template-columns:1.55fr 1fr;gap:26px;align-items:start;}' +
                    'table.items{width:100%;border-collapse:collapse;font-size:13px;}' +
                    'table.items th{background:#f1f5f9;color:#475569;font-weight:600;text-align:left;padding:10px 12px;border-bottom:1px solid #e2e8f0;white-space:nowrap;}' +
                    'table.items td{padding:12px;border-bottom:1px solid #f1f5f9;vertical-align:top;}' +
                    'tr.alt td{background:#f8fafc;}' +
                    'td.num,th.num{text-align:right;}' +
                    '.sumrow td{font-weight:700;background:#fff;}' +
                    '.sumlbl{text-align:right;font-weight:700;}' +
                    '.withwords{text-align:right;font-size:13px;color:#334155;padding:16px 4px 4px;}' +
                    '.dtabs{display:flex;gap:22px;border-bottom:1px solid #e2e8f0;margin-bottom:16px;}' +
                    '.dtab{padding:10px 2px;font-size:13.5px;font-weight:600;color:#64748b;cursor:pointer;border-bottom:2px solid transparent;display:flex;align-items:center;gap:7px;}' +
                    '.dtab.active{color:#2563eb;border-bottom-color:#2563eb;}' +
                    '.co-name{font-size:13.5px;font-weight:800;margin:0 0 10px;text-transform:uppercase;}' +
                    '.co-addr{font-size:12.5px;color:#475569;line-height:1.75;}' +
                    '.co-addr a{color:#2563eb;text-decoration:none;}' +
                    '.co-addr a:hover{text-decoration:underline;}' +
                    '.sec-title{font-size:13.5px;font-weight:800;margin:20px 0 8px;}' +
                    '.meta-tbl{width:100%;font-size:12.5px;border-collapse:collapse;margin-top:14px;}' +
                    '.meta-tbl td{padding:5px 0;}' +
                    '.meta-tbl td:first-child{color:#64748b;width:45%;}' +
                    '.meta-tbl td:last-child{font-weight:600;}' +
                    '.disc-empty{border:1px dashed #cbd5e1;border-radius:10px;padding:26px;text-align:center;color:#94a3b8;font-size:13px;}' +
                    '@media(max-width:860px){.grid{grid-template-columns:1fr;}.logo{margin-left:0;}.head-row{flex-direction:column;}}' +
                    '@media print{body{background:#fff;padding:0;}.hbtns,.dtabs{display:none;}}' +
                    '</style></head><body><div class="wrap">' +
                    '<div class="logo">' + shortName + '</div>' +
                    '<div class="card">' +
                    '<div class="head-row"><div><h1 class="pno"># ' + no + '</h1><p class="psub">' + subj + '</p></div>' +
                    '<div class="hbtns"><button class="btn" onclick="window.print()">\u2913 Download</button><button class="btn decline" onclick="alert(\'Proposal declined.\')">\u2715 Decline</button><button class="btn green" onclick="alert(\'Proposal accepted!\')">\u2713 Accept</button></div></div>' +
                    '<div class="grid"><div>' +
                    '<table class="items"><thead><tr><th>#</th><th>Item</th><th>HSN</th><th class="num">Qty</th><th class="num">Rate</th><th class="num">Dis</th><th class="num">GST</th><th class="num">Amount</th></tr></thead><tbody>' +
                    '<tr><td>1</td><td>Ashwagandha 3% - 1212</td><td></td><td class="num">10<br><span style="color:#94a3b8;font-size:11.5px;">Kilograms</span></td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '<tr class="alt"><td>2</td><td>Ashwagandha - 454545</td><td></td><td class="num">10<br><span style="color:#94a3b8;font-size:11.5px;">Kilograms</span></td><td class="num">0.00</td><td class="num">0.00</td><td class="num">0</td><td class="num">0.00</td></tr>' +
                    '</tbody><tfoot>' +
                    '<tr class="sumrow"><td colspan="6" class="sumlbl">Sub Total</td><td colspan="2" class="num">\u20b9 0.00</td></tr>' +
                    '<tr class="sumrow"><td colspan="6" class="sumlbl">Total</td><td colspan="2" class="num">\u20b9 0.00</td></tr>' +
                    '</tfoot></table>' +
                    '<div class="withwords">With words: Rupees Only</div>' +
                    '</div><div>' +
                    '<div class="dtabs"><span class="dtab active">\ud83d\udcc4 Summary</span><span class="dtab">\ud83d\udcac Discussion</span></div>' +
                    '<p class="co-name">' + fromCo + '</p>' +
                    '<div class="co-addr">' + fromAddr + '</div>' +
                    '<div class="sec-title">Proposal Information</div>' +
                    '<p class="co-name" style="margin-bottom:6px;">' + toCo + '</p>' +
                    '<div class="co-addr">' + toAddr + '<br>' + toContact + '</div>' +
                    '<table class="meta-tbl"><tr><td>Status</td><td>Sent</td></tr><tr><td>Date</td><td>' + qDate + '</td></tr><tr><td>Open Till</td><td>' + openTill + '</td></tr></table>' +
                    '</div></div></div>' +
                    '<div class="card"><div class="disc-empty">No discussion yet. Comments from the customer will appear here.</div></div>' +
                    '</div></body></html>';
            };

            /* Save + More dropdown actions (delegated — rendu menu layum work aagum) */
            document.addEventListener('click', function(e) {
                var item = e.target.closest('.ap-save-item');
                if (!item) return;
                e.preventDefault();
                var txt = item.textContent.trim();
                if (txt === 'Estimate') {
                    /* Estimate → direct modal open */
                    var esModal = document.getElementById('newEstimateModal');
                    if (esModal && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(esModal).show();
                    return;
                }
                if (txt === 'Invoice') {
                    /* Invoice → newInvoiceModal stacked open (Estimate maari; autoProposalModal hide aagadhu,
                       z-index 1085 > 1075, stackedModals list la backdrop fix irukku) */
                    var inInvModal = document.getElementById('newInvoiceModal');
                    if (inInvModal && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(inInvModal).show();
                    return;
                }
                if (txt === 'View Proposal') {
                    /* dropdown View Proposal → apProposalsTable eye button maari preview modal open
                       (apProposalPreviewModal z-index 1095 > autoProposalModal 1075 — stacked,
                       autoProposalModal close aagadhu; backdrop fix stackedModals list la irukku) */
                    var vpRec = apData.filter(function(x) {
                        return Number(x.id) === apState.selected;
                    })[0];
                    if (vpRec) fillApPreview(vpRec);
                    var pvModal = document.getElementById('apProposalPreviewModal');
                    if (pvModal && typeof bootstrap !== 'undefined') {
                        bootstrap.Modal.getOrCreateInstance(pvModal).show();
                    }
                    return;
                }
                if (txt === 'View PDF') {
                    var pdfWin2 = window.open('', '_blank');
                    if (pdfWin2) {
                        pdfWin2.document.write(apBuildQuotationHtml());
                        pdfWin2.document.close();
                    }
                    return;
                }
                if (txt === 'Attach File') {
                    var afm = document.getElementById('apAttachFileModal');
                    if (afm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(afm).show();
                    return;
                }
                if (txt === 'Print') {
                    window.print();
                } else if (txt === 'View PDF in New Tab') {
                    var pdfWin = window.open('', '_blank');
                    if (pdfWin) {
                        pdfWin.document.write(apBuildQuotationHtml());
                        pdfWin.document.close();
                    }
                } else if (txt === 'Mark as Accepted') {
                    var chip = document.getElementById('apStatusChip');
                    if (chip) {
                        chip.textContent = 'Accepted';
                        chip.className = 'ld-prop-status accepted';
                    }
                } else if (txt === 'Mark as Declined') {
                    var chipD = document.getElementById('apStatusChip');
                    if (chipD) {
                        chipD.textContent = 'Rejected';
                        chipD.className = 'ld-prop-status rejected';
                    }
                } else if (txt === 'Mark as Sent') {
                    var chipS = document.getElementById('apStatusChip');
                    if (chipS) {
                        chipS.textContent = 'Sent';
                        chipS.className = 'ld-prop-status sent';
                    }
                } else if (txt === 'Delete') {
                    if (confirm('Delete this proposal?')) {
                        alert('\ud83d\uddd1 ' + document.getElementById('apPropNo').textContent + ' proposal deleted.');
                    }
                } else {
                    alert('\ud83d\udc4c ' + txt + ' — ' + document.getElementById('apPropNo').textContent + ' proposal.');
                }
            });

            /* New Invoice Submit → newInvoiceModal close; autoProposalModal-la green Convert dropdown button
               hide + INV-259 blue pill show (adhai click panna invoice view tab open) */
            var niSubmitBtn = document.getElementById('niSubmitBtn');
            if (niSubmitBtn) niSubmitBtn.addEventListener('click', function() {
                var nim = document.getElementById('newInvoiceModal');
                if (nim && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(nim).hide();

                var apModal = document.getElementById('autoProposalModal');
                if (!apModal) return;

                /* Green Convert dropdown button → remove (visually hide) */
                var convBtn = apModal.querySelector('.ap-actions-bar .ap-green-btn.dropdown-toggle');
                if (convBtn) convBtn.style.display = 'none';

                /* Blue INV-259 pill → show (first time la mattum create) */
                var invBtn = document.getElementById('apInvoiceNumBtn');
                if (!invBtn) {
                    invBtn = document.createElement('button');
                    invBtn.type = 'button';
                    invBtn.id = 'apInvoiceNumBtn';
                    invBtn.style.cssText = 'background:#2c6ce0;color:#fff;border:none;border-radius:8px;padding:7px 18px;font-size:13px;font-weight:800;letter-spacing:.4px;cursor:pointer;transition:.15s;font-family:inherit;';
                    invBtn.innerHTML = 'INV-259';
                    invBtn.addEventListener('click', function() {
                        /* INV-259 click → invoice view: first three tabs hide, Invoice tab show */
                        invBtn.style.display = 'none';
                        var hidden = 0;
                        apModal.querySelectorAll('.ap-tabs-row .ap-dtab[data-aptab]').forEach(function(t) {
                            if (t.classList.contains('ap-invoice-tab')) return;
                            if (hidden < 3) {
                                t.style.display = 'none';
                                hidden++;
                            }
                        });
                        var invTab = apModal.querySelector('.ap-invoice-tab');
                        if (invTab) invTab.style.display = '';
                        switchTab('invoice');
                    });
                }
                if (convBtn) {
                    convBtn.parentNode.insertBefore(invBtn, convBtn.nextSibling);
                } else if (!invBtn.isConnected) {
                    var bar = apModal.querySelector('.ap-actions-bar');
                    if (bar) bar.appendChild(invBtn);
                }
            });

            /* Proposals table (npProposalsTable) view icon -> apProposalPreviewModal show (reference design preview) */
            document.addEventListener('click', function(e) {
                var viewBtn = e.target.closest('.np-act-view');
                if (!viewBtn) return;
                e.preventDefault();
                var vid = Number(viewBtn.getAttribute('data-id'));
                var rec = (typeof proposalsTable !== 'undefined' && proposalsTable) ? proposalsTable.getData().filter(function(x) {
                    return Number(x.id) === vid;
                })[0] : null;
                if (rec) fillApPreview(rec);
                var pv = document.getElementById('apProposalPreviewModal');
                if (pv && typeof bootstrap !== 'undefined') {
                    bootstrap.Modal.getOrCreateInstance(pv).show();
                }
            });

            /* Payment button (invoice panel) → Record Payment modal */
            var rpBtn = document.getElementById('apInvPaymentBtn');
            if (rpBtn) rpBtn.addEventListener('click', function() {
                var rpm = document.getElementById('apRecordPaymentModal');
                if (rpm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rpm).show();
            });

            /* Record Payment submit — validate + toast + mark Paid */
            var rpSubmit = document.getElementById('rpSubmitBtn');
            if (rpSubmit) rpSubmit.addEventListener('click', function() {
                var amt = document.getElementById('rpAmount'),
                    dt = document.getElementById('rpDate'),
                    mode = document.getElementById('rpMode');
                if (!amt.value.trim()) {
                    amt.focus();
                    amt.style.borderColor = '#dc2626';
                    return;
                }
                if (!dt.value) {
                    dt.focus();
                    dt.style.borderColor = '#dc2626';
                    return;
                }
                if (!mode.value) {
                    mode.focus();
                    mode.style.borderColor = '#dc2626';
                    return;
                }
                var rpModalEl = document.getElementById('apRecordPaymentModal');
                if (rpModalEl && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(rpModalEl).hide();
                var chipEl = document.getElementById('apInvStatusChip');
                if (chipEl) {
                    chipEl.textContent = 'Paid';
                    chipEl.className = 'ld-prop-status accepted';
                }
                var dueLabel = document.getElementById('apInvAmountDue');
                if (dueLabel) dueLabel.textContent = '\u20b9 0.00';

                /* Payment button disable + pakathula View button add */
                var payBtn = document.getElementById('apInvPaymentBtn');
                if (payBtn) {
                    payBtn.disabled = true;
                    payBtn.style.opacity = '.55';
                    payBtn.style.cursor = 'not-allowed';
                    var pvBtn = document.getElementById('apInvPaymentViewBtn');
                    if (!pvBtn) {
                        pvBtn = document.createElement('button');
                        pvBtn.type = 'button';
                        pvBtn.id = 'apInvPaymentViewBtn';
                        pvBtn.className = 'ap-icon-btn';
                        pvBtn.title = 'View payment receipt';
                        pvBtn.innerHTML = '<i class="bi bi-eye"></i>';
                        pvBtn.addEventListener('click', function() {
                            /* Receipt modal la submitted values fill */
                            var amt = (document.getElementById('rpAmount') || {}).value || '393750.00';
                            var dtRaw = (document.getElementById('rpDate') || {}).value || '2026-09-23';
                            var mode = (document.getElementById('rpMode') || {}).value || 'Bank';
                            var txn = (document.getElementById('rpTxnId') || {}).value || '';
                            var agent = (document.getElementById('rpAgent') || {}).value || '';
                            var note = (document.getElementById('rpNote') || {}).value || '';
                            var acct = (document.getElementById('rpAccount') || {}).value || '';
                            var depo = (document.getElementById('rpDeposit') || {}).value || '';
                            var dtNice = dtRaw.split('-').reverse().join('-');
                            var amtFmt = '₹ ' + Number(String(amt).replace(/,/g, '') || 0).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                            document.getElementById('pvAmount').value = amt;
                            document.getElementById('pvDate').value = dtRaw;
                            document.getElementById('pvMode').value = mode;
                            document.getElementById('pvTxn').value = txn;
                            document.getElementById('pvAgent').value = agent;
                            document.getElementById('pvNote').value = note;
                            document.getElementById('pvAccount').value = acct;
                            document.getElementById('pvDeposit').value = depo;
                            document.getElementById('pvReceiptDate').textContent = dtNice;
                            document.getElementById('pvReceiptMode').textContent = mode;
                            document.getElementById('pvReceiptTotal').textContent = amtFmt;
                            document.getElementById('pvReceiptPaid').textContent = amtFmt;
                            var pvm = document.getElementById('apPaymentViewModal');
                            if (pvm && typeof bootstrap !== 'undefined') bootstrap.Modal.getOrCreateInstance(pvm).show();
                        });
                        payBtn.parentNode.insertBefore(pvBtn, payBtn.nextSibling);
                    }
                }
                alert('\u2705 Payment of \u20b9 ' + amt.value.trim() + ' recorded for INV-259.');
            });

            /* Send approval request (demo) */
            var apApproval = document.getElementById('apApprovalBtn');
            if (apApproval) apApproval.addEventListener('click', function() {
                var original = apApproval.innerHTML;
                apApproval.disabled = true;
                apApproval.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Sending...';
                setTimeout(function() {
                    apApproval.disabled = false;
                    apApproval.innerHTML = original;
                    alert('\u2705 Approval request sent for ' + document.getElementById('apPropNo').textContent + '.');
                }, 900);
            });

            selectProposal(apState.selected);
        })();
    });
