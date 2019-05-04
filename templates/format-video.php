<div class="wrapper">

    <section class="no-sidebar">
        <?php
        $style = '';
        if (has_post_thumbnail()) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'featured');
            $style = "style='background-image: url($image[0]); position: relative; background-size: cover !important;'";
        } ?>
        <header class="header_image header_source" <?= $style ?>>
            <div class="container">
                <div class="video embed-container">
                    <?php the_field('video'); ?>
                </div>
            </div>
        </header>

        <div class="container">
            <article>
                <div class="row">
                    <header class="col-md-12">
                        <h1><?php the_title(); ?></h1>
                        <p><?= get_avatar(get_the_author_meta('ID'), 24, '', '', ["class" => ["rounded-circle"]]); ?> <?php axe_posted_on() ?> <?php axe_entry_edit(); ?></p>
                    </header>

                    <div class="content col-md-12">
                        <?php the_content(); ?>
                    </div>

                </div>
                <?php get_template_part('templates/partials/post-footer') ?>
            </article>
        </div>
    </section>

</div><!-- wrapper -->
