<?php
/*
 * All globally availbile ACF data is loaded here.
 */
include(__THEME_DATA__.'/lib/data.php');

 include get_template_part_acf('templates/partials/header');
echo '<!-- main/single -->';
if (have_posts()):
    while (have_posts()):
        the_post();

//      Post Format
//      https://developer.wordpress.org/advanced-administration/wordpress/post-formats/#supported-formats
        if (check_path('/templates/format-'.get_post_format().'.php')):
            echo '<!-- template: templates/format-'.get_post_format().' -->';
             include get_template_part_acf('templates/format', get_post_format());

//      Custom Post Type
        elseif (check_path('/templates/single-'.get_post_type().'.php')):
            echo '<!-- template: templates/single-'.get_post_type().'.php -->';
             include get_template_part_acf('templates/single', get_post_type());

//      WooCommerce Single Product
        elseif (function_exists('is_product') and is_product()):
            echo '<!-- template: woo/single -->';
             include get_template_part_acf('templates/woo', 'single');

//      Fallback for missing Post Formats
        elseif (get_post_type() == 'post' && !get_post_format()):
            echo '<!-- template: templates/format-standard -->';
             include get_template_part_acf('templates/format', 'standard');

//      If everything fails use format-standard.php
        else:
            echo '<!-- template: templates/format-standard -->';
             include get_template_part_acf('templates/format', 'standard');

        endif;
    endwhile;
endif;

 include get_template_part_acf('templates/partials/footer');
