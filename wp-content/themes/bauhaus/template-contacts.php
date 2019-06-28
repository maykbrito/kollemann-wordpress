<?php
/**
 * Template Name: contacts page template
 * Preview:
 *
 */

get_header();
the_post();
$shotrcodes = get_the_content();
preg_match_all( '#\[bauhaus_header_slider_white.*?\]#', $shotrcodes, $math );

preg_match_all( '#\[bauhaus_heading_section.*?\]#', $shotrcodes, $heading );
preg_match_all( '#\[bauhaus_section_image.*?\]#', $shotrcodes, $image );
preg_match_all( '#\[bauhaus_map_section2.*?\]#', $shotrcodes, $map );
?>

<?php


if ( isset( $math[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $math[0][0] ) );
}

if ( isset( $heading[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $heading[0][0] ) );
}

if ( isset( $image[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $image[0][0] ) );
}
?>

<?php


?>

	<div class="content">
<?php


if ( isset( $map[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $map[0][0] ) );
}




?>

	<div class="page-inner">
		<?php
		$content = $shotrcodes;




		if ( isset( $image[0][0] ) ) {
			$content = apply_filters( 'the_content', str_replace( $image[0][0] , '', $shotrcodes ) );
		}
		if ( isset( $map[0][0] ) ) {
			$content = apply_filters( 'the_content', str_replace( $map[0][0] , '', $shotrcodes ) );
		}
		if ( isset( $heading[0][0] ) ) {
			$content = apply_filters( 'the_content', str_replace( $heading[0][0] , '', $shotrcodes ) );
		}

		if ( isset( $map[0][0] ) && isset($heading[0][0])) {
			$content = apply_filters( 'the_content', str_replace( array( $map[0][0],$heading[0][0] ) , '', $shotrcodes ) );
		}
		elseif( isset( $image[0][0] ) && isset($heading[0][0])) {
			$content = apply_filters( 'the_content', str_replace( array( $image[0][0],$heading[0][0] ) , '', $shotrcodes ) );
		}

		echo do_shortcode(str_replace( ']]>', ']]&gt;', $content ));



		?>
	</div>
	</div>

<?php

get_footer();

