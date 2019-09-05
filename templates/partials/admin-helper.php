<?php if (is_user_logged_in()):
    if (isset($data)): ?>
        <script>
            // ACF Data
            console.log(<?= json_encode($data) ?>)
        </script>
    <?php endif;

    if (isset($products)): ?>
        <script>
          // is product
          console.log(<?= json_encode($products) ?>)
        </script>
    <?php endif;
    if (class_exists('WooCommerce')): ?>
        <script>
            // Is WooCommerce Installed
            console.log(<?= json_encode([
                'is_shop'             => is_shop(),
                'is_product_category' => is_product_category(),
                'is_product_tag'      => is_product_tag(),
                'is_product'          => is_product(),
                'is_cart'             => is_cart(),
                'is_checkout'         => is_checkout(),
                'is_account_page'     => is_account_page(),
                'template_file'       => show_template()
            ]); ?>)
        </script>
    <?php endif;
endif; ?>
