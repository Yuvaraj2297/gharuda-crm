<?php include 'header.php'; ?>



<style>
    /* ===== Appointment Types — scoped to .apt-page ===== */

    /* Title icon tile */
    .apt-page .apt-title-ico {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        box-shadow: 0 8px 18px rgba(22, 163, 74, .28);
        flex-shrink: 0;
    }

    /* ===== Card ===== */
    .apt-page .apt-card {
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
        margin-bottom: 16px;
        overflow: hidden;
    }

    .apt-page .apt-card-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding: 14px 18px;
        border-bottom: 1px solid #f1f4f7;
        background: #fbfdfc;
    }

    .apt-page .apt-card-title {
        font-size: 14px;
        font-weight: 800;
        color: var(--ink-900);
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin: 0;
    }

    .apt-page .apt-card-title i {
        color: var(--primary);
    }

    .apt-page .apt-card-body {
        padding: 18px;
    }

    /* ===== Setting rows ===== */
    .apt-page .apt-setting {
        padding: 14px 0;
        border-bottom: 1px dashed #eef0f3;
    }

    .apt-page .apt-setting:first-child {
        padding-top: 0;
    }

    .apt-page .apt-setting:last-child {
        padding-bottom: 0;
        border-bottom: none;
    }

    .apt-page .apt-setting-label {
        font-size: 12.5px;
        font-weight: 800;
        color: #374151;
        margin-bottom: 8px;
        display: block;
    }

    .apt-page .apt-hint {
        font-size: 11px;
        font-weight: 600;
        color: var(--ink-500);
        margin-top: 7px;
        display: flex;
        align-items: flex-start;
        gap: 6px;
        line-height: 1.5;
    }

    .apt-page .apt-hint i {
        color: var(--primary);
        margin-top: 1px;
    }

    /* Select2-oda container-a width 100% aakirudhu, adhanala native select mela
       potta inline max-width waste aagum — wrapper la kudukka vendiyadhu */
    .apt-page .apt-select-wrap {
        max-width: 560px;
    }

    /* ===== Select2 — page-scoped (assets/css/select2.css theme mirror) =====
       Global theme already irukku, aana adhu load aagaadha situation-layum
       indha field correct-a theriyum. */
    .apt-page .select2-container {
        width: 100%;
    }

    .apt-page .select2-container--default .select2-selection--single {
        height: 41px;
        background-color: #fff;
        border: 1.5px solid #E3E5F5;
        border-radius: 10px;
        box-shadow: 0 1px 2px rgba(17, 24, 39, .04);
        transition: border-color .15s ease, box-shadow .15s ease;
    }

    .apt-page .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
        padding-left: 14px;
        padding-right: 36px;
        color: #1F2937;
        font-size: .95em;
    }

    .apt-page .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px;
        width: 28px;
        right: 6px;
    }

    .apt-page .select2-container--default.select2-container--open .select2-selection--single,
    .apt-page .select2-container--default.select2-container--focus .select2-selection--single {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px var(--primary-light);
    }

    /* Dropdown panel — `dropdownCssClass: 'apt-s2-menu'` moolam body-ku append
       aagum. Position rules-um inga irukku, adhanala select2.css load aagaadha
       situation-layum list page flow-la veliya varadhu. */
    .apt-s2-menu {
        position: absolute;
        left: -100000px;
        width: 100%;
        z-index: 1090;
        background: #fff;
        border: 1px solid #EDEEF7;
        border-radius: 14px;
        box-shadow: 0 20px 45px -12px rgba(17, 24, 39, .22), 0 6px 16px rgba(17, 24, 39, .08);
        overflow: hidden;
    }

    .apt-s2-menu .select2-search--dropdown {
        padding: 12px 12px 8px;
    }

    .apt-s2-menu .select2-search__field {
        width: 100%;
        font-size: 13px;
        color: #1F2937;
        border: 1px solid #E3E5F5;
        border-radius: 9px;
        padding: 8px 10px;
        outline: none;
    }

    .apt-s2-menu .select2-search__field:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .apt-s2-menu .select2-results__option {
        font-size: 12.5px;
        font-weight: 600;
        color: #374151;
        padding: 9px 14px;
    }

    .apt-s2-menu .select2-results__option--highlighted[aria-selected],
    .apt-s2-menu .select2-results__option--highlighted[aria-selected="false"] {
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    .apt-s2-menu .select2-results__option[aria-selected="true"] {
        background: var(--primary);
        color: #fff;
    }

    /* ===== Segmented Yes / No (real radio inputs) ===== */
    .apt-page .apt-seg {
        display: inline-flex;
        gap: 6px;
        background: #f4f6f8;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 4px;
    }

    .apt-page .apt-seg input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .apt-page .apt-seg label {
        font-size: 12px;
        font-weight: 800;
        color: var(--ink-500);
        border-radius: 9px;
        padding: 7px 20px;
        cursor: pointer;
        margin: 0;
        transition: .15s;
        user-select: none;
    }

    .apt-page .apt-seg label:hover {
        color: var(--primary-dark);
    }

    .apt-page .apt-seg input:checked+label {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        color: #fff;
        box-shadow: 0 4px 10px rgba(22, 163, 74, .28);
    }

    .apt-page .apt-seg input:focus-visible+label {
        outline: 2px solid var(--primary);
        outline-offset: 2px;
    }

    /* ===== Add button ===== */
    .apt-page .apt-add-btn {
        font-size: 11.5px;
        font-weight: 800;
        letter-spacing: .02em;
        border: none;
        border-radius: 10px;
        padding: 9px 16px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: #fff;
        box-shadow: 0 2px 6px rgba(22, 163, 74, .3);
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: .15s;
    }

    .apt-page .apt-add-btn:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        transform: translateY(-1px);
        box-shadow: 0 6px 14px rgba(22, 163, 74, .32);
    }

    /* ===== Type grid ===== */
    .apt-page .apt-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 12px;
    }

    .apt-page .apt-item {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 8px;
        background: #fbfdfc;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        padding: 10px 11px;
        transition: .15s;
    }

    .apt-page .apt-item:hover {
        border-color: #d8f0e2;
        background: #fff;
        box-shadow: 0 4px 12px rgba(20, 20, 43, .05);
    }

    .apt-page .apt-item.has-error {
        border-color: #fca5a5;
        background: #fff7f7;
    }

    /* Type name — label pola theriyum, aana editable */
    .apt-page .apt-name {
        width: 100%;
        font-size: 12px;
        font-weight: 800;
        color: var(--ink-900);
        background: transparent;
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 4px 7px;
        transition: .15s;
    }

    .apt-page .apt-name::placeholder {
        font-weight: 700;
        color: #b6bec9;
    }

    .apt-page .apt-name:hover {
        border-color: #eef0f3;
        background: #fff;
    }

    .apt-page .apt-name:focus {
        outline: none;
        background: #fff;
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    /* Code + colour + delete row */
    .apt-page .apt-row {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .apt-page .apt-code {
        flex: 1 1 auto;
        min-width: 0;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink-900);
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        padding: 7px 10px;
        background: #fff;
        transition: .15s;
    }

    .apt-page .apt-code:focus {
        outline: none;
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    /* Colour control — square mattum. Click panna native select illa,
       swatch popover (Add modal picker style) open aagum. */
    .apt-page .apt-color-btn {
        width: 34px;
        height: 34px;
        padding: 0;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        cursor: pointer;
        transition: .15s;
    }

    .apt-page .apt-color-btn:hover,
    .apt-page .apt-color-btn.menu-open,
    .apt-page .apt-color-btn:focus-visible {
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
        outline: none;
    }

    .apt-page .apt-swatch {
        width: 20px;
        height: 20px;
        border-radius: 6px;
        display: inline-block;
        flex-shrink: 0;
        box-shadow: inset 0 0 0 1px rgba(17, 24, 39, .08);
    }

    /* Shared colour popover — body level, adhanala card oda `overflow: hidden`
       la clip aagaadhu (modal-la irundhu varum podhu ellaa row-kkum idhae) */
    .apt-color-menu {
        position: fixed;
        z-index: 1090;
        display: none;
        background: #fff;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        box-shadow: 0 16px 34px rgba(20, 20, 43, .16);
        padding: 10px;
    }

    .apt-color-menu.show {
        display: block;
    }

    .apt-color-menu .grid {
        display: grid;
        grid-template-columns: repeat(5, 26px);
        gap: 8px;
    }

    .apt-color-menu .opt {
        width: 26px;
        height: 26px;
        padding: 0;
        border-radius: 8px;
        border: 2px solid transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: .15s;
        box-shadow: inset 0 0 0 1px rgba(17, 24, 39, .12);
    }

    .apt-color-menu .opt:hover {
        transform: translateY(-2px);
    }

    .apt-color-menu .opt i {
        display: none;
        color: #fff;
        font-size: 12px;
    }

    .apt-color-menu .opt.active {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, .12);
    }

    .apt-color-menu .opt.active i {
        display: block;
    }

    .apt-page .apt-del {
        width: 30px;
        height: 30px;
        border: none;
        border-radius: 9px;
        background: #fee2e2;
        color: #dc2626;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12.5px;
        flex-shrink: 0;
        transition: .15s;
    }

    .apt-page .apt-del:hover {
        background: #dc2626;
        color: #fff;
        transform: translateY(-1px);
    }

    /* Empty state */
    .apt-page .apt-empty {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 6px;
        text-align: center;
        color: var(--ink-500);
        font-size: 12.5px;
        font-weight: 700;
        padding: 30px 16px;
        border: 1px dashed #e2e8f0;
        border-radius: 14px;
        background: #fbfdfc;
    }

    .apt-page .apt-empty.show {
        display: flex;
    }

    .apt-page .apt-empty i {
        font-size: 26px;
        color: #cbd5e1;
    }

    /* ===== Footer actions ===== */
    .apt-page .apt-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 18px;
        padding-top: 16px;
        border-top: 1px solid #f1f4f7;
    }

    .apt-page .apt-submit-btn {
        font-size: 12.5px;
        font-weight: 800;
        border: none;
        border-radius: 11px;
        padding: 10px 26px;
        background: linear-gradient(135deg, #16a34a, #15803d);
        color: #fff;
        box-shadow: 0 4px 12px rgba(22, 163, 74, .3);
        transition: .15s;
    }

    .apt-page .apt-submit-btn:hover {
        background: linear-gradient(135deg, #15803d, #166534);
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(22, 163, 74, .32);
    }

    .apt-page .apt-reset-btn {
        font-size: 12.5px;
        font-weight: 800;
        border-radius: 11px;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: var(--ink-700);
        padding: 10px 20px;
        transition: .15s;
    }

    .apt-page .apt-reset-btn:hover {
        border-color: var(--primary);
        color: var(--primary-dark);
        background: var(--primary-soft);
    }

    /* Count badge */
    .apt-page .apt-count {
        font-size: 11px;
        font-weight: 800;
        border-radius: 999px;
        padding: 3px 10px;
        background: var(--primary-soft);
        color: var(--primary-dark);
    }

    /* ===== Toast (feedback style) ===== */
    .apt-toast-wrap {
        position: fixed;
        top: 16px;
        right: 16px;
        z-index: 2000;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .apt-toast {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        background: #dcfce7;
        color: #15803d;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        padding: 12px 14px;
        min-width: 300px;
        max-width: 380px;
        box-shadow: 0 8px 24px rgba(21, 128, 61, .18);
        font-size: 12.5px;
        font-weight: 600;
        line-height: 1.45;
        animation: aptToastIn .25s ease;
    }

    @keyframes aptToastIn {
        from { opacity: 0; transform: translateX(24px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .apt-toast.apt-toast-out {
        opacity: 0;
        transform: translateX(24px);
        transition: opacity .25s ease, transform .25s ease;
    }

    .apt-toast .apt-toast-ico {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        background: #16a34a;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .apt-toast .apt-toast-x {
        border: none;
        background: transparent;
        color: #15803d;
        font-size: 14px;
        cursor: pointer;
        padding: 0 0 0 6px;
        line-height: 1;
        flex-shrink: 0;
        opacity: .7;
    }

    .apt-toast .apt-toast-x:hover {
        opacity: 1;
    }

    /* ===== Add Appointment Type modal ===== */
    .apt-modal .modal-dialog {
        max-width: 470px;
    }

    .apt-modal .modal-content {
        border: none;
        border-radius: 16px;
        box-shadow: 0 20px 50px rgba(17, 24, 39, .18);
    }

    .apt-modal .modal-header {
        border-bottom: 1px solid #eef0f3;
        padding: 16px 20px;
    }

    .apt-modal .modal-title {
        font-size: 15.5px;
        font-weight: 800;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .apt-modal .modal-title i {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: var(--primary-soft);
        color: var(--primary-dark);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
    }

    .apt-modal .modal-body {
        padding: 20px;
    }

    .apt-modal .form-label {
        font-size: 12px;
        font-weight: 800;
        color: #374151;
        margin-bottom: 5px;
    }

    .apt-modal .form-control {
        font-size: 13px;
        border-radius: 10px;
        border-color: #e5e7eb;
        padding: 9px 12px;
    }

    .apt-modal .form-control:focus {
        border-color: #86efac;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
    }

    .apt-modal .modal-footer {
        border-top: 1px solid #eef0f3;
        padding: 14px 20px;
    }

    /* Colour picker — swatch grid */
    .apt-modal .apt-picker {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .apt-modal .apt-pick {
        width: 34px;
        height: 34px;
        border-radius: 11px;
        border: 2px solid transparent;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: .15s;
        box-shadow: inset 0 0 0 1px rgba(17, 24, 39, .12);
    }

    .apt-modal .apt-pick:hover {
        transform: translateY(-2px);
    }

    .apt-modal .apt-pick i {
        display: none;
        color: #fff;
        font-size: 14px;
    }

    .apt-modal .apt-pick.active {
        border-color: #111827;
        box-shadow: 0 0 0 3px rgba(17, 24, 39, .12);
    }

    .apt-modal .apt-pick.active i {
        display: block;
    }

    /* Picked colour summary */
    .apt-modal .apt-picked {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-top: 12px;
        background: #fbfdfc;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        padding: 7px 12px;
        font-size: 12px;
        font-weight: 800;
        color: var(--ink-900);
    }

    .apt-modal .apt-swatch {
        width: 18px;
        height: 18px;
        border-radius: 5px;
        display: inline-block;
        flex-shrink: 0;
        box-shadow: inset 0 0 0 1px rgba(17, 24, 39, .08);
    }

    .apt-modal .apt-picked .hex {
        font-weight: 700;
        color: var(--ink-500);
        letter-spacing: .02em;
    }
</style>

<main class="apt-page">

    <!-- Title row -->
    <div class="d-flex align-items-start justify-content-between flex-wrap gap-3 mb-3">
        <div class="d-flex align-items-center gap-3">
            <div>
                <h1 class="font-display fw-bold mb-1" style="font-size:1.7rem;">Appointment Types</h1>
            </div>
        </div>
    </div>

    <!-- ===== Your Appointments Settings ===== -->
    <div class="apt-card">
        <div class="apt-card-head">
            <h2 class="apt-card-title"><i class="bi bi-gear-fill"></i>Your Appointments Settings</h2>
        </div>
        <div class="apt-card-body">

            <div class="apt-setting">
                <label class="apt-setting-label">Show appointments summary in appointments dashboard</label>
                <div class="apt-seg">
                    <input type="radio" name="aptSummary" id="aptSummaryYes" value="yes" checked>
                    <label for="aptSummaryYes">Yes</label>
                    <input type="radio" name="aptSummary" id="aptSummaryNo" value="no">
                    <label for="aptSummaryNo">No</label>
                </div>
            </div>

            <div class="apt-setting">
                <label class="apt-setting-label" for="aptDefaultFilter">Default appointments table filter</label>
                <div class="apt-select-wrap">
                    <select class="form-select select2" id="aptDefaultFilter">
                        <option value="">All</option>
                        <option value="Approved">Approved</option>
                        <option value="Pending Approval">Pending Approval</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="Finished">Finished</option>
                        <option value="Upcoming">Upcoming</option>
                        <option value="Missed">Missed</option>
                        <option value="Internal">Internal</option>
                        <option value="External">External</option>
                        <option value="Recurring">Recurring</option>
                        <option value="Lead">Lead</option>
                        <option value="Internal Staff">Internal Staff</option>
                    </select>
                </div>
                <div class="apt-hint">
                    <i class="bi bi-info-circle-fill"></i>
                    <span>If this option is left blank, default table filter will be set as <b>Approved</b></span>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== Appointment Type ===== -->
    <div class="apt-card">
        <div class="apt-card-head">
            <h2 class="apt-card-title">
                <i class="bi bi-palette-fill"></i>Appointment Type
                <span class="apt-count" id="aptTypeCount">0</span>
            </h2>
            <button type="button" class="apt-add-btn" id="aptAddBtn">
                <i class="bi bi-plus-lg"></i>ADD APPOINTMENT TYPE
            </button>
        </div>
        <div class="apt-card-body">

            <div class="apt-grid" id="aptGrid"></div>

            <div class="apt-empty" id="aptEmpty">
                <i class="bi bi-tags"></i>
                <span>No appointment types yet</span>
                <span style="font-weight:600;font-size:11.5px;">Click "Add Appointment Type" to create your first one</span>
            </div>

            <div class="apt-actions">
                <button type="button" class="apt-submit-btn" id="aptSubmitBtn">Submit</button>
                <button type="button" class="apt-reset-btn" id="aptResetBtn">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                </button>
            </div>

        </div>
    </div>

</main>

<!-- Colour popover (row colour change — native select illa) -->
<div class="apt-color-menu" id="aptColorMenu">
    <div class="grid" id="aptColorMenuGrid"></div>
</div>

<!-- ===== Add Appointment Type modal ===== -->
<div class="modal fade apt-modal" id="aptModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-tags-fill"></i>Add Appointment Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label class="form-label" for="aptNewName">* Name</label>
                <input type="text" class="form-control" id="aptNewName" placeholder="Ex: SD - Online Demo" autocomplete="off">

                <label class="form-label mt-3">* Color</label>
                <div class="apt-picker" id="aptPicker"></div>

                <div class="apt-picked">
                    <span class="apt-swatch" id="aptPickedSwatch"></span>
                    <span id="aptPickedName">Green</span>
                    <span class="hex" id="aptPickedHex">#16a34a</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="aptModalSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<script>
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
</script>
