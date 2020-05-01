<?php

namespace Axe\Widgets;

use WP_Query;
use WP_Widget;

class Posts extends WP_Widget
{

    /**
     * Posts constructor.
     */
    function __construct()
    {
        parent::__construct('axe_widget_post',

            __('Axe - Recent Posts', 'axe'),

            ['description' => __('Axe Recent posts.', 'axe')]);
    }

    /**
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $title  = apply_filters('widget_title', $instance['title']);
        $number = apply_filters('widget_number', $instance['number']);

        $query_args = array('posts_per_page' => $instance['number'], 'ignore_sticky_posts' => 1);

        // Show by tag
        if ( ! empty($instance['by_tag'])) {
            $query_args = array_merge($query_args, array('tag' => $instance['by_tag']));
        }

        $query = new WP_Query(apply_filters('bunyad_widget_posts_query_args', $query_args));


        // Before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // This is where you run the code and display the output
        echo __('Content Here!', 'axe');

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
        ?>

        <p>
            <label for="<?= esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?= esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts:'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('number'); ?>" name="<?= $this->get_field_name('number'); ?>" type="number" step="1" min="1" size="3" value="<?= esc_attr($number); ?>"/>
        </p>

        <p>
            <label for="<?= esc_attr($this->get_field_id('by_tag')); ?>"><?php _e('By Tag:'); ?></label>
            <input class="widefat" id="<?= $this->get_field_id('by_tag'); ?>" name="<?= $this->get_field_name('by_tag'); ?>" type="text" value="<?= esc_attr($by_tag); ?>"/>
        </p>

        <p>
            <label for="<?= esc_attr($this->get_field_id('style')); ?>"><?= esc_html_x('Style:', 'Admin', 'axe'); ?></label>

            <select id="<?= esc_attr($this->get_field_id('style')); ?>" name="<?= esc_attr($this->get_field_name('style')); ?>" class="widefat">
                <option value="" <?php selected($style, ''); ?>><?= esc_html_x('Small - Meta Above', 'Admin', 'axe'); ?></option>
                <option value="meta-below" <?php selected($style, 'meta-below'); ?>><?= esc_html_x('Small - Meta Below', 'Admin', 'axe'); ?></option>
                <option value="large" <?php selected($style, 'large'); ?>><?= esc_html_x('Medium - Medium Image & Meta', 'Admin', 'axe'); ?></option>
                <option value="full" <?php selected($style, 'full'); ?>><?= esc_html_x('Full Width Image & Large Title', 'Admin', 'axe'); ?></option>
            </select>
        </p>

        <p>
            <input id="<?= esc_attr($this->get_field_id('show_excerpt')); ?>" name="<?= esc_attr($this->get_field_name('show_excerpt')); ?>" type="checkbox" class="checkbox" <?php checked($show_excerpt); ?> />
            <label for="<?= esc_attr($this->get_field_id('show_excerpt')); ?>"><?= esc_html_x('Show Excerpt', 'Admin', 'axe'); ?></label>
        </p>

        <p>
            <input id="<?= esc_attr($this->get_field_id('show_date')); ?>" name="<?= esc_attr($this->get_field_name('show_date')); ?>" type="checkbox" class="checkbox" <?php checked($show_date); ?> />
            <label for="<?= esc_attr($this->get_field_id('show_date')); ?>"><?= esc_html_x('Show Date', 'Admin', 'axe'); ?></label>
        </p>

        <p>
            <input id="<?= esc_attr($this->get_field_id('show_thumb')); ?>" name="<?= esc_attr($this->get_field_name('show_thumb')); ?>" type="checkbox" class="checkbox" value="1" <?php checked($show_thumb); ?> />

            <label for="<?= esc_attr($this->get_field_id('show_thumb')); ?>"><?= esc_html_x('Show Thumbnails', 'Admin', 'axe'); ?></label>
        </p>

        <?php
    }

    public function register_widget()
    {
        register_widget(__CLASS__);
    }
}
