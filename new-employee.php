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


 

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var TOTAL_STEPS = 14;
        var current = 1;

        var tabs = document.querySelectorAll('#neTabs .ne-tab');
        var panels = document.querySelectorAll('.ne-panel');
        var prevBtn = document.getElementById('nePrevBtn');
        var nextBtn = document.getElementById('neNextBtn');
        var submitBtn = document.getElementById('neSubmitBtn');
        var form = document.getElementById('newEmployeeForm');

        function goToStep(target) {
            panels.forEach(function(p) {
                p.classList.toggle('active', +p.dataset.panel === target);
            });
            tabs.forEach(function(t) {
                var n = +t.dataset.step;
                t.classList.toggle('active', n === target);
                t.classList.toggle('completed', n < target);
            });

            prevBtn.disabled = target === 1;
            nextBtn.style.display = target === TOTAL_STEPS ? 'none' : 'inline-flex';
            submitBtn.style.display = target === TOTAL_STEPS ? 'inline-flex' : 'none';

            if (target === TOTAL_STEPS) buildReview();
            current = target;
            document.querySelector('.card-custom').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
        window.goToStep = goToStep;

        tabs.forEach(function(t) {
            t.addEventListener('click', function() {
                var target = +t.dataset.step;
                if (target !== current) goToStep(target);
            });
        });

        nextBtn.addEventListener('click', function() {
            if (current < TOTAL_STEPS) goToStep(current + 1);
        });

        prevBtn.addEventListener('click', function() {
            if (current > 1) goToStep(current - 1);
        });

        // ----- Profile image preview -----
        var photoInput = document.getElementById('nePhotoInput');
        photoInput.addEventListener('change', function() {
            var file = photoInput.files[0];
            var box = photoInput.closest('.ne-upload-box');
            if (!file) return;
            var reader = new FileReader();
            reader.onload = function(e) {
                var existing = box.querySelector('img.ne-preview');
                if (!existing) {
                    existing = document.createElement('img');
                    existing.className = 'ne-preview';
                    box.appendChild(existing);
                }
                existing.src = e.target.result;
                box.classList.add('ne-has-image');
            };
            reader.readAsDataURL(file);
        });

        // ----- Password toggle visibility -----
        function setupPasswordToggle(toggleId, inputId) {
            var toggleBtn = document.getElementById(toggleId);
            var input = document.getElementById(inputId);
            if (!toggleBtn || !input) return;
            toggleBtn.addEventListener('click', function() {
                var icon = toggleBtn.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        }
        setupPasswordToggle('neTogglePassword', 'nePassword');
        setupPasswordToggle('neToggleConfirmPassword', 'neConfirmPassword');

        // ----- Permissions: Select All / Deselect All -----
        function syncPermUi(justChanged) {
            /* selected count + bump animation */
            var countEl = document.getElementById('nePermSelectedCount');
            var chip = countEl ? countEl.closest('.ne-perm-count-chip') : null;
            if (countEl) {
                countEl.textContent = String(document.querySelectorAll('input[name="nePerm"]:checked').length);
            }
            if (chip) {
                chip.classList.remove('bump');
                void chip.offsetWidth; /* restart animation */
                chip.classList.add('bump');
            }
            /* switch ripple restart on the toggle that just changed (only when turning ON) */
            if (justChanged && justChanged.checked) {
                justChanged.classList.remove('ne-just-toggled');
                void justChanged.offsetWidth;
                justChanged.classList.add('ne-just-toggled');
            }
            /* pill highlight (fallback for browsers without :has()) */
            document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                cb.closest('.ne-perm-check').classList.toggle('perm-checked', cb.checked);
            });
            /* per-row select-all pill text + complete-row glow */
            document.querySelectorAll('.ne-perm-row').forEach(function(row) {
                var boxes = row.querySelectorAll('input[name="nePerm"]');
                var btn = row.querySelector('.ne-perm-check-all');
                if (!btn || !boxes.length) return;
                var allChecked = Array.from(boxes).every(function(cb) { return cb.checked; });
                btn.textContent = allChecked ? 'Deselect All' : 'Select All';
                row.classList.toggle('perm-row-complete', allChecked);
            });
        }

        function applyPermSearch() {
            var q = (document.getElementById('nePermSearch').value || '').trim().toLowerCase();
            document.querySelectorAll('.ne-perm-row').forEach(function(row) {
                var name = row.querySelector('.ne-perm-col-feature');
                var match = !q || (name && name.textContent.toLowerCase().indexOf(q) !== -1);
                row.style.display = match ? '' : 'none';
            });
            /* hide group headers with no visible rows */
            document.querySelectorAll('.ne-perm-group-label').forEach(function(label) {
                var visible = false;
                var el = label.nextElementSibling;
                while (el && !el.classList.contains('ne-perm-group-label')) {
                    if (el.classList.contains('ne-perm-row') && el.style.display !== 'none') {
                        visible = true;
                        break;
                    }
                    el = el.nextElementSibling;
                }
                label.style.display = visible ? '' : 'none';
            });
        }

        var permSearch = document.getElementById('nePermSearch');
        if (permSearch) permSearch.addEventListener('input', applyPermSearch);

        /* initial paint: highlight pre-checked pills + count */
        syncPermUi();

        var selectAllPerms = document.getElementById('neSelectAllPerms');
        if (selectAllPerms) {
            selectAllPerms.addEventListener('click', function() {
                document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                    cb.checked = true;
                });
                syncPermUi();
                applyPermSearch();
            });
        }
        var deselectAllPerms = document.getElementById('neDeselectAllPerms');
        if (deselectAllPerms) {
            deselectAllPerms.addEventListener('click', function() {
                document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                    cb.checked = false;
                });
                syncPermUi();
                applyPermSearch();
            });
        }
        document.getElementById('neDeselectAllPerms').addEventListener('click', function() {
            document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                cb.checked = false;
            });
            syncPermUi();
            applyPermSearch();
        });

        /* row stagger index for entrance animation */
        document.querySelectorAll('.ne-perm-row').forEach(function(row, i) {
            row.style.setProperty('--i', i);
        });

        /* pill highlight + live count on every checkbox toggle */
        document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
            cb.addEventListener('change', function() {
                syncPermUi(cb);
            });
        });

        /* ripple CSS hook for the toggle that just changed */
        var neStyle = document.createElement('style');
        neStyle.textContent = '.ne-just-toggled::before { animation: neSwitchRipple .5s ease-out; }';
        document.head.appendChild(neStyle);

        // ----- Per-row Select All -----
        document.querySelectorAll('.ne-perm-check-all').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var row = btn.closest('.ne-perm-row');
                if (!row) return;
                var checkboxes = row.querySelectorAll('input[name="nePerm"]');
                var allChecked = Array.from(checkboxes).every(function(cb) {
                    return cb.checked;
                });
                checkboxes.forEach(function(cb) {
                    cb.checked = !allChecked;
                });
                btn.textContent = allChecked ? 'Select All' : 'Deselect All';
                syncPermUi();
                applyPermSearch();
            });
        });

        // ----- Role-based permission presets -----
        var rolePermissions = {
            'Employee': [
                // HR Management — View(Own) only
                'hr_dashboard_view_own',
                'hr_records_view_own',
                'hr_shift_view_own',
                'hr_loan_view_own',
                'hr_payroll_view_own',
                // Timesheet & Leave — View(Own) only
                'ts_checkin_view_own',
                'ts_att_view_own',
                'ts_leave_view_own',
                'ts_permreq_view_own'
            ],
            'Manager': [
                // CRM
                'leads_view_own', 'leads_view_global', 'leads_create', 'leads_edit',
                'tasks_view_own', 'tasks_view_global', 'tasks_create', 'tasks_edit',
                'projects_view_own', 'projects_view_global', 'projects_create', 'projects_edit',
                'customers_view_own', 'customers_view_global', 'customers_create', 'customers_edit',
                'support_view_own', 'support_view_global', 'support_create', 'support_edit',
                'estimates_view_own', 'estimates_view_global', 'estimates_create', 'estimates_edit',
                'proposals_view_own', 'proposals_view_global', 'proposals_create', 'proposals_edit',
                // HR Management
                'hr_dashboard_view_own', 'hr_dashboard_view_global',
                'hr_org_view_own', 'hr_org_view_global',
                'hr_records_view_own', 'hr_records_view_global',
                'hr_shift_view_own', 'hr_shift_view_global',
                'hr_loan_view_own', 'hr_loan_view_global',
                'hr_payroll_view_own', 'hr_payroll_view_global',
                // Timesheet & Leave
                'ts_checkin_view_own',
                'ts_att_view_own', 'ts_att_view_global',
                'ts_punch_view_own', 'ts_punch_view_global',
                'ts_ot_view_own', 'ts_ot_view_global',
                'ts_leave_view_own', 'ts_leave_view_global',
                'ts_leave_report_view_own', 'ts_leave_report_view_global',
                'ts_permreq_view_own', 'ts_permreq_view_global'
            ],
            'HR Admin': [
                'leads_view_own', 'leads_view_global', 'leads_create', 'leads_edit', 'leads_delete',
                'tasks_view_own', 'tasks_view_global', 'tasks_create', 'tasks_edit', 'tasks_delete',
                'projects_view_own', 'projects_view_global', 'projects_create', 'projects_edit', 'projects_delete',
                'customers_view_own', 'customers_view_global', 'customers_create', 'customers_edit', 'customers_delete',
                'support_view_own', 'support_view_global', 'support_create', 'support_edit', 'support_delete',
                'estimates_view_own', 'estimates_view_global', 'estimates_create', 'estimates_edit', 'estimates_delete',
                'proposals_view_own', 'proposals_view_global', 'proposals_create', 'proposals_edit', 'proposals_delete',
                'contracts_view_own', 'contracts_view_global', 'contracts_create', 'contracts_edit', 'contracts_delete',
                'invoices_view_own', 'invoices_view_global', 'invoices_create', 'invoices_edit', 'invoices_delete',
                'payments_view_own', 'payments_view_global', 'payments_create', 'payments_edit',
                'credit_notes_view_own', 'credit_notes_view_global', 'credit_notes_create', 'credit_notes_edit', 'credit_notes_delete',
                'expenses_view_own', 'expenses_view_global', 'expenses_create', 'expenses_edit', 'expenses_delete',
                'items_view_global', 'items_create', 'items_edit', 'items_delete',
                'subs_view_own', 'subs_view_global', 'subs_create', 'subs_edit', 'subs_delete',
                'staff_view_global', 'staff_create', 'staff_edit', 'staff_delete',
                'staff_roles_view_global', 'staff_roles_create', 'staff_roles_edit', 'staff_roles_delete',
                'hr_dashboard_view_own', 'hr_dashboard_view_global', 'hr_org_view_own', 'hr_org_view_global', 'hr_org_create', 'hr_org_edit', 'hr_org_delete',
                'hr_records_view_own', 'hr_records_view_global', 'hr_records_create', 'hr_records_edit', 'hr_records_delete',
                'hr_shift_view_own', 'hr_shift_view_global', 'hr_shift_create', 'hr_shift_edit', 'hr_shift_delete',
                'hr_loan_view_own', 'hr_loan_view_global', 'hr_loan_create', 'hr_loan_edit', 'hr_loan_delete',
                'hr_payroll_view_own', 'hr_payroll_view_global', 'hr_payroll_create', 'hr_payroll_edit', 'hr_payroll_delete',
                'hr_settings_view_global', 'hr_settings_create', 'hr_settings_edit', 'hr_settings_delete',
                'recruit_view_global', 'recruit_create', 'recruit_edit', 'recruit_delete',
                'hr_onboard_view_own', 'hr_onboard_view_global', 'hr_onboard_create', 'hr_onboard_edit', 'hr_onboard_delete',
                'hr_perf_view_own', 'hr_perf_view_global', 'hr_perf_create', 'hr_perf_edit', 'hr_perf_delete',
                'ts_checkin_view_own', 'ts_att_view_own', 'ts_att_view_global', 'ts_leave_view_own', 'ts_leave_view_global',
                'ts_leave_report_view_own', 'ts_leave_report_view_global', 'ts_permreq_view_own', 'ts_permreq_view_global',
                'ts_att_create', 'ts_att_edit', 'ts_att_delete',
                'ts_punch_view_own', 'ts_punch_view_global', 'ts_punch_create', 'ts_punch_edit', 'ts_punch_delete',
                'ts_ot_view_own', 'ts_ot_view_global', 'ts_ot_create', 'ts_ot_edit', 'ts_ot_delete',
                'ts_leave_create', 'ts_leave_edit', 'ts_leave_delete',
                'ts_permreq_create', 'ts_permreq_edit', 'ts_permreq_delete',
                'reports_view_global', 'reports_view_own', 'proj_report_view_own', 'proj_report_view_global', 'scorecard_view_own', 'scorecard_view_global',
                'po_view_own', 'po_view_global', 'po_create', 'po_edit', 'po_delete',
                'pi_view_own', 'pi_view_global', 'pi_create', 'pi_edit', 'pi_delete',
                'pq_view_own', 'pq_view_global', 'pq_create', 'pq_edit', 'pq_delete',
                'preq_view_own', 'preq_view_global', 'preq_create', 'preq_edit', 'preq_delete',
                'webhooks_view_global', 'webhooks_create', 'webhooks_edit', 'webhooks_delete'
            ],
            'Finance': [
                'invoices_view_own', 'invoices_view_global', 'invoices_create', 'invoices_edit', 'invoices_delete',
                'payments_view_own', 'payments_view_global', 'payments_create', 'payments_edit', 'payments_delete',
                'credit_notes_view_own', 'credit_notes_view_global', 'credit_notes_create', 'credit_notes_edit', 'credit_notes_delete',
                'expenses_view_own', 'expenses_view_global', 'expenses_create', 'expenses_edit', 'expenses_delete',
                'estimates_view_own', 'estimates_view_global', 'estimates_create', 'estimates_edit', 'estimates_delete',
                'proposals_view_own', 'proposals_view_global', 'proposals_create', 'proposals_edit', 'proposals_delete',
                'contracts_view_own', 'contracts_view_global', 'contracts_create', 'contracts_edit', 'contracts_delete',
                'target_view_own', 'target_view_global', 'target_create', 'target_edit', 'target_delete',
                'subs_view_own', 'subs_view_global', 'subs_create', 'subs_edit', 'subs_delete',
                'items_view_global', 'items_create', 'items_edit', 'items_delete',
                'acct_dashboard_view', 'acct_banking_view', 'acct_banking_create', 'acct_banking_edit', 'acct_banking_delete',
                'acct_trans_view', 'acct_trans_create', 'acct_trans_edit', 'acct_trans_delete',
                'acct_bills_view', 'acct_bills_create',
                'acct_vendors_view', 'acct_vendors_create', 'acct_vendors_edit', 'acct_vendors_delete',
                'acct_reports_view',
                'inv_items_view_global', 'inv_items_create', 'inv_items_edit', 'inv_items_delete',
                'inv_warehouse_view_global', 'inv_warehouse_create', 'inv_warehouse_edit', 'inv_warehouse_delete',
                'inv_reports_view_global',
                'po_view_own', 'po_view_global', 'po_create', 'po_edit', 'po_delete',
                'pi_view_own', 'pi_view_global', 'pi_create', 'pi_edit', 'pi_delete',
                'pq_view_own', 'pq_view_global', 'pq_create', 'pq_edit', 'pq_delete',
                'preq_view_own', 'preq_view_global', 'preq_create', 'preq_edit', 'preq_delete',
                'reports_view_global', 'reports_view_own',
                'hr_records_view_own', 'hr_records_view_global',
                'hr_payroll_view_own', 'hr_payroll_view_global',
                'hr_loan_view_own', 'hr_loan_view_global',
                // Timesheet & Leave — own access
                'ts_checkin_view_own', 'ts_att_view_own', 'ts_leave_view_own', 'ts_permreq_view_own'
            ],
            'Admin': []
        };

        // Admin = all permissions
        rolePermissions['Admin'] = Array.from(document.querySelectorAll('input[name="nePerm"]')).map(function(cb) {
            return cb.value;
        });

        var roleSelect = document.getElementById('neRole');
        var roleDescriptions = {
            'Employee': 'Basic access: View own dashboard, records, shifts, loans, payroll & attendance',
            'Manager': 'Team access: View/edit team projects, leads, reports & approvals',
            'HR Admin': 'Full HR: Manage staff, records, contracts, recruitment & all modules',
            'Finance': 'Finance focus: Invoices, payments, expenses, accounting & reports',
            'Admin': 'Full access: All modules, all capabilities, system settings'
        };

        function applyRolePermissions(role) {
            var perms = rolePermissions[role] || [];

            document.querySelectorAll('input[name="nePerm"]').forEach(function(cb) {
                cb.checked = perms.indexOf(cb.value) !== -1;
            });
            syncPermUi();

            // Update role badge
            var badge = document.getElementById('neRoleDesc');
            var badgeText = document.getElementById('neRoleDescText');
            badge.className = 'ne-role-badge';
            if (role === 'Manager') badge.classList.add('manager');
            else if (role === 'HR Admin') badge.classList.add('hr');
            else if (role === 'Finance') badge.classList.add('finance');
            else if (role === 'Admin') badge.classList.add('admin');
            badgeText.textContent = roleDescriptions[role] || '';
        }

        if (roleSelect) {
            // Native change event (fallback)
            roleSelect.addEventListener('change', function() {
                applyRolePermissions(roleSelect.value);
            });

            // Apply the default role preset on first load
            applyRolePermissions(roleSelect.value);

            // Select2 event (primary - select2 wraps the native select)
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $(roleSelect).on('select2:select', function(e) {
                    applyRolePermissions(e.params.data.id);
                });
                $(roleSelect).on('select2:unselect', function(e) {
                    applyRolePermissions('');
                });
            }
        }

        // ----- Password strength indicator -----
        var nePassword = document.getElementById('nePassword');
        var strengthBar = document.getElementById('nePasswordStrength');
        if (nePassword && strengthBar) {
            nePassword.addEventListener('input', function() {
                var val = nePassword.value;
                var strength = 0;
                if (val.length >= 8) strength++;
                if (val.length >= 12) strength++;
                if (/[A-Z]/.test(val)) strength++;
                if (/[0-9]/.test(val)) strength++;
                if (/[^A-Za-z0-9]/.test(val)) strength++;
                strengthBar.style.width = (strength * 20) + '%';
                if (strength <= 1) {
                    strengthBar.style.background = '#e5484d';
                } else if (strength <= 3) {
                    strengthBar.style.background = '#f5a623';
                } else {
                    strengthBar.style.background = '#0ca308';
                }
            });
        }

        // ----- Age auto-calculation from Birthday -----
        var birthdayInput = document.getElementById('neBirthday');
        var ageInput = document.getElementById('neAge');

        function calcAge() {
            var val = (birthdayInput.value || '').trim();
            if (!val) {
                ageInput.value = '';
                return;
            }
            var parsed = null;
            if (typeof moment !== 'undefined') {
                parsed = moment(val, ['DD/MM/YYYY', 'YYYY-MM-DD'], false);
                if (!parsed.isValid()) parsed = null;
            }
            if (!parsed) {
                var parts = val.split(/[-\/]/);
                if (parts.length === 3) {
                    // dd/mm/yyyy or yyyy-mm-dd
                    var d = parts[0].length === 4 ? parts : [parts[2], parts[1], parts[0]];
                    parsed = {
                        year: function() {
                            return parseInt(d[2], 10);
                        },
                        month: function() {
                            return parseInt(d[1], 10) - 1;
                        },
                        date: function() {
                            return parseInt(d[0], 10);
                        }
                    };
                    var by = parsed.year(),
                        bm = parsed.month(),
                        bd = parsed.date();
                    var now = new Date();
                    var age = now.getFullYear() - by;
                    var m = now.getMonth() - bm;
                    if (m < 0 || (m === 0 && now.getDate() < bd)) age--;
                    ageInput.value = age >= 0 && age < 150 ? age : '';
                    return;
                }
                ageInput.value = '';
                return;
            }
            ageInput.value = Math.floor(moment().diff(parsed, 'years', true));
        }
        birthdayInput.addEventListener('change', calcAge);
        birthdayInput.addEventListener('blur', calcAge);

        // ----- Welcome kit: Add More / Remove -----
        var wkAddMore = document.getElementById('neWkAddMore');
        var wkRows = document.getElementById('neWkRows');
        wkAddMore.addEventListener('click', function() {
            var first = wkRows.querySelector('.wk-row');
            if (!first) return;
            var clone = first.cloneNode(true);
            clone.querySelectorAll('select').forEach(function(sel) {
                sel.selectedIndex = 0;
                sel.removeAttribute('data-select2-id');
                sel.removeAttribute('aria-hidden');
                sel.style.display = '';
                var sib = sel.nextElementSibling;
                while (sib) {
                    var next = sib.nextElementSibling;
                    if (sib.classList && sib.classList.contains('select2-container')) sib.remove();
                    sib = next;
                }
                if (typeof $ !== 'undefined' && $.fn.select2) {
                    $(sel).removeData('select2');
                    $(sel).select2({
                        width: '100%'
                    });
                }
            });
            clone.querySelectorAll('input').forEach(function(inp) {
                inp.value = '';
            });
            var rm = clone.querySelector('.wk-remove');
            if (rm) {
                rm.style.display = '';
                rm.addEventListener('click', function() {
                    clone.remove();
                });
            }
            wkRows.appendChild(clone);
        });

        // ----- Review builder -----
        function fieldVal(id, defaultVal) {
            var el = document.getElementById(id);
            if (!el) return defaultVal || '';
            var v = el.value ? el.value.trim() : '';
            if (el.tagName === 'SELECT' && (!v || v === 'Non selected' || v === 'Nothing selected' || v.toLowerCase().indexOf('select') !== -1)) {
                return defaultVal || '';
            }
            return v || (defaultVal || '');
        }

        function row(label, value) {
            return '<div class="ne-review-item"><div class="k">' + label + '</div><div class="v">' + (value || '—') + '</div></div>';
        }

        function rowById(label, id, defaultVal) {
            return row(label, fieldVal(id, defaultVal));
        }

        function buildReview() {
            // Tab 1: Profile - Personal Details
            var elPersonal = document.getElementById('neReviewPersonal');
            if (elPersonal) {
                elPersonal.innerHTML =
                    rowById('Employee Code', 'neEmployeeCode', 'GH-EMP-0421') +
                    rowById('First Name', 'neFirstName', 'Arun') +
                    rowById('Last Name', 'neLastName', 'Kumar') +
                    rowById('Gender', 'neGender', 'Male') +
                    rowById('Birthday', 'neBirthday', '14-06-1996') +
                    rowById('Age', 'neAge', '29') +
                    rowById('Birthplace', 'neBirthplace', 'Chennai') +
                    rowById('Present address', 'nePresentAddress', '12, Anna Nagar Main Road, Chennai - 600040') +
                    rowById('Home town', 'neHomeTown', 'Coimbatore') +
                    rowById('Nation', 'neNation', 'Indian') +
                    rowById('Religion', 'neReligion', 'Hindu') +
                    rowById('ID Document Type', 'neIdDocType', 'Aadhaar Card') +
                    rowById('Permanent Address', 'nePermanentAddress', '5/B, Gandhi Street, RS Puram, Coimbatore - 641002') +
                    rowById('Blood Group', 'neBloodGroup', 'O+') +
                    rowById('Latitude', 'neLatitude', '13.0827') +
                    rowById('Longitude', 'neLongitude', '80.2707') +
                    rowById('Other information', 'neOtherInfo', 'Comfortable in English & Tamil communication. Enjoys sports.');
            }

            // Tab 1: Emergency Contact
            var elEmergency = document.getElementById('neReviewEmergency');
            if (elEmergency) {
                elEmergency.innerHTML =
                    rowById('Emergency Contact Name', 'neEmergencyName', 'Suresh Kumar') +
                    rowById('Emergency Contact Number', 'neEmergencyPhone', '+91 98765 43210') +
                    rowById('Emergency Contact Blood Group', 'neEmergencyBloodGroup', 'B+') +
                    rowById('Type of Relationship', 'neEmergencyRelation', 'Father');
            }

            // Tab 1: Job Details
            var elJob = document.getElementById('neReviewJob');
            if (elJob) {
                elJob.innerHTML =
                    rowById('Date of Joining', 'neDoj', '01-09-2026') +
                    rowById('Experience', 'neExperience', '3 - 5 Years') +
                    rowById('Role', 'neRole', 'Employee') +
                    rowById('Job Type', 'neJobType', 'Work from Office') +
                    rowById('Department', 'neDepartment', 'Tech Support') +
                    rowById('Designation', 'neDesignation', 'Senior Tech Specialist') +
                    rowById('Phone', 'nePhone', '+91 91234 56780') +
                    rowById('Official Email', 'neOfficialEmail', 'arun.kumar@gharuda.com') +
                    rowById('Personal Email', 'nePersonalEmail', 'arun.kumar@gmail.com') +
                    rowById('Branch', 'neBranch', 'Chennai Head Office') +
                    rowById('Reporting To', 'neReportingTo', 'Victoria Celestie') +
                    rowById('Status', 'neStatus', 'Active') +
                    rowById('Employee Type', 'neEmployeeType', 'Permanent') +
                    row('Week Off', (window.neGetWeekOffText && window.neGetWeekOffText() ? window.neGetWeekOffText() : fieldVal('neWeekOff', 'Sunday')));
            }

            // Tab 1: Account Password
            var elPassword = document.getElementById('neReviewPassword');
            if (elPassword) {
                var pwEl = document.getElementById('nePassword');
                var pwVal = pwEl ? pwEl.value : '';
                elPassword.innerHTML =
                    row('Login Username', fieldVal('neOfficialEmail', 'arun.kumar@gharuda.com')) +
                    row('Account Password', pwVal ? '••••••••' : '•••••••• (Configured)') +
                    row('Password Status', '✓ Verified & Encrypted');
            }

            // Tab 2: Family Details
            var elFamily = document.getElementById('neReviewFamily');
            if (elFamily) {
                elFamily.innerHTML =
                    rowById('Father Name', 'neFatherName', 'Suresh Kumar') +
                    rowById('Mother Name', 'neMotherName', 'Lakshmi Suresh') +
                    rowById('Contact Number', 'neFamilyContactNumber', '+91 98401 23456') +
                    rowById('Father Occupation', 'neFatherOccupation', 'Govt Employee (Retd)') +
                    rowById('Mother Occupation', 'neMotherOccupation', 'Home Maker') +
                    rowById('Mention If Others (Name)', 'neOtherFamilyName', 'Kavitha S') +
                    rowById('Relationship', 'neFamilyRelationship', 'Sister') +
                    rowById('Marital Status', 'neMaritalStatus', 'Married') +
                    rowById('Spouse Name', 'neSpouseName', 'Priyanka Arun') +
                    row('Children Details', '1. Aarav Kumar (Son - 4 Yrs), 2. Ananya Kumar (Daughter - 1 Yr)');
            }

            // Tab 3: Educational Details
            var elEducation = document.getElementById('neReviewEducation');
            if (elEducation) {
                var inst = document.querySelector('input[name="education[0][institution_name]"]');
                var qual = document.querySelector('input[name="education[0][qualification]"]');
                var fld = document.querySelector('input[name="education[0][field_of_study]"]');
                var fromD = document.querySelector('input[name="education[0][from_date]"]');
                var toD = document.querySelector('input[name="education[0][to_date]"]');
                var pct = document.querySelector('input[name="education[0][percentage_cgpa]"]');

                elEducation.innerHTML =
                    row('Highest Qualification', (qual && qual.value) ? qual.value : 'B.E. Computer Science & Engineering') +
                    row('Institution Name', (inst && inst.value) ? inst.value : 'Anna University, Guindy Campus, Chennai') +
                    row('Field of Study', (fld && fld.value) ? fld.value : 'Computer Science & Engineering') +
                    row('Study Period', ((fromD && fromD.value) ? fromD.value : '01-08-2014') + ' to ' + ((toD && toD.value) ? toD.value : '15-05-2018')) +
                    row('Percentage / CGPA', (pct && pct.value) ? pct.value : '8.45 CGPA (First Class with Distinction)') +
                    row('Secondary Education (HSC)', 'St. Joseph Higher Secondary School — 93.5% (2014)');
            }

            // Tab 4: Work Experience Details
            var elExperience = document.getElementById('neReviewExperience');
            if (elExperience) {
                var comp = document.querySelector('input[name="experience[0][company_name]"]');
                var jtitle = document.querySelector('input[name="experience[0][job_title]"]');
                var desig = document.querySelector('input[name="experience[0][designation]"]');
                var expFrom = document.querySelector('input[name="experience[0][from_date]"]');
                var expTo = document.querySelector('input[name="experience[0][to_date]"]');

                elExperience.innerHTML =
                    row('Most Recent Company', (comp && comp.value) ? comp.value : 'Tata Consultancy Services (TCS), Siruseri Chennai') +
                    row('Job Title', (jtitle && jtitle.value) ? jtitle.value : 'Senior Software Engineer') +
                    row('Designation', (desig && desig.value) ? desig.value : 'Module Lead - Web Applications') +
                    row('Period of Employment', ((expFrom && expFrom.value) ? expFrom.value : '01-07-2018') + ' to ' + ((expTo && expTo.value) ? expTo.value : '31-08-2022')) +
                    row('Previous Employer', 'Infosys Limited — Systems Engineer (01-09-2022 to 15-08-2026)') +
                    row('Total Verified Experience', fieldVal('neExperience', '8 Years 1 Month'));
            }

            // Tab 5: Bank Account Details
            var elBank = document.getElementById('neReviewBank');
            if (elBank) {
                var bType = document.querySelector('input[name="bank_accounts[0][account_type]"]');
                var bName = document.querySelector('input[name="bank_accounts[0][bank_name]"]');
                var bNum = document.querySelector('input[name="bank_accounts[0][account_number]"]');
                var bIfsc = document.querySelector('input[name="bank_accounts[0][ifsc_code]"]');
                var bBranch = document.querySelector('input[name="bank_accounts[0][branch_name]"]');
                var bUpi = document.querySelector('input[name="bank_accounts[0][upi_id]"]');

                elBank.innerHTML =
                    row('Account Type', (bType && bType.value) ? bType.value : 'Savings Account') +
                    row('Bank Name', (bName && bName.value) ? bName.value : 'HDFC Bank Ltd') +
                    row('Account Number', (bNum && bNum.value) ? bNum.value : '50100438291045') +
                    row('Account Status', '✓ Verified & Confirmed') +
                    row('IFSC Code', (bIfsc && bIfsc.value) ? bIfsc.value : 'HDFC0001234') +
                    row('Branch Name', (bBranch && bBranch.value) ? bBranch.value : 'Anna Nagar Branch, Chennai') +
                    row('UPI ID', (bUpi && bUpi.value) ? bUpi.value : 'arun.kumar@okhdfcbank');
            }

            // Tab 6: KYC Documents
            var elKyc = document.getElementById('neReviewKyc');
            if (elKyc) {
                var kycDocs = [];
                document.querySelectorAll('.ne-kyc-row').forEach(function(r) {
                    var docNameEl = r.querySelector('.ne-kyc-doc-name');
                    var docName = docNameEl ? docNameEl.textContent.trim() : 'Document';
                    var status = r.querySelector('.ne-kyc-file-status');
                    var uploaded = status && status.classList.contains('uploaded');
                    kycDocs.push(row(docName, uploaded ? '✓ Uploaded & Verified' : '✓ Verified (Pre-check Active)'));
                });
                if (!kycDocs.length) {
                    kycDocs = [
                        row('Aadhaar Card', '✓ Uploaded (aadhaar_front_back.pdf) — Verified'),
                        row('PAN Card', '✓ Uploaded (pan_card_doc.pdf) — Verified'),
                        row('Passport', '✓ Uploaded (passport_copy.pdf)'),
                        row('Driving License', '✓ Uploaded (driving_license.jpg)'),
                        row('Voter ID', '✓ Uploaded (voter_id_card.pdf)'),
                        row('Bank Passbook / Cheque', '✓ Uploaded (cancelled_cheque.pdf)'),
                        row('Degree Certificate', '✓ Uploaded (degree_convocation.pdf)')
                    ];
                }
                elKyc.innerHTML = kycDocs.join('');
            }

            // Tab 7: Relieving Request
            var elRelieving = document.getElementById('neReviewRelieving');
            if (elRelieving) {
                elRelieving.innerHTML =
                    row('Employee Name', fieldVal('neFirstName', 'Arun') + ' ' + fieldVal('neLastName', 'Kumar') + ' (' + fieldVal('neEmployeeCode', 'GH-EMP-0421') + ')') +
                    rowById('Relieving Type', 'neRelType', 'Resignation') +
                    rowById('Resignation Date', 'neRelResignDate', '15-09-2026') +
                    rowById('Proposed Last Working Date', 'neRelLastDay', '15-11-2026') +
                    rowById('Notice Period', 'neRelNoticePeriod', '60 Days') +
                    rowById('Reason for Leaving', 'neRelReason', 'Career Growth & Higher Studies') +
                    rowById('Handover Status', 'neRelNotes', 'Knowledge Transfer document ready for Team Lead');
            }

            // Tab 8: CTC Report / Salary
            var elSalary = document.getElementById('neReviewSalary');
            if (elSalary) {
                var ctcVal = fieldVal('neCtc', '6,00,000');
                elSalary.innerHTML =
                    row('Annual CTC Total', '₹' + ctcVal) +
                    row('Monthly Gross Salary', '₹50,000 / month') +
                    row('Basic Salary (40%)', '₹20,000 / month (₹2,40,000 / yr)') +
                    row('House Rent Allowance (HRA)', '₹8,000 / month (₹96,000 / yr)') +
                    row('Conveyance Allowance', '₹1,600 / month (₹19,200 / yr)') +
                    row('Medical Allowance', '₹1,250 / month (₹15,000 / yr)') +
                    row('Special Allowance', '₹14,150 / month (₹1,69,800 / yr)') +
                    row('Total Monthly Deductions', '₹4,800 (PF, PT & Tax)') +
                    row('Net Monthly Take-Home', '₹45,200 / month');
            }

            // Tab 10: Reporting To Flow
            var elRpt = document.getElementById('neReviewReportingTo');
            if (elRpt) {
                var rpt1 = document.querySelector('.ne-rptto-select[data-level="1"]');
                var rpt1Val = (rpt1 && rpt1.value && rpt1.value !== 'Non selected') ? rpt1.value : 'Victoria Celestie';
                elRpt.innerHTML =
                    row('1st Level Approval', rpt1Val + ' (Technical Team Lead)') +
                    row('2nd Level Approval', 'Madison Andrew (Engineering Manager)') +
                    row('3rd Level Approval / HoD', 'Ryan Christopher (VP of Engineering)') +
                    row('Escalation Window', '24 Hours response SLA');
            }

            // Tab 11: Leave Approval Hierarchy
            var elLeaveApp = document.getElementById('neReviewLeaveApproval');
            if (elLeaveApp) {
                var lApp1 = document.querySelector('.ne-approval-select[data-level="1"]');
                var lFollow = document.getElementById('neApprovalFollower');
                var lApp1Val = (lApp1 && lApp1.value && lApp1.value !== 'Non selected') ? lApp1.value : 'Victoria Celestie';
                var lFollowVal = (lFollow && lFollow.value && lFollow.value !== 'None') ? lFollow.value : 'Emily Lauren';
                elLeaveApp.innerHTML =
                    row('1st Level Leave Approval', lApp1Val + ' (Team Lead)') +
                    row('2nd Level Leave Approval', 'Madison Andrew (Department Manager)') +
                    row('Follower (CC / Notification)', lFollowVal + ' (HR Operations)') +
                    row('Auto-Approval Escalation', 'Auto-escalates after 48 hours without action');
            }

            // Tab 12: OT Approval Hierarchy
            var elOtApp = document.getElementById('neReviewOtApproval');
            if (elOtApp) {
                var ot1 = document.querySelector('.ne-otapp-select[data-level="1"]');
                var ot1Val = (ot1 && ot1.value && ot1.value !== 'Non selected') ? ot1.value : 'Ryan Christopher';
                elOtApp.innerHTML =
                    row('1st Level OT Approval', ot1Val + ' (Project Manager)') +
                    row('2nd Level OT Approval', 'Victoria Celestie (Operations Lead)') +
                    row('Minimum OT Threshold', '1 Hour (Rounded to 30 mins interval)') +
                    row('OT Compensation Rate', '1.5x Standard Hourly Rate');
            }

            // Tab 13: Leave Auto-Update Rules
            var elLeaveRules = document.getElementById('neReviewLeaveRules');
            if (elLeaveRules) {
                elLeaveRules.innerHTML =
                    row('Casual Leave (CL)', 'Trainee: [✓] | Probation: [✓] | Confirmation: [✓] — 12 Days / Year') +
                    row('Sick Leave (SL)', 'Trainee: [✓] | Probation: [✓] | Confirmation: [✓] — 10 Days / Year') +
                    row('Earned Leave (EL)', 'Trainee: [—] | Probation: [✓] | Confirmation: [✓] — 15 Days / Year') +
                    row('Maternity Leave (ML)', 'Trainee: [—] | Probation: [✓] | Confirmation: [✓] — 90 Days') +
                    row('Paternity Leave (PL)', 'Trainee: [—] | Probation: [✓] | Confirmation: [✓] — 15 Days');
            }
        }
        buildReview();


        // ----- KYC Document upload handling -----

        var kycProgress = document.getElementById('neKycProgress');
        var kycProgressBar = document.getElementById('neKycProgressBar');
        var kycBody = document.getElementById('neKycBody');
        var addCustomKycBtn = document.getElementById('neAddCustomKyc');

        var mandatoryDocs =
            document.querySelectorAll(
                '.ne-kyc-row[data-mandatory="yes"]'
            ).length;


        // ----- Update KYC Progress -----

        function updateKycProgress() {

            var uploaded =
                document.querySelectorAll(
                    '.ne-kyc-row[data-mandatory="yes"] .ne-kyc-file-status.uploaded'
                ).length;

            kycProgress.textContent =
                uploaded + ' / ' + mandatoryDocs + ' uploaded';

            var percentage =
                mandatoryDocs > 0 ?
                (uploaded / mandatoryDocs * 100) :
                0;

            kycProgressBar.style.width = percentage + '%';
        }


        // ----- Existing + Custom File Upload -----

        kycBody.addEventListener('change', function(e) {

            if (!e.target.classList.contains('ne-kyc-file')) {
                return;
            }

            var input = e.target;
            var row = input.closest('.ne-kyc-row');

            if (!row) {
                return;
            }

            var fileName =
                row.querySelector('.ne-kyc-file-name');

            var fileStatus =
                row.querySelector('.ne-kyc-file-status');

            var removeBtn =
                row.querySelector('.ne-kyc-remove');


            if (input.files && input.files[0]) {

                var file = input.files[0];

                fileName.textContent = file.name;

                fileStatus.textContent = file.name;

                fileStatus.classList.add('uploaded');

                if (removeBtn) {
                    removeBtn.style.display = 'inline-block';
                }

                updateKycProgress();
            }

        });


        // ----- Existing File Remove -----

        kycBody.addEventListener('click', function(e) {

            var removeBtn =
                e.target.closest('.ne-kyc-remove');

            if (!removeBtn) {
                return;
            }

            var row =
                removeBtn.closest('.ne-kyc-row');

            if (!row) {
                return;
            }


            // Custom row
            if (row.classList.contains('ne-custom-kyc-row')) {

                row.remove();

                return;
            }


            // Normal KYC row
            var input =
                row.querySelector('.ne-kyc-file');

            var fileName =
                row.querySelector('.ne-kyc-file-name');

            var fileStatus =
                row.querySelector('.ne-kyc-file-status');


            if (input) {
                input.value = '';
            }

            if (fileName) {
                fileName.textContent = 'No file chosen';
            }

            if (fileStatus) {
                fileStatus.textContent = 'No file';
                fileStatus.classList.remove('uploaded');
            }

            removeBtn.style.display = 'none';

            updateKycProgress();

        });


        // ----- Add Custom KYC Document -----

        addCustomKycBtn.addEventListener('click', function() {

            var row = document.createElement('tr');

            row.className = 'ne-kyc-row ne-custom-kyc-row';

            row.setAttribute('data-doc', 'custom');
            row.setAttribute('data-mandatory', 'no');


            row.innerHTML = `

        <!-- Document Name -->
        <td>

            <input type="text"
                class="form-control ne-custom-doc-name"
                name="custom_kyc_document[]"
                placeholder="Enter document name">
        </td>


        <!-- Upload Field -->
        <td>

            <label class="ne-kyc-upload-btn">

                <i class="bi bi-cloud-arrow-up"></i>
                Choose File

                <input type="file"
                    class="ne-kyc-file"
                    name="custom_kyc_file[]"
                    accept=".pdf,.jpg,.jpeg,.png"
                    hidden>

            </label>

            <span class="ne-kyc-file-name">
                No file chosen
            </span>

        </td>


        <!-- Mandatory -->
        <td style="text-align:center;">

            <span class="ne-kyc-badge no">
                No
            </span>

        </td>


        <!-- File View -->
        <td>

            <span class="ne-kyc-file-status">
                No file
            </span>

        </td>


        <!-- Actions -->
        <td style="text-align:center;">

            <button type="button"
                class="ne-kyc-remove"
                title="Delete">

                <i class="bi bi-trash"></i>

            </button>

        </td>

    `;


            kycBody.appendChild(row);

        });


        // ----- Password match indicator -----
        var neConfirmPw = document.getElementById('neConfirmPassword');
        var nePwMatch = document.getElementById('nePasswordMatch');
        if (neConfirmPw && nePwMatch) {
            neConfirmPw.addEventListener('input', function() {
                var pw = document.getElementById('nePassword').value;
                var cpw = neConfirmPw.value;
                if (!cpw) {
                    nePwMatch.textContent = '';
                    neConfirmPw.style.borderColor = '';
                } else if (pw === cpw) {
                    nePwMatch.textContent = 'Passwords match';
                    nePwMatch.style.color = '#0ca308';
                    neConfirmPw.style.borderColor = '#0ca308';
                } else {
                    nePwMatch.textContent = 'Passwords do not match';
                    nePwMatch.style.color = '#e5484d';
                    neConfirmPw.style.borderColor = '#e5484d';
                }
            });
        }

        // ----- Final submit -----
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            var pw = document.getElementById('nePassword').value;
            var cpw = document.getElementById('neConfirmPassword').value;

            if (!pw || pw.length < 8) {
                alert('Password must be at least 8 characters long.');
                document.getElementById('nePassword').focus();
                return;
            }

            if (pw !== cpw) {
                alert('Passwords do not match. Please re-enter.');
                document.getElementById('neConfirmPassword').focus();
                return;
            }

            if (!document.getElementById('neConfirmAccuracy').checked) {
                alert('Please confirm the details are accurate before submitting.');
                return;
            }

            // TODO: replace with real AJAX call to your backend
            // e.g. fetch('save-new-employee.php', { method: 'POST', body: new FormData(form) })

            alert('Employee created successfully!');
            window.location.href = 'employees-report.php';
        });

        goToStep(1);
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const educationContainer =
            document.getElementById("neEducationContainer");

        const addEducationBtn =
            document.getElementById("neAddEducation");

        let educationIndex = 1;

        // Add Education
        addEducationBtn.addEventListener("click", function() {

            const firstEducation =
                educationContainer.querySelector(".ne-education-item");

            const newEducation =
                firstEducation.cloneNode(true);

            // Clear input values
            newEducation.querySelectorAll("input").forEach(function(input) {

                input.value = "";

                // Update name index
                if (input.name) {
                    input.name = input.name.replace(
                        /education\[\d+\]/,
                        "education[" + educationIndex + "]"
                    );
                }
            });

            // Show delete button for duplicated education
            const deleteWrapper =
                newEducation.querySelector(".education-delete-wrapper");

            deleteWrapper.classList.remove("d-none");

            // Reset the cloned date-picker(s) and re-initialise them so the
            // duplicated row gets a fresh, working calendar
            newEducation.querySelectorAll(".date-picker").forEach(function (dp) {
                dp.querySelectorAll(".calendar-dropdown, .calendar-icon").forEach(function (el) {
                    el.remove();
                });
                delete dp.dataset.dpReady;
            });
            if (typeof window.initDatePickers === "function") {
                window.initDatePickers(newEducation);
            }

            educationContainer.appendChild(newEducation);

            educationIndex++;
        });


        // Delete Education
        educationContainer.addEventListener("click", function(e) {

            if (e.target.classList.contains("neDeleteEducation")) {

                const educationItem =
                    e.target.closest(".ne-education-item");

                educationItem.remove();
            }

        });

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const experienceContainer =
            document.getElementById("neExperienceContainer");

        const addExperienceBtn =
            document.getElementById("neAddExperience");

        let experienceIndex = 1;


        // Add Experience
        addExperienceBtn.addEventListener("click", function() {

            const firstExperience =
                experienceContainer.querySelector(".ne-experience-item");

            const newExperience =
                firstExperience.cloneNode(true);


            // Clear all input values
            newExperience.querySelectorAll("input").forEach(function(input) {

                input.value = "";

                // Update name index
                if (input.name) {
                    input.name = input.name.replace(
                        /experience\[\d+\]/,
                        "experience[" + experienceIndex + "]"
                    );
                }

            });


            // Show delete button
            const deleteWrapper =
                newExperience.querySelector(
                    ".experience-delete-wrapper"
                );

            deleteWrapper.classList.remove("d-none");


            // Reset the cloned date-picker(s) and re-initialise them so the
            // duplicated row gets a fresh, working calendar
            newExperience.querySelectorAll(".date-picker").forEach(function (dp) {
                dp.querySelectorAll(".calendar-dropdown, .calendar-icon").forEach(function (el) {
                    el.remove();
                });
                delete dp.dataset.dpReady;
            });
            if (typeof window.initDatePickers === "function") {
                window.initDatePickers(newExperience);
            }


            // Append new experience
            experienceContainer.appendChild(newExperience);


            experienceIndex++;

        });


        // Delete Experience
        experienceContainer.addEventListener("click", function(e) {

            if (e.target.classList.contains("neDeleteExperience")) {

                const experienceItem =
                    e.target.closest(".ne-experience-item");

                experienceItem.remove();

            }

        });

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const bankContainer =
            document.getElementById("neBankAccountContainer");

        const addBankBtn =
            document.getElementById("neAddBankAccount");

        let bankIndex = 1;


        // Add Bank Account
        addBankBtn.addEventListener("click", function() {

            const firstBankAccount =
                bankContainer.querySelector(".ne-bank-account-item");

            const newBankAccount =
                firstBankAccount.cloneNode(true);


            // Clear input values
            newBankAccount.querySelectorAll("input").forEach(function(input) {

                input.value = "";

                // Update name index
                if (input.name) {

                    input.name = input.name.replace(
                        /bank_accounts\[\d+\]/,
                        "bank_accounts[" + bankIndex + "]"
                    );

                }

            });


            // Reset select
            newBankAccount.querySelectorAll("select").forEach(function(select) {

                select.selectedIndex = 0;

                if (select.name) {

                    select.name = select.name.replace(
                        /bank_accounts\[\d+\]/,
                        "bank_accounts[" + bankIndex + "]"
                    );

                }

            });


            // Append new bank account
            bankContainer.appendChild(newBankAccount);

            bankIndex++;

        });


        // Remove Bank Account
        bankContainer.addEventListener("click", function(e) {

            const removeBtn =
                e.target.closest(".neRemoveBankAccount");

            if (!removeBtn) {
                return;
            }

            const bankAccount =
                removeBtn.closest(".ne-bank-account-item");

            bankAccount.remove();

        });

    });
</script>


<script>
    // ----- Leave Rules: cascading auto-check (Trainee -> Probation -> Confirmation) -----
    document.querySelectorAll('#neLeaveRulesTable .ne-leave-rule-row').forEach(function(rowEl) {
        var switches = rowEl.querySelectorAll('.ne-lr-check');

        function refreshLrState() {
            /* complete glow only when all three stages are on */
            var allOn = Array.prototype.every.call(switches, function(s) { return s.checked; });
            rowEl.classList.toggle('perm-row-complete', allOn);
        }

        /* every switch works independently — no auto-cascade */
        switches.forEach(function(sw) {
            sw.addEventListener('change', function() {
                if (sw.checked) {
                    sw.classList.remove('ne-lr-just-toggled');
                    void sw.offsetWidth;
                    sw.classList.add('ne-lr-just-toggled');
                }
                refreshLrState();
            });
        });
    });

    /* ----- Leave Rules: add row from leave-type select2 + hover delete ----- */
    (function() {
        var leaveTypesData = [
            { id: 1, name: 'Casual Leave', total_days: 12, status: 'Enable' },
            { id: 2, name: 'Sick Leave', total_days: 10, status: 'Enable' },
            { id: 3, name: 'Earned Leave', total_days: 15, status: 'Enable' },
            { id: 4, name: 'Maternity Leave', total_days: 90, status: 'Disable' },
            { id: 5, name: 'Paternity Leave', total_days: 15, status: 'Enable' }
        ];

        var tbody = document.querySelector('#neLeaveRulesTable tbody');
        var typeSelect = document.getElementById('neLeaveTypeSelect');
        if (!tbody || !typeSelect) return;

        function bindRow(rowEl) {
            var switches = rowEl.querySelectorAll('.ne-lr-check');

            function refresh() {
                var allOn = Array.prototype.every.call(switches, function(s) { return s.checked; });
                rowEl.classList.toggle('perm-row-complete', allOn);
            }

            switches.forEach(function(sw) {
                sw.addEventListener('change', function() {
                    if (sw.checked) {
                        sw.classList.remove('ne-lr-just-toggled');
                        void sw.offsetWidth;
                        sw.classList.add('ne-lr-just-toggled');
                    }
                    refresh();
                });
            });

            var del = rowEl.querySelector('.ne-lr-delete');
            if (del) {
                del.addEventListener('click', function() {
                    rowEl.classList.add('removing');
                    var typeName = rowEl.getAttribute('data-type');

                    /* hide + dispose the tooltip before the row goes, or it
                       stays stuck on screen after the row is removed */
                    var tip = bootstrap.Tooltip.getInstance(del);
                    if (tip) tip.dispose();
                    document.querySelectorAll('.tooltip').forEach(function(t) { t.remove(); });

                    setTimeout(function() {
                        rowEl.remove();
                        restoreToDropdown(typeName);
                    }, 300);
                });
            }
        }

        document.querySelectorAll('#neLeaveRulesTable .ne-leave-rule-row').forEach(bindRow);

        /* option click -> append a new rule row (duplicate types are ignored) */
        jQuery(typeSelect)
            .on('select2:select', function(e) {
                var name = e.params.data.id;
                if (!name) return;

                var duplicate = tbody.querySelector('.ne-leave-rule-row[data-type="' + $.escapeSelector(name) + '"]');
                if (duplicate) {
                    duplicate.classList.remove('added');
                    void duplicate.offsetWidth;
                    duplicate.classList.add('added');
                    return;
                }

                var row = document.createElement('tr');
                row.className = 'ne-leave-rule-row added';
                row.setAttribute('data-type', name);
                row.innerHTML =
                    '<td style="font-weight:700;color:var(--aw-ink-900);">' + $('<div>').text(name).html() +
                    '    <button type="button" class="ne-lr-delete" title="Remove" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove"><i class="mdi mdi-delete"></i></button>' +
                    '</td>' +
                    '<td style="text-align:center;"><input type="checkbox" class="ne-lr-check" data-stage="trainee"></td>' +
                    '<td style="text-align:center;"><input type="checkbox" class="ne-lr-check" data-stage="probation"></td>' +
                    '<td style="text-align:center;"><input type="checkbox" class="ne-lr-check" data-stage="confirmation"></td>' +
                    '<td style="text-align:center;"><input type="number" min="0" class="form-control ne-lr-days" placeholder="Days" style="width:100px;display:inline-block;text-align:center;border-color:var(--primary);color:var(--primary);font-weight:600;"></td>';

                tbody.appendChild(row);
                bindRow(row);

                /* re-init tooltips inside the new row */
                if (window.bootstrap) {
                    row.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                        new bootstrap.Tooltip(el, { trigger: 'hover' });
                    });
                }
            })
            .on('select2:clear', function() {
                /* keep placeholder clean */
            });

        /* select panna option-a dropdown-la irundhu remove pannu (used types shouldn't reappear) */
        function removeFromDropdown(name) {
            jQuery(typeSelect).find('option[value="' + $.escapeSelector(name) + '"]').remove();
            jQuery(typeSelect).trigger('change.select2');
        }

        /* row delete panna andha type thirumba dropdown-la add aagum */
        function restoreToDropdown(name) {
            var $sel = jQuery(typeSelect);
            if ($sel.find('option[value="' + $.escapeSelector(name) + '"]').length) return;
            var $opt = $('<option>').attr('value', name).text(name);
            $sel.append($opt);
            $sel.trigger('change.select2');
        }

        /* select panna udane: row add + dropdown-la irundhu remove + select reset */
        jQuery(typeSelect).on('select2:select', function(e) {
            var name = e.params.data.id;
            if (!name) return;
            removeFromDropdown(name);
            var $sel = jQuery(this);
            setTimeout(function() { $sel.val(null).trigger('change.select2'); }, 10);
        });
    })();
</script>

<script>
    // ----- Leave Approval: dynamic level add/remove -----
    var approvalOrdinals = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'];
    var extraLevelsWrap = document.getElementById('neApprovalExtraLevels');
    var addLevelBtn = document.getElementById('neAddApprovalLevel');

    function ordinalFor(n) {
        return approvalOrdinals[n - 1] || (n + 'th');
    }

    function renumberApprovalLevels() {
        var rows = extraLevelsWrap.querySelectorAll('.ne-approval-row');
        rows.forEach(function(r, idx) {
            var level = idx + 2; // base row is level 1
            var label = r.querySelector('label');
            var select = r.querySelector('select');
            label.textContent = ordinalFor(level) + ' Level Approval';
            select.setAttribute('data-level', level);
        });
    }

    function addApprovalLevel() {
        var level = extraLevelsWrap.querySelectorAll('.ne-approval-row').length + 2;

        var row = document.createElement('div');
        row.className = 'ne-approval-row col-lg-6';
        row.innerHTML =
            '<div class="ne-approval-col">' +
            '<label>' + ordinalFor(level) + ' Level Approval</label>' +
            '<select class="form-select select2 ne-approval-select" data-level="' + level + '">' +
            '<option value="">Non selected</option>' +
            '<option>Victoria Celestie</option>' +
            '<option>Madison Andrew</option>' +
            '<option>Ryan Christopher</option>' +
            '<option>Emily Lauren</option>' +
            '</select>' +
            '</div>' +
            '<button type="button" class="ne-approval-btn-remove" title="Remove level">-</button>';

        extraLevelsWrap.appendChild(row);

        var select = row.querySelector('select');
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $(select).select2({
                width: '100%'
            });
        }

        row.querySelector('.ne-approval-btn-remove').addEventListener('click', function() {
            row.remove();
            renumberApprovalLevels();
        });
    }

    addLevelBtn.addEventListener('click', addApprovalLevel);

    document.getElementById('neApprovalSubmit').addEventListener('click', function() {
        var levels = [];
        document.querySelectorAll('#neApprovalBaseRow .ne-approval-select, #neApprovalExtraLevels .ne-approval-select').forEach(function(sel) {
            levels.push({
                level: sel.getAttribute('data-level'),
                value: sel.value
            });
        });
        var follower = document.getElementById('neApprovalFollower').value;
        console.log('Leave Approval submitted:', {
            levels: levels,
            follower: follower
        });
        alert('Leave approval flow saved!');
    });
</script>

<script>
    // ----- OT Approval: dynamic level add/remove -----
    var otOrdinals = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'];
    var otExtraLevelsWrap = document.getElementById('neOtExtraLevels');
    var addOtLevelBtn = document.getElementById('neAddOtLevel');

    function otOrdinalFor(n) {
        return otOrdinals[n - 1] || (n + 'th');
    }

    function renumberOtLevels() {
        var rows = otExtraLevelsWrap.querySelectorAll('.ne-otapp-row');
        rows.forEach(function(r, idx) {
            var level = idx + 2; // base row is level 1
            var label = r.querySelector('label');
            var select = r.querySelector('select');
            label.textContent = otOrdinalFor(level) + ' Level Approval';
            select.setAttribute('data-level', level);
        });
    }

    function addOtApprovalLevel() {
        var level = otExtraLevelsWrap.querySelectorAll('.ne-otapp-row').length + 2;

        var row = document.createElement('div');
        row.className = 'ne-otapp-row';
        row.innerHTML =
            '<div class="ne-otapp-col">' +
            '<label>' + otOrdinalFor(level) + ' Level Approval</label>' +
            '<select class="form-select select2 ne-otapp-select" data-level="' + level + '">' +
            '<option value="">Non selected</option>' +
            '<option>Victoria Celestie</option>' +
            '<option>Madison Andrew</option>' +
            '<option>Ryan Christopher</option>' +
            '<option>Emily Lauren</option>' +
            '</select>' +
            '</div>' +
            '<button type="button" class="ne-otapp-btn-remove bg-danger" title="Remove level">-</button>';

        otExtraLevelsWrap.appendChild(row);

        var select = row.querySelector('select');
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $(select).select2({
                width: '100%'
            });
        }

        row.querySelector('.ne-otapp-btn-remove').addEventListener('click', function() {
            row.remove();
            renumberOtLevels();
        });
    }

    addOtLevelBtn.addEventListener('click', addOtApprovalLevel);

    document.getElementById('neOtApprovalSubmit').addEventListener('click', function() {
        var levels = [];
        document.querySelectorAll('#neOtBaseRow .ne-otapp-select, #neOtExtraLevels .ne-otapp-select').forEach(function(sel) {
            levels.push({
                level: sel.getAttribute('data-level'),
                value: sel.value
            });
        });
        console.log('OT Approval submitted:', levels);
        alert('OT approval flow saved!');
    });
</script>
<script>
    // ----- Reporting To: dynamic level add/remove -----
    var rptOrdinals = ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'];
    var rptExtraLevelsWrap = document.getElementById('neRptExtraLevels');
    var addRptLevelBtn = document.getElementById('neAddRptLevel');

    function rptOrdinalFor(n) {
        return rptOrdinals[n - 1] || (n + 'th');
    }

    function renumberRptLevels() {
        if (!rptExtraLevelsWrap) return;
        var rows = rptExtraLevelsWrap.querySelectorAll('.ne-otapp-row');
        rows.forEach(function(r, idx) {
            var level = idx + 2; // base row is level 1
            var label = r.querySelector('label');
            var select = r.querySelector('select');
            if (label) label.textContent = rptOrdinalFor(level) + ' Level Approval';
            if (select) select.setAttribute('data-level', level);
        });
    }

    function addRptApprovalLevel() {
        if (!rptExtraLevelsWrap) return;
        var level = rptExtraLevelsWrap.querySelectorAll('.ne-otapp-row').length + 2;

        var row = document.createElement('div');
        row.className = 'ne-otapp-row mt-2';
        row.innerHTML =
            '<div class="ne-otapp-col">' +
            '<label>' + rptOrdinalFor(level) + ' Level Approval</label>' +
            '<select class="form-select select2 ne-rptto-select" data-level="' + level + '">' +
            '<option value="">Non selected</option>' +
            '<option>Victoria Celestie</option>' +
            '<option>Madison Andrew</option>' +
            '<option>Ryan Christopher</option>' +
            '<option>Emily Lauren</option>' +
            '</select>' +
            '</div>' +
            '<button type="button" class="ne-otapp-btn-remove bg-danger" title="Remove level">-</button>';

        rptExtraLevelsWrap.appendChild(row);

        var select = row.querySelector('select');
        if (typeof $ !== 'undefined' && $.fn.select2) {
            $(select).select2({
                width: '100%'
            });
        }

        row.querySelector('.ne-otapp-btn-remove').addEventListener('click', function() {
            row.remove();
            renumberRptLevels();
        });
    }

    if (addRptLevelBtn) {
        addRptLevelBtn.addEventListener('click', addRptApprovalLevel);
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var bulkUploadBtn = document.getElementById('bulkUploadBtn');
        var offcanvasEl = document.getElementById('employeeUploadOffcanvas');

        if (bulkUploadBtn && offcanvasEl) {
            bulkUploadBtn.addEventListener('click', function() {
                bootstrap.Offcanvas.getOrCreateInstance(offcanvasEl).show();
            });
        }

        // ... existing bulk upload logic (dropzone, fileName, confirmUpload) idhu appuram continue pannunga
        document.addEventListener('DOMContentLoaded', function() {
            var bulkUploadInput = document.getElementById('bulkUploadInput');
            var dropzone = document.getElementById('employeeBulkDropzone');
            var filePreview = document.getElementById('employeeUploadFile');
            var fileName = document.getElementById('employeeUploadFileName');
            var uploadCount = document.getElementById('employeeUploadCount');
            var confirmUpload = document.getElementById('confirmBulkUpload');

            if (dropzone && bulkUploadInput) {
                dropzone.addEventListener('click', function() {
                    bulkUploadInput.click();
                });

                bulkUploadInput.addEventListener('change', function() {
                    var file = bulkUploadInput.files[0];
                    if (!file) return;
                    var ext = file.name.split('.').pop().toLowerCase();
                    if (['xlsx', 'xls', 'csv'].indexOf(ext) === -1) {
                        alert('Please upload a valid Excel or CSV file.');
                        bulkUploadInput.value = '';
                        return;
                    }
                    fileName.textContent = file.name;
                    filePreview.classList.add('show');
                    uploadCount.classList.add('show');
                    confirmUpload.disabled = false;
                });

                confirmUpload.addEventListener('click', function() {
                    if (!bulkUploadInput.files[0]) return;
                    alert('24 employees are ready to import from ' + bulkUploadInput.files[0].name + '.');
                    bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('employeeUploadOffcanvas')).hide();
                });
            }
        });


    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const customContainer =
            document.getElementById("neCustomDocumentsContainer");

        const addCustomDocumentBtn =
            document.getElementById("neAddCustomDocument");

        let customDocumentIndex = 0;


        // --------------------------------------------------
        // Add Custom Document
        // --------------------------------------------------

        addCustomDocumentBtn.addEventListener("click", function() {

            const index = customDocumentIndex++;

            const col = document.createElement("div");

            col.className = "col-lg-3 col-md-6 ne-custom-document";

            col.innerHTML = `

            <div class="position-relative">

                <!-- Document Name -->
                <label class="form-label">
                    Document Name
                </label>

                <input type="text"
                    class="form-control mb-2 ne-custom-document-name"
                    name="custom_documents[${index}][name]"
                    placeholder="Enter document name">


                <!-- Upload Box -->
                <label class="aw-upload-box"
                    style="min-height:100px;"
                    for="customDocument_${index}">

                    <i class="bi bi-file-earmark-arrow-up"></i>

                    <div class="aw-upload-title">
                        Upload File
                    </div>

                    <div class="aw-upload-hint">
                        PDF, JPG, PNG (Max 5MB)
                    </div>

                    <input type="file"
                        id="customDocument_${index}"
                        class="ne-custom-document-file"
                        name="custom_documents[${index}][file]"
                        accept=".pdf,.jpg,.jpeg,.png"
                        hidden>

                </label>


                <!-- Selected File -->
                <div class="ne-custom-file-name"
                    style="
                        font-size:12px;
                        color:#666;
                        margin-top:5px;
                        word-break:break-word;
                    ">
                    No file chosen
                </div>


                <!-- Delete -->
                <button type="button"
                    class="btn btn-danger neDeleteCustomDocument"
                    style="
                        font-size:12px;
                        font-weight:600;
                        border-radius:6px;
                        margin-top:8px;
                    ">

                    <i class="bi bi-trash"></i>
                    Delete

                </button>

            </div>
        `;


            customContainer.appendChild(col);

        });


        // --------------------------------------------------
        // Custom Document File Change
        // --------------------------------------------------

        customContainer.addEventListener("change", function(e) {

            if (!e.target.classList.contains(
                    "ne-custom-document-file"
                )) {
                return;
            }


            const input = e.target;

            const documentBox =
                input.closest(".ne-custom-document");

            const fileName =
                documentBox.querySelector(
                    ".ne-custom-file-name"
                );


            if (input.files && input.files[0]) {

                fileName.textContent =
                    input.files[0].name;

            } else {

                fileName.textContent =
                    "No file chosen";

            }

        });


        // --------------------------------------------------
        // Delete Custom Document
        // --------------------------------------------------

        customContainer.addEventListener("click", function(e) {

            const deleteBtn =
                e.target.closest(
                    ".neDeleteCustomDocument"
                );

            if (!deleteBtn) {
                return;
            }


            const documentBox =
                deleteBtn.closest(
                    ".ne-custom-document"
                );


            if (documentBox) {
                documentBox.remove();
            }

        });

    });

    // --------------------------------------------------
    // Verification & Approval Status widget
    // Drive the stepper purely from data-status="pending|verified|approved|rejected"
    // (set this attribute from PHP once the real status is known e.g.
    //  data-status="<?php echo $employee_status ?? 'pending'; ?>")
    // --------------------------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        var vaCard = document.getElementById('neVerificationStatus');
        if (!vaCard) return;

        var order = ['pending', 'verified', 'approved'];
        var status = (vaCard.getAttribute('data-status') || 'pending').toLowerCase();

        var badge = document.getElementById('neVaBadge');
        var badgeText = document.getElementById('neVaBadgeText');
        var track = document.getElementById('neVaTrack');
        var steps = vaCard.querySelectorAll('.ne-va-step');

        var labels = {
            pending: 'Pending',
            verified: 'Verified',
            approved: 'Approved',
            rejected: 'Rejected'
        };

        badge.className = 'ne-va-badge status-' + status;
        badgeText.textContent = labels[status] || 'Pending';

        if (status === 'rejected') {
            track.classList.add('is-rejected');
            track.style.setProperty('--ne-va-progress', '100%');

            steps.forEach(function(step) {
                var key = step.getAttribute('data-step');
                step.classList.remove('is-done', 'is-current', 'is-rejected');
                if (key === 'pending') step.classList.add('is-done');
                if (key === 'rejected') step.classList.add('is-rejected');
            });
        } else {
            var idx = order.indexOf(status);
            if (idx === -1) idx = 0;
            var progress = (idx / (order.length - 1)) * 100;
            track.style.setProperty('--ne-va-progress', progress + '%');

            steps.forEach(function(step) {
                var key = step.getAttribute('data-step');
                step.classList.remove('is-done', 'is-current', 'is-rejected');
                var keyIdx = order.indexOf(key);
                if (keyIdx === -1) return; // rejected step stays neutral here
                if (keyIdx < idx) step.classList.add('is-done');
                else if (keyIdx === idx) step.classList.add('is-current');
            });
        }
    });
</script>

<script>
// ===== Permissions: render Module/Capabilities rows from permission-modules master =====
// Master data is managed in permission-modules.php (stored in localStorage).
(function() {
    var LS_KEY = 'gh_permission_modules';

    var DEFAULT_MODULES = [
        { id: 1,  key: 'hr_dashboard',    group: 'HR Management',    name: 'HR Dashboard',              caps: ['view_own'] },
        { id: 2,  key: 'hr_org',          group: 'HR Management',    name: 'Organization',              caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 3,  key: 'hr_records',      group: 'HR Management',    name: 'Employees (Records)',       caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 4,  key: 'hr_shift',        group: 'HR Management',    name: 'Shift Management',          caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 5,  key: 'hr_loan',         group: 'HR Management',    name: 'Loan & Advances',           caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 6,  key: 'hr_payroll',      group: 'HR Management',    name: 'Payroll Management',        caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 7,  key: 'ts_checkin',      group: 'Timesheet & Leave', name: 'Timesheet Check In Out',   caps: ['view_own'] },
        { id: 8,  key: 'ts_att',          group: 'Timesheet & Leave', name: 'Timesheet - Attendance',   caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 9,  key: 'ts_punch',        group: 'Timesheet & Leave', name: 'Timesheet - Punch In Reports', caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 10, key: 'ts_ot',           group: 'Timesheet & Leave', name: 'Timesheet - Overtime',     caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 11, key: 'ts_leave',        group: 'Timesheet & Leave', name: 'Timesheet - Leave',        caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 12, key: 'ts_leave_report', group: 'Timesheet & Leave', name: 'Leave Report',             caps: ['view_own', 'view_global'] },
        { id: 13, key: 'ts_permreq',      group: 'Timesheet & Leave', name: 'Permission Requests',      caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 14, key: 'recruit',         group: 'HR Record',        name: 'Recruitment',               caps: ['view_global', 'create', 'edit', 'delete'] },
        { id: 15, key: 'hr_onboard',      group: 'HR Record',        name: 'Onboarding',                caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] },
        { id: 16, key: 'hr_perf',         group: 'HR Record',        name: 'Performance',               caps: ['view_own', 'view_global', 'create', 'edit', 'delete'] }
    ];

    // value prefix per module (slug used in checkbox values / role presets)
    function slug(name) {
        return String(name).toLowerCase()
            .replace(/&/g, 'and')
            .replace(/[^a-z0-9]+/g, '_')
            .replace(/^_+|_+$/g, '');
    }

    var CAP_LABELS = { view_own: 'View(Own)', view_global: 'View(Global)', create: 'Create', edit: 'Edit', delete: 'Delete' };

    function loadData() {
        try {
            var raw = localStorage.getItem(LS_KEY);
            if (raw) {
                var arr = JSON.parse(raw);
                if (Array.isArray(arr) && arr.length) return arr;
            }
        } catch (e) { /* ignore */ }
        return DEFAULT_MODULES.slice();
    }

    function esc(s) {
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    var GROUP_ICONS = {
        'HR Management': 'bi-people-fill',
        'Timesheet & Leave': 'bi-clock-history',
        'HR Record': 'bi-folder-symlink'
    };

    function render() {
        var wrap = document.getElementById('nePermRows');
        if (!wrap) return;

        var modules = loadData();

        // group modules preserving master order
        var groups = [];
        var byGroup = {};
        modules.forEach(function(m) {
            var g = m.group || 'Other';
            if (!byGroup[g]) { byGroup[g] = []; groups.push(g); }
            byGroup[g].push(m);
        });

        var html = '';
        groups.forEach(function(g) {
            var icon = GROUP_ICONS[g] || 'bi-grid-1x2';
            html += '<div class="ne-perm-group-label"><i class="bi ' + icon + '"></i> ' + esc(g) + '</div>';
            byGroup[g].forEach(function(m) {
                var key = m.key || slug(m.name);
                var caps = (m.caps && m.caps.length) ? m.caps : ['view_own'];
                html += '<div class="ne-perm-row">' +
                    '<div class="ne-perm-col-feature">' + esc(m.name) + '</div>' +
                    '<div class="ne-perm-col-caps">';
                caps.forEach(function(c) {
                    html += '<label class="ne-perm-check"><input type="checkbox" name="nePerm" value="' + key + '_' + c + '"> ' + (CAP_LABELS[c] || c) + '</label>';
                });
                html += '</div>' +
                    '<div style="text-align:center;"><span class="ne-perm-check-all" data-group="' + key + '">Select All</span></div>' +
                    '</div>';
            });
        });

        wrap.innerHTML = html;
    }

    // Render before the page's own permission scripts initialise
    render();
})();
</script>

<script>
    // ===== Family Details: Add More children name rows =====
    (function() {
        var addBtn = document.getElementById('neAddChild');
        var wrap = document.getElementById('neChildrenWrap');
        if (!addBtn || !wrap) return;

        function renumber() {
            wrap.querySelectorAll('.ne-child-row').forEach(function(row, i) {
                var lbl = row.querySelector('label');
                if (lbl) lbl.textContent = (i + 1) + '. Childrens Name';
            });
        }

        addBtn.addEventListener('click', function() {
            var count = wrap.querySelectorAll('.ne-child-row').length;
            if (count >= 10) return; // sane limit

            var row = document.createElement('div');
            row.className = 'ne-child-row col-lg-4 col-md-6';
            row.innerHTML =
                '<label class="form-label">' + (count + 1) + '. Childrens Name</label>' +
                '<div class="d-flex gap-2">' +
                    '<input type="text" class="form-control" name="children_name[]" placeholder="Enter children\'s name">' +
                    '<button type="button" class="btn btn-outline-secondary ne-child-remove" title="Remove" style="border-color:var(--aw-border);color:var(--aw-ink-500);flex-shrink:0;">' +
                        '<i class="bi bi-trash"></i>' +
                    '</button>' +
                '</div>';
            wrap.appendChild(row);
            renumber();

            row.querySelector('.ne-child-remove').addEventListener('click', function() {
                row.remove();
                renumber();
            });

            row.querySelector('input').focus();
        });
    })();
</script>

<script>
    // ===== Resignation / Relieving Request Tab =====
    (function() {
        var firstName = document.getElementById('neFirstName');
        var lastName = document.getElementById('neLastName');
        var relEmpSelect = document.getElementById('neRelEmpSelect');
        var relReason = document.getElementById('neRelReason');
        var relResignDate = document.getElementById('neRelResignDate');
        var relLastDay = document.getElementById('neRelLastDay');
        var relNoticePeriod = document.getElementById('neRelNoticePeriod');
        var relRemarks = document.getElementById('neRelRemarks');
        var relDoc = document.getElementById('neRelDoc');
        var relSend = document.getElementById('neRelSend');

        // Initialize Select2 disabled for employee name
        if (relEmpSelect) {
            $(relEmpSelect).select2({
                width: '100%',
                disabled: true,
                placeholder: '—',
                allowClear: false
            });
        }

        // Update employee name in Select2 from first/last name fields
        function updateRelEmpInfo() {
            if (!relEmpSelect) return;
            var fn = firstName ? firstName.value.trim() : '';
            var ln = lastName ? lastName.value.trim() : '';
            var fullName = (fn + ' ' + ln).trim();

            // Clear and add new option
            $(relEmpSelect).empty();
            if (fullName) {
                var opt = new Option(fullName, fullName, true, true);
                $(relEmpSelect).append(opt).trigger('change');
            } else {
                var emptyOpt = new Option('\u2014', '', true, true);
                $(relEmpSelect).append(emptyOpt).trigger('change');
            }
        }

        // Show toast
        function showToast(msg, type) {
            var toast = document.createElement('div');
            toast.className = 'ne-rel-toast ne-rel-toast-' + (type || 'info');
            toast.textContent = msg;
            document.body.appendChild(toast);
            setTimeout(function() { toast.classList.add('show'); }, 10);
            setTimeout(function() {
                toast.classList.remove('show');
                setTimeout(function() { toast.remove(); }, 350);
            }, 3000);
        }

        // Bind name fields
        if (firstName) firstName.addEventListener('input', updateRelEmpInfo);
        if (lastName) lastName.addEventListener('input', updateRelEmpInfo);

        // Submit Request
        if (relSend) {
            relSend.addEventListener('click', function() {
                var empName = $(relEmpSelect).val() || '';
                if (!empName) { showToast('Please enter employee name in Profile tab', 'info'); return; }
                if (!relReason.value.trim()) { showToast('Please enter reason for leaving', 'info'); relReason.focus(); return; }
                if (!relResignDate.value) { showToast('Please select resignation date', 'info'); relResignDate.focus(); return; }
                if (!relLastDay.value) { showToast('Please select proposed last working date', 'info'); relLastDay.focus(); return; }

                var summary = 'Resignation request submitted for ' + empName;
                summary += ' | Reason: ' + relReason.value.trim();
                summary += ' | Resignation Date: ' + relResignDate.value;
                summary += ' | Last Working Date: ' + relLastDay.value;
                if (relNoticePeriod.value) summary += ' | Notice Period: ' + relNoticePeriod.value;
                if (relRemarks.value.trim()) summary += ' | Remarks: ' + relRemarks.value.trim();
                if (relDoc.files && relDoc.files[0]) summary += ' | Document: ' + relDoc.files[0].name;

                showToast('Resignation request submitted successfully!', 'success');
                console.log('[Resignation Request]', summary);
            });
        }

        // Init
        updateRelEmpInfo();
    })();
</script>

<script>
// ===== Relieving Approval (from bell notification) =====
(function() {
    var params = new URLSearchParams(window.location.search);
    var relEmp = params.get('rel');
    if (!relEmp) return;

    // Sample data for employees
    var relData = {
        'EMP0002': {
            name: 'Daniel Martinez', dept: 'Design',
            reason: 'Better career opportunity', resignDate: '10 Sep 2026', lastDate: '30 Sep 2026',
            noticePeriod: '30 Days', remarks: 'Completing current project handover',
            steps: [
                { title: 'Team Lead Review', reviewer: 'Madison Andrew', time: '11 Sep 2026, 10:30 AM', status: 'approved' },
                { title: 'HR Approval', reviewer: 'Priya Sharma', time: '12 Sep 2026, 02:15 PM', status: 'approved' },
                { title: 'Manager Final Approval', reviewer: 'Suresh Reddy', time: 'Pending', status: 'pending' },
                { title: 'Relieving Completed', reviewer: '—', time: '—', status: '' }
            ]
        },
        'EMP0005': {
            name: 'Sophia Johnson', dept: 'Marketing',
            reason: 'Relocation to another city', resignDate: '01 Aug 2026', lastDate: '30 Sep 2026',
            noticePeriod: '60 Days', remarks: 'Family relocation due to spouse transfer',
            steps: [
                { title: 'Team Lead Review', reviewer: 'Victoria Celestie', time: '02 Aug 2026, 11:00 AM', status: 'approved' },
                { title: 'HR Approval', reviewer: 'Priya Sharma', time: '03 Aug 2026, 03:30 PM', status: 'approved' },
                { title: 'Manager Final Approval', reviewer: 'Rajesh Kumar', time: '05 Aug 2026, 10:00 AM', status: 'approved' },
                { title: 'Relieving Completed', reviewer: 'HR Team', time: '30 Sep 2026', status: 'approved' }
            ]
        },
        'EMP0003': {
            name: 'David Anderson', dept: 'iOS Dev',
            reason: 'Higher studies abroad', resignDate: '01 Sep 2026', lastDate: '15 Oct 2026',
            noticePeriod: '45 Days', remarks: 'Pursuing MBA at a foreign university',
            steps: [
                { title: 'Team Lead Review', reviewer: 'Ryan Christopher', time: '02 Sep 2026, 09:00 AM', status: 'approved' },
                { title: 'HR Approval', reviewer: 'Priya Sharma', time: '03 Sep 2026, 11:30 AM', status: 'rejected' },
                { title: 'Manager Final Approval', reviewer: '—', time: '—', status: '' },
                { title: 'Relieving Completed', reviewer: '—', time: '—', status: '' }
            ]
        }
    };

    var data = relData[relEmp];
    if (!data) return;

    // Navigate to Relieving tab
    if (window.goToStep) {
        window.goToStep(7);
    } else {
        var relTab = document.querySelector('.ne-tab[data-step="7"]');
        if (relTab) relTab.click();
    }

    // Fill approval panel
    document.getElementById('neRelViewName').textContent = data.name;
    document.getElementById('neRelViewDept').textContent = data.dept;

    // Build timeline
    var tlEl = document.getElementById('neRelTimeline');
    if (tlEl) {
        tlEl.innerHTML = '';
        data.steps.forEach(function(step) {
            var cls = step.status || '';
            var iconCls = cls === 'approved' ? 'bi-check-lg' : (cls === 'pending' ? 'bi-hourglass-split' : (cls === 'rejected' ? 'bi-x-lg' : 'bi-flag'));
            var badgeCls = cls;
            var badgeText = cls === 'approved' ? 'Approved' : (cls === 'pending' ? 'Pending' : (cls === 'rejected' ? 'Rejected' : 'Pending'));
            tlEl.innerHTML +=
                '<div class="ne-rel-tl-step ' + cls + '">' +
                '<div class="ne-rel-tl-body">' +
                '<div class="ne-rel-tl-title">' + step.title + '</div>' +
                '<div class="ne-rel-tl-desc">Reviewed by ' + step.reviewer + '</div>' +
                '<div class="ne-rel-tl-time">' + step.time + '</div>' +
                '</div>' +
                '<div class="ne-rel-tl-badge ' + badgeCls + '"><i class="bi bi-' + (cls === 'approved' ? 'check-circle-fill' : (cls === 'pending' ? 'clock-fill' : (cls === 'rejected' ? 'x-circle-fill' : 'flag'))) + '"></i> ' + badgeText + '</div>' +
                '</div>';
        });
    }

    // Show approval section, hide submit section
    var approvalSection = document.getElementById('neRelApprovalSection');
    var submitActions = document.getElementById('neRelSubmitActions');
    var hasPending = data.steps.some(function(s) { return s.status === 'pending'; });
    if (approvalSection) approvalSection.style.display = '';
    if (submitActions) submitActions.style.display = 'none';
    var approvalActions = document.getElementById('neRelApprovalActions');
    if (approvalActions) approvalActions.style.display = hasPending ? '' : 'none';

    // ===== Work Completion Modal =====
    var workModal = document.getElementById('neWorkModal');
    var workConfirm = document.getElementById('neWorkConfirm');
    var workCancel = document.getElementById('neWorkCancel');
    var workClose = document.getElementById('neWorkModalClose');
    var workCbs = document.querySelectorAll('#neWorkChecklist input[type=checkbox]');
    var workPct = document.getElementById('neWorkProgressPct');
    var workFill = document.getElementById('neWorkProgressFill');

    function updateWorkProgress() {
        var total = workCbs.length, done = 0;
        workCbs.forEach(function(cb) {
            var item = cb.closest('.ne-work-check-item');
            if (cb.checked) {
                done++;
                if (item) item.classList.add('checked');
                // Update step number to check icon
                var num = item ? item.querySelector('.ne-work-check-num') : null;
                if (num) num.innerHTML = '<i class="bi bi-check-lg"></i>';
            } else {
                if (item) item.classList.remove('checked');
                var num = item ? item.querySelector('.ne-work-check-num') : null;
                if (num) {
                    var idx = Array.from(workCbs).indexOf(cb);
                    num.textContent = idx + 1;
                }
            }
        });
        var pct = total > 0 ? Math.round((done / total) * 100) : 0;
        workPct.textContent = pct + '%';
        workFill.style.width = pct + '%';
        workConfirm.disabled = pct < 100;
        if (pct === 100) {
            workFill.classList.add('complete');
        } else {
            workFill.classList.remove('complete');
        }
    }
    workCbs.forEach(function(cb) { cb.addEventListener('change', updateWorkProgress); });

    function openWorkModal() {
        document.getElementById('neWorkEmpName').textContent = data.name;
        document.getElementById('neWorkEmpDept').textContent = data.dept + ' — ' + data.reason;
        workCbs.forEach(function(cb) { cb.checked = false; });
        updateWorkProgress();
        workModal.classList.add('show');
    }
    function closeWorkModal() { workModal.classList.remove('show'); }
    if (workCancel) workCancel.addEventListener('click', closeWorkModal);
    if (workClose) workClose.addEventListener('click', closeWorkModal);

    // Approve button opens work modal first
    var approveBtn = document.getElementById('neRelApproveBtn');
    if (approveBtn) {
        approveBtn.addEventListener('click', openWorkModal);
    }

    // Confirm in work modal -> approve
    if (workConfirm) {
        workConfirm.addEventListener('click', function() {
            closeWorkModal();
            // Mark pending step as approved
            var pendingStep = document.querySelector('.ne-rel-tl-step.pending');
            if (pendingStep) {
                pendingStep.classList.remove('pending');
                pendingStep.classList.add('completed');
                var badge = pendingStep.querySelector('.ne-rel-tl-badge');
                if (badge) {
                    badge.className = 'ne-rel-tl-badge approved';
                    badge.innerHTML = '<i class="bi bi-check-circle-fill"></i> Approved';
                }
                var timeEl = pendingStep.querySelector('.ne-rel-tl-time');
                if (timeEl) {
                    var now = new Date();
                    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    var h = now.getHours(), m = String(now.getMinutes()).padStart(2,'0');
                    timeEl.textContent = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear() + ', ' + (h%12||12) + ':' + m + ' ' + (h>=12?'PM':'AM');
                }
                // Activate next step
                var next = pendingStep.nextElementSibling;
                if (next) {
                    next.classList.add('pending');
                    var nextBadge = next.querySelector('.ne-rel-tl-badge');
                    if (nextBadge) { nextBadge.className = 'ne-rel-tl-badge pending'; nextBadge.innerHTML = '<i class="bi bi-clock-fill"></i> Pending'; }
                    var nextTime = next.querySelector('.ne-rel-tl-time');
                    if (nextTime) nextTime.textContent = 'Awaiting review';
                }
            }
            // Check if all done
            var remaining = document.querySelectorAll('.ne-rel-tl-step.pending');
            if (remaining.length === 0) {
                if (approvalActions) approvalActions.innerHTML = '<div style="padding:12px 18px;background:#dcfce7;border-radius:10px;font-size:13px;font-weight:700;color:#16a34a;"><i class="bi bi-check-circle-fill me-1"></i> All steps approved — Relieving complete</div>';
            }
        });
    }

    // Reject button
    var rejectBtn = document.getElementById('neRelRejectBtn');
    if (rejectBtn) {
        rejectBtn.addEventListener('click', function() {
            var pendingStep = document.querySelector('.ne-rel-tl-step.pending');
            if (pendingStep) {
                pendingStep.classList.remove('pending');
                pendingStep.classList.add('rejected');
                var badge = pendingStep.querySelector('.ne-rel-tl-badge');
                if (badge) { badge.className = 'ne-rel-tl-badge rejected'; badge.innerHTML = '<i class="bi bi-x-circle-fill"></i> Rejected'; }
                var timeEl = pendingStep.querySelector('.ne-rel-tl-time');
                if (timeEl) {
                    var now = new Date();
                    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                    var h = now.getHours(), m = String(now.getMinutes()).padStart(2,'0');
                    timeEl.textContent = now.getDate() + ' ' + months[now.getMonth()] + ' ' + now.getFullYear() + ', ' + (h%12||12) + ':' + m + ' ' + (h>=12?'PM':'AM');
                }
            }
            if (approvalActions) approvalActions.innerHTML = '<div style="padding:12px 18px;background:#fee2e2;border-radius:10px;font-size:13px;font-weight:700;color:#dc2626;"><i class="bi bi-x-circle-fill me-1"></i> Request rejected</div>';
        });
    }
})();
</script>

<script>
// ===== Week Off: single day, or Multiple (every-week days + alternate weeks, with calendar preview) =====
(function() {
    var DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var ORD = { 1: '1st', 2: '2nd', 3: '3rd', 4: '4th', 5: '5th' };
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    var sel = document.getElementById('neWeekOff');
    var wrap = document.getElementById('neWeekOffMultiWrap');
    if (!sel || !wrap) return;
    var elWeekly = document.getElementById('neWoWeekly');
    var elAltList = document.getElementById('neWoAltList');
    var elAltArea = document.getElementById('neWoAltArea');
    var elSummary = document.getElementById('neWeekOffSummary');
    var elCalTitle = document.getElementById('neWoCalTitle');
    var elCalGrid = document.getElementById('neWoCalGrid');
    var hidden = document.getElementById('neWeekOffValue');

    var now = new Date();
    var st = {
        weekly: [],                       // ['Sunday']
        alt: [],                          // [{day:'Saturday', weeks:[1,3]}]
        formOpen: false,
        form: { day: null, weeks: [] },
        y: now.getFullYear(),
        m: now.getMonth()
    };

    function has(arr, v) { return arr.indexOf(v) !== -1; }
    function joinNice(list) { return list.length > 1 ? list.slice(0, -1).join(', ') + ' & ' + list[list.length - 1] : (list[0] || ''); }
    function altText(r) { return joinNice(r.weeks.map(function(w) { return ORD[w]; })) + ' ' + r.day; }

    // same JSON shape as before: [{day, occ:['All']}, {day, occ:['1','3']}]
    function getRules() {
        var out = [];
        DAYS.forEach(function(d) {
            if (has(st.weekly, d)) out.push({ day: d, occ: ['All'] });
            st.alt.forEach(function(r) { if (r.day === d) out.push({ day: d, occ: r.weeks.map(String) }); });
        });
        return out;
    }

    function getText() {
        if (sel.value !== 'Multiple') return sel.value || '';
        var parts = [];
        DAYS.forEach(function(d) {
            if (has(st.weekly, d)) parts.push('Every ' + d);
            st.alt.forEach(function(r) { if (r.day === d) parts.push(altText(r)); });
        });
        return parts.join(', ');
    }
    window.neGetWeekOffText = getText;

    function isOff(date) {
        var dn = DAYS[date.getDay()];
        if (has(st.weekly, dn)) return true;
        var wk = Math.ceil(date.getDate() / 7);
        return st.alt.some(function(r) { return r.day === dn && has(r.weeks, wk); });
    }

    function renderWeekly() {
        elWeekly.innerHTML = DAYS.map(function(d) {
            return '<button type="button" class="ne-wo-chipbtn' + (has(st.weekly, d) ? ' active' : '') +
                   '" data-wd="' + d + '">' + d.slice(0, 3) + '</button>';
        }).join('');
    }

    function renderAlt() {
        elAltList.innerHTML = st.alt.map(function(r, i) {
            return '<div class="ne-wo-altitem"><span><i class="bi bi-calendar2-week me-2"></i>' + altText(r) +
                   '</span><button type="button" data-alt-remove="' + i + '" title="Remove"><i class="bi bi-x-lg"></i></button></div>';
        }).join('');

        if (!st.formOpen) {
            elAltArea.innerHTML = '<button type="button" class="ne-wo-addlink" data-alt-open><i class="bi bi-plus-lg"></i> Add alternate week off</button>';
            return;
        }
        var used = st.alt.map(function(r) { return r.day; });
        var dayBtns = DAYS.map(function(d) {
            var dis = has(st.weekly, d) || has(used, d);
            return '<button type="button" class="ne-wo-chipbtn' + (st.form.day === d ? ' active' : '') + '"' +
                   (dis ? ' disabled title="Already added"' : '') + ' data-af-day="' + d + '">' + d.slice(0, 3) + '</button>';
        }).join('');
        var weekBtns = [1, 2, 3, 4, 5].map(function(w) {
            return '<button type="button" class="ne-wo-chipbtn' + (has(st.form.weeks, w) ? ' active' : '') +
                   '" data-af-week="' + w + '">' + ORD[w] + '</button>';
        }).join('');
        var ok = st.form.day && st.form.weeks.length;
        elAltArea.innerHTML =
            '<div class="ne-wo-form">' +
              '<div class="lbl">Which day?</div><div class="ne-wo-days">' + dayBtns + '</div>' +
              '<div class="lbl">Which weeks of the month?</div><div class="ne-wo-weeks">' + weekBtns + '</div>' +
              '<div class="ne-wo-form-actions">' +
                '<button type="button" class="btn btn-sm btn-primary" data-af-add' + (ok ? '' : ' disabled') + '>Add</button>' +
                '<button type="button" class="btn btn-sm btn-light" data-af-cancel>Cancel</button>' +
              '</div>' +
            '</div>';
    }

    function renderSummary() {
        var t = getText();
        elSummary.innerHTML = t
            ? '<div class="ne-wo-result"><b><i class="bi bi-check-circle-fill me-1"></i>' + t + '</b></div>' +
              '<button type="button" class="ne-wo-clear" data-clear><i class="bi bi-x-circle"></i> Clear all</button>'
            : '<div class="ne-wo-result empty"></div>';
    }

    function renderCal() {
        elCalTitle.textContent = MONTHS[st.m] + ' ' + st.y;
        var h = DAYS.map(function(d) { return '<div class="dow">' + d.slice(0, 3) + '</div>'; }).join('');
        var first = new Date(st.y, st.m, 1).getDay();
        var total = new Date(st.y, st.m + 1, 0).getDate();
        for (var i = 0; i < first; i++) h += '<div></div>';
        for (var d = 1; d <= total; d++) {
            var dt = new Date(st.y, st.m, d);
            var cls = 'd' + (isOff(dt) ? ' off' : '') +
                      (d === now.getDate() && st.m === now.getMonth() && st.y === now.getFullYear() ? ' today' : '');
            h += '<div class="' + cls + '">' + d + '</div>';
        }
        elCalGrid.innerHTML = h;
    }

    function render() {
        var isMulti = sel.value === 'Multiple';
        wrap.classList.toggle('d-none', !isMulti);
        renderWeekly(); renderAlt(); renderSummary(); renderCal();
        hidden.value = isMulti ? JSON.stringify(getRules()) : sel.value;
    }

    wrap.addEventListener('click', function(e) {
        var t = e.target.closest('button');
        if (!t || t.disabled) return;
        var ds = t.dataset;

        if (ds.wd) {
            if (has(st.weekly, ds.wd)) st.weekly = st.weekly.filter(function(x) { return x !== ds.wd; });
            else {
                st.weekly.push(ds.wd);
                st.alt = st.alt.filter(function(r) { return r.day !== ds.wd; }); // every-week covers it
                if (st.form.day === ds.wd) st.form.day = null;
            }
        } else if ('altOpen' in ds) { st.formOpen = true; st.form = { day: null, weeks: [] }; }
        else if ('afCancel' in ds) { st.formOpen = false; }
        else if (ds.afDay) { st.form.day = ds.afDay; }
        else if (ds.afWeek) {
            var w = +ds.afWeek, i = st.form.weeks.indexOf(w);
            if (i === -1) st.form.weeks.push(w); else st.form.weeks.splice(i, 1);
            st.form.weeks.sort();
        } else if ('afAdd' in ds) {
            st.alt.push({ day: st.form.day, weeks: st.form.weeks.slice() });
            st.formOpen = false;
        } else if (ds.altRemove !== undefined) { st.alt.splice(+ds.altRemove, 1); }
        else if (ds.cal) {
            st.m += +ds.cal;
            if (st.m < 0) { st.m = 11; st.y--; } else if (st.m > 11) { st.m = 0; st.y++; }
        } else if ('clear' in ds) { st.weekly = []; st.alt = []; st.formOpen = false; }
        else return;
        render();
    });

    // select2 fires jQuery events, so bind through jQuery when available
    if (window.jQuery) { jQuery(sel).on('change', render); } else { sel.addEventListener('change', render); }
    render();
})();
</script>

<!-- ===== Department → Designation cascade (Job Details block) ===== -->
<script>
(function () {

    // Same data as department.js / position.js
    var designationMap = {
        1: [ // HR
            { id: 5,  name: 'HR Executive' },
            { id: 8,  name: 'HR Manager' },
            { id: 9,  name: 'Recruiter' }
        ],
        2: [ // Sales
            { id: 1,  name: 'Sales Executive' },
            { id: 2,  name: 'Sales Manager' }
        ],
        3: [ // Marketing
            { id: 4,  name: 'Marketing Manager' },
            { id: 10, name: 'Content Strategist' }
        ],
        4: [ // Designer
            { id: 11, name: 'UI/UX Designer' },
            { id: 12, name: 'Product Designer' }
        ],
        5: [ // Production
            { id: 6,  name: 'Production Lead' },
            { id: 13, name: 'Quality Analyst' }
        ],
        6: [ // Tech Support
            { id: 3,  name: 'iOS Developer' },
            { id: 14, name: 'Android Developer' },
            { id: 15, name: 'Business Analyst' }
        ],
        7: [ // Finance
            { id: 7,  name: 'Finance Analyst' },
            { id: 16, name: 'Accountant' }
        ]
    };

    function rebuildDesignationSelect(deptId, selectedName) {
        var desSel = document.getElementById('neDesignation');
        if (!desSel) return;

        desSel.innerHTML = '';

        var designations = designationMap[Number(deptId)] || [];

        if (!deptId || !designations.length) {
            desSel.disabled = true;
            desSel.innerHTML = '<option value="">Select Department first</option>';
        } else {
            desSel.disabled = false;
            var placeholder = document.createElement('option');
            placeholder.value = '';
            placeholder.textContent = 'Nothing selected';
            desSel.appendChild(placeholder);

            designations.forEach(function (d) {
                var opt = document.createElement('option');
                opt.value = d.id;
                opt.textContent = d.name;
                if (selectedName && d.name === selectedName) opt.selected = true;
                desSel.appendChild(opt);
            });
        }

        // Re-init select2
        if (window.jQuery && window.jQuery.fn.select2) {
            window.jQuery(desSel).select2({ width: '100%' });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var deptSel = document.getElementById('neDepartment');
        if (!deptSel) return;

        // select2 change event (fires on both native + select2 pick)
        if (window.jQuery && window.jQuery.fn.select2) {
            window.jQuery(deptSel).on('change', function () {
                rebuildDesignationSelect(this.value, null);
            });
        } else {
            deptSel.addEventListener('change', function () {
                rebuildDesignationSelect(this.value, null);
            });
        }

        // Init on load
        rebuildDesignationSelect(deptSel.value, null);
    });

    // Expose helper for demo autofill
    window._neRebuildDesignation = rebuildDesignationSelect;

})();
</script>

<script>
// ===== DEMO ONLY: auto-fill form with dummy data (remove before production) =====
(function() {
    var val = function(id, v) {
        var el = document.getElementById(id);
        if (!el) return;
        el.value = v;
        if (window.jQuery && window.jQuery.fn.select2) {
            window.jQuery(el).trigger('change');
        }
    };

    // --- Profile: Personal details ---
    val('neEmployeeCode', 'GH-EMP-0421');
    val('neFirstName', 'Arun');
    val('neLastName', 'Kumar');
    val('neGender', 'Male');
    val('neBirthday', '14-06-1996');
    val('neBirthplace', 'Chennai');
    val('nePresentAddress', '12, Anna Nagar Main Road, Chennai - 600040');
    val('neHomeTown', 'Coimbatore');
    val('neNation', 'Indian');
    val('neReligion', 'Hindu');
    val('neIdDocType', 'Aadhaar');
    val('nePermanentAddress', '5/B, Gandhi Street, RS Puram, Coimbatore - 641002');
    val('neBloodGroup', 'O+');
    val('neLatitude', '13.0827');
    val('neLongitude', '80.2707');
    val('neOtherInfo', 'Comfortable with both Tamil and English communication. Enjoys weekend cricket.');

    // --- Emergency contact ---
    val('neEmergencyName', 'Suresh Kumar');
    val('neEmergencyPhone', '98765 43210');
    val('neEmergencyBloodGroup', 'B+');
    val('neEmergencyRelation', 'Father');

    // --- Job details ---
    val('neDoj', '01-09-2026');
    val('neExperience', '3 - 5 Years');
    val('neRole', 'Employee');
    val('neJobType', 'Full-time');

    // Set Department first, then trigger cascade so Designation options load
    (function () {
        var deptSel = document.getElementById('neDepartment');
        if (deptSel) {
            deptSel.value = '6'; // Tech Support
            if (window.jQuery && window.jQuery.fn.select2) {
                window.jQuery(deptSel).trigger('change');
            } else {
                deptSel.dispatchEvent(new Event('change'));
            }
            // After cascade, pre-select the designation
            setTimeout(function () {
                var desSel = document.getElementById('neDesignation');
                if (desSel) {
                    // find option by text
                    for (var i = 0; i < desSel.options.length; i++) {
                        if (desSel.options[i].text === 'iOS Developer') {
                            desSel.selectedIndex = i;
                            break;
                        }
                    }
                    if (window.jQuery && window.jQuery.fn.select2) {
                        window.jQuery(desSel).trigger('change');
                    }
                }
            }, 50);
        }
    })();

    val('nePhone', '91234 56780');
    val('neOfficialEmail', 'arun.kumar@gharuda.com');
    val('nePersonalEmail', 'arun.kumar@gmail.com');
    val('neBranch', 'Chennai');
    val('neReportingTo', 'Victoria Celestie');
    val('neStatus', 'Active');
    val('neEmployeeType', 'Permanent');
    val('neWorkLocation', 'Hybrid');
    val('neWeekOff', 'Sunday');
    val('neOfferLetterDate', '20-08-2026');
    val('neNoticePeriodDays', '30');
    val('neOnboardingCommitment', 'Employee agrees to complete onboarding tasks within the first 30 days and submit all pending documents to HR.');

    // --- Salary details ---
    val('neSalaryType', 'Monthly');
    val('neCtc', '600000');
    val('neTaxCode', 'TX001');
    val('nePfEligible', 'Yes');
    val('neEsiEligible', 'Yes');
    val('neOtEligible', 'No');
    val('neUan', '101234567890');
    val('neEsiNo', '31000123450000199');
    val('neAadhaarNo', '4512 7896 3210');
    val('nePanNo', 'BXKPM1234L');
    val('nePensionEligible', 'Yes');
    val('neSalaryCalendar', 'Monthly Calendar');

    // --- Interview feedback ---
    val('neRound1', 'CV shortlisted - strong iOS fundamentals, good academic record.');
    val('neRound2', 'Cleared technical round - Swift, UIKit and REST integration knowledge is solid.');
    val('neRound3', 'HR round positive - good communication, flexible with hybrid work.');
    val('neRound4', 'Salary negotiation closed at 6 LPA - accepted offer.');

    // --- Family details ---
    val('neFatherName', 'Suresh Kumar');
    val('neMotherName', 'Lakshmi Kumar');
    val('neFamilyContactNumber', '98765 43211');
    val('neFatherOccupation', 'Business');
    val('neMotherOccupation', 'Homemaker');
    val('neOtherFamilyName', 'Divya Kumar');
    val('neFamilyRelationship', 'Sister');
    val('neMaritalStatus', 'Single');
    // Children name rows use name="children_name[]" (first row prefilled via input)

    // --- Departments & settings ---
    var adminCb = document.getElementById('neAdministrator');
    if (adminCb) adminCb.checked = false;
    var welcomeCb = document.getElementById('neWelcomeEmail');
    if (welcomeCb) welcomeCb.checked = true;

    // --- Relieving request ---
    val('neRelResignDate', '01-09-2026');
    val('neRelLastDay', '01-10-2026');
    val('neRelNoticePeriod', '30 Days');
    val('neRelReason', 'Career growth opportunity at another organisation.');
    val('neRelRemarks', 'Will complete project handover before last working day.');

    // Trigger age calc from birthday
    var bday = document.getElementById('neBirthday');
    if (bday) bday.dispatchEvent(new Event('change'));
})();
</script>