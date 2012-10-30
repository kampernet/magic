<?php
require_once __DIR__ . "/lib/AutoLoader.php";

$autoLoader = AutoLoader::getInstance(__DIR__ . "/", true);
$autoLoader->ignore(__DIR__ . "/app/templates");
$autoLoader->init();
