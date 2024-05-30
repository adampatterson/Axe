<?php

namespace Axe\Core;

use InvalidArgumentException;

class Media
{
    const ASPECT_RATIO_WIDTH = 0;
    const ASPECT_RATIO_HEIGHT = 1;

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

        add_filter('upload_mimes', [
            $this,
            'allow_svg_upload'
        ]);
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

    public function allow_svg_upload($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    /**
     * @param  int  $width
     * @param  string  $aspect
     * @return array
     *
     */
    public function aspect(int $width, string $aspect): array
    {
        $aspectParts = $this->validateAspect($aspect);

        // Aspect Ratio for 3:2 or W:H
        // Height = ( Width × H ) / W
        $height = (int) floor(($width * $aspectParts[self::ASPECT_RATIO_HEIGHT]) / $aspectParts[self::ASPECT_RATIO_WIDTH]);

        return [$width, $height, true];
    }

    public function validateAspect($aspect)
    {
        // does the aspect contain a colon?
        if (!str_contains($aspect, ':')) {
            throw new InvalidArgumentException('Aspect ratio must contain a colon.');
        }

        $aspectParts = explode(':', $aspect);
        if (count($aspectParts) !== 2) {
            throw new InvalidArgumentException('The Ratio contains too many parts');
        }

        if (
            !is_numeric($aspectParts[self::ASPECT_RATIO_WIDTH]) ||
            !is_numeric($aspectParts[self::ASPECT_RATIO_HEIGHT]) ||
            $aspectParts[self::ASPECT_RATIO_WIDTH] === 0 ||
            $aspectParts[self::ASPECT_RATIO_HEIGHT] === 0
        ) {
            throw new InvalidArgumentException('Invalid aspect ratio components.');
        }

        return $aspectParts;
    }
}
