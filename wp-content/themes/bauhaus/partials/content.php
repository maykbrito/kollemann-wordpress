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

    <div <?php post_class( ' col2 post grid-item js-isotope-item js-grid-item ' ); ?> >
        <div class="card">
			<?php if ( has_post_thumbnail() ) :

				?>
                <img alt="" width="426" height="426" class="img-responsive"
                     src="<?php the_post_thumbnail_url( 'full' ); ?>">
			<?php endif; ?>


            <div class="card-block">
                <div class="card-posted"><a
                            href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a> <?php esc_html_e( ' on ', 'bauhaus' );
					echo esc_html( get_the_date() ); ?></div>
                <h4 class="card-title"><?php the_title(); ?></h4>
                <div class="card-text"><?php echo bauhaus_limit_excerpt( bauhaus_words_limit() ); ?></div>


                <a href="<?php echo esc_url( get_the_permalink() ); ?>" class="card-read-more">
					<?php if ( strlen( get_theme_mod( 'bauhaus_blog_list_text' ) ) > 1 ) {
						echo esc_html( get_theme_mod( 'bauhaus_blog_list_text' ) );
					} else  echo esc_html__( 'Continue', 'bauhaus' ) ?>
                </a>

            </div>
        </div>
    </div>

<?php } else {


	$shotrcodes = get_the_content();
	preg_match_all( '#\[bauhaus_header_video.*?\]#', $shotrcodes, $video );

	preg_match_all( '#\[bauhaus_post_content.*?\].*?\[\/bauhaus_post_content\]#', $shotrcodes, $math_v );

	$content = $shotrcodes;
	if ( isset( $video[0][0] ) ) {
		$content = apply_filters( 'the_content', str_replace( $video[0][0], '', $shotrcodes ) );
	}


	$position_sidebar = bauhaus_get_single_sidebar();

	$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );

	if ( isset( $pos_sidebar{1} ) ) {
		$position_sidebar = $pos_sidebar;
	}


	?>


    <article <?php post_class( 'post ' ); ?>>
		<?php if ( !isset( $math_v[0][0] ) && $position_sidebar !== 'none' ) { ?>

            <h1 class="entry-title"><?php the_title(); ?></h1>

		<?php } ?>

		<?php

		preg_match_all( '#\[bauhaus_post_content.*?\].*?\[\/bauhaus_post_content\]#', $shotrcodes, $math_v );
		if ( $position_sidebar == 'none' ) {


			?>


            <div class="row">
                <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                    <div class="posted-on">
                        <a class="url fn n"
                           href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
						<?php esc_html_e( 'on ', 'bauhaus' );
						echo esc_html( get_the_date() ); ?>
                    </div>
                </div>
            </div>


		<?php } else {
			?>
            <div class="posted-on">
                <a class="url fn n"
                   href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
				<?php esc_html_e( 'on ', 'bauhaus' );
				echo esc_html( get_the_date() ); ?>
            </div>
			<?php
		}

		?>


        <div class="entry-content">
			<?php
			$shotrcodes = get_the_content();
			preg_match_all( '#\[bauhaus_header_video.*?\]#', $shotrcodes, $video );


			if ( isset( $video[0][0] ) ) {
				echo apply_filters( 'the_content', str_replace( $video[0][0], '', get_the_content() ) );
			} else {
				the_content();
			}


			?>


			<?php
			echo bauhaus_link_pages();


			?>

        </div>

		<?php


		if ( $position_sidebar == 'none' ) {
			?>

            <div class="entry-footer">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
						<?php
						get_template_part( 'partials/single', 'meta' );
						?>
                    </div>
                </div>
            </div>

			<?php
		} else {
			?>

            <div class="entry-footer">


				<?php
				get_template_part( 'partials/single', 'meta' );
				?>

            </div>
			<?php
		}
		?>


    </article>

	<?php


} ?>