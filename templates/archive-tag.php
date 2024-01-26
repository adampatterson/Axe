<?php

$term_id = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args = 'include=' . $term_id;
$terms = get_terms($taxonomy, $args);
?>

<div class="content-wrapper">
    <div class="container pt-5">

        <?php get_acf_part('templates/partials/archive', 'header'); ?>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <section id="post-blog">
                    <?php if (have_posts()):
                        get_acf_part('templates/loop', 'post'); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php get_template_part('templates/partials/pagination') ?>
                            </div>
                        </div>

                    <?php else:
                        get_acf_part('templates/content', 'none');
                    endif; ?>
                </section>

            </div>
        </div>

    </div>
</div>
