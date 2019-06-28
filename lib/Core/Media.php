<?php

namespace Axe\Core;

class Media
{
    public function __construct()
    {
        add_image_size( 'featured', 1600, 600, true ); // Without Blur
        add_image_size( 'gallery', 625, 1000 );
        add_image_size( 'grid', 625, 625, true );
        add_image_size( 'square', 150, 150, true );
    }

}
