<? get_template_part('templates/header');
if ( have_posts() ):
    echo '<!-- '.$post->post_name.'-->';
    if ( is_front_page() ) {
        get_template_part('templates/content', 'home');
    } else {
        if ( file_exists(get_template_directory().'/templates/content-'.$post->post_name.'.php'))
            get_template_part('templates/content', $post->post_name);
        else
            get_template_part('templates/content', 'page');
    }
endif;
get_template_part('templates/footer');