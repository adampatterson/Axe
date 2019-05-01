<footer class="row entry-footer terms mt-4">
    <div class="col-md-12">
        <p class="post-categories"><?php axe_entry_categories(); ?></p>
        <p class="post-tags"><?php axe_entry_tags(); ?></p>
    </div>
</footer>

<div class="row post-navigation">
    <div class="col-md-12 my-5">
        <?php axe_post_nav(); ?>
    </div>
</div>

<div class="row post-author mb-5">
    <?php get_template_part('templates/partials/post-author') ?>
</div>

<?php get_template_part('templates/partials/mailing-list') ?>

<?php get_template_part('templates/partials/post-comments') ?>
