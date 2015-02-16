<?
get_template_part('templates/partials/header');

$cat = get_query_var('cat');
$yourcat = get_category ($cat); ?>

<div class="wrapper terms">
    <h3 class="entry-title"><?= $yourcat->slug; ?></h3>
</div>

    <section id="post-blog">
        <? if ( have_posts() ):
            get_template_part( 'templates/loop','post' ); ?>

            <div class="center pagination">
                <?= get_previous_posts_link( ); ?>
                <?= get_next_posts_link( ); ?>
            </div>
        <? else:
            get_template_part( 'templates/content', 'none' );
        endif; ?>
    </section>

<? get_template_part('templates/partials/footer');