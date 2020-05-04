<?php

namespace Axe\Widgets;

use WP_Query;
use WP_Widget;

class Posts extends WP_Widget
{

    use Base;

    /**
     * Posts constructor.
     */
    function __construct()
    {
        parent::__construct('axe_widget_post', __('Axe - Recent Posts', 'axe'), ['description' => __('Axe Recent posts.', 'axe')]);
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $basePath   = '';
        $title      = apply_filters('widget_title', $instance['title']);
        $query_args = array('posts_per_page' => $instance['number'], 'ignore_sticky_posts' => 1);

        // Show by tag
        if ( ! empty($instance['by_tag'])) {
            $query_args = array_merge($query_args, array('tag' => $instance['by_tag']));
        }

        $query = new WP_Query($query_args);

        // Before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        while ($query->have_posts()) {
            $query->the_post();

            // While not using ACF here, get_template_part_acf allows data set here to be accessed inside of the widget template.
            include(get_template_part_acf('templates/widgets/posts', $instance['style']));
        }

        echo $args['after_widget'];
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
        foreach ($new as $key => $val) {
            $new[$key] = wp_kses_post($val);
        }

        $new['show_excerpt'] = ! empty($new['show_excerpt']) ? 1 : 0;
        $new['show_date']    = ! empty($new['show_date']) ? 1 : 0;
        $new['show_thumb']   = ! empty($new['show_thumb']) ? 1 : 0;

        return $new;
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
        $defaults = array(
            'title'        => 'Recent Posts',
            'by_tag'       => '',
            'style'        => 'list',
            'number'       => 5,
            'show_thumb'   => 1,
            'show_date'    => 1,
            'show_excerpt' => 0,
        );

        $instance = array_merge($defaults, (array)$instance);
        extract($instance);

        echo $this->input($title, 'title', 'Title:');
        echo $this->input($number, 'number', 'Number of posts:', 'number');
        echo $this->input($by_tag, 'by_tag', 'By Tag:');

        echo $this->check($show_excerpt, 'show_excerpt', 'Show Excerpt');
        echo $this->check($show_date, 'show_date', 'Show Date');
        echo $this->check($show_thumb, 'show_thumb', 'Show Thumbnails');

        echo $this->select($style, 'style', 'Style:', ['meta-below' => 'Small - Meta Below', 'meta-above' => 'Small - Meta Above', 'medium' => 'Medium - Medium Image & Meta', 'full' => 'Small - Meta BelowFull Width Image & Large Title']);
    }

    public function register_widget()
    {
        register_widget(__CLASS__);
    }
}
