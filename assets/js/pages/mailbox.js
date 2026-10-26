/**
 * Gharuda CRM - Mailbox Page Script
 * File: assets/js/pages/mailbox.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
        'use strict';

        var listPane = document.getElementById('mbxListView');
        var detailPane = document.getElementById('mbxDetailView');
        var composePane = document.getElementById('mbxComposeView');
        var settingPane = document.getElementById('mbxSettingView');
        var headTitle = document.getElementById('mbxHeadTitle');
        var backBtn = document.getElementById('mbxBackBtn');
        var navBtns = document.querySelectorAll('.mbx-nav');
        var composeBtn = document.getElementById('mbxComposeBtn');
        var mailRows = document.querySelectorAll('.mbx-mail');
        var starBtns = document.querySelectorAll('.mbx-mail-star');
        var delBtns = document.querySelectorAll('.mbx-del-btn');
        var replyBtn = document.getElementById('mbxReplyBtn');
        var forwardBtn = document.getElementById('mbxForwardBtn');
        var detailDeleteBtn = document.getElementById('mbxDetailDeleteBtn');
        var addFileBtn = document.getElementById('mbxAddFile');
        var sendBtn = document.getElementById('mbxSendBtn');
        var draftBtn = document.getElementById('mbxDraftBtn');
        var saveSettingBtn = document.getElementById('mbxSetSave');

        var currentNav = 'inbox';
        var quill = null;

        function initQuill() {
            if (quill || typeof Quill === 'undefined' || !document.getElementById('mbxQuill')) return;
            quill = new Quill('#mbxQuill', {
                theme: 'snow',
                placeholder: 'Write your email here...',
                modules: {
                    toolbar: [
                        [{ font: ['verdana', 'sans-serif', 'serif', 'monospace'] }, { size: ['small', false, 'large', 'huge'] }],
                        [{ color: [] }, { background: [] }],
                        ['bold', 'italic', 'underline'],
                        [{ align: [] }],
                        ['image', 'link'],
                        [{ list: 'bullet' }, { list: 'ordered' }],
                        ['clean']
                    ]
                }
            });
        }

        function hideAllPanes() {
            if (listPane) listPane.style.display = 'none';
            if (detailPane) detailPane.style.display = 'none';
            if (composePane) composePane.style.display = 'none';
            if (settingPane) settingPane.style.display = 'none';
        }

        function showList(title) {
            hideAllPanes();
            if (listPane) listPane.style.display = 'block';
            if (backBtn) backBtn.style.display = 'none';
            if (headTitle) headTitle.textContent = title || 'Inbox';
        }

        function showDetail() {
            hideAllPanes();
            if (detailPane) detailPane.style.display = 'block';
            if (backBtn) backBtn.style.display = 'inline-flex';
            if (headTitle) headTitle.textContent = 'View Email';
        }

        function showCompose(prefill) {
            hideAllPanes();
            if (composePane) composePane.style.display = 'block';
            if (backBtn) backBtn.style.display = 'inline-flex';
            if (headTitle) headTitle.textContent = 'Compose Email';
            navBtns.forEach(function (n) { n.classList.remove('active'); });
            initQuill();
            if (prefill) {
                var toField = document.getElementById('mbxTo');
                var subjField = document.getElementById('mbxSubject');
                if (toField && prefill.to) toField.value = prefill.to;
                if (subjField && prefill.subject) subjField.value = prefill.subject;
            }
        }

        function showSetting() {
            hideAllPanes();
            if (settingPane) settingPane.style.display = 'block';
            if (backBtn) backBtn.style.display = 'none';
            if (headTitle) headTitle.textContent = 'Settings';
        }

        /* Click on ANY email row -> show same static email detail */
        mailRows.forEach(function (row) {
            row.addEventListener('click', function (e) {
                if (e.target.closest('.mbx-mail-star') || e.target.closest('.mbx-del-btn')) return;
                row.classList.remove('unread');
                showDetail();
            });
        });

        /* Back button */
        if (backBtn) {
            backBtn.addEventListener('click', function () {
                var navObj = { inbox: 'Inbox', sent: 'Sent', draft: 'Draft', trash: 'Trash' };
                showList(navObj[currentNav] || 'Inbox');
                navBtns.forEach(function (n) {
                    n.classList.toggle('active', n.getAttribute('data-view') === currentNav);
                });
            });
        }

        /* Sidebar navigation tabs */
        navBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                var view = btn.getAttribute('data-view');
                navBtns.forEach(function (n) { n.classList.remove('active'); });
                btn.classList.add('active');
                if (view === 'setting') {
                    showSetting();
                } else {
                    currentNav = view;
                    var titles = { inbox: 'Inbox', sent: 'Sent', draft: 'Draft', trash: 'Trash' };
                    showList(titles[view] || 'Inbox');
                }
            });
        });

        /* Compose button */
        if (composeBtn) {
            composeBtn.addEventListener('click', function () {
                showCompose({ to: '', subject: '' });
            });
        }

        /* Star toggle */
        starBtns.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                btn.classList.toggle('starred');
                var icon = btn.querySelector('i');
                if (icon) {
                    if (btn.classList.contains('starred')) {
                        icon.className = 'bi bi-star-fill';
                    } else {
                        icon.className = 'bi bi-star';
                    }
                }
            });
        });

        /* Delete row from list */
        delBtns.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                var row = btn.closest('.mbx-mail');
                if (row) {
                    row.style.transition = 'opacity .2s, transform .2s';
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(20px)';
                    setTimeout(function () { row.remove(); }, 200);
                }
            });
        });

        /* Detail actions */
        if (replyBtn) {
            replyBtn.addEventListener('click', function () {
                showCompose({ to: 'meena@srlakshmi.in', subject: 'Re: Solar package quotation request' });
            });
        }
        if (forwardBtn) {
            forwardBtn.addEventListener('click', function () {
                showCompose({ to: '', subject: 'Fwd: Solar package quotation request' });
            });
        }
        if (detailDeleteBtn) {
            detailDeleteBtn.addEventListener('click', function () {
                alert('Email moved to trash.');
                showList('Inbox');
            });
        }

        /* Add more file attachment rows */
        if (addFileBtn) {
            addFileBtn.addEventListener('click', function () {
                var row = document.createElement('div');
                row.className = 'mbx-attach-row mt-2';
                row.innerHTML = '<input type="file" class="form-control" multiple>' +
                    '<button type="button" class="mbx-add-file" style="background:#ef4444;" title="Remove"><i class="bi bi-x-lg"></i></button>';
                row.querySelector('button').addEventListener('click', function () { row.remove(); });
                var wrap = document.getElementById('mbxAttachWrap');
                if (wrap && wrap.parentNode) {
                    wrap.parentNode.insertBefore(row, wrap.nextSibling);
                }
            });
        }

        /* Send button */
        if (sendBtn) {
            sendBtn.addEventListener('click', function () {
                var toField = document.getElementById('mbxTo');
                var subjField = document.getElementById('mbxSubject');
                var toVal = toField ? toField.value.trim() : '';
                var subjVal = subjField ? subjField.value.trim() : '';
                if (!toVal) { alert('Recipient Email (To) is required.'); return; }
                if (!subjVal) { alert('Subject is required.'); return; }
                sendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Sending...';
                setTimeout(function () {
                    sendBtn.innerHTML = '<i class="bi bi-send me-1"></i>Send';
                    alert('Email sent successfully to ' + toVal);
                    showList('Inbox');
                }, 600);
            });
        }

        /* Save as draft */
        if (draftBtn) {
            draftBtn.addEventListener('click', function () {
                alert('Email saved to Draft.');
                showList('Draft');
            });
        }

        /* Save setting */
        if (saveSettingBtn) {
            saveSettingBtn.addEventListener('click', function () {
                saveSettingBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Saving...';
                setTimeout(function () {
                    saveSettingBtn.innerHTML = '<i class="bi bi-check-lg me-1"></i>Save Settings';
                    alert('Settings saved successfully.');
                }, 500);
            });
        }
    })();
