<?php
/****************************************
Misc Theme Functions
 *****************************************/

function t() { return get_template_directory_uri().'/'; }
function a() { return t().'assets/'; }
function j() { echo a().'js/'; }
function i() { echo a().'img/'; }
function c() { echo a().'css/'; }

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
