<?php get_template_part('templates/partials/header'); ?>
<div id="postWrapper">
    <section id="main" role="main">
        <?php if (have_posts()):
            while (have_posts()):
                the_post();

                if(get_post_type() == 'post' && !get_post_format())
                    get_template_part('templates/format', 'standard');
                elseif (get_post_type() == 'post')
                    get_template_part('templates/format', get_post_format());
                else
                    get_template_part('templates/single',get_post_type());

            endwhile;
        endif; ?>
    </section>
</div>
<? get_template_part('templates/partials/footer'); ?>
