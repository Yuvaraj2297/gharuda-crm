<?php include 'header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<link rel="stylesheet" href="./assets/css/mail-box.css">


<div class="mbx-page">

    <!-- Title row -->
    <div class="mbx-title-row">
        <h5><i class="bi bi-envelope-open me-2" style="color:var(--primary);"></i>Mailbox</h5>
    </div>

    <div class="mbx-shell">

        <!-- ===== Sidebar ===== -->
        <div class="mbx-side">
            <button type="button" class="mbx-compose-btn" id="mbxComposeBtn"><i class="bi bi-pencil-square"></i>Compose Email</button>
            <div class="mbx-nav-wrap">
                <button type="button" class="mbx-nav active" data-view="inbox"><i class="bi bi-inbox"></i>Inbox <span class="mbx-count" id="mbxInboxCount">0</span></button>
                <button type="button" class="mbx-nav" data-view="sent"><i class="bi bi-send"></i>Sent</button>
                <button type="button" class="mbx-nav" data-view="draft"><i class="bi bi-file-earmark"></i>Draft <span class="mbx-count" id="mbxDraftCount" style="background:#6b7280;">0</span></button>
                <button type="button" class="mbx-nav" data-view="trash"><i class="bi bi-trash"></i>Trash</button>
                <div class="mbx-side-sep"></div>
                <button type="button" class="mbx-nav" data-view="setting"><i class="bi bi-gear"></i>Setting</button>
            </div>
        </div>

        <!-- ===== Main panel ===== -->
        <div class="mbx-main">
            <div class="mbx-main-head" id="mbxHead">
                <button type="button" class="mbx-back" id="mbxBackBtn" title="Back" style="display:none;"><i class="bi bi-arrow-left"></i></button>
                <h6 id="mbxHeadTitle">Inbox</h6>
            </div>
            <div class="mbx-main-body" id="mbxBody">

                <!-- 1. Mail List View (Static HTML) -->
                <div id="mbxListView" class="mbx-view-pane">
                    <!-- Mail 1 -->
                    <button type="button" class="mbx-mail unread" data-id="1">
                        <span class="mbx-av" style="background:#2563eb;">MR</span>
                        <span class="mbx-mail-mid">
                            <span class="mbx-mail-top">
                                <span class="mbx-mail-from">Meena Ramesh <span style="color:#9ca3af;font-weight:600;">&lt;meena@srlakshmi.in&gt;</span></span>
                                <span class="mbx-mail-time">10:24 AM</span>
                            </span>
                            <span class="mbx-mail-subj d-block">Solar package quotation request</span>
                            <span class="mbx-mail-snip d-block">Hi, we are planning a 5kW rooftop installation. Please share your latest quotation with GST breakdown...</span>
                        </span>
                        <button type="button" class="mbx-mail-star starred" title="Star"><i class="bi bi-star-fill"></i></button>
                        <button type="button" class="mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                    </button>

                    <!-- Mail 2 -->
                    <button type="button" class="mbx-mail unread" data-id="2">
                        <span class="mbx-av" style="background:#16a34a;">GS</span>
                        <span class="mbx-mail-mid">
                            <span class="mbx-mail-top">
                                <span class="mbx-mail-from">GHARUDA Support <span style="color:#9ca3af;font-weight:600;">&lt;support@gharuda-hrms.in&gt;</span></span>
                                <span class="mbx-mail-time">09:05 AM</span>
                            </span>
                            <span class="mbx-mail-subj d-block">Your ticket #4582 has been resolved</span>
                            <span class="mbx-mail-snip d-block">Good news! Your support ticket regarding payroll sync has been resolved. Let us know if you need anything else...</span>
                        </span>
                        <button type="button" class="mbx-mail-star" title="Star"><i class="bi bi-star"></i></button>
                        <button type="button" class="mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                    </button>

                    <!-- Mail 3 -->
                    <button type="button" class="mbx-mail" data-id="3">
                        <span class="mbx-av" style="background:#8b5cf6;">AK</span>
                        <span class="mbx-mail-mid">
                            <span class="mbx-mail-top">
                                <span class="mbx-mail-from">Arun Kumar <span style="color:#9ca3af;font-weight:600;">&lt;arun.kumar@outlook.com&gt;</span></span>
                                <span class="mbx-mail-time">Yesterday</span>
                            </span>
                            <span class="mbx-mail-subj d-block">Site visit confirmation — Friday</span>
                            <span class="mbx-mail-snip d-block">Confirmed for Friday 11 AM at the Ambattur site. Please bring the proposal document and previous bill copy...</span>
                        </span>
                        <button type="button" class="mbx-mail-star" title="Star"><i class="bi bi-star"></i></button>
                        <button type="button" class="mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                    </button>

                    <!-- Mail 4 -->
                    <button type="button" class="mbx-mail" data-id="4">
                        <span class="mbx-av" style="background:#d97706;">LP</span>
                        <span class="mbx-mail-mid">
                            <span class="mbx-mail-top">
                                <span class="mbx-mail-from">Lakshmi Pharma <span style="color:#9ca3af;font-weight:600;">&lt;info@lakshmipharma.in&gt;</span></span>
                                <span class="mbx-mail-time">Yesterday</span>
                            </span>
                            <span class="mbx-mail-subj d-block">AMC renewal for inverter units</span>
                            <span class="mbx-mail-snip d-block">We would like to renew the annual maintenance contract for 12 inverter units. Kindly send the renewal invoice...</span>
                        </span>
                        <button type="button" class="mbx-mail-star starred" title="Star"><i class="bi bi-star-fill"></i></button>
                        <button type="button" class="mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                    </button>

                    <!-- Mail 5 -->
                    <button type="button" class="mbx-mail" data-id="5">
                        <span class="mbx-av" style="background:#0d9488;">IE</span>
                        <span class="mbx-mail-mid">
                            <span class="mbx-mail-top">
                                <span class="mbx-mail-from">Indiamart Enquiries <span style="color:#9ca3af;font-weight:600;">&lt;leads@indiamart.com&gt;</span></span>
                                <span class="mbx-mail-time">Mon</span>
                            </span>
                            <span class="mbx-mail-subj d-block">New buyer requirement — solar inverter</span>
                            <span class="mbx-mail-snip d-block">A buyer is looking for 10kW solar inverters, quantity 4. Contact details attached. Respond quickly to win the lead...</span>
                        </span>
                        <button type="button" class="mbx-mail-star" title="Star"><i class="bi bi-star"></i></button>
                        <button type="button" class="mbx-del-btn" title="Move to Trash"><i class="bi bi-trash"></i></button>
                    </button>
                </div>

                <!-- 2. Single Static Detail / Reading View (edha click pannalum orae data va show pannu) -->
                <div id="mbxDetailView" class="mbx-view-pane mbx-pane-padded" style="display:none;">
                    <div class="mbx-read-head">
                        <span class="mbx-av" style="background:#2563eb;">MR</span>
                        <div style="flex:1;min-width:0;">
                            <div class="mbx-read-subj">Solar package quotation request</div>
                            <div class="mbx-read-meta"><b style="color:#374151;">Meena Ramesh</b> &lt;meena@srlakshmi.in&gt; &bull; Today at 10:24 AM</div>
                        </div>
                    </div>
                    <div class="mbx-read-body">
                        <p style="margin:0 0 10px;">Hi team,</p>
                        <p style="margin:0 0 10px;">We are planning a 5kW rooftop solar installation at our Textiles unit located in Ambattur. Please share your latest quotation with the complete GST breakdown, subsidy details, and expected delivery timeline.</p>
                        <p style="margin:0 0 10px;">Also, let us know if a site inspection is required prior to finalizing the proposal. Attached is our preliminary roof layout drawing for your review.</p>
                        <p style="margin:14px 0 6px;">Kind regards,<br><b>Meena Ramesh</b><br><span style="color:#6b7280;font-size:12px;">Head of Procurement &bull; Sri Lakshmi Textiles Pvt Ltd</span></p>
                    </div>
                    <div class="mt-3 pt-3 border-top">
                        <div style="font-size:12px;font-weight:700;color:#6b7280;margin-bottom:8px;"><i class="bi bi-paperclip me-1"></i>1 Attachment</div>
                        <a href="#" class="btn btn-sm btn-light border" style="font-size:12px;border-radius:8px;" onclick="event.preventDefault();alert('Downloading Roof_Layout_Ambattur.pdf...');">
                            <i class="bi bi-file-earmark-pdf-fill text-danger me-1"></i>Roof_Layout_Ambattur.pdf <span class="text-muted">(1.2 MB)</span>
                        </a>
                    </div>
                    <div class="mbx-read-actions">
                        <button type="button" class="btn btn-primary" id="mbxReplyBtn"><i class="bi bi-reply me-1"></i>Reply</button>
                        <button type="button" class="btn btn-outline-secondary" id="mbxForwardBtn"><i class="bi bi-arrow-right me-1"></i>Forward</button>
                        <button type="button" class="btn btn-outline-danger" id="mbxDetailDeleteBtn"><i class="bi bi-trash me-1"></i>Delete</button>
                    </div>
                </div>

                <!-- 3. Compose View (Static HTML) -->
                <div id="mbxComposeView" class="mbx-view-pane mbx-pane-padded" style="display:none;">
                    <div class="mbx-field"><label>To</label><input type="email" class="form-control" id="mbxTo" placeholder="recipient@example.com"></div>
                    <div class="mbx-field"><label>CC</label><input type="email" class="form-control" id="mbxCc" placeholder="cc@example.com"></div>
                    <div class="mbx-field"><label>Subject</label><input type="text" class="form-control" id="mbxSubject" placeholder="Email subject"></div>
                    <div class="mbx-field"><label>Message</label><div class="mbx-quill-wrap"><div id="mbxQuill"></div></div></div>
                    <div class="mbx-field"><label>Attachment</label><div class="mbx-attach-row" id="mbxAttachWrap">
                        <input type="file" class="form-control" multiple>
                        <button type="button" class="mbx-add-file" id="mbxAddFile" title="Add more attachments"><i class="bi bi-plus-lg"></i></button>
                    </div></div>
                    <div class="mbx-compose-footer">
                        <button type="button" class="btn btn-outline-secondary" id="mbxDraftBtn"><i class="bi bi-file-earmark me-1"></i>Save as draft</button>
                        <button type="button" class="btn btn-primary" id="mbxSendBtn"><i class="bi bi-send me-1"></i>Send</button>
                    </div>
                </div>

                <!-- 4. Settings View (Static HTML) -->
                <div id="mbxSettingView" class="mbx-view-pane mbx-pane-padded" style="display:none;">
                    <div class="mbx-set-card">
                        <h6><i class="bi bi-arrow-up-right-circle" style="color:var(--primary);"></i>Outgoing Emails(SMTP)</h6>
                        <div class="row g-3">
                            <div class="col-md-6"><div class="mbx-field"><label>SMTP Server address</label><input class="form-control" id="mbxSmtpHost" placeholder="smtp.gmail.com" style="font-size:13px;"></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>SMTP Encryption</label><select class="form-select" id="mbxSmtpEnc" style="font-size:13px;"><option value="">Non selected</option><option selected>TLS</option><option>SSL</option><option>STARTTLS</option></select></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>SMTP User name</label><input class="form-control" id="mbxSmtpUser" value="info@ghratechnology.com" style="font-size:13px;background:#eef4fb;"></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>SMTP Password</label><input type="password" class="form-control" id="mbxSmtpPass" value="ghratech" style="font-size:13px;background:#eef4fb;"></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>SMTP port</label><input class="form-control" id="mbxSmtpPort" value="587" placeholder="587" style="font-size:13px;"></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>SMTP From name</label><input class="form-control" id="mbxSmtpFrom" value="GHARUDA HRMS" placeholder="" style="font-size:13px;"></div></div>
                        </div>
                        <div class="mbx-radio-row">
                            <span class="mbx-radio-label"><i class="bi bi-question-circle-fill" style="color:var(--primary);"></i> Is SMTP</span>
                            <label class="mbx-radio"><input type="radio" name="mbxIsSmtp" value="yes" checked> Yes</label>
                            <label class="mbx-radio"><input type="radio" name="mbxIsSmtp" value="no"> No</label>
                        </div>
                    </div>
                    <div class="mbx-set-card">
                        <h6><i class="bi bi-arrow-down-left-circle" style="color:var(--primary);"></i>Incoming Emails(IMAP)</h6>
                        <div class="row g-3">
                            <div class="col-md-6"><div class="mbx-field"><label>IMAP Server address</label><input class="form-control" id="mbxImapHost" placeholder="imap.gmail.com" style="font-size:13px;"></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>IMAP Encryption</label><select class="form-select" id="mbxImapEnc" style="font-size:13px;"><option value="">Non selected</option><option selected>SSL</option><option>TLS</option><option>STARTTLS</option></select></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>IMAP User name</label><input class="form-control" id="mbxImapUser" value="info@ghratechnology.com" placeholder="" style="font-size:13px;"></div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>IMAP Password</label><input type="password" class="form-control" id="mbxImapPass" value="••••••••" placeholder="" style="font-size:13px;"></div></div>
                            <div class="col-md-6"><div class="mbx-radio-row mt-1">
                                <span class="mbx-radio-label"><i class="bi bi-question-circle-fill" style="color:var(--primary);"></i> Is IMAP</span>
                                <label class="mbx-radio"><input type="radio" name="mbxIsImap" value="yes" checked> Yes</label>
                                <label class="mbx-radio"><input type="radio" name="mbxIsImap" value="no"> No</label>
                            </div></div>
                            <div class="col-md-6"><div class="mbx-field"><label>IMAP port</label><input class="form-control" id="mbxImapPort" value="993" style="font-size:13px;"></div></div>
                        </div>
                    </div>
                    <div class="mbx-compose-footer"><button type="button" class="btn btn-primary" id="mbxSetSave">Save</button></div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
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
</script>

<?php include 'footer.php'; ?>
