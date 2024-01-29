<?php

namespace Axe\Models;

class Content
{
    public function __construct()
    {

    }

    public static function getACF()
    {
        return get_fields();
    }

    public static function getACFCollection()
    {
        return collect(self::getACF());
    }

    public static function getPost()
    {
        return get_post();
    }

    static function getTerm()
    {
        return get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    }

    public static function getOptions()
    {
        return Options::get();
    }

    public static function getOptionsCollection()
    {
        return collect(self::getOptions());
    }
}
