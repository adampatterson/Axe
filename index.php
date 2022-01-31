<?php
/*
 * All globally available ACF data is loaded here.
 */

use Axe\Core\Content;

include(__THEME_DATA__.'/lib/data.php');

include(get_template_part_acf('templates/partials/header'));

(new Content)->index();

include(get_template_part_acf('templates/partials/footer'));
