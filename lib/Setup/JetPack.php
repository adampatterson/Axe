<?php

namespace Axe\Setup;

/**
 * Load Jetpack compatibility file.
 * See: http://jetpack.me/support/infinite-scroll/
 * todo: adjust content classes
 */
class JetPack
{

    public function register()
    {
        if ( ! class_exists('Jetpack')) {
            return;
        }

        add_filter('jetpack_photon_pre_args', array($this, 'photon_compression'));

        add_action('after_setup_theme', [$this, 'handle_jetpack_setup']);
    }

    /**
     * Add theme support for Infinite Scroll.
     * See: http://jetpack.me/support/infinite-scroll/
     */
    public function handle_jetpack_setup()
    {
        add_theme_support('infinite-scroll', array(
            'container' => 'main',
            'render'    => array($this, 'infinite_scroll_render'),
            'footer'    => 'page',
        ));

    }

    public function infinite_scroll_render()
    {
        while (have_posts()) {
            the_post();
            if (is_search()) :
                var_dump('infinate search');
//                get_template_part('views/content', 'search');
            else :
                var_dump('infinate posts');

//                get_template_part('views/content', get_post_format());
            endif;
        }
    }

    public function photon_compression($args)
    {
        $args['quality'] = 100;
        $args['strip']   = 'all';

        return $args;
    }
}
