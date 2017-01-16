<?php

namespace Axe;

class AxeRewrites {

	public function __construct() {
//      https://codex.wordpress.org/Rewrite_API/add_rewrite_tag
//      https://developer.wordpress.org/reference/functions/add_rewrite_tag/
//		http://wordpress.stackexchange.com/questions/26388/how-to-create-custom-url-routes
		add_action( 'init', function () {
			add_rewrite_tag( '%location%', '([^&]+)', 'location=' );
			add_rewrite_rule( '^goto/([^/]*)/([^/]*)/?', 'index.php?location=$matches[1]&name=$matches[2]', 'top' );
		} );
	}

	/**
	 * Strathcom Example
	 */
	public function rewrite_rule() {
		add_rewrite_tag( '%vehicle_slug%', '([^&]+)' );
		add_rewrite_tag( '%vehicle_id%', '([0-9]+)' );

		// Get VDP pages - we only need rewrites for VDP since they're the only pages with custom URLs.
		$posts = new \WP_Query( array(
			'post_type'     => Plugin::INVENTORY_SLUG,
			'post_name__in' => $this->plugin->inventory_types['vdp']['defaults'],
			'post_status'   => 'publish'
		) );

		// Create custom rules based on the permalink.
		foreach ( $posts->posts as $post ) {
			// Strip out the main website domain permalink (this is mostly so that in dev subsites work without using domains or subdomains i.e. site.com/test/) and Polylang if enabled.
			$path = trim( str_replace( get_option( 'siteurl' ), '', get_permalink( $post->ID ) ), '/' );
			add_rewrite_rule( $path . '/([^/]*)/([0-9]+)/?', 'index.php?post_type=' . Plugin::INVENTORY_SLUG . '&name=' . $post->post_name . '&vehicle_slug=$matches[1]&vehicle_id=$matches[2]', 'top' );
		}
	}
}

new AxeRewrites;