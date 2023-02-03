<?php
require_once('lib/Helpers.php');

// For composer dependencies
if (file_exists(__DIR__.'/vendor/autoload.php')) :
    require_once __DIR__.'/vendor/autoload.php';
endif;

if (class_exists('Axe\Init')) :
    Axe\Init::register_services();
endif;

setBaseDataPath();
