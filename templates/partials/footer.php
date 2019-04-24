<footer>
    <div class="container">
        <?php
        // http://code.tutsplus.com/tutorials/how-to-integrate-bootstrap-navbar-into-wordpress-theme--wp-33410
        if (has_nav_menu('footer-links')) {
            wp_nav_menu(array(
                'menu'           => 'footer-links',
                'theme_location' => 'footer-links',
                'menu_id'        => 'footer-navigation',
                'depth'          => 1,
                'container'      => false,
                'menu_class'     => 'nav justify-content-center secondary-nav',
                'walker'         => new wp_bootstrap_navwalker()
            ));
        }
        #get_search_form();
        ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>

<script src="<?= __j() ?>manifest.js"></script>
<script type='text/javascript' src='<?= mix('/assets/js/vendor.js') ?>'></script>
<script type='text/javascript' src='<?= mix('/assets/js/app.js') ?>'></script>

<?php include(get_template_part_acf('templates/partials/admin-helper')); ?>

</body>
</html>
