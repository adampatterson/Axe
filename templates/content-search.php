<div class="content-wrapper">
    <div class="container pt-5">

        <div class="row">
            <div class="col-md-12">
                <section id="post-blog">
                    <?php if ( have_posts() ):

                        include( get_template_part_acf( 'templates/loop', 'post' ) ); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php get_template_part('templates/partials/pagination') ?>
                            </div>
                        </div>

                    <?php else:
                        get_template_part( 'templates/content', 'none' );
                    endif; ?>
                </section>
            </div>
        </div>

    </div>
</div>
