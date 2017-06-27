<?php
$cat     = get_query_var('cat');
$yourcat = get_category($cat);
?>

<div class="content-wrapper">
    <div class="container">

        <div class="wrapper terms">
            <div class="container">
                <h3 class="entry-title">Category results for: <?= $yourcat->name; ?></h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <section id="blog">
                    <? if (have_posts()):
                        include(get_template_part_acf('templates/loop', 'post')); ?>

                        <div class="text-center">
                            <? axe_paging_nav() ?>
                        </div>
                    <? else:
                        include(get_template_part_acf('templates/content', 'none'));
                    endif; ?>
                </section>

            </div>
        </div>

    </div>
</div>
