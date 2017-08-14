<?php

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function axe_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		/*
		array(
			'name'               => 'TGM Example Plugin',
			// The plugin name.
			'slug'               => 'tgm-example-plugin',
			// The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip',
			// The plugin source.
			'required'           => true,
			// If false, the plugin is only 'recommended' instead of required.
			'version'            => '',
			// E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false,
			// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false,
			// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '',
			// If set, overrides default API URL and points to an external URL.
			'is_callable'        => '',
			// If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		*/

		array(
			'name'               => 'GitHub Update',
			// The plugin name.
			'slug'               => 'github-updater-6.1.1',
			// The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/github-updater-6.1.1.zip',
			// The plugin source.
			'required'           => true,
			// If false, the plugin is only 'recommended' instead of required.
			'version'            => '',
			// E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false,
			// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false,
			// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '',
			// If set, overrides default API URL and points to an external URL.
			'is_callable'        => '',
			// If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'               => 'Advanced Custom Fields - oEmbed Object',
			// The plugin name.
			'slug'               => 'acf-oembed_object',
			// The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/acf-oembed_object.zip',
			// The plugin source.
			'required'           => true,
			// If false, the plugin is only 'recommended' instead of required.
			'version'            => '',
			// E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false,
			// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false,
			// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '',
			// If set, overrides default API URL and points to an external URL.
			'is_callable'        => '',
			// If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'     => 'Jetpack by WordPress.com',
			'slug'     => 'jetpack',
			'required' => true,
		),

		array(
			'name'     => 'Custom Post Tupe UI',
			'slug'     => 'custom-post-type-ui',
			'required' => true,
		),

		array(
			'name'     => 'Advanced Custom Fields - Pro is reccomended',
			'slug'     => 'advanced-custom-fields',
			'required' => true,
		),

		array(
			'name'     => 'Advanced Custom Fields - Link',
			'slug'     => 'acf-link',
			'required' => false,
		),

		array(
			'name'     => 'Post Type Order',
			'slug'     => 'post-types-order',
			'required' => false,
		),

		array(
			'name'     => 'Kraken.io Image Optimizer',
			'slug'     => 'kraken-image-optimizer',
			'required' => false,
		),

		array(
			'name'     => 'Force Regenerate Thumbnails',
			'slug'     => 'force-regenerate-thumbnails',
			'required' => false,
		),

		array(
			'name'     => 'Backup WordPress',
			'slug'     => 'backupwordpress',
			'required' => false,
		),

		array(
			'name'     => 'WooCommerce',
			'slug'     => 'woocommerce',
			'required' => false,
		),

		array(
			'name'     => 'WooCommerce MailChimp',
			'slug'     => 'woocommerce-mailchimp',
			'required' => false,
		),

		array(
			'name'     => 'WooCommerce Stripe Payment Gateway',
			'slug'     => 'woocommerce-gateway-stripe',
			'required' => false,
		),

		array(
			'name'     => 'CloudFlare Flexible SSL',
			'slug'     => 'cloudflare-flexible-ssl',
			'required' => false,
		),

		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
			'required'    => false,
		),

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		/*
		array(
			'name'   => 'Adminbar Link Comments to Pending',
			'slug'   => 'adminbar-link-comments-to-pending',
			'source' => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		),
		*/
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'axe',
		// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',
		// Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',
		// Menu slug.
		'parent_slug'  => 'themes.php',
		// Parent menu slug.
		'capability'   => 'edit_theme_options',
		// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,
		// Show admin notices or not.
		'dismissable'  => true,
		// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',
		// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,
		// Automatically activate plugins after installation or not.
		'message'      => '',
		// Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'axe' ),
			'menu_title'                      => __( 'Install Plugins', 'axe' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'axe' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'axe' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'axe' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'axe'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'axe'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'axe'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'axe'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'axe'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'axe'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'axe'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'axe'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'axe'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'axe' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'axe' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'axe' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'axe' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'axe' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'axe' ),
			'dismiss'                         => __( 'Dismiss this notice', 'axe' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'axe' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'axe' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
