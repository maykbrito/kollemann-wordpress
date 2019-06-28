<?php
// styles of child theme
function uni_child_theme_style() {

    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

    wp_register_style( 'ball-clip-rotate-style', get_template_directory_uri() . '/css/ball-clip-rotate.css', '0.1.0' );
    wp_enqueue_style( 'ball-clip-rotate-style');

    wp_register_style( 'bxslider-style', get_template_directory_uri() . '/css/bxslider.css', '4.2.3' );
    wp_enqueue_style( 'bxslider-style');

    wp_register_style( 'fancybox-style', get_template_directory_uri() . '/css/fancybox.css', '2.1.5' );
    wp_enqueue_style( 'fancybox-style');

    wp_register_style( 'jscrollpane-style', get_template_directory_uri() . '/css/jscrollpane.css', '2.1.5' );
    wp_enqueue_style( 'jscrollpane-style');

    wp_register_style( 'unitheme-style', get_template_directory_uri() . '/style.css', array('bxslider-style', 'fancybox-style', 'jscrollpane-style'), '1.0.0', 'all' );
    wp_enqueue_style( 'unitheme-style' );

    wp_register_style( 'unitheme-adaptive', get_template_directory_uri() . '/css/adaptive.css', array('unitheme-style'), '1.0.0', 'screen' );
    wp_enqueue_style( 'unitheme-adaptive' );

    wp_register_style( 'unichild-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'screen' );
    wp_enqueue_style( 'unichild-style' );
}
add_action( 'wp_enqueue_scripts', 'uni_child_theme_style' );
?>