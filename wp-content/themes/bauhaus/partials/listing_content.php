<?php
$bauhaus_class = bauhaus_get_global_class();


$bauhaus_cat = 0;
$bauhaus_category = get_category( get_query_var( 'cat' ) );
if ( isset( $bauhaus_category->cat_ID ) ) {
	$bauhaus_cat = $bauhaus_category->cat_ID;
} else {
	$bauhaus_cat = 0;
}
?>


<div <?php post_class( ' inspiration card-row post js-isotope-item' ); ?> >
	<?php

	if ( has_post_thumbnail() ) {
		?>
		<div class="card-row-img col-md-7 col-lg-8 hidden-sm hidden-xs listing-image "
		     style="background-image:url(<?php  the_post_thumbnail_url( "bauhaus-image-770x555-croped" ); ?>)"></div>
		<img class="visible-sm visible-xs img-responsive" alt=""
		     src="<?php the_post_thumbnail_url( "bauhaus-image-770x555-croped" ); ?>">


		
		<div class="card-block col-md-offset-7 col-lg-offset-8">
			<div class="card-posted"><a
					href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a> <?php esc_html_e( 'on ', 'bauhaus' );
				echo esc_html( get_the_date() ); ?></div>
			<h4 class="card-title"><?php the_title(); ?></h4>
			<div class="card-text"><?php echo bauhaus_limit_excerpt( bauhaus_words_limit() ); ?></div>
			<?php
			if ( strlen( get_theme_mod( 'bauhaus_blog_list_text' ) ) > 2 ) { ?>
				<a class="card-read-more"
				   href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_theme_mod( 'bauhaus_blog_list_text' ) ); ?></a>
			<?php } else {
				?>

				<a class="card-read-more"
				   href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__( 'Continue', 'bauhaus' ); ?></a>
				<?php
			}


			?>


		</div>
	<?php }

	elseif (!has_post_thumbnail() ) {

	 ?>


		<div class="card-block  col-md-offset-0 col-lg-offset-0">
			<div class="card-posted"><a
					href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a> <?php esc_html_e( 'on ', 'bauhaus' );
				echo esc_html( get_the_date() ); ?></div>
			<h4 class="card-title"><?php the_title(); ?></h4>
			<div class="card-text"><?php echo bauhaus_limit_excerpt( bauhaus_words_limit() ); ?></div>
			<?php
			if ( strlen( get_theme_mod( 'bauhaus_blog_list_text' ) ) > 2 ) { ?>
			<a class="card-read-more"
			   href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html( get_theme_mod( 'bauhaus_blog_list_text' ) ); ?></a>
			<?php } else {
				?>

				<a class="card-read-more"
				   href="<?php echo esc_url( get_the_permalink() ); ?>"><?php echo esc_html__( 'Continue', 'bauhaus' ); ?></a>
				<?php
			}
			?>
		</div>
	<?php } ?>

</div>