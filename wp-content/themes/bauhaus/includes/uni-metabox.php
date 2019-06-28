<?php
/**
 * Initialize the custom Meta Boxes.
 */
add_action( 'admin_init', 'unitheme_custom_meta_boxes' );

/**
 * Meta Boxes.
 *
 * @return    void
 * @since     2.0
 */
function unitheme_custom_meta_boxes() {

  $project_meta_box = array(
    'id'          => 'project_meta_box',
    'title'       => esc_html__( 'Parameters for Project', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'uni_project' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Slider', 'bauhaus' ),
        'id'          => 'tab_project_slider',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Images for slider', 'bauhaus' ),
        'id'          => 'uni_project_slider',
        'type'        => 'gallery',
        'desc'        => esc_html__( 'Added images will be shown in slider on single project page', 'bauhaus' ),
        'condition'   => ''
      ),
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Portfolio page link', 'bauhaus' ),
        'id'          => 'uni_project_portfolio_uri',
        'type'        => 'text',
        'desc'        => esc_html__( 'You can override "Portfolio page" global option here. If you add an url, it will be used for this project only. Of course, you may add any external URI here.', 'bauhaus' ),
      ),
      array(
        'label'       => esc_html__( 'Project\'s area', 'bauhaus' ),
        'id'          => 'uni_area',
        'type'        => 'text',
        'desc'        => ''
      )
    )
  );

  $price_meta_box = array(
    'id'          => 'price_meta_box',
    'title'       => esc_html__( 'Parameters for Price', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'uni_price' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Price value', 'bauhaus' ),
        'id'          => 'uni_price',
        'type'        => 'text',
        'desc'        => ''
      ),
      array(
        'label'       => esc_html__( 'Currency sign', 'bauhaus' ),
        'id'          => 'uni_currency',
        'type'        => 'text',
        'desc'        => ''
      ),
      array(
        'label'       => esc_html__( 'per... ?', 'bauhaus' ),
        'id'          => 'uni_type',
        'type'        => 'text',
        'desc'        => esc_html__('for example: "unit", "square meter" etc.', 'bauhaus')
      )
    )
  );

  $testimonial_meta_box = array(
    'id'          => 'testimonial_meta_box',
    'title'       => esc_html__( 'Parameters for Testimonial', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'uni_testimonial' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Testimonial author name', 'bauhaus' ),
        'id'          => 'uni_testimonial_name',
        'type'        => 'text',
        'desc'        => ''
      ),
      array(
        'label'       => esc_html__( 'Testimonial author position', 'bauhaus' ),
        'id'          => 'uni_testimonial_position',
        'type'        => 'text',
        'desc'        => ''
      )
    )
  );

  $about_meta_box = array(
    'id'          => 'about_meta_box',
    'title'       => esc_html__( 'Parameters for "About" page', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'H2 title on the page', 'bauhaus' ),
        'id'          => 'uni_title',
        'type'        => 'text',
        'desc'        => ''
      ),
      array(
        'label'       => esc_html__( 'Subtitle on the page', 'bauhaus' ),
        'id'          => 'uni_sub_title',
        'type'        => 'textarea',
        'desc'        => esc_html__( 'You may use html tag <code>br</code> to start a new line in your text.', 'bauhaus' )
      ),
      array(
        'label'       => esc_html__( '"Our story" title', 'bauhaus' ),
        'id'          => 'uni_our_story_title',
        'type'        => 'text',
        'desc'        => ''
      ),
      array(
        'label'       => esc_html__( 'Text in the left column below "Our story" title', 'bauhaus' ),
        'id'          => 'uni_left_col_text',
        'type'        => 'textarea',
        'desc'        => esc_html__( 'You may use <code>br</code> html tag to start a new line in your text. You can decide to add two or more paragraphs, so just wrap each in <code>p</code> html tag.', 'bauhaus' )
      ),
      array(
        'label'       => esc_html__( 'Text in the right column below "Our story" title', 'bauhaus' ),
        'id'          => 'uni_right_col_text',
        'type'        => 'textarea',
        'desc'        => esc_html__( 'You may use html tag <code>br</code> to start a new line in your text. You can decide to add two or more paragraphs, so just wrap each in <code>p</code> html tag.', 'bauhaus' )
      ),
      array(
        'label'       => esc_html__( 'Show/Hide "Meet Our Team" block on the page', 'bauhaus' ),
        'id'          => 'uni_about_team_enable',
        'type'        => 'on-off',
        'desc'        => '',
        'std'         => 'off'
      ),
      array(
        'label'       => esc_html__( 'Custom title for "Meet Our Team" block on the page', 'bauhaus' ),
        'id'          => 'uni_about_team_title',
        'type'        => 'text',
        'desc'        => '',
        'condition'   => 'uni_about_team_enable:is(on)'
      ),
      array(
        'label'       => esc_html__( 'Show/Hide "Our Partners" block on the page', 'bauhaus' ),
        'id'          => 'uni_about_brands_enable',
        'type'        => 'on-off',
        'desc'        => '',
        'std'         => 'off'
      ),
      array(
        'label'       => esc_html__( 'Custom title for "Our Partners" block on the page', 'bauhaus' ),
        'id'          => 'uni_about_brands_title',
        'type'        => 'text',
        'desc'        => '',
        'condition'   => 'uni_about_brands_enable:is(on)'
      ),
      array(
        'label'       => esc_html__( 'Show/Hide "Instagram" block on the page', 'bauhaus' ),
        'id'          => 'uni_about_instagram_enable',
        'type'        => 'on-off',
        'desc'        => '',
        'std'         => 'off'
      )
    )
  );

  // for page "Services0"
  $service_meta_box = array(
    'id'          => 'service_meta_box',
    'title'       => esc_html__( 'Parameters for "Service" page', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'uni_service' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'Display this item on the home page', 'bauhaus' ),
        'id'          => 'uni_service_display_home',
        'type'        => 'on-off',
        'desc'        => esc_html__( 'Enable/disable displaying this item on the home page', 'bauhaus' ),
        'std'         => 'off'
      ),
      array(
        'label'       => esc_html__( 'Image for this item for the home page', 'bauhaus' ),
        'id'          => 'uni_service_home_image',
        'type'        => 'gallery',
        'desc'        => esc_html__( 'Add an image for this item to be displayed on the home page. You may add many images, but only the frst one will be used.', 'bauhaus' ),
        'condition'   => 'uni_service_display_home:is(on)'
      ),
      array(
        'label'       => esc_html__( 'Display this item on "Services" page', 'bauhaus' ),
        'id'          => 'uni_service_display_services',
        'type'        => 'on-off',
        'desc'        => esc_html__( 'Enable/disable displaying this item on "Services" page', 'bauhaus' ),
        'std'         => 'off'
      ),
      array(
        'label'       => esc_html__( 'Image for this item for "Services" page', 'bauhaus' ),
        'id'          => 'uni_service_services_image',
        'type'        => 'gallery',
        'desc'        => esc_html__( 'Add an image for this item to be displayed on "Services" page. You may add many images, but only the frst one will be used.', 'bauhaus' ),
        'condition'   => 'uni_service_display_services:is(on)'
      )
    )
  );

  $slider_meta_box = array(
    'id'          => 'slider_meta_box',
    'title'       => esc_html__( 'Parameters for Home Page Slide', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'uni_home_slides' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'URI for "view all" button', 'bauhaus' ),
        'id'          => 'uni_slide_uri',
        'type'        => 'text',
        'desc'        => esc_html__( 'If you don\'t define an URI for this button, it wo\'nt be shown for this slider', 'bauhaus' )
      ),
      array(
        'label'       => esc_html__( 'Label for "view all" button', 'bauhaus' ),
        'id'          => 'uni_slide_label',
        'type'        => 'text',
        'std'         => 'view all',
        'desc'        => ''
      ),
      array(
        'label'       => esc_html__( 'URI for "view project" button', 'bauhaus' ),
        'id'          => 'uni_slide_uri2',
        'type'        => 'text',
        'desc'        => esc_html__( 'If you don\'t define an URI for this button, it wo\'nt be shown for this slider', 'bauhaus' )
      ),
      array(
        'label'       => esc_html__( 'Label for "view project" button', 'bauhaus' ),
        'id'          => 'uni_slide_label',
        'type'        => 'text',
        'std'         => 'view project',
        'desc'        => ''
      ),
      array(
        'id'          => 'uni_slide_text_colour',
        'label'       => esc_html__( 'Colour of texts', 'bauhaus' ),
        'desc'        => esc_html__( 'Choose one of the colours - white or black - as a colour for texts which are over the slide. If your slide is mainly dark then choose "White colour" to make white all the texts. And vise versa. The default colour is "white".', 'bauhaus' ),
        'std'         => 'white',
        'type'        => 'radio',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array(
          array(
            'value'       => 'white',
            'label'       => esc_html__( 'White colour', 'bauhaus' ),
            'src'         => ''
          ),
          array(
            'value'       => 'black',
            'label'       => esc_html__( 'Black colour', 'bauhaus' ),
            'src'         => ''
          )
        )
      ),
      array(
        'label'       => esc_html__( 'Colours of "view all" button', 'bauhaus' ),
        'id'          => 'tab_colours',
        'type'        => 'tab'
      ),
      array(
        'id'          => 'uni_button_a_colour',
        'label'       => esc_html__( 'Colour for label of "view all" button', 'bauhaus' ),
        'desc'        => '',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'tab_colours',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_button_a_bg',
        'label'       => esc_html__( 'Background colour for "view all" button', 'bauhaus' ),
        'desc'        => '',
        'std'         => '#168cb9',
        'type'        => 'colorpicker',
        'section'     => 'tab_colours',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_button_a_bg_hover',
        'label'       => esc_html__( 'Background colour of hovered state for "view all" button', 'bauhaus' ),
        'desc'        => '',
        'std'         => '#1b9fd2',
        'type'        => 'colorpicker',
        'section'     => 'tab_colours',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      )
    )
  );

  $brand_meta_box = array(
    'id'          => 'brand_meta_box',
    'title'       => esc_html__( 'Parameters for "Brand"', 'bauhaus' ),
    'desc'        => '',
    'pages'       => array( 'uni_brand' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => esc_html__( 'Additional info', 'bauhaus' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => esc_html__( 'URI for this brand', 'bauhaus' ),
        'id'          => 'uni_brand_uri',
        'type'        => 'text',
        'desc'        => esc_html__( 'This is an optional parameter. If you don\'t define an URI for this item, then this brand/logo won\'t act as link.', 'bauhaus' )
      )
    )
  );

  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $project_meta_box );
    ot_register_meta_box( $price_meta_box );
    ot_register_meta_box( $testimonial_meta_box );
    ot_register_meta_box( $about_meta_box );
    ot_register_meta_box( $service_meta_box );
    ot_register_meta_box( $slider_meta_box );
    ot_register_meta_box( $brand_meta_box );
}