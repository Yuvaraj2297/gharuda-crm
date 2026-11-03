<?php
$qs = !empty($_SERVER['QUERY_STRING']) ? '&' . $_SERVER['QUERY_STRING'] : '';
header("Location: tasks-list.php?view=daily-report" . $qs);
exit;
