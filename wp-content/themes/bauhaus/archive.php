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
<?php $type = bauhaus_get_blog_type();

if ( $type == 'grid' ) {
	$categories = get_the_category();
	$category_id = $categories[0]->cat_ID;

	?>
	<main class="page-header">
		<div class="container"><h1><?php category_description( $category_id ) ?> </h1></div>
	</main>

	<div class="content">
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
		</div>
	</div>




<?php }
if ( $type == 'masonry' ) { ?>


	<div   class="content   ">
		<div class="grid-items js-isotope js-grid-items place_li_cont   ">

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
	</div>

<?php }
if ( $type == 'listing' ) {


	?>


	<div class="content">
		<div class="container">
			<div class="container place_li_cont ">
		

				<?php if ( have_posts() ) { ?>
					<?php
					// Start the Loop.
					while ( have_posts() ) {
						the_post();
						get_template_part( 'partials/listing_content' , 'content' );

					}
				}

				wp_reset_postdata();
				?>



			</div>
		</div>
	</div>




<?php }


get_footer();