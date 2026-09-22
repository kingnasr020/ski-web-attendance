<?php

// KODE DEBUG TAMBAHAN - HAPUS SETELAH WEB JALAN
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// Penyesuaian: Menghapus /../ karena index.php sudah di public_html
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
// Penyesuaian: Menghapus /../ agar mengarah ke public_html/vendor
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
// Penyesuaian: Menghapus /../ agar mengarah ke public_html/bootstrap
$app = require_once __DIR__.'/bootstrap/app.php';

$app->handleRequest(Request::capture());