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
}
