<? while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>>
    <?php if (has_post_thumbnail()) {
        ?>
        <a href="<?php the_permalink(); ?>" title="<?php _e('Read Full Post', 'modernmag'); ?>">
            <?php the_post_thumbnail('grid'); ?>
        </a>
    <?php } ?>

    <div class="content">
        <header>
            <h1><a href="<?php the_permalink(); ?>" title="<?php _e('Read Full Post', 'modernmag'); ?>"><?php the_title(); ?></a></h1>
            <p>
				By <? the_author_posts_link(); ?>
				on <? the_time(get_option('date_format')); ?>
			</p>
        </header>

        <?php
        if (get_theme_mod('archives_style') == 'content') {
            the_content();
        } else {
			$excerpt = get_the_excerpt();
            ?>
            <p>
                <?php echo $excerpt; ?>
                <a href="<?php the_permalink(); ?>" title="<?php _e('Read More', 'modernmag'); ?>">
                    <?php _e('Read More...', 'modernmag'); ?>
                </a>
            </p>
        <?php } ?>

       <footer>
			<ul class="terms tags">
				<?php
				$terms = get_the_terms(get_the_ID(), 'category');
				if (is_array($terms)) {
					?>
					<li><?php the_terms(get_the_ID(), 'category', __('Categories', 'modernmag').': ', ', '); ?></li>
					<?php
				}

				$terms = get_the_terms(get_the_ID(), 'post_tag');
				if (is_array($terms)) {
					?>
					<li><?php the_terms(get_the_ID(), 'post_tag', __('Tags', 'modernmag').': ', ', '); ?></li>
					<?php
				}
				?>
			</ul>
       </footer>
    </div>
</article>
<? endwhile ?>