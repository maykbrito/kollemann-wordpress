<?php

add_action( 'widgets_init', 'bauhaus_widgets_int' );


/*popular_places*/
function bauhaus_widgets_int() {

	//sidibar widget


	register_widget( 'bauhaus_Recent_posts' );
	register_widget( 'bauhaus_Recent_comments' );
	register_widget( 'bauhaus_TAG_Wigdet_class' );
	register_widget( 'bauhaus_footer_info' );
	
	register_widget( 'bauhaus_menu_Wigdet_class' );
	register_widget( 'bauhaus_tweeter_Wigdet' );



	//footer widget




}


class bauhaus_tweeter_Wigdet extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Bauhaus  Tweets', 'bauhaus' ),
			'description' => esc_html__( 'It displays a list of tweets', 'bauhaus' ),
			'classname'   => 'bauhaus_tweeter'
		);
		parent::__construct( 'bauhaus_tweeter', esc_html__( 'Rent It Tweets', 'bauhaus' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {

		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:',
					'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"> <?php esc_html_e( 'Name:',
					'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Name' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'Name' ) ); ?>" type="text"
			       value="<?php if ( isset( $Name ) ) {
				       echo esc_attr( $Name );
			       } ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"> <?php esc_html_e( 'How many show Tweets?',
					'bauhaus' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
			       value="<?php
			       if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       }
			       ?>">

		</p>

		<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"> <?php esc_html_e( 'All Tweets link text',
			'bauhaus' ); ?></label>

	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link_text' ) ); ?>"
	       name="<?php echo esc_attr( $this->get_field_name( 'link_text' ) ); ?>" type="text"
	       value="<?php
	       if ( isset( $link_text ) ) {
		       echo esc_attr( $link_text );
	       }
	       ?>">

</p>

<p>
	<label
		for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"> <?php esc_html_e( 'All Tweets link ',
			'bauhaus' ); ?></label>

	<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
	       name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text"
	       value="<?php
	       if ( isset( $url ) ) {
		       echo esc_attr( $url );
	       }
	       ?>">

</p>



		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );


		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Latest tweets', 'bauhaus' ), // Legacy.
				'Name'  => '',
				'url'  => '#',
				'link_text'=> esc_html__( 'VIEW ALL TWEETS', 'bauhaus' ),
				'text'  => 2


			)
		);
		extract( $instance );
		// Create a filter to the other plug-ins can change them
		$title         = sanitize_text_field( apply_filters( 'widget_title', $title ) );
		$before_widget = str_replace( 'class="', 'class=" widget_twitter ', $before_widget );
		echo wp_kses_post( $before_widget . "" );

		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );


		global $wp_filesystem;

		//the existence check
		if ( empty( $wp_filesystem ) ) {
			require_once( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}


		$bauhaus_upload_dir = wp_upload_dir();
		//We get the correct path to the file
		$bauhaus_filename = trailingslashit( $bauhaus_upload_dir['basedir'] ) . $title . "twitcache.XML";

		//if it took more than an hour the update cache
		if ( get_option( $title . "last_twitupdate" ) < time() - 3600 ) {
			$file = $wp_filesystem->get_contents( 'http://twitrss.me/twitter_user_to_rss/?user=' . $Name );
			update_option( $title . "last_twitupdate", time() );
			$wp_filesystem->put_contents( $bauhaus_filename, $file, FS_CHMOD_FILE );

		} else {

			$file = $wp_filesystem->get_contents( $bauhaus_filename );

		}
		?>

			<ul>
				<?php


				if ( strlen( $file ) > 10 ) {
					$movies = new SimpleXMLElement( $file );


					for ( $i = 0; $i < $text; $i ++ ) {
						?>

									<li>
							<?php echo esc_attr( $Name );


$url= $movies->channel->item[ $i ]->link;
$maxLength = 20;
if (strlen($url) > $maxLength) {
    $url = substr($url,0,$maxLength)."...";
}



$context= $movies->channel->item[ $i ]->title;
$maxLength = 40;
if (strlen($context) > $maxLength) {
    $context = substr($context,0,$maxLength)."...";
}

							?>
							<a href="<?php echo esc_url( $movies->channel->item[ $i ]->link ); ?>"><?php echo wp_kses_post($url); ?></a>
										<?php echo esc_html( $context ); ?>
							<span class="tweet-time"><?php
										$d1         = strtotime( $movies->channel->item[ $i ]->pubDate );
										$date2      = date( "U", $d1 );
										$human_time = human_time_diff( $date2, current_time( 'timestamp' ) );
										printf( '%s ' . esc_html__( 'ago', 'bauhaus' ), $human_time );
										?></span>
						</li>

						<?php
					}
				}


				?>
		<ul>

	<?php


?>

<?php  if(isset($url{4})) {  ?>
<a href="<?php echo esc_url($url) ; ?>" class="widget-all-items"> <?php echo esc_html($link_text) ; ?></a>
<?php } ?>
		<?php
		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$new_instance['title'] = ! empty( $new_instance['title'] ) ? esc_attr( $new_instance['title'] ) :
			"";
		$new_instance['text']  = ( (int) $new_instance['text'] ) ? $new_instance['text'] : 2;
	     $new_instance['url']  = (  $new_instance['url'] ) ? esc_url( $new_instance['url'] ) :
			"#";

		return $new_instance;
	}


}






class bauhaus_menu_Wigdet_class extends WP_Widget {

	/**
	 * Sets up a new Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 */
	public function __construct() {
		$args = array(
			'name'        => esc_html__( 'Bauhaus  Menu', 'bauhaus' ),
			'description' => esc_html__( 'It displays Menu', 'bauhaus' ),
			'classname'   => 'bauhaus_Menu'
		);
		parent::__construct( 'nav_menu', esc_html__( 'Bauhaus  Menu', 'bauhaus' ), $args );


	}

	/**
	 * Outputs the content for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Custom Menu widget instance.
	 */
	public function widget( $args, $instance ) {
		// Get menu
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

		if ( ! $nav_menu ) {
			return;
		}

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );


		?>
		<div class="col-base col-sm-6 col-md-2">
			<?php
			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] . $instance['title'] . $args['after_title'] );
			}

			$nav_menu_args = array(
				'fallback_cb' => '',
				'menu'        => $nav_menu,
				'menu_class' => 'nav-bottom'
			);

			wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );

			?>
		</div>
		<?php

	}

	/**
	 * Handles updating settings for the current Custom Menu widget instance.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		if ( ! empty( $new_instance['title'] ) ) {
			$instance['title'] = sanitize_text_field( stripslashes( $new_instance['title'] ) );
		}
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}

		return $instance;
	}

	/**
	 * Outputs the settings form for the Custom Menu widget.
	 *
	 * @since 3.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title    = isset( $instance['title'] ) ? $instance['title'] : '';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

		// Get menus
		$menus = wp_get_nav_menus();

		// If no menus exists, direct the user to go and create some.
		?>
		<p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) {

		} ?>>
			<?php
			if ( isset( $GLOBALS['wp_customize'] ) && $GLOBALS['wp_customize'] instanceof WP_Customize_Manager ) {
				$url = 'javascript: wp.customize.panel( "nav_menus" ).focus();';
			} else {
				$url = admin_url( 'nav-menus.php' );
			}
			?>
			<?php echo sprintf( esc_html__( 'No menus have been created yet.', "bauhaus" ) . '<a href="%s">' . esc_html__( "Create some", "bauhaus" ) . '</a>.', esc_url( $url ) ); ?>
		</p>
		<div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) {

		} ?>>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'bauhaus' ) ?></label>
				<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				       value="<?php echo esc_attr( $title ); ?>"/>
			</p>

			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"><?php esc_html_e( 'Select Menu:', 'bauhaus' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'nav_menu' ) ); ?>"
				        name="<?php echo esc_attr( $this->get_field_name( 'nav_menu' ) ); ?>">
					<option value="0"><?php esc_html_e( '&mdash; Select &mdash;', 'bauhaus' ); ?></option>
					<?php foreach ( $menus as $menu ) : ?>
						<option
							value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
							<?php echo esc_html( $menu->name ); ?>
						</option>
					<?php endforeach; ?>
				</select>
			</p>
		</div>
		<?php
	}
}





class bauhaus_footer_info extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Bauhaus footer info', 'bauhaus' ),
			'description' => esc_html__( 'It displays footer information', 'bauhaus' ),
			'classname'   => 'bauhaus_footer_info'
		);
		parent::__construct( 'bauhaus_footer_info', esc_html__( 'bauhaus footer_info', 'bauhaus' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(

				'text'  => esc_html__( 'We create web products for the help and growth of your business.', 'bauhaus' ),
				'title' => esc_attr( 'Bauhaus.', 'bauhaus' ),


			)
		);
		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( ' Insert title',
					'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'text' ) ) ); ?>"> <?php esc_html_e( ' Insert text:',
					'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'text' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'text' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       } ?>">
		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {

		extract( $args );
		$instance         = wp_parse_args(
			(array) $instance,
			array(
				'text'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at purus varius odio tempus cursus. Donec quis nibh luctus, posuere velit vitae, commodo dui. Nullam eu blandit orci. Pellentesque sit amet enim sapien. Fusce nec mauris pellentesque, lacinia quam eu, molestie elit.', 'bauhaus' ),
				'title' => esc_attr( '', 'bauhaus' ),


			)
		);

		$arr               = explode( ' ', $instance['title'] );
		$arr_h             = implode( " ", array_splice( $arr, 0, 2 ) );
		$instance['title'] = str_replace( $arr_h, '' . $arr_h . '', $instance['title'] );


		// Create a filter to the other plug-ins can change them

		$before_widget = str_replace( 'class="', 'class=" widget  column col-sm-6 col-md-4" ', $before_widget );



		?>
		<div class="brand-info col-base col-sm-6 col-md-4">
			<a href="<?php echo esc_url( get_home_url( '/' ) . '/#home' ) ?> " class="brand js-target-scroll">
				<?php echo wp_kses_post( $instance['title'] ); ?>
			</a>
			<p><?php echo wp_kses_post( $instance['text'] ); ?></p>
		</div>


		<?php


	}
}







class bauhaus_Recent_posts extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Bauhaus  Recent posts', 'bauhaus' ),
			'description' => esc_html__( 'It displays a Recent posts', 'bauhaus' ),
			'classname'   => 'bauhaus_Recent_posts widget_recent_posts  '
		);
		parent::__construct( 'bauhaus_Recent_posts', esc_html__( 'Bauhaus Recent posts', 'bauhaus' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent posts', 'bauhaus' ), // Legacy.
				'text'  => 3


			)
		);
		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:',
					'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"> <?php esc_html_e( 'How many show post?',
					'bauhaus' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
			       value="<?php
			       if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       }
			       ?>">

		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );


		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent posts', 'bauhaus' ), // Legacy.
				'Name'  => '',
				'text'  => 3


			)
		);
		extract( $instance );
		// Create a filter to the other plug-ins can change them
		$title         = sanitize_text_field( apply_filters( 'widget_title', $title ) );
		$before_widget = str_replace( 'class="', 'class=" widget shadow widget-twitter ', $before_widget );
		echo wp_kses_post( $before_widget . "" );
?>
	<ul>
		<?php
		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );

		$args = array(
			'post_type'           => 'post',
			'orderby'             => 'date',
			'post_status'         => 'publish',
			'posts_per_page'      => $text,
			'ignore_sticky_posts' => true,
			'meta_query'          => array( array( 'key' => '_thumbnail_id' ) )

		);

		global $Bauhaus_class;

		?>


		<?php
		$rent_blog_query = new WP_Query( $args );
		if ( $rent_blog_query->have_posts() ):
			while ( $rent_blog_query->have_posts() ) {
				$rent_blog_query->the_post();
				?>
				<li>
					<a href="<?php echo esc_url( get_the_permalink() ); ?>"  class="recent-post-thumbnail">
						<?php the_post_thumbnail( 'bauhaus-image-79x64-croped' ); ?>
					</a>
					<div class="recent-post-content">
						<a href="<?php echo esc_url( get_the_permalink() ); ?>" class="post-title"><?php the_title(); ?></a>
						<span class="post-time"><?php  echo esc_html( get_the_date('F , jS, Y') ); ?></span>
					</div>
				</li>
				<?php

			}
			wp_reset_postdata();
		endif; ?>

	</ul>
		<?php

		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$new_instance['title'] = ! empty( $new_instance['title'] ) ? esc_attr( $new_instance['title'] ) :
			esc_html__( 'Recent posts', 'bauhaus' );
		$new_instance['text']  = ( (int) $new_instance['text'] ) ? $new_instance['text'] : 3;

		return $new_instance;
	}


}

class bauhaus_Recent_comments extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Bauhaus Recent comments', 'bauhaus' ),
			'description' => esc_html__( 'It displays a list of tweets', 'bauhaus' ),
			'classname'   => 'bauhaus_Recent_comments_noppp'
		);
		parent::__construct( 'bauhaus_Recent_comments', esc_html__( 'Bauhaus Tweets2', 'bauhaus' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent comments', 'bauhaus' ), // Legacy.
				'text'  => 4


			)
		);
		extract( $instance );


		?>
		<p>
			<label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"> <?php esc_html_e( 'Title:',
					'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>" type="text"
			       value="<?php if ( isset( $title ) ) {
				       echo esc_attr( $title );
			       } ?>">
		</p>


		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"> <?php esc_html_e( 'How many show post?',
					'bauhaus' ); ?></label>

			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text"
			       value="<?php
			       if ( isset( $text ) ) {
				       echo esc_attr( $text );
			       }
			       ?>">

		</p>


		<?php
	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );


		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => esc_html__( 'Recent comments', 'bauhaus' ), // Legacy.
				'Name'  => '',
				'text'  => 4


			)
		);
		extract( $instance );
		// Create a filter to the other plug-ins can change them
		$title = sanitize_text_field( apply_filters( 'widget_title', $title ) );
		echo wp_kses_post( $before_widget . "" );

		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );


		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $text,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );
		if ( is_array( $comments ) && $comments ) {


			?>

			<ul class="widget-comment-list widget-list">
				<?php

				foreach ( (array) $comments as $comment ) {


					?>

					<li>
						<span class="media-left"><i class="icon icon-chat"></i></span>
                        <span class="media-body"><?php echo esc_html( $comment->comment_author ); ?> <a
		                        href="<?php echo esc_url( get_permalink( $comment->comment_post_ID ) ); ?>"><?php echo esc_html( get_the_title( $comment->comment_post_ID ) ); ?></a></span>
					</li>
					<?php

				}

				?>
			</ul>

			<?php
		}


		echo wp_kses_post( $after_widget );
	}

	function update( $new_instance, $old_instance ) {
		$new_instance['title'] = ! empty( $new_instance['title'] ) ? esc_attr( $new_instance['title'] ) :
			esc_html__( 'Recent comments', 'bauhaus' );
		$new_instance['text']  = ( (int) $new_instance['text'] ) ? $new_instance['text'] : 4;

		return $new_instance;
	}


}


class bauhaus_TAG_Wigdet_class extends WP_Widget {
	function __construct() {
		$args = array(
			'name'        => esc_html__( 'Bauhaus TAG', 'bauhaus' ),
			'description' => esc_html__( 'It displays a list of TAG', 'bauhaus' ),
			'classname'   => 'widget-tag-cloud'
		);
		parent::__construct( 'widget-tag-cloud', esc_html__( 'Bauhaus TAG', 'bauhaus' ), $args );

	}

	/**
	 * method to display in the admin
	 *
	 * @param $instance
	 */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
			array(
				'title'    => '',
				'type_tag' => '0',
				'number'   => 20
			) );
		extract( $instance );
		$title = sanitize_text_field( $instance['title'] );
		?>
		<p><label
				for="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"><?php esc_html_e( 'Title:', 'bauhaus' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( esc_attr( $this->get_field_id( 'title' ) ) ); ?>"
			       name="<?php echo esc_attr( esc_attr( $this->get_field_name( 'title' ) ) ); ?>"
			       type="text" value="<?php echo esc_attr( esc_attr( $title ) ); ?>"/></p>
		<p>

		<?php

	}

	/**
	 * frontend for the site
	 *
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		extract( $args );
		extract( $instance );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Tags', 'bauhaus' ) : $instance['title'], $instance, $this->id_base );
		echo wp_kses_post( $before_widget );

		echo wp_kses_post( $before_title ) . esc_attr( $title ) . wp_kses_post( $after_title );
		?>
		<div class="blog-tags">
			<?php
			$posttags = get_tags();
			if ( $posttags ) {
				foreach ( $posttags as $tag ) {
					?>

					<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
					><?php echo esc_html( $tag->name ); ?></a>

					<?php
				}
			}

			?>
		</div>
		<?php

		echo wp_kses_post( $after_widget );
	}

	public function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$new_instance         = wp_parse_args( (array) $new_instance, array(
			'title'    => '',
			'count'    => 0,
			'dropdown' => ''
		) );
		$instance['title']    = sanitize_text_field( $new_instance['title'] );
		$instance['number']   = $new_instance['number'] ? (int) sanitize_title( $new_instance['number'] ) : 20;
		$instance['type_tag'] = $new_instance['type_tag'] ? (int) sanitize_title( $new_instance['type_tag'] ) : '0';

		return $instance;
	}


}






