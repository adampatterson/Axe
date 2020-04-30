
<?php get_template_part('templates/partials/widgets','bottom'); ?>
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
                'menu_class'     => 'nav justify-content-center secondary-nav pt-5',
                'walker'         => new Axe\Core\Walker()
            ));
        }
        #get_search_form();
        ?>
    </div>
    <?php if (is_active_sidebar('footer')) { ?>
        <div class="widget-footer">
            <?php dynamic_sidebar('footer'); ?>
        </div>
    <?php } ?>
</footer>
</div>
<?php wp_footer(); ?>

<script src="<?= __j() ?>manifest.js"></script>
<script type='text/javascript' src='<?= mix('/assets/js/vendor.js') ?>'></script>
<script type='text/javascript' src='<?= mix('/assets/js/app.js') ?>'></script>

<?php include(get_template_part_acf('templates/partials/admin-helper')); ?>

</body>
</html>
