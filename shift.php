<?php include 'header.php'; ?>

 
 

<style>
    /* ===== Shift Table Badges ===== */
    .shift-name-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .shift-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        flex-shrink: 0;
        transition: transform 0.15s ease;
    }
    .shift-name-cell:hover .shift-dot {
        transform: scale(1.2);
    }
    .shift-name-text {
        font-weight: 700;
        font-size: 13.5px;
        color: var(--ink-900);
        line-height: 1.2;
    }
    .shift-tag {
        display: inline-flex;
        align-items: center;
        padding: 2px 7px;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 800;
        border: 1px solid;
        letter-spacing: 0.04em;
        margin-top: 3px;
    }
    .working-hours-pill {
        display: inline-flex;
        align-items: center;
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        background: var(--bg-app);
        color: var(--ink-500);
    }
    .working-hours-pill.has-value {
        background: var(--primary-soft);
        color: var(--primary-dark);
        border: 1px solid var(--primary-lightTwo);
    }

    /* ===== Color picker ===== */
    .color-picker-wrap {
        position: relative;
    }
    .color-picker-trigger {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 8px 14px;
        background: var(--input-bg, #fff);
        border: 1px solid var(--border-soft);
        border-radius: var(--radius-sm, 10px);
        cursor: pointer;
        transition: border-color .15s ease;
        min-height: 38px;
    }
    .color-picker-trigger:hover {
        border-color: var(--ink-300);
    }
    .color-picker-trigger.open {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px var(--primary-light);
    }
    .color-picker-dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        flex-shrink: 0;
        border: 2px solid rgba(0, 0, 0, .08);
    }
    .color-picker-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink-900);
        flex: 1;
        text-align: left;
    }
    .color-picker-placeholder {
        color: var(--ink-300);
    }
    .color-picker-chevron {
        color: var(--ink-500);
        font-size: 12px;
        transition: transform .2s ease;
    }
    .color-picker-trigger.open .color-picker-chevron {
        transform: rotate(180deg);
    }
    .color-picker-dropdown {
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        right: 0;
        background: var(--bg-card, #fff);
        border: 1px solid var(--border-soft);
        border-radius: 12px;
        box-shadow: 0 12px 32px rgba(20, 30, 25, .14);
        padding: 10px;
        z-index: 1055;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-6px);
        transition: opacity .15s ease, transform .15s ease, visibility .15s ease;
    }
    .color-picker-dropdown.open {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    .color-picker-label {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        color: var(--ink-500);
        margin-bottom: 8px;
    }
    .color-picker-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
    }
    .color-picker-option {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 6px 8px;
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all .12s ease;
        background: transparent;
    }
    .color-picker-option:hover {
        background: var(--bg-app);
    }
    .color-picker-option.selected {
        border-color: var(--primary);
        background: var(--primary-soft);
    }
    .color-picker-option .cp-swatch {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .color-picker-option .cp-name {
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-900);
    }

    /* Common timing row */
    .common-timing-row {
        background: var(--primary-soft);
        border: 1px solid var(--primary-lightTwo);
    }
    .timing-input {
        width: 120px;
    }

    .time-input {
        border-top-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
</style>

<!-- Alert notification area -->
<div id="shiftAlertWrap"></div>

<!-- ===== Shift Table Card ===== -->
<div class="card-custom p-0" id="shiftTableWrap">
    <div class="card-head align-items-center justify-content-between border-light-subtle border-bottom mb-0 p-3">
        <div class="d-flex align-items-center gap-3">
            <div class="icon-chip">
                <i class="bi bi-clock-history"></i>
            </div>
            <div>
                <h3 class="card-title mb-0">Shift</h3>
            </div>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#creationModal">
            <i class="mdi mdi-plus"></i>
        </button>
    </div>

    <!-- Table (toolbar auto-created by datatable class) -->
    <div class="table-responsive table-modern-wrap overflow-auto column-border">
        <table class="table-modern w-100 datatable" id="shiftTable">
            <thead>
                <tr>
                    <th style="width: 70px;">S.No</th>
                    <th>Shift Name</th>
                    <th>Shift Timing</th>
                    <th>Working Hours</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="shiftTbody">
                <tr data-id="1" data-shift-name="General Shift" data-color-id="primary" data-color-hex="#16a34a" data-color-name="Green" data-start-time="09:30" data-end-time="18:30" data-status="Enable">
                    <td>1</td>
                    <td class="shift-name-col">
                        <div class="shift-name-cell">
                            <span class="shift-dot" style="background:#16a34a;box-shadow:0 0 0 3px #16a34a25;"></span>
                            <div class="shift-name-text">General Shift</div>
                        </div>
                    </td>
                    <td class="shift-timing-col">
                        <div class="d-flex align-items-center gap-1 text-nowrap">
                            <i class="bi bi-clock text-primary fs-7"></i>
                            <span class="fw-semibold text-dark">09:30 AM – 06:30 PM</span>
                        </div>
                    </td>
                    <td class="shift-hours-col">
                        <span class="working-hours-pill has-value">
                            <i class="bi bi-hourglass-split me-1 text-primary"></i>8h 00m
                        </span>
                    </td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td><span class="text-muted small">18-12-2025</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="2" data-shift-name="Morning Shift" data-color-id="blue" data-color-hex="#3b82f6" data-color-name="Sky Blue" data-start-time="06:00" data-end-time="14:00" data-status="Enable">
                    <td>2</td>
                    <td class="shift-name-col">
                        <div class="shift-name-cell">
                            <span class="shift-dot" style="background:#3b82f6;box-shadow:0 0 0 3px #3b82f625;"></span>
                            <div class="shift-name-text">Morning Shift</div>
                        </div>
                    </td>
                    <td class="shift-timing-col">
                        <div class="d-flex align-items-center gap-1 text-nowrap">
                            <i class="bi bi-clock text-primary fs-7"></i>
                            <span class="fw-semibold text-dark">06:00 AM – 02:00 PM</span>
                        </div>
                    </td>
                    <td class="shift-hours-col">
                        <span class="working-hours-pill has-value">
                            <i class="bi bi-hourglass-split me-1 text-primary"></i>7h 30m
                        </span>
                    </td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td><span class="text-muted small">20-12-2025</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="3" data-shift-name="Evening Shift" data-color-id="amber" data-color-hex="#f59e0b" data-color-name="Amber" data-start-time="14:00" data-end-time="22:00" data-status="Enable">
                    <td>3</td>
                    <td class="shift-name-col">
                        <div class="shift-name-cell">
                            <span class="shift-dot" style="background:#f59e0b;box-shadow:0 0 0 3px #f59e0b25;"></span>
                            <div class="shift-name-text">Evening Shift</div>
                        </div>
                    </td>
                    <td class="shift-timing-col">
                        <div class="d-flex align-items-center gap-1 text-nowrap">
                            <i class="bi bi-clock text-primary fs-7"></i>
                            <span class="fw-semibold text-dark">02:00 PM – 10:00 PM</span>
                        </div>
                    </td>
                    <td class="shift-hours-col">
                        <span class="working-hours-pill has-value">
                            <i class="bi bi-hourglass-split me-1 text-primary"></i>7h 30m
                        </span>
                    </td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td><span class="text-muted small">22-12-2025</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="4" data-shift-name="Night Shift" data-color-id="violet" data-color-hex="#8b5cf6" data-color-name="Violet" data-start-time="22:00" data-end-time="06:00" data-status="Enable">
                    <td>4</td>
                    <td class="shift-name-col">
                        <div class="shift-name-cell">
                            <span class="shift-dot" style="background:#8b5cf6;box-shadow:0 0 0 3px #8b5cf625;"></span>
                            <div class="shift-name-text">Night Shift</div>
                        </div>
                    </td>
                    <td class="shift-timing-col">
                        <div class="d-flex align-items-center gap-1 text-nowrap">
                            <i class="bi bi-clock text-primary fs-7"></i>
                            <span class="fw-semibold text-dark">10:00 PM – 06:00 AM</span>
                        </div>
                    </td>
                    <td class="shift-hours-col">
                        <span class="working-hours-pill has-value">
                            <i class="bi bi-hourglass-split me-1 text-primary"></i>7h 30m
                        </span>
                    </td>
                    <td><span class="status-pill status-approved">Enable</span></td>
                    <td><span class="text-muted small">05-01-2026</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="4" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
                <tr data-id="5" data-shift-name="Weekend Support Shift" data-color-id="pink" data-color-hex="#ec4899" data-color-name="Pink" data-start-time="10:00" data-end-time="19:00" data-status="Disable">
                    <td>5</td>
                    <td class="shift-name-col">
                        <div class="shift-name-cell">
                            <span class="shift-dot" style="background:#ec4899;box-shadow:0 0 0 3px #ec489925;"></span>
                            <div class="shift-name-text">Weekend Support Shift</div>
                        </div>
                    </td>
                    <td class="shift-timing-col">
                        <div class="d-flex align-items-center gap-1 text-nowrap">
                            <i class="bi bi-clock text-primary fs-7"></i>
                            <span class="fw-semibold text-dark">10:00 AM – 07:00 PM</span>
                        </div>
                    </td>
                    <td class="shift-hours-col">
                        <span class="working-hours-pill has-value">
                            <i class="bi bi-hourglass-split me-1 text-primary"></i>8h 00m
                        </span>
                    </td>
                    <td><span class="status-pill status-rejected">Disable</span></td>
                    <td><span class="text-muted small">12-01-2026</span></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm edit btn-edit" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Edit"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-sm danger btn-delete" data-id="5" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Delete"><i class="mdi mdi-delete"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- ============================================================== -->
<!-- Create Shift Modal                                             -->
<!-- ============================================================== -->
<div class="modal fade" id="creationModal" tabindex="-1" aria-labelledby="creationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creationModalLabel">Shift Creation</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="creationForm" onsubmit="return false;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="create_shift_name">Shift Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="create_shift_name" placeholder="Enter shift name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Shift Color <span class="text-danger">*</span></label>
                            <input type="hidden" id="create_shift_color" value="primary" data-hex="#16a34a" data-name="Green">
                            <div class="color-picker-wrap" id="createColorPickerWrap">
                                <div class="color-picker-trigger" id="createColorPickerTrigger" tabindex="0">
                                    <span class="color-picker-dot" id="createColorPickerDot" style="background:#16a34a;"></span>
                                    <span class="color-picker-name" id="createColorPickerName">Green</span>
                                    <i class="bi bi-chevron-down color-picker-chevron"></i>
                                </div>
                                <div class="color-picker-dropdown" id="createColorPickerDropdown">
                                    <div class="color-picker-label">Select Color</div>
                                    <div class="color-picker-grid">
                                        <div class="color-picker-option selected" data-id="primary" data-hex="#16a34a" data-name="Green">
                                            <span class="cp-swatch" style="background:#16a34a;"></span>
                                            <span class="cp-name">Green</span>
                                        </div>
                                        <div class="color-picker-option" data-id="blue" data-hex="#3b82f6" data-name="Sky Blue">
                                            <span class="cp-swatch" style="background:#3b82f6;"></span>
                                            <span class="cp-name">Sky Blue</span>
                                        </div>
                                        <div class="color-picker-option" data-id="amber" data-hex="#f59e0b" data-name="Amber">
                                            <span class="cp-swatch" style="background:#f59e0b;"></span>
                                            <span class="cp-name">Amber</span>
                                        </div>
                                        <div class="color-picker-option" data-id="red" data-hex="#ef4444" data-name="Coral Red">
                                            <span class="cp-swatch" style="background:#ef4444;"></span>
                                            <span class="cp-name">Coral Red</span>
                                        </div>
                                        <div class="color-picker-option" data-id="violet" data-hex="#8b5cf6" data-name="Violet">
                                            <span class="cp-swatch" style="background:#8b5cf6;"></span>
                                            <span class="cp-name">Violet</span>
                                        </div>
                                        <div class="color-picker-option" data-id="pink" data-hex="#ec4899" data-name="Pink">
                                            <span class="cp-swatch" style="background:#ec4899;"></span>
                                            <span class="cp-name">Pink</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Shift Timing <span class="text-danger">*</span></label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted" style="font-size:12px;">Start</span>
                                        <div class="time-picker" style="flex:1;"><input type="text" class="time-input form-control" id="create_common_start" placeholder="HH:MM" autocomplete="off"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted" style="font-size:12px;">End</span>
                                        <div class="time-picker" style="flex:1;"><input type="text" class="time-input form-control" id="create_common_end" placeholder="HH:MM" autocomplete="off"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="create_status">Status</label>
                            <select class="form-select select2" id="create_status">
                                <option value="Enable" selected>Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnCreateSave">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Edit Shift Modal                                                -->
<!-- ============================================================== -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Shift</h5>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form id="editForm" onsubmit="return false;">
                    <input type="hidden" id="edit_shift_id">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="edit_shift_name">Shift Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_shift_name" placeholder="Enter shift name" autocomplete="off">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Shift Color <span class="text-danger">*</span></label>
                            <input type="hidden" id="edit_shift_color" value="primary" data-hex="#16a34a" data-name="Green">
                            <div class="color-picker-wrap" id="editColorPickerWrap">
                                <div class="color-picker-trigger" id="editColorPickerTrigger" tabindex="0">
                                    <span class="color-picker-dot" id="editColorPickerDot" style="background:#16a34a;"></span>
                                    <span class="color-picker-name" id="editColorPickerName">Green</span>
                                    <i class="bi bi-chevron-down color-picker-chevron"></i>
                                </div>
                                <div class="color-picker-dropdown" id="editColorPickerDropdown">
                                    <div class="color-picker-label">Select Color</div>
                                    <div class="color-picker-grid">
                                        <div class="color-picker-option" data-id="primary" data-hex="#16a34a" data-name="Green">
                                            <span class="cp-swatch" style="background:#16a34a;"></span>
                                            <span class="cp-name">Green</span>
                                        </div>
                                        <div class="color-picker-option" data-id="blue" data-hex="#3b82f6" data-name="Sky Blue">
                                            <span class="cp-swatch" style="background:#3b82f6;"></span>
                                            <span class="cp-name">Sky Blue</span>
                                        </div>
                                        <div class="color-picker-option" data-id="amber" data-hex="#f59e0b" data-name="Amber">
                                            <span class="cp-swatch" style="background:#f59e0b;"></span>
                                            <span class="cp-name">Amber</span>
                                        </div>
                                        <div class="color-picker-option" data-id="red" data-hex="#ef4444" data-name="Coral Red">
                                            <span class="cp-swatch" style="background:#ef4444;"></span>
                                            <span class="cp-name">Coral Red</span>
                                        </div>
                                        <div class="color-picker-option" data-id="violet" data-hex="#8b5cf6" data-name="Violet">
                                            <span class="cp-swatch" style="background:#8b5cf6;"></span>
                                            <span class="cp-name">Violet</span>
                                        </div>
                                        <div class="color-picker-option" data-id="pink" data-hex="#ec4899" data-name="Pink">
                                            <span class="cp-swatch" style="background:#ec4899;"></span>
                                            <span class="cp-name">Pink</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Shift Timing <span class="text-danger">*</span></label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted" style="font-size:12px;">Start</span>
                                        <div class="time-picker" style="flex:1;"><input type="text" class="time-input form-control" id="edit_common_start" placeholder="HH:MM" autocomplete="off"></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted" style="font-size:12px;">End</span>
                                        <div class="time-picker" style="flex:1;"><input type="text" class="time-input form-control" id="edit_common_end" placeholder="HH:MM" autocomplete="off"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="edit_status">Status</label>
                            <select class="form-select select2" id="edit_status">
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnEditSave">
                    <i class="mdi mdi-content-save me-1"></i> Save Changes
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/js/pages/shift.js?v=<?php echo time(); ?>"></script>

 

<?php include 'footer.php'; ?>
