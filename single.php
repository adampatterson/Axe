<?php
$data = get_fields();

include(get_template_part_acf('templates/partials/header'));

if (have_posts()):
    while (have_posts()):
        the_post();

        if (get_post_type() == 'post' && ! get_post_format()):
            echo '<!-- template: templates/format-standard -->';
            include(get_template_part_acf('templates/format', 'standard'));
        elseif (get_post_type() == 'post'):
            echo '<!-- template: templates/format-' . get_post_format() . ' -->';
            include(get_template_part_acf('templates/format', get_post_format()));
        elseif (check_path('/templates/content-' . get_post_type() . '.php')):
            echo '<!-- template: templates/content-' . get_post_type . ' -->';
            include(get_template_part_acf('templates/content', get_post_type()));
        else:
            echo '<!-- template: templates/content-single -->';
            include(get_template_part_acf('templates/content', 'single'));
        endif;
    endwhile;
endif;

include(get_template_part_acf('templates/partials/footer'));
