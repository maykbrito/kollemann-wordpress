<?php





/**
 * @return categorias
 */
function bauhaus_wp_infinitepaginate() {

	
	$paged          = (int) sanitize_text_field( $_POST['page_no'] );
	$posts_per_page = (int) sanitize_text_field( get_option( 'posts_per_page' ) );

	if ( isset( $_POST['s']{0} ) ) {
		$args = array(
			'paged'       => $paged,
			'showposts'   => $posts_per_page,
			'post_status' => 'publish',
			's'           => sanitize_text_field( $_POST['s'] )
		);


	} else {
		$args = array(
			'paged'       => $paged,
			'showposts'   => $posts_per_page,
			'cat'         => sanitize_text_field( $_POST['cat'] ),
			'post_status' => 'publish',
			'post_type'   => sanitize_text_field( $_POST['posttype'] )
		);
	}


	if (isset($_POST['year']) && !empty($_POST['year']))
		$args['year'] = ($_POST['year']);

	if (isset($_POST['monthnum']) && !empty($_POST['monthnum']))
		$args['monthnum'] = ($_POST['monthnum']);

	if (isset($_POST['day']) && !empty($_POST['day']))
		$args['day'] = ($_POST['day']);

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			
			switch ($_POST['type']  ) {
				case 'masonry':

					get_template_part('partials/content', get_post_format());

					break;
				case 'grid':

					get_template_part('partials/gridcontent', get_post_format());

					break;
				case 'listing':

					get_template_part('partials/listing_content' , get_post_format());

					break;


			}
		}
	}
	wp_reset_postdata();

	exit;
	die();
}

add_action( 'wp_ajax_bauhaus_infinite_scroll', 'bauhaus_wp_infinitepaginate' ); // for logged in user
add_action( 'wp_ajax_nopriv_bauhaus_infinite_scroll', 'bauhaus_wp_infinitepaginate' ); // if user not logged in 