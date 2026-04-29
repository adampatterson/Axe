<?php
/*
 * Template Name: Flexible Content
 */

include(__THEME_DATA__ . '/lib/data.php');

get_acf_part('templates/partials/header');
?>
    <div class="content-wrapper">
        <div class="container pt-5">
            <div class="row">
                <?php while (have_posts()) :
                    the_post();
                    echo '<!-- template/template-flex -->'; ?>
                    <div <?php post_class('content-wrapper'); ?>>
                        <?php if (_has($data, 'builder', false)):
                            foreach (_get($data, 'builder', []) as $block):
                                get_acf_block($block);
                                unset($block); // Don't let the data bleed out
                            endforeach;
                        endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

<?php get_acf_part('templates/partials/footer');
