<?php

namespace Axe\Core;

class Model
{

    /**
     * @param $taxonomy
     * @param $showAll
     *
     * @return WP_Error|WP_Term[]
     */
    static function getCustomTaxonomyData($taxonomy, $showAll)
    {
        if ($showAll) {
            return wp_get_object_terms(get_the_ID(), $taxonomy);
        }

        return wp_get_object_terms(get_the_ID(), $taxonomy, ['fields' => 'names'])[0];
    }

    static function getTerm()
    {
        return get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
    }
}
