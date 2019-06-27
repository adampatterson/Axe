<div class="content-wrapper">
    <div class="container pt-5">

        <div class="row">
            <div class="col-md-10">
                <section id="blog">
                    <?php include(get_template_part_acf('templates/loop', 'post')); ?>
                </section>

                <div class="row">
                    <div class="col-md-12">
                        <?php get_template_part('templates/partials/pagination') ?>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <?php get_template_part('templates/partials/sidebar') ?>
            </div>
        </div>

    </div>
</div>
