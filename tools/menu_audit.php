<?php
/**
 * Sidebar audit: compares links in header.php's side panel with real .php pages.
 *   php tools/menu_audit.php
 */
$root = dirname(__DIR__);
$html = file_get_contents($root . '/header.php');

// Only the sliding side panel (the real menu)
$start = strpos($html, 'id="sidePanel"');
$end   = strpos($html, 'sb-backdrop');
$panel = substr($html, $start, $end - $start);

preg_match_all('/<a[^>]+href="([^"#]+\.php)"/i', $panel, $m);
$links = $m[1];
$counts = array_count_values($links);

$pages = [];
foreach (glob($root . '/*.php') as $f) { $pages[] = basename($f); }

$ignore = ['header.php','footer.php','index.php','login.php'];

$broken   = array_values(array_filter(array_unique($links), fn($l) => !in_array($l, $pages)));
$orphans  = array_values(array_diff($pages, array_unique($links), $ignore));
$dupes    = array_keys(array_filter($counts, fn($c) => $c > 1));

echo "Menu links: " . count($links) . " (unique " . count($counts) . ")\n";
echo "Pages on disk: " . count($pages) . "\n\n";
echo "BROKEN LINKS (menu -> missing file): " . count($broken) . "\n";
foreach ($broken as $b) echo "  - $b\n";
echo "\nDUPLICATE LINKS: " . count($dupes) . "\n";
foreach ($dupes as $d) echo "  - $d\n";
echo "\nPAGES NOT IN MENU (orphans): " . count($orphans) . "\n";
foreach ($orphans as $o) echo "  - $o\n";
