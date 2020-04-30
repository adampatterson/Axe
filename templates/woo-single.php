<div class="content-wrapper">
    <div class="container pt-5">

        <div class="row">
            <?php if (is_active_sidebar('woo-single')) { ?>
            <div class="col-md-9">
            <?php } else { ?>
            <div class="col-md-12">
            <?php } ?>
                <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="wrapper clearfix">
                        <?php the_title('<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->'); ?>
                        <?php the_content(); ?>
                    </div>
                </section>
            </div>

            <?php get_template_part('templates/partials/sidebar', 'woo-single') ?>
        </div>

    </div>
</div>
