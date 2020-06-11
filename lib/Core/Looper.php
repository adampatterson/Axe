<?php

namespace Axe\Core;

class Looper
{

    public $index = 0;
    private $wp_query;

    public function __construct()
    {
        global $wp_query;
        $this->wp_query = $wp_query;
    }

    public function have_posts()
    {
        $this->iterate();

        return $this->wp_query->have_posts();
    }

    public function iterate()
    {
        $this->index = $this->index + 1;
    }

    public function index()
    {
        return $this->index;
    }

    public function first()
    {
        return ($this->index == 1) ? true : false;
    }

    public function last()
    {
        return ($this->index == count($this->wp_query->posts)) ? true : false;
    }

    public function even()
    {
        return $this->index % 2 == 0;
    }

    public function odd()
    {
        return $this->index % 2 !== 0;
    }
}
