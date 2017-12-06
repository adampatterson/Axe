<?php
$data = get_fields();
include( get_template_part_acf( 'templates/partials/header' ) );

echo '<!-- template: woo/page -->';
include( get_template_part_acf( 'templates/woo', 'product-listing' ) );

include( get_template_part_acf( 'templates/partials/footer' ) );
