<?php
the_post();

$shotrcodes = get_the_content();
preg_match_all( '#\[bauhaus_header_video.*?\]#', $shotrcodes, $video );


if ( isset( $video[0][0] ) ) {
	echo do_shortcode( apply_filters( 'the_content', $video[0][0] ) );
}


if ( has_post_thumbnail() && !isset( $video[0][0] ) ) { ?>
	<div class="post-thumbnail masked bauhaus-feature-img  ">

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-6 col-md-offset-1 col-lg-offset-2">
					<div class="title-info"><?php bauhaus_get_list_cats_blog(); ?></div>
					<h1 class="display-1"><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div class="page-content">
	<div class="primary">
		<div class="container">


			<?php get_template_part( 'partials/content', get_post_format() ); ?>


			<?php


			if ( get_theme_mod( 'bauhaus_single_post_settings_hide', 's1' ) !== 's2' || get_theme_mod( 'bauhaus_single_post_settings_hide', 's1' ) == 's1' ) {


				get_template_part( 'partials/related_posts' );
			}

			?>


		</div>
	</div>


	<?php
	if ( comments_open() || get_comments_number() ) :
		?>
		<section class="section-comments">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2"> <?php
						comments_template();
						?>    </div>
				</div>
			</div>
		</section>
		<?php
	endif; ?>


</div>