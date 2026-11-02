<?php
$f = 'c:/xampp/htdocs/gharuda-crm/assets/js/lead.js';
$js = file_get_contents($f);

$oldJs = <<<JS
            /* Attachment: + button -> add another file input row */
            var addFileBtn = document.getElementById('ldCeAddFile');
            if (addFileBtn && fileList) {
                addFileBtn.addEventListener('click', function() {
                    var row = document.createElement('div');
                    row.className = 'ce-attach-row mt-2';
                    row.innerHTML = '<input type="file" class="form-control" multiple>' +
                        '<button type="button" class="ce-add-file" style="background:#dc2626;" title="Remove"><i class="bi bi-x-lg"></i></button>';
                    row.querySelector('button').addEventListener('click', function() {
                        row.remove();
                    });
                    fileList.appendChild(row);
                });
            }
JS;

$newJs = <<<JS
            /* Attachment: + button -> add another file input row */
            var addFileBtn = document.getElementById('ldCeAddFile');
            if (addFileBtn && fileList) {
                addFileBtn.addEventListener('click', function() {
                    var row = document.createElement('div');
                    row.className = 'input-group';
                    row.innerHTML = '<input type="file" class="form-control" multiple>' +
                        '<button type="button" class="btn btn-outline-danger d-inline-flex align-items-center gap-1" title="Remove"><i class="bi bi-trash"></i><span>Remove</span></button>';
                    row.querySelector('button').addEventListener('click', function() {
                        row.remove();
                    });
                    fileList.appendChild(row);
                });
            }
JS;

$jsNorm = str_replace("\r\n", "\n", $js);
$oldJsNorm = str_replace("\r\n", "\n", $oldJs);
$newJsNorm = str_replace("\r\n", "\n", $newJs);

if (strpos($jsNorm, $oldJsNorm) !== false) {
    $jsNorm = str_replace($oldJsNorm, $newJsNorm, $jsNorm);
    file_put_contents($f, $jsNorm);
    echo "Updated ldCeAddFile in lead.js\n";
} else {
    echo "Warning: ldCeAddFile not matched in lead.js\n";
}

