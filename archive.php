<?php
/**
 * Template Name: Archives
 */
$data = get_fields();

include(get_template_part_acf('templates/partials/header'));

echo '<!-- master/archive -->';
if (have_posts()):
    $terms    = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $category = ($terms) ? $terms->taxonomy : null;

    if (check_path('/templates/archive-' . $category . '.php')):
        echo '<!-- template: index/archive-' . $category . ' -->';
        include(get_template_part_acf('templates/archive', $category));

    elseif (check_path('/templates/archive-' . $terms . '.php')):
        echo '<!-- template: index/archive-' . $terms . ' -->';
        include(get_template_part_acf('templates/archive', $terms));

    else:
        echo '<!-- template: index/archive -->';
        include(get_template_part_acf('templates/archive', 'default'));
    endif;
endif;

include(get_template_part_acf('templates/partials/footer'));
