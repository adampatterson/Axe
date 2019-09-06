<div class="navbar-wrapper pb-5">
    <nav class="navbar navbar-expand-lg justify-content-between navbar-light bg-light" id="header">
        <div class="container">
            <a class="navbar-brand mr-auto" href="<?= home_url('/') ?>">
                <h3><?php bloginfo('name'); ?></h3>
                <? /*<img src="<?php __i() ?>logo.png" alt="">*/ ?>
                <p class="site-description"><?php echo get_bloginfo('description', 'display'); ?></p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse" id="menu">
                <?php
                // http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
                // https://github.com/jeffmould/multi-level-bootstrap-menu/blob/master/wp-bootstrap-navwalker.php
                if (has_nav_menu('main-menu')) {
                    wp_nav_menu(array(
                        'menu'           => 'main-menu',
                        'theme_location' => 'main-menu',
                        'menu_id'        => 'navigation',
                        'depth'          => 3,
                        'container'      => false,
                        'menu_class'     => 'nav navbar-nav primary-nav ml-auto',
                        'walker'         => new Axe\Core\Walker()
                    ));
                }
                //            get_search_form();
                ?>
            </nav>
        </div>
    </nav>
</div>
