<?php
$data = get_fields();
get_template_part('templates/partials/header');

echo '<!-- template: woo/page -->';
include(get_template_part('templates/woo', 'product'));

include(get_template_part('templates/partials/footer'));