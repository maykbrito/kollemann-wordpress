	<footer class="clear">
			<div class="copyright">
            <?php $aUniAllowedHtmlWithA = uni_allowed_html_with_a(); ?>
            <?php if ( ot_get_option( 'uni_footer_text' ) ) { ?>
                <?php $sFooterText = ot_get_option('uni_footer_text'); echo wp_kses( $sFooterText, $aUniAllowedHtmlWithA ); ?>
            <?php } else { ?>
				&copy; <?php esc_html_e('Copyright 2014 bauhaus', 'bauhaus' ); ?>
            <?php } ?>
			</div>
			<div class="footer-social clear">
            <?php if ( ot_get_option( 'uni_email_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_email_link' ) ) ?>" target="_blank"><i class="fa fa-envelope"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_fb_link' ) ) { ?>
				<a href="<?php echo esc_url( ot_get_option( 'uni_fb_link' ) ) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_youtube_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_youtube_link' ) ) ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_vimeo_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_vimeo_link' ) ) ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_tw_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_tw_link' ) ) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_in_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_in_link' ) ) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_li_link' ) ) { ?>
        	    <a href="<?php echo esc_url( ot_get_option( 'uni_li_link' ) ) ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_bl_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_bl_link' ) ) ?>" target="_blank"><i class="fa fa-heart"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_pi_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_pi_link' ) ) ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_gp_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_gp_link' ) ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_fs_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_fs_link' ) ) ?>" target="_blank"><i class="fa fa-foursquare"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_fl_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_fl_link' ) ) ?>" target="_blank"><i class="fa fa-flickr"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_dr_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_dr_link' ) ) ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_be_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_be_link' ) ) ?>" target="_blank"><i class="fa fa-behance"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_vk_link' ) ) { ?>
			    <a href="<?php echo esc_url( ot_get_option( 'uni_vk_link' ) ) ?>" target="_blank"><i class="fa fa-vk"></i></a>
            <?php } ?>
			</div>
	</footer>
    <?php if ( is_page_template('templ-service.php') ) { ?>
	<div id="orderServiceForm" class="orderServiceFormWrap">
		<h3 class="blockTitle"><?php esc_html_e('Order Form', 'bauhaus' ); ?></h3>
		<p><?php esc_html_e('Please fill out the form and we\'ll get back to you asap', 'bauhaus' ); ?></p>
		<form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" class="clear uni_form">
            <input type="hidden" name="uni_contact_nonce" value="<?php echo wp_create_nonce('uni_nonce') ?>" />
            <input type="hidden" name="action" value="uni_order_form" />

			<input class="formInput userName" type="text" name="uni_contact_name" value="" placeholder="<?php esc_html_e('Name', 'bauhaus' ); ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit">
			<input class="formInput userEmail" type="text" name="uni_contact_email" value="" placeholder="<?php esc_html_e('E-mail', 'bauhaus' ); ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit" data-parsley-type="email">
			<div class="clear"></div>
			<input class="formInput userSubject" type="text" name="uni_contact_subject" value="" placeholder="<?php esc_html_e('Subject', 'bauhaus' ); ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit">
			<textarea class="formTextarea" name="uni_contact_msg" cols="30" rows="10" placeholder="<?php esc_html_e('Message', 'bauhaus' ); ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit"></textarea>
			<input class="thm-btnSubmit uni_input_submit" type="button" value="<?php esc_html_e('Send', 'bauhaus' ); ?>">
		</form>
	</div>
    <?php } ?>
    <div class="loaderWrap">
        <div class="la-ball-clip-rotate la-dark">
            <div></div>
        </div>
    </div>
    <?php wp_nav_menu( array( 'container' => 'div', 'container_class' => 'mobileMenu', 'menu_class' => '', 'theme_location' => 'primary', 'fallback_cb'=> '' ) ); ?>

    <?php wp_footer(); ?>
</body>
</html>