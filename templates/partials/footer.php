<footer>
    <div class="container text-center">
        <?php
        // http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
        wp_nav_menu(array(
                'menu'           => 'footer-links',
                'theme_location' => 'footer-links',
                'menu_id'        => 'footer-navigation',
                'depth'          => 2,
                'container'      => false,
                'menu_class'     => 'nav navbar-nav primary-nav navbar-right',
                'walker'         => new wp_bootstrap_navwalker()
            )
        );
        #get_search_form();
        ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type='text/javascript' src='<? __j() ?>app.js'></script>

<?php include( get_template_part_acf( 'templates/partials/admin-helper' ) ); ?>

</body>
</html>
