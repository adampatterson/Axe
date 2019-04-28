<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-expand-lg justify-content-between navbar-light bg-light p-top-15" id="header">
            <a class="navbar-brand mr-auto" href="<?= home_url('/') ?>">
                <img src="<?php __i() ?>logo.png" alt="">
            </a>

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
                        'walker'         => new wp_bootstrap_navwalker()
                    ));
                }
                #get_search_form();
                ?>
            </nav>
        </nav>

    </div>
</div>
