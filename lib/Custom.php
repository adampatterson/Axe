<?php

namespace Axe;

class Custom
{
    public function __construct()
    {
        // Places a link under Appearance in order to manage reusable Gutenberg Blocks.
        add_action('admin_menu', [$this, 'add_custom_link_into_appearance_menu']);
        //        add_filter('acf/settings/save_json', [$this, 'acf_save']);
    }

    public function add_custom_link_into_appearance_menu()
    {
        global $submenu;
        $blockLink = 'edit.php?post_type=wp_block';
        $submenu['edit.php'][] = array('Edit Reusable Blocks', 'manage_options', $blockLink);
    }

    public function acf_save()
    {
        return get_template_directory() . '/acf-json';
    }

}
