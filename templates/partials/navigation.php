<div class="navbar-wrapper pb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="header">
        <div class="container">

            <?= get_the_logo(true, 'site-logo', 'navbar-brand mr-3'); ?>

            <a class="navbar-brand mr-auto" href="<?= home_url('/') ?>">
                <h3 class="site-title mb-0"><?php bloginfo('name'); ?></h3>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <?php
                // http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
                // https://github.com/jeffmould/multi-level-bootstrap-menu/blob/master/wp-bootstrap-navwalker.php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu([
                        'menu'           => 'main-menu',
                        'theme_location' => 'main-menu',
                        'menu_id'        => 'navigation',
                        'depth'          => 3,
                        'container'      => false,
                        'escape_titles'  => false,
                        'menu_class'     => 'nav navbar-nav primary-nav ml-auto',
                        'walker'         => new Axe\Core\Walker()
                    ]);
                }
                get_search_form();
                ?>
            </div>

        </div>
    </nav>
</div>
