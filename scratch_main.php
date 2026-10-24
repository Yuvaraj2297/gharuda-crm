<?php
$html = file_get_contents('scratch_rendered.html');
if (preg_match('/<main class="lead-dash-page">.*?<\/main>/s', $html, $m)) {
    $main = $m[0];
    file_put_contents('scratch_main.html', $main);
    echo "Extracted main: " . strlen($main) . " bytes\n";
} else {
    echo "Main not found\n";
}
