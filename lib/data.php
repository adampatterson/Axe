<?php

if ( ! function_exists('get_fields')) {
    echo 'Please install and enable ACF.';
    die;
}

$data = get_fields();
$post = get_post();

/*
Add a field group in ACF Options to keep the data nice and clean,
then add a key to /theme/lib/Core/Options.php
*/

//$options = get_field('key', 'option');
