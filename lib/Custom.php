<?php

namespace Axe;

class Custom
{

    public function __construct()
    {
        // Places a link under Appearance in order to manage reusable Gutenberg Blocks.
        add_action('admin_menu', [$this, 'add_custom_link_into_appearance_menu']);

        add_filter('gform_submit_button', [$this, 'form_submit_button'], 10, 2);
    }

    public function add_custom_link_into_appearance_menu()
    {
        global $submenu;
        $blockLink             = 'edit.php?post_type=wp_block';
        $submenu['edit.php'][] = ['Edit Reusable Blocks', 'manage_options', $blockLink];
    }

    function form_submit_button($button, $form)
    {
        return "<button class='btn btn-primary' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span></button>";
    }

}
