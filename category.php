<?php

use Axe\Core\Content;

include(get_template_part_acf('templates/partials/header'));

(new Content)->category();

include(get_template_part_acf('templates/partials/footer'));
