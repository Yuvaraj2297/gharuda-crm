<?php
$content = file_get_contents('lead-dashboard.php');
if (preg_match('/<style>(.*?)<\/style>/s', $content, $m)) {
    $css = trim($m[1]);
    file_put_contents('assets/css/lead-dashboard.css', $css);
    echo "Extracted CSS: " . strlen($css) . " bytes\n";
} else {
    echo "Style not found\n";
}
