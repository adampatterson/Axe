<?
get_template_part('templates/meta');
get_template_part('templates/header');

$term_id = get_query_var('tag_id');
$taxonomy = 'post_tag';
$args ='include=' . $term_id;
$terms = get_terms( $taxonomy, $args ); ?>

<div class="wrapper clearfix terms">
    <h3 class="entry-title"><?= $terms[0]->slug; ?></h3>
</div>

<?    if ( have_posts() ):
        get_template_part( 'templates/content','listing' );
    else:
        get_template_part( 'templates/content', 'none' );
    endif;

get_template_part('templates/footer');