<?php get_template_part('templates/partials/header');
if (have_posts()):
    # Sort this out, Blog is not loading
    if (is_front_page() && is_home()):
        echo '<!-- template: index/blog -->';
        get_template_part('templates/content', 'blog');
    elseif (is_front_page() or is_home()):
        echo '<!-- template: index/home -->';
        get_template_part('templates/content', 'blog');
    elseif (is_archive()):
        $terms = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        $category = $term->taxonomy;
        if (file_exists(get_template_directory() . '/templates/archive-' . $category . '.php')):
            while (have_posts()) : the_post();
                echo '<!-- template: index/archive-' . $category . ' -->';
                get_template_part('templates/archive', $category);
            endwhile;
        else:
            echo '<!-- template: index/archive -->';
            while (have_posts()) : the_post();
                get_template_part('templates/archive', 'default');
            endwhile;
        endif;
    elseif (is_search()):
        echo '<!-- template: index/search -->';
        get_template_part('templates/content', 'search');
    elseif (is_single()):
        while (have_posts()): the_post();
            if (!get_post_format()) {
                get_template_part('templates/format', 'standard');
            } else {
                get_template_part('templates/format', get_post_format());
            }
        endwhile;
    else:
        if (file_exists(get_template_directory() . '/templates/content-' . $post->post_name . '.php')):
            while (have_posts()) : the_post();
                echo '<!-- template: index/content-' . $post->post_name . ' -->';
                get_template_part('templates/content', $post->post_name);
            endwhile;
        else:
            echo '<!-- template: index/page -->';
            get_template_part('templates/content', 'page');
        endif;
    endif;
else:
    echo '<!-- template: index/no_posts -->';
    get_template_part('templates/404');
endif;

get_template_part('templates/partials/footer');
