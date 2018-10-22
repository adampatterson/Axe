<?php
$data = get_fields();
include( get_template_part_acf( 'templates/partials/header' ) );
echo '<!-- master/category -->';
$cat     = get_query_var( 'cat' );
$yourcat = get_category( $cat ); ?>

    <div class="wrapper terms">
        <div class="container">
            <h3 class="entry-title"><?= $yourcat->slug; ?></h3>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <section id="post-caegory">
                <? if ( have_posts() ):
                    include( get_template_part_acf( 'templates/loop', 'post' ) ); ?>

                    <div class="text-center">
                        <? axe_paging_nav() ?>
                    </div>
                <? else:
                    include( get_template_part_acf( 'templates/content', 'none' ) );
                endif; ?>
            </section>
        </div>
    </div>


<? include( get_template_part_acf( 'templates/partials/footer' ) );
