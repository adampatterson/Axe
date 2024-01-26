<?php
get_acf_part('templates/partials/header');

$cat = get_query_var('cat');
$category = get_category($cat);
$category_slug = $category->slug;
$post = get_post();

echo '<!-- master/category -->';
if (check_path('/templates/archive-' . $category_slug . '.php')):
    echo '<!-- template: archive/' . $category_slug . ' -->';
    get_acf_part('templates/archive', $category_slug);
else:
    echo '<!-- template: archive/category -->';
    get_acf_part('templates/archive', 'category');
endif;

get_acf_part('templates/partials/footer');
