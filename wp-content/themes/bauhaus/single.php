<?php get_header(); ?>

<?php
$position_sidebar= bauhaus_get_single_sidebar();

$pos_sidebar = get_post_meta( get_the_ID(), '_bauhaus_sidebar_pos', 1 );

if ( isset($pos_sidebar{1})){
	$position_sidebar  = $pos_sidebar;
}


$format = get_post_format();
if ($format== false && $position_sidebar =='none'  )  {


	?>


	<?php  get_template_part( 'partials/single' ,'standart' ); ?>



<?php }



if ( $position_sidebar == 'left' || $position_sidebar == 'right' ) {

	get_template_part( 'partials/single' ,'sidebar' );




}




elseif($format!== false || $position_sidebar !=='none' ){
	if ( have_posts() ) : ?>
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();

			?>
			<?php get_template_part( 'partials/content', get_post_format() ); ?>

		<?php endwhile;


	else :

	endif; ?>
	<?php


}





get_footer();