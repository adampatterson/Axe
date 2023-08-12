<?php

namespace Axe\Setup;

class Theme
{

    public $default_header;
    public $default_header_image;
    public $default_background;
    public $default_logo;
    public $default_logo_class;
    public $default_logo_link_class;

    public function __construct()
    {
        $this->default_header = [
            'default-image'          => esc_url(__t() . 'assets/img/header-default.jpg'),
            'width'                  => 1920,
            'height'                 => 1280,
            'flex-height'            => false,
            'flex-width'             => false,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => true,
            'default-text-color'     => '000000',
            'wp-head-callback'       => '',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        ];

        $this->default_header_image = [
            'default-image' => [
                'url'           => '%s/assets/img/header-default.jpg',
                'thumbnail_url' => '%s/assets/img/header-default.jpg',
                'description'   => __('Default Header Image', 'axe'),
            ]
        ];

        $this->default_background = [
            'default-color'          => 'ffffff',
            'default-image'          => '',
            'default-repeat'         => 'repeat',
            'default-position-x'     => 'left',
            'default-position-y'     => 'top',
            'default-size'           => 'auto',
            'default-attachment'     => 'scroll',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => ''
        ];

        $this->default_logo = [
            'width'      => 250,
            'height'     => 250,
            'flex-width' => true,
        ];

        $this->default_logo_class      = 'img-fluid ';
        $this->default_logo_link_class = '';

        add_filter('next_posts_link_attributes', [$this, 'posts_link_attributes'], 10, 1);
        add_filter('previous_posts_link_attributes', [$this, 'posts_link_attributes'], 10, 1);

        if ( ! is_admin()) {
            // add_filter('the_title', [$this, 'markdown_title']);
            // add_filter('widget_title', [$this, 'markdown_title']);
            // add_filter('single_post_title', [$this, 'markdown_title'], 8);
        }

        // Don't load jQuery from WordPress
//        add_action('wp_enqueue_scripts', function () {
//            if (is_admin()) {
//                return;
//            }
//            wp_deregister_script('jquery');
//        });

        // Prevent File Modifications
        define('DISALLOW_FILE_EDIT', true);

        /*
        Content Width
        https://codex.wordpress.org/Content_Width
        */

        /**
         * Set the content width based on the theme's design and stylesheet
         */
        add_action('after_setup_theme', [$this, 'content_width'], 0);

        add_action('after_setup_theme', [$this, 'custom_header'], 0);


        // Clean up the head
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wp_shortlink_wp_head');

        // Enable support for HTML5 markup.
        add_theme_support('html5', array('comment-list', 'search-form', 'comment-form', 'gallery', 'caption'));

        // Execute shortcodes in widgets
        // add_filter('widget_text', 'do_shortcode');

        // Add RSS links to head
        add_theme_support('automatic-feed-links');

        // Add Editor Style
//        add_editor_style('editor-style.css');

        // Enable Post Thumbnails
        add_theme_support('post-thumbnails');

        // Adds theme support for wide images.
        add_theme_support('align-wide');

        add_theme_support('title-tag');

        // Add theme support for Custom Logo.
        add_theme_support('custom-logo', $this->default_logo);
        add_filter('get_custom_logo', [$this, 'change_logo_class']);

        // Enable Custom Backgrounds
        add_theme_support('custom-background', $this->default_background);

        // Add Post Formats Theme Support
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video'));

        // Remove Query Strings From Static Resources
//        add_filter('script_loader_src', [$this, 'remove_script_version'], 15, 1);
        add_filter('style_loader_src', [$this, 'remove_script_version'], 15, 1);

//        load_theme_textdomain( 'axe', get_template_directory() . '/languages' );
    }

    function custom_header()
    {
        // Enable Custom Headers
        add_theme_support('custom-header', $this->default_header);
        register_default_headers($this->default_header_image);
    }

    /**
     * @return string
     */
    function posts_link_attributes()
    {
        return 'class="page-link"';
    }

    /**
     * Converts markdown in post titles.
     *
     * @param $post_title
     *
     * @return string|string[]|null
     */
    function markdown_title($post_title)
    {
        $formatted_title = preg_replace(array('/(\*\*|__)(.*?)\1/', '/(\*|_)(.*?)\1/'), array('<strong>\2</strong>', '<em>\2</em>'), $post_title);

        return $formatted_title;
    }

    /**
     * Remove Query Strings From Static Resources
     */
    public function remove_script_version($src)
    {
        $parts = explode('?', $src);

        return $parts[0];
    }

    public function change_logo_class($html)
    {
//        $html = str_replace('custom-logo', $this->default_logo_class, $html);
        $html = str_replace('custom-logo-link', $this->default_logo_link_class, $html);

        return $html;
    }

    public function content_width()
    {
        global $content_width;

        if (has_post_format('gallery')) {
            $content_width = 1140;
        } else {
            $content_width = 1140;
        }
    }

}
