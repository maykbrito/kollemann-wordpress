<?php
/**
 * Template Name: Template fullpage
 * Preview:
 *
 */



get_template_part( 'partials/header','full' );
the_post();




?>

	<div class="pagepiling">

		<?php
		the_content();


		?>
	</div>

</div>
<?php

 wp_footer(); ?>

