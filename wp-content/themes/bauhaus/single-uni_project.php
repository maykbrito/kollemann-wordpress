<?php get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="singleProjectWrap clear">

        <?php if (have_posts()) : while (have_posts()) : the_post();
        $aPostCustom = get_post_custom( $post->ID );
	    $iThumbId = get_post_thumbnail_id( $post->ID );
	    if ( !empty($iThumbId) ) {
	        $aFullImage = wp_get_attachment_image_src( $iThumbId, 'full' );
            $aThumbImage = wp_get_attachment_image_src( $iThumbId, 'unithumb-singleprojectthumb' );
            $sFullUrl = $aFullImage[0];
            $sThumbUrl = $aThumbImage[0];
        } else {
            $sFullUrl = get_template_directory_uri().'/images/placeholders/project-no-photo.png';
            $sThumbUrl = get_template_directory_uri().'/images/placeholders/project-thumb-no-photo.png';
        }
        $sGalleryImages = get_post_meta(get_the_ID(), 'uni_project_slider', true);
        $aGalleryImages = ( !empty($sGalleryImages) ) ? explode(',', $sGalleryImages) : array();
        ?>
			<div class="singleProjectGallery">
            <?php if ( !empty( $aPostCustom['uni_project_portfolio_uri'][0] ) ) { ?>
                <a href="<?php echo esc_url( $aPostCustom['uni_project_portfolio_uri'][0] ) ?>" class="backToPortfolio"></a>
            <?php } else { ?>
				<a href="<?php $sPortfolioPageId = ot_get_option( 'uni_portfolio_page' ); echo ( isset($sPortfolioPageId) ) ? esc_url( get_permalink($sPortfolioPageId) ) : '#'; ?>" class="backToPortfolio"></a>
            <?php } ?>
				<a href="#" class="fullScreen"></a>
				<a href="#" class="smallScreen"></a>
				<div class="singleProjectGallerySlider">
					<ul>
                    <?php if ( isset($aGalleryImages) && !empty($aGalleryImages) ) {
                        $i = 0;
                        foreach ( $aGalleryImages as $sImageId ) {
	                        $aSlideFullImage = wp_get_attachment_image_src( $sImageId, 'full' );
                    ?>
						<li data-slide="<?php echo esc_attr( $i ); ?>" style="background-image: url(<?php echo esc_url( $aSlideFullImage[0] ); ?>);"></li>
                    <?php
                        $i++;
                        }
                    } else {
                    ?>
						<li data-slide="0" style="background-image: url(<?php echo esc_url( $sFullUrl ); ?>);"></li>
                    <?php
                    }
                    ?>
					</ul>
				</div>
				<div class="projectGalleryThumb" id="projectGalleryPager">
					<ul>
                    <?php if ( isset($aGalleryImages) && !empty($aGalleryImages) ) {
                        $l = 0;
                        foreach ( $aGalleryImages as $sImageId ) {
                            $aSlideThumbImage = wp_get_attachment_image_src( $sImageId, 'unithumb-singleprojectthumb' );
                    ?>
						<li data-slide="<?php echo esc_attr( $l ); ?>"<?php if  ( $l == 0 ) { echo ' class="active"'; } ?>><a href="#"><img src="<?php echo esc_url( $aSlideThumbImage[0] ); ?>" alt="<?php the_title_attribute() ?>" /></a></li>
                    <?php
                        $l++;
                        }
                    } else {
                    ?>
						<li data-slide="0" class="active"><a href="#"><img src="<?php echo esc_url( $sThumbUrl ); ?>" alt="<?php the_title_attribute() ?>" /></a></li>
                    <?php
                    }
                    ?>
					</ul>
				</div>
			</div>
			<div <?php post_class('singleProjectDesc') ?>>
				<h1><?php the_title() ?></h1>
				<div class="singleProjectDescWrap clear">
					<div class="singleProjectDescItem">
						<i class="iconArea"></i>
						<p><?php echo esc_html( $aPostCustom['uni_area'][0] ) ?></p>
					</div>
					<div class="singleProjectDescItem">
						<i class="iconLocation"></i>
        <?php
        $aTerms = wp_get_post_terms( $post->ID, 'uni_project_location' );
        if ( isset($aTerms) && !is_wp_error( $aTerms ) ) :
        $s = count($aTerms);
        $i = 1;
        echo '<p>';
	    foreach ( $aTerms as $oTerm ) {
	        echo esc_html( $oTerm->name );
            if ($i < $s) echo ', ';
            $i++;
	    }
        echo '</p>';
        endif;
        ?>
					</div>
					<div class="singleProjectDescItem">
						<i class="iconDate"></i>
        <?php
        $aTerms = wp_get_post_terms( $post->ID, 'uni_project_year' );
        if ( isset($aTerms) && !is_wp_error( $aTerms ) ) :
        $s = count($aTerms);
        $i = 1;
        echo '<p>';
	    foreach ( $aTerms as $oTerm ) {
	        echo esc_html( $oTerm->name );
            if ($i < $s) echo ', ';
            $i++;
	    }
        echo '</p>';
        endif;
        ?>
					</div>
				</div>
				<div class="singleProjectDescText">
					<?php the_content() ?>
				</div>
					<div class="projectShareLinks clear">
						<a href="<?php echo uni_share_facebook(); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="&#1057;&#1083;&#1086;&#1081;_1" x="0px" y="0px" width="16px" height="14px" viewBox="0 0 16 14" enable-background="new 0 0 16 14" xml:space="preserve">
								<path fill="#C9C9C9" class="socialShareIcon" d="M9.016 5.25h2.625v2.625H9.016V14H6.392V7.875H3.767V5.25h2.625V4.152c0-1.04 0.327-2.354 0.979-3.073 C8.021 0.4 8.8 0 9.8 0h1.834v2.625H9.805c-0.436 0-0.789 0.352-0.789 0.787V5.25z"/>
							</svg>
						</a>
						<a href="<?php echo uni_share_twitter(); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="&#1057;&#1083;&#1086;&#1081;_2" x="0px" y="0px" width="16px" height="14px" viewBox="0 0 16 14" enable-background="new 0 0 16 14" xml:space="preserve">
								<path fill="#C9C9C9" class="socialShareIcon" d="M16 2.039c-0.59 0.261-1.221 0.438-1.885 0.517c0.678-0.406 1.197-1.05 1.441-1.814 c-0.635 0.375-1.338 0.648-2.086 0.796c-0.598-0.639-1.449-1.037-2.393-1.037c-1.814 0-3.284 1.47-3.284 3.3 c0 0.3 0 0.5 0.1 0.748c-2.728-0.137-5.146-1.444-6.765-3.43C0.832 1.6 0.7 2.1 0.7 2.8 c0 1.1 0.6 2.1 1.5 2.731C1.592 5.5 1.1 5.3 0.6 5.07v0.041c0 1.6 1.1 2.9 2.6 3.2 C3.001 8.4 2.7 8.4 2.4 8.445c-0.212 0-0.417-0.021-0.618-0.061c0.417 1.3 1.6 2.3 3.1 2.3 c-1.123 0.879-2.539 1.403-4.076 1.403c-0.265 0-0.526-0.017-0.783-0.045c1.453 0.9 3.2 1.5 5 1.5 c6.037 0 9.338-5.001 9.338-9.338l-0.01-0.425C15.002 3.3 15.6 2.7 16 2"/>
							</svg>
						</a>
						<a href="<?php echo uni_share_pinterest(); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="&#1057;&#1083;&#1086;&#1081;_3" x="0px" y="0px" width="16px" height="14px" viewBox="0 0 16 14" enable-background="new 0 0 16 14" xml:space="preserve">
								<path fill="#C9C9C9" class="socialShareIcon" d="M8 0C4.134 0 1 3.1 1 7c0 2.9 1.7 5.3 4.2 6.411c-0.02-0.488-0.003-1.075 0.122-1.607 c0.134-0.568 0.9-3.814 0.9-3.814S5.989 7.5 6 6.882c0-1.038 0.602-1.812 1.35-1.812c0.637 0 0.9 0.5 0.9 1.1 c0 0.64-0.408 1.597-0.618 2.484C7.49 9.3 8 10 8.8 9.953c1.327 0 2.219-1.703 2.219-3.721 c0-1.534-1.033-2.683-2.913-2.683c-2.123 0-3.446 1.583-3.446 3.352c0 0.6 0.2 1 0.5 1.4 c0.129 0.2 0.1 0.2 0.1 0.39C5.159 8.8 5.1 9.1 5 9.227C5.003 9.4 4.9 9.5 4.7 9.4 c-0.978-0.399-1.434-1.47-1.434-2.674c0-1.988 1.677-4.373 5.003-4.373c2.672 0 4.4 1.9 4.4 4 c0 2.746-1.526 4.798-3.777 4.798c-0.755 0-1.467-0.409-1.71-0.873c0 0-0.407 1.613-0.493 1.9 c-0.148 0.539-0.439 1.079-0.705 1.499C6.646 13.9 7.3 14 8 14c3.866 0 7-3.134 7-7S11.866 0 8 0"/>
							</svg>

						</a>
						<a href="<?php echo uni_share_gplus(); ?>">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="&#1057;&#1083;&#1086;&#1081;_4" x="0px" y="0px" width="16px" height="14px" viewBox="0 0 16 14" enable-background="new 0 0 16 14" xml:space="preserve">
								<path fill="#C9C9C9" class="socialShareIcon" d="M15.127 3.034h-1.891v1.89h-0.943v-1.89h-1.891V2.088h1.891V0.199h0.943v1.889h1.891V3.034z M9.784 10.8 c0 1.417-1.293 3.142-4.547 3.142c-2.379 0-4.364-1.027-4.364-2.753c0-1.332 0.843-3.063 4.785-3.063 C5.073 7.7 4.9 7 5.3 6.308c-2.308 0-3.49-1.356-3.49-3.08c0-1.686 1.254-3.219 3.811-3.219h4.098L8.788 0.971H7.713 C8.472 1.4 8.9 2.3 8.9 3.287c0 0.905-0.499 1.639-1.21 2.189C6.402 6.5 6.7 7 8 8 C9.354 8.9 9.8 9.7 9.8 10.8 M7.229 3.349c-0.19-1.45-1.134-2.64-2.238-2.672S3.146 1.8 3.3 3.2 c0.19 1.4 1.2 2.5 2.3 2.496C6.785 5.7 7.4 4.8 7.2 3.3 M8.367 10.994c0-1.191-1.088-2.328-2.913-2.328 C3.81 8.6 2.4 9.7 2.4 10.931c0 1.2 1.2 2.3 2.8 2.292C7.352 13.2 8.4 12.2 8.4 11"/>
							</svg>
						</a>
					</div>
			</div>
        <?php endwhile; endif; ?>
		</div>
	</section>

<?php get_footer(); ?>