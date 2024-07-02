<?php
/*
 * All globally available ACF data is loaded here.
 */

include(__THEME_DATA__.'/lib/data.php');

include get_template_part_acf('templates/partials/header');

echo '<!-- main/index -->';
if (have_posts()):
    if (is_front_page() || is_home()):
        echo '<!-- template: index/blog -->';
        include get_template_part_acf('templates/content', 'blog');
    endif;
else:
    echo '<!-- template: index/no_posts -->';
    include get_template_part_acf('templates/404');
endif;

include get_template_part_acf('templates/partials/footer');
