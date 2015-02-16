<?
get_template_part('templates/partials/header');

$term_id = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args ='include=' . $term_id;
$terms = get_terms( $taxonomy, $args ); ?>

<div class="wrapper terms">
    <h3 class="entry-title"><?= $terms[0]->slug; ?></h3>
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