<?php
$data = get_fields();
get_template_part('templates/partials/header');

$cat = get_query_var('cat');
$yourcat = get_category ($cat); ?>

<div class="wrapper terms">
    <div class="container">
        <h3 class="entry-title"><?= $yourcat->slug; ?></h3>
    </div>
</div>

<div class="wrapper">
    <div class="container">
        <section id="post-caegory">
            <? if ( have_posts() ):
                get_template_part( 'templates/loop','post' ); ?>

                <div class="text-center">
                    <? axe_paging_nav() ?>
                </div>
            <? else:
                get_template_part( 'templates/content', 'none' );
            endif; ?>
        </section>
    </div>
</div>


<? get_template_part('templates/partials/footer');
