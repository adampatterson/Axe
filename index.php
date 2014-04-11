<? get_template_part('templates/header');
if ( have_posts() ):
    if ( is_front_page() ):
        get_template_part( 'templates/content', 'home' );
    elseif( is_search() ):
        get_template_part('templates/content', 'search');
    else:
        if ( file_exists(get_template_directory().'/templates/content-'.$post->post_name.'.php'))
            get_template_part('templates/content', $post->post_name);
        else
            get_template_part('templates/content', 'page');
    endif;
else:
    get_template_part( 'templates/content', 'none' );
endif;
get_template_part('templates/footer');