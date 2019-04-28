<div class="content-wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <section id="blog">
                    <?php include(get_template_part_acf('templates/loop', 'post')); ?>
                </section>
            </div>

            <div class="col-md-4">
                <?php get_template_part('templates/partials/sidebar') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="center pagination">
                    <?= get_previous_posts_link(); ?>
                    <?= get_next_posts_link(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
