<?php 
include 'header.php';

// Extract GET params or default to sample candidate
$ref = isset($_GET['ref']) ? htmlspecialchars($_GET['ref']) : 'GHR/2026/OFF-101';
$candName = isset($_GET['candidate']) ? htmlspecialchars($_GET['candidate']) : 'Saravanan';
$jobTitle = isset($_GET['job']) ? htmlspecialchars($_GET['job']) : 'Junior Developer';
$dept = isset($_GET['dept']) ? htmlspecialchars($_GET['dept']) : 'Software Development Department';
$ctc = isset($_GET['ctc']) ? htmlspecialchars($_GET['ctc']) : '₹2,40,000 / yr';
$gross = isset($_GET['gross']) ? htmlspecialchars($_GET['gross']) : '₹20,000 / mo';
$basic = isset($_GET['basic']) ? htmlspecialchars($_GET['basic']) : '₹10,000';
$hra = isset($_GET['hra']) ? htmlspecialchars($_GET['hra']) : '₹5,000';
$allowance = isset($_GET['allowance']) ? htmlspecialchars($_GET['allowance']) : '₹5,000';
$joining = isset($_GET['joining']) ? htmlspecialchars($_GET['joining']) : '01-Oct-2026';
$expiry = isset($_GET['expiry']) ? htmlspecialchars($_GET['expiry']) : '28-Sep-2026';
$status = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : 'Accepted';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : 'saravanan@example.com';
$phone = isset($_GET['phone']) ? htmlspecialchars($_GET['phone']) : '+91 98765 43210';
?>

<style>
    .offer-page-paper {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 48px;
        font-family: 'Inter', 'Manrope', 'Segoe UI', sans-serif;
        color: #1e293b;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        max-width: 920px;
        margin: 0 auto;
    }
    .pdf-divider {
        height: 3px;
        background: linear-gradient(90deg, #087a24 0%, #16a34a 100%);
        border: none;
        margin: 20px 0 28px 0;
    }
    .salary-table th {
        background: #f8fafc;
        color: #475569;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 700;
    }
    .salary-table td {
        font-size: 13.5px;
    }

    @media print {
        header, .side-panel, .icon-rail, .offer-action-bar {
            display: none !important;
        }
        .offer-page-paper {
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            max-width: 100% !important;
        }
    }
</style>

<!-- Top Action & Navigation Bar -->
<div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4 offer-action-bar">
    <div>
        <nav class="d-flex align-items-center gap-2 text-neutral" style="font-size:13px;">
            <a href="offer-management.php" class="text-decoration-none text-muted"><i class="bi bi-file-earmark-check me-1"></i> Offer Letters</a>
            <i class="bi bi-chevron-right"></i>
            <span class="fw-bold text-dark">Document View (<?= $ref ?>)</span>
        </nav>
        <h1 class="font-display fw-bold mb-0 mt-1" style="font-size:1.6rem;">Employment Offer Letter Document</h1>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <a href="offer-management.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Offer Letters
        </a>
        <button type="button" class="btn btn-outline-success fw-semibold" id="btnTopWa" style="color:#25D366; border-color:#25D366;">
            <i class="bi bi-whatsapp me-1"></i> Send via WhatsApp
        </button>
        <button type="button" class="btn btn-outline-primary fw-semibold" id="btnTopEmail">
            <i class="bi bi-envelope-at-fill me-1"></i> Send via Email
        </button>
        <button type="button" class="btn btn-outline-secondary" onclick="window.print();">
            <i class="bi bi-printer me-1"></i> Print
        </button>
        <button type="button" class="btn btn-outline-dark" onclick="alert('Downloading official signed Offer Letter PDF...');">
            <i class="bi bi-download me-1"></i> Download PDF
        </button>
        <a href="employee-create.php?prefill=<?= urlencode($candName) ?>" class="btn btn-primary" style="background:var(--primary, #087a24); border-color:var(--primary, #087a24);">
            <i class="bi bi-person-plus-fill me-1"></i> Fast-Track Onboard
        </a>
    </div>
</div>

<!-- Full Page Document View -->
<div class="offer-page-paper mb-5">
    
    <!-- Letter Header -->
    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
        <div>
            <h2 class="fw-extrabold text-success mb-1" style="letter-spacing:-0.5px; font-weight:800; color:var(--primary, #087a24)!important;">GHARUDA INFOTECH PRIVATE LIMITED</h2>
            <div class="fw-semibold text-dark" style="font-size:13px;">Software Solutions & Technology Services</div>
            <div class="text-muted" style="font-size:12px;">IT Park Tower, Phase 2, OMR Road, Chennai - 600096, Tamil Nadu</div>
            <div class="text-muted" style="font-size:12px;">Email: hr@gharudainfotech.com • Phone: +91 44 2841 9000</div>
        </div>
        <div class="text-end">
            <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-3 py-2" style="font-size:12.5px;">STATUS: <?= strtoupper($status) ?></span>
            <div class="text-muted mt-2" style="font-size:12.5px;">Date: <strong class="text-dark"><?= date('d-M-Y') ?></strong></div>
            <div class="text-muted" style="font-size:12.5px;">Ref No: <strong class="text-dark"><?= $ref ?></strong></div>
        </div>
    </div>

    <hr class="pdf-divider">

    <!-- Candidate Recipient Block -->
    <div class="p-3 bg-light rounded-3 mb-4 border">
        <div class="row g-2" style="font-size:13px;">
            <div class="col-md-6"><strong>Candidate Name:</strong> <span class="fw-bold text-dark me-2"><?= $candName ?></span></div>
            <div class="col-md-6"><strong>Email Address:</strong> <span class="text-dark"><?= $email ?></span></div>
            <div class="col-md-6"><strong>Contact Phone:</strong> <span class="text-dark"><?= $phone ?></span></div>
            <div class="col-md-6"><strong>Work Location:</strong> <span class="text-dark">Chennai HQ</span></div>
        </div>
    </div>

    <!-- Subject -->
    <div class="mb-4 p-3 bg-white border-start border-4 border-success rounded-2 shadow-sm">
        <strong class="text-dark" style="font-size:14px;">Subject: Letter of Appointment & Employment Offer for the position of <span class="text-success fw-bold"><?= $jobTitle ?></span></strong>
    </div>

    <!-- Salutation & Main Letter Body (Exact User Template Format) -->
    <div style="font-size:15px; line-height:1.9; color:#1e293b;" class="mb-5 p-4 bg-white border rounded-3 shadow-sm">
        <p class="mb-4">Dear <strong><?= $candName ?></strong>,</p>
        
        <p class="mb-4">
            We are pleased to inform you that you have been appointed as a <strong><?= $jobTitle ?></strong> at <strong>GHARUDA INFOTECH PRIVATE LIMITED</strong>.
        </p>
        
        <p class="mb-3 fw-semibold text-dark">
            Please find the terms and conditions of your employment below:
        </p>

        <ul class="mb-4 ps-4" style="line-height:2.0; font-size:14.5px;">
            <li class="mb-2">You will receive a monthly salary of <strong><?= $gross ?></strong> on the company's payroll.</li>
            <li class="mb-2">You will be eligible for a salary increment once every 12 months, based on your performance, work quality, and professional attitude.</li>
            <li class="mb-2">The first three months of your employment will be considered as a probation period.</li>
            <li class="mb-2">You agree to serve the company for a minimum of two years from your start date.</li>
            <li class="mb-2">If you leave before completing two years without a valid reason, the company will not issue an experience certificate.</li>
        </ul>

        <p class="mb-4">
            Kindly reply to this email confirming your acceptance of the above terms and conditions.
        </p>

        <p class="mb-5">
            We look forward to your contribution and wish you a successful career with us.
        </p>

        <div class="pt-3 border-top">
            <div class="fw-bold text-dark" style="font-size:14px;">Warm regards,</div>
            <div class="fw-bold text-dark" style="font-size:14px;">HR Department</div>
            <div class="fw-bold text-success" style="font-size:14px;">GHARUDA INFOTECH PRIVATE LIMITED</div>
        </div>
    </div>


    <!-- Signature & Acceptance Block -->
    <div class="row pt-4 mt-5 border-top">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="fw-bold text-dark" style="font-size:13.5px;">Authorized Signature</div>
            <div class="mt-4 pt-2 d-flex align-items-center gap-3">
                <img src="./assets/img/profile-1.jpg" class="rounded-circle" style="width:42px;height:42px;border:2px solid var(--primary, #087a24);" alt="HR Head">
                <div>
                    <strong class="text-dark" style="font-size:13.5px;">HR Manager / Talent Acquisition</strong>
                    <div class="text-muted" style="font-size:12px;">GHARUDA INFOTECH PRIVATE LIMITED</div>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-md-end">
            <div class="fw-bold text-dark" style="font-size:13.5px;">Candidate Acceptance Signature</div>
            <div class="mt-4 pt-3 text-muted" style="font-size:12.5px;">
                _______________________________<br>
                <strong class="text-dark"><?= $candName ?></strong> (Signature & Date)
            </div>
        </div>
    </div>

</div>

<!-- Modal: Send Offer Modal in Document View Page -->
<div class="modal fade" id="sendOfferDocModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius:16px;">
            <div class="modal-header border-0 pb-0" style="background:#f8fafc;">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center flex-shrink-0 text-white fw-bold" style="width:44px;height:44px;background:var(--primary, #087a24);font-size:18px;">
                        <i class="bi bi-send-fill"></i>
                    </div>
                    <div>
                        <h4 class="modal-title fw-bold text-dark mb-0">Send Employment Offer Letter</h4>
                        <div class="text-muted" style="font-size:13px;">Dispatch document link directly to candidate</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="card p-3 bg-light border-0 mb-3" style="border-radius:12px;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div>
                            <h6 class="fw-bold text-dark mb-0"><?= $candName ?></h6>
                            <div class="text-muted" style="font-size:12px;"><?= $jobTitle ?> • <?= $dept ?></div>
                        </div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle fw-bold px-2 py-1" style="font-size:11px;"><?= $ref ?></span>
                    </div>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-pills nav-justified mb-3 p-1 bg-light rounded-3" id="docSendTabs" role="tablist" style="font-size:13px;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-semibold" id="doc-wa-tab" data-bs-toggle="tab" data-bs-target="#doc-wa-pane" type="button" role="tab"><i class="bi bi-whatsapp me-1 text-success"></i> WhatsApp</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-semibold" id="doc-email-tab" data-bs-toggle="tab" data-bs-target="#doc-email-pane" type="button" role="tab"><i class="bi bi-envelope-fill me-1 text-primary"></i> Email</button>
                    </li>
                </ul>

                <div class="tab-content" id="docSendTabContent">
                    <div class="tab-pane fade show active" id="doc-wa-pane" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;"><i class="bi bi-whatsapp text-success me-1"></i> WhatsApp Phone Number</label>
                            <input type="text" class="form-control" id="docWaPhone" value="<?= $phone ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">WhatsApp Message Payload</label>
                            <textarea class="form-control bg-light" id="docWaMsg" rows="6" style="font-size:12.5px;"></textarea>
                        </div>
                        <button type="button" class="btn btn-success w-100 fw-bold" id="btnDocWaSend" style="background:#25D366; border-color:#25D366;">
                            <i class="bi bi-whatsapp me-1"></i> Open WhatsApp Web & Send
                        </button>
                    </div>

                    <div class="tab-pane fade" id="doc-email-pane" role="tabpanel">
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;"><i class="bi bi-envelope-at-fill text-primary me-1"></i> Candidate Email Address</label>
                            <input type="email" class="form-control" id="docEmailAddr" value="<?= $email ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Subject Line</label>
                            <input type="text" class="form-control" id="docEmailSubj" value="Letter of Intent & Formal Offer of Employment - <?= $jobTitle ?> (<?= $ref ?>)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="font-size:13px;">Email Message Body</label>
                            <textarea class="form-control bg-light" id="docEmailBody" rows="5" style="font-size:12.5px;"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary w-100 fw-bold" id="btnDocEmailSend">
                            <i class="bi bi-envelope-check-fill me-1"></i> Launch Email Client (Mailto)
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
window.OFFER_LETTER_CONFIG = {
    candName: <?= json_encode($candName) ?>,
    jobTitle: <?= json_encode($jobTitle) ?>,
    gross: <?= json_encode($gross) ?>
};
</script>
<script src="./assets/js/pages/offer-letter-view.js?v=<?php echo time(); ?>"></script>

<?php include 'footer.php'; ?>
