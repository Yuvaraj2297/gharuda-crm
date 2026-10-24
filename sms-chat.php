<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/sms-chat.css">



<div class="sms-page">

    <!-- Title row -->
    <div class="sms-title-row">
        <h5><i class="bi bi-chat-dots me-2" style="color:var(--primary);"></i>SMS</h5>
    </div>

    <div class="sms-shell">

        <!-- ===== Sidebar : contacts ===== -->
        <div class="sms-side">
            <div class="sms-side-head">
                <span class="sms-logo">GHRA</span>
                <span class="sms-org">GHARUDA SOFTWARE</span>
            </div>

            <div class="sms-search-row">
                <div class="sms-search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="text" class="sms-search-input" id="smsSearch" placeholder="Search contacts...">
                </div>
                <div class="dropdown sms-type-dd">
                    <button type="button" class="sms-type-btn" id="smsTypeBtn" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">All <i class="bi bi-chevron-down" style="font-size:9px;"></i></button>
                    <ul class="dropdown-menu sms-type-menu">
                        <li><button type="button" class="sms-type-item active" data-val="all">All</button></li>
                        <li><button type="button" class="sms-type-item" data-val="answered">Answered</button></li>
                        <li><button type="button" class="sms-type-item" data-val="unanswered">Unanswered</button></li>
                    </ul>
                </div>
            </div>

            <div class="sms-tabs" id="smsTabs">
                <button type="button" class="sms-tab active" data-tab="lead"><i class="bi bi-person-plus"></i>Leads <span class="sms-tab-count">5</span></button>
                <button type="button" class="sms-tab" data-tab="customer"><i class="bi bi-people"></i>Customers <span class="sms-tab-count">3</span></button>
            </div>

            <div class="sms-contacts" id="smsContacts">
                <!-- Static Contact 1 -->
                <button type="button" class="sms-contact active" data-id="171" data-type="lead" data-name="MOHAN" data-phone="9677063368">
                    <span class="sms-avatar" style="background:#2563eb;">MO</span>
                    <span>
                        <span class="sms-c-name">MOHAN <span class="sms-c-chip">Lead</span></span>
                        <span class="sms-c-phone d-block">9677063368</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">2 min ago</span>
                        <span class="sms-c-unread">2</span>
                    </span>
                </button>

                <!-- Static Contact 2 -->
                <button type="button" class="sms-contact" data-id="170" data-type="lead" data-name="Test" data-phone="9807456321">
                    <span class="sms-avatar" style="background:#8b5cf6;">TE</span>
                    <span>
                        <span class="sms-c-name">Test <span class="sms-c-chip">Lead</span></span>
                        <span class="sms-c-phone d-block">9807456321</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">1 hr ago</span>
                    </span>
                </button>

                <!-- Static Contact 3 -->
                <button type="button" class="sms-contact" data-id="168" data-type="customer" data-name="Sundar" data-phone="9876543210">
                    <span class="sms-avatar" style="background:#0d9488;">SU</span>
                    <span>
                        <span class="sms-c-name">Sundar <span class="sms-c-chip">Cust</span></span>
                        <span class="sms-c-phone d-block">9876543210</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">3 hrs ago</span>
                    </span>
                </button>

                <!-- Static Contact 4 -->
                <button type="button" class="sms-contact" data-id="166" data-type="customer" data-name="Suresh" data-phone="9876543218">
                    <span class="sms-avatar off" style="background:#d97706;">SU</span>
                    <span>
                        <span class="sms-c-name">Suresh <span class="sms-c-chip">Cust</span></span>
                        <span class="sms-c-phone d-block">9876543218</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">Yesterday</span>
                    </span>
                </button>

                <!-- Static Contact 5 -->
                <button type="button" class="sms-contact" data-id="118" data-type="lead" data-name="Priya Sundar" data-phone="9840011223">
                    <span class="sms-avatar off" style="background:#e11d48;">PS</span>
                    <span>
                        <span class="sms-c-name">Priya Sundar <span class="sms-c-chip">Lead</span></span>
                        <span class="sms-c-phone d-block">9840011223</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">2 days ago</span>
                    </span>
                </button>

                <!-- Static Contact 6 -->
                <button type="button" class="sms-contact" data-id="119" data-type="lead" data-name="Test Lead" data-phone="NA">
                    <span class="sms-avatar off" style="background:#64748b;">TL</span>
                    <span>
                        <span class="sms-c-name">Test Lead <span class="sms-c-chip">Lead</span></span>
                        <span class="sms-c-phone d-block">NA</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">3 days ago</span>
                    </span>
                </button>

                <!-- Static Contact 7 -->
                <button type="button" class="sms-contact" data-id="117" data-type="customer" data-name="test Java" data-phone="NA">
                    <span class="sms-avatar off" style="background:#7c3aed;">TJ</span>
                    <span>
                        <span class="sms-c-name">test Java <span class="sms-c-chip">Cust</span></span>
                        <span class="sms-c-phone d-block">NA</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">1 wk ago</span>
                    </span>
                </button>

                <!-- Static Contact 8 -->
                <button type="button" class="sms-contact" data-id="116" data-type="lead" data-name="Hello" data-phone="NA">
                    <span class="sms-avatar off" style="background:#059669;">HE</span>
                    <span>
                        <span class="sms-c-name">Hello <span class="sms-c-chip">Lead</span></span>
                        <span class="sms-c-phone d-block">NA</span>
                    </span>
                    <span class="sms-c-last">
                        <span class="sms-c-time d-block">2 wks ago</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- ===== Chat panel ===== -->
        <div class="sms-chat">
            <div class="sms-chat-head" id="smsChatHead">
                <span class="sms-avatar" id="smsHeadAvatar" style="background:#2563eb;">MO</span>
                <div>
                    <div class="sms-chat-name" id="smsHeadName">MOHAN</div>
                    <div class="sms-chat-phone" id="smsHeadPhone">9677063368 &bull; Lead</div>
                </div>
                <div class="sms-chat-actions">
                    <a href="tel:9677063368" class="sms-head-btn" title="Call"><i class="bi bi-telephone-fill"></i></a>
                </div>
            </div>

            <div class="sms-messages" id="smsMessages">
                <div class="sms-date-sep">Today</div>
                <div class="sms-msg in">
                    <span class="sms-bubble">Hello, have you sent the quotation details?</span>
                    <span class="sms-msg-time">10:02 AM</span>
                </div>
                <div class="sms-msg out">
                    <span class="sms-bubble">Hello MOHAN, I am sending it now. Please wait a moment.</span>
                    <span class="sms-msg-time">10:05 AM <i class="bi bi-check2-all"></i></span>
                </div>
                <div class="sms-msg in">
                    <span class="sms-bubble">OK sir, thank you.</span>
                    <span class="sms-msg-time">10:06 AM</span>
                </div>
                <div class="sms-msg out">
                    <span class="sms-bubble">You're welcome! Please let us know if any modifications are needed.</span>
                    <span class="sms-msg-time">10:08 AM <i class="bi bi-check2-all"></i></span>
                </div>
            </div>

            <div class="sms-input-bar" id="smsInputBar">
                <textarea id="smsInput" rows="1" placeholder="Write your message here..."></textarea>
                <button type="button" class="sms-send-btn" id="smsSendBtn" title="Send"><i class="bi bi-send-fill"></i></button>
            </div>
        </div>

    </div>
</div>

<script>
    (function () {
        'use strict';

        var contactBtns = document.querySelectorAll('.sms-contact');
        var tabBtns = document.querySelectorAll('#smsTabs .sms-tab');
        var searchInput = document.getElementById('smsSearch');
        var typeItems = document.querySelectorAll('.sms-type-item');
        var typeBtn = document.getElementById('smsTypeBtn');
        var sendBtn = document.getElementById('smsSendBtn');
        var msgInput = document.getElementById('smsInput');
        var messagesBox = document.getElementById('smsMessages');

        var currentTab = 'lead';

        function filterContacts() {
            var query = searchInput ? searchInput.value.trim().toLowerCase() : '';
            contactBtns.forEach(function (btn) {
                var type = btn.getAttribute('data-type');
                var name = (btn.getAttribute('data-name') || '').toLowerCase();
                var phone = (btn.getAttribute('data-phone') || '').toLowerCase();
                var tabMatch = (currentTab === 'all' || type === currentTab);
                var searchMatch = !query || name.includes(query) || phone.includes(query);
                btn.style.display = (tabMatch && searchMatch) ? 'flex' : 'none';
            });
        }

        /* Whichever contact is clicked: show same static chat data, mark active, clear unread */
        contactBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                contactBtns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');
                var unread = btn.querySelector('.sms-c-unread');
                if (unread) unread.remove();
            });
        });

        /* Tab switcher (Leads / Customers) */
        tabBtns.forEach(function (tab) {
            tab.addEventListener('click', function () {
                tabBtns.forEach(function (t) { t.classList.remove('active'); });
                tab.classList.add('active');
                currentTab = tab.getAttribute('data-tab');
                filterContacts();
            });
        });

        /* Search input */
        if (searchInput) {
            searchInput.addEventListener('input', filterContacts);
        }

        /* Type filter menu (All / Answered / Unanswered) */
        typeItems.forEach(function (item) {
            item.addEventListener('click', function () {
                typeItems.forEach(function (i) { i.classList.remove('active'); });
                item.classList.add('active');
                if (typeBtn) {
                    typeBtn.innerHTML = item.textContent.trim() + ' <i class="bi bi-chevron-down" style="font-size:9px;"></i>';
                    if (typeof bootstrap !== 'undefined') {
                        bootstrap.Dropdown.getOrCreateInstance(typeBtn).hide();
                    }
                }
            });
        });

        /* Send message */
        function sendMessage() {
            if (!msgInput || !messagesBox) return;
            var text = msgInput.value.trim();
            if (!text) return;

            var now = new Date();
            var h = now.getHours(), m = now.getMinutes();
            var ampm = h >= 12 ? 'PM' : 'AM';
            h = h % 12 || 12;
            var timeStr = ('0' + h).slice(-2) + ':' + ('0' + m).slice(-2) + ' ' + ampm;

            var outBubble = document.createElement('div');
            outBubble.className = 'sms-msg out';
            outBubble.innerHTML = '<span class="sms-bubble">' + text.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '</span>' +
                '<span class="sms-msg-time">' + timeStr + ' <i class="bi bi-check2-all"></i></span>';
            messagesBox.appendChild(outBubble);

            msgInput.value = '';
            msgInput.style.height = 'auto';
            messagesBox.scrollTop = messagesBox.scrollHeight;

            /* Friendly auto-ack */
            setTimeout(function () {
                var inBubble = document.createElement('div');
                inBubble.className = 'sms-msg in';
                inBubble.innerHTML = '<span class="sms-bubble">✓ Message received — thank you!</span>' +
                    '<span class="sms-msg-time">' + timeStr + '</span>';
                messagesBox.appendChild(inBubble);
                messagesBox.scrollTop = messagesBox.scrollHeight;
            }, 800);
        }

        if (sendBtn) {
            sendBtn.addEventListener('click', sendMessage);
        }
        if (msgInput) {
            msgInput.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });
            msgInput.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = Math.min(this.scrollHeight, 110) + 'px';
            });
        }

        /* Initial filter by active tab */
        filterContacts();
    })();
</script>

<?php include 'footer.php'; ?>
