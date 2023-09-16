<?php

namespace Axe\Models;

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
//            'contact'       => get_field('contact', 'option'),
//            'theme'         => get_field('theme', 'option'),
//            '404_page'      => get_field('404', 'option'),
        ];

        if (_has($options, $key)) {
            return $options[$key];
        }

        return $options;
    }
}
