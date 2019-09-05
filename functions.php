<?php
require_once('lib/Helpers.php');

// For composer dependencies
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) :
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

if (class_exists('Axe\\Init')) :
    Axe\Init::register_services();
endif;
