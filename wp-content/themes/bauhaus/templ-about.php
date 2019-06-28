<?php
/*
*  Template Name: About Page
*/
get_header();
$aUniAllowedHtmlWoA = uni_allowed_html_wo_a();
$aUniAllowedHtmlWithA = uni_allowed_html_with_a();
?>

	<section class="container">

        <?php if (have_posts()) : while (have_posts()) : the_post();
        $aCustomData = get_post_custom( $post->ID );

        $iPostThumb = get_post_thumbnail_id( $post->ID );
        if ( !empty($iPostThumb) ) $aThumb = wp_get_attachment_image_src( $iPostThumb, 'full' );
        if ( !empty($aThumb) ) {
            $sBackgroundImageUrl = $aThumb[0];
        } else {
            $sBackgroundImageUrl = get_template_directory_uri().'/images/placeholders/bg-about.png';
        }
        ?>
		<div class="screen1" style="background-image: url(<?php echo esc_url( $sBackgroundImageUrl ); ?>);">
			<div class="wrapper">
				<h2><?php if ( !empty($aCustomData['uni_title'][0]) ) echo wp_kses( $aCustomData['uni_title'][0], $aUniAllowedHtmlWoA ); ?></h2>
				<p><?php if ( !empty($aCustomData['uni_sub_title'][0]) ) echo wp_kses( $aCustomData['uni_sub_title'][0], $aUniAllowedHtmlWoA ); ?></p>
			</div>
			<i class="arrowDown"></i>
		</div>
		<div class="ourStory">
			<div class="wrapper">
				<h3 class="blockTitle"><?php if ( !empty($aCustomData['uni_our_story_title'][0]) ) echo wp_kses( $aCustomData['uni_our_story_title'][0], $aUniAllowedHtmlWoA ); ?></h3>
				<div class="storyWrap clear">
					<div class="fcell">
						<?php if ( !empty($aCustomData['uni_left_col_text'][0]) ) echo wp_kses( $aCustomData['uni_left_col_text'][0], $aUniAllowedHtmlWithA ); ?>
					</div>
					<div class="scell">
						<?php if ( !empty($aCustomData['uni_right_col_text'][0]) ) echo wp_kses( $aCustomData['uni_right_col_text'][0], $aUniAllowedHtmlWithA ); ?>
					</div>
				</div>
			</div>
		</div>
        <?php endwhile; endif;
        wp_reset_postdata(); ?>

    <?php if ( isset($aCustomData['uni_about_team_enable'][0]) && $aCustomData['uni_about_team_enable'][0] == 'on' ) { ?>
		<div class="ourTeam">
			<div class="wrapper">
				<h3 class="blockTitle"><?php echo ( !empty($aCustomData['uni_about_team_title'][0]) ) ? esc_html( $aCustomData['uni_about_team_title'][0] ) : esc_html__('Meet Our Team', 'bauhaus'); ?></h3>
    <?php
    $oUserQuery = new WP_User_Query( array('role' => 'architector') );
    if ( ! empty( $oUserQuery->results ) ) {
    ?>
				<div class="ourTeamWrap">
    <?php
        foreach ( $oUserQuery->results as $oUser ) {
            $aUserData = ( get_user_meta( $oUser->ID, '_uni_user_data', true ) ) ? get_user_meta( $oUser->ID, '_uni_user_data', true ) : array();
    ?>
					<div class="teamItem">
                        <?php echo do_shortcode('[uav-display-avatar id="'.$oUser->ID.'" size="180" alt="'.esc_attr($oUser->display_name).'"]') ?>
						<h4><?php echo esc_html( $oUser->display_name ); ?></h4>
						<p><?php if ( !empty($aUserData['profession']) ) echo esc_attr( $aUserData['profession'] ) ?></p>
					</div>
    <?php
        }
    ?>
				</div>
    <?php
    }
    ?>
			</div>
		</div>
    <?php } ?>

    <?php if ( isset($aCustomData['uni_about_brands_enable'][0]) && $aCustomData['uni_about_brands_enable'][0] == 'on' ) { ?>
		<div class="ourPartners">
			<div class="wrapper">
				<h3 class="blockTitle"><?php echo ( !empty($aCustomData['uni_about_brands_title'][0]) ) ? esc_html( $aCustomData['uni_about_brands_title'][0] ) : esc_html__('We Have Worked With', 'bauhaus'); ?></h3>
				<div class="ourPartnersWrap">
	<?php
	$aBrandsArgs = array(
	    'post_type' => 'uni_brand',
        'posts_per_page' => -1,
	    'orderby' => 'menu_order',
        'order' => 'asc'
	);
	$oBrands = new WP_Query( $aBrandsArgs );
	if ( $oBrands->have_posts() ) :
	while ( $oBrands->have_posts() ) : $oBrands->the_post();
        $aPostCustom = get_post_custom( $post->ID );
	?>
					<div<?php if ( !empty($aPostCustom['uni_brand_uri'][0]) ) echo ' data-href="'.esc_url($aPostCustom['uni_brand_uri'][0]).'"'; ?> class="partnersItem<?php if ( ot_get_option( 'uni_brands_grayscale_enable' ) == 'on' ) { echo ' discolored'; } if ( !empty($aPostCustom['uni_brand_uri'][0]) ) { echo ' brand-with-link'; } ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'unithumb-brand', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
						    <img src="<?php echo get_template_directory_uri().'/images/placeholders/brand.png' ?>" alt="<?php the_title_attribute() ?>" width="140" height="22">
                        <?php } ?>
					</div>
	<?php
	endwhile; endif;
	wp_reset_postdata();
    ?>
				</div>
			</div>
		</div>
    <?php } ?>

    <?php if ( isset($aCustomData['uni_about_instagram_enable'][0]) && $aCustomData['uni_about_instagram_enable'][0] == 'on' ) { ?>
		<div class="ourInstagram">
			<i class="iconInstagam"></i>
            <div class="clear"></div>
            <?php echo do_shortcode('[instagram-feed showheader=true widthunit=272 heightunit=228 imagepadding=0 showfollow=true showbutton=false]'); ?>
        </div>
    <?php } ?>

	</section>

<?php get_footer(); ?>