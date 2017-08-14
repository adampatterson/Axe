<?php include(get_template_part_acf('templates/partials/header')); ?>

    <div class="wrapper">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <section id="post-404" <?php post_class(); ?>>
                        <article>
                            <h1>404 Not Found</h1>
                            <p class="lead">It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
                            <?php get_search_form(); ?>
                        </article>
                    </section>
                </div>
            </div>

        </div>
    </div>

<?php include(get_template_part_acf('templates/partials/footer'));

