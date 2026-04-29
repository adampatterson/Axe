<?php
/*
 * All globally availbile ACF data is loaded here.
 */
include(__THEME_DATA__.'/lib/data.php');

include get_template_part_acf('templates/partials/header');

echo '<!-- main/archive -->';

if (have_posts()):
    if (is_archive()):
        $post_type = get_post_type();

        if ($post_type) {
            $post_type_data = get_post_type_object($post_type);
            $post_type_slug = ($post_type !== 'post') ? $post_type_data->rewrite['slug'] : '';
        }

        if (check_path('/templates/archive-'.$post_type_slug.'.php')):
            echo '<!-- template: index/archive-'.$post_type_slug.' -->';
            include get_template_part_acf('templates/archive', $post_type_slug);
        elseif (is_author()):
            echo '<!-- template: templates/archive-author -->';
            include get_template_part_acf('templates/archive', 'author');
        else:
            echo '<!-- template: index/archive -->';
            include get_template_part_acf('templates/archive', 'default');
        endif;
    endif;

else:
    echo '<!-- template: index/no_posts -->';
    include get_template_part_acf('templates/archive', 'default');
endif;

include get_template_part_acf('templates/partials/footer');
