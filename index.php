<?php
$data = get_fields();
include(get_template_part_acf('templates/partials/header'));

if (have_posts()):
    # Sort this out, Blog is not loading
    if (is_front_page() && is_home()):
        echo '<!-- template: index/blog -->';
        include(get_template_part_acf('templates/content', 'blog'));
    elseif (is_front_page() or is_home()):
        echo '<!-- template: index/home -->';
        include(get_template_part_acf('templates/content', 'blog'));
    else:
        if (check_path('/templates/content-' . $post->post_name . '.php')):
            while (have_posts()) : the_post();
                echo '<!-- template: index/content-' . $post->post_name . ' -->';
                include(get_template_part_acf('templates/content', $post->post_name));
            endwhile;
        else:
            echo '<!-- template: index/page -->';
            include(get_template_part_acf('templates/content', 'page'));
        endif;
    endif;

else:
    echo '<!-- template: index/no_posts -->';
    include(get_template_part_acf('templates/none'));
endif;

include(get_template_part_acf('templates/partials/footer'));
