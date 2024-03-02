<div class="content-wrapper">

    <div class="container pt-5">

        <div class="row">
            <section class="col-md-12">

                <div class="container">

                    <article>
                        <div class="row">
                            <header class="col-md-12">
                                <h1><?php the_title(); ?></h1>
                                <p><?= get_avatar(get_the_author_meta('ID'), 24, '', '',
                                        ["class" => ["rounded-circle"]]); ?><?php Axe\Template::posted_on() ?><?php Axe\Template::edit_post(); ?></p>
                            </header>

                            <div class="content col-md-12">
                                <?= wp_get_attachment_image(get_the_ID(), 'large'); ?>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

        </div>
    </div>
</div>
