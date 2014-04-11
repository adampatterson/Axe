<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h3>
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </h3>
    <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
    <div class="content">
        <?php the_content(); ?>
    </div>
</article>
