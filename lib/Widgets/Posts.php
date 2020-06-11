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
        $basePath = '';

        // Defaults, On preview none of the variables will be set.
        $title         = (array_key_exists('title', $instance) ? $instance['title'] : __('Recent Posts', 'axe'));
        $number        = (array_key_exists('number', $instance) ? $instance['number'] : 5);
        $style         = (array_key_exists('style', $instance) ? $instance['style'] : 'full');
        $show_excerpt  = (array_key_exists('show_excerpt', $instance) ? $instance['show_excerpt'] : true);
        $show_date     = (array_key_exists('show_date', $instance) ? $instance['show_date'] : true);
        $show_thumb    = (array_key_exists('show_thumb', $instance) ? $instance['show_thumb'] : true);
        $show_category = (array_key_exists('show_category', $instance) ? $instance['show_category'] : true);
        $show_author   = (array_key_exists('show_author', $instance) ? $instance['show_author'] : false);

        $query_args = array('posts_per_page' => $number, 'ignore_sticky_posts' => 1);

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
        ?>
        <div class="axe-widget-posts container">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                // While not using ACF here, get_template_part_acf allows data set here to be accessed inside of the widget template.
                include(get_template_part_acf('templates/widgets/posts', $style));
            }
            ?>
        </div>
        <?php
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

        $new['show_excerpt']  = ! empty($new['show_excerpt']) ? 1 : 0;
        $new['show_date']     = ! empty($new['show_date']) ? 1 : 0;
        $new['show_thumb']    = ! empty($new['show_thumb']) ? 1 : 0;
        $new['show_category'] = ! empty($new['show_category']) ? 1 : 0;
        $new['show_author']   = ! empty($new['show_author']) ? 1 : 0;

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
            'title'         => __('Recent Posts', 'axe'),
            'by_tag'        => '',
            'style'         => 'full',
            'number'        => 5,
            'show_thumb'    => 1,
            'show_category' => 1,
            'show_date'     => 1,
            'show_excerpt'  => 0,
            'show_author'   => 0,
        );

        $instance = array_merge($defaults, (array)$instance);
        extract($instance);

        echo $this->input($title, 'title', 'Title:');
        echo $this->input($number, 'number', 'Number of posts:', 'number');
        echo $this->input($by_tag, 'by_tag', 'By Tag:');

        echo $this->check($show_excerpt, 'show_excerpt', __('Show Excerpt', 'axe'));
        echo $this->check($show_date, 'show_date', __('Show Date', 'axe'));
        echo $this->check($show_thumb, 'show_thumb', __('Show Thumbnails', 'axe'));
        echo $this->check($show_category, 'show_category', __('Show Category', 'axe'));
        echo $this->check($show_author, 'show_author', __('Show Author', 'axe'));

        echo $this->select($style, 'style', __('Style:', 'axe'), [
            'meta-above' => __('Medium - Meta Above', 'axe'),
            'meta-below' => __('Medium - Meta Below', 'axe'),
            'full'       => __('Full - Meta Below Full Width Image & Large Title', 'axe')
        ]);
    }

    public function register_widget()
    {
        register_widget(__CLASS__);
    }
}
