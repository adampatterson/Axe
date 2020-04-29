<?php

namespace Axe\Setup;

class Customizer
{

    // https://codex.wordpress.org/Theme_Customization_API

    // Enable Sidebar
    // Sidebar
    // Blog
    // Home
    // WooCommerce
    // Footer
    // Hero Background
    // Fav Icon
    // Site Logo

    public function __construct()
    {
        add_action('customize_register', [$this, 'axe_theme_customize_register']);
    }

    public function axe_theme_customize_register($wp_customize)
    {
// Theme layout settings.
        $wp_customize->add_section('understrap_theme_layout_options', array(
            'title'       => __('Theme Layout Settings', 'axe'),
            'capability'  => 'edit_theme_options',
            'description' => __('Container width and sidebar defaults', 'axe'),
            'priority'    => 160,
        ));

        $wp_customize->add_setting('understrap_container_type', array(
            'default'           => 'container',
            'type'              => 'theme_mod',
            'sanitize_callback' => [$this, 'axe_theme_slug_sanitize_select'],
            'capability'        => 'edit_theme_options',
        ));

        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'understrap_container_type', array(
            'label'       => __('Container Width', 'axe'),
            'description' => __('Choose between Bootstrap\'s container and container-fluid', 'axe'),
            'section'     => 'understrap_theme_layout_options',
            'settings'    => 'understrap_container_type',
            'type'        => 'select',
            'choices'     => array(
                'container'       => __('Fixed width container', 'axe'),
                'container-fluid' => __('Full width container', 'axe'),
            ),
            'priority'    => '10',
        )));

        $wp_customize->add_setting('understrap_sidebar_position', array(
            'default'           => 'right',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
            'capability'        => 'edit_theme_options',
        ));

        $wp_customize->add_control(new \WP_Customize_Control($wp_customize, 'understrap_sidebar_position', array(
            'label'             => __('Sidebar Positioning', 'axe'),
            'description'       => __('Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.', 'axe'),
            'section'           => 'understrap_theme_layout_options',
            'settings'          => 'understrap_sidebar_position',
            'type'              => 'select',
            'sanitize_callback' => [$this, 'axe_theme_slug_sanitize_select'],
            'choices'           => array(
                'right' => __('Right sidebar', 'axe'),
                'left'  => __('Left sidebar', 'axe'),
                'both'  => __('Left & Right sidebars', 'axe'),
                'none'  => __('No sidebar', 'axe'),
            ),
            'priority'          => '20',
        )));
    }

    /**
     * Select sanitization function
     *
     * @param string $input Slug to sanitize.
     * @param WP_Customize_Setting $setting Setting instance.
     *
     * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
     */
    public function axe_theme_slug_sanitize_select($input, $setting)
    {

        // Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
        $input = sanitize_key($input);

        // Get the list of possible select options.
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);

    }

}

