<section id="post-blog">
    <? while ( have_posts() ) : the_post();
        get_template_part( 'templates/content','listing' );
    endwhile; ?>

    <div class="center pagination">
        <?= get_previous_posts_link( ); ?>
        <?= get_next_posts_link( ); ?>
    </div>
</section>
