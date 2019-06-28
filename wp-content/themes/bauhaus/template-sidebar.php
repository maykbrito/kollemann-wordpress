<?php
/**
 * Template Name: Template with sidebar
 * Preview:
 *
 */



get_header();
the_post();

$position_sidebar= bauhaus_get_single_sidebar();



$shotrcodes = get_the_content();
preg_match_all( '#\[bauhaus_header_video.*?\]#', $shotrcodes, $video );

if ( isset( $video[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $video[0][0] ) );
}

	

?>


<div class="page-content-2">
	<div class="container">
		<div class="row">

		<?php	$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );
			if ( isset($pos_sidebar{1})){
			$position_sidebar  = $pos_sidebar;
			}

			if ( $position_sidebar == 'left' ) {
			get_sidebar();
			}


			?>
			
			
			
			<div class="primary <?php if ( $position_sidebar == 'none' ) { ?> col-md-12 <?php } else { ?>  col-md-8 <?php } ?>>">
				<article class="post">
			<?php
			$content = $shotrcodes;
			if ( isset( $video[0][0] ) ) {
				$content = apply_filters( 'the_content', str_replace( $video[0][0], '', $shotrcodes ) );
			}


		echo do_shortcode( str_replace( ']]>', ']]&gt;', $content ) );




			?>
			<?php get_template_part( 'partials/single', 'meta' ); ?>
		</div>

			<?php
			if ( $position_sidebar == 'right' ) {
				get_sidebar();
			}


			
			?>

		</div>
	</div>
	<?php
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif; ?>
</div>

<?php

wp_footer(); ?>

