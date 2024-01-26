<div class="content-wrapper">
    <div class="container pt-5">
        <div class="row">
            <div class="<?= (is_active_sidebar('blog')) ? 'col-md-8' : 'col-md-12' ?>">
                <section id="blog">
                    <?php get_acf_part('templates/loop', 'post'); ?>
                </section>

                <div class="row">
                    <div class="col-md-12">
                        <?php get_template_part('templates/partials/pagination') ?>
                    </div>
                </div>
            </div>

            <?php get_template_part('templates/partials/sidebar', 'blog') ?>
        </div>

    </div>
</div>
