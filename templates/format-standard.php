<div class="wrapper">

    <section>
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
                    <?php the_field('video'); ?>
                </div>
            </div>
        </header>
        */ ?>
        <div class="container">
            <article>
                <div class="row">
                    <header class="col-md-12">
                        <h1><?php the_title(); ?></h1>
                        <?php /*
                        <p>
                            <span>Posted by</span><?php the_author_posts_link(); ?>
                            <span>on</span><?php the_time(get_option('date_format')); ?>
                        </p> */ ?>
                        <p><?php axe_posted_on() ?><?php axe_entry_edit(); ?></p>
                    </header>

                    <div class="content col-md-12">
                        <?php the_content(); ?>
                    </div>
                    <footer class="col-md-12 entry-footer terms tags">
                        <?php /*
                        <ul class="terms tags">
                            <?php
                            // Check if there are categories
                            // If so, output them
                            $terms = get_the_terms(get_the_ID(), 'category');
                            if (is_array($terms)) {
                                ?>
                                <li><?php the_terms(get_the_ID(), 'category', 'Categories: ', ', '); ?></li>
                            <?php
                            }
                            $terms = get_the_terms(get_the_ID(), 'post_tag');
                            if (is_array($terms)) {
                                ?>
                                <li><?php the_terms(get_the_ID(), 'post_tag', 'Tags: ', ', '); ?></li>
                            <?php
                            }
                            ?>
                        </ul>
*/ ?>
                        <p><?php axe_entry_categories(); ?></p>
                        <p><?php axe_entry_tags(); ?></p>
                    </footer>

                    <div class="row">
                        <div class="col-md-12 m-top-30">
                            <?php axe_post_nav(); ?>
                        </div>
                    </div>

                    <div class="col-md-12 m-top-30 m-bottom-30">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
                        <h3>About <?php the_author_posts_link(); ?></h3>
                        <p><?php echo get_the_author_meta( 'description' ); ?></p>
                    </div>

                    <?php get_template_part( 'templates/partials/mailing-list' ) ?>

                    <?php get_template_part( 'templates/partials/comments' ) ?>
                </div>
            </article>
        </div>
    </section>

</div><!-- wrapper -->
