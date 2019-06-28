<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title(); ?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!--[if lte IE 8]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--[if lt IE 8]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png" sizes="16x16" />

        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo bloginfo('rss2_url'); ?>">

        <!-- wp_header -->
        <?php
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        wp_head(); ?>

	</head>
<body <?php body_class(); ?>>
    <?php $sHeaderLayout = ( ot_get_option( 'uni_header_layout' ) && is_page_template('templ-home.php') ) ? ot_get_option( 'uni_header_layout' ) : 'header1'; ?>
	<header class="<?php echo esc_attr( $sHeaderLayout ); ?> clear">
        <?php
        if ( $sHeaderLayout == 'header1' ) {
            $sLogoStyles = 'height:20px;padding-left:20px;';
            $iLogoAThumbId = ( ot_get_option( 'uni_logo_a' ) ) ? ot_get_option( 'uni_logo_a' ) : '';
            if ( $iLogoAThumbId ) {
                $aLogoAImage = wp_get_attachment_image_src( $iLogoAThumbId, 'unithumb-logo' );
                $sLogoStyles = 'height:'.$aLogoAImage[2].'px;padding-left:'.$aLogoAImage[1].'px;';
            }
        ?>
		<a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url( '/' ) ); } ?>" title="<?php echo esc_attr( bloginfo('name') ) ?>" class="logo clear" style="<?php echo esc_attr( $sLogoStyles ); ?>">
            <?php
                if ( $iLogoAThumbId ) {
            ?>
                <img class="mainLogo" src="<?php echo esc_url( $aLogoAImage[0] ); ?>" width="<?php echo esc_attr( $aLogoAImage[1] ); ?>" height="<?php echo esc_attr( $aLogoAImage[2] ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
            <?php } else { ?>
			    <img class="mainLogo" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" width="20" height="20" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
            <?php } ?>
		<span><?php bloginfo('name') ?></span></a>
        <?php } else if ( $sHeaderLayout == 'header2' ) {
            $sLogoStyles = 'height:20px;padding-left:20px;';
            $iLogoBThumbId = ( ot_get_option( 'uni_logo_b' ) ) ? ot_get_option( 'uni_logo_b' ) : '';
            $iLogoCThumbId = ( ot_get_option( 'uni_logo_c' ) ) ? ot_get_option( 'uni_logo_c' ) : '';
            if ( $iLogoBThumbId && $iLogoCThumbId ) {
                $aLogoBImage = wp_get_attachment_image_src( $iLogoBThumbId, 'unithumb-logo' );
                $aLogoCImage = wp_get_attachment_image_src( $iLogoCThumbId, 'unithumb-logo' );
                $sLogoStyles = 'height:'.$aLogoBImage[2].'px;padding-left:'.$aLogoBImage[1].'px;';
            }
        ?>
		<a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url( '/' ) ); } ?>" title="<?php echo esc_attr( get_bloginfo('name') ) ?>" class="logo clear" style="<?php echo esc_attr( $sLogoStyles ); ?>">
            <?php
                if ( $iLogoBThumbId && $iLogoCThumbId ) {
            ?>
			    <img class="logoDark" src="<?php echo esc_url( $aLogoCImage[0] ); ?>" width="<?php echo esc_attr( $aLogoCImage[1] ); ?>" height="<?php echo esc_attr( $aLogoCImage[2] ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
			    <img class="logoLight" src="<?php echo esc_url( $aLogoBImage[0] ); ?>" width="<?php echo esc_attr( $aLogoBImage[1] ); ?>" height="<?php echo esc_attr( $aLogoBImage[2] ); ?>" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
            <?php } else { ?>
			<img class="logoDark" src="<?php echo get_template_directory_uri(); ?>/images/logoDark.svg" width="20" height="20" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
			<img class="logoLight" src="<?php echo get_template_directory_uri(); ?>/images/logoLight.svg" width="20" height="20" alt="<?php echo esc_attr( get_bloginfo('name') ); ?>">
            <?php } ?>
		<span><?php bloginfo('name') ?></span></a>
        <?php } ?>

        <?php if ( function_exists('icl_get_languages') ) {
        $aLanguages = icl_get_languages('skip_missing=0');
        if ( !empty($aLanguages) ) {
        ?>
        <div class="languageSelect">
            <?php foreach ( $aLanguages as $aLanguage ) :
                if ( $aLanguage['active'] ) {
            ?>
            <span><i class="languageIcon"></i> <?php echo esc_html( $aLanguage['language_code'] ) ?> <i class="dropDownIcon"></i></span>
            <?php }
            endforeach; ?>
            <ul>
            <?php foreach ( $aLanguages as $aLanguage ) :
                if ( !$aLanguage['active'] ) { ?>
                <li><a href="<?php echo esc_url( $aLanguage['url'] ) ?>"><?php echo esc_html( $aLanguage['language_code'] ) ?></a></li>
            <?php }
            endforeach; ?>
            </ul>
        </div>
        <?php
            }
        } ?>

        <?php wp_nav_menu( array( 'container' => '', 'container_class' => '', 'menu_class' => 'mainmenu clear', 'theme_location' => 'primary', 'depth' => 3, 'fallback_cb'=> 'uni_nav_fallback' ) ); ?>
        
		<a href="#" title="Menu" class="showMobileMenu">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</a>
		<a href="#" title="Close menu" class="closeMobileMenu"></a>
	</header>