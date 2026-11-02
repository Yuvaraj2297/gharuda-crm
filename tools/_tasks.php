<?php
$f = 'c:/xampp/htdocs/gharuda-crm/header.php';
$s = file_get_contents($f);
$n = preg_replace('/[ \t]*<a [^>]*href="task-overview\.php"[^>]*>.*?<\/a>\r?\n/s', '', $s, 1, $c1);
$n = str_replace('data-active-pages="tasks-list.php,task-create.php"', 'data-active-pages="tasks-list.php,task-create.php,task-overview.php"', $n, $c2);
$n = preg_replace('/(href="tasks-list\.php">\s*<i class="[^"]*"><\/i> <span>)Tasks List(<\/span>)/', '$1Tasks$2', $n, 1, $c3);
file_put_contents($f, $n);
echo "removed kanban: $c1, active-pages: $c2, renamed: $c3\n";

