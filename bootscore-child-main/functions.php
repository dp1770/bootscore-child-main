<?php

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled main.css
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);

  wp_enqueue_style('owl-carousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
  wp_enqueue_style('owl-carousel-style', get_stylesheet_directory_uri() . '/css/owl.theme.default.css');

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
  wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', false, '', true);
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        if(isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
                if($type == 'case_studies') {
                    $query->set('post_type',array('case_studies'));
                }
        }       
    }
return $query;
}
add_filter('pre_get_posts','searchfilter');