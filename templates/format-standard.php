<div class="content-wrapper">

    <div class="container pt-5">

        <?php get_template_part('templates/partials/widgets', 'post-above') ?>

        <div class="row">
            <?php if (is_active_sidebar('main')) { ?>
            <section class="col-md-8">
                <?php } else { ?>
                <section class="col-md-12">
                    <?php } ?>

                    <?php
                    $style = '';
                    if (has_post_thumbnail()):
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'featured');
                        $style = "style='background-image: url($image[0]); position: relative; background-size: cover !important;'";
                    endif; ?>
                    <div class="container">
                        <?php if (has_post_thumbnail()): ?>
                            <figure class="wp-block-image alignwide">
                                <img src="<?= $image[0] ?>" alt="" class="<?= the_title(); ?>">
                            </figure>
                        <?php endif; ?>

                        <article>
                            <div class="row">
                                <header class="col-md-12">
                                    <h1><?php the_title(); ?></h1>
                                    <p><?= get_avatar(get_the_author_meta('ID'), 24, '', '', ["class" => ["rounded-circle"]]); ?><?php Axe\Template::posted_on() ?><?php Axe\Template::edit_post(); ?></p>
                                </header>

                                <div class="content col-md-12">
                                    <?php the_content(); ?>
                                </div>

                            </div>
                            <?php get_template_part('templates/partials/post-footer') ?>
                        </article>
                    </div>
                </section>

                <?php get_template_part('templates/partials/sidebar', 'blog') ?>

        </div>
    </div>
</div>
