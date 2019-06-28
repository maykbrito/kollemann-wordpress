<?php


$format = get_post_format();
$position_sidebar = bauhaus_get_single_sidebar();
$image_id = get_post_meta( get_the_ID(), '_bauhaus_image_id', true );
if(isset($image_id{1})) {

	$img_src = wp_get_attachment_image_src( $image_id, array( 1170, 658 ) );
	$img_src = $img_src[0];
} else {
	$img_src = get_the_post_thumbnail_url(get_the_ID(),'bauhaus-image-1170x658-croped');
}

$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );

if ( isset( $pos_sidebar{1} ) ) {
	$position_sidebar = $pos_sidebar;
}

if ( have_posts() ) : ?>
<?php
// Start the Loop.
while ( have_posts() ) :
the_post();


$shotrcodes = get_the_content();
preg_match_all( '#\[bauhaus_header_video.*?\]#', $shotrcodes, $video );


?>

<?php if ( isset( $video[0][0] ) ) { ?>


	<?php
	echo do_shortcode( apply_filters( 'the_content', $video[0][0] ) );


	?>


<?php } elseif (isset( $img_src{2} )) {


	?>
	<div class="header-space">
		<div class="container">
			<div class="header-thumbnail">
				<?php if ( isset( $img_src{2} ) ) { ?>

					<img src="<?php echo esc_url( $img_src); ?>" alt=""/>
				<?php } ?>

			</div>
		</div>
	</div>

	<?php


} ?>


<div class="page-content-2">
	<div class="container">
		<div class="row">
			<?php

			if ( $position_sidebar == 'left' ) {
				get_sidebar();
			}
			?>
			<div class="primary col-md-8">
           
				<?php get_template_part( 'partials/content', get_post_format() );


				?>
				<?php
				if ( $position_sidebar == 'right'  && post_password_required() == false) {


					if ( comments_open() || get_comments_number() ) :
						?>
						<section class="section-comments">
							<div class="container">
								<?php
								comments_template();
								?></div>
						</section>
						<?php
					endif;
				}
				?>

			</div>




			<?php
			if ( $position_sidebar == 'right' ) {

				get_sidebar();
			}
			?>
		</div>
	</div>

	<?php endwhile;


	else :

	endif; ?>


	<?php
	if ( $position_sidebar !== 'right' ) {
		if ( (comments_open() || get_comments_number())  && post_password_required() == false) :
			?>
			<section class="section-comments">
				<div class="container">
					<?php
					comments_template();
					?></div>
			</section>
			<?php
		endif;

	}
	?>

</div>