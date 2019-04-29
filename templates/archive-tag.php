<?php

$term_id  = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args     = 'include=' . $term_id;
$terms    = get_terms($taxonomy, $args); ?>

<div class="content-wrapper">
    <div class="container">

        <h3 class="entry-title"><?= the_archive_title(); ?></h3>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <section id="post-blog">
                    <?php if (have_posts()):
                        include(get_template_part_acf('templates/loop', 'post')); ?>

                        <div class="text-center">
                            <?php axe_paging_nav() ?>
                        </div>

                    <?php else:
                        include(get_template_part_acf('templates/content', 'none'));
                    endif; ?>
                </section>

            </div>
        </div>

    </div>
</div>
