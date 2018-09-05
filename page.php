<?php
$data = get_fields();

include(get_template_part_acf('templates/partials/header'));

while (have_posts()) : the_post();
    if (is_front_page()):
        echo '<!-- template: templates/content-home -->';
        include(get_template_part_acf('templates/content', 'home'));
    else:
        if (check_path('/templates/content-' . $post->post_name . '.php')):
            echo '<!-- template: templates/content-' . $post->post_name . ' -->';
            include(get_template_part_acf('templates/content', $post->post_name));
        else:
            echo '<!-- template: templates/content-page -->';
            include(get_template_part_acf('templates/content', 'page'));
        endif;
    endif;
endwhile;

include(get_template_part_acf('templates/partials/footer'));
