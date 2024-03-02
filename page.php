<?php
/*
 * All globally available ACF data is loaded here.
 */

include(__THEME_DATA__.'/lib/data.php');

get_acf_part('templates/partials/header');

echo '<!-- main/page -->';
while (have_posts()) : the_post();
    if (is_front_page()):
        echo '<!-- template: templates/content-home -->';
        get_acf_part('templates/content', 'home');
    else:
        if (is_sub_page($post)):
            $patent = get_post($post->post_parent);
            if (check_path('/templates/sub-'.$post->post_name.'.php')):
                echo '<!-- template: templates/sub-'.$post->post_name.' -->';
                get_acf_part('templates/sub', $post->post_name);
            elseif (check_path('/templates/content-'.$patent->post_name.'.php')):
                echo '<!-- template: templates/content-'.$patent->post_name.' -->';
                get_acf_part('templates/content', $patent->post_name);
            else:
                echo '<!-- template: templates/content-page.php -->';
                get_acf_part('templates/content', 'page');
            endif;
//      Single Page
        elseif (check_path('/templates/content-'.$post->post_name.'.php')):
            echo '<!-- template: templates/content-'.$post->post_name.' -->';
            get_acf_part('templates/content', $post->post_name);

//      WooCommerce Product Listing
        elseif (show_woo_listing()):
            echo '<!-- template: templates/woo-listing -->';
            get_acf_part('templates/woo', 'listing');
        elseif (show_woo_category()):
            echo '<!-- template: templates/woo-category -->';
            get_acf_part('templates/woo', 'category');
        else:
            echo '<!-- template: templates/content-page -->';
            get_acf_part('templates/content', 'page');
        endif;
    endif;
endwhile;

get_acf_part('templates/partials/footer');
