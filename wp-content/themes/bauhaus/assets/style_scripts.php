<?php

/**
 * We print the scripts and styles in the frontend
 */


add_action( 'wp_enqueue_scripts', 'bauhaus_style_scripts', 500 );


/**
 *
 */
function bauhaus_style_scripts() {
	global $post, $wp_query, $bauhaus_class;
	$type = bauhaus_get_tememe_color();
	if ( $type == 'dark' ) {
		wp_enqueue_style( 'bauhaus-main-style', get_template_directory_uri() . '/css/dark-style.css' );
	} else {
		wp_enqueue_style( 'bauhaus-main-style', get_template_directory_uri() . '/css/style.css' );
	}


	wp_enqueue_style( 'bauhaus-style-wp', get_stylesheet_directory_uri() . '/style.css' );

	//************************************* Fonts ***********************************************/

	wp_enqueue_style( 'bauhaus-poppins-Playfair', $bauhaus_class->bauhaus_google_fonts_url( 'Playfair+Display:400,400i,700,700i|Poppins:300,400,500,600,700' ) );
	wp_enqueue_style( 'Libre', $bauhaus_class->bauhaus_google_fonts_url( 'Libre+Baskerville:400i' ) );

	if ( is_customize_preview() && function_exists( 'bauhaus_css_generator_custumize' ) ) {
		wp_add_inline_style( 'bauhaus-style-wp', bauhaus_css_generator_custumize() );
	}


	if ( strlen( get_theme_mod( 'colors_m_D4B068' ) ) > 2 ) {
		if ( get_option( 'bauhaus_color' ) ) {
			wp_add_inline_style( 'bauhaus-style-wp', wp_kses_post( get_option( 'bauhaus_color' ) ) );
		}
	}


	if ( function_exists( 'bauhaus_enqueue_url_base_style' ) && bauhaus_enqueue_url_base_style() == true ) {
		wp_enqueue_style( 'bauhaus-main-style-new', bauhaus_enqueue_url_base_style() );
	}

	$post_thumb = '';
	if ( is_single() || is_page() ) {
		$post_thumb = get_the_post_thumbnail_url( get_the_ID(), 'full' );
	}

	$css = '';


	if ( isset( $post_thumb{8} ) ) {
		$css .= '.bauhaus-feature-img {
                background: url(' . esc_url( $post_thumb ) . ') 50%  no-repeat; 
                  background-size:cover;
                  padding: 16.4rem 15px 19rem;
                 
                }';
	}

	$post_thumb2 = get_the_post_thumbnail_url( get_the_ID(), "bauhaus-image-770x555-croped" );
	if ( isset( $post_thumb2{3} ) ) {
		$css .= '.listing-image {
               background-image:  url(' . esc_url( $post_thumb2 ) . ');


                }';
	}
	if ( isset( $bg{8} ) ) {
		$css .= '.main-blog ,  .page  .main-inner {
                background: url(' . esc_url( $bg ) . ') 50%  no-repeat; 
                 
                }';
	}


	$dots = get_template_directory_uri() . '/images/bg/dots-dark.png';
	$dots2 = get_template_directory_uri() . '/images/bg/dots-dark2.png';
	if ( $type == 'dark' ) {
		$css .= '.bg-dots {
                background: url(' . esc_url( $dots ) . ') 0 0 repeat !important; 
                 }';
		$css .= '.dots-image .dots , .dots-image-2 .dots {
                background: url(' . esc_url( $dots2 ) . ') 0 0 repeat !important; 
                 }';
	}

	wp_enqueue_script( 'bauhaus-main', get_template_directory_uri() . '/js/main.js', array(
		'jquery',
		'jquery-ui-core',

	), '1', true );


	// new js object

	$args_obj = array(

		'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'theme_url' => esc_url( get_template_directory_uri() ),
		'tag' => '',
		'year' => '',
		'monthnum' => '',
		'day' => '',
		's' => '',
		'type' => '',
		'max_num_pages' => esc_html( $wp_query->max_num_pages )
	);

	if ( isset( $wp_query->query['year'] ) && !empty( $wp_query->query['year'] ) ) {
		$args_obj['year'] = esc_html( $wp_query->query['year'] );
	}
	if ( isset( $wp_query->query['monthnum'] ) && !empty( $wp_query->query['monthnum'] ) ) {
		$args_obj['monthnum'] = esc_html( $wp_query->query['monthnum'] );
	}

	if ( isset( $wp_query->query['day'] ) && !empty( $wp_query->query['day'] ) ) {
		$args_obj['day'] = esc_html( $wp_query->query['day'] );
	}
	$s = get_search_query();
	if ( isset( $_GET['s']{1} ) ) {
		$args_obj['s'] = esc_html( $_GET['s'] );
	}

	$args_obj['type'] = bauhaus_get_blog_type();

	if ( isset( $_POST['type']{1} ) ) {
		$args_obj['type'] = esc_html( $_POST['type'] );
	}


// get cat id
	$bauhaus_cat = 0;
	$bauhaus_category = get_category( get_query_var( 'cat' ) );
	if ( isset( $bauhaus_category->cat_ID ) ) {
		$bauhaus_cat = $bauhaus_category->cat_ID;
	} else {
		$bauhaus_cat = 0;
	}

	if ( is_front_page() ) { // is the index page cat = 0
		$args_obj['cat'] = 0;
	} else {
		if ( get_the_category() ) {
			$args_obj['cat'] = sanitize_text_field( $bauhaus_cat );
		}

	}


	if ( isset( $wp_query->query['tag'] ) && !empty( $wp_query->query['tag'] ) ) {
		$args_obj['tag'] = sanitize_text_field( $wp_query->query['tag'] );
	}
	$args_obj['header_pos'] = get_theme_mod( 'bauhaus_performans_header_pos', true );


	wp_localize_script( 'bauhaus-main', 'bauhaus_obj', $args_obj );


	if ( strlen( get_theme_mod( 'colors_m_D4B068' ) ) > 2 ) {
		if ( get_option( 'bauhaus_color' ) ) {
			wp_add_inline_style( 'bauhaus-style_wp', wp_kses_post( get_option( 'bauhaus_color' ) ) );
		}
	}

	wp_add_inline_style( 'bauhaus-main-style', $css );


	/*---------------------------------------- JS --------------------------------------------------------------------------*/
	wp_enqueue_script( 'animsition', get_template_directory_uri() . '/js/animsition.min.js', array( 'jquery' ), '1', true );

	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1', true );

	if ( get_theme_mod( 'bauhaus_performans_scroll', false ) == true ) {
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '1', true );
	}
	wp_enqueue_script( 'jquery-validate-min', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'wow-min', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'jquery-stellar-min', get_template_directory_uri() . '/js/jquery.stellar.min.js', array( 'jquery' ), '1', true );

	wp_enqueue_script( 'jquery-magnific-popup-min', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js"', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'owl-carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1', true );

	wp_enqueue_script( 'jquery-pagepiling', get_template_directory_uri() . '/js/jquery.pagepiling.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'isotope-pkgd-min', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '1', true );

	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js"', array(
		'jquery',
		'imagesloaded'
	), '1', true );

	wp_enqueue_script( 'sly-min', get_template_directory_uri() . '/js/sly.min.js', array( 'jquery' ), '1', true );


	if ( get_theme_mod( 'bauhaus_map_google_key' ) != '' ) {

		wp_enqueue_script( 'maps-google', 'http://maps.google.com/maps/api/js?key=' . get_theme_mod( 'bauhaus_map_google_key' ), array( 'jquery' ), '1', true );

	} else {
		wp_enqueue_script( 'maps-google', 'http://maps.google.com/maps/api/js', array( 'jquery' ), '1', true );

	}


	wp_enqueue_script( 'bauhaus-gmap', get_template_directory_uri() . '/js/gmap.js', array( 'jquery' ), '1', true );

	if ( $type == 'dark' ) {
		wp_enqueue_script( 'bauhaus-scripts', get_template_directory_uri() . '/js/scripts-dark.js', array( 'jquery' ), '1', true );

	} else {
		wp_enqueue_script( 'bauhaus-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1', true );
	}


	wp_enqueue_script( 'comment-reply' );
	wp_localize_script( 'bauhaus-interface', 'bauhaus_obj', array(
		'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'theme_url' => esc_url( get_template_directory_uri() ),


	) );


}


/**
 * init admin scripts and style
 */
function bauhaus_style_scripts_admin() {
	//Geocoding google

	wp_enqueue_style( 'bauhaus-admins', get_template_directory_uri() . '/css/admins.css' );
	wp_enqueue_style( 'bauhaus-ionicons', get_template_directory_uri() . '/css/ionicons.min.css' );

	wp_enqueue_script( 'bauhaus-admins', get_template_directory_uri() . '/js/admin/admin.js', array( 'jquery' ), '1', true );


	wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/css/linearicons.css' );

	wp_localize_script( 'bauhaus-admins', 'bauhaus_admin_obj',
		array(
			'version' => sanitize_text_field( esc_html( get_bloginfo( "version" ) ) )
		)
	);
	$T = get_the_tags();
}

add_action( 'admin_enqueue_scripts', 'bauhaus_style_scripts_admin' );




