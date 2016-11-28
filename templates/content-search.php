<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <section id="post-blog">
                    <? if ( have_posts() ):

                        include( get_template_part_acf( 'templates/loop', 'post' ) ); ?>

                        <div class="text-center">
                            <? axe_paging_nav() ?>
                        </div>

                    <? else:
                        get_template_part( 'templates/content', 'none' );
                    endif; ?>
                </section>
            </div>
        </div>

    </div>
</div>
