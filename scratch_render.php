<?php
ob_start();
include 'lead-dashboard.php';
$html = ob_get_clean();
file_put_contents('scratch_ld.json', json_encode($ld, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
echo "Exported LD: " . strlen(json_encode($ld)) . " bytes\n";
