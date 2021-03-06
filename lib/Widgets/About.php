<?php

namespace Axe\Widgets;

use WP_Query;
use WP_Widget;

class About extends WP_Widget
{
    function __construct()
    {
        parent::__construct('axe_widget_instagram', __('Axe - About', 'axe'), ['description' => __('Axe About.', 'axe')]);
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        // Title
        // Content
        // Image
        // Link
    }

    /**
     * Updating widget replacing old instances with new
     *
     * @param array $new
     * @param array $old
     *
     * @return array
     */
    public function update($new, $old)
    {
    }

    /**
     * Widget Backend
     *
     * @param array $instance
     *
     * @return string|void
     */
    public function form($instance)
    {

    }

    public function register_widget()
    {
        register_widget(__CLASS__);
    }
}
