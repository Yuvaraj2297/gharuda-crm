<?php
// Consolidated into appointments.php (Callbacks view)
$query = !empty($_SERVER['QUERY_STRING']) ? '&' . $_SERVER['QUERY_STRING'] : '';
header('Location: appointments.php?view=callbacks' . $query);
exit;
