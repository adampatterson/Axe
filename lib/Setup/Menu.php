<?php

namespace Axe\Setup;

class Menu
{

    public function __construct()
    {
        // wp menus
        add_theme_support('menus');

        // Register menus
        register_nav_menus(array(
            'main-menu'    => 'Main Menu',
            'footer-links' => 'Footer Links'
        ));

        add_filter('nav_menu_css_class', [$this, 'add_classes_on_li'], 1, 3);
        add_filter('wp_nav_menu', [$this, 'add_classes_on_link']);
    }

    public function add_classes_on_li($classes, $item, $args)
    {
        $classes[] = 'nav-item';

        return $classes;
    }

    public function add_classes_on_link($ulclass)
    {
        return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
    }

}
