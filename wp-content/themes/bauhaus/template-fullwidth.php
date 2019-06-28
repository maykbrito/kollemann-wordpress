<?php
/**
 * Template Name: page with container
 * Preview:
 *
 */

get_header();
the_post();
$shotrcodes = get_the_content();
preg_match_all( '#\[bauhaus_header_slider_white.*?\]#', $shotrcodes, $slider );

preg_match_all( '#\[bauhaus_heading_section.*?\]#', $shotrcodes, $heading );
?>

<?php
$content = $shotrcodes;

if ( isset( $slider[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $slider[0][0] ) );
}

if ( isset( $heading[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $heading[0][0] ) );
}


?>

<?php
$content = $shotrcodes;
if ( isset( $heading[0][0] ) ) {
	$content = apply_filters( 'the_content', str_replace( $heading[0][0], '', $shotrcodes ) );
}
if ( isset( $slider[0][0] ) ) {
	$content = apply_filters( 'the_content', str_replace( $slider[0][0], '', $shotrcodes ) );
}
?>

	<div class="content">

		<?php
		echo do_shortcode( str_replace( ']]>', ']]&gt;', $content ) );
		
		?>
	</div>

<?php

get_footer();

