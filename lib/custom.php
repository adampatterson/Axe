<?php
/****************************************
Misc Theme Functions
 *****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
function ax_add_post_type_caps() {
    ax_add_capabilities( 'portfolio' );
}

function t() { return get_template_directory_uri().'/'; }
function a() { return t().'/assets'; }
function j() { return a().'/js/'; }
function i() { return a().'/img/'; }
function c() { return a().'/css/'; }
function e($echo=null) { echo $echo;}

function underscore($string) { return strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $string)); }

// categorie list
function get_cat_hierchy($parent,$args){
    $cats = get_categories($args);
    $ret = new stdClass;

    foreach($cats as $cat){
        if($cat->parent==$parent){
            $id = $cat->cat_ID;
            $ret->$id = $cat;
            $ret->$id->children = get_cat_hierchy($id,$args);
        }
    }

    return (array)$ret;
}
