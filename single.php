<?php
$data = get_fields();
$post = get_post();

include(get_template_part_acf('templates/partials/header'));
echo '<!-- master/single -->';
if (have_posts()):
    while (have_posts()):
        the_post();

//      Post Format
        if (check_path('/templates/format-' . get_post_format() . '.php')):
            echo '<!-- template: templates/format-' . get_post_format() . ' -->';
            include(get_template_part_acf('templates/format', get_post_format()));

//      Fallback for missing Post Formats
        elseif (get_post_type() == 'post' && ! get_post_format()):
            echo '<!-- template: templates/format-standard -->';
            include(get_template_part_acf('templates/format', 'standard'));

//      Custom Post Type
        elseif (check_path('/templates/single-' . get_post_type() . '.php')):
            echo '<!-- template: templates/single-' . get_post_type() . ' -->';
            include(get_template_part_acf('templates/single', get_post_type()));

//      WooCommerce Product
        elseif (is_product()):
            echo '<!-- template: woo/page -->';
            include(get_template_part_acf('templates/woo', 'product-listing'));

//      If everything fails use content-single.php
        else:
            echo '<!-- template: templates/content-single -->';
            include(get_template_part_acf('templates/format', 'standard'));

        endif;
    endwhile;
endif;

include(get_template_part_acf('templates/partials/footer'));
