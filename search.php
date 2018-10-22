<?php
$data = get_fields();
get_template_part('templates/partials/header');

echo '<!-- master/search -->';
if (have_posts()):
    echo '<!-- template: index/search -->';
    get_template_part('templates/content', 'search');
else:
    echo '<!-- template: index/no_posts -->';
    get_template_part('templates/none');
endif;

get_template_part('templates/partials/footer');
