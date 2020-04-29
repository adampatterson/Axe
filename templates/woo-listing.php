<div class="content-wrapper">
    <div class="container pt-5">
        <div class="row">
            <?php if (is_active_sidebar('woo-sidebar')) { ?>
            <div class="col-md-9">
            <?php } else { ?>
                <div class="col-md-12">
            <?php } ?>
                <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="wrapper clearfix">
                        <?php the_title('<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->'); ?>
                        <?php the_content(); ?>
                    </div>
                </section>
            </div>

            <?php if (is_active_sidebar('woo-sidebar')) { ?>
                <div class="col-md-3 widget-footer">
                    <?php dynamic_sidebar('woo-sidebar'); ?>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
