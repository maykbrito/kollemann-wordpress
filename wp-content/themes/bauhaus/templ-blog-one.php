<?php
/*
*  Template Name: Blog One
*/
get_header() ?>

	<section class="container">
		<div class="wrapper">
			<div class="blogWrap clear">
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
				<div <?php post_class('blogArchiveItem') ?>>
					<a href="<?php the_permalink() ?>" class="archiveItemThumb" title="<?php the_title_attribute() ?>">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail( 'unithumb-blogone', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                    <?php } else { ?>
                        <img src="http://placehold.it/370x292" width="370" height="292" alt="<?php the_title_attribute() ?>" />
                    <?php } ?>
                    </a>
					<h3><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a></h3>
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
	</section>

<?php get_footer(); ?>