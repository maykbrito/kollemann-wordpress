<?php get_header(); ?>


	<main class="page-header-2">
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-lg-5 col-sm-offset-1 col-lg-offset-2">
					<div class="title-info"> 				<?php $main_title = get_theme_mod(' bauhaus_404_top_desc',  esc_html__('Oops... You got lost.','bauhaus'));
						if (isset($main_title[0])) {
							?>   <?php echo wp_kses_post($main_title); ?> 

						<?php }?>	</div>
					<?php $top_desc = get_theme_mod('bauhaus_404_main_title', esc_html__('404','bauhaus'));

					if (isset($top_desc[0])) {
						?>
						<h1 class="display-1"><?php echo wp_kses_post($top_desc); ?></h1>
					<?php }?>


					<?php $top_desc = get_theme_mod('bauhaus_404_top_desc', esc_html__('Oops! That page can’t be found.','bauhaus'));

					if (isset($top_desc[0])) {
						?>
                        <p class="lead"><?php echo wp_kses_post($top_desc); ?></p>
					<?php }?>

					<?php  get_search_form(); ?>
				</div>
			</div>
		</div>
	</main>
<?php

get_footer();