<?php

if ( ! function_exists('get_fields')) {
    echo 'Please install and enable ACF.';
    die;
}

$data        = \Axe\Models\Content::getACF();
$post        = \Axe\Models\Content::getPost();

/*
Add a field group in ACF Options to keep the data nice and clean,
then add a key to /theme/lib/Core/Options.php

Ideally to the child theme:
https://github.com/adampatterson/Handle/blob/staging/lib/Custom/Options.php
*/

// $options    = get_field('key', 'option');
$options    = Axe\Models\Options::get();

 $mainOptions = (new \Axe\Core\Network)->getMainSite()['options']; // Uncomment if you're using a WordPress Multi Site
