<?php

$position_sidebar = bauhaus_get_single_sidebar();

$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );

if ( isset( $pos_sidebar{1} ) ) {
	$position_sidebar = $pos_sidebar;
}


if ( $position_sidebar == 'none' ) {


?>

<?php $t = get_theme_mod( 'bauhaus_single_post_settings_title' ); ?>

<section class="related-posts">
	<div class="row">
		<div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
			<h6 class="related-post-title"><?php if ( isset( $t{1} ) ) {
					echo esc_html( $t );
				} ?></h6>
		</div>
	</div>
	<div class="news-carousel owl-carousel">


		<?php



		$sort = '';
		$post_sort = get_theme_mod( 'bauhaus_single_post_settings_sort' );

		if ( isset( $post_sort{1} ) ) {
			$sort = get_theme_mod( 'bauhaus_single_post_settings_sort' );
		}
		$count = '';
		$count_post = get_theme_mod( 'bauhaus_single_post_settings_count' );

		if ( isset( $count_post{0} ) ) {
			$count = get_theme_mod( 'bauhaus_single_post_settings_count' );
		}


		$post_id = get_the_ID();
		$categories = get_the_category( $post_id );

		if ( $categories ) {
			$category_ids = array();
			foreach ( $categories as $individual_category ) {
				$category_ids[] = $individual_category->term_id;

			}
	
		
			$args = array(
				'category__in' => $category_ids,
				'post__not_in' => array( $post_id ),
				'showposts' => $count,
				'order' => $sort,
				'meta_query' => array( array( 'key' => '_thumbnail_id' ) )

			);





			$my_query = new wp_query( $args );
			if ( $my_query->have_posts() ) {

				while ( $my_query->have_posts() ) {
					$my_query->the_post();
					?>

					<div class="news-item">

						<img alt="<?php the_title(); ?>"
						     src="<?php the_post_thumbnail_url( "bauhaus-image-370x370-croped" ); ?>">
						<div class="news-hover">
							<div class="hover-border">
								<div></div>
							</div>
							<div class="content">
								<div class="time"><?php echo esc_html( get_the_date() ); ?></div>
								<h3 class="news-title"><?php the_title(); ?></h3>
								<p class="news-description"><?php echo bauhaus_limit_excerpt( bauhaus_related_post_words_limit() ); ?></p>
							</div>


							<?php
							if ( strlen( get_theme_mod( 'bauhaus_single_post_settings_text' ) ) > 1 ){  ?>
								<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="read-more">
									<?php echo esc_html( get_theme_mod( 'bauhaus_single_post_settings_text' ) ); ?>
								</a>
							<?php }
							else {
                              ?>
								<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="read-more">
									<?php echo esc_html__('continue' ,'bauhaus'); ?>
							</a>
								<?php
							}


							?>

						</div>
					</div>


					<?php
				}

			}
			?>

			<?php
			wp_reset_postdata();

		} ?>

	</div>
</section>
<?php  } ?>