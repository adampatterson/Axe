<?php get_template_part('templates/partials/header'); ?>
<div id="postWrapper">
    <section id="main" role="main">
        <?php if (have_posts()):
            while (have_posts()):
                the_post();

                if(!get_post_format())
                    get_template_part('templates/format', 'standard');
                else
                    get_template_part('templates/format', get_post_format());

            endwhile;
        endif; ?>
    </section>
</div>
<? get_template_part('templates/partials/footer'); ?>
