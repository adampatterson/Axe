<?php
$data = get_fields();
get_template_part('templates/partials/header');

while (have_posts()) : the_post();
    if (is_front_page()):
        echo '<!-- template: page/home -->';
        get_template_part('templates/content', 'home');
    else:
        if (file_exists(get_template_directory() . '/templates/content-' . $post->post_name . '.php')):
            echo '<!-- template: page/' . $post->post_name . ' -->';
            get_template_part('templates/content', $post->post_name);
        else:
            echo '<!-- template: page/page -->';
            get_template_part('templates/content', 'page');
        endif;
    endif;
endwhile;

get_template_part('templates/partials/footer');
