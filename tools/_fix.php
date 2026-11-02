<?php
$f = 'c:/xampp/htdocs/gharuda-crm/header.php';
$s = file_get_contents($f);
$n = preg_replace('/[ \t]*<a [^>]*href="(permission-modules|sla-policies-severity)\.php"[^>]*>.*?<\/a>\r?\n/s', '', $s, -1, $c);
file_put_contents($f, $n);
echo "removed: $c\n";

