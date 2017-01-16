<?
// For composer dependencies
// require 'vendor/autoload.php';

// Theme Setup
require_once 'lib/plugins/class-tgm-plugin-activation.php';
require_once('lib/init.php');
require_once('lib/theme-options.php');
require_once('lib/bootstrap-walker.php');
require_once('lib/theme-helpers.php');
require_once('lib/theme-media.php');
require_once('lib/theme-widgets.php');
require_once('lib/theme-menus.php');
require_once('lib/theme-functions.php');
require_once('lib/theme-template-tags.php');
require_once( 'lib/theme-api.php' );
require_once( 'lib/theme-rewrite.php' );

/**
 * Load Jetpack compatibility file.
 * See: http://jetpack.me/support/infinite-scroll/
 * todo: adjust content classesw
 */
//require 'lib/theme-jetpack.php';

require_once('lib/custom.php');

// update_option('siteurl','http://example.com');
// update_option('home','http://example.com');
