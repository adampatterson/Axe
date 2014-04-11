<? get_template_part('templates/header');
if ( have_posts() ) {
    if ( is_front_page() ):
        echo '<!-- template: index/home -->';
        get_template_part('templates/content', 'home');
    elseif( is_search() ):
        echo '<!-- template: index/search -->';
        get_template_part('templates/content', 'search');
    else:
        if ( file_exists(get_template_directory().'/templates/content-'.$post->post_name.'.php')):
            echo '<!-- template: index/'.$post->post_name.' -->';
            get_template_part('templates/content', $post->post_name);
        elseif ( is_home() ):
            echo '<!-- template: index/blog -->';
            get_template_part('templates/content', 'blog');
        else:
            echo '<!-- template: index/page -->';
            get_template_part('templates/content', 'page');
        endif;
    endif;
} else {
  echo '<!-- template: index/no_posts -->';
  get_template_part( 'templates/content', 'none' );
};
get_template_part('templates/footer');
