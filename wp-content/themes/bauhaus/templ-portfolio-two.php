<?php
/*
*  Template Name: Portfolio Two
*/
get_header(); ?>

	<section class="container">
		<div class="portfolio-v2 clear">
        <?php
        //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $aProjectArgs = array(
            'post_type' => 'uni_project',
            'posts_per_page' => -1,
	        'orderby' => 'menu_order',
            'order' => 'asc',
            //'paged' => $paged
        );

        $oProjectQuery = new wp_query( $aProjectArgs );
        if ( $oProjectQuery->have_posts() ) :
        $i = 1;
        while ( $oProjectQuery->have_posts() ) : $oProjectQuery->the_post();
        ?>
            <?php if ( ( $i == 1 ) || ($i % 7 == 0) ) { ?>
			<!-- Start row --><!--<?php echo $i; ?> -->
			<a href="<?php the_permalink() ?>" class="portfolioItemV2 portfolioLeftItem">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail( 'unithumb-portfoliotwoone', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
            <?php } else { ?>
			    <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwoone.png' ?>" alt="<?php the_title_attribute() ?>">
            <?php } ?>
				<div class="portfolioItemOverlay"></div>
				<div class="portfolioItemV2Desc">
					<h4><?php the_title() ?></h4>
					<?php uni_excerpt(30, '', true) ?>
					<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
				</div>
			</a>
            <?php } ?>
            <?php if ( ( $i == 2 ) || ($i % 8 == 0) ) { ?>
            <!--<?php echo $i; ?> -->
			<div class="portfolioRightWrapper">
            <?php } ?>
                <?php if ( ( $i == 2 ) || ($i % 8 == 0) ) { ?>
                <!--<?php echo $i; ?> -->
				<a href="<?php the_permalink() ?>" class="portfolioItemV2Small clear">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-portfoliotwothree', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwothree.png' ?>" alt="<?php the_title_attribute() ?>">
                <?php } ?>
					<div class="portfolioItemOverlay"></div>
					<div class="portfolioItemV2Desc">
						<h4><?php the_title() ?></h4>
						<?php uni_excerpt(30, '', true) ?>
						<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
					</div>
				</a>
                <?php } ?>
                <?php if ( ( $i == 3 ) || ($i % 9 == 0) ) { ?>
                <!--<?php echo $i; ?> -->
				<a href="<?php the_permalink() ?>" class="portfolioItemV2SmallImg clear">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-portfoliotwotwo', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwotwo.png' ?>" alt="<?php the_title_attribute() ?>">
                <?php } ?>
					<div class="portfolioItemOverlay"></div>
					<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
				</a>
                <?php } ?>
            <?php if ( ( $i == 3 ) || ($i % 9 == 0) ) { ?>
            <!--<?php echo $i; ?> -->
			</div>
			<!-- End row -->
            <?php } ?>

            <?php if ( ( $i == 4 ) || ($i % 10 == 0) ) { ?>
            <!--<?php echo $i; ?> -->
            <!-- Start row -->
			<div class="portfolioLeftWrapper">
            <?php } ?>
                <?php if ( ( $i == 4 ) || ($i % 10 == 0) ) { ?>
                <!--<?php echo $i; ?> -->
				<a href="<?php the_permalink() ?>" class="portfolioItemV2Small clear">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-portfoliotwothree', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwothree.png' ?>" alt="<?php the_title_attribute() ?>">
                <?php } ?>
					<div class="portfolioItemOverlay"></div>
					<div class="portfolioItemV2Desc">
						<h4><?php the_title() ?></h4>
						<?php uni_excerpt(30, '', true) ?>
						<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
					</div>
				</a>
                <?php } ?>
                <?php if ( ( $i == 5 ) || ($i % 11 == 0) ) { ?>
                <!--<?php echo $i; ?> -->
				<a href="<?php the_permalink() ?>" class="portfolioItemV2SmallImg clear">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-portfoliotwotwo', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwotwo.png' ?>" alt="<?php the_title_attribute() ?>">
                <?php } ?>
					<div class="portfolioItemOverlay"></div>
					<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
				</a>
                <?php } ?>
            <?php if ( ( $i == 5 ) || ($i % 11 == 0) ) { ?>
            <!--<?php echo $i; ?> -->
			</div>
            <?php } ?>
            <?php if ( ( $i == 6 ) || ($i % 12 == 0) ) { ?>
            <!--<?php echo $i; ?> -->
			<a href="<?php the_permalink() ?>" class="portfolioItemV2 portfolioRightItem">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail( 'unithumb-portfoliotwoone', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
            <?php } else { ?>
			    <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfoliotwoone.png' ?>" alt="<?php the_title_attribute() ?>">
            <?php } ?>
				<div class="portfolioItemOverlay"></div>
				<div class="portfolioItemV2Desc">
					<h4><?php the_title() ?></h4>
					<?php uni_excerpt(30, '', true) ?>
					<span><?php esc_html_e('view more', 'bauhaus') ?> <i></i></span>
				</div>
			</a>
			<!-- End row -->
            <?php } ?>
        <?php
        $i++;
        endwhile;
        endif;
	    wp_reset_postdata();
        ?>
		</div>
	</section>

<?php get_footer(); ?>