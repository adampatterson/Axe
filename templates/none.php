<?php get_template_part('templates/partials/header'); ?>

<div class="wrapper">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <section id="post-404" <?php post_class(); ?>>
                    <article>
                        <h1>No posts yet!</h1>
                        <p class="lead"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'handle' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
                    </article>
                </section>
            </div>
        </div>

    </div>
</div>

<?php get_template_part('templates/partials/footer'); ?>
