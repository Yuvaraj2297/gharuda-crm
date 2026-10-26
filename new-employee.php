<?php include 'header.php'; ?>

 


<style>
    :root {
        --aw-ink-900: var(--ink-900, #14162b);
        --aw-ink-700: var(--ink-700, #3f4453);
        --aw-ink-500: var(--ink-500, #7a7f8c);
        --aw-ink-300: var(--ink-300, #b7bbc6);
        --aw-border: var(--border-light, #eef0f3);
        --aw-red: var(--accent-red, #e5484d);
        --aw-green: var(--primary-dark, #0ca308);
        --aw-green-soft: var(--primary-light, #e8f7ea);
    }

    /* ===== Tab bar (like reference design) ===== */
    .ne-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 0 26px;
        background: var(--white, #fff);
        border: 1px solid var(--aw-border);
        border-radius: 14px;
        padding: 4px 22px;
        margin-bottom: 16px;
    }

    .ne-tab {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 14px 2px 12px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--aw-ink-700);
        cursor: pointer;
        user-select: none;
        white-space: nowrap;
        border-bottom: 2.5px solid transparent;
        transition: color .2s ease, border-color .2s ease;
    }

    .btn.btn-outline-secondary:hover {
        color: #fff !important;
    }

    .ne-tab i {
        font-size: 14.5px;
    }

    .ne-tab:hover {
        color: var(--aw-ink-900);
    }

    .ne-tab.active {
        color: var(--primary);
        border-bottom-color: var(--primary);
    }

    .ne-tab.completed {
        color: var(--primary-dark);
    }

    .ne-tab.completed i {
        color: var(--primary-dark);
    }

    /* ===== Panels ===== */
    .ne-panel {
        display: none;
        animation: neFadeIn .35s ease;
    }

    .ne-panel.active {
        display: block;
    }

    @keyframes neFadeIn {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== Photo / file upload box ===== */
    .aw-upload-box {
        width: 100%;
        min-height: 206px;
        border: 1.5px dashed var(--aw-ink-300);
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 6px;
        color: var(--aw-ink-500);
        font-size: 12px;
        text-align: center;
        cursor: pointer;
        background: #fafbfc;
        transition: border-color .2s ease, background .2s ease;
        overflow: hidden;
        position: relative;
    }

    .aw-upload-box:hover {
        border-color: var(--primary);
        background: var(--primary-light);
    }

    .aw-upload-box i {
        font-size: 22px;
        color: var(--aw-ink-300);
    }

    .aw-upload-box .aw-upload-title {
        font-weight: 600;
        color: var(--aw-ink-900);
        font-size: 13px;
    }

    .aw-upload-box img.aw-preview {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .aw-upload-box.aw-has-image .aw-upload-hint,
    .aw-upload-box.aw-has-image .aw-upload-title,
    .aw-upload-box.aw-has-image i {
        display: none;
    }

    /* ===== Section heading like "Personal Details :-" ===== */
    .ne-section-title {
        font-size: 14.5px;
        font-weight: 800;
        color: var(--aw-ink-900);
        text-decoration: underline;
        text-underline-offset: 4px;
        margin: 6px 0 16px;
    }

    .ne-section-title:not(:first-child) {
        margin-top: 26px;
        padding-top: 22px;
        border-top: 1px solid var(--aw-border);
    }

    /* ===== Relieving Request ===== */
    .ne-rel-emp-card {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 14px 18px;
        background: linear-gradient(135deg, #f8f9fb 0%, #ffffff 100%);
        border: 1px solid var(--aw-border);
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .ne-rel-emp-avatar {
        font-size: 36px;
        color: var(--primary);
    }
    .ne-rel-emp-name {
        font-size: 14px;
        font-weight: 700;
        color: var(--aw-ink-900);
    }
    .ne-rel-emp-dept {
        font-size: 12px;
        color: var(--aw-ink-500);
    }
    .ne-rel-check {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        background: #fff;
        border: 1px solid var(--aw-border);
        border-radius: 8px;
        cursor: pointer;
        transition: border-color .2s, background .2s;
        font-size: 13px;
        font-weight: 600;
        color: var(--aw-ink-700);
    }
    .ne-rel-check:hover {
        border-color: var(--primary);
        background: var(--primary-light);
    }
    .ne-rel-check input:checked ~ span {
        color: var(--primary-dark);
    }
    .ne-rel-check input {
        accent-color: var(--primary);
        width: 16px;
        height: 16px;
    }
    .ne-rel-progress-wrap {
        margin-top: 20px;
        padding: 14px 18px;
        background: #f8f9fb;
        border-radius: 10px;
    }
    .ne-rel-progress-label {
        display: flex;
        justify-content: space-between;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--aw-ink-700);
        margin-bottom: 8px;
    }
    .ne-rel-progress-bar {
        height: 8px;
        background: #e9ecef;
        border-radius: 4px;
        overflow: hidden;
    }
    .ne-rel-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        border-radius: 4px;
        transition: width .4s ease;
    }
    .ne-rel-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid var(--aw-border);
    }
    .ne-rel-toast {
        position: fixed;
        bottom: 24px;
        right: 24px;
        padding: 12px 20px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        color: #fff;
        z-index: 9999;
        transform: translateY(20px);
        opacity: 0;
        transition: all .3s ease;
        box-shadow: 0 4px 14px rgba(0,0,0,.15);
    }
    .ne-rel-toast.show {
        transform: translateY(0);
        opacity: 1;
    }
    .ne-rel-toast-success { background: #22c55e; }
    .ne-rel-toast-info { background: var(--primary); }

    /* ===== Approval Timeline ===== */
    .ne-rel-timeline {
        position: relative;
        padding-left: 32px;
        margin-top: 18px;
    }
    .ne-rel-timeline::before {
        content: '';
        position: absolute;
        left: 14px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }
    .ne-rel-tl-step {
        position: relative;
        padding: 12px 0 24px 20px;
    }
    .ne-rel-tl-step:last-child { padding-bottom: 0; }
    .ne-rel-tl-step::before {
        content: '';
        position: absolute;
        left: -18px;
        top: 14px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #d1d5db;
        border: 2px solid #fff;
        z-index: 1;
    }
    .ne-rel-tl-step.completed::before { background: #22c55e; box-shadow: 0 0 0 3px rgba(34,197,94,.15); }
    .ne-rel-tl-step.pending::before { background: #f59e0b; box-shadow: 0 0 0 3px rgba(245,158,11,.15); animation: neRelPulse 2s infinite; }
    .ne-rel-tl-step.rejected::before { background: #ef4444; box-shadow: 0 0 0 3px rgba(239,68,68,.15); }
    @keyframes neRelPulse {
        0%, 100% { box-shadow: 0 0 0 3px rgba(245,158,11,.15); }
        50% { box-shadow: 0 0 0 6px rgba(245,158,11,.08); }
    }
    .ne-rel-tl-body { display: flex; flex-direction: column; gap: 2px; }
    .ne-rel-tl-title { font-size: 13px; font-weight: 700; color: #111827; }
    .ne-rel-tl-desc { font-size: 12px; color: #6b7280; }
    .ne-rel-tl-time { font-size: 11px; color: #9ca3af; font-weight: 600; }
    .ne-rel-tl-badge {
        position: absolute;
        right: 0;
        top: 14px;
        font-size: 11.5px;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 20px;
    }
    .ne-rel-tl-badge.approved { background: #dcfce7; color: #16a34a; }
    .ne-rel-tl-badge.pending { background: #fef3c7; color: #d97706; }
    .ne-rel-tl-badge.rejected { background: #fee2e2; color: #dc2626; }

    /* ===== Work Completion Modal ===== */
    .ne-work-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.5);
        z-index: 9999;
        align-items: center;
        justify-content: center;
        backdrop-filter: blur(4px);
    }
    .ne-work-modal-overlay.show { display: flex; }
    .ne-work-modal {
        background: #fff;
        border-radius: 20px;
        width: 520px;
        max-width: 92vw;
        box-shadow: 0 25px 80px rgba(0,0,0,.25);
        transform: translateY(30px) scale(.95);
        transition: transform .3s cubic-bezier(.4,0,.2,1);
        overflow: hidden;
    }
    .ne-work-modal-overlay.show .ne-work-modal { transform: translateY(0) scale(1); }
    .ne-work-modal-head {
        position: relative;
        padding: 24px 24px 20px;
        background: linear-gradient(135deg, #059669 0%, #22c55e 50%, #4ade80 100%);
        color: #fff;
        text-align: center;
    }
    .ne-work-modal-head::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 20px;
        background: #fff;
        border-radius: 20px 20px 0 0;
    }
    .ne-work-modal-close {
        position: absolute;
        top: 12px;
        right: 16px;
        background: rgba(255,255,255,.2);
        border: none;
        font-size: 18px;
        color: #fff;
        cursor: pointer;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
    }
    .ne-work-modal-close:hover { background: rgba(255,255,255,.35); }
    .ne-work-head-icon {
        width: 56px;
        height: 56px;
        background: rgba(255,255,255,.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-size: 26px;
    }
    .ne-work-head-title { font-size: 17px; font-weight: 800; margin: 0 0 2px; }
    .ne-work-head-sub { font-size: 12px; opacity: .85; }
    .ne-work-modal-body { padding: 8px 24px 20px; }
    .ne-work-emp-info {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
        border: 1px solid #bbf7d0;
        border-radius: 12px;
        margin-bottom: 18px;
    }
    .ne-work-emp-avatar { font-size: 36px; color: #059669; }
    .ne-work-emp-name { font-size: 14px; font-weight: 700; color: #111827; }
    .ne-work-emp-dept { font-size: 12px; color: #6b7280; }
    .ne-work-section-title {
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #9ca3af;
        margin-bottom: 10px;
    }
    .ne-work-checklist {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin-bottom: 18px;
    }
    .ne-work-check-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        background: #fff;
        border: 1.5px solid #f0f0f0;
        border-radius: 12px;
        cursor: pointer;
        transition: all .25s ease;
    }
    .ne-work-check-item:hover { border-color: #86efac; background: #f0fdf4; transform: translateX(4px); }
    .ne-work-check-item.checked { border-color: #22c55e; background: #f0fdf4; }
    .ne-work-check-num {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #f3f4f6;
        color: #9ca3af;
        font-size: 12px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all .25s ease;
    }
    .ne-work-check-item.checked .ne-work-check-num {
        background: #22c55e;
        color: #fff;
    }
    .ne-work-check-icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: #f3f4f6;
        color: #6b7280;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
        transition: all .25s ease;
    }
    .ne-work-check-item.checked .ne-work-check-icon {
        background: #dcfce7;
        color: #16a34a;
    }
    .ne-work-check-text { flex: 1; }
    .ne-work-check-label { font-size: 13px; font-weight: 600; color: #374151; margin: 0; }
    .ne-work-check-desc { font-size: 11px; color: #9ca3af; margin-top: 1px; }
    .ne-work-check-item input { display: none; }
    .ne-work-progress {
        margin-bottom: 4px;
    }
    .ne-work-progress-label {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        margin-bottom: 8px;
    }
    .ne-work-progress-label .pct {
        color: #059669;
        font-weight: 800;
    }
    .ne-work-progress-bar {
        height: 8px;
        background: #e5e7eb;
        border-radius: 4px;
        overflow: hidden;
    }
    .ne-work-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #059669, #22c55e, #4ade80);
        border-radius: 4px;
        transition: width .4s cubic-bezier(.4,0,.2,1);
    }
    .ne-work-progress-fill.complete {
        background: linear-gradient(90deg, #059669, #22c55e);
        box-shadow: 0 0 12px rgba(34,197,94,.3);
    }
    .ne-work-modal-foot {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 16px 24px;
        border-top: 1px solid #f0f0f0;
        background: #fafbfc;
    }

    .form-label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--aw-ink-900);
        margin-bottom: 6px;
    }

    .ne-req {
        color: var(--aw-red);
    }

    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: var(--aw-red) !important;
    }

    /* ===== Phone input group ===== */
    .ne-phone .input-group-text {
        background: #fff;
        border-right: 0;
        font-size: 12.5px;
        color: var(--aw-ink-700);
    }

    .ne-phone .form-control {
        border-left: 0;
        padding-left: 4px;
    }

    .ne-phone .form-control:focus {
        box-shadow: none;
        border-color: #dee2e6;
    }

    /* ===== Upload box ===== */
    .ne-upload-box {
        width: 100%;
        min-height: 220px;
        border: 1.5px dashed var(--aw-ink-300);
        border-radius: 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 6px;
        color: var(--aw-ink-500);
        font-size: 12px;
        text-align: center;
        cursor: pointer;
        background: #fafbfc;
        transition: border-color .2s ease, background .2s ease;
        overflow: hidden;
        position: relative;
    }

    .ne-upload-box:hover {
        border-color: var(--primary);
        background: var(--primary-light);
    }

    .ne-upload-box i {
        font-size: 22px;
        color: var(--aw-ink-300);
    }

    .ne-upload-box .ne-upload-title {
        font-weight: 600;
        color: var(--aw-ink-900);
        font-size: 13px;
    }

    .ne-upload-box img.ne-preview {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .ne-upload-box.ne-has-image .ne-upload-hint,
    .ne-upload-box.ne-has-image .ne-upload-title,
    .ne-upload-box.ne-has-image i {
        display: none;
    }

    /* ===== Welcome kit rows ===== */
    .ne-wk-row {
        display: grid;
        grid-template-columns: 1fr 1fr auto;
        gap: 14px;
        align-items: end;
        padding-bottom: 12px;
        margin-bottom: 12px;
        border-bottom: 1px dashed var(--aw-border);
    }

    .ne-wk-row .btn-remove {
        border: none;
        background: var(--accent-red-soft, #fdecec);
        color: var(--aw-red);
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        padding: 7px 12px;
        margin-bottom: 2px;
    }

    .ne-check {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        color: var(--aw-ink-900);
        cursor: pointer;
    }

    .ne-check input {
        accent-color: var(--primary);
        width: 15px;
        height: 15px;
    }

    /* ===== Week Off (multiple) : step flow + calendar preview ===== */
    .ne-wo-card {
        border: 1px solid var(--aw-ink-200, #e3e8ef);
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 1px 3px rgba(16, 24, 40, .06);
        padding: 20px;
    }

    .ne-wo-step {
        position: relative;
        padding-left: 44px;
        padding-bottom: 20px;
    }

    .ne-wo-step:not(:last-of-type)::before {
        content: "";
        position: absolute;
        left: 15px;
        top: 34px;
        bottom: 4px;
        width: 2px;
        background: var(--aw-ink-200, #e3e8ef);
    }

    .ne-wo-step .num {
        position: absolute;
        left: 0;
        top: 0;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ne-wo-step h6 {
        margin: 0;
        font-size: 13.5px;
        font-weight: 700;
        color: var(--aw-ink-900, #111827);
    }

    .ne-wo-step .sub {
        font-size: 11.5px;
        color: var(--aw-ink-500, #6b7280);
        margin-bottom: 10px;
    }

    .ne-wo-days,
    .ne-wo-weeks {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .ne-wo-chipbtn {
        border: 1.5px solid var(--aw-ink-200, #e3e8ef);
        background: #fff;
        color: var(--aw-ink-700, #374151);
        border-radius: 999px;
        padding: 7px 14px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all .15s;
    }

    .ne-wo-chipbtn:hover:not(:disabled) {
        border-color: var(--primary);
        color: var(--primary);
    }

    .ne-wo-chipbtn.active {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    .ne-wo-chipbtn:disabled {
        opacity: .4;
        cursor: not-allowed;
    }

    .ne-wo-altitem {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        background: #f5f7ff;
        border: 1px solid #dfe5ff;
        border-radius: 10px;
        padding: 8px 12px;
        margin-bottom: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #3730a3;
    }

    .ne-wo-altitem button {
        border: 0;
        background: transparent;
        color: #dc2626;
        cursor: pointer;
        font-size: 14px;
        line-height: 1;
    }

    .ne-wo-addlink {
        border: 1.5px dashed var(--primary);
        background: transparent;
        color: var(--primary);
        border-radius: 10px;
        padding: 7px 14px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
    }

    .ne-wo-addlink:hover {
        background: #f5f7ff;
    }

    .ne-wo-form {
        margin-top: 4px;
        padding: 14px;
        border: 1px solid var(--aw-ink-200, #e3e8ef);
        border-radius: 12px;
        background: #fafbfc;
    }

    .ne-wo-form .lbl {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--aw-ink-500, #6b7280);
        text-transform: uppercase;
        letter-spacing: .4px;
        margin: 0 0 6px;
    }

    .ne-wo-form .lbl:not(:first-child) {
        margin-top: 12px;
    }

    .ne-wo-form-actions {
        display: flex;
        gap: 8px;
        margin-top: 14px;
    }

    .ne-wo-result {
        margin-top: 4px;
        padding: 12px 14px;
        border-radius: 12px;
        background: #ecfdf3;
        border: 1px solid #b7ebcd;
        font-size: 12.5px;
        color: #05603a;
    }

    .ne-wo-result b {
        display: block;
        margin-bottom: 2px;
    }

    .ne-wo-result.empty {
        background: #f8fafc;
        border-color: var(--aw-ink-200, #e3e8ef);
        color: var(--aw-ink-500, #6b7280);
        height:45px;
    }

    .ne-wo-clear {
        border: 0;
        background: transparent;
        color: #dc2626;
        font-size: 12px;
        cursor: pointer;
        padding: 0;
        margin-top: 6px;
    }

    /* calendar preview */
    .ne-wo-cal {
        border: 1px solid var(--aw-ink-200, #e3e8ef);
        border-radius: 12px;
        padding: 14px;
        background: #fafbfc;
        height: 100%;
    }

    .ne-wo-cal-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .ne-wo-cal-head .t {
        font-size: 13.5px;
        font-weight: 700;
    }

    .ne-wo-cal-head button {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        border: 1px solid var(--aw-ink-200, #e3e8ef);
        background: #fff;
        cursor: pointer;
        line-height: 1;
    }

    .ne-wo-cal-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
        text-align: center;
    }

    .ne-wo-cal-grid .dow {
        font-size: 10.5px;
        font-weight: 600;
        color: var(--aw-ink-500, #6b7280);
        padding-bottom: 4px;
    }

    .ne-wo-cal-grid .d {
        aspect-ratio: 1 / 1;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 12px;
        color: var(--aw-ink-700, #374151);
        background: #fff;
        border: 1px solid transparent;
    }

    .ne-wo-cal-grid .d.off {
        background: var(--primary);
        color: #fff;
        font-weight: 700;
    }

    .ne-wo-cal-grid .d.today {
        border-color: #f59e0b;
    }

    .ne-wo-legend {
        display: flex;
        gap: 14px;
        margin-top: 10px;
        font-size: 11.5px;
        color: var(--aw-ink-500, #6b7280);
    }

    .ne-wo-legend i {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 3px;
        margin-right: 5px;
        vertical-align: -1px;
    }

    /* ===== Placeholder panels ===== */
    .ne-placeholder {
        border: 1.5px dashed var(--aw-ink-300);
        border-radius: 14px;
        background: #fafbfc;
        padding: 70px 20px;
        text-align: center;
        color: var(--aw-ink-500);
    }

    .ne-placeholder i {
        font-size: 34px;
        color: var(--aw-ink-300);
        margin-bottom: 12px;
        display: inline-block;
    }

    .ne-placeholder h6 {
        font-size: 14px;
        font-weight: 700;
        color: var(--aw-ink-900);
        margin-bottom: 6px;
    }

    .ne-placeholder p {
        font-size: 12.5px;
        margin-bottom: 0;
    }

    /* ===== Footer nav ===== */
    .ne-footer-nav {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid var(--aw-border);
    }

    .ne-footer-nav .ne-spacer {
        margin-right: auto;
    }

    /* ===== Review ===== */
    .ne-review-section {
        border: 1px solid var(--aw-border);
        border-radius: 14px;
        padding: 0;
        margin-bottom: 14px;
        background: var(--white, #fff);
        overflow: hidden;
        transition: box-shadow .2s ease, border-color .2s ease;
    }

    .ne-review-section:hover {
        border-color: var(--primary);
        box-shadow: 0 4px 18px rgba(12, 163, 8, .08);
    }

    .ne-review-section h6 {
        font-size: 12px;
        font-weight: 700;
        color: var(--aw-ink-900);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        background: linear-gradient(135deg, #f8f9fb 0%, #f1f5f9 100%);
        border-bottom: 1px solid var(--aw-border);
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .ne-review-section h6 i {
        color: var(--primary);
        font-size: 14px;
    }

    .ne-review-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
        gap: 0;
    }

    .ne-review-item {
        padding: 10px 18px;
        border-bottom: 1px dashed var(--aw-border);
        border-right: 1px dashed var(--aw-border);
        transition: background .15s ease;
    }

    .ne-review-item:hover {
        background: #f6fdf6;
    }

    .ne-review-item .k {
        font-size: 10.5px;
        color: var(--aw-ink-500);
        margin-bottom: 2px;
        text-transform: uppercase;
        letter-spacing: .3px;
    }

    .ne-review-item .v {
        font-size: 13px;
        font-weight: 600;
        color: var(--aw-ink-900);
        word-break: break-word;
    }

    .ne-review-item .v:empty::after {
        content: '—';
        color: var(--aw-ink-300);
        font-weight: 400;
    }

    /* Confirm accuracy strip */
    .ne-confirm-strip {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1.5px dashed var(--primary);
        background: var(--primary-light, #e8f7ea);
        border-radius: 12px;
        padding: 14px 18px;
        margin-top: 16px;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease;
    }

    .ne-confirm-strip:hover {
        background: #d9f2dc;
    }

    .ne-confirm-strip .form-check-input {
        width: 18px;
        height: 18px;
        margin: 0;
        cursor: pointer;
        flex-shrink: 0;
    }

    .ne-confirm-strip .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .ne-confirm-strip .form-check-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--aw-ink-900);
        cursor: pointer;
        margin: 0;
    }

    /* ===== Permissions ===== */
    .ne-perm-header {
        display: grid;
        grid-template-columns: 200px 1fr auto;
        gap: 12px;
        align-items: center;
        padding: 13px 20px 13px 24px;
        background: linear-gradient(135deg, #f8f9fb 0%, #f1f5f9 100%);
        /* border-bottom: 2px solid var(--primary); */
        font-size: 11.5px;
        font-weight: 700;
        color: var(--aw-ink-500);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: sticky;
        top: 0;
        z-index: 2;
    }

    .ne-perm-wrapper {
        border: 1px solid var(--aw-border);
        border-radius: 14px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 1px 3px rgba(16, 24, 40, .05), 0 8px 24px -18px rgba(16, 24, 40, .18);
        /* max-height: 620px; */
        /* overflow-y: auto; */
    }

    .ne-perm-group-label {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 20px 12px 24px;
        background: linear-gradient(135deg, #f2faf3 0%, #f9fdf9 100%);
        border: 2px solid var(--primary);
        border-left: 4px solid var(--primary);
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: var(--primary-dark);
        transition: background .25s ease, border-left-color .25s ease;
    }

    .ne-perm-group-label:hover {
        background: linear-gradient(135deg, #e9f7ec 0%, #f5fcf6 100%);
        border-left-color: var(--primary-dark, #0f7a38);
    }

    .ne-perm-group-label i {
        width: 26px;
        height: 26px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-light, #e8f7ea);
        border-radius: 8px;
        font-size: 13px;
        color: var(--primary, #0ca308);
        flex-shrink: 0;
        transition: transform .25s cubic-bezier(.34, 1.4, .64, 1), box-shadow .2s ease;
    }

    .ne-perm-group-label:hover i {
        transform: rotate(-8deg) scale(1.12);
        box-shadow: 0 3px 8px rgba(12, 163, 8, .2);
    }

    .ne-perm-row {
        position: relative;
        display: grid;
        grid-template-columns: 200px 1fr auto;
        gap: 12px;
        align-items: center;
        padding: 12px 20px 12px 24px;
        border-bottom: 1px solid #f2f4f6;
        font-size: 13px;
        color: var(--aw-ink-900);
        transition: background .25s ease;
        animation: nePermRowIn .5s cubic-bezier(.22, 1, .36, 1) both;
        animation-delay: calc(var(--i, 0) * 18ms);
    }

    /* animated left accent bar — grows in on hover */
    .ne-perm-row::before {
        /* content: ''; */
        position: absolute;
        left: 0;
        top: 50%;
        width: 4px;
        height: 68%;
        border-radius: 0 4px 4px 0;
        background: linear-gradient(180deg, var(--primary, #0ca308), #34d399);
        box-shadow: 0 0 14px rgba(12, 163, 8, .45);
        transform: translateY(-50%) scaleY(0);
        opacity: 0;
        transition: transform .32s cubic-bezier(.34, 1.35, .64, 1), opacity .2s ease;
    }

    .ne-perm-row:hover::before {
        transform: translateY(-50%) scaleY(1);
        opacity: 1;
    }

    .ne-perm-row:hover {
        background: linear-gradient(90deg, #f3fbf4 0%, #fbfdfb 45%, #fff 100%);
    }

    .ne-perm-row.perm-row-complete {
        background: linear-gradient(90deg, #f0faf1 0%, #fff 70%);
    }

    .ne-perm-row.perm-row-complete::before {
        transform: translateY(-50%) scaleY(1);
        opacity: 1;
        background: linear-gradient(180deg, var(--primary, #0ca308), #86efac);
    }

    .ne-perm-row.perm-row-complete .ne-perm-col-feature::before {
        background: var(--primary, #0ca308);
        width: 6px;
        height: 6px;
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .16);
        animation: neDotPop .35s cubic-bezier(.34, 1.56, .64, 1);
    }

    @keyframes neDotPop {
        50% {
            transform: scale(1.9);
        }

        100% {
            transform: scale(1);
        }
    }

    @keyframes nePermRowIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ne-perm-row:last-child {
        border-bottom: 0;
    }

    .ne-perm-col-feature {
        font-weight: 600;
        font-size: 12.5px;
        color: var(--aw-ink-900);
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .ne-perm-col-feature::before {
        content: '';
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #c3cad3;
        flex-shrink: 0;
        transition: background .25s ease, transform .25s cubic-bezier(.34, 1.4, .64, 1), box-shadow .25s ease;
    }

    .ne-perm-row:hover .ne-perm-col-feature::before {
        background: var(--primary, #0ca308);
        transform: scale(1.35);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .14);
    }

    .ne-perm-col-caps {
        display: flex;
        flex-wrap: wrap;
        gap: 6px 20px;
        align-items: center;
    }

    .ne-perm-check {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 12.5px;
        font-weight: 600;
        color: var(--aw-ink-700);
        cursor: pointer;
        white-space: nowrap;
        padding: 4px 9px;
        border-radius: 8px;
        transition: background .15s ease, color .15s ease;
        user-select: none;
    }

    .ne-perm-check:hover {
        background: #f2faf3;
        color: var(--primary-dark, #0f7a38);
    }

    /* toggle switch (replaces native checkbox) */
    .ne-perm-check input {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        width: 32px;
        height: 18px;
        border-radius: 999px;
        background: #dde2e8;
        cursor: pointer;
        transition: background .2s ease;
        flex-shrink: 0;
        margin: 0;
    }

    .ne-perm-check input::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 1px 3px rgba(16, 24, 40, .3);
        transition: transform .22s cubic-bezier(.34, 1.3, .64, 1);
    }

    .ne-perm-check input::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 999px;
        box-shadow: 0 0 0 0 rgba(12, 163, 8, .35);
        pointer-events: none;
    }

    .ne-perm-check input:checked::before {
        animation: neSwitchRipple .5s ease-out;
    }

    @keyframes neSwitchRipple {
        from {
            box-shadow: 0 0 0 0 rgba(12, 163, 8, .35);
        }

        to {
            box-shadow: 0 0 0 10px rgba(12, 163, 8, 0);
        }
    }

    .ne-perm-check input:checked {
        background: var(--primary, #0ca308);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .12);
    }

    .ne-perm-check input:checked::after {
        transform: translateX(14px);
    }

    .ne-perm-check input:focus-visible {
        outline: 2px solid var(--primary, #0ca308);
        outline-offset: 2px;
    }

    /* checked label state */
    .ne-perm-check.perm-checked,
    .ne-perm-check:has(input:checked) {
        color: var(--primary-dark, #0f7a38);
    }

    .ne-perm-check-all {
        font-size: 11px;
        font-weight: 700;
        color: var(--primary-dark, #0f7a38);
        background: var(--primary-light, #e8f7ea);
        cursor: pointer;
        padding: 5px 12px;
        border-radius: 999px;
        white-space: nowrap;
        transition: background .15s ease, transform .1s ease;
    }

    .ne-perm-check-all:hover {
        background: #cdefd2;
    }

    .ne-perm-check-all:active {
        transform: scale(.95);
    }

    /* ===== Leave Auto-Update Rules (same design language as Permissions) ===== */
    .ne-leave-rules-wrapper {
        border: 1px solid var(--aw-border);
        border-radius: 14px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 1px 3px rgba(16, 24, 40, .05), 0 8px 24px -18px rgba(16, 24, 40, .18);
    }

    .ne-leave-rules-wrapper .ne-kyc-table {
        margin: 0;
        width: 100%;
    }

    .ne-leave-rules-wrapper thead th {
        background: linear-gradient(135deg, #f8f9fb 0%, #f1f5f9 100%);
        border-bottom: 2px solid var(--primary);
        font-size: 11.5px;
        font-weight: 700;
        color: var(--aw-ink-500);
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 13px 16px;
    }

    .ne-leave-rule-row {
        transition: background .25s ease;
        animation: nePermRowIn .5s cubic-bezier(.22, 1, .36, 1) both;
        animation-delay: calc(var(--i, 0) * 60ms);
    }

    .ne-leave-rule-row td {
        padding: 14px 16px;
        border-bottom: 1px solid #f2f4f6;
    }

    /* animated left accent bar — lives on the FIRST td (pseudo-elements on <tr>
       are rendered as anonymous extra cells by browsers, which broke the layout) */
    .ne-leave-rule-row td:first-child {
        position: relative;
        padding-left: 24px;
    }

    .ne-leave-rule-row td:first-child::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        width: 4px;
        height: 58%;
        border-radius: 0 4px 4px 0;
        background: linear-gradient(180deg, var(--primary, #0ca308), #34d399);
        box-shadow: 0 0 14px rgba(12, 163, 8, .45);
        transform: translateY(-50%) scaleY(0);
        opacity: 0;
        transition: transform .32s cubic-bezier(.34, 1.35, .64, 1), opacity .2s ease;
    }

    .ne-leave-rule-row:hover td:first-child::before {
        transform: translateY(-50%) scaleY(1);
        opacity: 1;
    }

    .ne-leave-rule-row:hover {
        background: linear-gradient(90deg, #f3fbf4 0%, #fbfdfb 45%, #fff 100%);
    }

    /* cascade-complete state */
    .ne-leave-rule-row.perm-row-complete td:first-child::before {
        transform: translateY(-50%) scaleY(1);
        opacity: 1;
        background: linear-gradient(180deg, var(--primary, #0ca308), #86efac);
    }

    /* toggle switch (same design as permissions) */
    .ne-leave-rules-wrapper .ne-lr-check {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        position: relative;
        width: 34px;
        height: 19px;
        border-radius: 999px;
        background: #dde2e8;
        cursor: pointer;
        transition: background .2s ease;
        margin: 0;
        vertical-align: middle;
    }

    .ne-leave-rules-wrapper .ne-lr-check::after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 1px 3px rgba(16, 24, 40, .3);
        transition: transform .22s cubic-bezier(.34, 1.3, .64, 1);
    }

    .ne-leave-rules-wrapper .ne-lr-check::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 999px;
        box-shadow: 0 0 0 0 rgba(12, 163, 8, .35);
        pointer-events: none;
    }

    .ne-leave-rules-wrapper .ne-lr-check.ne-lr-just-toggled::before {
        animation: neSwitchRipple .5s ease-out;
    }

    .ne-leave-rules-wrapper .ne-lr-check:checked {
        background: var(--primary, #0ca308);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .12);
    }

    .ne-leave-rules-wrapper .ne-lr-check:checked::after {
        transform: translateX(15px);
    }

    .ne-leave-rules-wrapper .ne-lr-check:focus-visible {
        outline: 2px solid var(--primary, #0ca308);
        outline-offset: 2px;
    }

    /* days input polish */
    .ne-leave-rules-wrapper .ne-lr-days {
        border-radius: 999px !important;
        border: 1.5px solid var(--primary, #0ca308) !important;
        background: #fbfffb;
        transition: box-shadow .2s ease, transform .15s ease;
    }

    .ne-leave-rules-wrapper .ne-lr-days:focus {
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .14);
        transform: translateY(-1px);
    }

    /* hover delete icon on rule rows */
    .ne-lr-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border: none;
        border-radius: 8px;
        background: #fdecec;
        color: #d3373c;
        font-size: 14px;
        cursor: pointer;
        margin-left: 10px;
        opacity: 0;
        transform: translateX(6px);
        transition: opacity .2s ease, transform .25s cubic-bezier(.34, 1.4, .64, 1), background .15s ease;
        vertical-align: middle;
    }

    .ne-leave-rule-row:hover .ne-lr-delete {
        opacity: 1;
        transform: translateX(0);
    }

    .ne-lr-delete:hover {
        background: #e5484d;
        color: #fff;
    }

    .ne-lr-delete:active {
        transform: scale(.9);
    }

    /* row remove animation */
    .ne-leave-rule-row.removing {
        animation: neLrRowOut .3s ease forwards;
    }

    @keyframes neLrRowOut {
        to {
            opacity: 0;
            transform: translateX(18px);
        }
    }

    /* newly added row pop */
    .ne-leave-rule-row.added {
        animation: neLrRowIn .45s cubic-bezier(.34, 1.4, .64, 1) both;
    }

    @keyframes neLrRowIn {
        from {
            opacity: 0;
            transform: translateY(-8px) scale(.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* toolbar: search + selected count */
    .ne-perm-search-wrap {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #fff;
        border: 1px solid var(--aw-border);
        border-radius: 999px;
        padding: 6px 14px;
        transition: border-color .15s ease, box-shadow .15s ease;
    }

    .ne-perm-search-wrap:focus-within {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(12, 163, 8, .08);
    }

    .ne-perm-search-wrap i {
        font-size: 13px;
        color: var(--aw-ink-500);
    }

    .ne-perm-search-wrap input {
        border: none;
        outline: none;
        background: transparent;
        font-size: 12.5px;
        width: 150px;
        color: var(--aw-ink-900);
    }

    .ne-perm-count-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11.5px;
        font-weight: 700;
        color: var(--primary-dark, #0f7a38);
        background: var(--primary-light, #e8f7ea);
        padding: 6px 13px;
        border-radius: 999px;
        white-space: nowrap;
    }

    .ne-perm-count-chip.bump {
        animation: neCountBump .38s cubic-bezier(.34, 1.56, .64, 1);
    }

    @keyframes neCountBump {
        40% {
            transform: scale(1.18);
            box-shadow: 0 3px 10px rgba(12, 163, 8, .22);
        }

        100% {
            transform: scale(1);
        }
    }

    .ne-role-badge {
        background: #e8f4fd;
        color: var(--primary-dark);
        border: 1px solid #b8d9f0;
        transition: all .2s ease;
    }

    .ne-role-badge.manager {
        background: #fef3cd;
        color: #856404;
        border: #ffc107;
    }

    .ne-role-badge.hr {
        background: #d4edda;
        color: #155724;
        border: #28a745;
    }

    .ne-role-badge.finance {
        background: #e2d9f3;
        color: #4a1d91;
        border: #9561e2;
    }

    .ne-role-badge.admin {
        background: #f8d7da;
        color: #721c24;
        border: #dc3545;
    }

    /* ===== KYC Document Table ===== */
    .ne-kyc-table-wrapper {
        border: 1px solid var(--aw-border);
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .ne-kyc-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .ne-kyc-table thead th {
        padding: 12px 16px;
        background: linear-gradient(135deg, #f8f9fb 0%, #f1f5f9 100%);
        border-bottom: 2px solid var(--primary);
        font-size: 11.5px;
        font-weight: 700;
        color: var(--aw-ink-500);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .ne-kyc-table tbody tr {
        border-bottom: 1px solid #f0f2f5;
        transition: background .15s ease;
    }

    .ne-kyc-table tbody tr:hover {
        background: #f8f9fb;
    }

    .ne-kyc-table tbody tr:last-child {
        border-bottom: 0;
    }

    .ne-kyc-table td {
        padding: 14px 16px;
        vertical-align: middle;
    }

    .ne-kyc-doc-name {
        font-weight: 600;
        color: var(--aw-ink-900);
        font-size: 13px;
        margin-bottom: 2px;
    }

    .ne-kyc-doc-desc {
        font-size: 11.5px;
        color: var(--aw-ink-500);
    }

    .ne-kyc-upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border: 1px solid var(--aw-border);
        border-radius: 6px;
        background: #fff;
        font-size: 12px;
        font-weight: 600;
        color: var(--aw-ink-700);
        cursor: pointer;
        transition: all .2s ease;
    }

    .ne-kyc-upload-btn:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: #f0f7ff;
    }

    .ne-kyc-upload-btn i {
        font-size: 14px;
    }

    .ne-kyc-file-name {
        font-size: 11.5px;
        color: var(--aw-ink-500);
        margin-left: 8px;
    }

    .ne-kyc-badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .ne-kyc-badge.yes {
        background: #fdecec;
        color: #e5484d;
    }

    .ne-kyc-badge.no {
        background: #f1f5f9;
        color: var(--aw-ink-500);
    }

    .ne-kyc-file-status {
        font-size: 12px;
        color: var(--aw-ink-500);
    }

    .ne-kyc-file-status.uploaded {
        color: var(--primary-dark);
        font-weight: 600;
    }

    .ne-kyc-remove {
        border: none;
        background: transparent;
        color: var(--aw-ink-300);
        font-size: 16px;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 4px;
        transition: all .2s ease;
    }

    .ne-kyc-remove:hover {
        background: #fdecec;
        color: #e5484d;
    }

    @media (max-width: 768px) {
        .ne-wk-row {
            grid-template-columns: 1fr;
        }

        .ne-tabs {
            padding: 4px 12px;
            gap: 0 16px;
        }

        .ne-perm-wrapper {
            max-height: 500px;
        }

        .ne-perm-header,
        .ne-perm-row {
            grid-template-columns: 1fr;
            gap: 8px;
        }

        .ne-kyc-table-wrapper {
            overflow-x: auto;
        }
    }
</style>

<style>
    /* ===== Leave Approval flow ===== */
    .ne-approval-wrapper {
        border: 1px solid var(--aw-border);
        border-radius: 14px;
        padding: 20px 22px;
    }

    .ne-approval-row {
        display: flex;
        align-items: flex-end;
        gap: 14px;
        margin-bottom: 18px;
    }

    .ne-approval-col {
        flex: 1;
        min-width: 0;
    }

    .ne-approval-col label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--aw-ink-900);
        margin-bottom: 6px;
        display: block;
    }

    .ne-approval-btn-add,
    .ne-approval-btn-remove {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
        color: #fff;
        cursor: pointer;
        transition: opacity .15s ease;
    }

    .ne-approval-btn-add {
        background: var(--primary-dark, #0ca308);
    }

    .ne-approval-btn-add:hover {
        opacity: .85;
    }

    .ne-approval-btn-remove {
        background: var(--aw-red);
    }

    .ne-approval-btn-remove:hover {
        opacity: .85;
    }

    .ne-approval-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }
</style>

<style>
    /* ===== OT Approval flow ===== */
    .ne-otapp-wrapper {
        border: 1px solid var(--aw-border);
        border-radius: 14px;
        padding: 20px 22px;
    }

    .ne-otapp-row {
        display: flex;
        align-items: flex-end;
        gap: 14px;
        margin-bottom: 18px;
    }

    .ne-otapp-row:last-child {
        margin-bottom: 0;
    }

    .ne-otapp-col {
        flex: 1;
        min-width: 0;
    }

    .ne-otapp-col label {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--aw-ink-900);
        margin-bottom: 6px;
        display: block;
    }

    .ne-otapp-btn-add,
    .ne-otapp-btn-remove {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
        color: #fff;
        cursor: pointer;
        transition: opacity .15s ease;
    }

    .ne-otap
</style>

<style>
    .employee-bulk-panel {
        display: block;
    }

    .employee-bulk-dropzone .mode-icon {
        width: 48px;
        height: 48px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        border-radius: 12px;
        background: var(--primary-soft);
        color: var(--primary);
        font-size: 21px;
    }

    .employee-bulk-dropzone h6 {
        margin-bottom: 5px;
        color: var(--ink-900);
        font-size: 14px;
        font-weight: 800;
    }

    .employee-bulk-dropzone p {
        margin-bottom: 14px;
        color: var(--ink-500);
        font-size: 12px;
    }

    .employee-bulk-dropzone {
        padding: 32px 18px;
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        background: #fafbfc;
        text-align: center;
        cursor: pointer;
    }

    .employee-bulk-dropzone:hover {
        border-color: var(--primary);
        background: var(--primary-soft);
    }

    .employee-bulk-dropzone .browse-link {
        color: var(--primary);
        font-weight: 700;
        text-decoration: underline;
    }

    .employee-upload-file {
        display: none;
        align-items: center;
        gap: 10px;
        margin-top: 12px;
        padding: 10px;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
        background: #f0fdf4;
        color: var(--ink-900);
        font-size: 12px;
        font-weight: 700;
    }

    .employee-upload-file.show {
        display: flex;
    }

    .employee-upload-file i {
        color: var(--primary);
        font-size: 18px;
    }

    .employee-upload-count {
        display: none;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        background: #f1f5f9;
        color: var(--ink-700);
        font-size: 12px;
        font-weight: 700;
    }

    .employee-upload-count.show {
        display: flex;
    }

    /* ===== Verification & Approval Status (bottom widget) ===== */
    .ne-va-card {
        margin-top: 18px;
    }

    .ne-va-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        padding-bottom: 16px;
        margin-bottom: 18px;
        border-bottom: 1px solid var(--aw-border);
    }

    .ne-va-head h5 {
        font-size: 16px;
        font-weight: 800;
        color: var(--aw-ink-900);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .ne-va-head h5 i {
        color: var(--primary);
        font-size: 18px;
    }

    .ne-va-head p {
        margin: 3px 0 0 27px;
        font-size: 12px;
        color: var(--aw-ink-500);
    }

    .ne-va-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 16px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .3px;
        text-transform: uppercase;
        border: 1px solid transparent;
    }

    .ne-va-badge .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: currentColor;
        box-shadow: 0 0 0 4px currentColor22;
    }

    .ne-va-badge.status-pending {
        background: #fff7e6;
        color: #b7791f;
        border-color: #f6e2b3;
    }

    .ne-va-badge.status-verified {
        background: #eaf2ff;
        color: #2563eb;
        border-color: #cddffb;
    }

    .ne-va-badge.status-approved {
        background: var(--aw-green-soft);
        color: var(--aw-green);
        border-color: #c9ecc9;
    }

    .ne-va-badge.status-rejected {
        background: #fdecec;
        color: var(--aw-red);
        border-color: #f7c8ca;
    }

    .ne-va-badge .dot { animation: neVaPulse 1.6s ease-in-out infinite; }

    @keyframes neVaPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: .45; transform: scale(1.3); }
    }

    .ne-va-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 18px 22px;
        margin-bottom: 30px;
    }

    .ne-va-info-item .k {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: var(--aw-ink-500);
        margin-bottom: 6px;
    }

    .ne-va-info-item .k i {
        font-size: 12px;
        color: var(--aw-ink-300);
    }

    .ne-va-info-item .v {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--aw-ink-900);
    }

    .ne-va-info-item .v.muted {
        font-weight: 500;
        color: var(--aw-ink-300);
        font-style: italic;
    }

    .ne-va-info-item .v.link {
        color: var(--primary);
        font-weight: 700;
    }

    .ne-va-info-item .r {
        margin-top: 3px;
        font-size: 11.5px;
        color: var(--aw-ink-500);
    }

    /* ---- Stepper ---- */
    .ne-va-stepper {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        position: relative;
        max-width: 640px;
        margin: 0 auto;
        padding: 6px 6px 0;
    }

    .ne-va-step {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        flex: 1;
    }

    .ne-va-step-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 800;
        color: var(--aw-ink-300);
        background: #fff;
        border: 2.5px solid var(--aw-border);
        transition: all .25s ease;
    }

    .ne-va-step-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--aw-ink-500);
        transition: color .25s ease;
    }

    .ne-va-track {
        position: absolute;
        top: 27px;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--aw-border);
        z-index: 1;
        border-radius: 3px;
        overflow: hidden;
    }

    .ne-va-track::after {
        content: '';
        position: absolute;
        inset: 0;
        width: var(--ne-va-progress, 0%);
        background: linear-gradient(90deg, var(--primary), var(--aw-green));
        border-radius: 3px;
        transition: width .4s ease;
    }

    .ne-va-track.is-rejected::after {
        background: linear-gradient(90deg, var(--primary), var(--aw-red));
    }

    /* done step */
    .ne-va-step.is-done .ne-va-step-circle {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
    }

    .ne-va-step.is-done .ne-va-step-label {
        color: var(--aw-ink-900);
    }

    /* current step */
    .ne-va-step.is-current .ne-va-step-circle {
        background: #fff;
        border-color: var(--primary);
        color: var(--primary);
        box-shadow: 0 0 0 5px var(--aw-green-soft);
    }

    .ne-va-step.is-current .ne-va-step-label {
        color: var(--primary);
    }

    /* rejected end step */
    .ne-va-step.is-rejected .ne-va-step-circle {
        background: var(--aw-red);
        border-color: var(--aw-red);
        color: #fff;
    }

    .ne-va-step.is-rejected .ne-va-step-label {
        color: var(--aw-red);
    }

    @media (max-width: 576px) {
        .ne-va-step-label {
            font-size: 10.5px;
            text-align: center;
        }

        .ne-va-step-circle {
            width: 34px;
            height: 34px;
            font-size: 13px;
        }

        .ne-va-track {
            top: 22px;
        }
    }
</style>

<!-- ===== Page header ===== -->
<div class="d-flex align-items-start justify-content-between flex-sm-row flex-column gap-3 mb-3">
    <div class="w-100 overflow-auto">
        <h1 class="font-display fw-bold mb-1 page-title">Add New Employee</h1>
        <nav class="d-flex align-items-center gap-2 text-neutral text-nowrap overflow-auto breadcrumb-text">
            <span>Dashboard</span>
            <i class="bi bi-chevron-right"></i>
            <a href="employees-report.php" class="text-neutral text-decoration-none">Employee Directory</a>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Add New Employee</span>
        </nav>
    </div>
    <div class="d-flex align-items-center gap-2 text-nowrap">
        <a href="assets/excel/HRMS Title Data.xlsx" download class="btn btn-outline-primary" style="font-size:12.5px;font-weight:600;border-radius:8px;">
            <i class="bi bi-download me-1"></i> Sample Excel
        </a>
        <button type="button" class="btn btn-primary" id="bulkUploadBtn" data-bs-toggle="offcanvas" data-bs-target="#employeeUploadOffcanvas" aria-controls="employeeUploadOffcanvas" style="font-size:12.5px;font-weight:600;border-radius:8px;">
            <i class="bi bi-upload me-1"></i> Bulk Upload
        </button>
    </div>
</div>

<!-- ===== Tab bar ===== -->
<div class="ne-tabs" id="neTabs">
    <div class="ne-tab active" data-step="1"><i class="bi bi-person"></i> Profile</div>
    <div class="ne-tab" data-step="2"><i class="bi bi-people"></i> Family Details</div>
    <div class="ne-tab" data-step="3"><i class="bi bi-mortarboard"></i> Educational Details</div>
    <div class="ne-tab" data-step="4"><i class="bi bi-briefcase"></i> Experience</div>
    <div class="ne-tab" data-step="5"><i class="bi bi-bank"></i> Bank Account</div>
    <div class="ne-tab" data-step="6"><i class="bi bi-patch-check"></i> KYC Document</div>
    <div class="ne-tab" data-step="7"><i class="bi bi-box-arrow-right"></i> Relieving</div>
    <div class="ne-tab" data-step="8"><i class="bi bi-file-earmark-bar-graph"></i> CTC Report</div>

    <div class="ne-tab" data-step="10"><i class="bi bi-diagram-3"></i> Reporting To</div>
    <div class="ne-tab" data-step="11"><i class="bi bi-calendar2-check"></i> Leave Approval</div>
    <div class="ne-tab" data-step="12"><i class="bi bi-clock-history"></i> OT Approval</div>
    <div class="ne-tab" data-step="13"><i class="bi bi-journal-text"></i> Leave Rules</div>
    <div class="ne-tab" data-step="14"><i class="bi bi-clipboard-check"></i> Review</div>
</div>

<!-- ===== Wizard card ===== -->
<div class="card-custom">
    <form id="newEmployeeForm" novalidate>

        <!-- TAB 1: PROFILE -->
        <div class="ne-panel active" data-panel="1">

            <!-- Personal Details -->
            <div class="ne-section-title">Personal Details :-</div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-3">
                    <label class="form-label">Profile Image</label>
                    <label class="ne-upload-box" for="nePhotoInput">
                        <i class="bi bi-camera"></i>
                        <div class="ne-upload-title">Choose File</div>
                        <div class="ne-upload-hint">JPG, PNG (Max 2MB)</div>
                        <input type="file" id="nePhotoInput" accept="image/png, image/jpeg" hidden>
                    </label>
                </div>
                <div class="col-lg-10">
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label"><span class="ne-req">*</span> Employee Code</label>
                            <input type="text" class="form-control" id="neEmployeeCode" data-required data-label="Employee Code" placeholder="Enter employee code">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" id="neFirstName" placeholder="Enter first name">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label"><span class="ne-req">*</span> Last Name</label>
                            <input type="text" class="form-control" id="neLastName" data-required data-label="Last Name" placeholder="Enter last name">
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Gender</label>
                            <select class="form-select select2" id="neGender">
                                <option value="">Non selected</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Birthday</label>
                            <div class="date-picker bottom-0">
                                <input type="text" class="date-input form-control" id="neBirthday" placeholder="dd/mm/yyyy" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control" id="neAge" placeholder="Auto from birthday" readonly style="background:#f1f3f6;">
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Birthplace</label>
                            <input type="text" class="form-control" id="neBirthplace" placeholder="Enter birthplace">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Present address</label>
                            <input type="text" class="form-control" id="nePresentAddress" placeholder="Enter present address">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Home town</label>
                            <input type="text" class="form-control" id="neHomeTown" placeholder="Enter home town">
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Nation</label>
                            <input type="text" class="form-control" id="neNation" placeholder="Enter nation">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Religion</label>
                            <input type="text" class="form-control" id="neReligion" placeholder="Enter religion">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">ID Document Type</label>
                            <input type="text" class="form-control" id="neIdDocType" placeholder="e.g. Aadhaar / PAN / Passport">
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Permanent Address</label>
                            <input type="text" class="form-control" id="nePermanentAddress" placeholder="Enter permanent address">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Blood Group</label>
                            <select class="form-select select2" id="neBloodGroup">
                                <option value="">Non selected</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="neLatitude" placeholder="Enter latitude">
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="neLongitude" placeholder="Enter longitude">
                        </div>
                        <div class="col-lg-8">
                            <label class="form-label">Other information</label>
                            <textarea class="form-control" id="neOtherInfo" rows="3" placeholder="Enter other information"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Emergency Contact Details -->
            <div class="ne-section-title">Emergency Contact Details :-</div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Emergency Contact Name</label>
                    <input type="text" class="form-control" id="neEmergencyName" placeholder="Enter name">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Emergency Contact Number</label>
                    <input type="tel" class="form-control" id="neEmergencyPhone" placeholder="98765 43210">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Emergency Contact Blood Group</label>
                    <select class="form-select select2" id="neEmergencyBloodGroup">
                        <option value="">Non selected</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        <option>O+</option>
                        <option>O-</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Type of Relationship</label>
                    <input type="text" class="form-control" id="neEmergencyRelation" placeholder="e.g. Father, Spouse, Friend">
                </div>
            </div>

            <!-- Job Details -->
            <div class="ne-section-title">Job Details :-</div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Date of Joining</label>
                    <div class="date-picker">
                        <input type="text" class="date-input form-control" id="neDoj" placeholder="dd/mm/yyyy" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Experience</label>
                    <select class="form-select select2" id="neExperience">
                        <option value="">Select Experience</option>
                        <option value="Fresher">Fresher</option>
                        <option value="0 - 1 Year">0 - 1 Year</option>
                        <option value="1 - 2 Years">1 - 2 Years</option>
                        <option value="2 - 3 Years">2 - 3 Years</option>
                        <option value="3 - 5 Years">3 - 5 Years</option>
                        <option value="5 - 7 Years">5 - 7 Years</option>
                        <option value="7 - 10 Years">7 - 10 Years</option>
                        <option value="10+ Years">10+ Years</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Role</label>
                    <select class="form-select select2" id="neRole">
                        <option value="">Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="HR Admin">HR Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Team Leader">Team Leader</option>
                        <option value="Employee">Employee</option>
                        <option value="Finance">Finance</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Job Type</label>
                    <select class="form-select select2" id="neJobType">
                        <option value="">Nothing selected</option>
                        <option>Work from Office</option>
                        <option>Work from Home</option>
                        <option>Hybrid</option>
                        <option>Remote</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Department</label>
                    <select class="form-select select2" id="neDepartment">
                        <option value="">Nothing selected</option>
                        <option value="1">HR</option>
                        <option value="2">Sales</option>
                        <option value="3">Marketing</option>
                        <option value="4">Designer</option>
                        <option value="5">Production</option>
                        <option value="6">Tech Support</option>
                        <option value="7">Finance</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Designation</label>
                    <select class="form-select select2" id="neDesignation" disabled>
                        <option value="">Select Department first</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Phone</label>
                    <input type="tel" class="form-control" id="nePhone" data-required data-label="Phone" placeholder="98765 43210">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Official Email</label>
                    <input type="email" class="form-control" id="neOfficialEmail" data-required data-label="Official Email" placeholder="name@company.com">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Personal Email</label>
                    <input type="email" class="form-control" id="nePersonalEmail" data-required data-label="Personal Email" placeholder="name@gmail.com">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Branch</label>
                    <select class="form-select select2" id="neBranch">
                        <option value="">Non selected</option>
                        <option>Chennai Head Office</option>
                        <option>Bengaluru Branch</option>
                        <option>Hyderabad Branch</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Reporting To</label>
                    <select class="form-select select2" id="neReportingTo">
                        <option value="">Non selected</option>
                        <option>Victoria Celestie</option>
                        <option>Madison Andrew</option>
                        <option>Ryan Christopher</option>
                        <option>Emily Lauren</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Status</label>
                    <select class="form-select select2" id="neStatus">
                        <option value="">Non selected</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Invited</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Employee Type</label>
                    <select class="form-select select2" id="neEmployeeType">
                        <option value="">Non selected</option>
                        <option>Permanent</option>
                        <option>Probation</option>
                        <option>Contract</option>
                        <option>Intern</option>
                    </select>
                </div>
                <!-- <div class="col-lg-4 col-md-6">
                    <label class="form-label">Worklocation</label>
                    <select class="form-select select2" id="neWorkLocation">
                        <option value="">Non selected</option>
                        <option>On-site</option>
                        <option>Remote</option>
                        <option>Hybrid</option>
                    </select>
                </div> -->

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Week Off</label>
                    <select class="form-select select2" id="neWeekOff">
                        <option value="">Nothing selected</option>
                        <option>Sunday</option>
                        <option>Monday</option>
                        <option>Tuesday</option>
                        <option>Wednesday</option>
                        <option>Thursday</option>
                        <option>Friday</option>
                        <option>Saturday</option>
                        <option value="Multiple">Multiple Week Off</option>
                    </select>
                    <input type="hidden" id="neWeekOffValue" name="week_off">
                </div>
                <div class="col-12 d-none" id="neWeekOffMultiWrap">
                    <div class="ne-wo-card">
                        <div class="row g-4">
                            <div class="col-lg-7">
                                <div class="ne-wo-step">
                                    <span class="num">1</span>
                                    <h6 class="mb-2">Every week off</h6>
                                    <!-- <div class="sub">Ella vaaramum leave irukura day(s) select pannunga</div> -->
                                    <div class="ne-wo-days" id="neWoWeekly"></div>
                                </div>
                                <div class="ne-wo-step">
                                    <span class="num">2</span>
                                    <h6>Alternate / specific week off <span style="font-weight:400;color:#6b7280">(optional)</span></h6>
                                    <div class="sub">e.g. 1st &amp; 3rd Saturday</div>
                                    <div id="neWoAltList"></div>
                                    <div id="neWoAltArea"></div>
                                </div>
                                <div class="ne-wo-step">
                                    <span class="num"><i class="bi bi-check2"></i></span>
                                    <h6>Final Week Off</h6>
                                    <div id="neWeekOffSummary" style="margin-top:8px"></div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ne-wo-cal">
                                    <div class="ne-wo-cal-head">
                                        <button type="button" data-cal="-1" aria-label="Previous month"><i class="bi bi-chevron-left"></i></button>
                                        <span class="t" id="neWoCalTitle"></span>
                                        <button type="button" data-cal="1" aria-label="Next month"><i class="bi bi-chevron-right"></i></button>
                                    </div>
                                    <div class="ne-wo-cal-grid" id="neWoCalGrid"></div>
                                    <div class="ne-wo-legend">
                                        <span><i style="background:var(--primary)"></i>Week Off</span>
                                        <span><i style="background:#fff;border:1px solid #cbd5e1"></i>Working day</span>
                                        <span><i style="border:1.5px solid #f59e0b"></i>Today</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Offer Letter Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input form-control" id="neOfferLetterDate" placeholder="dd/mm/yyyy" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Notice Period (In Days)</label>
                    <input type="number" class="form-control" id="neNoticePeriodDays" min="0" placeholder="e.g. 30">
                </div>
                <!-- <div class="col-lg-4 col-md-6 d-flex align-items-end pb-1 align-self-center mt-5">
                    <label class="ne-check"><input type="checkbox" id="neMobileAppIssues"> Mobile App Issues</label>
                </div> -->

                <div class="col-12">
                    <label class="form-label">Onboarding Commitment</label>
                    <textarea class="form-control" id="neOnboardingCommitment" rows="3" placeholder="Enter onboarding commitment"></textarea>
                </div>
            </div>

            <!-- Salary Details -->
            <div class="ne-section-title">Salary Details :-</div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Salary Type</label>
                    <select class="form-select select2" id="neSalaryType">
                        <option value="">Non selected</option>
                        <option>Monthly</option>
                        <option>Hourly</option>
                        <option>Daily</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">CTC (Annual)</label>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" class="form-control" id="neCtc" min="0" step="1000" placeholder="e.g. 6,00,000">
                    </div>
                    <small class="text-muted">Cost To Company per annum</small>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Personal tax code</label>
                    <input type="text" class="form-control" id="neTaxCode" placeholder="e.g. TX001">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Hourly Rate</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="neHourlyRate" min="0" step="0.01" placeholder="0">
                        <span class="input-group-text">₹</span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">PF Eligible</label>
                    <select class="form-select select2" id="nePfEligible">
                        <option value="">Nothing selected</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">ESI Eligible</label>
                    <select class="form-select select2" id="neEsiEligible">
                        <option value="">Nothing selected</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">OT Eligible</label>
                    <select class="form-select select2" id="neOtEligible">
                        <option value="">Nothing selected</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">UAN No</label>
                    <input type="text" class="form-control" id="neUan" placeholder="Enter UAN number">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">ESI No</label>
                    <input type="text" class="form-control" id="neEsiNo" placeholder="Enter ESI number">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Aadhaar No</label>
                    <input type="text" class="form-control" id="neAadhaarNo" placeholder="Enter Aadhaar number">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">PAN No</label>
                    <input type="text" class="form-control" id="nePanNo" placeholder="Enter PAN number">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">PENSION Eligible</label>
                    <select class="form-select select2" id="nePensionEligible">
                        <option value="">Nothing selected</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Salary Calendar</label>
                    <select class="form-select select2" id="neSalaryCalendar">
                        <option value="">Nothing selected</option>
                        <option>Monthly Calendar</option>
                        <option>Fixed 30 Days</option>
                        <option>Actual Days</option>
                    </select>
                </div>
            </div>

            <!-- Interview Feedback Consolidated -->
            <div class="ne-section-title">Interview Feedback Consolidated :-</div>
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Round 1 - CV Screening</label>
                    <textarea class="form-control" id="neRound1" rows="3" placeholder="Enter feedback"></textarea>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Round 2 - Technical Round</label>
                    <textarea class="form-control" id="neRound2" rows="3" placeholder="Enter feedback"></textarea>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Round 3 - HR</label>
                    <textarea class="form-control" id="neRound3" rows="3" placeholder="Enter feedback"></textarea>
                </div>
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Round 4 - Salary Negotiation</label>
                    <textarea class="form-control" id="neRound4" rows="3" placeholder="Enter feedback"></textarea>
                </div>
            </div>

            <!-- Welcome Kit -->
            <div class="ne-section-title">Welcome Kit :-</div>
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-primary d-none" id="neWkAddMore" style="font-size:12.5px;font-weight:600;border-radius:8px;">
                    Add More
                </button>
            </div>
            <div id="neWkRows">
                <div class="ne-wk-row wk-row">
                    <div>
                        <label class="form-label">ID Card</label>
                        <select class="form-select select2 wk-idcard">
                            <option value="">Nothing selected</option>
                            <option>Issued</option>
                            <option>Not Issued</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label">ID Card Issued Date</label>
                        <div class="date-picker"><input type="text" class="date-input form-control wk-issued-date" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off"></div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-remove wk-remove" style="display:none;">Remove</button>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <label class="form-label">Others</label>
                <textarea class="form-control" id="neWkOthers" rows="3" placeholder="Enter other welcome kit items"></textarea>
            </div>

            <!-- Social Media -->
            <div class="ne-section-title">Social Media :-</div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><i class="bi bi-facebook me-1"></i> Facebook</label>
                    <input type="text" class="form-control" id="neFacebook" placeholder="Facebook profile URL">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><i class="bi bi-linkedin me-1"></i> Linkedin</label>
                    <input type="text" class="form-control" id="neLinkedin" placeholder="Linkedin profile URL">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><i class="bi bi-skype me-1"></i> Skype</label>
                    <input type="text" class="form-control" id="neSkype" placeholder="Skype ID">
                </div>
            </div>

            <div class="d-flex flex-column gap-2 mt-3 pt-3 border-top">
                <!-- <label class="ne-check"><input type="checkbox" id="neAdministrator"> Administrator</label> -->
                <label class="ne-check"><input type="checkbox" id="neWelcomeEmail" checked> Send welcome email</label>
            </div>

            <!-- Account Password -->
            <div class="ne-section-title">Account Password :-</div>
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="nePassword" data-required data-label="Password" placeholder="Enter password">
                        <button class="btn btn-outline-secondary" type="button" id="neTogglePassword" style="border-color:var(--aw-border);color:var(--aw-ink-500);"><i class="bi bi-eye"></i></button>
                    </div>
                    <div style="height:4px;background:#eee;border-radius:2px;margin-top:6px;overflow:hidden;">
                        <div id="nePasswordStrength" style="height:100%;width:0%;transition:width .3s,background .3s;"></div>
                    </div>
                    <div style="font-size:11px;color:var(--aw-ink-500);margin-top:4px;">Min 8 chars, use uppercase, numbers & symbols for strong password</div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="neConfirmPassword" data-required data-label="Confirm Password" placeholder="Re-enter password">
                        <button class="btn btn-outline-secondary" type="button" id="neToggleConfirmPassword" style="border-color:var(--aw-border);color:var(--aw-ink-500);"><i class="bi bi-eye"></i></button>
                    </div>
                    <div id="nePasswordMatch" style="font-size:11px;margin-top:4px;"></div>
                </div>
            </div>
        </div>

        <!-- TAB 2: Family Details -->
        <div class="ne-panel" data-panel="2">

            <div class="ne-section-title">Family Details :-</div>

            <div class="row g-3">

                <!-- Father Name -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Father name</label>
                    <input type="text"
                        class="form-control"
                        id="neFatherName"
                        placeholder="Enter father name">
                </div>

                <!-- Mother Name -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Mother name</label>
                    <input type="text"
                        class="form-control"
                        id="neMotherName"
                        placeholder="Enter mother name">
                </div>

                <!-- Contact Number -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Contact Number</label>
                    <input type="tel"
                        class="form-control"
                        id="neFamilyContactNumber"
                        placeholder="Enter contact number">
                </div>

                <!-- Father Occupation -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Father Occupation</label>
                    <input type="text"
                        class="form-control"
                        id="neFatherOccupation"
                        placeholder="Enter father occupation">
                </div>

                <!-- Mother Occupation -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Mother Occupation</label>
                    <input type="text"
                        class="form-control"
                        id="neMotherOccupation"
                        placeholder="Enter mother occupation">
                </div>

                <!-- Others Name -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Mention If Others(Name)</label>
                    <input type="text"
                        class="form-control"
                        id="neOtherFamilyName"
                        placeholder="Enter name">
                </div>

                <!-- Relationship -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Relationship</label>
                    <input type="text"
                        class="form-control"
                        id="neFamilyRelationship"
                        placeholder="Enter relationship">
                </div>

                <!-- Marital Status -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Marital status</label>
                    <select class="form-select select2" id="neMaritalStatus">
                        <option value="">Non selected</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>

                <!-- Spouse Name -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Spouse Name</label>
                    <input type="text"
                        class="form-control"
                        id="neSpouseName"
                        placeholder="Enter spouse name">
                </div>

                <!-- Children Name -->
                <div class="col-12">
                    <div class="row g-3" id="neChildrenWrap">
                        <div class="ne-child-row col-lg-4 col-md-6">
                            <label class="form-label">1. Childrens Name</label>
                            <input type="text"
                                class="form-control"
                                name="children_name[]"
                                placeholder="Enter children's name">
                        </div>
                    </div>
                </div>

                <!-- Add More -->
                <div class="col-12 d-flex align-items-end">
                    <button type="button"
                        class="btn btn-primary"
                        id="neAddChild"
                        style="font-size:12.5px;font-weight:600;border-radius:8px;">
                        + Add More
                    </button>
                </div>

                <!-- Address -->
                <div class="col-12">
                    <label class="form-label">Address</label>
                    <textarea class="form-control"
                        id="neFamilyAddress"
                        rows="3"
                        placeholder="Enter address"></textarea>
                </div>

            </div>

        </div>

        <!-- TAB 3: Educational Details (placeholder) -->
        <div class="ne-panel" data-panel="3">

            <div class="ne-section-title">Education Details :-</div>

            <div id="neEducationContainer">

                <!-- Education Item -->
                <div class="ne-education-item">

                    <div class="row g-3">

                        <!-- Institution Name -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Institution name</label>
                            <input type="text"
                                class="form-control"
                                name="education[0][institution_name]"
                                placeholder="Enter institution name">
                        </div>

                        <!-- Qualification -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Qualification</label>
                            <input type="text"
                                class="form-control"
                                name="education[0][qualification]"
                                placeholder="Enter qualification">
                        </div>

                        <!-- Field of Study -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Field of study</label>
                            <input type="text"
                                class="form-control"
                                name="education[0][field_of_study]"
                                placeholder="Enter field of study">
                        </div>

                        <!-- From Date -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">From date</label>
                            <div class="date-picker">
                                <input type="text"
                                    class="date-input form-control"
                                    name="education[0][from_date]"
                                    placeholder="DD-MM-YYYY"
                                    maxlength="10"
                                    autocomplete="off">
                            </div>
                        </div>

                        <!-- To Date -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">To date</label>
                            <div class="date-picker">
                                <input type="text"
                                    class="date-input form-control"
                                    name="education[0][to_date]"
                                    placeholder="DD-MM-YYYY"
                                    maxlength="10"
                                    autocomplete="off">
                            </div>
                        </div>

                        <!-- Percentage -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Percentage</label>
                            <input type="number"
                                class="form-control"
                                name="education[0][percentage]"
                                placeholder="Enter percentage"
                                min="0"
                                max="100"
                                step="0.01">
                        </div>

                        <!-- Certificate -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Certificate</label>
                            <input type="file"
                                class="form-control"
                                name="education[0][certificate]"
                                accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <div class="col-lg-4 col-md-6 align-self-end mb-1">
                            <!-- Delete Button -->
                            <div class=" education-delete-wrapper d-none">
                                <button type="button"
                                    class="btn btn-danger neDeleteEducation"
                                    style="font-size:12.5px;font-weight:600;border-radius:8px;">
                                    Delete
                                </button>
                            </div>
                        </div>

                    </div>


                    <hr class="mt-3 mb-3">

                </div>
            </div>

            <!-- Add Education -->
            <div class="d-flex justify-content-start">
                <button type="button"
                    class="btn btn-primary"
                    id="neAddEducation"
                    style="font-size:12.5px;font-weight:600;border-radius:8px;">
                    + Add Education
                </button>
            </div>

        </div>



        <!-- TAB 4: Experience (placeholder) -->
        <div class="ne-panel" data-panel="4">

            <div class="ne-section-title">Experience Details :-</div>

            <div id="neExperienceContainer">

                <!-- Experience Item -->
                <div class="ne-experience-item">

                    <div class="row g-3">

                        <!-- Company Name -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Company name</label>
                            <input type="text"
                                class="form-control"
                                name="experience[0][company_name]"
                                placeholder="Enter company name">
                        </div>

                        <!-- Job Title -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Job Title</label>
                            <input type="text"
                                class="form-control"
                                name="experience[0][job_title]"
                                placeholder="Enter job title">
                        </div>

                        <!-- Designation -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Designation</label>
                            <input type="text"
                                class="form-control"
                                name="experience[0][designation]"
                                placeholder="Enter designation">
                        </div>

                        <!-- Salary Slips -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Salary Slips</label>
                            <input type="file"
                                class="form-control"
                                name="experience[0][salary_slips]"
                                accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <!-- Relieving Letter -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Relieving letter</label>
                            <input type="file"
                                class="form-control"
                                name="experience[0][relieving_letter]"
                                accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <!-- From Date -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">From date</label>
                            <div class="date-picker">
                                <input type="text"
                                    class="date-input form-control"
                                    name="experience[0][from_date]"
                                    placeholder="DD-MM-YYYY"
                                    maxlength="10"
                                    autocomplete="off">
                            </div>
                        </div>

                        <!-- To Date -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">To date</label>
                            <div class="date-picker">
                                <input type="text"
                                    class="date-input form-control"
                                    name="experience[0][to_date]"
                                    placeholder="DD-MM-YYYY"
                                    maxlength="10"
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 align-self-end mb-1">
                            <!-- Delete Button -->
                            <div class="experience-delete-wrapper d-none">
                                <button type="button"
                                    class="btn btn-danger neDeleteExperience"
                                    style="font-size:12.5px;font-weight:600;border-radius:8px;">
                                    Delete
                                </button>
                            </div>
                        </div>

                    </div>


                    <hr class="mt-3 mb-3">

                </div>

            </div>

            <!-- Add Experience -->
            <div class="d-flex justify-content-start">
                <button type="button"
                    class="btn btn-primary"
                    id="neAddExperience"
                    style="font-size:12.5px;font-weight:600;border-radius:8px;">
                    + Add Experience
                </button>
            </div>

        </div>


        <!-- TAB 5: Bank Account (placeholder) -->
        <div class="ne-panel" data-panel="5">

            <div class="ne-section-title">Bank Account Details :-</div>

            <div id="neBankAccountContainer">

                <!-- Bank Account Item -->
                <div class="ne-bank-account-item border rounded p-3 mb-3">

                    <div class="row g-3">

                        <!-- Account Type -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">
                                <span class="text-danger">*</span> Account type
                            </label>

                            <input type="text"
                                class="form-control"
                                name="bank_accounts[0][account_type]"
                                placeholder="Enter account type">
                        </div>

                        <!-- Bank Name -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Bank name</label>

                            <input type="text"
                                class="form-control"
                                name="bank_accounts[0][bank_name]"
                                placeholder="Enter bank name">
                        </div>

                        <!-- Account Number -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">
                                <span class="text-danger">*</span> Account number
                            </label>

                            <input type="text"
                                class="form-control"
                                name="bank_accounts[0][account_number]"
                                placeholder="Enter account number">
                        </div>

                        <!-- IFSC Code -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Ifsc code</label>

                            <input type="text"
                                class="form-control"
                                name="bank_accounts[0][ifsc_code]"
                                placeholder="Enter IFSC code">
                        </div>

                        <!-- Branch Name -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Branch name</label>

                            <input type="text"
                                class="form-control"
                                name="bank_accounts[0][branch_name]"
                                placeholder="Enter branch name">
                        </div>

                        <!-- Beneficiary Name -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Beneficiary Name</label>

                            <input type="text"
                                class="form-control"
                                name="bank_accounts[0][beneficiary_name]"
                                placeholder="Enter beneficiary name">
                        </div>

                        <!-- Attachment -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Attachment</label>

                            <input type="file"
                                class="form-control"
                                name="bank_accounts[0][attachment]"
                                accept=".pdf,.jpg,.jpeg,.png">
                        </div>

                        <!-- Account Status -->
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label">Account Status</label>

                            <select class="form-select"
                                name="bank_accounts[0][account_status]">

                                <option value="">Nothing selected</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>

                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6 align-self-end mb-1">
                            <!-- Remove -->
                            <div class="">
                                <button type="button"
                                    class="btn btn-danger neRemoveBankAccount"
                                    style="font-size:12.5px;font-weight:600;border-radius:5px;">
                                    Remove
                                </button>

                            </div>
                        </div>

                    </div>


                </div>

            </div>

            <!-- Add Bank Account -->
            <div class="d-flex justify-content-start">

                <button type="button"
                    class="btn btn-primary"
                    id="neAddBankAccount"
                    style="font-size:12.5px;font-weight:600;border-radius:5px;">
                    + Add Bank Account
                </button>

            </div>

        </div>


        <!-- TAB 6: KYC Document -->
        <div class="ne-panel" data-panel="6">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="ne-section-title" style="margin-bottom:0;">KYC Document :-</div>
                <div class="d-flex align-items-center gap-2">
                    <span id="neKycProgress" style="font-size:12px;font-weight:600;color:var(--aw-ink-500);">0 / 7 uploaded</span>
                    <div style="width:120px;height:6px;background:#eee;border-radius:3px;overflow:hidden;">
                        <div id="neKycProgressBar" style="height:100%;width:0%;background:var(--primary);transition:width .3s;"></div>
                    </div>
                </div>
            </div>

            <!-- KYC Table -->
            <div class="ne-kyc-table-wrapper">
                <table class="ne-kyc-table">
                    <thead>
                        <tr>
                            <th style="width:35%;">Document Name</th>
                            <th style="width:25%;">Upload Field</th>
                            <th style="width:10%;text-align:center;">Mandatory</th>
                            <th style="width:15%;">File View</th>
                            <th style="width:15%;text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="neKycBody">
                        <tr class="ne-kyc-row" data-doc="aadhaar" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">Aadhaar Card</div>
                                <div class="ne-kyc-doc-desc">PDF, JPG, PNG</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="pan" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">PAN Card</div>
                                <div class="ne-kyc-doc-desc">PDF, JPG, PNG</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="driving" data-mandatory="no">
                            <td>
                                <div class="ne-kyc-doc-name">Driving License</div>
                                <div class="ne-kyc-doc-desc">If applicable</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge no">No</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="passport" data-mandatory="no">
                            <td>
                                <div class="ne-kyc-doc-name">Passport</div>
                                <div class="ne-kyc-doc-desc">If applicable</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge no">No</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="newjoiner" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">New Joiner Form</div>
                                <div class="ne-kyc-doc-desc">Signed copy</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="handbook" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">Employee Handbook Acknowledgement</div>
                                <div class="ne-kyc-doc-desc">Signed acknowledgement</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="application" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">Application Form</div>
                                <div class="ne-kyc-doc-desc">Filled & signed application</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="ctc" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">CTC Acknowledgement</div>
                                <div class="ne-kyc-doc-desc">Signed by employee</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="photo" data-mandatory="yes">
                            <td>
                                <div class="ne-kyc-doc-name">Passport Size Photograph</div>
                                <div class="ne-kyc-doc-desc">JPG, PNG</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge yes">Yes</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="roles_resp" data-mandatory="no">
                            <td>
                                <div class="ne-kyc-doc-name">Roles & Responsibilities Acknowledgement</div>
                                <div class="ne-kyc-doc-desc">Signed by employee</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge no">No</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr class="ne-kyc-row" data-doc="idcard" data-mandatory="no">
                            <td>
                                <div class="ne-kyc-doc-name">Id card</div>
                                <div class="ne-kyc-doc-desc">PDF, JPG, PNG</div>
                            </td>
                            <td>
                                <label class="ne-kyc-upload-btn">
                                    <i class="bi bi-cloud-arrow-up"></i> Choose File
                                    <input type="file" class="ne-kyc-file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                                </label>
                                <span class="ne-kyc-file-name">No file chosen</span>
                            </td>
                            <td style="text-align:center;"><span class="ne-kyc-badge no">No</span></td>
                            <td><span class="ne-kyc-file-status">No file</span></td>
                            <td style="text-align:center;"><button class="ne-kyc-remove" style="display:none;"><i class="bi bi-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Custom Document Button -->
                <div class="border-light-subtle border-top p-3">
                    <button type="button"
                        id="neAddCustomKyc"
                        class="btn btn-primary"
                        style="font-size:12.5px;font-weight:600;border-radius:8px;">
                        + Custom Document
                    </button>
                </div>

            </div>
        </div>

        <!-- TAB 7: Relieving Request -->
        <div class="ne-panel" data-panel="7">
            <div class="ne-section-title">Resignation / Relieving Request :-</div>

            <div class="row g-3">
                <!-- Employee Name (Select2 disabled) -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Employee Name</label>
                    <select class="form-select select2" id="neRelEmpSelect" disabled>
                        <option value="">—</option>
                    </select>
                    <small class="text-muted">Auto-filled from Profile tab</small>
                </div>

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Relieving Type</label>
                    <select class="form-select select2">
                        <option value="">Select Relieving Type</option>
                        <option>Resignation</option>
                        <option>Termination</option>
                        <option>Contract End</option>
                        <option>Retirement</option>
                        <option>Absconded</option>
                    </select>
                </div>

                <!-- Resignation Date -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Resignation Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input form-control" id="neRelResignDate" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                    </div>
                </div>

                <!-- Proposed Last Working Date -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Proposed Last Working Date</label>
                    <div class="date-picker">
                        <input type="text" class="date-input form-control" id="neRelLastDay" placeholder="DD-MM-YYYY" maxlength="10" autocomplete="off">
                    </div>
                </div>

                <!-- Notice Period -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Notice Period</label>
                    <select class="form-select select2" id="neRelNoticePeriod">
                        <option value="">Select notice period</option>
                        <option>Immediate</option>
                        <option>15 Days</option>
                        <option>30 Days</option>
                        <option>60 Days</option>
                        <option>90 Days</option>
                    </select>
                </div>

                <!-- Supporting Document -->
                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Supporting Document <span class="text-muted">— optional</span></label>
                    <div class="ne-rel-file-upload">
                        <input type="file" class="form-control" id="neRelDoc" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                        <small class="text-muted">Upload resignation letter or any supporting document (PDF, DOC, Images)</small>
                    </div>
                </div>

                 <!-- Reason for Leaving -->
                <div class="col-md-6">
                    <label class="form-label"><span class="ne-req">*</span> Reason for Leaving</label>
                    <textarea class="form-control" id="neRelReason" rows="3" placeholder="Please describe your reason for leaving"></textarea>
                </div>

                <!-- Remarks -->
                <div class="col-md-6">
                    <label class="form-label">Remarks</label>
                    <textarea class="form-control" id="neRelRemarks" rows="3" placeholder="Any additional remarks (optional)"></textarea>
                </div>

                
            </div>

            <!-- Submit -->
            <div class="ne-rel-actions" id="neRelSubmitActions">
                <button type="button" class="btn btn-primary" id="neRelSend" style="font-size:13px;font-weight:600;border-radius:8px;padding:10px 28px;">
                    <i class="bi bi-send me-1"></i> Submit Request
                </button>
            </div>

            <!-- Approval Timeline (shown for admin/HR view) -->
            <div id="neRelApprovalSection" style="display:none;">
                <div class="ne-section-title" style="margin-top:20px;padding-top:18px;border-top:1px solid var(--aw-border);">Approval Timeline :-</div>
                <div class="ne-rel-emp-card">
                    <div class="ne-rel-emp-avatar"><i class="bi bi-person-circle"></i></div>
                    <div>
                        <div class="ne-rel-emp-name" id="neRelViewName">—</div>
                        <div class="ne-rel-emp-dept" id="neRelViewDept">Employee</div>
                    </div>
                </div>
                <div class="ne-rel-timeline" id="neRelTimeline"></div>
                <div class="ne-rel-actions" id="neRelApprovalActions" style="display:none;">
                    <button type="button" class="btn btn-success" id="neRelApproveBtn" style="font-size:13px;font-weight:600;border-radius:8px;padding:10px 28px;">
                        <i class="bi bi-check-lg me-1"></i> Approve
                    </button>
                    <button type="button" class="btn btn-danger" id="neRelRejectBtn" style="font-size:13px;font-weight:600;border-radius:8px;padding:10px 28px;">
                        <i class="bi bi-x-lg me-1"></i> Reject
                    </button>
                </div>
            </div>
        </div>

        <!-- Work Completion Modal -->
        <div class="ne-work-modal-overlay" id="neWorkModal">
            <div class="ne-work-modal">
                <div class="ne-work-modal-head">
                    <button type="button" class="ne-work-modal-close" id="neWorkModalClose">&times;</button>
                    <div class="ne-work-head-icon"><i class="bi bi-clipboard-check"></i></div>
                    <h3 class="ne-work-head-title">Work Completion Review</h3>
                    <p class="ne-work-head-sub">Verify all tasks are completed before approving</p>
                </div>
                <div class="ne-work-modal-body">
                    <div class="ne-work-emp-info">
                        <div class="ne-work-emp-avatar"><i class="bi bi-person-circle"></i></div>
                        <div>
                            <div class="ne-work-emp-name" id="neWorkEmpName">—</div>
                            <div class="ne-work-emp-dept" id="neWorkEmpDept">Check if all tasks are completed</div>
                        </div>
                    </div>
                    <div class="ne-work-section-title">Checklist</div>
                    <div class="ne-work-checklist" id="neWorkChecklist">
                        <div class="ne-work-check-item" onclick="this.querySelector('input').click()">
                            <input type="checkbox" id="wcTasks">
                            <div class="ne-work-check-num">1</div>
                            <div class="ne-work-check-icon"><i class="bi bi-list-task"></i></div>
                            <div class="ne-work-check-text">
                                <div class="ne-work-check-label">All assigned tasks & projects</div>
                                <div class="ne-work-check-desc">Pending tasks transferred or completed</div>
                            </div>
                        </div>
                        <div class="ne-work-check-item" onclick="this.querySelector('input').click()">
                            <input type="checkbox" id="wcHandover">
                            <div class="ne-work-check-num">2</div>
                            <div class="ne-work-check-icon"><i class="bi bi-journal-text"></i></div>
                            <div class="ne-work-check-text">
                                <div class="ne-work-check-label">Knowledge transfer & documentation</div>
                                <div class="ne-work-check-desc">All docs handed over to successor</div>
                            </div>
                        </div>
                        <div class="ne-work-check-item" onclick="this.querySelector('input').click()">
                            <input type="checkbox" id="wcAssets">
                            <div class="ne-work-check-num">3</div>
                            <div class="ne-work-check-icon"><i class="bi bi-laptop"></i></div>
                            <div class="ne-work-check-text">
                                <div class="ne-work-check-label">Assets & equipment returned</div>
                                <div class="ne-work-check-desc">Laptop, phone, access card etc.</div>
                            </div>
                        </div>
                        <div class="ne-work-check-item" onclick="this.querySelector('input').click()">
                            <input type="checkbox" id="wcAccess">
                            <div class="ne-work-check-num">4</div>
                            <div class="ne-work-check-icon"><i class="bi bi-shield-lock"></i></div>
                            <div class="ne-work-check-text">
                                <div class="ne-work-check-label">System access revoked</div>
                                <div class="ne-work-check-desc">Email, VPN, internal tools</div>
                            </div>
                        </div>
                        <div class="ne-work-check-item" onclick="this.querySelector('input').click()">
                            <input type="checkbox" id="wcClearance">
                            <div class="ne-work-check-num">5</div>
                            <div class="ne-work-check-icon"><i class="bi bi-building"></i></div>
                            <div class="ne-work-check-text">
                                <div class="ne-work-check-label">Clearance from all departments</div>
                                <div class="ne-work-check-desc">HR, Finance, IT, Admin sign-off</div>
                            </div>
                        </div>
                        <div class="ne-work-check-item" onclick="this.querySelector('input').click()">
                            <input type="checkbox" id="wcExit">
                            <div class="ne-work-check-num">6</div>
                            <div class="ne-work-check-icon"><i class="bi bi-chat-dots"></i></div>
                            <div class="ne-work-check-text">
                                <div class="ne-work-check-label">Exit interview completed</div>
                                <div class="ne-work-check-desc">Feedback collected & filed</div>
                            </div>
                        </div>
                    </div>
                    <div class="ne-work-progress">
                        <div class="ne-work-progress-label">
                            <span>Completion</span>
                            <span class="pct" id="neWorkProgressPct">0%</span>
                        </div>
                        <div class="ne-work-progress-bar">
                            <div class="ne-work-progress-fill" id="neWorkProgressFill" style="width:0%;"></div>
                        </div>
                    </div>
                </div>
                <div class="ne-work-modal-foot">
                    <button type="button" class="btn btn-outline-secondary" id="neWorkCancel" style="font-size:12.5px;font-weight:600;border-radius:8px;padding:8px 20px;">Cancel</button>
                    <button type="button" class="btn btn-success" id="neWorkConfirm" disabled style="font-size:12.5px;font-weight:600;border-radius:8px;padding:8px 22px;">
                        <i class="bi bi-check-circle me-1"></i> Confirm & Approve
                    </button>
                </div>
            </div>
        </div>

        <!-- TAB 8: CTC Report (placeholder) -->
        <div class="ne-panel" data-panel="8">
            <!-- TAB 8: CTC Report -->
            <div class="ne-panel" data-panel="8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="ne-section-title" style="margin-bottom:0;">CTC Report :-</div>
                    <div style="font-size:12px;color:var(--aw-ink-500);">
                        Annual CTC: <span style="font-weight:700;color:var(--aw-ink-900);" id="neCtcAnnualTotal">₹6,00,000</span>
                    </div>
                </div>

                <div class="row g-3">
                    <!-- Earnings -->
                    <div class="col-lg-6">
                        <div class="ne-kyc-table-wrapper">
                            <table class="ne-kyc-table">
                                <thead>
                                    <tr>
                                        <th style="width:50%;">Earnings</th>
                                        <th style="text-align:right;">Monthly (₹)</th>
                                        <th style="text-align:right;">Annual (₹)</th>
                                    </tr>
                                </thead>
                                <tbody id="neCtcEarningsBody">
                                    <tr>
                                        <td>Basic Salary</td>
                                        <td style="text-align:right;">20,000</td>
                                        <td style="text-align:right;">2,40,000</td>
                                    </tr>
                                    <tr>
                                        <td>House Rent Allowance (HRA)</td>
                                        <td style="text-align:right;">8,000</td>
                                        <td style="text-align:right;">96,000</td>
                                    </tr>
                                    <tr>
                                        <td>Conveyance Allowance</td>
                                        <td style="text-align:right;">1,600</td>
                                        <td style="text-align:right;">19,200</td>
                                    </tr>
                                    <tr>
                                        <td>Medical Allowance</td>
                                        <td style="text-align:right;">1,250</td>
                                        <td style="text-align:right;">15,000</td>
                                    </tr>
                                    <tr>
                                        <td>Special Allowance</td>
                                        <td style="text-align:right;">9,150</td>
                                        <td style="text-align:right;">1,09,800</td>
                                    </tr>
                                    <tr>
                                        <td>Performance Bonus</td>
                                        <td style="text-align:right;">2,500</td>
                                        <td style="text-align:right;">30,000</td>
                                    </tr>
                                    <tr style="background:#f8f9fb;font-weight:700;">
                                        <td>Gross Earnings</td>
                                        <td style="text-align:right;">42,500</td>
                                        <td style="text-align:right;">5,10,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Deductions -->
                    <div class="col-lg-6">
                        <div class="ne-kyc-table-wrapper">
                            <table class="ne-kyc-table">
                                <thead>
                                    <tr>
                                        <th style="width:50%;">Deductions</th>
                                        <th style="text-align:right;">Monthly (₹)</th>
                                        <th style="text-align:right;">Annual (₹)</th>
                                    </tr>
                                </thead>
                                <tbody id="neCtcDeductionsBody">
                                    <tr>
                                        <td>Employee PF Contribution</td>
                                        <td style="text-align:right;">1,800</td>
                                        <td style="text-align:right;">21,600</td>
                                    </tr>
                                    <tr>
                                        <td>ESI Contribution</td>
                                        <td style="text-align:right;">320</td>
                                        <td style="text-align:right;">3,840</td>
                                    </tr>
                                    <tr>
                                        <td>Professional Tax</td>
                                        <td style="text-align:right;">200</td>
                                        <td style="text-align:right;">2,400</td>
                                    </tr>
                                    <tr>
                                        <td>TDS (Income Tax)</td>
                                        <td style="text-align:right;">1,500</td>
                                        <td style="text-align:right;">18,000</td>
                                    </tr>
                                    <tr style="background:#f8f9fb;font-weight:700;">
                                        <td>Total Deductions</td>
                                        <td style="text-align:right;">3,820</td>
                                        <td style="text-align:right;">45,840</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="ne-kyc-table-wrapper mt-3">
                            <table class="ne-kyc-table">
                                <thead>
                                    <tr>
                                        <th style="width:50%;">Employer Contributions</th>
                                        <th style="text-align:right;">Monthly (₹)</th>
                                        <th style="text-align:right;">Annual (₹)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Employer PF Contribution</td>
                                        <td style="text-align:right;">1,800</td>
                                        <td style="text-align:right;">21,600</td>
                                    </tr>
                                    <tr>
                                        <td>Employer ESI Contribution</td>
                                        <td style="text-align:right;">780</td>
                                        <td style="text-align:right;">9,360</td>
                                    </tr>
                                    <tr>
                                        <td>Gratuity</td>
                                        <td style="text-align:right;">962</td>
                                        <td style="text-align:right;">11,540</td>
                                    </tr>
                                    <tr style="background:#f8f9fb;font-weight:700;">
                                        <td>Total Employer Cost</td>
                                        <td style="text-align:right;">3,542</td>
                                        <td style="text-align:right;">42,500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Net Summary -->
                <div class="ne-review-section mt-3">
                    <h6><i class="bi bi-file-earmark-bar-graph"></i> CTC Summary</h6>
                    <div class="ne-review-grid">
                        <div class="ne-review-item">
                            <div class="k">Gross Monthly Salary</div>
                            <div class="v">₹42,500</div>
                        </div>
                        <div class="ne-review-item">
                            <div class="k">Total Monthly Deductions</div>
                            <div class="v">₹3,820</div>
                        </div>
                        <div class="ne-review-item">
                            <div class="k">Net Take Home (Monthly)</div>
                            <div class="v" style="color:var(--primary-dark);">₹38,680</div>
                        </div>
                        <div class="ne-review-item">
                            <div class="k">Employer Cost (Monthly)</div>
                            <div class="v">₹3,542</div>
                        </div>
                        <div class="ne-review-item">
                            <div class="k">Gross Annual CTC</div>
                            <div class="v">₹5,10,000</div>
                        </div>
                        <div class="ne-review-item">
                            <div class="k">Net Annual CTC (incl. employer cost)</div>
                            <div class="v" style="color:var(--primary);font-weight:800;">₹6,00,000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- TAB 10: Reporting To -->
        <div class="ne-panel" data-panel="10">
            <div class="ne-section-title">Reporting To :-</div>

            <div class="ne-otapp-wrapper">
                <!-- Base row: 1st Level Approval + Add -->
                <div class="ne-otapp-row col-md-6" id="neRptBaseRow">
                    <div class="ne-otapp-col">
                        <label>1st Level Approval</label>
                        <select class="form-select select2 ne-rptto-select" data-level="1">
                            <option value="">Non selected</option>
                            <option>Victoria Celestie</option>
                            <option>Madison Andrew</option>
                            <option>Ryan Christopher</option>
                            <option>Emily Lauren</option>
                        </select>
                    </div>

                    <button type="button" class="ne-otapp-btn-add bg-primary" id="neAddRptLevel" title="Add approval level">+</button>
                </div>

                <!-- Dynamic approval levels get appended here -->
                <div id="neRptExtraLevels" class="col-md-6"></div>
            </div>
        </div>

        <!-- TAB 11: Leave Approval -->
        <div class="ne-panel" data-panel="11">
            <div class="ne-section-title">Leave Approval :-</div>

            <div class="ne-approval-wrapper">
                <!-- Base row: 1st Level Approval + Follower -->
                <div class="ne-approval-row" id="neApprovalBaseRow">
                    <div class="ne-approval-col">
                        <label>1st Level Approval</label>
                        <select class="form-select select2 ne-approval-select" data-level="1">
                            <option value="">Non selected</option>
                            <option>Victoria Celestie</option>
                            <option>Madison Andrew</option>
                            <option>Ryan Christopher</option>
                            <option>Emily Lauren</option>
                        </select>
                    </div>

                    <button type="button" class="ne-approval-btn-add" id="neAddApprovalLevel" title="Add approval level">+</button>

                    <div class="ne-approval-col">
                        <label>Follower</label>
                        <select class="form-select select2" id="neApprovalFollower">
                            <option value="">None</option>
                            <option>Victoria Celestie</option>
                            <option>Madison Andrew</option>
                            <option>Ryan Christopher</option>
                            <option>Emily Lauren</option>
                        </select>
                    </div>
                </div>

                <!-- Dynamic approval levels get appended here -->
                <div id="neApprovalExtraLevels" class="row"></div>
            </div>
        </div>

        <!-- TAB 12: OT Approval -->
        <div class="ne-panel" data-panel="12">
            <div class="ne-section-title">OT Approval :-</div>

            <div class="ne-otapp-wrapper">
                <!-- Base row: 1st Level Approval + Add -->
                <div class="ne-otapp-row col-md-6" id="neOtBaseRow">
                    <div class="ne-otapp-col">
                        <label>1st Level Approval</label>
                        <select class="form-select select2 ne-otapp-select" data-level="1">
                            <option value="">Non selected</option>
                            <option>Victoria Celestie</option>
                            <option>Madison Andrew</option>
                            <option>Ryan Christopher</option>
                            <option>Emily Lauren</option>
                        </select>
                    </div>

                    <button type="button" class="ne-otapp-btn-add bg-primary" id="neAddOtLevel" title="Add approval level">+</button>
                </div>

                <!-- Dynamic approval levels get appended here -->
                <div id="neOtExtraLevels" class="col-md-6"></div>
            </div>
        </div>

        <!-- TAB 13: Leave Rules -->
        <div class="ne-panel" data-panel="13">
            <div class="ne-section-title">Leave Auto-Update Rules :-</div>
                <!-- <div style="font-size:12.5px;color:var(--aw-ink-500);margin-top:-10px;margin-bottom:18px;">
                    Configure whether SL &amp; CL days are automatically updated when this employee's type changes
                    (<span style="color:var(--primary);font-weight:600;">Trainee</span> /
                    <span style="color:var(--primary);font-weight:600;">Probation</span> /
                    <span style="color:var(--primary);font-weight:600;">Confirmation</span>).
                </div> -->

                <div class="row g-3 mb-3">
                    <div class="col-lg-5 col-md-7">
                        <label class="form-label">Leave Type</label>
                        <select class="form-select select2" id="neLeaveTypeSelect">
                            <option value="">Select Leave Type</option>
                            <option value="Earned Leave">Earned Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                        </select>
                        <div style="font-size:11px;color:var(--aw-ink-500);margin-top:5px;">
                            <i class="bi bi-info-circle me-1"></i>Select a leave type to add it to the rules table.
                        </div>
                    </div>
                </div>

                <div class="ne-leave-rules-wrapper">
                    <table class="ne-kyc-table" id="neLeaveRulesTable">
                        <thead>
                            <tr>
                                <th style="width:22%;">&nbsp;</th>
                                <th style="text-align:center;">Trainee</th>
                                <th style="text-align:center;">Probation</th>
                                <th style="text-align:center;">Confirmation</th>
                                <th style="text-align:center;">No. of Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="ne-leave-rule-row" data-type="Casual Leave" style="--i:0;">
                                <td style="font-weight:700;color:var(--aw-ink-900);">Casual Leave</td>
                                <td style="text-align:center;">
                                    <input type="checkbox" class="ne-lr-check" data-stage="trainee">
                                </td>
                                <td style="text-align:center;">
                                    <input type="checkbox" class="ne-lr-check" data-stage="probation">
                                </td>
                                <td style="text-align:center;">
                                    <input type="checkbox" class="ne-lr-check" data-stage="confirmation">
                                </td>
                                <td style="text-align:center;">
                                    <input type="number" min="0" class="form-control ne-lr-days" placeholder="Days" style="width:100px;display:inline-block;text-align:center;border-color:var(--primary);color:var(--primary);font-weight:600;">
                                </td>
                            </tr>
                            <tr class="ne-leave-rule-row" data-type="Sick Leave" style="--i:1;">
                                <td style="font-weight:700;color:var(--aw-ink-900);">Sick Leave</td>
                                <td style="text-align:center;">
                                    <input type="checkbox" class="ne-lr-check" data-stage="trainee">
                                </td>
                                <td style="text-align:center;">
                                    <input type="checkbox" class="ne-lr-check" data-stage="probation">
                                </td>
                                <td style="text-align:center;">
                                    <input type="checkbox" class="ne-lr-check" data-stage="confirmation">
                                </td>
                                <td style="text-align:center;">
                                    <input type="number" min="0" class="form-control ne-lr-days" placeholder="Days" style="width:100px;display:inline-block;text-align:center;border-color:var(--primary);color:var(--primary);font-weight:600;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- <div style="font-size:11.5px;color:var(--aw-ink-500);margin-top:12px;">
                    Each stage works independently — switch on the stages where the leave days should auto-update. Hover a row and use the trash icon to remove it.
                </div> -->
        </div>

        <!-- TAB 14: Review -->
        <div class="ne-panel" data-panel="14">
            <div class="ne-section-title">Review &amp; Confirm :-</div>

            <!-- Tab 1: Profile Details -->
            <div class="ne-review-section">
                <h6><i class="bi bi-person"></i> Tab 1: Personal Details</h6>
                <div class="ne-review-grid" id="neReviewPersonal"></div>
            </div>

            <div class="ne-review-section">
                <h6><i class="bi bi-telephone"></i> Emergency Contact Details</h6>
                <div class="ne-review-grid" id="neReviewEmergency"></div>
            </div>

            <div class="ne-review-section">
                <h6><i class="bi bi-briefcase"></i> Job Details</h6>
                <div class="ne-review-grid" id="neReviewJob"></div>
            </div>

            <div class="ne-review-section">
                <h6><i class="bi bi-key"></i> Account Password</h6>
                <div class="ne-review-grid" id="neReviewPassword"></div>
            </div>

            <!-- Tab 2: Family Details -->
            <div class="ne-review-section">
                <h6><i class="bi bi-people"></i> Tab 2: Family Details</h6>
                <div class="ne-review-grid" id="neReviewFamily"></div>
            </div>

            <!-- Tab 3: Educational Details -->
            <div class="ne-review-section">
                <h6><i class="bi bi-mortarboard"></i> Tab 3: Educational Details</h6>
                <div class="ne-review-grid" id="neReviewEducation"></div>
            </div>

            <!-- Tab 4: Experience Details -->
            <div class="ne-review-section">
                <h6><i class="bi bi-briefcase-fill"></i> Tab 4: Work Experience Details</h6>
                <div class="ne-review-grid" id="neReviewExperience"></div>
            </div>

            <!-- Tab 5: Bank Account Details -->
            <div class="ne-review-section">
                <h6><i class="bi bi-bank"></i> Tab 5: Bank Account Details</h6>
                <div class="ne-review-grid" id="neReviewBank"></div>
            </div>

            <!-- Tab 6: KYC Documents -->
            <div class="ne-review-section">
                <h6><i class="bi bi-patch-check"></i> Tab 6: KYC Documents</h6>
                <div class="ne-review-grid" id="neReviewKyc"></div>
            </div>

            <!-- Tab 7: Relieving Request -->
            <div class="ne-review-section">
                <h6><i class="bi bi-box-arrow-right"></i> Tab 7: Resignation / Relieving Details</h6>
                <div class="ne-review-grid" id="neReviewRelieving"></div>
            </div>

            <!-- Tab 8: CTC Report -->
            <div class="ne-review-section">
                <h6><i class="bi bi-file-earmark-bar-graph"></i> Tab 8: CTC Report &amp; Salary Structure</h6>
                <div class="ne-review-grid" id="neReviewSalary"></div>
            </div>

            <!-- Tab 10: Reporting To -->
            <div class="ne-review-section">
                <h6><i class="bi bi-diagram-3"></i> Tab 10: Reporting To Flow</h6>
                <div class="ne-review-grid" id="neReviewReportingTo"></div>
            </div>

            <!-- Tab 11: Leave Approval -->
            <div class="ne-review-section">
                <h6><i class="bi bi-calendar2-check"></i> Tab 11: Leave Approval Hierarchy</h6>
                <div class="ne-review-grid" id="neReviewLeaveApproval"></div>
            </div>

            <!-- Tab 12: OT Approval -->
            <div class="ne-review-section">
                <h6><i class="bi bi-clock-history"></i> Tab 12: OT Approval Hierarchy</h6>
                <div class="ne-review-grid" id="neReviewOtApproval"></div>
            </div>

            <!-- Tab 13: Leave Rules -->
            <div class="ne-review-section">
                <h6><i class="bi bi-journal-text"></i> Tab 13: Leave Auto-Update Rules</h6>
                <div class="ne-review-grid" id="neReviewLeaveRules"></div>
            </div>

            <div class="ne-confirm-strip">
                <input class="form-check-input" type="checkbox" id="neConfirmAccuracy">
                <label class="form-check-label" for="neConfirmAccuracy">
                    I confirm the above details are accurate to the best of my knowledge.
                </label>
            </div>
        </div>

        <!-- ===== Footer navigation ===== -->
        <div class="ne-footer-nav">
            <a href="employees-report.php" class="btn btn-reject ne-spacer">Cancel</a>
            <button type="button" class="btn btn-outline-primary" id="nePrevBtn" disabled>
                <i class="bi bi-arrow-left"></i> Back
            </button>
            <button type="button" class="btn btn-primary" id="neNextBtn">
                Save &amp; Continue <i class="bi bi-arrow-right"></i>
            </button>
            <button type="submit" class="btn btn-primary" id="neSubmitBtn" style="display:none;">
                <i class="bi bi-check-lg"></i> Create Employee
            </button>
        </div>
    </form>
</div>

<!-- </div> -->

<!-- ===== Verification & Approval Status ===== -->
<div class="card-custom ne-va-card" id="neVerificationStatus" data-status="pending">
    <div class="ne-va-head">
        <div>
            <h5><i class="bi bi-patch-check"></i> Verification &amp; Approval Status</h5>
            <p>Track this employee record through verification and approval before it goes live.</p>
        </div>
        <span class="ne-va-badge status-pending" id="neVaBadge">
            <span class="dot"></span>
            <span id="neVaBadgeText">Pending</span>
        </span>
    </div>

    <div class="ne-va-info">
        <div class="ne-va-info-item">
            <div class="k"><i class="bi bi-person-badge"></i> Assigned Verifier</div>
            <div class="v">Gharuda Tester</div>
        </div>
        <div class="ne-va-info-item">
            <div class="k"><i class="bi bi-check2-circle"></i> Verified By</div>
            <div class="v muted">Not yet verified</div>
            <div class="r">Remarks: —</div>
        </div>
        <div class="ne-va-info-item">
            <div class="k"><i class="bi bi-person-check"></i> Assigned Approver</div>
            <div class="v link">Gharuda Software</div>
        </div>
        <div class="ne-va-info-item">
            <div class="k"><i class="bi bi-patch-check-fill"></i> Approved By</div>
            <div class="v muted">Not yet approved</div>
            <div class="r">Remarks: —</div>
        </div>
        <div class="ne-va-info-item">
            <div class="k"><i class="bi bi-x-octagon"></i> Rejected By</div>
            <div class="v muted">Not yet rejected</div>
            <div class="r">Remarks: —</div>
        </div>
    </div>

    <div class="ne-va-stepper" id="neVaStepper">
        <div class="ne-va-track" id="neVaTrack"></div>

        <div class="ne-va-step is-current" data-step="pending">
            <div class="ne-va-step-circle">1</div>
            <div class="ne-va-step-label">Pending</div>
        </div>
        <div class="ne-va-step" data-step="verified">
            <div class="ne-va-step-circle">2</div>
            <div class="ne-va-step-label">Verified</div>
        </div>
        <div class="ne-va-step" data-step="approved">
            <div class="ne-va-step-circle">3</div>
            <div class="ne-va-step-label">Approved</div>
        </div>
        <div class="ne-va-step" data-step="rejected">
            <div class="ne-va-step-circle"><i class="bi bi-x-lg"></i></div>
            <div class="ne-va-step-label">Rejected</div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="employeeUploadOffcanvas" aria-labelledby="employeeUploadTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="employeeUploadTitle"><i class="bi bi-people me-2" style="color:var(--primary);"></i> Add Employees</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="employee-bulk-panel show" id="employeeBulkPanel">
            <div class="employee-bulk-dropzone" id="employeeBulkDropzone">
                <div class="mode-icon"><i class="bi bi-cloud-arrow-up"></i></div>
                <h6>Upload employee spreadsheet</h6>
                <p>Drop your Excel or CSV file here, or <span class="browse-link">browse</span>.</p>
                <div class="text-muted" style="font-size:11px;">Supports .xlsx, .xls, .csv</div>
            </div>
            <div class="employee-upload-file" id="employeeUploadFile"><i class="bi bi-file-earmark-excel"></i><span id="employeeUploadFileName"></span></div>
            <div class="employee-upload-count" id="employeeUploadCount"><span><i class="bi bi-people me-1"></i> Employees found</span><strong>24</strong></div>
        </div>
        <input type="file" id="bulkUploadInput" accept=".xlsx,.xls,.csv" hidden>
    </div>
    <div class="offcanvas-footer p-3 border-top d-flex justify-content-end">
        <button type="button" class="btn btn-reject" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="button" class="btn btn-primary ms-2" id="confirmBulkUpload" disabled><i class="bi bi-check-lg me-1"></i> Confirm Upload</button>
    </div>
</div>

<?php include 'footer.php'; ?>


 
































<!-- ===== Department → Designation cascade (Job Details block) ===== -->


<script src="./assets/js/pages/new-employee.js?v=<?php echo time(); ?>"></script>