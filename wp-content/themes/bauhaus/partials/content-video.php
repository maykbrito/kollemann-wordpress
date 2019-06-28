<?php
$bauhaus_class = bauhaus_get_global_class();
if ( !is_single() && ( !is_page() ) ) {


	$bauhaus_cat = 0;
	$bauhaus_category = get_category( get_query_var( 'cat' ) );
	if ( isset( $bauhaus_category->cat_ID ) ) {
		$bauhaus_cat = $bauhaus_category->cat_ID;
	} else {
		$bauhaus_cat = 0;
	}


	?>

    <div <?php post_class( ' post grid-item js-isotope-item js-grid-item ' ); ?> >
        <div class="card">
			<?php if ( has_post_thumbnail() ) : ?>

                <img alt="<?php the_title(); ?>" width="426" height="426" class="img-responsive"
                     src="<?php the_post_thumbnail_url( "full" ); ?>">
			<?php endif; ?>

            <div class="card-block">
                <div class="card-posted"><a
                            href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a> <?php esc_html_e( 'on', 'bauhaus' );
					echo esc_html( get_the_date( 'F jS, Y' ) ); ?></div>
                <h4 class="card-title"><?php the_title(); ?></h4>
                <div class="card-text"><?php echo bauhaus_limit_excerpt( bauhaus_words_limit() ); ?></div>
				<?php
				if ( strlen( get_theme_mod( 'bauhaus_blog_list_text' ) ) > 1 ) { ?>
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="card-read-more">
						<?php echo esc_html( get_theme_mod( 'bauhaus_blog_list_text', 'continue' ) ); ?>
                    </a>
				<?php } else { ?>
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="card-read-more">
						<?php echo esc_html__( 'continue', 'bauhaus' ); ?>
                    </a>
				<?php } ?>
            </div>
        </div>
    </div>


<?php } else { ?>

    <main class="page-header-2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-6 col-md-offset-1 col-lg-offset-2">
                    <div class="title-info"><?php bauhaus_get_list_cats_blog(); ?></div>
                    <h1 class="display-1"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </main>
    <div class="header-space">
        <div class="post-video">
            <div class="container">

				<?php
				if ( function_exists( 'bauhaus_theme_video' ) ) {
					bauhaus_theme_video();
				}


				?>

            </div>
        </div>
    </div>


    <div class="page-content">
        <div class="primary">
            <div class="container">


                <article <?php post_class( 'post ' ); ?>>
                    <div class="row">

                        <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                            <div class="posted-on">
                                <a class="url fn n"
                                   href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
								<?php esc_html_e( 'on ', 'bauhaus' );
								echo esc_html( get_the_date() ); ?>
                            </div>
                        </div>
                        <div class="entry-content">
							<?php

							ob_start();
							the_content();
							echo preg_replace( '/<iframe.*?><\/iframe.*?>/', '', ob_get_clean(), 1 );

							?>


                        </div>


                        <div class="entry-footer">
                            <div class="row">
                                <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
									<?php
									get_template_part( 'partials/single', 'meta' );
									?>
                                </div>
                            </div>
                        </div>


                </article>


				<?php


				?>


                <div>


                </div>


				<?php


				if ( get_theme_mod( 'bauhaus_single_post_settings_hide', 's1' ) !== 's2' || get_theme_mod( 'bauhaus_single_post_settings_hide', 's1' ) == 's1' ) {


					get_template_part( 'partials/related_posts' );
				}

				?>

            </div>


        </div>
		<?php

		$position_sidebar = bauhaus_get_single_sidebar();

		$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );

		if ( isset( $pos_sidebar{1} ) ) {
			$position_sidebar = $pos_sidebar;
		}


		if ( $position_sidebar == 'none' ) {
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

			endif;
		}
		?>
    </div>
	<?php

}



