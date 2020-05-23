<?php

namespace Axe\Widgets;

trait Base
{

    public function input($value, $field, $title, $type = 'text')
    {
        ?>
        <p>
            <label for="<?= esc_attr($this->get_field_id($field)); ?>"><?php _e($title); ?></label>
            <input class="widefat" id="<?= $this->get_field_id($field); ?>" name="<?= $this->get_field_name($field); ?>" type="<?= $type ?>" value="<?= esc_attr($value); ?>"/>
        </p>
        <?php
    }

    public function check($value, $field, $title)
    {
        ?>
        <p>
            <input id="<?= esc_attr($this->get_field_id($field)); ?>" name="<?= esc_attr($this->get_field_name($field)); ?>" type="checkbox" class="checkbox" <?php checked($value); ?> />
            <label for="<?= esc_attr($this->get_field_id($field)); ?>"><?= esc_html_x($title, 'Admin', 'axe'); ?></label>
        </p>
        <?php
    }

    public function select($value, $field, $title, $options)
    {
        ?>
        <p>
            <label for="<?= esc_attr($this->get_field_id($field)); ?>"><?= esc_html_x($title, 'Admin', 'axe'); ?></label>

            <select id="<?= esc_attr($this->get_field_id($field)); ?>" name="<?= esc_attr($this->get_field_name($field)); ?>" class="widefat">
                <?php foreach ($options as $key => $option): ?>
                    <option value="<?= $key ?>" <?php selected($value, $key); ?>><?= esc_html_x($option, 'Admin', 'axe'); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }
}
