<?php
/****************************************
 * Theme Helpers
 *****************************************/

use Illuminate\Support\Arr;

if ( ! function_exists('__t')) {
    /**
     * The root template directory, this can be over written in the child theme.
     *
     * @return string
     */
    function __t()
    {
        return get_template_directory_uri().'/';
    }
}

if ( ! function_exists('__p')) {
    /**
     * Returns the Parent template path.
     *
     * @return string
     */
    function __p()
    {
        return get_template_directory().'/';
    }
}

if ( ! function_exists('__a')) {
    /**
     * Assets relative to the template directory.
     *
     * @return string
     */
    function __a($useParent = false)
    {
        return __t($useParent).'assets/';
    }
}

if ( ! function_exists('__j')) {
    /**
     * Echoes the Javascript path.
     */
    function __j($useParent = false)
    {
        echo __a($useParent).'js/';
    }
}

if ( ! function_exists('__i')) {
    /**
     * Echoes the Images path.
     */
    function __i($useParent = false)
    {
        echo __a($useParent).'img/';
    }
}

if ( ! function_exists('__c')) {
    /**
     * Echoes the CSS path.
     */
    function __c($useParent = false)
    {
        echo __a($useParent).'css/';
    }
}

if ( ! function_exists('__v')) {
    /**
     * Echoes the Vendor path.
     */
    function __v($useParent = false)
    {
        echo __a($useParent).'vendor/';
    }
}

if ( ! function_exists('__lib')) {
    /**
     * Returns the Lib path.
     */
    function __lib($path)
    {
        return template_directory('/lib/'.$path);
    }
}

if ( ! function_exists('mix')) {
    /**
     * @param $path
     *
     * @return string
     */
    function mix($path, $useParent = false)
    {
        $pathWithOutSlash  = ltrim($path, '/');
        $pathWithSlash     = '/'.ltrim($path, '/');
        $pathWithOutAssets = '/'.ltrim($pathWithSlash, '/assets');
        $manifestFile      = __m($useParent);

//        No manifest file was found so return whatever was passed to mix().
        if ( ! $manifestFile) {
            return __t($useParent).$pathWithOutSlash;
        }

        $manifestArray = json_decode(file_get_contents($manifestFile), true);

        if (array_key_exists($pathWithOutAssets, $manifestArray)) {
            return __t($useParent).'assets/'.ltrim($manifestArray[$pathWithOutAssets], '/');
        }

//        No file was found in the manifest, return whatever was passed to mix().
        return __t($useParent).$pathWithOutSlash;
    }
}

if ( ! function_exists('__video')) {
    /**
     *  Echos the video path.
     */
    function __video($useParent = false)
    {
        echo __a($useParent).'video/';
    }
}

/**
 * @param $string
 *
 * @return string
 */
function underscore($string)
{
    return strtolower(preg_replace('/[[:space:]]+/', '_', $string));
}

/**
 * @param $string
 *
 * @return string
 */
function dash($string)
{
    return strtolower(preg_replace('/[[:space:]]+/', '-', $string));
}

/**
 * @param $parent
 * @param $args
 *
 * Category list
 *
 * @return array
 */
function get_cat_hierarchy($parent, $args)
{
    $cats = get_categories($args);
    $ret  = new stdClass;

    foreach ($cats as $cat) {
        if ($cat->parent == $parent) {
            $id                 = $cat->cat_ID;
            $ret->$id           = $cat;
            $ret->$id->children = get_cat_hierarchy($id, $args);
        }
    }

    return (array) $ret;
}

/**
 * @param      $slug
 * @param  null  $name
 * @param  null  $data
 *
 * Allows the passthrough of data to template partials.
 *
 * @return string
 */
function get_template_part_acf($slug, $name = null)
{
    $templates = [];
    $name      = (string) $name;

    if ($name == null) {
        $templates[] = "{$slug}.php";
    } else {
        $templates[] = "{$slug}-{$name}.php";
    }

    $located = '';
    foreach ((array) $templates as $template_name) {
        if ( ! $template_name) {
            continue;
        }
        if (template_directory($template_name)) {
            $located = template_directory($template_name);
        }
    }

    return $located;
}

/**
 * @param $template_name
 *
 * @return string
 */
function check_path($template_name)
{
    if (file_exists(get_stylesheet_directory().'/'.$template_name) or file_exists(get_template_directory().'/'.$template_name)) {
        return get_template_directory().'/'.$template_name;
    }

    return false;
}

/**
 * @param $template_name
 *
 * @return bool|string
 */
function template_directory($template_name)
{
    $template_name = trim($template_name, "/");

    if (file_exists(get_stylesheet_directory().'/'.$template_name)) {
        return get_stylesheet_directory().'/'.$template_name;
    }

    if (file_exists(get_template_directory().'/'.$template_name)) {
        return get_template_directory().'/'.$template_name;
    }

    return false;
}

if ( ! function_exists('__m')) {
    /**
     * Returns the mix-manifest.json file
     *
     * @return bool|string
     */
    function __m($useParent)
    {
        $template_name = "mix-manifest.json";

        // Force the Parent Manifest
        if ($useParent and file_exists(get_template_directory().'/'.$template_name)) {
            return get_template_directory().'/'.$template_name;
        }

        // Check the Child Manifest
        if (file_exists(get_stylesheet_directory().'/'.$template_name)) {
            return get_stylesheet_directory().'/'.$template_name;
        }

        // Return to the Core Manifest.
        if (file_exists(get_template_directory().'/'.$template_name)) {
            return get_template_directory().'/'.$template_name;
        }

        return false;
    }
}

if ( ! function_exists('mix')) {
    /**
     * @param $path
     *
     * @return string
     */
    function mix($path, $useParent = false)
    {
        $pathWithOutSlash = ltrim($path, '/');
        $pathWithSlash    = '/'.ltrim($path, '/');
        $manifestFile     = __m($useParent);

//        No manifest file was found so return whatever was passed to mix().
        if ( ! $manifestFile) {
            return __t($useParent).$pathWithOutSlash;
        }

        $manifestArray = json_decode(file_get_contents($manifestFile), true);

        if (array_key_exists($pathWithSlash, $manifestArray)) {
            return __t($useParent).ltrim($manifestArray[$pathWithSlash], '/');
        }

//        No file was found in the manifest, return whatever was passed to mix().
        return __t($useParent).$pathWithOutSlash;
    }
}

if ( ! function_exists('dd')) {
    /**
     * Var_dump and die method
     *
     * @return void
     */
    function dd()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        echo '</pre>';
        die;
    }
}

if ( ! function_exists('dump')) {
    /**
     * Var_dump method
     *
     * @return void
     */
    function dump()
    {
        echo '<pre>';
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());
        echo '</pre>';
    }
}

if ( ! function_exists('is_sub_page')) {
    /**
     * @param $post
     *
     * @return bool
     */
    function is_sub_page($post)
    {
        return is_page() && $post->post_parent > 0;
    }
}

if ( ! function_exists('show_template')) {
    /**
     * Returns the local WordPress template path.
     *
     * @return mixed
     */
    function show_template()
    {
        if (is_super_admin()) {
            global $template;

            return str_replace(get_theme_root(), "", $template);
        }
    }
}

if ( ! function_exists('show_woo_listing')) {
    /**
     * Returns the local WordPress template path.
     *
     * @return mixed
     */
    function show_woo_listing()
    {
        return class_exists('WooCommerce') and is_shop() and ! is_product();
    }
}
if ( ! function_exists('show_woo_single_product')) {
    /**
     * Returns the local WordPress template path.
     *
     * @return mixed
     */
    function show_woo_single_product()
    {
        return class_exists('WooCommerce') and is_product();
    }
}


if ( ! function_exists('get_the_logo')) {
    /**
     * @param  bool  $include_link
     * @param  string  $custom_logo_css
     * @param  string  $custom_link_css
     *
     * @return bool|string
     *
     * Returns an HTML link including the logo, Or just the path the the logo image.
     */
    function get_the_logo($include_link = false,
        $custom_logo_css = 'site-logo custom-logo img-fluid',
        $custom_link_css = 'logo custom-logo-link'
    ) {
        $logo = wp_get_attachment_image(get_theme_mod('custom_logo'), 'full', false, ['class' => $custom_logo_css]);

        if ( ! $logo) {
            return false;
        }

        $url = esc_url(home_url('/'));

        if ($include_link) {
            return sprintf('<a href="%1$s" class="%2$s" rel="home">%3$s</a>', $url, $custom_link_css, $logo);
        }

        return $logo;
    }
}

if ( ! function_exists('if_custom_logo')) {
    /**
     * @return bool
     *
     * Simple function to adjust the template if there is a custom logo or not.
     */
    function if_custom_logo()
    {
        $logo = wp_get_attachment_image(get_theme_mod('custom_logo'), 'full');

        if ( ! $logo) {
            return false;
        }

        return true;
    }
}

function word_count()
{
    global $post;
    //Variable: Additional characters which will be considered as a 'word'
    $char_list = '';
    /** MODIFY IF YOU LIKE.  Add characters inside the single quotes. **/ //$char_list = '0123456789'; /** If you want to count numbers as 'words' **/
    //$char_list = '&@'; /** If you want count certain symbols as 'words' **/
    return str_word_count(strip_tags($post->post_content), 0, $char_list);
}

/**
 * @return float
 *
 * <p><?= read_time() ?> minute read</p>
 */
function read_time()
{
    $words = word_count();

    return ceil($words / 200);
}

function is_developer()
{
    if (is_user_logged_in()) {
        $user = wp_get_current_user();

        return in_array('developer', $user->roles);
    }

    return false;
}

function hide_adminbar_for_developers()
{
    if (is_developer()) {
        add_filter('show_admin_bar', '__return_false');
    }
}

/**
 * @param $string
 *
 * @return string
 */
function make_slug($string)
{
    $string = str_replace('#', '', $string);

    return strtolower(preg_replace('/[[:space:]]+/', '_', $string));
}

/*
 * Helpers for working with ACF data objects
 */
if (class_exists('Arr')) {
    /**
     * @param $haystack
     * @param $needle
     * @param  null  $default
     *
     * @return mixed
     */
    function _get($haystack, $needle, $default = null)
    {
        return Arr::get($haystack, $needle, $default);
    }

    /**
     * @param $haystack
     * @param $needle
     * @param  false  $default
     *
     * @return bool|mixed
     */
    function _has($haystack, $needle, $default = false)
    {
        if (Arr::get($haystack, $needle, false)) {
            return true;
        }

        return $default;
    }
} else {
    /**
     * @param $haystack
     * @param $needle
     * @param  null  $default
     */
    function _get($haystack, $needle, $default = null)
    {
        echo "Run composer install";
    }

    /**
     * @param $haystack
     * @param $needle
     * @param  null  $default
     */
    function _has($haystack, $needle, $default = false)
    {
        echo "Run composer install";
    }
}

function setBaseDataPath()
{
    if (file_exists(get_stylesheet_directory().'/lib/data.php')) {
        define('__THEME_DATA__', get_stylesheet_directory());
        return;
    }

    if (file_exists(get_template_directory().'/lib/data.php')) {
        define('__THEME_DATA__', get_template_directory());
        return;
    }
}
