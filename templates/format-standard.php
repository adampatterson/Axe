<div class="wrapper">

    <section class="no-sidebar">
        <?php
        /*
        $style = '';
        if (has_post_thumbnail()) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured' );
            $style = "style='background-image: url($image[0]); position: relative; background-size: cover !important;'";
        }?>
        <header class="header_image header_source" <?= $style ?> >
            <div class="container">
                <div class="video embed-container">
                    <? the_field('video'); ?>
                </div>
            </div>
        </header>
        */ ?>
        <div class="container">
            <article>
                <div class="row">
                    <header class="col-md-12">
                        <h1><?php the_title(); ?></h1>
                        <p>
                            <span><?php _e('by', 'modernmag'); ?></span>
                            <?php the_author_posts_link(); ?>

                            <span><?php _e('on', 'modernmag'); ?></span>
                            <?php the_time(get_option('date_format')); ?>
                        </p>
                    </header>

                    <div class="content col-md-12">
                        <?php the_content(); ?>
                    </div>
                    <!-- Taxonomies -->
                    <footer class="col-md-12">
                        <ul class="terms tags">
                            <?php
                            // Check if there are categories
                            // If so, output them
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

                    <div class="author-box">
                        <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
                        <h3><?php _e('About', 'modernmag'); ?> <?php the_author_posts_link(); ?></h3>
                        <p><?php echo get_the_author_meta('description'); ?></p>
                    </div>

                    <? get_template_part('templates/partials/mailing-list') ?>

                    <? get_template_part('templates/partials/comments') ?>
            </article>
        </div>
    </section>

</div><!-- wrapper -->