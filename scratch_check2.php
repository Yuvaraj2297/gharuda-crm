<?php
$lines = file('scratch_assembled.php');
for ($i = 0; $i < count($lines); $i++) {
    if (strpos($lines[$i], '<?') !== false) {
        echo ($i + 1) . ': ' . trim($lines[$i]) . "\n";
    }
}
