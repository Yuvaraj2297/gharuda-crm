<?php
$lines = file('c:/xampp/htdocs/gharuda-crm/lead.php');
for ($i = 0; $i < 180; $i++) {
    if (isset($lines[$i])) {
        echo ($i + 1) . ': ' . $lines[$i];
    }
}

