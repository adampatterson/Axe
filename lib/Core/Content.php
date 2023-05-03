<?php

namespace Axe\Core;

class Content
{

    public function __construct()
    {
        //
    }

    public static function getFields()
    {
        return get_fields();
    }

    public static function getPosts()
    {
        return get_post();
    }

    public static function getOptions()
    {
        return Options::get();
    }
}
