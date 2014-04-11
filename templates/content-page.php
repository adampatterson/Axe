<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="wrapper clearfix">
        <? the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>
        <?php the_content(); ?>
    </div>
</section>