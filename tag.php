<?php
include(get_template_part_acf('templates/partials/header'));

$term_id  = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args     = 'include=' . $term_id;
$terms    = get_terms($taxonomy, $args);
$post     = get_post();

$term_slug = (is_array($terms)) ? $terms[0]->slug : '';

echo '<!-- master/tag -->';
if (check_path('/templates/archive-' . $term_slug . '.php')):
    echo '<!-- template: archive/' . $term_slug . ' -->';
    include(get_template_part_acf('templates/archive', $term_slug));
else:
    echo '<!-- template: archive/tag -->';
    include(get_template_part_acf('templates/archive', 'tag'));
endif;

include(get_template_part_acf('templates/partials/footer'));
