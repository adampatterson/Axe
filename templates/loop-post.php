<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?> itemscope="" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
        <?php if (has_post_thumbnail()) { ?>
            <div class="image">
                <a href="<?php the_permalink(); ?>" title="Read Full Post">
                    <?php the_post_thumbnail('grid', array(
                        'class' => "img-responsive",
                    )); ?>
                </a>
            </div>
        <?php } ?>

        <div class="content" itemprop="text">
            <header>
                <h2><a href="<?php the_permalink(); ?>"
                       title="Read Full Post"><?php the_title(); ?></a></h2>
                <p><?php axe_posted_on() ?></p>
            </header>

            <?php
            if (get_theme_mod('archives_style') == 'content') {
                the_content();
            } else { ?>
                <p><?= get_the_excerpt(); ?></p>
                <p>
                    <a href="<?php the_permalink(); ?>" title="Keep Reading">
                        Keep Reading
                    </a>
                </p>
            <?php } ?>

            <footer class="col-md-12 entry-footer terms">
                <p class="post-categories"><?php axe_entry_categories(); ?></p>
                <p class="post-tags"><?php axe_entry_tags(); ?></p>
            </footer>
        </div>
    </article>
<?php endwhile ?>
