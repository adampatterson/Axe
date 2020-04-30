<div class="content-wrapper">
    <div class="container pt-5">

        <div class="row">
            <?php if (is_active_sidebar('blog')) { ?>
            <div class="col-md-9">
                <?php } else { ?>
                <div class="col-md-12">
                    <?php } ?>
                    <section id="blog">
                        <?php include(get_template_part_acf('templates/loop', 'post')); ?>
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
