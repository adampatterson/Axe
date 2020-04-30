<div class="content-wrapper">
    <div class="container pt-5">

        <div class="row">
            <?php if (is_active_sidebar('main')) { ?>
            <div class="col-md-9">
                <?php } else { ?>
                <div class="col-md-12">
                    <?php } ?>

                    <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <article>
                            <?php the_title('<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->'); ?>
                            <?php the_content(); ?>
                        </article>
                    </section>

                </div>

                <?php get_template_part('templates/partials/sidebar', 'main') ?>

            </div>

        </div>
    </div>
