
<article <?php post_class( 'post ' ); ?>>
	<div class="row">

	<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
	<div class="posted-on">
		<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>

		<?php  esc_html_e('on ','bauhaus');  echo esc_html( get_the_date() ); ?>
	</div>
	</div>
	<div class="entry-content">
		<?php
		$shotrcodes = get_the_content();


		preg_match_all( '#\[rev_slider.*?\]#', $shotrcodes, $slider );
		$pattern = get_shortcode_regex();
		$content = $shotrcodes;

		if ( isset( $slider[0][0] ) ) {
			$content = apply_filters( 'the_content', str_replace( $slider[0][0], '', $shotrcodes ) );

			echo do_shortcode( str_replace( ']]>', ']]&gt;', $content ) );
		} else {
			ob_start();
			the_content();
			echo preg_replace('/<iframe.*?><\/iframe.*?>/','',ob_get_clean(),1);
		}
		?>



	</div>


	<?php get_template_part( 'partials/single', 'meta' ); ?>




</article>