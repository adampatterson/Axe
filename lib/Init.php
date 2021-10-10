<?php

namespace Axe;

class Init
{

    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services()
    {
        return [
            Core\Media::class,
            Core\Options::class,
            Core\Walker::class,
//            Core\Widgets::class,
            Core\TheLoop::class,
            Setup\Acf::class,
            Setup\Admin::class,
            Setup\About::class,
            Setup\Customizer::class,
            Setup\JetPack::class,
            Setup\WooCommerce::class,
            Setup\Menu::class,
            Setup\Theme::class,
            Template::class,
            Custom::class,
        ];
    }

    /**
     * Loop through the classes, initialize them, and call the register() method if it exists
     * @return
     */
    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
        }
    }

    /**
     * Initialize the class
     *
     * @param  class  $class  class from the services array
     *
     * @return class instance        new instance of the class
     */
    private static function instantiate($class)
    {
        return new $class();
    }
}
