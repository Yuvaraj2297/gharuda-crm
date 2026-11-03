<?php
// Consolidated into appointments.php (Past Meetings view)
$query = !empty($_SERVER['QUERY_STRING']) ? '&' . $_SERVER['QUERY_STRING'] : '';
header('Location: appointments.php?view=past' . $query);
exit;
