<?
get_template_part('templates/partials/header');

$term_id  = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args     = 'include=' . $term_id;
$terms    = get_terms($taxonomy, $args);

$term_slug = (is_array($terms)) ? $terms[0]->slug : '';

if (check_path('/templates/archive-' . $term_slug . '.php')):
    echo '<!-- template: archive/' . $term_slug . ' -->';
    include(get_template_part_acf('templates/archive', $term_slug));
else:
    echo '<!-- template: archive/tag -->';
    include(get_template_part_acf('templates/archive', 'tag'));
endif;


get_template_part('templates/partials/footer');
