<?php
/*
*  Template Name: Portfolio Three
*/
get_header(); ?>

	<section class="container">
		<div class="portfolio-v3 clear">
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
        while ( $oProjectQuery->have_posts() ) : $oProjectQuery->the_post();
        ?>
			<a href="<?php the_permalink() ?>" class="portfolioItemV3">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-portfolioone', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="<?php echo get_template_directory_uri().'/images/placeholders/unithumb-portfolioone.png' ?>" alt="<?php the_title_attribute() ?>">
                <?php } ?>
				<div class="portfolioItemV3Desc">
					<h3><span><?php the_title() ?></span></h3>
				</div>
			</a>
        <?php
        endwhile;
        endif;
	    wp_reset_postdata();
        ?>
		</div>
	</section>

<?php get_footer(); ?>