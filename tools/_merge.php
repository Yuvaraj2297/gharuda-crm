<?php
$f = 'c:/xampp/htdocs/gharuda-crm/header.php';
copy($f, $f . '.bak-before-menu-merge');
$s = file_get_contents($f);

function sec($s, $n) {
    preg_match('/^( *)<div class="panel-section" data-panel="' . preg_quote($n, '/') . '">\r?\n(.*?)^\1<\/div>\r?\n/ms', $s, $m, PREG_OFFSET_CAPTURE);
    if (!$m) die("section not found: $n\n");
    return $m;
}
function body($s, $n)         { return sec($s, $n)[2][0]; }
function setBody(&$s, $n, $b) { $m = sec($s, $n); $s = substr_replace($s, $b, $m[2][1], strlen($m[2][0])); }
function dropSec(&$s, $n)     { $m = sec($s, $n); $s = substr_replace($s, '', $m[0][1], strlen($m[0][0])); }
function strip($b)            { return preg_replace('/(<div class="nav-label">)\d+\.\s*/', '$1', $b); }

function moveAnchor(&$s, $href, $to, $sections) {
    foreach ($sections as $n) {
        $b = body($s, $n);
        if (preg_match('/^ *<a [^>]*href="' . preg_quote($href, '/') . '"[^>]*>.*?<\/a>\r?\n/ms', $b, $m)) {
            setBody($s, $n, str_replace($m[0], '', $b));
            setBody($s, $to, body($s, $to) . $m[0]);
            return;
        }
    }
    echo "anchor not found: $href\n";
}

// 1-4: merge sections
setBody($s, 'CRM', body($s, 'CRM') . strip(body($s, 'Customers')) . strip(body($s, 'Target')));
dropSec($s, 'Customers'); dropSec($s, 'Target');

setBody($s, 'Support', body($s, 'Support') . strip(body($s, 'Communications')));
dropSec($s, 'Communications');

$inv = str_replace('<div class="nav-label">Inventory &amp; Procurement</div>', '<div class="nav-label">05. Inventory &amp; Procurement</div>', strip(body($s, 'Inventory')));
setBody($s, 'Expenses', $inv . strip(body($s, 'Expenses')));
dropSec($s, 'Inventory');

setBody($s, 'Settings', body($s, 'Settings') . strip(body($s, 'Master')));
dropSec($s, 'Master');

// 5: move report links next to their module
$all = ['Reports'];
moveAnchor($s, 'projects-report.php', 'Project Management', $all);
moveAnchor($s, 'projectwise-daily-task-report.php', 'Project Management', $all);
moveAnchor($s, 'ticket-reports.php', 'Support', $all);
moveAnchor($s, 'staff-visting-report.php', 'Staff', $all);
moveAnchor($s, 'petty-cash-report.php', 'Expenses', $all);

// 6: remove rail buttons of merged sections
foreach (['Customers', 'Target', 'Communications', 'Inventory', 'Master'] as $n) {
    $s = preg_replace('/^[ \t]*<!--[^\n]*-->\r?\n[ \t]*<button[^>]*data-panel-target="' . preg_quote($n, '/') . '"[^>]*>.*?<\/button>\r?\n(\r?\n)?/ms', '', $s, 1, $c);
    if (!$c) echo "rail button not removed: $n\n";
}

// 7: renumber / rename
$map = [
 '02. Leads &amp; Sales'          => '02. Leads, Customers &amp; Sales',
 '04. Meetings &amp; Activities'  => '03. Meetings &amp; Activities',
 '05. Projects &amp; Tasks'       => '04. Projects &amp; Tasks',
 '07. Billing &amp; Finance'      => '05. Inventory &amp; Finance',
 '08. Support &amp; Helpdesk'     => '06. Support &amp; Communication',
 '10. Staff &amp; Field Force'    => '07. Staff &amp; Field Force',
 '12. Reports &amp; Analytics'    => '08. Reports &amp; Analytics',
 '14. Administration &amp; Settings' => '09. Administration &amp; Masters',
];
$s = str_replace(array_keys($map), array_values($map), $s);

file_put_contents($f, $s);
echo "done\n";

