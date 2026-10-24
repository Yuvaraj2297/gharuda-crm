<?php
$lines = file('lead-dashboard.php');
for ($i = 1811; $i < count($lines); $i++) {
    if (strpos($lines[$i], '<?') !== false) {
        echo ($i + 1) . ': ' . $lines[$i];
    }
}
