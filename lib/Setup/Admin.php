<?php

namespace Axe\Setup;

class Admin
{

    public function __construct()
    {
        if ( ! function_exists('enable_admin_bar')) {

            show_admin_bar(true);
        }

        // Add Editor Style
        add_editor_style('editor-style.css');

        // Relocate the editor-style.css
        add_editor_style('assets/css/editor-style.css');

        // Show Kitchen Sink in WYSIWYG Editor
        add_filter('tiny_mce_before_init', [$this, 'axe_unhide_kitchensink']);

        // Remove Dashboard Meta Boxes
        add_action('wp_dashboard_setup', [$this, 'axe_remove_dashboard_widgets']);

        // Change Admin Menu Order
        add_filter('custom_menu_order', [$this, 'axe_custom_menu_order']);
        add_filter('menu_order', [$this, 'axe_custom_menu_order']);

        // Hide Admin Areas that are not used
        add_action('admin_menu', [$this, 'axe_remove_menu_pages']);

        // Remove default link for images
        add_action('admin_init', [$this, 'axe_imagelink_setup'], 10);

        // Remove Read More Jump
        add_filter('the_content_more_link', [$this, 'axe_remove_more_jump_link']);
        add_filter('excerpt_more', [$this, 'axe_excerpt']);

        add_filter('get_avatar', [$this, 'add_gravatar_class']);

        // custom admin login logo
        add_action('login_head', [$this, 'custom_login_logo']);

        // Don't update theme
        add_filter('http_request_args', [$this, 'axe_dont_update_theme'], 5, 2);

        add_filter('user_contactmethods', [$this, 'axe_contactmethods']);
    }

    /**
     * Show Kitchen Sink in WYSIWYG Editor
     */
    public function axe_unhide_kitchensink($args)
    {
        $args['wordpress_adv_hidden'] = false;

        return $args;
    }

    /**
     * Remove Dashboard Meta Boxes
     */
    public function axe_remove_dashboard_widgets()
    {
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    }

    /**
     * Change Admin Menu Order
     */
    public function axe_custom_menu_order($menu_ord)
    {
        if ( ! $menu_ord) {
            return true;
        }

        return array(
            'index.php', // Dashboard
            'separator1', // First separator
            'edit.php?post_type=page', // Pages
            'edit.php', // Posts
            'upload.php', // Media
            'gf_edit_forms', // Gravity Forms
            'genesis', // Genesis
            'edit-comments.php', // Comments
            'separator2', // Second separator
            'themes.php', // Appearance
            'plugins.php', // Plugins
            'users.php', // Users
            'tools.php', // Tools
            'options-general.php', // Settings
            'separator-last', // Last separator
        );
    }

    /**
     * Hide Admin Areas that are not used
     */
    public function axe_remove_menu_pages()
    {
        remove_menu_page('link-manager.php');
    }

    /**
     * Remove default link for images
     */
    public function axe_imagelink_setup()
    {
        $image_set = get_option('image_default_link_type');
        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
    }

    /**
     * Remove Read More Jump
     *
     * @param $link
     *
     * @return mixed
     */
    public function axe_remove_more_jump_link($link)
    {
        $offset = strpos($link, '#more-');
        if ($offset) {
            $end = strpos($link, '"', $offset);
        }
        if ($end) {
            $link = substr_replace($link, '', $offset, $end - $offset);
        }

        return $link;
    }

    /**
     * @return string
     */
    public function axe_excerpt()
    {
        return '...';
    }

    /**
     * @param $class
     *
     * @return mixed
     */
    function add_gravatar_class($class)
    {
        $class = str_replace("class='avatar", "class='avatar", $class);

        return $class;
    }

    public function custom_login_logo()
    {
//        var_dump('axe.adminlogo');
//        echo '<style type="text/css">
//        h1 a { background-image: url(' . __t() . '/assets/img/adminlogo.png) !important; height: auto;}
//        body.login{ background: #fff; }
//        </style>';
    }

    /**
     * Don't Update Theme
     *
     * @param array $r , request arguments
     * @param string $url , request url
     *
     * @return array request arguments
     * @since 1.0.0
     *
     * If there is a theme in the repo with the same name,
     * this prevents WP from prompting an update.
     *
     * @author Mark Jaquith
     * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
     *
     */
    public function axe_dont_update_theme($r, $url)
    {
        if (0 !== strpos($url, 'http://api.wordpress.org/themes/update-check')) {
            return $r;
        } // Not a theme update request. Bail immediately.
        $themes = unserialize($r['body']['themes']);
        unset($themes[get_option('template')]);
        unset($themes[get_option('stylesheet')]);
        $r['body']['themes'] = serialize($themes);

        return $r;
    }

    /**
     * Customize Contact Methods
     *
     * @param array $contactmethods
     *
     * @return array
     * @link http://sillybean.net/2010/01/creating-a-user-directory-part-1-changing-user-contact-fields/
     *
     * @since 1.0.0
     *
     * @author Bill Erickson
     */
    public function axe_contactmethods($contactmethods)
    {
        unset($contactmethods['aim']);
        unset($contactmethods['yim']);
        unset($contactmethods['jabber']);

        return $contactmethods;
    }
}
