<?php

require_once('lib/Helpers.php');

// For composer dependencies
if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) :
    wp_die("Run <code>composer install</code>");
endif;

require_once $composer;

if (class_exists('Axe\Init')) :
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
else:
    wp_die("Create a .env file in the root of the theme directory");
endif;


Axe\Init::register_services();

// Loads the date from the core or child theme.
setBaseDataPath();

add_action('admin_bar_menu', 'add_toolbar_items', 200);
function add_toolbar_items($admin_bar)
{
    $admin_bar->add_menu([
        'id'     => 'options',
        'parent' => 'site-name',
        'title'  => 'Options',
        'href'   => admin_url().'admin.php?page=acf-options-general-settings',
        'meta'   => [
            'title' => __('Options'),
            'class' => 'my_menu_item_class',
        ],
    ]);
}
