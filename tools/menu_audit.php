<?php
/**
 * Simple audit script to compare PHP files in the project with entries in config/menu.php.
 * It reports:
 *   1. Files that exist on disk but are NOT referenced in the menu.
 *   2. Menu entries that point to non‑existent files.
 */

$projectRoot = __DIR__ . '/..'; // project base folder

// 1. Gather all PHP filenames (relative to project root)
$phpFiles = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($projectRoot));
foreach ($iterator as $file) {
    if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
        $phpFiles[] = $file->getFilename(); // use just basename for comparison
    }
}
$phpFiles = array_unique($phpFiles);

// 2. Load menu configuration and flatten all URLs
$menu = include $projectRoot . '/config/menu.php';
$menuUrls = [];
$flatten = function(array $items) use (&$flatten, &$menuUrls) {
    foreach ($items as $item) {
        if (isset($item['url'])) {
            // keep only .php targets (ignore anchors like #leadsSubmenu)
            if (preg_match('/\.php$/', $item['url'])) {
                $menuUrls[] = basename($item['url']);
            }
        }
        if (!empty($item['children'])) {
            $flatten($item['children']);
        }
    }
};
$flatten($menu);
$menuUrls = array_unique($menuUrls);

// 3. Compute differences
$missingInMenu = array_diff($phpFiles, $menuUrls); // files on disk not referenced
$missingFiles = array_diff($menuUrls, $phpFiles); // menu entries pointing to non‑existent files

// 4. Output report
echo "=== CRM Navigation Audit Report ===\n\n";

echo "Total PHP files found: " . count($phpFiles) . "\n";
echo "Total menu URLs: " . count($menuUrls) . "\n\n";

if ($missingInMenu) {
    echo "Files NOT present in menu (" . count($missingInMenu) . "):\n";
    foreach ($missingInMenu as $f) {
        echo "  - $f\n";
    }
    echo "\n";
} else {
    echo "All PHP files are referenced in the menu.\n\n";
}

if ($missingFiles) {
    echo "Menu entries pointing to missing files (" . count($missingFiles) . "):\n";
    foreach ($missingFiles as $f) {
        echo "  - $f\n";
    }
    echo "\n";
} else {
    echo "All menu entries point to existing files.\n\n";
}
?>
