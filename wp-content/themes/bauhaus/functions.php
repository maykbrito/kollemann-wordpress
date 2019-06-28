<?php
if ( ! isset( $content_width ) ) $content_width = 1170;

// Enable featured image
add_theme_support( 'post-thumbnails');

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Styles the visual editor with editor-style.css to match the theme style
add_editor_style();

// Load theme languages
load_theme_textdomain( 'bauhaus', get_template_directory().'/languages' );

// Option tree theme options
//add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'includes/uni-metabox.php' );

// Register Custom Menu Function
if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'primary' => ( 'Bauhaus Main Menu' )
		) );
}

// Menu fallback
function uni_nav_fallback() {
    $sOutput = '<ul class="mainmenu clear">';
    $sOutput .= wp_list_pages( array('title_li' => '', 'echo' => false) );
    $sOutput .= '</ul>';
    echo $sOutput;
}

// wp-title
function uni_wp_title( $sTitle, $sSeparator ) {
	global $paged, $page;

	if ( is_feed() )
		return $sTitle;

    $sSeparator = '&raquo;';

	// Add the site description for the home/front page.
	$sSiteDesc = get_bloginfo( 'description' );
	if ( empty($sTitle) && !empty( $sSiteDesc ) && ( is_home() || is_front_page() ) ) {
		$sTitle = get_bloginfo( 'name' )." $sSeparator $sSiteDesc";
    } else if ( empty($sTitle) && empty( $sSiteDesc ) && ( is_home() || is_front_page() ) ) {
        $sTitle = get_bloginfo( 'name' );
    } else {
        $sTitle = get_bloginfo( 'name' )." $sTitle";
    }

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$sTitle = get_bloginfo( 'name' )." $sSeparator " . sprintf( esc_html__( 'Page %s', 'bauhaus' ), max( $paged, $page ) );

	return $sTitle;
}
add_filter( 'wp_title', 'uni_wp_title', 10, 2 );

// Add html5 suppost for search form and comments list
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// TGM class 2.5.0 - neccessary plugins
require( trailingslashit( get_template_directory() ) . 'includes/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'uni_register_required_plugins' );
function uni_register_required_plugins() {

    $plugins = array(
        array(
            'name'      => 'Instagram Feed',
            'slug'      => 'instagram-feed',
            'required'  => true,
        ),
		array(
			'name'               => 'Envato WordPress Toolkit',
			'slug'               => 'envato-wordpress-toolkit',
			'source'             => get_template_directory() . '/includes/plugins/envato-wordpress-toolkit.zip',
			'required'           => false,
			'version'            => '1.7.3',
			'force_activation'   => false,
			'force_deactivation' => false,
            'external_url'       => 'https://github.com/envato/envato-wordpress-toolkit'
		),
		array(
			'name'               => 'Uni User Avatar',
			'slug'               => 'uni-user-avatar',
			'source'             => get_template_directory() . '/includes/plugins/uni-user-avatar.zip',
			'required'           => true,
			'version'            => '1.6.2',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => 'http://codecanyon.net/item/uni-avatar-wp-avatar-manager-plugin/10751977',
		),
		array(
			'name'               => 'Uni Custom Post Types and Taxonomies',
			'slug'               => 'uni-cpt-and-tax',
			'source'             => get_template_directory() . '/includes/plugins/uni-cpt-and-tax.zip',
			'required'           => true,
			'version'            => '1.2.6',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
		),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Intuitive Custom Post Order',
            'slug'      => 'intuitive-custom-post-order',
            'required'  => false,
        ),
        array(
            'name'      => 'Shortcodes Ultimate',
            'slug'      => 'shortcodes-ultimate',
            'required'  => false,
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'bauhaus' ),
            'menu_title'                      => __( 'Install Plugins', 'bauhaus' ),
            'installing'                      => __( 'Installing Plugin: %s', 'bauhaus' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'bauhaus' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'bauhaus' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'bauhaus' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'bauhaus' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'bauhaus' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'bauhaus' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'bauhaus' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'bauhaus' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

// Load necessary theme scripts and styles
function uni_theme_scripts() {

    wp_enqueue_script('jquery-masonry');
    // bxSlider
    wp_register_script('jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.1.2' );
    wp_enqueue_script('jquery-bxslider');
    // BlackAndWhite
    wp_register_script('jquery-blackandwhite', get_template_directory_uri() . '/js/jquery.BlackAndWhite.js', array('jquery'), '4.1.2' );
    wp_enqueue_script('jquery-blackandwhite');
    // FancyBox
    wp_register_script('jquery-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5' );
    wp_enqueue_script('jquery-fancybox');
    // imagesLoaded
    wp_register_script('jquery-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '3.0.4' );
    wp_enqueue_script('jquery-imagesloaded');
    // isotope
    wp_register_script('jquery-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.2.2' );
    wp_enqueue_script('jquery-isotope');
    // Mousewheel
    wp_register_script('jquery-mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', array('jquery'), '3.1.9' );
    wp_enqueue_script('jquery-mousewheel');
    // jscrollpane
    wp_register_script('jquery-jscrollpane', get_template_directory_uri() . '/js/jquery.jscrollpane.min.js', array('jquery'), '2.0.19' );
    wp_enqueue_script('jquery-jscrollpane');
    // dotdotdot
    wp_register_script('jquery-dotdotdot', get_template_directory_uri() . '/js/jquery.dotdotdot.min.js', array('jquery'), '1.2.2' );
    wp_enqueue_script('jquery-dotdotdot');
    // jquery.blockUI
    wp_register_script('jquery-blockui', get_template_directory_uri() . '/js/jquery.blockUI.js', array('jquery'), '2.70.0' );
    wp_enqueue_script('jquery-blockui');
    // parsley localization
    $sLocale = get_locale();
    $aLocale = explode('_',$sLocale);
    $sLangCode = $aLocale[0];
    if ( !file_exists( get_template_directory() . '/js/parsley/i18n/'.$sLangCode.'.js' ) ) {
        $sLangCode = 'en';
    }
    wp_register_script('parsley-localization', get_template_directory_uri() . '/js/parsley/i18n/'.$sLangCode.'.js', array('jquery'), '2.2.0' );
    wp_enqueue_script('parsley-localization');
    // parsley
    wp_register_script('jquery-parsley', get_template_directory_uri() . '/js/parsley.min.js', array('jquery'), '2.2.0' );
    wp_enqueue_script('jquery-parsley');
    // Bauhaus scripts
    wp_register_script('unitheme-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0' );
    wp_enqueue_script('unitheme-script');
    // Google Maps API
    if ( is_page_template('templ-contact.php') || is_page_template('templ-home.php') ) {
        wp_register_script('maps.googleapis', 'https://maps.googleapis.com/maps/api/js?sensor=true' );
        wp_enqueue_script('maps.googleapis');
    }

    if ( is_home() ) {
        $params = array(
            'site_url'      => esc_url( home_url( '/' ) ),
		    'ajax_url' 		=> esc_url( admin_url('admin-ajax.php') ),
            'is_home'       => 'yes',
            'locale'        => $sLangCode
	    );
    } else {
        $params = array(
            'site_url'      => esc_url( home_url( '/' ) ),
		    'ajax_url' 		=> esc_url( admin_url('admin-ajax.php') ),
            'is_home'       => 'no',
            'locale'        => $sLangCode
	    );
    }

	wp_localize_script( 'unitheme-script', 'unithemeparams', $params );

}
add_action('wp_enqueue_scripts', 'uni_theme_scripts');

// Enqueue style.css (default WordPress stylesheet)
function uni_theme_style() {

    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

    $ot_set_google_fonts  = get_theme_mod( 'ot_set_google_fonts', array() );

    if ( !ot_get_option('uni_google_fonts') || empty($ot_set_google_fonts) ) {
        wp_enqueue_style( 'unitheme-fonts', unitheme_fonts_url(), array(), null );
    }

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
    /*
    if ( !ot_get_option( 'uni_color_schemes' ) ) {
        wp_register_style( 'uni-theme-bauhaus-scheme', get_template_directory_uri() . '/css/scheme-default.css', array('style'), '1.0.0', 'screen' );
        wp_enqueue_style( 'uni-theme-bauhaus-scheme' );
    } else {
        $sColourScheme = ot_get_option( 'uni_color_schemes' );
        wp_register_style( 'uni-theme-bauhaus-scheme', get_template_directory_uri() . '/css/scheme-'.$sColourScheme.'.css', array('style'), '1.0.0', 'screen' );
        wp_enqueue_style( 'uni-theme-bauhaus-scheme' );
    }
    */
    wp_register_style( 'unitheme-adaptive', get_template_directory_uri() . '/css/adaptive.css', array('unitheme-style'), '1.0.0', 'screen' );
    wp_enqueue_style( 'unitheme-adaptive' );

}
add_action( 'wp_enqueue_scripts', 'uni_theme_style' );

//
function unitheme_fonts_url() {
    $fonts_url = '';

    $ot_set_google_fonts  = get_theme_mod( 'ot_set_google_fonts', array() );

    if ( empty($ot_set_google_fonts) ) {
        $font_families = array();
        $font_families[] = 'Montserrat:700,regular';
        $font_families[] = 'Open Sans:300,700,regular';

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
    return esc_url_raw( $fonts_url );
}

//
add_action('wp_head', 'unitheme_custom_fonts_customization');
function unitheme_custom_fonts_customization(){
    // helps customize fonts
    if ( ot_get_option('uni_google_fonts')  ) {
    $aCustomFonts           = ot_get_option('uni_google_fonts');
    $ot_google_fonts        = get_theme_mod( 'ot_google_fonts', array() );
    $ot_set_google_fonts    = get_theme_mod( 'ot_set_google_fonts', array() );
    $sFontNameOne = $sFontNameTwo = '';
    if ( !empty($ot_set_google_fonts) ) {
        if ( isset($aCustomFonts) && !empty($aCustomFonts[0]) ) $sFontNameOne = $ot_google_fonts[$aCustomFonts[0]["family"]]['family'];
        if ( isset($aCustomFonts) && !empty($aCustomFonts[1]) ) $sFontNameTwo = $ot_google_fonts[$aCustomFonts[1]["family"]]['family'];

        if ( $sFontNameOne != 'Montserrat' || $sFontNameTwo != 'Open Sans' ) {
    ?>
<style type="text/css">
/* regular text */
body, table, input, textarea, select, li, button, p, blockquote, ol, dl, form, pre, th, td, a {
font-family: Arial, sans-serif;}

.sidebar-widget label,
.singlePost .su-spoiler-title,
.singlePost .su-service-title,
.singlePost .su-heading-style-default .su-heading-inner,
.singlePost .su-divider a,
.singlePost .su-quote-cite a,
.singlePost .su-tabs-nav span,
.linkToHome, .linkToHome:visited,
#commentform #submit,
.comment-wrapper cite a,
.comment-wrapper cite,
.logged-in-as a, .logged-in-as a:visited,
.comment-edit-link, .comment-edit-link:visited, .comment-reply-link, .comment-reply-link:visited,
.commentsBox .comment-reply-title a, .commentsBox .comment-reply-title a:visited,
.commentsBox .comments-title, .commentsBox .comment-reply-title,
.relatedPosts h3,
.postPrev, .postNext,
.singlePostTags span,
.singlePost table th a, .singlePost table th a:visited,
.singlePost table th,
.singlePost dt,
.singlePost blockquote p cite,
.singlePost h1 a, .singlePost h2 a, .singlePost h3 a, .singlePost h4 a, .singlePost h5 a, .singlePost h6 a,
.singlePost h1, .singlePost h2, .singlePost h3, .singlePost h4, .singlePost h5, .singlePost h6, .sidebar-widget h3,
.pagination ul li, .pagination ul li a, .pagination ul li a:visited,
.blog2ArchiveItem h3 a, .blog2ArchiveItem h3 a:visited,
.archive .blockTitle + p,
.blogArchiveItem h3 a, .blogArchiveItem h3 a:visited, .relatedPostsItem h4 a, .relatedPostsItem h4 a:visited,
.serviceDescText h4,
.orderServiceItem, .orderServiceItem:visited,
.serviceHead h4 span,
.wpcf7-form input[type="submit"], .thm-btnSubmit,
.thm-btnSubmit,
.contactItem h4,
#sb_instagram .sbi_follow_btn a,
#sb_instagram .sbi_header_text p,
#sb_instagram .sb_instagram_header a,
.teamItem h4,
.blockTitle,
.screen1 h2,
.portfolioItemV2Desc span, .portfolioItemV2SmallImg span,
.filterPanel li a, .filterPanel li a:visited,
.copyright,
.sendEmailLink, .sendEmailLink:visited,
.homeContactInfoWrap h3,
.testimonialAuthor strong,
.ourServiceItemContent h4,
.homeBlockTitle,
.learnMoreLink, .learnMoreLink:visited,
.btn-seeMore, .btn-seeMore:visited,
.btn-seeAll, .btn-seeAll:visited,
.slideMeta h3,
.seeMoreLink, .seeMoreLink:visited,
.homeScreenDesc h1,
.homeScreenDesc span,
.languageSelect ul li a, .languageSelect ul li a:visited,
.languageSelect span,
.header2 .mainmenu li ul li a, .header2 .mainmenu li ul li a:visited,
.header1 .mainmenu li ul li a, .header1 .mainmenu li ul li a:visited,
.mainmenu li a,
.logo, .logo:visited {font-family: '<?php echo esc_attr( $sFontNameOne ); ?>', '<?php echo esc_attr( $sFontNameTwo ); ?>';}

.contentLeft,
.singlePost .su-slider-slide-title,
.singlePost .su-carousel .su-carousel-slide-title,
#uni_popup, .contactForm .wpcf7-validation-errors,
.parsley-errors-list li,
.page404Content p,
.page404Content h1,
.singleProjectDescText ol li:before,
.singleProjectDescText ul li, .singleProjectDescText ol li,
.singleProjectDescText p,
.singleProjectDescItem p,
.singleProjectDesc h1,
#commentform textarea,
#commentform input[type="text"],
.comment-content p a, .comment-content p a:visited,
.comment-content p, .comment-awaiting-moderation,
.comment-metadata time,
.bypostauthor .comment-wrapper .uni-post-author,
.logged-in-as,
.relatedPostsItem,
.singlePostTags a, .singlePostTags a:visited,
.singlePostTags,
.singlePost address,
.singlePost table td a, .singlePost table td a:visited,
.singlePost table td,
.singlePost .wp-caption-text, .singlePost .gallery-caption,
.singlePost dd,
.singlePost blockquote p a, .singlePost blockquote p a:visited,
.singlePost blockquote p,
.singlePost ul li a, .singlePost ul li a:visited,
.singlePost ol li a, .singlePost ol li a:visited,
.singlePost ol li:before,
.singlePost ul li, .singlePost ol li,
.singlePost dt a, .singlePost dt a:visited, .singlePost dd a, .singlePost dd a:visited, .singlePost p a, .singlePost p a:visited,
.singlePost, .singlePost p,
.tagcloud a, .tagcloud a:visited,
#wp-calendar tfoot td a, #wp-calendar tfoot td a:visited,
#wp-calendar tbody td,
#wp-calendar thead th,
#wp-calendar caption,
.sidebar-widget .search-form .search-field,
.sidebar-widget li a, .sidebar-widget li a:visited, .sidebar-widget .menu-item a,
.sidebar-widget .menu-item a:visited, .sidebar-widget .cat-item a, .sidebar-widget .cat-item a:visited,
.sidebar-widget li, .sidebar-widget .cat-item, .sidebar-widget .menu-item,
.sidebar-widget .textwidget,
.blog2ArchiveItem p,
.postTime,
.archiveItemMeta, .singlePostMeta,
.categoryLink, .categoryLink:visited,
.blogArchiveItem,
.serviceDescText p,
.serviceDesc p,
.servicePrice p,
.wpcf7-form textarea, .formTextarea,
.wpcf7-form input:not(.wpcf7-submit), .formInput,
.formTextarea,
.formInput,
.contactForm .wpcf7-form p,
.contactForm p, .orderServiceFormWrap p,
.contactItem p, .contactItem p a, .contactItem p a:visited,
.teamItem p,
.storyWrap p,
.screen1 p,
.portfolioItemV3Desc h3,
.portfolioItemV2Desc p,
.portfolioItemV2Desc h4,
.portfolioItemV1Desc h3,
.testimonialItem p,
.ourServiceItemContent p,
.ourServiceItemContent span,
.aboutUsDesc h3,
.aboutUsDesc p {font-family: '<?php echo esc_attr( $sFontNameTwo ); ?>';}
</style>
    <?php
        }
    }
    }
}

//
add_action('admin_enqueue_scripts', 'uni_admin_script');
function uni_admin_script() {
    wp_enqueue_script('uni-admin', get_template_directory_uri() . '/js/uni-admin.js', array('jquery'), '1.0.0');
}

// Register sidebar
add_action( 'widgets_init', 'unitheme_main_widgets_init' );
function unitheme_main_widgets_init() {
    register_sidebar( array(
        'name' => esc_html__( 'Main Sidebar', 'bauhaus' ),
        'id' => 'sidebar-main',
        'description' => '',
        'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>',
    ) );
}

// Add new image sizes
add_image_size( 'unithumb-relativepost', 260, 174, true );
add_image_size( 'unithumb-singlepost', 840, 561, true );
add_image_size( 'unithumb-blogone', 370, 0, false );
add_image_size( 'unithumb-brand', 160, 160, false );
add_image_size( 'unithumb-service', 545, 300, true );
add_image_size( 'unithumb-portfolioone', 455, 305, true );
add_image_size( 'unithumb-portfoliotwoone', 684, 684, true );
add_image_size( 'unithumb-portfoliotwotwo', 684, 342, true );
add_image_size( 'unithumb-portfoliotwothree', 342, 342, true );
add_image_size( 'unithumb-singleprojectthumb', 198, 132, true );
add_image_size( 'unithumb-logo', 100, 20, true );
add_image_size( 'unithumb-servicehome', 456, 456, true );
add_image_size( 'unithumb-testimonialhome', 120, 120, true );
add_image_size( 'unithumb-testimonialhomebg', 1366, 550, false );

// add the new role
add_action('after_switch_theme', 'uni_theme_activation_func', 10);
function uni_theme_activation_func() {
    add_role( 'architector', esc_html__('Architector', 'bauhaus'), array('read' => true) );
	$instructor = get_role('architector');
	$instructor->add_cap('read');
    $instructor->add_cap('edit_published_posts');
    $instructor->add_cap('upload_files');
    $instructor->add_cap('publish_posts');
    $instructor->add_cap('delete_published_posts');
    $instructor->add_cap('edit_posts');
    $instructor->add_cap('delete_posts');
    update_option('posts_per_page', 9);
    flush_rewrite_rules();
}

// remove the new role on theme deactivation
add_action('switch_theme', 'uni_theme_deactivation_func');
function uni_theme_deactivation_func() {
    remove_role( 'architector' );
}

// Additional fields for user's profile
add_action( 'show_user_profile', 'uni_user_additional_fields_section' );
add_action( 'edit_user_profile', 'uni_user_additional_fields_section' );
function uni_user_additional_fields_section( $oUser ) {
    $aUserAdditionalData = ( get_user_meta( $oUser->ID, '_uni_user_data', true ) ) ? get_user_meta( $oUser->ID, '_uni_user_data', true ) : array();
    ?>

	<h3><?php esc_html_e( 'Bauhaus: additional fields', 'bauhaus' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><label><?php esc_html_e( 'Profession', 'bauhaus' ); ?></label></th>
			<td>
                <p><input type="text" class="regular-text" name="uni_user_data[profession]" value="<?php if ( !empty($aUserAdditionalData['profession']) ) echo esc_attr( $aUserAdditionalData['profession'] ) ?>" /></p>
            </td>
		</tr>
    </table>
    <?php /*
	<h3><?php esc_html_e( 'Bauhaus: social links', 'bauhaus' ); ?></h3>
	<table class="form-table">
		<tr>
			<th><label><?php esc_html_e( 'Facebook', 'bauhaus' ); ?></label></th>
			<td>
                <p><input type="text" class="regular-text" name="uni_user_data[fb_link]" value="<?php if ( !empty($aUserAdditionalData['fb_link']) ) echo esc_url( $aUserAdditionalData['fb_link'] ) ?>" /></p>
            </td>
		</tr>
		<tr>
			<th><label><?php esc_html_e( 'Twitter', 'bauhaus' ); ?></label></th>
			<td>
                <p><input type="text" class="regular-text" name="uni_user_data[tw_link]" value="<?php if ( !empty($aUserAdditionalData['tw_link']) ) echo esc_url( $aUserAdditionalData['tw_link'] ) ?>" /></p>
            </td>
		</tr>
		<tr>
			<th><label><?php esc_html_e( 'Google+', 'bauhaus' ); ?></label></th>
			<td>
                <p><input type="text" class="regular-text" name="uni_user_data[gplus_link]" value="<?php if ( !empty($aUserAdditionalData['gplus_link']) ) echo esc_url( $aUserAdditionalData['gplus_link'] ) ?>" /></p>
            </td>
		</tr>
		<tr>
			<th><label><?php esc_html_e( 'LinkedIn', 'bauhaus' ); ?></label></th>
			<td>
                <p><input type="text" class="regular-text" name="uni_user_data[li_link]" value="<?php if ( !empty($aUserAdditionalData['li_link']) ) echo esc_url( $aUserAdditionalData['li_link'] ) ?>" /></p>
            </td>
		</tr>
    </table>
    */ ?>
    <?php
}

// save
add_action( 'personal_options_update', 'uni_user_additional_fields_save' );
add_action( 'edit_user_profile_update', 'uni_user_additional_fields_save' );
function uni_user_additional_fields_save( $iUserId ) {

	if ( !current_user_can( 'edit_user', $iUserId ) )
		return false;

    $aUniUserData = isset( $_POST['uni_user_data'] ) ? (array) $_POST['uni_user_data'] : array();
    if ( !empty($aUniUserData) ) {
        $aUniUserData = array_map( 'sanitize_text_field', $aUniUserData );
        update_user_meta($iUserId, '_uni_user_data', $aUniUserData);
    } else {
        delete_user_meta($iUserId, '_uni_user_data');
    }

}

// Posts similar by tags with thumbnails
function uni_similar_posts_by_tags() {

    global $post;
    $oOriginalPost = $post;
    $aTags = wp_get_post_tags( $post->ID );

    if ( isset($aTags) ) {
        $aRelatedTagArray = array();
        foreach($aTags as $oTag)
            $aRelatedTagArray[] = $oTag->term_id;

        $aRelatedArgs = array(
            'post_type' => 'post',
            'tag__in' => $aRelatedTagArray,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'ignore_sticky_posts' => 1
        );

        $oRelatedQuery = new wp_query( $aRelatedArgs );
        if( $oRelatedQuery->have_posts() ) {

        echo '<div class="relatedPosts">
					<h3>'.esc_html__('Related Posts', 'bauhaus').'</h3>
					<div class="relatedPostsWrap clear">';

        while( $oRelatedQuery->have_posts() ) {
        $oRelatedQuery->the_post();
        ?>
						<div class="relatedPostsItem">
					        <a href="<?php the_permalink() ?>" class="relatedPostsThumb" title="<?php the_title_attribute() ?>">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail( 'unithumb-relativepost', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                            <?php } else { ?>
                                <img src="http://placehold.it/260x174" width="260" height="174" alt="<?php the_title_attribute() ?>" />
                            <?php } ?>
                            </a>
							<h4><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a></h4>
        <?php
        $aCategories = wp_get_post_terms( $post->ID, 'category' );
        if ( $aCategories && !is_wp_error( $aCategories ) ) :
        $s = count($aCategories);
        $i = 1;
	    foreach ( $aCategories as $oTerm ) {
	        echo '<a href="'.esc_url( get_term_link( $oTerm->slug, 'category' ) ).'" class="categoryLink">'.esc_attr( $oTerm->name ).'</a>';
            if ($i < $s) echo ', ';
            $i++;
	    }
        endif;
        ?>
						</div>
        <?php }
        echo '</div>
				</div>';
        }
        }
        $post = $oOriginalPost;
        wp_reset_postdata();
}

// post navigation
function uni_pagination($sPages = '', $sRange = 1) {
     $sShowItems = ($sRange * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($sPages == '') {
         global $wp_query;
         $sPages = $wp_query->max_num_pages;
         if(!$sPages) {
             $sPages = 1;
         }
     }

     if( 1 != $sPages ) { ?>
				<ul>
                <?php if ( $paged > 1 && $sShowItems < $sPages ) { ?>
					<li class="prevPage">
						<a href="<?php echo esc_url( get_pagenum_link( 1 ) ); ?>">
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="&#1057;&#1083;&#1086;&#1081;_1" x="0px" y="0px" width="7px" height="11px" viewBox="0 0 7 11" enable-background="new 0 0 7 11" xml:space="preserve">
									<path fill="#0B0B0B" class="paginationArrowIcon" d="M0.95 4.636L6.049 0L7 0.864L1.899 5.5L7 10.136L6.049 11L0 5.5L0.95 4.636z"/>
								</svg>
							</i> <?php esc_html_e('previous', 'bauhaus'); ?>
						</a>
					</li>
                <?php } ?>
                <?php
                if ($paged > 2 && $paged > $sRange+2 && $sShowItems < $sPages) {
                ?>
					<li class="threeDot">...</li>
				<?php
                }
                ?>
                <?php
                for ($i=1; $i <= $sPages; $i++) {
                    if (1 != $sPages && ( !($i >= $paged+$sRange+1 || $i <= $paged-$sRange-1) || $sPages <= $sShowItems ) ) {
                        echo ($paged == $i) ? '<li class="current">'.$i.'</li>' : '<li><a href="'.esc_url( get_pagenum_link($i) ).'">'.$i.'</a></li>';
                    }
                }
                ?>
                <?php
                if ($paged < $sPages-3 &&  $paged+$sRange-3 < $sPages && $sShowItems < $sPages) {
                ?>
					<li class="threeDot">...</li>
				<?php
                }
                ?>
                <?php if ($paged < $sPages && $sShowItems < $sPages) { ?>
					<li class="nextPage">
						<a href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>"><?php esc_html_e('next', 'bauhaus') ?>
							<i>
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="&#1057;&#1083;&#1086;&#1081;_1" x="0px" y="0px" width="7px" height="11px" viewBox="0 0 7 11" enable-background="new 0 0 7 11" xml:space="preserve">
									<path fill="#0B0B0B" class="paginationArrowIcon" d="M6.05 6.364L0.951 11L0 10.136L5.102 5.5L0 0.864L0.951 0L7 5.5L6.05 6.364z"/>
								</svg>
							</i>
						</a>
					</li>
                <?php } ?>
				</ul>
     <?php
     }
}

// custom excerpt
function uni_excerpt( $iLength, $iPostId = '', $bEcho = false, $sMore = null ) {
    if ( !empty($iPostId) ) {
        $oPost = get_post( $iPostId );
    } else {
        global $post;
        $oPost = $post;
    }

	if ( null === $sMore )
		$sMore = esc_html__( '&hellip;', 'bauhaus' );

    $sContent = $oPost->post_content;
	$sContent = wp_strip_all_tags( $sContent );
    $sContent = strip_shortcodes( $sContent );
	if ( 'characters' == _x( 'words', 'word count: words or characters?', 'bauhaus' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
		$sContent = trim( preg_replace( "/[\n\r\t ]+/", ' ', $sContent ), ' ' );
		preg_match_all( '/./u', $sContent, $aWordsArray );
		$aWordsArray = array_slice( $aWordsArray[0], 0, $iLength + 1 );
		$sep = '';
	} else {
		$aWordsArray = preg_split( "/[\n\r\t ]+/", $sContent, $iLength + 1, PREG_SPLIT_NO_EMPTY );
		$sep = ' ';
	}

	if ( count( $aWordsArray ) > $iLength ) {
		array_pop( $aWordsArray );
		$sContent = implode( $sep, $aWordsArray );
        $sContent = $sContent . $sMore;
	} else {
		$sContent = implode( $sep, $aWordsArray );
	}
    if ( $bEcho ) {
        echo '<p>'.esc_html( $sContent ).'</p>';
    } else {
        return esc_html( $sContent );
    }
}

//
function uni_allowed_html_wo_a() {
    $aAllowedHtml = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
    );
    return $aAllowedHtml;
}

//
function uni_allowed_html_with_a() {
    $aAllowedHtml = array(
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
    );
    return $aAllowedHtml;
}

function uni_custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'uni_custom_excerpt_length', 999 );

function uni_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'uni_new_excerpt_more');

function uni_share_facebook() {
	return 'http://www.facebook.com/sharer.php?u='.esc_url( urlencode(get_permalink()) ).'&t='.urlencode(get_the_title());
}

function uni_share_twitter() {
	return 'http://twitter.com/share?text='.urlencode(get_the_title()).'&url='.esc_url( urlencode(get_permalink()) );
}

function uni_share_gplus() {
	return 'https://plus.google.com/share?url='.esc_url( urlencode(get_permalink()) );
}

function uni_share_pinterest() {
    $aImage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    $sImageUrl = '';
	if ( isset($aImage[0]) ) $sImageUrl = $aImage[0];
	if ( $sImageUrl == false ) {
		$sImageUrl = get_template_directory_uri() . '/images/placeholders/unithumb-portfolioone.png';
	}
	return 'http://pinterest.com/pin/create/button/?url='.esc_url( urlencode( get_permalink() ) )
            .'&media='.esc_url( urlencode($sImageUrl) ).'&description='.urlencode(get_the_title());
}

// comments
function uni_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
    global $post;
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
	<a id="view-comment-<?php comment_ID(); ?>" class="comment-anchor"></a>
	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<footer class="comment-meta">
			<div class="comment-author vcard">
				<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
			</div><!-- .comment-author -->

			<div class="reply">
				<?php comment_reply_link(array_merge($args, array(
					'add_below' => 'div-comment',
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
					'before' => '<div>',
					'after' => '</div>'
				))); ?>
			</div><!-- .reply -->
		</footer><!-- .comment-meta -->

		<div class="comment-wrapper">
			<?php
            if ( $comment->user_id === $post->post_author ) {
                printf('<cite class="fn">%s</cite><span class="uni-post-author">%s</span>', get_comment_author_link(), esc_html__('post author', 'bauhaus'));
            } else {
                printf('<cite class="fn">%s</cite>', get_comment_author_link());
            }
            ?>

			<span class="comment-metadata">
				<a href="<?php echo esc_url( get_comment_link($comment->comment_ID) ); ?>">
					<time datetime="<?php comment_time('c'); ?>">
						<?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'bauhaus'), get_comment_date(), get_comment_time()); ?>
					</time>
				</a>
				<?php edit_comment_link(esc_html__('Edit', 'bauhaus'), '<span class="separator">&middot;</span> <span class="edit-link">', '</span>'); ?>
			</span><!-- .comment-metadata -->

			<?php if ('0' == $comment->comment_approved): ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'bauhaus'); ?></p>
			<?php endif; ?>

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</div>
	</article><!-- .comment-body -->
<?php
}

// popup messages
if ( !function_exists('uni_add_js_message_div') ) {
    function uni_add_js_message_div() {
        echo '<div id="uni_popup"></div>';
    }
    add_action('wp_footer', 'uni_add_js_message_div');
}

// Ajax contact form - processing
function uni_contact_form(){

        $aResult               = array();
        $aResult['message']    = esc_html__('Error!', 'bauhaus');
        $aResult['status']     = 'error';

        $sCustomerName          = ( ( isset($_POST['uni_contact_name']) ) ? esc_sql($_POST['uni_contact_name']) : '' );
        $sCustomerEmail         = ( ( isset($_POST['uni_contact_email']) ) ? esc_sql($_POST['uni_contact_email']) : '' );
        $sCustomerSubject       = ( ( isset($_POST['uni_contact_subject']) ) ? esc_sql($_POST['uni_contact_subject']) : '' );
        $sCustomerMsg           = ( ( isset($_POST['uni_contact_msg']) ) ? esc_sql($_POST['uni_contact_msg']) : '' );
        $sNonce                 = $_POST['uni_contact_nonce'];
        $sAntiCheat             = $_POST['cheaters_always_disable_js'];

        if ( ( empty($sAntiCheat) || $sAntiCheat != 'true_bro' ) || !wp_verify_nonce( $_POST['uni_contact_nonce'], 'uni_nonce' ) ) {
            wp_send_json( $aResult );
        }

        if ( $sCustomerName && $sCustomerEmail && $sCustomerSubject && $sCustomerMsg ) {

            $sToEmail 		    = ( ot_get_option( 'uni_email' ) ) ? ot_get_option( 'uni_email' ) : get_bloginfo('admin_email');
            $sFromEmail         = $sCustomerEmail;
            $sHeadersText       = "$sCustomerName <$sFromEmail>";
	        $sSubjectText 		= $sCustomerSubject;

            $sBlogName          = get_bloginfo('name');

            $sMessage          =
                    "<h3>".sprintf( esc_html__('You have a new message sent from "%s"!', 'bauhaus'), $sBlogName )."</h3>
                    <p></p>
                    <p><strong>".esc_html__('Contact information', 'bauhaus').":</strong><br>
                    ".sprintf( esc_html__('Name: %s', 'bauhaus'), $sCustomerName )."
                    <br>
                    ".sprintf( esc_html__('Email: %s', 'bauhaus'), $sCustomerEmail )."
                    <br>
                    ".esc_html__('Message', 'bauhaus').":
                    <br>$sCustomerMsg
                    </p>";
            $sMessage = stripslashes_deep( $sMessage );

            uni_send_email_wrapper( $sToEmail, $sHeadersText, $sSubjectText, false, array(), $sMessage );

            $aResult['status']     = 'success';
            $aResult['message']    = esc_html__('Thanks! You message has been sent!', 'bauhaus');

        } else {
            $aResult['message']    = esc_html__('All fields are required!', 'bauhaus');
        }

	    wp_send_json( $aResult );
}
add_action('wp_ajax_uni_contact_form', 'uni_contact_form');
add_action('wp_ajax_nopriv_uni_contact_form', 'uni_contact_form');

// Ajax order form - processing
function uni_order_form(){

        $aResult               = array();
        $aResult['message']    = esc_html__('Error!', 'bauhaus');
        $aResult['status']     = 'error';

        $sCustomerName          = ( ( isset($_POST['uni_contact_name']) ) ? esc_sql($_POST['uni_contact_name']) : '' );
        $sCustomerEmail         = ( ( isset($_POST['uni_contact_email']) ) ? esc_sql($_POST['uni_contact_email']) : '' );
        $sCustomerSubject       = ( ( isset($_POST['uni_contact_subject']) ) ? esc_sql($_POST['uni_contact_subject']) : '' );
        $sCustomerMsg           = ( ( isset($_POST['uni_contact_msg']) ) ? esc_sql($_POST['uni_contact_msg']) : '' );
        $sNonce                 = $_POST['uni_contact_nonce'];
        $sAntiCheat             = $_POST['cheaters_always_disable_js'];

        if ( ( empty($sAntiCheat) || $sAntiCheat != 'true_bro' ) || !wp_verify_nonce( $_POST['uni_contact_nonce'], 'uni_nonce' ) ) {
            wp_send_json( $aResult );
        }

        if ( $sCustomerName && $sCustomerEmail && $sCustomerSubject && $sCustomerMsg ) {

            $sToEmail 		    = ( ot_get_option( 'uni_email' ) ) ? ot_get_option( 'uni_email' ) : get_bloginfo('admin_email');
            $sFromEmail         = $sCustomerEmail;
            $sHeadersText       = "$sCustomerName <$sFromEmail>";
	        $sSubjectText 		= $sCustomerSubject;

            $sBlogName          = get_bloginfo('name');

            $sMessage          =
                    "<h3>".sprintf( esc_html__('You have a new order sent from "%s"!', 'bauhaus'), $sBlogName )."</h3>
                    <p></p>
                    <p><strong>".esc_html__('Contact information', 'bauhaus').":</strong><br>
                    ".sprintf( esc_html__('Name: %s', 'bauhaus'), $sCustomerName )."
                    <br>
                    ".sprintf( esc_html__('Email: %s', 'bauhaus'), $sCustomerEmail )."
                    <br>
                    ".sprintf( esc_html__('Subject: %s', 'bauhaus'), $sCustomerSubject )."
                    <br>
                    ".esc_html__('Message', 'bauhaus').":
                    <br>$sCustomerMsg
                    </p>";
            $sMessage = stripslashes_deep( $sMessage );

            uni_send_email_wrapper( $sToEmail, $sHeadersText, $sSubjectText, false, array(), $sMessage );

            $aResult['status']     = 'success';
            $aResult['message']    = esc_html__('Thanks! You message has been sent!', 'bauhaus');

        } else {
            $aResult['message']    = esc_html__('All fields are required!', 'bauhaus');
        }

	    wp_send_json( $aResult );
}
add_action('wp_ajax_uni_order_form', 'uni_order_form');
add_action('wp_ajax_nopriv_uni_order_form', 'uni_order_form');

//
function uni_send_email_wrapper( $sEmailTo, $sEmailFrom, $sSubjectText, $sEmailTemplateName, $aMailVars = array(), $sEmailText = '' ) {

	    $sCharset = 'UTF-8';
	    mb_internal_encoding($sCharset);

	    $sSubject           = mb_convert_encoding($sSubjectText, $sCharset, 'auto');
	    $sSubject           = mb_encode_mimeheader($sSubjectText, $sCharset, 'B');
        $sHeaders 			= "From: $sEmailFrom\r\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";

        if ( $sEmailTemplateName != false ) {
            $sMailContent   = uni_get_email_content_html( $sEmailTemplateName, $aMailVars );
        } else {
            $sMailContent   = $sEmailText;
        }

        wp_mail($sEmailTo, $sSubject, $sMailContent, $sHeaders);

}

//
function uni_get_email_content_html( $sEmailTemplateName, $aMailVars = array() ) {
		ob_start();
		uni_get_template( $sEmailTemplateName );
		$sMailContent = ob_get_clean();
        if ( !empty($aMailVars) ) {
            foreach ( $aMailVars as $sVarName => $sVarValue ) {
                $sMailContent = str_replace($sVarName, $sVarValue, $sMailContent);
            }
        }
        return $sMailContent;
}

//
function uni_get_template( $sEmailTemplateName, $args = array() ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

    if ( file_exists( trailingslashit( get_stylesheet_directory() ) . $sEmailTemplateName ) ) {
        $sTemplatePath = trailingslashit( get_stylesheet_directory() ) . $sEmailTemplateName;
    } else if ( file_exists( trailingslashit( get_template_directory() ) . $sEmailTemplateName ) ) {
        $sTemplatePath = trailingslashit( get_template_directory() ) . $sEmailTemplateName;
    } else {
		return;
	}

	include( $sTemplatePath );
}

//
header("X-XSS-Protection: 0");
?>