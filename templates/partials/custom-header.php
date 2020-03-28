<!-- https://developer.wordpress.org/themes/functionality/custom-headers/#displaying-custom-header -->
<?php
if (get_header_image() && is_front_page()) :?>
    <div id="site-header" class="d-flex justify-content-center align-items-center mb-5" style="background-image: url(<?= get_header_image(); ?>)">
        <h1>Custom Header</h1>
    </div>
<?php endif; ?>
