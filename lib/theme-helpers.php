<?php

/****************************************
 * Theme Helpers
 *****************************************/

/**
 * Add capabilities for a custom post type
 */
function axe_add_capabilities($posttype)
{
    // gets the author role
    $role = get_role('administrator');

    // adds all capabilities for a given post type to the administrator role
    $role->add_cap('edit_' . $posttype . 's');
    $role->add_cap('edit_others_' . $posttype . 's');
    $role->add_cap('publish_' . $posttype . 's');
    $role->add_cap('read_private_' . $posttype . 's');
    $role->add_cap('delete_' . $posttype . 's');
    $role->add_cap('delete_private_' . $posttype . 's');
    $role->add_cap('delete_published_' . $posttype . 's');
    $role->add_cap('delete_others_' . $posttype . 's');
    $role->add_cap('edit_private_' . $posttype . 's');
    $role->add_cap('edit_published_' . $posttype . 's');
}

if ( ! function_exists( '__t' ) ) {
    function __t() {
        return get_template_directory_uri() . '/';
    }
}

function __a() {
    return __t() . 'assets/';
}

function __j() {
    echo __a() . 'js/';
}

function __i() {
    echo __a() . 'img/';
}

function __c() {
    echo __a() . 'css/';
}

function __v() {
    echo __t() . 'vendor/';
}

function __video() {
    echo __a() . 'video/';
}

/**
 * @param $string
 *
 * @return string
 */
function underscore( $string ) {
    return strtolower( preg_replace( '/(?<=\\w)([A-Z])/', '_\\1', $string ) );
}

/**
 * @param $parent
 * @param $args
 *
 * Category list
 *
 * @return array
 */
function get_cat_hierchy( $parent, $args ) {
    $cats = get_categories( $args );
    $ret  = new stdClass;

    foreach ( $cats as $cat ) {
        if ( $cat->parent == $parent ) {
            $id                 = $cat->cat_ID;
            $ret->$id           = $cat;
            $ret->$id->children = get_cat_hierchy( $id, $args );
        }
    }

    return (array) $ret;
}

/**
 * @param      $slug
 * @param null $name
 * @param null $data
 *
 * Allows the passthrough of data to tempalte partials.
 *
 * @return string
 */
function get_template_part_acf( $slug, $name = null ) {
    $templates = array();
    $name      = (string) $name;

    if ( $name == null ) {
        $templates[] = "{$slug}.php";
    } else {
        $templates[] = "{$slug}-{$name}.php";
    }

    $located = '';
    foreach ( (array) $templates as $template_name ) {
        if ( ! $template_name ) {
            continue;
        }
        if ( template_directory( $template_name ) ) {
            $located = template_directory( $template_name );
        }
    }

    return $located;
}

/**
 * @param $template_name
 *
 * @return string
 */
function check_path( $template_name ) {
    if ( file_exists( STYLESHEETPATH . '/' . $template_name ) or file_exists( TEMPLATEPATH . '/' . $template_name ) ) {
        return TEMPLATEPATH . '/' . $template_name;
    }
}

/**
 * @param $template_name
 *
 * @return bool|string
 */
function template_directory( $template_name ) {
    $template_name = trim( $template_name, "/" );

    if ( file_exists( STYLESHEETPATH . '/' . $template_name ) ) {
        return STYLESHEETPATH . '/' . $template_name;
    }
    if ( file_exists( TEMPLATEPATH . '/' . $template_name ) ) {
        return TEMPLATEPATH . '/' . $template_name;
    }
    return false;
}
