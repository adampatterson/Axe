<div class="row mb-2">
    <?php if (has_post_thumbnail() && $show_thumb) { ?>
        <div class="col-md-4 post-image pb-3">
            <a href="<?php the_permalink(); ?>" title="Read Full Post">
                <?php the_post_thumbnail('sidebar', array(
                    'class' => "img-fluid",
                )); ?>
            </a>
        </div>
    <?php } ?>
    <div class="<?= (has_post_thumbnail() && $show_thumb) ? "col-md-8" : "col-md-12" ?>">
        <?php if ($show_date): ?>
            <p><?php Axe\Template::meta_date($show_author) ?></p>
        <?php endif; ?>

        <?php if ($show_category): ?>
            <p class="post-categories"><?php Axe\Template::meta_category(); ?></p>
        <?php endif; ?>

        <p><a href="<?php the_permalink(); ?>" title="Read Full Post"><strong><?php the_title(); ?></strong></a></p>

        <?= ($show_excerpt) ? get_the_excerpt() : '' ?>
    </div>
</div>
