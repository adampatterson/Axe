<?php

namespace Axe\Core;

/**
 * Class TheLoop
 * @package Axe\Core
 *
 * $loop = new Axe\Core\TheLoop;
 * while ($loop->have_posts()) : the_post();
 *      $loop->first()
 *      $loop->index()
 *      $loop->even()
 *      $loop->odd()
 *      $loop->last()
 * endwhile;
 */
class TheLoop
{

    /**
     * @var int
     */
    public $index = 0;

    /**
     * @var string|void|\WP_Query
     */
    private $wp_query;

    /**
     * Pulls the $wp_query from the Global scope.
     */
    public function __construct()
    {
        global $wp_query;
        $this->wp_query = $wp_query;
    }

    /**
     * Exactly the same as have_posts() but also serves
     * as a tidy place to increment the loop.
     *
     * @return bool
     */
    public function have_posts()
    {
        $this->iterate();

        return $this->wp_query->have_posts();
    }

    /**
     * Sets and increments the current index.
     */
    public function iterate()
    {
        $this->index = $this->index + 1;
    }

    /**
     * Returns the current post index on the page.
     *
     * @return int
     */
    public function index()
    {
        return $this->index;
    }

    /**
     * @return bool
     */
    public function first()
    {
        return ($this->index == 1) ? true : false;
    }

    /**
     * @return bool
     */
    public function last()
    {
        return ($this->index == count($this->wp_query->posts)) ? true : false;
    }

    /**
     * @return bool
     */
    public function even()
    {
        return $this->index % 2 == 0;
    }

    /**
     * @return bool
     */
    public function odd()
    {
        return $this->index % 2 !== 0;
    }
}
