<?php

/**
 * Adds sections and settings to customizer
 *
 * @param $wp_customize
 */

function bauhaus_true_customizer_init( $wp_customize ) {


	/*******************************************************************
	 * projects
	 *******************************************************************/

	/*******************************************************************
	 * 404
	 *******************************************************************/
	/*$tmp_sectionname = "bauhaus_projects";

	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Projects  settings', 'bauhaus' ),
		'priority' => 3,
	) );

	;
	$tmp_tabel = 'type';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 'grid',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Select projects type', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'select',
		'choices' => array(
			'grid' => esc_html__( 'grid', 'bauhaus' ),
			'carousel' => esc_html__( 'carousel', 'bauhaus' ),
			
		)
	) );



	
	//Panels
	$wp_customize->add_panel( 'panel_projects', array(
		'title' => esc_html__( 'Projects settings', 'bauhaus' ),
		'description' => esc_html__( 'Settings of the projects', 'bauhaus' ),
		'priority' => 3,
	) );


	/*******************************************************************
	 * Main page settings
	 *******************************************************************/

	/*	$tmp_sectionname = "bauhaus";
		$wp_customize->add_section( $tmp_sectionname . '_section', array(
			'title' => esc_html__( 'Select projects type', 'bauhaus' ),
			'priority' => 30,
			'panel' => 'panel_projects'
		) );
		$tmp_tabel = 'sidebar_position';
		$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
		$wp_customize->add_setting( $tmp_settingname, array(
			'default' => 's3',
			'sanitize_callback' => 'sanitize_text_field'
		) );
		$wp_customize->add_control( $tmp_settingname . '_control', array(
			'label' => esc_html__( 'Select projects type', 'bauhaus' ),
			'section' => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
			'type' => 'radio',
			'choices' => array(
				'grid' => esc_html__( 'Grid', 'bauhaus' ),
				'masonry' => esc_html__( 'Masonry', 'bauhaus' ),
				'carousel' => esc_html__( 'Carousel', 'bauhaus' ),


			)
		) );
	*/

	//Panels
	$wp_customize->add_panel( 'panel_blog', array(
		'title' => esc_html__( 'Blog settings', 'bauhaus' ),
		'description' => esc_html__( 'Settings of the blog', 'bauhaus' ),
		'priority' => 31,
	) );


	/*******************************************************************
	 * Main page settings
	 *******************************************************************/

	$tmp_sectionname = "bauhaus";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Location sidebar', 'bauhaus' ),
		'priority' => 30,
		'panel' => 'panel_blog'
	) );
	$tmp_tabel = 'sidebar_position';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 's2',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Location sidebar', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'radio',
		'choices' => array(
			's3' => esc_html__( 'Sidebar none', 'bauhaus' ),
			's1' => esc_html__( 'Sidebar Left', 'bauhaus' ),
			's2' => esc_html__( 'Sidebar Right', 'bauhaus' ),


		)
	) );

	/*----------------------------------------------------------------
	 * Blog list setting
	 -----------------------------------------------------------------*/
	$tmp_sectionname = "bauhaus_blog_list";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Blog list', 'bauhaus' ),
		'priority' => 30,
		'panel' => 'panel_blog'
	) );

	$tmp_tabel = 'text';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'Continue', 'bauhaus' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Button text Continue', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_tabel = 'limit_word';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 40,
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Limit word in post blog list', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );


	$tmp_tabel = 'type_blog';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 'listing',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Select blog type', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'select',
		'choices' => array(
			'grid' => esc_html__( 'grid', 'bauhaus' ),
			'listing' => esc_html__( 'listing', 'bauhaus' ),
			'masonry' => esc_html__( 'masonry', 'bauhaus' ),
		)
	) );


	$tmp_tabel = 'type_blog_header';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '1',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Select blog header type', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'select',
		'choices' => array(
			'1' => esc_html__( 'enable header', 'bauhaus' ),
			'none' => esc_html__( 'disable header', 'bauhaus' ),
		)
	) );







	/*----------------------------------------------------------------
	 * single post settings
	 -----------------------------------------------------------------*/
	$tmp_sectionname = "bauhaus_single_post_settings";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Single post settings', 'bauhaus' ),
		'priority' => 30,
		'panel' => 'panel_blog'
	) );

	$tmp_tabel = 'text';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'Continue', 'bauhaus' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Button text Continue', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_tabel = 'title';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'Related Posts', 'bauhaus' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Related Posts title', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_tabel = 'limit_word';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 17,
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Limit words in related posts description', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_tabel = 'count';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 3,
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Related posts count', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_tabel = 'sort';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 'ASC',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Related post sorting ', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'select',
		'choices' => array(
			'ASC' => esc_html__( 'ASC', 'bauhaus' ),
			'DESC' => esc_html__( 'DESC', 'bauhaus' ),

		)
	) );
	$tmp_tabel = 'hide';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 's1',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Show or hide related posts', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'radio',
		'choices' => array(
			's1' => esc_html__( 'Show related posts', 'bauhaus' ),
			's2' => esc_html__( 'Do not show related posts', 'bauhaus' ),



		)
	) );

	$tmp_tabel = 'hide_soc';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 's1',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Show or hide social links ', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'radio',
		'choices' => array(
			's1' => esc_html__( 'Show social links', 'bauhaus' ),
			's2' => esc_html__( 'Do not show social links', 'bauhaus' ),



		)
	) );












	/*******************************************************************
	 * Social networks
	 *******************************************************************/
	$tmp_sectionname = "bauhaus_social_networks";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Social networks', 'bauhaus' ),
		'priority' => 31,
		'description' => esc_html__( 'Enter url desired social networks so that they appear on the site', 'bauhaus' )
	) );

	/*short*/


	$tmp_settingname = $tmp_sectionname . '_control_social_shortcode';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( ' Insert Social shortcode or another ', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'description' => esc_html__( 'its show  shortcode [bauhaus_social_links url="https://pinterest.com/" class="fa fa-pinterest"]', 'bauhaus' ),
		'settings' => $tmp_settingname,
		'type' => 'textarea'
	) );


	/*facebook*/
	$tmp_settingname = $tmp_sectionname . '_control_facebook';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Facebook  url', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*twitter*/
	$tmp_settingname = $tmp_sectionname . '_control_twitter';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Twitter url', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*googleplus*/
	$tmp_settingname = $tmp_sectionname . '_control_googleplus';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'googleplus url', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*linkedin*/
	$tmp_settingname = $tmp_sectionname . '_control_linkedin';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'linkedin url', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*dribbble*/
	$tmp_settingname = $tmp_sectionname . '_control_dribbble';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'dribbble url', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_sectionname = "control_social_footer_shortcode";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Blog list', 'bauhaus' ),
		'priority' => 30,
		'panel' => 'panel_blog'
	) );






	/*******************************************************************
	 * Header
	 *******************************************************************/

	$tmp_sectionname = "bauhaus_header";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Header', 'bauhaus' ),
		'priority' => 30,
	) );

	/**
	 * Phone
	 */


	$tmp_settingname = $tmp_sectionname . '_phone';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( ' Phone in the header', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_settingname = $tmp_sectionname . '_text';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Text near the phone ', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*******************************************************************
	 * logo
	 *******************************************************************/


	$tmp_sectionname = "bauhaus_logo";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Logo', 'bauhaus' ),
		'priority' => 30,
		'description' => esc_html__( 'Here You can change the logo in the header and in the footer', 'bauhaus' )
	) );

	$tmp_settingname = $tmp_sectionname . '_small';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label' => esc_html__( ' Logo', 'bauhaus' ),
			'section' => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );
	$tmp_settingname = $tmp_sectionname . '_white';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label' => esc_html__( ' Logo white for full-page', 'bauhaus' ),
			'section' => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );





	/**
	 *  logo
	 */


	$tmp_settingname = $tmp_sectionname . '_name';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Logo name', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type'	=> 'text'
	) );

	$tmp_settingname = $tmp_sectionname . '_text';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Logo text', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );





	/*******************************************************************
	 * Map style
	 *******************************************************************/

	$tmp_sectionname = "bauhaus_map";
	$tmp_default = "";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Map style', 'bauhaus' ),
		'priority' => 30,
		'description' => esc_html__( 'Map style JSON config (see https://snazzymaps.com, http://www.mapstylr.com/showcase/ )', 'bauhaus' )
	) );
	$tmp_tabel = 'stylemap_json';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$tmp_settingtitle = esc_html__( 'stylemap_json', 'bauhaus' );
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => $tmp_default,
		'sanitize_callback' => 'bauhaus_sanitize_temp'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'stylemap json', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea'
	) );


	$tmp_settingname = $tmp_sectionname . '_google_key';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Insert you google map api key', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'description' => esc_html__( '(see https://developers.google.com/maps/documentation/javascript/get-api-key#key )', 'bauhaus' ),
		'type' => 'text',
	) );


	/******************************************************************
	 * Colors
	 */

	$colors = array();
	if ( function_exists( 'bauhaus_get_style_color' ) ) {
		$colors = bauhaus_get_style_color();
	}


	$arr_exclude = array(
		'717071',
		'616060',
		'8A8A8A',
		'4B4B4B'

	);


	foreach ( $colors as $k => $v ) {
		$grb = bauhaus_Hex2RGB( $v );
		if ( in_array( $v, $arr_exclude ) ) {
			continue;
		}
		$tmp_sectionname = 'colors';
		$tmp_settingname = $tmp_sectionname . '_m_' . $v;
		$label = $v;

		if ( $v == 'CEE002' ) {
			$label = esc_html__( 'Active link & Hover color  ', 'bauhaus' );
		}
		if ( $v == '999999' ) {
			$label = esc_html__( 'Side menu text  ', 'bauhaus' );
		}
		if ( $v == 'CCCCCC' ) {
			$label = esc_html__( ' social icons post,menu   ', 'bauhaus' );
		}
		if ( $v == '666666' ) {
			$label = esc_html__( 'Post text  ', 'bauhaus' );
		}

		$wp_customize->add_setting( $tmp_settingname, array(
			'default' => "#" . esc_html( $v ),
			'sanitize_callback' => 'bauhaus_sanitize_temp'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $tmp_settingname,
			array(
				'label' => esc_html__( 'Color ', 'bauhaus' ) . esc_html( $label ) . '',
				'section' => $tmp_sectionname,
				'settings' => $tmp_settingname,
			) ) );
	}


	/*******************************************************************
	 * Performans
	 *******************************************************************/

	$tmp_sectionname = "bauhaus_performans";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Performance', 'bauhaus' ),
		'priority' => 31,
		'description' => esc_html__( '', 'bauhaus' )
	) );

	$tmp_settingname = $tmp_sectionname . '_style';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 'light',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Select a color scheme', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'select',
		'choices' => array(
			'light' => esc_html__( 'light', 'bauhaus' ),
			'dark' => esc_html__( 'dark', 'bauhaus' ),

		)
	) );



	$tmp_settingname = $tmp_sectionname . '_preloader';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => true,
		'sanitize_callback' => 'wp_validate_boolean'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Enable preloader ?', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'checkbox',
	) );


	$tmp_settingname = $tmp_sectionname . '_scroll';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => false,
		'sanitize_callback' => 'wp_validate_boolean'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Enable smoothscroll?', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'checkbox',
	) );


	$tmp_settingname = $tmp_sectionname . '_header_pos';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => true,
		'sanitize_callback' => 'wp_validate_boolean'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Enable navbar affix?', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'checkbox',
	) );





	/*********************************************************
	 * Footer
	 **************************************************************/
	$tmp_sectionname = "footer";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Footer', 'bauhaus' ),
		'priority' => 31,
		'description' => esc_html__( '', 'bauhaus' )
	) );







	$tmp_settingname = $tmp_sectionname . '_copyright';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	) );


	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Footer copyright', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );


	/*********************************************************
	 * Side menu
	 **************************************************************/
	$tmp_sectionname = "side_menu";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Side menu', 'bauhaus' ),
		'priority' => 31,
		'description' => esc_html__( '', 'bauhaus' )
	) );







	$tmp_settingname = $tmp_sectionname . '_copyright';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	) );


	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Menu copyright', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );




	/*******************************************************************
	 * 404
	 *******************************************************************/
	$tmp_sectionname = "bauhaus_404";
	$tmp_default = "";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( '404', 'bauhaus' ),
		'priority' => 30,
	) );




	$tmp_settingname = $tmp_sectionname . '_top_desc';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'OOPS... YOU GOT LOST.', 'bauhaus' ),
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Insert your description', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'description' => esc_html__( '(insert text )', 'bauhaus' ),
		'type' => 'text',

	) );



	$tmp_tabel = 'main_title';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$tmp_settingtitle = esc_html__( 'main_title', 'bauhaus' );
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( '404', 'bauhaus' ),
		'sanitize_callback' => 'bauhaus_sanitize_temp'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Top title', 'bauhaus' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'description' => esc_html__( 'insert title (for example 404 Page) )', 'bauhaus' ),
		'type' => 'text'
	) );










}


function bauhaus_sanitize_to_int( $value ) {
	return (int) $value;
}


function bauhaus_sanitize_temp( $value ) {
	return $value;
}


/**
 *Plug in  script to customize
 */

add_action( 'customize_register', 'bauhaus_true_customizer_init' );


function bauhaus_color_hack( $css ) {
//	$css = str_ireplace( "322F44", "33244A", $css );


	return $css;


}

function bauhaus_Hex2RGB( $color ) {
	$color = str_replace( '#', '', $color );
	if ( strlen( $color ) != 6 ) {
		return array(
			0,
			0,
			0
		);
	}
	$bauhaus_rgb = array();
	for ( $x = 0; $x < 3; $x ++ ) {
		$bauhaus_rgb[$x] = hexdec( substr( $color, ( 2 * $x ), 2 ) );
	}

	return $bauhaus_rgb;
}