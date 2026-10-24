<?php
/* ---------------------------------------------------------------
   Candidate Apply — standalone page (candidate-ku link share pannuvom).

   Link format:
     candidate-apply.php?pos=Senior%20UI%2FUX%20Designer&dept=Design&ref=JOB-101

   Candidate opens the link, fills Candidate Details + Job Details
   (skills tag input oda) and submits. Application
   localStorage 'gh_cand_applications' la save aagum (HR side integration
   ku ready). Success screen la reference number varum.

   NOTE: Standalone page — no admin sidebar/topbar. Employee-self-service
   page maari dhaan idhu (ESS pattern).
---------------------------------------------------------------- */

$pos  = isset($_GET['pos']) ? trim((string) $_GET['pos']) : '';
$dept = isset($_GET['dept']) ? trim((string) $_GET['dept']) : '';
$ref  = isset($_GET['ref']) ? preg_replace('/[^A-Za-z0-9\-]/', '', (string) $_GET['ref']) : '';

/* Demo job openings — real la job-openings DB la irundhu varum */
$jobs = [
    ['pos' => 'Senior UI/UX Designer',   'dept' => 'Human Resource'],
    ['pos' => 'Lead Backend Engineer',   'dept' => 'Information Technology'],
    ['pos' => 'iOS App Developer',       'dept' => 'Information Technology'],
    ['pos' => 'Business Analyst',        'dept' => 'Operations'],
    ['pos' => 'HR Executive',            'dept' => 'Human Resource'],
    ['pos' => 'Accountant',              'dept' => 'Accounts'],
    ['pos' => 'Sales Executive',         'dept' => 'Sales'],
];

/* URL la position kuduthurundha department auto-match */
if ($pos !== '') {
    foreach ($jobs as $j) {
        if (strcasecmp($j['pos'], $pos) === 0) { $dept = $j['dept']; break; }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Application<?= $pos !== '' ? ' | ' . htmlspecialchars($pos, ENT_QUOTES) : '' ?></title>
    <link rel="icon" href="./assets/img/logo-icon.png" />

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/icon/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/select2.css">
     

    <style>
        /* ===== Candidate Apply — scoped to body.cap-body ===== */
        body.cap-body {
            background: #f5f8f6;
            font-family: 'Manrope', sans-serif;
            padding-bottom: 90px;
        }

        .cap-body .cap-top {
            background: #fff;
            border-bottom: 1px solid #eef0f3;
            padding: 12px 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .cap-body .cap-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cap-body .cap-brand img {
            width: 34px;
            height: 34px;
            border-radius: 9px;
        }

        .cap-body .cap-brand .t {
            font-family: 'Sora', sans-serif;
            font-size: 14.5px;
            font-weight: 800;
            color: #14162b;
            line-height: 1.15;
        }

        .cap-body .cap-brand .s {
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
        }

        .cap-body .cap-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            font-weight: 800;
            padding: 5px 12px;
            border-radius: 999px;
            background: #f1f5f9;
            color: #475569;
        }

        .cap-body .cap-link-btn {
            border: 1px solid #e5e7eb;
            background: #fff;
            border-radius: 10px;
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 800;
            color: #374151;
            cursor: pointer;
            transition: .15s;
        }

        .cap-body .cap-link-btn:hover {
            border-color: #86efac;
            color: #15803d;
        }

        .cap-body .cap-wrap {
            max-width: 1080px;
            margin: 20px auto 0;
            padding: 0 18px;
        }

        /* ===== Hero ===== */
        .cap-body .cap-hero {
            background: #fff;
            border: 1px solid #eef0f3;
            border-radius: 20px;
            box-shadow: 0 2px 12px rgba(20, 20, 43, .05);
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .cap-body .cap-hero .avatar {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
            box-shadow: 0 8px 18px rgba(22, 163, 74, .28);
        }

        .cap-body .cap-hero h1 {
            font-family: 'Sora', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: #14162b;
            margin: 0 0 4px;
        }

        .cap-body .cap-hero p {
            font-size: 12.5px;
            font-weight: 600;
            color: #64748b;
            margin: 0;
        }

        .cap-body .cap-hero .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 6px 16px;
            margin-top: 8px;
            font-size: 11.5px;
            font-weight: 700;
            color: #475569;
        }

        .cap-body .cap-hero .meta i {
            color: #16a34a;
            margin-right: 4px;
        }

        .cap-body .cap-progress-box {
            margin-left: auto;
            background: #f8fafc;
            border: 1px solid #eef0f3;
            border-radius: 14px;
            padding: 12px 16px;
            min-width: 230px;
        }

        .cap-body .cap-progress-box .lbl {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            font-weight: 800;
            color: #64748b;
            margin-bottom: 6px;
        }

        .cap-body .cap-progress-box .lbl span:last-child {
            color: #15803d;
        }

        .cap-body .cap-progress-bar {
            height: 8px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .cap-body .cap-progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #16a34a, #4ade80);
            border-radius: 999px;
            transition: width .25s ease;
        }

        /* ===== Sections ===== */
        .cap-body .cap-sec {
            background: #fff;
            border: 1px solid #eef0f3;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(20, 20, 43, .04);
            padding: 20px 22px;
            margin-bottom: 16px;
        }

        .cap-body .cap-sec-head {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #e2e8f0;
        }

        .cap-body .cap-sec-head .ico {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: #eafaf1;
            color: #15803d;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .cap-body .cap-sec-head h3 {
            font-family: 'Sora', sans-serif;
            font-size: 14.5px;
            font-weight: 800;
            color: #14162b;
            margin: 0;
        }

        .cap-body .form-label {
            font-size: 12px;
            font-weight: 800;
            color: #374151;
            margin-bottom: 5px;
        }

        .cap-body .form-control,
        .cap-body .form-select {
            font-size: 13px;
            border-radius: 10px;
            border-color: #e5e7eb;
            padding: 9px 12px;
        }

        .cap-body .form-control:focus,
        .cap-body .form-select:focus {
            border-color: #86efac;
            box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
        }

        .cap-body .form-control.is-invalid,
        .cap-body .form-select.is-invalid {
            border-color: #e5484d;
        }

        .cap-body .cap-req {
            color: #e5484d;
        }

        /* ===== Skills tag input ===== */
        .cap-body .cap-tags {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 7px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 8px 10px;
            background: #fff;
            min-height: 46px;
            cursor: text;
        }

        .cap-body .cap-tags:focus-within {
            border-color: #86efac;
            box-shadow: 0 0 0 3px rgba(12, 163, 8, .1);
        }

        .cap-body .cap-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eafaf1;
            border: 1px solid #bbf7d0;
            color: #15803d;
            font-size: 12px;
            font-weight: 800;
            border-radius: 999px;
            padding: 5px 8px 5px 12px;
            animation: capTagIn .18s ease;
        }

        @keyframes capTagIn {
            from { opacity: 0; transform: scale(.9); }
        }

        .cap-body .cap-tag .x {
            border: none;
            background: rgba(22, 163, 74, .12);
            color: #15803d;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            cursor: pointer;
            transition: .12s;
        }

        .cap-body .cap-tag .x:hover {
            background: #dc2626;
            color: #fff;
        }

        .cap-body .cap-tags input {
            border: none;
            outline: none;
            flex: 1;
            min-width: 140px;
            font-size: 12.5px;
            font-weight: 600;
            padding: 4px 2px;
            color: #14162b;
        }

        .cap-body .cap-tags input::placeholder {
            color: #adb5bd;
            font-weight: 500;
        }

        .cap-body .cap-suggest {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }

        .cap-body .cap-suggest .lbl {
            font-size: 10.5px;
            font-weight: 800;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .4px;
            align-self: center;
            margin-right: 2px;
        }

        .cap-body .cap-sug-chip {
            border: 1px dashed #bfdbfe;
            background: #f8fbff;
            color: #1d4ed8;
            font-size: 11px;
            font-weight: 700;
            border-radius: 999px;
            padding: 4px 11px;
            cursor: pointer;
            transition: .12s;
        }

        .cap-body .cap-sug-chip:hover {
            background: #eff6ff;
            border-style: solid;
        }

        .cap-body .cap-sug-chip.used {
            opacity: .45;
            pointer-events: none;
            border-style: solid;
        }

        /* ===== Resume upload ===== */
        .cap-body .cap-upload-box {
            display: flex;
            align-items: center;
            gap: 14px;
            border: 2px dashed #bfdbfe;
            background: #f8fbff;
            border-radius: 12px;
            padding: 15px 18px;
            cursor: pointer;
            transition: .15s;
        }

        .cap-body .cap-upload-box:hover {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .cap-body .cap-upload-box .ico {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #dbeafe;
            color: #1d4ed8;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .cap-body .cap-upload-box .t {
            font-size: 13px;
            font-weight: 800;
            color: #111827;
            display: block;
        }

        .cap-body .cap-upload-box .s {
            font-size: 11.5px;
            font-weight: 600;
            color: #64748b;
        }

        .cap-body .cap-upload-box.has-file {
            border-style: solid;
            border-color: #86efac;
            background: #f0fdf4;
        }

        .cap-body .cap-upload-box.has-file .ico {
            background: #dcfce7;
            color: #15803d;
        }

        /* ===== Submit bar ===== */
        .cap-body .cap-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .cap-body .cap-btn-green {
            font-size: 13px;
            font-weight: 800;
            border: none;
            border-radius: 11px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #16a34a, #15803d);
            color: #fff;
            box-shadow: 0 4px 12px rgba(22, 163, 74, .3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: .15s;
        }

        .cap-body .cap-btn-green:hover {
            background: linear-gradient(135deg, #15803d, #166534);
            transform: translateY(-1px);
        }

        /* ===== Success screen ===== */
        .cap-body .cap-done {
            display: none;
            background: #fff;
            border: 1px solid #eef0f3;
            border-radius: 20px;
            box-shadow: 0 2px 12px rgba(20, 20, 43, .05);
            text-align: center;
            padding: 46px 24px;
        }

        .cap-body .cap-done.show { display: block; }

        .cap-body .cap-done .ring {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            background: linear-gradient(135deg, #0ca308, #34d399);
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin-bottom: 18px;
            box-shadow: 0 10px 26px rgba(12, 163, 8, .28);
        }

        .cap-body .cap-done h2 {
            font-family: 'Sora', sans-serif;
            font-size: 21px;
            font-weight: 800;
            color: #14162b;
            margin: 0 0 8px;
        }

        .cap-body .cap-done p {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            max-width: 520px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .cap-body .cap-done .cap-ref {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 800;
            color: #15803d;
            margin-top: 16px;
        }

        .cap-body .cap-done .cap-next {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 18px;
        }

        .cap-body .cap-done .cap-next span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f8fafc;
            border: 1px solid #eef0f3;
            border-radius: 999px;
            padding: 7px 14px;
            font-size: 11.5px;
            font-weight: 700;
            color: #475569;
        }

        .cap-body .cap-done .cap-next span i {
            color: #16a34a;
        }

        /* ===== Toast ===== */
        .cap-toast-wrap {
            position: fixed;
            top: 16px;
            right: 16px;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .cap-toast {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: #dcfce7;
            color: #15803d;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 12px 14px;
            min-width: 300px;
            max-width: 420px;
            box-shadow: 0 8px 24px rgba(21, 128, 61, .18);
            font-size: 12.5px;
            font-weight: 600;
            line-height: 1.45;
            animation: capToastIn .25s ease;
        }

        .cap-toast.is-warn {
            background: #feecec;
            color: #dc2626;
            border-color: #fecaca;
        }

        .cap-toast .cap-toast-ico {
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

        .cap-toast.is-warn .cap-toast-ico {
            background: #dc2626;
        }

        @keyframes capToastIn {
            from { opacity: 0; transform: translateX(24px); }
        }

        .cap-toast-out {
            opacity: 0;
            transform: translateX(24px);
            transition: opacity .26s ease, transform .26s ease;
        }

        /* ===== Date picker — standalone page la app.css illa, so CSS vars fallback + z-index fix ===== */
        .cap-body .calendar-dropdown {
            background: #fff;
            border: 1px solid #e5e7eb;
            outline: none;
            z-index: 3050;
        }

        .cap-body .calendar-header {
            background: linear-gradient(135deg, #16a34a, #15803d);
        }

        .cap-body .calendar-dropdown .weekday {
            color: #64748b;
        }

        .cap-body .calendar-dropdown .day {
            color: #14162b;
        }

        .cap-body .calendar-dropdown .day:hover {
            background: #eafaf1;
        }

        .cap-body .calendar-dropdown .day.other-month {
            color: #c3cad6;
        }

        .cap-body .calendar-dropdown .day.today {
            border-color: #16a34a;
            color: #16a34a;
        }

        .cap-body .calendar-dropdown .day.selected {
            background: #16a34a;
            box-shadow: 0 4px 10px rgba(22, 163, 74, .35);
        }

        .cap-body .calendar-footer {
            border-top: 1px solid #e5e7eb;
        }

        .cap-body .today-btn {
            color: #16a34a;
        }

        .cap-body .options-dropdown {
            background: #fff;
            border-color: #e5e7eb;
            z-index: 3051;
        }

        .cap-body .options-dropdown .option {
            color: #14162b;
        }

        .cap-body .options-dropdown .option:hover {
            background: #f0fdf4;
        }

        .cap-body .options-dropdown .option.active {
            background: #16a34a;
        }

        /* Select2 tweaks */
        .cap-body .select2-container .select2-selection {
            border-radius: 10px;
            border-color: #e5e7eb;
            height: 40px;
            display: flex;
            align-items: center;
        }

        .cap-body .select2-container .select2-selection .select2-selection__rendered {
            font-size: 13px;
            font-weight: 600;
            color: #14162b;
            padding: 0 12px;
        }

        .cap-body .select2-container .select2-selection .select2-selection__arrow {
            height: 38px;
        }

        @media (max-width: 767px) {
            .cap-body .cap-progress-box {
                margin-left: 0;
                width: 100%;
            }

            .cap-body .cap-hero { padding: 18px; }
        }
    </style>
</head>

<body class="cap-body">

    <!-- ===== Top bar ===== -->
    <div class="cap-top">
        <div class="cap-brand">
            <img src="./assets/img/logo-icon.png" alt="Gharuda">
            <div>
                <div class="t">Gharuda HRMS</div>
                <div class="s">Candidate Application</div>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2 ms-auto flex-wrap">
            <?php if ($ref !== ''): ?>
                <span class="cap-pill"><i class="bi bi-briefcase"></i> <?= htmlspecialchars($ref, ENT_QUOTES) ?></span>
            <?php endif; ?>
            <button type="button" class="cap-link-btn" id="capCopyLinkBtn"><i class="bi bi-link-45deg"></i> Copy Application Link</button>
        </div>
    </div>

    <div class="cap-wrap">

        <!-- ===== Hero ===== -->
        <div class="cap-hero">
            <div class="avatar"><i class="bi bi-person-plus-fill"></i></div>
            <div style="min-width:0;">
                <h1>Join our team 👋</h1>
                <p>Fill in your details below and submit — our HR team will review and schedule your interview.</p>
                <div class="meta">
                    <span><i class="bi bi-briefcase"></i> <?= $pos !== '' ? htmlspecialchars($pos, ENT_QUOTES) : 'Open Position' ?></span>
                    <?php if ($dept !== ''): ?><span><i class="bi bi-building"></i> <?= htmlspecialchars($dept, ENT_QUOTES) ?></span><?php endif; ?>
                    <span><i class="bi bi-shield-check"></i> Takes about 5 minutes</span>
                </div>
            </div>
            <div class="cap-progress-box">
                <div class="lbl"><span>Application progress</span><span id="capPct">0%</span></div>
                <div class="cap-progress-bar"><div class="cap-progress-fill" id="capProgressFill"></div></div>
                <div class="lbl" style="margin-top:6px;">
                    <span id="capFilledCount">0 of 0 fields filled</span>
                </div>
            </div>
        </div>

        <!-- ===== Form ===== -->
        <form id="capForm" novalidate>

            <!-- ---------- 1. Candidate Details ---------- -->
            <div class="cap-sec">
                <div class="cap-sec-head">
                    <span class="ico"><i class="bi bi-person-vcard"></i></span>
                    <h3>Candidate Details</h3>
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="capName" data-required data-label="Full Name" placeholder="Ex: Vijay Kumar" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="capEmail" data-required data-label="Email" placeholder="name@gmail.com" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Mobile Number</label>
                        <input type="tel" class="form-control" id="capMobile" data-required data-label="Mobile Number" placeholder="98765 43210" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <div class="date-picker bottom-0">
                            <input type="text" class="date-input form-control" id="capDob" placeholder="dd/mm/yyyy" autocomplete="off" data-required data-label="Date of Birth">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Gender</label>
                        <select class="form-select select2" id="capGender" data-required data-label="Gender">
                            <option value=""></option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" id="capLocation" data-required data-label="Location" placeholder="Ex: Chennai, Tamil Nadu" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Highest Qualification</label>
                        <select class="form-select select2" id="capQual" data-required data-label="Highest Qualification">
                            <option value=""></option>
                            <option>10th</option>
                            <option>12th</option>
                            <option>Diploma</option>
                            <option>B.E. / B.Tech</option>
                            <option>B.Sc</option>
                            <option>B.Com</option>
                            <option>M.E. / M.Tech</option>
                            <option>MCA</option>
                            <option>MBA</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Total Experience</label>
                        <input type="text" class="form-control" id="capTotalExp" data-required data-label="Total Experience" placeholder="Ex: 4.5 yrs" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Relevant Experience</label>
                        <input type="text" class="form-control" id="capRelExp" data-required data-label="Relevant Experience" placeholder="Ex: 3 yrs" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Current Company</label>
                        <input type="text" class="form-control" id="capCompany" data-required data-label="Current Company" placeholder="Ex: Freshworks" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Current Designation</label>
                        <input type="text" class="form-control" id="capDesig" data-required data-label="Current Designation" placeholder="Ex: Senior UI/UX Designer" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Current CTC</label>
                        <input type="text" class="form-control" id="capCtc" data-required data-label="Current CTC" placeholder="Ex: ₹16.5 LPA" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Expected CTC</label>
                        <input type="text" class="form-control" id="capExpCtc" data-required data-label="Expected CTC" placeholder="Ex: ₹20 LPA" autocomplete="off">
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Notice Period</label>
                        <select class="form-select select2" id="capNotice" data-required data-label="Notice Period">
                            <option value=""></option>
                            <option>Immediate</option>
                            <option>15 Days</option>
                            <option>30 Days</option>
                            <option>60 Days</option>
                            <option>90 Days</option>
                        </select>
                    </div>

                    <!-- Skills tag input -->
                    <div class="col-12">
                        <label class="form-label">Skills</label>
                        <div class="cap-tags" id="capSkillsWrap">
                            <input type="text" id="capSkillInput" placeholder="Type a skill and press Enter — e.g. Figma">
                        </div>
                        <div class="cap-suggest" id="capSkillSuggest">
                            <span class="lbl">Quick add</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Resume Upload</label>
                        <label class="cap-upload-box" for="capResume">
                            <span class="ico" id="capResumeIco"><i class="bi bi-file-earmark-pdf"></i></span>
                            <span>
                                <span class="t" id="capResumeName">Choose resume file</span>
                                <span class="s d-block">PDF or DOC, up to 5 MB</span>
                            </span>
                            <input type="file" id="capResume" accept=".pdf,.doc,.docx" hidden>
                        </label>
                    </div>
                </div>
            </div>

            <!-- ---------- 2. Job Details ---------- -->
            <div class="cap-sec">
                <div class="cap-sec-head">
                    <span class="ico"><i class="bi bi-briefcase"></i></span>
                    <h3>Job Details</h3>
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Applied Position</label>
                        <select class="form-select select2" id="capPosition" data-required data-label="Applied Position">
                            <option value=""></option>
                            <?php foreach ($jobs as $j): ?>
                                <option value="<?= htmlspecialchars($j['pos'], ENT_QUOTES) ?>" data-dept="<?= htmlspecialchars($j['dept'], ENT_QUOTES) ?>" <?= ($pos !== '' && strcasecmp($j['pos'], $pos) === 0) ? 'selected' : '' ?>><?= htmlspecialchars($j['pos'], ENT_QUOTES) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Department</label>
                        <select class="form-select select2" id="capDept" data-required data-label="Department">
                            <option value=""></option>
                            <?php foreach ($jobs as $j): ?>
                                <option><?= htmlspecialchars($j['dept'], ENT_QUOTES) ?></option>
                            <?php endforeach; ?>
                            <option>Design</option>
                            <option>Engineering</option>
                            <option>Marketing</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Job Type</label>
                        <select class="form-select select2" id="capJobType" data-required data-label="Job Type">
                            <option value=""></option>
                            <option>Full Time</option>
                            <option>Part Time</option>
                            <option>Contract</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Source</label>
                        <select class="form-select select2" id="capSource" data-required data-label="Source">
                            <option value=""></option>
                            <option>Job Portal</option>
                            <option>Referral</option>
                            <option>Website</option>
                            <option>Walk-in</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Referred By</label>
                        <input type="text" class="form-control" id="capReferred" placeholder="Employee / friend name (if Referral)" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="cap-actions">
                <span class="text-muted" style="font-size:11.5px;font-weight:600;">
                    <i class="bi bi-lock-fill"></i> Your details are shared only with our HR team.
                </span>
                <span style="flex:1;"></span>
                <button type="button" class="cap-btn-green" id="capSubmitBtn">
                    <i class="bi bi-send-check"></i>Submit Application
                </button>
            </div>
        </form>

        <!-- ===== Success screen ===== -->
        <div class="cap-done" id="capDone">
            <div class="ring"><i class="bi bi-check-lg"></i></div>
            <h2>Application submitted!</h2>
            <p id="capDoneMsg">Thank you. Your application has been sent to our HR team.</p>
            <div class="cap-ref">
                <i class="bi bi-hash"></i> Reference: <span id="capRefNo">—</span>
            </div>
            <div class="cap-next">
                <span><i class="bi bi-eye"></i> HR reviews your application</span>
                <span><i class="bi bi-calendar-plus"></i> Interview gets scheduled</span>
                <span><i class="bi bi-envelope"></i> You get an email update</span>
            </div>
        </div>
    </div>

    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/select2.js"></script>
     

    <script>
        (function() {
            'use strict';

            function $(id) { return document.getElementById(id); }

            function esc(s) {
                return String(s == null ? '' : s)
                    .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
            }

            /* ---------------- Select2 ---------------- */
            if (window.jQuery && jQuery.fn.select2) {
                jQuery('.cap-body .select2').select2({ width: '100%' });
            }

            /* ---------------- Toast ---------------- */
            var toastWrap = null;

            function getToastWrap() {
                if (!toastWrap) {
                    toastWrap = document.createElement('div');
                    toastWrap.className = 'cap-toast-wrap';
                    document.body.appendChild(toastWrap);
                }
                return toastWrap;
            }

            function showToast(msg, isWarn) {
                var wrap = getToastWrap();
                var t = document.createElement('div');
                t.className = 'cap-toast' + (isWarn ? ' is-warn' : '');
                t.innerHTML = '<span class="cap-toast-ico"><i class="bi ' + (isWarn ? 'bi-exclamation-triangle-fill' : 'bi-check-lg') + '"></i></span>' +
                    '<span class="cap-toast-msg"></span>';
                t.querySelector('.cap-toast-msg').textContent = msg;
                wrap.appendChild(t);
                setTimeout(function() {
                    t.classList.add('cap-toast-out');
                    setTimeout(function() { t.remove(); }, 260);
                }, 4200);
            }

            /* ---------------- Copy application link (HR share) ---------------- */
            $('capCopyLinkBtn').addEventListener('click', function() {
                var url = window.location.href;
                var done = function() { showToast('Application link copied — share it with the candidate'); };
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(url).then(done, function() { showToast(url); });
                } else {
                    showToast(url);
                }
            });

            /* ---------------- Skills tag input ---------------- */
            var skills = [];
            var SUGGESTIONS = ['Figma', 'Photoshop', 'Illustrator', 'React', 'Node.js', 'Flutter', 'Swift',
                'SQL', 'Python', 'Java', 'PHP', 'Communication', 'Leadership', 'Problem Solving'];

            function renderSkillSuggest() {
                var wrap = $('capSkillSuggest');
                wrap.innerHTML = '<span class="lbl">Quick add</span>';
                SUGGESTIONS.forEach(function(s) {
                    if (skills.indexOf(s) !== -1) return;
                    var b = document.createElement('button');
                    b.type = 'button';
                    b.className = 'cap-sug-chip';
                    b.textContent = s;
                    b.addEventListener('click', function() { addSkill(s); });
                    wrap.appendChild(b);
                });
            }

            function addSkill(val) {
                val = String(val || '').trim().replace(/,+$/, '');
                if (!val) return;
                if (skills.some(function(s) { return s.toLowerCase() === val.toLowerCase(); })) {
                    showToast('"' + val + '" already added', true);
                    return;
                }
                skills.push(val);
                renderSkills();
                refreshProgress();
            }

            function renderSkills() {
                var wrap = $('capSkillsWrap');
                wrap.querySelectorAll('.cap-tag').forEach(function(t) { t.remove(); });
                skills.forEach(function(s, i) {
                    var chip = document.createElement('span');
                    chip.className = 'cap-tag';
                    chip.innerHTML = esc(s) + '<button type="button" class="x" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    chip.querySelector('.x').addEventListener('click', function() {
                        skills.splice(i, 1);
                        renderSkills();
                        renderSkillSuggest();
                        refreshProgress();
                    });
                    wrap.appendChild(chip);
                });
                renderSkillSuggest();
            }

            $('capSkillInput').addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addSkill(this.value);
                    this.value = '';
                } else if (e.key === 'Backspace' && !this.value && skills.length) {
                    skills.pop();
                    renderSkills();
                    renderSkillSuggest();
                    refreshProgress();
                }
            });

            $('capSkillsWrap').addEventListener('click', function() {
                $('capSkillInput').focus();
            });

            /* ---------------- Resume upload ---------------- */
            $('capResume').addEventListener('change', function() {
                var f = this.files && this.files[0];
                var box = this.closest('.cap-upload-box');
                if (f) {
                    if (f.size > 5 * 1024 * 1024) {
                        showToast('Resume file must be under 5 MB', true);
                        this.value = '';
                        box.classList.remove('has-file');
                        $('capResumeName').textContent = 'Choose resume file';
                        $('capResumeIco').innerHTML = '<i class="bi bi-file-earmark-pdf"></i>';
                        return;
                    }
                    box.classList.add('has-file');
                    $('capResumeName').textContent = f.name;
                    $('capResumeIco').innerHTML = '<i class="bi bi-file-earmark-check-fill"></i>';
                } else {
                    box.classList.remove('has-file');
                    $('capResumeName').textContent = 'Choose resume file';
                    $('capResumeIco').innerHTML = '<i class="bi bi-file-earmark-pdf"></i>';
                }
            });

            /* Applied position -> department auto-pick (job openings match) */
            $('capPosition').addEventListener('change', function() {
                var opt = this.options[this.selectedIndex];
                var dept = opt ? opt.getAttribute('data-dept') : '';
                if (dept) {
                    $('capDept').value = dept;
                    if (window.jQuery && jQuery.fn.select2) $('#capDept').val(dept).trigger('change.select2');
                }
            });

            /* ---------------- Progress ---------------- */
            function refreshProgress() {
                var total = 0, filled = 0;
                document.querySelectorAll('#capForm [data-required]').forEach(function(el) {
                    total++;
                    if (String(el.value || '').trim()) filled++;
                });
                if (skills.length) { /* skills count as one bonus signal — not in required total */ }
                var pct = total ? Math.round(filled / total * 100) : 0;
                $('capPct').textContent = pct + '%';
                $('capProgressFill').style.width = pct + '%';
                $('capFilledCount').textContent = filled + ' of ' + total + ' fields filled';
            }

            $('capForm').addEventListener('input', refreshProgress);
            $('capForm').addEventListener('change', refreshProgress);

            /* ---------------- Submit (no blocking validation — all fields optional) ---------------- */
            $('capSubmitBtn').addEventListener('click', function() {

                var name = $('capName').value.trim();
                var position = $('capPosition').value || 'our open position';
                var ref = 'CAP-' + String(Date.now()).slice(-6);

                var application = {
                    ref: ref,
                    name: name,
                    email: $('capEmail').value.trim(),
                    mobile: $('capMobile').value.trim(),
                    dob: $('capDob').value,
                    gender: $('capGender').value,
                    location: $('capLocation').value.trim(),
                    qual: $('capQual').value,
                    totalExp: $('capTotalExp').value.trim(),
                    relExp: $('capRelExp').value.trim(),
                    company: $('capCompany').value.trim(),
                    desig: $('capDesig').value.trim(),
                    ctc: $('capCtc').value.trim(),
                    expCtc: $('capExpCtc').value.trim(),
                    notice: $('capNotice').value,
                    skills: skills.slice(),
                    resume: ($('capResume').files && $('capResume').files[0]) ? $('capResume').files[0].name : '',
                    position: position,
                    dept: $('capDept').value,
                    jobType: $('capJobType').value,
                    source: $('capSource').value,
                    referred: $('capReferred').value.trim(),
                    status: 'Applied',
                    submittedAt: new Date().toLocaleString()
                };

                /* HR side ku save — candidates pipeline integration ku ready */
                try {
                    var list = JSON.parse(localStorage.getItem('gh_cand_applications') || '[]');
                    list.unshift(application);
                    localStorage.setItem('gh_cand_applications', JSON.stringify(list));
                } catch (e) { /* private mode */ }

                /* Success screen */
                $('capRefNo').textContent = ref;
                $('capDoneMsg').innerHTML = 'Thank you' + (name ? ', <b>' + esc(name) + '</b>' : '') + '! Your application for <b>' + esc(position) + '</b> has been sent to our HR team. We will reach out to you' + (application.email ? ' at <b>' + esc(application.email) + '</b>' : '') + '.';
                $('capForm').style.display = 'none';
                document.querySelector('.cap-hero').style.display = 'none';
                $('capDone').classList.add('show');
                window.scrollTo({ top: 0, behavior: 'smooth' });

                /* In production this would POST here:
                   fetch('save-candidate-application.php', { method: 'POST', body: new FormData(form) }) */
            });

            /* ---------------- Init ---------------- */
            renderSkillSuggest();
            refreshProgress();
        })();
    </script>

</body>

</html>
