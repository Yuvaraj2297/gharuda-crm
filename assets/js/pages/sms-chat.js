/**
 * Gharuda CRM - Sms Chat Page Script
 * File: assets/js/pages/sms-chat.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
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
                contactBtns.forEach(function (b) { 
                    b.classList.remove('active'); 
                    b.style.backgroundColor = 'transparent';
                });
                btn.classList.add('active');
                btn.style.backgroundColor = '#eafaf1';
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
            outBubble.className = 'sms-msg out d-flex flex-column align-items-end mb-2';
            outBubble.innerHTML = '<span class="sms-bubble p-2 px-3 rounded-3 bg-primary text-white shadow-sm" style="max-width: 75%;">' + text.replace(/</g, '&lt;').replace(/>/g, '&gt;') + '</span>' +
                '<span class="sms-msg-time small text-muted mt-1" style="font-size:11px;">' + timeStr + ' <i class="bi bi-check2-all text-primary"></i></span>';
            messagesBox.appendChild(outBubble);

            msgInput.value = '';
            msgInput.style.height = 'auto';
            messagesBox.scrollTop = messagesBox.scrollHeight;

            /* Friendly auto-ack */
            setTimeout(function () {
                var inBubble = document.createElement('div');
                inBubble.className = 'sms-msg in d-flex flex-column align-items-start mb-2';
                inBubble.innerHTML = '<span class="sms-bubble p-2 px-3 rounded-3 bg-white shadow-sm border text-dark" style="max-width: 75%;">✓ Message received — thank you!</span>' +
                    '<span class="sms-msg-time small text-muted mt-1" style="font-size:11px;">' + timeStr + '</span>';
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
