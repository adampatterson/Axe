<?php


namespace Axe\Core;

class Model
{

    /**
     * @param $taxonomy
     * @param $showAll
     *
     * @return WP_Error|WP_Term[]
     *
     * static function getCustomTaxonomy($showAll = false) {
     *     return self::getCustomTaxonomyData(['custom-taxonomy'], $showAll);
     * }
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

    static function data()
    {
        return get_fields();
    }

    static function post()
    {
        return get_post();
    }


//    static function getPostTypeByTaxonomy($term)
//    {
//        return new \WP_Query([
//            'post_type' => 'post-type',
//            'tax_query' => [
//                [
//                    'taxonomy' => 'taxonomy',
//                    'terms'    => [$term],
//                    'field'    => 'slug',
//                ]
//            ]
//        ]);
//    }

}
