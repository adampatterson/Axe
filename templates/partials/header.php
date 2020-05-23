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
    <link rel="stylesheet" href=" <?= mix('/assets/css/base.css') ?>"/>
</head>
<?php
$post = ( ! isset($post)) ? null : $post;
if (is_null($post)) {
    $post            = (object)$post;
    $post->post_name = '';
}
?>
<body <?php body_class($post->post_name); ?>>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date()
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]
        a.async = 1
        a.src = g
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga')

    ga('create', '{@todo: GA Tracking}', 'auto')
    ga('send', 'pageview')
</script>
<div id="wrapper">
    <?php get_template_part('templates/partials/navigation'); ?>

    <?php get_template_part('templates/partials/custom-header'); ?>


