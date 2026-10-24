<?php include 'header.php'; ?>

<link rel="stylesheet" href="./assets/css/whatsapp.css">



<div class="wa-page">

    <!-- Title row -->
    <div class="wa-title-row">
        <h5><i class="bi bi-whatsapp me-2" style="color:#16a34a;"></i>WhatsApp</h5>
        <span class="wa-connected"><span class="pulse"></span>WhatsApp Connected</span>
    </div>

    <div class="wa-shell">

        <!-- ===== Sidebar ===== -->
        <div class="wa-side">
            <div class="wa-side-head">
                <span class="wa-logo"><i class="bi bi-whatsapp"></i></span>
                <span>
                    <span class="wa-org">GHARUDA SOFTWARE</span>
                    <span class="wa-org-sub">WhatsApp Business</span>
                </span>
            </div>

            <div class="wa-search-row">
                <div class="wa-search-wrap">
                    <i class="bi bi-search"></i>
                    <input type="text" class="wa-search-input" id="waSearch" placeholder="Search contacts...">
                </div>
                <div class="dropdown wa-type-dd">
                    <button type="button" class="wa-type-btn" id="waTypeBtn" data-bs-toggle="dropdown" data-bs-popper-config='{"strategy":"fixed"}' aria-expanded="false">All <i class="bi bi-chevron-down" style="font-size:9px;"></i></button>
                    <ul class="dropdown-menu wa-type-menu">
                        <li><button type="button" class="wa-type-item active" data-val="all">All</button></li>
                        <li><button type="button" class="wa-type-item" data-val="answered">Answered</button></li>
                        <li><button type="button" class="wa-type-item" data-val="unanswered">Unanswered</button></li>
                    </ul>
                </div>
            </div>

            <div class="wa-tabs" id="waTabs">
                <button type="button" class="wa-tab active" data-tab="lead"><i class="bi bi-person-plus"></i>Leads <span class="wa-tab-count">4</span></button>
                <button type="button" class="wa-tab" data-tab="customer"><i class="bi bi-people"></i>Customers <span class="wa-tab-count">2</span></button>
                <button type="button" class="wa-tab" data-tab="internal"><i class="bi bi-person-badge"></i>Internals <span class="wa-tab-count">2</span></button>
            </div>

            <div class="wa-contacts" id="waContacts">
                <!-- Static Contact 1 -->
                <button type="button" class="wa-contact active" data-id="1" data-type="lead" data-name="Kumar" data-phone="9876543211">
                    <span class="wa-avatar" style="background:#2563eb;">KU</span>
                    <span>
                        <span class="wa-c-name">Kumar <span class="wa-c-chip lead">Lead</span></span>
                        <span class="wa-c-phone d-block">9876543211</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">1 hr ago</span>
                        <span class="wa-c-unread">2</span>
                    </span>
                </button>

                <!-- Static Contact 2 -->
                <button type="button" class="wa-contact" data-id="2" data-type="lead" data-name="Tezt" data-phone="7410852963">
                    <span class="wa-avatar off" style="background:#8b5cf6;">TE</span>
                    <span>
                        <span class="wa-c-name">Tezt <span class="wa-c-chip lead">Lead</span></span>
                        <span class="wa-c-phone d-block">7410852963</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">3 hrs ago</span>
                    </span>
                </button>

                <!-- Static Contact 3 -->
                <button type="button" class="wa-contact" data-id="3" data-type="customer" data-name="Sundar" data-phone="9876543210">
                    <span class="wa-avatar" style="background:#0d9488;">SU</span>
                    <span>
                        <span class="wa-c-name">Sundar <span class="wa-c-chip cust">Cust</span></span>
                        <span class="wa-c-phone d-block">9876543210</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">2 min ago</span>
                    </span>
                </button>

                <!-- Static Contact 4 -->
                <button type="button" class="wa-contact" data-id="4" data-type="customer" data-name="Sundar" data-phone="9500076041">
                    <span class="wa-avatar" style="background:#d97706;">SU</span>
                    <span>
                        <span class="wa-c-name">Sundar <span class="wa-c-chip cust">Cust</span></span>
                        <span class="wa-c-phone d-block">9500076041</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">Yesterday</span>
                    </span>
                </button>

                <!-- Static Contact 5 -->
                <button type="button" class="wa-contact" data-id="5" data-type="lead" data-name="Suresh" data-phone="9874561598">
                    <span class="wa-avatar off" style="background:#e11d48;">SU</span>
                    <span>
                        <span class="wa-c-name">Suresh <span class="wa-c-chip lead">Lead</span></span>
                        <span class="wa-c-phone d-block">9874561598</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">Yesterday</span>
                    </span>
                </button>

                <!-- Static Contact 6 -->
                <button type="button" class="wa-contact" data-id="6" data-type="internal" data-name="ghra shalu" data-phone="9788096533">
                    <span class="wa-avatar" style="background:#7c3aed;">GS</span>
                    <span>
                        <span class="wa-c-name">ghra shalu <span class="wa-c-chip int">Staff</span></span>
                        <span class="wa-c-phone d-block">9788096533</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">2 days ago</span>
                    </span>
                </button>

                <!-- Static Contact 7 -->
                <button type="button" class="wa-contact" data-id="7" data-type="internal" data-name="Priya (Staff)" data-phone="9840011223">
                    <span class="wa-avatar off" style="background:#0ea5e9;">PS</span>
                    <span>
                        <span class="wa-c-name">Priya (Staff) <span class="wa-c-chip int">Staff</span></span>
                        <span class="wa-c-phone d-block">9840011223</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">3 days ago</span>
                    </span>
                </button>

                <!-- Static Contact 8 -->
                <button type="button" class="wa-contact" data-id="8" data-type="lead" data-name="Vasanth" data-phone="09003247271">
                    <span class="wa-avatar off" style="background:#059669;">VA</span>
                    <span>
                        <span class="wa-c-name">Vasanth <span class="wa-c-chip lead">Lead</span></span>
                        <span class="wa-c-phone d-block">09003247271</span>
                    </span>
                    <span class="wa-c-last">
                        <span class="wa-c-time d-block">1 wk ago</span>
                    </span>
                </button>
            </div>
        </div>

        <!-- ===== Chat panel ===== -->
        <div class="wa-chat">
            <div class="wa-chat-head" id="waChatHead">
                <span class="wa-avatar" id="waHeadAvatar" style="background:#2563eb;">KU</span>
                <div>
                    <div class="wa-chat-name" id="waHeadName">Kumar</div>
                    <div class="wa-chat-phone" id="waHeadPhone">9876543211 &bull; Lead</div>
                </div>
                <div class="wa-chat-actions">
                    <a href="tel:9876543211" class="wa-head-btn" title="Call"><i class="bi bi-telephone-fill"></i></a>
                </div>
            </div>

            <div class="wa-messages" id="waMessages">
                <div class="wa-date-sep">Today</div>
                <div class="wa-msg out">
                    <span class="wa-bubble">Our new solar package offer is live, would you like the details?</span>
                    <span class="wa-msg-time">09:10 AM <i class="bi bi-check2-all" style="color:#53bdeb;"></i></span>
                </div>
                <div class="wa-msg in">
                    <span class="wa-bubble">Yes please, send me the brochure and warranty info.</span>
                    <span class="wa-msg-time">09:32 AM</span>
                </div>
                <div class="wa-msg out">
                    <span class="wa-bubble">Sent! Please find the brochure above. Let me know if you would like to schedule a site inspection.</span>
                    <span class="wa-msg-time">09:35 AM <i class="bi bi-check2-all" style="color:#53bdeb;"></i></span>
                </div>
                <div class="wa-msg in">
                    <span class="wa-bubble">Thank you, reviewing it now.</span>
                    <span class="wa-msg-time">09:40 AM</span>
                </div>
            </div>

            <div class="wa-input-bar" id="waInputBar">
                <button type="button" class="wa-emoji-btn" title="Attach"><i class="bi bi-paperclip"></i></button>
                <textarea id="waInput" rows="1" placeholder="Type a message"></textarea>
                <button type="button" class="wa-send-btn" id="waSendBtn" title="Send"><i class="bi bi-send-fill"></i></button>
            </div>
        </div>

    </div>
</div>


<script>
    (function () {
        'use strict';

        var contactBtns = document.querySelectorAll('.wa-contact');
        var tabBtns = document.querySelectorAll('#waTabs .wa-tab');
        var searchInput = document.getElementById('waSearch');
        var typeItems = document.querySelectorAll('.wa-type-item');
        var typeBtn = document.getElementById('waTypeBtn');
        var sendBtn = document.getElementById('waSendBtn');
        var msgInput = document.getElementById('waInput');
        var messagesBox = document.getElementById('waMessages');

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
                var unread = btn.querySelector('.wa-c-unread');
                if (unread) unread.remove();
            });
        });

        /* Tab switcher (Leads / Customers / Internals) */
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

        /* Send WhatsApp message */
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
            outBubble.className = 'wa-msg out';
            outBubble.innerHTML = '<span class="wa-bubble">' + text.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '</span>' +
                '<span class="wa-msg-time">' + timeStr + ' <i class="bi bi-check2-all" style="color:#53bdeb;"></i></span>';
            messagesBox.appendChild(outBubble);

            msgInput.value = '';
            msgInput.style.height = 'auto';
            messagesBox.scrollTop = messagesBox.scrollHeight;

            /* Friendly auto-ack */
            setTimeout(function () {
                var inBubble = document.createElement('div');
                inBubble.className = 'wa-msg in';
                inBubble.innerHTML = '<span class="wa-bubble">✓ Message received — thank you!</span>' +
                    '<span class="wa-msg-time">' + timeStr + '</span>';
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
