<?php get_template_part('templates/header'); ?>

<section id="main" role="main">

    <? while ( have_posts() ) : the_post(); ?>

        <? get_template_part( 'templates/content', 'single' ); ?>

    <? endwhile; ?>

</section> <!-- /#main -->

<? get_template_part('templates/footer'); ?>
