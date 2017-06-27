<?php
$data = get_fields();
include(get_template_part_acf('templates/partials/header'));

$cat     = get_query_var('cat');
$yourcat = get_category($cat);

if (check_path('/templates/archive-' . $post->post_name . '.php')):
    echo '<!-- template: page/' . $post->post_name . ' -->';
    include(get_template_part_acf('templates/archive', $post->post_name));
else:
    echo '<!-- template: archive/category -->';
    include(get_template_part_acf('templates/archive', 'category'));
endif;


include(get_template_part_acf('templates/partials/footer'));
