<?php include 'header.php'; ?>

 

<style>
    /* ===== Create Ticket Layout ===== */
    .ticket-form-card {
        background: #fff;
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 16px;
        box-shadow: 0 4px 16px rgba(20, 30, 25, .04);
        overflow: hidden;
    }

    .ticket-form-head {
        padding: 18px 24px;
        border-bottom: 1px solid var(--border-soft, #eef0f3);
        background: linear-gradient(135deg, #f8fafc 0%, #fff 100%);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .ticket-form-head .head-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #eaf1ff;
        color: #3564e0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        flex-shrink: 0;
    }

    .ticket-form-head h3 {
        margin: 0;
        font: 700 16px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
    }

    .ticket-form-head p {
        margin: 2px 0 0;
        font-size: 12px;
        color: var(--ink-500, #6b7684);
    }

    .ticket-form-body {
        padding: 24px;
    }

    .form-label-tkt {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
        margin-bottom: 6px;
        display: block;
    }

    .form-label-tkt .req {
        color: #e5484d;
    }

    .ticket-form-body .form-control,
    .ticket-form-body .form-select {
        background: #f8f9fb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
    }

    .ticket-form-body .form-control:focus,
    .ticket-form-body .form-select:focus {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .ticket-form-body .form-control::placeholder {
        color: #b0b5be;
        font-weight: 500;
    }

    /* ===== Select2 — Sub Category & Preferred Contact ===== */
    #tktSubCategory+.select2-container--default .select2-selection--single,
    #tktPreferredContact+.select2-container--default .select2-selection--single {
        background: #f8f9fb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        height: 42px;
        display: flex;
        align-items: center;
        padding: 6px 14px;
    }

    #tktSubCategory+.select2-container--default .select2-selection--single .select2-selection__rendered,
    #tktPreferredContact+.select2-container--default .select2-selection--single .select2-selection__rendered {
        color: var(--ink-900, #201a14);
        font-size: 13.5px;
        font-weight: 600;
        padding: 0;
        line-height: 1.4;
    }

    #tktSubCategory+.select2-container--default .select2-selection--single .select2-selection__placeholder,
    #tktPreferredContact+.select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #b0b5be;
        font-weight: 500;
    }

    #tktSubCategory+.select2-container--default .select2-selection--single .select2-selection__arrow,
    #tktPreferredContact+.select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 40px;
    }

    #tktSubCategory+.select2-container--default.select2-container--focus .select2-selection--single,
    #tktSubCategory+.select2-container--default.select2-container--open .select2-selection--single,
    #tktPreferredContact+.select2-container--default.select2-container--focus .select2-selection--single,
    #tktPreferredContact+.select2-container--default.select2-container--open .select2-selection--single {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    /* Inline error state on select2 containers */
    .has-error #tktSubCategory+.select2-container--default .select2-selection--single,
    .has-error #tktPreferredContact+.select2-container--default .select2-selection--single {
        border-color: #e5484d !important;
        box-shadow: 0 0 0 3px rgba(229, 72, 77, .1);
    }

    /* Category cards */
    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }

    .category-card {
        position: relative;
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 12px;
        background: #f8f9fb;
        padding: 12px 10px;
        text-align: center;
        cursor: pointer;
        user-select: none;
        transition: all .18s ease;
    }

    .category-card:hover {
        border-color: var(--primary, #16a34a);
        background: #f4fcf6;
        transform: translateY(-2px);
    }

    .category-card .cat-ico {
        font-size: 20px;
        margin-bottom: 4px;
        display: block;
    }

    .category-card .cat-name {
        font-size: 12px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
    }

    .category-card.selected {
        border-color: var(--primary, #16a34a);
        background: var(--primary-light, #e8f7ea);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .category-card.selected::after {
        content: '✓';
        position: absolute;
        top: 6px;
        right: 8px;
        font-size: 12px;
        font-weight: 800;
        color: var(--primary, #16a34a);
    }

    /* Hover edit / delete actions on category cards */
    .category-card .cat-actions {
        position: absolute;
        top: 5px;
        right: 6px;
        display: none;
        align-items: center;
        gap: 4px;
    }

    .category-card:hover .cat-actions { display: inline-flex; }

    .category-card.selected:hover .cat-actions { display: none; }

    .cat-actions button {
        width: 22px;
        height: 22px;
        border-radius: 7px;
        border: 1px solid var(--border-soft, #eef0f3);
        background: #fff;
        color: var(--ink-500, #6b7684);
        font-size: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        padding: 0;
        box-shadow: 0 2px 6px rgba(20, 30, 25, .08);
        transition: all .15s ease;
    }

    .cat-actions button.cact-edit:hover { color: #3564e0; border-color: #3564e0; background: #eaf1ff; }
    .cat-actions button.cact-del:hover { color: #be3035; border-color: #be3035; background: #fdebed; }

    /* Priority selector */
    .priority-grid {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .priority-pill {
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 999px;
        background: #f8f9fb;
        padding: 8px 18px;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-700, #4b5563);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all .18s ease;
    }

    .priority-pill i {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: currentColor;
        opacity: .55;
    }

    .priority-pill.p-low:hover { border-color: #16a34a; }
    .priority-pill.p-medium:hover { border-color: #d97706; }
    .priority-pill.p-high:hover { border-color: #ea580c; }
    .priority-pill.p-urgent:hover { border-color: #e5484d; }

    .priority-pill.p-low.selected { background: #e7f7eb; border-color: #16a34a; color: #087a24; }
    .priority-pill.p-medium.selected { background: #fff4d9; border-color: #d97706; color: #9a6200; }
    .priority-pill.p-high.selected { background: #ffedd5; border-color: #ea580c; color: #c2410c; }
    .priority-pill.p-urgent.selected { background: #fdebed; border-color: #e5484d; color: #be3035; }

    /* SLA hint under priority */
    .sla-hint {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
        background: #f3f4f6;
        border-radius: 8px;
        padding: 6px 12px;
    }

    .sla-hint i { color: #3564e0; }

    /* Attachment */
    .tkt-file-drop {
        border: 1.5px dashed #cfd6dd;
        border-radius: 12px;
        background: #f8f9fb;
        padding: 16px;
        text-align: center;
        cursor: pointer;
        transition: all .18s ease;
    }

    .tkt-file-drop:hover {
        border-color: var(--primary, #16a34a);
        background: #f4fcf6;
    }

    .tkt-file-drop i {
        font-size: 22px;
        color: var(--ink-300, #b0b5be);
    }

    .tkt-file-drop .drop-text {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink-500, #6b7684);
        margin-top: 4px;
    }

    .tkt-file-drop .drop-hint {
        font-size: 11px;
        color: #9ca3af;
        margin-top: 2px;
    }

    /* Selected file chip */
    .tkt-file-chip {
        display: none;
        align-items: center;
        gap: 10px;
        border: 1px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        background: #fff;
        padding: 8px 12px;
        margin-top: 10px;
    }

    .tkt-file-chip.show { display: flex; }

    .tkt-file-chip .file-ico {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        background: #eaf1ff;
        color: #3564e0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }

    .tkt-file-chip .file-name {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900, #201a14);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .tkt-file-chip .file-size {
        font-size: 11px;
        color: var(--ink-500, #6b7684);
    }

    .tkt-file-chip .file-remove {
        margin-left: auto;
        border: none;
        background: #fdebed;
        color: #be3035;
        width: 26px;
        height: 26px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        cursor: pointer;
    }

    /* Submit loading */
    #tktSubmitBtn.loading { pointer-events: none; opacity: .75; }

    /* Success view */
    .tkt-success {
        display: none;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 8px;
        padding: 26px 10px 14px;
    }

    .tkt-success.show { display: flex; }

    .tkt-success .succ-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #e7f7eb;
        color: #087a24;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
    }

    .tkt-success .succ-title {
        font: 700 16px 'Sora', sans-serif;
        color: var(--ink-900, #201a14);
    }

    .tkt-success .tkt-id-chip {
        font: 800 14px 'Sora', sans-serif;
        color: #3564e0;
        background: #eaf1ff;
        border-radius: 10px;
        padding: 6px 16px;
    }

    .tkt-success .succ-sub {
        font-size: 12.5px;
        color: var(--ink-500, #6b7684);
        max-width: 420px;
    }

    /* What happens next steps */
    .wn-step-dot {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        font: 800 12px 'Sora', sans-serif;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .wn-title {
        font-size: 12.5px;
        font-weight: 800;
        color: var(--ink-900, #201a14);
    }

    .wn-sub {
        font-size: 11.5px;
        font-weight: 500;
        color: var(--ink-500, #6b7684);
        margin-top: 2px;
        line-height: 1.45;
    }

    /* Field error */
    .tkt-field-err {
        display: none;
        font-size: 11px;
        font-weight: 600;
        color: #be3035;
        margin-top: 5px;
    }

    .has-error .tkt-field-err { display: block; }

    .has-error .form-control,
    .has-error .form-select,
    .has-error .category-grid,
    .has-error .priority-grid {
        border-color: #e5484d !important;
    }

    .has-error .category-card.selected { box-shadow: 0 0 0 3px rgba(229, 72, 77, .12); }

    /* ===== Custom Category button + modal ===== */
    .btn-add-category {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border: 1.5px dashed var(--primary, #16a34a);
        color: var(--primary-dark, #0ca308);
        background: #f4fcf6;
        border-radius: 999px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all .18s ease;
    }

    .btn-add-category:hover {
        background: var(--primary-light, #e8f7ea);
        transform: translateY(-1px);
    }

    /* Icon picker — profile-style dropdown */
    .ccat-icon-dd { position: relative; }

    .ccat-icon-toggle {
        width: 100%;
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8f9fb;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 7px 12px;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
        cursor: pointer;
        transition: all .15s ease;
    }

    .ccat-icon-toggle:hover, .ccat-icon-dd.open .ccat-icon-toggle {
        background: #fff;
        border-color: var(--primary, #16a34a);
    }

    .ccat-icon-dd.open .ccat-icon-toggle i { transform: rotate(180deg); }
    .ccat-icon-toggle i { transition: transform .18s ease; color: var(--ink-500, #6b7684); }

    .ccat-icon-preview {
        width: 34px;
        height: 34px;
        border-radius: 9px;
        background: #fff;
        border: 1px solid #eef0f3;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .ccat-icon-preview.empty { color: #b0b5be; }

    .ccat-icon-panel {
        display: none;
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        right: 0;
        z-index: 1050;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        box-shadow: 0 10px 28px rgba(20, 30, 25, .13);
        padding: 10px;
    }

    .ccat-icon-dd.open .ccat-icon-panel { display: block; }

    .ccat-icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(46px, 1fr));
        gap: 8px;
        max-height: 148px;
        overflow-y: auto;
        padding: 4px;
    }

    .ccat-icon {
        width: 100%;
        aspect-ratio: 1;
        border: 1.5px solid var(--border-soft, #eef0f3);
        border-radius: 10px;
        background: #f8f9fb;
        font-size: 19px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all .15s ease;
    }

    .ccat-icon:hover { border-color: var(--primary, #16a34a); background: #f4fcf6; }

    .ccat-icon.selected {
        border-color: var(--primary, #16a34a);
        background: var(--primary-light, #e8f7ea);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .12);
    }

    /* Sub category chips input */
    .ccat-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #f8f9fb;
        padding: 8px 10px;
        min-height: 46px;
        cursor: text;
    }

    .ccat-chips:focus-within {
        background: #fff;
        border-color: var(--primary, #16a34a);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .ccat-chips input {
        border: none;
        outline: none;
        background: transparent;
        flex: 1;
        min-width: 130px;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-900, #201a14);
    }

    .ccat-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--primary-light, #e8f7ea);
        color: var(--primary-dark, #0ca308);
        border-radius: 999px;
        padding: 4px 6px 4px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    .ccat-chip button {
        border: none;
        background: rgba(12, 163, 8, .15);
        color: var(--primary-dark, #0ca308);
        width: 18px;
        height: 18px;
        border-radius: 50%;
        font-size: 10px;
        line-height: 1;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .ccat-err {
        display: none;
        font-size: 11.5px;
        font-weight: 600;
        color: #be3035;
        margin-top: 6px;
    }

    .ccat-add-btn {
        border: none;
        background: var(--primary, #16a34a);
        color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        cursor: pointer;
        flex-shrink: 0;
        transition: background .15s ease;
    }

    .ccat-add-btn:hover { background: var(--primary-dark, #0ca308); }

    .ccat-count {
        font-size: 11px;
        font-weight: 700;
        color: var(--primary-dark, #0ca308);
        background: var(--primary-light, #e8f7ea);
        border-radius: 999px;
        padding: 3px 10px;
    }
</style>

<!-- Top Title Area -->
<div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
    <div>
        <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Create New Ticket</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <i class="bi bi-life-preserver fs-6"></i>
            <span>Helpdesk / Ticketing</span>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Create Ticket</span>
        </nav>
    </div>
    <div class="d-flex gap-2">
        <a href="my-tickets.php" class="btn btn-outline-primary">
            <i class="bi bi-ticket-perforated me-1"></i> My Tickets
        </a>
    </div>
</div>

<div class="row g-3">
    <!-- ===== Form ===== -->
    <div class="col-lg-8">
        <div class="ticket-form-card">
            <div class="ticket-form-head">
                <div class="head-icon"><i class="bi bi-life-preserver"></i></div>
                <div>
                    <h3>Ticket Details</h3>
                    <p>Fill in the details below — our support team will respond within the SLA time.</p>
                </div>
            </div>

            <div class="ticket-form-body">
                <form id="createTicketForm" novalidate>
                    <!-- Category -->
                    <div class="mb-3" id="rowCategory">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-1">
                            <label class="form-label-tkt mb-0">Category <span class="req">*</span></label>
                            <button type="button" class="btn-add-category" id="tktAddCategoryBtn">
                                <i class="bi bi-plus-lg"></i> Custom Category
                            </button>
                        </div>
                        <div class="category-grid" id="categoryGrid">
                            <!-- Filled by JS -->
                        </div>
                        <div class="tkt-field-err">Please select a category</div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6" id="rowSubCategory">
                            <label class="form-label-tkt" for="tktSubCategory">Sub Category <span class="req">*</span></label>
                            <select class="form-select" id="tktSubCategory" disabled>
                                <option value="">Select a category first</option>
                            </select>
                            <div class="tkt-field-err">Please select a sub category</div>
                        </div>
                        <div class="col-md-6" id="rowPriority">
                            <label class="form-label-tkt">Priority <span class="req">*</span></label>
                            <div class="priority-grid" id="priorityGrid">
                                <button type="button" class="priority-pill p-low" data-value="Low"><i></i> Low</button>
                                <button type="button" class="priority-pill p-medium selected" data-value="Medium"><i></i> Medium</button>
                                <button type="button" class="priority-pill p-high" data-value="High"><i></i> High</button>
                                <button type="button" class="priority-pill p-urgent" data-value="Urgent"><i></i> Urgent</button>
                            </div>
                            <div class="tkt-field-err">Please select a priority</div>
                        </div>
                    </div>

                    <div class="mt-3" id="rowSubject">
                        <label class="form-label-tkt" for="tktSubject">Subject <span class="req">*</span></label>
                        <input type="text" class="form-control" id="tktSubject" maxlength="120" placeholder="One-line summary (e.g. Missing checkout punch)">
                        <div class="tkt-field-err">Subject is required</div>
                    </div>

                    <div class="mt-3" id="rowDescription">
                        <label class="form-label-tkt" for="tktDescription">Description <span class="req">*</span></label>
                        <textarea class="form-control" id="tktDescription" rows="5" placeholder="Describe your issue in detail..."></textarea>
                        <div class="tkt-field-err">Description is required (min 10 characters)</div>
                    </div>

                    <div class="row g-3 mt-0">
                        <div class="col-md-6">
                            <label class="form-label-tkt">Attachment</label>
                            <div class="tkt-file-drop" id="tktFileDrop">
                                <i class="bi bi-cloud-arrow-up"></i>
                                <div class="drop-text">Click to choose a file or drag &amp; drop</div>
                                <div class="drop-hint">PNG, JPG, PDF, DOCX up to 5 MB</div>
                            </div>
                            <input type="file" id="tktAttachment" hidden
                                   accept=".png,.jpg,.jpeg,.pdf,.doc,.docx,.xls,.xlsx">
                            <div class="tkt-file-chip" id="tktFileChip">
                                <div class="file-ico"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="min-w-0">
                                    <div class="file-name" id="tktFileName">file.pdf</div>
                                    <div class="file-size" id="tktFileSize">0 KB</div>
                                </div>
                                <button type="button" class="file-remove" id="tktFileRemove" title="Remove file">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label-tkt" for="tktPreferredContact">Preferred Contact</label>
                            <select class="form-select" id="tktPreferredContact">
                                <option selected>Email</option>
                                <option>Phone</option>
                                <option>In Person</option>
                                <option>Teams / Chat</option>
                            </select>
                            <div class="mt-3">
                                <div class="sla-hint" id="slaHint">
                                    <i class="bi bi-stopwatch"></i>
                                    <span>Response: <b>8 hrs</b> &nbsp;·&nbsp; Resolution: <b>2 Days</b></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-2 justify-content-end mt-4 pt-3 border-top">
                        <a href="my-tickets.php" class="btn btn-outline-secondary px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4" id="tktSubmitBtn">
                            <span class="btn-label-default"><i class="bi bi-send me-1"></i> Submit Ticket</span>
                        </button>
                    </div>
                </form>

                <!-- Success state -->
                <div class="tkt-success" id="tktSuccessBox">
                    <div class="succ-icon"><i class="bi bi-check-lg"></i></div>
                    <div class="succ-title">Ticket Created Successfully!</div>
                    <div class="tkt-id-chip" id="tktSuccessId">TKT-1004</div>
                    <div class="succ-sub">Your ticket has been submitted to the Helpdesk team. You can track its
                        progress from <a href="my-tickets.php"><b>My Tickets</b></a>. Estimated first response within
                        <b id="tktSuccessSla">8 hrs</b>.
                    </div>
                    <div class="d-flex gap-2 mt-2">
                        <a href="my-tickets.php" class="btn btn-primary px-4">View My Tickets</a>
                        <button type="button" class="btn btn-outline-secondary px-4" id="tktCreateAnother">Create Another</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== Side info ===== -->
    <div class="col-lg-4">
        <!-- Category guide -->
        <div class="ticket-form-card mb-3">
            <div class="ticket-form-head" style="padding:14px 20px;">
                <div class="head-icon" style="width:36px;height:36px;font-size:16px;background:#e9f7ec;color:#11872c;">
                    <i class="bi bi-tags"></i>
                </div>
                <div>
                    <h3 style="font-size:14px;">Category Guide</h3>
                    <p>Pick the right category for faster resolution</p>
                </div>
            </div>
            <div class="p-3" style="padding-top:10px !important;">
                <div id="categoryGuideList" class="d-flex flex-column gap-2">
                    <!-- Filled by JS -->
                </div>
            </div>
        </div>

        <!-- SLA matrix -->
        <div class="ticket-form-card mb-3">
            <div class="ticket-form-head" style="padding:14px 20px;">
                <div class="head-icon" style="width:36px;height:36px;font-size:16px;background:#fff4d9;color:#9a6200;">
                    <i class="bi bi-stopwatch"></i>
                </div>
                <div>
                    <h3 style="font-size:14px;">SLA Targets</h3>
                    <p>By priority</p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm align-middle mb-0" style="font-size:12.5px;">
                    <thead>
                        <tr style="color:var(--ink-500,#6b7684);">
                            <th class="ps-3" style="font-size:11px;">Priority</th>
                            <th style="font-size:11px;">Response</th>
                            <th class="pe-3 text-end" style="font-size:11px;">Resolution</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight:600;">
                        <tr>
                            <td class="ps-3"><span class="badge rounded-pill" style="background:#e7f7eb;color:#087a24;">Low</span></td>
                            <td>24 hrs</td>
                            <td class="pe-3 text-end">3 Days</td>
                        </tr>
                        <tr>
                            <td class="ps-3"><span class="badge rounded-pill" style="background:#fff4d9;color:#9a6200;">Medium</span></td>
                            <td>8 hrs</td>
                            <td class="pe-3 text-end">2 Days</td>
                        </tr>
                        <tr>
                            <td class="ps-3"><span class="badge rounded-pill" style="background:#ffedd5;color:#c2410c;">High</span></td>
                            <td>2 hrs</td>
                            <td class="pe-3 text-end">1 Day</td>
                        </tr>
                        <tr>
                            <td class="ps-3 pb-3"><span class="badge rounded-pill" style="background:#fdebed;color:#be3035;">Urgent</span></td>
                            <td class="pb-3">30 mins</td>
                            <td class="pe-3 pb-3 text-end">4 hrs</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- What happens next -->
        <div class="ticket-form-card">
            <div class="ticket-form-head" style="padding:14px 20px;">
                <div class="head-icon" style="width:36px;height:36px;font-size:16px;background:#eaf1ff;color:#3564e0;">
                    <i class="bi bi-route"></i>
                </div>
                <div>
                    <h3 style="font-size:14px;">What Happens Next?</h3>
                    <p>Your ticket journey</p>
                </div>
            </div>
            <div class="p-3 pt-2 d-flex flex-column gap-3">
                <div class="d-flex align-items-start gap-3">
                    <span class="wn-step-dot">1</span>
                    <div>
                        <div class="wn-title">Instant ticket ID</div>
                        <div class="wn-sub">You get a tracking ID (TKT-xxxx) as soon as you submit.</div>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3">
                    <span class="wn-step-dot">2</span>
                    <div>
                        <div class="wn-title">Routed to the right team</div>
                        <div class="wn-sub">HR / IT / Payroll / Finance team picks it up within the response SLA.</div>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3">
                    <span class="wn-step-dot">3</span>
                    <div>
                        <div class="wn-title">Resolved &amp; closed</div>
                        <div class="wn-sub">Track progress in My Tickets; reply anytime — reopen if not fixed.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Custom Category Modal ===== -->
<div class="modal fade" id="customCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border:none;border-radius:16px;overflow:hidden;">
            <div class="modal-header" style="border-bottom:1px solid #eef0f3;background:linear-gradient(135deg,#f8fafc 0%,#fff 100%);">
                <div class="d-flex align-items-center gap-2">
                    <div class="head-icon d-flex align-items-center justify-content-center rounded-2" style="width:36px;height:36px;font-size:16px;background:#e9f7ec;color:#11872c;"><i class="bi bi-tags"></i></div>
                    <div>
                        <h5 class="modal-title" style="font:700 15px 'Sora',sans-serif;">Add Custom Category</h5>
                        <span style="font-size:11.5px;color:#6b7684;">Create your own category with icon &amp; sub categories</span>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding:20px 22px;">
                <!-- Icon picker (profile-style dropdown) -->
                <label class="form-label-tkt">Icon <span class="req">*</span></label>
                <div class="ccat-icon-dd" id="ccatIconDd">
                    <button type="button" class="ccat-icon-toggle" id="ccatIconToggle">
                        <span class="ccat-icon-preview empty" id="ccatIconPreview">❓</span>
                        <span id="ccatIconToggleText">Choose an icon</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </button>
                    <div class="ccat-icon-panel" id="ccatIconPanel">
                        <div class="ccat-icon-grid" id="ccatIconGrid">
                            <!-- Filled by JS -->
                        </div>
                    </div>
                </div>
                <div class="ccat-err" id="ccatIconErr">Please pick an icon</div>

                <!-- Name -->
                <div class="mt-3">
                    <label class="form-label-tkt" for="ccatName">Category Name <span class="req">*</span></label>
                    <input type="text" class="form-control" id="ccatName" maxlength="40" placeholder="e.g. Legal / Compliance">
                    <div class="ccat-err" id="ccatNameErr">Category name is required</div>
                </div>

                <!-- Sub categories chips -->
                <div class="mt-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label-tkt mb-0">Sub Category Options <span class="req">*</span></label>
                        <span class="ccat-count" id="ccatSubCount">0 added</span>
                    </div>
                    <div class="ccat-chips" id="ccatChips">
                        <input type="text" id="ccatSubInput" placeholder="Type &amp; press Enter — use commas to add multiple" maxlength="60">
                        <button type="button" class="ccat-add-btn" id="ccatSubAddBtn" title="Add option"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div class="ccat-err" id="ccatSubErr">Add at least one sub category option</div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:1px solid #eef0f3;">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary px-4" id="ccatSaveBtn">
                    <i class="bi bi-check-lg me-1"></i> Add Category
                </button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="./assets/js/ticketing-data.js"></script>
<script src="./assets/js/pages/ticketing.js?v=<?php echo time(); ?>"></script>
