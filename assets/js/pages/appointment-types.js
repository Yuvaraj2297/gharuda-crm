/**
 * Gharuda CRM - Appointment Types Page Script
 * File: assets/js/pages/appointment-types.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function() {
        'use strict';

        var COLORS = [
            { name: 'Green', hex: '#16a34a' },
            { name: 'Teal', hex: '#0d9488' },
            { name: 'Cyan', hex: '#06b6d4' },
            { name: 'Blue', hex: '#2563eb' },
            { name: 'Violet', hex: '#7c3aed' },
            { name: 'Pink', hex: '#db2777' },
            { name: 'Maroon', hex: '#9f1239' },
            { name: 'Red', hex: '#dc2626' },
            { name: 'Amber', hex: '#f59e0b' },
            { name: 'Slate', hex: '#64748b' }
        ];

        /* Reference la irundha default types (name + code + colour) */
        var DEFAULT_TYPES = [
            { name: 'SD - Online Demo', code: '#079823', color: '#16a34a' },
            { name: 'SD - Direct Visit - lead', code: '#0c9cb9', color: '#0d9488' },
            { name: 'DEV - Direct Visit - customer', code: '#970202', color: '#9f1239' },
            { name: 'DEV - Customer visit - GHARUDA', code: '#0b1ea7', color: '#2563eb' },
            { name: 'DEV - Online Demo - Customer', code: '#ea002f', color: '#dc2626' },
            { name: 'SD - GHARUDA Visit', code: '#00bcc4', color: '#06b6d4' }
        ];

        var grid = document.getElementById('aptGrid');
        var emptyEl = document.getElementById('aptEmpty');
        var countEl = document.getElementById('aptTypeCount');

        var types = [];
        var nextId = 1;

        function esc(s) {
            return String(s == null ? '' : s)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        function itemHtml(t) {
            return '<div class="apt-item" data-id="' + t.id + '">' +
                '<input type="text" class="apt-name" value="' + esc(t.name) + '" placeholder="Appointment type name" spellcheck="false" autocomplete="off">' +
                '<div class="apt-row">' +
                '<input type="text" class="apt-code" value="' + esc(t.code) + '" placeholder="#000000" spellcheck="false" autocomplete="off">' +
                '<button type="button" class="apt-color-btn" data-act="color" title="' + colorMeta(t.color).name + '">' +
                '<span class="apt-swatch" style="background:' + esc(t.color) + ';"></span></button>' +
                '<button type="button" class="apt-del" title="Remove" data-act="del">' +
                '<i class="bi bi-x-lg"></i></button>' +
                '</div>' +
                '</div>';
        }

        function updateMeta() {
            countEl.textContent = types.length;
            emptyEl.classList.toggle('show', types.length === 0);
        }

        function render() {
            closeColorMenu();
            grid.innerHTML = types.map(itemHtml).join('');
            updateMeta();
        }

        function addType(t) {
            types.push(t);
            grid.insertAdjacentHTML('beforeend', itemHtml(t));
            updateMeta();
        }

        /* ---------------- Grid interactions (delegated) ---------------- */
        grid.addEventListener('input', function(e) {
            var input = e.target.closest('.apt-name, .apt-code');
            if (!input) return;
            var item = input.closest('.apt-item');
            var t = types.filter(function(x) { return x.id === Number(item.getAttribute('data-id')); })[0];
            if (!t) return;
            if (input.classList.contains('apt-name')) {
                t.name = input.value;
            } else {
                t.code = input.value;
            }
            item.classList.remove('has-error');
        });

        /* Typing mudinja appuram '#' prefix illa na auto add pandrom */
        grid.addEventListener('blur', function(e) {
            var input = e.target.closest('.apt-code');
            if (!input) return;
            var v = input.value.trim();
            if (v && v.charAt(0) !== '#') {
                v = '#' + v;
                input.value = v;
            }
            var item = input.closest('.apt-item');
            var t = types.filter(function(x) { return x.id === Number(item.getAttribute('data-id')); })[0];
            if (t) t.code = v;
        }, true);

        /* ---------------- Colour popover (native select illa) ---------------- */
        var colorMenuEl = document.getElementById('aptColorMenu');
        var colorMenuGrid = document.getElementById('aptColorMenuGrid');
        var colorMenuItem = null;

        function colorMenuItemId() {
            return colorMenuItem ? Number(colorMenuItem.getAttribute('data-id')) : null;
        }

        function openColorMenu(btn) {
            colorMenuItem = btn.closest('.apt-item');
            var current = (types.filter(function(x) { return x.id === colorMenuItemId(); })[0] || {}).color || '';

            colorMenuGrid.innerHTML = COLORS.map(function(c) {
                return '<button type="button" class="opt' + (c.hex === current ? ' active' : '') + '"' +
                    ' data-color="' + c.hex + '" title="' + c.name + '" style="background:' + c.hex + ';">' +
                    '<i class="bi bi-check-lg"></i></button>';
            }).join('');

            colorMenuEl.classList.add('show');
            btn.classList.add('menu-open');

            /* Position — keezhe space illa na mela open aagum */
            var r = btn.getBoundingClientRect();
            var w = colorMenuEl.offsetWidth;
            var h = colorMenuEl.offsetHeight;
            var left = Math.max(8, Math.min(r.left, window.innerWidth - w - 8));
            var top = r.bottom + 6;
            if (top + h > window.innerHeight - 8) top = Math.max(8, r.top - h - 6);
            colorMenuEl.style.left = left + 'px';
            colorMenuEl.style.top = top + 'px';
        }

        function closeColorMenu() {
            if (!colorMenuEl) return;
            colorMenuEl.classList.remove('show');
            if (colorMenuItem) {
                var btn = colorMenuItem.querySelector('.apt-color-btn');
                if (btn) btn.classList.remove('menu-open');
            }
            colorMenuItem = null;
        }

        colorMenuGrid.addEventListener('click', function(e) {
            var opt = e.target.closest('.opt');
            if (!opt || !colorMenuItem) return;
            var hex = opt.getAttribute('data-color');
            var t = types.filter(function(x) { return x.id === colorMenuItemId(); })[0];
            if (t) t.color = hex;

            var btn = colorMenuItem.querySelector('.apt-color-btn');
            if (btn) {
                btn.querySelector('.apt-swatch').style.background = hex;
                btn.title = colorMeta(hex).name;
            }
            closeColorMenu();
        });

        document.addEventListener('click', function(e) {
            if (!colorMenuEl || !colorMenuEl.classList.contains('show')) return;
            if (e.target.closest('#aptColorMenu') || e.target.closest('[data-act="color"]')) return;
            closeColorMenu();
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeColorMenu();
        });

        window.addEventListener('resize', closeColorMenu);
        /* Scroll pannina popover-oda row position maarum — adhanala close pandrom */
        window.addEventListener('scroll', closeColorMenu, true);

        /* ---------------- Grid actions (delegated) ---------------- */
        grid.addEventListener('click', function(e) {
            var colorBtn = e.target.closest('[data-act="color"]');
            if (colorBtn) {
                var sameItem = colorMenuItem === colorBtn.closest('.apt-item');
                closeColorMenu();
                if (!sameItem) openColorMenu(colorBtn);
                return;
            }

            var btn = e.target.closest('[data-act="del"]');
            if (!btn) return;
            closeColorMenu();
            var item = btn.closest('.apt-item');
            var id = Number(item.getAttribute('data-id'));
            var t = types.filter(function(x) { return x.id === id; })[0];
            types = types.filter(function(x) { return x.id !== id; });
            item.remove();
            updateMeta();
            showToast((t ? (t.name || t.code) : 'Appointment type') + ' removed');
        });

        /* ---------------- Add modal (name + colour picker) ---------------- */
        var aptModalEl = document.getElementById('aptModal');
        var aptModal = null;
        var pickedColor = COLORS[0].hex;

        function getAptModal() {
            if (!aptModal && aptModalEl && typeof bootstrap !== 'undefined') {
                aptModal = bootstrap.Modal.getOrCreateInstance(aptModalEl);
            }
            return aptModal;
        }

        function colorMeta(hex) {
            return COLORS.filter(function(c) { return c.hex === hex; })[0] || COLORS[0];
        }

        function syncPicked() {
            var c = colorMeta(pickedColor);
            document.getElementById('aptPickedSwatch').style.background = c.hex;
            document.getElementById('aptPickedName').textContent = c.name;
            document.getElementById('aptPickedHex').textContent = c.hex;
        }

        function renderPicker() {
            document.getElementById('aptPicker').innerHTML = COLORS.map(function(c) {
                return '<button type="button" class="apt-pick' + (c.hex === pickedColor ? ' active' : '') + '"' +
                    ' data-color="' + c.hex + '" title="' + c.name + '" style="background:' + c.hex + ';">' +
                    '<i class="bi bi-check-lg"></i></button>';
            }).join('');
            syncPicked();
        }

        document.getElementById('aptAddBtn').addEventListener('click', function() {
            /* Next unused colour-a default-a pick pandrom */
            pickedColor = COLORS[types.length % COLORS.length].hex;
            var nameInput = document.getElementById('aptNewName');
            nameInput.value = '';
            nameInput.classList.remove('is-invalid');
            renderPicker();
            getAptModal().show();
        });

        document.getElementById('aptPicker').addEventListener('click', function(e) {
            var btn = e.target.closest('.apt-pick');
            if (!btn) return;
            pickedColor = btn.getAttribute('data-color');
            this.querySelectorAll('.apt-pick').forEach(function(b) { b.classList.remove('active'); });
            btn.classList.add('active');
            syncPicked();
        });

        document.getElementById('aptModalSubmit').addEventListener('click', function() {
            var nameInput = document.getElementById('aptNewName');
            var name = nameInput.value.trim();

            if (!name) {
                nameInput.classList.add('is-invalid');
                nameInput.focus();
                showToast('Please enter the appointment type name');
                return;
            }

            /* Code — reference la irukkura maari colour hex-e aagum */
            addType({ id: nextId++, name: name, code: pickedColor, color: pickedColor });
            getAptModal().hide();
            showToast(name + ' added');
        });

        if (aptModalEl) {
            aptModalEl.addEventListener('shown.bs.modal', function() {
                document.getElementById('aptNewName').focus();
            });
            aptModalEl.addEventListener('hidden.bs.modal', function() {
                var nameInput = document.getElementById('aptNewName');
                nameInput.value = '';
                nameInput.classList.remove('is-invalid');
            });
        }

        /* ---------------- Submit / Reset ---------------- */
        document.getElementById('aptSubmitBtn').addEventListener('click', function() {
            var items = grid.querySelectorAll('.apt-item');
            var firstBad = null;

            Array.prototype.forEach.call(items, function(item) {
                var nameEl = item.querySelector('.apt-name');
                var codeEl = item.querySelector('.apt-code');
                var nameOk = !!nameEl.value.trim();
                var codeOk = !!codeEl.value.trim();

                item.classList.toggle('has-error', !nameOk || !codeOk);
                if ((!nameOk || !codeOk) && !firstBad) firstBad = nameOk ? codeEl : nameEl;
            });

            if (firstBad) {
                firstBad.focus();
                showToast('Please fill in every appointment type name and code');
                return;
            }
            if (!types.length) {
                showToast('Please add at least one appointment type');
                return;
            }

            /* Demo save — real app la inga POST pogum */
            var summary = document.querySelector('input[name="aptSummary"]:checked').value;
            var defFilter = document.getElementById('aptDefaultFilter').value || 'Approved';

            showToast(types.length + ' appointment types saved · summary: ' + (summary === 'yes' ? 'Yes' : 'No') +
                ' · default filter: ' + defFilter);
        });

        document.getElementById('aptResetBtn').addEventListener('click', function() {
            document.getElementById('aptSummaryYes').checked = true;
            /* Select2 mirror-a update panna native value + change event */
            var defSel = document.getElementById('aptDefaultFilter');
            defSel.value = '';
            if (window.jQuery && jQuery.fn.select2) {
                jQuery(defSel).val('').trigger('change');
            }

            types = DEFAULT_TYPES.map(function(t) {
                return { id: nextId++, name: t.name, code: t.code, color: t.color };
            });
            render();
            showToast('Settings reset to default');
        });

        /* ---------------- Toast ---------------- */
        var toastWrap = null;

        function getToastWrap() {
            if (!toastWrap) {
                toastWrap = document.createElement('div');
                toastWrap.className = 'apt-toast-wrap';
                document.body.appendChild(toastWrap);
            }
            return toastWrap;
        }

        function showToast(msg) {
            var wrap = getToastWrap();
            var t = document.createElement('div');
            t.className = 'apt-toast';
            t.innerHTML = '<span class="apt-toast-ico"><i class="bi bi-check-lg"></i></span>' +
                '<span class="apt-toast-msg"></span>' +
                '<button type="button" class="apt-toast-x" title="Close"><i class="bi bi-x-lg"></i></button>';
            t.querySelector('.apt-toast-msg').textContent = msg;
            wrap.appendChild(t);

            function dismiss() {
                t.classList.add('apt-toast-out');
                setTimeout(function() { t.remove(); }, 260);
            }
            t.querySelector('.apt-toast-x').addEventListener('click', dismiss);
            setTimeout(dismiss, 4000);
        }

        /* ---------------- Default filter select (Select2) ---------------- */
        /* footer.php `.select2` init appuram idha destroy + re-init pandrom —
           dropdown panel-ku sondha class (apt-s2-menu) kudukka, adhanala
           dropdown styling epdi irundhaalum correct-a theriyum. */
        function initDefaultFilterSelect() {
            if (!(window.jQuery && jQuery.fn.select2)) return;
            var $s = jQuery('#aptDefaultFilter');
            if ($s.data('select2')) $s.select2('destroy');
            $s.select2({
                width: '100%',
                dropdownCssClass: 'apt-s2-menu'
            });
        }

        /* footer.php ready callback mudinja appuram nadakkanum */
        jQuery(document).ready(initDefaultFilterSelect);

        /* ---------------- Init ---------------- */
        DEFAULT_TYPES.forEach(function(d) {
            types.push({ id: nextId++, name: d.name, code: d.code, color: d.color });
        });
        render();
    })();
