<?php
/*
*  Template Name: Blog Two
*/
get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="wrapper blog2Wrapper clear">
			<div class="contentLeft">

                <div class="blog2Wrap">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $aBlogArgs = array(
            'post_type' => 'post',
            'paged' => $paged
        );

        $oBlogQuery = new wp_query( $aBlogArgs );
        if ( $oBlogQuery->have_posts() ) :
        while ( $oBlogQuery->have_posts() ) : $oBlogQuery->the_post();
        ?>
					<div <?php post_class('blog2ArchiveItem') ?>>
					    <a href="<?php the_permalink() ?>" class="archiveItemThumb" title="<?php the_title_attribute() ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'unithumb-singlepost', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } ?>
                        </a>
						<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a></h3>
						<div class="archiveItemMeta">
                            <time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
        <?php
        $aCategories = wp_get_post_terms( $post->ID, 'category' );
        if ( $aCategories && !is_wp_error( $aCategories ) ) :
        $s = count($aCategories);
        $i = 1;
	    foreach ( $aCategories as $oTerm ) {
	        echo '<a href="'.esc_url( get_term_link( $oTerm->slug, 'category' ) ).'" class="categoryLink">'.esc_html( $oTerm->name ).'</a>';
            if ($i < $s) echo ', ';
            $i++;
	    }
        endif;
        ?>
                        </div>
						<?php the_excerpt() ?>
					</div>
        <?php
        endwhile;
        endif;
	    wp_reset_postdata();
        ?>

		        </div>

			    <div class="pagination clear">
                    <?php uni_pagination( $oBlogQuery->max_num_pages ); ?>
			    </div>

		    </div>

            <?php get_sidebar() ?>

        </div>
	</section>

<?php get_footer(); ?>