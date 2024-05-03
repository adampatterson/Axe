<?php
/*
 * All globally availbile ACF data is loaded here.
 */
include(__THEME_DATA__ . '/lib/data.php');

get_acf_part('templates/partials/header');

echo '<!-- main/archive -->';

if (have_posts()):
    if (is_archive()):
        $post_type = get_post_type();

        if ($post_type) {
            $post_type_data = get_post_type_object($post_type);
            $post_type_slug = ($post_type !== 'post') ? $post_type_data->rewrite['slug'] : '';
        }

        if (check_path('/templates/archive-' . $post_type_slug . '.php')):
            echo '<!-- template: index/archive-' . $post_type_slug . ' -->';
            get_acf_part('templates/archive', $post_type_slug);
        elseif (is_author()):
            echo '<!-- template: templates/archive-author -->';
            get_acf_part('templates/archive', 'author');
        else:
            echo '<!-- template: index/archive -->';
            get_acf_part('templates/archive', 'default');
        endif;
    endif;

else:
    echo '<!-- template: index/no_posts -->';
    get_acf_part('templates/archive', 'default');
endif;

get_acf_part('templates/partials/footer');
