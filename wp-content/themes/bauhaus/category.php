<?php get_header();

$bauhaus_cat = 0;
$bauhaus_category = get_category( get_query_var( 'cat' ) );
if ( isset( $bauhaus_category->cat_ID ) ) {
	$bauhaus_cat = $bauhaus_category->cat_ID;
} else {
	$bauhaus_cat = 0;
}

$res = get_theme_mod( 'bauhaus_blog_list_type_blog' );


?>
<?php
$header_type = bauhaus_get_blog_type_header();


$type = bauhaus_get_blog_type();
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
if ( $type == 'grid' ) {


	?>

	<?php if ( $header_type == '1' ) { ?>
        <main class="page-header  ">
            <div class="container"><h1><?php
					$categories = get_the_category();

					if ( is_home() ) {
						echo wp_kses_post( get_bloginfo( 'description' ) );

					} elseif ( isset( $categories[0]->cat_ID ) && !is_home() ) {
						$category_id = $categories[0]->cat_ID;
						if ( isset( $categories[0]->cat_ID{0} ) ) {
							echo wp_kses_post( get_cat_name( $categories[0]->cat_ID ) );
						}
					}
					?> </h1></div>
        </main>
	<?php }


	?>


    <div class="content header-space">
        <div class="projects">
            <div class="container place_li_cont ">


				<?php if ( have_posts() ) { ?>
					<?php
					// Start the Loop.
					while ( have_posts() ) {
						the_post();
						get_template_part( 'partials/gridcontent' );

					}
				}

				wp_reset_postdata();
				?>


            </div>
            <div class="load-more"><button  class="btn"><?php esc_html_e( 'Load more', 'bauhaus' ); ?></button></div>

        </div>
    </div>

    <div class="dn_non">
		<?php posts_nav_link( '  ', '', '' ); ?>
    </div>


<?php }
if ( $type == 'masonry' ) { ?>

	<?php if ( $header_type == '1' ) { ?>
        <main class="page-header ">
            <div class="container"><h1><?php
					$categories = get_the_category();


		            if ( is_home() ) {
			            echo wp_kses_post( get_bloginfo( 'description' ) );

		            } elseif ( isset( $categories[0]->cat_ID ) && !is_home() ) {
			            $category_id = $categories[0]->cat_ID;
			            if ( isset( $categories[0]->cat_ID{0} ) ) {
				            echo wp_kses_post( get_cat_name( $categories[0]->cat_ID ) );
			            }
		            }
					?></h1></div>
        </main>
	<?php } ?>

    <div class="content place_li_cont header-space   ">
        <div id="masonry_container" class="grid-items js-isotope js-grid-items   ">

			<?php if ( have_posts() ) { ?>
				<?php
				// Start the Loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'partials/content', get_post_format() );

				}
			}

			wp_reset_postdata();
			?>


        </div>
        <div class="load-more"><button class="btn"><?php esc_html_e( 'Load more', 'bauhaus' ); ?></button></div>
    </div>

    <div class="dn_non">
		<?php posts_nav_link( '  ', '', '' ); ?>
    </div>

<?php }
if ( $type == 'listing' ) {
	$categories = get_the_category();

	?>


	<?php if ( $header_type == '1' ) { ?>
        <main class="page-header-2">
         
            <div class="container"><h1><?php
					$categories = get_the_category();


		            if ( is_home() ) {
			            echo wp_kses_post( get_bloginfo( 'description' ) );

		            } elseif ( isset( $categories[0]->cat_ID ) && !is_home() ) {
			            $category_id = $categories[0]->cat_ID;
			            if ( isset( $categories[0]->cat_ID{0} ) ) {
				            echo wp_kses_post( get_cat_name( $categories[0]->cat_ID ) );
			            }
		            }
					?> </h1></div>
        </main>
	<?php } ?>


    <div class="content header-space ">
        <div class="container">
            <div class="container place_li_cont ">


				<?php if ( have_posts() ) { ?>
					<?php
					// Start the Loop.
					while ( have_posts() ) {
						the_post();
						get_template_part( 'partials/listing_content', 'content' );

					}
				}

				wp_reset_postdata();
				?>


            </div>
            <div class="load-more"><button  class="btn"><?php esc_html_e( 'Load more', 'bauhaus' ); ?></button></div>
        </div>
    </div>

    <div class="dn_non">
		<?php
		ob_start();
		wp_link_pages();
		ob_get_clean();

		?>
    </div>


<?php }


get_footer();