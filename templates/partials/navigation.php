<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-default" id="header">
            <div class="container">
                <div class="row">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                        // http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
                        // https://github.com/jeffmould/multi-level-bootstrap-menu/blob/master/wp-bootstrap-navwalker.php
                        if (has_nav_menu('main-menu')) {
                            wp_nav_menu( array(
                                    'menu' => 'main-menu',
                                    'theme_location' => 'main-menu',
                                    'menu_id' => 'navigation',
                                    'depth' => 3,
                                    'container' => false,
                                    'menu_class' => 'nav nav-justified',
                                    //Process nav menu using our custom nav walker
                                    'walker' => new wp_bootstrap_navwalker())
                            );
                        }
                        #get_search_form();
                        ?>
                    </div>
                </div>
            </div>
        </nav>

    </div>
</div>
