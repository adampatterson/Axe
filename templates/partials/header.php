<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name') ?></title>

    <script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"WebSite","url":"<?= json_encode(home_url('/')); ?>","name":"<?= bloginfo('name') ?>","potentialAction":{"@type":"SearchAction","target":"<?= json_encode(home_url('/')); ?>?s={search_term}","query-input":"required name=search_term"}}</script>

    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= __c() ?>base.css"/>
</head>
<?php
if (is_null($post)){
    $post = (object)$post;
    $post->post_name = '';
}
?>
<body <?php body_class($post->post_name); ?>>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{@todo: GA Tracking}', 'auto');
    ga('send', 'pageview');
</script>
<div id="wrapper">
    <div class="navbar-wrapper">
        <div class="container">
            <?php /*
            <nav class="navbar p-top-15" id="header">
                <div class="container">
                    <div class="nav-logo pull-left m-top-15"><a href="<?= home_url( '/' ) ?>">
                            <img src="<?php __i() ?>live-wire.png" alt="">
                        </a>
                    </div>
                    <nav id="menu" class="pull-right m-top-15">
                        <?php
                        // http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
                        wp_nav_menu(array(
                                'menu'           => 'main-menu',
                                'theme_location' => 'main-menu',
<?php get_template_part('templates/partials/navigation'); ?>
                                'depth'          => 2,
                                'container'      => false,
                                'menu_class'     => 'primary-nav pull-right',
                                'walker'         => new wp_bootstrap_navwalker()
                            )
                        );
                        #get_search_form();
                        ?>
                    </nav>

                </div>
            </nav>

*/ ?>
            <nav class="navbar p-top-15" id="header">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand nav-logo pull-left">
                            <a href="<?= home_url( '/' ) ?>">
                                <img src="<?php __i() ?>logo.png" alt="">
                            </a>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="m-top-15 collapse navbar-collapse" id="menu">
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
                                'menu_class'     => 'nav navbar-nav primary-nav navbar-right',
                                'walker'         => new wp_bootstrap_navwalker()
                            )
                        );
                        }
                        #get_search_form();
                        ?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


        </div>
    </div>

<?php /*
     <div id="sidebar">
        <?php get_template_part('templates/partials/sidebar'); ?>
    </div>
*/ ?>
