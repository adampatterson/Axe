<?php
$cat      = get_query_var('cat');
$category = get_category($cat);
?>

<div class="content-wrapper">
    <div class="container">

        <h1 class="entry-title pb-5"><?= Axe\Template::the_archive_title(); ?></h1>

        <?php Axe\Template::the_archive_description() ?>

        <div class="row">
            <div class="col-md-9 col-md-offset-1">

                <section id="post-blog">
                    <?php if (have_posts()):
                        include(get_template_part_acf('templates/loop', 'post')); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php get_template_part('templates/partials/pagination') ?>
                            </div>
                        </div>

                    <?php else:
                        include(get_template_part_acf('templates/content', 'none'));
                    endif; ?>
                </section>

            </div>
        </div>

    </div>
</div>
