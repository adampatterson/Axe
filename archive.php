<?php
/**
 * Template Name: Archives
 */

$data = get_fields();
get_template_part('templates/partials/header');

if (have_posts()):

    $terms = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    $category = $terms->taxonomy;
    if (file_exists(get_template_directory() . '/templates/archive-' . $category . '.php')):
        echo '<!-- template: index/archive-' . $category . ' -->';
        get_template_part('templates/archive', $category);
    else:
        echo '<!-- template: index/archive -->';
        get_template_part('templates/archive', 'default');
    endif;
endif;

get_template_part('templates/partials/footer');
