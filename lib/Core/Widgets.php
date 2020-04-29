<?php

namespace Axe\Core;

class Widgets
{

    public function __construct()
    {
        add_action('widgets_init', [$this, 'widgets_init']);
        add_action('widgets_init', [$this, 'unregister_default_widgets'], 11);
    }

    /**
     * Register Widget Areas
     */
    public function widgets_init()
    {
        // Main Sidebar
        register_sidebar(array(
            'name'          => 'Main Sidebar',
            'id'            => 'main-sidebar',
            'description'   => __('Widgets for Main Sidebar', 'axe'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        // Woo Commerce Listing Sidebar
        register_sidebar(array(
            'name'          => 'WooCommerce Listing Sidebar',
            'id'            => 'woo-sidebar',
            'description'   => __('Widgets for WooCommerce Sidebar', 'axe'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        // Woo Commerce Single Product Sidebar
        register_sidebar(array(
            'name'          => 'WooCommerce Single Product Sidebar',
            'id'            => 'woo-single-sidebar',
            'description'   => __('Widgets for WooCommerce Sidebar', 'axe'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        // Above Post
        register_sidebar(array(
            'name'          => 'Above Post',
            'id'            => 'above-post-widgets',
            'description'   => __('Widgets for Above the Post', 'axe'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        // Below Post
        register_sidebar(array(
            'name'          => 'Below Post',
            'id'            => 'below-post-widgets',
            'description'   => __('Widgets for Below the Post', 'axe'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        // Footer
        register_sidebar(array(
            'name'          => 'Footer',
            'id'            => 'footer-widgets',
            'description'   => __('Widgets for the Footer', 'axe'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));
    }

    public function unregister_default_widgets()
    {
        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Calendar');
        unregister_widget('WP_Widget_Links');
        unregister_widget('WP_Widget_Meta');
        unregister_widget('WP_Widget_Search');
        unregister_widget('WP_Widget_Recent_Comments');
        unregister_widget('WP_Widget_Tag_Cloud');
        unregister_widget('WP_Nav_Menu_Widget');
    }

}
