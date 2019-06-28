<?php get_header();
$bauhaus_class = bauhaus_get_global_class();
$wp_query = bauhaus_get_wp_query();

$type = bauhaus_get_project_type();

?>





	

	<div class="content">
		<div class="projects">
			<div class="sly">
				<ul class="slidee">
					<?php
					if ( $wp_query->have_posts() ) {
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post();

							?>
							<li>
								<div class="project-item item-shadow">
									<?php if( has_post_thumbnail() ) { ?>
										<img alt="" class="img-responsive" src="<?php the_post_thumbnail_url('bauhaus-image-685x685-croped'); ?>">
									<?php  } ?>
									<div class="project-hover">
										<div class="project-hover-content">
											<h3 class="project-title"><?php echo the_title(); ?></h3>
											<p class="project-description"><?php echo bauhaus_limit_excerpt( bauhaus_words_limit() ); ?></p>
										</div>
									</div>
									<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="link-arrow"><?php  esc_html_e( 'See project' ,'bauhaus'  ); ?> <i class="icon ion-ios-arrow-right"></i></a>
								</div>
							</li>
							<?php
						}
					}


					wp_reset_postdata();
					?>

				</ul>
				<span class="prev icon-chevron-left"></span>
				<span class="next icon-chevron-right"></span>
			</div>
			<div class="scrollbar">
				<div class="handle"></div>
			</div>
		</div>
	</div>



<?php get_footer();
