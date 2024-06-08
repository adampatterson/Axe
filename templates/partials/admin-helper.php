<?php
if (is_user_logged_in() && WP_DEBUG):
    include(__THEME_DATA__.'/lib/data.php');
    $wooDebug = (!function_exists('is_shop')) ? [] : [
        'is_shop'             => is_shop(),
        'is_product_category' => is_product_category(),
        'is_product_tag'      => is_product_tag(),
        'is_product'          => is_product(),
        'is_cart'             => is_cart(),
        'is_checkout'         => is_checkout(),
        'is_account_page'     => is_account_page(),
    ];

    $debugData = [
        'acf_data'        => isset($data) ? $data : [],
        'options'         => isset($options) ? $options : [],
        'post'            => isset($post) ? $post : [],
        'products'        => isset($products) ? $products : [],
        'get_post_type'   => get_post_type(),
        'get_post_format' => get_post_format(),
        'template_file'   => show_template(),
        'is'              => array_merge(
            $wooDebug, [
            'is_front_page' => is_front_page(),
            'is_single'     => is_single(),
            'is_archive'    => is_archive(),
            'is_author'     => is_author(),
            'is_page'       => is_page(),
            'is_attachment' => is_attachment(),
        ])
    ];
    if (function_exists('ray')) {
        ray($debugData);
    }
    ?>
    <script>
        window.debugData = <?= json_encode($debugData) ?>;
        console.log(window.debugData);
    </script>
<?php endif; ?>
