<?php
/*
*  Template Name: Home page
*/
get_header();
$aUniAllowedHtmlCustomGrid = uni_allowed_html_wo_a();
?>

	<section class="container">

    <?php if ( ot_get_option('uni_home_slider_enable') == 'on' ) { ?>
	    <?php
	    $aHomeSlidesArgs = array(
	        'post_type' => 'uni_home_slides',
            'post_status' => 'publish',
            'posts_per_page' => -1,
	        'orderby' => 'menu_order',
            'order' => 'asc'
	    );
	    $oHomeSlides = new WP_Query( $aHomeSlidesArgs );
	    if ( $oHomeSlides->have_posts() ) :
        $i = 0
        ?>
			<div id="homeSlider" class="homeSlider">
				<ul>
        <?php
	    while ( $oHomeSlides->have_posts() ) : $oHomeSlides->the_post();
        $aPostCustom = get_post_custom( $post->ID );
	    $sThumbId = get_post_thumbnail_id( $post->ID );
	    $aImage = wp_get_attachment_image_src( $sThumbId, 'full' );
        $sBackgroundStyle = '';
        $sSlideTextsColour = ( !empty($aPostCustom['uni_slide_text_colour'][0]) ) ? $aPostCustom['uni_slide_text_colour'][0] : 'white';
        if ( $sSlideTextsColour == 'black' ) {
            $sBackgroundStyle = 'background--white';
        } else {
            $sBackgroundStyle = 'background--dark';
        }
	    ?>
					<li data-slide-style="<?php echo esc_attr( $sBackgroundStyle ); ?>" data-slide="<?php echo esc_attr( $i ); ?>" style="background-image: url(<?php echo ( ( isset($aImage[0]) ) ? esc_url( $aImage[0] ) : '' ); ?>);">
						<div class="slideMeta">
							<h3><?php the_title() ?></h3>
                            <?php if ( isset($aPostCustom['uni_slide_uri'][0]) && !empty($aPostCustom['uni_slide_uri'][0]) ) { ?>
							<style type="text/css">
								.btn-seeAll_<?php echo get_the_ID() ?> {color:<?php echo ( ( isset($aPostCustom['uni_button_a_colour'][0]) ) ? esc_attr( $aPostCustom['uni_button_a_colour'][0] ) : '#ffffff' ); ?>;background-color:<?php echo ( ( isset($aPostCustom['uni_button_a_bg'][0]) ) ? esc_attr( $aPostCustom['uni_button_a_bg'][0] ) : '#168cb9' ); ?>;}
								.btn-seeAll_<?php echo get_the_ID() ?>:hover {background-color: <?php echo ( ( isset($aPostCustom['uni_button_a_bg_hover'][0]) ) ? esc_attr( $aPostCustom['uni_button_a_bg_hover'][0] ) : '#1b9fd2' ); ?>;}
							</style>
							<a href="<?php echo ( ( isset($aPostCustom['uni_slide_uri'][0]) ) ? esc_url( $aPostCustom['uni_slide_uri'][0] ) : '' ); ?>" class="btn-seeAll btn-seeAll_<?php echo get_the_ID() ?>"><?php _e('view all', 'bauhaus') ?></a>
                            <?php } ?>
                            <?php if ( isset($aPostCustom['uni_slide_uri2'][0]) && !empty($aPostCustom['uni_slide_uri2'][0]) ) { ?>
							<a href="<?php echo ( ( isset($aPostCustom['uni_slide_uri2'][0]) ) ? esc_url( $aPostCustom['uni_slide_uri2'][0] ) : '' ); ?>" class="btn-seeMore"><?php esc_html_e('view project', 'bauhaus') ?></a>
                            <?php } ?>
						</div>
					</li>
	    <?php
        $i++;
	    endwhile;
        ?>
				</ul>
			</div>
        <?php
        endif;
    	wp_reset_postdata();
        ?>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_about_one_enable') == 'on' ) { ?>
        <?php
        $aHomeAboutOneImage = array();
	    if ( ot_get_option('uni_home_about_one_bg') ) {
            $aHomeAboutOneImage = wp_get_attachment_image_src( ot_get_option('uni_home_about_one_bg'), 'full' );
        }
        $sBackgroundStyle = '';
        $sSlideTextsColour = ( ot_get_option('uni_home_about_one_colour') ) ? ot_get_option('uni_home_about_one_colour') : 'white';
        if ( $sSlideTextsColour == 'black' ) {
            $sBackgroundStyle = 'background--white';
        } else {
            $sBackgroundStyle = 'background--dark';
        }
	    ?>
			<div class="homeScreen" data-screen-style="<?php echo esc_attr( $sBackgroundStyle ); ?>" style="background-image: url(<?php echo ( !empty($aHomeAboutOneImage) ) ? $aHomeAboutOneImage[0] : get_template_directory_uri().'/images/placeholders/bg-about.png'; ?>);">
				<div class="homeScreenDesc">
                    <?php
                    $sHomeAboutOneTitle = ot_get_option('uni_home_about_one_title');
                    $sHomeAboutOneSubtitle = ot_get_option('uni_home_about_one_subtitle');
                    ?>
					<span><?php echo ( ot_get_option( 'uni_home_about_one_subtitle' ) ) ? wp_kses( $sHomeAboutOneSubtitle, $aUniAllowedHtmlCustomGrid ) : esc_html__('Architecture studio', 'bauhaus'); ?></span>
					<h1><?php echo ( ot_get_option( 'uni_home_about_one_title' ) ) ? wp_kses( $sHomeAboutOneTitle, $aUniAllowedHtmlCustomGrid ) : esc_html__('Good design is as little design as possible', 'bauhaus'); ?></h1>
                    <?php if ( ot_get_option( 'uni_home_about_one_button_uri' ) ) { ?>
					<a class="seeMoreLink" href="<?php echo esc_url( ot_get_option( 'uni_home_about_one_button_uri' ) ); ?>"><?php echo ( ot_get_option( 'uni_home_about_one_button_text' ) ) ? esc_html( ot_get_option( 'uni_home_about_one_button_text' ) ) : esc_html__('see more', 'bauhaus'); ?></a>
                    <?php } ?>
				</div>
			</div>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_about_two_enable') == 'on' ) { ?>
        <?php
        $sHomeAboutTwoTitle = ot_get_option('uni_home_about_two_title');
        $aHomeAboutTwoImage = array();
	    if ( ot_get_option('uni_home_about_two_bg') ) {
            $aHomeAboutTwoImage = wp_get_attachment_image_src( ot_get_option('uni_home_about_two_bg'), 'full' );
        }
	    ?>
    		<div class="aboutUsBlock clear">
    			<a href="<?php echo ( ot_get_option( 'uni_home_about_two_button_uri' ) ) ? esc_url( ot_get_option( 'uni_home_about_two_button_uri' ) ) : ''; ?>" class="aboutUsImg">
                <?php if ( !empty($aHomeAboutTwoImage) ) { ?>
                    <img src="<?php echo esc_url( $aHomeAboutTwoImage[0] ) ?>" alt="<?php if ( !empty($sHomeAboutTwoTitle) ) echo esc_attr($sHomeAboutTwoTitle); ?>" width="<?php echo esc_attr( $aHomeAboutTwoImage[1] ) ?>" height="<?php echo esc_attr( $aHomeAboutTwoImage[2] ) ?>">
                <?php } else { ?>
    				<img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwoone.png' ?>" alt="<?php if ( !empty($sHomeAboutTwoTitle) ) echo esc_attr($sHomeAboutTwoTitle); ?>" width="684" height="684">
                <?php } ?>
    			</a>
    			<div class="aboutUsDesc">
    				<h3><?php if ( !empty($sHomeAboutTwoTitle) ) echo esc_html($sHomeAboutTwoTitle); ?></h3>
    				<p><?php $sAboutTwoText = ot_get_option('uni_home_about_two_text'); echo wp_kses( $sAboutTwoText, $aUniAllowedHtmlCustomGrid ); ?></p>
					<a class="learnMoreLink" href="<?php echo ( ot_get_option( 'uni_home_about_two_button_uri' ) ) ? esc_url( ot_get_option( 'uni_home_about_two_button_uri' ) ) : ''; ?>"><?php echo ( ot_get_option( 'uni_home_about_two_button_text' ) ) ? esc_html( ot_get_option( 'uni_home_about_two_button_text' ) ) : esc_html__('learn more', 'bauhaus'); ?> <i></i></a>
    			</div>
    		</div>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_grid_custom_enable') == 'on' ) { ?>
    		<div class="portfolioBlock clear">

                    <?php if ( ot_get_option('uni_home_grid_custom_uri_one') && ot_get_option('uni_home_grid_custom_uri_one') && ot_get_option('uni_home_grid_custom_uri_one') ) { ?>
					<!-- Start row -->
					<div class="portfolioLeftWrapper">
						<a href="<?php echo esc_url( ot_get_option('uni_home_grid_custom_uri_one') ) ?>" class="portfolioItemV2Small clear">
                        <?php
                        $sHomeItemOneTitle = ot_get_option('uni_home_grid_custom_title_one');
                        if ( ot_get_option('uni_home_grid_custom_image_one') ) {
                        $aHomeItemOneImage = wp_get_attachment_image_src( ot_get_option('uni_home_grid_custom_image_one'), 'unithumb-portfoliotwothree' );
                        ?>
                            <img src="<?php echo esc_url( $aHomeItemOneImage[0] ) ?>" alt="<?php if ( !empty($sHomeItemOneTitle) ) echo esc_attr($sHomeItemOneTitle); ?>" width="<?php echo esc_attr( $aHomeItemOneImage[1] ) ?>" height="<?php echo esc_attr( $aHomeItemOneImage[2] ) ?>">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/placeholders/unithumb-portfoliotwothree.png" alt="<?php if ( !empty($sHomeItemOneTitle) ) echo esc_attr($sHomeItemOneTitle); ?>" width="342" height="342">
                        <?php } ?>
							<div class="portfolioItemOverlay"></div>
							<div class="portfolioItemV2Desc">
								<h4><?php if ( !empty($sHomeItemOneTitle) ) echo esc_html($sHomeItemOneTitle); ?></h4>
								<p><?php $sGridCustomTextOne = ot_get_option('uni_home_grid_custom_text_one'); echo wp_kses( $sGridCustomTextOne, $aUniAllowedHtmlCustomGrid ); ?></p>
								<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
							</div>
						</a>
						<a href="<?php echo esc_url( ot_get_option('uni_home_grid_custom_uri_two') ) ?>" class="portfolioItemV2SmallImg clear">
                            <?php
                            $sHomeItemTwoTitle = ot_get_option('uni_home_grid_custom_title_two');
                            if ( ot_get_option('uni_home_grid_custom_image_two') ) {
                            $aHomeItemTwoImage = wp_get_attachment_image_src( ot_get_option('uni_home_grid_custom_image_two'), 'unithumb-portfoliotwotwo' );
                            ?>
                                <img src="<?php echo esc_url( $aHomeItemTwoImage[0] ) ?>" alt="<?php if ( !empty($sHomeItemTwoTitle) ) echo esc_attr($sHomeItemTwoTitle); ?>" width="<?php echo esc_attr( $aHomeItemTwoImage[1] ) ?>" height="<?php echo esc_attr( $aHomeItemTwoImage[2] ) ?>">
                            <?php
                            } else {
                            ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/placeholders/unithumb-portfoliotwotwo.png" alt="<?php if ( !empty($sHomeItemTwoTitle) ) echo esc_attr($sHomeItemTwoTitle); ?>" width="684" height="342">
                            <?php } ?>
							<div class="portfolioItemOverlay"></div>
							<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
						</a>
					</div>
					<a href="<?php echo esc_url( ot_get_option('uni_home_grid_custom_uri_three') ) ?>" class="portfolioItemV2 portfolioRightItem">
                    <?php
                    $sHomeItemThreeTitle = ot_get_option('uni_home_grid_custom_title_three');
                    if ( ot_get_option('uni_home_grid_custom_image_three') ) {
                    $aHomeItemThreeImage = wp_get_attachment_image_src( ot_get_option('uni_home_grid_custom_image_three'), 'unithumb-portfoliotwoone' );
                    ?>
                        <img src="<?php echo esc_url( $aHomeItemThreeImage[0] ) ?>" alt="<?php if ( !empty($sHomeItemThreeTitle) ) echo esc_attr($sHomeItemThreeTitle); ?>" width="<?php echo esc_attr( $aHomeItemThreeImage[1] ) ?>" height="<?php echo esc_attr( $aHomeItemThreeImage[2] ) ?>">
                    <?php
                    } else {
                    ?>
                        <img src="<?php echo get_template_directory_uri() ?>/images/placeholders/unithumb-portfoliotwoone.png" alt="<?php if ( !empty($sHomeItemThreeTitle) ) echo esc_attr($sHomeItemThreeTitle); ?>" width="684" height="684">
                    <?php } ?>
						<div class="portfolioItemOverlay"></div>
						<div class="portfolioItemV2Desc">
							<h4><?php if ( !empty($sHomeItemThreeTitle) ) echo esc_html($sHomeItemThreeTitle); ?></h4>
							<p><?php $sGridCustomTextThree = ot_get_option('uni_home_grid_custom_text_three'); echo wp_kses( $sGridCustomTextThree, $aUniAllowedHtmlCustomGrid ); ?></p>
							<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
						</div>
					</a>
					<!-- End row -->
                    <?php } ?>

                    <?php if ( ot_get_option('uni_home_grid_custom_uri_four') && ot_get_option('uni_home_grid_custom_uri_five') && ot_get_option('uni_home_grid_custom_uri_six') ) { ?>
					<!-- Start row -->
					<a href="<?php echo esc_url( ot_get_option('uni_home_grid_custom_uri_four') ) ?>" class="portfolioItemV2 portfolioLeftItem">
                    <?php
                    $sHomeItemFourTitle = ot_get_option('uni_home_grid_custom_title_four');
                    if ( ot_get_option('uni_home_grid_custom_image_four') ) {
                    $aHomeItemFourImage = wp_get_attachment_image_src( ot_get_option('uni_home_grid_custom_image_four'), 'unithumb-portfoliotwoone' );
                    ?>
                        <img src="<?php echo esc_url( $aHomeItemFourImage[0] ) ?>" alt="<?php if ( !empty($sHomeItemFourTitle) ) echo esc_attr($sHomeItemFourTitle); ?>" width="<?php echo esc_attr( $aHomeItemFourImage[1] ) ?>" height="<?php echo esc_attr( $aHomeItemFourImage[2] ) ?>">
                    <?php
                    } else {
                    ?>
                        <img src="<?php echo get_template_directory_uri() ?>/images/placeholders/unithumb-portfoliotwoone.png" alt="<?php if ( !empty($sHomeItemFourTitle) ) echo esc_attr($sHomeItemFourTitle); ?>" width="684" height="684">
                    <?php } ?>
						<div class="portfolioItemOverlay"></div>
						<div class="portfolioItemV2Desc">
							<h4><?php if ( !empty($sHomeItemFourTitle) ) echo esc_html($sHomeItemFourTitle); ?></h4>
							<p><?php $sGridCustomTextFour = ot_get_option('uni_home_grid_custom_text_four'); echo wp_kses( $sGridCustomTextFour, $aUniAllowedHtmlCustomGrid ); ?></p>
							<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
						</div>
					</a>
					<div class="portfolioRightWrapper">
						<a href="<?php echo esc_url( ot_get_option('uni_home_grid_custom_uri_five') ) ?>" class="portfolioItemV2Small clear">
                        <?php
                        $sHomeItemFiveTitle = ot_get_option('uni_home_grid_custom_title_five');
                        if ( ot_get_option('uni_home_grid_custom_image_five') ) {
                        $aHomeItemFiveImage = wp_get_attachment_image_src( ot_get_option('uni_home_grid_custom_image_five'), 'unithumb-portfoliotwothree' );
                        ?>
                            <img src="<?php echo esc_url( $aHomeItemFiveImage[0] ) ?>" alt="<?php if ( !empty($sHomeItemFiveTitle) ) echo esc_attr($sHomeItemFiveTitle); ?>" width="<?php echo esc_attr( $aHomeItemFiveImage[1] ) ?>" height="<?php echo esc_attr( $aHomeItemFiveImage[2] ) ?>">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo get_template_directory_uri() ?>/images/placeholders/unithumb-portfoliotwothree.png" alt="<?php if ( !empty($sHomeItemFiveTitle) ) echo esc_attr($sHomeItemFiveTitle); ?>" width="342" height="342">
                        <?php } ?>
							<div class="portfolioItemOverlay"></div>
							<div class="portfolioItemV2Desc">
								<h4><?php if ( !empty($sHomeItemFiveTitle) ) echo esc_html($sHomeItemFiveTitle); ?></h4>
								<p><?php $sGridCustomTextFive = ot_get_option('uni_home_grid_custom_text_five'); echo wp_kses( $sGridCustomTextFive, $aUniAllowedHtmlCustomGrid ); ?></p>
								<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
							</div>
						</a>
						<a href="<?php echo esc_url( ot_get_option('uni_home_grid_custom_uri_six') ) ?>" class="portfolioItemV2SmallImg clear">
                            <?php
                            $sHomeItemSixTitle = ot_get_option('uni_home_grid_custom_title_six');
                            if ( ot_get_option('uni_home_grid_custom_image_six') ) {
                            $aHomeItemSixImage = wp_get_attachment_image_src( ot_get_option('uni_home_grid_custom_image_six'), 'unithumb-portfoliotwotwo' );
                            ?>
                                <img src="<?php echo esc_url( $aHomeItemSixImage[0] ) ?>" alt="<?php if ( !empty($sHomeItemSixTitle) ) echo esc_attr($sHomeItemSixTitle); ?>" width="<?php echo esc_attr( $aHomeItemSixImage[1] ) ?>" height="<?php echo esc_attr( $aHomeItemSixImage[2] ) ?>">
                            <?php
                            } else {
                            ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/placeholders/unithumb-portfoliotwotwo.png" alt="<?php if ( !empty($sHomeItemSixTitle) ) echo esc_attr($sHomeItemSixTitle); ?>" width="684" height="342">
                            <?php } ?>
							<div class="portfolioItemOverlay"></div>
							<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
						</a>
					</div>
					<!-- End row -->
                    <?php } ?>

    		</div>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_services_enable') == 'on' ) { ?>
    		<div class="ourServiceBlock">

    			<div class="homeBlockTitle"><?php echo ( ot_get_option( 'uni_home_services_title' ) ) ? esc_html( ot_get_option( 'uni_home_services_title' ) ) : esc_html__('Our Services', 'bauhaus'); ?></div>

    			<div class="ourServiceWrap clear">
	    <?php
	    $aServicesArgs = array(
	        'post_type' => 'uni_service',
            'posts_per_page' => -1,
	        'orderby' => 'menu_order',
            'order' => 'asc',
            'meta_query' => array(
		        array(
			        'key'       => 'uni_service_display_home',
                    'value'     => 'on',
			        'compare'   => '='
		        )
	        )
	    );
	    $oServices = new WP_Query( $aServicesArgs );
	    if ( $oServices->have_posts() ) :
        $i = 1;
	    while ( $oServices->have_posts() ) : $oServices->the_post();
            $aPostCustom = get_post_custom( $post->ID );
        ?>
    				<div class="ourServiceItem">
                    <?php
                    if ( !empty($aPostCustom['uni_service_home_image'][0]) ) {
                        $aPageGalleryIds = explode(',', $aPostCustom['uni_service_home_image'][0]);
                        if ( !empty($aPageGalleryIds) ) {
                    ?>
                            <?php echo wp_get_attachment_image( $aPageGalleryIds[0], 'unithumb-servicehome' ); ?>
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-servicehome.png' ?>" alt="<?php the_title_attribute() ?>" width="456" height="456">
                        <?php } ?>
                    <?php } else { ?>
    					<img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-servicehome.png' ?>" alt="<?php the_title_attribute() ?>" width="456" height="456">
                    <?php } ?>
    					<div class="overlay"></div>
    					<div class="ourServiceItemContent">
    						<span><?php echo sprintf("%02d", $i); ?></span>
    						<h4><?php the_title() ?></h4>
    						<?php uni_excerpt(30, '', true) ?>
    					</div>
    				</div>
	    <?php
        $i++;
	    endwhile; endif;
	    wp_reset_postdata();
        ?>
    			</div>

    		</div>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_testimonials_enable') == 'on' ) { ?>
    		<div class="testimonialsBlock">
    			<div class="homeBlockTitle"><?php echo ( ot_get_option( 'uni_home_testimonials_title' ) ) ? esc_html( ot_get_option( 'uni_home_testimonials_title' ) ) : esc_html__('What our clients say', 'bauhaus'); ?></div>
                <?php
                if ( ot_get_option('uni_home_testimonials_bg') ) {
                    $aHomeItemOneImage = wp_get_attachment_image_src( ot_get_option('uni_home_testimonials_bg'), 'unithumb-testimonialhomebg' );
                ?>
                <div class="testimonialsWrap" style="background-image: url(<?php echo esc_url( $aHomeItemOneImage[0] ) ?>);">
                <?php } else { ?>
    			<div class="testimonialsWrap" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/placeholders/unithumb-testimonialhomebg.jpg);">
                <?php } ?>
	    <?php
	    $aTestimonialsArgs = array(
	        'post_type' => 'uni_testimonial',
            'posts_per_page' => -1,
	        'orderby' => 'menu_order',
            'order' => 'asc'
	    );
	    $oTestimonials = new WP_Query( $aTestimonialsArgs );
	    if ( $oTestimonials->have_posts() ) :
	    ?>
    				<ul class="testimonialsSlider">
        <?php
        while ( $oTestimonials->have_posts() ) : $oTestimonials->the_post();
            $aPostCustom = get_post_custom( $post->ID );
        ?>
	    				<li>
	    					<div class="testimonialItem">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail( 'unithumb-testimonialhome', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                            <?php } else { ?>
						        <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-testimonialhome.png' ?>" alt="<?php the_title_attribute() ?>" width="120" height="120">
                            <?php } ?>
	    						<div class="testimonialAuthor">
	    							<strong><?php if ( !empty($aPostCustom['uni_testimonial_name'][0]) ) { echo esc_html($aPostCustom['uni_testimonial_name'][0]); } ?></strong>
	    							<p><?php if ( !empty($aPostCustom['uni_testimonial_position'][0]) ) { echo esc_html($aPostCustom['uni_testimonial_position'][0]); } ?></p>
	    						</div>
	    						<?php the_content() ?>
	    					</div>
	    				</li>
        <?php
        endwhile;
        ?>
	    			</ul>
	    <?php
        endif;
	    wp_reset_postdata();
        ?>
    			</div>
    		</div>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_brands_enable') == 'on' ) { ?>
    		<div class="ourClientsBlock">
    			<div class="homeBlockTitle"><?php echo ( ot_get_option( 'uni_home_brands_title' ) ) ? esc_html( ot_get_option( 'uni_home_brands_title' ) ) : esc_html__('We Work With', 'bauhaus'); ?></div>
    			<div class="ourClientsWrap clear">
	    <?php
	    $aBrandsArgs = array(
	        'post_type' => 'uni_brand',
            'posts_per_page' => -1,
	        'orderby' => 'menu_order',
            'order' => 'asc'
	    );
	    $oBrands = new WP_Query( $aBrandsArgs );
	    if ( $oBrands->have_posts() ) :
	    while ( $oBrands->have_posts() ) : $oBrands->the_post();
            $aPostCustom = get_post_custom( $post->ID );
	    ?>
    				<div<?php if ( !empty($aPostCustom['uni_brand_uri'][0]) ) echo ' data-href="'.esc_url($aPostCustom['uni_brand_uri'][0]).'"'; ?> class="ourClientItem<?php if ( ot_get_option( 'uni_brands_grayscale_enable' ) == 'on' ) { echo ' discolored'; } if ( !empty($aPostCustom['uni_brand_uri'][0]) ) { echo ' brand-with-link'; } ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'unithumb-brand', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
						    <img src="<?php echo get_template_directory_uri().'/images/placeholders/brand.png' ?>" alt="<?php the_title_attribute() ?>" width="140" height="22">
                        <?php } ?>
    				</div>
	    <?php
	    endwhile; endif;
	    wp_reset_postdata();
        ?>
    			</div>
    		</div>
    <?php } ?>

    <?php if ( ot_get_option('uni_home_contact_enable') == 'on' ) { ?>
    		<div class="homeContactBlock clear">

		<script type="text/javascript">
	      // BauHaus style
	      var BauHaus = [
	          { "featureType": "road.highway", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "landscape", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "transit", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "poi", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "poi.park", "stylers": [ { "visibility": "on" } ]
	        },{ "featureType": "poi.park", "elementType": "labels", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "poi.park", "elementType": "geometry.fill", "stylers": [ { "color": "#d3d3d3" }, { "visibility": "on" } ]
	        },{ "featureType": "poi.medical", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "poi.medical", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "road", "elementType": "geometry.stroke", "stylers": [ { "color": "#cccccc" } ]
	        },{ "featureType": "water", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" }, { "color": "#cecece" } ]
	        },{ "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "visibility": "on" }, { "color": "#808080" } ]
	        },{ "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "visibility": "on" }, { "color": "#808080" } ]
	        },{ "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "visibility": "on" }, { "color": "#fdfdfd" } ]
	        },{ "featureType": "road", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "water", "elementType": "labels", "stylers": [ { "visibility": "off" } ]
	        },{ "featureType": "poi", "elementType": "geometry.fill", "stylers": [ { "color": "#d2d2d2" } ]
	        }
	      ];

	      function initialize() {

	        // Declare new style
	        var BauHausstyledMap = new google.maps.StyledMapType(BauHaus, {name: "BauHaus"});

	        // Declare Map options
	        var mapOptions = {
	        	center: new google.maps.LatLng(<?php $sCoord = ( ot_get_option( 'uni_coordinates' ) ) ? ot_get_option( 'uni_coordinates' ) : '41.404182,2.199451'; echo esc_attr( $sCoord ); ?>),
	        	zoom: <?php echo ( ot_get_option( 'uni_zoom' ) ) ? ot_get_option( 'uni_zoom' ) : '14'; ?>,
	        	scrollwheel: false,
	        	mapTypeControl:false,
                streetViewControl: false,
                panControl:false,
                rotateControl:false,
                zoomControl:true,
                zoomControlOptions: {
					/*style: google.maps.ZoomControlStyle.SMALL,*/
					position: google.maps.ControlPosition.LEFT_CENTER
				}
	        };

	        // Create map
	        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	        // Setup skin for the map
	        map.mapTypes.set('BauHaus_style', BauHausstyledMap);
	        map.setMapTypeId('BauHaus_style');

            //add marker
          <?php if ( file_exists( get_stylesheet_directory_uri().'/images/marker.svg' ) ) { ?>
            var marker_icon = "<?php echo get_stylesheet_directory_uri().'/images/marker.svg' ?>";
          <?php } else { ?>
            var marker_icon = "<?php echo get_template_directory_uri().'/images/marker.svg' ?>";
          <?php } ?>
            var myLatLng = new google.maps.LatLng(<?php echo esc_attr( $sCoord ) ?>);
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: marker_icon
            });

	      }
	      google.maps.event.addDomListener(window, 'load', initialize);

	    </script>

    			<div class="homeOurLocation">
    				<div class="map" id="map-canvas"></div>
    			</div>
    			<div class="homeContactInfo" style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/bg-homeContact.jpg);">
    				<div class="homeContactInfoWrap">
    					<h3><?php esc_html_e('Contact us', 'bauhaus') ?></h3>
    					<div class="contactInfo clear">
							<div class="contactItem">
								<i class="iconLocation"></i>
								<h4><?php esc_html_e('Location', 'bauhaus') ?></h4>
                                <?php $sUniAddress = ot_get_option( 'uni_address' ); ?>
								<p><?php echo ( ot_get_option( 'uni_address' ) ) ? wp_kses( $sUniAddress, $aUniAllowedHtmlCustomGrid ) : '42, Wallaby Way, Sydney, Australlia'; ?></p>
							</div>
							<div class="contactItem">
								<i class="iconPhone"></i>
								<h4><?php esc_html_e('Phone', 'bauhaus') ?></h4>
                                <?php $sUniPhone = ot_get_option( 'uni_phone' ); ?>
								<p><?php echo ( ot_get_option( 'uni_phone' ) ) ? wp_kses( $sUniPhone, $aUniAllowedHtmlCustomGrid ) : '+88 (0) 101 0000 000'; ?></p>
							</div>
							<div class="contactItem">
								<i class="iconEmail"></i>
								<h4><?php esc_html_e('E-mail', 'bauhaus') ?></h4>
			                    <?php $sEmail = ( ot_get_option( 'uni_email' ) ) ? sanitize_email( ot_get_option( 'uni_email' ) ) : esc_attr( get_bloginfo('admin_email') ); ?>
								<p><?php echo antispambot( $sEmail ); ?></p>
							</div>
						</div>
                        <?php if ( ot_get_option( 'uni_home_contact_send_link_enable' ) == 'on' ) { ?>
						<a href="<?php echo ( ot_get_option( 'uni_home_contact_send_link_uri' ) ) ? esc_url( ot_get_option( 'uni_home_contact_send_link_uri' ) ) : 'mailto:'.antispambot( $sEmail ) ; ?>" class="sendEmailLink">
                            <?php echo ( ot_get_option( 'uni_home_contact_send_link_text' ) ) ? esc_html( ot_get_option( 'uni_home_contact_send_link_text' ) ) : esc_html__('Send email', 'bauhaus'); ?>
                        </a>
                        <?php } ?>
    				</div>
    			</div>
    		</div>
    <?php } ?>

	</section>

<?php get_footer(); ?>