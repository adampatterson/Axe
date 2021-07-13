<?php
/*
 * All globally availbile ACF data is loaded here.
 */
include(__DIR__.'/lib/data.php');

include(get_template_part_acf('templates/partials/header'));

echo '<!-- master/search -->';
if (have_posts()):
    echo '<!-- template: search/search -->';
    include(get_template_part_acf('templates/content', 'search'));
else:
    echo '<!-- template: search/no_posts -->';
    include(get_template_part_acf('templates/none'));
endif;

include(get_template_part_acf('templates/partials/footer'));
