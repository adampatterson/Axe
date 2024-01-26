<?php
/*
 * All globally available ACF data is loaded here.
 */
include(__THEME_DATA__ . '/lib/data.php');

get_acf_part('templates/partials/header');

echo '<!-- master/index -->';

if (have_posts()):
    # Sort this out, Blog is not loading
    if (is_front_page() || is_home()):
        echo '<!-- template: index/blog -->';
        get_acf_part('templates/content', 'blog');
    endif;
else:
    echo '<!-- template: index/no_posts -->';
    get_acf_part('templates/none');
endif;

get_acf_part('templates/partials/footer');
