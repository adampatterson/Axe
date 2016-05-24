<?
/****************************************
Theme Setup
 *****************************************/
require_once( get_template_directory() . '/lib/init.php' );
require_once( get_template_directory() . '/lib/bootstrap-walker.php' );
require_once( get_template_directory() . '/lib/theme-helpers.php' );
require_once( get_template_directory() . '/lib/theme-functions.php' );

/**
 * Load Jetpack compatibility file.
 * See: http://jetpack.me/support/infinite-scroll/
 * todo: adjust cotnetn classes
 */
//require get_template_directory() . '/lib/theme-jetpack.php';

require_once( get_template_directory() . '/lib/theme-template-tags.php' );

require_once( get_template_directory() . '/lib/custom.php' );
