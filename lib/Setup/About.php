<?php

namespace Axe\Setup;

class About
{

    public function __construct()
    {
        add_action('admin_menu', [$this, 'axe_about_page']);
    }

    public function axe_about_page()
    {
        add_theme_page('About Axe', 'About Axe', 'edit_theme_options', 'about-axe', [$this, 'axe_about_page_output']);
    }

    public function axe_about_page_output()
    {
        $theme_data = wp_get_theme();
        ?>
        <div class="wrap">
            <div class="welcome-text">
                <h1>About Axe</h1>

                <p>Coming Soon!</p>

                <h3>Recommended Plugins</h3>
                <ul>
                    <li>WooCommerce</li>
                    <li>Advanced Custom Fields</li>
                    <li>Custom Post Type UI</li>
                    <li>JetPack</li>
                </ul>
            </div>
        </div>
        <?php
    }
}
