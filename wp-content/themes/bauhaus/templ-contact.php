<?php
/*
*  Template Name: Contact Page
*/
get_header();
$aUniAllowedHtmlWoA = uni_allowed_html_wo_a();
$aUniAllowedHtmlWithA = uni_allowed_html_with_a();
?>

        <?php if (have_posts()) : while (have_posts()) : the_post();
		$aPostCustom = get_post_custom( $post->ID );
        endwhile; endif;
        wp_reset_postdata(); ?>

	<section class="container">
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
		<div class="ourLocation">
			<div class="map" id="map-canvas"></div>
		</div>

		<div class="wrapper contactWrap">
			<div class="contactInfo clear">
				<div class="contactItem">
					<i class="iconLocation"></i>
					<h4><?php esc_html_e('Location', 'bauhaus') ?></h4>
                    <?php $sUniAddress = ot_get_option( 'uni_address' ); ?>
					<p><?php echo ( ot_get_option( 'uni_address' ) ) ? wp_kses( $sUniAddress, $aUniAllowedHtmlWoA ) : '42, Wallaby Way, Sydney, Australlia'; ?></p>
				</div>
				<div class="contactItem">
					<i class="iconPhone"></i>
					<h4><?php esc_html_e('Phone', 'bauhaus') ?></h4>
                    <?php $sUniPhone = ot_get_option( 'uni_phone' ); ?>
					<p><?php echo ( ot_get_option( 'uni_phone' ) ) ? wp_kses( $sUniPhone, $aUniAllowedHtmlWoA ) : '+88 (0) 101 0000 000'; ?></p>
				</div>
				<div class="contactItem">
					<i class="iconEmail"></i>
					<h4><?php esc_html_e('E-mail', 'bauhaus') ?></h4>
                    <?php $sEmail = ( ot_get_option( 'uni_email' ) ) ? sanitize_email( ot_get_option( 'uni_email' ) ) : esc_attr( get_bloginfo('admin_email') ); ?>
					<p><a href="mailto:<?php echo antispambot( $sEmail ); ?>"><?php echo antispambot( $sEmail ); ?></a></p>
				</div>
			</div>
            <?php if( in_array('contact-form-7/wp-contact-form-7.php', get_option('active_plugins')) && ot_get_option( 'uni_contact_form_seven_id' ) ) { ?>
			<div class="contactForm">
				<h3 class="blockTitle"><?php esc_html_e('Say Hello', 'bauhaus') ?></h3>
				<p><?php esc_html_e('We love to meet people and talk about possibilities', 'bauhaus') ?></p>
                <?php echo do_shortcode('[contact-form-7 id="'.ot_get_option( 'uni_contact_form_seven_id' ).'"]'); ?>
			</div>
            <?php } else { ?>
			<div class="contactForm">
				<h3 class="blockTitle"><?php esc_html_e('Say Hello', 'bauhaus') ?></h3>
				<p><?php esc_html_e('We love to meet people and talk about possibilities', 'bauhaus') ?></p>
		        <form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" class="clear uni_form">
                    <input type="hidden" name="uni_contact_nonce" value="<?php echo wp_create_nonce('uni_nonce') ?>" />
                    <input type="hidden" name="action" value="uni_contact_form" />

                    <div class="formInputBox userNameBox clear">
                    	<input class="formInput userName" type="text" name="uni_contact_name" value="" placeholder="<?php esc_html_e('Name', 'bauhaus') ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit">
                    </div>
                    <div class="formInputBox userEmailBox clear">
						<input class="formInput userEmail" type="text" name="uni_contact_email" value="" placeholder="<?php esc_html_e('E-mail', 'bauhaus') ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit" data-parsley-type="email">
					</div>
					<div class="clear"></div>
					<div class="formInputBox clear">
						<input class="formInput userSubject" type="text" name="uni_contact_subject" value="" placeholder="<?php esc_html_e('Subject', 'bauhaus') ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit">
					</div>
					<div class="formInputBox clear">
						<textarea class="formTextarea" name="uni_contact_msg" cols="30" rows="10" placeholder="<?php esc_html_e('Message', 'bauhaus') ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit"></textarea>
					</div>
					<input id="uniSendContactForm" class="thm-btnSubmit uni_input_submit" type="button" value="<?php esc_html_e('Send', 'bauhaus') ?>">
				</form>
			</div>
            <?php } ?>
		</div>
	</section>

<?php get_footer(); ?>