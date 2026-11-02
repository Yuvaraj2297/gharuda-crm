<?php
$f = 'c:/xampp/htdocs/gharuda-crm/lead.php';
$content = file_get_contents($f);

$oldModal = <<<HTML
<!-- ===== Compose Email Modal (Send Email) ===== -->
<div class="modal fade" id="ldComposeEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            
            <div class="modal-header">
                <h5>Compose Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="text-uppercase">Send email using (SMTP)</label>
                    <select class="form-select" id="ldCeSmtp">
                        <option selected>USE SYSTEM SMTP ( info@GHRatechnology.com )</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Templates</label>
                    <select class="form-select" id="ldCeTemplate">
                        <option value="" selected>Non selected</option>
                        <option>Standard Quotation</option>
                        <option>Solar Installation</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Email To</label>
                    <input type="email" class="form-control" id="ldCeTo" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Email CC</label>
                    <input type="email" class="form-control" id="ldCeCc" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Email Subject</label>
                    <input type="text" class="form-control" id="ldCeSubject" placeholder="">
                </div>
                <div class="mb-3">
                    <label>Email Content</label>
                    <div class="ce-quill-wrap">
                        <div id="ldCeQuill"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Attachment</label>
                    <div class="ce-attach-row">
                        <input type="file" class="form-control" id="ldCeAttachment" multiple>
                        <button type="button" class="ce-add-file" id="ldCeAddFile" title="Add more attachments"><i class="bi bi-plus-lg"></i></button>
                    </div>
                    <div id="ldCeFileList" class="mt-2"></div>
                </div>
            </div>
            <div class="modal-footer border-top p-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="ldCeSend">send</button>
            </div>
        </div>
    </div>
</div>
HTML;

$newModal = <<<HTML
<!-- ===== Compose Email Modal (Send Email) ===== -->
<div class="modal fade" id="ldComposeEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-3 overflow-hidden">
            
            <div class="modal-header bg-white border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary" style="width:36px;height:36px;">
                        <i class="bi bi-envelope-plus"></i>
                    </span>
                    <h5 class="modal-title fw-bold m-0 fs-5 text-dark">Compose Email</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 bg-light-subtle">
                <div class="mb-3">
                    <label for="ldCeSmtp" class="form-label fw-semibold text-dark small mb-1">Send Email Using (SMTP)</label>
                    <select class="form-select rounded-2" id="ldCeSmtp">
                        <option selected>USE SYSTEM SMTP ( info@GHRatechnology.com )</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ldCeTemplate" class="form-label fw-semibold text-dark small mb-1">Templates</label>
                    <select class="form-select rounded-2" id="ldCeTemplate">
                        <option value="" selected>Non selected</option>
                        <option>Standard Quotation</option>
                        <option>Solar Installation</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ldCeTo" class="form-label fw-semibold text-dark small mb-1">Email To <span class="text-danger">*</span></label>
                    <input type="email" class="form-control rounded-2" id="ldCeTo" placeholder="recipient@example.com">
                </div>
                <div class="mb-3">
                    <label for="ldCeCc" class="form-label fw-semibold text-dark small mb-1">Email CC</label>
                    <input type="email" class="form-control rounded-2" id="ldCeCc" placeholder="cc@example.com">
                </div>
                <div class="mb-3">
                    <label for="ldCeSubject" class="form-label fw-semibold text-dark small mb-1">Email Subject <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-2" id="ldCeSubject" placeholder="Enter subject line...">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark small mb-1">Email Content</label>
                    <div class="ce-quill-wrap border rounded-2 overflow-hidden bg-white shadow-sm">
                        <div id="ldCeQuill" style="min-height: 160px;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark small mb-1">Attachment</label>
                    <div class="input-group">
                        <input type="file" class="form-control" id="ldCeAttachment" multiple>
                        <button type="button" class="btn btn-outline-primary fw-semibold d-inline-flex align-items-center gap-1" id="ldCeAddFile" title="Add another attachment">
                            <i class="bi bi-plus-lg"></i><span>Add File</span>
                        </button>
                    </div>
                    <div id="ldCeFileList" class="mt-2 d-flex flex-column gap-2"></div>
                </div>
            </div>
            <div class="modal-footer bg-white border-top py-3 px-4 d-flex justify-content-end gap-2">
                <button type="button" class="btn btn-outline-secondary px-3" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary px-4 fw-semibold d-inline-flex align-items-center gap-1" id="ldCeSend"><i class="bi bi-send"></i><span>Send Email</span></button>
            </div>
        </div>
    </div>
</div>
HTML;

$contentNorm = str_replace("\r\n", "\n", $content);
$oldModalNorm = str_replace("\r\n", "\n", $oldModal);
$newModalNorm = str_replace("\r\n", "\n", $newModal);

if (strpos($contentNorm, $oldModalNorm) !== false) {
    $contentNorm = str_replace($oldModalNorm, $newModalNorm, $contentNorm);
    file_put_contents($f, $contentNorm);
    echo "Replaced Compose Email Modal in lead.php\n";
} else {
    echo "Warning: Compose Email Modal not matched in lead.php\n";
}

