<footer id="footer" class="footer section">
    <div class="footer-flex">
        <div class="flex-item">

            <a class="brand pull-left" href="<?php
			echo esc_url( home_url( '/' ) ); ?>">

				<?php
				$logo = get_theme_mod( 'bauhaus_logo_small' );
				$logo_text = get_theme_mod( 'bauhaus_logo_text' );
				$logo_name = get_theme_mod( 'bauhaus_logo_name' );
				if ( isset( $logo{2} ) ) {
					?>
                    <img alt="" src="<?php echo esc_url( $logo ); ?>">
                    <div class="brand-info">
                        <div class="brand-name"><?php if ( isset( $logo_name{0} ) ) {
								echo wp_kses_post( $logo_name );
							} ?></div>
                        <div class="brand-text"><?php if ( isset( $logo_text{0} ) ) {
								echo wp_kses_post( $logo_text );
							} ?></div>
                    </div>

					<?php


				} else {

					?>
                    <div class="brand-info">
                        <div class="brand-name"><?php

								echo esc_html( get_option( 'blogname' ) );

							?></div>

                    </div>
					<?php

				}
				?>

            </a>


        </div>
        <div class="flex-item">
            <div class="inline-block">

				<?php
				echo wp_kses_post(
					do_shortcode( ( get_theme_mod( 'footer_copyright', ' &copy; ' . esc_html__( 'Bauhaus ', 'bauhaus' ) . date( 'Y' ) . '<br/>' . esc_html__( 'All Rights Resevered ', 'bauhaus' ) . ' ' ) ) ) ); ?>


            </div>
        </div>

		<?php if ( has_nav_menu( 'bauhaus_footer_left' ) ) { ?>
            <div class="flex-item">

				<?php


				$bauhaus_footer_left = array(
					'theme_location' => 'bauhaus_footer_left',
					'menu' => '',
					'container' => '',
					'container_class' => '',
					'container_id' => '',
					'menu_class' => '',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => '',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id="%1$s" class="    %2$s">%3$s</ul>',
					'depth' => 0,

				);


				wp_nav_menu( $bauhaus_footer_left );


				?>


            </div>

		<?php } ?>
	    <?php if ( has_nav_menu( 'bauhaus_footer_center' ) ) { ?>
        <div class="flex-item">
			<?php


			$bauhaus_footer_center = array(
				'theme_location' => 'bauhaus_footer_center',
				'menu' => '',
				'container' => '',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => '',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul id="%1$s" class="    %2$s">%3$s</ul>',
				'depth' => 0,

			);


			wp_nav_menu( $bauhaus_footer_center );


			?>
        </div>
        <?php  } ?>
	    <?php if ( has_nav_menu( 'bauhaus_footer_right' ) ) { ?>
        <div class="flex-item">
			<?php


			$bauhaus_footer_right = array(
				'theme_location' => 'bauhaus_footer_right',
				'menu' => '',
				'container' => '',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => '',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul id="%1$s" class="    %2$s">%3$s</ul>',
				'depth' => 0,

			);


			wp_nav_menu( $bauhaus_footer_right );


			?>

        </div>

	    <?php  } ?>
        
        <?php do_action( 'bauhaus-after-footer-menu' ); ?>
        <div class="flex-item">
            <div class="social-list">
				<?php
				if ( strlen( get_theme_mod( 'bauhaus_social_networks_control_social_shortcode' ) ) > 8 ):
					echo do_shortcode( get_theme_mod( 'bauhaus_social_networks_control_social_shortcode' ) );
				endif; ?>

				<?php if ( strlen( get_theme_mod( 'bauhaus_social_networks_control_twitter' ) ) > 8 ): ?>

                    <a href="<?php echo esc_url( get_theme_mod( 'bauhaus_social_networks_control_twitter' ) ); ?>"
                       class="icon ion-social-twitter"></a>
				<?php endif; ?>

				<?php if ( strlen( get_theme_mod( 'bauhaus_social_networks_control_facebook' ) ) > 8 ): ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'bauhaus_social_networks_control_facebook' ) ); ?>"
                       class="icon ion-social-facebook"></a>


				<?php endif; ?>

				<?php if ( strlen( get_theme_mod( 'bauhaus_social_networks_control_googleplus' ) ) > 8 ): ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'bauhaus_social_networks_control_googleplus' ) ); ?>"
                       class="icon ion-social-googleplus"></a>


				<?php endif; ?>

				<?php if ( strlen( get_theme_mod( 'bauhaus_social_networks_control_linkedin' ) ) > 8 ): ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'bauhaus_social_networks_control_linkedin' ) ); ?>"
                       class="icon ion-social-linkedin"></a>


				<?php endif; ?>
				<?php if ( strlen( get_theme_mod( 'bauhaus_social_networks_control_dribbble' ) ) > 8 ): ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'bauhaus_social_networks_control_dribbble' ) ); ?>"
                       class="icon ion-social-dribbble-outline"></a>


				<?php endif; ?>

            </div>
        </div>
    </div>
</footer>
</div>
</div>


<?php wp_footer(); ?>

</body>
</html>