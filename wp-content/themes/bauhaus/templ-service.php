<?php
/*
*  Template Name: Services Page
*/
get_header(); ?>

	<section class="container">
		<div class="ourService">
			<div class="wrapper">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h3 class="blockTitle"><?php the_title() ?></h3>
        <?php endwhile; endif;
        wp_reset_postdata(); ?>

	<?php
    $sNumberOfServices = ( get_post_meta( $post->ID, 'uni_number_of_services', true ) ) ? get_post_meta( $post->ID, 'uni_number_of_services', true ) : 3;
	$aPricesArgs = array(
	    'post_type' => 'uni_price',
        'posts_per_page' => $sNumberOfServices,
	    'orderby' => 'menu_order',
        'order' => 'asc'
	);
	$oPrices = new WP_Query( $aPricesArgs );
	if ( $oPrices->have_posts() ) :
        if ( $sNumberOfServices == 3 ) {
        $i = 1;
    ?>
				<div class="serviceWrap clear">
    <?php
        } else if ( $sNumberOfServices == 4 ) {
        $i = 11;
    ?>
				<div class="serviceWrap2 clear">
    <?php
        }
	while ( $oPrices->have_posts() ) : $oPrices->the_post();
    $aPostCustom = get_post_custom( get_the_ID() );
    ?>
					<div class="serviceItem">
						<div class="serviceHead">
							<img src="<?php echo get_template_directory_uri().'/images/placeholders/serviceImg'.$i.'.png'; ?>" alt="<?php the_title_attribute() ?>">
							<h4><span><?php the_title() ?></span></h4>
						</div>
						<div class="servicePrice">
							<p><em><?php echo esc_html( $aPostCustom['uni_currency'][0] ) ?></em><strong><?php echo esc_html( $aPostCustom['uni_price'][0] ) ?></strong></p>
							<p><?php echo esc_html( $aPostCustom['uni_type'][0] ) ?></p>
						</div>
						<div class="serviceDesc">
							<?php the_content() ?>
							<a href="#orderServiceForm" class="orderServiceItem" data-title="<?php the_title_attribute() ?>" data-price="<?php echo esc_attr( $aPostCustom['uni_price'][0] ) ?>"><?php _e('Order', 'bauhaus') ?></a>
						</div>
					</div>
	<?php
    $i++;
	endwhile;
    ?>
				</div>
    <?php
    endif;
	wp_reset_postdata();
    ?>
			</div>
		</div>
		<div class="ourServiceDesc">
	<?php
	$aServicesArgs = array(
	    'post_type' => 'uni_service',
        'posts_per_page' => -1,
	    'orderby' => 'menu_order',
        'order' => 'asc',
        'meta_query' => array(
		    array(
			    'key'       => 'uni_service_display_services',
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
			<div class="serviceDescItem<?php if ($i % 2 == 0) { echo ' rightOrientation'; } else { echo ' leftOrientation'; } ?>">
				<div class="wrapper clear">
					<div class="serviceDescThumb">
                    <?php
                    if ( !empty($aPostCustom['uni_service_services_image'][0]) ) {
                        $aPageGalleryIds = explode(',', $aPostCustom['uni_service_services_image'][0]);
                        if ( !empty($aPageGalleryIds) ) {
                    ?>
                            <?php echo wp_get_attachment_image( $aPageGalleryIds[0], 'unithumb-service' ); ?>
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-service.png' ?>" alt="<?php the_title_attribute() ?>" width="545" height="300">
                        <?php } ?>
                    <?php } else { ?>
    					<img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-service.png' ?>" alt="<?php the_title_attribute() ?>" width="545" height="300">
                    <?php } ?>
					</div>
					<div class="serviceDescText">
						<div class="serviceDescTextWrap">
							<h4><?php the_title() ?></h4>
							<?php the_content() ?>
						</div>
					</div>
				</div>
			</div>
	<?php
    $i++;
	endwhile; endif;
	wp_reset_postdata();
    ?>
		</div>
	</section>

<?php get_footer(); ?>