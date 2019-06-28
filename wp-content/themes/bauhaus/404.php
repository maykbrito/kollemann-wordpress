<?php get_header(); ?>

	<div class="page404Content clear">
		<h1><?php esc_html_e('404', 'bauhaus') ?></h1>
		<p><?php esc_html_e('The page you are looking for does not exist', 'bauhaus') ?></p>
		<div class="clear"></div>
		<a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url( '/' ) ); } ?>" class="linkToHome"><?php esc_html_e('homepage', 'bauhaus') ?></a>
	</div>

<?php get_footer(); ?>