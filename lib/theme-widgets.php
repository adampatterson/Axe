<?php
/**
 * Register Widget Areas
 */
function axe_widgets_init() {
	// Main Sidebar
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'mb' ),
		'id'            => 'main-sidebar',
		'description'   => __( 'Widgets for Main Sidebar.', 'mb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );

	// Footer
	register_sidebar( array(
		'name'          => __( 'Footer', 'mb' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Widgets for Footer.', 'mb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	) );
}

function unregister_default_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
	unregister_widget( 'Twenty_Eleven_Ephemera_Widget' );
}

add_action( 'widgets_init', 'unregister_default_widgets', 11 );