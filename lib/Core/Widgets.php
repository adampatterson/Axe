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
            'description'   => 'Widgets for Main Sidebar.',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        // Footer
        register_sidebar(array(
            'name'          => 'Footer',
            'id'            => 'footer-widgets',
            'description'   => 'Widgets for Footer.',
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
