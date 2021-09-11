<?php
/*
 * All globally availbile ACF data is loaded here.
 */
include(__THEME_DATA__.'/lib/data.php');

include(get_template_part_acf('templates/partials/header'));

echo '<!-- master/index -->';

if (have_posts()):
    # Sort this out, Blog is not loading
    if (is_front_page() or is_home()):
        echo '<!-- template: index/blog -->';
        include(get_template_part_acf('templates/content', 'blog'));
    endif;
else:
    echo '<!-- template: index/no_posts -->';
    include(get_template_part_acf('templates/none'));
endif;

include(get_template_part_acf('templates/partials/footer'));
