<?php
/**
 * The Header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= __c() ?>style.css"/>
</head>

<body <?php body_class($post->post_name); ?>>

<div id="wrapper">
<? get_template_part('templates/partials/navigation'); ?>


<? /*
     <div id="sidebar">
        <? get_template_part('templates/partials/sidebar'); ?>
    </div>
*/ ?>
