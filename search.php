<?php
/*
 * All globally availbile ACF data is loaded here.
 */
include(__THEME_DATA__.'/lib/data.php');

 get_acf_part('templates/partials/header');

echo '<!-- main/search -->';
if (have_posts()):
    echo '<!-- template: search/search -->';
     get_acf_part('templates/content', 'search');
else:
    echo '<!-- template: search/no_posts -->';
     get_acf_part('templates/none');
endif;

 get_acf_part('templates/partials/footer');
