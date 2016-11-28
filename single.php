<?php
$data = get_fields();

include( get_template_part_acf( 'templates/partials/header' ) );

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

        if ( get_post_type() == 'post' && ! get_post_format() ):
            include( get_template_part_acf( 'templates/format', 'standard' ) );
        elseif ( get_post_type() == 'post' ):
            include( get_template_part_acf( 'templates/format', get_post_format() ) );
        else:
            include( get_template_part_acf( 'templates/single', get_post_type() ) );
        endif;
    endwhile;
endif;

include( get_template_part_acf( 'templates/partials/footer' ) );
