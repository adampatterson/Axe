<?php

namespace Axe\Setup;

class WooCommerce
{

    public function __construct()
    {
        add_filter('loop_shop_per_page', [$this, 'loop_shop_per_page'], 999);
        add_filter('loop_shop_columns', [$this, 'loop_columns'], 999);
    }

    /**
     * Changes the number of results per page
     *
     * @param $cols
     *
     * @return int
     */
    public function loop_shop_per_page($cols)
    {
        return 9;
    }

    /**
     * Changes the number of products per row.
     *
     * @return int
     */
    function loop_columns()
    {
        return 3;
    }
}
