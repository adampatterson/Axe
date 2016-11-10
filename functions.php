<?
/****************************************
 * Theme Setup
 *****************************************/
require_once(get_template_directory() . '/lib/init.php');
require_once(get_template_directory() . '/lib/theme-options.php');
require_once(get_template_directory() . '/lib/bootstrap-walker.php');
require_once(get_template_directory() . '/lib/theme-helpers.php');
require_once(get_template_directory() . '/lib/theme-media.php');
require_once(get_template_directory() . '/lib/theme-widgets.php');
require_once(get_template_directory() . '/lib/theme-menus.php');
require_once(get_template_directory() . '/lib/theme-functions.php');
require_once(get_template_directory() . '/lib/theme-template-tags.php');

/**
 * Load Jetpack compatibility file.
 * See: http://jetpack.me/support/infinite-scroll/
 * todo: adjust content classesw
 */
//require get_template_directory() . '/lib/theme-jetpack.php';

require_once(get_template_directory() . '/lib/custom.php');
