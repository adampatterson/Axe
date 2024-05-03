<?php
/*
 * All globally available ACF data is loaded here.
 */

include(__THEME_DATA__.'/lib/data.php');

get_acf_part('templates/partials/header');

echo '<!-- main/attachment -->';

if (have_posts()):
//      Attachment
    echo '<!-- template: templates/single-attachment.php -->';
    get_acf_part('templates/single', 'attachment');

else:
    echo '<!-- template: index/no_posts -->';
    get_acf_part('templates/none');
endif;

get_acf_part('templates/partials/footer');
