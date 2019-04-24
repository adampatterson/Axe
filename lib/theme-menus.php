<?php
// wp menus
add_theme_support( 'menus' );

// Register menus
register_nav_menus( array(
	'main-menu'    => 'Main Menu',
	'footer-links' => 'Footer Links'
) );

// Used to generate Bootstrap 4 menus
add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);
function add_classes_on_li($classes, $item, $args)
{
    $classes[] = 'nav-item';

    return $classes;
}

add_filter('wp_nav_menu', 'add_classes_on_a');
function add_classes_on_a($ulclass)
{
    return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
