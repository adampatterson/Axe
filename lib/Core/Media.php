<?php

namespace Axe\Core;

class Media
{

    public function __construct()
    {
        add_image_size('featured', 1600, 600, true); // Without Blur
        add_image_size('gallery', 625, 1000);
        add_image_size('grid', 625, 625, true);
        add_image_size('square', 150, 150, true);

        if (is_admin()) {
            // Add image sizes to the editor
            add_filter('image_size_names_choose', [$this, 'add_image_sizes_editor']);
        }
    }

    public function add_image_sizes_editor($sizes)
    {
        return array_merge($sizes, [
            'featured'   => __('Featured'),
            'gallery'    => __('Gallery'),
            'grid'       => __('Grid'),
            'square'     => __('Square'),
        ]);
    }
}
