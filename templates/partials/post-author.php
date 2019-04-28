<div class="col-md-2">
    <?php echo get_avatar(get_the_author_meta('ID'), 96); ?>
</div>
<div class="col-md-10">
    <h3>About <?php the_author_posts_link(); ?></h3>
    <p><?php echo get_the_author_meta('description'); ?></p>
</div>
