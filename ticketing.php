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
<script>
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
</script>
