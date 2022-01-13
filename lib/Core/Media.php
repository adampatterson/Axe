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
        add_image_size('sidebar', 470, 353, true);
        add_image_size('logo-sm', 50, 50, true);
        add_image_size('logo-md', 250, 250, true);
        add_image_size('logo-lg', 500, 500, true);

        if (is_admin()) {
            // Add image sizes to the editor
            add_filter('image_size_names_choose', [
                $this,
                'add_image_sizes_editor'
            ]);
        }
    }

    public function add_image_sizes_editor($sizes)
    {
        return array_merge($sizes, [
            'featured' => __('Featured', 'axe'),
            'gallery'  => __('Gallery', 'axe'),
            'grid'     => __('Grid', 'axe'),
            'square'   => __('Square', 'axe'),
            'sidebar'  => __('Sidebar', 'axe'),
            'logo-sm'  => __('Logo Small', 'axe'),
            'logo-md'  => __('Logo Medium', 'axe'),
            'logo-lg'  => __('Logo Large', 'axe'),
        ]);
    }
}
