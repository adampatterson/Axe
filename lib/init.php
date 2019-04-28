<?php

if ( ! function_exists('axe_setup')) {
    function axe_setup()
    {
        /****************************************
         * Backend
         *****************************************/

        // Don't load jQuery from WordPress
        add_action('wp_enqueue_scripts', function () {
            if (is_admin()) {
                return;
            }
            wp_deregister_script('jquery');
        });

        // Prevent File Modifications
        define('DISALLOW_FILE_EDIT', true);

        /*
        Content Width
        https://codex.wordpress.org/Content_Width
        */
        if ( ! isset($content_width)) {
            $content_width = 1140;
        }

        // Clean up the head
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wp_shortlink_wp_head');

        // Register Widget Areas
        add_action('widgets_init', 'axe_widgets_init');
        add_action('widgets_init', 'unregister_default_widgets');

        // Enable support for HTML5 markup.
        add_theme_support('html5', array('comment-list', 'search-form', 'comment-form', 'gallery', 'caption'));

        // Execute shortcodes in widgets
        // add_filter('widget_text', 'do_shortcode');

        // Add RSS links to head
        add_theme_support('automatic-feed-links');

        // Add Editor Style
        add_editor_style('editor-style.css');

        // Don't update theme
        add_filter('http_request_args', 'axe_dont_update_theme', 5, 2);

        // Enable Post Thumbnails
        add_theme_support('post-thumbnails');

        // Adds theme support for wide images.
        add_theme_support('align-wide');

        add_theme_support('title-tag');

        // Enable Custom Headers
        // add_theme_support( 'custom-header' );

        // Enable Custom Backgrounds
        // add_theme_support( 'custom-background' );

        // Relocate the editor-style.css
        add_editor_style('assets/css/editor-style.css');

        // Remove Dashboard Meta Boxes
        add_action('wp_dashboard_setup', 'axe_remove_dashboard_widgets');

        add_theme_support('title-tag');

        // Change Admin Menu Order
        add_filter('custom_menu_order', 'axe_custom_menu_order');
        add_filter('menu_order', 'axe_custom_menu_order');

        // Hide Admin Areas that are not used
        add_action('admin_menu', 'axe_remove_menu_pages');

        // Remove default link for images
        add_action('admin_init', 'axe_imagelink_setup', 10);

        // Show Kitchen Sink in WYSIWYG Editor
        add_filter('tiny_mce_before_init', 'axe_unhide_kitchensink');

        /****************************************
         * Frontend
         *****************************************/

        // custom admin login logo
        add_action('login_head', 'custom_login_logo');

        // Add Post Formats Theme Support
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));

        // Remove Query Strings From Static Resources
        add_filter('script_loader_src', 'axe_remove_script_version', 15, 1);
        add_filter('style_loader_src', 'axe_remove_script_version', 15, 1);

        // Remove Read More Jump
        add_filter('the_content_more_link', 'axe_remove_more_jump_link');
        add_filter('excerpt_more', 'axe_excerpt');

        add_filter('get_avatar', 'add_gravatar_class');

        if (function_exists('wp_new_excerpt')) {
            acf_add_options_page();
            acf_add_options_sub_page('General Settings');
        }

        if ( ! is_admin()) {
            add_filter('the_title', 'markdown_title');
            add_filter('widget_title', 'markdown_title');
            add_filter('single_post_title', 'markdown_title', 8);
        }

    }
} // axe_setup

add_action('after_setup_theme', 'axe_setup');

