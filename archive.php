<?php
/**
 * Template Name: Archives
 */

$data = get_fields();
include( get_template_part_acf( 'templates/partials/header' ) );

if ( have_posts() ):
    $terms    = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $category = $terms->taxonomy;
    if ( file_exists( get_template_directory() . '/templates/archive-' . $category . '.php' ) ):
        echo '<!-- template: index/archive-' . $category . ' -->';
        include( get_template_part_acf( 'templates/archive', $category ) );
    else:
        echo '<!-- template: index/archive -->';
        include( get_template_part_acf( 'templates/archive', 'default' ) );
    endif;
endif;

include( get_template_part_acf( 'templates/partials/footer' ) );
