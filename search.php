<?php
$data = get_fields();
$post = get_post();

include(get_template_part_acf('templates/partials/header'));

echo '<!-- master/search -->';
if (have_posts()):
    echo '<!-- template: index/search -->';
    get_template_part('templates/content', 'search');
else:
    echo '<!-- template: index/no_posts -->';
    get_template_part('templates/none');
endif;

include(get_template_part_acf('templates/partials/footer'));
