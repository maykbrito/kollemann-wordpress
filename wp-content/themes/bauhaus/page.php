<?php get_header(); ?>



	<div class="page-content-2">
		<div class="container">
			<div class="row">

				<?php
				$position_sidebar= bauhaus_get_single_sidebar();


				if ( $position_sidebar == 'left' ) {
					get_sidebar();
				}
				?>

				<div class="primary <?php if ( $position_sidebar == 'none' ) { ?> col-md-12 <?php } else { ?>  col-md-8 <?php } ?>">

					<?php if ( have_posts() ) : ?>
						<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							?>
							<?php get_template_part( 'partials/content', get_post_format() ); ?>

						<?php endwhile;


					else :

					endif; ?>
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
			?>
			<section class="section-comments">
				<div class="container">
					<?php
					comments_template();
					?></div>
			</section>
			<?php
		endif; ?>
	</div>

<?php

get_footer();