<?
get_template_part('templates/meta');
get_template_part('templates/header');

$cat = get_query_var('cat');
$yourcat = get_category ($cat); ?>

<h3 class="entry-title"><?= $yourcat->slug; ?></h3>

<? if ( have_posts() ):
    get_template_part( 'templates/content','listing' );
else:
    get_template_part( 'templates/content', 'none' );
endif;

get_template_part('templates/footer');