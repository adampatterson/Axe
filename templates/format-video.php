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
                        <p><?php axe_posted_on() ?></p>
                    </header>

                    <div class="content col-md-12">
                        <?php the_content(); ?>
                    </div>

                    <footer class="col-md-12 entry-footer terms">
                        <p class="post-categories"><?php axe_entry_categories(); ?></p>
                        <p class="post-tags"><?php axe_entry_tags(); ?></p>
                    </footer>

                    <div class="row post-navigation">
                        <div class="col-md-12 post-navigation">
                            <?php axe_post_nav(); ?>
                        </div>
                    </div>

                    <div class="row post-author">
                        <?php get_template_part('templates/partials/post-author') ?>
                    </div>

                    <?php get_template_part('templates/partials/mailing-list') ?>

                    <?php get_template_part('templates/partials/comments') ?>
                </div>
            </article>
        </div>
    </section>

</div><!-- wrapper -->
