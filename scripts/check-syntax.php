<?php

declare(strict_types=1);

$roots = ['src', 'test', 'doc/examples'];
$files = [];

foreach ($roots as $root) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $files[] = $file->getPathname();
        }
    }
}

sort($files, SORT_STRING);

foreach ($files as $file) {
    $command = escapeshellarg(PHP_BINARY) . ' -n -l ' . escapeshellarg($file);
    exec($command, $output, $exitCode);

    if ($exitCode !== 0) {
        fwrite(STDERR, implode(PHP_EOL, $output) . PHP_EOL);
        exit($exitCode);
    }

    $output = [];
}

printf("Checked PHP syntax in %d files with PHP %s.%s", count($files), PHP_VERSION, PHP_EOL);
