<?php

/****************************************
 * Backend Functions
 *****************************************/

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
if ( ! function_exists('axe_contactmethods')) {
    function axe_contactmethods($contactmethods)
    {
        unset($contactmethods['aim']);
        unset($contactmethods['yim']);
        unset($contactmethods['jabber']);

        return $contactmethods;
    }
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
if ( ! function_exists('axe_dont_update_theme')) {
    function axe_dont_update_theme($r, $url)
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
}

/**
 * Remove Dashboard Meta Boxes
 */
if ( ! function_exists('axe_remove_dashboard_widgets')) {
    function axe_remove_dashboard_widgets()
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
}

/**
 * Change Admin Menu Order
 */
if ( ! function_exists('axe_custom_menu_order')) {
    function axe_custom_menu_order($menu_ord)
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
}

/**
 * Hide Admin Areas that are not used
 */
if ( ! function_exists('axe_remove_menu_pages')) {
    function axe_remove_menu_pages()
    {
        remove_menu_page('link-manager.php');
    }
}

/**
 * Remove default link for images
 */
if ( ! function_exists('axe_imagelink_setup')) {
    function axe_imagelink_setup()
    {
        $image_set = get_option('image_default_link_type');
        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
    }
}

/**
 * Show Kitchen Sink in WYSIWYG Editor
 */
if ( ! function_exists('axe_unhide_kitchensink')) {
    function axe_unhide_kitchensink($args)
    {
        $args['wordpress_adv_hidden'] = false;

        return $args;
    }
}

/**
 * Remove Query Strings From Static Resources
 */
if ( ! function_exists('axe_remove_script_version')) {
    function axe_remove_script_version($src)
    {
        $parts = explode('?', $src);

        return $parts[0];
    }
}

/**
 * Remove Read More Jump
 */
if ( ! function_exists('axe_remove_more_jump_link')) {
    function axe_remove_more_jump_link($link)
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
}

if ( ! function_exists('axe_excerpt')) {
    function axe_excerpt()
    {
        return '...';
    }
}

if ( ! function_exists('add_gravatar_class')) {
    function add_gravatar_class($class)
    {
        $class = str_replace("class='avatar", "class='avatar img-circle", $class);

        return $class;
    }
}

if ( ! function_exists('custom_login_logo')) {
    function custom_login_logo()
    {
        echo '<style type="text/css">
        h1 a { background-image: url(' . __t() . '/assets/img/adminlogo.png) !important; height: auto;}
        body.login{ background: #fff; }
        </style>';
    }
}
if ( ! function_exists('enable_admin_bar')) {

    show_admin_bar(true);
}
