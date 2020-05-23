<?php
include(get_template_part_acf('templates/partials/header'));

$cat           = get_query_var('cat');
$category      = get_category($cat);
$category_slug = $category->slug;
$post          = get_post();

echo '<!-- master/tag -->';
if (check_path('/templates/archive-' . $category_slug . '.php')):
    echo '<!-- template: archive/' . $category_slug . ' -->';
    include(get_template_part_acf('templates/archive', $category_slug));
else:
    echo '<!-- template: archive/tag -->';
    include(get_template_part_acf('templates/archive', 'category'));
endif;

include(get_template_part_acf('templates/partials/footer'));
