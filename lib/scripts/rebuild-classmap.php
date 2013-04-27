<?php
if(php_sapi_name() != 'cli' || !empty($_SERVER['REMOTE_ADDR'])) {
	die("This script can only be run on the command line.");
}
define("ROOT_PATH", realpath(__DIR__ . "/../../")."/");
define("TARGET_PATH", ROOT_PATH);

if (!file_exists(ROOT_PATH . "lib/AutoLoader.php")) {
	echo "deployment does not support auto loading. Skipping...";
	exit;
}

require_once ROOT_PATH . "lib/AutoLoader.php";

$autoLoader = AutoLoader::getInstance(ROOT_PATH, true);
$autoLoader->expireCache();
$autoLoader->ignore(realpath(__DIR__ . '/../../')."/app/templates")
	->ignore(realpath(__DIR__ . '/../../')."/docs")
	->ignore(realpath(__DIR__ . '/../../')."/www");
$autoLoader->init();

// correct the generated file paths
$classmap = file_get_contents($autoLoader->getCacheLocation());
$classmap = str_replace(ROOT_PATH, TARGET_PATH, $classmap);

if (!file_put_contents($autoLoader->getCacheLocation(), $classmap)) {
	echo "unable to write class map cache!";
	exit(1);
} else {
	echo "new class map cache generated at " . $autoLoader->getCacheLocation()."\n";
	exit;
}