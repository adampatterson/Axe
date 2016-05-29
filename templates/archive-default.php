<div class="content-wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <section id="blog">
                    <? get_template_part( 'templates/loop','post' ); ?>

                    <div class="text-center">
                        <? axe_paging_nav() ?>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <? axe_paging_nav() ?>
                </div>
            </div>
        </div>
    </div>
</div>
