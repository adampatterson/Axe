<?php

$term_id  = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args     = 'include=' . $term_id;
$terms    = get_terms($taxonomy, $args); ?>

<div class="content-wrapper">
    <div class="container">

        <div class="wrapper terms">
            <h3 class="entry-title">Taxonomy results for: <?= $terms[0]->name; ?></h3>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <section id="post-blog">
                    <? if (have_posts()):
                        get_template_part('templates/loop', 'post'); ?>

                        <div class="center pagination">
                            <?= get_previous_posts_link(); ?>
                            <?= get_next_posts_link(); ?>
                        </div>
                    <? else:
                        get_template_part('templates/content', 'none');
                    endif; ?>
                </section>

            </div>
        </div>

    </div>
</div>
