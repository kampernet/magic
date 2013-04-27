<?php
require_once __DIR__ . "/lib/AutoLoader.php";

$autoLoader = AutoLoader::getInstance(__DIR__ . "/", false);
$autoLoader->ignore(__DIR__ . "/app/templates")->ignore(__DIR__."/docs")->ignore(__DIR__."/www");
$autoLoader->init();
