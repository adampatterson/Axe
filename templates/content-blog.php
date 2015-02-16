<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <section id="post-blog">
                    <? get_template_part( 'templates/loop','post' ); ?>

                    <div class="center pagination">
                        <?= get_previous_posts_link( ); ?>
                        <?= get_next_posts_link( ); ?>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>