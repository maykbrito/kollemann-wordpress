<?php
/*
*  Template Name: Portfolio One
*/
get_header(); ?>

	<section class="container">
		<div class="portfolio-v1">
			<div class="wrapper">
        <?php
        $bFilterType = ( ot_get_option( 'uni_filter_type' ) ) ? ot_get_option( 'uni_filter_type' ) : 'on';
        $bFilterLoc = ( ot_get_option( 'uni_filter_loc' ) ) ? ot_get_option( 'uni_filter_loc' ) : 'off';
        $bFilterStatus = ( ot_get_option( 'uni_filter_status' ) ) ? ot_get_option( 'uni_filter_status' ) : 'off';
        $bFilterYear = ( ot_get_option( 'uni_filter_year' ) ) ? ot_get_option( 'uni_filter_year' ) : 'off';

        $bIsProjectTypes = $bIsProjectLocs = $bIsProjectStatuses = $bIsProjectYears = false;
        $aProjectArgs = array(
            'post_type' => 'uni_project',
            'posts_per_page' => -1,
	        'orderby' => 'menu_order',
            'order' => 'asc'
        );

        $sOutput = '';

        $oProjectQuery = new wp_query( $aProjectArgs );
        if ( $oProjectQuery->have_posts() ) :
        while ( $oProjectQuery->have_posts() ) : $oProjectQuery->the_post();
            $sSlugs = '';
            // project types
            if ( $bFilterType == 'on' ) {
		        $aProjectTypes = get_the_terms( $post->ID , 'uni_project_type' );
				if( isset( $aProjectTypes ) && !is_wp_error( $aProjectTypes ) ){
				    $bIsProjectTypes = true;
					foreach ( $aProjectTypes as $oTerm ) {
						if( is_object($oTerm) ){
							$sSlugs .= ' '.$oTerm->slug;
							$aTypesFilterSlugs[$oTerm->slug] = esc_html( $oTerm->name );
						}
					}
				}
            }
            // project locations
            if ( $bFilterLoc == 'on' ) {
		        $aProjectLocs = get_the_terms( $post->ID , 'uni_project_location' );
				if( isset( $aProjectLocs ) && !is_wp_error( $aProjectLocs ) ){
				    $bIsProjectLocs = true;
					foreach ( $aProjectLocs as $oTerm ) {
						if( is_object($oTerm) ){
							$sSlugs .= ' '.$oTerm->slug;
							$aLocsFilterSlugs[$oTerm->slug] = esc_html( $oTerm->name );
						}
					}
				}
            }
            // project statuses
            if ( $bFilterStatus == 'on' ) {
		        $aProjectStatuses = get_the_terms( $post->ID , 'uni_project_status' );
				if( isset( $aProjectStatuses ) && !is_wp_error( $aProjectStatuses ) ){
				    $bIsProjectStatuses = true;
					foreach ( $aProjectStatuses as $oTerm ) {
						if( is_object($oTerm) ){
							$sSlugs .= ' '.$oTerm->slug;
							$aStatusesFilterSlugs[$oTerm->slug] = esc_html( $oTerm->name );
						}
					}
				}
            }
            // project years
            if ( $bFilterYear == 'on' ) {
		    $aProjectYears = get_the_terms( $post->ID , 'uni_project_year' );
				if( isset( $aProjectYears ) && !is_wp_error( $aProjectYears ) ){
				    $bIsProjectYears = true;
					foreach ( $aProjectYears as $oTerm ) {
						if( is_object($oTerm) ){
							$sSlugs .= ' '.$oTerm->slug;
							$aYearsFilterSlugs[$oTerm->slug] = esc_html( $oTerm->name );
						}
					}
				}
            }

			$sOutput .=	'<a href="' . esc_url( get_the_permalink( get_the_ID() ) ) . '" class="portfolioItemV1 portfolio_item'. sanitize_html_class($sSlugs) .'">';
                        if ( has_post_thumbnail() ) {
                            $sOutput .= get_the_post_thumbnail( get_the_ID(), 'unithumb-portfolioone', array( 'alt' => the_title_attribute('echo=0') ) );
                        } else {
						    $sOutput .= '<img src="' . get_template_directory_uri().'/images/placeholders/unithumb-portfolioone.png' .'" alt="' . the_title_attribute('echo=0') . '">';
                        }
			$sOutput .=	'<div class="portfolioItemV1Desc">
							<h3>' . esc_html( get_the_title( get_the_ID() ) ) . '</h3>
						</div>
					</a>';

        endwhile;
        endif;
	    wp_reset_postdata();


        if ( $bFilterType == 'on' ) {
		$sTypesChoices = '<li><a href="#filter_types_any" data-option-value="*" class="portfolio_filter_button selected">'.esc_html__('All types', 'bauhaus').'</a></li>';
		if( isset($aTypesFilterSlugs) && is_array($aTypesFilterSlugs) ){
			foreach($aTypesFilterSlugs as $sSlug => $sName){
				$sTypesChoices .= '<li><a href="#filter_types_'.sanitize_html_class($sSlug).'" class="portfolio_filter_button" data-option-value=".'.esc_attr($sSlug).'">'.esc_html($sName).'</a></li>';
			}
		}
        }

        if ( $bFilterLoc == 'on' ) {
		$sLocsChoices = '<li><a href="#filter_locs_any" data-option-value="*" class="portfolio_filter_button selected">'.esc_html__('All locations', 'bauhaus').'</a></li>';
		if( isset($aLocsFilterSlugs) && is_array($aLocsFilterSlugs) ){
			foreach($aLocsFilterSlugs as $sSlug => $sName){
				$sLocsChoices .= '<li><a href="#filter_locs_'.sanitize_html_class($sSlug).'" class="portfolio_filter_button" data-option-value=".'.esc_attr($sSlug).'">'.esc_html($sName).'</a></li>';
			}
		}
        }

        if ( $bFilterStatus == 'on' ) {
		$sStatusesChoices = '<li><a href="#filter_statuses_any" data-option-value="*" class="portfolio_filter_button selected">'.esc_html__('All statuses', 'bauhaus').'</a></li>';
		if( isset($aStatusesFilterSlugs) && is_array($aStatusesFilterSlugs) ){
			foreach($aStatusesFilterSlugs as $sSlug => $sName){
				$sStatusesChoices .= '<li><a href="#filter_statuses_'.sanitize_html_class($sSlug).'" class="portfolio_filter_button" data-option-value=".'.esc_attr($sSlug).'">'.esc_html($sName).'</a></li>';
			}
		}
        }

        if ( $bFilterYear == 'on' ) {
		$sYearsChoices = '<li><a href="#filter_years_any" data-option-value="*" class="portfolio_filter_button selected">'.esc_html__('All years', 'bauhaus').'</a></li>';
		if( isset($aYearsFilterSlugs) && is_array($aYearsFilterSlugs) ){
			foreach($aYearsFilterSlugs as $sSlug => $sName){
				$sYearsChoices .= '<li><a href="#filter_years_'.sanitize_html_class($sSlug).'" class="portfolio_filter_button" data-option-value=".'.esc_attr($sSlug).'">'.esc_html($sName).'</a></li>';
			}
		}
        }
        ?>
                <?php
                    // the next five vars contain HTML code generated by me, so I consider it as safe to just echo them;
                    // additionally, all vars in their constructions are escaped!
                    // If you think I'm wrong, pls, state it in the review and suggest what shall I use there (whether using of wp_kses is ok?)
                 ?>
                <div class="filterPanel clear">
                    <?php if ( $bIsProjectTypes ) { ?>
                    <ul class="portfolio_filter option-set" data-group="types"><?php echo $sTypesChoices; ?></ul>
                    <?php } ?>
                    <?php if ( $bIsProjectLocs ) { ?>
                    <ul class="portfolio_filter option-set" data-group="locs"><?php echo $sLocsChoices; ?></ul>
                    <?php } ?>
                    <?php if ( $bIsProjectStatuses ) { ?>
                    <ul class="portfolio_filter option-set" data-group="statuses"><?php echo $sStatusesChoices; ?></ul>
                    <?php } ?>
                    <?php if ( $bIsProjectYears ) { ?>
                    <ul class="portfolio_filter option-set" data-group="years"><?php echo $sYearsChoices; ?></ul>
                    <?php } ?>
                </div>

				<div class="portfolioWrap uni_portfolio_one clear">
                    <?php echo $sOutput; ?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>