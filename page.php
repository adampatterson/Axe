<?php
$data = get_fields();
$post = get_post();
//$options = get_field('key', 'option');

include(get_template_part_acf('templates/partials/header'));

echo '<!-- master/page -->';
while (have_posts()) : the_post();
    if (is_front_page()):
        echo '<!-- template: templates/content-home -->';
        include(get_template_part_acf('templates/content', 'home'));
    else:
        if (is_sub_page($post)):
            $patent = get_post($post->post_parent);
            if (check_path('/templates/sub-' . $patent->post_name . '.php')):
                echo '<!-- template: templates/sub-' . $patent->post_name . ' -->';
            else:
                echo '<!-- template: templates/content-page.php -->';
                include(get_template_part_acf('templates/content', 'page'));
            endif;

//      Single Page
        elseif (check_path('/templates/content-' . $post->post_name . '.php')):
            echo '<!-- template: templates/content-' . $post->post_name . ' -->';
            include(get_template_part_acf('templates/content', $post->post_name));

//      WooCommerce Product Listing
        elseif (show_woo_listing()):
            echo '<!-- template: templates/woo-listing -->';
            include(get_template_part_acf('templates/woo', 'listing'));

        else:
            echo '<!-- template: templates/content-page -->';
            include(get_template_part_acf('templates/content', 'page'));
        endif;
    endif;
endwhile;

include(get_template_part_acf('templates/partials/footer'));
