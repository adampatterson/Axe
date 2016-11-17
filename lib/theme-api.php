<?php

class WordPressAPI
{

    public function __construct()
    {
        // http://v2.wp-api.org/extending/adding/
        add_action('rest_api_init', function () {
            register_rest_route('axe', '/sample', array(
                'methods'  => 'GET',
                'callback' => array(
                    $this,
                    'sampleEndPoint'
                ),
            ));
        });
    }

    public function sampleEndPoint(){
        return ['one', 'two'];
    }
}

new WordPressAPI;