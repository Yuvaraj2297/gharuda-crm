/**
 * Gharuda CRM - Ticketing Page Script
 * File: assets/js/pages/ticketing.js
 */

/* ==========================================================================
   Script Block 1
   ========================================================================== */
(function () {
    'use strict';

    var selectedCategory = null;
    var selectedPriority = 'Medium';
    var selectedFile = null;

    /* ---------- Select2 helpers (self-healing init) ---------- */
    function buildTicketSelect2(selector, options, width, placeholder) {
        if (!window.jQuery || !$.fn.select2) return;
        var $sel = $(selector);
        if (!$sel.length) return;
        var el = $sel[0];
        var healing = false;

        function rebuildOptions() {
            el.innerHTML = '';
            if (placeholder) {
                var ph = document.createElement('option');
                ph.value = '';
                ph.textContent = placeholder;
                el.appendChild(ph);
            }
            options.forEach(function (item) {
                var o = document.createElement('option');
                o.value = item.id !== undefined ? item.id : item;
                o.textContent = item.text !== undefined ? item.text : item;
                el.appendChild(o);
            });
        }

        function setup() {
            healing = true;
            if ($sel.hasClass('select2-hidden-accessible')) $sel.select2('destroy');
            rebuildOptions();
            $sel.select2({
                width: width,
                dropdownParent: $(document.body),
                minimumResultsForSearch: 5,
                placeholder: placeholder || null,
                allowClear: !!placeholder
            });
            $sel.val(placeholder ? '' : (options[0] ? (options[0].id !== undefined ? options[0].id : options[0]) : '')).trigger('change');
            healing = false;
        }

        setup();

        /* Self-heal: if options get wiped by any other script, rebuild+re-init */
        var mo = new MutationObserver(function () {
            if (healing) return;
            if (el.querySelectorAll('option').length < options.length + (placeholder ? 1 : 0)) {
                mo.disconnect();
                setup();
                mo.observe(el, { childList: true });
            }
        });
        mo.observe(el, { childList: true });
    }

    /* Preferred Contact options (static) */
    var CONTACT_OPTIONS = ['Email', 'Phone', 'In Person', 'Teams / Chat'];

    function initSelect2Fields() {
        if (!window.jQuery || !$.fn.select2) return;
        /* No placeholder → first option (Email) auto-selected, like the native select */
        buildTicketSelect2('#tktPreferredContact', CONTACT_OPTIONS, '100%');
        /* Sub Category starts disabled/empty until a category is picked */
        buildTicketSelect2('#tktSubCategory', [], '100%', 'Select a category first');
        $('#tktSubCategory').prop('disabled', true);
    }

    /* ----- Build category cards ----- */
    function buildCategoryCards() {
        var grid = document.getElementById('categoryGrid');
        grid.innerHTML = TicketingData.categories.map(function (c) {
            return '<div class="category-card" data-id="' + c.id + '" title="' + c.example + '">' +
                '<span class="cat-actions">' +
                    '<button type="button" class="cact-edit" data-act="edit" data-id="' + c.id + '" title="Edit category"><i class="bi bi-pencil-square"></i></button>' +
                    '<button type="button" class="cact-del" data-act="del" data-id="' + c.id + '" title="Delete category"><i class="bi bi-trash3"></i></button>' +
                '</span>' +
                '<span class="cat-ico">' + c.icon + '</span>' +
                '<div class="cat-name">' + c.name + '</div>' +
                '</div>';
        }).join('');
    }

    /* ----- Category selection + hover edit/delete actions ----- */
    document.getElementById('categoryGrid').addEventListener('click', function (e) {
        var actBtn = e.target.closest('.cat-actions button');
        if (actBtn) {
            e.stopPropagation();
            var id = actBtn.getAttribute('data-id');
            if (actBtn.getAttribute('data-act') === 'edit') {
                openCcatModal(TicketingData.getCategory(id));
            } else {
                var delCat = TicketingData.getCategory(id);
                if (!delCat) return;
                var confirmed = window.confirm('Delete category "' + delCat.name + '"?\n\nExisting tickets keep their category name, but it cannot be picked for new tickets.');
                if (!confirmed) return;
                TicketingData.removeCategory(id);
                if (selectedCategory && selectedCategory.id === id) {
                    selectedCategory = null;
                    buildTicketSelect2('#tktSubCategory', [], '100%', 'Select a category first');
                    $('#tktSubCategory').prop('disabled', true);
                }
                buildCategoryCards();
                buildCategoryGuide();
            }
            return;
        }

        var card = e.target.closest('.category-card');
        if (!card) return;

        document.querySelectorAll('.category-card').forEach(function (c) { c.classList.remove('selected'); });
        card.classList.add('selected');

        selectedCategory = TicketingData.getCategory(card.getAttribute('data-id'));
        document.getElementById('rowCategory').classList.remove('has-error');

        /* Rebuild the Sub Category select2 with this category's options */
        buildTicketSelect2('#tktSubCategory', selectedCategory.subCategories, '100%', 'Select Sub Category...');
        $('#tktSubCategory').prop('disabled', false);

        // Auto-pick suggested priority
        if (selectedCategory.suggestedPriority) {
            setPriority(selectedCategory.suggestedPriority);
        }
    });

    /* ----- Sub category / subject clears error on change ----- */
    $('#tktSubCategory').on('change', function () {
        document.getElementById('rowSubCategory').classList.remove('has-error');
    });
    document.getElementById('tktSubject').addEventListener('input', function () {
        document.getElementById('rowSubject').classList.remove('has-error');
    });
    document.getElementById('tktDescription').addEventListener('input', function () {
        document.getElementById('rowDescription').classList.remove('has-error');
    });

    /* ----- Priority selection ----- */
    function setPriority(value) {
        selectedPriority = value;
        document.querySelectorAll('.priority-pill').forEach(function (p) {
            p.classList.toggle('selected', p.getAttribute('data-value') === value);
        });
        var sla = TicketingData.slaMatrix[value];
        document.querySelector('#slaHint b').textContent = sla.response;
        var resNode = document.querySelectorAll('#slaHint b')[1];
        if (resNode) resNode.textContent = sla.resolution;
        document.getElementById('rowPriority').classList.remove('has-error');
    }

    document.getElementById('priorityGrid').addEventListener('click', function (e) {
        var pill = e.target.closest('.priority-pill');
        if (pill) setPriority(pill.getAttribute('data-value'));
    });

    /* ----- Attachment ----- */
    var fileInput = document.getElementById('tktAttachment');

    document.getElementById('tktFileDrop').addEventListener('click', function () { fileInput.click(); });

    fileInput.addEventListener('change', function () {
        if (!fileInput.files.length) return;
        var f = fileInput.files[0];
        if (f.size > 5 * 1024 * 1024) {
            alert('File is larger than 5 MB. Please choose a smaller file.');
            fileInput.value = '';
            return;
        }
        selectedFile = f.name;
        document.getElementById('tktFileName').textContent = f.name;
        document.getElementById('tktFileSize').textContent = (f.size / 1024).toFixed(1) + ' KB';
        document.getElementById('tktFileChip').classList.add('show');
    });

    document.getElementById('tktFileRemove').addEventListener('click', function () {
        selectedFile = null;
        fileInput.value = '';
        document.getElementById('tktFileChip').classList.remove('show');
    });

    /* ----- Submit ----- */
    document.getElementById('createTicketForm').addEventListener('submit', function (e) {
        e.preventDefault();

        var valid = true;
        if (!selectedCategory) { document.getElementById('rowCategory').classList.add('has-error'); valid = false; }
        if (!document.getElementById('tktSubCategory').value) { document.getElementById('rowSubCategory').classList.add('has-error'); valid = false; }
        if (!document.getElementById('tktSubject').value.trim()) { document.getElementById('rowSubject').classList.add('has-error'); valid = false; }
        if (document.getElementById('tktDescription').value.trim().length < 10) { document.getElementById('rowDescription').classList.add('has-error'); valid = false; }
        if (!valid) return;

        var btn = document.getElementById('tktSubmitBtn');
        btn.classList.add('loading');
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Submitting...';

        setTimeout(function () {
            var sla = TicketingData.slaMatrix[selectedPriority];
            var ticket = TicketingData.createTicket({
                category: selectedCategory.name,
                categoryIcon: selectedCategory.icon,
                subCategory: document.getElementById('tktSubCategory').value,
                subject: document.getElementById('tktSubject').value.trim(),
                description: document.getElementById('tktDescription').value.trim(),
                priority: selectedPriority,
                attachment: selectedFile,
                preferredContact: document.getElementById('tktPreferredContact').value
            });

            document.getElementById('createTicketForm').style.display = 'none';
            document.getElementById('tktSuccessBox').classList.add('show');
            document.getElementById('tktSuccessId').textContent = ticket.id;
            document.getElementById('tktSuccessSla').textContent = sla.response;
        }, 700);
    });

    document.getElementById('tktCreateAnother').addEventListener('click', function () {
        document.getElementById('tktSuccessBox').classList.remove('show');
        var form = document.getElementById('createTicketForm');
        form.reset();
        form.style.display = '';
        // reset visuals
        document.querySelectorAll('.category-card').forEach(function (c) { c.classList.remove('selected'); });
        document.querySelectorAll('.priority-pill').forEach(function (p) { p.classList.remove('selected'); });
        setPriority('Medium');
        selectedCategory = null;
        selectedFile = null;
        document.getElementById('tktFileChip').classList.remove('show');
        /* Re-init selects back to their initial state */
        buildTicketSelect2('#tktSubCategory', [], '100%', 'Select a category first');
        $('#tktSubCategory').prop('disabled', true);
        buildTicketSelect2('#tktPreferredContact', CONTACT_OPTIONS, '100%');
        btn_reset();
    });

    function btn_reset() {
        var btn = document.getElementById('tktSubmitBtn');
        btn.classList.remove('loading');
        btn.innerHTML = '<span class="btn-label-default"><i class="bi bi-send me-1"></i> Submit Ticket</span>';
    }

    /* ----- Side lists ----- */
    function buildCategoryGuide() {
        var wrap = document.getElementById('categoryGuideList');
        wrap.innerHTML = TicketingData.categories.map(function (c) {
            return '<div class="d-flex align-items-start gap-2 p-2 rounded" style="border:1px solid var(--border-soft,#eef0f3);">' +
                '<span style="font-size:15px;">' + c.icon + '</span>' +
                '<div class="min-w-0">' +
                    '<div class="fw-bold" style="font-size:12px;color:var(--ink-900,#201a14);">' + c.name + '</div>' +
                    '<div class="text-muted" style="font-size:10.5px;">' + c.example + '</div>' +
                '</div>' +
                '</div>';
        }).join('');
    }

    /* ----- Custom Category modal ----- */
    var CCAT_ICONS = ['📌', '🛠️', '⚖️', '🎓', '🚗', '📦', '🧾', '🔐', '🩺', '✈️', '🎯', '🧪', '📊', '🗂️', '🤝', '📞'];
    var ccatSelectedIcon = null;
    var ccatSubs = [];
    var ccatEditingId = null; /* null = create mode */
    var ccatChipsBox = document.getElementById('ccatChips');
    var ccatSubInput = document.getElementById('ccatSubInput');

    function buildIconGrid() {
        var grid = document.getElementById('ccatIconGrid');
        grid.innerHTML = CCAT_ICONS.map(function (ic) {
            return '<button type="button" class="ccat-icon" data-icon="' + ic + '">' + ic + '</button>';
        }).join('');
    }

    /* --- Icon dropdown open/close --- */
    var ccatIconDd = document.getElementById('ccatIconDd');

    document.getElementById('ccatIconToggle').addEventListener('click', function (e) {
        e.stopPropagation();
        ccatIconDd.classList.toggle('open');
    });

    document.addEventListener('click', function (e) {
        if (!ccatIconDd.contains(e.target)) ccatIconDd.classList.remove('open');
    });

    document.getElementById('ccatIconGrid').addEventListener('click', function (e) {
        var btn = e.target.closest('.ccat-icon');
        if (!btn) return;
        document.querySelectorAll('.ccat-icon').forEach(function (b) { b.classList.remove('selected'); });
        btn.classList.add('selected');
        ccatSelectedIcon = btn.getAttribute('data-icon');
        var preview = document.getElementById('ccatIconPreview');
        preview.textContent = ccatSelectedIcon;
        preview.classList.remove('empty');
        document.getElementById('ccatIconToggleText').textContent = ccatSelectedIcon + ' selected';
        ccatIconDd.classList.remove('open');
        document.getElementById('ccatIconErr').classList.remove('show');
    });

    /* --- Shared adder: splits on commas, trims, skips duplicates --- */
    function addCcatSubsFrom(raw) {
        var added = 0;
        String(raw || '').split(',').forEach(function (part) {
            var v = part.trim();
            if (!v) return;
            var dup = ccatSubs.some(function (s) { return s.toLowerCase() === v.toLowerCase(); });
            if (!dup) { ccatSubs.push(v); added++; }
        });
        if (added) {
            renderCcatChips();
            document.getElementById('ccatSubErr').classList.remove('show');
        }
        return added;
    }

    function updateCcatSubCount() {
        var n = ccatSubs.length;
        document.getElementById('ccatSubCount').textContent = n + ' added';
    }

    function renderCcatChips() {
        ccatChipsBox.querySelectorAll('.ccat-chip').forEach(function (c) { c.remove(); });
        ccatSubs.forEach(function (s, i) {
            var chip = document.createElement('span');
            chip.className = 'ccat-chip';
            chip.innerHTML = TicketingData.escapeHtml(s) +
                '<button type="button" data-i="' + i + '" title="Remove">&times;</button>';
            ccatChipsBox.insertBefore(chip, ccatSubInput);
        });
        updateCcatSubCount();
    }

    ccatSubInput.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            addCcatSubsFrom(ccatSubInput.value);
            ccatSubInput.value = '';
        } else if (e.key === 'Backspace' && !ccatSubInput.value && ccatSubs.length) {
            ccatSubs.pop();
            renderCcatChips();
        }
    });

    document.getElementById('ccatSubAddBtn').addEventListener('click', function () {
        addCcatSubsFrom(ccatSubInput.value);
        ccatSubInput.value = '';
        ccatSubInput.focus();
    });

    ccatChipsBox.addEventListener('click', function (e) {
        var btn = e.target.closest('.ccat-chip button');
        if (btn) {
            ccatSubs.splice(parseInt(btn.getAttribute('data-i'), 10), 1);
            renderCcatChips();
            return;
        }
        if (e.target === ccatChipsBox) ccatSubInput.focus();
    });

    document.getElementById('ccatName').addEventListener('input', function () {
        document.getElementById('ccatNameErr').classList.remove('show');
    });

    function resetCcatModal() {
        ccatSelectedIcon = null;
        ccatSubs = [];
        ccatEditingId = null;
        document.querySelectorAll('.ccat-icon').forEach(function (b) { b.classList.remove('selected'); });
        document.getElementById('ccatName').value = '';
        ccatSubInput.value = '';
        renderCcatChips();
        var preview = document.getElementById('ccatIconPreview');
        preview.textContent = '❓';
        preview.classList.add('empty');
        document.getElementById('ccatIconToggleText').textContent = 'Choose an icon';
        ccatIconDd.classList.remove('open');
        document.getElementById('ccatIconErr').classList.remove('show');
        var nameErr = document.getElementById('ccatNameErr');
        nameErr.textContent = 'Category name is required';
        nameErr.classList.remove('show');
        document.getElementById('ccatSubErr').classList.remove('show');
        document.querySelector('#customCategoryModal .modal-title').textContent = 'Add Custom Category';
        document.querySelector('#customCategoryModal .modal-header span').textContent = 'Create your own category with icon & sub categories';
        document.getElementById('ccatSaveBtn').innerHTML = '<i class="bi bi-check-lg me-1"></i> Add Category';
    }

    /* Open modal in create mode (cat = null) or edit mode (prefilled) */
    function openCcatModal(cat) {
        resetCcatModal();
        if (cat) {
            ccatEditingId = cat.id;
            ccatSelectedIcon = cat.icon;
            ccatSubs = cat.subCategories.slice();
            var iconBtn = document.querySelector('.ccat-icon[data-icon="' + cat.icon + '"]');
            if (iconBtn) iconBtn.classList.add('selected');
            var preview = document.getElementById('ccatIconPreview');
            preview.textContent = cat.icon;
            preview.classList.remove('empty');
            document.getElementById('ccatIconToggleText').textContent = cat.icon + ' selected';
            document.getElementById('ccatName').value = cat.name;
            renderCcatChips();
            document.querySelector('#customCategoryModal .modal-title').textContent = 'Edit Category';
            document.querySelector('#customCategoryModal .modal-header span').textContent = 'Update icon, name & sub categories';
            document.getElementById('ccatSaveBtn').innerHTML = '<i class="bi bi-check-lg me-1"></i> Save Changes';
        }
        bootstrap.Modal.getOrCreateInstance(document.getElementById('customCategoryModal')).show();
    }

    document.getElementById('tktAddCategoryBtn').addEventListener('click', function () {
        openCcatModal(null);
    });

    document.getElementById('ccatSaveBtn').addEventListener('click', function () {
        var name = document.getElementById('ccatName').value.trim();
        var ok = true;

        if (!ccatSelectedIcon) { document.getElementById('ccatIconErr').classList.add('show'); ok = false; }
        if (!name) { document.getElementById('ccatNameErr').classList.add('show'); ok = false; }
        if (!ccatSubs.length) { document.getElementById('ccatSubErr').classList.add('show'); ok = false; }
        if (!ok) return;

        var cat = ccatEditingId
            ? TicketingData.updateCategory(ccatEditingId, { icon: ccatSelectedIcon, name: name, subCategories: ccatSubs })
            : TicketingData.addCategory({ icon: ccatSelectedIcon, name: name, subCategories: ccatSubs });
        if (!cat) {
            var nameErr = document.getElementById('ccatNameErr');
            nameErr.textContent = 'A category with this name already exists';
            nameErr.classList.add('show');
            return;
        }

        bootstrap.Modal.getOrCreateInstance(document.getElementById('customCategoryModal')).hide();
        resetCcatModal();

        /* Refresh lists + keep the saved category selected */
        selectedCategory = cat;
        buildCategoryCards();
        var cardEl = document.querySelector('.category-card[data-id="' + cat.id + '"]');
        if (cardEl) cardEl.classList.add('selected');
        document.getElementById('rowCategory').classList.remove('has-error');
        buildCategoryGuide();

        buildTicketSelect2('#tktSubCategory', cat.subCategories, '100%', 'Select Sub Category...');
        $('#tktSubCategory').prop('disabled', false);
    });

    buildCategoryCards();
    buildCategoryGuide();
    buildIconGrid();

    /* Init select2 fields on jQuery ready — after global scripts have run */
    if (window.jQuery) {
        $(function () { initSelect2Fields(); });
    }
})();
