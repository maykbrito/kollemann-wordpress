<?php get_header();
$sBlogLayout = ( ot_get_option( 'uni_archive_layout' ) ) ? ot_get_option( 'uni_archive_layout' ) : 'blog1';
if ( $sBlogLayout == 'blog1' ) { ?>

	<section class="container">
		<div class="wrapper">

            <h1 class="blockTitle"><?php printf( esc_html__( 'Search results for: "%s"', 'bauhaus' ), get_search_query() ); ?></h1>

			<div class="blogWrap clear">
        <?php if (have_posts()) : while (have_posts()) : the_post();
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
        <?php endwhile;
        else : ?>

				<div class="singlePost clear">
				    <h2><?php esc_html_e('Nothing Found', 'bauhaus') ?></h2>
				    <a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url( '/' ) ); } ?>" class="thm-btn-1 back-to"><?php esc_html_e('homepage', 'bauhaus') ?></a>
			    </div>

        <?php endif;
        wp_reset_postdata(); ?>
			</div>

			<div class="pagination clear">
                <?php uni_pagination(); ?>
			</div>

		</div>
	</section>
<?php } else if ( $sBlogLayout == 'blog2' ) { ?>

	<section class="container">
		<div class="wrapper blog2Wrapper clear">
			<div class="contentLeft">

            <h1 class="blockTitle"><?php printf( esc_html__( 'Search results for: "%s"', 'bauhaus' ), get_search_query() ); ?></h1>

                <div class="blog2Wrap">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
						<p><?php the_excerpt() ?></p>
					</div>
        <?php endwhile;
        else : ?>

				<div class="singlePost clear">
				    <h2><?php esc_html_e('Nothing Found', 'bauhaus') ?></h2>
				    <a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url( '/' ) ); } ?>" class="thm-btn-1 back-to"><?php esc_html_e('homepage', 'bauhaus') ?></a>
			    </div>

        <?php endif;
        wp_reset_postdata(); ?>

		        </div>

			    <div class="pagination clear">
                    <?php uni_pagination(); ?>
			    </div>

		    </div>

            <?php get_sidebar() ?>

        </div>
	</section>

<?php
}
get_footer(); ?>