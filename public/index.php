<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
include '../xhprof/xhprof_lib/config.php';
include '../xhprof/xhprof_lib/defaults.php';
include '../xhprof/xhprof_lib/utils/xhprof_runs.php';
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/
xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();
$xhprof_data = xhprof_disable();
$xhprof_runs = new XHProfRuns_Default();
$run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_testing");
$link = "http://" . $_SERVER['HTTP_HOST'] . "/includes/ExtProcs/debug/xhprof-0.9.2/xhprof_html/index.php?run={$run_id}&source=xhprof_testing\n";
$kernel->terminate($request, $response);

