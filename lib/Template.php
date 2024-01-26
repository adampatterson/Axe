<?php


namespace Axe;

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Axe
 */
class Template
{

    public function __construct()
    {
        add_action('edit_category', [$this, 'category_transient_flusher']);
        add_action('save_post', [$this, 'category_transient_flusher']);
    }

    /**
     * Display navigation to next/previous set of posts when applicable.
     */
    public static function pagination_nav()
    {
        // Don't print empty markup if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <ul class="pagination justify-content-center">
                <li class="next <?= (!get_next_posts_link()) ? 'disabled' : '' ?> nav-previous page-item mr-auto">
                    <?php next_posts_link(__('<span class="meta-nav" aria-hidden="true">&larr;</span> Older posts', 'axe')); ?>
                </li>
                <li class="previous <?= (!get_previous_posts_link()) ? 'disabled' : '' ?> nav-next page-item ml-auto">
                    <?php previous_posts_link(__('Newer posts <span class="meta-nav" aria-hidden="true">&rarr;</span>', 'axe')); ?>
                </li>
            </ul>
        </nav>
        <?php
    }

    /**
     * Display navigation to next/previous post when applicable.
     */
    public static function post_nav()
    {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next = get_adjacent_post(false, '', false);

        if (!$next && !$previous) {
            return;
        }
        ?>
        <nav class="navigation post-navigation" role="navigation">
            <ul class="pagination justify-content-center">
                <li class="next <?= (!get_next_post_link()) ? 'disabled' : '' ?> nav-previous page-item mr-auto">
                    <?php next_post_link('%link', __('<span class="meta-nav" aria-hidden="true">&larr;</span> %title', 'Next post link', 'axe')); ?>
                </li>
                <li class="previous <?= (!get_previous_post_link()) ? 'disabled' : '' ?> nav-next page-item ml-auto">
                    <?php previous_post_link('%link', __('%title <span class="meta-nav" aria-hidden="true">&rarr;</span>', 'Previous post link', 'axe')); ?>
                </li>
            </ul>
        </nav>
        <?php
    }

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    public static function posted_on($show_author = true)
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date()));

        $posted_on = sprintf(esc_html_x('Posted on %s', 'post date'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>');

        if ($show_author) {
            $byline = sprintf(esc_html_x('by %s', 'post author'),
                '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>');

            echo "<span class=\"posted-on\">{$posted_on}</span><span class=\"byline\"> {$byline}</span>"; // WPCS: XSS OK.
        } else {
            echo "<span class='posted-on'>{$posted_on}</span>";
        }
    }

    public static function post_author()
    {

    }

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    public static function post_footer()
    {
        // Hide category and tag text for pages.
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(__(', ', 'axe'));
            if ($categories_list && self::categorized_blog()) {
                printf('<span class="cat-links">' . __('Posted in %1$s', 'axe') . '</span>', $categories_list);
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', __(', ', 'axe'));
            if ($tags_list) {
                printf('<span class="tags-links">' . __('Tagged %1$s', 'axe') . '</span>', $tags_list);
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(__('Leave a comment', 'axe'), __('1 Comment', 'axe'), __('% Comments', 'axe'));
            echo '</span>';
        }

        edit_post_link('Edit', '<br/><span class="edit-link">', '</span>');
    }

    public static function post_categories($single = false, $css = '')
    {
        if ('post' == get_post_type()) {
            if (!$single) {
                $categories_list = get_the_category_list(', ');
                if ($categories_list && self::categorized_blog()) {
                    printf('<span class="category-links">' . '<strong>Categories:</strong> %1$s' . '</span>', $categories_list);
                }
            } else {
                $category = current(get_the_category());
                ?>
                <a href="<?= esc_url(get_category_link($category)); ?>"
                   class="category <?= $css ?>"><?= esc_html($category->name); ?></a>
                <?php
            }
        }
    }

    public static function meta_date($show_author = false)
    {
        self::posted_on($show_author);
    }

    public static function meta_category($css = '')
    {
        self::post_categories(true, $css);
    }

    public static function post_tags()
    {
        if ('post' == get_post_type()) {
            $tags_list = get_the_tag_list('', ', ');
            if ($tags_list) {
                printf('<span class="tags-links">' . __('<strong>Tags:</strong> %1$s', 'axe') . '</span>', $tags_list);
            }
        }
    }

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    public static function edit_post()
    {
        edit_post_link(__('Edit', 'axe'), '<span class="edit-link">', '</span>');
    }

    /**
     * Shim for `the_archive_title()`.
     *
     * Display the archive title based on the queried object.
     *
     * @param string $before Optional. Content to prepend to the title. Default empty.
     * @param string $after Optional. Content to append to the title. Default empty.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     *
     */
    public static function the_archive_title($before = '', $after = '')
    {
        if (is_category()) {
            $title = sprintf(__('Category: %s', 'axe'), single_cat_title('', false));
        } elseif (is_tag()) {
            $title = sprintf(__('Tag: %s', 'axe'), single_tag_title('', false));
        } elseif (is_author()) {
            $title = sprintf(__('Author: %s', 'axe'), '<span class="vcard">' . get_the_author() . '</span>');
        } elseif (is_year()) {
            $title = sprintf(__('Year: %s', 'axe'), get_the_date(_x('Y', 'yearly archives date format', 'axe')));
        } elseif (is_month()) {
            $title = sprintf(__('Month: %s', 'axe'), get_the_date(_x('F Y', 'monthly archives date format', 'axe')));
        } elseif (is_day()) {
            $title = sprintf(__('Day: %s', 'axe'), get_the_date(_x('F j, Y', 'daily archives date format', 'axe')));
        } elseif (is_tax('post_format', 'post-format-aside')) {
            $title = _x('Asides', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-gallery')) {
            $title = _x('Galleries', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-image')) {
            $title = _x('Images', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-video')) {
            $title = _x('Videos', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-quote')) {
            $title = _x('Quotes', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-link')) {
            $title = _x('Links', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-status')) {
            $title = _x('Statuses', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-audio')) {
            $title = _x('Audio', 'post format archive title', 'axe');
        } elseif (is_tax('post_format', 'post-format-chat')) {
            $title = _x('Chats', 'post format archive title', 'axe');
        } elseif (is_post_type_archive()) {
            $title = sprintf(__('Archives: %s', 'axe'), post_type_archive_title('', false));
        } elseif (is_tax()) {
            $tax = get_taxonomy(get_queried_object()->taxonomy);
            /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = sprintf(__('%1$s: %2$s', 'axe'), $tax->labels->singular_name, single_term_title('', false));
        } else {
            $title = __('Archives', 'axe');
        }

        /**
         * Filter the archive title.
         *
         * @param string $title Archive title to be displayed.
         */
        $title = apply_filters('get_the_archive_title', $title);

        if (!empty($title)) {
            echo $before . $title . $after;
        }
    }

    /**
     * Shim for `the_archive_description()`.
     *
     * Display category, tag, or term description.
     *
     * @param string $before Optional. Content to prepend to the description. Default empty.
     * @param string $after Optional. Content to append to the description. Default empty.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     *
     */
    public static function the_archive_description($before = '', $after = '')
    {
        $description = apply_filters('get_the_archive_description', term_description());

        if (!empty($description)) {
            /**
             * Filter the archive description.
             *
             * @param string $description Archive description to be displayed.
             *
             * @see term_description()
             *
             */
            echo $before . $description . $after;
        }
    }

    /**
     * Returns true if a blog has more than 1 category.
     *
     * @return bool
     */
    public static function categorized_blog()
    {
        if (false === ($all_the_cool_cats = get_transient('axe_categories'))) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories([
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ]);

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('axe_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1) {
            // This blog has more than 1 category so categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so categorized_blog should return false.
            return false;
        }
    }

    /**
     * Flush out the transients used in categorized_blog.
     */
    public function category_transient_flusher()
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        // Like, beat it. Dig?
        delete_transient('axe_categories');
    }
}
