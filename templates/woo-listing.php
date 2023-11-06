<div class="content-wrapper">
    <div class="container pt-5">
        <div class="row">
            <div class="<?= (is_active_sidebar('shop')) ? 'col-md-8' : 'col-md-12' ?>">
                <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="wrapper clearfix">
                        <?php the_title('<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->'); ?>
                        <?php the_content(); ?>
                    </div>
                </section>
            </div>

            <?php get_template_part('templates/partials/sidebar', 'shop') ?>
        </div>

    </div>
</div>
