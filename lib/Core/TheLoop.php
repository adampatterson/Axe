<?php

namespace Axe\Core;

/**
 * Class TheLoop
 * @package Axe\Core
 */
class TheLoop
{

    /**
     * Example usage:
     *  ```
     *  $loop = new Axe\Core\TheLoop;
     *  while ($loop->have_posts()) : the_post();
     *       $loop->first()
     *       $loop->index()
     *       $loop->iteration()
     *       $loop->count()
     *       $loop->even()
     *       $loop->odd()
     *       $loop->last()
     *  endwhile;
     *  ```
     */

    public int $index = 0;

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
    public function have_posts(): bool
    {
        $this->iterate();

        return $this->wp_query->have_posts();
    }

    /**
     * Sets and increments the current index.
     */
    private function iterate(): void
    {
        ++$this->index;
    }

    /**
     * The index of the current loop iteration (starts at 0).
     *
     * @return int
     */
    public function index(): int
    {
        return $this->index - 1;
    }

    /**
     * The current loop iteration (starts at 1).
     *
     * @return int
     */
    public function iteration(): int
    {
        return $this->index;
    }

    /**
     * The total number of posts being iterated.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->wp_query->posts);
    }

    public function first(): bool
    {
        return $this->index === 1;
    }

    public function last(): bool
    {
        return $this->index === count($this->wp_query->posts);
    }

    public function even(): bool
    {
        return $this->index % 2 === 0;
    }

    public function odd(): bool
    {
        return $this->index % 2 !== 0;
    }

    public function is(int $count): bool
    {
        return $this->iteration() === $count;
    }

}
