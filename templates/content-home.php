<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <? while ( have_posts() ) : the_post(); ?>
                <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <article>
                        <? the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
                        <?php the_content(); ?>
                    </article>
                </section>
                <? endwhile; ?>

            </div>
        </div>

    </div>
</div>