<?php get_template_part('templates/partials/header');
if (have_posts()):
    # Sort this out, Blog is not loading
    if (is_front_page() && is_home()):
        echo '<!-- template: index/blog -->';
        get_template_part('templates/content', 'blog');
    elseif (is_front_page() or is_home()):
        echo '<!-- template: index/home -->';
        get_template_part('templates/content', 'blog');
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
    get_template_part('templates/none');
endif;

get_template_part('templates/partials/footer');
