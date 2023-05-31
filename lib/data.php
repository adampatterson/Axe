<?php

if ( ! function_exists('get_fields')) {
    echo 'Please install and enable ACF.';
    die;
}

$data        = Axe\Core\Content::getFields();
$post        = Axe\Core\Content::getPosts();

/*
Add a field group in ACF Options to keep the data nice and clean,
then add a key to /theme/lib/Core/Options.php

Ideally to the child theme:
https://github.com/adampatterson/Handle/blob/staging/lib/Custom/Options.php
*/

// $options    = get_field('key', 'option');
// $options    = Axe\Core\Options::get();
