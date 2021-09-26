<?php

namespace Axe\Core;

class Options
{
    public function __construct()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page();
            acf_add_options_sub_page('General Settings');
        }
    }

    static function get($key = null)
    {
        $options = [
//            'contact'  => get_field('contact', 'option'),
//            'branding' => get_field('branding', 'option'),
        ];

        if (array_key_exists($key, $options)) {
            return $options[$key];
        }

        return $options;
    }
}
