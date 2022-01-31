<?php

namespace Axe\Core;


class Content
{

    /**
     * @var array|false|mixed
     */
    private $data;
    private $post;

    public function __construct()
    {
        $this->data = get_fields();
        $this->post = get_post();
    }

    public function index()
    {
        echo '<!-- master/index -->';
        if (have_posts()):
            # Sort this out, Blog is not loading
            if (is_front_page() or is_home()):
                echo '<!-- template: index/blog -->';
                include(get_template_part_acf('templates/content', 'blog'));
            endif;
        else:
            echo '<!-- template: index/no_posts -->';
            include(get_template_part_acf('templates/none'));
        endif;
    }

    public function page()
    {
        global $post;
        echo '<!-- master/page -->';
        while (have_posts()) : the_post();
            if (is_front_page()):
                echo '<!-- template: templates/content-home -->';
                include(get_template_part_acf('templates/content', 'home'));
            else:
                if (is_sub_page($post)):
                    $patent = get_post($post->post_parent);
                    if (check_path('/templates/sub-'.$post->post_name.'.php')):
                        echo '<!-- template: templates/sub-'.$post->post_name.' -->';
                        include(get_template_part_acf('templates/sub', $post->post_name));
                    elseif (check_path('/templates/content-'.$patent->post_name.'.php')):
                        echo '<!-- template: templates/content-'.$patent->post_name.' -->';
                        include(get_template_part_acf('templates/content', $patent->post_name));
                    else:
                        echo '<!-- template: templates/content-page.php -->';
                        include(get_template_part_acf('templates/content', 'page'));
                    endif;

                //      Single Page
                elseif (check_path('/templates/content-'.$post->post_name.'.php')):
                    echo '<!-- template: templates/content-'.$post->post_name.' -->';
                    include(get_template_part_acf('templates/content', $post->post_name));

                //      WooCommerce Product Listing
                elseif (show_woo_listing()):
                    echo '<!-- template: templates/woo-listing -->';
                    include(get_template_part_acf('templates/woo', 'listing'));
                elseif (show_woo_category()):
                    echo '<!-- template: templates/woo-category -->';
                    include(get_template_part_acf('templates/woo', 'category'));
                else:
                    echo '<!-- template: templates/content-page -->';
                    include(get_template_part_acf('templates/content', 'page'));
                endif;
            endif;
        endwhile;
    }

    public function single()
    {
        $data = $this->data;

        echo '<!-- master/single -->';
        if (have_posts()):
            while (have_posts()):
                the_post();

                // Post Format
                if (check_path('/templates/format-'.get_post_format().'.php')):
                    echo '<!-- template: templates/format-'.get_post_format().' -->';
                    include(get_template_part_acf('templates/format', get_post_format()));

                // Fallback for missing Post Formats
                elseif (get_post_type() == 'post' && ! get_post_format()):
                    echo '<!-- template: templates/format-standard -->';
                    include(get_template_part_acf('templates/format', 'standard'));

                // Attachment
                elseif (is_attachment()):
                    echo '<!-- template: templates/single-attachment.php -->';
                    include(get_template_part_acf('templates/single', 'attachment'));

                // Custom Post Type
                elseif (check_path('/templates/single-'.get_post_type().'.php')):
                    echo '<!-- template: templates/single-'.get_post_type().'.php -->';
                    include(get_template_part_acf('templates/single', get_post_type()));

                // WooCommerce Single Product
                elseif (function_exists('is_product') and is_product()):
                    echo '<!-- template: woo/single -->';
                    include(get_template_part_acf('templates/woo', 'single'));

                // If everything fails use content-single.php
                else:
                    echo '<!-- template: templates/content-single -->';
                    include(get_template_part_acf('templates/format', 'standard'));

                endif;
            endwhile;
        endif;
    }

    public function archive()
    {
        echo '<!-- master/archive -->';

        if (have_posts()):
            if (is_archive()):
                $post_type = get_post_type();

                if ($post_type) {
                    $post_type_data = get_post_type_object($post_type);
                    $post_type_slug = $post_type_data->rewrite['slug'];
                }

                if (check_path('/templates/archive-'.$post_type_slug.'.php')):
                    echo '<!-- template: index/archive-'.$post_type_slug.' -->';
                    include(get_template_part_acf('templates/archive', $post_type_slug));
                else:
                    echo '<!-- template: index/archive -->';
                    include(get_template_part_acf('templates/archive', 'default'));
                endif;
            endif;

        else:
            echo '<!-- template: index/no_posts -->';
            include(get_template_part_acf('templates/archive', 'default'));
        endif;
    }

    public function category()
    {
        $cat           = get_query_var('cat');
        $category      = get_category($cat);
        $category_slug = $category->slug;
        $post          = get_post();

        echo '<!-- master/tag -->';
        if (check_path('/templates/archive-'.$category_slug.'.php')):
            echo '<!-- template: archive/'.$category_slug.' -->';
            include(get_template_part_acf('templates/archive', $category_slug));
        else:
            echo '<!-- template: archive/tag -->';
            include(get_template_part_acf('templates/archive', 'category'));
        endif;
    }

    public function search()
    {
        echo '<!-- master/search -->';
        if (have_posts()):
            echo '<!-- template: search/search -->';
            include(get_template_part_acf('templates/content', 'search'));
        else:
            echo '<!-- template: search/no_posts -->';
            include(get_template_part_acf('templates/none'));
        endif;
    }

    public function tag()
    {
        $term_id  = get_query_var('tag_id');
        $taxonomy = 'post_tag';
        $args     = 'include='.$term_id;
        $terms    = get_terms($taxonomy, $args);
        $post     = get_post();

        $term_slug = (is_array($terms)) ? $terms[0]->slug : '';

        echo '<!-- master/tag -->';
        if (check_path('/templates/archive-'.$term_slug.'.php')):
            echo '<!-- template: archive/'.$term_slug.' -->';
            include(get_template_part_acf('templates/archive', $term_slug));
        else:
            echo '<!-- template: archive/tag -->';
            include(get_template_part_acf('templates/archive', 'tag'));
        endif;
    }
}
