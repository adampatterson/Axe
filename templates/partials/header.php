<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"WebSite","url":"<?= home_url('/'); ?>
        ","name":"<?= bloginfo('name') ?>","potentialAction":{"@type":"SearchAction","target":"<?= home_url('/'); ?>?s={search_term}","query-input":"required name=search_term"}}
    </script>

    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= mix('/assets/css/base.css', true) ?>"/>
</head>
<?php
$post = ( ! isset($post)) ? null : $post;
if (is_null($post)) {
    $post            = (object) $post;
    $post->post_name = '';
}
?>
<body <?php body_class($post->post_name); ?>>
<div id="wrapper">
    <?php include(get_template_part_acf('templates/partials/navigation')); ?>

    <?php include(get_template_part_acf('templates/partials/custom-header')); ?>


